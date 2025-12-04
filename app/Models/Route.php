<?php

namespace App\Models;

use App\Core\Model;

class Route extends Model
{
    protected string $table = 'routes';
    protected array $fillable = [
        'location_id', 'media_id', 'title', 'slug', 'difficulty',
        'duration_days', 'max_altitude_meters', 'best_season', 'terrain_type', 'route_type',
        'fitness_score_required', 'carbon_footprint_kg', 'base_price', 'currency',
        'price_transparency_data', 'short_description', 'full_description',
        'highlights', 'inclusions', 'exclusions', 'emergency_contact_info',
        'nearest_hospital', 'is_featured', 'video_url', 'map_embed_code',
        'map_3d_url', 'meta_title', 'meta_description', 'is_active', 'featured_image_path'
    ];

    /**
     * Get all routes with location name
     */
    public function getAllWithLocation(): array
    {
        $sql = "SELECT r.*, l.name as location_name
                FROM {$this->table} r
                LEFT JOIN locations l ON r.location_id = l.id
                ORDER BY r.created_at DESC";

        return $this->query($sql);
    }

    /**
     * Get featured routes
     */
    public function getFeatured(int $limit = 6): array
    {
        $sql = "SELECT r.*, l.name as location_name
                FROM {$this->table} r
                LEFT JOIN locations l ON r.location_id = l.id
                WHERE r.is_featured = 1 AND r.is_active = 1
                ORDER BY r.id DESC
                LIMIT {$limit}";

        return $this->query($sql);
    }

    /**
     * Find route by slug
     */
    public function findBySlug(string $slug): ?object
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE slug = :slug LIMIT 1");
        $stmt->execute(['slug' => $slug]);
        $result = $stmt->fetch(\PDO::FETCH_OBJ);
        return $result ?: null;
    }

    /**
     * Get route with itinerary
     */
    public function getWithItinerary(int $id): array
    {
        $route = $this->find($id);
        if (!$route) {
            return [];
        }

        $sql = "SELECT * FROM route_itineraries
                WHERE route_id = :route_id
                ORDER BY day_number ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['route_id' => $id]);
        $itinerary = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return [
            'route' => $route,
            'itinerary' => $itinerary
        ];
    }

    /**
     * Search routes
     */
    public function search(array $filters): array
    {
        $sql = "SELECT r.*, l.name as location_name FROM {$this->table} r
                LEFT JOIN locations l ON r.location_id = l.id
                WHERE r.is_active = 1";

        $params = [];

        if (!empty($filters['difficulty'])) {
            $sql .= " AND r.difficulty = :difficulty";
            $params['difficulty'] = $filters['difficulty'];
        }

        if (!empty($filters['max_days'])) {
            $sql .= " AND r.duration_days <= :max_days";
            $params['max_days'] = $filters['max_days'];
        }

        if (!empty($filters['location_id'])) {
            $sql .= " AND r.location_id = :location_id";
            $params['location_id'] = $filters['location_id'];
        }

        $sql .= " ORDER BY r.is_featured DESC, r.created_at DESC";

        return $this->query($sql, $params);
    }

    /**
     * Get routes by type (trek, tour, expedition, day_trip)
     */
    public function getByType(string $type, int $limit = 10): array
    {
        $sql = "SELECT r.*, l.name as location_name
                FROM {$this->table} r
                LEFT JOIN locations l ON r.location_id = l.id
                WHERE r.route_type = :type AND r.is_active = 1
                ORDER BY r.is_featured DESC, r.created_at DESC
                LIMIT {$limit}";

        return $this->query($sql, ['type' => $type]);
    }

    /**
     * Get featured routes by type
     */
    public function getFeaturedByType(string $type, int $limit = 6): array
    {
        $sql = "SELECT r.*, l.name as location_name
                FROM {$this->table} r
                LEFT JOIN locations l ON r.location_id = l.id
                WHERE r.route_type = :type AND r.is_featured = 1 AND r.is_active = 1
                ORDER BY r.id DESC
                LIMIT {$limit}";

        return $this->query($sql, ['type' => $type]);
    }

    /**
     * Get treks (convenience method)
     */
    public function getTreks(int $limit = 10): array
    {
        return $this->getByType('trek', $limit);
    }

    /**
     * Get tours (convenience method)
     */
    public function getTours(int $limit = 10): array
    {
        return $this->getByType('tour', $limit);
    }

    /**
     * Get expeditions (convenience method)
     */
    public function getExpeditions(int $limit = 10): array
    {
        return $this->getByType('expedition', $limit);
    }

    /**
     * Get day trips (convenience method)
     */
    public function getDayTrips(int $limit = 10): array
    {
        return $this->getByType('day_trip', $limit);
    }
}
