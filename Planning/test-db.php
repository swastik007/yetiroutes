<?php
// Quick database test script
require_once __DIR__ . '/app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance()->getConnection();

    echo "<h2>Database Connection: OK</h2>";

    // Show all tables
    echo "<h3>Tables in database:</h3>";
    $stmt = $db->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "<ul>";
    foreach ($tables as $table) {
        echo "<li>$table</li>";
    }
    echo "</ul>";

    // Check for media-related tables
    echo "<h3>Media table structure:</h3>";

    foreach (['media', 'media_library'] as $tableName) {
        try {
            $stmt = $db->query("DESCRIBE $tableName");
            $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo "<h4>Table: $tableName</h4>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>";
            foreach ($columns as $col) {
                echo "<tr>";
                echo "<td>{$col['Field']}</td>";
                echo "<td>{$col['Type']}</td>";
                echo "<td>{$col['Null']}</td>";
                echo "<td>{$col['Key']}</td>";
                echo "<td>{$col['Default']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        } catch (Exception $e) {
            echo "<p>Table '$tableName' not found or error: {$e->getMessage()}</p>";
        }
    }

} catch (Exception $e) {
    echo "<h2>Error: " . $e->getMessage() . "</h2>";
}
