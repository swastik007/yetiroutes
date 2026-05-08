-- ==========================================
-- SAMPLE TREK DATA FOR YETI ROUTES
-- ==========================================
-- This file contains realistic Himalayan trek data for design/testing purposes
-- Run this after your database schema is set up

-- First, insert locations (regions)
-- Assuming these are the main trekking regions in Nepal

INSERT INTO `locations` (`id`, `parent_id`, `name`, `slug`, `latitude`, `longitude`, `media_id`) VALUES
(1, NULL, 'Everest Region', 'everest', 27.98805556, 86.92527778, NULL),
(2, NULL, 'Annapurna Region', 'annapurna', 28.59583333, 83.82055556, NULL),
(3, NULL, 'Langtang Region', 'langtang', 28.21000000, 85.55000000, NULL),
(4, NULL, 'Manaslu Region', 'manaslu', 28.54916667, 84.56166667, NULL),
(5, NULL, 'Mustang Region', 'mustang', 29.18000000, 83.98000000, NULL),
(6, NULL, 'Dolpo Region', 'dolpo', 29.00000000, 82.80000000, NULL),
(7, NULL, 'Kanchenjunga Region', 'kanchenjunga', 27.70305556, 88.14694444, NULL),
(8, NULL, 'Makalu Region', 'makalu', 27.88916667, 87.08861111, NULL)
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);

-- Now insert trek routes with comprehensive data
-- ==========================================
-- EVEREST REGION TREKS
-- ==========================================

INSERT INTO `routes` (
    `location_id`, `title`, `slug`, `difficulty`, `duration_days`, `max_altitude_meters`,
    `best_season`, `terrain_type`, `fitness_score_required`, `base_price`, `currency`,
    `short_description`, `full_description`, `highlights`, `inclusions`, `exclusions`,
    `is_featured`, `is_active`, `meta_title`, `meta_description`
) VALUES
-- 1. Everest Base Camp Trek
(1, 'Everest Base Camp Trek', 'everest-base-camp', 'challenging', 14, 5364,
'March to May, September to November', 'mixed', 7, 1250.00, 'USD',
'Stand at the foot of the world\'s highest peak. Experience Sherpa culture, ancient monasteries, and breathtaking Himalayan vistas on this iconic trek.',
'The Everest Base Camp Trek is one of the most iconic trekking adventures in the world. This challenging journey takes you through the heart of the Khumbu region, home to the legendary Sherpa people and the world\'s highest mountain, Mt. Everest (8,848m). Starting from Lukla, you\'ll trek through picturesque Sherpa villages, ancient Buddhist monasteries, and high-altitude landscapes adorned with prayer flags. The trail passes through Namche Bazaar, the vibrant Sherpa capital, and continues to Tengboche Monastery, famous for its stunning panoramic views. As you ascend higher, you\'ll experience the dramatic landscape changes from lush forests to barren, rocky terrain. The highlight is reaching Everest Base Camp at 5,364m and hiking to Kala Patthar (5,545m) for the best views of Everest. This trek offers a perfect blend of natural beauty, cultural immersion, and personal achievement.',
'["Standing at Everest Base Camp (5,364m)", "Sunrise view from Kala Patthar (5,545m)", "Tengboche Monastery with panoramic mountain views", "Sherpa culture and hospitality in Namche Bazaar", "Flight to/from Lukla - world\'s most thrilling airport", "Views of Everest, Lhotse, Nuptse, Ama Dablam", "Sagarmatha National Park - UNESCO World Heritage Site"]',
'["Airport transfers in Kathmandu", "Domestic flights (Kathmandu-Lukla-Kathmandu)", "Teahouse accommodation during trek", "All meals during trek (Breakfast, Lunch, Dinner)", "English-speaking trekking guide", "Porter service (1 porter for 2 trekkers)", "TIMS card and National Park permits", "First aid kit and oxygen meter", "Government taxes and office service charges"]',
'["International airfare", "Nepal visa fee ($50 for 30 days)", "Travel insurance", "Personal expenses and tips", "Meals in Kathmandu", "Hot showers and battery charging on trek", "Emergency evacuation"]',
1, 1, 'Everest Base Camp Trek - 14 Days | Yeti Routes', 'Trek to Everest Base Camp with expert guides. 14-day adventure to the foot of Mt. Everest. Book your Himalayan journey today!'),

-- 2. Everest Three Passes Trek
(1, 'Everest Three Passes Trek', 'everest-three-passes', 'extreme', 20, 5545,
'April to May, September to November', 'snow', 9, 1850.00, 'USD',
'The ultimate Everest challenge. Cross three high passes - Renjo La, Cho La, and Kongma La - while circumnavigating the Everest massif.',
'The Everest Three Passes Trek is the most challenging and rewarding trek in the Everest region. This epic adventure takes you across three high mountain passes: Renjo La (5,360m), Cho La (5,420m), and Kongma La (5,535m), offering unparalleled views of the Himalayan giants. The trek combines the classic Everest Base Camp route with the stunning Gokyo Lakes and provides a complete circuit of the Everest massif. You\'ll experience diverse landscapes from subtropical forests to high-altitude glaciers, visit remote Sherpa villages, and witness some of the most spectacular mountain scenery on Earth. The trek requires excellent physical fitness and previous high-altitude trekking experience. Highlights include the turquoise Gokyo Lakes, the massive Ngozumpa Glacier, and 360-degree mountain panoramas from Gokyo Ri. This is truly the ultimate Everest adventure for experienced trekkers seeking the ultimate challenge.',
'["Cross three spectacular high passes above 5,300m", "Gokyo Lakes - sacred turquoise alpine lakes", "Climb Gokyo Ri (5,357m) for incredible views", "Everest Base Camp and Kala Patthar", "Ngozumpa Glacier - largest glacier in Nepal", "Remote villages rarely visited by tourists", "Views of four 8,000m peaks: Everest, Lhotse, Makalu, Cho Oyu"]',
'["Airport transfers in Kathmandu", "Kathmandu-Lukla-Kathmandu flights", "Teahouse/lodge accommodation", "Three meals daily during trek", "Experienced trekking guide and assistant guide", "Porter service (1:2 ratio)", "All permits (Sagarmatha NP, TIMS)", "Comprehensive first aid kit", "Sleeping bags and down jackets (if needed)", "Government taxes"]',
'["International flights", "Nepal visa", "Travel and rescue insurance (mandatory)", "Meals in Kathmandu", "Personal trekking gear", "Extra expenses on trek", "Tips for staff"]',
1, 1, 'Everest Three Passes Trek - 20 Days | Ultimate Challenge', 'Conquer three high passes in the Everest region. Expert-guided 20-day extreme trek for experienced adventurers.'),

-- 3. Gokyo Lakes Trek
(1, 'Gokyo Lakes Trek', 'gokyo-lakes', 'challenging', 12, 5357,
'March to May, September to November', 'mixed', 7, 1180.00, 'USD',
'Explore the stunning turquoise Gokyo Lakes and climb Gokyo Ri for panoramic views of Everest, Lhotse, Makalu, and Cho Oyu.',
'The Gokyo Lakes Trek is a spectacular alternative to the classic Everest Base Camp trek, offering equally stunning mountain views with fewer crowds. This journey takes you to the pristine Gokyo Valley, home to six sacred turquoise alpine lakes located at the foot of the massive Ngozumpa Glacier. The highlight is climbing Gokyo Ri (5,357m), which offers arguably better panoramic views than Kala Patthar, with four 8,000-meter peaks visible: Everest, Lhotse, Makalu, and Cho Oyu. The trek follows the less-traveled western side of the Khumbu Valley, passing through traditional Sherpa villages and offering unique cultural experiences. The landscape varies from rhododendron forests to high-altitude glacial terrain, providing photographers with endless opportunities. This trek is perfect for those seeking the majesty of Everest region trekking with a more tranquil and off-the-beaten-path experience.',
'["Six stunning turquoise Gokyo Lakes", "Gokyo Ri summit (5,357m) with 360° mountain views", "Ngozumpa Glacier - longest glacier in Himalayas", "Views of Everest, Lhotse, Makalu, Cho Oyu", "Less crowded than EBC route", "Sherpa culture in Khumjung village", "Sacred monastery at Gokyo"]',
'["Kathmandu airport pickup/drop", "Kathmandu-Lukla round-trip flights", "Teahouse accommodation throughout trek", "All meals during trekking (B, L, D)", "Professional English-speaking guide", "Porter service", "Sagarmatha National Park entry", "TIMS permit", "First aid medical kit", "All government taxes"]',
'["International airfare", "Nepal entry visa", "Travel insurance", "Accommodation in Kathmandu", "Lunch and dinner in Kathmandu", "Personal expenses", "Emergency helicopter evacuation", "Tips and gratuities"]',
1, 1, 'Gokyo Lakes Trek - 12 Days | Pristine Alpine Beauty', 'Trek to the sacred Gokyo Lakes in the Everest region. 12 days of stunning turquoise lakes and mountain views.'),

-- ==========================================
-- ANNAPURNA REGION TREKS
-- ==========================================

-- 4. Annapurna Circuit Trek
(2, 'Annapurna Circuit Trek', 'annapurna-circuit', 'challenging', 18, 5416,
'March to May, September to November', 'mixed', 8, 1420.00, 'USD',
'Circle the Annapurna massif through diverse landscapes. Cross Thorong La Pass at 5,416m and experience everything from subtropical forests to high-altitude deserts.',
'The Annapurna Circuit is considered one of the world\'s classic long-distance treks, offering incredible diversity in landscape, culture, and climate. This epic journey circumnavigates the entire Annapurna massif, taking you through lush subtropical forests, terraced farmlands, deep river gorges, Tibetan-influenced villages, and high mountain deserts. The trek\'s highlight is crossing the Thorong La Pass at 5,416m, one of the highest trekking passes in the world. You\'ll experience a dramatic transition from Hindu lowlands to Buddhist highlands, passing through villages with distinct cultures and traditions. The trail offers spectacular views of Annapurna, Dhaulagiri, Manaslu, and countless other peaks. You\'ll visit ancient monasteries, natural hot springs, and the sacred pilgrimage site of Muktinath. The trek ends in the beautiful lakeside town of Pokhara, where you can relax and reflect on your incredible journey.',
'["Cross Thorong La Pass (5,416m) - highest point", "Diverse landscapes: forests, deserts, glaciers", "Tibetan Buddhist culture in Manang", "Sacred Muktinath Temple", "Natural hot springs at Tatopani", "Views of Annapurna, Dhaulagiri, Manaslu ranges", "Traditional Gurung and Thakali villages", "Finish in beautiful Pokhara"]',
'["All ground transportation as per itinerary", "Teahouse/lodge accommodation during trek", "Three meals daily while trekking", "Experienced English-speaking guide", "Porter service (1 porter for 2 clients)", "Annapurna Conservation Area Permit (ACAP)", "TIMS card", "First aid kit with oximeter", "Sleeping bag and down jacket (returnable)", "Government and local taxes"]',
'["International flights to/from Nepal", "Nepal visa fee", "Comprehensive travel insurance", "Accommodation in Kathmandu and Pokhara", "Meals in cities", "Personal trekking equipment", "Hot showers and WiFi charges on trek", "Helicopter rescue insurance", "Tips for guides and porters"]',
1, 1, 'Annapurna Circuit Trek - 18 Days | Classic Nepal Adventure', 'Complete the legendary Annapurna Circuit. 18-day trek through diverse landscapes and cultures. Book your adventure!'),

-- 5. Annapurna Base Camp Trek
(2, 'Annapurna Base Camp Trek', 'annapurna-base-camp', 'moderate', 10, 4130,
'March to May, September to November', 'mixed', 6, 950.00, 'USD',
'Journey into the heart of the Annapurna Sanctuary. Experience 360-degree mountain views from base camp, surrounded by towering peaks.',
'The Annapurna Base Camp Trek takes you into the heart of the Annapurna Sanctuary, a natural amphitheater surrounded by some of the world\'s highest peaks. This moderately challenging trek offers a perfect introduction to high-altitude trekking in Nepal. The trail winds through terraced rice paddies, rhododendron forests, bamboo groves, and traditional Gurung villages before ascending into the spectacular mountain sanctuary. The destination, Annapurna Base Camp (4,130m), sits in a glacial basin surrounded by towering giants: Annapurna I (8,091m), Annapurna South, Hiunchuli, and Machapuchare (Fishtail). The 360-degree mountain panorama from ABC is truly breathtaking, especially at sunrise when the peaks turn golden. The trek also passes through Machapuchare Base Camp and the beautiful natural hot springs at Jhinu Danda, perfect for soothing tired muscles. This is an ideal trek for those with limited time who still want an incredible Himalayan experience.',
'["Annapurna Base Camp - 360° mountain amphitheater", "Machapuchare Base Camp beneath Fishtail peak", "Natural hot springs at Jhinu Danda", "Traditional Gurung culture and villages", "Rhododendron forests (spectacular in spring)", "Close-up views of Annapurna massif", "Machapuchare (Fishtail Mountain) - sacred unclimbed peak", "Moderate difficulty - suitable for most fitness levels"]',
'["Kathmandu-Pokhara-Kathmandu transport", "Pokhara-trek starting point transportation", "Teahouse accommodation during trek", "All meals while trekking (B, L, D)", "Professional trekking guide", "Porter service (2:1 ratio)", "ACAP and TIMS permits", "First aid kit", "Seasonal fruits during trek", "All applicable taxes"]',
'["International airfare", "Nepal visa ($50 USD)", "Travel insurance", "Hotels in Kathmandu/Pokhara", "Meals in cities", "Personal gear and clothing", "Hot shower charges (~$3-5 each)", "Battery charging fees", "Emergency evacuation", "Personal expenses and tips"]',
1, 1, 'Annapurna Base Camp Trek - 10 Days | Sanctuary Experience', 'Trek to Annapurna Base Camp in 10 days. Surrounded by 8,000m peaks in the Annapurna Sanctuary.'),

-- 6. Poon Hill Trek
(2, 'Poon Hill Trek', 'poon-hill', 'easy', 5, 3210,
'Year-round (best: October to December, March to May)', 'forest', 4, 450.00, 'USD',
'Perfect short trek for families and beginners. Watch sunrise over the Annapurna and Dhaulagiri ranges from Poon Hill viewpoint.',
'The Poon Hill Trek is the perfect introduction to trekking in Nepal, ideal for families, beginners, or those with limited time. Despite being a short and relatively easy trek, it offers spectacular panoramic views of the Annapurna and Dhaulagiri mountain ranges. The highlight is the pre-dawn climb to Poon Hill (3,210m) to watch the sunrise paint the snow-capped peaks in shades of pink and gold - a truly unforgettable experience. The trek passes through beautiful rhododendron forests (spectacular in spring when flowers bloom), charming Gurung villages, and terraced farmlands. You\'ll experience authentic Nepali culture, stay in comfortable teahouses, and enjoy delicious local cuisine. The trail is well-maintained and teahouses are plentiful, making this trek accessible even for families with children. This trek proves that you don\'t need weeks or extreme fitness to experience the magic of the Himalayas.',
'["Spectacular sunrise from Poon Hill (3,210m)", "Panoramic views of Annapurna and Dhaulagiri ranges", "Blooming rhododendron forests in spring", "Traditional Gurung and Magar villages", "Suitable for families and beginners", "Well-established trail with good facilities", "Cultural experiences in local communities", "Can be done year-round"]',
'["Kathmandu to Pokhara tourist bus", "Pokhara-Nayapul-Pokhara jeep transfer", "Teahouse accommodation", "All meals during trek", "English-speaking guide", "Porter service if needed", "ACAP permit", "TIMS card", "Basic first aid kit", "Government taxes"]',
'["International flights", "Nepal visa", "Travel insurance", "Accommodation in Kathmandu/Pokhara", "Meals in cities", "Personal trekking gear", "Hot shower charges", "WiFi charges", "Personal expenses", "Tips"]',
1, 1, 'Poon Hill Trek - 5 Days | Perfect Family Trek', 'Short and easy Poon Hill trek with spectacular sunrise views. Ideal for beginners and families.'),

-- ==========================================
-- LANGTANG REGION TREKS
-- ==========================================

-- 7. Langtang Valley Trek
(3, 'Langtang Valley Trek', 'langtang-valley', 'moderate', 10, 4984,
'March to May, September to November', 'forest', 6, 850.00, 'USD',
'Explore the beautiful Langtang valley, closest Himalayan region to Kathmandu. Experience authentic Tamang culture and pristine mountain scenery.',
'The Langtang Valley Trek is a stunning journey through one of Nepal\'s most beautiful valleys, located just north of Kathmandu. Despite being easily accessible, this region remains relatively uncrowded compared to Everest and Annapurna. The trek takes you through Langtang National Park, home to diverse flora and fauna including the endangered red panda. You\'ll walk through dense bamboo and rhododendron forests, cross suspension bridges, and pass through traditional Tamang villages where Buddhist culture thrives. The Tamang people, with their Tibetan heritage, offer warm hospitality and fascinating cultural insights. The trail gradually ascends the Langtang Valley, offering increasingly spectacular views of Langtang Lirung (7,227m), Ganesh Himal, and other peaks. The trek reaches Kyanjin Gompa (3,870m), an ancient Buddhist monastery, where you can climb Kyanjin Ri (4,773m) or Tserko Ri (4,984m) for panoramic mountain views. This trek is perfect for those seeking authentic Himalayan experience close to Kathmandu.',
'["Langtang National Park - diverse wildlife", "Traditional Tamang culture and villages", "Ancient Kyanjin Gompa monastery", "Kyanjin Ri (4,773m) or Tserko Ri (4,984m) viewpoints", "Close to Kathmandu - easy access", "Less crowded than Everest/Annapurna", "Langtang Lirung and Ganesh Himal views", "Optional yak cheese factory visit"]',
'["Kathmandu-Syabrubesi-Kathmandu bus transport", "Teahouse accommodation", "Three meals daily during trek", "Experienced trekking guide", "Porter service (1:2 ratio)", "Langtang National Park entry permit", "TIMS card", "First aid kit", "Seasonal fresh fruits", "All government taxes"]',
'["International airfare", "Nepal visa fee", "Travel insurance (compulsory)", "Kathmandu accommodation", "Meals in Kathmandu", "Personal trekking equipment", "Hot showers and charging fees", "Emergency helicopter rescue", "Alcoholic beverages", "Tips for guide and porter"]',
1, 1, 'Langtang Valley Trek - 10 Days | Close to Kathmandu', 'Trek the beautiful Langtang Valley near Kathmandu. 10 days of Tamang culture and mountain views.'),

-- 8. Langtang Gosaikunda Trek
(3, 'Langtang Gosaikunda Trek', 'langtang-gosaikunda', 'challenging', 14, 4984,
'April to May, September to November', 'mixed', 7, 1050.00, 'USD',
'Combine Langtang Valley with the sacred Gosaikunda Lakes. Cross the high Laurebina Pass and experience both nature and spirituality.',
'The Langtang Gosaikunda Trek combines two of the most beautiful destinations in the Langtang region: the stunning Langtang Valley and the sacred Gosaikunda Lakes. This diverse trek offers incredible mountain scenery, rich Buddhist and Hindu culture, and spiritual significance. The journey begins through Langtang National Park, ascending the Langtang Valley to Kyanjin Gompa, where you can explore glaciers and climb viewpoints. The trek then crosses the challenging Laurebina La Pass (4,610m) to reach the Gosaikunda Lakes, a cluster of sacred alpine lakes that hold deep religious significance for both Hindus and Buddhists. During the full moon festival of Janai Purnima (August), thousands of pilgrims visit these holy waters. The lakes, sitting at 4,380m, are surrounded by snow-capped peaks and offer stunning reflections in their crystal-clear waters. The trek descends through the Helambu region, passing through more traditional villages before returning to Kathmandu. This trek perfectly combines natural beauty, cultural richness, and spiritual atmosphere.',
'["Langtang Valley and Kyanjin Gompa", "Sacred Gosaikunda Lakes - Hindu pilgrimage site", "Cross Laurebina La Pass (4,610m)", "Diverse landscapes: forests, lakes, glaciers", "Tamang and Sherpa culture", "Langtang National Park wildlife", "Mountain views: Langtang, Ganesh Himal, Manaslu", "Spiritual and cultural significance"]',
'["Kathmandu-Syabrubesi transportation", "Dhunche-Kathmandu bus", "Teahouse/lodge accommodation", "All meals while trekking", "Professional trekking guide", "Porter service", "Langtang NP and TIMS permits", "First aid kit with altitude medicine", "Government taxes and charges"]',
'["International flights", "Nepal visa", "Travel and rescue insurance", "Kathmandu hotels", "City meals", "Personal gear", "Extra costs on trek", "Helicopter evacuation", "Tips and gratuities"]',
1, 1, 'Langtang Gosaikunda Trek - 14 Days | Lakes & Mountains', 'Trek Langtang Valley and sacred Gosaikunda Lakes. 14-day spiritual and natural adventure.'),

-- ==========================================
-- MANASLU REGION TREKS
-- ==========================================

-- 9. Manaslu Circuit Trek
(4, 'Manaslu Circuit Trek', 'manaslu-circuit', 'challenging', 16, 5160,
'March to May, September to November', 'mixed', 8, 1380.00, 'USD',
'Off-the-beaten-path adventure around Mt. Manaslu (8,156m). Cross Larkya La Pass and experience pristine wilderness and authentic culture.',
'The Manaslu Circuit Trek is one of Nepal\'s most spectacular yet less-traveled routes, circumnavigating Mt. Manaslu (8,156m), the world\'s eighth-highest mountain. This restricted area trek offers an authentic Himalayan experience with fewer tourists than Everest or Annapurna. The journey takes you through diverse landscapes from subtropical lowlands to high-altitude glacial terrain, crossing the challenging Larkya La Pass (5,160m). You\'ll experience a rich blend of Hindu and Tibetan Buddhist cultures, visiting ancient monasteries and traditional villages where life has remained unchanged for centuries. The trek passes through the Manaslu Conservation Area, home to rare wildlife including snow leopards, Himalayan black bears, and red pandas. The trail offers spectacular close-up views of Manaslu, Ganesh Himal, Himchuli, and Annapurna ranges. Being a restricted area, you\'ll trek with a registered guide and need special permits, ensuring a more controlled and sustainable trekking experience. This is the perfect trek for adventurers seeking solitude and untouched beauty.',
'["Mt. Manaslu (8,156m) - 8th highest peak", "Larkya La Pass (5,160m) crossing", "Restricted area - fewer trekkers", "Tibetan Buddhist culture and monasteries", "Manaslu Conservation Area wildlife", "Diverse ecosystems and landscapes", "Traditional villages: Samagaon, Samdo", "Views of Manaslu, Ganesh Himal, Annapurna"]',
'["Kathmandu-Soti Khola-Kathmandu transport", "Teahouse accommodation throughout", "Three meals daily (B, L, D)", "English-speaking trekking guide", "Porter service (1:2 ratio)", "Manaslu Restricted Area Permit", "Manaslu Conservation Area Permit", "TIMS card", "Comprehensive first aid kit", "All government and local taxes"]',
'["International airfare", "Nepal visa fee ($50)", "Travel and medical insurance (mandatory)", "Kathmandu accommodation and meals", "Personal trekking equipment", "Hot showers and WiFi on trek", "Alcoholic drinks and snacks", "Emergency helicopter evacuation", "Tips for trekking crew"]',
1, 1, 'Manaslu Circuit Trek - 16 Days | Off the Beaten Path', 'Circle Mt. Manaslu on this pristine 16-day circuit. Remote trekking with authentic culture.'),

-- 10. Tsum Valley Trek
(4, 'Tsum Valley Trek', 'tsum-valley', 'moderate', 14, 3700,
'March to May, September to November', 'mixed', 6, 1150.00, 'USD',
'Discover the hidden Himalayan valley with rich Tibetan Buddhist culture. Visit ancient monasteries and experience untouched traditions.',
'The Tsum Valley Trek takes you into one of Nepal\'s most remote and sacred Himalayan valleys, hidden behind the northern ridges of the Manaslu range. Recently opened to tourists, this restricted area has preserved its authentic Tibetan Buddhist culture and ancient traditions remarkably intact. The valley, known as the "Hidden Valley of Happiness," is considered a beyul (sacred Buddhist valley) by Tibetans. The trek follows the Budhi Gandaki River before branching into the isolated Tsum Valley, where you\'ll find ancient monasteries, mani walls, chortens, and prayer wheels at every turn. The local Tsumba people maintain their polyandrous culture and deep spiritual practices. You\'ll visit the impressive Mu Gompa and Rachen Gompa monasteries, interact with Buddhist nuns and monks, and witness religious ceremonies. The valley offers stunning views of Ganesh Himal, Sringi Himal, and Boudha Himal. This trek is perfect for those seeking spiritual enrichment, cultural immersion, and off-the-beaten-path adventure.',
'["Hidden sacred valley - beyul", "Rich Tibetan Buddhist culture", "Ancient monasteries: Mu Gompa, Rachen Gompa", "Polyandrous Tsumba culture", "Restricted area - pristine and unspoiled", "Ganesh Himal and Sringi Himal views", "Spiritual ceremonies and practices", "Minimal tourist presence"]',
'["Kathmandu-Arughat-Kathmandu jeep transfer", "Teahouse/homestay accommodation", "All meals during trek", "Professional guide with area knowledge", "Porter service", "Tsum Valley Restricted Permit", "Manaslu Conservation Area fee", "TIMS permit", "First aid supplies", "Government taxes"]',
'["International flights", "Nepal visa", "Comprehensive insurance", "Kathmandu hotels", "Meals in Kathmandu", "Personal gear", "Monastery donation (optional)", "Hot showers and charging", "Emergency rescue", "Tips"]',
0, 1, 'Tsum Valley Trek - 14 Days | Hidden Sacred Valley', 'Explore the hidden Tsum Valley. 14 days of Tibetan Buddhist culture and pristine landscapes.'),

-- ==========================================
-- MUSTANG REGION TREKS
-- ==========================================

-- 11. Upper Mustang Trek
(5, 'Upper Mustang Trek', 'upper-mustang', 'moderate', 14, 3840,
'March to November (best during monsoon)', 'desert', 6, 1650.00, 'USD',
'Journey to the forbidden kingdom of Lo Manthang. Experience Tibetan culture, ancient caves, and stark desert landscapes.',
'The Upper Mustang Trek takes you into the "Forbidden Kingdom," a restricted area that remained closed to foreigners until 1992. This unique trek offers a glimpse into medieval Tibetan culture preserved in isolation. The landscape is dramatically different from typical Nepal treks - a high-altitude desert with barren, multi-colored cliffs, deep canyons, and eroded formations resembling the American Southwest. The trek reaches the walled city of Lo Manthang (3,840m), the capital of the former Kingdom of Lo, where the Raja (King) still resides in his palace. You\'ll explore ancient monasteries with precious Buddhist murals and manuscripts, mysterious sky caves carved into cliffs, and chortens adorned with prayer wheels. The best time is during monsoon (June-September) when the Himalayan rain shadow keeps Mustang dry while the rest of Nepal experiences monsoon. The local people practice Tibetan Buddhism and maintain their unique Loba culture. This trek is perfect for culture enthusiasts and those seeking something completely different.',
'["Walled city of Lo Manthang - ancient capital", "Tibetan Buddhist culture preserved for centuries", "Unique desert landscape and colorful cliffs", "Ancient sky caves and cliff monasteries", "Trekking during monsoon season possible", "Meet the Raja (King) of Mustang", "Restricted area permit - limited tourists", "Dramatic landscapes unlike anywhere in Nepal"]',
'["Kathmandu-Pokhara flights", "Pokhara-Jomsom-Pokhara flights", "Teahouse/lodge accommodation", "Three meals daily while trekking", "Expert cultural guide", "Porter service", "Upper Mustang Restricted Area Permit ($500)", "Annapurna Conservation Area fee", "TIMS card", "First aid kit", "All local taxes"]',
'["International airfare", "Nepal visa", "Travel insurance", "Accommodation in Kathmandu/Pokhara", "City meals", "Personal equipment", "Hot showers and WiFi", "Monastery entrance fees", "Horse rental (optional)", "Emergency evacuation", "Tips"]',
1, 1, 'Upper Mustang Trek - 14 Days | Forbidden Kingdom', 'Trek to the forbidden kingdom of Upper Mustang. 14 days of Tibetan culture and desert landscapes.'),

-- 12. Nar Phu Valley Trek
(2, 'Nar Phu Valley Trek', 'nar-phu-valley', 'challenging', 15, 5416,
'March to May, September to November', 'mixed', 8, 1480.00, 'USD',
'Remote restricted area trek combining Annapurna Circuit with hidden valleys of Nar and Phu. Experience authentic Tibetan culture.',
'The Nar Phu Valley Trek is one of Nepal\'s most remote and culturally rich adventures, taking you into two hidden valleys that remained forbidden to foreigners until 2002. This restricted area trek branches off the Annapurna Circuit route, leading you into pristine wilderness and medieval Tibetan villages. The narrow gorges of the Phu Khola lead to the ancient villages of Phu and Nar, where life has remained virtually unchanged for centuries. Stone houses stack up hillsides like Buddhist fortresses, ancient monasteries cling to cliffsides, and the local people practice pure Tibetan Buddhism and maintain their unique dialects. The trek crosses the high Kang La Pass (5,322m) before rejoining the Annapurna Circuit to cross Thorong La Pass (5,416m). You\'ll witness spectacular mountain scenery including views of Pisang Peak, Annapurna II, Gangapurna, and Tilicho Peak. The combination of remote culture, challenging terrain, and spectacular landscapes makes this one of the most rewarding treks in Nepal.',
'["Hidden restricted valleys of Nar and Phu", "Medieval Tibetan villages and culture", "Ancient Tashi Lhakhang Monastery", "Kang La Pass (5,322m) crossing", "Thorong La Pass (5,416m) - optional", "Dramatic gorges and rock formations", "Very few trekkers - pristine experience", "Combine with Annapurna Circuit"]',
'["All ground transportation", "Teahouse accommodation", "Three meals daily on trek", "Experienced trekking guide", "Porter service (1:2)", "Nar Phu Restricted Area Permit", "Annapurna Conservation Area Permit", "TIMS card", "First aid kit and oximeter", "Government taxes"]',
'["International flights", "Nepal visa", "Comprehensive insurance", "Kathmandu/Pokhara hotels", "City meals", "Personal trekking gear", "Extra expenses on trek", "Helicopter rescue insurance", "Tips for crew"]',
0, 1, 'Nar Phu Valley Trek - 15 Days | Remote Hidden Valleys', 'Explore the remote Nar and Phu valleys. 15-day restricted area adventure with Tibetan culture.'),

-- ==========================================
-- ADDITIONAL DIVERSE TREKS
-- ==========================================

-- 13. Khopra Ridge Trek
(2, 'Khopra Ridge Trek', 'khopra-ridge', 'moderate', 8, 3660,
'March to May, September to November', 'forest', 6, 780.00, 'USD',
'Off-the-beaten-path trek with spectacular Annapurna views. Visit the sacred Khayer Lake and enjoy ridge-top panoramas.',
'The Khopra Ridge Trek is a relatively new and uncrowded route in the Annapurna region, offering spectacular mountain views without the crowds. This community-based trek stays on high ridges, providing panoramic vistas of Dhaulagiri, Annapurna South, Nilgiri, and the unmistakable Machapuchare. The trail passes through traditional Magar and Gurung villages where you\'ll experience authentic local hospitality. A highlight is the challenging but rewarding side trip to the sacred Khayer Lake (4,660m), a pilgrimage site for Hindus and Buddhists. The trek uses community lodges, ensuring your tourism dollars directly benefit local villages. The ridge walking provides constantly changing perspectives of the mountains, and in spring, the rhododendron forests burst into vibrant colors. This trek combines the best of Annapurna scenery with cultural authenticity and sustainable tourism practices.',
'["Spectacular ridge-top panoramas", "Khayer Lake pilgrimage (4,660m)", "Community-based sustainable trekking", "Close-up views of Dhaulagiri and Annapurna", "Traditional Magar and Gurung culture", "Less crowded alternative to popular routes", "Beautiful rhododendron forests", "Support local communities directly"]',
'["Kathmandu-Pokhara-Kathmandu transport", "Pokhara-trek start point transfer", "Community lodge accommodation", "All meals during trek", "English-speaking guide", "Porter service", "ACAP permit", "TIMS card", "First aid supplies", "Government taxes"]',
'["International flights", "Nepal visa", "Travel insurance", "Hotels in Kathmandu/Pokhara", "Meals in cities", "Personal gear", "Hot showers", "Khayer Lake entry fee (~$20)", "Emergency rescue", "Tips"]',
0, 1, 'Khopra Ridge Trek - 8 Days | Community Trek', 'Trek Khopra Ridge with spectacular Annapurna views. 8-day community-based sustainable adventure.'),

-- 14. Mardi Himal Trek
(2, 'Mardi Himal Trek', 'mardi-himal', 'moderate', 7, 4500,
'March to May, September to November', 'forest', 5, 650.00, 'USD',
'Short and sweet trek below Mardi Himal and Machapuchare. Perfect for those with limited time seeking spectacular mountain views.',
'The Mardi Himal Trek is a relatively new route that has quickly become popular for its stunning mountain views and accessibility. This short trek takes you below the sacred Machapuchare (Fishtail Mountain) and Mardi Himal, offering close-up views that rival longer treks. The trail ascends through beautiful rhododendron and oak forests, gradually emerging above the treeline to reach the high camp at 4,500m. From here, you\'re surrounded by the Annapurna massif in an intimate amphitheater setting. The trek is perfect for those with limited time or as a warm-up for longer expeditions. Despite its growing popularity, the trail remains less crowded than the Annapurna Base Camp route. The views from the ridge are phenomenal, and the changing landscapes from lush forests to alpine terrain make every day interesting. The trek can be completed in just 5-7 days, making it ideal for travelers with tight schedules who still want an authentic Himalayan trekking experience.',
'["Close-up views of Machapuchare (Fishtail)", "Mardi Himal Base Camp (4,500m)", "Perfect for limited time travelers", "Beautiful rhododendron forests", "Less crowded than ABC", "Spectacular mountain amphitheater", "Suitable for moderate fitness levels", "Can be combined with ABC trek"]',
'["Pokhara-Kande-Pokhara transport", "Teahouse accommodation", "All meals during trek (B, L, D)", "Professional guide", "Porter service", "ACAP and TIMS permits", "First aid kit", "Government taxes"]',
'["International flights", "Nepal visa", "Travel insurance", "Accommodation in Pokhara", "Meals in Pokhara", "Personal equipment", "Hot showers and charging", "Emergency rescue", "Tips"]',
0, 1, 'Mardi Himal Trek - 7 Days | Short Mountain Trek', 'Trek to Mardi Himal Base Camp in just 7 days. Perfect short trek with spectacular views.'),

-- 15. Everest View Trek
(1, 'Everest View Trek', 'everest-view', 'easy', 7, 3880,
'Year-round (best: March to May, September to November)', 'mixed', 4, 850.00, 'USD',
'Short Everest region trek perfect for families and beginners. Experience Sherpa culture and mountain views without extreme altitude.',
'The Everest View Trek is designed for those who want to experience the magic of the Everest region without the commitment or difficulty of longer treks. This shorter route takes you to Namche Bazaar, the vibrant Sherpa capital, and the famous Everest View Hotel, which offers stunning panoramas of Everest, Lhotse, and Ama Dablam. You\'ll experience Sherpa culture, visit Buddhist monasteries, and enjoy spectacular mountain views while staying at comfortable moderate altitudes. The trek includes visits to Khumjung village and the Hillary School, learning about Sir Edmund Hillary\'s contributions to the region. This is an ideal trek for families, older travelers, or anyone wanting a taste of Everest without the extreme altitude and duration. The well-established trail and plentiful teahouses make it comfortable and accessible. Despite its shorter length, you\'ll gain incredible cultural insights and enjoy some of the world\'s most spectacular mountain scenery.',
'["Views of Mt. Everest, Lhotse, Ama Dablam", "Everest View Hotel - highest hotel in world", "Namche Bazaar - Sherpa capital", "Khumjung village and Hillary School", "Sherpa culture and Buddhist monasteries", "Suitable for families and seniors", "Shorter duration with great views", "Well-established comfortable route"]',
'["Kathmandu-Lukla-Kathmandu flights", "Airport transfers in Kathmandu", "Teahouse accommodation", "All meals during trek", "English-speaking guide", "Porter service (if needed)", "Sagarmatha National Park permit", "TIMS card", "First aid kit", "Government taxes"]',
'["International airfare", "Nepal visa fee", "Travel insurance", "Kathmandu accommodation", "Meals in Kathmandu", "Personal trekking gear", "Hot showers and WiFi", "Personal expenses", "Emergency evacuation", "Tips"]',
0, 1, 'Everest View Trek - 7 Days | Family Friendly', 'Short Everest trek perfect for families. 7 days of culture and mountain views at moderate altitude.');

-- ==========================================
-- END OF SAMPLE TREK DATA
-- ==========================================
