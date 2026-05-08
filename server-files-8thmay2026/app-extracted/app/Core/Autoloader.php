<?php

namespace App\Core;

/**
 * PSR-4 Autoloader for Yeti Routes
 */
class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register([__CLASS__, 'load']);
    }

    private static function load(string $className): void
    {
        // Convert namespace to file path
        // App\Core\Database -> app/Core/Database.php

        $prefix = 'App\\';
        $baseDir = BASE_PATH . '/app/';

        // Check if class uses the namespace prefix
        $len = strlen($prefix);
        if (strncmp($prefix, $className, $len) !== 0) {
            return;
        }

        // Get the relative class name
        $relativeClass = substr($className, $len);

        // Replace namespace separator with directory separator
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

        // If file exists, require it
        if (file_exists($file)) {
            require $file;
        }
    }
}
