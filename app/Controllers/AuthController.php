<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    /**
     * Show login page
     */
    public function showLogin(): void
    {
        // If already logged in, redirect to dashboard
        if (isset($_SESSION['user_id'])) {
            $this->redirect('/admin');
        }

        $this->view('auth.login', [
            'csrf_token' => $this->generateCsrf()
        ]);
    }

    /**
     * Process login
     */
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/login');
        }

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validate input
        if (empty($email) || empty($password)) {
            $_SESSION['error'] = 'Email and password are required';
            $this->redirect('/admin/login');
        }

        // Rate limiting (basic)
        $this->logLoginAttempt();

        // Verify credentials
        $user = $this->userModel->verifyPassword($email, $password);

        if (!$user) {
            $_SESSION['error'] = 'Invalid credentials';
            $this->redirect('/admin/login');
        }

        if (!$user->is_active) {
            $_SESSION['error'] = 'Account is inactive';
            $this->redirect('/admin/login');
        }

        // Create session
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->full_name;
        $_SESSION['role_id'] = $user->role_id;

        // Create user session in database
        $this->createUserSession($user->id);

        $this->redirect('/admin');
    }

    /**
     * Show registration page
     */
    public function showRegister(): void
    {
        $this->view('auth.register', [
            'csrf_token' => $this->generateCsrf()
        ]);
    }

    /**
     * Process registration
     */
    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/register');
        }

        $data = [
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? '',
            'full_name' => $_POST['full_name'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'role_id' => 1 // Default role
        ];

        // Validate
        if (empty($data['email']) || empty($data['password']) || empty($data['full_name'])) {
            $_SESSION['error'] = 'All fields are required';
            $this->redirect('/admin/register');
        }

        // Check if email exists
        if ($this->userModel->findByEmail($data['email'])) {
            $_SESSION['error'] = 'Email already exists';
            $this->redirect('/admin/register');
        }

        // Create user
        $userId = $this->userModel->createUser($data);

        if ($userId) {
            $_SESSION['success'] = 'Registration successful! Please login.';
            $this->redirect('/admin/login');
        } else {
            $_SESSION['error'] = 'Registration failed';
            $this->redirect('/admin/register');
        }
    }

    /**
     * Logout
     */
    public function logout(): void
    {
        session_destroy();
        $this->redirect('/admin/login');
    }

    /**
     * Log login attempt (rate limiting)
     */
    private function logLoginAttempt(): void
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $userModel = new User();
        $db = $userModel->query(
            "INSERT INTO login_attempts (ip_address) VALUES (:ip)",
            ['ip' => $ip]
        );
    }

    /**
     * Create user session record
     */
    private function createUserSession(int $userId): void
    {
        $sessionId = session_id();
        $ip = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

        $userModel = new User();
        $userModel->query(
            "INSERT INTO user_sessions (id, user_id, ip_address, user_agent)
             VALUES (:id, :user_id, :ip, :user_agent)
             ON DUPLICATE KEY UPDATE last_activity = CURRENT_TIMESTAMP",
            [
                'id' => $sessionId,
                'user_id' => $userId,
                'ip' => $ip,
                'user_agent' => $userAgent
            ]
        );
    }
}
