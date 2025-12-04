<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Activity;

class ActivityController extends Controller
{
    private Activity $activityModel;

    public function __construct()
    {
        $this->activityModel = new Activity();
    }

    /**
     * Frontend: Activities listing page
     */
    public function index(): void
    {
        $activities = $this->activityModel->getAllActive();

        $this->view('frontend.activities.index', [
            'activities' => $activities,
            'pageTitle' => 'Activities',
            'metaDescription' => 'Explore our range of adventure activities in Nepal. From meditation tours to bungee jumping, find your perfect adventure.'
        ]);
    }

    /**
     * Frontend: Activity details page
     */
    public function show(): void
    {
        $slug = $_GET['slug'] ?? '';

        if (empty($slug)) {
            header('Location: /activities');
            exit;
        }

        $activity = $this->activityModel->findBySlug($slug);

        if (!$activity) {
            header('Location: /activities');
            exit;
        }

        // Decode JSON fields
        $activity->highlights = json_decode($activity->highlights ?? '[]');
        $activity->inclusions = json_decode($activity->inclusions ?? '[]');
        $activity->exclusions = json_decode($activity->exclusions ?? '[]');

        // Get related activities
        $relatedActivities = $this->activityModel->getAllActive(4);

        $this->view('frontend.activities.show', [
            'activity' => $activity,
            'related_activities' => $relatedActivities,
            'pageTitle' => $activity->title,
            'metaDescription' => $activity->meta_description ?? $activity->short_description
        ]);
    }

    /**
     * Admin: List all activities
     */
    public function adminIndex(): void
    {
        $this->requireAuth();

        $activities = $this->activityModel->getAllForAdmin();

        $this->view('admin.activities.index', [
            'activities' => $activities
        ]);
    }

    /**
     * Admin: Show create form
     */
    public function adminCreate(): void
    {
        $this->requireAuth();

        $this->view('admin.activities.create');
    }

    /**
     * Admin: Store new activity
     */
    public function adminStore(): void
    {
        $this->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /admin/activities');
            exit;
        }

        $data = [
            'title' => $_POST['title'] ?? '',
            'slug' => $this->generateSlug($_POST['title'] ?? ''),
            'icon_class' => $_POST['icon_class'] ?? '',
            'short_description' => $_POST['short_description'] ?? '',
            'full_description' => $_POST['full_description'] ?? '',
            'duration' => $_POST['duration'] ?? '',
            'difficulty' => $_POST['difficulty'] ?? 'moderate',
            'price_from' => $_POST['price_from'] ?? null,
            'currency' => $_POST['currency'] ?? 'USD',
            'best_season' => $_POST['best_season'] ?? '',
            'group_size_min' => $_POST['group_size_min'] ?? 1,
            'group_size_max' => $_POST['group_size_max'] ?? 20,
            'highlights' => json_encode(array_filter($_POST['highlights'] ?? [])),
            'inclusions' => json_encode(array_filter($_POST['inclusions'] ?? [])),
            'exclusions' => json_encode(array_filter($_POST['exclusions'] ?? [])),
            'requirements' => $_POST['requirements'] ?? '',
            'location' => $_POST['location'] ?? '',
            'is_featured' => isset($_POST['is_featured']) ? 1 : 0,
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
            'display_order' => $_POST['display_order'] ?? 0,
            'meta_title' => $_POST['meta_title'] ?? '',
            'meta_description' => $_POST['meta_description'] ?? ''
        ];

        $id = $this->activityModel->create($data);

        if ($id) {
            $_SESSION['success'] = 'Activity created successfully!';
        } else {
            $_SESSION['error'] = 'Failed to create activity.';
        }

        header('Location: /admin/activities');
        exit;
    }

    /**
     * Admin: Show edit form
     */
    public function adminEdit(): void
    {
        $this->requireAuth();

        $id = $_GET['id'] ?? 0;
        $activity = $this->activityModel->find($id);

        if (!$activity) {
            header('Location: /admin/activities');
            exit;
        }

        // Decode JSON fields
        $activity->highlights = json_decode($activity->highlights ?? '[]');
        $activity->inclusions = json_decode($activity->inclusions ?? '[]');
        $activity->exclusions = json_decode($activity->exclusions ?? '[]');

        $this->view('admin.activities.edit', [
            'activity' => $activity
        ]);
    }

    /**
     * Admin: Update activity
     */
    public function adminUpdate(): void
    {
        $this->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /admin/activities');
            exit;
        }

        $id = $_POST['id'] ?? 0;

        $data = [
            'title' => $_POST['title'] ?? '',
            'slug' => $this->generateSlug($_POST['title'] ?? ''),
            'icon_class' => $_POST['icon_class'] ?? '',
            'short_description' => $_POST['short_description'] ?? '',
            'full_description' => $_POST['full_description'] ?? '',
            'duration' => $_POST['duration'] ?? '',
            'difficulty' => $_POST['difficulty'] ?? 'moderate',
            'price_from' => $_POST['price_from'] ?? null,
            'currency' => $_POST['currency'] ?? 'USD',
            'best_season' => $_POST['best_season'] ?? '',
            'group_size_min' => $_POST['group_size_min'] ?? 1,
            'group_size_max' => $_POST['group_size_max'] ?? 20,
            'highlights' => json_encode(array_filter($_POST['highlights'] ?? [])),
            'inclusions' => json_encode(array_filter($_POST['inclusions'] ?? [])),
            'exclusions' => json_encode(array_filter($_POST['exclusions'] ?? [])),
            'requirements' => $_POST['requirements'] ?? '',
            'location' => $_POST['location'] ?? '',
            'is_featured' => isset($_POST['is_featured']) ? 1 : 0,
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
            'display_order' => $_POST['display_order'] ?? 0,
            'meta_title' => $_POST['meta_title'] ?? '',
            'meta_description' => $_POST['meta_description'] ?? ''
        ];

        $success = $this->activityModel->update($id, $data);

        if ($success) {
            $_SESSION['success'] = 'Activity updated successfully!';
        } else {
            $_SESSION['error'] = 'Failed to update activity.';
        }

        header('Location: /admin/activities');
        exit;
    }

    /**
     * Admin: Delete activity
     */
    public function adminDelete(): void
    {
        $this->requireAuth();

        $id = $_POST['id'] ?? 0;

        $success = $this->activityModel->delete($id);

        if ($success) {
            $_SESSION['success'] = 'Activity deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete activity.';
        }

        header('Location: /admin/activities');
        exit;
    }

    /**
     * Admin: Toggle featured status
     */
    public function adminToggleFeatured(): void
    {
        $this->requireAuth();

        $id = $_POST['id'] ?? 0;
        $this->activityModel->toggleFeatured($id);

        header('Location: /admin/activities');
        exit;
    }

    /**
     * Admin: Toggle active status
     */
    public function adminToggleActive(): void
    {
        $this->requireAuth();

        $id = $_POST['id'] ?? 0;
        $this->activityModel->toggleActive($id);

        header('Location: /admin/activities');
        exit;
    }

    /**
     * Helper: Generate slug from title
     */
    private function generateSlug(string $title): string
    {
        $slug = strtolower(trim($title));
        $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        return trim($slug, '-');
    }

    /**
     * Helper: Check if user is authenticated
     */
    private function requireAuth(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
    }
}
