<?php
// Test if tour routes are being fetched correctly
define('BASE_PATH', dirname(__DIR__));

// Load configuration
require_once BASE_PATH . '/config/config.php';

// Load Autoloader
require_once BASE_PATH . '/app/Core/Autoloader.php';
App\Core\Autoloader::register();

use App\Models\Route;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Test Tours Data</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; }
        .success { color: green; background: #e8f5e9; padding: 10px; margin: 10px 0; }
        .error { color: red; background: #ffebee; padding: 10px; margin: 10px 0; }
        pre { background: #f5f5f5; padding: 15px; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #4CAF50; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🧪 Testing Tour Routes</h1>

<?php
try {
    $routeModel = new Route();

    echo "<h2>1. Testing getTours() method</h2>";
    $tours = $routeModel->getTours(10);

    echo "<div class='success'>✅ Method executed successfully!</div>";
    echo "<p><strong>Number of tours fetched:</strong> " . count($tours) . "</p>";

    if (count($tours) > 0) {
        echo "<h3>Tour Routes Found:</h3>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Title</th><th>Route Type</th><th>Duration</th><th>Price</th><th>Active</th></tr>";

        foreach ($tours as $tour) {
            echo "<tr>";
            echo "<td>" . $tour->id . "</td>";
            echo "<td>" . htmlspecialchars($tour->title) . "</td>";
            echo "<td><strong>" . $tour->route_type . "</strong></td>";
            echo "<td>" . $tour->duration_days . " days</td>";
            echo "<td>$" . number_format($tour->base_price) . "</td>";
            echo "<td>" . ($tour->is_active ? '✅' : '❌') . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<h3>Raw Data (First Tour):</h3>";
        echo "<pre>" . print_r($tours[0], true) . "</pre>";

    } else {
        echo "<div class='error'>❌ No tours found!</div>";
        echo "<p>This could mean:</p>";
        echo "<ul>";
        echo "<li>No routes have route_type = 'tour'</li>";
        echo "<li>All tour routes have is_active = 0</li>";
        echo "</ul>";
    }

    echo "<hr>";

    echo "<h2>2. Direct Database Query</h2>";
    $db = \App\Core\Database::getInstance()->getConnection();
    $stmt = $db->query("SELECT * FROM routes WHERE route_type = 'tour' AND is_active = 1 LIMIT 10");
    $directTours = $stmt->fetchAll(PDO::FETCH_OBJ);

    echo "<p><strong>Direct query result:</strong> " . count($directTours) . " tours</p>";

    if (count($directTours) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Title</th><th>Duration</th><th>Price</th></tr>";
        foreach ($directTours as $tour) {
            echo "<tr>";
            echo "<td>" . $tour->id . "</td>";
            echo "<td>" . htmlspecialchars($tour->title) . "</td>";
            echo "<td>" . $tour->duration_days . " days</td>";
            echo "<td>$" . number_format($tour->base_price) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    echo "<hr>";

    echo "<h2>3. Testing All Route Types</h2>";

    $allTypes = ['trek', 'tour', 'expedition', 'day_trip'];
    echo "<table>";
    echo "<tr><th>Route Type</th><th>Count</th><th>Method Works</th></tr>";

    foreach ($allTypes as $type) {
        $method = 'get' . ucfirst($type === 'day_trip' ? 'DayTrips' : $type . 's');
        $results = $routeModel->$method(5);

        echo "<tr>";
        echo "<td><strong>" . $type . "</strong></td>";
        echo "<td>" . count($results) . "</td>";
        echo "<td>" . (count($results) > 0 ? '✅ Yes' : '❌ No') . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<hr>";

    echo "<h2>✅ Test Complete!</h2>";

    if (count($tours) > 0) {
        echo "<div class='success'>";
        echo "<h3>Everything is working correctly!</h3>";
        echo "<p>Your tours are being fetched from the database. If they're not showing on the homepage:</p>";
        echo "<ol>";
        echo "<li><strong>Clear your browser cache</strong> (Ctrl+Shift+Delete)</li>";
        echo "<li><strong>Check the home.php file</strong> to ensure it's using the \$tour_routes variable</li>";
        echo "<li><strong>Check for JavaScript errors</strong> in browser console (F12)</li>";
        echo "</ol>";
        echo "</div>";
    } else {
        echo "<div class='error'>";
        echo "<h3>No tours found!</h3>";
        echo "<p>You need to set some routes to have route_type = 'tour'</p>";
        echo "<p>Run this SQL in phpMyAdmin:</p>";
        echo "<pre>UPDATE routes SET route_type = 'tour' WHERE duration_days BETWEEN 4 AND 7 LIMIT 10;</pre>";
        echo "</div>";
    }

} catch (Exception $e) {
    echo "<div class='error'>";
    echo "<h3>❌ Error occurred!</h3>";
    echo "<p><strong>Error:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}
?>

    </div>
</body>
</html>
