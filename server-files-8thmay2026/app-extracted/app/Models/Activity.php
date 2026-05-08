<?php

namespace App\Models;

use App\Core\Model;

class Activity extends Model
{
    protected string $table = 'activities';
    protected array $fillable = [
        'media_id', 'title', 'slug', 'icon_class', 'short_description', 'full_description',
        'duration', 'difficulty', 'price_from', 'currency', 'best_season',
        'group_size_min', 'group_size_max', 'highlights', 'inclusions', 'exclusions',
        'requirements', 'location', 'is_featured', 'is_active', 'display_order',
        'meta_title', 'meta_description'
    ];

    /**
     * Get all active activities
     */
    public function getAllActive(int $limit = null): array
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE is_active = 1
                ORDER BY display_order ASC, title ASC";

        if ($limit) {
            $sql .= " LIMIT {$limit}";
        }

        return $this->query($sql);
    }

    /**
     * Get featured activities
     */
    public function getFeatured(int $limit = 8): array
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE is_featured = 1 AND is_active = 1
                ORDER BY display_order ASC, title ASC
                LIMIT {$limit}";

        return $this->query($sql);
    }

    /**
     * Find activity by slug
     */
    public function findBySlug(string $slug): ?object
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE slug = :slug AND is_active = 1 LIMIT 1");
        $stmt->execute(['slug' => $slug]);
        $result = $stmt->fetch(\PDO::FETCH_OBJ);
        return $result ?: null;
    }

    /**
     * Get activities by difficulty
     */
    public function getByDifficulty(string $difficulty): array
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE difficulty = :difficulty AND is_active = 1
                ORDER BY display_order ASC";

        return $this->query($sql, ['difficulty' => $difficulty]);
    }

    /**
     * Search activities
     */
    public function search(string $query): array
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE is_active = 1
                AND (title LIKE :query OR short_description LIKE :query OR location LIKE :query)
                ORDER BY is_featured DESC, title ASC";

        return $this->query($sql, ['query' => "%{$query}%"]);
    }

    /**
     * Get all activities for admin (including inactive)
     */
    public function getAllForAdmin(): array
    {
        $sql = "SELECT a.*, m.file_path as image_path
                FROM {$this->table} a
                LEFT JOIN media_library m ON a.media_id = m.id
                ORDER BY a.display_order ASC, a.created_at DESC";

        return $this->query($sql);
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(int $id): bool
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET is_featured = NOT is_featured WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    /**
     * Toggle active status
     */
    public function toggleActive(int $id): bool
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET is_active = NOT is_active WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    /**
     * Update display order
     */
    public function updateDisplayOrder(int $id, int $order): bool
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET display_order = :order WHERE id = :id");
        return $stmt->execute(['id' => $id, 'order' => $order]);
    }
}
