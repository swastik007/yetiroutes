-- ============================================================
-- Yeti Routes Content Population — PART 4: Itineraries
-- INSERT into route_itineraries for all routes missing data
-- Also COMPLETE partial data for routes 1, 2, 3, 4
-- ============================================================
SET NAMES utf8mb4;

-- ============================================================
-- Route 1: Everest Base Camp Trek (14 days) — full insert
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(1, 1, 'Fly to Lukla, Trek to Phakding', 'Board an early morning scenic mountain flight from Kathmandu to Lukla (2,840m) — one of the world\'s most thrilling short runways. Meet your trek crew and begin walking through Dudh Koshi valley, passing chortens and mani walls, descending gently to the riverside tea houses of Phakding.', 2652, 0),
(1, 2, 'Phakding to Namche Bazaar', 'Cross several suspension bridges festooned with prayer flags as the trail climbs through pine forest and dramatic gorges. After the final steep 600m climb you reach Namche Bazaar — the vibrant Sherpa capital at 3,440m. First views of Everest and Lhotse on a clear day.', 3440, 0),
(1, 3, 'Acclimatization Day in Namche Bazaar', 'A rest day essential for altitude adaptation. Take an acclimatization hike up to the Everest View Hotel (3,880m) for your first full view of Everest, Lhotse, Ama Dablam, and Thamserku. Browse Namche\'s Saturday market and explore its bakeries, cafes, and trekking shops.', 3440, 1),
(1, 4, 'Namche Bazaar to Tengboche', 'Traverse high above the Dudh Koshi on a breathtaking contour trail with constant Ama Dablam views. Descend to the river and climb through rhododendron forest to the famous Tengboche Monastery — the spiritual heart of the Khumbu — dramatically set against Ama Dablam\'s spire.', 3870, 0),
(1, 5, 'Tengboche to Dingboche', 'Pass through the stone villages of Pangboche and Shomare as the vegetation thins and the high-altitude landscape opens up. Arrive in Dingboche, a wide flat valley surrounded by towering peaks including Lhotse\'s immense south face.', 4410, 0),
(1, 6, 'Acclimatization Day in Dingboche', 'Second critical acclimatization rest day. Hike up to the ridge above Dingboche (approx. 5,100m) for extraordinary views of Makalu, Baruntse, and Island Peak. Return for lunch and an afternoon rest before tomorrow\'s higher terrain.', 4410, 1),
(1, 7, 'Dingboche to Lobuche', 'Trek across the moraine of the Khumbu Glacier past the poignant memorial chortens for mountaineers who lost their lives on Everest. The landscape becomes stark and lunar as you arrive at Lobuche — a collection of tea houses in a narrow valley beneath Lobuche Peak.', 4910, 0),
(1, 8, 'Lobuche to Gorak Shep and Everest Base Camp', 'Walk across the rough lateral moraine of the Khumbu Glacier to the highest tea houses in the world at Gorak Shep (5,164m). After lunch make the iconic 2-hour walk across glacial rubble to Everest Base Camp (5,364m) — stand at the foot of the world\'s highest mountain. Return to Gorak Shep.', 5164, 0),
(1, 9, 'Kala Patthar Sunrise, Trek to Pheriche', 'Rise at 4am to climb Kala Patthar (5,545m) before dawn. Watch the sun turn Everest\'s summit pyramid gold as it rises above the horizon — the quintessential Himalayan moment. Descend all the way to Pheriche for a well-earned rest and hearty meal.', 4371, 0),
(1, 10, 'Pheriche to Namche Bazaar', 'A long but rewarding descent through familiar terrain, dropping over 900 vertical metres. The body feels stronger at lower altitude. Stop at Tengboche for lunch and enjoy the downhill trail through rhododendron forest back to Namche.', 3440, 0),
(1, 11, 'Namche Bazaar to Lukla', 'The final trekking day follows the river downhill through Phakding back to the busy mountain airstrip town of Lukla. Celebrate over dinner with your guide and porter crew.', 2840, 0),
(1, 12, 'Fly Lukla to Kathmandu', 'Morning flight back to Kathmandu (weather permitting). Arrive to the warmth of the city, hot shower, and the welcome comfort of a real bed. Transfer to your hotel.', 1400, 0),
(1, 13, 'Kathmandu — Rest and Sightseeing', 'Free day to explore Kathmandu: visit Thamel, Boudhanath Stupa, or the Pashupatinath temple complex. Optional Yeti Routes-arranged cultural tours available. Farewell dinner with your guide.', 1400, 0),
(1, 14, 'Departure', 'Transfer to Tribhuvan International Airport for your onward flight. Your Everest adventure ends here — with memories that will last a lifetime.', 1400, 0);

-- ============================================================
-- Route 2: Annapurna Circuit Trek (16 days) — complete missing days
-- Existing: days 1,2,3,4,5,9. Insert missing: 6,7,8,10,11,12,13,14,15,16
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(2, 6, 'Manang to Yak Kharka', 'Leave the last significant settlement behind and trek through high-altitude scrub into the barren upper valley. The trail follows the Marsyangdi river upstream past grazing yaks to the simple tea houses of Yak Kharka. Views of Chulu East and West peaks are excellent.', 4018, 0),
(2, 7, 'Yak Kharka to Thorong High Camp', 'A short but important acclimatization walk to the tea houses just below the Thorong La approach. Arrive early, rest thoroughly, and eat well. Tomorrow is the biggest day of the circuit — prepare gear, headlamps, and warm layers the evening before.', 4925, 0),
(2, 8, 'Rest/Buffer Day at Thorong High Camp', 'Optional rest day to acclimatize fully before the pass crossing. Use the time to hydrate, eat carbohydrate-rich food, and take a short acclimatization stroll above camp. Check weather forecast for pass conditions.', 4925, 1),
(2, 10, 'Muktinath to Marpha via Jomsom', 'Descend the dramatic Mustang plateau landscape to the holy town of Jomsom and continue to the apple orchards of Marpha. The katabatic winds of the Kali Gandaki typically kick in by midday — aim to be off the trail early. Enjoy Marpha\'s famous apple brandy and cider in the evening.', 2665, 0),
(2, 11, 'Marpha to Kalopani', 'Follow the Kali Gandaki river — the world\'s deepest gorge — through Tibetan-influenced villages. Dhaulagiri (8,167m) and Annapurna I (8,091m) loom above on either side, making this one of the most dramatic single-day stages of any trek in Nepal.', 2530, 0),
(2, 12, 'Kalopani to Tatopani', 'Descend through subtropical forests back to the warmth of lower valleys. Tatopani means "hot water" — reward yourself with a long soak in the famous natural hot springs on the banks of the Kali Gandaki after days of high-altitude trekking.', 1190, 0),
(2, 13, 'Tatopani to Ghorepani', 'A steep 1,700m climb through dense rhododendron forest — demanding but beautiful, especially in spring. Arrive at Ghorepani with energy for sunset views from the ridge above if the clouds cooperate.', 2874, 0),
(2, 14, 'Poon Hill Sunrise, Trek to Nayapul', 'Rise at dawn for the short climb to Poon Hill (3,210m) — one of Nepal\'s most celebrated sunrise viewpoints. Watch the full Annapurna and Dhaulagiri ranges light up at first light. Descend through Ghandruk to Nayapul and drive to Pokhara.', 820, 0),
(2, 15, 'Pokhara to Kathmandu', 'Drive or fly from Pokhara to Kathmandu. The scenic Prithvi Highway follows the river valleys and offers mountain glimpses on clear days. Afternoon at leisure in Kathmandu.', 1400, 0),
(2, 16, 'Departure', 'Transfer to Tribhuvan International Airport for your onward journey. The Annapurna Circuit — one of the world\'s great walks — is complete.', 1400, 0);

-- ============================================================
-- Route 3: Langtang Valley Trek (10 days) — complete missing days 5–10
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(3, 5, 'Acclimatization Day at Kyanjin Gompa', 'Rest and acclimatize at Kyanjin Gompa. Hike up Kyanjin Ri (4,773m) for a stunning 360° panorama of Langtang Lirung (7,227m), Langtang II, Dorje Lakpa, and the broad Langtang Glacier. The yak cheese dairy here is worth a visit. Return to Kyanjin for the night.', 3870, 1),
(3, 6, 'Kyanjin Gompa to Lama Hotel', 'Begin the return journey, descending back through Langtang Village and the beautiful rhododendron and bamboo forests. The trail feels easier on the way down and the lower altitude brings renewed energy. Lama Hotel sits beside a tumbling mountain stream.', 2470, 0),
(3, 7, 'Lama Hotel to Syabrubesi', 'Complete the valley descent back to the road-head at Syabrubesi. Cross the roaring Langtang Khola and pass through scattered villages as the forest thickens and the air warms. Afternoon free in Syabrubesi.', 1503, 0),
(3, 8, 'Drive Syabrubesi to Kathmandu', 'Bumpy but scenic 7–8 hour drive back to Kathmandu through forested hills, river valleys, and mountain towns. Arrive in Kathmandu by late afternoon. Hotel check-in and rest.', 1400, 0),
(3, 9, 'Kathmandu — Rest and Sightseeing', 'Free day in Kathmandu. Optional visits to Boudhanath Stupa, Pashupatinath Temple, or Thamel. Yeti Routes farewell dinner with your guide in the evening.', 1400, 0),
(3, 10, 'Departure', 'Transfer to Tribhuvan International Airport for your onward flight. Langtang Valley — the valley of glaciers — will stay with you long after you leave.', 1400, 0);

-- ============================================================
-- Route 4: Manaslu Circuit Trek (14 days) — full insert
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(4, 1, 'Drive Kathmandu to Soti Khola', 'Early morning drive along the Prithvi Highway and then up the Budhi Gandaki river valley to the dusty road-head at Soti Khola. The drive takes around 7 hours through increasingly dramatic gorge scenery.', 700, 0),
(4, 2, 'Soti Khola to Machha Khola', 'First full day of trekking along the Budhi Gandaki river on a trail through rice paddies, subtropical forest, and small farming villages. Cross several suspension bridges as the valley narrows.', 869, 0),
(4, 3, 'Machha Khola to Jagat', 'The trail climbs steadily through more remote terrain past waterfalls and cliff-face trails. Jagat is the checkpoint where Manaslu Restricted Area permits are verified. Enjoy the first distant views of the Himalayan peaks ahead.', 1410, 0),
(4, 4, 'Jagat to Deng', 'Pass through Philim village — an important cultural gateway — and enter progressively wilder landscape. The valley narrows and the trail crosses and re-crosses the river. Deng sits at a widening of the valley with good mountain views.', 1804, 0),
(4, 5, 'Deng to Namrung', 'Trek through the gorge past the dramatic side valley leading toward Tibet. The culture shifts noticeably — mani walls, gompas, and prayer flags indicate the increasing Tibetan Buddhist influence. First views of Manaslu\'s upper slopes begin to appear.', 2630, 0),
(4, 6, 'Namrung to Samagaon via Lho', 'Pass through Lho village for spectacular close-up views of Manaslu\'s north face — one of the most dramatic mountain faces in the Himalayas. Descend slightly to Samagaon, a large Tibetan-origin village with an ancient gompa.', 3530, 0),
(4, 7, 'Acclimatization Day in Samagaon', 'Essential acclimatization rest day. Optional day hike toward Manaslu Base Camp (4,480m) for outstanding close-up views of the 8,163m summit. Explore Samagaon\'s gompa and interact with local Nubri people.', 3530, 1),
(4, 8, 'Samagaon to Samdo', 'Short but important ascent to the last permanent settlement before the high pass. Samdo sits in an open valley close to the Tibetan border. Cold nights here prepare the body for the pass crossing.', 3875, 0),
(4, 9, 'Samdo to Dharamsala (Larkya Phedi)', 'Climb to the base camp for the Larkya La crossing. Dharamsala means "resting place" — it\'s a small collection of tea houses at the foot of the pass. Arrive early in the afternoon, rest well, eat a big dinner, and prepare for a very early start.', 4460, 0),
(4, 10, 'Cross Larkya La Pass (5,160m) to Bimthang', 'Start well before dawn (3–4am) to cross the Larkya La in good conditions. The ascent is steep and the pass high, but the views of Manaslu, Himlung, Cheo, Annapurna II and Lamjung Himal on the descent are staggering. A long, glorious day ending at flower-filled Bimthang.', 3590, 0),
(4, 11, 'Bimthang to Tilje', 'Descend rapidly from the high-altitude world through rhododendron forest and past yak pastures. The Dudh Khola river valley opens up and warmth returns. Tilje is a small but welcoming settlement.', 2300, 0),
(4, 12, 'Tilje to Dharapani', 'Complete the descent to the main Annapurna Circuit trailhead at Dharapani, joining the paved road. The Manaslu Circuit is complete. Drive begins back toward Besisahar and Kathmandu.', 1960, 0),
(4, 13, 'Drive to Kathmandu', 'Full-day drive through the Marsyangdi river valley and back along the Prithvi Highway to Kathmandu. Arrive in the evening. Hotel check-in, hot shower, and well-deserved rest.', 1400, 0),
(4, 14, 'Departure', 'Transfer to Tribhuvan International Airport. The Manaslu Circuit — one of Nepal\'s most rewarding and least-commercialised treks — is complete.', 1400, 0);

-- ============================================================
-- Route 20: EBC Trek duplicate — same itinerary as route 1
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(20, 1, 'Fly to Lukla, Trek to Phakding', 'Board an early morning scenic mountain flight from Kathmandu to Lukla (2,840m). Meet your trek crew and begin walking through Dudh Koshi valley past chortens and mani walls to the riverside tea houses of Phakding.', 2652, 0),
(20, 2, 'Phakding to Namche Bazaar', 'Cross suspension bridges through pine forest and dramatic gorges. After the final steep 600m climb you reach Namche Bazaar — the Sherpa capital. First views of Everest on a clear day.', 3440, 0),
(20, 3, 'Acclimatization Day in Namche Bazaar', 'Acclimatization hike to Everest View Hotel (3,880m) for a full view of Everest, Lhotse, and Ama Dablam. Browse Namche\'s famous Saturday market and explore the town.', 3440, 1),
(20, 4, 'Namche Bazaar to Tengboche', 'High contour trail with constant Ama Dablam views, descend to the river and climb through rhododendron forest to Tengboche Monastery — the spiritual heart of the Khumbu.', 3870, 0),
(20, 5, 'Tengboche to Dingboche', 'Pass through Pangboche and Shomare as vegetation thins. Arrive in the wide flat Dingboche valley beneath Lhotse\'s immense south face.', 4410, 0),
(20, 6, 'Acclimatization Day in Dingboche', 'Hike up to the ridge above Dingboche (~5,100m) for views of Makalu, Baruntse, and Island Peak. Essential for altitude adaptation before the higher terrain ahead.', 4410, 1),
(20, 7, 'Dingboche to Lobuche', 'Trek across the moraine past the mountaineers\' memorial chortens. The landscape becomes stark and lunar as you reach Lobuche beneath its namesake peak.', 4910, 0),
(20, 8, 'Lobuche to Gorak Shep and Everest Base Camp', 'Walk across glacial moraine to Gorak Shep (5,164m), then the iconic walk to Everest Base Camp (5,364m). Stand at the foot of the world\'s highest mountain. Return to Gorak Shep.', 5164, 0),
(20, 9, 'Kala Patthar Sunrise, Trek to Pheriche', 'Pre-dawn climb to Kala Patthar (5,545m) for the most famous Everest sunrise photograph on earth. Descend all the way to Pheriche for rest.', 4371, 0),
(20, 10, 'Pheriche to Namche Bazaar', 'Long descent through familiar terrain, dropping 900m. Stop at Tengboche for lunch and continue through rhododendron forest back to Namche.', 3440, 0),
(20, 11, 'Namche Bazaar to Lukla', 'Final trekking day follows the river downhill to Lukla. Celebrate over dinner with your guide and porter crew.', 2840, 0),
(20, 12, 'Fly Lukla to Kathmandu', 'Morning flight back to Kathmandu. Transfer to hotel.', 1400, 0),
(20, 13, 'Kathmandu — Rest and Sightseeing', 'Free day in Kathmandu. Optional cultural tours. Farewell dinner with your guide.', 1400, 0),
(20, 14, 'Departure', 'Transfer to Tribhuvan International Airport. Your Everest adventure is complete.', 1400, 0);

-- ============================================================
-- Route 22: Gokyo Lakes & Gokyo Ri Trek (12 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(22, 1, 'Fly to Lukla, Trek to Phakding', 'Morning mountain flight Kathmandu–Lukla (2,840m). Begin the trek down through the Dudh Koshi gorge to Phakding, passing the first mani walls and prayer flags of the Khumbu.', 2652, 0),
(22, 2, 'Phakding to Namche Bazaar', 'Cross suspension bridges over the roaring Dudh Koshi and climb steeply to Namche Bazaar, the gateway to the Everest region. First glimpse of Everest on a clear day.', 3440, 0),
(22, 3, 'Acclimatization in Namche Bazaar', 'Essential rest day. Hike to Everest View Hotel (3,880m) for panoramic views of Everest, Lhotse, and Ama Dablam. Explore Namche\'s monastery, museum, and lively market.', 3440, 1),
(22, 4, 'Namche to Dole via Mong La', 'Leave the main EBC trail and take the quieter Gokyo route, climbing through juniper and rhododendron forest via Mong La viewpoint. Dole sits in open terrain above the treeline.', 4038, 0),
(22, 5, 'Dole to Machherma', 'Continue up the broad valley through yak pastures and stone herders\' huts. Machherma is a small settlement famous in local lore for a legendary yeti encounter. Views of Cho Oyu appear.', 4410, 0),
(22, 6, 'Machherma to Gokyo', 'Reach the shores of the first Gokyo Lake and continue to the iconic blue-green waters of the third lake (Dudh Pokhari) at Gokyo village. The Ngozumpa Glacier — Nepal\'s largest — fills the horizon.', 4790, 0),
(22, 7, 'Gokyo Ri Summit and Lake Exploration', 'Pre-dawn climb to Gokyo Ri (5,357m) for one of Nepal\'s finest mountain panoramas — four 8,000m giants visible including Everest, Lhotse, Makalu, and Cho Oyu. Afternoon: explore the 4th and 5th Gokyo Lakes if energy permits.', 4790, 1),
(22, 8, 'Gokyo to Namche Bazaar', 'Begin the return journey, descending back along the western Gokyo valley. Long but mostly downhill day returning to the warmth and comfort of Namche Bazaar.', 3440, 0),
(22, 9, 'Namche Bazaar to Lukla', 'Final day of trekking follows the river trail back down through Phakding to Lukla. Farewell dinner with your crew.', 2840, 0),
(22, 10, 'Fly Lukla to Kathmandu', 'Morning flight back to Kathmandu. Hotel check-in, hot shower, and rest.', 1400, 0),
(22, 11, 'Kathmandu Sightseeing', 'Free day: Boudhanath Stupa, Pashupatinath, or Thamel shopping. Optional Yeti Routes-arranged city tour.', 1400, 0),
(22, 12, 'Departure', 'Transfer to Tribhuvan International Airport for your onward journey.', 1400, 0);

-- ============================================================
-- Route 23: Ama Dablam Base Camp Trek (12 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(23, 1, 'Fly to Lukla, Trek to Phakding', 'Mountain flight Kathmandu–Lukla. First steps on the trail through the Dudh Koshi gorge to Phakding.', 2652, 0),
(23, 2, 'Phakding to Namche Bazaar', 'Dramatic trail through forests and gorges to Namche Bazaar, the Everest region\'s hub.', 3440, 0),
(23, 3, 'Acclimatization Day in Namche Bazaar', 'Rest day with acclimatization hike to Everest View Hotel. Explore Namche\'s vibrant market.', 3440, 1),
(23, 4, 'Namche Bazaar to Tengboche', 'High-contour trail with extraordinary Ama Dablam views. Arrive at Tengboche Monastery in the late afternoon.', 3870, 0),
(23, 5, 'Tengboche to Dingboche', 'Trek past Pangboche through the upper Imja Khola valley to Dingboche, surrounded by 7,000m peaks.', 4410, 0),
(23, 6, 'Acclimatization Day in Dingboche', 'Altitude adaptation day. Hike the ridge above Dingboche for views of Makalu and Island Peak. Rest in the afternoon.', 4410, 1),
(23, 7, 'Dingboche to Ama Dablam Base Camp', 'Leave the main EBC trail and take the trail toward the south-west face of Ama Dablam. The base camp sits in a dramatic cirque directly below the hanging glacier that makes Ama Dablam so distinctive. Spectacular close-up photography.', 4570, 0),
(23, 8, 'Explore Ama Dablam BC, Return to Dingboche', 'Morning exploration around the base camp area with views of climbing routes on the mountain\'s ridges. Return to Dingboche for the night, enjoying the altitude gain benefits.', 4410, 0),
(23, 9, 'Dingboche to Namche Bazaar', 'Long but downhill return day via Tengboche. The descent is rapid and energising.', 3440, 0),
(23, 10, 'Namche Bazaar to Lukla', 'Final trekking day down to Lukla. Celebration dinner with crew.', 2840, 0),
(23, 11, 'Fly Lukla to Kathmandu', 'Morning flight back to Kathmandu.', 1400, 0),
(23, 12, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- ============================================================
-- Route 25: Annapurna Base Camp Trek (10 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(25, 1, 'Drive Kathmandu to Pokhara', 'Scenic 6–7 hour drive along the Prithvi Highway following river valleys to Pokhara, Nepal\'s second city and the base for Annapurna treks. Evening stroll along Phewa Lake.', 820, 0),
(25, 2, 'Pokhara to Ulleri via Nayapul', 'Drive to Nayapul and begin trekking through Birethanti into Gurung country. The day ends with the punishing 3,000-step stone staircase up to Ulleri — a genuinely tough introduction to the trek.', 2073, 0),
(25, 3, 'Ulleri to Ghorepani', 'Continue climbing through dense rhododendron forest (spectacular in bloom March–April) to Ghorepani — a ridge-top village with sweeping Himalayan views and the start of the famous Poon Hill trail.', 2874, 0),
(25, 4, 'Poon Hill Sunrise, Trek to Chhomrong', 'Pre-dawn climb to Poon Hill (3,210m) for sunrise over Dhaulagiri and Annapurna. Descend via Tadapani through diverse forest zones to the large Gurung village of Chhomrong — the last major settlement before the Annapurna Sanctuary.', 2170, 0),
(25, 5, 'Chhomrong to Dovan via Sinuwa', 'Enter the gorge leading into the Annapurna Sanctuary. The trail descends steeply into the Modi Khola gorge then climbs back up through dense forest. The walls close in as you enter the famous Annapurna "bamboo zone."', 2600, 0),
(25, 6, 'Dovan to Machhapuchhre Base Camp', 'Trek out of the dense forest into open alpine terrain. The sacred Machhapuchhre (6,993m) — whose summit has never been climbed — towers directly above. MBC offers the first unobstructed views into the sanctuary.', 3700, 0),
(25, 7, 'MBC to Annapurna Base Camp', 'The final approach to the sanctuary. Walk across glacial moraines and boulder fields into the extraordinary 360° amphitheatre of Annapurna Base Camp (4,130m), encircled by Annapurna I, II, III, IV, South, Machhapuchhre, Gangapurna, and Hiunchuli. A genuinely humbling experience.', 4130, 0),
(25, 8, 'ABC to Bamboo', 'Begin the descent, taking in the sanctuary views for the last time. Descend rapidly through MBC and back into the forest zone, reaching Bamboo by early afternoon.', 2310, 0),
(25, 9, 'Bamboo to Jhinu Danda Hot Spring, Drive to Pokhara', 'Descend to Jhinu Danda and soak in the famous natural hot springs on the Modi Khola riverbank — a perfect celebration of completing the trek. Drive or trek to Nayapul and transfer to Pokhara.', 820, 0),
(25, 10, 'Drive Pokhara to Kathmandu or Departure', 'Drive back to Kathmandu or take the morning flight. Tour ends on arrival.', 1400, 0);

-- ============================================================
-- Route 27: North Annapurna Base Camp (9 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(27, 1, 'Drive Kathmandu to Chamje', 'Drive along the Prithvi Highway and up the Marsyangdi valley to Chamje, the starting point for this northern Annapurna approach.', 1430, 0),
(27, 2, 'Chamje to Dharapani', 'Trek upriver through waterfalls and gorge scenery to Dharapani, where the Manaslu and Annapurna Circuit trails diverge.', 1960, 0),
(27, 3, 'Dharapani to Chame', 'Enter the Annapurna Conservation Area. The trail follows the Marsyangdi river through pine and cedar forest with first high-peak views. Chame is the administrative hub of Manang district.', 2670, 0),
(27, 4, 'Chame to Manang', 'One of the great stages of any Himalayan trek — pass the enormous rock face of Paungda Danda, cross the dramatic Upper Pisang ridge, and arrive in Manang with views of the entire Annapurna range.', 3540, 0),
(27, 5, 'Acclimatization Day in Manang', 'Essential rest day before heading higher. Hike to Gangapurna Lake (3,540m) or the Ice Lake (4,600m) for views of Annapurna III and Gangapurna glacier. Attend the daily altitude sickness lecture at the Himalayan Rescue Association clinic.', 3540, 1),
(27, 6, 'Manang to Khangsar', 'Take the high trail north from Manang toward the Tibetan plateau, entering the northern Annapurna approach valley. Khangsar is the last village before the high ground.', 3734, 0),
(27, 7, 'Khangsar to North Annapurna Base Camp Viewpoint', 'Ascend to the spectacular viewpoint area on the north side of the Annapurna massif (approx. 4,500m) with extraordinary views of the northern faces of Annapurna II, III, and IV, plus the Tilicho plateau. Return to Khangsar.', 3734, 0),
(27, 8, 'Khangsar to Manang, Drive toward Kathmandu', 'Return to Manang and begin the drive back down the valley toward Besisahar and Kathmandu.', 760, 0),
(27, 9, 'Arrive Kathmandu or Departure', 'Complete drive to Kathmandu. Tour ends on arrival.', 1400, 0);

-- ============================================================
-- Route 30: Khopra Danda Trek (8 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(30, 1, 'Drive Kathmandu to Pokhara', 'Comfortable drive or flight to Pokhara. Evening lakeside orientation.', 820, 0),
(30, 2, 'Drive to Nayapul, Trek to Tikhedhunga', 'Drive to Nayapul and begin the Annapurna foothills trail through Birethanti. Steady climb to Tikhedhunga.', 1540, 0),
(30, 3, 'Tikhedhunga to Ghorepani', 'Climb the famous stone staircase past Ulleri through stunning rhododendron forest to the ridge-top village of Ghorepani.', 2874, 0),
(30, 4, 'Poon Hill Sunrise, Trek to Swanta', 'Pre-dawn Poon Hill (3,210m) sunrise with Dhaulagiri and Annapurna panorama. Leave the standard trail and descend south to the rarely visited Swanta village, entering Khopra Danda territory.', 2200, 0),
(30, 5, 'Swanta to Khopra Danda', 'Climb steadily through diverse forest and open meadows to the spectacular Khopra Danda ridge (3,660m). The community-run lodge here is one of Nepal\'s most rewarding trekking destinations. Views of Dhaulagiri, Annapurna, and Tukuche Peak are extraordinary.', 3660, 0),
(30, 6, 'Day Hike to Khayer Lake', 'A demanding 840m ascent to the sacred Khayer Lake (4,500m) — a high alpine lake revered by both Hindus and Buddhists. The views from the lake shore are among the finest in the entire Annapurna region. Return to Khopra Danda.', 3660, 1),
(30, 7, 'Khopra Danda to Ghandruk', 'Descend from the ridge through forest to the large Gurung village of Ghandruk — a showcase of traditional Gurung architecture and culture.', 1940, 0),
(30, 8, 'Ghandruk to Nayapul, Drive to Pokhara or Kathmandu', 'Short descent to Nayapul and drive back to Pokhara, then onward to Kathmandu. Tour complete.', 820, 0);

-- ============================================================
-- Route 31: Khayer Lake Trek (9 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(31, 1, 'Drive Kathmandu to Pokhara', 'Drive or fly to Pokhara. Afternoon preparation for the trek.', 820, 0),
(31, 2, 'Drive Pokhara to Beni, Trek to Tatopani', 'Drive to Beni along the Kali Gandaki and trek upstream to the famous hot spring village of Tatopani.', 1190, 0),
(31, 3, 'Tatopani to Chitre', 'Leave the Kali Gandaki and climb into the Annapurna foothills through apple orchards and terraced farmland.', 2390, 0),
(31, 4, 'Chitre to Dagnam', 'Continue climbing through rhododendron and oak forest. Dagnam is a high settlement with first views of the Dhaulagiri massif.', 2800, 0),
(31, 5, 'Dagnam to Khopra Danda', 'Reach the famous Khopra Danda ridge (3,660m) with extraordinary panoramas. Community lodge accommodation.', 3660, 0),
(31, 6, 'Climb to Khayer Lake', 'The main objective of the trek: ascend 840m to the sacred Khayer Lake (4,500m). Circle the lake on the kora path, soak in the spiritual atmosphere, and take in sweeping views of Dhaulagiri, Annapurna, Nilgiri, and Tukuche. Descend to Khopra Danda.', 3660, 0),
(31, 7, 'Khopra Danda to Ghorepani', 'Traverse east along the ridge through Swanta to Ghorepani, completing a beautiful mountain traverse.', 2874, 0),
(31, 8, 'Ghorepani to Nayapul, Drive to Pokhara', 'Poon Hill optional sunrise, then descend through Ghandruk to Nayapul. Drive to Pokhara.', 820, 0),
(31, 9, 'Drive Pokhara to Kathmandu or Departure', 'Drive back to Kathmandu. Tour ends.', 1400, 0);

-- ============================================================
-- Route 32: Upper Mustang Trek (14 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(32, 1, 'Fly Kathmandu to Pokhara', 'Morning flight to Pokhara. Afternoon at leisure by Phewa Lake. Evening briefing and gear check.', 820, 0),
(32, 2, 'Fly Pokhara to Jomsom, Trek to Kagbeni', 'Mountain flight to Jomsom (2,720m) in the Kali Gandaki valley. Trek upriver to the medieval walled village of Kagbeni — the gateway to the Upper Mustang Restricted Area. Permits checked.', 2810, 0),
(32, 3, 'Kagbeni to Chele', 'Enter the restricted zone and begin trekking into the Mustang plateau. The landscape transforms immediately into dramatic red and ochre canyon badlands. Chele is the first Upper Mustang village.', 3050, 0),
(32, 4, 'Chele to Syangboche via Taklam La', 'Cross the Taklam La (3,624m) and Dajori La passes through some of Mustang\'s most dramatic lunar landscape. Syangboche sits in an open valley with ancient cave settlements visible in the cliff faces.', 3800, 0),
(32, 5, 'Syangboche to Ghami', 'Pass through Ghara and cross the Nyi La (4,010m) with sweeping views of the Tibetan plateau landscape. Ghami has one of Mustang\'s longest mani walls.', 3520, 0),
(32, 6, 'Ghami to Tsarang', 'Visit Ghami Monastery and trek through canyon landscapes to Tsarang — an ancient fortified village with a red dzong (castle) perched on the cliff edge. Extraordinary views.', 3620, 0),
(32, 7, 'Tsarang to Lo Manthang', 'The great day: arrive at Lo Manthang — the medieval walled capital of the Mustang Kingdom. Enter through the single gate into a time capsule of Tibetan culture frozen for centuries. Population of around 1,000 people live inside the ancient walls.', 3840, 0),
(32, 8, 'Explore Lo Manthang', 'Full day to explore the extraordinary contents of the walled city: Jampa Lhakhang, Thubchen, and Chodey gompas with their ancient murals; the King\'s palace; narrow lanes and traditional flat-roofed houses.', 3840, 1),
(32, 9, 'Lo Manthang to Drakmar via Namgyal', 'Visit Namgyal and Lo Gekar — the oldest monastery in Mustang — before descending into the dramatic red-cliffed valley of Drakmar. The ancient cave dwellings here are extraordinary.', 3810, 0),
(32, 10, 'Drakmar to Ghami via Charang', 'Return route via the high plateau, passing sky caves and ancient cliff monasteries. The scale of the landscape is immense.', 3520, 0),
(32, 11, 'Ghami to Chuksang via Tangbe', 'Descend through the villages of Tangbe — famous for its white-walled houses and black-and-white-striped chortens — and Chuksang.', 2980, 0),
(32, 12, 'Chuksang to Jomsom via Kagbeni', 'Return through Kagbeni (exiting the restricted area) and continue along the Kali Gandaki to Jomsom. The valley wind can be ferocious in the afternoon.', 2720, 0),
(32, 13, 'Fly Jomsom to Pokhara, Drive to Kathmandu', 'Morning mountain flight Jomsom–Pokhara. Afternoon drive or fly to Kathmandu.', 1400, 0),
(32, 14, 'Departure', 'Transfer to Tribhuvan International Airport. Upper Mustang — the Forbidden Kingdom — has revealed its secrets.', 1400, 0);

-- ============================================================
-- Route 36: Langtang Valley Trek (8 days) — shorter version
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(36, 1, 'Drive Kathmandu to Syabrubesi', '7–8 hour scenic drive through forested hills and river valleys to the road-head at Syabrubesi. Overnight at guesthouse.', 1503, 0),
(36, 2, 'Syabrubesi to Lama Hotel', 'The trail enters Langtang National Park immediately. Trek through rhododendron and bamboo forest along the Langtang Khola river canyon, passing Bamboo, Riverside, and Gumnachowk.', 2470, 0),
(36, 3, 'Lama Hotel to Langtang Village', 'Forest gives way to open yak pastures as the valley widens dramatically. Pass Ghoda Tabela (the old army post) and climb to the rebuilt Langtang Village — devastated in the 2015 earthquake and reconstructed by the community.', 3430, 0),
(36, 4, 'Langtang Village to Kyanjin Gompa', 'Trek across open moraine and yak pastures to the beautiful Kyanjin Gompa monastery at the head of the valley. Langtang Lirung (7,227m) rises directly above. Visit the famous yak cheese dairy.', 3870, 0),
(36, 5, 'Acclimatization Day at Kyanjin Gompa', 'Hike up Kyanjin Ri (4,773m) for a 360° panorama of Langtang Lirung, Langtang II, and Dorje Lakpa. Alternatively explore the Langshisha Kharka valley. Visit the ancient Kyanjin Gompa monastery.', 3870, 1),
(36, 6, 'Kyanjin Gompa to Lama Hotel', 'Begin the return descent through Langtang Village and the rhododendron and bamboo forest zones. The descent is rapid and enjoyable.', 2470, 0),
(36, 7, 'Lama Hotel to Syabrubesi, Drive toward Kathmandu', 'Complete the descent to Syabrubesi and begin the long drive back toward Kathmandu.', 1400, 0),
(36, 8, 'Arrival Kathmandu or Departure', 'Arrive in Kathmandu or transfer to airport.', 1400, 0);

-- ============================================================
-- Route 37: Langtang Gosainkunda Trek (15 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(37, 1, 'Drive Kathmandu to Syabrubesi', 'Drive through forested hills to Syabrubesi, the gateway to Langtang National Park.', 1503, 0),
(37, 2, 'Syabrubesi to Lama Hotel', 'Trek through the lower Langtang gorge through bamboo and rhododendron forest.', 2470, 0),
(37, 3, 'Lama Hotel to Langtang Village', 'Valley opens to wide yak pastures. Trek to the rebuilt Langtang Village.', 3430, 0),
(37, 4, 'Langtang Village to Kyanjin Gompa', 'Trek across open moraine to the monastery at the head of the valley.', 3870, 0),
(37, 5, 'Acclimatization Day at Kyanjin Gompa', 'Day hike up Kyanjin Ri (4,773m) for spectacular Langtang Lirung panorama.', 3870, 1),
(37, 6, 'Kyanjin Gompa to Lama Hotel', 'Rapid descent through the Langtang Valley to Lama Hotel.', 2470, 0),
(37, 7, 'Lama Hotel to Thulo Syabru', 'Branch off the main trail and climb through forest to the large village of Thulo Syabru, perched on a spur with wide valley views.', 2212, 0),
(37, 8, 'Thulo Syabru to Sing Gompa', 'A steady climb through forest past cheese factories and yak pastures to the cluster of lodges at Sing Gompa, beneath a beautiful old monastery.', 3330, 0),
(37, 9, 'Sing Gompa to Lauribinayak', 'Climb through forests and across open ridges to the high camp below Lauribinayak pass. The Himalayan panorama from this ridge is extraordinary.', 4610, 0),
(37, 10, 'Cross Lauribinayak Pass (4,610m) to Gosainkunda', 'The high point of the trek. Cross the Lauribinayak ridge and descend to the sacred Gosainkunda Lake (4,380m) — the spiritual centrepiece of this trek. The lake is revered in both Hindu and Buddhist traditions. Camp or lodge.', 4380, 0),
(37, 11, 'Gosainkunda to Ghopte via Lauribinayak', 'Descend the eastern side of the ridge through high rhododendron and bamboo forest to Ghopte.', 3430, 0),
(37, 12, 'Ghopte to Melamchi Pul Bazaar', 'Long descent through the Melamchi valley back to the valley floor and the road at Melamchi Pul.', 823, 0),
(37, 13, 'Drive Melamchi Pul to Kathmandu', 'Drive back to Kathmandu through the hills. Arrive by late afternoon.', 1400, 0),
(37, 14, 'Kathmandu Rest and Sightseeing', 'Free day in Kathmandu for final sightseeing, shopping, or relaxation.', 1400, 0),
(37, 15, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- ============================================================
-- Route 39: Panch Pokhari Trek (8 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(39, 1, 'Drive Kathmandu to Babare (Sindhupalchowk)', 'Drive northeast from Kathmandu along the Araniko Highway to Babare, the starting point.', 1000, 0),
(39, 2, 'Babare to Mahankal Bhanjyang', 'Trek through traditional villages and terraced farmland, climbing steadily toward the ridgeline.', 1800, 0),
(39, 3, 'Mahankal Bhanjyang to Thotane', 'Cross the ridge and descend into the Panch Pokhari valley. The forest becomes denser with rhododendron at higher elevations.', 2750, 0),
(39, 4, 'Thotane to Panch Pokhari', 'Final ascent to the five sacred alpine lakes of Panch Pokhari (4,100m). The approach reveals increasingly dramatic mountain views as the tree line recedes.', 4100, 0),
(39, 5, 'Explore Panch Pokhari', 'Explore all five sacred lakes. The largest lake has a small shrine visited by Hindu pilgrims during Janai Purnima festival. Views of the Jugal Himal and distant Everest. Rest and acclimatize.', 4100, 1),
(39, 6, 'Return to Thotane', 'Begin the return descent back through the forest zones.', 2750, 0),
(39, 7, 'Thotane to Babare, Drive toward Kathmandu', 'Complete descent to road-head and drive back.', 1000, 0),
(39, 8, 'Arrival Kathmandu or Departure', 'Arrive in Kathmandu or transfer to airport.', 1400, 0);

-- ============================================================
-- Route 41: Tsho Rolpa Lake Trek (12 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(41, 1, 'Drive Kathmandu to Singati Bazaar (Dolakha)', 'Drive east toward Dolakha district to the road-head at Singati Bazaar. The drive takes around 5–6 hours.', 1150, 0),
(41, 2, 'Singati Bazaar to Gongar', 'Begin trekking up the Rolwaling valley through subtropical forest and scattered settlements.', 1450, 0),
(41, 3, 'Gongar to Simigaon', 'Trek through rice terraces and forest to the traditional Tamang village of Simigaon with views toward the high mountains ahead.', 2005, 0),
(41, 4, 'Simigaon to Dongang', 'The trail climbs more steeply into the Rolwaling Valley. The landscape becomes increasingly alpine and remote.', 2850, 0),
(41, 5, 'Dongang to Beding', 'Enter the heart of the Rolwaling Valley and reach Beding — a remarkable Tibetan-origin community at the foot of the high peaks. The village has an ancient gompa and warm hospitality.', 3693, 0),
(41, 6, 'Acclimatization Day in Beding', 'Rest and acclimatize. Day hike toward the Drangka Glacier or Rolwaling peaks. Explore Beding\'s monastery and learn about the unique Sherpa-Tibetan culture of this remote valley.', 3693, 1),
(41, 7, 'Beding to Na', 'Trek further up the valley through open yak pastures to the summer herding settlement of Na. The glacial peaks are now very close.', 4183, 0),
(41, 8, 'Day Hike to Tsho Rolpa Lake', 'A challenging day hike to Tsho Rolpa (4,580m), one of Nepal\'s largest glacial lakes. The turquoise water fills a dramatic glacial basin. Return to Na for the night.', 4183, 0),
(41, 9, 'Na to Beding', 'Return through the valley, the altitude descent bringing renewed energy.', 3693, 0),
(41, 10, 'Beding to Simigaon', 'Descend back through the lower valley.', 2005, 0),
(41, 11, 'Simigaon to Singati, Drive toward Kathmandu', 'Complete the descent and begin the drive back.', 1150, 0),
(41, 12, 'Arrival Kathmandu or Departure', 'Arrive Kathmandu or transfer to airport.', 1400, 0);

-- ============================================================
-- Route 43: Rara Lake Trek (10 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(43, 1, 'Fly Kathmandu to Jumla', 'Scenic mountain flight to Jumla (2,370m) in Nepal\'s far west. One of the most dramatic short flights in Nepal. Afternoon orientation in Jumla town.', 2370, 0),
(43, 2, 'Jumla to Khali', 'Begin the trek through pine and juniper forest, climbing steadily northwest toward Rara National Park.', 2830, 0),
(43, 3, 'Khali to Sinja (Sinja Valley)', 'Trek through the historic Sinja Valley — the ancient capital of the medieval Khas Kingdom where Nepali language originated. Pass ancient ruins and traditional villages.', 2450, 0),
(43, 4, 'Sinja to Jaljala', 'Cross the Jaljala Pass (3,770m) with panoramic views of far-western Nepal\'s peaks. Descend toward the Rara basin.', 3770, 0),
(43, 5, 'Jaljala to Rara Lake', 'Descend through pristine forests to the shores of Rara Lake (2,990m) — Nepal\'s largest lake. The colour of the water changes throughout the day from deep blue to turquoise to silver. Lodge accommodation near the lake shore.', 2990, 0),
(43, 6, 'Rest and Explore Rara Lake', 'Full day to explore the lake and Rara National Park. Trek the kora (circumambulation) around the lake shores through mixed forest. Birdwatching: 214 bird species recorded. Wildlife: red deer, langur monkey, bear.', 2990, 1),
(43, 7, 'Rara to Pina', 'Begin the return via a different route through the national park to the village of Pina.', 2423, 0),
(43, 8, 'Pina to Jumla', 'Complete the return trek to Jumla.', 2370, 0),
(43, 9, 'Fly Jumla to Kathmandu', 'Morning flight back to Kathmandu.', 1400, 0),
(43, 10, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- ============================================================
-- Route 45: Lower Dolpo Trek (14 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(45, 1, 'Fly Kathmandu to Nepalgunj, Fly to Juphal', 'Morning flight to Nepalgunj and onward connecting flight to Juphal airstrip (2,475m) in Dolpa district.', 2475, 0),
(45, 2, 'Juphal to Dunai', 'Trek down to the district headquarters of Dunai on the banks of the Bheri River.', 2145, 0),
(45, 3, 'Dunai to Tarakot', 'Trek upstream along the Suli Gad river through a dramatic river gorge.', 2540, 0),
(45, 4, 'Tarakot to Chhepka', 'Enter Shey Phoksundo National Park. The trail climbs through progressively dramatic scenery.', 2960, 0),
(45, 5, 'Chhepka to Amchi', 'Descend to the Suli Gad river and climb back up toward the Phoksundo Lake basin. The trail passes through ancient Bon villages.', 3630, 0),
(45, 6, 'Amchi to Phoksundo Lake (Ringmo)', 'Arrive at the impossibly blue Phoksundo Lake (3,611m) — Nepal\'s deepest lake and one of the world\'s most beautiful. The turquoise water, set against red canyon walls and snow peaks, is unforgettable.', 3611, 0),
(45, 7, 'Explore Phoksundo Lake and Monastery', 'Full day at the lake. Visit the ancient Bon monastery on the cliff above. Walk the lake shores. Marvel at the cascading Phoksundo waterfall at the lake\'s outlet.', 3611, 1),
(45, 8, 'Phoksundo to Amchi', 'Begin the return journey back through the national park.', 3630, 0),
(45, 9, 'Amchi to Sulighat', 'Descend through the gorge toward the lower Dolpo valleys.', 2470, 0),
(45, 10, 'Sulighat to Tarakot', 'Continue the return trek downstream.', 2540, 0),
(45, 11, 'Tarakot to Dunai', 'Return to the district headquarters of Dunai.', 2145, 0),
(45, 12, 'Dunai to Juphal, Fly to Nepalgunj', 'Trek to Juphal and fly to Nepalgunj.', 154, 0),
(45, 13, 'Fly Nepalgunj to Kathmandu', 'Morning flight back to Kathmandu. Afternoon rest.', 1400, 0),
(45, 14, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- ============================================================
-- Route 49: Nar Phu Valley Trek (13 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(49, 1, 'Drive Kathmandu to Besisahar', 'Drive along the Prithvi Highway to Besisahar, the starting point for the Marsyangdi valley approach.', 760, 0),
(49, 2, 'Drive to Koto, Trek to Meta', 'Drive further up the valley to Koto where Nar Phu restricted area permits are verified. Trek into the dramatic Nar Phu side valley to Meta village.', 3560, 0),
(49, 3, 'Meta to Phu Village', 'Trek up the Phu Khola valley through a narrow gorge to the remarkable Phu Village — a medieval fortress settlement at 4,080m with a commanding position above the valley.', 4080, 0),
(49, 4, 'Explore Phu Village', 'Full day to explore Phu village with its ancient stone houses, Buddhist gompa, and extraordinary views of Himlung Himal and Kang Guru. This village is among the most remote and authentic communities in Nepal.', 4080, 1),
(49, 5, 'Phu to Nar Village via Kang La Pass', 'Cross the formidable Kang La Pass (5,320m) — a demanding but extraordinary high-altitude crossing with views of Manaslu, Annapurna, and the Tibetan plateau. Descend to the equally remote Nar village.', 4110, 0),
(49, 6, 'Explore Nar Village', 'Rest and acclimatize in Nar. Explore the village\'s ancient fortifications, chortens, and monastery. The culture here is almost entirely Tibetan Buddhist despite being within Nepal.', 4110, 1),
(49, 7, 'Nar to Ngawal', 'Descend from the Nar Phu plateau back into the main Annapurna Circuit valley via the Kangla Phedi trail to Ngawal.', 3657, 0),
(49, 8, 'Ngawal to Manang', 'Walk the high trail along the Annapurna Circuit to Manang — the region\'s main acclimatization hub.', 3540, 0),
(49, 9, 'Manang to Yak Kharka', 'Ascend toward the Thorong La. Yak Kharka is the last settlement with substantial services before the pass.', 4018, 0),
(49, 10, 'Yak Kharka to Thorong High Camp', 'Short climb to the base camp below Thorong La. Rest thoroughly and prepare for the pre-dawn start.', 4925, 0),
(49, 11, 'Cross Thorong La Pass (5,416m) to Muktinath', 'The culminating crossing of the trek. Start before 5am and climb to the top of Thorong La (5,416m) as the sun rises. Descend 1,656m to the sacred Hindu and Buddhist pilgrimage town of Muktinath.', 3760, 0),
(49, 12, 'Muktinath to Jomsom, Fly to Pokhara', 'Drive or trek to Jomsom and take the morning mountain flight to Pokhara.', 820, 0),
(49, 13, 'Drive Pokhara to Kathmandu or Departure', 'Drive back to Kathmandu or take the Pokhara–Kathmandu flight.', 1400, 0);

-- ============================================================
-- Route 21: Everest Three Passes Trek (20 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(21, 1, 'Fly to Lukla, Trek to Phakding', 'Mountain flight Kathmandu–Lukla. First day on the Khumbu trail to Phakding.', 2652, 0),
(21, 2, 'Phakding to Namche Bazaar', 'Classic second day crossing suspension bridges to the Sherpa capital.', 3440, 0),
(21, 3, 'Acclimatization Day in Namche Bazaar', 'Hike to Everest View Hotel. Essential acclimatization.', 3440, 1),
(21, 4, 'Namche to Tengboche', 'High contour trail with Ama Dablam views to Tengboche Monastery.', 3870, 0),
(21, 5, 'Tengboche to Dingboche', 'Trek to the wide Imja Khola valley, surrounded by massive peaks.', 4410, 0),
(21, 6, 'Acclimatization in Dingboche', 'Ridge hike above Dingboche for views of Makalu and Island Peak.', 4410, 1),
(21, 7, 'Dingboche to Lobuche', 'Trek past mountaineers\' memorials across the Khumbu moraine to Lobuche.', 4910, 0),
(21, 8, 'Lobuche to Gorak Shep and EBC', 'Walk across glacial moraine to Gorak Shep and then the iconic Everest Base Camp (5,364m).', 5164, 0),
(21, 9, 'Kala Patthar Sunrise, Trek to Chhukung via Kongma La', 'Pre-dawn Kala Patthar (5,545m) summit. Cross Kongma La Pass (5,535m) — First Pass — with extraordinary high-altitude views. Descend to Chhukung.', 4730, 0),
(21, 10, 'Chhukung to Gokyo via Cho La Pass', 'Cross Cho La Pass (5,420m) — Second Pass — a glacier crossing requiring care. Descend to the sacred Gokyo Lakes.', 4790, 0),
(21, 11, 'Gokyo Ri Summit and Lake Exploration', 'Summit Gokyo Ri (5,357m) for the four-8,000m-peak panorama. Explore the Gokyo lake system.', 4790, 1),
(21, 12, 'Gokyo to Renjo La Pass to Lungden', 'Cross Renjo La Pass (5,360m) — Third Pass — the final and most photogenic of the three passes. Descend to Lungden.', 4383, 0),
(21, 13, 'Lungden to Thame', 'Descend the Bhote Koshi valley through the traditional Sherpa village of Thame — home of several Everest summiteers.', 3750, 0),
(21, 14, 'Thame to Namche Bazaar', 'Return to Namche for the final time.', 3440, 0),
(21, 15, 'Namche to Lukla', 'Final trekking day. Farewell dinner with crew.', 2840, 0),
(21, 16, 'Fly Lukla to Kathmandu', 'Morning flight back to Kathmandu.', 1400, 0),
(21, 17, 'Kathmandu Sightseeing', 'Free day in Kathmandu.', 1400, 0),
(21, 18, 'Kathmandu Rest', 'Rest day or additional sightseeing.', 1400, 0),
(21, 19, 'Buffer Day', 'Reserve day for weather delays on mountain flights.', 1400, 0),
(21, 20, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- ============================================================
-- Route 26: Annapurna Circuit Trek (16 days) — full insert
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(26, 1, 'Drive Kathmandu to Dharapani/Besisahar', 'Drive along the Prithvi Highway and up the Marsyangdi valley to begin the classic Annapurna Circuit.', 1860, 0),
(26, 2, 'Trek to Chame', 'Trek through forests and villages along the Marsyangdi river to Chame, the Manang district headquarters.', 2670, 0),
(26, 3, 'Chame to Pisang', 'Pass the dramatic 1,500m tall wall of Paungda Danda rock face and cross to the traditional villages of Lower and Upper Pisang with first views of Annapurna II.', 3200, 0),
(26, 4, 'Pisang to Manang', 'Spectacular stage passing through Braga village with its ancient monastery. Arrive in Manang — the circuit\'s main acclimatization base.', 3540, 0),
(26, 5, 'Acclimatization Day in Manang', 'Mandatory rest day at 3,540m. Hike to Gangapurna Lake or Ice Lake (4,600m). Attend the daily altitude sickness lecture. Rest well.', 3540, 1),
(26, 6, 'Manang to Yak Kharka', 'Trek above the treeline through yak pastures into the barren upper valley.', 4018, 0),
(26, 7, 'Yak Kharka to Thorong High Camp', 'Short final stage to the tea houses below the Thorong La. Rest, eat well, and prepare.', 4925, 0),
(26, 8, 'Rest/Buffer Day', 'Optional acclimatization day or weather reserve day.', 4925, 1),
(26, 9, 'Cross Thorong La Pass (5,416m) to Muktinath', 'Start before dawn for the iconic pass crossing. 5,416m summit, then a 1,656m descent to holy Muktinath.', 3760, 0),
(26, 10, 'Muktinath to Marpha via Kagbeni and Jomsom', 'Descend the Mustang plateau to Jomsom and continue to the apple village of Marpha.', 2665, 0),
(26, 11, 'Marpha to Kalopani', 'Trek through Kali Gandaki Gorge — the world\'s deepest — with Dhaulagiri and Annapurna I on either side.', 2530, 0),
(26, 12, 'Kalopani to Tatopani', 'Descend to the famous hot spring village of Tatopani for a well-earned soak.', 1190, 0),
(26, 13, 'Tatopani to Ghorepani', 'Steep 1,700m climb through rhododendron forest to the ridge-top village of Ghorepani.', 2874, 0),
(26, 14, 'Poon Hill Sunrise, Trek to Nayapul, Drive to Pokhara', 'Pre-dawn Poon Hill sunrise (3,210m). Descend through Ghandruk to Nayapul and drive to Pokhara.', 820, 0),
(26, 15, 'Drive or Fly Pokhara to Kathmandu', 'Return to Kathmandu.', 1400, 0),
(26, 16, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- ============================================================
-- Route 34: Manaslu Circuit Trek (16 days) — similar to route 4 with 2 extra days
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(34, 1, 'Drive Kathmandu to Machha Khola', 'Drive along the Prithvi Highway and up the Budhi Gandaki valley to the trek starting point.', 869, 0),
(34, 2, 'Machha Khola to Jagat', 'Trek through subtropical forest and farming villages. Jagat is the Restricted Area checkpoint.', 1410, 0),
(34, 3, 'Jagat to Deng', 'Trek through gorge scenery with waterfalls and cliff-face trails.', 1804, 0),
(34, 4, 'Deng to Ghap', 'Enter wilder terrain. Ghap is a significant Tamang village with an ancient gompa.', 2160, 0),
(34, 5, 'Ghap to Namrung', 'The cultural character shifts decisively toward Tibetan Buddhist as you enter the Nubri region.', 2630, 0),
(34, 6, 'Namrung to Lho', 'Trek to Lho village for the finest close-up view of Manaslu\'s enormous north face — one of the great mountain spectacles of Nepal.', 3180, 0),
(34, 7, 'Lho to Samagaon', 'Descend slightly to Samagaon — the main Nubri community with an important ancient gompa.', 3530, 0),
(34, 8, 'Acclimatization in Samagaon', 'Day hike to Manaslu Base Camp (4,480m) for close views of the 8,163m summit. Explore Samagaon and rest.', 3530, 1),
(34, 9, 'Samagaon to Samdo', 'Short climb to the last permanent village before the high pass crossing.', 3875, 0),
(34, 10, 'Samdo Rest/Acclimatization', 'Additional acclimatization day at Samdo. Short hike toward the Tibetan border ridge.', 3875, 1),
(34, 11, 'Samdo to Dharamsala (Larkya Phedi)', 'Trek to the base camp for the Larkya La crossing. Early to bed.', 4460, 0),
(34, 12, 'Cross Larkya La (5,160m) to Bimthang', 'Pre-dawn start for the high pass. Breathtaking views of Manaslu\'s west face and the Himalayan panorama on descent. Arrive at the flower-filled meadows of Bimthang.', 3590, 0),
(34, 13, 'Bimthang to Tilje', 'Rapid descent through rhododendron forest.', 2300, 0),
(34, 14, 'Tilje to Dharapani', 'Complete the descent to the Annapurna Circuit road-head.', 1960, 0),
(34, 15, 'Drive Dharapani to Kathmandu', 'Full-day drive back to Kathmandu.', 1400, 0),
(34, 16, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- ============================================================
-- Route 35: Tsum Valley Trek (16 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(35, 1, 'Drive Kathmandu to Machha Khola', 'Drive to the Budhi Gandaki valley starting point.', 869, 0),
(35, 2, 'Machha Khola to Jagat', 'Trek upriver to the permit checkpoint.', 1410, 0),
(35, 3, 'Jagat to Deng', 'Continue up the gorge through dramatic landscapes.', 1804, 0),
(35, 4, 'Deng to Chumling (Tsum Valley Junction)', 'Branch off the Manaslu Circuit onto the Tsum Valley trail at Lokpa/Philim. Enter the Tsum side valley.', 2386, 0),
(35, 5, 'Chumling to Chekampar', 'The valley opens up and the character becomes distinctly Tibetan. Ancient mani walls and stone houses.', 3010, 0),
(35, 6, 'Chekampar to Nile/Rachen Gompa', 'Reach the sacred Rachen Gompa — a large nunnery perched on the valley walls with dramatic Himalayan views.', 3361, 0),
(35, 7, 'Rachen Gompa to Mu Gompa', 'The trail enters an increasingly otherworldly landscape. Mu Gompa is the most important and ancient monastery in Tsum Valley, dating back hundreds of years.', 3700, 0),
(35, 8, 'Explore Mu Gompa', 'Full day at Mu Gompa exploring its extraordinary murals, religious artefacts, and the lama community. Acclimatize and rest.', 3700, 1),
(35, 9, 'Mu Gompa to Gho', 'Begin the return journey through the upper Tsum Valley.', 3240, 0),
(35, 10, 'Gho to Chumling', 'Return through the main valley on the opposite bank for different views.', 2386, 0),
(35, 11, 'Chumling to Philim', 'Descend back to the Manaslu Circuit trail junction.', 1570, 0),
(35, 12, 'Philim to Deng', 'Return along the Budhi Gandaki gorge.', 1804, 0),
(35, 13, 'Deng to Machha Khola', 'Continue the return trek.', 869, 0),
(35, 14, 'Drive Machha Khola toward Kathmandu', 'Begin the long drive back.', 800, 0),
(35, 15, 'Arrive Kathmandu', 'Arrive in Kathmandu by evening.', 1400, 0),
(35, 16, 'Departure', 'Transfer to airport.', 1400, 0);

-- ============================================================
-- Route 44: Upper Dolpo Trek (25 days) — key days
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(44, 1, 'Fly Kathmandu to Nepalgunj', 'Flight to the gateway city of the Far West.', 154, 0),
(44, 2, 'Fly Nepalgunj to Juphal, Trek to Dunai', 'Small plane to Juphal airstrip, then trek to Dunai district headquarters.', 2145, 0),
(44, 3, 'Dunai to Chhepka', 'Enter Shey Phoksundo National Park. Trek upriver through the lower Dolpo.', 2960, 0),
(44, 4, 'Chhepka to Phoksundo Lake', 'Arrive at the astonishing Phoksundo Lake (3,611m) — Nepal\'s deepest lake with its extraordinary colours.', 3611, 0),
(44, 5, 'Explore Phoksundo Lake and Monastery', 'Full day at the lake and ancient Bon monastery above it.', 3611, 1),
(44, 6, 'Phoksundo to Upper Dolpo Entry', 'Begin the crossing into the heart of Upper Dolpo toward Shey Monastery.', 3800, 0),
(44, 7, 'Ascend toward Kangla Pass', 'Climb toward the Kangla Pass approach through increasingly barren Tibetan plateau landscape.', 4500, 0),
(44, 8, 'Cross Kangla Pass to Shey Monastery', 'Cross Kangla Pass (5,010m) and descend to the sacred Shey Monastery (Crystal Mountain) — the spiritual centre of Upper Dolpo, setting of Peter Matthiessen\'s "The Snow Leopard."', 4900, 0),
(44, 9, 'Explore Shey Monastery and Crystal Mountain', 'Full day at Shey. The monastery and its surrounding crystal quartz mountain are among the most sacred sites in the Himalayan Buddhist world.', 4900, 1),
(44, 10, 'Shey to Namgung', 'Trek through the high Dolpo plateau.', 4080, 0),
(44, 11, 'Namgung to Saldang', 'Trek through ancient Tibetan-origin villages.', 3770, 0),
(44, 12, 'Saldang to Dho Tarap', 'Cross into the Tarap Valley — one of Upper Dolpo\'s main habited valleys.', 4080, 0),
(44, 13, 'Explore Dho Tarap', 'Explore the Tarap Valley communities and their remarkable preservation of Tibetan plateau culture.', 4080, 1),
(44, 14, 'Dho Tarap to Tarap Khola', 'Begin the return journey.', 3970, 0),
(44, 15, 'Cross Jangla Pass (5,178m)', 'High pass crossing on the return route.', 4200, 0),
(44, 16, 'Descend toward lower Dolpo', 'Long descent toward the lower valley.', 3500, 0),
(44, 17, 'Lower Dolpo Valley Trek', 'Trek through the lower valleys back toward Phoksundo.', 3200, 0),
(44, 18, 'Phoksundo to Amchi', 'Return through the national park.', 3630, 0),
(44, 19, 'Amchi to Tarakot', 'Trek downstream.', 2540, 0),
(44, 20, 'Tarakot to Dunai', 'Return to district headquarters.', 2145, 0),
(44, 21, 'Reserve/Buffer Day', 'Rest day in case of weather or logistical delays.', 2145, 0),
(44, 22, 'Dunai to Juphal, Fly to Nepalgunj', 'Trek to airstrip and fly out.', 154, 0),
(44, 23, 'Fly Nepalgunj to Kathmandu', 'Return flight to Kathmandu.', 1400, 0),
(44, 24, 'Kathmandu Rest', 'Rest day.', 1400, 0),
(44, 25, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- ============================================================
-- Route 46: Dhaulagiri Circuit Trek (18 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(46, 1, 'Drive Kathmandu to Beni', 'Drive to Beni, the starting point of the Dhaulagiri Circuit.', 830, 0),
(46, 2, 'Beni to Babiyachaur', 'Begin trekking up the Modi Khola valley.', 1480, 0),
(46, 3, 'Babiyachaur to Muri', 'Continue up the Modi Khola through increasingly remote terrain.', 2210, 0),
(46, 4, 'Muri to Dobang', 'Trek above the treeline into the high Dhaulagiri valleys.', 2940, 0),
(46, 5, 'Dobang to Italian Base Camp', 'The original Italian expedition\'s base camp below the east col of Dhaulagiri. Dramatic glacial terrain.', 3660, 0),
(46, 6, 'Acclimatization at Italian Base Camp', 'Rest and acclimatize. Short hike toward the Dhaulagiri ice fall for extraordinary close-up views of the 8,167m peak.', 3660, 1),
(46, 7, 'Italian BC to French Pass Base', 'Climb toward the approach to French Pass across moraines and glacial terrain.', 4500, 0),
(46, 8, 'Cross French Pass (5,360m) to Hidden Valley', 'The crux of the circuit. Glacier travel required. Cross French Pass and descend into the legendary Hidden Valley — a remote high-altitude glacial plateau at 4,800m. Camp.', 4800, 0),
(46, 9, 'Acclimatization in Hidden Valley', 'Rest day in this extraordinary glacial wilderness. Explore the plateau and acclimatize for Dhampus Pass.', 4800, 1),
(46, 10, 'Cross Dhampus Pass (5,182m)', 'Cross the second major pass of the circuit with sweeping views of Annapurna and Dhaulagiri. Long descent begins.', 4500, 0),
(46, 11, 'Descent to Jomsom', 'Long steep descent through the Thapa Khola valley to Jomsom in the Kali Gandaki.', 2720, 0),
(46, 12, 'Fly Jomsom to Pokhara or Trek', 'Mountain flight Jomsom–Pokhara or begin trekking south.', 820, 0),
(46, 13, 'Pokhara to Beni', 'Drive back to Beni to complete the circuit OR fly from Pokhara to Kathmandu.', 830, 0),
(46, 14, 'Drive Beni to Kathmandu', 'Long drive back to Kathmandu.', 1400, 0),
(46, 15, 'Kathmandu Rest', 'Rest day.', 1400, 0),
(46, 16, 'Kathmandu Sightseeing', 'Optional cultural day.', 1400, 0),
(46, 17, 'Buffer Day', 'Reserve for weather.', 1400, 0),
(46, 18, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- ============================================================
-- Route 47: Makalu Base Camp Trek (20 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(47, 1, 'Fly Kathmandu to Tumlingtar/Num', 'Mountain flight east to the Arun Valley gateway.', 1560, 0),
(47, 2, 'Num to Seduwa', 'Trek down and across the deep Arun gorge.', 1500, 0),
(47, 3, 'Seduwa to Tashigaon', 'Climb through terraced farmland and traditional Rai villages to Tashigaon.', 2070, 0),
(47, 4, 'Tashigaon to Khongma La', 'The trail climbs steeply through forest to the Khongma La ridge with first high-altitude views.', 3570, 0),
(47, 5, 'Khongma La to Dobato', 'Trek across the high ridge with panoramic views to the tea houses at Dobato.', 3630, 0),
(47, 6, 'Dobato to Mumbuk', 'Enter the pristine Barun Valley — one of the world\'s most biologically rich wilderness areas.', 3550, 0),
(47, 7, 'Mumbuk to Nehe Kharka', 'Trek deeper into the Barun Valley on an increasingly remote trail.', 4328, 0),
(47, 8, 'Nehe Kharka to Shershon', 'Ascend to Shershon in the upper Barun Valley. Makalu begins to dominate the skyline.', 4615, 0),
(47, 9, 'Shershon to Makalu Base Camp', 'The final ascent to Makalu Base Camp (5,700m) — a staggering position directly beneath the 5th highest mountain. The scale of Makalu\'s pyramid is overwhelming.', 5700, 0),
(47, 10, 'Explore Makalu Base Camp', 'Full day at base camp. Explore the glacier and different viewpoints around the 8,485m peak. Photography and mountain appreciation.', 5700, 1),
(47, 11, 'Makalu BC to Shershon', 'Begin the return descent.', 4615, 0),
(47, 12, 'Shershon to Nehe Kharka', 'Continue descent.', 4328, 0),
(47, 13, 'Nehe Kharka to Mumbuk', 'Return through the Barun Valley.', 3550, 0),
(47, 14, 'Mumbuk to Dobato', 'Continue descent.', 3630, 0),
(47, 15, 'Dobato to Tashigaon', 'Long descent to Tashigaon.', 2070, 0),
(47, 16, 'Tashigaon to Seduwa', 'Continue the return trek.', 1500, 0),
(47, 17, 'Seduwa to Num', 'Final day of trekking back to the airstrip area.', 1560, 0),
(47, 18, 'Fly Num/Tumlingtar to Kathmandu', 'Mountain flight back to Kathmandu.', 1400, 0),
(47, 19, 'Kathmandu Rest', 'Rest day.', 1400, 0),
(47, 20, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- ============================================================
-- Route 48: Kanchenjunga Base Camp Trek (22 days)
-- ============================================================
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(48, 1, 'Fly Kathmandu to Taplejung', 'Mountain flight to far-eastern Nepal gateway.', 1819, 0),
(48, 2, 'Taplejung to Chirwa', 'Begin trekking down through sub-tropical forest and terraced fields.', 1270, 0),
(48, 3, 'Chirwa to Lelep', 'Trek through traditional villages toward the high mountains.', 1820, 0),
(48, 4, 'Lelep to Yamphudin', 'Climb through diverse forest to Yamphudin, the last motor road point.', 2080, 0),
(48, 5, 'Yamphudin to Tortong', 'Enter the Kanchenjunga Conservation Area. Trek through pristine forest.', 2995, 0),
(48, 6, 'Tortong to Ramche', 'Climb into alpine terrain with first views of Kanchenjunga\'s southern aspect.', 3724, 0),
(48, 7, 'Ramche to South BC Viewpoint', 'Trek toward the South Base Camp area for views of the south face.', 4200, 0),
(48, 8, 'Kanchenjunga South Base Camp', 'Reach South Base Camp (4,750m) directly beneath the world\'s 3rd highest peak.', 4750, 0),
(48, 9, 'South BC to Ramche', 'Begin descent and begin the traverse toward North Base Camp.', 3724, 0),
(48, 10, 'Ramche to Sele La Base Camp', 'Climb toward the pass connecting south and north Kanchenjunga valleys.', 4290, 0),
(48, 11, 'Cross Sele La, Trek to Tseram', 'Cross the Sele La pass and descend to Tseram in the Ghunsa Valley.', 3870, 0),
(48, 12, 'Tseram to Ghunsa', 'Descend to Ghunsa — the main village of the north Kanchenjunga approach.', 3595, 0),
(48, 13, 'Ghunsa to Lhonak', 'Ascend through glacial terrain to Lhonak.', 4790, 0),
(48, 14, 'Kanchenjunga North Base Camp', 'Trek to North Base Camp (5,143m) — a dramatic position beneath the north face of Kanchenjunga. Return to Ghunsa.', 3595, 0),
(48, 15, 'Ghunsa to Phole', 'Begin the long return trek.', 3210, 0),
(48, 16, 'Phole to Gyabla', 'Continue descent.', 2730, 0),
(48, 17, 'Gyabla to Tapethok', 'Trek through lower valley toward the road.', 1441, 0),
(48, 18, 'Tapethok to Taplejung', 'Return to Taplejung.', 1819, 0),
(48, 19, 'Fly Taplejung to Kathmandu', 'Return flight to Kathmandu.', 1400, 0),
(48, 20, 'Kathmandu Rest', 'Rest day.', 1400, 0),
(48, 21, 'Buffer Day', 'Reserve for weather.', 1400, 0),
(48, 22, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- ============================================================
-- TOURS — itinerary data
-- ============================================================

-- Route 24: Everest View Trek (7 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(24, 1, 'Fly to Lukla, Trek to Phakding', 'Mountain flight to Lukla and first steps on the EBC trail to Phakding.', 2652, 0),
(24, 2, 'Phakding to Namche Bazaar', 'Climb to the Sherpa capital through forest and suspension bridges.', 3440, 0),
(24, 3, 'Acclimatization — Everest View Hotel', 'Hike to the Everest View Hotel (3,880m) for the first clear view of Everest. Explore Namche.', 3440, 1),
(24, 4, 'Namche to Khumjung', 'Visit Khumjung village and its famous yak-scalp school (said to hold a yeti scalp). Views of Everest from this high-altitude village are spectacular.', 3790, 0),
(24, 5, 'Khumjung to Monjo', 'Begin the descent through Namche and down through the forest zones.', 2835, 0),
(24, 6, 'Monjo to Lukla, Fly to Kathmandu', 'Final morning walk to Lukla and the flight back to Kathmandu.', 1400, 0),
(24, 7, 'Departure or Kathmandu Sightseeing', 'Free day or transfer to airport.', 1400, 0);

-- Route 28: Mardi Himal Trek (7 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(28, 1, 'Drive Kathmandu to Pokhara', 'Drive or fly to Pokhara. Evening preparation.', 820, 0),
(28, 2, 'Drive to Kande, Trek to Forest Camp', 'Drive to Kande trailhead and begin trekking through rhododendron and magnolia forest to Forest Camp.', 2520, 0),
(28, 3, 'Forest Camp to Low Camp', 'Continue climbing through diverse forest. Low Camp sits on an open ridge with first Himalayan views.', 2985, 0),
(28, 4, 'Low Camp to High Camp', 'Trek through the distinctive Mardi Himal high zone — open moorland with extraordinary views of Machhapuchhre and Annapurna South right ahead.', 3580, 0),
(28, 5, 'High Camp to Mardi Himal Viewpoint, Descent to Badal Danda', 'Early morning ascent to the Mardi Himal viewpoint (4,500m) for close-up views of Machhapuchhre\'s west face. Descend all the way to Badal Danda.', 2520, 0),
(28, 6, 'Badal Danda to Landruk, Drive to Pokhara', 'Descend through Gurung villages to Landruk and drive back to Pokhara.', 820, 0),
(28, 7, 'Drive Pokhara to Kathmandu or Departure', 'Return to Kathmandu or depart from Pokhara.', 1400, 0);

-- Route 29: Ghorepani Poon Hill Trek (5 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(29, 1, 'Drive to Nayapul, Trek to Tikhedhunga', 'Drive from Pokhara to Nayapul (1 hour) and begin trekking through Birethanti to Tikhedhunga.', 1540, 0),
(29, 2, 'Tikhedhunga to Ghorepani', 'The classic stone staircase climb through Ulleri and rhododendron forest to Ghorepani ridge village.', 2874, 0),
(29, 3, 'Poon Hill Sunrise, Trek to Tadapani', 'Pre-dawn climb to Poon Hill (3,210m) for the most photographed sunrise in Nepal. Descend through forest to Tadapani.', 2630, 0),
(29, 4, 'Tadapani to Ghandruk, Drive to Pokhara', 'Descend through the largest Gurung village in Nepal and drive to Pokhara.', 820, 0),
(29, 5, 'Drive Pokhara to Kathmandu or Departure', 'Return to Kathmandu.', 1400, 0);

-- Route 33: Lower Mustang Trek (7 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(33, 1, 'Fly Pokhara to Jomsom', 'Exciting mountain flight to Jomsom in the Kali Gandaki Valley.', 2720, 0),
(33, 2, 'Jomsom to Kagbeni', 'Trek upriver through the wind-blasted valley to medieval Kagbeni — the gateway to Upper Mustang.', 2810, 0),
(33, 3, 'Kagbeni to Chuksang', 'Enter the Lower Mustang landscape: dramatic red and grey canyon terrain.', 2980, 0),
(33, 4, 'Chuksang to Charang', 'Continue north into the Mustang plateau with its extraordinary colours and ancient cave dwellings.', 3260, 0),
(33, 5, 'Charang to Ghami', 'Trek through the southern Mustang villages with their ancient mani walls and gompas.', 3520, 0),
(33, 6, 'Ghami to Jomsom via Marpha', 'Return south through the apple orchards of Marpha to Jomsom.', 2720, 0),
(33, 7, 'Fly Jomsom to Pokhara, Drive or Fly to Kathmandu', 'Morning mountain flight out. Return to Kathmandu.', 1400, 0);

-- Route 38: Helambu Cultural Trek (7 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(38, 1, 'Drive Kathmandu to Sundarijal, Trek to Chisapani', 'Drive to Sundarijal on the valley rim and begin trekking through Shivapuri National Park to Chisapani viewpoint.', 2215, 0),
(38, 2, 'Chisapani to Kutumsang', 'Trek along the ridge through traditional Tamang villages with Himalayan views.', 2470, 0),
(38, 3, 'Kutumsang to Tharepati', 'Climb to the Tharepati pass (3,640m) with sweeping panoramas of the Langtang range.', 3640, 0),
(38, 4, 'Tharepati to Melamchi Gaon', 'Descend into the authentic Sherpa heartland of Melamchi.', 2530, 0),
(38, 5, 'Melamchi Gaon to Tarkeghyang', 'Trek to the main Helambu Sherpa village of Tarkeghyang with its ancient monastery.', 2470, 0),
(38, 6, 'Tarkeghyang to Sermathang, Drive to Kathmandu', 'Trek to the road at Sermathang and drive back to Kathmandu.', 1400, 0),
(38, 7, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- Route 40: Ruby Valley Trek (7 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(40, 1, 'Drive Kathmandu to Tarkughat', 'Drive northwest to the starting point.', 800, 0),
(40, 2, 'Tarkughat to Arughat', 'Trek through subtropical forest to Arughat on the Budhi Gandaki.', 540, 0),
(40, 3, 'Arughat to Singla Bazar', 'Climb into the Ganesh Himal foothills through diverse forest.', 1440, 0),
(40, 4, 'Singla Bazar to Sirandanda Ridge', 'Trek up to the high ridge with panoramic views of Ganesh Himal.', 2800, 0),
(40, 5, 'Sirandanda to Lihi', 'Descend through traditional Tamang and Gurung villages.', 2150, 0),
(40, 6, 'Lihi to Laprak', 'Trek through the ruby-mining region. Visit traditional homes and workshops.', 1870, 0),
(40, 7, 'Drive Laprak to Kathmandu', 'Return drive to Kathmandu.', 1400, 0);

-- Route 42: Tamang Heritage Trail (7 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(42, 1, 'Drive Kathmandu to Syabrubesi', 'Drive to the Langtang region gateway.', 1503, 0),
(42, 2, 'Syabrubesi to Gatlang', 'Begin the Tamang Heritage Trail through traditional villages. Gatlang is a beautifully preserved Tamang community.', 2238, 0),
(42, 3, 'Gatlang to Tatopani', 'Trek along the Langtang ridge with views of Ganesh Himal. Visit the hot springs at Tatopani.', 2607, 0),
(42, 4, 'Tatopani to Thuman', 'Continue through the cultural heartland of Tamang communities.', 2200, 0),
(42, 5, 'Thuman to Briddim', 'Visit the monastery at Lingling and trek to Briddim — a highlight village of the Tamang trail.', 2229, 0),
(42, 6, 'Briddim to Syabrubesi', 'Return to Syabrubesi completing the trail loop.', 1503, 0),
(42, 7, 'Drive Syabrubesi to Kathmandu or Departure', 'Return drive to Kathmandu.', 1400, 0);

-- Route 50: Pikey Peak Trek (7 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(50, 1, 'Drive Kathmandu to Phaplu or Salleri', 'Drive to the Solu Khumbu region in eastern Nepal. Phaplu has a small airstrip as an alternative.', 2413, 0),
(50, 2, 'Phaplu to Junbesi', 'Trek through traditional Sherpa villages in the Solu region — a rich cultural landscape.', 2675, 0),
(50, 3, 'Junbesi to Pikey Base Camp', 'Climb through rhododendron forest to the base camp below Pikey Peak.', 3640, 0),
(50, 4, 'Summit Pikey Peak, Trek to Jase Bhanjyang', 'Pre-dawn ascent to Pikey Peak summit (4,065m). On a clear day: Everest, Makalu, Kanchenjunga, Annapurna, and Dhaulagiri are all visible simultaneously. Descend to Jase Bhanjyang.', 2820, 0),
(50, 5, 'Jase Bhanjyang to Salleri', 'Trek to the district headquarters of Salleri.', 2413, 0),
(50, 6, 'Drive Salleri to Kathmandu', 'Return drive to Kathmandu.', 1400, 0),
(50, 7, 'Departure', 'Transfer to Tribhuvan International Airport.', 1400, 0);

-- Route 51: Mohare Danda Trek (5 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(51, 1, 'Drive to Nayapul, Trek to Tikhedhunga', 'Drive to Nayapul and begin the classic Annapurna foothills approach.', 1540, 0),
(51, 2, 'Tikhedhunga to Ghorepani', 'Climb through rhododendron forest to the Ghorepani ridge.', 2874, 0),
(51, 3, 'Poon Hill Sunrise, Trek to Mohare Danda', 'Pre-dawn Poon Hill (3,210m) sunrise. Continue along the ridge — away from the mainstream trail — to the Mohare Danda community lodge (3,300m).', 3300, 0),
(51, 4, 'Mohare Danda to Nayapul, Drive to Pokhara', 'Morning views from the ridge, then descend through traditional villages to Nayapul. Drive to Pokhara.', 820, 0),
(51, 5, 'Drive Pokhara to Kathmandu or Departure', 'Return to Kathmandu.', 1400, 0);

-- Route 52: Kathmandu Valley Rim Trek (5 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(52, 1, 'Sundarijal to Chisapani', 'Trek from the Sundarijal reservoir through Shivapuri National Park forest to the ridge-top viewpoint at Chisapani.', 2215, 0),
(52, 2, 'Chisapani to Nagarkot', 'Follow the valley rim east through traditional Newari villages to Nagarkot (2,175m) — one of Nepal\'s finest sunrise viewpoints.', 2175, 0),
(52, 3, 'Nagarkot to Dhulikhel', 'Walk the scenic ridge trail from Nagarkot to Dhulikhel, a traditional Newari hilltop town.', 1550, 0),
(52, 4, 'Dhulikhel to Namobuddha to Panauti', 'Visit the sacred Namobuddha Buddhist stupa and descend to the ancient Newari town of Panauti.', 1390, 0),
(52, 5, 'Drive Panauti to Kathmandu or Departure', 'Drive back to Kathmandu.', 1400, 0);

-- Route 53: Chepang Hill Trail (5 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(53, 1, 'Drive Kathmandu to Benighat/Dhading', 'Drive west to the Chepang foothills.', 400, 0),
(53, 2, 'Trek to Tripureshwor', 'Begin the trail through tropical forest and Chepang settlements.', 700, 0),
(53, 3, 'Tripureshwor to Shaktikhor', 'Trek to the main Chepang community centre. Overnight homestay with a Chepang family.', 600, 0),
(53, 4, 'Shaktikhor Forest and Village', 'Full day with the community: forest walk, honey hunting demonstrations, traditional food preparation, storytelling. Overnight homestay.', 800, 0),
(53, 5, 'Drive Shaktikhor to Kathmandu via Muglin', 'Return drive to Kathmandu.', 1400, 0);

-- Route 54: Kathmandu Valley Tour (3 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(54, 1, 'Pashupatinath and Boudhanath', 'Morning at Pashupatinath temple complex on the Bagmati river — Nepal\'s most sacred Hindu site. Afternoon at the great Boudhanath Stupa — the beating heart of Tibetan Buddhism in Nepal.', 1400, 0),
(54, 2, 'Swayambhunath, Kathmandu Durbar Square, Asan', 'Morning climb to Swayambhunath (Monkey Temple) for city views. Afternoon in Kathmandu Durbar Square and the ancient Asan bazaar.', 1400, 0),
(54, 3, 'Patan and Departure', 'Morning in Patan Durbar Square and Patan Museum. Afternoon transfer to airport or free time.', 1400, 0);

-- Route 55: Pokhara Tour (3 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(55, 1, 'Arrive Pokhara, Phewa Lake and Attractions', 'Arrive Pokhara by flight or drive. Afternoon: Phewa Lake boat ride to the island temple, Davis Falls, and Gupteshwor Cave.', 820, 0),
(55, 2, 'Sarangkot Sunrise, Sightseeing', 'Pre-dawn drive to Sarangkot viewpoint for the full Annapurna range sunrise. World Peace Pagoda hike, International Mountain Museum.', 820, 0),
(55, 3, 'Begnas Lake, Depart', 'Morning visit to peaceful Begnas Lake. Afternoon flight or drive to Kathmandu.', 820, 0);

-- Route 56: Chitwan Safari Tour (3 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(56, 1, 'Drive or Fly to Chitwan, Jungle Walk', 'Arrive at the lodge near Chitwan National Park. Afternoon cultural orientation and short jungle walk with naturalist guide.', 200, 0),
(56, 2, 'Full Day Jungle Safari', 'Full day: morning jeep safari in the national park searching for rhino, tiger, leopard, deer, and birds. Canoe ride on the Rapti River for crocodile spotting. Elephant breeding centre visit. Evening Tharu cultural program.', 200, 0),
(56, 3, 'Birdwatching, Return to Kathmandu', 'Early morning birdwatching walk in the buffer zone forest. Drive or fly back to Kathmandu by afternoon.', 1400, 0);

-- Route 57: Rara Lake Tour (5 days)
INSERT INTO route_itineraries (route_id, day_number, title, description, overnight_altitude_meters, is_acclimatization_day) VALUES
(57, 1, 'Fly Kathmandu to Jumla', 'Scenic mountain flight to Jumla in Nepal\'s far west.', 2370, 0),
(57, 2, 'Jumla to Rara Lake', 'Trek through Rara National Park\'s pristine forests to the shores of Rara Lake (2,990m). The approach through pine and oak forest adds to the sense of discovery.', 2990, 0),
(57, 3, 'Explore Rara Lake', 'Full day at the lake — circumambulate the 5km shore trail, birdwatch, relax by the water. The silence and serenity here are unlike anywhere else in Nepal.', 2990, 1),
(57, 4, 'Rara Lake to Jumla', 'Return trek to Jumla.', 2370, 0),
(57, 5, 'Fly Jumla to Kathmandu or Departure', 'Morning flight back to Kathmandu.', 1400, 0);
