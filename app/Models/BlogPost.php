<?php

namespace App\Models;

use App\Core\Model;

class BlogPost extends Model
{
    protected string $table = 'blog_posts';
    protected array $fillable = [
        'author_id', 'category_id', 'media_id', 'title', 'slug',
        'content', 'excerpt', 'status', 'published_at',
        'meta_title', 'meta_description'
    ];

    /**
     * Get all posts with author and category
     */
    public function getAllWithDetails(): array
    {
        $sql = "SELECT bp.*, u.full_name as author_name, bc.name as category_name
                FROM {$this->table} bp
                LEFT JOIN users u ON bp.author_id = u.id
                LEFT JOIN blog_categories bc ON bp.category_id = bc.id
                ORDER BY bp.created_at DESC";

        return $this->query($sql);
    }

    /**
     * Get published posts
     */
    public function getPublished(int $limit = 10): array
    {
        $sql = "SELECT bp.*, u.full_name as author_name, bc.name as category_name
                FROM {$this->table} bp
                LEFT JOIN users u ON bp.author_id = u.id
                LEFT JOIN blog_categories bc ON bp.category_id = bc.id
                WHERE bp.status = 'published'
                ORDER BY bp.published_at DESC
                LIMIT {$limit}";

        return $this->query($sql);
    }

    /**
     * Find by slug
     */
    public function findBySlug(string $slug): ?object
    {
        $sql = "SELECT bp.*, u.full_name as author_name, bc.name as category_name
                FROM {$this->table} bp
                LEFT JOIN users u ON bp.author_id = u.id
                LEFT JOIN blog_categories bc ON bp.category_id = bc.id
                WHERE bp.slug = :slug
                LIMIT 1";

        $result = $this->query($sql, ['slug' => $slug]);
        return $result[0] ?? null;
    }
}
