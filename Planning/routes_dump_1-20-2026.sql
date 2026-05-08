-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2026 at 01:43 PM
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

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `routes_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `routes_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media_library` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
