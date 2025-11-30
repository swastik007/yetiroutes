<?php

namespace App\Core;

use PDO;
use PDOException;

/**
 * Singleton Database Class.
 *
 * Manages a single, persistent PDO database connection.
 */
class Database
{
    private static ?Database $instance = null;
    public ?PDO $pdo = null;

    /**
     * The constructor is private to prevent direct creation of object.
     * It establishes the PDO connection.
     */
    private function __construct()
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            // In a real application, you would log this error and show a generic error page.
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * Gets the single instance of the Database class.
     *
     * @return Database The single instance of the Database class.
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Gets the PDO connection object.
     *
     * @return PDO The PDO connection object.
     */
    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}