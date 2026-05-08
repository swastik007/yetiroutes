<?php

namespace App\Models;

use App\Core\Model;

class LeadActivity extends Model
{
    protected string $table = 'lead_activities';
    protected array $fillable = [
        'lead_id', 'activity_type', 'activity_data', 'ip_address', 'user_agent'
    ];

    /**
     * Get activities for a lead
     */
    public function getByLead(int $leadId, int $limit = 50): array
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE lead_id = :lead_id
                ORDER BY created_at DESC
                LIMIT {$limit}";

        return $this->query($sql, ['lead_id' => $leadId]);
    }

    /**
     * Get recent activities across all leads
     */
    public function getRecentActivities(int $limit = 100): array
    {
        $sql = "SELECT la.*,
                       l.user_name, l.user_email, l.lead_status
                FROM {$this->table} la
                LEFT JOIN leads l ON la.lead_id = l.id
                ORDER BY la.created_at DESC
                LIMIT {$limit}";

        return $this->query($sql);
    }

    /**
     * Get activity statistics
     */
    public function getActivityStats(string $period = '7 DAY'): array
    {
        $sql = "SELECT
                activity_type,
                COUNT(*) as count
                FROM {$this->table}
                WHERE created_at >= DATE_SUB(NOW(), INTERVAL {$period})
                GROUP BY activity_type
                ORDER BY count DESC";

        return $this->query($sql);
    }

    /**
     * Clean old activities (keep last 1000 per lead)
     */
    public function cleanOldActivities(): int
    {
        // This is a complex operation that would need to be done carefully
        // For now, just return 0 to indicate no cleanup was performed
        return 0;
    }
}
