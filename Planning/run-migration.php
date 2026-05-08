<?php
// Script to run migration when mysql cli is invalid

require_once 'config/config.php';
require_once 'app/Core/Database.php';

use App\Core\Database;

// Mock the Autoloader if needed, but we just manually required Database
// We might need to manually set up the instance if the getInstance check fails due to missing autoload
// But Database.php uses `new self()` so it should be fine as long as class is defined.

echo "Connecting to database...\n";

try {
    // Manually instance or use singleton if it works without autoloader
    // Since we included the file, the class exists.

    // We need to access the private constructor? No, getInstance is public.
    $db = Database::getInstance()->getConnection();
    echo "Connected.\n";

    $sqlFile = 'd:\server\yetiroutes\migration-create-chat.sql';
    if (!file_exists($sqlFile)) {
        die("Error: Migration file not found at $sqlFile\n");
    }

    $sql = file_get_contents($sqlFile);

    // Split by semicolon to run multiple statements if PDO doesn't support multi-query (it usually does with emulation off, but safer to split)
    // However, our migration has CREATE TABLE which are distinct.
    // Let's try executing the whole thing if the driver supports it, or split.
    // Default PDO mysql usually allows multiple queries if configured, but let's try raw exec.

    $statements = array_filter(array_map('trim', explode(';', $sql)));

    foreach ($statements as $stmt) {
        if (!empty($stmt)) {
            echo "Executing: " . substr($stmt, 0, 50) . "...\n";
            $db->exec($stmt);
        }
    }

    echo "Migration completed successfully.\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
