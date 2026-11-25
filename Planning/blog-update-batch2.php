<?php
/**
 * Blog content batch 2 — Posts 1, 15, 11
 */
$pdo = new PDO('mysql:host=127.0.0.1;dbname=yetiroutes;charset=utf8mb4', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$posts = [];

// ============================================================
// POST 1 — 10 Mistakes to Avoid on EBC (~2,000 words)
// ============================================================
$posts[1] = [
'excerpt' => 'Most problems on the Everest Base Camp trek are avoidable. Here are the ten mistakes that trip up even experienced trekkers — and exactly how to avoid each one.',
'content' => <<<HTML
<p>The Everest Base Camp trek is one of the most well-documented, well-guided, and well-supported trekking routes in the world. There are teahouses every few hours, permit checkpoints at every major village, rescue helicopters on standby throughout the season, and dozens of agencies with decades of experience running the route. And yet, every season, trekkers make the same predictable mistakes that turn an incredible adventure into an unnecessary ordeal.</p>
<p>Here are the ten we see most often — and exactly what to do instead.</p>

<h2>Mistake 1: Rushing the Acclimatisation Days</h2>
<p>The most dangerous mistake on EBC is treating acclimatisation days as rest days to be endured rather than used. At Namche Bazaar (3,440m) and Dingboche (4,410m), your itinerary includes days where you do not ascend to your next sleeping altitude. Many trekkers sit around, feel fine, and decide the acclimatisation was unnecessary.</p>
<p>The science disagrees. Your body's red blood cell production, capillary development, and respiratory adaptation all require time — and the adaptation that happens during an acclimatisation day is invisible. You will not feel it happening. You will feel it on day five when, instead of developing a splitting headache at 4,900m, you walk steadily into Lobuche. Use acclimatisation days to hike to a higher point and return — "climb high, sleep low" accelerates the process.</p>

<h2>Mistake 2: Wearing Unbroken Boots</h2>
<p>New boots on day one of EBC are a rookie error that results in blisters by day two and potentially a helicopter evacuation by day four if things go wrong. Your feet will be wet, cold, hot, and under load for up to 8 hours a day. Boots that have not conformed to your foot shape will create pressure points that become open sores at altitude.</p>
<p>Minimum: 60–80km walked in your trek boots before you fly to Kathmandu. Wear them on your training hikes, wear them shopping, wear them on weekends. The boot should feel like part of your foot by the time you board the Lukla flight.</p>

<h2>Mistake 3: Overpacking</h2>
<p>A 20kg pack on the EBC trail is a misery machine. Every gram you carry is a gram your legs must lift on every step for 14 days, at altitude, when your legs are already struggling. The ideal day-pack weight is 6–8kg including water. If you have a porter (which your operator will arrange), your main kit bag should be under 12kg.</p>
<p>The items most commonly overpacked: too many clothes (you will wear the same two base layers on rotation and nobody cares), guidebooks that can be on your phone, camera equipment beyond what you will actually use, and "just in case" items that weigh 500g and stay at the bottom of the bag for 14 days.</p>

<h2>Mistake 4: Ignoring Early AMS Symptoms</h2>
<p>A persistent headache at altitude is not "just a headache." Nausea after ascending is not "just travel fatigue." These are your body's unambiguous signals that it is not keeping up with the ascent rate. The fatal error is deciding to push through to the next stop and see how you feel — because if those symptoms indicate developing <a href="/blog/article?slug=altitude-sickness-symptoms">Acute Mountain Sickness</a>, ascending will make everything worse.</p>
<p>The rule is simple: <strong>never ascend with symptoms</strong>. Rest, hydrate, take ibuprofen, tell your guide. Your guide has seen every permutation of altitude illness and has clear protocols. Let them help you make the decision.</p>

<h2>Mistake 5: Choosing an Operator Based on Price Alone</h2>
<p>The EBC trek market has operators at every price point, from $400 to $3,000+ for the same 14-day route. The cheapest operators cut costs somewhere — and the cuts typically come from guide quality, guide-to-client ratio, insurance coverage, safety equipment, and the quality of the permits and teahouse bookings.</p>
<p>Your guide is the most important factor in your EBC experience. An experienced, English-fluent, altitude-trained guide means you have a person watching your symptoms, making route decisions, negotiating teahouses, and managing emergencies. A guide who speaks basic English, has limited altitude experience, and is working for $15/day because that is what the budget operator paid for is a different resource entirely.</p>

<h2>Mistake 6: Not Buying Travel and Rescue Insurance</h2>
<p>A helicopter evacuation from EBC altitude costs $3,000–$8,000. HACE treatment in Kathmandu can run to $15,000–$30,000. Uninsured trekkers are not evacuated until they can prove they have funds — at altitude, that delay can be fatal.</p>
<p>You need insurance that explicitly covers high-altitude trekking (specify 6,000m as the ceiling to be safe) and helicopter rescue. World Nomads, True Traveller, and Battleface are commonly used by EBC trekkers. Read the policy — some standard travel policies exclude "mountaineering" or cap at 4,500m.</p>

<h2>Mistake 7: Leaving Permits to the Last Minute</h2>
<p>The EBC trek requires two permits: the Sagarmatha National Park entry permit and the TIMS card (Trekkers' Information Management System). If you are using an established operator like Yeti Routes, both are arranged as part of your package. Independent trekkers need to obtain both in Kathmandu — from the Nepal Tourism Board office in Bhrikutimandap (TIMS) and the Sagarmatha permit from the same location or at the park entry at Monjo.</p>
<p>In peak season (October, March–May), the TIMS office sees queues. Arriving without your permits sorted means starting your trek a day late. Your operator should handle this entirely — if they are not doing so, ask explicitly before you arrive.</p>

<h2>Mistake 8: Underestimating the Fitness Required</h2>
<p>EBC is described as "suitable for fit, experienced hikers" — which is accurate but often misinterpreted. "Fit" in this context means: able to hike for 6–8 hours with an 8kg pack at altitude for multiple consecutive days. "Experienced" means comfortable with uneven, often steep terrain and cold temperatures.</p>
<p>If your current fitness level is "I walk to work and do yoga twice a week," you need a structured <a href="/blog/article?slug=training-for-everest-base-camp">3-month training programme</a> before this trek. Starting underprepared does not mean you will fail — but it means every day will be harder than it needs to be, and your acclimatisation capacity will be compromised by general fatigue.</p>

<h2>Mistake 9: Not Respecting Trail Etiquette and Local Customs</h2>
<p>The Khumbu is one of the most visited mountain regions on earth, but it is also a living, working community where the trail passes through villages, near monasteries, past mani walls, and through private properties. Some basics:</p>
<ul>
    <li><strong>Always pass mani walls on the left</strong> — the prayer stones should be on your right as you walk</li>
    <li><strong>Remove your hat and shoes before entering monasteries</strong></li>
    <li><strong>Ask before photographing people</strong></li>
    <li><strong>Yield the trail to yak trains</strong> — they have the right of way, and a yak will not slow down for you</li>
    <li><strong>Do not touch or remove prayer flags</strong></li>
    <li><strong>Bargaining is not normal at teahouses</strong> — prices at altitude are high because everything was carried up by a person; pay without complaint</li>
</ul>

<h2>Mistake 10: Going Without a Guide</h2>
<p>Since 2023, Nepal has mandated that all foreign trekkers in the Khumbu region trek with a licensed guide. The rule exists for good reason: the area has significant rescue call-outs from solo trekkers who lost the trail, misjudged symptoms, or encountered emergencies with no support. Beyond the legal requirement, a good guide is the difference between a safe, well-managed experience and a mismanaged one.</p>
<p>Your guide manages altitude symptoms, books teahouses, translates, navigates weather decisions, carries a first aid kit, and knows every shortcut, escape route, and emergency contact along the trail. They are not an optional extra — they are the most important part of your EBC setup.</p>

<h2>Frequently Asked Questions</h2>

<h3>What month has the best conditions for EBC?</h3>
<p>October and November offer the clearest skies and most stable weather — post-monsoon, the air is washed clean and mountain views are extraordinary. March to May is the other main season, with warming temperatures and rhododendrons in bloom at lower altitudes. Avoid December–February (cold, unreliable high-altitude conditions) and June–August (monsoon).</p>

<h3>Is the EBC trek doable without prior high-altitude experience?</h3>
<p>Yes — it is designed for trekkers without prior Himalayan experience. The route is well-supported, and the acclimatisation schedule is built into the itinerary. What you need is solid aerobic fitness, well-broken boots, and the discipline to stop and rest when your body signals you to.</p>

<h3>How many rest days are built into the standard itinerary?</h3>
<p>A standard 14-day itinerary includes two full acclimatisation days: one at Namche Bazaar (day 3) and one at Dingboche (day 7). These are not rest days in the sedentary sense — they are days for hiking to higher altitude and returning to the same sleeping altitude. A 16-day or 18-day itinerary adds flexibility for weather delays and further acclimatisation.</p>

<p>Book your <a href="/trek?slug=everest-base-camp-trek">Everest Base Camp trek</a> with Yeti Routes and avoid all ten of these mistakes — our guides handle permits, acclimatisation scheduling, altitude monitoring, and teahouse booking so you can focus entirely on the experience.</p>
HTML
];

// ============================================================
// POST 15 — Lukla Flights (~1,400 words)
// ============================================================
$posts[15] = [
'excerpt' => 'Lukla flights have changed. Many departures now leave from Ramechhap Airport, 5 hours from Kathmandu. Here is what every Everest trekker needs to know for 2026.',
'content' => <<<HTML
<p>If you are planning the <a href="/trek?slug=everest-base-camp-trek">Everest Base Camp trek</a>, the Lukla flight is part of the experience. Tenzing-Hillary Airport at Lukla (2,840m) is famously dramatic — a short uphill runway carved into a mountainside, with a sheer drop at one end and a rock face at the other. It regularly appears on lists of the world's most extreme airports, and landing there for the first time genuinely is as memorable as the flight descriptions suggest.</p>
<p>What the older guidebooks and many travel articles do not tell you is that the logistics of getting to Lukla have changed significantly. Since 2022, seasonal congestion and weather at Tribhuvan International Airport (Kathmandu) has pushed a large proportion of Lukla flights to depart from a secondary airport: Manthali Airport in Ramechhap district, approximately 130km east of Kathmandu.</p>
<p>This change affects every Everest trekker. Here is everything you need to know.</p>

<h2>Why Flights Moved to Ramechhap</h2>
<p>Tribhuvan International Airport (TIA) in Kathmandu handles international and domestic flights on a single runway. During peak trekking season (October–November, March–May), domestic Lukla flights compete with international arrivals and departures for limited runway slots. The result was chaotic: Lukla is only accessible in a narrow morning weather window, TIA gets priority for international traffic, and dozens of flights would pile up waiting for their slot — often leading to hour-long delays, cancellations, and frustrated trekkers missing their first day on the trail.</p>
<p>Manthali Airport in Ramechhap was designated as an overflow departure point. It has dedicated morning slots specifically for Lukla-bound flights, with no competition from international traffic. Flight success rates from Ramechhap are significantly higher during peak season.</p>

<h2>Current Schedule: Which Airport for Which Season?</h2>
<p>The split is seasonal and subject to Nepal Civil Aviation Authority announcements, which are made each year. The general pattern in 2025–2026:</p>
<ul>
    <li><strong>Peak season (Oct–Nov, Mar–May):</strong> Most flights depart from Ramechhap (Manthali Airport)</li>
    <li><strong>Off-peak (Dec–Feb, Jun–Sep):</strong> Flights typically depart from Kathmandu (TIA)</li>
    <li><strong>Some operators:</strong> Run early-morning direct Kathmandu–Lukla flights during shoulder season even when Ramechhap is the main hub</li>
</ul>
<p>Your trekking operator should confirm which airport your flight departs from at the time of booking. Do not assume either way.</p>

<h2>What Ramechhap Means for Your Itinerary</h2>
<p>The key practical implication: if your flight departs from Ramechhap, you need to leave Kathmandu at roughly 2:30–3:00am to arrive at Manthali Airport by 6:00am for a flight window that typically runs 6:30–10:00am (before afternoon clouds close the Lukla approach).</p>
<p>This means:</p>
<ul>
    <li>Your last night in Kathmandu is effectively a pre-dawn departure night — plan for an early night and set multiple alarms</li>
    <li>The drive is approximately 5 hours on winding mountain roads — motion sickness medication is worth considering</li>
    <li>Your operator should arrange private transport from your Kathmandu hotel directly to Manthali; do not book independently or you risk missing the flight window</li>
    <li>Add one day to your Kathmandu pre-trek stay as a buffer — if your flight is delayed out of Ramechhap, you need time to regroup</li>
</ul>

<h2>Booking Your Lukla Flight</h2>
<p>If you are using an operator for your EBC trek, they handle flight booking as part of the package. The airlines serving Lukla include:</p>
<ul>
    <li>Tara Air</li>
    <li>Summit Air</li>
    <li>Sita Air</li>
</ul>
<p>These are small Twin Otter or similar aircraft with 16–19 seats. Flights are weather-dependent with no guarantee — this is a fundamental reality of flying to Lukla. Budget at least one extra day on each end of your trek for potential flight delays.</p>

<h2>Flight Delays and Cancellations: What to Expect</h2>
<p>Lukla flight delays are the single most common cause of itinerary disruption on EBC treks. The approach requires visual flight rules — if there is cloud in the valley or at the airport, flights simply do not go. This happens regularly, even during "good" trekking season.</p>
<p><strong>If your flight is cancelled or delayed:</strong></p>
<ul>
    <li>Your operator will rebook on the next available flight — typically the following morning</li>
    <li>You will need accommodation near the airport (your operator arranges this)</li>
    <li>Build 1–2 buffer days into your Kathmandu stay at the end of the trek — on the return, a delayed flight from Lukla means a delayed connection out of Kathmandu</li>
    <li>Do not book an international departure out of Kathmandu on the same day as your scheduled Lukla return flight</li>
</ul>

<h2>Helicopter: The Alternative to Fixed-Wing</h2>
<p>Helicopter transfers between Kathmandu and Lukla (or directly to Phakding/Namche) are available, weather permitting. They are significantly more expensive ($450–600 one-way per person) but bypass the fixed-wing congestion entirely and offer extraordinary views. Some operators include helicopter transfers in premium itineraries.</p>
<p>The helicopter option is also the fallback when multiple days of fixed-wing delays occur. If you are stuck in Kathmandu and running out of flex days, a helicopter charter shared between 4–5 trekkers becomes cost-comparable to the lost days.</p>

<h2>Frequently Asked Questions</h2>

<h3>Is the Lukla flight safe?</h3>
<p>It is statistically among the more challenging small aircraft operations in the world — due to altitude, weather, and the short runway — but it is operated by trained pilots flying specific high-altitude procedures, and thousands of successful flights occur each season. The risk is weather-related delays rather than inherent danger on a clear day. Choose operators using well-maintained modern aircraft.</p>

<h3>Can I trek to Lukla without flying?</h3>
<p>Yes, but it is rarely done. The road trek from Salleri or Phaplu to Lukla adds 4–7 days to the journey. Some trekkers opt for Jiri–Lukla overland, which is the original EBC approach before the airport was built — it adds 7–10 days and significant elevation gain, but it is a genuinely rewarding route for those with extra time.</p>

<h3>What happens if all Lukla flights are cancelled and I miss my international departure?</h3>
<p>This is rare but happens during sustained bad weather. Your travel insurance should cover trip interruption and accommodation costs. Your operator will rebook flights as quickly as possible. The practical lesson: book international departures with at least 2 days of buffer after your scheduled Lukla return.</p>
HTML
];

// ============================================================
// POST 11 — Boots vs Trail Runners (~1,600 words)
// ============================================================
$posts[11] = [
'excerpt' => 'The boots-versus-trail-runners debate divides every trekking forum. The answer depends on your trek, your feet, and your experience. Here is what actually matters.',
'content' => <<<HTML
<p>Walk into any trekking gear shop in Kathmandu's Thamel district and you will see two distinct camps of buyers: those heading straight for the heavyweight waterproof hiking boots, and those gravitating toward the lightweight trail runners lined up beside them. Both groups will give you confident reasons why their choice is the obviously correct one. The truth is more nuanced — and getting it right for your specific trek matters more than most gear decisions.</p>

<h2>The Case for Traditional Hiking Boots</h2>
<p>For the majority of Nepal's high-altitude treks, a stiff-soled, ankle-supporting, waterproof hiking boot remains the most sensible choice. Here is why:</p>

<h3>Ankle Support on Technical Terrain</h3>
<p>The Everest Base Camp route above Namche Bazaar traverses rocky moraine, loose scree, and uneven stone paths — surfaces where an ankle roll is a realistic possibility for anyone whose ankles are tired after six hours of walking. A higher ankle collar in a proper hiking boot does not prevent all rolls but it provides enough proprioceptive feedback and physical resistance to meaningfully reduce the risk.</p>

<h3>Waterproofing in Monsoon Shoulder Seasons</h3>
<p>Nepal's trekking seasons bracket the monsoon: October–November and March–May both see rain, stream crossings, wet trails, and snow at higher elevations. Gore-Tex or equivalent membrane boots keep your feet dry through 6–8 hours of wet conditions in a way that trail runners — even with waterproof liners — struggle to match once they are saturated.</p>

<h3>Insulation at Altitude</h3>
<p>At Gorak Shep (5,140m), temperatures drop below -15°C at night and may not rise above -5°C during the day in November. Trail runners — even with thick wool socks — leave your feet noticeably colder than insulated mountaineering-grade trekking boots. This matters not just for comfort but for risk: cold feet develop blisters and minor injuries faster, and circulation issues become more pronounced at altitude.</p>

<h3>Protection Against Rocks and Debris</h3>
<p>Stiff-soled boots protect the soles of your feet from the sharp rock edges and moraine debris that are a constant feature of the Khumbu. Trail runners with flexible soles allow more of the rocky irregularity to be felt underfoot — a feature praised on well-groomed trail running paths, a liability on the sharp Himalayan moraine.</p>

<h2>The Case for Trail Runners</h2>
<p>Trail runners have a legitimate following on Nepal's trails, and many experienced trekkers — including a proportion of the guides themselves — prefer them. Here is the genuine argument:</p>

<h3>Weight Reduction Has a Compounding Effect</h3>
<p>A quality trail runner weighs 300–500g per shoe. A quality mountaineering-style trekking boot weighs 600–900g per shoe. That is 600g–800g difference per shoe, or up to 1.6kg total. Over 14 days of 25,000 steps per day, you are lifting 1.6kg of extra weight roughly 350,000 times. The energy cost is measurable — experienced long-distance hikers know that foot weight matters more than pack weight on a gram-for-gram basis.</p>

<h3>Lower Blister Risk for the Right Feet</h3>
<p>A well-fitted trail runner in a foot that has done significant mileage in that specific shoe may cause fewer blisters than a stiff boot being broken in. The flexibility allows the shoe to move more naturally with the foot. If you have 500+ km in your trail runners and zero in your potential trekking boots, the trail runners may actually be the safer blister choice.</p>

<h3>Faster Drying</h3>
<p>A waterproof boot that becomes fully saturated (stream crossing, monsoon day) takes 2–3 days to dry in a teahouse. Trail runners dry overnight. If you have stream crossings in your route — particularly on lower-altitude treks like <a href="/trek?slug=langtang-valley-trek">Langtang Valley</a> or during mid-trail rain — faster drying is a genuine advantage.</p>

<h2>The Decision Matrix: Which Trek, Which Shoe</h2>
<table style="width:100%; border-collapse:collapse; margin:1.5rem 0;">
    <thead>
        <tr style="background:#f3f4f6;">
            <th style="padding:0.75rem; text-align:left; border:1px solid #e5e7eb;">Trek</th>
            <th style="padding:0.75rem; text-align:left; border:1px solid #e5e7eb;">Max Altitude</th>
            <th style="padding:0.75rem; text-align:left; border:1px solid #e5e7eb;">Recommendation</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;"><a href="/trek?slug=poon-hill-trek">Poon Hill</a></td>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;">3,210m</td>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;">Trail runners fine in dry season; boots for Oct–Nov/Mar</td>
        </tr>
        <tr style="background:#f9fafb;">
            <td style="padding:0.75rem; border:1px solid #e5e7eb;"><a href="/trek?slug=langtang-valley-trek">Langtang Valley</a></td>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;">3,870m</td>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;">Light boots or stiff trail runners — stream crossings common</td>
        </tr>
        <tr>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;"><a href="/trek?slug=annapurna-base-camp">Annapurna Base Camp</a></td>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;">4,130m</td>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;">Light waterproof boots recommended</td>
        </tr>
        <tr style="background:#f9fafb;">
            <td style="padding:0.75rem; border:1px solid #e5e7eb;"><a href="/trek?slug=everest-base-camp-trek">Everest Base Camp</a></td>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;">5,545m</td>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;">Full waterproof boots, insulated for Oct–Nov</td>
        </tr>
        <tr>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;"><a href="/trek?slug=annapurna-circuit-trek">Annapurna Circuit</a></td>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;">5,416m</td>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;">Full waterproof boots — Thorong La requires it</td>
        </tr>
        <tr style="background:#f9fafb;">
            <td style="padding:0.75rem; border:1px solid #e5e7eb;"><a href="/trek?slug=manaslu-circuit-trek">Manaslu Circuit</a></td>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;">5,160m</td>
            <td style="padding:0.75rem; border:1px solid #e5e7eb;">Full waterproof boots — Larkya La crosses snow and ice</td>
        </tr>
    </tbody>
</table>

<h2>What Most Guides Actually Wear</h2>
<p>Worth knowing: the Sherpa and Tamang guides who walk these trails 100+ days per year mostly wear mid-weight leather or synthetic trekking boots. Not trail runners. Not heavy mountaineering boots. The middle ground — a supportive, moderately stiff boot with waterproof membrane — is the professional choice for good reason.</p>

<h2>Socks Matter as Much as Shoes</h2>
<p>A high-quality merino wool trekking sock inside an average boot will outperform a mediocre sock inside a premium boot. Invest in at least three pairs of dedicated trekking socks (Darn Tough, Smartwool, Icebreaker). Change socks at lunch if possible — dry socks reduce blister risk dramatically regardless of boot type.</p>

<h2>Frequently Asked Questions</h2>

<h3>Can I rent trekking boots in Kathmandu?</h3>
<p>Yes — Thamel has dozens of gear rental shops. Rental boots are typically $2–4/day. The risk is fit and wear history: a rental boot that is slightly wrong for your foot becomes a serious problem over 14 days. If you are going to rent, arrive early enough in Kathmandu to test-walk the rental boots for at least half a day before your trek departs.</p>

<h3>Do I need gaiters?</h3>
<p>Low gaiters are useful for high-altitude treks in late season (November, April) when snow is common on the trail above 4,500m. They keep snow out of the boot collar. Full gaiters are not necessary on standard trekking routes unless you are crossing high passes in winter conditions.</p>

<h3>Should I buy boots at home or in Kathmandu?</h3>
<p>Buy at home if possible — you need 60–80km break-in time before the trek. Thamel has a wide range of rental and sale boots, but the range of sizes can be limited (sizes above EU 45 are often out of stock), and the break-in problem remains.</p>
HTML
];

$stmt = $pdo->prepare("UPDATE blog_posts SET content = :content, excerpt = :excerpt WHERE id = :id");
foreach ($posts as $id => $data) {
    $stmt->execute([':id' => $id, ':content' => $data['content'], ':excerpt' => $data['excerpt']]);
    echo "Updated post $id\n";
}
echo "Batch 2 complete.\n";
