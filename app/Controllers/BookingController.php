<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    private Booking $bookingModel;

    public function __construct()
    {
        $this->bookingModel = new Booking();
    }

    /**
     * List all bookings
     */
    public function index(): void
    {
        $this->requireAuth();

        $page = $_GET['page'] ?? 1;
        $bookings = $this->bookingModel->getAllWithDetails();

        $this->view('admin.bookings.index', [
            'bookings' => $bookings,
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Show booking details
     */
    public function show(): void
    {
        $this->requireAuth();

        $id = $_GET['id'] ?? 0;
        $details = $this->bookingModel->getFullDetails((int)$id);

        if (!$details) {
            $_SESSION['error'] = 'Booking not found';
            $this->redirect('/admin/bookings');
        }

        $this->view('admin.bookings.view', [
            'booking' => $details['booking'],
            'line_items' => $details['line_items'],
            'payments' => $details['payments'],
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Update booking status
     */
    public function updateStatus(): void
    {
        $this->requireAuth();

        $id = $_POST['id'] ?? 0;
        $status = $_POST['status'] ?? '';

        $data = ['booking_status' => $status];

        if ($this->bookingModel->update((int)$id, $data)) {
            $_SESSION['success'] = 'Booking status updated!';
        } else {
            $_SESSION['error'] = 'Failed to update status';
        }

        $this->redirect('/admin/bookings');
    }
}
