-- ============================================================
-- Yeti Routes Content Population — PART 2: Expeditions & Tours
-- Routes: 21,26,34,35,44,46,47,48 (expeditions)
--         24,28,29,33,38,40,42,50,51,52,53,54,55,56,57 (tours)
-- ============================================================
SET NAMES utf8mb4;

-- ============================================================
-- EXPEDITIONS
-- ============================================================

-- Route 21: Everest Three Passes Trek (20 days, extreme)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Cross three legendary high passes: Kongma La (5,535m), Cho La (5,420m), and Renjo La (5,360m)',
    'Stand at Everest Base Camp (5,364m) and summit Kala Patthar (5,545m)',
    'Explore the sacred Gokyo Lakes and summit Gokyo Ri (5,357m) for 8,000m peak panoramas',
    'Complete the ultimate Everest region circuit — the full Khumbu experience',
    'Walk across Ngozumpa Glacier, Nepal\'s largest glacier',
    'Physically demanding adventure for seasoned trekkers seeking the ultimate Himalayan challenge'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Lukla round-trip flight (Kathmandu–Lukla–Kathmandu)',
    'Tea house accommodation throughout the trek',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Sagarmatha National Park entry permit',
    'TIMS card',
    'First aid kit and pulse oximeter',
    'Sleeping bag and down jacket (rental available)',
    'Yeti Routes duffel bag and detailed trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear (boots, waterproof layers)',
    'Personal expenses (hot shower, charging, bottled water)',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Everest Three Passes Trek | 20 Days | Ultimate Khumbu | Yeti Routes',
  meta_description = '20-day Everest Three Passes Trek: Kongma La, Cho La & Renjo La. EBC, Kala Patthar, Gokyo Lakes. The ultimate Khumbu circuit. Yeti Routes Nepal.'
WHERE id = 21;

-- Route 26: Annapurna Circuit Trek (16 days, challenging)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Cross the iconic Thorong La Pass (5,416m) — one of the world\'s highest trekking passes',
    'Visit the sacred Hindu and Buddhist temples of Muktinath (3,760m)',
    'Explore Tilicho Lake (4,919m) — one of the world\'s highest lakes (optional extension)',
    'Experience the dramatic kali Gandaki Gorge, the world\'s deepest gorge',
    'Poon Hill sunrise (3,210m) with panoramic views of Dhaulagiri and Annapurna ranges',
    'Complete circuit of the entire Annapurna massif through diverse landscapes'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Besisahar and Pokhara–Kathmandu transport',
    'Tea house accommodation throughout the trek',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Annapurna Conservation Area permit (ACAP)',
    'TIMS card',
    'First aid kit and pulse oximeter',
    'Sleeping bag (rental available for high sections)',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu and Pokhara',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Annapurna Circuit Trek | 16 Days | Thorong La | Yeti Routes',
  meta_description = '16-day Annapurna Circuit Trek. Thorong La Pass (5,416m), Muktinath, Poon Hill & Kali Gandaki Gorge. The classic Nepal circuit. Yeti Routes.'
WHERE id = 26;

-- Route 34: Manaslu Circuit Trek (16 days, extreme)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Cross the awe-inspiring Larkya La Pass (5,160m) with views of Manaslu\'s north face',
    'Complete circuit of Mt. Manaslu (8,163m) — the 8th highest mountain in the world',
    'Trek through the remote Nubri and Tsum valleys with preserved Tibetan Buddhist culture',
    'Explore ancient Tibetan gompas and mani walls along the trail',
    'Restricted area permit — a less-visited alternative to the Annapurna Circuit',
    'Diverse landscapes from subtropical river valleys to high-altitude glacial terrain'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Machha Khola–Kathmandu transport',
    'Tea house and guesthouse accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Manaslu Restricted Area Permit',
    'Manaslu Conservation Area entry permit',
    'TIMS card',
    'First aid kit and pulse oximeter',
    'Sleeping bag and down jacket (rental available)',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Manaslu Circuit Trek | 16 Days | Restricted Area | Yeti Routes',
  meta_description = '16-day Manaslu Circuit Trek. Larkya La Pass (5,160m), circuit of 8,163m Manaslu, Tibetan culture. Restricted permit, small groups. Yeti Routes Nepal.'
WHERE id = 34;

-- Route 35: Tsum Valley Trek (16 days, moderate)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Discover the hidden Tsum Valley — a restricted sacred Himalayan pilgrimage valley',
    'Visit the remarkable Mu Gompa and Rachen Gompa monasteries perched on high cliffs',
    'Encounter the unique Tsum ethnic group, whose culture blends Nepali and Tibetan traditions',
    'Dramatic views of Ganesh Himal, Boudha Himal, and Himalchuli peaks',
    'Rare wildlife habitat — home to snow leopard, blue sheep, and Himalayan tahr',
    'Walk ancient trade routes used for centuries between Nepal and Tibet'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Machha Khola–Kathmandu transport',
    'Tea house and guesthouse accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Tsum Valley Restricted Area Permit',
    'Manaslu Conservation Area entry permit',
    'TIMS card',
    'First aid kit',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Tsum Valley Trek | 16 Days | Hidden Sacred Valley | Yeti Routes',
  meta_description = '16-day Tsum Valley Trek to Nepal\'s hidden sacred Himalayan valley. Mu Gompa, Rachen Gompa, snow leopard habitat. Restricted permit. Yeti Routes.'
WHERE id = 35;

-- Route 44: Upper Dolpo Trek (25 days, extreme)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Reach the mystical Crystal Mountain (Shey Monastery) at the heart of Upper Dolpo',
    'Visit Phoksundo Lake (3,611m) — Nepal\'s deepest lake with extraordinary turquoise waters',
    'Trek through one of the world\'s most remote and least-visited regions',
    'Witness the ancient Bon religion in practice at isolated high-altitude villages',
    'Walk an authentic Tibetan Plateau ecosystem in Nepal',
    'Encounter rare wildlife including snow leopard, Tibetan wolf, and Himalayan tahr'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Juphal–Nepalgunj–Kathmandu flights',
    'Tent camping and tea house accommodation where available',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide and assistant guide',
    'Cook, kitchen staff, and camping equipment',
    'One porter per two trekkers (max 15 kg luggage)',
    'Upper Dolpo Restricted Area Permit (USD 500 per 10 days)',
    'Shey Phoksundo National Park entry permit',
    'TIMS card',
    'Full camping equipment (tents, sleeping mats, kitchen tent)',
    'First aid kit and pulse oximeter',
    'Yeti Routes duffel bag and detailed trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal sleeping bag and down jacket',
    'Personal trekking gear (boots, waterproof layers, trekking poles)',
    'Personal expenses',
    'Alcoholic beverages',
    'Tips for all staff',
    'Helicopter rescue costs if required'
  ),
  best_season = 'June to September (rain shadow — best during monsoon)',
  meta_title = 'Upper Dolpo Trek | 25 Days | Crystal Mountain | Yeti Routes',
  meta_description = '25-day Upper Dolpo Trek to Crystal Mountain & Shey Monastery. World\'s most remote trek, Phoksundo Lake, Bon villages. Restricted permit. Yeti Routes.'
WHERE id = 44;

-- Route 46: Dhaulagiri Circuit Trek (18 days, extreme)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Circle the entire Dhaulagiri massif (8,167m) — the world\'s 7th highest peak',
    'Cross the challenging French Pass (5,360m) with glacier travel on crampons',
    'Camp in the legendary Hidden Valley — a high-altitude glacial plateau at 4,800m',
    'Cross Dhampus Pass (5,182m) for stunning views of the Annapurna and Dhaulagiri ranges',
    'One of the most technically demanding and physically challenging treks in Nepal',
    'Pristine wilderness with very few trekkers — true Himalayan adventure'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Beni–Kathmandu transport',
    'Tent camping and tea house accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide and assistant guide',
    'Cook and kitchen staff for camping sections',
    'One porter per two trekkers (max 15 kg luggage)',
    'Camping equipment (tents, sleeping mats)',
    'Annapurna Conservation Area permit (ACAP)',
    'TIMS card',
    'Crampons and ice axes for high passes',
    'First aid kit and pulse oximeter',
    'Yeti Routes duffel bag and detailed trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal sleeping bag and down jacket',
    'Personal trekking gear (boots, waterproof layers)',
    'Personal expenses',
    'Alcoholic beverages',
    'Tips for all staff',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Dhaulagiri Circuit Trek | 18 Days | French Pass | Yeti Routes',
  meta_description = '18-day Dhaulagiri Circuit Trek. French Pass (5,360m), Hidden Valley camping, Dhampus Pass. Most challenging Nepal circuit. Expert guides. Yeti Routes.'
WHERE id = 46;

-- Route 47: Makalu Base Camp Trek (20 days, extreme)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Reach Makalu Base Camp (5,700m) below the 5th highest mountain on earth (8,485m)',
    'Trek through Makalu-Barun National Park — one of the world\'s last pristine wilderness areas',
    'Explore the spectacular Barun Valley with its extraordinary biodiversity',
    'Views of Makalu\'s immense pyramid shape from multiple dramatic angles',
    'A true expedition-style trek for committed and experienced mountaineers',
    'Encounter rare flora and fauna including red panda, snow leopard, and diverse Himalayan orchids'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Tumlingtar–Kathmandu flights',
    'Tent camping and tea house accommodation where available',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide and assistant guide',
    'Cook, kitchen staff, and camping equipment',
    'One porter per two trekkers (max 15 kg luggage)',
    'Makalu-Barun National Park entry permit',
    'TIMS card',
    'Full camping equipment (tents, sleeping mats, kitchen tent)',
    'First aid kit and pulse oximeter',
    'Yeti Routes duffel bag and detailed trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal sleeping bag and down jacket',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages',
    'Tips for all staff',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Makalu Base Camp Trek | 20 Days | 5th Highest Peak | Yeti Routes',
  meta_description = '20-day Makalu Base Camp Trek (5,700m) below the world\'s 5th highest peak. Pristine Barun Valley, rare wildlife, expedition-style camping. Yeti Routes.'
WHERE id = 47;

-- Route 48: Kanchenjunga Base Camp Trek (22 days, extreme)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Visit both North Base Camp (5,143m) and South Base Camp (4,750m) of Kanchenjunga — 3rd highest peak on earth',
    'Trek through the remote Taplejung and Ghunsa valleys in far-eastern Nepal',
    'Cross high mountain passes including Sele La (4,290m) on the full circuit',
    'Encounter the traditional Wallungchung Gola — an ancient Tibetan-origin settlement',
    'Total wilderness with virtually no tourist infrastructure — as remote as Nepal gets',
    'Stunning views of Kanchenjunga\'s massive massif from multiple perspectives'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Taplejung–Kathmandu flights',
    'Tent camping and tea house accommodation where available',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide and assistant guide',
    'Cook, kitchen staff, and camping equipment',
    'One porter per two trekkers (max 15 kg luggage)',
    'Kanchenjunga Conservation Area permit',
    'TIMS card',
    'Full camping equipment (tents, sleeping mats, kitchen tent)',
    'First aid kit and pulse oximeter',
    'Yeti Routes duffel bag and detailed trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal sleeping bag and down jacket',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages',
    'Tips for all staff',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Kanchenjunga Base Camp Trek | 22 Days | Dual BC | Yeti Routes',
  meta_description = '22-day Kanchenjunga double base camp trek — North (5,143m) & South BC. World\'s 3rd highest peak, remote far-eastern Nepal. Expert guides. Yeti Routes.'
WHERE id = 48;

-- ============================================================
-- TOURS
-- ============================================================

-- Route 24: Everest View Trek (7 days, easy)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'See Mt. Everest with your own eyes from the famous Everest View Hotel (3,880m) — highest hotel in the world',
    'Trek into the heart of Sherpa country without the physical demands of EBC',
    'Explore vibrant Namche Bazaar — the Everest region\'s bustling hub',
    'Visit Khumjung village and see the legendary Yeti scalp at the monastery',
    'Short scenic Lukla mountain flight, one of the world\'s most thrilling runways',
    'Ideal for trekkers who want authentic Himalayan experience without extreme altitude'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Lukla round-trip flight (Kathmandu–Lukla–Kathmandu)',
    'Tea house accommodation throughout the trek',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Sagarmatha National Park entry permit',
    'TIMS card',
    'First aid kit',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Everest View Trek | 7 Days | Easy | From $850 | Yeti Routes',
  meta_description = '7-day Everest View Trek — see Mt. Everest from Namche Bazaar. Easy altitude, Sherpa culture, Lukla mountain flight. Perfect for beginners. Yeti Routes.'
WHERE id = 24;

-- Route 28: Mardi Himal Trek (7 days, moderate)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Climb to Mardi Himal High Camp (4,500m) with up-close views of Machhapuchhre and Annapurna South',
    'Walk a pristine, less-crowded alternative trail in the heart of the Annapurna region',
    'Diverse forest landscape from rhododendron to bamboo to high alpine meadows',
    'Classic views of the Annapurna range from a completely different perspective',
    'Authentic mountain experience with traditional teahouse culture',
    'Annapurna Conservation Area — rich bird life and Himalayan flora'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Pokhara–Kathmandu transport',
    'Tea house accommodation throughout the trek',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Annapurna Conservation Area permit (ACAP)',
    'TIMS card',
    'First aid kit',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu and Pokhara',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Mardi Himal Trek | 7 Days | Off the Beaten Path | Yeti Routes',
  meta_description = '7-day Mardi Himal Trek (High Camp 4,500m). Less crowded, Machhapuchhre views, rhododendron forests. Perfect moderate trek near Pokhara. Yeti Routes.'
WHERE id = 28;

-- Route 29: Ghorepani Poon Hill Trek (5 days, easy)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Iconic Poon Hill sunrise (3,210m) — one of Nepal\'s most photographed mountain panoramas',
    'Views of Dhaulagiri (8,167m), Annapurna I (8,091m), and Machhapuchhre (6,993m)',
    'Trek through blooming rhododendron forests — spectacular in March and April',
    'Traditional Gurung villages with warm mountain hospitality',
    'Perfect first trek — accessible, well-marked trails, comfortable tea houses',
    'Easy enough for families and first-time trekkers, stunning enough for veterans'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Pokhara–Kathmandu transport',
    'Tea house accommodation throughout the trek',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Annapurna Conservation Area permit (ACAP)',
    'TIMS card',
    'First aid kit',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu and Pokhara',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters'
  ),
  best_season = 'October to April (March-April best for rhododendrons)',
  meta_title = 'Ghorepani Poon Hill Trek | 5 Days | From $450 | Yeti Routes',
  meta_description = '5-day Poon Hill Trek — iconic sunrise over Dhaulagiri & Annapurna. Best beginner trek in Nepal. Rhododendron forests, Gurung villages. Yeti Routes.'
WHERE id = 29;

-- Route 33: Lower Mustang Trek (7 days, easy)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Walk to medieval Kagbeni village — the last settlement before the Upper Mustang restricted zone',
    'Experience the dramatic Kali Gandaki Gorge, the world\'s deepest gorge',
    'Apple orchards and apple brandy in the charming village of Marpha',
    'Tibetan-influenced Mustang culture in Jomsom, Kagbeni, and surrounding villages',
    'Colorful mani walls, ancient monasteries, and traditional flat-roofed houses',
    'No restricted area permit required — accessible Mustang experience'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Pokhara and Pokhara–Jomsom flights',
    'Guesthouse accommodation throughout',
    'All meals during the trek',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Annapurna Conservation Area permit (ACAP)',
    'TIMS card',
    'First aid kit',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu and Pokhara',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters'
  ),
  best_season = 'Year-round (June to September for rain-shadow advantage)',
  meta_title = 'Lower Mustang Trek | 7 Days | Kagbeni & Kali Gandaki | Yeti Routes',
  meta_description = '7-day Lower Mustang Trek to Kagbeni via world\'s deepest gorge. Tibetan culture, apple orchards, ancient monasteries. No restricted permit. Yeti Routes.'
WHERE id = 33;

-- Route 38: Helambu Cultural Trek (7 days, easy)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Experience authentic Sherpa and Tamang culture just hours from Kathmandu',
    'Trek the forested ridgelines of Helambu valley with Himalayan panoramas',
    'Visit ancient Buddhist gompas and traditional villages unchanged for generations',
    'Cross Thadepati Pass (3,640m) with sweeping views of the Langtang range',
    'No domestic flights or long drives required — start the trek from Kathmandu',
    'Rich birdlife and biodiversity in the forests of Shivapuri-Nagarjun National Park'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Sundarijal transport and return from Melamchi',
    'Tea house and homestay accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Shivapuri National Park entry permit',
    'TIMS card',
    'First aid kit',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters'
  ),
  best_season = 'October to May',
  meta_title = 'Helambu Cultural Trek | 7 Days | Near Kathmandu | Yeti Routes',
  meta_description = '7-day Helambu Cultural Trek — Sherpa villages, ancient gompas & Thadepati Pass. No flights needed, starts from Kathmandu. Easy trek. Yeti Routes Nepal.'
WHERE id = 38;

-- Route 40: Ruby Valley Trek (7 days, moderate)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Trek through remote villages where rubies and sapphires are traditionally mined',
    'Spectacular views of Ganesh Himal, Baudha Himal, and the Himalayan range',
    'Dense rhododendron and pine forests — stunning in bloom season',
    'Authentic Tamang and Gurung cultural immersion far from tourist trails',
    'Visit traditional communities with subsistence farming and weaving traditions',
    'One of Nepal\'s best-kept trekking secrets — pristine and uncrowded'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Tarkughat–Kathmandu transport',
    'Tea house and homestay accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Trekking permits',
    'First aid kit',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Ruby Valley Trek | 7 Days | Hidden Nepal | Yeti Routes',
  meta_description = '7-day Ruby Valley Trek through hidden gem-mining villages, Ganesh Himal views & dense forests. Off the beaten path, authentic Nepal. Yeti Routes.'
WHERE id = 40;

-- Route 42: Tamang Heritage Trail (7 days, easy)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Immerse in the authentic Tamang culture — one of Nepal\'s most ancient indigenous traditions',
    'Visit ancient monasteries including Thangpalkot and Lingling Gompa',
    'Spectacular Ganesh Himal, Langtang, and Jugal Himal panoramas along the trail',
    'Traditional heartland villages with warm hospitality and local cuisine',
    'Classic teahouse trek connecting Syabrubesi and the Langtang region',
    'UNESCO-nominated cultural landscape with centuries-old traditions intact'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Syabrubesi–Kathmandu transport',
    'Tea house accommodation throughout the trek',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Langtang National Park entry permit',
    'TIMS card',
    'First aid kit',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Tamang Heritage Trail | 7 Days | Cultural Trek | Yeti Routes',
  meta_description = '7-day Tamang Heritage Trail — ancient monasteries, traditional Tamang villages & Ganesh Himal views. Authentic cultural Nepal trek. Yeti Routes.'
WHERE id = 42;

-- Route 50: Pikey Peak Trek (7 days, easy)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Summit Pikey Peak (4,065m) — Sir Edmund Hillary\'s favorite Everest viewpoint',
    'Rare 360° panorama including Everest, Makalu, Kanchenjunga, Annapurna, and Dhaulagiri',
    'Traditional Rai and Sherpa villages with exceptional local hospitality',
    'Easy to moderate trail — perfect for first-time high-altitude trekkers',
    'Far fewer tourists than the EBC trail despite being in the same Everest region',
    'Accessible by road — no expensive Lukla flight required'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Phaplu–Kathmandu transport',
    'Tea house accommodation throughout the trek',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Trekking permits',
    'TIMS card',
    'First aid kit',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters'
  ),
  best_season = 'October to May',
  meta_title = 'Pikey Peak Trek | 7 Days | Everest Panorama | Yeti Routes',
  meta_description = '7-day Pikey Peak Trek (4,065m) — Sir Edmund Hillary\'s favorite Everest viewpoint. 5-Himalayan panorama. Easy, affordable, uncrowded. Yeti Routes Nepal.'
WHERE id = 50;

-- Route 51: Mohare Danda Trek (5 days, easy)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Stand on Mohare Danda ridge (3,300m) for a stunning panorama of Dhaulagiri, Annapurna, Nilgiri, and Machhapuchhre',
    'Community-based tourism trek supporting local villages in Myagdi district',
    'Traditional Gurung and Magar villages with authentic mountain culture',
    'Dense rhododendron forests — extraordinary in bloom season (March-April)',
    'Shorter and more affordable alternative to Poon Hill with equally spectacular views',
    'Peaceful and uncrowded trails through one of Nepal\'s hidden trekking gems'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Pokhara–Kathmandu transport',
    'Community lodge accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Annapurna Conservation Area permit (ACAP)',
    'TIMS card',
    'First aid kit',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu and Pokhara',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters'
  ),
  best_season = 'October to April',
  meta_title = 'Mohare Danda Trek | 5 Days | Community Trek | Yeti Routes',
  meta_description = '5-day Mohare Danda Trek (3,300m) with Dhaulagiri & Annapurna panorama. Community-based lodge trek, rhododendron forests. Poon Hill alternative. Yeti Routes.'
WHERE id = 51;

-- Route 52: Kathmandu Valley Rim Trek (5 days, easy)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Walk the complete rim of Kathmandu Valley with continuous Himalayan panoramas from Everest to Dhaulagiri',
    'Sunrise views from Nagarkot (2,175m) — one of Nepal\'s most celebrated sunrise spots',
    'Visit the ancient Changu Narayan temple (UNESCO) — Nepal\'s oldest Hindu temple',
    'Explore traditional Newari villages with living culture and ancient architecture',
    'Pass through Namobuddha — an important Buddhist pilgrimage site with stunning monastery',
    'Accessible from Kathmandu without flights or long drives — start and end in the city'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Transport to trailhead (Sundarijal) and from end point (Panauti)',
    'Guesthouse and homestay accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'National park entry permits where applicable',
    'First aid kit',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel insurance (recommended)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear',
    'Personal expenses',
    'Tips for guides and porters'
  ),
  best_season = 'October to May',
  meta_title = 'Kathmandu Valley Rim Trek | 5 Days | No Flights | Yeti Routes',
  meta_description = '5-day Kathmandu Valley Rim Trek — Nagarkot, Dhulikhel, Namobuddha & Changu Narayan. Himalayan panoramas without flying. Great cultural trek. Yeti Routes.'
WHERE id = 52;

-- Route 53: Chepang Hill Trail (5 days, easy)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Discover the unique Chepang indigenous community — one of Nepal\'s most marginalized and fascinating ethnic groups',
    'Trek through sub-tropical forests in the Chitwan foothills — a biodiversity hotspot',
    'Encounter traditional Chepang hunting, gathering, and farming practices',
    'Excellent birdwatching in the diverse forest ecosystems of Dhading district',
    'Community-based tourism that directly benefits local families',
    'Completely off the tourist trail — authentic rural Nepal experience'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Benighat–Kathmandu transport',
    'Homestay and community lodge accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Community entry fees and permits',
    'First aid kit',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel insurance (recommended)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear',
    'Personal expenses',
    'Tips for guides and porters'
  ),
  best_season = 'October to April',
  meta_title = 'Chepang Hill Trail | 5 Days | Indigenous Culture | Yeti Routes',
  meta_description = '5-day Chepang Hill Trail — unique indigenous culture, sub-tropical forests & community-based tourism in Dhading. Off the beaten path Nepal. Yeti Routes.'
WHERE id = 53;

-- Route 54: Kathmandu Valley Tour (3 days, easy)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Visit all seven UNESCO World Heritage Sites of the Kathmandu Valley in one tour',
    'Explore the living Hindu temple of Pashupatinath and the great stupa of Boudhanath',
    'Wander Kathmandu Durbar Square, Patan Durbar Square, and Bhaktapur Durbar Square',
    'Expert guide bringing centuries of history and mythology to life',
    'Traditional Newari arts and crafts — wood carving, bronze casting, thangka painting',
    'Vibrant local markets, ancient bazaars, and Kathmandu\'s extraordinary street life'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers',
    'Hotel accommodation (2 nights, 3-star standard)',
    'Daily breakfast',
    'Private vehicle and driver throughout',
    'Experienced English-speaking cultural guide',
    'All heritage site entrance fees',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel insurance (recommended)',
    'Lunches and dinners (unless specified)',
    'Personal shopping and expenses',
    'Tips for guide and driver'
  ),
  best_season = 'Year-round',
  meta_title = 'Kathmandu Valley Tour | 3 Days | UNESCO Heritage | Yeti Routes',
  meta_description = '3-day Kathmandu Valley Tour covering all UNESCO World Heritage Sites: Pashupatinath, Boudhanath, Swayambhunath, Patan & Bhaktapur. Expert guides. Yeti Routes.'
WHERE id = 54;

-- Route 55: Pokhara Tour (3 days, easy)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Boat on the tranquil Phewa Lake with a perfect reflection of Machhapuchhre (Fishtail) in the water',
    'Sarangkot sunrise viewpoint — iconic panorama of the Annapurna range at dawn',
    'Explore Davis Falls, Gupteshwor Cave, and Bindyabasini Temple',
    'International Mountain Museum — the world\'s only museum dedicated to mountaineering',
    'Visit serene Begnas Lake, away from the Lakeside tourist crowds',
    'World Peace Pagoda with panoramic views of Pokhara and the Himalayas'
  ),
  inclusions = JSON_ARRAY(
    'Airport/hotel transfers in Pokhara',
    'Hotel accommodation (2 nights, 3-star standard)',
    'Daily breakfast',
    'Private vehicle for all sightseeing',
    'Experienced English-speaking guide',
    'Phewa Lake boat hire',
    'Entrance fees for all sites',
    'Kathmandu–Pokhara–Kathmandu transport'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel insurance (recommended)',
    'Lunches and dinners (unless specified)',
    'Optional activities (paragliding, bungee, etc.)',
    'Personal expenses',
    'Tips for guide and driver'
  ),
  best_season = 'Year-round (October to April for clearest mountain views)',
  meta_title = 'Pokhara Tour | 3 Days | Lakeside & Himalayan Views | Yeti Routes',
  meta_description = '3-day Pokhara Tour — Phewa Lake, Sarangkot sunrise, Davis Falls & Annapurna views. Nepal\'s most beautiful city. Private guide. Yeti Routes.'
WHERE id = 55;

-- Route 56: Chitwan Safari Tour (3 days, easy)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Jeep and elephant safari in Chitwan National Park — UNESCO World Heritage Site',
    'Spot the iconic one-horned rhinoceros, Royal Bengal tiger, and gharial crocodile',
    'Canoe ride on the Rapti River for birdwatching and crocodile spotting',
    'Visit the elephant breeding center and learn about conservation programs',
    'Exceptional birdwatching — over 500 species recorded in the park',
    'Traditional Tharu cultural dance program in the evening'
  ),
  inclusions = JSON_ARRAY(
    'Kathmandu–Chitwan–Kathmandu transport',
    'Jungle lodge/resort accommodation (2 nights)',
    'All meals during the safari',
    'All jungle activities (jeep safari, canoe, elephant briefing)',
    'National park entry fees',
    'Experienced naturalist guide',
    'Tharu cultural program',
    'Elephant breeding center visit'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel insurance (recommended)',
    'Alcoholic beverages',
    'Personal expenses',
    'Tips for guide and driver',
    'Elephant ride (optional, extra cost)'
  ),
  best_season = 'October to April',
  meta_title = 'Chitwan Safari Tour | 3 Days | Rhino & Tiger | Yeti Routes',
  meta_description = '3-day Chitwan National Park safari. Spot one-horned rhino, tigers & crocodiles. Jeep safari, canoe ride, Tharu culture. UNESCO heritage. Yeti Routes.'
WHERE id = 56;

-- Route 57: Rara Lake Tour (5 days, moderate)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Fly to remote Jumla and trek to Rara Lake — Nepal\'s largest and most pristine lake (2,990m)',
    'Extraordinary wilderness with crystal-clear water reflecting snow-capped peaks',
    'Rara National Park — home to red deer, yellow-throated marten, and 214 bird species',
    'Explore the unique culture of Far-Western Nepal\'s Mugu district',
    'Mountain flight from Kathmandu to Jumla — one of Nepal\'s most scenic short flights',
    'Complete tranquility and solitude — one of Nepal\'s least-visited major destinations'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Jumla–Kathmandu flights',
    'Guesthouse accommodation throughout',
    'All meals on the tour',
    'Experienced English-speaking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Rara National Park entry permit',
    'TIMS card',
    'First aid kit',
    'Yeti Routes duffel bag and map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear',
    'Personal expenses',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters'
  ),
  best_season = 'October to May',
  meta_title = 'Rara Lake Tour | 5 Days | Nepal\'s Largest Lake | Yeti Routes',
  meta_description = '5-day Rara Lake Tour — fly to Jumla and trek to Nepal\'s most pristine lake (2,990m). Far-western Nepal wilderness, Rara National Park wildlife. Yeti Routes.'
WHERE id = 57;
