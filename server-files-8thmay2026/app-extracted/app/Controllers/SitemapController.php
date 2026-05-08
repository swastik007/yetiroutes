<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Route;
use App\Models\BlogPost;

class SitemapController extends Controller
{
    /**
     * Generate XML Sitemap
     */
    public function index()
    {
        $routeModel = new Route();
        $blogModel = new BlogPost();

        // 1. Static Pages
        // Including specific travel-info subsections as requested (anchors)
        $urls = [
            '/' => ['priority' => '1.0', 'freq' => 'daily'],
            '/about' => ['priority' => '0.8', 'freq' => 'monthly'],
            '/contact' => ['priority' => '0.8', 'freq' => 'monthly'],
            '/guides' => ['priority' => '0.8', 'freq' => 'monthly'],
            '/treks' => ['priority' => '0.9', 'freq' => 'weekly'],
            '/activites' => ['priority' => '0.8', 'freq' => 'weekly'], // Assuming exists
            '/blog' => ['priority' => '0.9', 'freq' => 'weekly'],

            // Travel Info & Subsections
            '/travel-info' => ['priority' => '0.8', 'freq' => 'monthly'],
            '/travel-info#permits' => ['priority' => '0.7', 'freq' => 'monthly'],
            '/travel-info#seasons' => ['priority' => '0.7', 'freq' => 'monthly'],
            '/travel-info#packing' => ['priority' => '0.7', 'freq' => 'monthly'],
            '/travel-info#safety' => ['priority' => '0.7', 'freq' => 'monthly'],
            '/travel-info#faq' => ['priority' => '0.7', 'freq' => 'monthly'],

            // Policies
            '/terms' => ['priority' => '0.5', 'freq' => 'yearly'],
            '/privacy' => ['priority' => '0.5', 'freq' => 'yearly'],
            '/refund-policy' => ['priority' => '0.5', 'freq' => 'yearly'],
            '/cancellation-policy' => ['priority' => '0.5', 'freq' => 'yearly'],
        ];

        // 2. Fetch Dynamic Content
        // Routes (Treks, Tours, etc.)
        // Using search([]) to get all active routes
        $treks = $routeModel->search([]);

        // Blog Posts
        $posts = $blogModel->getPublished();

        // 3. Generate XML
        header("Content-Type: application/xml; charset=utf-8");
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Determine Base URL
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'yetiroutes.test';
        $baseUrl = "$protocol://$host";

        // Output Static URLs
        foreach ($urls as $path => $meta) {
            echo '<url>';
            echo '<loc>' . htmlspecialchars($baseUrl . $path) . '</loc>';
            echo '<changefreq>' . $meta['freq'] . '</changefreq>';
            echo '<priority>' . $meta['priority'] . '</priority>';
            echo '</url>';
        }

        // Output Routes
        foreach ($treks as $trek) {
            // Check if created_at exists, default to now if not
            $date = isset($trek->created_at) ? date('Y-m-d', strtotime($trek->created_at)) : date('Y-m-d');

            echo '<url>';
            echo '<loc>' . htmlspecialchars($baseUrl . '/trek?slug=' . $trek->slug) . '</loc>';
            echo '<lastmod>' . $date . '</lastmod>';
            echo '<changefreq>weekly</changefreq>';
            echo '<priority>0.8</priority>';
            echo '</url>';
        }

        // Output Blog Posts
        foreach ($posts as $post) {
            $date = isset($post->published_at) ? date('Y-m-d', strtotime($post->published_at)) : date('Y-m-d');

            echo '<url>';
            echo '<loc>' . htmlspecialchars($baseUrl . '/blog/article?slug=' . $post->slug) . '</loc>';
            echo '<lastmod>' . $date . '</lastmod>';
            echo '<changefreq>monthly</changefreq>';
            echo '<priority>0.7</priority>';
            echo '</url>';
        }

        echo '</urlset>';
    }
}
