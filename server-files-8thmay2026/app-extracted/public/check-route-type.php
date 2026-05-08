<?php
// Script to check if route_type column exists and show routes
define('BASE_PATH', dirname(__DIR__));

// Load configuration first
require_once BASE_PATH . '/config/config.php';

// Load Autoloader
require_once BASE_PATH . '/app/Core/Autoloader.php';
App\Core\Autoloader::register();

use App\Core\Database;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Type Diagnostic</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        h3 {
            color: #555;
            margin-top: 30px;
        }
        .success {
            color: #4CAF50;
            background: #e8f5e9;
            padding: 10px;
            border-radius: 4px;
            margin: 10px 0;
        }
        .error {
            color: #f44336;
            background: #ffebee;
            padding: 10px;
            border-radius: 4px;
            margin: 10px 0;
        }
        .warning {
            color: #ff9800;
            background: #fff3e0;
            padding: 10px;
            border-radius: 4px;
            margin: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        code {
            background: #f5f5f5;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: monospace;
        }
        pre {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
        }
        ol {
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔍 Route Type Diagnostic Tool</h2>

<?php
try {
    $db = Database::getInstance()->getConnection();

    // Check if route_type column exists
    $stmt = $db->query("DESCRIBE routes");
    $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $hasRouteType = in_array('route_type', $columns);

    if ($hasRouteType) {
        echo '<div class="success">✅ <strong>SUCCESS:</strong> route_type column EXISTS in the database!</div>';

        // Show route_type distribution
        echo '<h3>📊 Route Type Distribution</h3>';
        $stmt = $db->query("SELECT route_type, COUNT(*) as count FROM routes GROUP BY route_type");
        $distribution = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($distribution) > 0) {
            echo '<table>';
            echo '<tr><th>Route Type</th><th>Count</th></tr>';
            foreach ($distribution as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['route_type']) . '</td>';
                echo '<td>' . htmlspecialchars($row['count']) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<div class="warning">⚠️ No routes found with route_type set.</div>';
        }

        // Show some sample routes
        echo '<h3>📝 Sample Routes</h3>';
        $stmt = $db->query("SELECT title, route_type, duration_days, is_active, is_featured FROM routes LIMIT 10");
        $routes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo '<table>';
        echo '<tr><th>Title</th><th>Route Type</th><th>Duration</th><th>Active</th><th>Featured</th></tr>';
        foreach ($routes as $route) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($route['title']) . '</td>';
            echo '<td><strong>' . htmlspecialchars($route['route_type']) . '</strong></td>';
            echo '<td>' . htmlspecialchars($route['duration_days']) . ' days</td>';
            echo '<td>' . ($route['is_active'] ? '✅' : '❌') . '</td>';
            echo '<td>' . ($route['is_featured'] ? '⭐' : '-') . '</td>';
            echo '</tr>';
        }
        echo '</table>';

        echo '<div class="success">
            <h3>✨ Everything looks good!</h3>
            <p>The route_type column exists and your tours should be showing on the frontend now.</p>
            <p>If tours still don\'t show, check:</p>
            <ul>
                <li>Make sure you have routes with <code>route_type = "tour"</code></li>
                <li>Verify routes have <code>is_active = 1</code></li>
                <li>Clear your browser cache</li>
            </ul>
        </div>';

    } else {
        echo '<div class="error">❌ <strong>ERROR:</strong> route_type column DOES NOT EXIST</div>';
        echo '<p><strong>Action Required:</strong> You need to run the migration file to add the route_type column.</p>';

        echo '<h3>📝 Migration Instructions</h3>';
        echo '<p>Migration file location: <code>migration-add-route-type.sql</code></p>';

        echo '<h4>Option 1: Using phpMyAdmin</h4>';
        echo '<ol>';
        echo '<li>Open <strong>phpMyAdmin</strong></li>';
        echo '<li>Select the <code>yetiroutes</code> database</li>';
        echo '<li>Go to the <strong>SQL</strong> tab</li>';
        echo '<li>Copy and paste the contents of <code>migration-add-route-type.sql</code></li>';
        echo '<li>Click <strong>"Go"</strong> to execute</li>';
        echo '<li>Refresh this page to verify</li>';
        echo '</ol>';

        echo '<h4>Option 2: Using MySQL Command Line</h4>';
        echo '<pre>cd d:\\server\\yetiroutes
mysql -u your_username -p yetiroutes < migration-add-route-type.sql</pre>';
    }

    // Show all routes regardless
    echo '<h3>📋 All Routes in Database</h3>';
    $stmt = $db->query("SELECT id, title, duration_days, is_active, is_featured FROM routes ORDER BY id DESC");
    $allRoutes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<p><strong>Total routes:</strong> ' . count($allRoutes) . '</p>';

    if (count($allRoutes) > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Title</th><th>Duration</th><th>Active</th><th>Featured</th></tr>';
        foreach ($allRoutes as $route) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($route['id']) . '</td>';
            echo '<td>' . htmlspecialchars($route['title']) . '</td>';
            echo '<td>' . htmlspecialchars($route['duration_days']) . ' days</td>';
            echo '<td>' . ($route['is_active'] ? '✅ Yes' : '❌ No') . '</td>';
            echo '<td>' . ($route['is_featured'] ? '⭐ Yes' : '- No') . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<div class="warning">⚠️ No routes found in database. You may need to add some routes first.</div>';
    }

} catch (Exception $e) {
    echo '<div class="error">';
    echo '<h3>❌ Database Error</h3>';
    echo '<p><strong>Error Message:</strong> ' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<h4>Troubleshooting:</h4>';
    echo '<ul>';
    echo '<li>Check your database connection in <code>config/config.php</code></li>';
    echo '<li>Make sure MySQL is running</li>';
    echo '<li>Verify the database name is correct</li>';
    echo '</ul>';
    echo '<details><summary>Stack Trace</summary><pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre></details>';
    echo '</div>';
}
?>

        <hr style="margin: 30px 0;">
        <p style="color: #666; text-align: center;">
            <small>Diagnostic Tool for Yeti Routes | Delete this file after troubleshooting</small>
        </p>
    </div>
</body>
</html>
