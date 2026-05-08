-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2026 at 11:44 AM
-- Server version: 8.0.45-cll-lve
-- PHP Version: 8.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwwyetiroutes_nepal`
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

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `type`, `route_id`, `lodge_id`, `name`, `email`, `phone`, `message`, `status`, `ip_address`, `created_at`) VALUES
(1, 'general', NULL, NULL, 'Swastik Nakarmi', 'swastik.nakarmi@gmail.com', '', 'sdfdfdfdf', 'new', '127.0.0.1', '2025-12-09 06:31:32'),
(2, 'general', NULL, NULL, 'Swastik Nakarmi', 'swastik.nakarmi@gmail.com', '', 'sdfdfdfdf', 'new', '127.0.0.1', '2025-12-09 06:33:13'),
(3, 'general', NULL, NULL, 'swastik nakarmi', 'himalayanbeekeepers@gmail.com', '', 'sdfdfdf', 'new', '127.0.0.1', '2025-12-09 06:33:23'),
(4, 'general', NULL, NULL, 'Swastik Nakarmi', 'swastik.nakarmi@gmail.com', '', 'dfdfdfd', 'new', '127.0.0.1', '2025-12-09 06:35:09'),
(5, 'general', NULL, NULL, 'Swastik Nakarmi', 'swastik.nakarmi@gmail.com', '', 'sdfdfdfdf', 'new', '127.0.0.1', '2025-12-09 06:42:18');

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
(7, '127.0.0.1', '2025-12-05 06:50:20'),
(8, '127.0.0.1', '2025-12-09 06:32:28');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
('00vt15cntnja2rj8jlrfprjjl8', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-12-09 06:32:28'),
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
(7, 1, 'f8kj7ap1udnggt0vijb1v6aonn', 20, '2025-12-05 13:07:09'),
(8, NULL, '2d4cf9db14aaf1629ef5df8d57121fac', 34, '2025-12-29 10:31:52'),
(9, NULL, '2d4cf9db14aaf1629ef5df8d57121fac', 34, '2025-12-29 10:31:52'),
(10, NULL, 'a68def147c3f8d3c3e987f23036a04cb', 2, '2025-12-29 11:14:42'),
(11, NULL, 'a68def147c3f8d3c3e987f23036a04cb', 2, '2025-12-29 11:14:42'),
(12, NULL, 'f7d128a61ec6cdeabafb2dbb91456278', 26, '2025-12-29 12:32:57'),
(13, NULL, 'f7d128a61ec6cdeabafb2dbb91456278', 26, '2025-12-29 12:32:57'),
(14, NULL, '5a83af9906d3994500da39b169ce7e26', 21, '2025-12-29 12:42:58'),
(15, NULL, '5a83af9906d3994500da39b169ce7e26', 21, '2025-12-29 12:42:58'),
(16, NULL, '5fe7e71dd72ad52b01733c5b86e724df', 25, '2025-12-29 14:32:37'),
(17, NULL, '5fe7e71dd72ad52b01733c5b86e724df', 25, '2025-12-29 14:32:37'),
(18, NULL, 'a97244d5d93c0928052e90bf93d836db', 1, '2025-12-29 23:02:15'),
(19, NULL, 'a97244d5d93c0928052e90bf93d836db', 1, '2025-12-29 23:02:15'),
(20, NULL, 'd05b5d3e0282e36f76740a638f5f9b4f', 1, '2025-12-30 20:59:48'),
(21, NULL, 'd05b5d3e0282e36f76740a638f5f9b4f', 1, '2025-12-30 20:59:48'),
(22, NULL, '610c3144ed69cd737d5f802a9eba1711', 32, '2025-12-31 17:21:01'),
(23, NULL, '610c3144ed69cd737d5f802a9eba1711', 32, '2025-12-31 17:21:01'),
(24, NULL, '102f6b8f66f03f8dfba182ccfc473a3d', 21, '2025-12-31 18:20:54'),
(25, NULL, '102f6b8f66f03f8dfba182ccfc473a3d', 21, '2025-12-31 18:20:54'),
(26, NULL, '6490d91ad8ffb0235bd96ce6f2dc032a', 29, '2025-12-31 20:20:02'),
(27, NULL, '6490d91ad8ffb0235bd96ce6f2dc032a', 29, '2025-12-31 20:20:02'),
(28, NULL, '2032cadf975a8cdcf5e88b6bcd053c63', 4, '2025-12-31 22:15:36'),
(29, NULL, '2032cadf975a8cdcf5e88b6bcd053c63', 4, '2025-12-31 22:15:37'),
(30, NULL, 'b2f28e45101db0620aad4b9df7116266', 34, '2025-12-31 23:38:20'),
(31, NULL, 'b2f28e45101db0620aad4b9df7116266', 34, '2025-12-31 23:38:20'),
(32, NULL, '4a2009280f6706993a2e8a841ecb645e', 20, '2026-01-01 00:23:54'),
(33, NULL, '4a2009280f6706993a2e8a841ecb645e', 20, '2026-01-01 00:23:54'),
(34, NULL, '02a72fb8df475fc3d86fcc095ba6d78d', 2, '2026-01-01 01:01:46'),
(35, NULL, '02a72fb8df475fc3d86fcc095ba6d78d', 2, '2026-01-01 01:01:46'),
(36, NULL, '871ee9e897d6ddca21b81470c3daa4f5', 34, '2026-01-01 01:15:17'),
(37, NULL, '871ee9e897d6ddca21b81470c3daa4f5', 34, '2026-01-01 01:15:17'),
(38, NULL, '3015ab04a96b24410fc413d0272ec270', 26, '2026-01-01 01:48:48'),
(39, NULL, '3015ab04a96b24410fc413d0272ec270', 26, '2026-01-01 01:48:48'),
(40, NULL, '8e3530054af7daf2822110a4e6fd7b03', 20, '2026-01-01 02:19:55'),
(41, NULL, '8e3530054af7daf2822110a4e6fd7b03', 20, '2026-01-01 02:19:55'),
(42, NULL, '4a3d3f9423b1d57159b1d7a8c37914df', 26, '2026-01-01 02:52:30'),
(43, NULL, '4a3d3f9423b1d57159b1d7a8c37914df', 26, '2026-01-01 02:52:30'),
(44, NULL, 'c81fb33559ca1bce7a4bc33c1aa2769c', 25, '2026-01-01 09:33:20'),
(45, NULL, 'c81fb33559ca1bce7a4bc33c1aa2769c', 25, '2026-01-01 09:33:20'),
(46, NULL, '8af6f7ada1654cc02fcc4d031c37f95e', 36, '2026-01-01 18:29:00'),
(47, NULL, '8af6f7ada1654cc02fcc4d031c37f95e', 36, '2026-01-01 18:29:00'),
(48, NULL, '7d15c9274509ad20da7f680cc37649a7', 21, '2026-01-02 16:27:34'),
(49, NULL, '7d15c9274509ad20da7f680cc37649a7', 21, '2026-01-02 16:27:34'),
(50, NULL, '553a9fa2c5ae8f3464af93efa9e7bf56', 32, '2026-01-02 17:00:14'),
(51, NULL, '553a9fa2c5ae8f3464af93efa9e7bf56', 32, '2026-01-02 17:00:14'),
(52, NULL, '2420ef501c5cddf6fe0c49a2491964c9', 21, '2026-01-02 17:12:35'),
(53, NULL, '2420ef501c5cddf6fe0c49a2491964c9', 21, '2026-01-02 17:12:35'),
(54, NULL, 'c57be3ddd68c4f80e8a864cacaff4eb2', 29, '2026-01-02 17:28:21'),
(55, NULL, 'c57be3ddd68c4f80e8a864cacaff4eb2', 29, '2026-01-02 17:28:21'),
(56, NULL, '24d5b0e7b9f8b8db0ad5cb6104368aa5', 28, '2026-01-02 17:52:18'),
(57, NULL, '24d5b0e7b9f8b8db0ad5cb6104368aa5', 28, '2026-01-02 17:52:18'),
(58, NULL, 'be6a4d0bf21608a578a8cd49c838d877', 4, '2026-01-02 18:38:11'),
(59, NULL, 'be6a4d0bf21608a578a8cd49c838d877', 4, '2026-01-02 18:38:11'),
(60, NULL, '507e357eadb3b0e915bce150e260adf0', 2, '2026-01-02 19:02:36'),
(61, NULL, '507e357eadb3b0e915bce150e260adf0', 2, '2026-01-02 19:02:36'),
(62, NULL, '9db55c8e147fbbdcd7c79c5a13665556', 25, '2026-01-02 19:30:01'),
(63, NULL, '9db55c8e147fbbdcd7c79c5a13665556', 25, '2026-01-02 19:30:01'),
(64, NULL, '6835f0c836dc7c94aaef49d3e6c19c92', 2, '2026-01-03 01:36:13'),
(65, NULL, '6835f0c836dc7c94aaef49d3e6c19c92', 2, '2026-01-03 01:36:13'),
(66, NULL, '7aea621ace189abf6328abc2f13de16f', 32, '2026-01-03 05:31:16'),
(67, NULL, '7aea621ace189abf6328abc2f13de16f', 32, '2026-01-03 05:31:16'),
(68, NULL, 'd8ba6ab2298380416ca42cb1afc08db8', 29, '2026-01-03 14:33:52'),
(69, NULL, 'd8ba6ab2298380416ca42cb1afc08db8', 29, '2026-01-03 14:33:52'),
(70, NULL, 'bcb63c2409958e8d7d73973d658086ba', 21, '2026-01-03 21:38:46'),
(71, NULL, 'bcb63c2409958e8d7d73973d658086ba', 21, '2026-01-03 21:38:46'),
(72, NULL, 'ad4577cd308cda263accdce9cb924dce', 1, '2026-01-05 11:21:01'),
(73, NULL, 'ad4577cd308cda263accdce9cb924dce', 1, '2026-01-05 11:21:01'),
(74, NULL, '9c5bca84bfe1a92771c590977e412fcf', 2, '2026-01-05 19:37:05'),
(75, NULL, '9c5bca84bfe1a92771c590977e412fcf', 2, '2026-01-05 19:37:05'),
(76, NULL, '04df17e50f2c126795c3303f9ba12ed6', 1, '2026-01-05 22:15:22'),
(77, NULL, '04df17e50f2c126795c3303f9ba12ed6', 1, '2026-01-05 22:15:22'),
(78, NULL, 'b8a96966a0a67724a25e58323bd88fce', 34, '2026-01-05 23:52:15'),
(79, NULL, 'b8a96966a0a67724a25e58323bd88fce', 34, '2026-01-05 23:52:16'),
(80, NULL, 'fbf3f0d35ed1312d2342a8f6f690c89e', 20, '2026-01-06 00:59:45'),
(81, NULL, 'fbf3f0d35ed1312d2342a8f6f690c89e', 20, '2026-01-06 00:59:45'),
(82, NULL, '816e50e574c7ed01fcc8c326dcded3df', 26, '2026-01-06 02:58:13'),
(83, NULL, '816e50e574c7ed01fcc8c326dcded3df', 26, '2026-01-06 02:58:13'),
(84, NULL, 'bc86597e0a6da15a3d2a83f3c3cd72b1', 32, '2026-01-06 03:53:28'),
(85, NULL, 'bc86597e0a6da15a3d2a83f3c3cd72b1', 32, '2026-01-06 03:53:28'),
(86, NULL, 'de06471d2de648cc24982e700bc42662', 21, '2026-01-06 05:57:35'),
(87, NULL, 'de06471d2de648cc24982e700bc42662', 21, '2026-01-06 05:57:35'),
(88, NULL, '6294be685c3dc5745e39cac9541ca5c5', 29, '2026-01-06 08:21:02'),
(89, NULL, '6294be685c3dc5745e39cac9541ca5c5', 29, '2026-01-06 08:21:02'),
(90, NULL, 'f0ade10c1ba358e1c542fb890070edd3', 4, '2026-01-06 09:22:07'),
(91, NULL, 'f0ade10c1ba358e1c542fb890070edd3', 4, '2026-01-06 09:22:07'),
(92, NULL, 'fb9473c831e2f2fabab892c695f16b94', 20, '2026-01-06 10:38:35'),
(93, NULL, 'fb9473c831e2f2fabab892c695f16b94', 20, '2026-01-06 10:38:35'),
(94, NULL, 'c77edbac2b8bfbf963166318cb2be42f', 2, '2026-01-06 11:56:43'),
(95, NULL, 'c77edbac2b8bfbf963166318cb2be42f', 2, '2026-01-06 11:56:43'),
(96, NULL, '963279b82054ccc605c78faa268c38af', 28, '2026-01-06 13:42:36'),
(97, NULL, '963279b82054ccc605c78faa268c38af', 28, '2026-01-06 13:42:36'),
(98, NULL, 'c1e9cc74bec9b8e01cbb88119459a7fc', 26, '2026-01-06 13:44:17'),
(99, NULL, 'c1e9cc74bec9b8e01cbb88119459a7fc', 26, '2026-01-06 13:44:17'),
(100, NULL, 'abcf38e6334a09343e01ae4c6bcaf9af', 25, '2026-01-06 19:10:21'),
(101, NULL, 'abcf38e6334a09343e01ae4c6bcaf9af', 25, '2026-01-06 19:10:21'),
(102, NULL, '7d105b71a4e3ccd390455ef8b4df3ab1', 36, '2026-01-06 19:22:45'),
(103, NULL, '7d105b71a4e3ccd390455ef8b4df3ab1', 36, '2026-01-06 19:22:45'),
(104, NULL, '8013b819ec997c6a58b1e92b6261f3ae', 26, '2026-01-07 15:21:57'),
(105, NULL, '8013b819ec997c6a58b1e92b6261f3ae', 26, '2026-01-07 15:21:57'),
(106, NULL, '12997a26d0594377f1a39bac5ca5771a', 34, '2026-01-07 15:51:31'),
(107, NULL, '12997a26d0594377f1a39bac5ca5771a', 34, '2026-01-07 15:51:31'),
(108, NULL, 'dc0dd6a71c9cb01f8bb57beb867073bf', 4, '2026-01-07 16:01:47'),
(109, NULL, 'dc0dd6a71c9cb01f8bb57beb867073bf', 4, '2026-01-07 16:01:47'),
(110, NULL, '2525bed9c65427336d39ad3a6fce7fe5', 1, '2026-01-07 16:03:45'),
(111, NULL, '2525bed9c65427336d39ad3a6fce7fe5', 1, '2026-01-07 16:03:45'),
(112, NULL, '090dc0dd3599428356a4027ccdb709d4', 2, '2026-01-07 16:58:50'),
(113, NULL, '090dc0dd3599428356a4027ccdb709d4', 2, '2026-01-07 16:58:50'),
(114, NULL, 'dd5cd7c6c9c14221e01ce1257a4013a5', 21, '2026-01-07 18:37:41'),
(115, NULL, 'dd5cd7c6c9c14221e01ce1257a4013a5', 21, '2026-01-07 18:37:41'),
(116, NULL, '9d25c2348ad7c9ec22b33eabfcb36ec6', 34, '2026-01-07 18:42:11'),
(117, NULL, '9d25c2348ad7c9ec22b33eabfcb36ec6', 34, '2026-01-07 18:42:11'),
(118, NULL, '104a6e9bf7aea6bc3847430079273807', 20, '2026-01-07 19:39:46'),
(119, NULL, '104a6e9bf7aea6bc3847430079273807', 20, '2026-01-07 19:39:46'),
(120, NULL, '066e161b80e1616b656ed93d22a8979a', 32, '2026-01-07 22:12:50'),
(121, NULL, '066e161b80e1616b656ed93d22a8979a', 32, '2026-01-07 22:12:50'),
(122, NULL, 'a6c25b0d7642367904c4689aa00e9a7f', 32, '2026-01-07 22:13:29'),
(123, NULL, 'a6c25b0d7642367904c4689aa00e9a7f', 32, '2026-01-07 22:13:29'),
(124, NULL, 'f58c96571a0d8f9ca96d01a864ce7d80', 21, '2026-01-07 22:39:42'),
(125, NULL, 'f58c96571a0d8f9ca96d01a864ce7d80', 21, '2026-01-07 22:39:42'),
(126, NULL, '9f11a2aa3878b221807152b9b57561c7', 29, '2026-01-07 23:05:17'),
(127, NULL, '9f11a2aa3878b221807152b9b57561c7', 29, '2026-01-07 23:05:17'),
(128, NULL, '81b71f36f2cab38697f412064d549032', 28, '2026-01-08 00:00:06'),
(129, NULL, '81b71f36f2cab38697f412064d549032', 28, '2026-01-08 00:00:06'),
(130, NULL, '325a94298eaeef22e80b1d78b24bebda', 25, '2026-01-08 00:20:44'),
(131, NULL, '325a94298eaeef22e80b1d78b24bebda', 25, '2026-01-08 00:20:44'),
(132, NULL, '9a0ffa54769658ebacd2304812d175e3', 4, '2026-01-08 00:36:26'),
(133, NULL, '9a0ffa54769658ebacd2304812d175e3', 4, '2026-01-08 00:36:26'),
(134, NULL, '68aaf61435d2aba4b2648b47390d9a7b', 29, '2026-01-08 00:48:27'),
(135, NULL, '68aaf61435d2aba4b2648b47390d9a7b', 29, '2026-01-08 00:48:27'),
(136, NULL, '82cbe831ab2d679c2ff3383d4c9cddd6', 2, '2026-01-08 01:11:15'),
(137, NULL, '82cbe831ab2d679c2ff3383d4c9cddd6', 2, '2026-01-08 01:11:15'),
(138, NULL, 'a57b1ff4e3cbb1e974bacf6059e835b7', 32, '2026-01-08 01:15:09'),
(139, NULL, 'a57b1ff4e3cbb1e974bacf6059e835b7', 32, '2026-01-08 01:15:09'),
(140, NULL, '88e817f928a5a08b2c6220efa70bed4e', 25, '2026-01-08 01:48:01'),
(141, NULL, '88e817f928a5a08b2c6220efa70bed4e', 25, '2026-01-08 01:48:01'),
(142, NULL, '997a3b8a5a5ab9d079e0722c7526a450', 28, '2026-01-10 13:39:42'),
(143, NULL, '997a3b8a5a5ab9d079e0722c7526a450', 28, '2026-01-10 13:39:42'),
(144, NULL, '4e15a280d71acdcb0b6882d9c8e0e41b', 34, '2026-01-10 14:50:39'),
(145, NULL, '4e15a280d71acdcb0b6882d9c8e0e41b', 34, '2026-01-10 14:50:39'),
(146, NULL, 'f000c48c577c1614e908c75ee3c1839e', 20, '2026-01-10 15:10:11'),
(147, NULL, 'f000c48c577c1614e908c75ee3c1839e', 20, '2026-01-10 15:10:11'),
(148, NULL, '0d84ec1e5c46828912c7fbb0fa189ca0', 34, '2026-01-10 20:18:49'),
(149, NULL, '0d84ec1e5c46828912c7fbb0fa189ca0', 34, '2026-01-10 20:18:49'),
(150, NULL, '131ba6e750f86ebe4014b003d2e74450', 20, '2026-01-10 21:29:07'),
(151, NULL, '131ba6e750f86ebe4014b003d2e74450', 20, '2026-01-10 21:29:07'),
(152, NULL, '3572f435a5c5d96eb55f8c1ccace7ff3', 26, '2026-01-10 23:12:36'),
(153, NULL, '3572f435a5c5d96eb55f8c1ccace7ff3', 26, '2026-01-10 23:12:36'),
(154, NULL, '20bffbd00db3f93e495a23e155e7e202', 1, '2026-01-11 03:59:08'),
(155, NULL, '20bffbd00db3f93e495a23e155e7e202', 1, '2026-01-11 03:59:08'),
(156, NULL, '692399786ca2ab9251cb9d9c8ed4885f', 1, '2026-01-11 10:09:20'),
(157, NULL, '692399786ca2ab9251cb9d9c8ed4885f', 1, '2026-01-11 10:09:20'),
(158, NULL, '7199c0a19563ce32de6441ae8a053fed', 32, '2026-01-11 11:13:33'),
(159, NULL, '7199c0a19563ce32de6441ae8a053fed', 32, '2026-01-11 11:13:33'),
(160, NULL, '1a38111095cfe30b598f73ed172d15da', 21, '2026-01-11 13:32:46'),
(161, NULL, '1a38111095cfe30b598f73ed172d15da', 21, '2026-01-11 13:32:46'),
(162, NULL, 'c177d97a839e683502a534532d41d2a8', 29, '2026-01-11 15:51:32'),
(163, NULL, 'c177d97a839e683502a534532d41d2a8', 29, '2026-01-11 15:51:32'),
(164, NULL, 'fd7e65e9f5fac4889ed160daac909f24', 20, '2026-01-11 19:09:05'),
(165, NULL, 'fd7e65e9f5fac4889ed160daac909f24', 20, '2026-01-11 19:09:05'),
(166, NULL, 'fddbcb0ca867ac3dc4c7d8ed1102b86e', 2, '2026-01-11 21:40:05'),
(167, NULL, 'fddbcb0ca867ac3dc4c7d8ed1102b86e', 2, '2026-01-11 21:40:05'),
(168, NULL, '50cdff0c9c43441c459486bda9080542', 26, '2026-01-12 01:11:19'),
(169, NULL, '50cdff0c9c43441c459486bda9080542', 26, '2026-01-12 01:11:19'),
(170, NULL, 'b0df3fabbe0f58c136a692b7e8aa22a3', 36, '2026-01-12 02:36:30'),
(171, NULL, 'b0df3fabbe0f58c136a692b7e8aa22a3', 36, '2026-01-12 02:36:30'),
(172, NULL, '8596c292af5e937bf61ae49ef449347c', 25, '2026-01-12 06:06:23'),
(173, NULL, '8596c292af5e937bf61ae49ef449347c', 25, '2026-01-12 06:06:23'),
(174, NULL, 'a5ae77c8621f80b70b967fc68fe1cde8', 32, '2026-01-12 23:47:40'),
(175, NULL, 'a5ae77c8621f80b70b967fc68fe1cde8', 32, '2026-01-12 23:47:40'),
(176, NULL, 'a5c353bb3550095c8b853987d3f45041', 21, '2026-01-13 00:18:32'),
(177, NULL, 'a5c353bb3550095c8b853987d3f45041', 21, '2026-01-13 00:18:32'),
(178, NULL, '2a7239ae224e5901038310926208be59', 29, '2026-01-13 01:13:46'),
(179, NULL, '2a7239ae224e5901038310926208be59', 29, '2026-01-13 01:13:46'),
(180, NULL, 'b81412c1ccb83d367ee224f3b558c278', 28, '2026-01-13 02:01:10'),
(181, NULL, 'b81412c1ccb83d367ee224f3b558c278', 28, '2026-01-13 02:01:10'),
(182, NULL, '053033b3117c30336090965a5e23facc', 4, '2026-01-13 02:45:46'),
(183, NULL, '053033b3117c30336090965a5e23facc', 4, '2026-01-13 02:45:46'),
(184, NULL, '46521126a8f87d1b4c94a39bb5af4c2f', 2, '2026-01-13 03:30:22'),
(185, NULL, '46521126a8f87d1b4c94a39bb5af4c2f', 2, '2026-01-13 03:30:22'),
(186, NULL, '3a487fedab00f9768b87e76fa8e2cde1', 25, '2026-01-13 04:30:57'),
(187, NULL, '3a487fedab00f9768b87e76fa8e2cde1', 25, '2026-01-13 04:30:57'),
(188, NULL, '6ac770073848a6dc96f63e4a9484a4bb', 32, '2026-01-14 03:01:47'),
(189, NULL, '6ac770073848a6dc96f63e4a9484a4bb', 32, '2026-01-14 03:01:47'),
(190, NULL, '69fe4335daba3e94acd80226478dfe56', 25, '2026-01-14 03:01:50'),
(191, NULL, '69fe4335daba3e94acd80226478dfe56', 25, '2026-01-14 03:01:50'),
(192, NULL, 'd82640b390d6d8abeadd5348558a1c82', 20, '2026-01-14 03:01:53'),
(193, NULL, 'd82640b390d6d8abeadd5348558a1c82', 20, '2026-01-14 03:01:53'),
(194, NULL, '79773916bb4f21ffe33b04d5f0eba2bd', 4, '2026-01-14 03:01:55'),
(195, NULL, '79773916bb4f21ffe33b04d5f0eba2bd', 4, '2026-01-14 03:01:55'),
(196, NULL, 'e1704c522dd98716cca5730f50db5105', 1, '2026-01-14 03:01:58'),
(197, NULL, 'e1704c522dd98716cca5730f50db5105', 1, '2026-01-14 03:01:58'),
(198, NULL, '576d00fbc30abc40746dd009d0aa2e0c', 34, '2026-01-14 03:02:00'),
(199, NULL, '576d00fbc30abc40746dd009d0aa2e0c', 34, '2026-01-14 03:02:00'),
(200, NULL, 'cea4ecc0af26a1f896e3e60b41a09328', 28, '2026-01-14 03:02:00'),
(201, NULL, 'cea4ecc0af26a1f896e3e60b41a09328', 28, '2026-01-14 03:02:00'),
(202, NULL, '9f06f5d52d476895f0c2ba431267c7f4', 29, '2026-01-14 03:02:03'),
(203, NULL, '9f06f5d52d476895f0c2ba431267c7f4', 29, '2026-01-14 03:02:03'),
(204, NULL, '89c3b6af405ee4d557e37d1ceaae84cd', 26, '2026-01-14 03:02:06'),
(205, NULL, '89c3b6af405ee4d557e37d1ceaae84cd', 26, '2026-01-14 03:02:06'),
(206, NULL, 'ab67322988f4128c3e29eb9f58fa6e04', 21, '2026-01-14 03:02:06'),
(207, NULL, 'ab67322988f4128c3e29eb9f58fa6e04', 21, '2026-01-14 03:02:06'),
(208, NULL, 'f27730f2ae7a5ee3a1547a0a25fbc2bc', 2, '2026-01-14 03:02:07'),
(209, NULL, 'f27730f2ae7a5ee3a1547a0a25fbc2bc', 2, '2026-01-14 03:02:07'),
(210, NULL, '8b3ca08eef339ebca80bc1055ab1f7d6', 29, '2026-01-14 13:36:24'),
(211, NULL, '8b3ca08eef339ebca80bc1055ab1f7d6', 29, '2026-01-14 13:36:24'),
(212, NULL, '28d76e65ff909c338ec8064f0c8bce30', 20, '2026-01-14 19:52:46'),
(213, NULL, '28d76e65ff909c338ec8064f0c8bce30', 20, '2026-01-14 19:52:46'),
(214, NULL, '2fc4de44ef15417b7517caa6f35e9147', 4, '2026-01-15 00:37:47'),
(215, NULL, '2fc4de44ef15417b7517caa6f35e9147', 4, '2026-01-15 00:37:47'),
(216, NULL, '7d35a828c364bfd35e054ba74db01f21', 34, '2026-01-15 16:10:12'),
(217, NULL, '7d35a828c364bfd35e054ba74db01f21', 34, '2026-01-15 16:10:12'),
(218, NULL, '2049115c707db3f4bc2837ffe79ca35b', 28, '2026-01-15 17:04:15'),
(219, NULL, '2049115c707db3f4bc2837ffe79ca35b', 28, '2026-01-15 17:04:15'),
(220, NULL, '8edd93b9e456bff47b2f4f6058124f02', 20, '2026-01-15 18:42:57'),
(221, NULL, '8edd93b9e456bff47b2f4f6058124f02', 20, '2026-01-15 18:42:57'),
(222, NULL, '135adbdd46e7075392dadbcb0a925804', 34, '2026-01-15 19:21:19'),
(223, NULL, '135adbdd46e7075392dadbcb0a925804', 34, '2026-01-15 19:21:19'),
(224, NULL, '6a4697fecd7d5482e7d900a37df52aeb', 26, '2026-01-15 20:05:24'),
(225, NULL, '6a4697fecd7d5482e7d900a37df52aeb', 26, '2026-01-15 20:05:24'),
(226, NULL, '8e29a24e65819b86bb7b8d7ed6b2f462', 1, '2026-01-16 15:26:05'),
(227, NULL, '8e29a24e65819b86bb7b8d7ed6b2f462', 1, '2026-01-16 15:26:05'),
(228, NULL, 'f302449a9e7af5b88d75d60d124cd34e', 32, '2026-01-16 17:32:41'),
(229, NULL, 'f302449a9e7af5b88d75d60d124cd34e', 32, '2026-01-16 17:32:41'),
(230, NULL, '3cc611c0c2ea1eb6c518fca7c1080b70', 1, '2026-01-16 18:54:22'),
(231, NULL, '3cc611c0c2ea1eb6c518fca7c1080b70', 1, '2026-01-16 18:54:22'),
(232, NULL, 'a4c89f7d31faa4b2afc45ea2dda684ec', 21, '2026-01-16 20:29:56'),
(233, NULL, 'a4c89f7d31faa4b2afc45ea2dda684ec', 21, '2026-01-16 20:29:56'),
(234, NULL, '04382f6efb7fc0ec074bc92a4be5e087', 29, '2026-01-17 00:40:42'),
(235, NULL, '04382f6efb7fc0ec074bc92a4be5e087', 29, '2026-01-17 00:40:43'),
(236, NULL, '0b34b4ded4437be87122859a64121685', 20, '2026-01-17 03:35:33'),
(237, NULL, '0b34b4ded4437be87122859a64121685', 20, '2026-01-17 03:35:33'),
(238, NULL, 'a2b2d89dd49de06ae708474241e92201', 2, '2026-01-17 05:05:25'),
(239, NULL, 'a2b2d89dd49de06ae708474241e92201', 2, '2026-01-17 05:05:25'),
(240, NULL, '76ff81fa08e5b666d64460d407cec993', 26, '2026-01-17 06:33:25'),
(241, NULL, '76ff81fa08e5b666d64460d407cec993', 26, '2026-01-17 06:33:25'),
(242, NULL, 'd513a93215fc7401af547c0273afd0bb', 36, '2026-01-17 09:15:34'),
(243, NULL, 'd513a93215fc7401af547c0273afd0bb', 36, '2026-01-17 09:15:34'),
(244, NULL, 'a8d173402c4f4561e4bc9f7fd9cab633', 1, '2026-01-17 11:48:41'),
(245, NULL, 'a8d173402c4f4561e4bc9f7fd9cab633', 1, '2026-01-17 11:48:41'),
(246, NULL, '93d78ad82a9e5bbdf0c5d26b3656a06a', 25, '2026-01-17 13:36:03'),
(247, NULL, '93d78ad82a9e5bbdf0c5d26b3656a06a', 25, '2026-01-17 13:36:03'),
(248, NULL, '835eaa626db2026b6c78b8c810a8ff5f', 4, '2026-01-17 19:11:01'),
(249, NULL, '835eaa626db2026b6c78b8c810a8ff5f', 4, '2026-01-17 19:11:01'),
(250, NULL, 'c5563efa2b051811bf45c5db54fd9e8f', 32, '2026-01-18 02:14:08'),
(251, NULL, 'c5563efa2b051811bf45c5db54fd9e8f', 32, '2026-01-18 02:14:08'),
(252, NULL, '2ab9d6782fb4f9e8dd154809a6d47406', 21, '2026-01-18 03:04:04'),
(253, NULL, '2ab9d6782fb4f9e8dd154809a6d47406', 21, '2026-01-18 03:04:04'),
(254, NULL, '67ade38d68d908cb8a24b10cc7f88b50', 29, '2026-01-18 05:32:18'),
(255, NULL, '67ade38d68d908cb8a24b10cc7f88b50', 29, '2026-01-18 05:32:18'),
(256, NULL, 'a82e8488813ffcb9df841eb4d1864b23', 28, '2026-01-18 06:21:38'),
(257, NULL, 'a82e8488813ffcb9df841eb4d1864b23', 28, '2026-01-18 06:21:38'),
(258, NULL, '82738587b78e18d5991ae62fd70e9aa2', 4, '2026-01-18 07:13:49'),
(259, NULL, '82738587b78e18d5991ae62fd70e9aa2', 4, '2026-01-18 07:13:49'),
(260, NULL, 'd5b4c3547206f3f3895d50198ec68ca2', 2, '2026-01-18 08:26:39'),
(261, NULL, 'd5b4c3547206f3f3895d50198ec68ca2', 2, '2026-01-18 08:26:39'),
(262, NULL, '06fba92b04eaaf2c9a003f0cd59d07c7', 25, '2026-01-18 09:43:10'),
(263, NULL, '06fba92b04eaaf2c9a003f0cd59d07c7', 25, '2026-01-18 09:43:10'),
(264, NULL, 'f192844ac6c11457546d79484c39ac3d', 28, '2026-01-18 16:40:53'),
(265, NULL, 'f192844ac6c11457546d79484c39ac3d', 28, '2026-01-18 16:40:53'),
(266, NULL, '1f3c2e7a422efc2970e0954bf4701150', 32, '2026-01-20 10:43:27'),
(267, NULL, '1f3c2e7a422efc2970e0954bf4701150', 32, '2026-01-20 10:43:27'),
(268, NULL, '74d0ba00af747b2f1f3d18a166b46b00', 26, '2026-01-20 11:48:00'),
(269, NULL, '74d0ba00af747b2f1f3d18a166b46b00', 26, '2026-01-20 11:48:00'),
(270, NULL, 'a754ca6feb18cdf797ec48fc3bb28291', 20, '2026-01-20 11:58:24'),
(271, NULL, 'a754ca6feb18cdf797ec48fc3bb28291', 20, '2026-01-20 11:58:24'),
(272, NULL, '05d5233e92a5259672a46ff9d04b2c01', 21, '2026-01-20 11:59:26'),
(273, NULL, '05d5233e92a5259672a46ff9d04b2c01', 21, '2026-01-20 11:59:26'),
(274, NULL, '2b2487bc8376c0a5016dd6410fc772de', 34, '2026-01-20 12:18:00'),
(275, NULL, '2b2487bc8376c0a5016dd6410fc772de', 34, '2026-01-20 12:18:00'),
(276, NULL, '1d5de1d8508e0311eb3753afda2a62d9', 28, '2026-01-20 12:22:20'),
(277, NULL, '1d5de1d8508e0311eb3753afda2a62d9', 28, '2026-01-20 12:22:20'),
(278, NULL, '57555a9634c95d5e24a36b7b4559f8c8', 21, '2026-01-20 12:22:20'),
(279, NULL, '57555a9634c95d5e24a36b7b4559f8c8', 21, '2026-01-20 12:22:20'),
(280, NULL, '9df3727dfb4c87b659aec50fd2da3c5c', 29, '2026-01-20 12:22:21'),
(281, NULL, '9df3727dfb4c87b659aec50fd2da3c5c', 29, '2026-01-20 12:22:21'),
(282, NULL, 'ef95fba0af9a38ab748ab7e09944ad52', 2, '2026-01-20 12:22:21'),
(283, NULL, 'ef95fba0af9a38ab748ab7e09944ad52', 2, '2026-01-20 12:22:21'),
(284, NULL, '7a0cdca2eee3fc396ea1396e3dd4cb16', 1, '2026-01-20 12:22:21'),
(285, NULL, '7a0cdca2eee3fc396ea1396e3dd4cb16', 1, '2026-01-20 12:22:21'),
(286, NULL, 'ce6d6eebb126405be82473fbd703ad99', 34, '2026-01-20 12:22:22'),
(287, NULL, 'ce6d6eebb126405be82473fbd703ad99', 34, '2026-01-20 12:22:22'),
(288, NULL, '9f008f1cd5e7ff40786c8f81a8dab4be', 25, '2026-01-20 12:22:25'),
(289, NULL, '9f008f1cd5e7ff40786c8f81a8dab4be', 25, '2026-01-20 12:22:25'),
(290, NULL, 'a81088760a958230fe934de2d0371a82', 26, '2026-01-20 12:22:26'),
(291, NULL, 'a81088760a958230fe934de2d0371a82', 26, '2026-01-20 12:22:26'),
(292, NULL, '29237d592befc846c4ee6d2d20e197ca', 32, '2026-01-20 12:22:28'),
(293, NULL, '29237d592befc846c4ee6d2d20e197ca', 32, '2026-01-20 12:22:28'),
(294, NULL, '7ce1981dab6a01478a97806dd1ee28ee', 4, '2026-01-20 12:22:29'),
(295, NULL, '7ce1981dab6a01478a97806dd1ee28ee', 4, '2026-01-20 12:22:29'),
(296, NULL, '096105ec80624f081c5ea155b1e69010', 20, '2026-01-20 12:22:30'),
(297, NULL, '096105ec80624f081c5ea155b1e69010', 20, '2026-01-20 12:22:30'),
(298, NULL, 'dffd4651adbcc7efee2ee75672dcbc04', 26, '2026-01-20 12:22:30'),
(299, NULL, 'dffd4651adbcc7efee2ee75672dcbc04', 26, '2026-01-20 12:22:30'),
(300, NULL, '9823d390f648f89935cb59c4d3c3fef6', 32, '2026-01-20 12:22:32'),
(301, NULL, '9823d390f648f89935cb59c4d3c3fef6', 32, '2026-01-20 12:22:32'),
(302, NULL, '8cc652cd3fa6c51d4a95dbf2a431d3cc', 20, '2026-01-20 12:22:33'),
(303, NULL, '8cc652cd3fa6c51d4a95dbf2a431d3cc', 20, '2026-01-20 12:22:33'),
(304, NULL, '058b58e5401c70a7d0aa31ee3d8d3b70', 4, '2026-01-20 12:22:33'),
(305, NULL, '058b58e5401c70a7d0aa31ee3d8d3b70', 4, '2026-01-20 12:22:33'),
(306, NULL, '53ae050aa0f5513fa010a87a7e5ef5e5', 2, '2026-01-20 12:22:34'),
(307, NULL, '53ae050aa0f5513fa010a87a7e5ef5e5', 2, '2026-01-20 12:22:34'),
(308, NULL, '6391be77c53f429cb0bac7cb15e70a9c', 21, '2026-01-20 12:22:35'),
(309, NULL, '6391be77c53f429cb0bac7cb15e70a9c', 21, '2026-01-20 12:22:35'),
(310, NULL, '534bbe73914b1da2b6dda753455e8bf8', 29, '2026-01-20 12:22:36'),
(311, NULL, '534bbe73914b1da2b6dda753455e8bf8', 29, '2026-01-20 12:22:36'),
(312, NULL, '90e3bffa2ea4313b22706e58b500d117', 25, '2026-01-20 12:22:37'),
(313, NULL, '90e3bffa2ea4313b22706e58b500d117', 25, '2026-01-20 12:22:37'),
(314, NULL, '1ad9c06777e2ce72b38113aae1bbb438', 34, '2026-01-20 12:22:37'),
(315, NULL, '1ad9c06777e2ce72b38113aae1bbb438', 34, '2026-01-20 12:22:37'),
(316, NULL, '65b8e07c3b28323a8561a1514952687c', 1, '2026-01-20 12:22:39'),
(317, NULL, '65b8e07c3b28323a8561a1514952687c', 1, '2026-01-20 12:22:39'),
(318, NULL, '4b3f8618ae18d6589fbf4ad8d4f31c4c', 28, '2026-01-20 12:22:39'),
(319, NULL, '4b3f8618ae18d6589fbf4ad8d4f31c4c', 28, '2026-01-20 12:22:39'),
(320, NULL, '862f60b22f7fdeff87c5688eec210b4f', 34, '2026-01-20 12:44:42'),
(321, NULL, '862f60b22f7fdeff87c5688eec210b4f', 34, '2026-01-20 12:44:42'),
(322, NULL, 'cfaf5448c170d6002a8118c7f36e2ae1', 29, '2026-01-20 12:57:46'),
(323, NULL, 'cfaf5448c170d6002a8118c7f36e2ae1', 29, '2026-01-20 12:57:46'),
(324, NULL, '1ff1494aaa553066b067b91b778b0b52', 2, '2026-01-20 15:04:23'),
(325, NULL, '1ff1494aaa553066b067b91b778b0b52', 2, '2026-01-20 15:04:23'),
(326, NULL, '6affb119ea89f65a60f0f36d2ec4ee0c', 20, '2026-01-20 15:18:38'),
(327, NULL, '6affb119ea89f65a60f0f36d2ec4ee0c', 20, '2026-01-20 15:18:38'),
(328, NULL, 'c6905f1d222439e39a74af5e09d77c84', 26, '2026-01-20 15:43:52'),
(329, NULL, 'c6905f1d222439e39a74af5e09d77c84', 26, '2026-01-20 15:43:52'),
(330, NULL, 'f45f125559a087bcc1bc4b261d67f115', 25, '2026-01-20 15:55:03'),
(331, NULL, 'f45f125559a087bcc1bc4b261d67f115', 25, '2026-01-20 15:55:03'),
(332, NULL, '5ff79578c5d65ba61ba0aec23868ae56', 21, '2026-01-20 16:09:14'),
(333, NULL, '5ff79578c5d65ba61ba0aec23868ae56', 21, '2026-01-20 16:09:14'),
(334, NULL, '07c0aab6f1f8ff5fd35edc64646a0be6', 20, '2026-01-20 16:48:41'),
(335, NULL, '07c0aab6f1f8ff5fd35edc64646a0be6', 20, '2026-01-20 16:48:41'),
(336, NULL, '9870673a3a862a8415be043eaae63b21', 28, '2026-01-20 20:07:29'),
(337, NULL, '9870673a3a862a8415be043eaae63b21', 28, '2026-01-20 20:07:29'),
(338, NULL, '72985a38c825433afdf38c14f33045fb', 34, '2026-01-20 21:34:50'),
(339, NULL, '72985a38c825433afdf38c14f33045fb', 34, '2026-01-20 21:34:50'),
(340, NULL, '79014111ea336c6368d54cee0fa1277f', 32, '2026-01-21 22:43:02'),
(341, NULL, '79014111ea336c6368d54cee0fa1277f', 32, '2026-01-21 22:43:02'),
(342, NULL, '0d79eb106e19270a4521425605070293', 1, '2026-01-21 23:17:26'),
(343, NULL, '0d79eb106e19270a4521425605070293', 1, '2026-01-21 23:17:26'),
(344, NULL, 'e885f66526733dc949291379679393a7', 1, '2026-01-22 01:15:35'),
(345, NULL, 'e885f66526733dc949291379679393a7', 1, '2026-01-22 01:15:35'),
(346, NULL, 'c5e0829b7dac0340194214ef225df716', 21, '2026-01-22 02:01:52'),
(347, NULL, 'c5e0829b7dac0340194214ef225df716', 21, '2026-01-22 02:01:52'),
(348, NULL, '33ea4f09ca835f289161610c1d32c1c1', 29, '2026-01-22 04:36:29'),
(349, NULL, '33ea4f09ca835f289161610c1d32c1c1', 29, '2026-01-22 04:36:29'),
(350, NULL, 'fea63de61adbf8e2463ddc5f7c01b253', 20, '2026-01-22 10:52:55'),
(351, NULL, 'fea63de61adbf8e2463ddc5f7c01b253', 20, '2026-01-22 10:52:55'),
(352, NULL, '4069d41a27c212763f59c91116da4877', 2, '2026-01-22 12:38:57'),
(353, NULL, '4069d41a27c212763f59c91116da4877', 2, '2026-01-22 12:38:57'),
(354, NULL, '5894f051ddf8bd984f6c9b3d6bab83f4', 26, '2026-01-22 13:56:15'),
(355, NULL, '5894f051ddf8bd984f6c9b3d6bab83f4', 26, '2026-01-22 13:56:15'),
(356, NULL, 'a4d3a94fb9712f8a1dad196554bd1cb4', 36, '2026-01-22 15:40:45'),
(357, NULL, 'a4d3a94fb9712f8a1dad196554bd1cb4', 36, '2026-01-22 15:40:45'),
(358, NULL, 'fc532c4f0e565eb0a0ef2e49de2f7cac', 25, '2026-01-22 19:54:43'),
(359, NULL, 'fc532c4f0e565eb0a0ef2e49de2f7cac', 25, '2026-01-22 19:54:43'),
(360, NULL, 'ffa05ec0ea9a18d10f79282f1450992e', 32, '2026-01-23 01:49:55'),
(361, NULL, 'ffa05ec0ea9a18d10f79282f1450992e', 32, '2026-01-23 01:49:55'),
(362, NULL, 'd76de5067d6e22b8b9788b54bc8659d5', 21, '2026-01-23 02:39:12'),
(363, NULL, 'd76de5067d6e22b8b9788b54bc8659d5', 21, '2026-01-23 02:39:12'),
(364, NULL, '9a58b713696dcc44166c9d0d1d922b52', 29, '2026-01-23 05:03:26'),
(365, NULL, '9a58b713696dcc44166c9d0d1d922b52', 29, '2026-01-23 05:03:26'),
(366, NULL, 'bcc2ef48d7ebd9d9bd1821fa76b4bfac', 28, '2026-01-23 05:40:19'),
(367, NULL, 'bcc2ef48d7ebd9d9bd1821fa76b4bfac', 28, '2026-01-23 05:40:19'),
(368, NULL, 'a19404eb661991fceb09f383487029d7', 4, '2026-01-23 07:19:46'),
(369, NULL, 'a19404eb661991fceb09f383487029d7', 4, '2026-01-23 07:19:46'),
(370, NULL, 'b3328eb6da47d9d4b6220d05d58de2dd', 2, '2026-01-23 08:18:22'),
(371, NULL, 'b3328eb6da47d9d4b6220d05d58de2dd', 2, '2026-01-23 08:18:22'),
(372, NULL, '429cef717abb7edaac736e5f7461c954', 25, '2026-01-23 10:09:21'),
(373, NULL, '429cef717abb7edaac736e5f7461c954', 25, '2026-01-23 10:09:21'),
(374, NULL, 'a91e880462062e5ae16538de3bc41099', 34, '2026-01-25 07:59:41'),
(375, NULL, 'a91e880462062e5ae16538de3bc41099', 34, '2026-01-25 07:59:41'),
(376, NULL, '1f429cd15a566c1238944f06dc444f7f', 20, '2026-01-25 11:20:35'),
(377, NULL, '1f429cd15a566c1238944f06dc444f7f', 20, '2026-01-25 11:20:35'),
(378, NULL, 'edaa8b54758cd4b50b646011ff951882', 26, '2026-01-25 12:24:32'),
(379, NULL, 'edaa8b54758cd4b50b646011ff951882', 26, '2026-01-25 12:24:32'),
(380, NULL, 'b6f2a9093a950f8bb8d0f0315c6dc52b', 28, '2026-01-25 23:01:12'),
(381, NULL, 'b6f2a9093a950f8bb8d0f0315c6dc52b', 28, '2026-01-25 23:01:12'),
(382, NULL, '63e19dcdaa78ccc039c8304e4432d28e', 34, '2026-01-26 00:37:37'),
(383, NULL, '63e19dcdaa78ccc039c8304e4432d28e', 34, '2026-01-26 00:37:37'),
(384, NULL, '839d3573cb7f4a12b01fa6c6bcbb6016', 1, '2026-01-26 06:17:39'),
(385, NULL, '839d3573cb7f4a12b01fa6c6bcbb6016', 1, '2026-01-26 06:17:39'),
(386, NULL, '2a2edacd2cd1eb622854acc5d14e4c53', 4, '2026-01-26 08:44:07'),
(387, NULL, '2a2edacd2cd1eb622854acc5d14e4c53', 4, '2026-01-26 08:44:07'),
(388, NULL, 'aad13667f0d59ea784a6b3f9e3bf3fb8', 32, '2026-01-27 04:20:11'),
(389, NULL, 'aad13667f0d59ea784a6b3f9e3bf3fb8', 32, '2026-01-27 04:20:11'),
(390, NULL, 'aba785e0b845ff18cc4b67e9c3e39e48', 21, '2026-01-27 06:36:41'),
(391, NULL, 'aba785e0b845ff18cc4b67e9c3e39e48', 21, '2026-01-27 06:36:41'),
(392, NULL, '86be8e2bd0b5a5b7c5a40f1cb651a7d4', 1, '2026-01-27 10:55:28'),
(393, NULL, '86be8e2bd0b5a5b7c5a40f1cb651a7d4', 1, '2026-01-27 10:55:28'),
(394, NULL, 'd5908a8b5e6d9c98e00065746835c1e6', 29, '2026-01-27 12:16:23'),
(395, NULL, 'd5908a8b5e6d9c98e00065746835c1e6', 29, '2026-01-27 12:16:23'),
(396, NULL, 'eff9e6fc0ef243b7cb8bff5cb4b6a5ab', 20, '2026-01-27 16:43:30'),
(397, NULL, 'eff9e6fc0ef243b7cb8bff5cb4b6a5ab', 20, '2026-01-27 16:43:30'),
(398, NULL, 'ecf75870ac7890cafe14120af50c0f72', 2, '2026-01-27 18:05:03'),
(399, NULL, 'ecf75870ac7890cafe14120af50c0f72', 2, '2026-01-27 18:05:03'),
(400, NULL, '73f646514eae18f9f9001431bd77fe41', 26, '2026-01-27 19:55:31'),
(401, NULL, '73f646514eae18f9f9001431bd77fe41', 26, '2026-01-27 19:55:31'),
(402, NULL, '07d6d1321c5897720d2a1f053653bfa7', 36, '2026-01-27 21:54:39'),
(403, NULL, '07d6d1321c5897720d2a1f053653bfa7', 36, '2026-01-27 21:54:39'),
(404, NULL, 'bf12535d80cf46d11f1033c80d7e5a6b', 25, '2026-01-28 00:25:23'),
(405, NULL, 'bf12535d80cf46d11f1033c80d7e5a6b', 25, '2026-01-28 00:25:23'),
(406, NULL, '3ca4f0d01f453f0824c5914010bd6cec', 32, '2026-01-28 01:24:13'),
(407, NULL, '3ca4f0d01f453f0824c5914010bd6cec', 32, '2026-01-28 01:24:13'),
(408, NULL, '8810add8cf74aa51905f4f12ffbdb579', 21, '2026-01-28 03:29:21'),
(409, NULL, '8810add8cf74aa51905f4f12ffbdb579', 21, '2026-01-28 03:29:21'),
(410, NULL, 'be690aebdb4e52da19012f4d067eabb4', 29, '2026-01-28 04:37:18'),
(411, NULL, 'be690aebdb4e52da19012f4d067eabb4', 29, '2026-01-28 04:37:18'),
(412, NULL, '550c1eed82b2b3d31b547b2e7eab4570', 28, '2026-01-28 05:21:30'),
(413, NULL, '550c1eed82b2b3d31b547b2e7eab4570', 28, '2026-01-28 05:21:30'),
(414, NULL, '43dc5c9e08b0bcc9debabbb329edf892', 4, '2026-01-28 07:36:27'),
(415, NULL, '43dc5c9e08b0bcc9debabbb329edf892', 4, '2026-01-28 07:36:27'),
(416, NULL, '80a289ce0d718baf8dde1027cf04df43', 2, '2026-01-28 08:16:54'),
(417, NULL, '80a289ce0d718baf8dde1027cf04df43', 2, '2026-01-28 08:16:54'),
(418, NULL, '22896d7ff9c7a932486972b24c7c486e', 25, '2026-01-28 09:41:23'),
(419, NULL, '22896d7ff9c7a932486972b24c7c486e', 25, '2026-01-28 09:41:23'),
(420, NULL, '50745c33507ed4f61aa9551ff01c5349', 1, '2026-01-29 03:58:19'),
(421, NULL, '50745c33507ed4f61aa9551ff01c5349', 1, '2026-01-29 03:58:19'),
(422, NULL, '0be8c1c117850169713acf60ae97942d', 34, '2026-01-30 11:00:56'),
(423, NULL, '0be8c1c117850169713acf60ae97942d', 34, '2026-01-30 11:00:56'),
(424, NULL, '09c615c6d800caf80c9c8702df03b83f', 2, '2026-01-30 14:36:04'),
(425, NULL, '09c615c6d800caf80c9c8702df03b83f', 2, '2026-01-30 14:36:04'),
(426, NULL, '09c615c6d800caf80c9c8702df03b83f', 4, '2026-01-30 14:36:09'),
(427, NULL, '09c615c6d800caf80c9c8702df03b83f', 4, '2026-01-30 14:36:09'),
(428, NULL, '09c615c6d800caf80c9c8702df03b83f', 32, '2026-01-30 14:36:12'),
(429, NULL, '09c615c6d800caf80c9c8702df03b83f', 32, '2026-01-30 14:36:12'),
(430, NULL, '09c615c6d800caf80c9c8702df03b83f', 21, '2026-01-30 14:36:57'),
(431, NULL, '09c615c6d800caf80c9c8702df03b83f', 21, '2026-01-30 14:36:57'),
(432, NULL, '09c615c6d800caf80c9c8702df03b83f', 29, '2026-01-30 14:36:58'),
(433, NULL, '09c615c6d800caf80c9c8702df03b83f', 29, '2026-01-30 14:36:58'),
(434, NULL, '09c615c6d800caf80c9c8702df03b83f', 1, '2026-01-30 14:36:59'),
(435, NULL, '09c615c6d800caf80c9c8702df03b83f', 1, '2026-01-30 14:36:59'),
(436, NULL, '09c615c6d800caf80c9c8702df03b83f', 28, '2026-01-30 14:37:00'),
(437, NULL, '09c615c6d800caf80c9c8702df03b83f', 28, '2026-01-30 14:37:00'),
(438, NULL, '09c615c6d800caf80c9c8702df03b83f', 34, '2026-01-30 14:37:02'),
(439, NULL, '09c615c6d800caf80c9c8702df03b83f', 34, '2026-01-30 14:37:02'),
(440, NULL, '09c615c6d800caf80c9c8702df03b83f', 25, '2026-01-30 14:37:04'),
(441, NULL, '09c615c6d800caf80c9c8702df03b83f', 25, '2026-01-30 14:37:04'),
(442, NULL, '09c615c6d800caf80c9c8702df03b83f', 26, '2026-01-30 14:37:06'),
(443, NULL, '09c615c6d800caf80c9c8702df03b83f', 26, '2026-01-30 14:37:06'),
(444, NULL, '09c615c6d800caf80c9c8702df03b83f', 20, '2026-01-30 14:37:07'),
(445, NULL, '09c615c6d800caf80c9c8702df03b83f', 20, '2026-01-30 14:37:07'),
(446, NULL, '95a30ca9da6d184968a25edebefb1ab0', 34, '2026-01-30 15:02:16'),
(447, NULL, '95a30ca9da6d184968a25edebefb1ab0', 34, '2026-01-30 15:02:16'),
(448, NULL, '13b361bf636c906311dcc8ff48dfb3a5', 20, '2026-01-30 15:03:24'),
(449, NULL, '13b361bf636c906311dcc8ff48dfb3a5', 20, '2026-01-30 15:03:24'),
(450, NULL, 'b175d194636db0b77d01993fe6075493', 26, '2026-01-30 16:50:25'),
(451, NULL, 'b175d194636db0b77d01993fe6075493', 26, '2026-01-30 16:50:25'),
(452, NULL, '8587ef1d7bb26d97c3104f9f7e56a5ff', 34, '2026-01-30 21:20:12'),
(453, NULL, '8587ef1d7bb26d97c3104f9f7e56a5ff', 34, '2026-01-30 21:20:12'),
(454, NULL, 'cf639e0480658c246f72d332b28670f5', 21, '2026-01-30 21:20:23'),
(455, NULL, 'cf639e0480658c246f72d332b28670f5', 21, '2026-01-30 21:20:23'),
(456, NULL, '3a3ab97530e90879882059c5181905d4', 20, '2026-01-30 21:20:59'),
(457, NULL, '3a3ab97530e90879882059c5181905d4', 20, '2026-01-30 21:20:59'),
(458, NULL, '2b6c37068a0fc757597db238aaf9bcd3', 26, '2026-01-30 21:21:30'),
(459, NULL, '78cde443757a0f3bf6fe518f5b0a733a', 25, '2026-01-30 21:21:30'),
(460, NULL, '2b6c37068a0fc757597db238aaf9bcd3', 26, '2026-01-30 21:21:30'),
(461, NULL, '78cde443757a0f3bf6fe518f5b0a733a', 25, '2026-01-30 21:21:30'),
(462, NULL, '94ce4b2cb375cf52b7e71106420175fa', 4, '2026-01-30 21:21:40'),
(463, NULL, '94ce4b2cb375cf52b7e71106420175fa', 4, '2026-01-30 21:21:40'),
(464, NULL, '73c6aca98aa7a0d678c4a000f58a3c4d', 32, '2026-01-30 21:21:40'),
(465, NULL, '73c6aca98aa7a0d678c4a000f58a3c4d', 32, '2026-01-30 21:21:40'),
(466, NULL, 'a0ba0a38e5974dd4c1ba0d9b3b786d99', 1, '2026-01-30 21:22:15'),
(467, NULL, 'a0ba0a38e5974dd4c1ba0d9b3b786d99', 1, '2026-01-30 21:22:15'),
(468, NULL, 'ce101130b73cbe65ea4b4e6bc48695a1', 29, '2026-01-30 21:22:15'),
(469, NULL, 'ce101130b73cbe65ea4b4e6bc48695a1', 29, '2026-01-30 21:22:15'),
(470, NULL, '2aeb8d4ad14971b8d04dabdf1556718d', 2, '2026-01-30 21:22:58'),
(471, NULL, '2aeb8d4ad14971b8d04dabdf1556718d', 2, '2026-01-30 21:22:58'),
(472, NULL, '7833429df8a42067480c5b2875073527', 28, '2026-01-30 21:22:58'),
(473, NULL, '7833429df8a42067480c5b2875073527', 28, '2026-01-30 21:22:58'),
(474, NULL, '765c216836230ddc946572ca9262cef9', 28, '2026-01-31 02:09:22'),
(475, NULL, '765c216836230ddc946572ca9262cef9', 28, '2026-01-31 02:09:22'),
(476, NULL, '623ccf0c4c0345b4f5dc2b3a7f993059', 34, '2026-01-31 03:42:55'),
(477, NULL, '623ccf0c4c0345b4f5dc2b3a7f993059', 34, '2026-01-31 03:42:55'),
(478, NULL, 'b23984b30da0a415007d031de6ed7740', 29, '2026-01-31 04:29:32'),
(479, NULL, 'b23984b30da0a415007d031de6ed7740', 29, '2026-01-31 04:29:32'),
(480, NULL, '1cf9dc5336461542d3766d96b77a02da', 2, '2026-01-31 04:42:18'),
(481, NULL, '1cf9dc5336461542d3766d96b77a02da', 2, '2026-01-31 04:42:18'),
(482, NULL, '4d60d43e44222d9eccbf63c2986f9087', 28, '2026-01-31 04:51:44'),
(483, NULL, '4d60d43e44222d9eccbf63c2986f9087', 28, '2026-01-31 04:51:44'),
(484, NULL, '597696cec11fe00c7549a46e06e27417', 20, '2026-01-31 05:10:41'),
(485, NULL, '597696cec11fe00c7549a46e06e27417', 20, '2026-01-31 05:10:41'),
(486, NULL, '4c59c16f77bdc4510c7f099e480bbb32', 21, '2026-01-31 05:21:34'),
(487, NULL, '4c59c16f77bdc4510c7f099e480bbb32', 21, '2026-01-31 05:21:34'),
(488, NULL, '87c0c9abc88c6fb87add0e5c4a0167f7', 20, '2026-01-31 09:15:11'),
(489, NULL, '87c0c9abc88c6fb87add0e5c4a0167f7', 20, '2026-01-31 09:15:11'),
(490, NULL, '6b9f4ea0c632c465e0651f38db4d1c19', 32, '2026-01-31 09:22:52'),
(491, NULL, '6b9f4ea0c632c465e0651f38db4d1c19', 32, '2026-01-31 09:22:52'),
(492, NULL, '0f9d770bd068d79856275481f6fbe686', 28, '2026-01-31 09:35:25'),
(493, NULL, '0f9d770bd068d79856275481f6fbe686', 28, '2026-01-31 09:35:25'),
(494, NULL, 'c5c74fa88a324ae40611c65f064d8891', 26, '2026-01-31 09:53:31'),
(495, NULL, 'c5c74fa88a324ae40611c65f064d8891', 26, '2026-01-31 09:53:31'),
(496, NULL, '005f63f63176e52adf1dcc26add4ef26', 26, '2026-01-31 13:18:41'),
(497, NULL, '005f63f63176e52adf1dcc26add4ef26', 26, '2026-01-31 13:18:41'),
(498, NULL, '660242e42c7e5595d6848571872f802f', 32, '2026-01-31 13:25:27'),
(499, NULL, '660242e42c7e5595d6848571872f802f', 32, '2026-01-31 13:25:27'),
(500, NULL, '7607dcc9851ed2dae08ecc4dac841be5', 25, '2026-01-31 13:35:01'),
(501, NULL, '7607dcc9851ed2dae08ecc4dac841be5', 25, '2026-01-31 13:35:01'),
(502, NULL, 'a43c30c55a67fc4503874a3464f7cb88', 4, '2026-01-31 13:44:45'),
(503, NULL, 'a43c30c55a67fc4503874a3464f7cb88', 4, '2026-01-31 13:44:45'),
(504, NULL, 'a30ce29d9a9c2fda8576f50be6ec4724', 1, '2026-01-31 13:56:00'),
(505, NULL, 'a30ce29d9a9c2fda8576f50be6ec4724', 1, '2026-01-31 13:56:00'),
(506, NULL, 'd6f376813f819d0322d8c78064a037dc', 21, '2026-01-31 16:52:28'),
(507, NULL, 'd6f376813f819d0322d8c78064a037dc', 21, '2026-01-31 16:52:28'),
(508, NULL, '144279f7a9fd2dc1618bda2fbff37bbf', 2, '2026-01-31 17:02:49'),
(509, NULL, '144279f7a9fd2dc1618bda2fbff37bbf', 2, '2026-01-31 17:02:49'),
(510, NULL, '2d262fcc9ad15d6c6256c5c19444902f', 25, '2026-01-31 17:13:13'),
(511, NULL, '2d262fcc9ad15d6c6256c5c19444902f', 25, '2026-01-31 17:13:13'),
(512, NULL, 'c836c86759593168d9816381cbf95168', 4, '2026-01-31 17:22:15'),
(513, NULL, 'c836c86759593168d9816381cbf95168', 4, '2026-01-31 17:22:15'),
(514, NULL, '1d1ab94fae457462ca86fabe7d9476dc', 29, '2026-01-31 17:33:55'),
(515, NULL, '1d1ab94fae457462ca86fabe7d9476dc', 29, '2026-01-31 17:33:55'),
(516, NULL, '597910a934c86891834b93e7d72adb4b', 1, '2026-02-01 03:08:11'),
(517, NULL, '597910a934c86891834b93e7d72adb4b', 1, '2026-02-01 03:08:11'),
(518, NULL, '0aa35f9c69625d67847f456cbcb03014', 34, '2026-02-01 03:20:06'),
(519, NULL, '0aa35f9c69625d67847f456cbcb03014', 34, '2026-02-01 03:20:06'),
(520, NULL, 'ca8e88b1e50191380a3d0144b209bb71', 4, '2026-02-01 04:26:10'),
(521, NULL, 'ca8e88b1e50191380a3d0144b209bb71', 4, '2026-02-01 04:26:10'),
(522, NULL, '94253600abca11d0436ade9a5a32e9e6', 25, '2026-02-01 06:42:45'),
(523, NULL, '94253600abca11d0436ade9a5a32e9e6', 25, '2026-02-01 06:42:45'),
(524, NULL, 'e704f2062e2c1cbb7fe30a23dda520ba', 32, '2026-02-01 10:10:01'),
(525, NULL, 'e704f2062e2c1cbb7fe30a23dda520ba', 32, '2026-02-01 10:10:01'),
(526, NULL, 'db03dc17e8542a3ef86b0a2a82e1b279', 21, '2026-02-01 12:38:46'),
(527, NULL, 'db03dc17e8542a3ef86b0a2a82e1b279', 21, '2026-02-01 12:38:46'),
(528, NULL, 'cd581b7aeb89d89673d531844808eef5', 29, '2026-02-01 18:30:31'),
(529, NULL, 'cd581b7aeb89d89673d531844808eef5', 29, '2026-02-01 18:30:31'),
(530, NULL, '6efa45131a4085dfc352bdc3f9b392ed', 1, '2026-02-01 20:01:42'),
(531, NULL, '6efa45131a4085dfc352bdc3f9b392ed', 1, '2026-02-01 20:01:42'),
(532, NULL, '8a15fc15d85c19990262a2f8984073f1', 20, '2026-02-01 23:17:41'),
(533, NULL, '8a15fc15d85c19990262a2f8984073f1', 20, '2026-02-01 23:17:41'),
(534, NULL, '993c2587031db704398adaac55cc81ef', 2, '2026-02-02 00:00:31'),
(535, NULL, '993c2587031db704398adaac55cc81ef', 2, '2026-02-02 00:00:31'),
(536, NULL, '2bd63d0605ac29fd111150932c5a071e', 32, '2026-02-02 01:32:34'),
(537, NULL, '2bd63d0605ac29fd111150932c5a071e', 32, '2026-02-02 01:32:34'),
(538, NULL, '2e577280249080ecb8c9671b34d274d3', 26, '2026-02-02 02:16:10'),
(539, NULL, '2e577280249080ecb8c9671b34d274d3', 26, '2026-02-02 02:16:10'),
(540, NULL, '9ed0fab4f160fd5b78dee34e040d0420', 29, '2026-02-02 05:05:52'),
(541, NULL, '9ed0fab4f160fd5b78dee34e040d0420', 29, '2026-02-02 05:05:52'),
(542, NULL, 'd5528848ad4f08c75cdc27b21ab410c9', 36, '2026-02-02 05:58:18'),
(543, NULL, 'd5528848ad4f08c75cdc27b21ab410c9', 36, '2026-02-02 05:58:18'),
(544, NULL, 'd4fbd84a50f7e23141d73ab3130955c8', 28, '2026-02-02 06:54:12'),
(545, NULL, 'd4fbd84a50f7e23141d73ab3130955c8', 28, '2026-02-02 06:54:12'),
(546, NULL, '797c9d21beb37f0cd0de49f81437e04f', 2, '2026-02-02 07:28:35'),
(547, NULL, '797c9d21beb37f0cd0de49f81437e04f', 2, '2026-02-02 07:28:35'),
(548, NULL, '55186fce22d87518403e64b504d791f9', 25, '2026-02-02 07:55:14'),
(549, NULL, '55186fce22d87518403e64b504d791f9', 25, '2026-02-02 07:55:14'),
(550, NULL, 'fc3b0e7c8024916595610333ac4d97f1', 4, '2026-02-02 09:06:15'),
(551, NULL, 'fc3b0e7c8024916595610333ac4d97f1', 4, '2026-02-02 09:06:15'),
(552, NULL, 'aa2451295c99dfaa6483c2f181a411c4', 2, '2026-02-02 10:40:39'),
(553, NULL, 'aa2451295c99dfaa6483c2f181a411c4', 2, '2026-02-02 10:40:39'),
(554, NULL, '7afc3d16d8ccf937e36683054b2b35be', 25, '2026-02-02 12:56:47'),
(555, NULL, '7afc3d16d8ccf937e36683054b2b35be', 25, '2026-02-02 12:56:47'),
(556, NULL, '1ee25866cf0ef13863bb357a60b6d3f1', 20, '2026-02-03 00:43:34'),
(557, NULL, '1ee25866cf0ef13863bb357a60b6d3f1', 20, '2026-02-03 00:43:35'),
(558, NULL, 'ec0c095bc94d8481418d6e545ceaccb0', 28, '2026-02-04 02:28:22'),
(559, NULL, 'ec0c095bc94d8481418d6e545ceaccb0', 28, '2026-02-04 02:28:22'),
(560, NULL, 'ebf005a6d231209290a15cfd1237f14c', 34, '2026-02-04 07:53:44'),
(561, NULL, 'ebf005a6d231209290a15cfd1237f14c', 34, '2026-02-04 07:53:44'),
(562, NULL, 'e8ce2e2da20f648d8262897bf544e96e', 20, '2026-02-04 12:00:39'),
(563, NULL, 'e8ce2e2da20f648d8262897bf544e96e', 20, '2026-02-04 12:00:39'),
(564, NULL, '47f198ebfa495a6a00b54fef02ee5530', 26, '2026-02-04 13:02:19'),
(565, NULL, '47f198ebfa495a6a00b54fef02ee5530', 26, '2026-02-04 13:02:19'),
(566, NULL, 'b3c3f4da6977cd1071c62aed1144fbbf', 25, '2026-02-05 03:19:16'),
(567, NULL, 'b3c3f4da6977cd1071c62aed1144fbbf', 25, '2026-02-05 03:19:16'),
(568, NULL, 'cf1642c9b8d869da564460eecc4c8176', 28, '2026-02-05 06:30:08'),
(569, NULL, 'cf1642c9b8d869da564460eecc4c8176', 28, '2026-02-05 06:30:08'),
(570, NULL, '8ead1c8b58b9a1f3da45d267dbf9cdec', 34, '2026-02-05 07:12:25'),
(571, NULL, '8ead1c8b58b9a1f3da45d267dbf9cdec', 34, '2026-02-05 07:12:25'),
(572, NULL, 'bd50ca85582cc88fce40a3601e00850f', 26, '2026-02-05 16:17:02'),
(573, NULL, 'bd50ca85582cc88fce40a3601e00850f', 26, '2026-02-05 16:17:02'),
(574, NULL, '738b5dc9eb93fdf2d0f7dfe64845cc92', 34, '2026-02-05 16:32:15'),
(575, NULL, '738b5dc9eb93fdf2d0f7dfe64845cc92', 34, '2026-02-05 16:32:15'),
(576, NULL, '09fda4bd29f63d1235bd20293bee2ac2', 32, '2026-02-05 17:17:11'),
(577, NULL, '09fda4bd29f63d1235bd20293bee2ac2', 32, '2026-02-05 17:17:11'),
(578, NULL, '8afeb46aee455b7215cbf415e23cc805', 2, '2026-02-05 17:21:31'),
(579, NULL, '8afeb46aee455b7215cbf415e23cc805', 2, '2026-02-05 17:21:31'),
(580, NULL, '101bf60d45bd909dea081b789de65712', 20, '2026-02-05 19:20:58'),
(581, NULL, '101bf60d45bd909dea081b789de65712', 20, '2026-02-05 19:20:58'),
(582, NULL, '0f10b83c9aee05981ec6157187b555d0', 21, '2026-02-05 20:21:23'),
(583, NULL, '0f10b83c9aee05981ec6157187b555d0', 21, '2026-02-05 20:21:23'),
(584, NULL, '10ab0c422bbd8631b4ee95420d1e0722', 29, '2026-02-05 22:10:18'),
(585, NULL, '10ab0c422bbd8631b4ee95420d1e0722', 29, '2026-02-05 22:10:18'),
(586, NULL, 'a6228930f0e0dfc3825823fb0e33bc40', 34, '2026-02-05 23:24:40'),
(587, NULL, 'a6228930f0e0dfc3825823fb0e33bc40', 34, '2026-02-05 23:24:40'),
(588, NULL, 'fffa82cc89fc11135f1803997b3c26a2', 25, '2026-02-05 23:30:40'),
(589, NULL, 'fffa82cc89fc11135f1803997b3c26a2', 25, '2026-02-05 23:30:40'),
(590, NULL, 'dbde3ef3106bc76a8761a6175e7a84dd', 29, '2026-02-06 03:40:14'),
(591, NULL, 'dbde3ef3106bc76a8761a6175e7a84dd', 29, '2026-02-06 03:40:14'),
(592, NULL, 'dbfc8b1210d68985238a3d40f2907f4b', 29, '2026-02-06 03:45:38'),
(593, NULL, 'dbfc8b1210d68985238a3d40f2907f4b', 29, '2026-02-06 03:45:38'),
(594, NULL, 'c42163008f9266c71b40c398f2bc9077', 1, '2026-02-07 09:49:33'),
(595, NULL, 'c42163008f9266c71b40c398f2bc9077', 1, '2026-02-07 09:49:33'),
(596, NULL, 'd8ccd0dbbc3c94a4dbf47954b5a51601', 4, '2026-02-07 15:22:49'),
(597, NULL, 'd8ccd0dbbc3c94a4dbf47954b5a51601', 4, '2026-02-07 15:22:49'),
(598, NULL, '6da6f43d8898f8e1183202f119013559', 4, '2026-02-09 19:33:46'),
(599, NULL, '6da6f43d8898f8e1183202f119013559', 4, '2026-02-09 19:33:46'),
(600, NULL, '4cd2c552c64b62854cfebfca29e9671f', 32, '2026-02-09 20:44:16'),
(601, NULL, '4cd2c552c64b62854cfebfca29e9671f', 32, '2026-02-09 20:44:16'),
(602, NULL, '0a63a97e58dbd885fb5703f061f1278b', 21, '2026-02-09 20:55:18'),
(603, NULL, '0a63a97e58dbd885fb5703f061f1278b', 21, '2026-02-09 20:55:18'),
(604, NULL, '00f06751718cb99f707015c7dd4623e6', 32, '2026-02-09 21:24:59'),
(605, NULL, '00f06751718cb99f707015c7dd4623e6', 32, '2026-02-09 21:24:59'),
(606, NULL, '433bd98827c9b6c5fdc978ab3d9a6ac8', 29, '2026-02-09 21:52:10'),
(607, NULL, '433bd98827c9b6c5fdc978ab3d9a6ac8', 29, '2026-02-09 21:52:10'),
(608, NULL, '5adbaf15089a4d8c10faca9aad6dd7e2', 29, '2026-02-09 22:14:11'),
(609, NULL, '5adbaf15089a4d8c10faca9aad6dd7e2', 29, '2026-02-09 22:14:11'),
(610, NULL, 'bd798dee858965dffa892bef77d757fd', 28, '2026-02-09 22:54:45'),
(611, NULL, 'bd798dee858965dffa892bef77d757fd', 28, '2026-02-09 22:54:45'),
(612, NULL, 'e99457e99894dd438ac0262f1ff0f186', 20, '2026-02-09 23:05:24'),
(613, NULL, 'e99457e99894dd438ac0262f1ff0f186', 20, '2026-02-09 23:05:24'),
(614, NULL, 'e398306c4d4ff4d561de1722d68c4589', 1, '2026-02-09 23:10:56'),
(615, NULL, 'e398306c4d4ff4d561de1722d68c4589', 1, '2026-02-09 23:10:56'),
(616, NULL, '2232424dfd330ed10fb5d199c36e51a9', 2, '2026-02-09 23:16:03'),
(617, NULL, '2232424dfd330ed10fb5d199c36e51a9', 2, '2026-02-09 23:16:03'),
(618, NULL, 'a2812863e5d484a0cbf0035c10989ebd', 4, '2026-02-09 23:21:35'),
(619, NULL, 'a2812863e5d484a0cbf0035c10989ebd', 4, '2026-02-09 23:21:35'),
(620, NULL, '7784f3cf8724cdda040fb238ec1d9025', 26, '2026-02-09 23:27:03'),
(621, NULL, '7784f3cf8724cdda040fb238ec1d9025', 26, '2026-02-09 23:27:03'),
(622, NULL, 'f1a4d1fcdb369173c2bcc749c2dd7012', 2, '2026-02-09 23:39:06'),
(623, NULL, 'f1a4d1fcdb369173c2bcc749c2dd7012', 2, '2026-02-09 23:39:06'),
(624, NULL, 'de890670be7a8623ec642fea441c3f00', 25, '2026-02-10 00:10:59'),
(625, NULL, 'de890670be7a8623ec642fea441c3f00', 25, '2026-02-10 00:10:59'),
(626, NULL, '183f7534b18fa69f669a2f3315c56f12', 25, '2026-02-10 00:21:52'),
(627, NULL, '183f7534b18fa69f669a2f3315c56f12', 25, '2026-02-10 00:21:52'),
(628, NULL, '12314a6a314c5564ffd9ea855b0f6538', 36, '2026-02-10 00:32:14'),
(629, NULL, '12314a6a314c5564ffd9ea855b0f6538', 36, '2026-02-10 00:32:14'),
(630, NULL, 'b2bb9f7c95cbd45c0b7de57e2f1c1101', 34, '2026-02-10 02:44:42'),
(631, NULL, 'b2bb9f7c95cbd45c0b7de57e2f1c1101', 34, '2026-02-10 02:44:42'),
(632, NULL, '0338a7513ee567746648482e1a2eb9ab', 20, '2026-02-10 02:54:45'),
(633, NULL, '0338a7513ee567746648482e1a2eb9ab', 20, '2026-02-10 02:54:45'),
(634, NULL, 'c52675ac4ee4d3fb51ed7aa9aa22f79a', 26, '2026-02-10 02:59:56'),
(635, NULL, 'c52675ac4ee4d3fb51ed7aa9aa22f79a', 26, '2026-02-10 02:59:56'),
(636, NULL, '65a29c26136f8563212e7da61c002901', 28, '2026-02-10 10:41:03'),
(637, NULL, '65a29c26136f8563212e7da61c002901', 28, '2026-02-10 10:41:03'),
(638, NULL, '16a931900b9ff2a5005e9a2ab85df413', 34, '2026-02-10 11:14:28'),
(639, NULL, '16a931900b9ff2a5005e9a2ab85df413', 34, '2026-02-10 11:14:28'),
(640, NULL, '4ec5d9e9af1df01fc7f9bb3a18f6a50b', 32, '2026-02-14 21:40:03'),
(641, NULL, '4ec5d9e9af1df01fc7f9bb3a18f6a50b', 32, '2026-02-14 21:40:03'),
(642, NULL, 'a22a290fd7d32ce5c83601e32e475171', 29, '2026-02-14 21:54:02'),
(643, NULL, 'a22a290fd7d32ce5c83601e32e475171', 29, '2026-02-14 21:54:02'),
(644, NULL, '6398b8c56c90475548fd0b955d83042e', 4, '2026-02-14 22:08:01'),
(645, NULL, '6398b8c56c90475548fd0b955d83042e', 4, '2026-02-14 22:08:01'),
(646, NULL, '83f441cab026e35e5bde565e2085a813', 28, '2026-02-14 22:21:19'),
(647, NULL, '83f441cab026e35e5bde565e2085a813', 28, '2026-02-14 22:21:19'),
(648, NULL, 'c25b60a270cfad68e6c83e387026c988', 4, '2026-02-14 22:36:26'),
(649, NULL, 'c25b60a270cfad68e6c83e387026c988', 4, '2026-02-14 22:36:26'),
(650, NULL, 'b0b1e96f1913d5001a565f322910d06c', 34, '2026-02-14 22:52:33'),
(651, NULL, 'b0b1e96f1913d5001a565f322910d06c', 34, '2026-02-14 22:52:33'),
(652, NULL, 'ab60a10572f9a89fe54b24a4d65ff41e', 20, '2026-02-14 23:26:13'),
(653, NULL, 'ab60a10572f9a89fe54b24a4d65ff41e', 20, '2026-02-14 23:26:13'),
(654, NULL, '7f84cdc76694ba66549038b267d277e4', 2, '2026-02-14 23:48:15'),
(655, NULL, '7f84cdc76694ba66549038b267d277e4', 2, '2026-02-14 23:48:15'),
(656, NULL, 'f15681339418f5d1089d7aa0e6f23944', 26, '2026-02-15 00:08:23'),
(657, NULL, 'f15681339418f5d1089d7aa0e6f23944', 26, '2026-02-15 00:08:23'),
(658, NULL, 'fa2c18d23786e223ba8f2bef576cf77f', 25, '2026-02-15 00:50:13'),
(659, NULL, 'fa2c18d23786e223ba8f2bef576cf77f', 25, '2026-02-15 00:50:13'),
(660, NULL, 'd31a62983d91c8f86b3fee84c0b14419', 32, '2026-02-15 01:59:43'),
(661, NULL, 'd31a62983d91c8f86b3fee84c0b14419', 32, '2026-02-15 01:59:43'),
(662, NULL, '9998571b104f6612460a004a52cb7863', 21, '2026-02-15 02:50:22'),
(663, NULL, '9998571b104f6612460a004a52cb7863', 21, '2026-02-15 02:50:22'),
(664, NULL, '5364c2f722ef8997d0f364447e00ec57', 29, '2026-02-15 03:22:15'),
(665, NULL, '5364c2f722ef8997d0f364447e00ec57', 29, '2026-02-15 03:22:15'),
(666, NULL, '7b8fba2ab0573ec22a2da278d4bc89df', 20, '2026-02-15 04:00:34'),
(667, NULL, '7b8fba2ab0573ec22a2da278d4bc89df', 20, '2026-02-15 04:00:34'),
(668, NULL, 'b66321118a47946294fe49adaf51f6a4', 2, '2026-02-15 04:19:32'),
(669, NULL, 'b66321118a47946294fe49adaf51f6a4', 2, '2026-02-15 04:19:32'),
(670, NULL, 'ed65f37b90f3bb43b196909174eeaf2e', 26, '2026-02-15 04:38:49'),
(671, NULL, 'ed65f37b90f3bb43b196909174eeaf2e', 26, '2026-02-15 04:38:49'),
(672, NULL, 'b151964957e16719311b4c14df218ba1', 25, '2026-02-15 05:47:53'),
(673, NULL, 'b151964957e16719311b4c14df218ba1', 25, '2026-02-15 05:47:53'),
(674, NULL, '3218386cf03081f1ffc0b6bfb2d74d9c', 1, '2026-02-15 06:05:12'),
(675, NULL, '3218386cf03081f1ffc0b6bfb2d74d9c', 1, '2026-02-15 06:05:12'),
(676, NULL, 'cfdf4d79b0a18f4a20adad6f53489898', 36, '2026-02-15 09:06:47'),
(677, NULL, 'cfdf4d79b0a18f4a20adad6f53489898', 36, '2026-02-15 09:06:47'),
(678, NULL, 'e0c7904f0e4e3bbe15141ee8d2cf8db9', 28, '2026-02-15 14:12:49');
INSERT INTO `user_view_history` (`id`, `user_id`, `session_id`, `route_id`, `viewed_at`) VALUES
(679, NULL, 'e0c7904f0e4e3bbe15141ee8d2cf8db9', 28, '2026-02-15 14:12:49'),
(680, NULL, '242c4d0c0848a74f533cf7aed1ea6958', 34, '2026-02-15 15:58:48'),
(681, NULL, '242c4d0c0848a74f533cf7aed1ea6958', 34, '2026-02-15 15:58:48'),
(682, NULL, '84f6897edd0932a4e2145a54edb14e1b', 26, '2026-02-16 00:57:08'),
(683, NULL, '84f6897edd0932a4e2145a54edb14e1b', 26, '2026-02-16 00:57:08'),
(684, NULL, '997c56bd831dacaefc9e9213e6bf4a04', 1, '2026-02-16 08:17:27'),
(685, NULL, '997c56bd831dacaefc9e9213e6bf4a04', 1, '2026-02-16 08:17:27'),
(686, NULL, 'b0b3be85c4750b7d87766078b8af971d', 34, '2026-02-19 20:34:33'),
(687, NULL, 'b0b3be85c4750b7d87766078b8af971d', 34, '2026-02-19 20:34:34'),
(688, NULL, '3d27d9bfdade362892f2db60ca25c78c', 20, '2026-02-19 21:28:06'),
(689, NULL, '3d27d9bfdade362892f2db60ca25c78c', 20, '2026-02-19 21:28:06'),
(690, NULL, 'cf0fb733a345a1d7d4fd87994251088a', 26, '2026-02-19 21:54:53'),
(691, NULL, 'cf0fb733a345a1d7d4fd87994251088a', 26, '2026-02-19 21:54:53'),
(692, NULL, 'b071f23a3cc03f96fa1c38a5ebb125a0', 32, '2026-02-19 22:19:02'),
(693, NULL, 'b071f23a3cc03f96fa1c38a5ebb125a0', 32, '2026-02-19 22:19:02'),
(694, NULL, 'c28abb071c3390020a9d0cf55332fa0a', 29, '2026-02-19 22:42:08'),
(695, NULL, 'c28abb071c3390020a9d0cf55332fa0a', 29, '2026-02-19 22:42:08'),
(696, NULL, '07f708b76e7e2fc30782d1cfd49cc4b3', 28, '2026-02-19 23:05:34'),
(697, NULL, '07f708b76e7e2fc30782d1cfd49cc4b3', 28, '2026-02-19 23:05:34'),
(698, NULL, 'e46a6578a7c733d2ce30c3444cb3d0e8', 4, '2026-02-19 23:33:49'),
(699, NULL, 'e46a6578a7c733d2ce30c3444cb3d0e8', 4, '2026-02-19 23:33:49'),
(700, NULL, '3da445c9ced5a1059e02df2728c76ae2', 2, '2026-02-20 00:55:34'),
(701, NULL, '3da445c9ced5a1059e02df2728c76ae2', 2, '2026-02-20 00:55:34'),
(702, NULL, 'f53c7fdfb0f714afcc6a5e5a574a5a6c', 25, '2026-02-20 01:41:59'),
(703, NULL, 'f53c7fdfb0f714afcc6a5e5a574a5a6c', 25, '2026-02-20 01:41:59'),
(704, NULL, 'd5633821da3f1f03ced07d504fab9d44', 4, '2026-02-20 02:34:05'),
(705, NULL, 'd5633821da3f1f03ced07d504fab9d44', 4, '2026-02-20 02:34:05'),
(706, NULL, 'cc756a9d33a2afe87b0d646be3eb870d', 32, '2026-02-20 07:12:16'),
(707, NULL, 'cc756a9d33a2afe87b0d646be3eb870d', 32, '2026-02-20 07:12:16'),
(708, NULL, 'c39456b12438029438bbbeb3109a6486', 21, '2026-02-20 07:50:42'),
(709, NULL, 'c39456b12438029438bbbeb3109a6486', 21, '2026-02-20 07:50:42'),
(710, NULL, '865768bcbb1ebf7ce0c6d44ab08cb097', 29, '2026-02-20 08:51:33'),
(711, NULL, '865768bcbb1ebf7ce0c6d44ab08cb097', 29, '2026-02-20 08:51:33'),
(712, NULL, 'ce282095c92197e38fa21889bbbad879', 20, '2026-02-20 10:22:02'),
(713, NULL, 'ce282095c92197e38fa21889bbbad879', 20, '2026-02-20 10:22:02'),
(714, NULL, 'a54820a4ac8d270c4b03c50d66ff00ce', 2, '2026-02-20 10:59:43'),
(715, NULL, 'a54820a4ac8d270c4b03c50d66ff00ce', 2, '2026-02-20 10:59:43'),
(716, NULL, 'b1358ce904aa48a55d13b58d76fff26b', 26, '2026-02-20 11:18:57'),
(717, NULL, 'b1358ce904aa48a55d13b58d76fff26b', 26, '2026-02-20 11:18:57'),
(718, NULL, 'f1ebab62d8f0d819d79c08650880f92b', 25, '2026-02-20 12:28:48'),
(719, NULL, 'f1ebab62d8f0d819d79c08650880f92b', 25, '2026-02-20 12:28:48'),
(720, NULL, '7d2e4a2c1f45c0c34cbbf935a6af622d', 1, '2026-02-20 13:12:55'),
(721, NULL, '7d2e4a2c1f45c0c34cbbf935a6af622d', 1, '2026-02-20 13:12:55'),
(722, NULL, '9a7853b652f12a7f20f3a1899e6b36c0', 36, '2026-02-20 17:47:02'),
(723, NULL, '9a7853b652f12a7f20f3a1899e6b36c0', 36, '2026-02-20 17:47:02'),
(724, NULL, '2a6b7172e096b8899a8dd26c4d4b26b6', 28, '2026-02-20 18:59:15'),
(725, NULL, '2a6b7172e096b8899a8dd26c4d4b26b6', 28, '2026-02-20 18:59:15'),
(726, NULL, '66fcb5b788560bff9729d8e4f0781b0d', 34, '2026-02-20 22:50:52'),
(727, NULL, '66fcb5b788560bff9729d8e4f0781b0d', 34, '2026-02-20 22:50:52'),
(728, NULL, '85f25df51e2a7e7bc93a5a3a2d8db846', 34, '2026-02-20 23:13:27'),
(729, NULL, '85f25df51e2a7e7bc93a5a3a2d8db846', 34, '2026-02-20 23:13:27'),
(730, NULL, 'b40290dcd16a97345f1a174b5d7ef50f', 1, '2026-02-21 10:59:23'),
(731, NULL, 'b40290dcd16a97345f1a174b5d7ef50f', 1, '2026-02-21 10:59:23'),
(732, NULL, '7877a0c98be8e8d1527d56a566a092ed', 2, '2026-02-21 16:26:15'),
(733, NULL, '7877a0c98be8e8d1527d56a566a092ed', 2, '2026-02-21 16:26:15'),
(734, NULL, '855bf3e7b41c4abfc7748fc8e7217966', 21, '2026-02-21 22:55:44'),
(735, NULL, '855bf3e7b41c4abfc7748fc8e7217966', 21, '2026-02-21 22:55:45'),
(736, NULL, 'c4d7346debfe1bc28498d0b2b6f79faa', 1, '2026-02-23 12:53:14'),
(737, NULL, 'c4d7346debfe1bc28498d0b2b6f79faa', 1, '2026-02-23 12:53:14'),
(738, NULL, '6900c7e520ff5aba3e9772b9afb75deb', 25, '2026-02-23 20:02:08'),
(739, NULL, '6900c7e520ff5aba3e9772b9afb75deb', 25, '2026-02-23 20:02:08'),
(740, NULL, 'caa9f3e039369ca2e601ae755c4f7d49', 4, '2026-02-23 21:28:41'),
(741, NULL, 'caa9f3e039369ca2e601ae755c4f7d49', 4, '2026-02-23 21:28:41'),
(742, NULL, 'ea179f5e1170eba01a31e8fafe503a74', 28, '2026-02-24 05:02:23'),
(743, NULL, 'ea179f5e1170eba01a31e8fafe503a74', 28, '2026-02-24 05:02:23'),
(744, NULL, 'a1bf79d078287bcfa936c54cce97a079', 34, '2026-02-24 17:42:43'),
(745, NULL, 'a1bf79d078287bcfa936c54cce97a079', 34, '2026-02-24 17:42:43'),
(746, NULL, '80d7c1865d8bc18f78e7864567ca4fde', 20, '2026-02-24 18:17:27'),
(747, NULL, '80d7c1865d8bc18f78e7864567ca4fde', 20, '2026-02-24 18:17:27'),
(748, NULL, 'd15be25ed821e5be33d5468dc4e14f88', 26, '2026-02-24 18:33:56'),
(749, NULL, 'd15be25ed821e5be33d5468dc4e14f88', 26, '2026-02-24 18:33:56'),
(750, NULL, '82ea3ca055c7383192406f26492d52bd', 32, '2026-02-24 21:38:24'),
(751, NULL, '82ea3ca055c7383192406f26492d52bd', 32, '2026-02-24 21:38:24'),
(752, NULL, '0470277fd58f51bf446ff53a1f39459c', 29, '2026-02-24 22:27:26'),
(753, NULL, '0470277fd58f51bf446ff53a1f39459c', 29, '2026-02-24 22:27:26'),
(754, NULL, '9fde6b1432117444cc0fdbc6ba9e1cef', 28, '2026-02-24 23:07:23'),
(755, NULL, '9fde6b1432117444cc0fdbc6ba9e1cef', 28, '2026-02-24 23:07:23'),
(756, NULL, 'e377f83ab8763f4b925d53eb7b5f4683', 4, '2026-02-24 23:54:17'),
(757, NULL, 'e377f83ab8763f4b925d53eb7b5f4683', 4, '2026-02-24 23:54:17'),
(758, NULL, '0dfd5405ff8785e463faf20aa5ec64a3', 2, '2026-02-25 00:40:57'),
(759, NULL, '0dfd5405ff8785e463faf20aa5ec64a3', 2, '2026-02-25 00:40:57'),
(760, NULL, 'ddbd0753c6aa7254362937370685157b', 25, '2026-02-25 01:09:56'),
(761, NULL, 'ddbd0753c6aa7254362937370685157b', 25, '2026-02-25 01:09:56'),
(762, NULL, 'e02cddca0c740bf51cdb52d4c12fed79', 4, '2026-02-25 05:34:19'),
(763, NULL, 'e02cddca0c740bf51cdb52d4c12fed79', 4, '2026-02-25 05:34:19'),
(764, NULL, '128eb6bf297a8e6e1d8ed4078b3834d7', 32, '2026-02-25 13:09:24'),
(765, NULL, '128eb6bf297a8e6e1d8ed4078b3834d7', 32, '2026-02-25 13:09:24'),
(766, NULL, 'bec5b0afb335ef4d7ce85f23b7468429', 21, '2026-02-25 13:51:50'),
(767, NULL, 'bec5b0afb335ef4d7ce85f23b7468429', 21, '2026-02-25 13:51:50'),
(768, NULL, 'dc53c910d6dd072d22dee267cbbb205a', 34, '2026-02-25 13:59:46'),
(769, NULL, 'dc53c910d6dd072d22dee267cbbb205a', 34, '2026-02-25 13:59:46'),
(770, NULL, '7a7e0201546c2ba92ccbef4bac50b19e', 29, '2026-02-25 15:08:34'),
(771, NULL, '7a7e0201546c2ba92ccbef4bac50b19e', 29, '2026-02-25 15:08:34'),
(772, NULL, '0971d6db71d77098c046676e7787f7f0', 20, '2026-02-25 15:49:06'),
(773, NULL, '0971d6db71d77098c046676e7787f7f0', 20, '2026-02-25 15:49:06'),
(774, NULL, 'aa9ff9d4b6e9789390eb51958d5f4cf2', 2, '2026-02-25 16:34:06'),
(775, NULL, 'aa9ff9d4b6e9789390eb51958d5f4cf2', 2, '2026-02-25 16:34:06'),
(776, NULL, 'eaa3bf36fb7e98ff0e14e8c967d313b5', 34, '2026-02-25 17:08:39'),
(777, NULL, 'eaa3bf36fb7e98ff0e14e8c967d313b5', 34, '2026-02-25 17:08:39'),
(778, NULL, '1da437d5cd32b2c4f4d45d08e5f50bfb', 26, '2026-02-25 17:20:19'),
(779, NULL, '1da437d5cd32b2c4f4d45d08e5f50bfb', 26, '2026-02-25 17:20:19'),
(780, NULL, 'de3c568fa5d019e24216dbda15402741', 32, '2026-02-25 17:33:26'),
(781, NULL, 'de3c568fa5d019e24216dbda15402741', 32, '2026-02-25 17:33:26'),
(782, NULL, '4b73438a942725a46888539c6271964e', 25, '2026-02-25 18:59:05'),
(783, NULL, '4b73438a942725a46888539c6271964e', 25, '2026-02-25 18:59:06'),
(784, NULL, 'abf7afc2e6456694955989b3086fd292', 1, '2026-02-25 20:54:45'),
(785, NULL, 'abf7afc2e6456694955989b3086fd292', 1, '2026-02-25 20:54:45'),
(786, NULL, '9e36b1d59e091d6eb5e2082657fa4ce5', 21, '2026-02-25 21:44:27'),
(787, NULL, '9e36b1d59e091d6eb5e2082657fa4ce5', 21, '2026-02-25 21:44:27'),
(788, NULL, '722ddcf8a4e0ba4f665a37f9133cacaa', 28, '2026-02-25 21:52:57'),
(789, NULL, '722ddcf8a4e0ba4f665a37f9133cacaa', 28, '2026-02-25 21:52:57'),
(790, NULL, '775bd6f57db6a8d91afebe863b318aa1', 26, '2026-02-25 22:52:15'),
(791, NULL, '775bd6f57db6a8d91afebe863b318aa1', 26, '2026-02-25 22:52:15'),
(792, NULL, 'fce4208f7e0829e43553eb3e3a81ddde', 28, '2026-02-25 23:42:23'),
(793, NULL, 'fce4208f7e0829e43553eb3e3a81ddde', 28, '2026-02-25 23:42:23'),
(794, NULL, 'f428ba21bf0ff6a4e2e524ed27072951', 25, '2026-02-26 01:01:10'),
(795, NULL, 'f428ba21bf0ff6a4e2e524ed27072951', 25, '2026-02-26 01:01:10'),
(796, NULL, 'c42d3f7725bce51ef7c4097c8608d1d0', 2, '2026-02-26 02:18:06'),
(797, NULL, 'c42d3f7725bce51ef7c4097c8608d1d0', 2, '2026-02-26 02:18:06'),
(798, NULL, '88607002b998ac48d4c9776eabcd4ad6', 34, '2026-02-26 02:19:16'),
(799, NULL, '88607002b998ac48d4c9776eabcd4ad6', 34, '2026-02-26 02:19:16'),
(800, NULL, '2eacb4fab4d2976f0bf3441aac1b8304', 36, '2026-02-26 03:16:34'),
(801, NULL, '2eacb4fab4d2976f0bf3441aac1b8304', 36, '2026-02-26 03:16:34'),
(802, NULL, 'dc7b3af1ad1552613e6a087d25f4c158', 20, '2026-02-26 03:41:15'),
(803, NULL, 'dc7b3af1ad1552613e6a087d25f4c158', 20, '2026-02-26 03:41:16'),
(804, NULL, '4751ab2f022e2cca745bdeeb0550412e', 29, '2026-02-26 11:12:26'),
(805, NULL, '4751ab2f022e2cca745bdeeb0550412e', 29, '2026-02-26 11:12:26'),
(806, NULL, 'c4671e7cc6636ff2a5de744f481bee64', 1, '2026-02-26 13:49:05'),
(807, NULL, 'c4671e7cc6636ff2a5de744f481bee64', 1, '2026-02-26 13:49:05'),
(808, NULL, '82ba1407cc865314ab8529c84ffc87aa', 21, '2026-02-26 20:13:15'),
(809, NULL, '82ba1407cc865314ab8529c84ffc87aa', 21, '2026-02-26 20:13:15'),
(810, NULL, '3b2d5ac40507a325917885058bcf0dd7', 34, '2026-03-03 05:53:05'),
(811, NULL, '3b2d5ac40507a325917885058bcf0dd7', 34, '2026-03-03 05:53:06'),
(812, NULL, '82dd69bf5beb4c63413a8f952770a759', 20, '2026-03-03 06:26:48'),
(813, NULL, '82dd69bf5beb4c63413a8f952770a759', 20, '2026-03-03 06:26:48'),
(814, NULL, 'e0d70ac8f102545f73cbc8e0f6bb4b60', 26, '2026-03-03 06:45:03'),
(815, NULL, 'e0d70ac8f102545f73cbc8e0f6bb4b60', 26, '2026-03-03 06:45:03'),
(816, NULL, 'a8d3b6f348290da2a7b7ae7841cbdf71', 32, '2026-03-03 08:28:34'),
(817, NULL, 'a8d3b6f348290da2a7b7ae7841cbdf71', 32, '2026-03-03 08:28:34'),
(818, NULL, '8d4e6a3a42ae13d38990071cd9c54875', 29, '2026-03-03 08:49:44'),
(819, NULL, '8d4e6a3a42ae13d38990071cd9c54875', 29, '2026-03-03 08:49:44'),
(820, NULL, 'ac359bc6c1d7c2cc9a6892ce29c8ba0a', 28, '2026-03-03 09:07:32'),
(821, NULL, 'ac359bc6c1d7c2cc9a6892ce29c8ba0a', 28, '2026-03-03 09:07:32'),
(822, NULL, '354a9606c3da1a227d67bb9169222984', 4, '2026-03-03 09:25:17'),
(823, NULL, '354a9606c3da1a227d67bb9169222984', 4, '2026-03-03 09:25:17'),
(824, NULL, 'fd358c5f8c5e40e10581bf82a7c6ac8f', 2, '2026-03-03 09:42:27'),
(825, NULL, 'fd358c5f8c5e40e10581bf82a7c6ac8f', 2, '2026-03-03 09:42:27'),
(826, NULL, '5a1ae276d37e77f50a13c842e2cbc47b', 25, '2026-03-03 09:59:38'),
(827, NULL, '5a1ae276d37e77f50a13c842e2cbc47b', 25, '2026-03-03 09:59:38'),
(828, NULL, 'd09f9418d371fda62963ffc61cc10180', 4, '2026-03-03 11:45:10'),
(829, NULL, 'd09f9418d371fda62963ffc61cc10180', 4, '2026-03-03 11:45:10'),
(830, NULL, 'aab7d98cc71bb41dd8aee473b89d0718', 32, '2026-03-03 13:45:59'),
(831, NULL, 'aab7d98cc71bb41dd8aee473b89d0718', 32, '2026-03-03 13:45:59'),
(832, NULL, 'a3b60510fc9b687b114977ac7cb37e02', 21, '2026-03-03 14:21:52'),
(833, NULL, 'a3b60510fc9b687b114977ac7cb37e02', 21, '2026-03-03 14:21:52'),
(834, NULL, 'd77d6792643f94cb0250ca3ec7fdcfa4', 29, '2026-03-03 15:11:15'),
(835, NULL, 'd77d6792643f94cb0250ca3ec7fdcfa4', 29, '2026-03-03 15:11:15'),
(836, NULL, '463d9539b8d0ac2c119444448bc3710b', 20, '2026-03-03 15:28:18'),
(837, NULL, '463d9539b8d0ac2c119444448bc3710b', 20, '2026-03-03 15:28:18'),
(838, NULL, '2bf6b48be27dd8a62577b62051477420', 2, '2026-03-03 15:46:00'),
(839, NULL, '2bf6b48be27dd8a62577b62051477420', 2, '2026-03-03 15:46:00'),
(840, NULL, '8fae6b34fc52d3620cbb626c287ac9f6', 26, '2026-03-03 16:55:45'),
(841, NULL, '8fae6b34fc52d3620cbb626c287ac9f6', 26, '2026-03-03 16:55:45'),
(842, NULL, 'a4f799fa199f6c3d7b741ef5876c520a', 1, '2026-03-03 17:16:31'),
(843, NULL, 'a4f799fa199f6c3d7b741ef5876c520a', 1, '2026-03-03 17:16:31'),
(844, NULL, 'b25423f97110b9f52095de00fd4d208b', 25, '2026-03-03 17:57:04'),
(845, NULL, 'b25423f97110b9f52095de00fd4d208b', 25, '2026-03-03 17:57:04'),
(846, NULL, '60646c61006987cee34ff5e2eea54d50', 28, '2026-03-03 18:16:50'),
(847, NULL, '60646c61006987cee34ff5e2eea54d50', 28, '2026-03-03 18:16:50'),
(848, NULL, 'c512445c4fafc15eff74c43bd9d2952d', 34, '2026-03-03 19:20:38'),
(849, NULL, 'c512445c4fafc15eff74c43bd9d2952d', 34, '2026-03-03 19:20:38'),
(850, NULL, 'db11e110b60be1159b52d95d19909f4d', 1, '2026-03-03 19:57:18'),
(851, NULL, 'db11e110b60be1159b52d95d19909f4d', 1, '2026-03-03 19:57:18'),
(852, NULL, 'a5a40dfc97da67ab12ff7dd21b2a1a7b', 21, '2026-03-04 00:06:25'),
(853, NULL, 'a5a40dfc97da67ab12ff7dd21b2a1a7b', 21, '2026-03-04 00:06:25'),
(854, NULL, 'ea8aa27e00e3c4fc39d0141d18856d89', 4, '2026-03-06 00:54:08'),
(855, NULL, 'ea8aa27e00e3c4fc39d0141d18856d89', 4, '2026-03-06 00:54:08'),
(856, NULL, '417e28b0593ebb6e62c37e0d4d7c05ec', 20, '2026-03-08 13:40:27'),
(857, NULL, '417e28b0593ebb6e62c37e0d4d7c05ec', 20, '2026-03-08 13:40:27'),
(858, NULL, '097996ec71aef6502aee1f6ad7c4fcee', 29, '2026-03-08 14:13:54'),
(859, NULL, '097996ec71aef6502aee1f6ad7c4fcee', 29, '2026-03-08 14:13:54'),
(860, NULL, '2fd20f0f7865a7b13509562b1e1f98ac', 26, '2026-03-08 15:36:03'),
(861, NULL, '2fd20f0f7865a7b13509562b1e1f98ac', 26, '2026-03-08 15:36:03'),
(862, NULL, '21f59e0e040c4fe09c8c95e8f04adddc', 32, '2026-03-08 16:47:30'),
(863, NULL, '21f59e0e040c4fe09c8c95e8f04adddc', 32, '2026-03-08 16:47:30'),
(864, NULL, 'be431ba49630e497dd82d40204daab25', 29, '2026-03-08 17:39:28'),
(865, NULL, 'be431ba49630e497dd82d40204daab25', 29, '2026-03-08 17:39:28'),
(866, NULL, '82f28e052a9d4f52adac8b26621128f3', 28, '2026-03-08 18:06:24'),
(867, NULL, '82f28e052a9d4f52adac8b26621128f3', 28, '2026-03-08 18:06:24'),
(868, NULL, '305c3bcf7de1c45f327d64fb27d9db6d', 4, '2026-03-08 18:25:37'),
(869, NULL, '305c3bcf7de1c45f327d64fb27d9db6d', 4, '2026-03-08 18:25:37'),
(870, NULL, 'c0292ecb580aa0b94130f852a30da1bf', 2, '2026-03-08 18:42:48'),
(871, NULL, 'c0292ecb580aa0b94130f852a30da1bf', 2, '2026-03-08 18:42:48'),
(872, NULL, 'f56d58d5a3686155af439cd82eb238fe', 25, '2026-03-08 19:32:55'),
(873, NULL, 'f56d58d5a3686155af439cd82eb238fe', 25, '2026-03-08 19:32:55'),
(874, NULL, 'e6107abfc6c63b6abe830a05f9f84d07', 4, '2026-03-08 21:39:18'),
(875, NULL, 'e6107abfc6c63b6abe830a05f9f84d07', 4, '2026-03-08 21:39:18'),
(876, NULL, '00274966ebbd152f6f3970cf475afdc5', 1, '2026-03-08 22:30:52'),
(877, NULL, '00274966ebbd152f6f3970cf475afdc5', 1, '2026-03-08 22:30:52'),
(878, NULL, '70067a98b94e26ab96027ba308f7e520', 32, '2026-03-08 23:55:53'),
(879, NULL, '70067a98b94e26ab96027ba308f7e520', 32, '2026-03-08 23:55:53'),
(880, NULL, '4de343cdb67909353a9faa0655f2af0d', 21, '2026-03-09 00:50:40'),
(881, NULL, '4de343cdb67909353a9faa0655f2af0d', 21, '2026-03-09 00:50:40'),
(882, NULL, 'db211303b3bb7317e85b125e963a6d9d', 1, '2026-03-09 01:38:38'),
(883, NULL, 'db211303b3bb7317e85b125e963a6d9d', 1, '2026-03-09 01:38:38'),
(884, NULL, '74514ffb14bf59cddcd56aebe5819346', 36, '2026-03-09 01:43:04'),
(885, NULL, '74514ffb14bf59cddcd56aebe5819346', 36, '2026-03-09 01:43:04'),
(886, NULL, '583ba65494a957a4b6baa7312e786c05', 29, '2026-03-09 02:48:53'),
(887, NULL, '583ba65494a957a4b6baa7312e786c05', 29, '2026-03-09 02:48:53'),
(888, NULL, 'be8d528a9c2cfa72c84f0ce9380aca5f', 20, '2026-03-09 03:08:03'),
(889, NULL, 'be8d528a9c2cfa72c84f0ce9380aca5f', 20, '2026-03-09 03:08:03'),
(890, NULL, 'ec4e01624e112eb8d60d0cf2a019585b', 2, '2026-03-09 03:28:06'),
(891, NULL, 'ec4e01624e112eb8d60d0cf2a019585b', 2, '2026-03-09 03:28:06'),
(892, NULL, 'bbb226a40777ad3a9ae1b512e3b2f657', 21, '2026-03-09 05:05:20'),
(893, NULL, 'bbb226a40777ad3a9ae1b512e3b2f657', 21, '2026-03-09 05:05:20'),
(894, NULL, '87490ef8e2a46ebccc4675ec930e183d', 26, '2026-03-09 05:26:08'),
(895, NULL, '87490ef8e2a46ebccc4675ec930e183d', 26, '2026-03-09 05:26:08'),
(896, NULL, 'e246adac971eb9b453c2a7c8ea711bde', 28, '2026-03-09 05:54:28'),
(897, NULL, 'e246adac971eb9b453c2a7c8ea711bde', 28, '2026-03-09 05:54:28'),
(898, NULL, '43bd4d90fb1156018a5ae1d800c8f116', 25, '2026-03-09 06:35:07'),
(899, NULL, '43bd4d90fb1156018a5ae1d800c8f116', 25, '2026-03-09 06:35:07'),
(900, NULL, '6317a705ace19c3febde22aaa6405124', 34, '2026-03-09 07:57:26'),
(901, NULL, '6317a705ace19c3febde22aaa6405124', 34, '2026-03-09 07:57:26'),
(902, NULL, '12ca6ccf8fc63543a20a32a07120ccca', 29, '2026-03-09 10:18:49'),
(903, NULL, '12ca6ccf8fc63543a20a32a07120ccca', 29, '2026-03-09 10:18:49'),
(904, NULL, '85bd09a1133ff41c99cf02c539c0086d', 4, '2026-03-09 10:18:50'),
(905, NULL, '85bd09a1133ff41c99cf02c539c0086d', 4, '2026-03-09 10:18:50'),
(906, NULL, '1a2c276e2ff3a6868d80793eac9c8b7a', 28, '2026-03-09 10:18:51'),
(907, NULL, '1a2c276e2ff3a6868d80793eac9c8b7a', 28, '2026-03-09 10:18:51'),
(908, NULL, '30940f5659ca2eb40d4bd661ce5affc5', 34, '2026-03-09 10:18:52'),
(909, NULL, '30940f5659ca2eb40d4bd661ce5affc5', 34, '2026-03-09 10:18:52'),
(910, NULL, 'd8379ced36c3173cdf50f1bdc5c37c5d', 26, '2026-03-09 10:18:53'),
(911, NULL, 'd8379ced36c3173cdf50f1bdc5c37c5d', 26, '2026-03-09 10:18:53'),
(912, NULL, 'e610c26f97cd9edf859bc392589c162e', 25, '2026-03-09 10:18:54'),
(913, NULL, 'e610c26f97cd9edf859bc392589c162e', 25, '2026-03-09 10:18:54'),
(914, NULL, 'b795c361e1d42a4327f82d49523c1b98', 1, '2026-03-09 10:18:54'),
(915, NULL, 'b795c361e1d42a4327f82d49523c1b98', 1, '2026-03-09 10:18:54'),
(916, NULL, '30479834eec772e282041f071c690e7c', 21, '2026-03-09 10:18:55'),
(917, NULL, '30479834eec772e282041f071c690e7c', 21, '2026-03-09 10:18:55'),
(918, NULL, '94b77d16f704e9a8cd3ba92a2f7535b7', 2, '2026-03-09 10:18:56'),
(919, NULL, '94b77d16f704e9a8cd3ba92a2f7535b7', 2, '2026-03-09 10:18:56'),
(920, NULL, 'ba99daea920044738c57ec4b5313d9d6', 20, '2026-03-09 19:46:25'),
(921, NULL, 'ba99daea920044738c57ec4b5313d9d6', 20, '2026-03-09 19:46:25'),
(922, NULL, '56a7b459cd28db10ce90f67af40b528c', 4, '2026-03-09 23:56:32'),
(923, NULL, '56a7b459cd28db10ce90f67af40b528c', 4, '2026-03-09 23:56:32'),
(924, NULL, '192a60b6504d8648f38958d971d261b0', 26, '2026-03-10 20:16:15'),
(925, NULL, '192a60b6504d8648f38958d971d261b0', 26, '2026-03-10 20:16:15'),
(926, NULL, 'f7bae43d1853506e9b00f3b48af61b12', 21, '2026-03-11 23:38:24'),
(927, NULL, 'f7bae43d1853506e9b00f3b48af61b12', 21, '2026-03-11 23:38:24'),
(928, NULL, 'dbe3be02bc8a6382f8d88b29c792d1c8', 20, '2026-03-12 13:44:09'),
(929, NULL, 'dbe3be02bc8a6382f8d88b29c792d1c8', 20, '2026-03-12 13:44:09'),
(930, NULL, '70661fefdd4f2047da66c80843b067db', 1, '2026-03-12 16:38:29'),
(931, NULL, '70661fefdd4f2047da66c80843b067db', 1, '2026-03-12 16:38:29'),
(932, NULL, 'e652cd9566b3202d10dc7b8a20a6ff36', 34, '2026-03-12 16:48:21'),
(933, NULL, 'e652cd9566b3202d10dc7b8a20a6ff36', 34, '2026-03-12 16:48:21'),
(934, NULL, 'cd55de452bb681188b20f7ac4cf19fe0', 21, '2026-03-12 16:58:40'),
(935, NULL, 'cd55de452bb681188b20f7ac4cf19fe0', 21, '2026-03-12 16:58:40'),
(936, NULL, 'ad66a32d60de6af9d675d518ff965895', 25, '2026-03-12 20:19:26'),
(937, NULL, 'ad66a32d60de6af9d675d518ff965895', 25, '2026-03-12 20:19:26'),
(938, NULL, '07de083431f7fb03690310730f7058d9', 4, '2026-03-12 20:29:28'),
(939, NULL, '07de083431f7fb03690310730f7058d9', 4, '2026-03-12 20:29:28'),
(940, NULL, 'c4a236cec78f372fac0f4f0be78218a8', 4, '2026-03-12 22:58:24'),
(941, NULL, 'c4a236cec78f372fac0f4f0be78218a8', 4, '2026-03-12 22:58:24'),
(942, NULL, 'facc55e31e57f3ded444888745601a9d', 29, '2026-03-12 23:08:17'),
(943, NULL, 'facc55e31e57f3ded444888745601a9d', 29, '2026-03-12 23:08:17'),
(944, NULL, 'a861536744b4fa8b21376222d401b414', 2, '2026-03-12 23:18:45'),
(945, NULL, 'a861536744b4fa8b21376222d401b414', 2, '2026-03-12 23:18:45'),
(946, NULL, '2eb36a7d86c656ef9809f072a45cec25', 20, '2026-03-12 23:28:18'),
(947, NULL, '2eb36a7d86c656ef9809f072a45cec25', 20, '2026-03-12 23:28:18'),
(948, NULL, 'c7e019809c3d13b9aa29068376ccfcd8', 26, '2026-03-12 23:37:47'),
(949, NULL, 'c7e019809c3d13b9aa29068376ccfcd8', 26, '2026-03-12 23:37:47'),
(950, NULL, '5adda66828c346f781d654cfeeb640b9', 25, '2026-03-12 23:49:39'),
(951, NULL, '5adda66828c346f781d654cfeeb640b9', 25, '2026-03-12 23:49:39'),
(952, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 2, '2026-03-13 00:34:06'),
(953, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 2, '2026-03-13 00:34:06'),
(954, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 34, '2026-03-13 00:34:09'),
(955, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 34, '2026-03-13 00:34:09'),
(956, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 32, '2026-03-13 00:34:11'),
(957, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 32, '2026-03-13 00:34:11'),
(958, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 4, '2026-03-13 00:34:21'),
(959, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 4, '2026-03-13 00:34:21'),
(960, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 21, '2026-03-13 00:34:40'),
(961, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 21, '2026-03-13 00:34:40'),
(962, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 29, '2026-03-13 00:34:41'),
(963, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 29, '2026-03-13 00:34:41'),
(964, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 1, '2026-03-13 00:34:42'),
(965, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 1, '2026-03-13 00:34:42'),
(966, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 28, '2026-03-13 00:34:42'),
(967, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 28, '2026-03-13 00:34:42'),
(968, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 25, '2026-03-13 00:34:44'),
(969, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 25, '2026-03-13 00:34:44'),
(970, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 26, '2026-03-13 00:34:45'),
(971, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 26, '2026-03-13 00:34:45'),
(972, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 20, '2026-03-13 00:34:46'),
(973, NULL, 'ca4b9f0851ee6f1ee84903f8cc8b4fed', 20, '2026-03-13 00:34:46'),
(974, NULL, '808728fd0af776fbcba28dd21e9a6f9d', 36, '2026-03-13 03:43:30'),
(975, NULL, '808728fd0af776fbcba28dd21e9a6f9d', 36, '2026-03-13 03:43:30'),
(976, NULL, 'a3c586d67aee35726fa2eef6962af499', 28, '2026-03-13 05:27:26'),
(977, NULL, 'a3c586d67aee35726fa2eef6962af499', 28, '2026-03-13 05:27:26'),
(978, NULL, 'c258b5a3628135d4c2bcac6b5a7a97e0', 32, '2026-03-13 08:41:48'),
(979, NULL, 'c258b5a3628135d4c2bcac6b5a7a97e0', 32, '2026-03-13 08:41:48'),
(980, NULL, '3941acfc5c8bc3551db7f0391b0c030d', 29, '2026-03-13 09:03:32'),
(981, NULL, '3941acfc5c8bc3551db7f0391b0c030d', 29, '2026-03-13 09:03:32'),
(982, NULL, '889c338f7a2b3d1cb07a160ab00b870e', 2, '2026-03-13 09:13:22'),
(983, NULL, '889c338f7a2b3d1cb07a160ab00b870e', 2, '2026-03-13 09:13:22'),
(984, NULL, '1fbc72f7a64ba806f0ec2a03217ad726', 28, '2026-03-13 09:23:10'),
(985, NULL, '1fbc72f7a64ba806f0ec2a03217ad726', 28, '2026-03-13 09:23:10'),
(986, NULL, 'cbe3d07b9aa5dd833de13a8e4e0ccc3f', 26, '2026-03-13 09:32:52'),
(987, NULL, 'cbe3d07b9aa5dd833de13a8e4e0ccc3f', 26, '2026-03-13 09:32:52'),
(988, NULL, '123fbb39f280c1d18da9a53169baec7d', 1, '2026-03-13 14:23:25'),
(989, NULL, '123fbb39f280c1d18da9a53169baec7d', 1, '2026-03-13 14:23:25'),
(990, NULL, '11ba4601246c58e8da78f4c84258888d', 34, '2026-03-13 14:32:08'),
(991, NULL, '11ba4601246c58e8da78f4c84258888d', 34, '2026-03-13 14:32:08'),
(992, NULL, 'd6ab72f52a4ad2776d299b33b3105703', 32, '2026-03-13 16:51:24'),
(993, NULL, 'd6ab72f52a4ad2776d299b33b3105703', 32, '2026-03-13 16:51:24'),
(994, NULL, 'deb33f0575a7d1247178cad9bd7af802', 20, '2026-03-13 22:44:13'),
(995, NULL, 'deb33f0575a7d1247178cad9bd7af802', 20, '2026-03-13 22:44:13'),
(996, NULL, '7da1467090116660625d5952723c8bd1', 26, '2026-03-13 23:10:39'),
(997, NULL, '7da1467090116660625d5952723c8bd1', 26, '2026-03-13 23:10:39'),
(998, NULL, 'ea7b2db47dc9dc1e0d604d817314023a', 32, '2026-03-13 23:22:28'),
(999, NULL, 'ea7b2db47dc9dc1e0d604d817314023a', 32, '2026-03-13 23:22:28'),
(1000, NULL, 'b5f1782d37274723a50a9a1c290e36ec', 29, '2026-03-13 23:34:54'),
(1001, NULL, 'b5f1782d37274723a50a9a1c290e36ec', 29, '2026-03-13 23:34:54'),
(1002, NULL, '74b2ebb151d4a6e42cb7027804f6ea90', 4, '2026-03-14 00:00:41'),
(1003, NULL, '74b2ebb151d4a6e42cb7027804f6ea90', 4, '2026-03-14 00:00:41'),
(1004, NULL, '6facf69fe6eae7889fe85c3c429893c8', 2, '2026-03-14 00:29:16'),
(1005, NULL, '6facf69fe6eae7889fe85c3c429893c8', 2, '2026-03-14 00:29:16'),
(1006, NULL, '51aadf19241a47cd5bf9393faf817465', 26, '2026-03-14 00:34:31'),
(1007, NULL, '51aadf19241a47cd5bf9393faf817465', 26, '2026-03-14 00:34:31'),
(1008, NULL, 'd1dc2c136a6621b78b954e402c1239bc', 25, '2026-03-14 00:58:42'),
(1009, NULL, 'd1dc2c136a6621b78b954e402c1239bc', 25, '2026-03-14 00:58:42'),
(1010, NULL, '4b622f788e33c177b73280eb4788ebdf', 1, '2026-03-14 07:22:08'),
(1011, NULL, '4b622f788e33c177b73280eb4788ebdf', 1, '2026-03-14 07:22:08'),
(1012, NULL, '14cd19f81b121fe03ad64c7e430794d4', 21, '2026-03-14 07:48:22'),
(1013, NULL, '14cd19f81b121fe03ad64c7e430794d4', 21, '2026-03-14 07:48:22'),
(1014, NULL, '5ed53f3641c8aee076a0c60cdea3c6e3', 4, '2026-03-14 08:26:13'),
(1015, NULL, '5ed53f3641c8aee076a0c60cdea3c6e3', 4, '2026-03-14 08:26:13'),
(1016, NULL, '12dea18238b871db5dfbf528e09bd3c2', 21, '2026-03-14 09:09:01'),
(1017, NULL, '12dea18238b871db5dfbf528e09bd3c2', 21, '2026-03-14 09:09:02'),
(1018, NULL, '4d4c4330d11f113649bd8e6be8c6e455', 1, '2026-03-14 09:52:55'),
(1019, NULL, '4d4c4330d11f113649bd8e6be8c6e455', 1, '2026-03-14 09:52:55'),
(1020, NULL, '1f8e6f03c5e59f0ef41eb67763d6beae', 32, '2026-03-14 10:39:25'),
(1021, NULL, '1f8e6f03c5e59f0ef41eb67763d6beae', 32, '2026-03-14 10:39:25'),
(1022, NULL, '348c81a25f21db6ce25fb4efff3c2711', 21, '2026-03-14 12:48:26'),
(1023, NULL, '348c81a25f21db6ce25fb4efff3c2711', 21, '2026-03-14 12:48:26'),
(1024, NULL, 'f4252633959ea89719ef3ee776c72ffb', 29, '2026-03-14 13:17:42'),
(1025, NULL, 'f4252633959ea89719ef3ee776c72ffb', 29, '2026-03-14 13:17:42'),
(1026, NULL, 'bc062f4c076c32a7a82fdc746c0b3a9c', 20, '2026-03-14 13:47:17'),
(1027, NULL, 'bc062f4c076c32a7a82fdc746c0b3a9c', 20, '2026-03-14 13:47:17'),
(1028, NULL, 'e935a65689c57f631b02f4fc03b0926c', 2, '2026-03-14 14:21:16'),
(1029, NULL, 'e935a65689c57f631b02f4fc03b0926c', 2, '2026-03-14 14:21:16'),
(1030, NULL, '76e3e73bc88c09ef25ed9c241515f6b6', 28, '2026-03-14 15:24:02'),
(1031, NULL, '76e3e73bc88c09ef25ed9c241515f6b6', 28, '2026-03-14 15:24:02'),
(1032, NULL, '7d2e336c81ec70a01c52f4f6129d8d01', 26, '2026-03-14 15:54:18'),
(1033, NULL, '7d2e336c81ec70a01c52f4f6129d8d01', 26, '2026-03-14 15:54:18'),
(1034, NULL, '1943917894775120c181cfed6c20940b', 25, '2026-03-14 17:38:58'),
(1035, NULL, '1943917894775120c181cfed6c20940b', 25, '2026-03-14 17:38:58'),
(1036, NULL, 'e93c220aa22f396b14acf36a113ab5c9', 34, '2026-03-14 19:50:59'),
(1037, NULL, 'e93c220aa22f396b14acf36a113ab5c9', 34, '2026-03-14 19:50:59'),
(1038, NULL, '840445620519fa9ed4e6864c73fa0b30', 29, '2026-03-14 23:07:23'),
(1039, NULL, '840445620519fa9ed4e6864c73fa0b30', 29, '2026-03-14 23:07:23'),
(1040, NULL, 'cdd28055e27abf062762850bb979cd7d', 26, '2026-03-14 23:07:24'),
(1041, NULL, 'cdd28055e27abf062762850bb979cd7d', 26, '2026-03-14 23:07:24'),
(1042, NULL, 'cbe0cc2c8b4cf98a05f5484cf62ed3f1', 25, '2026-03-14 23:07:36'),
(1043, NULL, 'cbe0cc2c8b4cf98a05f5484cf62ed3f1', 25, '2026-03-14 23:07:36'),
(1044, NULL, '36cc06cd8a737f41cf9bc1bf90e5d0a1', 32, '2026-03-14 23:07:41'),
(1045, NULL, '36cc06cd8a737f41cf9bc1bf90e5d0a1', 32, '2026-03-14 23:07:41'),
(1046, NULL, 'd8a28162eb65795de62157c4ef737ca6', 4, '2026-03-14 23:07:51'),
(1047, NULL, 'd8a28162eb65795de62157c4ef737ca6', 4, '2026-03-14 23:07:52'),
(1048, NULL, '1715fc5c6c8ed15d33c36c1b0d0385cb', 20, '2026-03-14 23:08:52'),
(1049, NULL, '1715fc5c6c8ed15d33c36c1b0d0385cb', 20, '2026-03-14 23:08:52'),
(1050, NULL, '4ff53e1de948adb29c705d8ee881a62b', 1, '2026-03-15 20:04:23'),
(1051, NULL, '4ff53e1de948adb29c705d8ee881a62b', 1, '2026-03-15 20:04:23'),
(1052, NULL, '9507528e7638a1c1575d9a9975bf1ea5', 4, '2026-03-16 02:47:32'),
(1053, NULL, '9507528e7638a1c1575d9a9975bf1ea5', 4, '2026-03-16 02:47:33'),
(1054, NULL, '727e7bfcf144b71c94b721275f5a0eb0', 28, '2026-03-16 13:59:04'),
(1055, NULL, '727e7bfcf144b71c94b721275f5a0eb0', 28, '2026-03-16 13:59:04'),
(1056, NULL, '8234c7df269002d9c6b047e580bd4637', 26, '2026-03-16 18:44:43'),
(1057, NULL, '8234c7df269002d9c6b047e580bd4637', 26, '2026-03-16 18:44:43'),
(1058, NULL, '7d918d6c6f9b7e167ccd16181bf9602c', 32, '2026-03-17 20:16:53'),
(1059, NULL, '7d918d6c6f9b7e167ccd16181bf9602c', 32, '2026-03-17 20:16:53'),
(1060, NULL, 'b41ac1ad2c0a2528f0026f36fa296daa', 21, '2026-03-17 22:17:14'),
(1061, NULL, 'b41ac1ad2c0a2528f0026f36fa296daa', 21, '2026-03-17 22:17:14'),
(1062, NULL, 'd265acf33d0ccf3525c7c42b43cbe70f', 20, '2026-03-18 06:14:45'),
(1063, NULL, 'd265acf33d0ccf3525c7c42b43cbe70f', 20, '2026-03-18 06:14:45'),
(1064, NULL, '164ac4e57df568cba21178bfe62e8f96', 26, '2026-03-18 08:02:05'),
(1065, NULL, '164ac4e57df568cba21178bfe62e8f96', 26, '2026-03-18 08:02:05'),
(1066, NULL, '80042a1a871dd9a89c7bc050476e559b', 2, '2026-03-18 08:57:46'),
(1067, NULL, '80042a1a871dd9a89c7bc050476e559b', 2, '2026-03-18 08:57:46'),
(1068, NULL, 'a05c7520e82cfe9aeee5c7717127ebec', 25, '2026-03-18 09:08:15'),
(1069, NULL, 'a05c7520e82cfe9aeee5c7717127ebec', 25, '2026-03-18 09:08:15'),
(1070, NULL, '918675ef98e2a04174f72b59a9864ac8', 1, '2026-03-18 11:10:27'),
(1071, NULL, '918675ef98e2a04174f72b59a9864ac8', 1, '2026-03-18 11:10:27'),
(1072, NULL, 'c9a49f5797f157729a1460e945ac0e72', 29, '2026-03-18 15:45:18'),
(1073, NULL, 'c9a49f5797f157729a1460e945ac0e72', 29, '2026-03-18 15:45:18'),
(1074, NULL, 'eae261cb19dedfb7d4d839366fd00a3b', 20, '2026-03-19 01:12:22'),
(1075, NULL, 'eae261cb19dedfb7d4d839366fd00a3b', 20, '2026-03-19 01:12:22'),
(1076, NULL, 'aa26f18e244896a18cd0f7ede14f2826', 32, '2026-03-19 02:01:05'),
(1077, NULL, 'aa26f18e244896a18cd0f7ede14f2826', 32, '2026-03-19 02:01:05'),
(1078, NULL, '3cee716aa96ac6605d5fdfcb686fa211', 29, '2026-03-19 02:52:28'),
(1079, NULL, '3cee716aa96ac6605d5fdfcb686fa211', 29, '2026-03-19 02:52:28'),
(1080, NULL, 'aa30e34cd52e3ea69eca7f4fd3912c7b', 26, '2026-03-19 03:23:57'),
(1081, NULL, 'aa30e34cd52e3ea69eca7f4fd3912c7b', 26, '2026-03-19 03:23:57'),
(1082, NULL, '23f6c1423f93a3b1ca82a9fd435df0fa', 2, '2026-03-19 04:20:28'),
(1083, NULL, '23f6c1423f93a3b1ca82a9fd435df0fa', 2, '2026-03-19 04:20:28'),
(1084, NULL, '4cc30864470ef6df78679fb0fc8ca152', 25, '2026-03-19 05:25:32'),
(1085, NULL, '4cc30864470ef6df78679fb0fc8ca152', 25, '2026-03-19 05:25:32'),
(1086, NULL, '0d264bbfd7ce3b195e878277704797fd', 1, '2026-03-19 13:13:16'),
(1087, NULL, '0d264bbfd7ce3b195e878277704797fd', 1, '2026-03-19 13:13:16'),
(1088, NULL, 'ac1991185a0c3c40e3f2357c8e336a26', 21, '2026-03-19 15:05:16'),
(1089, NULL, 'ac1991185a0c3c40e3f2357c8e336a26', 21, '2026-03-19 15:05:16'),
(1090, NULL, '4c55371c5f8619b88632c44eadf24aec', 4, '2026-03-19 16:34:46'),
(1091, NULL, '4c55371c5f8619b88632c44eadf24aec', 4, '2026-03-19 16:34:46'),
(1092, NULL, 'bd013dd6d8792ad6b97fbcf04b478dd9', 1, '2026-03-19 17:13:10'),
(1093, NULL, 'bd013dd6d8792ad6b97fbcf04b478dd9', 1, '2026-03-19 17:13:10'),
(1094, NULL, '562c9ee3ff4e3329b5d3dda18c0ac463', 32, '2026-03-19 20:10:30'),
(1095, NULL, '562c9ee3ff4e3329b5d3dda18c0ac463', 32, '2026-03-19 20:10:30'),
(1096, NULL, '3828e6e3a3934fd9db5ff870d3b660bd', 21, '2026-03-19 20:53:49'),
(1097, NULL, '3828e6e3a3934fd9db5ff870d3b660bd', 21, '2026-03-19 20:53:49'),
(1098, NULL, '1b6b31e35b731e22d6574b4a7ddea7db', 1, '2026-03-19 20:58:47'),
(1099, NULL, '1b6b31e35b731e22d6574b4a7ddea7db', 1, '2026-03-19 20:58:47'),
(1100, NULL, '683fae240a0907087acbd6cca2d4291c', 29, '2026-03-19 22:22:15'),
(1101, NULL, '683fae240a0907087acbd6cca2d4291c', 29, '2026-03-19 22:22:15'),
(1102, NULL, '9c8f8e4609358b62dd81bea5f33dc7c8', 20, '2026-03-19 22:59:28'),
(1103, NULL, '9c8f8e4609358b62dd81bea5f33dc7c8', 20, '2026-03-19 22:59:28'),
(1104, NULL, '1386556b2306bc187137c6b7cdd3d4d1', 28, '2026-03-19 23:42:14'),
(1105, NULL, '1386556b2306bc187137c6b7cdd3d4d1', 28, '2026-03-19 23:42:14'),
(1106, NULL, 'a0fcecae51594b90c518666c7464f9a0', 2, '2026-03-20 00:20:41'),
(1107, NULL, 'a0fcecae51594b90c518666c7464f9a0', 2, '2026-03-20 00:20:41'),
(1108, NULL, 'f451bce4fac7cd27a4ddf67a4328a127', 26, '2026-03-20 01:05:43'),
(1109, NULL, 'f451bce4fac7cd27a4ddf67a4328a127', 26, '2026-03-20 01:05:43'),
(1110, NULL, '9999c0294a55ec9cac0c00dac2280218', 25, '2026-03-20 03:41:14'),
(1111, NULL, '9999c0294a55ec9cac0c00dac2280218', 25, '2026-03-20 03:41:14'),
(1112, NULL, '0237c7cdfc04611988febf4220bc9b64', 34, '2026-03-20 04:17:38'),
(1113, NULL, '0237c7cdfc04611988febf4220bc9b64', 34, '2026-03-20 04:17:38'),
(1114, NULL, '58f5fb0be8b02ee9f2f1c1e3ba1b3632', 21, '2026-03-20 10:25:04'),
(1115, NULL, '58f5fb0be8b02ee9f2f1c1e3ba1b3632', 21, '2026-03-20 10:25:04'),
(1116, NULL, 'e83dea1787526cae8d45e97df7d3d97b', 1, '2026-03-21 07:29:34'),
(1117, NULL, 'e83dea1787526cae8d45e97df7d3d97b', 1, '2026-03-21 07:29:34'),
(1118, NULL, 'f3855d86de404444c703779e4c4bc427', 28, '2026-03-21 12:34:02'),
(1119, NULL, 'f3855d86de404444c703779e4c4bc427', 28, '2026-03-21 12:34:02'),
(1120, NULL, 'bf5642fbbcd589adcfe3c99f102576e9', 2, '2026-03-23 07:18:17'),
(1121, NULL, 'bf5642fbbcd589adcfe3c99f102576e9', 2, '2026-03-23 07:18:17'),
(1122, NULL, 'e474909b614e19b807fe32e432e48c61', 20, '2026-03-24 05:34:57'),
(1123, NULL, 'e474909b614e19b807fe32e432e48c61', 20, '2026-03-24 05:34:57'),
(1124, NULL, '727291d257babe226732e77e1c1c347e', 32, '2026-03-24 07:05:35'),
(1125, NULL, '727291d257babe226732e77e1c1c347e', 32, '2026-03-24 07:05:35'),
(1126, NULL, '42ea35564b7b86fa1017c65f920ec176', 29, '2026-03-24 07:54:16'),
(1127, NULL, '42ea35564b7b86fa1017c65f920ec176', 29, '2026-03-24 07:54:16'),
(1128, NULL, 'ca525d16e6c219d612fdfcc293c37a42', 26, '2026-03-24 08:27:08'),
(1129, NULL, 'ca525d16e6c219d612fdfcc293c37a42', 26, '2026-03-24 08:27:08'),
(1130, NULL, 'bba0b244d4621573fedd03ee46658cd4', 2, '2026-03-24 08:56:40'),
(1131, NULL, 'bba0b244d4621573fedd03ee46658cd4', 2, '2026-03-24 08:56:40'),
(1132, NULL, '796794ca7f9d633eef7821d1827ea459', 25, '2026-03-24 10:31:43'),
(1133, NULL, '796794ca7f9d633eef7821d1827ea459', 25, '2026-03-24 10:31:43'),
(1134, NULL, '38abbd8d95cb8c8112536448dc4e1755', 2, '2026-03-24 11:23:14'),
(1135, NULL, '38abbd8d95cb8c8112536448dc4e1755', 2, '2026-03-24 11:23:14'),
(1136, NULL, '89b14d383968d32fbebfa3cf1fab5a67', 2, '2026-03-24 13:18:18'),
(1137, NULL, '89b14d383968d32fbebfa3cf1fab5a67', 2, '2026-03-24 13:18:18'),
(1138, NULL, '5a2332d52abf7a65af76da3532973ca2', 2, '2026-03-24 15:39:25'),
(1139, NULL, '5a2332d52abf7a65af76da3532973ca2', 2, '2026-03-24 15:39:25'),
(1140, NULL, 'fb5a40dc32fae47a53061b44deb9e6e4', 1, '2026-03-24 21:53:38'),
(1141, NULL, 'fb5a40dc32fae47a53061b44deb9e6e4', 1, '2026-03-24 21:53:38'),
(1142, NULL, 'ea879d81cc35d15bc06ce50873b34f3a', 21, '2026-03-25 00:18:09'),
(1143, NULL, 'ea879d81cc35d15bc06ce50873b34f3a', 21, '2026-03-25 00:18:09'),
(1144, NULL, '4664f0c891adb33450bc932399e57f47', 4, '2026-03-25 02:51:48'),
(1145, NULL, '4664f0c891adb33450bc932399e57f47', 4, '2026-03-25 02:51:48'),
(1146, NULL, '7d23f3de27e5ccb2eba5f680814bd392', 1, '2026-03-25 03:27:50'),
(1147, NULL, '7d23f3de27e5ccb2eba5f680814bd392', 1, '2026-03-25 03:27:50'),
(1148, NULL, 'bc4920eb4c66aafb6890d6c11356d43c', 32, '2026-03-25 06:35:07'),
(1149, NULL, 'bc4920eb4c66aafb6890d6c11356d43c', 32, '2026-03-25 06:35:08'),
(1150, NULL, '8d7447b213ed3106d3d8bdf1a855d1e7', 21, '2026-03-25 07:37:15'),
(1151, NULL, '8d7447b213ed3106d3d8bdf1a855d1e7', 21, '2026-03-25 07:37:15'),
(1152, NULL, '975d98fd15acf0baa70f9b3ac5cb1178', 29, '2026-03-25 08:05:12'),
(1153, NULL, '975d98fd15acf0baa70f9b3ac5cb1178', 29, '2026-03-25 08:05:12'),
(1154, NULL, '569a40bbaa9a4c610c07f3619f105a6c', 28, '2026-03-25 08:31:39'),
(1155, NULL, '569a40bbaa9a4c610c07f3619f105a6c', 28, '2026-03-25 08:31:39'),
(1156, NULL, 'e792a56e96b71fe0ed24b4bed740b0d1', 20, '2026-03-25 10:22:36'),
(1157, NULL, 'e792a56e96b71fe0ed24b4bed740b0d1', 20, '2026-03-25 10:22:36'),
(1158, NULL, 'f5b5e8cc8af1dd52596cb3bd6917b4b3', 2, '2026-03-25 10:56:35'),
(1159, NULL, 'f5b5e8cc8af1dd52596cb3bd6917b4b3', 2, '2026-03-25 10:56:35'),
(1160, NULL, 'eda04b2184c2bec96a7625e1d4ec6a17', 26, '2026-03-25 11:40:06'),
(1161, NULL, 'eda04b2184c2bec96a7625e1d4ec6a17', 26, '2026-03-25 11:40:06'),
(1162, NULL, '96007bff4cd22dd9a8af74b1ecbe6456', 25, '2026-03-25 16:29:22'),
(1163, NULL, '96007bff4cd22dd9a8af74b1ecbe6456', 25, '2026-03-25 16:29:22'),
(1164, NULL, '46a22399c0430c6cc3f554762751c468', 20, '2026-03-26 09:47:34'),
(1165, NULL, '46a22399c0430c6cc3f554762751c468', 20, '2026-03-26 09:47:34'),
(1166, NULL, 'bbf06e86b356ca652086e88a2d33b3a5', 25, '2026-03-27 20:16:33'),
(1167, NULL, 'bbf06e86b356ca652086e88a2d33b3a5', 25, '2026-03-27 20:16:33'),
(1168, NULL, '17deb2012bb3dffab157e54519f98050', 28, '2026-03-28 10:34:30'),
(1169, NULL, '17deb2012bb3dffab157e54519f98050', 28, '2026-03-28 10:34:30'),
(1170, NULL, 'ff5a71355e07d839a43a567d7d9b1f17', 25, '2026-03-28 10:43:33'),
(1171, NULL, 'ff5a71355e07d839a43a567d7d9b1f17', 25, '2026-03-28 10:43:33'),
(1172, NULL, '718285f8de564bcecaca46d080580372', 25, '2026-03-28 10:44:51'),
(1173, NULL, '718285f8de564bcecaca46d080580372', 25, '2026-03-28 10:44:51'),
(1174, NULL, 'cfd78b3abf8014b7e10fe5702c3778bc', 34, '2026-03-28 22:51:48'),
(1175, NULL, 'cfd78b3abf8014b7e10fe5702c3778bc', 34, '2026-03-28 22:51:48'),
(1176, NULL, 'd837bb0d83109eb8da6a310eac22d98c', 21, '2026-03-28 22:57:46'),
(1177, NULL, 'd837bb0d83109eb8da6a310eac22d98c', 21, '2026-03-28 22:57:46'),
(1178, NULL, '671561a28e39ab49d36d6647678e25fa', 1, '2026-03-29 04:07:05'),
(1179, NULL, '671561a28e39ab49d36d6647678e25fa', 1, '2026-03-29 04:07:05'),
(1180, NULL, 'a93c22784cea199d58acd2cfbf8507dd', 20, '2026-03-29 10:18:16'),
(1181, NULL, 'a93c22784cea199d58acd2cfbf8507dd', 20, '2026-03-29 10:18:16'),
(1182, NULL, 'cdc5c6275a518d6c92af24cc8764b87d', 32, '2026-03-29 11:06:51'),
(1183, NULL, 'cdc5c6275a518d6c92af24cc8764b87d', 32, '2026-03-29 11:06:51'),
(1184, NULL, '042cfe9d782b64608cb47e3e6698dcaa', 29, '2026-03-29 11:55:23'),
(1185, NULL, '042cfe9d782b64608cb47e3e6698dcaa', 29, '2026-03-29 11:55:23'),
(1186, NULL, '40b096a729ad030019ff3336bc809613', 28, '2026-03-29 12:32:58'),
(1187, NULL, '40b096a729ad030019ff3336bc809613', 28, '2026-03-29 12:32:58'),
(1188, NULL, '3919e0498a64577294b0e2ff16a035f0', 26, '2026-03-29 13:44:56'),
(1189, NULL, '3919e0498a64577294b0e2ff16a035f0', 26, '2026-03-29 13:44:56'),
(1190, NULL, '91aa5b34bba5204f1b71798cdcefb5fc', 25, '2026-03-29 14:36:24'),
(1191, NULL, '91aa5b34bba5204f1b71798cdcefb5fc', 25, '2026-03-29 14:36:24'),
(1192, NULL, 'e2cee49a24a6d8c83be873ad4c013dc3', 2, '2026-03-29 19:36:42'),
(1193, NULL, 'e2cee49a24a6d8c83be873ad4c013dc3', 2, '2026-03-29 19:36:42'),
(1194, NULL, '62ca1354b2ab3ebf8e8f791c62b0c02e', 29, '2026-03-29 20:59:06'),
(1195, NULL, '62ca1354b2ab3ebf8e8f791c62b0c02e', 29, '2026-03-29 20:59:06'),
(1196, NULL, '989ee2ace4c6c4ea6999ce77d8a42e45', 32, '2026-03-29 23:11:51'),
(1197, NULL, '989ee2ace4c6c4ea6999ce77d8a42e45', 32, '2026-03-29 23:11:51'),
(1198, NULL, '540a50e70b0934f4fbd7d532ad5c34a2', 1, '2026-03-30 00:23:54'),
(1199, NULL, '540a50e70b0934f4fbd7d532ad5c34a2', 1, '2026-03-30 00:23:54'),
(1200, NULL, '2690b8f76f5c698790f761b0f9a56fa0', 20, '2026-03-30 00:51:35'),
(1201, NULL, '2690b8f76f5c698790f761b0f9a56fa0', 20, '2026-03-30 00:51:35'),
(1202, NULL, '22fb0db597c8b22d572fb74294e30300', 21, '2026-03-30 04:11:32'),
(1203, NULL, '22fb0db597c8b22d572fb74294e30300', 21, '2026-03-30 04:11:32'),
(1204, NULL, '36653711a797cbaf013aeb4613417306', 4, '2026-03-30 10:19:44'),
(1205, NULL, '36653711a797cbaf013aeb4613417306', 4, '2026-03-30 10:19:44'),
(1206, NULL, '693575de5f14c556fa67d31b65983b16', 1, '2026-03-30 11:46:19'),
(1207, NULL, '693575de5f14c556fa67d31b65983b16', 1, '2026-03-30 11:46:19'),
(1208, NULL, '721c7e3e0d2430c50c39dc29e719ea14', 34, '2026-03-30 16:16:22'),
(1209, NULL, '721c7e3e0d2430c50c39dc29e719ea14', 34, '2026-03-30 16:16:22'),
(1210, NULL, 'bd8ddd0e2fe562860a4424733f3bad33', 32, '2026-03-30 18:46:56'),
(1211, NULL, 'bd8ddd0e2fe562860a4424733f3bad33', 32, '2026-03-30 18:46:56'),
(1212, NULL, '27234b387dbdcbc7d507cb2b8431a4ee', 4, '2026-03-30 19:27:11'),
(1213, NULL, '27234b387dbdcbc7d507cb2b8431a4ee', 4, '2026-03-30 19:27:11'),
(1214, NULL, '2e0b022be4171980a472b6f2a11bacb4', 28, '2026-03-30 19:33:09'),
(1215, NULL, '2e0b022be4171980a472b6f2a11bacb4', 28, '2026-03-30 19:33:09'),
(1216, NULL, '513c6a3b363dd5854692888f5e91d57b', 21, '2026-03-30 20:08:58'),
(1217, NULL, '513c6a3b363dd5854692888f5e91d57b', 21, '2026-03-30 20:08:58'),
(1218, NULL, '1ebcdb1c50270559c0a96b49ef0741f7', 29, '2026-03-30 20:50:05'),
(1219, NULL, '1ebcdb1c50270559c0a96b49ef0741f7', 29, '2026-03-30 20:50:05'),
(1220, NULL, '9c51d60fb9799ca76be134661d14fa7b', 20, '2026-03-30 23:06:45'),
(1221, NULL, '9c51d60fb9799ca76be134661d14fa7b', 20, '2026-03-30 23:06:45'),
(1222, NULL, 'bd2dab1aa5e0259f406bc24c6adbe4e9', 2, '2026-03-31 00:13:38'),
(1223, NULL, 'bd2dab1aa5e0259f406bc24c6adbe4e9', 2, '2026-03-31 00:13:38'),
(1224, NULL, 'eec7660ce189e6ef9fb4e786d54a323e', 26, '2026-03-31 00:55:20'),
(1225, NULL, 'eec7660ce189e6ef9fb4e786d54a323e', 26, '2026-03-31 00:55:20'),
(1226, NULL, 'ce0e9d986de17ec52a080759493a2f64', 25, '2026-03-31 02:11:43'),
(1227, NULL, 'ce0e9d986de17ec52a080759493a2f64', 25, '2026-03-31 02:11:43'),
(1228, NULL, '8ffc474c474716beb2ab5c24f7780ac1', 2, '2026-03-31 03:54:38'),
(1229, NULL, '8ffc474c474716beb2ab5c24f7780ac1', 2, '2026-03-31 03:54:38'),
(1230, NULL, '96d62eb16f0794371783eef291710ec4', 1, '2026-04-01 04:41:21'),
(1231, NULL, '96d62eb16f0794371783eef291710ec4', 1, '2026-04-01 04:41:21'),
(1232, NULL, '29c9e425824b19c15db970ef95a7c561', 25, '2026-04-01 04:41:31'),
(1233, NULL, '29c9e425824b19c15db970ef95a7c561', 25, '2026-04-01 04:41:31'),
(1234, NULL, '4de02192b67771f5ffa89c759bc0c166', 20, '2026-04-01 04:41:39'),
(1235, NULL, '4de02192b67771f5ffa89c759bc0c166', 20, '2026-04-01 04:41:39'),
(1236, NULL, '57b2878f22c8d83aad42c0c16a95127c', 32, '2026-04-01 04:41:54'),
(1237, NULL, '57b2878f22c8d83aad42c0c16a95127c', 32, '2026-04-01 04:41:54'),
(1238, NULL, 'c141cf70b93e5d5bf68d86d7cc0ac5fa', 28, '2026-04-01 04:41:55'),
(1239, NULL, 'c141cf70b93e5d5bf68d86d7cc0ac5fa', 28, '2026-04-01 04:41:55'),
(1240, NULL, '12255795767c79286c08c60f7e659f3a', 34, '2026-04-01 04:41:55'),
(1241, NULL, '12255795767c79286c08c60f7e659f3a', 34, '2026-04-01 04:41:55'),
(1242, NULL, 'efbb0ab8386b314ca7fd0750259f1671', 4, '2026-04-01 04:41:59'),
(1243, NULL, 'efbb0ab8386b314ca7fd0750259f1671', 4, '2026-04-01 04:41:59'),
(1244, NULL, '77b13f47a46bfe917df84640e0a4accf', 29, '2026-04-01 04:42:09'),
(1245, NULL, '77b13f47a46bfe917df84640e0a4accf', 29, '2026-04-01 04:42:09'),
(1246, NULL, 'f51eeaceeed8fdfcf9b2d744eabccf51', 26, '2026-04-01 04:42:28'),
(1247, NULL, 'f51eeaceeed8fdfcf9b2d744eabccf51', 26, '2026-04-01 04:42:28'),
(1248, NULL, '7e67cd3d77f4ee7db1c944c5c2909f92', 2, '2026-04-01 04:42:32'),
(1249, NULL, '7e67cd3d77f4ee7db1c944c5c2909f92', 2, '2026-04-01 04:42:32'),
(1250, NULL, '615940df17cf0b10e98e70be34b9cd99', 20, '2026-04-02 09:36:34'),
(1251, NULL, '615940df17cf0b10e98e70be34b9cd99', 20, '2026-04-02 09:36:34'),
(1252, NULL, '203ae0cbd2619d567518c54fe91b25b4', 28, '2026-04-02 18:25:47'),
(1253, NULL, '203ae0cbd2619d567518c54fe91b25b4', 28, '2026-04-02 18:25:47'),
(1254, NULL, '1a67e23e8f88d89efc23eac95c8544c1', 26, '2026-04-02 18:35:38'),
(1255, NULL, '1a67e23e8f88d89efc23eac95c8544c1', 26, '2026-04-02 18:35:38'),
(1256, NULL, 'a565d4413f2a091633e36eb532f5861a', 2, '2026-04-02 21:52:15'),
(1257, NULL, 'a565d4413f2a091633e36eb532f5861a', 2, '2026-04-02 21:52:15'),
(1258, NULL, 'b8afa5904a66401bc10d5bd840f61d22', 34, '2026-04-03 05:02:17'),
(1259, NULL, 'b8afa5904a66401bc10d5bd840f61d22', 34, '2026-04-03 05:02:17'),
(1260, NULL, '40451e52d1aabba69edab90cca8dba0b', 34, '2026-04-03 11:15:52'),
(1261, NULL, '40451e52d1aabba69edab90cca8dba0b', 34, '2026-04-03 11:15:52'),
(1262, NULL, '262014772b6d288c249285f7b9de03a9', 20, '2026-04-03 21:36:42'),
(1263, NULL, '262014772b6d288c249285f7b9de03a9', 20, '2026-04-03 21:36:42'),
(1264, NULL, '684593987baf6fdf2c59a3b1313412ed', 2, '2026-04-03 22:41:17'),
(1265, NULL, '684593987baf6fdf2c59a3b1313412ed', 2, '2026-04-03 22:41:17'),
(1266, NULL, '5cf4d7215b475db356e1e54452d96652', 32, '2026-04-03 23:23:01'),
(1267, NULL, '5cf4d7215b475db356e1e54452d96652', 32, '2026-04-03 23:23:01'),
(1268, NULL, '4847ae4accb9a108c3d8c961a2cb77c0', 29, '2026-04-04 00:15:47'),
(1269, NULL, '4847ae4accb9a108c3d8c961a2cb77c0', 29, '2026-04-04 00:15:47'),
(1270, NULL, '6e99f45e701f7f4e59cfe244ee0bf146', 26, '2026-04-04 01:49:29'),
(1271, NULL, '6e99f45e701f7f4e59cfe244ee0bf146', 26, '2026-04-04 01:49:29'),
(1272, NULL, '18858dc6324ff258c3df6d162ddcb993', 25, '2026-04-04 02:39:57'),
(1273, NULL, '18858dc6324ff258c3df6d162ddcb993', 25, '2026-04-04 02:39:57'),
(1274, NULL, '99d93f0de463f718e9a711f0ebd45aed', 29, '2026-04-04 06:29:30'),
(1275, NULL, '99d93f0de463f718e9a711f0ebd45aed', 29, '2026-04-04 06:29:30'),
(1276, NULL, 'c296a180526d07b55df2120768dc5af1', 2, '2026-04-04 06:56:32'),
(1277, NULL, 'c296a180526d07b55df2120768dc5af1', 2, '2026-04-04 06:56:32'),
(1278, NULL, '6ca7e81dc998060cb842bb048820e56f', 1, '2026-04-04 10:38:19'),
(1279, NULL, '6ca7e81dc998060cb842bb048820e56f', 1, '2026-04-04 10:38:19'),
(1280, NULL, '24682863a46268c24778589aa19c0630', 28, '2026-04-04 13:43:13'),
(1281, NULL, '24682863a46268c24778589aa19c0630', 28, '2026-04-04 13:43:13'),
(1282, NULL, '1103471165ee80c6fb3f82b3a54fd484', 21, '2026-04-04 14:31:37'),
(1283, NULL, '1103471165ee80c6fb3f82b3a54fd484', 21, '2026-04-04 14:31:37'),
(1284, NULL, 'd3f545dc3e9782519163d340db26d5dc', 1, '2026-04-04 23:20:28'),
(1285, NULL, 'd3f545dc3e9782519163d340db26d5dc', 1, '2026-04-04 23:20:28'),
(1286, NULL, '056efc80fb35f8c9c5e7688f3c3abd2e', 29, '2026-04-05 10:58:21'),
(1287, NULL, '056efc80fb35f8c9c5e7688f3c3abd2e', 29, '2026-04-05 10:58:21'),
(1288, NULL, '7c367eb2567790443e639bfb254e4ce4', 34, '2026-04-05 10:58:29'),
(1289, NULL, '7c367eb2567790443e639bfb254e4ce4', 34, '2026-04-05 10:58:29'),
(1290, NULL, 'adb9f05bc9b891a56d534bb89294877d', 28, '2026-04-05 10:58:37'),
(1291, NULL, 'adb9f05bc9b891a56d534bb89294877d', 28, '2026-04-05 10:58:37'),
(1292, NULL, 'b2535e9fc28892835b4dbbf5607dd704', 26, '2026-04-05 10:58:46'),
(1293, NULL, 'b2535e9fc28892835b4dbbf5607dd704', 26, '2026-04-05 10:58:46'),
(1294, NULL, 'c2aee57ac46188b190dc68e1d22c3f3b', 20, '2026-04-05 10:58:51'),
(1295, NULL, 'c2aee57ac46188b190dc68e1d22c3f3b', 20, '2026-04-05 10:58:51'),
(1296, NULL, 'bfea92b60b381a9c08b490b7b738ae2c', 21, '2026-04-05 10:58:58'),
(1297, NULL, 'bfea92b60b381a9c08b490b7b738ae2c', 21, '2026-04-05 10:58:58'),
(1298, NULL, '733bc4ae147890486a80c44772ac126d', 32, '2026-04-05 10:59:10'),
(1299, NULL, '733bc4ae147890486a80c44772ac126d', 32, '2026-04-05 10:59:10'),
(1300, NULL, 'f723a9f326602d3e25ff529039620993', 25, '2026-04-05 10:59:31'),
(1301, NULL, 'f723a9f326602d3e25ff529039620993', 25, '2026-04-05 10:59:31'),
(1302, NULL, '30073655b8629159bf7ae4d251dc67e3', 4, '2026-04-05 10:59:41'),
(1303, NULL, '30073655b8629159bf7ae4d251dc67e3', 4, '2026-04-05 10:59:41'),
(1304, NULL, '42db868004be12d7b05be2e210a56a72', 2, '2026-04-05 10:59:46'),
(1305, NULL, '42db868004be12d7b05be2e210a56a72', 2, '2026-04-05 10:59:46'),
(1306, NULL, 'a4e3fa5566d640c4488c40dbd4367aee', 1, '2026-04-05 10:59:51'),
(1307, NULL, 'a4e3fa5566d640c4488c40dbd4367aee', 1, '2026-04-05 10:59:51'),
(1308, NULL, '7c75b94bcfac2b30d7b5e598e96e5bb5', 4, '2026-04-05 12:57:43'),
(1309, NULL, '7c75b94bcfac2b30d7b5e598e96e5bb5', 4, '2026-04-05 12:57:43'),
(1310, NULL, '15c14776f0f984f7786b0f8492b71e81', 29, '2026-04-05 22:52:05'),
(1311, NULL, '15c14776f0f984f7786b0f8492b71e81', 29, '2026-04-05 22:52:05'),
(1312, NULL, '1a9c23b3ed0ec5beb706d5cd3f8f3cf9', 28, '2026-04-06 01:07:35'),
(1313, NULL, '1a9c23b3ed0ec5beb706d5cd3f8f3cf9', 28, '2026-04-06 01:07:35'),
(1314, NULL, 'ee6f96eb1f4e492250a57ffd6a096b71', 28, '2026-04-06 17:31:50'),
(1315, NULL, 'ee6f96eb1f4e492250a57ffd6a096b71', 28, '2026-04-06 17:31:50'),
(1316, NULL, 'c31a4dba74ee0c98de541c146e361b62', 20, '2026-04-06 22:27:24'),
(1317, NULL, 'c31a4dba74ee0c98de541c146e361b62', 20, '2026-04-06 22:27:24'),
(1318, NULL, '05a4d6774eab2ef65b1e935544ff4717', 32, '2026-04-07 02:20:57'),
(1319, NULL, '05a4d6774eab2ef65b1e935544ff4717', 32, '2026-04-07 02:20:57'),
(1320, NULL, 'bc9ebb4710a13edcda39d1c323bbc79f', 21, '2026-04-07 07:40:52'),
(1321, NULL, 'bc9ebb4710a13edcda39d1c323bbc79f', 21, '2026-04-07 07:40:52'),
(1322, NULL, '2996128ac4511d2d4f55a079c2dd5ea4', 26, '2026-04-07 08:44:24'),
(1323, NULL, '2996128ac4511d2d4f55a079c2dd5ea4', 26, '2026-04-07 08:44:24'),
(1324, NULL, '64b5117dc9d1ebc96d5d2b7d8c9dce48', 25, '2026-04-07 11:13:35'),
(1325, NULL, '64b5117dc9d1ebc96d5d2b7d8c9dce48', 25, '2026-04-07 11:13:35'),
(1326, NULL, '48a9e88f1059ce589affbf8cfa1570e4', 2, '2026-04-07 12:45:52'),
(1327, NULL, '48a9e88f1059ce589affbf8cfa1570e4', 2, '2026-04-07 12:45:52'),
(1328, NULL, 'a029efe4439f3c6b50b569afaea24bdd', 20, '2026-04-07 13:57:37'),
(1329, NULL, 'a029efe4439f3c6b50b569afaea24bdd', 20, '2026-04-07 13:57:37'),
(1330, NULL, 'a614a0d95d68daffe2a2e65297d6bde0', 34, '2026-04-07 16:42:35'),
(1331, NULL, 'a614a0d95d68daffe2a2e65297d6bde0', 34, '2026-04-07 16:42:35'),
(1332, NULL, '3d6b6fc86e822fb6a2134d84bcdfe905', 29, '2026-04-07 23:25:20'),
(1333, NULL, '3d6b6fc86e822fb6a2134d84bcdfe905', 29, '2026-04-07 23:25:20'),
(1334, NULL, '959bf1290b98dbe6f36cb4fce94c750a', 34, '2026-04-08 09:01:31'),
(1335, NULL, '959bf1290b98dbe6f36cb4fce94c750a', 34, '2026-04-08 09:01:31'),
(1336, NULL, 'dd5debda85306de6aa0705a3e02cfd75', 2, '2026-04-08 09:39:02'),
(1337, NULL, 'dd5debda85306de6aa0705a3e02cfd75', 2, '2026-04-08 09:39:02'),
(1338, NULL, '56cd79e3a9684c1ba3db640535332374', 34, '2026-04-08 20:56:33'),
(1339, NULL, '56cd79e3a9684c1ba3db640535332374', 34, '2026-04-08 20:56:33'),
(1340, NULL, '7edb942d7f8f4547b3718a1f871281b6', 20, '2026-04-09 07:58:17'),
(1341, NULL, '7edb942d7f8f4547b3718a1f871281b6', 20, '2026-04-09 07:58:17'),
(1342, NULL, '5c1db8e590047ad9245dd3b837cc6978', 26, '2026-04-13 02:38:26'),
(1343, NULL, '5c1db8e590047ad9245dd3b837cc6978', 26, '2026-04-13 02:38:26'),
(1344, NULL, '12cfd1b18b25852d449ef1c5b49b7de0', 2, '2026-04-13 09:18:58'),
(1345, NULL, '12cfd1b18b25852d449ef1c5b49b7de0', 2, '2026-04-13 09:18:58'),
(1346, NULL, '9002bc4ec9d8e83ad2fe953551e9305f', 34, '2026-04-13 13:00:31'),
(1347, NULL, '9002bc4ec9d8e83ad2fe953551e9305f', 34, '2026-04-13 13:00:31'),
(1348, NULL, 'dae969e68fde502f48915c51e66c8eb1', 2, '2026-04-13 13:06:13'),
(1349, NULL, 'dae969e68fde502f48915c51e66c8eb1', 2, '2026-04-13 13:06:13'),
(1350, NULL, 'fc8bcaab9a395937ab81c600f916757e', 26, '2026-04-13 13:06:50');
INSERT INTO `user_view_history` (`id`, `user_id`, `session_id`, `route_id`, `viewed_at`) VALUES
(1351, NULL, 'fc8bcaab9a395937ab81c600f916757e', 26, '2026-04-13 13:06:50'),
(1352, NULL, 'ddb17a607c6bcc295bced79329b4e067', 29, '2026-04-13 13:20:44'),
(1353, NULL, 'ddb17a607c6bcc295bced79329b4e067', 29, '2026-04-13 13:20:44'),
(1354, NULL, '04599659d7904ecedeb85eea31b122c8', 1, '2026-04-15 03:29:48'),
(1355, NULL, '04599659d7904ecedeb85eea31b122c8', 1, '2026-04-15 03:29:48'),
(1356, NULL, '843c8f338a0869366ee5b2821b37826b', 34, '2026-04-15 17:01:26'),
(1357, NULL, '843c8f338a0869366ee5b2821b37826b', 34, '2026-04-15 17:01:26'),
(1358, NULL, '898beaad375e171baa2ad3fe2bef5234', 26, '2026-04-16 10:12:34'),
(1359, NULL, '898beaad375e171baa2ad3fe2bef5234', 26, '2026-04-16 10:12:34'),
(1360, NULL, 'a0ad9ae1fcfd2c5c5fd9b377031a15db', 25, '2026-04-16 13:51:28'),
(1361, NULL, 'a0ad9ae1fcfd2c5c5fd9b377031a15db', 25, '2026-04-16 13:51:28'),
(1362, NULL, 'eeba0d83fa0fd5f9f57aae19d727a5ff', 29, '2026-04-16 17:11:12'),
(1363, NULL, 'eeba0d83fa0fd5f9f57aae19d727a5ff', 29, '2026-04-16 17:11:12'),
(1364, NULL, '04399d9274e912df0110469e2567c3d0', 20, '2026-04-16 18:15:36'),
(1365, NULL, '04399d9274e912df0110469e2567c3d0', 20, '2026-04-16 18:15:36'),
(1366, NULL, '54b06d1317b8d8c20520b48fcbfef7cc', 20, '2026-04-16 19:21:13'),
(1367, NULL, '54b06d1317b8d8c20520b48fcbfef7cc', 20, '2026-04-16 19:21:13'),
(1368, NULL, '50c4a9c3a60a725c5e26d09a48bcfa1c', 2, '2026-04-17 00:26:21'),
(1369, NULL, '50c4a9c3a60a725c5e26d09a48bcfa1c', 2, '2026-04-17 00:26:21'),
(1370, NULL, '1e7fb048065633cedab027d4b06e8409', 34, '2026-04-17 01:40:40'),
(1371, NULL, '1e7fb048065633cedab027d4b06e8409', 34, '2026-04-17 01:40:40'),
(1372, NULL, 'bc14c2bf4184345b344e83dd0e55ec20', 1, '2026-04-17 02:21:33'),
(1373, NULL, 'bc14c2bf4184345b344e83dd0e55ec20', 1, '2026-04-17 02:21:33'),
(1374, NULL, '99066017d2b3c684921021b3e2609930', 26, '2026-04-17 03:11:16'),
(1375, NULL, '99066017d2b3c684921021b3e2609930', 26, '2026-04-17 03:11:16'),
(1376, NULL, '4c9a94a76236652219da8bb34cfe82e3', 32, '2026-04-17 05:11:36'),
(1377, NULL, '4c9a94a76236652219da8bb34cfe82e3', 32, '2026-04-17 05:11:36'),
(1378, NULL, 'f812835c5c55848902ca07bb22b75250', 4, '2026-04-17 13:51:34'),
(1379, NULL, 'f812835c5c55848902ca07bb22b75250', 4, '2026-04-17 13:51:34'),
(1380, NULL, 'fb2b6e58390100fca4b1a1148c89dbcb', 21, '2026-04-17 15:11:27'),
(1381, NULL, 'fb2b6e58390100fca4b1a1148c89dbcb', 21, '2026-04-17 15:11:27'),
(1382, NULL, 'e27c1a482b64345ba683594d734c9841', 28, '2026-04-17 19:13:13'),
(1383, NULL, 'e27c1a482b64345ba683594d734c9841', 28, '2026-04-17 19:13:13'),
(1384, NULL, 'cf408378ad65a93fffeefc8c638b498c', 26, '2026-04-20 05:44:57'),
(1385, NULL, 'cf408378ad65a93fffeefc8c638b498c', 26, '2026-04-20 05:44:57'),
(1386, NULL, '3021d7b6526903bf13a0ff08552a3930', 34, '2026-04-23 12:52:30'),
(1387, NULL, '3021d7b6526903bf13a0ff08552a3930', 34, '2026-04-23 12:52:30'),
(1388, NULL, 'bf87449a33f3481af2a702ed461061b6', 1, '2026-04-25 07:38:47'),
(1389, NULL, 'bf87449a33f3481af2a702ed461061b6', 1, '2026-04-25 07:38:47'),
(1390, NULL, '6e29a72db3bd7375cf77fb56de7b77cc', 4, '2026-04-25 12:34:21'),
(1391, NULL, '6e29a72db3bd7375cf77fb56de7b77cc', 4, '2026-04-25 12:34:21'),
(1392, NULL, '7471fa1aabe1ab4351fb1ce5c5121b78', 28, '2026-04-26 02:38:23'),
(1393, NULL, '7471fa1aabe1ab4351fb1ce5c5121b78', 28, '2026-04-26 02:38:23'),
(1394, NULL, '00189b04a95d1ea5d20a163334917919', 32, '2026-04-27 04:25:09'),
(1395, NULL, '00189b04a95d1ea5d20a163334917919', 32, '2026-04-27 04:25:09'),
(1396, NULL, 'd88af8b7c2d235d9ec091baf8dd48aae', 25, '2026-04-27 13:51:59'),
(1397, NULL, 'd88af8b7c2d235d9ec091baf8dd48aae', 25, '2026-04-27 13:51:59'),
(1398, NULL, '5368b82a70f742c4346fe04adc4c614d', 2, '2026-04-27 14:29:02'),
(1399, NULL, '5368b82a70f742c4346fe04adc4c614d', 2, '2026-04-27 14:29:02'),
(1400, NULL, 'a86f84b49e0279c4e86942a694d4ef3e', 20, '2026-04-27 21:03:51'),
(1401, NULL, 'a86f84b49e0279c4e86942a694d4ef3e', 20, '2026-04-27 21:03:51'),
(1402, NULL, 'c2d2f1ae4724df65ffe48327e1e943a5', 21, '2026-04-28 14:39:52'),
(1403, NULL, 'c2d2f1ae4724df65ffe48327e1e943a5', 21, '2026-04-28 14:39:52'),
(1404, NULL, '07a4d008a624faff6a64561593d37de8', 34, '2026-04-28 14:39:59'),
(1405, NULL, '07a4d008a624faff6a64561593d37de8', 34, '2026-04-28 14:39:59'),
(1406, NULL, 'b568df70fb0224c265371e54de74c4d0', 29, '2026-04-28 14:41:16'),
(1407, NULL, 'b568df70fb0224c265371e54de74c4d0', 29, '2026-04-28 14:41:16'),
(1408, NULL, '857e9472e5d5e3839e76c3afecdf814e', 28, '2026-04-28 14:41:41'),
(1409, NULL, '857e9472e5d5e3839e76c3afecdf814e', 28, '2026-04-28 14:41:41'),
(1410, NULL, '34638e1db866d30d13bb940cc3d8ef5e', 26, '2026-04-28 14:41:48'),
(1411, NULL, '34638e1db866d30d13bb940cc3d8ef5e', 26, '2026-04-28 14:41:48'),
(1412, NULL, 'cb2ce85c9f0c62f0e4294d8e1f88ad38', 1, '2026-04-28 14:42:08'),
(1413, NULL, 'cb2ce85c9f0c62f0e4294d8e1f88ad38', 1, '2026-04-28 14:42:08'),
(1414, NULL, 'ca7c4e88e57891f969ccac99062b13fe', 2, '2026-04-28 14:43:01'),
(1415, NULL, 'ca7c4e88e57891f969ccac99062b13fe', 2, '2026-04-28 14:43:01'),
(1416, NULL, '473bf0bc1aa39fdb1acefa1c0151185a', 25, '2026-04-30 08:33:37'),
(1417, NULL, '473bf0bc1aa39fdb1acefa1c0151185a', 25, '2026-04-30 08:33:37'),
(1418, NULL, '601ecd70f2d0def5c39e2960d839892b', 20, '2026-04-30 08:39:32'),
(1419, NULL, '601ecd70f2d0def5c39e2960d839892b', 20, '2026-04-30 08:39:32'),
(1420, NULL, '2ee89a45b16a77eb62e11e7795c35d48', 4, '2026-04-30 08:40:27'),
(1421, NULL, '2ee89a45b16a77eb62e11e7795c35d48', 4, '2026-04-30 08:40:27'),
(1422, NULL, '938faec78c9a627eabc8ca1aaabf5228', 29, '2026-04-30 08:41:13'),
(1423, NULL, '938faec78c9a627eabc8ca1aaabf5228', 29, '2026-04-30 08:41:13'),
(1424, NULL, '5d7399523a34543549ad8fa3de44bad1', 34, '2026-04-30 16:36:55'),
(1425, NULL, '5d7399523a34543549ad8fa3de44bad1', 34, '2026-04-30 16:36:55'),
(1426, NULL, '5d7399523a34543549ad8fa3de44bad1', 21, '2026-04-30 16:36:57'),
(1427, NULL, '5d7399523a34543549ad8fa3de44bad1', 21, '2026-04-30 16:36:57'),
(1428, NULL, '5d7399523a34543549ad8fa3de44bad1', 25, '2026-04-30 16:37:02'),
(1429, NULL, '5d7399523a34543549ad8fa3de44bad1', 25, '2026-04-30 16:37:02'),
(1430, NULL, '5d7399523a34543549ad8fa3de44bad1', 29, '2026-04-30 16:37:07'),
(1431, NULL, '5d7399523a34543549ad8fa3de44bad1', 29, '2026-04-30 16:37:07'),
(1432, NULL, '5d7399523a34543549ad8fa3de44bad1', 2, '2026-04-30 16:37:09'),
(1433, NULL, '5d7399523a34543549ad8fa3de44bad1', 2, '2026-04-30 16:37:09'),
(1434, NULL, '5d7399523a34543549ad8fa3de44bad1', 4, '2026-04-30 16:37:10'),
(1435, NULL, '5d7399523a34543549ad8fa3de44bad1', 4, '2026-04-30 16:37:10'),
(1436, NULL, '5d7399523a34543549ad8fa3de44bad1', 1, '2026-04-30 16:37:29'),
(1437, NULL, '5d7399523a34543549ad8fa3de44bad1', 1, '2026-04-30 16:37:29'),
(1438, NULL, '5d7399523a34543549ad8fa3de44bad1', 32, '2026-04-30 16:37:29'),
(1439, NULL, '5d7399523a34543549ad8fa3de44bad1', 32, '2026-04-30 16:37:29'),
(1440, NULL, '5d7399523a34543549ad8fa3de44bad1', 28, '2026-04-30 16:37:30'),
(1441, NULL, '5d7399523a34543549ad8fa3de44bad1', 28, '2026-04-30 16:37:30'),
(1442, NULL, '5d7399523a34543549ad8fa3de44bad1', 26, '2026-04-30 16:37:31'),
(1443, NULL, '5d7399523a34543549ad8fa3de44bad1', 26, '2026-04-30 16:37:31'),
(1444, NULL, '5d7399523a34543549ad8fa3de44bad1', 20, '2026-04-30 16:37:32'),
(1445, NULL, '5d7399523a34543549ad8fa3de44bad1', 20, '2026-04-30 16:37:32'),
(1446, NULL, 'e8103647c08a78f7028031ca90200864', 29, '2026-04-30 16:42:13'),
(1447, NULL, 'e8103647c08a78f7028031ca90200864', 29, '2026-04-30 16:42:13'),
(1448, NULL, '8acbe55b1129e8b30798df9baaf0887c', 2, '2026-04-30 16:52:31'),
(1449, NULL, '8acbe55b1129e8b30798df9baaf0887c', 2, '2026-04-30 16:52:31'),
(1450, NULL, '7da0f15ad2ccd02345408aacc5eecf0c', 2, '2026-04-30 19:55:56'),
(1451, NULL, '7da0f15ad2ccd02345408aacc5eecf0c', 2, '2026-04-30 19:55:56'),
(1452, NULL, '79ab4d9d50a78b05af4e9aed4e5d4ba3', 25, '2026-04-30 23:09:08'),
(1453, NULL, '79ab4d9d50a78b05af4e9aed4e5d4ba3', 25, '2026-04-30 23:09:08'),
(1454, NULL, 'c9f0f77a23b8a6c7f3d5747f6057c034', 4, '2026-04-30 23:19:43'),
(1455, NULL, 'c9f0f77a23b8a6c7f3d5747f6057c034', 4, '2026-04-30 23:19:43'),
(1456, NULL, 'd5d270b833cf4d5147e2496f80fa2d20', 1, '2026-04-30 23:30:21'),
(1457, NULL, 'd5d270b833cf4d5147e2496f80fa2d20', 1, '2026-04-30 23:30:21'),
(1458, NULL, 'be456517803f05d128f3cd85d2caf6c6', 20, '2026-04-30 23:40:46'),
(1459, NULL, 'be456517803f05d128f3cd85d2caf6c6', 20, '2026-04-30 23:40:46'),
(1460, NULL, '9954f3c99d6e46acbfff776cdd4be612', 28, '2026-04-30 23:59:35'),
(1461, NULL, '9954f3c99d6e46acbfff776cdd4be612', 28, '2026-04-30 23:59:35'),
(1462, NULL, 'b11a1e57a08a69fd6f7d7729028274be', 20, '2026-05-01 02:21:48'),
(1463, NULL, 'b11a1e57a08a69fd6f7d7729028274be', 20, '2026-05-01 02:21:48'),
(1464, NULL, 'cc14bb3d3d84d548adce52d91bb2af29', 32, '2026-05-01 02:32:14'),
(1465, NULL, 'cc14bb3d3d84d548adce52d91bb2af29', 32, '2026-05-01 02:32:14'),
(1466, NULL, 'dd6b47f1154a7a828c919442e4a60def', 28, '2026-05-01 02:41:44'),
(1467, NULL, 'dd6b47f1154a7a828c919442e4a60def', 28, '2026-05-01 02:41:44'),
(1468, NULL, 'a684f480ca92c65e879b75832d8c0a45', 25, '2026-05-01 02:51:23'),
(1469, NULL, 'a684f480ca92c65e879b75832d8c0a45', 25, '2026-05-01 02:51:23'),
(1470, NULL, '60748ba6a510759df2adbd3c633d5e7d', 26, '2026-05-01 03:12:17'),
(1471, NULL, '60748ba6a510759df2adbd3c633d5e7d', 26, '2026-05-01 03:12:17'),
(1472, NULL, 'fbdad30aabb8e4e48b6094021ea33256', 21, '2026-05-01 04:01:48'),
(1473, NULL, 'fbdad30aabb8e4e48b6094021ea33256', 21, '2026-05-01 04:01:48'),
(1474, NULL, '73a5eabae0cde3dd910b0568dc7b8ff3', 4, '2026-05-01 09:01:19'),
(1475, NULL, '73a5eabae0cde3dd910b0568dc7b8ff3', 4, '2026-05-01 09:01:19'),
(1476, NULL, 'd58690d9af9b890274ccb356a53dd22c', 29, '2026-05-01 09:10:34'),
(1477, NULL, 'd58690d9af9b890274ccb356a53dd22c', 29, '2026-05-01 09:10:34'),
(1478, NULL, 'c7dfe0af429ef48459309b3a4a9a8c04', 1, '2026-05-01 09:22:06'),
(1479, NULL, 'c7dfe0af429ef48459309b3a4a9a8c04', 1, '2026-05-01 09:22:06'),
(1480, NULL, '2cddcd844b5ace9d1ce1bbba72ba0cfb', 34, '2026-05-01 09:32:49'),
(1481, NULL, '2cddcd844b5ace9d1ce1bbba72ba0cfb', 34, '2026-05-01 09:32:49'),
(1482, NULL, '49481230dfb992acd2fc49d25dad665d', 34, '2026-05-01 12:17:35'),
(1483, NULL, '49481230dfb992acd2fc49d25dad665d', 34, '2026-05-01 12:17:35'),
(1484, NULL, 'f59848d1f71fb9d1db9b4ec6dcbc7c79', 21, '2026-05-01 12:27:07'),
(1485, NULL, 'f59848d1f71fb9d1db9b4ec6dcbc7c79', 21, '2026-05-01 12:27:07'),
(1486, NULL, '8d87f0f84c8730c5991683abd9bab51a', 26, '2026-05-01 12:38:20'),
(1487, NULL, '8d87f0f84c8730c5991683abd9bab51a', 26, '2026-05-01 12:38:20'),
(1488, NULL, '13afc3ef4acc00b866cece50847d3f3a', 32, '2026-05-01 12:47:11'),
(1489, NULL, '13afc3ef4acc00b866cece50847d3f3a', 32, '2026-05-01 12:47:11'),
(1490, NULL, '73b2a4361534894e208ed1dc02de5ea8', 32, '2026-05-02 10:25:31'),
(1491, NULL, '73b2a4361534894e208ed1dc02de5ea8', 32, '2026-05-02 10:25:31'),
(1492, NULL, '6abff6ae866256ef3b6bd07dcbae93ef', 25, '2026-05-03 17:00:46'),
(1493, NULL, '6abff6ae866256ef3b6bd07dcbae93ef', 25, '2026-05-03 17:00:46'),
(1494, NULL, '5e243fda4a48b4c8d87725df162046f7', 26, '2026-05-04 18:03:05'),
(1495, NULL, '5e243fda4a48b4c8d87725df162046f7', 26, '2026-05-04 18:03:05'),
(1496, NULL, '1feea5bba198b9da25ea1a5c324e0d4d', 21, '2026-05-05 20:39:44'),
(1497, NULL, '1feea5bba198b9da25ea1a5c324e0d4d', 21, '2026-05-05 20:39:44'),
(1498, NULL, '35bed6a06eff3d5fa2fb8520d74e028d', 20, '2026-05-05 20:52:06'),
(1499, NULL, '35bed6a06eff3d5fa2fb8520d74e028d', 20, '2026-05-05 20:52:06'),
(1500, NULL, '397b62806afdcb8899d57c7798e6b8ad', 26, '2026-05-05 22:45:45'),
(1501, NULL, '397b62806afdcb8899d57c7798e6b8ad', 26, '2026-05-05 22:45:45'),
(1502, NULL, 'eb5faa2c92cff3ee5abe627aede800c8', 25, '2026-05-06 00:16:47'),
(1503, NULL, 'eb5faa2c92cff3ee5abe627aede800c8', 25, '2026-05-06 00:16:47'),
(1504, NULL, 'e2249a8448a311f9f62f4b9cdc1df3f3', 29, '2026-05-06 04:05:29'),
(1505, NULL, 'e2249a8448a311f9f62f4b9cdc1df3f3', 29, '2026-05-06 04:05:29'),
(1506, NULL, '4a14830b1dcc2dea58e6721fb76ae1c1', 36, '2026-05-07 02:25:25'),
(1507, NULL, '4a14830b1dcc2dea58e6721fb76ae1c1', 36, '2026-05-07 02:25:25'),
(1508, NULL, '9c611b6e20124579f26f50d576c0d298', 2, '2026-05-07 13:05:08'),
(1509, NULL, '9c611b6e20124579f26f50d576c0d298', 2, '2026-05-07 13:05:08'),
(1510, NULL, '9c611b6e20124579f26f50d576c0d298', 21, '2026-05-07 13:05:09'),
(1511, NULL, '9c611b6e20124579f26f50d576c0d298', 21, '2026-05-07 13:05:09'),
(1512, NULL, '9c611b6e20124579f26f50d576c0d298', 26, '2026-05-07 13:05:10'),
(1513, NULL, '9c611b6e20124579f26f50d576c0d298', 26, '2026-05-07 13:05:10'),
(1514, NULL, '9c611b6e20124579f26f50d576c0d298', 28, '2026-05-07 13:05:11'),
(1515, NULL, '9c611b6e20124579f26f50d576c0d298', 28, '2026-05-07 13:05:11'),
(1516, NULL, '9c611b6e20124579f26f50d576c0d298', 29, '2026-05-07 13:05:11'),
(1517, NULL, '9c611b6e20124579f26f50d576c0d298', 29, '2026-05-07 13:05:11'),
(1518, NULL, '9c611b6e20124579f26f50d576c0d298', 34, '2026-05-07 13:05:13'),
(1519, NULL, '9c611b6e20124579f26f50d576c0d298', 34, '2026-05-07 13:05:13'),
(1520, NULL, '9c611b6e20124579f26f50d576c0d298', 1, '2026-05-07 13:05:14'),
(1521, NULL, '9c611b6e20124579f26f50d576c0d298', 1, '2026-05-07 13:05:14'),
(1522, NULL, '9c611b6e20124579f26f50d576c0d298', 4, '2026-05-07 13:05:14'),
(1523, NULL, '9c611b6e20124579f26f50d576c0d298', 4, '2026-05-07 13:05:14'),
(1524, NULL, '9c611b6e20124579f26f50d576c0d298', 20, '2026-05-07 13:05:16'),
(1525, NULL, '9c611b6e20124579f26f50d576c0d298', 20, '2026-05-07 13:05:16'),
(1526, NULL, '9c611b6e20124579f26f50d576c0d298', 25, '2026-05-07 13:05:16'),
(1527, NULL, '9c611b6e20124579f26f50d576c0d298', 25, '2026-05-07 13:05:16'),
(1528, NULL, '9c611b6e20124579f26f50d576c0d298', 32, '2026-05-07 13:05:17'),
(1529, NULL, '9c611b6e20124579f26f50d576c0d298', 32, '2026-05-07 13:05:17'),
(1530, NULL, '9c611b6e20124579f26f50d576c0d298', 2, '2026-05-07 13:05:43'),
(1531, NULL, '9c611b6e20124579f26f50d576c0d298', 2, '2026-05-07 13:05:43'),
(1532, NULL, '9c611b6e20124579f26f50d576c0d298', 21, '2026-05-07 13:05:47'),
(1533, NULL, '9c611b6e20124579f26f50d576c0d298', 21, '2026-05-07 13:05:47'),
(1534, NULL, '9c611b6e20124579f26f50d576c0d298', 26, '2026-05-07 13:05:51'),
(1535, NULL, '9c611b6e20124579f26f50d576c0d298', 26, '2026-05-07 13:05:51'),
(1536, NULL, '9c611b6e20124579f26f50d576c0d298', 28, '2026-05-07 13:05:56'),
(1537, NULL, '9c611b6e20124579f26f50d576c0d298', 28, '2026-05-07 13:05:56'),
(1538, NULL, '9c611b6e20124579f26f50d576c0d298', 29, '2026-05-07 13:05:57'),
(1539, NULL, '9c611b6e20124579f26f50d576c0d298', 29, '2026-05-07 13:05:57'),
(1540, NULL, '9c611b6e20124579f26f50d576c0d298', 34, '2026-05-07 13:05:59'),
(1541, NULL, '9c611b6e20124579f26f50d576c0d298', 34, '2026-05-07 13:05:59'),
(1542, NULL, '9c611b6e20124579f26f50d576c0d298', 1, '2026-05-07 13:06:03'),
(1543, NULL, '9c611b6e20124579f26f50d576c0d298', 1, '2026-05-07 13:06:03'),
(1544, NULL, '9c611b6e20124579f26f50d576c0d298', 4, '2026-05-07 13:06:04'),
(1545, NULL, '9c611b6e20124579f26f50d576c0d298', 4, '2026-05-07 13:06:04'),
(1546, NULL, '9c611b6e20124579f26f50d576c0d298', 20, '2026-05-07 13:06:07'),
(1547, NULL, '9c611b6e20124579f26f50d576c0d298', 20, '2026-05-07 13:06:07'),
(1548, NULL, '9c611b6e20124579f26f50d576c0d298', 25, '2026-05-07 13:06:08'),
(1549, NULL, '9c611b6e20124579f26f50d576c0d298', 25, '2026-05-07 13:06:08'),
(1550, NULL, '9c611b6e20124579f26f50d576c0d298', 32, '2026-05-07 13:06:10'),
(1551, NULL, '9c611b6e20124579f26f50d576c0d298', 32, '2026-05-07 13:06:10');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1552;

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
