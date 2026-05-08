<?php

declare(strict_types=1);

/**
 * Yeti Routes - Main Entry Point
 * Frontend: public/index.php
 */

session_start();

// Error Reporting (Development Mode)
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Base Path
define('BASE_PATH', dirname(__DIR__));

// Load Configuration & Autoloader
require_once BASE_PATH . '/config/config.php';
require_once BASE_PATH . '/app/Core/Autoloader.php';

// Initialize Autoloader
App\Core\Autoloader::register();

// Initialize Router
$router = new App\Core\Router();

// Test Database Connection
try {
    $db = App\Core\Database::getInstance()->getConnection();
} catch (PDOException $e) {
    die("Database connection failed. Please check configuration.");
}

// Route the request
$router->dispatch();