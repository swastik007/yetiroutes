<?php
// Script to check if route_type column exists and show routes
require_once __DIR__ . '/app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance()->getConnection();
    echo "<h2>Checking route_type column...</h2>";

    // Check if route_type column exists
    $stmt = $db->query("DESCRIBE routes");
    $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $hasRouteType = in_array('route_type', $columns);

    if ($hasRouteType) {
        echo "<p style='color: green;'>✓ route_type column EXISTS</p>";

        // Show route_type distribution
        echo "<h3>Route Type Distribution:</h3>";
        $stmt = $db->query("SELECT route_type, COUNT(*) as count FROM routes GROUP BY route_type");
        $distribution = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Route Type</th><th>Count</th></tr>";
        foreach ($distribution as $row) {
            echo "<tr><td>{$row['route_type']}</td><td>{$row['count']}</td></tr>";
        }
        echo "</table>";

        // Show some sample routes
        echo "<h3>Sample Routes:</h3>";
        $stmt = $db->query("SELECT title, route_type, duration_days, is_active FROM routes LIMIT 10");
        $routes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Title</th><th>Route Type</th><th>Duration</th><th>Active</th></tr>";
        foreach ($routes as $route) {
            echo "<tr>";
            echo "<td>{$route['title']}</td>";
            echo "<td>{$route['route_type']}</td>";
            echo "<td>{$route['duration_days']} days</td>";
            echo "<td>" . ($route['is_active'] ? 'Yes' : 'No') . "</td>";
            echo "</tr>";
        }
        echo "</table>";

    } else {
        echo "<p style='color: red;'>✗ route_type column DOES NOT EXIST</p>";
        echo "<p><strong>Action Required:</strong> Run the migration file to add the route_type column.</p>";
        echo "<p>Migration file location: <code>migration-add-route-type.sql</code></p>";
        echo "<h3>How to run the migration:</h3>";
        echo "<ol>";
        echo "<li>Open phpMyAdmin</li>";
        echo "<li>Select the 'yetiroutes' database</li>";
        echo "<li>Go to the SQL tab</li>";
        echo "<li>Copy and paste the contents of migration-add-route-type.sql</li>";
        echo "<li>Click 'Go' to execute</li>";
        echo "</ol>";
        echo "<p>Or use MySQL command line:</p>";
        echo "<pre>mysql -u your_username -p yetiroutes < migration-add-route-type.sql</pre>";
    }

    // Show all routes regardless
    echo "<h3>All Routes in Database:</h3>";
    $stmt = $db->query("SELECT id, title, duration_days, is_active, is_featured FROM routes ORDER BY id DESC");
    $allRoutes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<p>Total routes: " . count($allRoutes) . "</p>";

    if (count($allRoutes) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Title</th><th>Duration</th><th>Active</th><th>Featured</th></tr>";
        foreach ($allRoutes as $route) {
            echo "<tr>";
            echo "<td>{$route['id']}</td>";
            echo "<td>{$route['title']}</td>";
            echo "<td>{$route['duration_days']} days</td>";
            echo "<td>" . ($route['is_active'] ? 'Yes' : 'No') . "</td>";
            echo "<td>" . ($route['is_featured'] ? 'Yes' : 'No') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: orange;'>No routes found in database. You may need to add some routes first.</p>";
    }

} catch (Exception $e) {
    echo "<h2 style='color: red;'>Error: " . $e->getMessage() . "</h2>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}
?>
