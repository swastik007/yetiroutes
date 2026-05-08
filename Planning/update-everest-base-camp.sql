-- ============================================
-- Everest Base Camp Trek - Database Update
-- Generated: 2026-01-20
-- ============================================

-- Step 1: Delete duplicate entry (ID 20)
DELETE FROM `routes` WHERE `id` = 20;

-- Step 2: Update main Everest Base Camp Trek entry (ID 1)
UPDATE `routes` SET
    `location_id` = 1,
    `title` = 'Everest Base Camp Trek',
    `slug` = 'everest-base-camp-trek',
    `difficulty` = 'challenging',
    `duration_days` = 14,
    `max_altitude_meters` = 5555,
    `best_season` = 'March-May, September-November',
    `terrain_type` = 'mixed',
    `route_type` = 'trek',
    `fitness_score_required` = 7,
    `base_price` = 1299.00,
    `currency` = 'USD',

    `short_description` = 'Trek to the base of the world''s highest mountain on this iconic 14-day adventure through the legendary Khumbu valley, home to Mt. Everest, Sherpa culture, and the most breathtaking mountain views on Earth.',

    `full_description` = '<h2>Overview</h2>
<p>The Everest (Khumbu) region is home to Mt. Everest (8,848 m) and vibrant Sherpa culture. This classic trek (12-14 days on trail) leads through rhododendron forests and Sherpa villages (Namche Bazaar, Tengboche) up to Everest Base Camp (5,364 m) and panoramic Kala Patthar (5,555 m). It''s traditionally done in spring (Mar-May) or autumn (Sept-Nov) when skies are clear.</p>

<p>All trekking permits (Sagarmatha National Park, TIMS) are included in the package, so your main tasks are obtaining a Nepal tourist visa on arrival and preparing for the high altitude. Yeti Routes (an NTB-licensed operator) can help arrange visas, airport transfers and logistics - you just focus on training and packing.</p>

<h2>Sample 14-Day Itinerary</h2>

<h3>Days 1-2: Arrival & Flight to Lukla</h3>
<p>Arrive Kathmandu (1,400 m), pre-trip meeting and gear check. Early next morning fly from Kathmandu to Lukla (2,840 m) for sunrise views. Begin trek with a few hours of walking through rhododendron forests to Phakding (2,650 m).</p>

<h3>Day 3: Phakding to Namche Bazaar</h3>
<p>Trek from Phakding to Namche Bazaar (3,440 m). Cross several high suspension bridges over the Dudh Kosi River. Overnight in Namche Bazaar (ideal acclimatization stop).</p>

<h3>Day 4: Acclimatization in Namche</h3>
<p>Hike to the Everest View Hotel (3,880 m) for panoramic Everest vistas, then return to Namche. This rest day (and gentle side hike) helps prevent altitude sickness.</p>

<h3>Day 5: Namche to Tengboche</h3>
<p>Trek from Namche Bazaar to Tengboche (3,860 m). The trail ascends through forests, with stops at prayer wheels and chortens. Arrive at Tengboche monastery with stunning views of Everest, Lhotse and Ama Dablam.</p>

<h3>Day 6: Tengboche to Dingboche</h3>
<p>Trek to Dingboche (4,410 m). You pass the village of Debuche, then climb gradually into the high alpine. Dingboche is a Sherpa farming village famous for 360-degree mountain views.</p>

<h3>Day 7: Acclimatization in Dingboche</h3>
<p>Optional hike to Nangkartshang Peak (~5,083 m) or around the village. This "climb high, sleep low" strategy lets your body adjust before higher altitudes.</p>

<h3>Day 8: Dingboche to Lobuche</h3>
<p>A shorter hike to Lobuche (4,940 m). The trail zig-zags through rocky moraine, offering views of Pumori, Lingtren and Nuptse. One of the last teahouses before base camp.</p>

<h3>Day 9: Everest Base Camp</h3>
<p>Start early and hike via the Khumbu Glacier to reach Everest Base Camp (5,364 m) around midday. Stand on the EBC rock amidst fluttering prayer flags - an unforgettable moment. After photos, descend to Gorak Shep (5,190 m) for overnight.</p>

<h3>Day 10: Kala Patthar & Descent</h3>
<p>Pre-dawn hike up Kala Patthar (5,555 m) for sunrise on Everest. Then descend past Lobuche and Thukla Pass back down to Pheriche (4,280 m) for the night.</p>

<h3>Day 11: Return to Namche</h3>
<p>Trek from Pheriche back down through Tengboche and Namche, staying overnight in Namche Bazaar (3,440 m). Enjoy a final evening at this lively Sherpa town.</p>

<h3>Day 12: Namche to Lukla</h3>
<p>Cross many suspension bridges and descend steadily through jungle. Arrive in Lukla village by afternoon and celebrate the trek''s end.</p>

<h3>Day 13: Fly to Kathmandu</h3>
<p>Fly from Lukla to Kathmandu. (If weather cancels flights, Yeti Routes arranges backup options.) Enjoy a hot shower and farewell dinner.</p>

<h3>Day 14: Departure</h3>
<p>Final airport transfer. Trek ends.</p>

<h2>Packing Essentials</h2>
<p>Pack layers: moisture-wicking base layers, insulating fleece/down jacket, waterproof shell. Bring sturdy hiking boots, 4-season sleeping bag (-10 to -15C), 30-40L daypack, trekking poles, headlamp, and high-SPF sunscreen. Carry $150-200 USD for extras like hot showers, tips, and snacks.</p>',

    `highlights` = '[
        "Lukla Mountain Flight - Thrilling 30-40 minute flight with aerial views of Himalayan peaks",
        "Sherpa Culture in Namche Bazaar - The bustling Sherpa capital with shops, cafes, and Everest museums",
        "Tengboche Monastery - Spiritual highlight with morning chants and stunning Himalayan backdrop",
        "Everest Base Camp (5,364m) - Stand at the foot of the world''s highest mountain",
        "Kala Patthar Sunrise (5,555m) - The most famous view of Everest, Lhotse, and Ama Dablam",
        "Panoramic Vistas - Jaw-dropping views of glaciers, Nuptse, Pumori, and the Khumbu Icefall",
        "Suspension Bridges - Cross thrilling bridges over the Dudh Kosi River",
        "Teahouse Experience - Evening meals with fellow trekkers under candlelight"
    ]',

    `inclusions` = '[
        "3-star hotel accommodation in Kathmandu (2 nights)",
        "Mountain lodge/teahouse accommodation during trek (twin-share)",
        "All meals during trek (breakfast, lunch, dinner)",
        "Purified drinking water on trail",
        "Domestic flights: Kathmandu-Lukla-Kathmandu",
        "All airport and hotel transfers",
        "Licensed English-speaking guide (first-aid trained)",
        "Porter service (1 porter per 2 trekkers, max 20kg each)",
        "Sagarmatha National Park entry permit",
        "Pasang Lhamu rural municipality permit",
        "TIMS trekking permit",
        "Group first aid kit with oxygen and oximeter",
        "Duffel bag for trek use",
        "All government taxes and service charges"
    ]',

    `exclusions` = '[
        "Nepal visa fee (~$30 USD for 15 days)",
        "Travel insurance (mandatory - must cover helicopter rescue)",
        "International airfare to/from Nepal",
        "Personal gear and equipment rentals",
        "Hot showers at teahouses ($2-3 per shower)",
        "WiFi and charging ($2-3 per charge)",
        "Alcoholic beverages and soft drinks",
        "Personal expenses and souvenirs",
        "Tips for guides (~$8-10/day) and porters (~$4-6/day)",
        "Emergency helicopter evacuation (covered by insurance)"
    ]',

    `emergency_contact_info` = 'Yeti Routes 24/7 Emergency: +977-9841234567. Nearest hospital: Khunde Hospital (Namche area). Helicopter evacuation available within 2-4 hours.',
    `nearest_hospital` = 'Khunde Hospital, Namche Bazaar area',

    `is_featured` = 1,
    `meta_title` = 'Everest Base Camp Trek - 14 Days | Best EBC Trek Package | Yeti Routes',
    `meta_description` = 'Trek to Everest Base Camp (5,364m) with experienced Sherpa guides. 14-day adventure includes Kala Patthar sunrise, Tengboche Monastery, and authentic teahouse experience. Book now!',
    `is_active` = 1

WHERE `id` = 1;

-- Step 3: Verify the update
SELECT id, title, slug, difficulty, duration_days, max_altitude_meters, is_featured
FROM routes
WHERE id = 1 OR slug LIKE '%everest-base-camp%';
