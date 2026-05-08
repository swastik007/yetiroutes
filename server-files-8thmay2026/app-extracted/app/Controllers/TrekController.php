<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Route;
use App\Services\TranslationService;

/**
 * Frontend Trek Controller
 * Handles public-facing trek pages
 */
class TrekController extends Controller
{
    private Route $routeModel;

    public function __construct()
    {
        $this->routeModel = new Route();
    }

    /**
     * Trek listing page with filters (Treks & Expeditions)
     */
    public function index(): void
    {
        // Get filter parameters
        $filters = [
            'region' => $_GET['region'] ?? '',
            'difficulty' => $_GET['difficulty'] ?? '',
            'max_days' => $_GET['duration'] ?? '',
            'search' => $_GET['search'] ?? '',
            'types' => ['trek', 'expedition']
        ];

        // Get page
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perPage = 12;

        // Search routes
        $allRoutes = $this->routeModel->search($filters);
        $total = count($allRoutes);
        $totalPages = ceil($total / $perPage);

        // Paginate
        $offset = ($page - 1) * $perPage;
        $routes = array_slice($allRoutes, $offset, $perPage);

        $this->view('frontend.treks', [
            'routes' => $routes,
            'total_routes' => $total,
            'current_page' => $page,
            'total_pages' => $totalPages,
            'filters' => $filters,
            'page_title' => 'Trekking & Expeditions'
        ]);
    }

    /**
     * Tour listing page (Tours & Day Trips)
     */
    public function tours(): void
    {
        // Get filter parameters
        $filters = [
            'region' => $_GET['region'] ?? '',
            'difficulty' => $_GET['difficulty'] ?? '',
            'max_days' => $_GET['duration'] ?? '',
            'search' => $_GET['search'] ?? '',
            'types' => ['tour', 'day_trip']
        ];

        // Get page
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perPage = 12;

        // Search routes
        $allRoutes = $this->routeModel->search($filters);
        $total = count($allRoutes);
        $totalPages = ceil($total / $perPage);

        // Paginate
        $offset = ($page - 1) * $perPage;
        $routes = array_slice($allRoutes, $offset, $perPage);

        $this->view('frontend.tours', [
            'routes' => $routes,
            'total_routes' => $total,
            'current_page' => $page,
            'total_pages' => $totalPages,
            'filters' => $filters,
            'page_title' => 'Tours & Day Trips'
        ]);
    }

    /**
     * Trek detail page
     */
    public function show(): void
    {
        // Get slug from URL (you'll need to implement slug routing)
        $slug = $_GET['slug'] ?? '';

        if (empty($slug)) {
            $this->redirect('/treks');
        }

        // Get route by slug
        $route = $this->routeModel->findBySlug($slug);

        if (!$route) {
            http_response_code(404);
            die("Trek not found");
        }

        // Get itinerary
        $details = $this->routeModel->getWithItinerary($route->id);

        // Get departures
        $sql = "SELECT * FROM departures
                WHERE route_id = :route_id
                AND start_date >= CURDATE()
                AND seats_booked < seats_total
                ORDER BY start_date ASC
                LIMIT 10";

        $stmt = $this->routeModel->query($sql, ['route_id' => $route->id]);
        $departures = $stmt;

        // Track view (for analytics)
        $this->trackView($route->id);

        // Track view (for analytics)
        $this->trackView($route->id);

        // Multi-language Translation
        $lang = $_GET['lang'] ?? 'en';
        if ($lang !== 'en') {
            $translator = new \App\Services\TranslationService($lang);
            // Translate main route details
            $details['route'] = $translator->translate($details['route'], 'route');

            // Translate itinerary items (if translations exist)
            // Note: Schema supports translations for any entity_type
            // We assume itinerary uses 'route_itinerary' or similar, but for now let's just stick to route as per request
        }

        $this->view('frontend.trek-detail', [
            'route' => $details['route'],
            'itinerary' => $details['itinerary'],
            'departures' => $departures
        ]);
    }

    /**
     * Track trek view for analytics
     */
    private function trackView(int $routeId): void
    {
        $userId = $_SESSION['user_id'] ?? null;
        $sessionId = session_id();

        $sql = "INSERT INTO user_view_history (user_id, session_id, route_id)
                VALUES (:user_id, :session_id, :route_id)";

        try {
            $this->routeModel->query($sql, [
                'user_id' => $userId,
                'session_id' => $sessionId,
                'route_id' => $routeId
            ]);
        } catch (\Exception $e) {
            // Silent fail - analytics shouldn't break the page
            error_log("View tracking error: " . $e->getMessage());
        }
    }

    /**
     * Region-specific listing
     */
    public function region(): void
    {
        $region = $_GET['region'] ?? '';

        $filters = ['region' => $region];
        $routes = $this->routeModel->search($filters);

        $this->view('frontend.treks', [
            'routes' => $routes,
            'total_routes' => count($routes),
            'page_title' => ucfirst($region) . ' Region Treks',
            'filters' => $filters
        ]);
    }
}
