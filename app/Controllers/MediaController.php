<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Media;

class MediaController extends Controller
{
    private Media $mediaModel;

    public function __construct()
    {
        $this->mediaModel = new Media();
    }

    /**
     * Media library index
     */
    public function index(): void
    {
        $this->requireAuth();

        $page = $_GET['page'] ?? 1;
        $media = $this->mediaModel->getAllWithUploader();

        $this->view('admin.media.index', [
            'media' => $media,
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Upload media
     */
    public function upload(): void
    {
        $this->requireAuth();

        header('Content-Type: application/json');

        // Debug: Log what we received
        error_log('FILES structure: ' . print_r($_FILES, true));

        // Check if files were uploaded
        if (!isset($_FILES['files'])) {
            echo json_encode([
                'success' => false,
                'message' => 'No files parameter found',
                'debug' => array_keys($_FILES)
            ]);
            exit;
        }

        // Check if it's an array structure
        if (empty($_FILES['files']['name'][0])) {
            echo json_encode([
                'success' => false,
                'message' => 'Files array is empty',
                'debug' => $_FILES['files']
            ]);
            exit;
        }

        $uploadedFiles = [];
        $errors = [];

        // Create upload directory if it doesn't exist
        $uploadDir = 'uploads/media/';
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Failed to create upload directory',
                    'errors' => ['Directory creation failed']
                ]);
                exit;
            }
        }

        // Check if directory is writable
        if (!is_writable($uploadDir)) {
            echo json_encode([
                'success' => false,
                'message' => 'Upload directory is not writable',
                'errors' => ['Directory: ' . realpath($uploadDir) . ' is not writable']
            ]);
            exit;
        }

        // Process each file
        $fileCount = count($_FILES['files']['name']);
        for ($i = 0; $i < $fileCount; $i++) {
            $originalName = $_FILES['files']['name'][$i] ?? 'unknown';
            $errorCode = $_FILES['files']['error'][$i];

            if ($errorCode === UPLOAD_ERR_OK) {
                $tmpName = $_FILES['files']['tmp_name'][$i];
                $fileSize = $_FILES['files']['size'][$i];
                $mimeType = $_FILES['files']['type'][$i];

                // Validate file type
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/jpg', 'application/pdf'];
                if (!in_array($mimeType, $allowedTypes)) {
                    $errors[] = "$originalName: Invalid file type ($mimeType)";
                    continue;
                }

                // Validate file size (5MB max)
                if ($fileSize > 5 * 1024 * 1024) {
                    $errors[] = "$originalName: File too large (max 5MB)";
                    continue;
                }

                // Generate unique filename
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $filePath = $uploadDir . $filename;

                // Move uploaded file
                if (move_uploaded_file($tmpName, $filePath)) {
                    // Get image dimensions if it's an image
                    $width = null;
                    $height = null;
                    if (str_starts_with($mimeType, 'image/')) {
                        $imageInfo = @getimagesize($filePath);
                        if ($imageInfo) {
                            $width = $imageInfo[0];
                            $height = $imageInfo[1];
                        }
                    }

                    // Save to database (matching existing schema)
                    // variants is a JSON field, so we need to encode it
                    $variants = json_encode([
                        'original' => '/' . $filePath,
                        'thumbnail' => '/' . $filePath, // Can be different later
                        'medium' => '/' . $filePath,     // Can be different later
                    ]);

                    $mediaData = [
                        'filename' => $filename,
                        'original_path' => $originalName,
                        'variants' => $variants,
                        'mime_type' => $mimeType,
                        'alt_text' => $originalName,
                        'uploaded_by' => $_SESSION['user_id'] ?? null,
                        'visibility' => 'public'
                    ];

                    // Log what we're about to insert
                    error_log("Attempting to insert media: " . print_r($mediaData, true));

                    $mediaId = $this->mediaModel->create($mediaData);

                    if ($mediaId) {
                        $uploadedFiles[] = [
                            'id' => $mediaId,
                            'filename' => $filename,
                            'original_filename' => $originalName,
                            'url' => '/' . $filePath,
                            'size' => $fileSize
                        ];
                    } else {
                        $errors[] = "$originalName: Database insert failed - check PHP error log for details";
                        error_log("Failed to insert media record for: $originalName");
                    }
                } else {
                    $errors[] = "$originalName: Failed to move uploaded file from $tmpName to $filePath";
                }
            } else {
                // Map error codes to readable messages
                $errorMessages = [
                    UPLOAD_ERR_INI_SIZE => 'File exceeds upload_max_filesize',
                    UPLOAD_ERR_FORM_SIZE => 'File exceeds MAX_FILE_SIZE',
                    UPLOAD_ERR_PARTIAL => 'File was only partially uploaded',
                    UPLOAD_ERR_NO_FILE => 'No file was uploaded',
                    UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder',
                    UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
                    UPLOAD_ERR_EXTENSION => 'Upload stopped by extension'
                ];
                $errorMsg = $errorMessages[$errorCode] ?? "Unknown error code: $errorCode";
                $errors[] = "$originalName: $errorMsg";
            }
        }

        echo json_encode([
            'success' => count($uploadedFiles) > 0,
            'message' => count($uploadedFiles) . ' file(s) uploaded successfully',
            'files' => $uploadedFiles,
            'errors' => $errors
        ]);
        exit;
    }

    /**
     * Delete media
     */
    public function delete(): void
    {
        $this->requireAuth();

        $mediaId = $_POST['id'] ?? 0;

        $mediaService = new \App\Services\MediaService();
        if ($mediaService->delete((int)$mediaId)) {
            $this->json(['success' => true, 'message' => 'Media deleted']);
        } else {
            $this->json(['success' => false, 'message' => 'Delete failed'], 500);
        }
    }
}
