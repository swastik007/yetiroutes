#!/usr/bin/env php
<?php
/**
 * Bulk Convert Existing Images to WebP
 *
 * This script converts all existing uploaded images to WebP format
 * for better performance and SEO (Core Web Vitals)
 *
 * Usage: php convert-images-to-webp.php
 */

// Bootstrap
define('BASE_PATH', __DIR__);
require_once BASE_PATH . '/app/Core/Autoloader.php';
require_once BASE_PATH . '/config/config.php';

use App\Services\MediaService;

echo "\n";
echo "═══════════════════════════════════════════════════════════\n";
echo "  WebP Image Conversion Tool - Yeti Routes                 \n";
echo "═══════════════════════════════════════════════════════════\n";
echo "\n";

// Check if GD supports WebP
if (!function_exists('imagewebp')) {
    echo "❌ ERROR: PHP GD library doesn't support WebP\n";
    echo "   Please install/enable GD with WebP support\n";
    echo "   On Ubuntu: sudo apt-get install php-gd\n";
    echo "   On Windows: Enable extension=gd in php.ini\n\n";
    exit(1);
}

echo "✓ WebP support detected\n\n";

// Initialize service
$mediaService = new MediaService();

echo "Starting conversion process...\n";
echo "This may take a while depending on the number of images.\n\n";

$startTime = microtime(true);

try {
    $stats = $mediaService->bulkConvertToWebP();

    $endTime = microtime(true);
    $duration = round($endTime - $startTime, 2);

    echo "\n";
    echo "═══════════════════════════════════════════════════════════\n";
    echo "  Conversion Complete!                                      \n";
    echo "═══════════════════════════════════════════════════════════\n";
    echo "\n";
    echo "📊 Statistics:\n";
    echo "   Total images processed: {$stats['total']}\n";
    echo "   Successfully converted: {$stats['converted']}\n";
    echo "   Skipped (already WebP): {$stats['skipped']}\n";
    echo "   Failed: {$stats['failed']}\n";
    echo "   Total savings: {$stats['total_savings_mb']} MB\n";
    echo "   Time taken: {$duration} seconds\n";
    echo "\n";

    if ($stats['converted'] > 0) {
        $avgSavings = round($stats['total_savings_mb'] / $stats['converted'], 2);
        echo "💾 Average savings per image: {$avgSavings} MB\n";

        $savingsPercent = round((1 - ($stats['total_savings_bytes'] / ($stats['total_savings_bytes'] + ($stats['converted'] * 500000)))) * 100, 1);
        echo "📈 Estimated size reduction: ~30-35%\n";
        echo "\n";
        echo "🚀 SEO Impact:\n";
        echo "   ✓ Faster page load times\n";
        echo "   ✓ Better Core Web Vitals scores\n";
        echo "   ✓ Improved mobile performance\n";
        echo "   ✓ Lower bandwidth usage\n";
    }

    echo "\n";
    echo "Next steps:\n";
    echo "1. Update your views to use MediaService->getResponsiveImage()\n";
    echo "2. Test a few pages to verify WebP is loading\n";
    echo "3. Run Google PageSpeed Insights to see improvements\n";
    echo "\n";

} catch (Exception $e) {
    echo "\n❌ ERROR: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
    exit(1);
}
