-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2025 at 06:24 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yetiroutes`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int UNSIGNED NOT NULL,
  `media_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon_class` varchar(100) DEFAULT NULL,
  `short_description` text NOT NULL,
  `full_description` longtext,
  `duration` varchar(100) DEFAULT NULL,
  `difficulty` enum('easy','moderate','challenging','extreme') DEFAULT 'moderate',
  `price_from` decimal(10,2) DEFAULT NULL,
  `currency` char(3) DEFAULT 'USD',
  `best_season` varchar(255) DEFAULT NULL,
  `group_size_min` int DEFAULT '1',
  `group_size_max` int DEFAULT '20',
  `highlights` json DEFAULT NULL,
  `inclusions` json DEFAULT NULL,
  `exclusions` json DEFAULT NULL,
  `requirements` text,
  `location` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `display_order` int DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `media_id`, `title`, `slug`, `icon_class`, `short_description`, `full_description`, `duration`, `difficulty`, `price_from`, `currency`, `best_season`, `group_size_min`, `group_size_max`, `highlights`, `inclusions`, `exclusions`, `requirements`, `location`, `is_featured`, `is_active`, `display_order`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Meditation Tour', 'meditation-tour', 'ri-flower-line', 'Find inner peace in mountain monasteries and sacred sites', 'Embark on a spiritual journey through Nepal\'s most sacred sites. Visit ancient monasteries, participate in meditation sessions led by Buddhist monks, and experience the profound tranquility of the Himalayas. This tour combines spiritual practice with cultural immersion, offering a unique opportunity to disconnect from the modern world and reconnect with your inner self.', '3-7 days', 'easy', 250.00, 'USD', 'Year-round', 1, 10, '[\"Visit sacred Buddhist monasteries\", \"Guided meditation sessions\", \"Meet with Buddhist monks\", \"Explore spiritual sites\", \"Learn mindfulness techniques\", \"Peaceful mountain settings\"]', '[\"Experienced spiritual guide\", \"Monastery visits\", \"Meditation sessions\", \"Accommodation\", \"Meals during tour\", \"Transportation\"]', '[\"Personal expenses\", \"Tips\", \"Travel insurance\"]', 'Open mind and willingness to learn', 'Kathmandu Valley & Surrounding Areas', 1, 1, 1, 'Meditation Tour in Nepal - Inner Peace & Spiritual Journey', 'Experience deep meditation and spiritual awakening in Nepal\'s sacred monasteries. Guided tours with Buddhist monks.', '2025-12-04 14:43:34', '2025-12-04 14:43:34'),
(2, NULL, 'Mountain Cycling', 'mountain-cycling', 'ri-bike-line', 'Ride through scenic mountain trails and villages', 'Experience the thrill of mountain biking through Nepal\'s diverse landscapes. From challenging mountain passes to gentle village trails, this activity offers routes for all skill levels. Ride through traditional villages, terraced farmlands, and forests while enjoying spectacular mountain views. Our experienced guides ensure safety while you explore some of the best cycling routes in the Himalayas.', '1-7 days', 'moderate', 150.00, 'USD', 'March-May, September-November', 2, 15, '[\"Scenic mountain trails\", \"Traditional village visits\", \"Professional guide\", \"Quality mountain bikes\", \"Safety equipment\", \"Flexible routes\"]', '[\"Mountain bike rental\", \"Safety gear\", \"Professional guide\", \"Support vehicle\", \"Snacks and water\", \"Basic bike maintenance\"]', '[\"Personal cycling gear\", \"Travel insurance\", \"Meals\", \"Accommodation\"]', 'Basic cycling experience, good physical fitness', 'Kathmandu Valley, Pokhara, Nagarkot', 1, 1, 2, 'Mountain Cycling in Nepal - Himalayan Bike Tours', 'Explore Nepal on two wheels! Mountain biking tours through scenic trails, villages, and mountain passes.', '2025-12-04 14:43:34', '2025-12-04 14:43:34'),
(3, NULL, 'Hiking', 'hiking', 'ri-walk-line', 'Explore beautiful trails suitable for all fitness levels', 'Discover Nepal\'s natural beauty through our curated hiking routes. Whether you\'re a beginner or experienced hiker, we offer trails that showcase stunning landscapes, traditional villages, and breathtaking mountain views. Our day hikes and multi-day excursions are perfect for those who want to experience the Himalayas without committing to a full trek.', 'Half-day to 5 days', 'easy', 50.00, 'USD', 'Year-round (best in Spring & Autumn)', 1, 20, '[\"Suitable for beginners\", \"Stunning mountain views\", \"Village encounters\", \"Nature photography opportunities\", \"Flexible itineraries\", \"Expert local guides\"]', '[\"Professional guide\", \"Permits if required\", \"First aid kit\", \"Basic snacks and water\"]', '[\"Meals\", \"Accommodation\", \"Personal gear\", \"Travel insurance\"]', 'Comfortable walking shoes, basic fitness', 'Kathmandu Valley, Pokhara, Nagarkot, Dhulikhel', 1, 1, 3, 'Hiking in Nepal - Day Hikes & Nature Walks', 'Experience Nepal\'s beauty through guided hiking tours. Trails for all fitness levels with stunning Himalayan views.', '2025-12-04 14:43:34', '2025-12-04 14:43:34'),
(4, NULL, 'Jungle Safari', 'jungle-safari', 'ri-bus-line', 'Encounter wildlife in pristine national parks', 'Venture into Nepal\'s lowland jungles for an unforgettable wildlife experience. Chitwan and Bardia National Parks offer opportunities to spot one-horned rhinos, Bengal tigers, elephants, and hundreds of bird species. Activities include jeep safaris, jungle walks, canoe rides, and visits to elephant breeding centers. Experience the rich biodiversity of the Terai region.', '2-4 days', 'easy', 350.00, 'USD', 'October-March (dry season)', 2, 10, '[\"One-horned rhino sightings\", \"Bengal tiger territory\", \"Elephant encounters\", \"Jeep safaris\", \"Canoe rides\", \"Bird watching\", \"Tharu cultural program\"]', '[\"National park entrance fee\", \"Accommodation in jungle lodge\", \"All meals\", \"Jeep safari\", \"Nature walks\", \"Canoe ride\", \"Professional naturalist guide\"]', '[\"Travel to/from national park\", \"Tips\", \"Personal expenses\", \"Travel insurance\"]', 'No special requirements, suitable for families', 'Chitwan National Park, Bardia National Park', 1, 1, 4, 'Jungle Safari Nepal - Chitwan & Bardia Wildlife Tours', 'Experience Nepal\'s wildlife! Jungle safaris in Chitwan and Bardia. Spot rhinos, tigers, and elephants in their natural habitat.', '2025-12-04 14:43:34', '2025-12-04 14:43:34'),
(5, NULL, 'One Day Hike', 'one-day-hike', 'ri-compass-3-line', 'Perfect day trips around Kathmandu valley', 'Escape the city for a day and explore the beautiful hills surrounding Kathmandu. Our one-day hikes are perfect for travelers with limited time. Popular destinations include Nagarkot for sunrise views, Shivapuri National Park for nature walks, and Champadevi Hill for panoramic views. These hikes offer a perfect blend of nature, culture, and stunning mountain vistas.', '1 day (6-8 hours)', 'easy', 40.00, 'USD', 'Year-round', 1, 15, '[\"Sunrise/sunset views\", \"Close to Kathmandu\", \"No special equipment needed\", \"Mountain panoramas\", \"Local village interactions\", \"Perfect for beginners\"]', '[\"Hotel pickup/drop-off\", \"Professional guide\", \"Transportation\", \"Basic refreshments\", \"National park entry (if applicable)\"]', '[\"Lunch\", \"Personal expenses\", \"Tips\"]', 'Basic fitness, comfortable walking shoes', 'Nagarkot, Shivapuri, Champadevi, Phulchowki', 1, 1, 5, 'One Day Hike Near Kathmandu - Day Trip Adventures', 'Quick escape from Kathmandu! One-day hiking tours to Nagarkot, Shivapuri, and more. Perfect for busy travelers.', '2025-12-04 14:43:34', '2025-12-04 14:43:34'),
(6, NULL, 'Bungee Jumping', 'bungee-jumping', 'ri-parachute-line', 'Take the leap from Nepal\'s highest bungee platform', 'Experience the ultimate adrenaline rush with bungee jumping in Nepal! Located just 3 hours from Kathmandu, The Last Resort offers one of the highest bungee jumps in the world at 160 meters above the Bhote Koshi River. Safety is our top priority with certified instructors and international safety standards. This is a once-in-a-lifetime experience that will leave you with unforgettable memories and a sense of achievement.', 'Half day', 'extreme', 100.00, 'USD', 'October-April (best weather)', 1, 1, '[\"160-meter free fall\", \"Spectacular gorge location\", \"International safety standards\", \"Professional video/photos available\", \"Certificate of bravery\", \"Scenic location\"]', '[\"Safety equipment\", \"Professional instructors\", \"Certificate\", \"Free refreshments\", \"Transportation from Kathmandu available\"]', '[\"Transportation (can be arranged)\", \"Video/photos package\", \"Meals\", \"Travel insurance (mandatory)\"]', 'Age 13+, weight 40-120 kg, medical fitness required', 'The Last Resort, Bhote Koshi River', 1, 1, 6, 'Bungee Jumping Nepal - The Last Resort Adventure', 'Take the leap! Experience Nepal\'s highest bungee jump at 160 meters. Safe, thrilling, and unforgettable.', '2025-12-04 14:43:34', '2025-12-04 14:43:34'),
(7, NULL, 'Hot Air Balloon', 'hot-air-balloon', 'ri-flight-takeoff-line', 'Soar above the Himalayas with breathtaking aerial views', 'Float peacefully above the Kathmandu Valley or Pokhara as the sun rises over the Himalayas. Hot air ballooning offers a unique perspective of Nepal\'s stunning landscapes, terraced fields, and traditional villages. This serene experience combines adventure with tranquility, providing unmatched photo opportunities and a bird\'s-eye view of the world\'s highest mountains.', '3-4 hours (including setup)', 'easy', 200.00, 'USD', 'October-March (clear skies)', 1, 10, '[\"Sunrise flight over Himalayas\", \"360-degree panoramic views\", \"Peaceful aerial experience\", \"Professional pilot\", \"Celebration champagne\", \"Flight certificate\"]', '[\"Hot air balloon ride (1 hour)\", \"Safety briefing\", \"Professional pilot\", \"Transport to/from launch site\", \"Champagne celebration\", \"Flight certificate\"]', '[\"Hotel pickup (can be arranged)\", \"Video/photos package\", \"Travel insurance\"]', 'Age 6+, reasonable fitness to climb into basket', 'Kathmandu Valley, Pokhara', 1, 1, 7, 'Hot Air Balloon Nepal - Himalayan Balloon Flight', 'Float above the Himalayas! Hot air balloon rides over Kathmandu and Pokhara with stunning mountain views.', '2025-12-04 14:43:34', '2025-12-04 14:43:34'),
(8, NULL, 'Mountain Flight', 'mountain-flight', 'ri-plane-line', 'Experience Everest up close from a scenic flight', 'Get up close to the world\'s highest peaks without trekking! Our mountain flights offer guaranteed window seats as you soar past Mount Everest, Lhotse, Makalu, and other Himalayan giants. This one-hour flight departs from Kathmandu and provides spectacular aerial views of snow-capped peaks, glaciers, and high-altitude landscapes. Perfect for those with limited time or physical constraints.', '1 hour', 'easy', 220.00, 'USD', 'October-May (clear weather)', 1, 1, '[\"Close-up views of Mt. Everest\", \"Guaranteed window seat\", \"Professional pilot commentary\", \"Views of 20+ peaks\", \"Perfect for all ages\", \"Weather guarantee policy\"]', '[\"Mountain flight (1 hour)\", \"Guaranteed window seat\", \"Flight certificate\", \"Airport transfers\", \"Pilot commentary\"]', '[\"Video/photos package\", \"Travel insurance\"]', 'No special requirements, suitable for all ages', 'Kathmandu (Tribhuvan International Airport)', 1, 1, 8, 'Everest Mountain Flight - See Everest Without Trekking', 'See Everest without trekking! One-hour mountain flight with guaranteed window seats and views of 8,000m peaks.', '2025-12-04 14:43:34', '2025-12-04 14:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `key_prefix` varchar(10) NOT NULL,
  `key_hash` varchar(64) NOT NULL,
  `scopes` json DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `api_key_id` int UNSIGNED DEFAULT NULL,
  `action` varchar(50) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `old_value` json DEFAULT NULL,
  `new_value` json DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon_url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `criteria_route_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`) VALUES
(1, 'Trekking Tips', 'trekking-tips'),
(2, 'Culture & Heritage', 'culture-heritage'),
(3, 'Safety & Preparation', 'safety-preparation'),
(4, 'Travel News', 'travel-news'),
(5, 'Food & Drink', 'food-and-drink');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `author_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` int UNSIGNED DEFAULT NULL,
  `media_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `excerpt` text,
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `published_at` datetime DEFAULT NULL,
  `views_count` int DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `author_id`, `category_id`, `media_id`, `title`, `slug`, `content`, `excerpt`, `status`, `published_at`, `views_count`, `meta_title`, `meta_description`, `created_at`) VALUES
(1, 101, 1, NULL, '10 Mistakes to Avoid on EBC', 'mistakes-avoid-ebc', '<p>Don\'t walk too fast, don\'t skip acclimatization...</p>', 'Essential tips for a successful Everest trek.', 'published', '2025-01-10 10:00:00', 1240, NULL, NULL, '2025-11-30 16:44:48'),
(2, 101, 3, NULL, 'Ultimate Packing List for Nepal', 'packing-list-nepal', '<p>Layers are key. Bring merino wool...</p>', 'What to bring and what to rent in Kathmandu.', 'published', '2025-01-15 09:00:00', 850, NULL, NULL, '2025-11-30 16:44:48'),
(3, 102, 2, NULL, 'Life of a Porter', 'life-of-porter', '<p>The unsung heroes of the Himalayas...</p>', 'An interview with our head porter regarding mountain life.', 'published', '2025-02-01 12:00:00', 430, NULL, NULL, '2025-11-30 16:44:48'),
(10, 101, 1, NULL, 'How to Train for Everest Base Camp: A 3-Month Plan', 'training-for-everest-base-camp', '<h2>Why Training Matters</h2><p>Trekking to Everest Base Camp is an endurance challenge, not a sprint. You will be walking 5-7 hours a day for two weeks at high altitude.</p><h2>Month 1: Building the Base</h2><p>Focus on cardio. Long walks, hiking on weekends, and stair climbing. Aim for 3 sessions a week.</p><h2>Month 2: Strength & Stamina</h2><p>Add weight to your pack. Start carrying 5-8kg during your hikes to simulate the day pack you will carry in Nepal.</p><h2>Month 3: Tapering Off</h2><p>Two weeks before the trip, reduce intensity to avoid injury.</p>', 'You do not need to be an athlete to trek to EBC, but you do need endurance. Here is our step-by-step training guide.', 'published', '2025-01-05 10:00:00', 1540, 'Training for Everest Base Camp | Yeti Routes', 'A complete 3-month training guide for the Everest Base Camp trek. Learn exercises for endurance, strength, and altitude preparation.', '2025-12-01 07:04:11'),
(11, 101, 3, NULL, 'Boots vs. Trail Runners: What to Wear in Nepal?', 'boots-vs-trail-runners-nepal', '<h2>The Case for Boots</h2><p>For high passes like Three Passes or Manaslu in winter, boots offer ankle support and warmth. They are essential if you are using crampons.</p><h2>The Case for Trail Runners</h2><p>For standardized trails like Poon Hill or the lower EBC trail, trail runners are lighter and reduce fatigue.</p><h2>Our Verdict</h2><p>If you are trekking below 5000m in peak season, light hiking shoes are fine. Above that, bring sturdy boots.</p>', 'The debate continues. Should you wear heavy leather boots or light trail runners? The answer depends on your trek.', 'published', '2025-01-12 09:30:00', 890, 'Best Footwear for Nepal Trekking | Boots vs Trail Runners', 'Deciding between hiking boots and trail runners for your Nepal trek? We break down the pros and cons based on terrain and season.', '2025-12-01 07:04:11'),
(12, 102, 2, NULL, 'Beyond the Mountains: Understanding Mani Stones', 'understanding-mani-stones', '<h2>Om Mani Padme Hum</h2><p>The most common mantra carved into these stones is \"Om Mani Padme Hum\", the mantra of compassion. These stones are placed by locals as a form of prayer.</p><h2>The Golden Rule</h2><p><strong>Always pass Mani walls on the left.</strong> In Buddhist tradition, we walk clockwise around sacred objects (circumambulation) to show respect.</p>', 'You will see them everywhere on the trail—stone tablets carved with mantras. Here is what they mean and how to respect them.', 'published', '2025-01-20 14:15:00', 620, 'What are Mani Stones? Nepal Trekking Culture', 'Learn the significance of Mani stones and prayer wheels in the Himalayas. Discover why you must always pass them on the left.', '2025-12-01 07:04:11'),
(13, 102, 5, NULL, 'Dal Bhat Power: Why It Is The Best Trekking Food', 'dal-bhat-power-24-hour', '<h2>What is Dal Bhat?</h2><p>It is a lentil soup (Dal) served with steamed rice (Bhat) and vegetable curry (Tarkari). It is high in carbohydrates and protein.</p><h2>Unlimited Refills</h2><p>The best part about ordering Dal Bhat at a teahouse? It is the only item on the menu that comes with free refills of rice and lentils. Perfect for hungry trekkers!</p>', 'There is a saying in Nepal: \"Dal Bhat Power, 24 Hour.\" Here is why this simple meal is the fuel of the Himalayas.', 'published', '2025-02-01 11:00:00', 2100, 'Dal Bhat Power: The Ultimate Trekking Meal', 'Why do Sherpas eat Dal Bhat twice a day? Discover the nutritional benefits of Nepal\'s national dish for high-altitude trekking.', '2025-12-01 07:04:11'),
(14, 101, 1, NULL, '5 Signs of Altitude Sickness You Should Not Ignore', 'altitude-sickness-symptoms', '<h2>1. Persistent Headache</h2><p>A headache that does not go away with water or paracetamol is the first warning sign.</p><h2>2. Loss of Appetite</h2><p>If you suddenly cannot eat dinner after a long day of walking, your body is struggling to adjust.</p><h2>3. Dizziness</h2><p>Feeling drunk while walking straight? Stop immediately.</p><p><strong>Rule of thumb:</strong> If you feel unwell, assume it is altitude until proven otherwise.</p>', 'AMS (Acute Mountain Sickness) can happen to anyone. Recognizing these early signs can save your trip—and your life.', 'published', '2025-02-10 08:45:00', 3400, 'Altitude Sickness Symptoms & Prevention | Yeti Routes', 'Learn the 5 critical signs of AMS (Acute Mountain Sickness). Safety tips for trekking in the high Himalayas.', '2025-12-01 07:04:11'),
(15, 101, 4, NULL, 'Lukla Flights: Ramechhap vs Kathmandu in 2025', 'lukla-flights-ramechhap-update', '<h2>The New Normal</h2><p>In peak seasons (Spring/Autumn), flights from Kathmandu to Lukla are diverted to Ramechhap airport, a 4-hour drive from Kathmandu.</p><h2>What We Do</h2><p>At Yeti Routes, we arrange private transport to Ramechhap at 2 AM to ensure you catch the first wave of flights. Alternatively, we can arrange a helicopter directly from Kathmandu.</p>', 'Due to air traffic congestion, most flights to Lukla now depart from Manthali (Ramechhap). Here is what that means for your itinerary.', 'published', '2025-02-15 16:20:00', 1200, 'Lukla Flight Update 2025: Ramechhap Diversion', 'Important update for Everest trekkers: Why flights are diverting to Ramechhap and how to plan your transport.', '2025-12-01 07:04:11'),
(16, 102, 1, NULL, 'Leave No Trace: Trekking Responsibly in Nepal', 'responsible-trekking-nepal', '<h2>Say No to Plastic Bottles</h2><p>The biggest waste problem in the mountains is plastic. Bring a reusable Nalgene bottle and use purification tablets or UV filters.</p><h2>Pack It In, Pack It Out</h2><p>Do not leave chocolate wrappers or tissue paper on the trail. If you carried it up, carry it down.</p>', 'The Himalayas are fragile. Here is how you can minimize your footprint while trekking.', 'published', '2025-02-20 13:00:00', 450, 'Eco-Friendly Trekking Tips for Nepal', 'Guide to sustainable tourism in the Himalayas. Learn about water purification and waste management on the trail.', '2025-12-01 07:04:11'),
(17, 101, 3, NULL, 'Sleeping Bags: Down vs. Synthetic for Nepal', 'down-vs-synthetic-sleeping-bag', '<h2>Down Insulation</h2><p>Pros: Incredible warmth-to-weight ratio, compresses small. Cons: Loses warmth if it gets wet (though teahouses are dry).</p><h2>Synthetic Insulation</h2><p>Pros: Cheaper, stays warm when wet. Cons: Heavy and bulky.</p><h2>Recommendation</h2><p>For Nepal, a -10°C to -20°C Down bag is the gold standard.</p>', 'Nights in the Himalayas get cold. Which insulation type is best for teahouse trekking?', 'published', '2025-02-25 10:30:00', 780, 'Best Sleeping Bag for Nepal Trekking', 'Down vs Synthetic sleeping bags: Which is better for Himalayan trekking? Detailed comparison and temperature ratings.', '2025-12-01 07:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_reference` varchar(20) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `departure_id` bigint UNSIGNED NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `booking_status` enum('pending','confirmed','cancelled','completed') DEFAULT 'pending',
  `payment_status` enum('unpaid','partial','fully_paid') DEFAULT 'unpaid',
  `total_amount` decimal(10,2) NOT NULL,
  `currency` char(3) NOT NULL DEFAULT 'USD',
  `exchange_rate_to_usd` decimal(10,4) DEFAULT '1.0000',
  `carbon_offset_project_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_line_items`
--

CREATE TABLE `booking_line_items` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `item_type` enum('trip_fare','permit','rental_gear','insurance_surcharge','carbon_offset') NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `unit_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_payments`
--

CREATE TABLE `booking_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `payer_name` varchar(100) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `currency` char(3) NOT NULL DEFAULT 'USD',
  `transaction_reference` varchar(100) NOT NULL,
  `payment_method` enum('stripe','bank_transfer','wise','khalti') NOT NULL,
  `paid_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_conversations`
--

CREATE TABLE `chat_conversations` (
  `id` int NOT NULL,
  `visitor_id` varchar(32) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `status` enum('active','resolved') DEFAULT 'active',
  `page_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chat_conversations`
--

INSERT INTO `chat_conversations` (`id`, `visitor_id`, `user_name`, `user_email`, `status`, `page_url`, `created_at`, `updated_at`) VALUES
(1, '4cc70f4bd3684b17689e7e06cba2ea8d', NULL, NULL, 'active', '/chat/start', '2025-12-05 06:09:16', '2025-12-05 06:09:16'),
(2, '409709aee374c0e99511250e7436ab6e', NULL, NULL, 'active', '/chat/start', '2025-12-05 06:44:06', '2025-12-05 06:44:06'),
(3, 'bbff86843e3a6ad79578397805f04d49', NULL, NULL, 'active', '/chat/start', '2025-12-05 06:53:14', '2025-12-05 06:53:14'),
(4, 'ad32331a9dd166c3f1ebb2155230e702', NULL, NULL, 'active', '/chat/start', '2025-12-05 08:45:10', '2025-12-05 08:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int NOT NULL,
  `conversation_id` int DEFAULT NULL,
  `sender_type` enum('visitor','agent') DEFAULT NULL,
  `message` text,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `conversation_id`, `sender_type`, `message`, `is_read`, `created_at`) VALUES
(1, 1, 'visitor', 'hi', 1, '2025-12-05 06:09:20'),
(2, 1, 'visitor', 'anytone there?', 1, '2025-12-05 06:09:32'),
(3, 2, 'visitor', 'yes i want to have a thought', 1, '2025-12-05 06:44:24'),
(4, 3, 'visitor', 'hi help...', 1, '2025-12-05 06:53:46'),
(5, 3, 'agent', 'hi sir', 0, '2025-12-05 07:08:06'),
(6, 3, 'agent', 'how can we help you?', 0, '2025-12-05 07:08:10'),
(7, 3, 'visitor', 'ya fuck off', 1, '2025-12-05 07:08:23'),
(8, 3, 'agent', 'sorry sir?', 0, '2025-12-05 07:08:35'),
(9, 3, 'visitor', 'oh bhai', 1, '2025-12-05 07:47:35'),
(10, 3, 'visitor', 'k gardai ho?', 1, '2025-12-05 07:47:38'),
(11, 3, 'visitor', 'when are you gonna come?', 1, '2025-12-05 07:47:46'),
(12, 3, 'agent', 'I\'d be happy to help you with that!', 0, '2025-12-05 07:48:01'),
(13, 3, 'agent', 'what is you problem?', 0, '2025-12-05 07:48:07'),
(14, 3, 'visitor', 'hell', 1, '2025-12-05 07:50:17'),
(15, 3, 'agent', 'waht sir?', 0, '2025-12-05 07:50:29'),
(16, 3, 'visitor', 'yes i want to have a thought', 1, '2025-12-05 07:54:36'),
(17, 3, 'agent', 'Let me check our availability for you.', 0, '2025-12-05 07:54:48'),
(18, 3, 'agent', 'Great question! Here\'s what I recommend:', 0, '2025-12-05 07:54:50'),
(19, 3, 'agent', 'Great question! Here\'s what I recommend:', 0, '2025-12-05 07:55:21'),
(20, 3, 'agent', 'ateklj dlj d', 0, '2025-12-05 07:58:30'),
(21, 3, 'agent', 'oi', 0, '2025-12-05 07:58:53'),
(22, 4, 'visitor', 'oi chor', 1, '2025-12-05 08:45:16'),
(23, 2, 'visitor', 'whosss', 1, '2025-12-05 11:40:55'),
(24, 2, 'agent', 'hi sir', 0, '2025-12-05 11:45:18'),
(25, 2, 'agent', 'are you there?', 0, '2025-12-05 11:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `content_translations`
--

CREATE TABLE `content_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `entity_type` enum('route','blog_post','faq','lodge','location','page') NOT NULL,
  `entity_id` bigint UNSIGNED NOT NULL,
  `language_code` char(2) NOT NULL,
  `field_name` varchar(50) NOT NULL,
  `translation_value` longtext NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departures`
--

CREATE TABLE `departures` (
  `id` bigint UNSIGNED NOT NULL,
  `route_id` bigint UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `seats_total` int NOT NULL DEFAULT '12',
  `seats_booked` int NOT NULL DEFAULT '0',
  `group_type` enum('private','small_group','mixed') DEFAULT 'small_group',
  `is_women_only` tinyint(1) DEFAULT '0',
  `is_guaranteed` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departures`
--

INSERT INTO `departures` (`id`, `route_id`, `start_date`, `end_date`, `price`, `seats_total`, `seats_booked`, `group_type`, `is_women_only`, `is_guaranteed`) VALUES
(1, 1, '2025-03-15', '2025-03-28', 1299.00, 12, 3, 'small_group', 0, 1),
(2, 1, '2025-04-10', '2025-04-23', 1299.00, 12, 5, 'small_group', 0, 1),
(3, 1, '2025-09-20', '2025-10-03', 1399.00, 12, 2, 'small_group', 0, 0),
(4, 1, '2025-10-15', '2025-10-28', 1399.00, 12, 7, 'small_group', 0, 1),
(5, 1, '2025-04-01', '2025-04-14', 1299.00, 12, 5, 'small_group', 0, 1),
(6, 1, '2025-05-10', '2025-05-24', 1299.00, 12, 2, 'small_group', 0, 0),
(7, 2, '2025-03-15', '2025-03-31', 990.00, 10, 8, 'mixed', 0, 1),
(8, 4, '2025-10-05', '2025-10-19', 1150.00, 8, 4, 'private', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `category_id`, `question`, `answer`) VALUES
(1, 2, 'What happens if I get altitude sickness?', 'Our guides are trained in wilderness first aid. We carry oximeters and will descend if symptoms worsen.'),
(2, 1, 'What is the cancellation policy?', 'Deposits are lifetime valid. Cancellations made 30 days prior receive 80% refund.'),
(3, 3, 'Do I need a Visa?', 'Yes, Visas are available on arrival at TIA airport for most nationalities.');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `name`) VALUES
(1, 'General Questions'),
(2, 'Booking & Payment'),
(3, 'Trek Preparation'),
(4, 'Safety & Emergency');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('general','route','lodge','custom_plan') NOT NULL,
  `route_id` bigint UNSIGNED DEFAULT NULL,
  `lodge_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `message` text,
  `status` enum('new','contacted','converted','archived') DEFAULT 'new',
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int UNSIGNED NOT NULL,
  `code` char(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `flag_icon` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `is_default` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`, `flag_icon`, `is_active`, `is_default`) VALUES
(1, 'en', 'English', 'flag-us', 1, 1),
(2, 'fr', 'Français', 'flag-fr', 1, 0),
(3, 'de', 'Deutsch', 'flag-de', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `media_id` bigint UNSIGNED DEFAULT NULL,
  `featured_image_id` int DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `parent_id`, `name`, `slug`, `latitude`, `longitude`, `media_id`, `featured_image_id`, `meta_title`, `meta_description`) VALUES
(1, NULL, 'Nepal', 'nepal', 27.71720000, 85.32400000, NULL, NULL, NULL, NULL),
(2, NULL, 'Tibet', 'tibet', 29.65200000, 91.17200000, NULL, NULL, NULL, NULL),
(3, 1, 'Everest Region', 'everest-region', 27.98810000, 86.92500000, NULL, NULL, NULL, NULL),
(4, 1, 'Annapurna Region', 'annapurna-region', 28.59670000, 83.82000000, NULL, NULL, NULL, NULL),
(5, 1, 'Langtang Region', 'langtang-region', 28.20960000, 85.55000000, NULL, NULL, NULL, NULL),
(10, NULL, 'Annapurna Region', 'annapurna-region', NULL, NULL, NULL, NULL, 'Annapurna Circuit & Sanctuary Trekking', NULL),
(11, NULL, 'Langtang Region', 'langtang-region', NULL, NULL, NULL, NULL, 'Langtang Valley & Gosainkunda', NULL),
(12, NULL, 'Manaslu Region', 'manaslu-region', NULL, NULL, NULL, NULL, 'Manaslu Circuit Restricted Area', NULL),
(13, NULL, 'Chitwan', 'chitwan', NULL, NULL, NULL, NULL, 'Chitwan National Park Safari', NULL),
(14, NULL, 'Mustang Region', 'mustang-region', NULL, NULL, NULL, NULL, 'Upper & Lower Mustang Trekking', NULL),
(15, NULL, 'Rara & Mugu', 'rara-mugu', NULL, NULL, NULL, NULL, 'Rara Lake & Far West Nepal', NULL),
(16, NULL, 'Dolpo Region', 'dolpo-region', NULL, NULL, NULL, NULL, 'Upper & Lower Dolpo Restricted Area', NULL),
(17, NULL, 'Kanchenjunga Region', 'kanchenjunga-region', NULL, NULL, NULL, NULL, 'Kanchenjunga Conservation Area', NULL),
(18, NULL, 'Ganesh Himal', 'ganesh-himal', NULL, NULL, NULL, NULL, 'Ruby Valley & Ganesh Himal', NULL),
(19, NULL, 'Rolwaling & Gaurishankar', 'rolwaling', NULL, NULL, NULL, NULL, 'Rolwaling Valley & Tsho Rolpa', NULL),
(20, NULL, 'Makalu Region', 'makalu-region', NULL, NULL, NULL, NULL, 'Makalu Barun National Park', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lodges`
--

CREATE TABLE `lodges` (
  `id` int UNSIGNED NOT NULL,
  `location_id` int UNSIGNED NOT NULL,
  `media_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price_range` varchar(50) DEFAULT NULL,
  `internet_speed_mbps` int DEFAULT '0',
  `amenities` json DEFAULT NULL,
  `contact_info_private` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lodges`
--

INSERT INTO `lodges` (`id`, `location_id`, `media_id`, `name`, `description`, `price_range`, `internet_speed_mbps`, `amenities`, `contact_info_private`) VALUES
(1, 10, NULL, 'Hotel Bob Marley (Muktinath)', 'Famous lodge with great vibe after the pass.', '$$', 5, '[\"Hot Shower\", \"Bakery\", \"Wifi\"]', NULL),
(2, 11, NULL, 'Lama Hotel Guesthouse', 'Basic but cozy tea house in the forest.', '$', 2, '[\"Fireplace\", \"Shared Bathroom\"]', NULL),
(3, 12, NULL, 'Manaslu Lodge', 'Stone built lodge with mountain views.', '$$', 3, '[\"Local Food\", \"Warm Dining\"]', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `attempt_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `attempt_time`) VALUES
(1, '127.0.0.1', '2025-11-30 13:01:59'),
(2, '127.0.0.1', '2025-11-30 16:02:52'),
(3, '127.0.0.1', '2025-12-01 06:57:43'),
(4, '127.0.0.1', '2025-12-02 18:16:44'),
(5, '127.0.0.1', '2025-12-02 18:31:48'),
(6, '127.0.0.1', '2025-12-04 13:45:14'),
(7, '127.0.0.1', '2025-12-05 06:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_transactions`
--

CREATE TABLE `loyalty_transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `points` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `reference_booking_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_attachments`
--

CREATE TABLE `media_attachments` (
  `media_id` bigint UNSIGNED NOT NULL,
  `entity_type` enum('route','blog','user','lodge','booking','testimonial','team') NOT NULL,
  `entity_id` bigint UNSIGNED NOT NULL,
  `is_featured` tinyint(1) DEFAULT '0',
  `sort_order` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_library`
--

CREATE TABLE `media_library` (
  `id` bigint UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `original_path` varchar(255) NOT NULL,
  `variants` json NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `uploaded_by` bigint UNSIGNED DEFAULT NULL,
  `visibility` enum('public','private') NOT NULL DEFAULT 'public',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `media_library`
--

INSERT INTO `media_library` (`id`, `filename`, `original_path`, `variants`, `mime_type`, `alt_text`, `uploaded_by`, `visibility`, `created_at`) VALUES
(1, '1764704126_692f3f7e170c5.png', 'Screenshot 2025-07-29 222927.png', '{\"medium\": \"/uploads/media/1764704126_692f3f7e170c5.png\", \"original\": \"/uploads/media/1764704126_692f3f7e170c5.png\", \"thumbnail\": \"/uploads/media/1764704126_692f3f7e170c5.png\"}', 'image/png', 'Screenshot 2025-07-29 222927.png', 1, 'public', '2025-12-02 19:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `preferences` json DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `ip_address` varchar(45) NOT NULL,
  `subscribed_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packing_items`
--

CREATE TABLE `packing_items` (
  `id` int UNSIGNED NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `category` enum('clothing','gear','medical','documents','electronics') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `required_seasons` json DEFAULT NULL,
  `required_terrains` json DEFAULT NULL,
  `is_essential` tinyint(1) DEFAULT '1',
  `rental_gear_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `slug`, `description`) VALUES
(1, 'manage_users', 'Manage Users'),
(2, 'manage_routes', 'Manage Routes'),
(3, 'manage_bookings', 'Manage Bookings'),
(4, 'manage_blog', 'Manage Blog'),
(5, 'manage_media', 'Manage Media Library'),
(6, 'view_dashboard', 'View Dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `permits`
--

CREATE TABLE `permits` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_fnrts_required` tinyint(1) DEFAULT '0',
  `nationality_price_rules` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `permits`
--

INSERT INTO `permits` (`id`, `name`, `is_fnrts_required`, `nationality_price_rules`) VALUES
(1, 'Sagarmatha National Park Permit', 0, '{\"SAARC\": 1500, \"Foreigner\": 3000}'),
(2, 'Annapurna Conservation Area Project (ACAP)', 0, '{\"SAARC\": 1000, \"Foreigner\": 3000}'),
(3, 'TIMS Card', 0, '{\"SAARC\": 600, \"Foreigner\": 2000}'),
(4, 'Manaslu Restricted Area Permit', 1, '{\"Other\": 75, \"Autumn\": 100}');

-- --------------------------------------------------------

--
-- Table structure for table `rental_gear`
--

CREATE TABLE `rental_gear` (
  `id` int UNSIGNED NOT NULL,
  `media_id` bigint UNSIGNED DEFAULT NULL,
  `item_name` varchar(100) NOT NULL,
  `daily_price` decimal(10,2) NOT NULL,
  `stock_quantity` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rental_gear`
--

INSERT INTO `rental_gear` (`id`, `media_id`, `item_name`, `daily_price`, `stock_quantity`) VALUES
(1, NULL, 'Sleeping Bag (-20°C)', 5.00, 20),
(2, NULL, 'Trekking Poles (Pair)', 3.00, 30),
(3, NULL, 'Down Jacket', 7.00, 25),
(4, NULL, 'Duffel Bag (70L)', 4.00, 15),
(5, NULL, 'Crampons', 6.00, 10);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Guide'),
(4, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int UNSIGNED NOT NULL,
  `permission_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint UNSIGNED NOT NULL,
  `location_id` int UNSIGNED NOT NULL,
  `media_id` bigint UNSIGNED DEFAULT NULL,
  `featured_image_id` int DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `difficulty` enum('easy','moderate','challenging','extreme') NOT NULL,
  `duration_days` int NOT NULL,
  `max_altitude_meters` int DEFAULT NULL,
  `best_season` varchar(255) DEFAULT NULL,
  `terrain_type` enum('snow','forest','desert','mixed') DEFAULT 'mixed',
  `route_type` enum('trek','tour','expedition','day_trip') DEFAULT 'trek',
  `fitness_score_required` tinyint(1) DEFAULT '5',
  `carbon_footprint_kg` int DEFAULT '0',
  `base_price` decimal(10,2) NOT NULL,
  `currency` char(3) DEFAULT 'USD',
  `price_transparency_data` json DEFAULT NULL,
  `short_description` text NOT NULL,
  `full_description` longtext NOT NULL,
  `highlights` json DEFAULT NULL,
  `inclusions` json DEFAULT NULL,
  `exclusions` json DEFAULT NULL,
  `emergency_contact_info` text,
  `nearest_hospital` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT '0',
  `video_url` varchar(255) DEFAULT NULL,
  `map_embed_code` text,
  `map_3d_url` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `location_id`, `media_id`, `featured_image_id`, `title`, `slug`, `difficulty`, `duration_days`, `max_altitude_meters`, `best_season`, `terrain_type`, `route_type`, `fitness_score_required`, `carbon_footprint_kg`, `base_price`, `currency`, `price_transparency_data`, `short_description`, `full_description`, `highlights`, `inclusions`, `exclusions`, `emergency_contact_info`, `nearest_hospital`, `is_featured`, `video_url`, `map_embed_code`, `map_3d_url`, `meta_title`, `meta_description`, `is_active`) VALUES
(1, 3, NULL, NULL, 'Everest Base Camp Trek', 'everest-base-camp-trek', 'challenging', 14, 5364, 'March-May, September-November', 'mixed', 'trek', 7, 0, 1299.00, 'USD', NULL, 'Trek to the base of the world\'s highest mountain on this iconic 14-day adventure.', 'Experience the thrill of standing at Everest Base Camp (5,364m) on this classic trek through the Khumbu region. Walk in the footsteps of legendary mountaineers, visit ancient Buddhist monasteries, and immerse yourself in Sherpa culture. This challenging trek offers breathtaking views of Everest, Lhotse, Nuptse, and Ama Dablam.', '[\"Stand at Everest Base Camp (5,364m)\", \"Stunning views of Mt. Everest, Lhotse, and Ama Dablam\", \"Visit Tengboche Monastery\", \"Experience Sherpa culture in Namche Bazaar\", \"Sunrise from Kala Patthar (5,545m)\"]', '[\"Airport transfers\", \"Teahouse accommodation\", \"All meals during trek\", \"Experienced guide and porter\", \"Trekking permits\", \"First aid kit\"]', '[\"International flights\", \"Nepal visa fee\", \"Travel insurance\", \"Personal expenses\", \"Tips for guides/porters\"]', NULL, NULL, 1, NULL, NULL, NULL, 'Everest Base Camp Trek - 14 Days | Yeti Routes', 'Trek to Everest Base Camp with experienced guides. 14-day adventure to the world\'s highest mountain base camp. Book your Himalayan trek today!', 1),
(2, 10, NULL, NULL, 'Annapurna Circuit Trek', 'annapurna-circuit-trek', 'moderate', 16, 5416, 'March-May, Oct-Dec', 'mixed', 'expedition', 6, 0, 990.00, 'USD', NULL, 'A classic teahouse trek circling the Annapurna massif, crossing the dramatic Thorong La Pass.', 'The Annapurna Circuit is often voted the best long-distance trek in the world. It takes you from subtropical jungles to the high-altitude arid landscapes of Manang and Mustang. The highlight is crossing the Thorong La Pass at 5,416m.', '[\"Thorong La Pass (5416m)\", \"Tilicho Lake Side Trip\", \"Muktinath Temple\", \"Diverse landscapes\"]', '[\"Guide and Porter\", \"All Permits (ACAP, TIMS)\", \"3 Meals a day\", \"Lodge accommodation\"]', '[\"Wifi and Hot Showers\", \"Travel Insurance\", \"Bar Bills\"]', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1),
(3, 11, NULL, NULL, 'Langtang Valley Trek', 'langtang-valley-trek', 'moderate', 10, 4984, 'Mar-May, Sep-Dec', 'forest', 'trek', 5, 0, 650.00, 'USD', NULL, 'The valley of glaciers. A beautiful, culturally rich trek easily accessible from Kathmandu.', 'Langtang Valley is known as the valley of glaciers. It offers pine forests, swift mountain streams, rugged rock and snow-capped peaks, grassy downs and meadows strewn with daisies and wild primulas.', '[\"Kyanjin Gompa\", \"Cheese Factory\", \"Tserko Ri Viewpoint\", \"Red Panda Habitat\"]', '[\"Langtang National Park Permit\", \"Guide\", \"Accommodation\"]', '[\"Tips\", \"Personal Gear\"]', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(4, 12, NULL, NULL, 'Manaslu Circuit Trek', 'manaslu-circuit-trek', 'extreme', 14, 5106, 'Mar-May, Sep-Nov', 'snow', 'trek', 8, 0, 1150.00, 'USD', NULL, 'A restricted area trek around the world\'s 8th highest mountain. Less crowded and wild.', 'Experience the untouched beauty of the Manaslu region. This trek is a great alternative to the Annapurna Circuit, offering similar views but with far fewer crowds and more authentic culture.', '[\"Larkya La Pass\", \"Mt. Manaslu\", \"Tibetan Villages\", \"Budi Gandaki River\"]', '[\"Restricted Area Permit\", \"Special Guide\", \"Food and Lodging\"]', '[\"Emergency Evacuation\", \"Soft drinks\"]', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1),
(20, 1, NULL, NULL, 'Everest Base Camp Trek', 'everest-base-camp', 'challenging', 14, 5545, 'Mar-May, Sep-Nov', 'mixed', 'trek', 7, 0, 1299.00, 'USD', NULL, 'The classic trek to the foot of the world\'s highest peak.', 'Itinerary: Lukla > Phakding > Namche > Tengboche > Dingboche > Lobuche > EBC > Kala Patthar > Return.', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1),
(21, 1, NULL, NULL, 'Everest Three Passes Trek', 'three-passes-trek', 'extreme', 20, 5535, 'Mar-May, Oct-Nov', 'snow', 'expedition', 9, 0, 1650.00, 'USD', NULL, 'The ultimate high-altitude circuit crossing Renjo La, Cho La, and Kongma La.', 'Itinerary: Renjo La > Gokyo > Cho La > EBC > Kongma La > Return. A challenging adventure for experienced trekkers.', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1),
(22, 1, NULL, NULL, 'Gokyo Lakes & Gokyo Ri Trek', 'gokyo-lakes-trek', 'moderate', 12, 5357, 'Mar-May, Sep-Dec', 'mixed', 'trek', 6, 0, 1150.00, 'USD', NULL, 'Turquoise lakes and the best panoramic views of Everest.', 'Itinerary: Lukla > Dole > Machhermo > Gokyo > Gokyo Ri > Return.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(23, 1, NULL, NULL, 'Ama Dablam Base Camp Trek', 'ama-dablam-base-camp', 'moderate', 12, 4600, 'Mar-May, Oct-Dec', 'mixed', 'trek', 6, 0, 1050.00, 'USD', NULL, 'Get up close to the most beautiful mountain in the Himalayas.', 'Itinerary: Lukla > Namche > Pangboche > Ama Dablam BC > Return.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(24, 1, NULL, NULL, 'Everest View Trek', 'everest-view-trek', 'easy', 7, 3860, 'All Year', 'forest', 'tour', 4, 0, 850.00, 'USD', NULL, 'A short, easy trek to experience Sherpa culture and Everest views.', 'Itinerary: Lukla > Phakding > Namche > Tengboche > Return.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(25, 10, NULL, NULL, 'Annapurna Base Camp Trek', 'annapurna-base-camp', 'moderate', 10, 4130, 'Mar-May, Sep-Dec', 'mixed', 'trek', 6, 0, 890.00, 'USD', NULL, 'Journey into the heart of the Annapurna Sanctuary.', 'Itinerary: Nayapul > Ghandruk > Chhomrong > Deurali > ABC > Bamboo > Jhinu > Pokhara.', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1),
(26, 10, NULL, NULL, 'Annapurna Circuit Trek', 'annapurna-circuit', 'challenging', 16, 5416, 'Mar-May, Sep-Nov', 'mixed', 'expedition', 7, 0, 1050.00, 'USD', NULL, 'The classic circle around the Annapurna Massif.', 'Itinerary: Besisahar > Pisang > Manang > Yak Kharka > Thorang La > Muktinath > Jomsom > Tatopani.', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1),
(27, 10, NULL, NULL, 'North Annapurna Base Camp', 'north-annapurna-base-camp', 'challenging', 9, 4190, 'Apr-May, Oct-Nov', 'mixed', 'trek', 7, 0, 1200.00, 'USD', NULL, 'The trail of Maurice Herzog. Less crowded, wilder alternative.', 'Itinerary: Sekong Lake > Narchyang > Humkhola > North ABC > Return.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(28, 10, NULL, NULL, 'Mardi Himal Trek', 'mardi-himal-trek', 'moderate', 7, 4500, 'Sep-May', 'forest', 'tour', 5, 0, 650.00, 'USD', NULL, 'Short, scenic ridge trek with close-up views of Machhapuchhre.', 'Itinerary: Kande > Forest Camp > High Camp > Mardi BC > Siding.', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1),
(29, 10, NULL, NULL, 'Ghorepani Poon Hill Trek', 'poon-hill-trek', 'easy', 5, 3210, 'All Year', 'forest', 'tour', 3, 0, 450.00, 'USD', NULL, 'The famous sunrise trek, perfect for families and beginners.', 'Itinerary: Nayapul > Ghorepani > Poon Hill > Ghandruk.', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1),
(30, 10, NULL, NULL, 'Khopra Danda Trek', 'khopra-danda-trek', 'moderate', 8, 3660, 'Mar-May, Oct-Dec', 'mixed', 'trek', 5, 0, 700.00, 'USD', NULL, 'An off-the-beaten-path ridge trek with community lodges.', 'Itinerary: Ghorepani > Khopra Ridge > Khayer Lake > Tatopani.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(31, 10, NULL, NULL, 'Khayer Lake Trek', 'khayer-lake-trek', 'challenging', 9, 4600, 'Mar-May, Oct-Nov', 'mixed', 'trek', 6, 0, 750.00, 'USD', NULL, 'A sacred high-altitude lake near Annapurna South.', 'Itinerary: Ghandruk > Khayer Lake region > Return.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(32, 14, NULL, NULL, 'Upper Mustang Trek', 'upper-mustang-trek', 'moderate', 14, 3840, 'Mar-Nov', 'desert', 'trek', 5, 0, 1850.00, 'USD', NULL, 'Explore the forbidden kingdom of Lo Manthang.', 'Itinerary: Jomsom > Chele > Ghami > Tsarang > Lo Manthang > Chhoser > Return. Requires $500 Restricted Permit.', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1),
(33, 14, NULL, NULL, 'Lower Mustang Trek', 'lower-mustang-trek', 'easy', 7, 3710, 'All Year', 'desert', 'tour', 3, 0, 800.00, 'USD', NULL, 'Apple orchards, monasteries, and the windy Kali Gandaki valley.', 'Itinerary: Tatopani > Ghasa > Marpha > Muktinath > Kagbeni.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(34, 12, NULL, NULL, 'Manaslu Circuit Trek', 'manaslu-circuit', 'extreme', 16, 5106, 'Mar-May, Sep-Nov', 'mixed', 'expedition', 8, 0, 1150.00, 'USD', NULL, 'The new classic. Remote, cultural, and spectacular.', 'Itinerary: Soti Khola > Jagat > Samagaun > Dharmasala > Larke Pass > Dharapani.', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1),
(35, 12, NULL, NULL, 'Tsum Valley Trek', 'tsum-valley-trek', 'moderate', 16, 3700, 'Mar-May, Sep-Nov', 'mixed', 'expedition', 6, 0, 1250.00, 'USD', NULL, 'The hidden valley of happiness. Ancient monasteries and Tibetan culture.', 'Itinerary: Soti Khola > Lokpa > Chumling > Mu Gompa > Return.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(36, 11, NULL, NULL, 'Langtang Valley Trek', 'langtang-valley', 'moderate', 8, 4984, 'Mar-May, Sep-Dec', 'forest', 'trek', 5, 0, 650.00, 'USD', NULL, 'The valley of glaciers.', 'Itinerary: Syabrubesi > Kyanjin Gompa > Kyanjin Ri > Return.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(37, 11, NULL, NULL, 'Langtang Gosainkunda Trek', 'langtang-gosainkunda', 'challenging', 15, 4610, 'Mar-May, Sep-Nov', 'mixed', 'trek', 7, 0, 1100.00, 'USD', NULL, 'Combine valley trekking with sacred high-altitude lakes.', 'Itinerary: Langtang > Laurebina > Gosaikunda > Helambu > Sundarijal.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(38, 11, NULL, NULL, 'Helambu Cultural Trek', 'helambu-trek', 'easy', 7, 3650, 'Sep-May', 'forest', 'tour', 4, 0, 550.00, 'USD', NULL, 'Low altitude trekking near Kathmandu rich in Hyolmo culture.', 'Itinerary: Sundarijal > Chisapani > Tharepati > Melamchi.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(39, 11, NULL, NULL, 'Panch Pokhari Trek', 'panch-pokhari-trek', 'moderate', 8, 4100, 'Mar-May, Sep-Nov', 'mixed', 'trek', 6, 0, 750.00, 'USD', NULL, 'Five sacred lakes at the base of Jugal Himal.', 'Itinerary: Chautara > Kami Kharka > Panch Pokhari > Tupi Danda > Melamchi.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(40, 18, NULL, NULL, 'Ruby Valley Trek', 'ruby-valley-trek', 'moderate', 7, 3850, 'Mar-May, Sep-Nov', 'mixed', 'tour', 5, 0, 600.00, 'USD', NULL, 'Homestay trekking in the Ganesh Himal region.', 'Itinerary: Syabrubesi > Gatlang > Somdang > Tipling > Return.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(41, 19, NULL, NULL, 'Tsho Rolpa Lake Trek', 'tsho-rolpa-trek', 'challenging', 12, 4580, 'Mar-May, Sep-Nov', 'mixed', 'trek', 7, 0, 1100.00, 'USD', NULL, 'One of the biggest glacial lakes in Nepal.', 'Itinerary: Simigaun > Bedding > Na > Tsho Rolpa > Return.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(42, 11, NULL, NULL, 'Tamang Heritage Trail', 'tamang-heritage-trail', 'easy', 7, 3165, 'All Year', 'forest', 'tour', 4, 0, 580.00, 'USD', NULL, 'Cultural immersion in the Langtang region.', 'Itinerary: Syabrubesi > Gatlang > Tatopani > Thuman > Briddim.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(43, 15, NULL, NULL, 'Rara Lake Trek', 'rara-lake-trek', 'moderate', 10, 3710, 'Mar-Jun, Sep-Nov', 'forest', 'trek', 5, 0, 1350.00, 'USD', NULL, 'The queen of lakes in Far West Nepal.', 'Itinerary: Jumla > Chauta > Dhotu > Rara Lake > Talcha.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(44, 16, NULL, NULL, 'Upper Dolpo Trek', 'upper-dolpo-trek', 'extreme', 25, 5350, 'May-Oct', 'desert', 'expedition', 9, 0, 3500.00, 'USD', NULL, 'The ultimate remote expedition in the rain shadow.', 'Itinerary: Juphal > Shey Phoksundo > Shey Gompa > Saldang > Return. High permit cost included.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(45, 16, NULL, NULL, 'Lower Dolpo Trek', 'lower-dolpo-trek', 'challenging', 14, 5190, 'May-Oct', 'mixed', 'trek', 7, 0, 1900.00, 'USD', NULL, 'Deep valleys and the mesmerizing Phoksundo Lake.', 'Itinerary: Dunai > Tarap Valley > Phoksundo > Return.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(46, 10, NULL, NULL, 'Dhaulagiri Circuit Trek', 'dhaulagiri-circuit', 'extreme', 18, 5360, 'Apr-May, Sep-Oct', 'snow', 'expedition', 9, 0, 2100.00, 'USD', NULL, 'A camping trek around the White Mountain.', 'Itinerary: Muri > Boghara > Italian BC > Dhaulagiri BC > French Pass > Marpha.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(47, 20, NULL, NULL, 'Makalu Base Camp Trek', 'makalu-base-camp', 'extreme', 20, 5250, 'Apr-May, Sep-Nov', 'mixed', 'expedition', 8, 0, 1850.00, 'USD', NULL, 'Wilderness trekking to the base of the 5th highest peak.', 'Itinerary: Num > Seduwa > Khongma > Mumbuk > MBC > Return.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(48, 17, NULL, NULL, 'Kanchenjunga Base Camp Trek', 'kanchenjunga-trek', 'extreme', 22, 5143, 'Mar-May, Oct-Nov', 'mixed', 'expedition', 9, 0, 2200.00, 'USD', NULL, 'Explore the eastern border and the 3rd highest peak.', 'Itinerary: Taplejung > Ghunsa > Lhonak > Pangpema (North) > Ramche (South).', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(49, 10, NULL, NULL, 'Nar Phu Valley Trek', 'nar-phu-valley', 'challenging', 13, 5306, 'Mar-Nov', 'desert', 'trek', 7, 0, 1400.00, 'USD', NULL, 'Hidden valleys north of Annapurna.', 'Itinerary: Koto > Meta > Phu > Nar > Kang La > Manang.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(50, 1, NULL, NULL, 'Pikey Peak Trek', 'pikey-peak-trek', 'easy', 7, 4065, 'All Year', 'forest', 'tour', 4, 0, 600.00, 'USD', NULL, 'Best lower altitude viewpoint of Everest.', 'Itinerary: Dhap > Jhapre > Pikey Peak > Junbesi > Phaplu.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(51, 10, NULL, NULL, 'Mohare Danda Trek', 'mohare-danda-trek', 'easy', 5, 3300, 'All Year', 'forest', 'tour', 3, 0, 450.00, 'USD', NULL, 'Eco-community lodge trek, great alternative to Poon Hill.', 'Itinerary: Galeshwor > Nangi > Mohare Danda > Tikot.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(52, 4, NULL, NULL, 'Kathmandu Valley Rim Trek', 'kathmandu-rim-trek', 'easy', 5, 2175, 'All Year', 'forest', 'tour', 3, 0, 400.00, 'USD', NULL, 'Multi-day hike surrounding the capital.', 'Itinerary: Sundarijal > Chisapani > Nagarkot > Dhulikhel > Panauti > Namobuddha.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(53, 13, NULL, NULL, 'Chepang Hill Trail', 'chepang-hill-trek', 'easy', 5, 1945, 'Sep-May', 'forest', 'tour', 3, 0, 450.00, 'USD', NULL, 'Indigenous culture and jungle views.', 'Itinerary: Hugdi > Hattibang > Chisapani > Shaktikhor > Chitwan.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(54, 1, NULL, NULL, 'Kathmandu Valley Tour', 'kathmandu-valley-tour', 'easy', 3, NULL, NULL, 'mixed', 'tour', 5, 0, 350.00, 'USD', NULL, 'Explore the ancient culture and heritage of the Kathmandu Valley.', 'A comprehensive tour visiting Swayambhunath, Pashupatinath, Boudhanath, and the Durbar Squares. Experience the rich history of Nepal.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(55, 10, NULL, NULL, 'Pokhara Tour', 'pokhara-tour', 'easy', 3, NULL, NULL, 'mixed', 'tour', 5, 0, 400.00, 'USD', NULL, 'Relax by Phewa Lake and enjoy mountain views.', 'Visit Davis Falls, Gupteshwor Cave, the Peace Pagoda, and enjoy boating on Phewa Lake with the Annapurna range as your backdrop.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(56, 13, NULL, NULL, 'Chitwan Safari Tour', 'chitwan-safari-tour', 'easy', 3, NULL, NULL, 'mixed', 'tour', 5, 0, 300.00, 'USD', NULL, 'Wildlife adventure in the heart of the jungle.', 'Experience elephant back safaris, jeep safaris, canoe rides, and Tharu cultural shows in Chitwan National Park.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(57, 15, NULL, NULL, 'Rara Lake Tour', 'rara-lake-tour', 'moderate', 5, NULL, NULL, 'mixed', 'tour', 5, 0, 850.00, 'USD', NULL, 'Journey to the Queen of Lakes in remote West Nepal.', 'Fly to Talcha and hike to Rara Lake. Experience the pristine beauty of Nepals largest lake and the surrounding national park.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(58, 1, NULL, NULL, 'Kathmandu World Heritage Sites Tour', 'kathmandu-world-heritage-sites-tour', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 80.00, 'USD', NULL, 'One day tour of UNESCO World Heritage Sites.', 'Guided sightseeing tour of the most significant cultural landmarks in the capital city.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(59, 1, NULL, NULL, 'Bungee Jumping in Nepal', 'bungee-jumping-in-nepal', 'challenging', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 120.00, 'USD', NULL, 'The ultimate adrenaline rush.', 'Jump from a suspension bridge over the Bhote Koshi river. One of the wildest bungee jumps in the world.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(60, 1, NULL, NULL, 'Nagarkot Day Tour', 'nagarkot-day-tour', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 90.00, 'USD', NULL, 'Sunrise and panoramic Himalayan views.', 'Drive to Nagarkot for sunrise and enjoy a short hike around the hill station before returning to Kathmandu.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(61, 3, NULL, NULL, 'Day Tour of Everest Base Camp in Helicopter', 'day-tour-of-everest-base-camp-in-helicopter', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 1200.00, 'USD', NULL, 'Breakfast at Everest View Hotel.', 'Fly from Kathmandu to Lukla and then to Kala Patthar/EBC. Land for breakfast with Mt. Everest right in front of you.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(62, 1, NULL, NULL, 'Kathmandu Hiking Tour', 'kathmandu-hiking-tour', 'moderate', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 60.00, 'USD', NULL, 'Escape the city hustle with a day hike.', ' hike through the lush forests surrounding the valley rim, offering great views and fresh air.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(63, 10, NULL, NULL, 'Day Hike in Pokhara', 'day-hike-in-pokhara', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 50.00, 'USD', NULL, 'Scenic hiking trails around Pokhara.', 'Hike to Sarangkot or the Peace Pagoda for stunning views of the Annapurna range and Phewa Lake.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(64, 1, NULL, NULL, 'Kathmandu Cycling tour', 'kathmandu-cycling-tour', 'moderate', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 70.00, 'USD', NULL, 'Explore the valley on two wheels.', 'Cycling through the backroads of Kathmandu, visiting traditional villages and hidden temples.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(65, 1, NULL, NULL, 'Bhaktapur sightseeing with Nagarkot sunset tour', 'bhaktapur-sightseeing-with-nagarkot-sunset-tour', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 100.00, 'USD', NULL, 'Culture and sunsets combined.', 'Explore the medieval city of Bhaktapur followed by a drive to Nagarkot for a breathtaking sunset.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(66, 1, NULL, NULL, 'Nagarkot Dhulikhel day hiking', 'nagarkot-dhulikhel-day-hiking', 'moderate', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 65.00, 'USD', NULL, 'A classic rim valley hike.', 'Walk along the ridge from Nagarkot to Dhulikhel, enjoying continuous mountain views and rural life.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(67, 1, NULL, NULL, 'Exploring Kathmandu by Rickshaw', 'exploring-kathmandu-by-rickshaw', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 40.00, 'USD', NULL, 'Authentic city streets experience.', 'Ride through the narrow alleys of Thamel and Asan on a traditional rickshaw.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(68, 1, NULL, NULL, 'Patan and Bhaktapur day tour', 'patan-and-bhaktapur-day-tour', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 90.00, 'USD', NULL, 'Medieval art and architecture.', 'Visit two ancient kingdoms in one day. Famous for their intricate wood carvings and stone sculptures.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(69, 1, NULL, NULL, 'Khokana and Bungamati tour', 'khokana-and-bungamati-tour', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 60.00, 'USD', NULL, 'Traditional Newari villages frozen in time.', 'See the traditional mustard oil mills and the temple of Rato Machindranath.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(70, 1, NULL, NULL, 'Dakshinkali, Pharping and Chobar tour', 'dakshinkali-pharping-and-chobar-tour', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 70.00, 'USD', NULL, 'Spiritual southern valley tour.', 'Visit the famous Kali temple, Pharping monasteries, and the Chobar gorge.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(71, 1, NULL, NULL, 'Joy of Rafting over Trishuli River', 'joy-of-rafting-over-trishuli-river', 'moderate', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 60.00, 'USD', NULL, 'White water thrills near the capital.', 'A fun and accessible rafting day trip on the Trishuli river, suitable for beginners.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(72, 1, NULL, NULL, 'Mountain biking around Kathmandu', 'mountain-biking-around-kathmandu', 'challenging', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 80.00, 'USD', NULL, 'Off-road biking adventures.', 'Technical single tracks in the Shivapuri national park for biking enthusiasts.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(73, 10, NULL, NULL, 'Day tour of Annapurna Base Camp in Helicopter', 'day-tour-of-annapurna-base-camp-in-helicopter', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 1100.00, 'USD', NULL, 'Fly to the heart of the Annapurnas.', 'A scenic helicopter flight landing directly at ABC. Enjoy the amphitheater of mountains without the week-long trek.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(74, 1, NULL, NULL, 'Namo Buddha day tour', 'namo-buddha-day-tour', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 75.00, 'USD', NULL, 'Peaceful monastery visit.', 'Drive to one of the holiest Buddhist sites in Nepal. Beautiful environment and huge monastery complex.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(75, 1, NULL, NULL, 'Nagarkot and Changu Narayan hiking tour', 'nagarkot-and-changu-narayan-hiking-tour', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 65.00, 'USD', NULL, 'Nature and history hike.', 'Downhill hike from Nagarkot through villages to the ancient Changu Narayan temple.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(76, 1, NULL, NULL, 'Chandragiri Hill day tour', 'chandragiri-hill-day-tour', 'easy', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 50.00, 'USD', NULL, 'Cable car ride to panoramic views.', 'Ride the cable car to the top of Chandragiri for sweeping views of the Himalayas and Kathmandu valley.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1),
(77, 10, NULL, NULL, 'Paragliding in Pokhara tour', 'paragliding-in-pokhara-tour', 'moderate', 1, NULL, NULL, 'mixed', 'day_trip', 5, 0, 100.00, 'USD', NULL, 'Fly over Phewa Lake.', 'Tandem paragliding flight from Sarangkot. One of the best places in the world to experience free flight.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `route_faq_links`
--

CREATE TABLE `route_faq_links` (
  `route_id` bigint UNSIGNED NOT NULL,
  `faq_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `route_faq_links`
--

INSERT INTO `route_faq_links` (`route_id`, `faq_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `route_itineraries`
--

CREATE TABLE `route_itineraries` (
  `id` bigint UNSIGNED NOT NULL,
  `route_id` bigint UNSIGNED NOT NULL,
  `day_number` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `overnight_altitude_meters` int NOT NULL,
  `is_acclimatization_day` tinyint(1) DEFAULT '0',
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `audio_ambiance_media_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `route_itineraries`
--

INSERT INTO `route_itineraries` (`id`, `route_id`, `day_number`, `title`, `description`, `overnight_altitude_meters`, `is_acclimatization_day`, `latitude`, `longitude`, `audio_ambiance_media_id`) VALUES
(1, 2, 1, 'Drive to Besisahar/Dharapani', 'Long scenic drive from Kathmandu.', 1860, 0, NULL, NULL, NULL),
(2, 2, 2, 'Trek to Chame', 'Walk through pine forests and views of Manaslu.', 2670, 0, NULL, NULL, NULL),
(3, 2, 3, 'Trek to Pisang', 'The valley opens up, view of Paungda Danda rock face.', 3200, 0, NULL, NULL, NULL),
(4, 2, 4, 'Trek to Manang', 'Enter the arid high altitude region.', 3540, 0, NULL, NULL, NULL),
(5, 2, 5, 'Acclimatization in Manang', 'Hike to Gangapurna Lake.', 3540, 1, NULL, NULL, NULL),
(6, 2, 9, 'Cross Thorong La Pass (5416m)', 'The biggest day of the trek. Descend to Muktinath.', 3760, 0, NULL, NULL, NULL),
(7, 3, 1, 'Drive to Syabrubesi', 'Winding mountain roads.', 1503, 0, NULL, NULL, NULL),
(8, 3, 2, 'Trek to Lama Hotel', 'Walk through lush rhododendron forests.', 2470, 0, NULL, NULL, NULL),
(9, 3, 3, 'Trek to Langtang Village', 'Rebuilt village after 2015 earthquake.', 3430, 0, NULL, NULL, NULL),
(10, 3, 4, 'Trek to Kyanjin Gompa', 'Final settlement with a cheese factory.', 3870, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `route_permits`
--

CREATE TABLE `route_permits` (
  `route_id` bigint UNSIGNED NOT NULL,
  `permit_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `route_permits`
--

INSERT INTO `route_permits` (`route_id`, `permit_id`) VALUES
(1, 1),
(1, 3),
(2, 2),
(2, 3),
(4, 2),
(4, 4),
(20, 1),
(20, 3),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(25, 2),
(25, 3),
(26, 2),
(26, 3),
(29, 2),
(29, 3),
(34, 2),
(34, 4);

-- --------------------------------------------------------

--
-- Table structure for table `route_tags`
--

CREATE TABLE `route_tags` (
  `route_id` bigint UNSIGNED NOT NULL,
  `tag_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `route_tags`
--

INSERT INTO `route_tags` (`route_id`, `tag_id`) VALUES
(1, 1),
(29, 1),
(1, 2),
(4, 2),
(21, 2),
(34, 2),
(2, 3),
(32, 3),
(44, 4),
(2, 5),
(4, 5),
(21, 5),
(49, 5),
(32, 6),
(34, 6),
(44, 6),
(49, 6),
(29, 8);

-- --------------------------------------------------------

--
-- Table structure for table `semantic_tags`
--

CREATE TABLE `semantic_tags` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon_class` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `semantic_tags`
--

INSERT INTO `semantic_tags` (`id`, `name`, `icon_class`) VALUES
(1, 'High Altitude', 'fa-mountain'),
(2, 'Cultural Trek', 'fa-temple'),
(3, 'Moderate Difficulty', 'fa-hiking'),
(4, 'Family Friendly', 'fa-users'),
(5, 'Off the Beaten Path', 'fa-compass'),
(6, 'Restricted Area', 'ri-lock-2-line'),
(7, 'Camping Trek', 'ri-tent-line'),
(8, 'Short Trek', 'ri-timer-flash-line'),
(9, 'Luxury Lodge', 'ri-hotel-bed-line');

-- --------------------------------------------------------

--
-- Table structure for table `sustainability_projects`
--

CREATE TABLE `sustainability_projects` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `cost_per_unit_usd` decimal(10,2) NOT NULL,
  `media_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sustainability_projects`
--

INSERT INTO `sustainability_projects` (`id`, `name`, `description`, `cost_per_unit_usd`, `media_id`) VALUES
(1, 'Tree Planting Program', 'Plant native trees in the Himalayan region to offset carbon footprint', 10.00, NULL),
(2, 'Clean Mountain Initiative', 'Support waste management and cleanup efforts on trekking routes', 15.00, NULL),
(3, 'Local School Support', 'Contribute to education in mountain villages', 20.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team_profiles`
--

CREATE TABLE `team_profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `gender` enum('male','female','other') DEFAULT 'male',
  `position` varchar(100) NOT NULL,
  `bio` text,
  `experience_years` int DEFAULT '0',
  `languages` varchar(255) DEFAULT NULL,
  `photo_media_id` bigint UNSIGNED DEFAULT NULL,
  `intro_video_media_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `team_profiles`
--

INSERT INTO `team_profiles` (`id`, `user_id`, `gender`, `position`, `bio`, `experience_years`, `languages`, `photo_media_id`, `intro_video_media_id`) VALUES
(1, 101, 'male', 'Senior Trekking Guide', 'Pasang has summited Everest twice and guided for 15 years.', 15, 'English, Nepali, Sherpa, Hindi', NULL, NULL),
(2, 102, 'female', 'Cultural Guide', 'Sita specializes in the Annapurna and Mustang region cultures.', 8, 'English, Nepali, Gurung, French', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `route_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_avatar_url` varchar(255) DEFAULT NULL,
  `rating` tinyint(1) NOT NULL,
  `comment` text NOT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `route_id`, `user_id`, `user_name`, `user_avatar_url`, `rating`, `comment`, `video_url`, `is_featured`, `created_at`) VALUES
(1, 1, NULL, 'John Smith', NULL, 5, 'Yeti Routes organized everything perfectly. My guide Pasang was a legend!', NULL, 1, '2025-11-30 16:44:48'),
(2, 2, NULL, 'Emma Watson', NULL, 5, 'The Annapurna Circuit was hard but fair. The food at the teahouses was surprisingly good.', NULL, 1, '2025-11-30 16:44:48'),
(3, 4, NULL, 'Carlos R.', NULL, 4, 'Manaslu is wild! Loved the lack of crowds. Highly recommended.', NULL, 0, '2025-11-30 16:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `trail_status`
--

CREATE TABLE `trail_status` (
  `id` bigint UNSIGNED NOT NULL,
  `location_id` int UNSIGNED NOT NULL,
  `status` enum('open','caution','closed') NOT NULL DEFAULT 'open',
  `message` varchar(255) NOT NULL,
  `updated_by` bigint UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `whatsapp_number` varchar(20) DEFAULT NULL,
  `two_factor_secret` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `preferred_language` char(2) DEFAULT 'en',
  `avatar_media_id` bigint UNSIGNED DEFAULT NULL,
  `loyalty_points_balance` int DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `email`, `password_hash`, `full_name`, `phone`, `whatsapp_number`, `two_factor_secret`, `is_active`, `preferred_language`, `avatar_media_id`, `loyalty_points_balance`, `deleted_at`, `created_at`) VALUES
(1, 1, 'admin@yetiroutes.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin User', '+977-9841234567', NULL, NULL, 1, 'en', NULL, 0, NULL, '2025-11-30 12:54:02'),
(101, 1, 'content@yetiroutes.com', 'placeholder_hash', 'Pasang Sherpa', NULL, NULL, NULL, 1, 'en', NULL, 0, NULL, '2025-11-30 16:44:48'),
(102, 1, 'guide@yetiroutes.com', 'placeholder_hash', 'Sita Gurung', NULL, NULL, NULL, 1, 'en', NULL, 0, NULL, '2025-11-30 16:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_badges`
--

CREATE TABLE `user_badges` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `badge_id` int UNSIGNED NOT NULL,
  `awarded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` varchar(128) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` text,
  `last_activity` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `last_activity`) VALUES
('0gbev32j54trrb19t3tmoqp61n', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-12-01 06:57:43'),
('7km9vv5mjk3m4hmt034t0blv8l', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-12-02 18:31:48'),
('8e3nh71nvb9lp2oo4tilubki6e', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-12-04 13:45:14'),
('f8kj7ap1udnggt0vijb1v6aonn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-12-05 06:50:20'),
('k8a9bqigrdhg347a1qc7o5hdic', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-11-30 16:02:52'),
('qtigvdfi6h8esimi20ebhjjh9u', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-30 13:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_view_history`
--

CREATE TABLE `user_view_history` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `session_id` varchar(128) DEFAULT NULL,
  `route_id` bigint UNSIGNED NOT NULL,
  `viewed_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_view_history`
--

INSERT INTO `user_view_history` (`id`, `user_id`, `session_id`, `route_id`, `viewed_at`) VALUES
(1, NULL, 'qtigvdfi6h8esimi20ebhjjh9u', 32, '2025-12-01 06:54:42'),
(2, 1, 'f8kj7ap1udnggt0vijb1v6aonn', 25, '2025-12-05 12:59:20'),
(3, 1, 'f8kj7ap1udnggt0vijb1v6aonn', 25, '2025-12-05 12:59:20'),
(4, 1, 'f8kj7ap1udnggt0vijb1v6aonn', 25, '2025-12-05 13:05:58'),
(5, 1, 'f8kj7ap1udnggt0vijb1v6aonn', 25, '2025-12-05 13:05:58'),
(6, 1, 'f8kj7ap1udnggt0vijb1v6aonn', 20, '2025-12-05 13:07:09'),
(7, 1, 'f8kj7ap1udnggt0vijb1v6aonn', 20, '2025-12-05 13:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlists`
--

CREATE TABLE `user_wishlists` (
  `user_id` bigint UNSIGNED NOT NULL,
  `route_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `is_active` (`is_active`,`is_featured`),
  ADD KEY `display_order` (`display_order`),
  ADD KEY `media_id` (`media_id`),
  ADD KEY `idx_activities_featured` (`is_featured`,`is_active`),
  ADD KEY `idx_activities_difficulty` (`difficulty`),
  ADD KEY `idx_activities_display` (`display_order`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_ref` (`booking_reference`),
  ADD KEY `carbon_offset_project_id` (`carbon_offset_project_id`);

--
-- Indexes for table `booking_line_items`
--
ALTER TABLE `booking_line_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `booking_payments`
--
ALTER TABLE `booking_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `chat_conversations`
--
ALTER TABLE `chat_conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitor_id` (`visitor_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversation_id` (`conversation_id`,`created_at`);

--
-- Indexes for table `content_translations`
--
ALTER TABLE `content_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_translation` (`entity_type`,`entity_id`,`language_code`,`field_name`),
  ADD KEY `language_code` (`language_code`);

--
-- Indexes for table `departures`
--
ALTER TABLE `departures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `faqs` ADD FULLTEXT KEY `question` (`question`,`answer`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_id` (`route_id`),
  ADD KEY `lodge_id` (`lodge_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_id` (`media_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `featured_image_id` (`featured_image_id`);

--
-- Indexes for table `lodges`
--
ALTER TABLE `lodges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_ip` (`ip_address`,`attempt_time`);

--
-- Indexes for table `loyalty_transactions`
--
ALTER TABLE `loyalty_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `media_attachments`
--
ALTER TABLE `media_attachments`
  ADD PRIMARY KEY (`media_id`,`entity_type`,`entity_id`);

--
-- Indexes for table `media_library`
--
ALTER TABLE `media_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `packing_items`
--
ALTER TABLE `packing_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rental_gear_id` (`rental_gear_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `permits`
--
ALTER TABLE `permits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rental_gear`
--
ALTER TABLE `rental_gear`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `media_id` (`media_id`),
  ADD KEY `idx_featured` (`is_featured`,`is_active`),
  ADD KEY `featured_image_id` (`featured_image_id`);

--
-- Indexes for table `route_faq_links`
--
ALTER TABLE `route_faq_links`
  ADD PRIMARY KEY (`route_id`,`faq_id`);

--
-- Indexes for table `route_itineraries`
--
ALTER TABLE `route_itineraries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_id` (`route_id`),
  ADD KEY `audio_ambiance_media_id` (`audio_ambiance_media_id`);

--
-- Indexes for table `route_permits`
--
ALTER TABLE `route_permits`
  ADD PRIMARY KEY (`route_id`,`permit_id`);

--
-- Indexes for table `route_tags`
--
ALTER TABLE `route_tags`
  ADD PRIMARY KEY (`route_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `semantic_tags`
--
ALTER TABLE `semantic_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sustainability_projects`
--
ALTER TABLE `sustainability_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `team_profiles`
--
ALTER TABLE `team_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_id` (`route_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `trail_status`
--
ALTER TABLE `trail_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `avatar_media_id` (`avatar_media_id`);

--
-- Indexes for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `badge_id` (`badge_id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_view_history`
--
ALTER TABLE `user_view_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_history_lookup` (`user_id`,`session_id`,`viewed_at`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `user_wishlists`
--
ALTER TABLE `user_wishlists`
  ADD PRIMARY KEY (`user_id`,`route_id`),
  ADD KEY `route_id` (`route_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_line_items`
--
ALTER TABLE `booking_line_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_payments`
--
ALTER TABLE `booking_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_conversations`
--
ALTER TABLE `chat_conversations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `content_translations`
--
ALTER TABLE `content_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departures`
--
ALTER TABLE `departures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `lodges`
--
ALTER TABLE `lodges`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loyalty_transactions`
--
ALTER TABLE `loyalty_transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_library`
--
ALTER TABLE `media_library`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packing_items`
--
ALTER TABLE `packing_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permits`
--
ALTER TABLE `permits`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rental_gear`
--
ALTER TABLE `rental_gear`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `route_itineraries`
--
ALTER TABLE `route_itineraries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `semantic_tags`
--
ALTER TABLE `semantic_tags`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sustainability_projects`
--
ALTER TABLE `sustainability_projects`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_profiles`
--
ALTER TABLE `team_profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trail_status`
--
ALTER TABLE `trail_status`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `user_badges`
--
ALTER TABLE `user_badges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_view_history`
--
ALTER TABLE `user_view_history`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `blog_posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`),
  ADD CONSTRAINT `blog_posts_ibfk_3` FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`carbon_offset_project_id`) REFERENCES `sustainability_projects` (`id`);

--
-- Constraints for table `booking_line_items`
--
ALTER TABLE `booking_line_items`
  ADD CONSTRAINT `booking_line_items_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_payments`
--
ALTER TABLE `booking_payments`
  ADD CONSTRAINT `booking_payments_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `chat_conversations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `content_translations`
--
ALTER TABLE `content_translations`
  ADD CONSTRAINT `content_translations_ibfk_1` FOREIGN KEY (`language_code`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `departures`
--
ALTER TABLE `departures`
  ADD CONSTRAINT `departures_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`);

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inquiries_ibfk_2` FOREIGN KEY (`lodge_id`) REFERENCES `lodges` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`),
  ADD CONSTRAINT `locations_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `locations` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `lodges`
--
ALTER TABLE `lodges`
  ADD CONSTRAINT `lodges_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`);

--
-- Constraints for table `loyalty_transactions`
--
ALTER TABLE `loyalty_transactions`
  ADD CONSTRAINT `loyalty_transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `media_attachments`
--
ALTER TABLE `media_attachments`
  ADD CONSTRAINT `media_attachments_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `packing_items`
--
ALTER TABLE `packing_items`
  ADD CONSTRAINT `packing_items_ibfk_1` FOREIGN KEY (`rental_gear_id`) REFERENCES `rental_gear` (`id`);

--
-- Constraints for table `rental_gear`
--
ALTER TABLE `rental_gear`
  ADD CONSTRAINT `rental_gear_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`);

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `routes_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `routes_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`);

--
-- Constraints for table `route_itineraries`
--
ALTER TABLE `route_itineraries`
  ADD CONSTRAINT `route_itineraries_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `route_itineraries_ibfk_2` FOREIGN KEY (`audio_ambiance_media_id`) REFERENCES `media_library` (`id`);

--
-- Constraints for table `route_tags`
--
ALTER TABLE `route_tags`
  ADD CONSTRAINT `route_tags_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `route_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `semantic_tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sustainability_projects`
--
ALTER TABLE `sustainability_projects`
  ADD CONSTRAINT `sustainability_projects_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`);

--
-- Constraints for table `team_profiles`
--
ALTER TABLE `team_profiles`
  ADD CONSTRAINT `team_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `testimonials_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `trail_status`
--
ALTER TABLE `trail_status`
  ADD CONSTRAINT `trail_status_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`avatar_media_id`) REFERENCES `media_library` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD CONSTRAINT `user_badges_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_badges_ibfk_2` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_view_history`
--
ALTER TABLE `user_view_history`
  ADD CONSTRAINT `user_view_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_view_history_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_wishlists`
--
ALTER TABLE `user_wishlists`
  ADD CONSTRAINT `user_wishlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_wishlists_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
