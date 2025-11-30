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
     * Upload media (using MediaService for advanced processing)
     */
    public function upload(): void
    {
        $this->requireAuth();

        if (!isset($_FILES['file'])) {
            $this->json(['success' => false, 'message' => 'No file uploaded'], 400);
        }

        $mediaService = new \App\Services\MediaService();
        $result = $mediaService->upload(
            $_FILES['file'],
            $_SESSION['user_id'],
            'public'
        );

        if ($result) {
            $this->json([
                'success' => true,
                'media_id' => $result['id'],
                'url' => $result['url'],
                'variants' => $result['variants']
            ]);
        } else {
            $this->json(['success' => false, 'message' => 'Upload failed'], 500);
        }
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
