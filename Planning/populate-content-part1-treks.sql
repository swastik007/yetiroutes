-- ============================================================
-- Yeti Routes Content Population — PART 1: Treks
-- highlights, inclusions, exclusions, best_season, meta
-- Routes: 20,22,23,25,27,30,31,32,36,37,39,41,43,45,49
-- ============================================================
SET NAMES utf8mb4;

-- Route 20: Everest Base Camp Trek (14 days, challenging)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Stand at Everest Base Camp (5,364m) — the foot of the world\'s highest mountain',
    'Sunrise from Kala Patthar (5,545m) with the closest Everest panorama on earth',
    'Explore the Sherpa capital of Namche Bazaar and its bustling Saturday market',
    'Visit the sacred Tengboche Monastery with Ama Dablam as backdrop',
    'Trek through Sagarmatha National Park — a UNESCO World Heritage Site',
    'Sweeping views of Lhotse, Nuptse, Pumori, and the Khumbu Glacier'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Lukla round-trip flight (Kathmandu–Lukla–Kathmandu)',
    'Tea house accommodation throughout the trek',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Sagarmatha National Park entry permit',
    'TIMS card (Trekkers Information Management System)',
    'First aid kit and pulse oximeter',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee (USD 30 / USD 50)',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear (boots, sleeping bag, down jacket)',
    'Personal expenses (hot shower, charging, laundry, bottled water)',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters (customary)',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Everest Base Camp Trek | 14 Days | From $1,299 | Yeti Routes',
  meta_description = 'Classic 14-day Everest Base Camp Trek (5,364m). Kala Patthar sunrise, Namche Bazaar & Tengboche. Expert guides, small groups. Book with Yeti Routes.'
WHERE id = 20;

-- Route 22: Gokyo Lakes & Gokyo Ri Trek (12 days, moderate)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Summit Gokyo Ri (5,357m) for panoramic views of four 8,000m peaks: Everest, Lhotse, Makalu, Cho Oyu',
    'Explore the sacred turquoise Gokyo Lakes — the world\'s highest freshwater lake system',
    'Walk across Ngozumpa Glacier, the largest glacier in Nepal',
    'Less crowded and more serene than the Everest Base Camp trail',
    'Spot migratory birds and Himalayan wildlife in the upper Gokyo Valley',
    'Optional extension via Cho La Pass (5,420m) to Everest Base Camp'
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
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear',
    'Personal expenses (hot shower, charging, bottled water)',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Gokyo Lakes & Gokyo Ri Trek | 12 Days | Yeti Routes',
  meta_description = 'Trek to the sacred Gokyo Lakes and summit Gokyo Ri (5,357m) for views of four 8,000m peaks. 12 days, small groups, expert guides.'
WHERE id = 22;

-- Route 23: Ama Dablam Base Camp Trek (12 days, moderate)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Approach the iconic Ama Dablam (6,812m) — widely regarded as the most beautiful mountain in the Himalayas',
    'Up-close views of the dramatic south-west face and hanging glacier of Ama Dablam',
    'Trek through Sagarmatha National Park, a UNESCO World Heritage Site',
    'Visit the ancient Tengboche Monastery set against a spectacular mountain backdrop',
    'Immersive Sherpa culture in Namche Bazaar and surrounding villages',
    'Rarely crowded trail — a hidden gem of the Khumbu region'
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
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu',
    'Personal trekking gear',
    'Personal expenses (hot shower, charging, bottled water)',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Ama Dablam Base Camp Trek | 12 Days | Yeti Routes',
  meta_description = 'Trek to the base of Ama Dablam (6,812m), the most beautiful peak in the Himalayas. 12 days, less crowded, expert guides. Yeti Routes Nepal.'
WHERE id = 23;

-- Route 25: Annapurna Base Camp Trek (10 days, moderate)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Reach Annapurna Base Camp (4,130m), encircled by a 360° amphitheatre of Himalayan giants',
    'Wake up to sunrise turning Annapurna South, Machhapuchhre, and Hiunchuli golden',
    'Trek through dense rhododendron forests ablaze with colour in spring',
    'Soak in the natural hot springs at Jhinu Danda after the trek',
    'Walk through traditional Gurung and Magar villages with rich cultural heritage',
    'Close-up views of the sacred Machhapuchhre (Fishtail) peak — never climbed'
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
    'First aid kit and pulse oximeter',
    'Yeti Routes duffel bag and trekking map'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel and rescue insurance (mandatory)',
    'Meals and accommodation in Kathmandu and Pokhara',
    'Personal trekking gear',
    'Personal expenses (hot shower, charging, bottled water)',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Annapurna Base Camp Trek | 10 Days | From $890 | Yeti Routes',
  meta_description = '10-day Annapurna Base Camp Trek (4,130m). 360° Himalayan views, rhododendron forests & hot springs. Expert guides. Book with Yeti Routes Nepal.'
WHERE id = 25;

-- Route 27: North Annapurna Base Camp (9 days, challenging)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Reach the rarely visited North Annapurna Base Camp with stunning views of Annapurna II and IV',
    'Off-the-beaten-path trail through the classic Annapurna Circuit\'s upper valleys',
    'Dramatic high-altitude terrain near the Nepal-Tibet border',
    'Acclimatize in historic Manang village, gateway to the high Himalayas',
    'Views of Tilicho Lake basin and the barren plateau landscape near Thorong La',
    'Authentic Manangi cultural experience with minimal tourist infrastructure'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Besisahar–Kathmandu transport',
    'Tea house accommodation throughout the trek',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Annapurna Conservation Area permit (ACAP)',
    'TIMS card',
    'First aid kit and pulse oximeter',
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
  meta_title = 'North Annapurna Base Camp Trek | 9 Days | Yeti Routes',
  meta_description = 'Off-the-beaten-path 9-day trek to North Annapurna Base Camp. Dramatic Himalayan terrain, Manang valley, Annapurna II and IV views. Yeti Routes Nepal.'
WHERE id = 27;

-- Route 30: Khopra Danda Trek (8 days, moderate)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Spectacular panoramic views from Khopra Danda ridge (3,660m) — Dhaulagiri, Annapurna, Nilgiri and beyond',
    'Day hike to the sacred Khayer Lake (4,500m) — a holy pilgrimage site with stunning alpine scenery',
    'Experience one of the Annapurna region\'s best-kept secrets with very few tourists',
    'Walk through traditional Gurung villages with authentic mountain hospitality',
    'Diverse ecosystems from subtropical forests to high alpine meadows',
    'Ideal extension after or before Poon Hill for a complete Annapurna experience'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Pokhara–Kathmandu transport',
    'Tea house and community lodge accommodation',
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
    'Tips for guides and porters',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Khopra Danda Trek | 8 Days | Hidden Annapurna Gem | Yeti Routes',
  meta_description = '8-day Khopra Danda Trek with panoramic Dhaulagiri & Annapurna views. Sacred Khayer Lake (4,500m). Off the beaten path, small groups. Yeti Routes.'
WHERE id = 30;

-- Route 31: Khayer Lake Trek (9 days, challenging)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Reach the sacred Khayer Lake (4,500m) — a revered Hindu pilgrimage site in pristine alpine wilderness',
    'Panoramic views of Dhaulagiri, Annapurna, Nilgiri, and Tukuche peaks',
    'Remote and uncrowded trail through traditional Gurung and Magar villages',
    'Diverse flora and fauna including rhododendron forests and Himalayan wildlife',
    'Complete the Khopra Danda ridge walk with overnight at the ridge viewpoint',
    'Spiritual and cultural immersion at one of Nepal\'s hidden sacred sites'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Pokhara–Kathmandu transport',
    'Tea house and community lodge accommodation',
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
    'Tips for guides and porters',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Khayer Lake Trek | 9 Days | Sacred Alpine Lake | Yeti Routes',
  meta_description = '9-day trek to sacred Khayer Lake (4,500m) via Khopra Danda ridge. Panoramic Dhaulagiri & Annapurna views. Remote, uncrowded. Yeti Routes Nepal.'
WHERE id = 31;

-- Route 32: Upper Mustang Trek (14 days, moderate)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Enter Lo Manthang — the medieval walled capital of the ancient Mustang Kingdom',
    'Explore ancient cave monasteries and Buddhist gompas up to 800 years old',
    'Trek through dramatic red canyon badlands and a lunar landscape unlike anywhere else in Nepal',
    'Experience Tibetan culture preserved in near-total isolation for centuries',
    'Only 1,000 permits issued per year — an exclusive and restricted destination',
    'Trek during monsoon (June–Sept) when Mustang stays dry in the Himalayan rain shadow'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Pokhara and Pokhara–Jomsom flights',
    'Tea house and guesthouse accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Upper Mustang Restricted Area Permit (USD 500 for 10 days)',
    'Annapurna Conservation Area permit (ACAP)',
    'TIMS card',
    'First aid kit and pulse oximeter',
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
  best_season = 'March to November (June to September for rain-shadow advantage)',
  meta_title = 'Upper Mustang Trek | 14 Days | Forbidden Kingdom | Yeti Routes',
  meta_description = '14-day Upper Mustang Trek to Lo Manthang\'s medieval kingdom. Ancient monasteries, lunar landscapes & Tibetan culture. Restricted permit. Yeti Routes.'
WHERE id = 32;

-- Route 36: Langtang Valley Trek (8 days, moderate)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Reach the tranquil Kyanjin Gompa monastery at 3,870m in the heart of Langtang Valley',
    'Panoramic views of Langtang Lirung (7,227m) — the valley\'s guardian peak',
    'Explore traditional Tamang villages with rich Buddhist heritage and yak cheese farms',
    'Trek through Langtang National Park\'s dense rhododendron and bamboo forests',
    'Optional hike to Kyanjin Ri (4,773m) for a stunning 360° Himalayan panorama',
    'One of Nepal\'s closest trekking destinations to Kathmandu — just 7 hours by road'
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
    'Personal expenses (hot shower, charging, bottled water)',
    'Alcoholic beverages and soft drinks',
    'Tips for guides and porters',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Langtang Valley Trek | 8 Days | From $650 | Yeti Routes',
  meta_description = '8-day Langtang Valley Trek to Kyanjin Gompa (3,870m). Closest major trek to Kathmandu. Tamang culture, yak cheese & Himalayan views. Yeti Routes.'
WHERE id = 36;

-- Route 37: Langtang Gosainkunda Trek (15 days, challenging)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Visit the sacred Gosainkunda Lake (4,380m) — a revered Hindu and Buddhist pilgrimage site',
    'Complete the full Langtang–Gosainkunda–Helambu traverse, one of Nepal\'s great classic routes',
    'Cross the dramatic Lauribinayak Pass (4,610m) with sweeping panoramas',
    'Trek through Langtang Valley to Kyanjin Gompa and back via a completely different route',
    'Diverse landscapes from lush forest to high alpine lakes and open ridgelines',
    'Immerse in Tamang and Sherpa culture across multiple distinct communities'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Syabrubesi transport (one way) and return from Sundarijal/Melamchi',
    'Tea house accommodation throughout the trek',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Langtang National Park entry permit',
    'TIMS card',
    'First aid kit and pulse oximeter',
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
  meta_title = 'Langtang Gosainkunda Trek | 15 Days | Full Traverse | Yeti Routes',
  meta_description = '15-day Langtang to Gosainkunda Lake (4,380m) traverse. Sacred pilgrimage lakes, Lauribinayak Pass & Helambu valley. Expert guides. Yeti Routes Nepal.'
WHERE id = 37;

-- Route 39: Panch Pokhari Trek (8 days, moderate)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Reach the five sacred alpine lakes of Panch Pokhari (4,100m) — a hidden Himalayan gem',
    'Completely off the beaten path — experience genuine Nepal far from tourist crowds',
    'Trek through traditional Sherpa and Tamang villages in the Sindhupalchowk district',
    'Stunning views of Jugal Himal, Langtang range, and distant Everest massif',
    'Rich flora including rhododendron, oak, and alpine meadows',
    'Culturally rich pilgrimage site visited by local devotees during Janai Purnima festival'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Babare–Kathmandu transport',
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
    'Tips for guides and porters',
    'Helicopter rescue costs if required'
  ),
  best_season = 'March to May, October to November',
  meta_title = 'Panch Pokhari Trek | 8 Days | Five Sacred Lakes | Yeti Routes',
  meta_description = '8-day Panch Pokhari Trek to five sacred alpine lakes (4,100m). Completely off the beaten path, traditional villages, Jugal Himal views. Yeti Routes.'
WHERE id = 39;

-- Route 41: Tsho Rolpa Lake Trek (12 days, challenging)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Reach Tsho Rolpa glacial lake (4,580m) — one of Nepal\'s largest glacier lakes with stunning turquoise waters',
    'Trek through the wild Rolwaling Valley, one of Nepal\'s most remote and pristine trekking regions',
    'Visit the Tibetan refugee community in the ancient village of Beding',
    'Option to attempt the formidable Tashi Labsta Pass (5,755m) for experienced trekkers',
    'Remote mountain wilderness with rich biodiversity and minimal tourist presence',
    'Views of Rolwaling Himal including Gauri Shankar, Tsoboje, and Chhekigo'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Singati–Kathmandu transport',
    'Tea house and guesthouse accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Rolwaling Conservation Area permit',
    'TIMS card',
    'First aid kit and pulse oximeter',
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
  meta_title = 'Tsho Rolpa Lake Trek | 12 Days | Remote Rolwaling Valley | Yeti Routes',
  meta_description = '12-day Tsho Rolpa Trek to Nepal\'s largest glacial lake (4,580m). Remote Rolwaling Valley, Beding village, Gauri Shankar views. Yeti Routes Nepal.'
WHERE id = 41;

-- Route 43: Rara Lake Trek (10 days, moderate)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Visit Rara Lake — Nepal\'s largest and most pristine lake (2,990m), a jewel of the far west',
    'Immerse in the untouched wilderness of Rara National Park, home to red deer, langur monkeys, and red panda',
    'Explore the remote Mugu district with its distinct culture and ancient traditions',
    'Spectacular views of Mugu Karnali river valley and surrounding peaks',
    'Experience authentic Far-Western Nepal far from mainstream tourism',
    'Crystal-clear lake reflecting snow-capped peaks — arguably Nepal\'s most beautiful lake'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Jumla–Kathmandu flights',
    'Tea house and lodge accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Rara National Park entry permit',
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
  best_season = 'October to May',
  meta_title = 'Rara Lake Trek | 10 Days | Nepal\'s Largest Lake | Yeti Routes',
  meta_description = '10-day Rara Lake Trek to Nepal\'s largest pristine lake (2,990m). Rara National Park wildlife, Mugu district culture. Far west Nepal adventure. Yeti Routes.'
WHERE id = 43;

-- Route 45: Lower Dolpo Trek (14 days, challenging)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Marvel at Phoksundo Lake (3,611m) — Nepal\'s deepest lake with otherworldly turquoise blue waters',
    'Visit the ancient Phoksundo Monastery perched above the lake',
    'Trek through the Shey Phoksundo National Park — Nepal\'s largest national park',
    'Experience Bon religion villages where pre-Buddhist traditions live on',
    'Dramatic canyon landscapes and barren high-altitude terrain unique to Dolpo',
    'Restricted area permit required — one of Nepal\'s most exclusive and remote destinations'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Juphal–Nepalgunj–Kathmandu flights',
    'Tea house and lodge accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Lower Dolpo Restricted Area Permit',
    'Shey Phoksundo National Park entry permit',
    'TIMS card',
    'First aid kit and pulse oximeter',
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
  meta_title = 'Lower Dolpo Trek | 14 Days | Phoksundo Lake | Yeti Routes',
  meta_description = '14-day Lower Dolpo Trek to Phoksundo Lake (3,611m) — Nepal\'s deepest lake. Ancient Bon villages, restricted area, pristine wilderness. Yeti Routes Nepal.'
WHERE id = 45;

-- Route 49: Nar Phu Valley Trek (13 days, challenging)
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Explore the twin hidden valleys of Nar and Phu — a restricted area preserving ancient Tibetan culture',
    'Cross the formidable Kang La Pass (5,320m) between Phu and Nar villages',
    'Walk through medieval fortress villages virtually unchanged for centuries',
    'Finish via the classic Thorong La Pass (5,416m) on the Annapurna Circuit',
    'Breathtaking views of Annapurna, Chulu East, and Pisang Peak',
    'Completely off the tourist trail — encounter authentic Himalayan wilderness'
  ),
  inclusions = JSON_ARRAY(
    'Airport and hotel transfers in Kathmandu',
    'Kathmandu–Besisahar–Kathmandu transport',
    'Tea house and guesthouse accommodation',
    'All meals on trek (breakfast, lunch, dinner)',
    'Experienced English-speaking trekking guide',
    'One porter per two trekkers (max 15 kg luggage)',
    'Nar Phu Valley Restricted Area Permit (USD 90/week)',
    'Annapurna Conservation Area permit (ACAP)',
    'TIMS card',
    'First aid kit and pulse oximeter',
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
  meta_title = 'Nar Phu Valley Trek | 13 Days | Hidden Tibet | Yeti Routes',
  meta_description = '13-day Nar Phu Valley Trek through restricted Tibetan villages, Kang La Pass (5,320m) & Thorong La. One of Nepal\'s most exclusive treks. Yeti Routes.'
WHERE id = 49;
