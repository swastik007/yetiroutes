-- Initial Data Setup for Yeti Routes Admin Panel
-- Run this after importing schema-v17.md

USE yetiroutes;

-- 1. Create Default Roles
INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Guide'),
(4, 'Customer');

-- 2. Create Default Permissions
INSERT INTO `permissions` (`slug`, `description`) VALUES
('manage_users', 'Manage Users'),
('manage_routes', 'Manage Routes'),
('manage_bookings', 'Manage Bookings'),
('manage_blog', 'Manage Blog'),
('manage_media', 'Manage Media Library'),
('view_dashboard', 'View Dashboard');

-- 3. Assign All Permissions to Super Admin
INSERT INTO `role_permissions` (`role_id`, `permission_id`)
SELECT 1, id FROM `permissions`;

-- 4. Create Admin User
-- Email: admin@yetiroutes.com
-- Password: password (change this in production!)
INSERT INTO `users` (`role_id`, `email`, `password_hash`, `full_name`, `phone`, `is_active`) VALUES
(1, 'admin@yetiroutes.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin User', '+977-9841234567', 1);

-- 5. Create Sample Locations
INSERT INTO `locations` (`parent_id`, `name`, `slug`, `latitude`, `longitude`) VALUES
(NULL, 'Nepal', 'nepal', 27.7172, 85.3240),
(NULL, 'Tibet', 'tibet', 29.6520, 91.1720);

SET @nepal_id = (SELECT id FROM locations WHERE slug = 'nepal');

INSERT INTO `locations` (`parent_id`, `name`, `slug`, `latitude`, `longitude`) VALUES
(@nepal_id, 'Everest Region', 'everest-region', 27.9881, 86.9250),
(@nepal_id, 'Annapurna Region', 'annapurna-region', 28.5967, 83.8200),
(@nepal_id, 'Langtang Region', 'langtang-region', 28.2096, 85.5500);

-- 6. Create Sample Languages (V17 Multi-Language)
INSERT INTO `languages` (`code`, `name`, `flag_icon`, `is_active`, `is_default`) VALUES
('en', 'English', 'flag-us', 1, 1),
('fr', 'Français', 'flag-fr', 1, 0),
('de', 'Deutsch', 'flag-de', 1, 0);

-- 7. Create Sample Blog Category
INSERT INTO `blog_categories` (`name`, `slug`) VALUES
('Trekking Tips', 'trekking-tips'),
('Culture & Heritage', 'culture-heritage'),
('Safety & Preparation', 'safety-preparation');

-- 8. Create Sample FAQ Category
INSERT INTO `faq_categories` (`name`) VALUES
('General Questions'),
('Booking & Payment'),
('Trek Preparation'),
('Safety & Emergency');

-- 9. Create Sample Sustainability Project
INSERT INTO `sustainability_projects` (`name`, `description`, `cost_per_unit_usd`) VALUES
('Tree Planting Program', 'Plant native trees in the Himalayan region to offset carbon footprint', 10.00),
('Clean Mountain Initiative', 'Support waste management and cleanup efforts on trekking routes', 15.00),
('Local School Support', 'Contribute to education in mountain villages', 20.00);

-- 10. Create Sample Route (Everest Base Camp)
SET @everest_region_id = (SELECT id FROM locations WHERE slug = 'everest-region');

INSERT INTO `routes` (
    `location_id`, `title`, `slug`, `difficulty`, `duration_days`,
    `max_altitude_meters`, `best_season`, `terrain_type`,
    `fitness_score_required`, `base_price`, `currency`,
    `short_description`, `full_description`,
    `highlights`, `inclusions`, `exclusions`,
    `is_featured`, `is_active`, `meta_title`, `meta_description`
) VALUES (
    @everest_region_id,
    'Everest Base Camp Trek',
    'everest-base-camp-trek',
    'challenging',
    14,
    5364,
    'March-May, September-November',
    'mixed',
    7,
    1299.00,
    'USD',
    'Trek to the base of the world\'s highest mountain on this iconic 14-day adventure.',
    'Experience the thrill of standing at Everest Base Camp (5,364m) on this classic trek through the Khumbu region. Walk in the footsteps of legendary mountaineers, visit ancient Buddhist monasteries, and immerse yourself in Sherpa culture. This challenging trek offers breathtaking views of Everest, Lhotse, Nuptse, and Ama Dablam.',
    '["Stand at Everest Base Camp (5,364m)", "Stunning views of Mt. Everest, Lhotse, and Ama Dablam", "Visit Tengboche Monastery", "Experience Sherpa culture in Namche Bazaar", "Sunrise from Kala Patthar (5,545m)"]',
    '["Airport transfers", "Teahouse accommodation", "All meals during trek", "Experienced guide and porter", "Trekking permits", "First aid kit"]',
    '["International flights", "Nepal visa fee", "Travel insurance", "Personal expenses", "Tips for guides/porters"]',
    1,
    1,
    'Everest Base Camp Trek - 14 Days | Yeti Routes',
    'Trek to Everest Base Camp with experienced guides. 14-day adventure to the world\'s highest mountain base camp. Book your Himalayan trek today!'
);

-- 11. Create Sample Departure for EBC Trek
SET @ebc_route_id = (SELECT id FROM routes WHERE slug = 'everest-base-camp-trek');

INSERT INTO `departures` (
    `route_id`, `start_date`, `end_date`, `price`,
    `seats_total`, `seats_booked`, `group_type`, `is_guaranteed`
) VALUES
(@ebc_route_id, '2025-03-15', '2025-03-28', 1299.00, 12, 3, 'small_group', 1),
(@ebc_route_id, '2025-04-10', '2025-04-23', 1299.00, 12, 5, 'small_group', 1),
(@ebc_route_id, '2025-09-20', '2025-10-03', 1399.00, 12, 2, 'small_group', 0),
(@ebc_route_id, '2025-10-15', '2025-10-28', 1399.00, 12, 7, 'small_group', 1);

-- 12. Create Sample Tags
INSERT INTO `semantic_tags` (`name`, `icon_class`) VALUES
('High Altitude', 'fa-mountain'),
('Cultural Trek', 'fa-temple'),
('Moderate Difficulty', 'fa-hiking'),
('Family Friendly', 'fa-users'),
('Off the Beaten Path', 'fa-compass');

-- 13. Create Sample Rental Gear
INSERT INTO `rental_gear` (`item_name`, `daily_price`, `stock_quantity`) VALUES
('Sleeping Bag (-20°C)', 5.00, 20),
('Trekking Poles (Pair)', 3.00, 30),
('Down Jacket', 7.00, 25),
('Duffel Bag (70L)', 4.00, 15),
('Crampons', 6.00, 10);

COMMIT;

-- Display Success Message
SELECT 'Initial data setup completed successfully!' AS Status;
SELECT COUNT(*) AS 'Total Users' FROM users;
SELECT COUNT(*) AS 'Total Locations' FROM locations;
SELECT COUNT(*) AS 'Total Routes' FROM routes;
SELECT COUNT(*) AS 'Total Departures' FROM departures;
