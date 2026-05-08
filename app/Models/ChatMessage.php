<?php

namespace App\Models;

use App\Core\Model;

class ChatMessage extends Model
{
    protected string $table = 'chat_messages';
    protected array $fillable = [
        'conversation_id', 'sender_type', 'message'
    ];

    /**
     * Get messages by conversation ID
     */
    public function getByConversation(int $conversationId, int $limit = 1000): array
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE conversation_id = :conversation_id
                ORDER BY created_at ASC";

        // Only apply limit if specified and reasonable
        if ($limit > 0 && $limit < 1000) {
            $sql .= " LIMIT {$limit}";
        }

        return $this->query($sql, ['conversation_id' => $conversationId]);
    }

    /**
     * Get all messages for a conversation (no limit)
     */
    public function getAllByConversation(int $conversationId): array
    {
        return $this->getByConversation($conversationId, 0);
    }

    /**
     * Get messages since specific message ID
     */
    public function getSinceId(int $conversationId, int $sinceId): array
    {
        $sql = "SELECT * FROM {$this->table} 
                WHERE conversation_id = :conversation_id 
                AND id > :since_id 
                ORDER BY created_at ASC";

        return $this->query($sql, [
            'conversation_id' => $conversationId,
            'since_id' => $sinceId
        ]);
    }

    /**
     * Get unread messages for admin
     */
    public function getUnreadMessages(int $conversationId = null): array
    {
        $sql = "SELECT cm.*, cc.visitor_id, cc.user_name
                FROM {$this->table} cm
                INNER JOIN chat_conversations cc ON cm.conversation_id = cc.id
                WHERE cm.is_read = FALSE 
                AND cm.sender_type = 'visitor'";

        $params = [];
        
        if ($conversationId) {
            $sql .= " AND cm.conversation_id = :conversation_id";
            $params['conversation_id'] = $conversationId;
        }

        $sql .= " ORDER BY cm.created_at ASC";

        return $this->query($sql, $params);
    }

    /**
     * Mark messages as read
     */
    public function markAsRead(int $conversationId, string $senderType = 'visitor'): bool
    {
        $sql = "UPDATE {$this->table} 
                SET is_read = TRUE 
                WHERE conversation_id = :conversation_id 
                AND sender_type = :sender_type 
                AND is_read = FALSE";

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                'conversation_id' => $conversationId,
                'sender_type' => $senderType
            ]);
        } catch (\PDOException $e) {
            error_log("Mark as read error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Get last message in conversation
     */
    public function getLastMessage(int $conversationId): ?object
    {
        $sql = "SELECT * FROM {$this->table} 
                WHERE conversation_id = :conversation_id 
                ORDER BY created_at DESC 
                LIMIT 1";

        $result = $this->query($sql, ['conversation_id' => $conversationId]);
        return $result[0] ?? null;
    }

    /**
     * Get message count by conversation
     */
    public function getCountByConversation(int $conversationId): int
    {
        $sql = "SELECT COUNT(*) as count
                FROM {$this->table}
                WHERE conversation_id = :conversation_id";

        $result = $this->query($sql, ['conversation_id' => $conversationId]);
        return (int) $result[0]->count;
    }

    /**
     * Get unread message count for conversation
     */
    public function getUnreadCount(int $conversationId): int
    {
        $sql = "SELECT COUNT(*) as count
                FROM {$this->table}
                WHERE conversation_id = :conversation_id
                AND sender_type = 'visitor'
                AND is_read = FALSE";

        $result = $this->query($sql, ['conversation_id' => $conversationId]);
        return (int) $result[0]->count;
    }

    /**
     * Create message with validation
     */
    public function createMessage(array $data): int|bool
    {
        // Validate required fields
        if (empty($data['conversation_id']) || empty($data['sender_type']) || empty($data['message'])) {
            error_log("ChatMessage validation failed: missing required fields");
            return false;
        }

        // Trim and sanitize message
        $data['message'] = trim($data['message']);
        if (empty($data['message'])) {
            return false;
        }

        return $this->create($data);
    }

    /**
     * Get messages for polling (since timestamp)
     */
    public function getNewMessages(int $conversationId, string $sinceTime): array
    {
        $sql = "SELECT * FROM {$this->table} 
                WHERE conversation_id = :conversation_id 
                AND created_at > :since_time 
                ORDER BY created_at ASC";

        return $this->query($sql, [
            'conversation_id' => $conversationId,
            'since_time' => $sinceTime
        ]);
    }
}