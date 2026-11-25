<?php
/**
 * Blog content batch 1 — Posts 14, 13, 10 (top traffic posts)
 */
$pdo = new PDO('mysql:host=127.0.0.1;dbname=yetiroutes;charset=utf8mb4', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$posts = [];

// ============================================================
// POST 14 — 5 Signs of Altitude Sickness (~2,200 words)
// ============================================================
$posts[14] = [
'excerpt' => 'Altitude sickness can strike anyone above 2,500m — even the fittest trekkers. Learn to recognise the five warning signs before they become life-threatening.',
'content' => <<<HTML
<p>Every year, hundreds of trekkers on Nepal's trails ignore subtle warning signs that their body is struggling with altitude — and a handful pay for that mistake with their lives. Acute Mountain Sickness (AMS) is not a sign of weakness or poor fitness. It is a physiological response to reduced oxygen, and it can affect a 25-year-old marathon runner just as easily as a 60-year-old first-time trekker.</p>
<p>The good news: AMS is almost always preventable, and when caught early, it is entirely manageable. The key is knowing what to look for and having the confidence to act on what you find.</p>

<h2>What Is Altitude Sickness?</h2>
<p>When you ascend to altitude, the air pressure drops. Your lungs draw in the same volume of air but receive fewer oxygen molecules per breath. Your body compensates — your breathing rate increases, your heart beats faster, your blood thickens slightly — but this adaptation takes days. If you ascend faster than your body can adapt, fluid can accumulate in the lungs or brain, with potentially fatal consequences.</p>
<p>AMS typically begins above 2,500 metres (8,200 ft). On the <a href="/trek?slug=everest-base-camp-trek">Everest Base Camp trek</a>, you cross 3,440m at Namche Bazaar on day three. On the <a href="/trek?slug=annapurna-circuit-trek">Annapurna Circuit</a>, you hit 4,130m at Thorong Phedi. Almost every major Nepal trek will take you into AMS territory.</p>

<h2>The 5 Warning Signs You Must Know</h2>

<h3>1. Persistent Headache</h3>
<p>The hallmark symptom of AMS is a headache that does not go away with rest or mild pain relief (paracetamol/ibuprofen). It typically feels like a throbbing pressure behind the eyes or across the forehead. Many trekkers dismiss this as dehydration — and while dehydration does cause headaches at altitude, the difference is that an AMS headache persists even after you drink 500ml of water and rest for an hour.</p>
<p><strong>What to do:</strong> Stop ascending. Rest at your current altitude for 24 hours. Take ibuprofen or paracetamol. Drink 3–4 litres of water through the day. If the headache worsens or does not improve after 24 hours, descend immediately.</p>

<h3>2. Nausea and Loss of Appetite</h3>
<p>Your digestive system is one of the first casualties of altitude. At 4,000m+, many trekkers find that food — even foods they normally love — becomes deeply unappealing. Mild nausea is common and not always alarming on its own. But combined with a headache or fatigue, it is a clear AMS signal.</p>
<p>Vomiting at altitude is more serious. It rapidly accelerates dehydration and makes it impossible to take oral medication or maintain energy. If you are vomiting and above 3,500m, descend the same day — do not wait to see if it passes.</p>
<p><strong>Practical note:</strong> Force yourself to eat even when you have no appetite. A few biscuits or half a bowl of soup provides enough energy to keep moving. Dal Bhat — Nepal's traditional lentil-rice dish — is ideal as it is calorie-dense, easy to digest, and available at every teahouse on every trail.</p>

<h3>3. Fatigue and Weakness Out of Proportion to Effort</h3>
<p>You will be tired on any mountain trek. Sore legs, heavy breathing, the desire to sit down — all normal. AMS fatigue is qualitatively different: a bone-deep exhaustion that does not ease with rest, combined with general weakness that makes simple tasks feel difficult.</p>
<p>A useful field test: if you feel distinctly worse after sleeping than you did before — especially if a night at altitude has left you more tired, not less — that is a significant warning sign. Healthy acclimatization works the other way: a rest night at the same altitude should leave you feeling measurably better the next morning.</p>

<h3>4. Dizziness and Loss of Coordination</h3>
<p>Mild lightheadedness when standing quickly is common at altitude. The AMS version is more concerning: a persistent unsteadiness, difficulty walking in a straight line, or a feeling of being "drunk" on a trail where you have done nothing to earn that sensation.</p>
<p>Coordination problems are a red flag for High Altitude Cerebral Edema (HACE) — the dangerous progression of AMS where fluid accumulates in the brain. The <strong>Tandem Gait Test</strong> is used by guides and medical teams on Nepal's trails: walk heel-to-toe in a straight line for six steps. If you cannot do this cleanly, HACE must be suspected and immediate descent is required, along with emergency oxygen and Dexamethasone if available.</p>

<h3>5. Sleep Disturbances and Periodic Breathing</h3>
<p>At altitude, the body's breathing regulation is disrupted during sleep. Many trekkers experience Cheyne-Stokes respiration — a cycle of deep breathing, then a pause of 10–15 seconds where breathing stops entirely, then a sudden gasp. It is alarming to witness in a tent-mate and deeply disturbing if you wake up in the middle of one of the apnea (no-breathing) phases.</p>
<p>Disrupted sleep is both a symptom of AMS and a cause of further deterioration — poor sleep at altitude means poor recovery. If you consistently wake at 3am feeling anxious, short of breath, or with a pounding heart, note it as part of the picture alongside your other symptoms.</p>

<h2>When AMS Becomes an Emergency: HACE and HAPE</h2>
<p>AMS is the mild-to-moderate form of altitude illness. If the underlying cause — ascending too fast — is not corrected, it can progress to two life-threatening conditions.</p>

<h3>HACE — High Altitude Cerebral Edema</h3>
<p>Fluid accumulates in the brain. Symptoms: severe headache that does not respond to any medication, profound confusion or disorientation, inability to walk straight, loss of consciousness. This is a medical emergency. The treatment is <strong>immediate descent of at least 300–500 metres, plus Dexamethasone 8mg IM/IV immediately</strong>. A Gamow bag (portable hyperbaric chamber) buys time for evacuation if descent is delayed. Helicopter rescue should be called without hesitation.</p>

<h3>HAPE — High Altitude Pulmonary Edema</h3>
<p>Fluid accumulates in the lungs. Symptoms: persistent dry cough, pink or frothy sputum, extreme breathlessness even at rest, blue tinge to lips (cyanosis), inability to lie flat. HAPE is more common than HACE and kills more trekkers. The treatment is immediate descent — do not wait until morning, do not wait for weather to improve. Nifedipine 30mg extended-release (or Tadalafil 10mg) and supplemental oxygen if available. Descend, descend, descend.</p>

<h2>Prevention: The Rules That Actually Work</h2>
<ul>
    <li><strong>Ascend slowly:</strong> The standard guideline above 3,000m is to gain no more than 300–500 metres of sleeping altitude per day.</li>
    <li><strong>Acclimatisation days:</strong> On the EBC route, Namche Bazaar (3,440m) has a mandatory acclimatisation day for good reason. Use it — hike to 3,800m and sleep lower. Same rule applies at Dingboche and Lobuche.</li>
    <li><strong>Hydrate aggressively:</strong> Aim for 3–4 litres per day. Urine should be pale yellow. Dark urine at altitude is a warning sign.</li>
    <li><strong>Avoid alcohol and sleeping tablets:</strong> Both suppress respiration and worsen Cheyne-Stokes breathing. Save the drinks for the celebration in Kathmandu.</li>
    <li><strong>Consider Diamox (Acetazolamide):</strong> 125mg twice daily, starting 24 hours before ascent, is effective prophylaxis. Consult a travel medicine doctor before your trip. Side effects include tingling in fingers and increased urination.</li>
    <li><strong>Know your escape routes:</strong> Before each day's walk, know the nearest lower-altitude village where you could spend the night if symptoms develop.</li>
</ul>

<h2>The Golden Rule</h2>
<blockquote>
    <strong>Never ascend with symptoms. Never.</strong> Altitude sickness at 4,000m that you push through becomes HACE or HAPE at 5,000m. The mountain will always be there next year.
</blockquote>

<h2>Frequently Asked Questions</h2>

<h3>Can fit, young trekkers still get altitude sickness?</h3>
<p>Yes. AMS has no correlation with fitness level, age, or prior trekking experience. Fitness helps you walk faster — which can paradoxically increase risk if it leads to ascending too quickly. AMS susceptibility is largely genetic and unpredictable.</p>

<h3>How long does acclimatisation take?</h3>
<p>Your body needs roughly 2–4 days to acclimatise to each significant altitude gain (1,000m+). Full adaptation to very high altitudes (above 5,000m) takes weeks, which is why mountaineers spend months above base camp before summit attempts.</p>

<h3>Is Diamox necessary for every trekker?</h3>
<p>No. Many trekkers acclimatise successfully on a well-paced itinerary without medication. Diamox is recommended for those with a history of AMS, those on compressed itineraries, or those trekking to extreme altitudes. Discuss with a travel medicine doctor at least 4 weeks before departure.</p>

<h3>What if I get symptoms on a day hike and return to lower altitude each night?</h3>
<p>The "climb high, sleep low" principle is highly effective. If you are sleeping at 3,440m but hiking to 3,800m during the day, you gain acclimatisation benefit from the high altitude while recovering at the lower sleeping altitude. This is built into most reputable itineraries.</p>

<h3>Can altitude sickness kill you on day one of symptoms?</h3>
<p>AMS itself rarely kills directly. The danger is ignoring mild AMS and continuing to ascend, which can lead to HACE or HAPE developing over 12–48 hours. People die from altitude illness because they underestimated early symptoms — not because the illness struck without warning.</p>

<h3>Where is the nearest medical facility on the EBC route?</h3>
<p>The Himalayan Rescue Association operates a medical clinic at Pheriche (4,280m) staffed by altitude medicine specialists during trekking season (March–May, September–November). There is also a HRA clinic at Manang on the Annapurna Circuit. Both offer free altitude sickness consultations.</p>

<p>Trekking in Nepal is one of the most rewarding experiences on earth. With the right knowledge and a willingness to slow down and listen to your body, altitude sickness is something you will read about rather than experience. Book your <a href="/trek?slug=everest-base-camp-trek">Everest Base Camp trek</a> with Yeti Routes and our guides will brief you fully on altitude protocols before you take your first step on the trail.</p>
HTML
];

// ============================================================
// POST 13 — Dal Bhat Power (~1,800 words)
// ============================================================
$posts[13] = [
'excerpt' => 'Dal Bhat fuels the Himalayas. Nepal\'s national dish is the secret weapon of every Sherpa guide — and the most underrated performance food on the planet.',
'content' => <<<HTML
<p>Walk into any teahouse on the Everest Base Camp route at noon and you will see a ritual repeated at every table: a large metal plate arrives, heaped with white rice, surrounded by small bowls of golden lentil soup, spinach, pickle, and curried vegetables. The Sherpa guide at the next table — the one who has climbed this trail a hundred times — looks as satisfied as if it were his first encounter with the dish. He is eating Dal Bhat.</p>
<p>"Dal Bhat Power, 24 Hour." It is printed on teahouse walls, on trekkers' t-shirts, on the backs of guide jackets from Namche to Muktinath. And it is not marketing — it is the literal truth of how this dish sustains the people who live and work in the world's highest mountains.</p>

<h2>What Is Dal Bhat?</h2>
<p>Dal Bhat (दाल भात) is Nepal's national dish — as central to Nepali food culture as pasta is to Italian or rice to Japanese. The name is simply descriptive: <em>Dal</em> means lentil soup; <em>Bhat</em> means boiled rice. Together they form the foundation of a meal that is eaten twice a day — morning and evening — by the majority of the Nepali population.</p>
<p>In its trekking teahouse form, Dal Bhat is a thali-style set meal. The plate typically includes:</p>
<ul>
    <li><strong>Bhat (rice):</strong> White or red rice, usually unlimited refills at no extra charge</li>
    <li><strong>Dal (lentil soup):</strong> Spiced with turmeric, cumin, and garlic, ranging from watery to thick depending on the region</li>
    <li><strong>Tarkari (vegetable curry):</strong> Seasonal vegetables, often potato, spinach, cauliflower, or green beans</li>
    <li><strong>Saag (greens):</strong> Sautéed spinach or mustard greens</li>
    <li><strong>Achar (pickle):</strong> Fresh tomato-chilli or fermented radish pickle, which provides probiotics and digestion aid</li>
    <li><strong>Papad:</strong> Thin lentil crackers, often served as a texture contrast</li>
    <li><strong>Kheer (optional):</strong> Rice pudding, sometimes included at higher-end teahouses</li>
</ul>
<p>Crucially, on most trails in Nepal, the rice and dal are <strong>unlimited</strong>. Ask the teahouse owner for "ek palta" (one more helping) and they will refill your plate without charging extra. This is the cultural norm, and it is part of why Dal Bhat is so well-suited to trekkers burning 3,000–5,000 calories a day.</p>

<h2>The Science: Why Dal Bhat Is a Perfect Trekking Food</h2>
<p>Dal Bhat is not just traditional — it is nutritionally elegant. The combination of rice and lentils has been a cornerstone of South Asian diets for thousands of years, and modern sports nutrition confirms exactly why it works so well for sustained effort.</p>

<h3>Complete Protein from Plant Sources</h3>
<p>Rice alone is low in the amino acid lysine. Lentils are rich in lysine but low in methionine. Together, they form a complete amino acid profile — providing all nine essential amino acids the body needs for muscle repair and maintenance. This is why Dal Bhat is a fully adequate protein source even without meat or eggs, which are either unavailable or expensive above 3,500m.</p>

<h3>Complex Carbohydrate for Sustained Energy</h3>
<p>White rice is digested relatively slowly, providing steady glucose release over several hours rather than the spike-and-crash of sugary foods. At altitude, where your body is already under physiological stress, stable blood sugar reduces the risk of energy crashes on steep ascents. A full Dal Bhat meal provides approximately 800–1,000 calories — enough to fuel a four to five hour trekking day when combined with snacks.</p>

<h3>Micronutrients and Hydration</h3>
<p>The soup component of Dal Bhat provides iron, folate, and B-vitamins — nutrients that are especially important at altitude where your body is producing extra red blood cells to carry oxygen. The vegetable curry and saag provide vitamin C (which aids iron absorption) and potassium (which helps maintain electrolyte balance during heavy exertion and sweating).</p>
<p>A single Dal Bhat meal at a mountain teahouse also contains approximately 400–500ml of fluid in the dal and curry components. At altitude, where dehydration is a constant risk, this matters.</p>

<h2>Regional Variations Across Nepal's Trails</h2>
<p>Dal Bhat is not a static dish — it absorbs the character of wherever it is cooked. As you trek Nepal's different regions, the plate changes significantly.</p>

<h3>Khumbu (Everest Region)</h3>
<p>Sherpa cuisine has Tibetan influences. Dal Bhat in the Khumbu tends to be hearty and straightforward — thick dal, plainly cooked rice, and generous portions of potato curry (aloo tarkari). At higher altitudes above 4,000m, options narrow and what is available depends entirely on what the teahouse was able to carry up from lower elevations.</p>

<h3>Annapurna Circuit</h3>
<p>The lower sections of the <a href="/trek?slug=annapurna-circuit-trek">Annapurna Circuit</a> pass through ethnically diverse communities — Gurung, Thakali, and eventually Tibetan-influenced Mustangi culture. Thakali Dal Bhat, from the Thak Khola valley around Kagbeni, is considered by many Nepali people to be the finest version of the dish — featuring a distinctive dark buckwheat flatbread (dhido) and a rich, spice-forward dal.</p>

<h3>Langtang Valley</h3>
<p>The <a href="/trek?slug=langtang-valley-trek">Langtang region</a> has strong Tamang and Tibetan cultural influence. Dal Bhat here is often accompanied by locally made yak cheese (churpi) and may feature nettle soup (sisnu) — a seasonal specialty with an earthy, slightly mineral flavour that is surprisingly good and high in iron.</p>

<h2>The Unlimited Refill Culture: How to Eat Dal Bhat Like a Local</h2>
<p>The etiquette around unlimited Dal Bhat is simple but worth knowing:</p>
<ol>
    <li>Order once — the price covers unlimited servings of rice and dal</li>
    <li>When you want more, hold out your plate toward the server (or walk to the kitchen window at simpler teahouses)</li>
    <li>Say "ek palta" (one more serving) or simply "rice?" — most teahouse owners understand</li>
    <li>The vegetable curries are usually fixed — you get one serving. The rice and dal are unlimited</li>
    <li>Dal Bhat is typically served at breakfast (with a fried egg addition at some teahouses) and dinner. Lunch is often available but varies by location</li>
</ol>

<h2>How Much Does Dal Bhat Cost on the Trail?</h2>
<p>Prices increase with altitude. As a rough guide in 2026:</p>
<ul>
    <li><strong>Below 3,000m:</strong> NPR 400–600 (~$3–4.50)</li>
    <li><strong>3,000–4,000m:</strong> NPR 700–1,000 (~$5–7.50)</li>
    <li><strong>Above 4,000m:</strong> NPR 1,000–1,500 (~$7.50–11)</li>
</ul>
<p>For a full-day trekker eating Dal Bhat twice, you are looking at $10–20/day on food at mid-altitude — remarkable value for the caloric and nutritional content.</p>

<h2>Making Dal Bhat at Home</h2>
<p>The basic version is straightforward. For two servings:</p>
<ul>
    <li>Cook 1 cup red or brown lentils with 3 cups water, 1 tsp turmeric, salt</li>
    <li>Temper with ghee, cumin seeds, garlic, and dried chilli</li>
    <li>Serve over white basmati rice with a simple potato or spinach curry</li>
    <li>Add fresh tomato-chilli achar: blend 2 tomatoes, 1 chilli, salt, coriander</li>
</ul>

<h2>Frequently Asked Questions</h2>

<h3>Is Dal Bhat vegetarian and vegan?</h3>
<p>The base Dal Bhat is vegetarian and can usually be made vegan — the main non-vegan element is ghee (clarified butter) used in tempering the dal. Ask for "tel matra" (oil only) and most teahouses will accommodate. Dal Bhat is one of the easiest meals for plant-based trekkers on the trail.</p>

<h3>Can I order something other than Dal Bhat at altitude?</h3>
<p>Yes, but your options will narrow significantly above 4,000m. Most teahouses stock pasta, noodles, fried rice, soup, and porridge. Tuna sandwiches and omelettes are common at lower altitudes. Above 5,000m near Everest Base Camp, the menu shrinks to Dal Bhat, noodles, soup, and snacks. Sticking to Dal Bhat at these altitudes is the practical choice, not just the cultural one.</p>

<h3>How many calories does Dal Bhat contain?</h3>
<p>A standard teahouse Dal Bhat plate provides approximately 800–1,000 calories. With unlimited rice refills, active trekkers frequently consume 1,200–1,500 calories per sitting. Over the course of a full trekking day burning 3,000–5,000 calories, two Dal Bhat meals plus trail snacks provides adequate energy.</p>

<h3>Does the food safety improve at lower-altitude teahouses?</h3>
<p>Generally yes — lower-altitude teahouses have better resupply chains and refrigeration. At altitude, everything is carried up by porter or yak, and ingredients like fresh vegetables are rotated less frequently. Dal Bhat — which is cooked fresh and served hot — is one of the safest choices at any altitude because the cooking process eliminates most pathogens.</p>

<p>Ready to experience Dal Bhat in the place it was born? Browse our <a href="/treks/annapurna">Annapurna region treks</a> or the classic <a href="/trek?slug=everest-base-camp-trek">Everest Base Camp trek</a> — your guides will introduce you to every variation of the dish from teahouse to teahouse.</p>
HTML
];

// ============================================================
// POST 10 — Training for Everest Base Camp (~2,000 words)
// ============================================================
$posts[10] = [
'excerpt' => 'A 3-month training plan for the Everest Base Camp trek — designed around the specific demands of 14 days at high altitude. Build the endurance, strength, and mental resilience to reach 5,364m.',
'content' => <<<HTML
<p>The Everest Base Camp trek is not a technical climb. There are no ropes, crampons, or technical sections. You walk — for 14 days, up to 8 hours a day, at altitudes between 2,840m and 5,545m, on trails that can shift from comfortable dirt path to steep loose scree within the same hour. Your preparation needs to match those specific demands.</p>
<p>The biggest mistake first-time EBC trekkers make is showing up fit by normal standards — able to run a 5K, gym-regular, weekend hikers — and discovering that their preparation was for a different game entirely. This guide gives you a 3-month plan built around what the trail actually demands.</p>

<h2>What the EBC Trek Actually Demands Physically</h2>
<p>Before planning training, understand the specific stresses:</p>
<ul>
    <li><strong>Duration:</strong> 6–8 hours of walking per day for up to 14 consecutive days</li>
    <li><strong>Elevation gain:</strong> 4,000–800m of cumulative up and down daily, with major elevation days of 800m+ ascent</li>
    <li><strong>Altitude:</strong> You will sleep at 3,440m from day 3 onwards, reaching 5,364m at Base Camp and 5,545m at Kala Patthar</li>
    <li><strong>Load:</strong> A daypack of 6–10kg carrying water, layers, and snacks</li>
    <li><strong>Terrain:</strong> Mixed — stone steps, dirt paths, rocky moraines, suspension bridges</li>
</ul>
<p>The altitude is the wildcard. No amount of sea-level training fully prepares your cardiovascular system for reduced oxygen. But excellent aerobic fitness dramatically improves your acclimatisation speed and your ability to manage the trail's physical demands within the constraints of altitude.</p>

<h2>The 3-Month Training Plan</h2>

<h3>Month 1 (Weeks 1–4): Build Your Aerobic Base</h3>
<p>The foundation of EBC preparation is aerobic endurance — your ability to maintain sustained moderate effort for hours at a time. This is built slowly. Do not rush this phase.</p>
<p><strong>Weekly targets:</strong></p>
<ul>
    <li>4 cardio sessions: 3 × 45 minutes + 1 × 60-75 minute "long effort"</li>
    <li>Best activity: brisk walking with a loaded pack, or hiking if accessible. Running is acceptable as a base-builder, but walking with a pack is more transfer-specific</li>
    <li>Keep intensity low — you should be able to hold a conversation throughout</li>
    <li>2 strength sessions per week (see Strength Training section below)</li>
    <li>1 full rest day minimum</li>
</ul>
<p><strong>Progress marker:</strong> By the end of week 4, you should be able to walk briskly for 75 minutes continuously with a 6kg pack without significant fatigue.</p>

<h3>Month 2 (Weeks 5–8): Add Volume and Elevation</h3>
<p>This is where you start simulating the trail's specific demands. Volume increases; you add elevation where possible.</p>
<p><strong>Weekly targets:</strong></p>
<ul>
    <li>Increase long effort to 90–120 minutes</li>
    <li>Add elevation: stairs, parking garages, hillside trails — aim for 400–500m of ascent in your long sessions</li>
    <li>Add a mid-week "back-to-back" session: two walks on consecutive days to simulate multi-day trekking</li>
    <li>Increase pack weight to 8–10kg in long sessions</li>
    <li>Continue 2 strength sessions per week</li>
</ul>
<p><strong>Progress marker:</strong> By end of week 8 you should be completing 90-minute hikes with 8kg pack and 400m+ elevation gain without excessive fatigue. Your legs should feel fresh the following morning.</p>

<h3>Month 3 (Weeks 9–12): Simulate and Consolidate</h3>
<p>The final month is about confidence-building and specific preparation — not pushing harder. Volume plateaus; quality matters more than quantity.</p>
<p><strong>Weekly targets:</strong></p>
<ul>
    <li>One multi-day hike (overnight if possible) with full pack — this is the most valuable single training session you can do</li>
    <li>Continue 90–120 minute long sessions but keep intensity moderate</li>
    <li>Reduce training volume in week 12 (taper): cut volume by 30–40% while maintaining one quality session per week</li>
    <li>Use this month to break in your trekking boots — wear them for all sessions</li>
    <li>Test all gear: rain jacket, layers, headlamp, poles, gaiters. Your trek is not the time to discover something doesn't fit</li>
</ul>

<h2>Strength Training for Trekking</h2>
<p>Strong legs and a stable core make the difference between arriving in camp feeling drained versus arriving with energy reserves. Focus on these movements:</p>

<h3>Lower Body</h3>
<ul>
    <li><strong>Step-ups with pack:</strong> Step onto a bench or box, 3 × 15 per leg. The closest gym equivalent to hiking uphill</li>
    <li><strong>Weighted squats:</strong> 3 × 12. Focus on depth and knee tracking, not weight</li>
    <li><strong>Single-leg Romanian deadlift:</strong> 3 × 10 per leg. Builds the stabilising muscles that prevent ankle rolls on uneven terrain</li>
    <li><strong>Calf raises:</strong> 3 × 20. Your calves do enormous work on steep descents — they are often neglected</li>
    <li><strong>Lunges (downhill simulation):</strong> Walking lunges downstairs with a pack. Prepares the quads for the long descents from Lobuche to Pheriche and Namche to Lukla</li>
</ul>

<h3>Core and Upper Body</h3>
<ul>
    <li><strong>Plank variations:</strong> 3 × 45–60 seconds. Core stability prevents back fatigue under pack load</li>
    <li><strong>Deadbugs:</strong> 3 × 10 per side. Spinal stability under backpack load</li>
    <li><strong>Rows with resistance band:</strong> 3 × 15. Prevents the forward-rounded posture that develops under heavy pack weight</li>
</ul>

<h2>The Descents Are Harder Than the Ascents</h2>
<p>This surprises almost every first-time EBC trekker. Ascending is aerobically hard. Descending — especially the long 1,000m+ drops on day 12 and 13 back through the Khumbu — is mechanically brutal on the quads and knees. The best preparation is eccentric training: exercises where the muscle is under load while lengthening.</p>
<p>Step-downs (the reverse of step-ups), walking lunges downhill, and slow stair descents with a pack are all effective. By week 8, your long sessions should include controlled downhill walking.</p>

<h2>Cardiovascular Training Options</h2>
<p>Ranked by transfer to EBC trekking:</p>
<ol>
    <li><strong>Loaded hiking on inclines (best)</strong></li>
    <li>Stair climbing machine with pack</li>
    <li>Incline treadmill walking with pack</li>
    <li>Cycling (good cardio, limited transfer to walking mechanics)</li>
    <li>Running (cardio benefit but biomechanically different from trekking)</li>
    <li>Swimming (cardio benefit, very low transfer)</li>
</ol>

<h2>Altitude Acclimatisation Pre-Trek</h2>
<p>If you can access altitude before your trek, use it. A weekend at a ski resort (1,800–3,000m), a trek in the Alps or Rocky Mountains, or even a few nights in a high-altitude city like Lhasa or Quito accelerates your acclimatisation. If this is not possible, focus on cardiovascular efficiency at sea level — a fit heart and lungs acclimatise faster than unfit ones, even from the same starting altitude.</p>
<p>Some trekkers use altitude tents (simulated altitude sleeping). Evidence for their effectiveness is mixed and the investment is high. It is not necessary for a well-paced EBC itinerary.</p>

<h2>What to Test Before You Fly</h2>
<ul>
    <li><strong>Boots:</strong> Minimum 60–80 km in the boots you will trek in. Blisters on day 2 at Namche are miserable and avoidable</li>
    <li><strong>Pack and harness:</strong> Load your pack to 8kg and hike. Identify any pressure points before they become sores</li>
    <li><strong>Rain jacket:</strong> Test in actual rain. Seams seal, zips work smoothly, hood adjusts properly</li>
    <li><strong>Trekking poles:</strong> Learn to adjust length for uphill (shorter) and downhill (longer) before the trail</li>
    <li><strong>Layers:</strong> Do a full "getting dressed in the cold" drill at 5am — you will do this every morning on the trek</li>
</ul>

<h2>Frequently Asked Questions</h2>

<h3>How fit do I need to be for EBC?</h3>
<p>You should be able to walk continuously for 5–6 hours with a moderate pack without feeling destroyed at the end. If you cannot currently do this, 3 months of progressive training following this plan will get you there. There is no specific fitness test for EBC — the itinerary is designed with built-in acclimatisation and rest days to support trekkers of a wide range of fitness levels.</p>

<h3>Can I do EBC if I am over 60?</h3>
<p>Yes — and many do, successfully. Age is less important than cardiovascular fitness and prior hiking experience. Trekkers in their 60s and 70s complete EBC regularly, typically with extended itineraries that allow more time at each altitude level. The key adjustments are: allow more time, choose a less compressed itinerary, get a thorough medical check before departure.</p>

<h3>Should I train at altitude before EBC?</h3>
<p>Helpful but not necessary. A well-structured sea-level programme followed by the acclimatisation days built into a standard EBC itinerary is sufficient for most trekkers. The trail itself is your best altitude trainer — Namche Bazaar's acclimatisation day and the pacing of the route are specifically designed to give your body time to adapt.</p>

<h3>What if I do not have access to hills or mountains for training?</h3>
<p>Stairwells and parking garage ramps are underrated. A 10-storey office building stairwell, ascending with an 8kg pack, provides excellent quad strength and cardiovascular training. City treadmills at maximum incline with pack weight are adequate for month 1 and 2 of the plan. Supplement with strength training targeting step-ups, squats, and eccentric step-downs.</p>

<p>Ready to put your training to work? The <a href="/trek?slug=everest-base-camp-trek">Everest Base Camp trek</a> with Yeti Routes includes 14 days on the trail with acclimatisation days built in — the right pace for trekkers who have put in the preparation. We also offer the shorter <a href="/trek?slug=annapurna-base-camp">Annapurna Base Camp trek</a> (10 days) as a great first high-altitude trek before tackling Everest.</p>
HTML
];

// Execute updates
$stmt = $pdo->prepare("UPDATE blog_posts SET content = :content, excerpt = :excerpt WHERE id = :id");

foreach ($posts as $id => $data) {
    $stmt->execute([
        ':id' => $id,
        ':content' => $data['content'],
        ':excerpt' => $data['excerpt'],
    ]);
    echo "Updated post $id\n";
}

echo "Batch 1 complete.\n";
