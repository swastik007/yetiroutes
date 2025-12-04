-- Migration: Add route_type field to routes table
-- Date: 2024-12-04
-- Purpose: Differentiate between treks, tours, expeditions, and day trips

USE yetiroutes;

-- Add route_type column to routes table
ALTER TABLE `routes`
ADD COLUMN `route_type` ENUM('trek', 'tour', 'expedition', 'day_trip')
DEFAULT 'trek'
AFTER `terrain_type`;

-- Update existing routes based on duration (optional - adjust as needed)
-- Short duration routes (1-3 days) -> day_trip
UPDATE `routes`
SET `route_type` = 'day_trip'
WHERE `duration_days` <= 3;

-- Medium duration routes (4-7 days) -> tour
UPDATE `routes`
SET `route_type` = 'tour'
WHERE `duration_days` BETWEEN 4 AND 7;

-- Long duration routes (8-15 days) -> trek
UPDATE `routes`
SET `route_type` = 'trek'
WHERE `duration_days` BETWEEN 8 AND 15;

-- Very long duration routes (16+ days) -> expedition
UPDATE `routes`
SET `route_type` = 'expedition'
WHERE `duration_days` >= 16;

-- Display results
SELECT
    route_type,
    COUNT(*) AS count,
    AVG(duration_days) AS avg_duration
FROM routes
GROUP BY route_type;

-- Success message
SELECT 'Migration completed successfully! route_type field added to routes table.' AS Status;
