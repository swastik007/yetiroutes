-- Yeti Routes Master Schema V17 (Global Edition)
-- Includes: V16 Features + Multi-Language Translation Engine
-- Status: FINAL APPROVED for Engineering

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+05:45"; -- Nepal Time

-- ==========================================
-- 1. AUTHENTICATION & SECURITY
-- ==========================================

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL, -- "Super Admin", "Guide"
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `role_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `permission_id`),
  FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 2. SECURE MEDIA LIBRARY (DAM)
-- ==========================================

CREATE TABLE `media_library` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `original_path` varchar(255) NOT NULL,
  `variants` json NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `uploaded_by` bigint(20) UNSIGNED DEFAULT NULL,
  `visibility` enum('public', 'private') NOT NULL DEFAULT 'public',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 3. USERS & LOYALTY (QA Fixed)
-- ==========================================

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `whatsapp_number` varchar(20) DEFAULT NULL,
  `two_factor_secret` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  
  -- V17: Language Preference
  `preferred_language` char(2) DEFAULT 'en', -- "fr", "de"
  
  -- V15 UI Patch: Avatar
  `avatar_media_id` bigint(20) UNSIGNED DEFAULT NULL,
  
  -- Loyalty Snapshot (Current Balance)
  `loyalty_points_balance` int(11) DEFAULT 0,
  
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  FOREIGN KEY (`avatar_media_id`) REFERENCES `media_library` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- QA FIX: Loyalty Ledger for Audit Trail
CREATE TABLE `loyalty_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `points` int(11) NOT NULL, -- Positive (Earned) or Negative (Spent)
  `description` varchar(255) NOT NULL, -- "Booked Everest Trek"
  `reference_booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_sessions` (
  `id` varchar(128) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` text,
  `last_activity` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `api_keys` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `key_prefix` varchar(10) NOT NULL,
  `key_hash` varchar(64) NOT NULL,
  `scopes` json DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 4. MEDIA LINKING & LOCATION
-- ==========================================

CREATE TABLE `media_attachments` (
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `entity_type` enum('route', 'blog', 'user', 'lodge', 'booking', 'testimonial', 'team') NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `sort_order` int(11) DEFAULT 0,
  PRIMARY KEY (`media_id`, `entity_type`, `entity_id`),
  FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) UNSIGNED DEFAULT NULL, -- QA FIX: Hierarchical Locations (Nepal > Annapurna)
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `latitude` decimal(10, 8) DEFAULT NULL,
  `longitude` decimal(11, 8) DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`),
  FOREIGN KEY (`parent_id`) REFERENCES `locations` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `trail_status` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `location_id` int(10) UNSIGNED NOT NULL,
  `status` enum('open', 'caution', 'closed') NOT NULL DEFAULT 'open',
  `message` varchar(255) NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 5. PRODUCT ENGINE (Routes & Sustainability)
-- ==========================================

CREATE TABLE `sustainability_projects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `cost_per_unit_usd` decimal(10,2) NOT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `location_id` int(10) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `difficulty` enum('easy','moderate','challenging','extreme') NOT NULL,
  `duration_days` int(11) NOT NULL,
  `max_altitude_meters` int(11) DEFAULT NULL,
  `best_season` varchar(255) DEFAULT NULL,
  `terrain_type` enum('snow','forest','desert','mixed') DEFAULT 'mixed',
  `fitness_score_required` tinyint(1) DEFAULT 5,
  `carbon_footprint_kg` int(11) DEFAULT 0,
  
  -- Pricing
  `base_price` decimal(10,2) NOT NULL,
  `currency` char(3) DEFAULT 'USD',
  `price_transparency_data` json DEFAULT NULL,
  
  -- Content
  `short_description` text NOT NULL,
  `full_description` longtext NOT NULL,
  `highlights` json DEFAULT NULL,
  `inclusions` json DEFAULT NULL,
  `exclusions` json DEFAULT NULL,
  
  -- Features
  `emergency_contact_info` text DEFAULT NULL,
  `nearest_hospital` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  
  -- Media
  `video_url` varchar(255) DEFAULT NULL,
  `map_embed_code` text DEFAULT NULL,
  `map_3d_url` varchar(255) DEFAULT NULL,
  
  -- SEO
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`),
  INDEX `idx_featured` (`is_featured`, `is_active`) -- Performance Index
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- V15 UI Patch: Wishlists
CREATE TABLE `user_wishlists` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`, `route_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- V15 UI Patch: View History (QA FIX: Added session_id for Guests)
CREATE TABLE `user_view_history` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL, 
  `session_id` varchar(128) DEFAULT NULL, -- For tracking guests
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `viewed_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_history_lookup` (`user_id`, `session_id`, `viewed_at`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 6. CONTENT, REVIEWS & TAGS
-- ==========================================

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL, -- Set Null if user deleted
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `excerpt` text,
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `published_at` datetime DEFAULT NULL,
  `views_count` int(11) DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`),
  FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- QA FIX: Verified Reviews
CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `route_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL, -- Link to verified purchaser
  `user_name` varchar(100) NOT NULL, -- Fallback name
  `user_avatar_url` varchar(255) DEFAULT NULL, -- Fallback avatar
  `rating` tinyint(1) NOT NULL CHECK (rating BETWEEN 1 AND 5),
  `comment` text NOT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE SET NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `semantic_tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `icon_class` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `route_tags` (
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`route_id`, `tag_id`),
  FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`tag_id`) REFERENCES `semantic_tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 7. LOGISTICS & HOTELS
-- ==========================================

CREATE TABLE `team_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gender` enum('male', 'female', 'other') DEFAULT 'male',
  `position` varchar(100) NOT NULL,
  `bio` text,
  `experience_years` int(11) DEFAULT 0,
  `languages` varchar(255) DEFAULT NULL,
  `photo_media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `intro_video_media_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `route_itineraries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `day_number` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `overnight_altitude_meters` int(11) NOT NULL,
  `is_acclimatization_day` tinyint(1) DEFAULT 0,
  `latitude` decimal(10, 8) DEFAULT NULL,
  `longitude` decimal(11, 8) DEFAULT NULL,
  `audio_ambiance_media_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`audio_ambiance_media_id`) REFERENCES `media_library` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `lodges` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `location_id` int(10) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price_range` varchar(50) DEFAULT NULL,
  `internet_speed_mbps` int(11) DEFAULT 0,
  `amenities` json DEFAULT NULL,
  `contact_info_private` text,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `permits` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `is_fnrts_required` tinyint(1) DEFAULT 0,
  `nationality_price_rules` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `route_permits` (
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `permit_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`route_id`, `permit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 8. INVENTORY & SMART PACKING
-- ==========================================

CREATE TABLE `departures` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `seats_total` int(11) NOT NULL DEFAULT 12,
  `seats_booked` int(11) NOT NULL DEFAULT 0,
  `group_type` enum('private', 'small_group', 'mixed') DEFAULT 'small_group',
  `is_women_only` tinyint(1) DEFAULT 0,
  `is_guaranteed` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `rental_gear` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_name` varchar(100) NOT NULL,
  `daily_price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `packing_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `category` enum('clothing','gear','medical','documents','electronics') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `required_seasons` json DEFAULT NULL,
  `required_terrains` json DEFAULT NULL,
  `is_essential` tinyint(1) DEFAULT 1,
  `rental_gear_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`rental_gear_id`) REFERENCES `rental_gear` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 9. TRANSACTIONS & REWARDS (QA Fixed)
-- ==========================================

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_reference` varchar(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `departure_id` bigint(20) UNSIGNED NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `booking_status` enum('pending','confirmed','cancelled','completed') DEFAULT 'pending',
  `payment_status` enum('unpaid','partial','fully_paid') DEFAULT 'unpaid',
  
  -- QA FIX: Multi-Currency Support
  `total_amount` decimal(10,2) NOT NULL,
  `currency` char(3) NOT NULL DEFAULT 'USD', 
  `exchange_rate_to_usd` decimal(10,4) DEFAULT 1.0000, 
  
  `carbon_offset_project_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `booking_ref` (`booking_reference`),
  FOREIGN KEY (`carbon_offset_project_id`) REFERENCES `sustainability_projects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `booking_payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `payer_name` varchar(100) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `currency` char(3) NOT NULL DEFAULT 'USD', -- Track payment currency
  `transaction_reference` varchar(100) NOT NULL,
  `payment_method` enum('stripe', 'bank_transfer', 'wise', 'khalti') NOT NULL,
  `paid_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `booking_line_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `item_type` enum('trip_fare', 'permit', 'rental_gear', 'insurance_surcharge', 'carbon_offset') NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `badges` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `icon_url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `criteria_route_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_badges` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `badge_id` int(10) UNSIGNED NOT NULL,
  `awarded_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 10. MARKETING & INQUIRIES
-- ==========================================

CREATE TABLE `faq_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT (`question`, `answer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `route_faq_links` (
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `faq_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`route_id`, `faq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `preferences` json DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `ip_address` varchar(45) NOT NULL,
  `subscribed_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` enum('general', 'route', 'lodge', 'custom_plan') NOT NULL,
  `route_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lodge_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `message` text,
  `status` enum('new', 'contacted', 'converted', 'archived') DEFAULT 'new',
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE SET NULL,
  FOREIGN KEY (`lodge_id`) REFERENCES `lodges` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 11. SECURITY LOGS
-- ==========================================

CREATE TABLE `login_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `attempt_time` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_ip` (`ip_address`, `attempt_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `api_key_id` int(10) UNSIGNED DEFAULT NULL,
  `action` varchar(50) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `old_value` json DEFAULT NULL,
  `new_value` json DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 12. MULTI-LANGUAGE ENGINE (V17 New Additions)
-- ==========================================

CREATE TABLE `languages` (
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
-- Stores translations for Routes, Blogs, FAQs, etc.
CREATE TABLE `content_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `entity_type` enum('route', 'blog_post', 'faq', 'lodge', 'location', 'page') NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL,
  `language_code` char(2) NOT NULL, -- Links to languages.code
  `field_name` varchar(50) NOT NULL, -- e.g. "title", "description", "answer"
  `translation_value` longtext NOT NULL,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_translation` (`entity_type`, `entity_id`, `language_code`, `field_name`),
  FOREIGN KEY (`language_code`) REFERENCES `languages` (`code`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;