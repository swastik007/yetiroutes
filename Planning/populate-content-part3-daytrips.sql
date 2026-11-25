-- ============================================================
-- Yeti Routes Content Population — PART 3: Day Trips
-- Routes: 58–77
-- ============================================================
SET NAMES utf8mb4;

-- Route 58: Kathmandu World Heritage Sites Tour
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Visit Pashupatinath Temple — Nepal\'s holiest Hindu shrine on the banks of the Bagmati River',
    'Circumambulate the great Boudhanath Stupa — one of the largest Buddhist stupas in the world',
    'Climb to Swayambhunath (Monkey Temple) for panoramic views over Kathmandu Valley',
    'Explore Patan Durbar Square — an extraordinary concentration of Newari art and architecture',
    'Expert guide bringing centuries of living history and mythology to life',
    'All four UNESCO-listed Kathmandu heritage sites covered in a single memorable day'
  ),
  inclusions = JSON_ARRAY(
    'Private vehicle and driver',
    'Experienced English-speaking cultural guide',
    'All heritage site entrance fees',
    'Hotel pickup and drop-off',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Meals (unless specified)',
    'Personal shopping and expenses',
    'Tips for guide and driver',
    'International flights and Nepal visa'
  ),
  best_season = 'Year-round',
  meta_title = 'Kathmandu Heritage Day Tour | UNESCO Sites | Yeti Routes',
  meta_description = 'Full-day Kathmandu UNESCO heritage tour: Pashupatinath, Boudhanath, Swayambhunath & Patan. Expert guide, all entry fees included. Book with Yeti Routes.'
WHERE id = 58;

-- Route 59: Bungee Jumping in Nepal
UPDATE routes SET
  highlights = JSON_ARRAY(
    '160-metre free-fall bungee jump over the wild Bhotekoshi River gorge — one of the highest in Asia',
    'Optional canyon swing — a pendulum ride over the same dramatic gorge',
    'Spectacular mountain scenery and lush river canyon along the drive to the jump site',
    'Professional Swiss-designed bungee platform with international safety standards',
    'Certificate of achievement and optional GoPro video package',
    'Combined adventure with white-water rafting on the Bhotekoshi available'
  ),
  inclusions = JSON_ARRAY(
    'Transport from Kathmandu to Bhotekoshi jump site and back',
    'One bungee jump',
    'Safety equipment and professional supervision',
    'Spotter and jump crew',
    'Hotel pickup and drop-off'
  ),
  exclusions = JSON_ARRAY(
    'Meals',
    'GoPro video package (available at extra cost)',
    'Canyon swing (available at extra cost)',
    'Personal travel insurance (mandatory for this activity)',
    'Tips'
  ),
  best_season = 'Year-round (closed during heavy monsoon floods: July–August)',
  meta_title = 'Bungee Jumping Nepal | 160m Bhotekoshi | Yeti Routes',
  meta_description = '160m bungee jump over Nepal\'s Bhotekoshi River — one of Asia\'s highest bungee drops. Canyon swing option. Professional safety. Day trip from Kathmandu. Yeti Routes.'
WHERE id = 59;

-- Route 60: Nagarkot Day Tour
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Nagarkot (2,175m) offers one of Nepal\'s widest Himalayan panoramas — on clear days spanning from Dhaulagiri to Kanchenjunga',
    'Sunrise or sunset views with Mt. Everest visible on the horizon',
    'Peaceful hilltop atmosphere with pine forests and terraced farmland',
    'Traditional village walks and viewpoint hikes above the valley rim',
    'Close enough to Kathmandu for a relaxing full-day escape',
    'Optional sunrise hike to the Nagarkot tower for the best 360° views'
  ),
  inclusions = JSON_ARRAY(
    'Private vehicle and driver',
    'Experienced English-speaking guide',
    'Hotel pickup and drop-off in Kathmandu',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Meals (unless specified)',
    'Nagarkot tower entry fee (nominal)',
    'Personal expenses',
    'Tips for guide and driver'
  ),
  best_season = 'Year-round (October to February for clearest Himalayan views)',
  meta_title = 'Nagarkot Day Tour from Kathmandu | Himalayan Panorama | Yeti Routes',
  meta_description = 'Nagarkot day tour (2,175m) for sweeping Himalayan panorama including Mt. Everest. Sunrise or sunset views, pine forests, easy village walks. Yeti Routes.'
WHERE id = 60;

-- Route 61: Day Tour of Everest Base Camp by Helicopter
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Fly directly to Everest Base Camp (5,364m) and land on the Khumbu Glacier — the closest you can get in a single day',
    'Touch down at Kala Patthar (5,545m) for the most iconic Everest photograph on earth',
    'Aerial views of Everest, Lhotse, Nuptse, Ama Dablam, and the entire Khumbu Valley',
    'Breakfast stop at the famous Everest View Hotel (3,880m) — the world\'s highest hotel',
    'Complete the entire Everest experience in just 4–5 hours',
    'Perfect option for those with limited time or who cannot do the full EBC trek'
  ),
  inclusions = JSON_ARRAY(
    'Helicopter charter (shared basis, up to 5 passengers)',
    'Hotel pickup and drop-off in Kathmandu',
    'Breakfast at Everest View Hotel',
    'Experienced Yeti Routes representative on the flight',
    'All landing fees and permits',
    'Bottled water and light refreshments'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel insurance (mandatory — includes high-altitude helicopter provision)',
    'Personal expenses',
    'Tips for pilot and crew',
    'Private helicopter charter (quoted separately)'
  ),
  best_season = 'Year-round (October to May for clearest weather)',
  meta_title = 'Everest Base Camp Helicopter Tour | Day Trip | Yeti Routes',
  meta_description = 'Fly to Everest Base Camp & land at Kala Patthar (5,545m) in one day. Aerial views of Everest, Lhotse & Ama Dablam. Breakfast at world\'s highest hotel. Yeti Routes.'
WHERE id = 61;

-- Route 62: Kathmandu Hiking Tour
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Explore hidden hiking trails through the forests and viewpoints surrounding Kathmandu Valley',
    'Visit secluded monasteries, viewpoints, and ancient temples away from the tourist crowds',
    'Sweeping views of Kathmandu city and the Himalayan horizon from forested ridges',
    'Birdwatching in Shivapuri-Nagarjun National Park or the Champa Devi forest',
    'Flexible half-day or full-day options tailored to your fitness level',
    'Combine cultural sightseeing with light trekking in one energizing day'
  ),
  inclusions = JSON_ARRAY(
    'Private vehicle and driver',
    'Experienced English-speaking hiking guide',
    'National park entry fee (where applicable)',
    'Hotel pickup and drop-off',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Meals (pack lunch recommended)',
    'Personal trekking gear (good shoes required)',
    'Personal expenses',
    'Tips for guide and driver'
  ),
  best_season = 'Year-round (October to April for clearest views)',
  meta_title = 'Kathmandu Hiking Day Tour | Forest & Valley Views | Yeti Routes',
  meta_description = 'Day hiking tour around Kathmandu Valley — hidden trails, monasteries, valley viewpoints & birdwatching. Flexible difficulty. Expert guide. Yeti Routes Nepal.'
WHERE id = 62;

-- Route 63: Day Hike in Pokhara
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Hike to the World Peace Pagoda (1,100m) for stunning views of Phewa Lake and the Annapurna range',
    'Walk the scenic lakeside ridges above Pokhara with Machhapuchhre dominating the skyline',
    'Option to hike to Sarangkot viewpoint (1,592m) — Nepal\'s most celebrated mountain sunrise spot',
    'Diverse trails through forests, villages, and viewpoints above Nepal\'s adventure capital',
    'Excellent introduction to Nepal\'s landscapes and mountain culture',
    'Combine with paragliding or boating for a complete Pokhara adventure day'
  ),
  inclusions = JSON_ARRAY(
    'Private vehicle and driver',
    'Experienced English-speaking guide',
    'Hotel pickup and drop-off in Pokhara',
    'Entrance fees where applicable',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Meals',
    'Personal trekking gear (good shoes required)',
    'Optional activities (paragliding, boating)',
    'Personal expenses',
    'Tips for guide and driver'
  ),
  best_season = 'Year-round (October to April for clearest mountain views)',
  meta_title = 'Day Hike in Pokhara | World Peace Pagoda | Yeti Routes',
  meta_description = 'Day hike in Pokhara — World Peace Pagoda, Sarangkot viewpoint & Phewa Lake. Machhapuchhre panorama. Expert guide, flexible trails. Yeti Routes Nepal.'
WHERE id = 63;

-- Route 64: Kathmandu Cycling Tour
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Cycle through ancient Newari villages preserving traditional architecture and crafts for centuries',
    'Visit Bungamati and Khokana — two of the Kathmandu Valley\'s most authentic medieval villages',
    'Ride through rice paddies, terrace farms, and river valleys on quiet rural lanes',
    'Stop at Patan\'s woodcarving workshops and traditional craft centres',
    'Experienced cycling guide sharing local stories and cultural insights along the route',
    'Environmentally friendly and immersive way to explore the valley beyond tourist areas'
  ),
  inclusions = JSON_ARRAY(
    'Quality mountain bike hire',
    'Helmet and safety gear',
    'Experienced English-speaking cycling guide',
    'Hotel pickup and drop-off',
    'Bottled water',
    'Puncture repair kit and basic tools'
  ),
  exclusions = JSON_ARRAY(
    'Meals',
    'Personal expenses',
    'Tips for guide',
    'Entry fees to any heritage sites visited en route (nominal)'
  ),
  best_season = 'October to May (avoid monsoon season)',
  meta_title = 'Kathmandu Cycling Tour | Newari Villages | Yeti Routes',
  meta_description = 'Cycling tour through Kathmandu Valley\'s ancient Newari villages: Bungamati, Khokana & Patan. Rural landscapes, traditional crafts. Eco-friendly. Yeti Routes.'
WHERE id = 64;

-- Route 65: Bhaktapur & Nagarkot Sunset Tour
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Bhaktapur Durbar Square — the most complete preserved medieval city in South Asia and UNESCO World Heritage Site',
    'See the famous 55-Window Palace, the Golden Gate, and the traditional potters\' square',
    'Drive up to Nagarkot (2,175m) for a spectacular sunset over the entire Himalayan horizon',
    'Watch the peaks turn golden and rose as the sun sinks behind the mountains',
    'Combine two of Nepal\'s top attractions — ancient culture and Himalayan scenery — in one day',
    'Expert guide bringing Bhaktapur\'s extraordinary history and architecture to life'
  ),
  inclusions = JSON_ARRAY(
    'Private vehicle and driver',
    'Experienced English-speaking cultural guide',
    'Bhaktapur heritage site entrance fees',
    'Hotel pickup and drop-off in Kathmandu',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Meals',
    'Personal shopping and expenses',
    'Nagarkot tower fee (nominal)',
    'Tips for guide and driver'
  ),
  best_season = 'Year-round (October to February for clearest sunset views)',
  meta_title = 'Bhaktapur & Nagarkot Sunset Tour | Day Trip | Yeti Routes',
  meta_description = 'Day trip combining Bhaktapur UNESCO heritage city and Nagarkot sunset panorama. Ancient temples, 55-Window Palace & Himalayan glow. Yeti Routes Nepal.'
WHERE id = 65;

-- Route 66: Nagarkot Dhulikhel Day Hiking
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Full-day ridge walk from Nagarkot to Dhulikhel with continuous Himalayan panoramas throughout',
    'Views spanning from the Annapurna range to the Everest massif and Kanchenjunga',
    'Trek through traditional Newari villages, forests, and terraced hillsides',
    'Visit the ancient Kali temple above Dhulikhel — a significant local pilgrimage site',
    'Well-marked trail with moderate difficulty — ideal for active day visitors',
    'Dhulikhel town lunch — a charming traditional hilltop settlement with good food'
  ),
  inclusions = JSON_ARRAY(
    'Private vehicle and driver',
    'Experienced English-speaking hiking guide',
    'Hotel pickup and drop-off in Kathmandu',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Meals (lunch at own expense in Dhulikhel)',
    'Personal trekking gear (good walking shoes required)',
    'Personal expenses',
    'Tips for guide and driver'
  ),
  best_season = 'October to May',
  meta_title = 'Nagarkot to Dhulikhel Hike | Full Day | Himalayan Views | Yeti Routes',
  meta_description = 'Nagarkot to Dhulikhel full-day ridge hike with continuous Himalayan panorama from Annapurna to Everest. Traditional villages, Kali temple. Yeti Routes.'
WHERE id = 66;

-- Route 67: Exploring Kathmandu by Rickshaw
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Navigate the labyrinthine lanes of Old Kathmandu in a traditional cycle rickshaw',
    'Explore Indra Chowk, Asan bazaar, and the medieval streets of the old city at a gentle pace',
    'Discover hidden temples, ancient courtyards (tols), and traditional craft workshops',
    'Pass through Thamel, the Freak Street area, and Durbar Square',
    'Immersive street-level experience of the city\'s sights, sounds, smells, and rhythms',
    'Ideal for travellers seeking a relaxed but authentic Kathmandu exploration'
  ),
  inclusions = JSON_ARRAY(
    'Rickshaw hire for the full tour',
    'Experienced English-speaking guide walking alongside',
    'Hotel pickup in Kathmandu Thamel area',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Meals',
    'Heritage site entrance fees (Durbar Square ticket)',
    'Personal shopping',
    'Tips for guide and rickshaw driver'
  ),
  best_season = 'Year-round',
  meta_title = 'Kathmandu Rickshaw Tour | Old City | Yeti Routes',
  meta_description = 'Explore Old Kathmandu by cycle rickshaw — Indra Chowk, Asan bazaar, hidden temples & ancient courtyards. Immersive local experience. Yeti Routes Nepal.'
WHERE id = 67;

-- Route 68: Patan and Bhaktapur Day Tour
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Patan Durbar Square — arguably the finest concentration of Newari art and architecture anywhere in the world',
    'Patan Museum — the best museum in Nepal, housed inside a restored royal palace',
    'Bhaktapur Durbar Square — a perfectly preserved medieval city frozen in the 15th century',
    'The iconic 55-Window Palace and the Golden Gate of Bhaktapur',
    'Traditional potters\' square where artisans work in centuries-old traditions',
    'Two UNESCO World Heritage cities in a single day with expert cultural interpretation'
  ),
  inclusions = JSON_ARRAY(
    'Private vehicle and driver',
    'Experienced English-speaking cultural guide',
    'Patan and Bhaktapur heritage site entrance fees',
    'Hotel pickup and drop-off in Kathmandu',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Meals',
    'Patan Museum entry (small additional fee)',
    'Personal shopping and expenses',
    'Tips for guide and driver'
  ),
  best_season = 'Year-round',
  meta_title = 'Patan & Bhaktapur Day Tour | Two UNESCO Cities | Yeti Routes',
  meta_description = 'Day tour of Patan and Bhaktapur — two UNESCO World Heritage cities with extraordinary Newari art, medieval durbar squares & living traditions. Yeti Routes.'
WHERE id = 68;

-- Route 69: Khokana and Bungamati Tour
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Khokana — a perfectly preserved Newari village where traditional mustard oil is still pressed by hand',
    'Bungamati — home of the Rato Machhindranath deity, with a remarkable cluster of ancient temples',
    'Walk through narrow stone-paved lanes between timber-framed medieval houses',
    'Watch woodcarvers, weavers, and potters practicing age-old crafts',
    'Only a short drive south of Kathmandu — rural Nepal within the valley',
    'Excellent photography opportunities in the authentic village streetscapes'
  ),
  inclusions = JSON_ARRAY(
    'Private vehicle and driver',
    'Experienced English-speaking cultural guide',
    'Hotel pickup and drop-off in Kathmandu',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Meals',
    'Personal shopping and expenses',
    'Tips for guide and driver'
  ),
  best_season = 'Year-round',
  meta_title = 'Khokana & Bungamati Village Tour | Authentic Newari Culture | Yeti Routes',
  meta_description = 'Day tour of Khokana and Bungamati — authentic Newari villages with mustard oil pressing, woodcarving, ancient temples & medieval architecture. Yeti Routes.'
WHERE id = 69;

-- Route 70: Dakshinkali, Pharping and Chobar Tour
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Dakshinkali temple — one of Nepal\'s most important and atmospheric Hindu pilgrimage sites',
    'Vajrayogini shrine in Pharping — a sacred Vajrayana Buddhist site with ancient meditation caves',
    'Asura Cave — where Guru Padmasambhava (Guru Rinpoche) is said to have meditated',
    'Chobar Gorge — a dramatic rocky canyon where the Bagmati River cuts through the valley rim',
    'Taudaha lake — a peaceful bird sanctuary with local legend tied to the formation of the valley',
    'Diverse blend of Hindu and Buddhist sacred sites in the forests south of Kathmandu'
  ),
  inclusions = JSON_ARRAY(
    'Private vehicle and driver',
    'Experienced English-speaking cultural guide',
    'Hotel pickup and drop-off in Kathmandu',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Temple entrance and offering fees',
    'Meals',
    'Personal expenses',
    'Tips for guide and driver'
  ),
  best_season = 'Year-round (Saturday for Dakshinkali is most active)',
  meta_title = 'Dakshinkali, Pharping & Chobar Tour | Sacred Sites | Yeti Routes',
  meta_description = 'Day tour to Dakshinkali temple, Vajrayogini shrine, Asura Cave & Chobar Gorge. Sacred Hindu-Buddhist pilgrimage sites south of Kathmandu. Yeti Routes.'
WHERE id = 70;

-- Route 71: Joy of Rafting over Trishuli River
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Exciting Grade III–IV rapids on the Trishuli River — Nepal\'s most popular white-water rafting destination',
    'Beautiful river canyon with forested hillsides and occasional wildlife sightings',
    'Suitable for beginners and intermediate rafters — thrilling but accessible',
    'Professional raft guides with international certifications and excellent safety record',
    'Combined with scenic drive through Prithvi Highway alongside the Trishuli gorge',
    'Option to extend to a two-day trip with riverside camping'
  ),
  inclusions = JSON_ARRAY(
    'Transport from Kathmandu to Trishuli put-in point and back',
    'Rafting equipment (raft, paddles, helmets, life jackets)',
    'Experienced professional rafting guide',
    'Riverside lunch',
    'Hotel pickup and drop-off in Kathmandu'
  ),
  exclusions = JSON_ARRAY(
    'Personal travel insurance (mandatory for water sports)',
    'Dry bags (available to rent)',
    'Personal expenses',
    'Tips for guide'
  ),
  best_season = 'October to June (avoid peak monsoon July–August)',
  meta_title = 'Trishuli River Rafting Day Trip | Grade III-IV | Yeti Routes',
  meta_description = 'Exciting Grade III-IV white-water rafting on Trishuli River, Nepal. One day from Kathmandu. Professional guides, all equipment included. Yeti Routes Nepal.'
WHERE id = 71;

-- Route 72: Mountain Biking around Kathmandu
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Technical single-track trails on the forested hills surrounding Kathmandu — world-class riding',
    'Descend Champa Devi or ride the Shivapuri National Park trails through diverse forest ecosystems',
    'Stunning valley and Himalayan views from high ridgeline trails',
    'Suitable for all levels from casual riders to experienced mountain bikers',
    'Expert local guides who know every hidden trail around the valley',
    'Exhilarating alternative to standard sightseeing — experience Nepal at speed'
  ),
  inclusions = JSON_ARRAY(
    'Quality mountain bike hire (front or full suspension available)',
    'Helmet, gloves, and body armour (full gear)',
    'Experienced mountain biking guide',
    'Private vehicle for bike transport and shuttle',
    'Bottled water and snacks',
    'Basic tool kit and spare tubes'
  ),
  exclusions = JSON_ARRAY(
    'Meals (unless specified)',
    'Personal protective gear (own welcome)',
    'National park entry fees (where applicable)',
    'Tips for guide and driver'
  ),
  best_season = 'October to May (avoid monsoon July–September)',
  meta_title = 'Mountain Biking Kathmandu | Shivapuri Trails | Yeti Routes',
  meta_description = 'Mountain biking day trips around Kathmandu Valley — Champa Devi & Shivapuri single-track trails. All levels, full gear provided, expert guides. Yeti Routes.'
WHERE id = 72;

-- Route 73: Day Tour of Annapurna Base Camp by Helicopter
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Land at Annapurna Base Camp (4,130m) — the Annapurna Sanctuary enclosed by towering 8,000m giants',
    'Face-to-face with Annapurna South (7,219m), Machhapuchhre (6,993m), and Hiunchuli (6,441m)',
    'Aerial views of the Modi Khola river valley and the entire Annapurna Conservation Area',
    'Breakfast stop at a scenic mountain teahouse with unobstructed Himalayan views',
    'Experience the magic of the Annapurna Sanctuary in a fraction of the time',
    'Perfect for travellers with limited time who want a genuine Himalayan high-altitude experience'
  ),
  inclusions = JSON_ARRAY(
    'Helicopter charter (shared basis, up to 5 passengers)',
    'Hotel pickup and drop-off in Pokhara or Kathmandu',
    'Breakfast stop en route',
    'Experienced Yeti Routes representative on the flight',
    'All landing fees and permits',
    'Bottled water and light refreshments'
  ),
  exclusions = JSON_ARRAY(
    'International flights to/from Nepal',
    'Nepal entry visa fee',
    'Travel insurance (mandatory — includes high-altitude provision)',
    'Personal expenses',
    'Tips for pilot and crew',
    'Private helicopter (quoted separately)'
  ),
  best_season = 'Year-round (October to May for clearest visibility)',
  meta_title = 'Annapurna Base Camp Helicopter Tour | Day Trip | Yeti Routes',
  meta_description = 'Land at Annapurna Base Camp (4,130m) by helicopter. 360° views of Annapurna South, Machhapuchhre & Hiunchuli. Complete ABC in one day. Yeti Routes Nepal.'
WHERE id = 73;

-- Route 74: Namo Buddha Day Tour
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Visit Namo Buddha Stupa — one of the three most sacred Buddhist pilgrimage sites in Nepal',
    'Explore Thrangu Tashi Yangtse Monastery, one of Nepal\'s finest active Buddhist monasteries',
    'Walk the sacred kora (circumambulation path) around the hilltop stupa with prayer flags',
    'Legend of the compassionate prince who offered his body to a starving tigress — told at the site',
    'Panoramic views of the Himalayan foothills and Kathmandu Valley from the hilltop',
    'Peaceful atmosphere ideal for reflection and cultural photography'
  ),
  inclusions = JSON_ARRAY(
    'Private vehicle and driver',
    'Experienced English-speaking guide',
    'Hotel pickup and drop-off in Kathmandu',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Meals (good local restaurants at the site)',
    'Temple donation/entrance (nominal)',
    'Personal expenses',
    'Tips for guide and driver'
  ),
  best_season = 'Year-round',
  meta_title = 'Namo Buddha Day Tour from Kathmandu | Buddhist Stupa | Yeti Routes',
  meta_description = 'Day trip to sacred Namo Buddha Stupa and Thrangu Monastery. Buddhist pilgrimage, hilltop views, ancient legend. 2 hours from Kathmandu. Yeti Routes.'
WHERE id = 74;

-- Route 75: Nagarkot and Changu Narayan Hiking Tour
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Hike the scenic forest trail from Nagarkot down to Changu Narayan through rhododendron and oak woodland',
    'Changu Narayan temple — Nepal\'s oldest Vishnu temple and UNESCO World Heritage Site (c. 4th century AD)',
    'Extraordinary stone and woodcarving artworks spanning 1,600 years of Newari craftsmanship',
    'Panoramic Himalayan views throughout the descent from Nagarkot (2,175m)',
    'Traditional Changu village walk through ancient lanes and local life',
    'Combines a scenic mountain viewpoint with one of Nepal\'s most historically significant temples'
  ),
  inclusions = JSON_ARRAY(
    'Private vehicle and driver',
    'Experienced English-speaking guide',
    'Changu Narayan heritage site entrance fees',
    'Hotel pickup and drop-off in Kathmandu',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Meals',
    'Nagarkot viewpoint fees (nominal)',
    'Personal expenses',
    'Tips for guide and driver'
  ),
  best_season = 'October to May',
  meta_title = 'Nagarkot to Changu Narayan Hike | UNESCO Temple | Yeti Routes',
  meta_description = 'Hike from Nagarkot to Changu Narayan — Nepal\'s oldest UNESCO temple. Forest trail, Himalayan panoramas & 1,600 years of Newari art. Yeti Routes Nepal.'
WHERE id = 75;

-- Route 76: Chandragiri Hill Day Tour
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Cable car ride to Chandragiri Hill summit (2,551m) above Kathmandu Valley',
    'Breathtaking 360° panorama stretching from Dhaulagiri in the west to Everest in the east',
    'Bhaleshwor Mahadev temple — an ancient Shiva shrine with legends dating to the Mahabharata',
    'Dense Chandragiri forest offering a cool, green escape from the city',
    'Kathmandu Valley birds-eye view with the city\'s full tapestry spread below',
    'Accessible and family-friendly — combine with a half-day Kathmandu tour'
  ),
  inclusions = JSON_ARRAY(
    'Private vehicle and driver',
    'Cable car ticket (return)',
    'Experienced English-speaking guide',
    'Hotel pickup and drop-off in Kathmandu',
    'Bottled water'
  ),
  exclusions = JSON_ARRAY(
    'Meals',
    'Temple donation (nominal)',
    'Personal expenses',
    'Tips for guide and driver'
  ),
  best_season = 'Year-round (October to February for clearest views)',
  meta_title = 'Chandragiri Hill Cable Car Tour | Kathmandu Panorama | Yeti Routes',
  meta_description = 'Cable car to Chandragiri Hill (2,551m) for sweeping Himalayan panorama from Dhaulagiri to Everest. Ancient Shiva temple, forested summit. Yeti Routes Nepal.'
WHERE id = 76;

-- Route 77: Paragliding in Pokhara Tour
UPDATE routes SET
  highlights = JSON_ARRAY(
    'Tandem paragliding from Sarangkot — Nepal\'s premier paragliding launch site with world-class thermals',
    '30 to 45-minute flight over the turquoise waters of Phewa Lake with Annapurna panorama',
    'Machhapuchhre (Fishtail) and the Annapurna range dominate your view throughout the flight',
    'APPI-certified professional pilots with thousands of flights of experience',
    'Smooth and safe tandem flight — no experience required',
    'Optional acrobatic manoeuvres for the adventurous'
  ),
  inclusions = JSON_ARRAY(
    'Tandem paragliding flight (30–45 minutes)',
    'Professional APPI-certified pilot',
    'All paragliding equipment',
    'Transport to Sarangkot launch site and back to Lakeside Pokhara',
    'GoPro in-flight video (standard package)'
  ),
  exclusions = JSON_ARRAY(
    'Transport from Kathmandu to Pokhara',
    'Personal travel insurance (mandatory for adventure activities)',
    'Additional video/photo packages',
    'Tips for pilot'
  ),
  best_season = 'Year-round (October to May for best conditions; September for world paragliding events)',
  meta_title = 'Paragliding in Pokhara | Sarangkot | 30-45 Min Flight | Yeti Routes',
  meta_description = 'Tandem paragliding from Sarangkot over Phewa Lake with Annapurna panorama. 30-45 min flight, APPI-certified pilots, GoPro video included. Yeti Routes.'
WHERE id = 77;
