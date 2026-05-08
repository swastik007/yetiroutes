<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Location;

class LocationController extends Controller
{
    private Location $locationModel;

    public function __construct()
    {
        $this->locationModel = new Location();
    }

    /**
     * List all locations
     */
    public function index(): void
    {
        $this->requireAuth();

        $locations = $this->locationModel->getAllWithParent();

        $this->view('admin.locations.index', [
            'locations' => $locations,
            'csrf_token' => $this->generateCsrf(),
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Store new location
     */
    public function store(): void
    {
        $this->requireAuth();

        $data = [
            'name' => $_POST['name'] ?? '',
            'slug' => $this->generateSlug($_POST['name'] ?? ''),
            'parent_id' => $_POST['parent_id'] ?? null,
            'latitude' => $_POST['latitude'] ?? null,
            'longitude' => $_POST['longitude'] ?? null,
            'meta_title' => $_POST['meta_title'] ?? '',
            'meta_description' => $_POST['meta_description'] ?? ''
        ];

        if ($this->locationModel->create($data)) {
            $_SESSION['success'] = 'Location created successfully!';
        } else {
            $_SESSION['error'] = 'Failed to create location';
        }

        $this->redirect('/admin/locations');
    }

    private function generateSlug(string $name): string
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    }
}
