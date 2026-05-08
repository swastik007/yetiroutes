-- Migration to add Chat functionality
-- Reverse engineered from App\Models\ChatConversation and App\Models\ChatMessage

CREATE TABLE `chat_conversations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `visitor_id` varchar(64) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `status` enum('active', 'resolved') NOT NULL DEFAULT 'active',
  `page_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_visitor` (`visitor_id`),
  INDEX `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `sender_type` enum('visitor', 'agent') NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`conversation_id`) REFERENCES `chat_conversations` (`id`) ON DELETE CASCADE,
  INDEX `idx_conversation` (`conversation_id`),
  INDEX `idx_unread` (`conversation_id`, `sender_type`, `is_read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
