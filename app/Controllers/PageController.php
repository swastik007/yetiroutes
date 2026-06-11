<?php

namespace App\Controllers;

use App\Core\Controller;

class PageController extends Controller
{
    /**
     * About Us Page
     */
    public function about(): void
    {
        $this->view('frontend.about', [
            'page_title' => 'About Us - Yeti Routes'
        ]);
    }

    /**
     * Meet Our Guides Page
     */
    public function guides(): void
    {
        $this->view('frontend.guides', [
            'page_title' => 'Meet Our Guides - Yeti Routes'
        ]);
    }

    /**
     * Travel Information Hub
     */
    public function travelInfo(): void
    {
        $this->view('frontend.travel-info', [
            'page_title' => 'Travel Information - Yeti Routes'
        ]);
    }

    /**
     * Terms & Conditions
     */
    public function terms(): void
    {
        $this->view('frontend.terms', [
            'page_title' => 'Terms & Conditions - Yeti Routes'
        ]);
    }

    /**
     * Privacy Policy
     */
    public function privacy(): void
    {
        $this->view('frontend.privacy', [
            'page_title' => 'Privacy Policy - Yeti Routes'
        ]);
    }

    /**
     * Refund Policy
     */
    public function refund(): void
    {
        $this->view('frontend.refund', [
            'page_title' => 'Refund Policy - Yeti Routes'
        ]);
    }

    /**
     * Cancellation Policy
     */
    public function cancellation(): void
    {
        $this->view('frontend.cancellation', [
            'page_title' => 'Cancellation Policy - Yeti Routes'
        ]);
    }

    /**
     * Trekking in Nepal - SEO Pillar Page
     */
    public function trekkingNepal(): void
    {
        $this->view('frontend.trekking-nepal', [
            'page_title' => 'Trekking in Nepal - Complete Guide 2026 | Yeti Routes',
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => '/'],
                ['name' => 'Trekking in Nepal', 'url' => '/trekking-in-nepal'],
            ],
        ]);
    }
}
