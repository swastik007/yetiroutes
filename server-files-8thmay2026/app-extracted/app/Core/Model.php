<?php

namespace App\Core;

use PDO;
use PDOException;

/**
 * Base Model Class
 * Provides CRUD operations for all models
 */
abstract class Model
{
    protected PDO $db;
    protected string $table;
    protected string $primaryKey = 'id';
    protected array $fillable = [];

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Find all records
     */
    public function all(array $columns = ['*'], string $orderBy = '', int $limit = 0): array
    {
        $sql = "SELECT " . implode(', ', $columns) . " FROM {$this->table}";

        if ($orderBy) {
            $sql .= " ORDER BY {$orderBy}";
        }

        if ($limit > 0) {
            $sql .= " LIMIT {$limit}";
        }

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Find a record by ID
     */
    public function find(int $id): ?object
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);

        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result ?: null;
    }

    /**
     * Find records by criteria
     */
    public function where(string $column, mixed $value, string $operator = '='): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} :value";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['value' => $value]);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Create a new record
     */
    public function create(array $data): int|bool
    {
        // Filter only fillable fields
        $data = array_intersect_key($data, array_flip($this->fillable));

        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($data);
            return (int) $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Create Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Update a record
     */
    public function update(int $id, array $data): bool
    {
        // Filter only fillable fields
        $data = array_intersect_key($data, array_flip($this->fillable));

        $setParts = [];
        foreach (array_keys($data) as $column) {
            $setParts[] = "{$column} = :{$column}";
        }
        $setClause = implode(', ', $setParts);

        $sql = "UPDATE {$this->table} SET {$setClause} WHERE {$this->primaryKey} = :id";

        try {
            $data['id'] = $id;
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            error_log("Update Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Delete a record
     */
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id";

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            error_log("Delete Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Count records
     */
    public function count(string $where = ''): int
    {
        $sql = "SELECT COUNT(*) as count FROM {$this->table}";

        if ($where) {
            $sql .= " WHERE {$where}";
        }

        $stmt = $this->db->query($sql);
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return (int) $result->count;
    }

    /**
     * Execute raw query
     */
    public function query(string $sql, array $params = []): array
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log("Query Error: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Paginate results
     */
    public function paginate(int $perPage = 20, int $page = 1): array
    {
        $offset = ($page - 1) * $perPage;

        $sql = "SELECT * FROM {$this->table} LIMIT {$perPage} OFFSET {$offset}";
        $stmt = $this->db->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $total = $this->count();
        $totalPages = ceil($total / $perPage);

        return [
            'data' => $data,
            'current_page' => $page,
            'per_page' => $perPage,
            'total' => $total,
            'total_pages' => $totalPages
        ];
    }
}
