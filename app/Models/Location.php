<?php

namespace App\Models;

use App\Core\Model;

class Location extends Model
{
    protected string $table = 'locations';
    protected array $fillable = [
        'parent_id', 'name', 'slug', 'latitude', 'longitude',
        'media_id', 'meta_title', 'meta_description'
    ];

    /**
     * Get all locations with parent name
     */
    public function getAllWithParent(): array
    {
        $sql = "SELECT l.*, p.name as parent_name
                FROM {$this->table} l
                LEFT JOIN locations p ON l.parent_id = p.id
                ORDER BY l.name ASC";

        return $this->query($sql);
    }

    /**
     * Get hierarchical locations
     */
    public function getHierarchical(): array
    {
        // Get parent locations
        $parents = $this->where('parent_id', null, 'IS');

        $result = [];
        foreach ($parents as $parent) {
            $children = $this->where('parent_id', $parent->id);
            $result[] = [
                'location' => $parent,
                'children' => $children
            ];
        }

        return $result;
    }
}
