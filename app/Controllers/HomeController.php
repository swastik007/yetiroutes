<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Route;

class HomeController extends Controller
{
    /**
     * Frontend homepage
     */
    public function index(): void
    {
        $routeModel = new Route();
        $featuredRoutes = $routeModel->getFeatured(6);

        $this->view('frontend.home', [
            'featured_routes' => $featuredRoutes
        ]);
    }
}
