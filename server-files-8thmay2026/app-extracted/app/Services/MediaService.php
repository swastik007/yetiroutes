<?php

namespace App\Services;

use App\Models\Media;

/**
 * Media Manager Service
 * Handles image uploads, resizing, and media library management
 */
class MediaService
{
    private Media $mediaModel;
    private string $uploadPath;
    private array $allowedMimeTypes = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/webp',
        'video/mp4',
        'application/pdf'
    ];

    public function __construct()
    {
        $this->mediaModel = new Media();
        $this->uploadPath = BASE_PATH . '/public/uploads/';

        // Create upload directory if it doesn't exist
        if (!is_dir($this->uploadPath)) {
            mkdir($this->uploadPath, 0755, true);
        }
    }

    /**
     * Upload and process media file
     *
     * @param array $file The $_FILES array element
     * @param int|null $uploadedBy User ID
     * @param string $visibility 'public' or 'private'
     * @return array|false Returns media data or false on failure
     */
    public function upload(array $file, ?int $uploadedBy = null, string $visibility = 'public'): array|false
    {
        // Validate file
        if (!$this->validateFile($file)) {
            return false;
        }

        // Generate unique filename
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $originalPath = $this->uploadPath . $filename;

        // Move uploaded file
        if (!move_uploaded_file($file['tmp_name'], $originalPath)) {
            error_log("Failed to move uploaded file");
            return false;
        }

        // Create variants (thumbnails, different sizes)
        $variants = [];
        if (strpos($file['type'], 'image/') === 0) {
            $variants = $this->createImageVariants($originalPath, $filename);
        }

        // Create media record
        $mediaId = $this->mediaModel->create([
            'filename' => $filename,
            'original_path' => '/uploads/' . $filename,
            'variants' => json_encode($variants),
            'mime_type' => $file['type'],
            'uploaded_by' => $uploadedBy,
            'visibility' => $visibility
        ]);

        if (!$mediaId) {
            // Cleanup uploaded file if database insert fails
            unlink($originalPath);
            return false;
        }

        return [
            'id' => $mediaId,
            'filename' => $filename,
            'url' => '/uploads/' . $filename,
            'variants' => $variants,
            'mime_type' => $file['type']
        ];
    }

    /**
     * Validate uploaded file
     */
    private function validateFile(array $file): bool
    {
        // Check for upload errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            error_log("Upload error code: " . $file['error']);
            return false;
        }

        // Check file size (max 10MB)
        if ($file['size'] > 10 * 1024 * 1024) {
            error_log("File too large: " . $file['size']);
            return false;
        }

        // Check MIME type
        if (!in_array($file['type'], $this->allowedMimeTypes)) {
            error_log("Invalid MIME type: " . $file['type']);
            return false;
        }

        return true;
    }

    /**
     * Create image variants (thumbnails, different sizes)
     */
    private function createImageVariants(string $originalPath, string $filename): array
    {
        $variants = [];

        // Define sizes
        $sizes = [
            'thumbnail' => ['width' => 150, 'height' => 150],
            'medium' => ['width' => 500, 'height' => 500],
            'large' => ['width' => 1200, 'height' => 1200]
        ];

        foreach ($sizes as $sizeName => $dimensions) {
            $variantPath = $this->resizeImage(
                $originalPath,
                $dimensions['width'],
                $dimensions['height'],
                $sizeName . '_' . $filename
            );

            if ($variantPath) {
                $variants[$sizeName] = str_replace($this->uploadPath, '/uploads/', $variantPath);
            }
        }

        return $variants;
    }

    /**
     * Resize image
     */
    private function resizeImage(string $sourcePath, int $maxWidth, int $maxHeight, string $outputFilename): string|false
    {
        // Get image info
        $imageInfo = getimagesize($sourcePath);
        if (!$imageInfo) {
            return false;
        }

        list($originalWidth, $originalHeight, $imageType) = $imageInfo;

        // Calculate new dimensions
        $ratio = min($maxWidth / $originalWidth, $maxHeight / $originalHeight);
        $newWidth = (int) ($originalWidth * $ratio);
        $newHeight = (int) ($originalHeight * $ratio);

        // Create image resource based on type
        $sourceImage = match ($imageType) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($sourcePath),
            IMAGETYPE_PNG => imagecreatefrompng($sourcePath),
            IMAGETYPE_GIF => imagecreatefromgif($sourcePath),
            IMAGETYPE_WEBP => imagecreatefromwebp($sourcePath),
            default => false
        };

        if (!$sourceImage) {
            return false;
        }

        // Create new image
        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        // Preserve transparency for PNG and GIF
        if ($imageType === IMAGETYPE_PNG || $imageType === IMAGETYPE_GIF) {
            imagealphablending($newImage, false);
            imagesavealpha($newImage, true);
            $transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
            imagefilledrectangle($newImage, 0, 0, $newWidth, $newHeight, $transparent);
        }

        // Resize
        imagecopyresampled(
            $newImage, $sourceImage,
            0, 0, 0, 0,
            $newWidth, $newHeight,
            $originalWidth, $originalHeight
        );

        // Save
        $outputPath = $this->uploadPath . $outputFilename;
        $success = match ($imageType) {
            IMAGETYPE_JPEG => imagejpeg($newImage, $outputPath, 90),
            IMAGETYPE_PNG => imagepng($newImage, $outputPath, 9),
            IMAGETYPE_GIF => imagegif($newImage, $outputPath),
            IMAGETYPE_WEBP => imagewebp($newImage, $outputPath, 90),
            default => false
        };

        // Cleanup
        imagedestroy($sourceImage);
        imagedestroy($newImage);

        return $success ? $outputPath : false;
    }

    /**
     * Delete media and all variants
     */
    public function delete(int $mediaId): bool
    {
        $media = $this->mediaModel->find($mediaId);
        if (!$media) {
            return false;
        }

        // Delete original file
        $originalPath = $this->uploadPath . $media->filename;
        if (file_exists($originalPath)) {
            unlink($originalPath);
        }

        // Delete variants
        $variants = json_decode($media->variants, true);
        if ($variants) {
            foreach ($variants as $variantPath) {
                $fullPath = BASE_PATH . '/public' . $variantPath;
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }
        }

        // Delete database record
        return $this->mediaModel->delete($mediaId);
    }

    /**
     * Get media URL
     */
    public function getUrl(int $mediaId, string $size = 'original'): ?string
    {
        $media = $this->mediaModel->find($mediaId);
        if (!$media) {
            return null;
        }

        if ($size === 'original') {
            return $media->original_path;
        }

        $variants = json_decode($media->variants, true);
        return $variants[$size] ?? $media->original_path;
    }
}
