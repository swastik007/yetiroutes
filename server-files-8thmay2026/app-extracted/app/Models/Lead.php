<?php

namespace App\Models;

use App\Core\Model;

class Lead extends Model
{
    protected string $table = 'leads';
    protected array $fillable = [
        'visitor_id', 'user_name', 'user_email', 'phone', 'lead_source',
        'lead_status', 'lead_score', 'interested_in', 'budget_range',
        'preferred_dates', 'group_size', 'special_requests', 'ip_address',
        'user_agent', 'email_verified', 'marketing_consent'
    ];

    /**
     * Find or create lead by visitor ID
     */
    public function findOrCreateByVisitor(string $visitorId, array $data = []): object
    {
        // Try to find existing lead
        $existing = $this->where('visitor_id', $visitorId);
        if (!empty($existing)) {
            // Update last seen
            $this->update($existing[0]->id, ['last_seen' => date('Y-m-d H:i:s')]);
            return $existing[0];
        }

        // Create new lead
        $leadData = array_merge([
            'visitor_id' => $visitorId,
            'lead_source' => 'chat',
            'lead_status' => 'new',
            'lead_score' => 0,
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? null,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null,
            'first_seen' => date('Y-m-d H:i:s'),
            'last_seen' => date('Y-m-d H:i:s')
        ], $data);

        $leadId = $this->create($leadData);
        return $this->find($leadId);
    }

    /**
     * Find lead by email
     */
    public function findByEmail(string $email): ?object
    {
        $leads = $this->where('user_email', $email);
        return $leads[0] ?? null;
    }

    /**
     * Update lead information
     */
    public function updateLeadInfo(int $leadId, array $data): bool
    {
        // Calculate lead score based on engagement
        $currentLead = $this->find($leadId);
        if ($currentLead) {
            $score = $currentLead->lead_score ?? 0;

            // Increase score based on data provided
            if (!empty($data['user_name'])) $score += 5;
            if (!empty($data['user_email'])) $score += 10;
            if (!empty($data['phone'])) $score += 15;
            if (!empty($data['interested_in'])) $score += 20;
            if (!empty($data['budget_range'])) $score += 25;
            if (!empty($data['preferred_dates'])) $score += 30;

            $data['lead_score'] = min($score, 100); // Max score of 100
        }

        return $this->update($leadId, $data);
    }

    /**
     * Get leads by status
     */
    public function getByStatus(string $status, int $limit = 50): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE lead_status = :status ORDER BY created_at DESC LIMIT {$limit}";
        return $this->query($sql, ['status' => $status]);
    }

    /**
     * Get high-value leads (score > 50)
     */
    public function getHighValueLeads(int $limit = 20): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE lead_score >= 50 ORDER BY lead_score DESC, created_at DESC LIMIT {$limit}";
        return $this->query($sql);
    }

    /**
     * Get leads with conversation count
     */
    public function getWithConversationCount(int $limit = 50): array
    {
        $sql = "SELECT l.*,
                       COUNT(c.id) as conversation_count,
                       MAX(c.created_at) as last_conversation
                FROM {$this->table} l
                LEFT JOIN chat_conversations c ON l.id = c.lead_id
                GROUP BY l.id
                ORDER BY l.created_at DESC
                LIMIT {$limit}";

        return $this->query($sql);
    }

    /**
     * Log lead activity
     */
    public function logActivity(int $leadId, string $activityType, array $activityData = []): bool
    {
        $activityModel = new LeadActivity();
        return $activityModel->create([
            'lead_id' => $leadId,
            'activity_type' => $activityType,
            'activity_data' => json_encode($activityData),
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? null,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null
        ]);
    }

    /**
     * Get lead statistics
     */
    public function getStats(): array
    {
        $sql = "SELECT
                COUNT(*) as total_leads,
                COUNT(CASE WHEN lead_status = 'new' THEN 1 END) as new_leads,
                COUNT(CASE WHEN lead_status = 'qualified' THEN 1 END) as qualified_leads,
                COUNT(CASE WHEN lead_status = 'converted' THEN 1 END) as converted_leads,
                AVG(lead_score) as avg_score,
                COUNT(CASE WHEN created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) THEN 1 END) as leads_this_week
                FROM {$this->table}";

        $result = $this->query($sql);
        return $result[0] ?? [];
    }
}
