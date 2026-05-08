<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\ChatConversation;
use App\Models\ChatMessage;

class ChatController extends Controller
{
    private ChatConversation $conversationModel;
    private ChatMessage $messageModel;

    public function __construct()
    {
        $this->conversationModel = new ChatConversation();
        $this->messageModel = new ChatMessage();
    }

    /**
     * Initialize chat session
     */
    public function start(): void
    {
        // Generate or get visitor ID from session
        $visitorId = $this->getVisitorId();
        
        // Get user data from pre-chat form if available
        $userData = [];
        if (!empty($_POST['user_name'])) {
            $userData['user_name'] = trim($_POST['user_name']);
        }
        if (!empty($_POST['user_email'])) {
            $userData['user_email'] = trim($_POST['user_email']);
        }

        // Find or create conversation
        $conversation = $this->conversationModel->findOrCreateByVisitor($visitorId, $userData);

        $this->json([
            'success' => true,
            'conversation_id' => $conversation->id,
            'visitor_id' => $visitorId
        ]);
    }

    /**
     * Send message from visitor
     */
    public function send(): void
    {
        $this->validateCsrf();

        $conversationId = (int) ($_POST['conversation_id'] ?? 0);
        $message = trim($_POST['message'] ?? '');
        $visitorId = $this->getVisitorId();

        // Validate input
        if ($conversationId <= 0 || empty($message)) {
            $this->json(['success' => false, 'error' => 'Invalid input'], 400);
            return;
        }

        // Verify conversation belongs to visitor
        if (!$this->conversationModel->belongsToVisitor($conversationId, $visitorId)) {
            $this->json(['success' => false, 'error' => 'Invalid conversation'], 403);
            return;
        }

        // Create message
        $messageId = $this->messageModel->createMessage([
            'conversation_id' => $conversationId,
            'sender_type' => 'visitor',
            'message' => $message
        ]);

        if ($messageId) {
            // Update conversation timestamp
            $this->conversationModel->touch($conversationId);
            
            $this->json([
                'success' => true,
                'message_id' => $messageId
            ]);
        } else {
            $this->json(['success' => false, 'error' => 'Failed to send message'], 500);
        }
    }

    /**
     * Get messages for conversation
     */
    public function getMessages(): void
    {
        $conversationId = (int) ($_GET['conversation_id'] ?? 0);
        $visitorId = $this->getVisitorId();
        $sinceId = (int) ($_GET['since_id'] ?? 0);

        error_log("=== getMessages called - conversation: $conversationId, visitor: $visitorId, since_id: $sinceId");

        if ($conversationId <= 0) {
            error_log("ERROR: Invalid conversation ID");
            $this->json(['success' => false, 'error' => 'Invalid conversation'], 400);
            return;
        }

        // Verify conversation belongs to visitor
        if (!$this->conversationModel->belongsToVisitor($conversationId, $visitorId)) {
            error_log("ERROR: Conversation $conversationId does not belong to visitor $visitorId");

            // Let's check what conversations this visitor has
            $visitorConversations = $this->conversationModel->where('visitor_id', $visitorId);
            error_log("Visitor $visitorId has these conversations: " . json_encode($visitorConversations));

            $this->json(['success' => false, 'error' => 'Invalid conversation'], 403);
            return;
        }

        error_log("SUCCESS: Conversation access verified");

        // Get messages
        if ($sinceId > 0) {
            $messages = $this->messageModel->getSinceId($conversationId, $sinceId);
            error_log("getMessages: Fetched " . count($messages) . " messages since ID $sinceId for conversation $conversationId");

            // Also log what the latest message ID is in the database
            $allMessages = $this->messageModel->getByConversation($conversationId);
            if (!empty($allMessages)) {
                $latestId = max(array_column($allMessages, 'id'));
                error_log("getMessages: Latest message ID in DB: $latestId, client last ID: $sinceId");
            }
        } else {
            $messages = $this->messageModel->getByConversation($conversationId);
            error_log("getMessages: Fetched " . count($messages) . " total messages for conversation $conversationId");
        }

        // Log message details
        foreach ($messages as $msg) {
            error_log("getMessages: Message ID {$msg->id}, sender: {$msg->sender_type}, time: {$msg->created_at}, content: " . substr($msg->message, 0, 50));
        }

        $this->json([
            'success' => true,
            'messages' => $messages,
            'last_message_id' => !empty($messages) ? end($messages)->id : 0
        ]);
    }

    /**
     * End conversation
     */
    public function end(): void
    {
        $conversationId = (int) ($_POST['conversation_id'] ?? 0);
        $visitorId = $this->getVisitorId();

        if ($conversationId <= 0) {
            $this->json(['success' => false, 'error' => 'Invalid conversation'], 400);
            return;
        }

        // Verify conversation belongs to visitor
        if (!$this->conversationModel->belongsToVisitor($conversationId, $visitorId)) {
            $this->json(['success' => false, 'error' => 'Invalid conversation'], 403);
            return;
        }

        // Mark as resolved
        $success = $this->conversationModel->markAsResolved($conversationId);

        $this->json(['success' => $success]);
    }

    /**
     * Admin: Get all conversations (AJAX)
     */
    public function adminConversations(): void
    {
        $this->requireAuth();

        $conversations = $this->conversationModel->getAllWithMessages();

        // Format for JSON response
        $formatted = array_map(function($conv) {
            $lastMessage = $this->messageModel->getLastMessage($conv->id);
            $unreadCount = $this->messageModel->getUnreadCount($conv->id);

            return [
                'id' => $conv->id,
                'user_name' => $conv->user_name,
                'user_email' => $conv->user_email,
                'status' => $conv->status,
                'created_at' => $conv->created_at,
                'last_message_at' => $lastMessage ? $lastMessage->created_at : $conv->created_at,
                'last_message' => $lastMessage ? $lastMessage->message : null,
                'message_count' => $this->messageModel->getCountByConversation($conv->id),
                'unread_count' => $unreadCount
            ];
        }, $conversations);

        $this->json(['success' => true, 'conversations' => $formatted]);
    }

    /**
     * Admin: List conversations (legacy view)
     */
    public function adminList(): void
    {
        $this->requireAuth();

        $conversations = $this->conversationModel->getActiveConversations();

        $this->view('chat.admin', [
            'conversations' => $conversations,
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Admin: Send reply
     */
    public function adminReply(): void
    {
        $this->requireAuth();
        $this->validateCsrf();

        $conversationId = (int) ($_POST['conversation_id'] ?? 0);
        $message = trim($_POST['message'] ?? '');

        error_log("=== Admin reply attempt - conversation: $conversationId, message: $message");

        if ($conversationId <= 0 || empty($message)) {
            error_log("ERROR: Admin reply validation failed");
            $this->json(['success' => false, 'error' => 'Invalid input'], 400);
            return;
        }

        // Verify conversation exists
        $conversation = $this->conversationModel->find($conversationId);
        if (!$conversation) {
            error_log("ERROR: Conversation $conversationId not found");
            $this->json(['success' => false, 'error' => 'Conversation not found'], 404);
            return;
        }

        error_log("SUCCESS: Conversation exists, visitor_id: {$conversation->visitor_id}");

        // Create message as agent
        $messageId = $this->messageModel->createMessage([
            'conversation_id' => $conversationId,
            'sender_type' => 'agent',
            'message' => $message
        ]);

        error_log("Admin message creation result: $messageId");

        if ($messageId) {
            // Check if message was actually saved
            $savedMessage = $this->messageModel->find($messageId);
            error_log("Message saved verification: " . ($savedMessage ? 'SUCCESS' : 'FAILED'));
            if ($savedMessage) {
                error_log("Saved message details: ID {$savedMessage->id}, sender {$savedMessage->sender_type}, message: " . substr($savedMessage->message, 0, 50));
            }
        }

        if ($messageId) {
            // Update conversation timestamp
            $this->conversationModel->touch($conversationId);

            error_log("Admin reply successful, message ID: $messageId");
            $this->json([
                'success' => true,
                'message_id' => $messageId
            ]);
        } else {
            error_log("Admin message creation failed");
            $this->json(['success' => false, 'error' => 'Failed to send message'], 500);
        }
    }

    /**
     * Admin: Mark messages as read
     */
    public function adminMarkRead(): void
    {
        $this->requireAuth();

        $conversationId = (int) ($_GET['id'] ?? 0);

        if ($conversationId <= 0) {
            $this->json(['success' => false, 'error' => 'Invalid conversation'], 400);
            return;
        }

        $success = $this->messageModel->markAsRead($conversationId, 'visitor');
        $this->json(['success' => $success]);
    }

    /**
     * Debug endpoint - check database state
     */
    public function debug(): void
    {
        $conversations = $this->conversationModel->all();
        $messages = $this->messageModel->all();

        $debug = [
            'conversations' => $conversations,
            'messages' => $messages,
            'total_conversations' => count($conversations),
            'total_messages' => count($messages)
        ];

        error_log("DEBUG ENDPOINT CALLED:");
        error_log("Conversations: " . count($conversations));
        error_log("Messages: " . count($messages));

        foreach ($conversations as $conv) {
            error_log("Conversation {$conv->id}: visitor {$conv->visitor_id}, user {$conv->user_name}");
        }

        foreach ($messages as $msg) {
            error_log("Message {$msg->id}: conv {$msg->conversation_id}, sender {$msg->sender_type}, msg: " . substr($msg->message, 0, 50));
        }

        $this->json($debug);
    }

    /**
     * Admin: Mark as resolved
     */
    public function adminResolve(): void
    {
        $this->requireAuth();
        $this->validateCsrf();

        $conversationId = (int) ($_POST['conversation_id'] ?? 0);

        if ($conversationId <= 0) {
            $this->json(['success' => false, 'error' => 'Invalid conversation'], 400);
            return;
        }

        $success = $this->conversationModel->markAsResolved($conversationId);
        $this->json(['success' => $success]);
    }

    /**
     * Get or generate visitor ID
     */
    private function getVisitorId(): string
    {
        if (!isset($_SESSION['chat_visitor_id'])) {
            $_SESSION['chat_visitor_id'] = bin2hex(random_bytes(16));
        }
        
        return $_SESSION['chat_visitor_id'];
    }

    /**
     * Admin: Get conversation details
     */
    public function adminConversation(): void
    {
        $this->requireAuth();

        $conversationId = (int) ($_GET['id'] ?? 0);

        if ($conversationId <= 0) {
            $this->redirect('/admin/chat');
            return;
        }

        $conversation = $this->conversationModel->getWithMessages($conversationId);

        if (!$conversation) {
            $this->redirect('/admin/chat');
            return;
        }

        // Mark visitor messages as read
        $this->messageModel->markAsRead($conversationId, 'visitor');

        $this->view('chat.conversation', [
            'conversation' => $conversation,
            'current_user' => $this->getCurrentUser(),
            'csrf_token' => $this->generateCsrf()
        ]);
    }
}