-- Media Library Schema
-- Run this SQL to create the media library tables

-- Media Library Table
CREATE TABLE IF NOT EXISTS `media_library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `original_filename` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `file_size` int(11) DEFAULT NULL COMMENT 'File size in bytes',
  `mime_type` varchar(100) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `visibility` enum('public','private') DEFAULT 'public',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `uploaded_by` (`uploaded_by`),
  KEY `mime_type` (`mime_type`),
  FOREIGN KEY (`uploaded_by`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Media library for images and files';

-- Media Attachments Table (links media to entities like routes, locations, etc.)
CREATE TABLE IF NOT EXISTS `media_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` int(11) NOT NULL,
  `entity_type` varchar(50) NOT NULL COMMENT 'route, location, blog_post, etc.',
  `entity_id` int(11) NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0 COMMENT 'Is this the featured/primary image',
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_attachment` (`media_id`, `entity_type`, `entity_id`),
  KEY `entity` (`entity_type`, `entity_id`),
  KEY `media_id` (`media_id`),
  FOREIGN KEY (`media_id`) REFERENCES `media_library`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Links media to entities';

-- Add media_id column to routes table (for primary/featured image)
ALTER TABLE `routes`
ADD COLUMN `featured_image_id` int(11) DEFAULT NULL AFTER `media_id`,
ADD KEY `featured_image_id` (`featured_image_id`);

-- Add media_id column to locations table (for primary image)
ALTER TABLE `locations`
ADD COLUMN `featured_image_id` int(11) DEFAULT NULL AFTER `media_id`,
ADD KEY `featured_image_id` (`featured_image_id`);

-- Create uploads directory structure (note: this needs to be done via file system)
-- mkdir -p public/uploads/routes
-- mkdir -p public/uploads/locations
-- mkdir -p public/uploads/blog
-- mkdir -p public/uploads/media

-- Sample data (optional)
-- INSERT INTO `media_library` (`filename`, `original_filename`, `file_path`, `file_size`, `mime_type`, `uploaded_by`, `alt_text`)
-- VALUES
-- ('everest-base-camp.jpg', 'everest-base-camp.jpg', '/uploads/routes/everest-base-camp.jpg', 245678, 'image/jpeg', 1, 'Everest Base Camp Trek'),
-- ('annapurna-circuit.jpg', 'annapurna-circuit.jpg', '/uploads/routes/annapurna-circuit.jpg', 198765, 'image/jpeg', 1, 'Annapurna Circuit Trek');
