<?php

namespace App\Core;

/**
 * Simple Router for Yeti Routes
 */
class Router
{
    private array $routes = [];
    private string $basePath = '';

    public function __construct()
    {
        $this->basePath = dirname($_SERVER['SCRIPT_NAME']);
    }

    /**
     * Add a GET route
     */
    public function get(string $path, string $controller, string $method): void
    {
        $this->addRoute('GET', $path, $controller, $method);
    }

    /**
     * Add a POST route
     */
    public function post(string $path, string $controller, string $method): void
    {
        $this->addRoute('POST', $path, $controller, $method);
    }

    /**
     * Add a route
     */
    private function addRoute(string $httpMethod, string $path, string $controller, string $method): void
    {
        $this->routes[] = [
            'method' => $httpMethod,
            'path' => $path,
            'controller' => $controller,
            'action' => $method
        ];
    }

    /**
     * Dispatch the request
     */
    public function dispatch(): void
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // Remove query string and base path
        $requestUri = strtok($requestUri, '?');
        if ($this->basePath && strpos($requestUri, $this->basePath) === 0) {
            $requestUri = substr($requestUri, strlen($this->basePath));
        }
        $requestUri = $requestUri ?: '/';

        // Load routes configuration
        $this->loadRoutes();

        // Match route
        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $this->matchPath($route['path'], $requestUri)) {
                $this->callController($route['controller'], $route['action']);
                return;
            }
        }

        // No route matched - 404
        http_response_code(404);
        echo "404 - Page Not Found";
    }

    /**
     * Match path with wildcards
     */
    private function matchPath(string $routePath, string $requestUri): bool
    {
        // Simple exact match for now
        // TODO: Add support for parameters like /route/{id}
        return $routePath === $requestUri;
    }

    /**
     * Call controller method
     */
    private function callController(string $controller, string $method): void
    {
        $controllerClass = "App\\Controllers\\{$controller}";

        if (!class_exists($controllerClass)) {
            die("Controller {$controllerClass} not found");
        }

        $controllerInstance = new $controllerClass();

        if (!method_exists($controllerInstance, $method)) {
            die("Method {$method} not found in {$controllerClass}");
        }

        $controllerInstance->$method();
    }

    /**
     * Load routes from configuration
     */
    private function loadRoutes(): void
    {
        // Admin Routes
        $this->get('/admin', 'AdminController', 'dashboard');
        $this->get('/admin/login', 'AuthController', 'showLogin');
        $this->post('/admin/login', 'AuthController', 'login');
        $this->get('/admin/logout', 'AuthController', 'logout');

        // Routes Management
        $this->get('/admin/routes', 'RouteController', 'index');
        $this->get('/admin/routes/create', 'RouteController', 'create');
        $this->post('/admin/routes/store', 'RouteController', 'store');

        // Users Management
        $this->get('/admin/users', 'UserController', 'index');

        // Bookings Management
        $this->get('/admin/bookings', 'BookingController', 'index');

        // Locations Management
        $this->get('/admin/locations', 'LocationController', 'index');

        // Blog Management
        $this->get('/admin/blog', 'BlogController', 'index');

        // Media Library
        $this->get('/admin/media', 'MediaController', 'index');

        // Frontend Routes
        $this->get('/', 'HomeController', 'index');
    }
}
