<?php
require_once 'config/config.php';
require_once 'app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance()->getConnection();
    echo "Checking tables...\n";

    $tables = ['languages', 'content_translations'];
    foreach ($tables as $table) {
        $stmt = $db->query("SHOW TABLES LIKE '$table'");
        if ($stmt->rowCount() > 0) {
            echo "[OK] Table '$table' exists.\n";
        } else {
            echo "[MISSING] Table '$table' does NOT exist.\n";
        }
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
