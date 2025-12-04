<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Route;
use App\Models\Activity;

class HomeController extends Controller
{
    /**
     * Frontend homepage
     */
    public function index(): void
    {
        $routeModel = new Route();
        $activityModel = new Activity();

        // Featured Treks Section - Get featured treks (or all featured if no treks)
        $featuredRoutes = $routeModel->getFeaturedByType('trek', 8);
        if (empty($featuredRoutes)) {
            $featuredRoutes = $routeModel->getFeatured(8); // Fallback to all featured
        }

        // Most Popular Treks Section - Get all treks
        $popularTreks = $routeModel->getTreks(12);
        if (empty($popularTreks)) {
            $popularTreks = $routeModel->getFeatured(12); // Fallback to all featured
        }

        // Most Popular Tours Section - Get tours and day trips
        $tours = $routeModel->getTours(6);
        $dayTrips = $routeModel->getDayTrips(6);

        // Combine tours and day trips
        $tourRoutes = array_merge($tours, $dayTrips);

        // If still empty, fallback to all featured routes
        if (empty($tourRoutes)) {
            $tourRoutes = $routeModel->getFeatured(10);
        }

        // Activities Section - Get featured activities for homepage
        $featuredActivities = $activityModel->getFeatured(8);

        $this->view('frontend.home', [
            'featured_routes' => $featuredRoutes,
            'vacation_routes' => $popularTreks,
            'tour_routes' => $tourRoutes,
            'activities' => $featuredActivities
        ]);
    }
}
