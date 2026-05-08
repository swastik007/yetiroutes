<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Inquiry;

/**
 * Contact Controller
 * Handles contact form submissions and inquiries
 */
class ContactController extends Controller
{
    private Inquiry $inquiryModel;

    public function __construct()
    {
        $this->inquiryModel = new Inquiry();
    }

    /**
     * Display contact page
     */
    public function index(): void
    {
        $this->view('frontend.contact');
    }

    /**
     * Handle contact form submission
     */
    public function submit(): void
    {
        header('Content-Type: application/json');

        // Validate CSRF token (if implemented)
        // $this->validateCsrf();

        // Validate required fields
        $errors = [];
        if (empty($_POST['name'])) {
            $errors[] = 'Name is required';
        }
        if (empty($_POST['email'])) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Valid email is required';
        }
        if (empty($_POST['message'])) {
            $errors[] = 'Message is required';
        }

        if (!empty($errors)) {
            echo json_encode([
                'success' => false,
                'message' => implode(', ', $errors)
            ]);
            return;
        }

        // Prepare inquiry data
        $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'phone' => trim($_POST['phone'] ?? ''),
            // 'nationality' removed
            'message' => trim($_POST['message']),
            'type' => 'general', // Mapped 'quick_inquiry' to 'general' as per schema
            'route_id' => null,
            'status' => 'new',
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? null,
            // 'source' and 'user_agent' removed as they don't exist in schema
        ];

        // Add optional fields as metadata
        $metadata = [];
        if (!empty($_POST['trek_interest'])) {
            $metadata['trek_interest'] = $_POST['trek_interest'];
        }
        if (!empty($_POST['travel_date'])) {
            $metadata['travel_date'] = $_POST['travel_date'];
        }
        if (!empty($_POST['group_size'])) {
            $metadata['group_size'] = $_POST['group_size'];
        }

        if (!empty($metadata)) {
            $data['metadata'] = json_encode($metadata);
        }

        // Save inquiry
        try {
            $inquiryId = $this->inquiryModel->create($data);

            if ($inquiryId) {
                // Send notification email (optional)
                $this->sendNotificationEmail($data, $metadata);

                // Log successful inquiry
                error_log("New inquiry received: ID {$inquiryId} from {$data['email']}");

                echo json_encode([
                    'success' => true,
                    'message' => 'Thank you for your inquiry! We will get back to you within 24 hours.',
                    'inquiry_id' => $inquiryId
                ]);
            } else {
                throw new \Exception('Failed to save inquiry');
            }
        } catch (\Exception $e) {
            error_log("Contact form error: " . $e->getMessage());

            echo json_encode([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Send notification email to admin
     */
    private function sendNotificationEmail(array $data, array $metadata): void
    {
        // Email configuration
        $to = 'info@yetiroutes.com';
        $subject = 'New Contact Form Inquiry - Yeti Routes';

        $message = "New inquiry received from the website:\n\n";
        $message .= "Name: {$data['name']}\n";
        $message .= "Email: {$data['email']}\n";
        $message .= "Phone: {$data['phone']}\n";
        if (!empty($metadata['nationality'])) {
            $message .= "Nationality: {$metadata['nationality']}\n\n";
        }

        if (!empty($metadata['trek_interest'])) {
            $message .= "Trek Interest: {$metadata['trek_interest']}\n";
        }
        if (!empty($metadata['travel_date'])) {
            $message .= "Travel Date: {$metadata['travel_date']}\n";
        }
        if (!empty($metadata['group_size'])) {
            $message .= "Group Size: {$metadata['group_size']}\n";
        }

        $message .= "\nMessage:\n{$data['message']}\n\n";
        $message .= "---\nIP: {$data['ip_address']}\n";
        $message .= "Time: " . date('Y-m-d H:i:s');

        $headers = "From: noreply@yetiroutes.com\r\n";
        $headers .= "Reply-To: {$data['email']}\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Send email (silent fail if mail server not configured)
        @mail($to, $subject, $message, $headers);
    }

    /**
     * Admin view for managing inquiries
     */
    public function admin(): void
    {
        $this->requireAuth();

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perPage = 20;

        $filters = [
            'status' => $_GET['status'] ?? '',
            'inquiry_type' => $_GET['type'] ?? '',
            'search' => $_GET['search'] ?? ''
        ];

        $inquiries = $this->inquiryModel->getFiltered($filters, $page, $perPage);
        $total = $this->inquiryModel->countFiltered($filters);
        $totalPages = ceil($total / $perPage);

        $this->view('admin.inquiries.index', [
            'inquiries' => $inquiries,
            'total' => $total,
            'current_page' => $page,
            'total_pages' => $totalPages,
            'filters' => $filters
        ]);
    }

    /**
     * Update inquiry status
     */
    public function updateStatus(): void
    {
        $this->requireAuth();

        header('Content-Type: application/json');

        $inquiryId = $_POST['inquiry_id'] ?? null;
        $status = $_POST['status'] ?? null;

        if (!$inquiryId || !$status) {
            echo json_encode(['success' => false, 'message' => 'Missing parameters']);
            return;
        }

        // Add response note
        $note = $_POST['note'] ?? '';
        $userId = $_SESSION['user_id'] ?? null;

        $updated = $this->inquiryModel->update($inquiryId, [
            'status' => $status
            // 'responded_at' => ... (Columns do not exist in current schema)
        ]);

        if ($updated) {
            echo json_encode(['success' => true, 'message' => 'Status updated']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update']);
        }
    }
}
