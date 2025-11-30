<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\{User, Route, Booking, BlogPost};

class AdminController extends Controller
{
    public function __construct()
    {
        // Require authentication for all admin pages
    }

    /**
     * Admin Dashboard
     */
    public function dashboard(): void
    {
        $this->requireAuth();

        // Get statistics
        $userModel = new User();
        $routeModel = new Route();
        $bookingModel = new Booking();
        $blogModel = new BlogPost();

        $stats = [
            'total_users' => $userModel->count(),
            'total_routes' => $routeModel->count(),
            'total_bookings' => $bookingModel->count(),
            'total_blogs' => $blogModel->count(),
            'pending_bookings' => $bookingModel->count("booking_status = 'pending'"),
            'featured_routes' => $routeModel->count("is_featured = 1")
        ];

        // Recent bookings
        $recentBookings = $bookingModel->query(
            "SELECT b.*, r.title as route_title, u.full_name as customer_name
             FROM bookings b
             LEFT JOIN departures d ON b.departure_id = d.id
             LEFT JOIN routes r ON d.route_id = r.id
             LEFT JOIN users u ON b.user_id = u.id
             ORDER BY b.created_at DESC
             LIMIT 10"
        );

        $this->view('admin.dashboard', [
            'stats' => $stats,
            'recent_bookings' => $recentBookings,
            'current_user' => $this->getCurrentUser()
        ]);
    }
}
