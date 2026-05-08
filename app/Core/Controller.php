<?php

namespace App\Core;

/**
 * Base Controller Class
 */
abstract class Controller
{
    /**
     * Render a view
     */
    protected function view(string $viewPath, array $data = []): void
    {
        // Load Translations
        $lang = $_GET['lang'] ?? 'en';
        $transFile = BASE_PATH . "/app/Lang/{$lang}.php";
        $translations = [];
        if (file_exists($transFile)) {
            $translations = require $transFile;
        }

        // Merge translations into data
        // We use 'trans' key, but also extract so $trans is available directly if needed, 
        // though $data keys conflict with $trans array keys if not careful.
        // Safer to just provide $trans.
        $data['trans'] = $translations;
        $data['langPrefix'] = ($lang !== 'en') ? '/' . $lang : '';

        extract($data);

        $viewFile = BASE_PATH . '/app/Views/' . str_replace('.', '/', $viewPath) . '.php';

        if (!file_exists($viewFile)) {
            die("View {$viewPath} not found");
        }

        require_once $viewFile;
    }

    /**
     * Redirect to a URL
     */
    protected function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }

    /**
     * Return JSON response
     */
    protected function json(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Check if user is authenticated
     */
    protected function requireAuth(): void
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/admin/login');
        }
    }

    /**
     * Check if user has permission
     */
    protected function requirePermission(string $permission): void
    {
        $this->requireAuth();

        // TODO: Implement actual permission checking
        if (!$this->userHasPermission($permission)) {
            http_response_code(403);
            die("Access Denied");
        }
    }

    /**
     * Check user permission (placeholder)
     */
    private function userHasPermission(string $permission): bool
    {
        // TODO: Implement permission logic from role_permissions table
        return true;
    }

    /**
     * Get current user
     */
    protected function getCurrentUser(): ?object
    {
        if (!isset($_SESSION['user_id'])) {
            return null;
        }

        $userModel = new \App\Models\User();
        return $userModel->find($_SESSION['user_id']);
    }

    /**
     * Validate CSRF token
     */
    protected function validateCsrf(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token'] ?? '';
            return hash_equals($_SESSION['csrf_token'] ?? '', $token);
        }
        return true;
    }

    /**
     * Generate CSRF token
     */
    protected function generateCsrf(): string
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    /**
     * Flash message
     */
    protected function flash(string $key, string $message): void
    {
        $_SESSION['flash'][$key] = $message;
    }

    /**
     * Get flash message
     */
    protected function getFlash(string $key): ?string
    {
        $message = $_SESSION['flash'][$key] ?? null;
        unset($_SESSION['flash'][$key]);
        return $message;
    }
}
