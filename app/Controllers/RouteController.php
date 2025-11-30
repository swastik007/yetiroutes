<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Route;
use App\Models\Location;

class RouteController extends Controller
{
    private Route $routeModel;
    private Location $locationModel;

    public function __construct()
    {
        $this->routeModel = new Route();
        $this->locationModel = new Location();
    }

    /**
     * List all routes
     */
    public function index(): void
    {
        $this->requireAuth();

        $page = $_GET['page'] ?? 1;
        $routes = $this->routeModel->paginate(20, (int)$page);

        $this->view('admin.routes.index', [
            'routes' => $routes,
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Show create route form
     */
    public function create(): void
    {
        $this->requireAuth();

        $locations = $this->locationModel->all();

        $this->view('admin.routes.create', [
            'locations' => $locations,
            'csrf_token' => $this->generateCsrf(),
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Store new route
     */
    public function store(): void
    {
        $this->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/routes/create');
        }

        $data = [
            'location_id' => $_POST['location_id'] ?? 0,
            'title' => $_POST['title'] ?? '',
            'slug' => $this->generateSlug($_POST['title'] ?? ''),
            'difficulty' => $_POST['difficulty'] ?? 'moderate',
            'duration_days' => $_POST['duration_days'] ?? 0,
            'max_altitude_meters' => $_POST['max_altitude_meters'] ?? null,
            'best_season' => $_POST['best_season'] ?? '',
            'terrain_type' => $_POST['terrain_type'] ?? 'mixed',
            'fitness_score_required' => $_POST['fitness_score_required'] ?? 5,
            'base_price' => $_POST['base_price'] ?? 0,
            'currency' => $_POST['currency'] ?? 'USD',
            'short_description' => $_POST['short_description'] ?? '',
            'full_description' => $_POST['full_description'] ?? '',
            'highlights' => json_encode($_POST['highlights'] ?? []),
            'inclusions' => json_encode($_POST['inclusions'] ?? []),
            'exclusions' => json_encode($_POST['exclusions'] ?? []),
            'is_featured' => isset($_POST['is_featured']) ? 1 : 0,
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
            'meta_title' => $_POST['meta_title'] ?? '',
            'meta_description' => $_POST['meta_description'] ?? ''
        ];

        $routeId = $this->routeModel->create($data);

        if ($routeId) {
            $_SESSION['success'] = 'Route created successfully!';
            $this->redirect('/admin/routes');
        } else {
            $_SESSION['error'] = 'Failed to create route';
            $this->redirect('/admin/routes/create');
        }
    }

    /**
     * Show edit route form
     */
    public function edit(): void
    {
        $this->requireAuth();

        $id = $_GET['id'] ?? 0;
        $route = $this->routeModel->find((int)$id);

        if (!$route) {
            $_SESSION['error'] = 'Route not found';
            $this->redirect('/admin/routes');
        }

        $locations = $this->locationModel->all();

        $this->view('admin.routes.edit', [
            'route' => $route,
            'locations' => $locations,
            'csrf_token' => $this->generateCsrf(),
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Update route
     */
    public function update(): void
    {
        $this->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/routes');
        }

        $id = $_POST['id'] ?? 0;

        $data = [
            'location_id' => $_POST['location_id'] ?? 0,
            'title' => $_POST['title'] ?? '',
            'difficulty' => $_POST['difficulty'] ?? 'moderate',
            'duration_days' => $_POST['duration_days'] ?? 0,
            'max_altitude_meters' => $_POST['max_altitude_meters'] ?? null,
            'best_season' => $_POST['best_season'] ?? '',
            'base_price' => $_POST['base_price'] ?? 0,
            'short_description' => $_POST['short_description'] ?? '',
            'full_description' => $_POST['full_description'] ?? '',
            'is_featured' => isset($_POST['is_featured']) ? 1 : 0,
            'is_active' => isset($_POST['is_active']) ? 1 : 0
        ];

        if ($this->routeModel->update((int)$id, $data)) {
            $_SESSION['success'] = 'Route updated successfully!';
        } else {
            $_SESSION['error'] = 'Failed to update route';
        }

        $this->redirect('/admin/routes');
    }

    /**
     * Delete route
     */
    public function delete(): void
    {
        $this->requireAuth();

        $id = $_POST['id'] ?? 0;

        if ($this->routeModel->delete((int)$id)) {
            $_SESSION['success'] = 'Route deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete route';
        }

        $this->redirect('/admin/routes');
    }

    /**
     * Generate slug from title
     */
    private function generateSlug(string $title): string
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        return $slug;
    }
}
