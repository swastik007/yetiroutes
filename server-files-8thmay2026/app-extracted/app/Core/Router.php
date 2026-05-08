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

        // Multi-language: Detect and strip prefix
        // Usage: /fr/trek -> $_GET['lang']='fr', uri='/trek'
        $supportedLangs = ['fr', 'de'];
        $pattern = '#^/(' . implode('|', $supportedLangs) . ')(/|$)#';

        if (preg_match($pattern, $requestUri, $matches)) {
            $_GET['lang'] = $matches[1];
            // Remove the lang prefix, keeping the rest
            $requestUri = substr($requestUri, strlen($matches[1]) + 1); // +1 for slash
            $requestUri = $requestUri ?: '/';
        } else {
            if (!isset($_GET['lang'])) {
                $_GET['lang'] = 'en';
            }
        }

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
        $this->get('/admin/routes/edit', 'RouteController', 'edit');
        $this->post('/admin/routes/update', 'RouteController', 'update');
        $this->post('/admin/routes/delete', 'RouteController', 'delete');

        // Users Management
        $this->get('/admin/users', 'UserController', 'index');

        // Bookings Management
        $this->get('/admin/bookings', 'BookingController', 'index');

        // Locations Management
        $this->get('/admin/locations', 'LocationController', 'index');
        $this->post('/admin/locations/store', 'LocationController', 'store');

        // Blog Management
        $this->get('/admin/blog', 'BlogController', 'index');
        $this->get('/admin/blog/create', 'BlogController', 'create');
        $this->post('/admin/blog/store', 'BlogController', 'store');
        $this->get('/admin/blog/edit', 'BlogController', 'edit');
        $this->post('/admin/blog/update', 'BlogController', 'update');
        $this->post('/admin/blog/delete', 'BlogController', 'delete');

        // Media Library
        $this->get('/admin/media', 'MediaController', 'index');
        $this->post('/admin/media/upload', 'MediaController', 'upload');
        $this->post('/admin/media/delete', 'MediaController', 'delete');

        // Activities Management
        $this->get('/admin/activities', 'ActivityController', 'adminIndex');
        $this->get('/admin/activities/create', 'ActivityController', 'adminCreate');
        $this->post('/admin/activities/store', 'ActivityController', 'adminStore');
        $this->get('/admin/activities/edit', 'ActivityController', 'adminEdit');
        $this->post('/admin/activities/update', 'ActivityController', 'adminUpdate');
        $this->post('/admin/activities/delete', 'ActivityController', 'adminDelete');
        $this->post('/admin/activities/toggle-featured', 'ActivityController', 'adminToggleFeatured');
        $this->post('/admin/activities/toggle-active', 'ActivityController', 'adminToggleActive');

        // ============================================
        // CHAT ROUTES - ADMIN
        // ============================================
        $this->get('/admin/chat', 'ChatController', 'adminList');
        $this->get('/admin/chat/conversations', 'ChatController', 'adminConversations');
        $this->get('/admin/chat/conversation', 'ChatController', 'adminConversation');
        $this->post('/admin/chat/reply', 'ChatController', 'adminReply');
        $this->post('/admin/chat/mark-read', 'ChatController', 'adminMarkRead');
        $this->post('/admin/chat/resolve', 'ChatController', 'adminResolve');


        // ============================================
        // FRONTEND ROUTES
        // ============================================

        // Sitemap
        $this->get('/sitemap.xml', 'SitemapController', 'index');

        // Homepage
        $this->get('/', 'HomeController', 'index');

        // Trek Listing & Detail
        $this->get('/treks', 'TrekController', 'index');
        $this->get('/tours', 'TrekController', 'tours');
        $this->get('/trek', 'TrekController', 'show'); // /trek?slug=everest-base-camp

        // Region-specific
        $this->get('/treks/everest', 'TrekController', 'region');
        $this->get('/treks/annapurna', 'TrekController', 'region');
        $this->get('/treks/langtang', 'TrekController', 'region');
        $this->get('/treks/manaslu', 'TrekController', 'region');

        // Activities
        $this->get('/activities', 'ActivityController', 'index');
        $this->get('/activity', 'ActivityController', 'show'); // /activity?slug=mountain-cycling

        // Static Pages
        $this->get('/about', 'PageController', 'about');
        $this->get('/guides', 'PageController', 'guides');
        $this->get('/contact', 'ContactController', 'index');
        $this->post('/contact/submit', 'ContactController', 'submit');

        // Admin: Inquiries Management
        $this->get('/admin/inquiries', 'ContactController', 'admin');
        $this->post('/admin/inquiries/update-status', 'ContactController', 'updateStatus');

        // Blog
        $this->get('/blog', 'BlogController', 'frontendIndex');
        $this->get('/blog/article', 'BlogController', 'show'); // /blog/article?slug=post-slug
        $this->post('/blog/track-view', 'BlogController', 'trackView');

        // Travel Info
        $this->get('/travel-info', 'PageController', 'travelInfo');

        // Policy Pages
        $this->get('/terms', 'PageController', 'terms');
        $this->get('/privacy', 'PageController', 'privacy');
        $this->get('/refund-policy', 'PageController', 'refund');
        $this->get('/cancellation-policy', 'PageController', 'cancellation');

        // ============================================
        // CHAT ROUTES - FRONTEND (API)
        // ============================================
        $this->post('/chat/start', 'ChatController', 'start');
        $this->post('/chat/send', 'ChatController', 'send');
        $this->get('/chat/messages', 'ChatController', 'getMessages');
        $this->post('/chat/end', 'ChatController', 'end');
        $this->get('/chat/debug', 'ChatController', 'debug');
    }
}
