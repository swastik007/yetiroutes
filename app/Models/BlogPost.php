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
     * Get published posts with filters
     */
    public function getPublished(array $filters = []): array
    {
        $conditions = ["bp.status = 'published'"];
        $params = [];

        // Filter by category
        if (!empty($filters['category'])) {
            $conditions[] = "bc.slug = :category";
            $params['category'] = $filters['category'];
        }

        // Search in title, content, excerpt
        if (!empty($filters['search'])) {
            $conditions[] = "(bp.title LIKE :search OR bp.content LIKE :search OR bp.excerpt LIKE :search)";
            $params['search'] = '%' . $filters['search'] . '%';
        }

        $where = implode(' AND ', $conditions);

        $sql = "SELECT bp.*,
                       u.full_name as author_name,
                       bc.name as category,
                       bc.slug as category_slug,
                       JSON_UNQUOTE(JSON_EXTRACT(m.variants, '$.original')) as featured_image
                FROM {$this->table} bp
                LEFT JOIN users u ON bp.author_id = u.id
                LEFT JOIN blog_categories bc ON bp.category_id = bc.id
                LEFT JOIN media_library m ON bp.media_id = m.id
                WHERE {$where}
                ORDER BY bp.published_at DESC";

        return $this->query($sql, $params);
    }

    /**
     * Get popular posts (by views)
     */
    public function getPopular(int $limit = 5): array
    {
        $sql = "SELECT bp.*,
                       u.full_name as author_name,
                       JSON_UNQUOTE(JSON_EXTRACT(m.variants, '$.original')) as featured_image
                FROM {$this->table} bp
                LEFT JOIN users u ON bp.author_id = u.id
                LEFT JOIN media_library m ON bp.media_id = m.id
                WHERE bp.status = 'published'
                ORDER BY bp.views_count DESC, bp.published_at DESC
                LIMIT :limit";

        return $this->query($sql, ['limit' => $limit]);
    }

    /**
     * Get related posts (same category)
     */
    public function getRelated(int $postId, ?string $category, int $limit = 4): array
    {
        $sql = "SELECT bp.*,
                       u.full_name as author_name,
                       JSON_UNQUOTE(JSON_EXTRACT(m.variants, '$.original')) as featured_image
                FROM {$this->table} bp
                LEFT JOIN users u ON bp.author_id = u.id
                LEFT JOIN blog_categories bc ON bp.category_id = bc.id
                LEFT JOIN media_library m ON bp.media_id = m.id
                WHERE bp.status = 'published'
                AND bp.id != :post_id
                AND (bc.slug = :category OR :category2 = '')
                ORDER BY bp.published_at DESC
                LIMIT :limit";

        return $this->query($sql, [
            'post_id'   => $postId,
            'category'  => $category ?? '',
            'category2' => $category ?? '',
            'limit'     => $limit,
        ]);
    }

    /**
     * Get category counts
     */
    public function getCategoryCounts(): array
    {
        $sql = "SELECT bc.slug, COUNT(bp.id) as count
                FROM blog_categories bc
                LEFT JOIN {$this->table} bp ON bc.id = bp.category_id AND bp.status = 'published'
                GROUP BY bc.id, bc.slug";

        $results = $this->query($sql);
        $counts = [];
        foreach ($results as $row) {
            $counts[$row->slug] = $row->count;
        }
        return $counts;
    }

    /**
     * Get popular tags
     */
    public function getPopularTags(int $limit = 15): array
    {
        $sql = "SELECT tags
                FROM {$this->table}
                WHERE status = 'published' AND tags IS NOT NULL";

        $results = $this->query($sql);
        $allTags = [];

        foreach ($results as $row) {
            $tags = json_decode($row->tags, true);
            if (is_array($tags)) {
                $allTags = array_merge($allTags, $tags);
            }
        }

        // Count tag frequency
        $tagCounts = array_count_values($allTags);
        arsort($tagCounts);

        return array_slice(array_keys($tagCounts), 0, $limit);
    }

    /**
     * Increment view count
     */
    public function incrementViews(int $postId): bool
    {
        $sql = "UPDATE {$this->table} SET views_count = views_count + 1 WHERE id = :id";
        $this->query($sql, ['id' => $postId]);
        return true;
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
