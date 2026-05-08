-- ============================================
-- Migration: Add Itinerary & Notice Fields to Routes
-- Generated: 2026-01-20
-- ============================================

-- Step 1: Add new columns to routes table
ALTER TABLE `routes`
    ADD COLUMN `short_itinerary` TEXT NULL AFTER `full_description`,
    ADD COLUMN `long_itinerary` JSON NULL AFTER `short_itinerary`,
    ADD COLUMN `packing_list` JSON NULL AFTER `exclusions`,
    ADD COLUMN `traveler_notes` TEXT NULL AFTER `packing_list`,
    ADD COLUMN `important_notice` TEXT NULL AFTER `traveler_notes`;

-- Step 2: Drop unused route_itineraries table
DROP TABLE IF EXISTS `route_itineraries`;

-- Step 3: Verify the changes
DESCRIBE `routes`;

-- ============================================
-- COLUMN EXPLANATIONS:
-- ============================================
-- short_itinerary: Brief text summary like "Lukla > Namche > Tengboche > EBC > Return"
--
-- long_itinerary: JSON structure for day-by-day details
-- Example format:
-- [
--   {
--     "day": 1,
--     "title": "Arrive Kathmandu",
--     "description": "Airport pickup, hotel check-in, briefing",
--     "altitude": "1400m",
--     "meals": "Dinner included",
--     "accommodation": "3-star hotel",
--     "notice": "Bring passport copies for permit processing"
--   },
--   {
--     "day": 2,
--     "title": "Fly to Lukla, trek to Phakding",
--     "description": "Early morning flight...",
--     "altitude": "2650m",
--     "walking_hours": "3-4 hours",
--     "meals": "All meals",
--     "accommodation": "Teahouse",
--     "notice": ""
--   }
-- ]
--
-- packing_list: JSON structure for categorized items
-- Example format:
-- {
--   "clothing": ["Base layers", "Down jacket", "Waterproof shell"],
--   "footwear": ["Hiking boots", "Camp sandals", "Thermal socks"],
--   "gear": ["Sleeping bag", "Headlamp", "Trekking poles"],
--   "personal": ["Sunscreen", "First aid kit", "Toiletries"],
--   "documents": ["Passport", "Insurance copy", "Passport photos"]
-- }
--
-- traveler_notes: General helpful text for travelers
-- important_notice: Urgent info (weather alerts, permit changes, etc.)
