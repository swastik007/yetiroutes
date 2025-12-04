<?php

namespace App\Models;

use App\Core\Model;

/**
 * Inquiry Model
 * Handles contact form inquiries and customer communications
 */
class Inquiry extends Model
{
    protected string $table = 'inquiries';

    /**
     * Get filtered inquiries with pagination
     */
    public function getFiltered(array $filters, int $page = 1, int $perPage = 20): array
    {
        $offset = ($page - 1) * $perPage;
        $conditions = ['1=1'];
        $params = [];

        // Filter by status
        if (!empty($filters['status'])) {
            $conditions[] = 'status = :status';
            $params['status'] = $filters['status'];
        }

        // Filter by inquiry type
        if (!empty($filters['inquiry_type'])) {
            $conditions[] = 'inquiry_type = :inquiry_type';
            $params['inquiry_type'] = $filters['inquiry_type'];
        }

        // Search in name, email, message
        if (!empty($filters['search'])) {
            $conditions[] = '(name LIKE :search OR email LIKE :search OR message LIKE :search)';
            $params['search'] = '%' . $filters['search'] . '%';
        }

        $where = implode(' AND ', $conditions);

        $sql = "SELECT i.*,
                       r.title as route_title,
                       u.name as responder_name
                FROM {$this->table} i
                LEFT JOIN routes r ON i.route_id = r.id
                LEFT JOIN users u ON i.responded_by = u.id
                WHERE {$where}
                ORDER BY i.created_at DESC
                LIMIT :limit OFFSET :offset";

        $params['limit'] = $perPage;
        $params['offset'] = $offset;

        return $this->query($sql, $params);
    }

    /**
     * Count filtered inquiries
     */
    public function countFiltered(array $filters): int
    {
        $conditions = ['1=1'];
        $params = [];

        if (!empty($filters['status'])) {
            $conditions[] = 'status = :status';
            $params['status'] = $filters['status'];
        }

        if (!empty($filters['inquiry_type'])) {
            $conditions[] = 'inquiry_type = :inquiry_type';
            $params['inquiry_type'] = $filters['inquiry_type'];
        }

        if (!empty($filters['search'])) {
            $conditions[] = '(name LIKE :search OR email LIKE :search OR message LIKE :search)';
            $params['search'] = '%' . $filters['search'] . '%';
        }

        $where = implode(' AND ', $conditions);

        $sql = "SELECT COUNT(*) as count FROM {$this->table} WHERE {$where}";

        $result = $this->query($sql, $params);
        return $result[0]->count ?? 0;
    }

    /**
     * Get recent inquiries (for dashboard)
     */
    public function getRecent(int $limit = 10): array
    {
        $sql = "SELECT i.*,
                       r.title as route_title
                FROM {$this->table} i
                LEFT JOIN routes r ON i.route_id = r.id
                WHERE i.status = 'new'
                ORDER BY i.created_at DESC
                LIMIT :limit";

        return $this->query($sql, ['limit' => $limit]);
    }

    /**
     * Get inquiry statistics
     */
    public function getStats(): array
    {
        $sql = "SELECT
                    COUNT(*) as total,
                    SUM(CASE WHEN status = 'new' THEN 1 ELSE 0 END) as new_count,
                    SUM(CASE WHEN status = 'responded' THEN 1 ELSE 0 END) as responded_count,
                    SUM(CASE WHEN status = 'converted' THEN 1 ELSE 0 END) as converted_count,
                    SUM(CASE WHEN DATE(created_at) = CURDATE() THEN 1 ELSE 0 END) as today_count,
                    SUM(CASE WHEN DATE(created_at) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) THEN 1 ELSE 0 END) as week_count
                FROM {$this->table}";

        $result = $this->query($sql);
        return (array)($result[0] ?? []);
    }

    /**
     * Get inquiries by route
     */
    public function getByRoute(int $routeId): array
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE route_id = :route_id
                ORDER BY created_at DESC";

        return $this->query($sql, ['route_id' => $routeId]);
    }

    /**
     * Mark inquiry as converted to booking
     */
    public function markAsConverted(int $inquiryId, int $bookingId): bool
    {
        return $this->update($inquiryId, [
            'status' => 'converted',
            'converted_at' => date('Y-m-d H:i:s'),
            'booking_id' => $bookingId
        ]);
    }

    /**
     * Get conversion rate statistics
     */
    public function getConversionStats(int $days = 30): array
    {
        $sql = "SELECT
                    COUNT(*) as total_inquiries,
                    SUM(CASE WHEN status = 'converted' THEN 1 ELSE 0 END) as conversions,
                    ROUND(SUM(CASE WHEN status = 'converted' THEN 1 ELSE 0 END) / COUNT(*) * 100, 2) as conversion_rate
                FROM {$this->table}
                WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL :days DAY)";

        $result = $this->query($sql, ['days' => $days]);
        return (array)($result[0] ?? []);
    }

    /**
     * Get inquiries by email (check for duplicates)
     */
    public function getByEmail(string $email): array
    {
        return $this->where('email', $email);
    }

    /**
     * Get response time statistics
     */
    public function getResponseTimeStats(): array
    {
        $sql = "SELECT
                    AVG(TIMESTAMPDIFF(HOUR, created_at, responded_at)) as avg_response_hours,
                    MIN(TIMESTAMPDIFF(HOUR, created_at, responded_at)) as min_response_hours,
                    MAX(TIMESTAMPDIFF(HOUR, created_at, responded_at)) as max_response_hours
                FROM {$this->table}
                WHERE responded_at IS NOT NULL
                AND created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";

        $result = $this->query($sql);
        return (array)($result[0] ?? []);
    }
}
