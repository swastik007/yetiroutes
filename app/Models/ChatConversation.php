<?php

namespace App\Models;

use App\Core\Model;

class ChatConversation extends Model
{
    protected string $table = 'chat_conversations';
    protected array $fillable = [
        'visitor_id', 'user_name', 'user_email', 'status', 'page_url'
    ];

    /**
     * Find or create conversation by visitor ID
     */
    public function findOrCreateByVisitor(string $visitorId, array $data = []): object
    {
        // Try to find existing active conversation
        $sql = "SELECT * FROM {$this->table} WHERE visitor_id = :visitor_id AND status = 'active' LIMIT 1";
        $existing = $this->query($sql, ['visitor_id' => $visitorId]);
        
        if (!empty($existing)) {
            return $existing[0];
        }

        // Create new conversation
        $conversationData = array_merge([
            'visitor_id' => $visitorId,
            'status' => 'active',
            'page_url' => $_SERVER['REQUEST_URI'] ?? '/'
        ], $data);

        $conversationId = $this->create($conversationData);
        
        return $this->find($conversationId);
    }

    /**
     * Get conversations with message count
     */
    public function getWithMessageCount(string $status = 'active'): array
    {
        $sql = "SELECT cc.*, 
                       COUNT(cm.id) as message_count,
                       MAX(cm.created_at) as last_message_at
                FROM {$this->table} cc
                LEFT JOIN chat_messages cm ON cc.id = cm.conversation_id
                WHERE cc.status = :status
                GROUP BY cc.id
                ORDER BY last_message_at DESC";

        return $this->query($sql, ['status' => $status]);
    }

    /**
     * Get active conversations for admin
     */
    public function getActiveConversations(): array
    {
        return $this->getWithMessageCount('active');
    }

    /**
     * Get resolved conversations
     */
    public function getResolvedConversations(): array
    {
        return $this->getWithMessageCount('resolved');
    }

    /**
     * Mark conversation as resolved
     */
    public function markAsResolved(int $conversationId): bool
    {
        return $this->update($conversationId, ['status' => 'resolved']);
    }

    /**
     * Check if conversation belongs to visitor
     */
    public function belongsToVisitor(int $conversationId, string $visitorId): bool
    {
        $sql = "SELECT COUNT(*) as count 
                FROM {$this->table} 
                WHERE id = :conversation_id AND visitor_id = :visitor_id";
        
        $result = $this->query($sql, [
            'conversation_id' => $conversationId,
            'visitor_id' => $visitorId
        ]);

        return $result[0]->count > 0;
    }

    /**
     * Get conversation with messages
     */
    public function getWithMessages(int $conversationId): ?object
    {
        $conversation = $this->find($conversationId);
        if (!$conversation) {
            return null;
        }

        // Get all messages (no limit for full history)
        $messageModel = new ChatMessage();
        $conversation->messages = $messageModel->getAllByConversation($conversationId);

        return $conversation;
    }

    /**
     * Update conversation timestamp
     */
    public function touch(int $conversationId): bool
    {
        // This will trigger the updated_at timestamp update
        return $this->update($conversationId, []);
    }

    /**
     * Get all conversations with message info
     */
    public function getAllWithMessages(): array
    {
        $sql = "SELECT c.*,
                       COUNT(m.id) as message_count,
                       MAX(m.created_at) as last_message_at
                FROM {$this->table} c
                LEFT JOIN chat_messages m ON c.id = m.conversation_id
                GROUP BY c.id
                ORDER BY last_message_at DESC, c.created_at DESC";

        return $this->query($sql);
    }
}