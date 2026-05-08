<?php
/**
 * Redirect to public/ directory
 * This is a temporary fix - you should configure your web server
 * to point directly to the public/ folder
 */

// Redirect all requests to public/index.php
header('Location: /public/index.php' . ($_SERVER['REQUEST_URI'] === '/' ? '' : $_SERVER['REQUEST_URI']));
exit;
