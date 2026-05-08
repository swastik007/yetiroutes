-- Multi-Language Migration
-- Run this if you haven't imported Schema V17 yet

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` char(2) NOT NULL, -- "en", "fr", "de"
  `name` varchar(50) NOT NULL, -- "English", "Français"
  `flag_icon` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `is_default` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- The Polymorphic Translation Table
CREATE TABLE IF NOT EXISTS `content_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `entity_type` enum('route', 'blog_post', 'faq', 'lodge', 'location', 'page') NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL,
  `language_code` char(2) NOT NULL,
  `field_name` varchar(50) NOT NULL, -- e.g. "title", "description"
  `translation_value` longtext NOT NULL,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_translation` (`entity_type`, `entity_id`, `language_code`, `field_name`),
  FOREIGN KEY (`language_code`) REFERENCES `languages` (`code`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed default languages
INSERT IGNORE INTO `languages` (`code`, `name`, `is_active`, `is_default`) VALUES
('en', 'English', 1, 1),
('fr', 'Français', 1, 0),
('de', 'Deutsch', 1, 0);
