<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=yetiroutes;charset=utf8mb4', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$posts = [];

// ============================================================
// POST 2 — Packing List for Nepal (~2,000 words)
// ============================================================
$posts[2] = [
'excerpt' => 'The definitive Nepal trekking packing list for 2026. What to bring, what to rent in Kathmandu, and the one packing mistake that sends trekkers home early.',
'content' => <<<HTML
<p>The ideal Nepal trekking pack weighs 7–9kg at the trailhead, contains everything you need for 14 days at altitude, and does not include a single item you wish you had left behind. Getting to that pack takes experience — or a good list. This is the list, built from the specific demands of Nepal's high-altitude trails.</p>
<p>The core packing principle for Nepal trekking is the <strong>three-layer system</strong> for clothing and the <strong>buy-rent-borrow-ignore</strong> framework for gear. Everything below follows from those two ideas.</p>

<h2>The Layer System — Why It Matters at Altitude</h2>
<p>Temperature on Nepal's trails swings 20°C+ within a single day. At 4,000m in October, 8am might be -5°C on a shaded ridgeline, and 11am might be 15°C in a sun-drenched valley. You will add and remove layers four to six times per day. Three specific layers handle every condition:</p>
<ul>
    <li><strong>Base layer:</strong> Merino wool or synthetic moisture-wicking (no cotton — ever). Worn against skin; manages sweat; dries quickly.</li>
    <li><strong>Mid layer:</strong> Fleece or insulated jacket. Warmth while stationary or on cold morning starts. Removed once moving.</li>
    <li><strong>Outer/shell layer:</strong> Waterproof, windproof jacket. Rain protection and wind-block. Does not need to be insulated if your mid layer is.</li>
</ul>
<p>You need <strong>two of each</strong> for a 14-day trek (one to wear, one to rotate). Everything else in the clothing section is supplemental to this system.</p>

<h2>Clothing Checklist</h2>
<ul>
    <li>✓ Base layer tops × 2 (merino wool preferred)</li>
    <li>✓ Base layer bottoms × 2</li>
    <li>✓ Fleece mid-layer jacket × 1</li>
    <li>✓ Down or synthetic insulated jacket × 1 (essential above 3,500m)</li>
    <li>✓ Waterproof shell jacket × 1 (Gore-Tex or equivalent)</li>
    <li>✓ Waterproof trousers × 1 (pack light, use rarely)</li>
    <li>✓ Trekking trousers × 2 (quick-dry synthetic)</li>
    <li>✓ Shorts or light trousers for lower elevations × 1</li>
    <li>✓ Warm beanie × 1</li>
    <li>✓ Sun hat or cap × 1</li>
    <li>✓ Buff / neck gaiter × 1</li>
    <li>✓ Lightweight gloves × 1 pair</li>
    <li>✓ Warm gloves or mittens × 1 pair (for 4,500m+)</li>
    <li>✓ Trekking socks × 3–4 pairs (merino wool)</li>
    <li>✓ Underwear × 4</li>
    <li>✓ Teahouse/camp clothes × 1 set (light leggings + fleece, stays in your bag)</li>
    <li>✓ Trekking boots (broken in — see <a href="/blog/article?slug=boots-vs-trail-runners-nepal">boots vs trail runners guide</a>)</li>
    <li>✓ Camp sandals or lightweight shoes (for teahouse evenings)</li>
    <li>✓ Gaiters × 1 pair (low gaiters sufficient unless crossing snow)</li>
</ul>

<h2>Technical Gear</h2>
<ul>
    <li>✓ Daypack, 25–30 litres (for items your porter does not carry)</li>
    <li>✓ Main kit bag / duffel, 65–75 litres (goes to porter or teahouse; not carried daily)</li>
    <li>✓ Trekking poles × 2 (adjustable; reduces knee stress on descents by 25–30%)</li>
    <li>✓ Headlamp + spare batteries (power outages in teahouses are common)</li>
    <li>✓ Sleeping bag rated to -10°C (rental available in Kathmandu; see <a href="/blog/article?slug=down-vs-synthetic-sleeping-bag">sleeping bags guide</a>)</li>
    <li>✓ Sleeping bag liner (silk or fleece; adds 5°C warmth, light, cheap)</li>
    <li>✓ Trekking poles (bring or rent in Kathmandu — $1–2/day)</li>
    <li>✓ Water bottles × 2, 1-litre each (Nalgene or similar, not single-use)</li>
    <li>✓ Water purification: SteriPen UV or iodine tablets (reduces plastic waste; tap water is available throughout for purification)</li>
    <li>✓ Lightweight dry bags × 2 (keep electronics and clothes dry in rain)</li>
    <li>✓ Sunglasses, category 3–4 (UV is intense at altitude; essential, not optional)</li>
    <li>✓ Trekking umbrella (surprisingly useful for both sun and rain; common among experienced Nepal trekkers)</li>
</ul>

<h2>Toiletries and Health</h2>
<ul>
    <li>✓ Sunscreen SPF 50+ (reapply every 2 hours at altitude)</li>
    <li>✓ Lip balm with SPF</li>
    <li>✓ Blister kit: Compeed or moleskin, needle, antiseptic wipe</li>
    <li>✓ Basic first aid: ibuprofen, paracetamol, antihistamine, diarrhoea tablets (Imodium), rehydration salts</li>
    <li>✓ Altitude medication: Diamox (prescribed by your doctor), Dexamethasone (emergency AMS)</li>
    <li>✓ Hand sanitiser (teahouse hygiene varies)</li>
    <li>✓ Toothbrush, toothpaste, floss</li>
    <li>✓ Biodegradable soap and shampoo (important above treeline)</li>
    <li>✓ Quick-dry towel × 1 (teahouses charge for towels, supply limited at altitude)</li>
    <li>✓ Wet wipes (essential for "shower days" above 4,500m)</li>
    <li>✓ Toilet paper + small trowel (for areas without teahouses)</li>
    <li>✓ Any prescription medications + copy of prescription</li>
</ul>

<h2>Documents and Money</h2>
<ul>
    <li>✓ Passport (original)</li>
    <li>✓ Passport photos × 4 (for permits; carry spares)</li>
    <li>✓ Travel insurance documents with emergency number</li>
    <li>✓ Cash in Nepali Rupees (NPR): no ATMs above Namche Bazaar; carry $300–500 equivalent for the full EBC route. USD is widely accepted at a slightly worse rate</li>
    <li>✓ Emergency contact list (written, not just in phone)</li>
    <li>✓ Trekking permit copies (your operator arranges; keep a photocopy)</li>
</ul>

<h2>Electronics</h2>
<ul>
    <li>✓ Phone + charger</li>
    <li>✓ Universal travel adaptor (Nepal uses Type C, D, M sockets)</li>
    <li>✓ Portable power bank (10,000–20,000 mAh; charging at teahouses is $1–3 per charge)</li>
    <li>✓ Camera (optional; phone cameras are excellent now)</li>
    <li>✓ Downloaded offline maps: Maps.me or Maps Google with the Nepal Himalaya region pre-downloaded</li>
    <li>✓ Earbuds (long rest days and evenings in teahouses)</li>
</ul>

<h2>What to Rent in Kathmandu</h2>
<p>Thamel's gear rental scene is excellent. Quality gear is available at a fraction of purchase cost:</p>
<ul>
    <li><strong>Sleeping bag</strong> (rental: $1–3/day) — heavy to bring from home, quality rentals widely available</li>
    <li><strong>Trekking poles</strong> ($1–2/day)</li>
    <li><strong>Down jacket</strong> ($2–3/day) — saves significant pack space and weight on international flights</li>
    <li><strong>Trekking boots</strong> ($2–4/day) — only if your home boots are broken in and fit well; otherwise rent locally</li>
    <li><strong>Duffel bag</strong> ($1/day) — for your porter's load if you did not bring one</li>
</ul>
<p>Inspect rental gear carefully before paying. Check zips, seams, and fill of down jackets. Test-wear rental boots with your own socks for at least an hour before committing.</p>

<h2>What NOT to Bring</h2>
<ul>
    <li><strong>Cotton clothing of any kind</strong> — cotton absorbs sweat, holds moisture, and does not dry. "Cotton kills" is not a metaphor in cold mountain environments</li>
    <li><strong>Jeans</strong></li>
    <li><strong>More than 2 pairs of trekking trousers</strong></li>
    <li><strong>A full-size toiletry bag</strong> — decant into travel-size containers</li>
    <li><strong>A laptop</strong> — teahouses have electricity and Wi-Fi (patchy above 4,000m); your phone handles all communication needs</li>
    <li><strong>More than 2–3 guidebooks</strong> — digital is lighter and more current</li>
    <li><strong>An umbrella if it adds weight</strong> — a lightweight trekking umbrella (~200g) is worth it; a full-size travel umbrella is not</li>
</ul>

<h2>Frequently Asked Questions</h2>

<h3>Can I do laundry on the EBC route?</h3>
<p>Yes — teahouses offer laundry service at most villages up to around 4,500m. It typically costs $2–5 per load. Allow 24 hours for drying in good conditions; at altitude in November, drying can take 48 hours. Carry enough synthetic base layers that a slow drying day does not leave you without options.</p>

<h3>Is Wi-Fi available on the trail?</h3>
<p>Yes, at most teahouses on the main EBC route. Quality is variable — usable for messaging and basic browsing at lower elevations, often very slow or unavailable above 4,500m. An Ncell or NTC SIM card (available in Kathmandu, ~$10) provides better connectivity than teahouse Wi-Fi on most of the route below 4,000m. Above Dingboche, download what you need in advance.</p>

<h3>How much cash do I need for the full EBC trek?</h3>
<p>Roughly $400–600 USD equivalent in NPR for 14 days including: meals not covered by your package, additional snacks, hot showers ($2–4 per shower above 4,000m), charging fees ($1–3/charge), Wi-Fi ($2–5/day at altitude), tips, and any personal purchases in Namche's shops. Your operator will specify what is included in your package.</p>
HTML
];

// ============================================================
// POST 17 — Sleeping Bags (~1,500 words)
// ============================================================
$posts[17] = [
'excerpt' => 'Down or synthetic? Renting or buying? The right sleeping bag for Nepal trekking depends on altitude, season, and your budget. Here is the definitive breakdown.',
'content' => <<<HTML
<p>At 5,140m in Gorak Shep in late October, the temperature inside an unheated teahouse drops to -10°C overnight. In a thin sleeping bag, you will lie awake in 30-minute increments, unable to sleep properly, losing the recovery that altitude-stressed bodies desperately need. In the right sleeping bag, you will sleep soundly and wake up ready to make the final push to Kala Patthar.</p>
<p>Your sleeping bag is not glamorous kit. No one posts photos of it on Instagram. But it is arguably the most mission-critical piece of gear you will pack for a high-altitude Nepal trek — and the decision between down and synthetic, and between buying and renting, has real consequences.</p>

<h2>Down vs Synthetic: The Core Trade-off</h2>
<p>Every other sleeping bag characteristic — weight, warmth, pack size, price — flows from this fundamental choice. Understanding the trade-off clearly makes the rest of the decision simple.</p>

<h3>Down Sleeping Bags</h3>
<p>Down (goose or duck feather insulation) is the superior insulation material in almost every metric when conditions are dry:</p>
<ul>
    <li><strong>Warmth-to-weight ratio:</strong> Down provides more warmth per gram than any synthetic alternative. A -10°C down bag weighs 900g–1.2kg. An equivalent synthetic bag weighs 1.4–1.8kg.</li>
    <li><strong>Compressibility:</strong> Down packs to a fraction of synthetic's size — critical when you are trying to fit a sleeping bag, down jacket, and everything else into a 65L duffel.</li>
    <li><strong>Longevity:</strong> A well-maintained quality down bag lasts 15–20+ years. Synthetic bags degrade significantly after 3–5 years of regular use.</li>
</ul>
<p><strong>The weakness:</strong> Down loses its insulating properties when wet. Soaked down clusters collapse and provide virtually no warmth. If your bag gets wet — teahouse condensation, pack flooding in monsoon rain, melting snow in your tent — a down bag becomes genuinely dangerous.</p>

<h3>Synthetic Sleeping Bags</h3>
<p>Synthetic insulation (polyester fibres of various types) addresses down's core weakness:</p>
<ul>
    <li><strong>Retains warmth when wet:</strong> Synthetic fibres continue providing insulation even when saturated. In Nepal's wet conditions, this matters.</li>
    <li><strong>Dries faster:</strong> A wet synthetic bag can be usable again in hours. A wet down bag requires professional washing and may be out of commission for days.</li>
    <li><strong>Lower cost:</strong> Quality synthetic bags cost 30–50% less than equivalent-rated down bags.</li>
    <li><strong>Suitable for those with down allergies:</strong> Rare but relevant.</li>
</ul>
<p><strong>The weakness:</strong> Heavier, bulkier, and shorter-lived than down.</p>

<h2>Temperature Ratings — What They Actually Mean</h2>
<p>Sleeping bags use the EN/ISO 23537 standard with three ratings:</p>
<ul>
    <li><strong>Comfort:</strong> Temperature at which a standard woman will sleep comfortably</li>
    <li><strong>Lower Limit:</strong> Temperature at which a standard man will sleep comfortably</li>
    <li><strong>Extreme:</strong> Survival limit — you will not freeze to death, but you will not sleep either</li>
</ul>
<p>Buy to the <strong>Lower Limit</strong> rating, not the Extreme. If the coldest night you will experience is -8°C (Gorak Shep, October), you want a bag rated to -10°C Lower Limit. Many casual buyers purchase to the Extreme rating and then wonder why they are cold.</p>

<h2>What Rating Do You Need for Each Nepal Trek?</h2>
<table style="width:100%; border-collapse:collapse; margin:1.5rem 0;">
    <thead>
        <tr style="background:#f3f4f6;">
            <th style="padding:0.75rem; text-align:left; border:1px solid #e5e7eb;">Trek / Highest Sleep Point</th>
            <th style="padding:0.75rem; text-align:left; border:1px solid #e5e7eb;">Season</th>
            <th style="padding:0.75rem; text-align:left; border:1px solid #e5e7eb;">Min. Lower Limit Rating</th>
        </tr>
    </thead>
    <tbody>
        <tr><td style="padding:0.75rem; border:1px solid #e5e7eb;"><a href="/trek?slug=poon-hill-trek">Poon Hill</a> (3,210m)</td><td style="padding:0.75rem; border:1px solid #e5e7eb;">Oct–Nov / Mar–Apr</td><td style="padding:0.75rem; border:1px solid #e5e7eb;">-5°C</td></tr>
        <tr style="background:#f9fafb;"><td style="padding:0.75rem; border:1px solid #e5e7eb;"><a href="/trek?slug=langtang-valley-trek">Langtang Valley</a> (3,870m)</td><td style="padding:0.75rem; border:1px solid #e5e7eb;">Oct–Nov / Mar</td><td style="padding:0.75rem; border:1px solid #e5e7eb;">-5°C to -10°C</td></tr>
        <tr><td style="padding:0.75rem; border:1px solid #e5e7eb;"><a href="/trek?slug=annapurna-base-camp">ABC Trek</a> (4,130m)</td><td style="padding:0.75rem; border:1px solid #e5e7eb;">Oct–Nov / Mar–Apr</td><td style="padding:0.75rem; border:1px solid #e5e7eb;">-10°C</td></tr>
        <tr style="background:#f9fafb;"><td style="padding:0.75rem; border:1px solid #e5e7eb;"><a href="/trek?slug=everest-base-camp-trek">EBC Trek</a> (5,140m sleep)</td><td style="padding:0.75rem; border:1px solid #e5e7eb;">Oct–Nov</td><td style="padding:0.75rem; border:1px solid #e5e7eb;">-15°C</td></tr>
        <tr><td style="padding:0.75rem; border:1px solid #e5e7eb;"><a href="/trek?slug=annapurna-circuit-trek">Annapurna Circuit</a> (4,920m sleep)</td><td style="padding:0.75rem; border:1px solid #e5e7eb;">Oct–Nov</td><td style="padding:0.75rem; border:1px solid #e5e7eb;">-15°C</td></tr>
    </tbody>
</table>

<h2>Should You Buy or Rent?</h2>
<p>This depends on how often you trek. The economics:</p>
<ul>
    <li><strong>Rental in Kathmandu:</strong> $1–3/day. For a 14-day EBC trek: $14–42. Total cost: low.</li>
    <li><strong>Purchase of a quality down bag rated to -15°C:</strong> $200–500. Lasts 15+ years.</li>
</ul>
<p>If you trek once every few years, <strong>rent</strong>. The cost is dramatically lower and you avoid the logistics of transporting a bulky bag internationally.</p>
<p>If you trek annually or plan to do so, <strong>buy</strong>. A $300 down bag used ten times over a decade costs $30 per use — less than a week's rental.</p>
<p><strong>Rental inspection checklist:</strong></p>
<ul>
    <li>Check for even loft throughout — flat sections indicate dead down</li>
    <li>Check zip smoothness — a stuck zip at -10°C is a serious problem</li>
    <li>Check hood adjustment cord and cinch — essential for cold nights</li>
    <li>Smell — a well-maintained rental bag is odour-free; mustiness indicates poor washing</li>
</ul>

<h2>Frequently Asked Questions</h2>

<h3>Do teahouses provide blankets?</h3>
<p>Most do — usually a thick yak wool blanket or duvet. They vary significantly in warmth and cleanliness. Use your sleeping bag as the primary warmth layer and teahouse blankets as supplemental. Do not rely on teahouse bedding alone above 4,000m.</p>

<h3>What is a sleeping bag liner and do I need one?</h3>
<p>A liner is a thin inner bag (silk or fleece) that sits inside your sleeping bag. Benefits: adds 3–5°C warmth at minimal weight (150–300g); protects the sleeping bag interior from body oils (extends bag life); silk liners feel cleaner than teahouse bedding. Recommended if you have a borderline-rated bag or are a cold sleeper.</p>

<h3>Can I wash a rental sleeping bag after the trek?</h3>
<p>The rental shop handles washing. Return it in the condition you received it. If it becomes significantly wet or soiled during the trek, inform the shop — there may be a cleaning fee, but this is preferable to being charged for a "damaged" bag.</p>
HTML
];

// ============================================================
// POST 12 — Mani Stones (~1,200 words)
// ============================================================
$posts[12] = [
'excerpt' => 'Mani stones are the prayer language of the Himalayas, written in stone by generations of Buddhist devotees. Understanding their meaning transforms how you walk the trails of Nepal.',
'content' => <<<HTML
<p>Somewhere in the first two days of almost every Nepal trekking route — the Everest corridor, the Annapurna approaches, the Langtang valley — you will encounter a long, low wall of flat stones, each carved with the same six Tibetan syllables: <em>Om Mani Padme Hum</em>. These are mani walls, and the stones that form them are among the most sacred objects in Himalayan Buddhism.</p>
<p>Most trekkers walk past them. Some photograph them. A few know to pass on the left — the correct protocol according to Buddhist tradition. Fewer still understand why these walls exist, what the mantra means, and why the act of carving a single stone and adding it to a wall is considered a meritorious act that accumulates over a lifetime.</p>

<h2>What Is a Mani Stone?</h2>
<p>A mani stone (Tibetan: མ་ཎི་རྡོ) is any stone carved, painted, or inscribed with Buddhist prayers, mantras, or sacred imagery. The most common inscription is the mantra <em>Om Mani Padme Hum</em> — the six-syllable mantra of Avalokitesvara, the bodhisattva of compassion — but you will also find stones carved with prayers, the image of the Buddha, or symbolic figures.</p>
<p>Individual mani stones are placed together over time to form mani walls (long horizontal accumulations), mani piles (sometimes at trail junctions or pass summits), or chortens and stupas (dome-shaped structures containing relics). In the Khumbu and Langtang regions of Nepal, mani walls run for hundreds of metres along the main trails — some of the largest in the world.</p>

<h2>The Mantra: Om Mani Padme Hum</h2>
<p>The six syllables are among the most recited words in the world within Tibetan and Himalayan Buddhist communities. They are associated with Avalokitesvara (Chenrezig in Tibetan), the bodhisattva who embodies the compassion of all Buddhas.</p>
<p>Translations of the mantra are necessarily approximate, as the syllables are considered to embody meaning beyond literal translation. A common interpretation: <em>Om</em> represents the sacred sound of the universe; <em>Mani</em> means jewel; <em>Padme</em> means lotus; <em>Hum</em> represents the spirit of enlightenment. Together, they are often interpreted as "the jewel in the lotus" — a symbol of wisdom arising from the human condition, as a lotus flower rises from murky water to bloom above the surface.</p>
<p>In Tibetan Buddhist belief, reciting, writing, or carving this mantra accumulates merit and purifies negative karma. A person who carves the mantra onto a stone and places it on a mani wall is performing a devotional act that benefits not only themselves but all beings who encounter the stone.</p>

<h2>The Left-Hand Rule: Why It Matters</h2>
<p>Perhaps the most practical thing to know about mani walls and chortens is the rule of passage: <strong>always walk past them keeping the sacred object on your right</strong>. This means walking on the left side of the structure as you face it, and on the left side of the trail as you approach it on the trail.</p>
<p>This is not merely a cultural preference — it is a deeply held religious practice rooted in the tradition of ritual circumambulation (walking around sacred objects in a clockwise direction, which in Himalayan Buddhism is the direction of positive spiritual energy). When a sacred wall runs along the trail, the respectful passage keeps you circling in the correct direction.</p>
<p>You will see painted arrows on some mani walls reminding trekkers of the correct direction. On some busy trails, particularly near Tengboche and Namche Bazaar on the <a href="/trek?slug=everest-base-camp-trek">EBC route</a>, the wall creates a deliberate trail split — local people consistently take one side, and observant visitors follow suit.</p>

<h2>Prayer Wheels: The Spinning Counterpart</h2>
<p>Closely related to mani stones are prayer wheels — cylindrical metal drums on a spindle, filled with scrolls printed with the Om Mani Padme Hum mantra thousands of times. Spinning the wheel clockwise is believed to have the same spiritual effect as reciting the mantra for every revolution of the wheel.</p>
<p>You will encounter prayer wheels at the entrance to monasteries, along village paths, beside rivers (where water-powered prayer wheels spin continuously, accumulating merit ceaselessly), and carried by individual practitioners. The correct motion is always clockwise — a brief, gentle spin as you pass, not a tourist performance, but a participation in a practice that has continued in these mountains for centuries.</p>

<h2>Where to Find the Most Significant Examples in Nepal</h2>
<ul>
    <li><strong>Namche Bazaar, Khumbu:</strong> The town's main mani wall and surrounding chortens are among the most visited in Nepal. The Namche monastery contains exceptional thangka paintings and prayer wheels.</li>
    <li><strong>Tengboche Monastery (3,867m):</strong> One of the most important monasteries in the Khumbu, rebuilt after a 1989 fire. The approach path through the forest, with its carved stones and prayer flags, is one of the most atmospheric walks in the Himalaya.</li>
    <li><strong>Kyanjin Gompa, Langtang:</strong> The gompa at the head of <a href="/trek?slug=langtang-valley-trek">Langtang Valley</a> is the heart of religious life in the region. The surrounding area has exceptional mani walls rebuilt after the 2015 earthquake.</li>
    <li><strong>Muktinath Temple, Annapurna Circuit:</strong> A pilgrimage site sacred to both Hindus and Buddhists, with 108 water spouts and the famous flame of natural gas burning amid water. The <a href="/trek?slug=annapurna-circuit-trek">Annapurna Circuit</a> passes through here.</li>
</ul>

<h2>Frequently Asked Questions</h2>

<h3>Is it disrespectful for non-Buddhists to pass mani walls on the left?</h3>
<p>No — quite the opposite. Following the left-hand practice is considered respectful regardless of your own beliefs. It is an acknowledgement of the sacred nature of the object, not a statement of personal faith.</p>

<h3>Can I touch or photograph mani stones?</h3>
<p>Photography is generally acceptable — these are public trail features, not objects within a temple. Touching is more complex: picking up a mani stone, moving it, or taking it as a souvenir is considered deeply disrespectful and is prohibited. Touching as part of a moment of contemplation or a gentle blessing gesture is generally fine.</p>

<h3>What does it mean when prayer flags fade?</h3>
<p>The fading of prayer flags is intentional and symbolic — as the wind carries the colours away, it is believed to carry the prayers printed on the flags into the world. A new prayer flag placed beside faded old ones is a common sight on ridge lines and pass summits throughout Nepal's trekking regions.</p>

<h3>Are the carvings done by professional artisans?</h3>
<p>Both. Some mani stones are commissioned works by skilled stone carvers — you can watch them working in villages near Namche and Kyanjin. Others are carved by ordinary community members as personal devotional practice. The quality varies enormously, from crude scratched outlines to intricate, deeply cut calligraphy that has survived centuries of weather.</p>
HTML
];

$stmt = $pdo->prepare("UPDATE blog_posts SET content = :content, excerpt = :excerpt WHERE id = :id");
foreach ($posts as $id => $data) {
    $stmt->execute([':id' => $id, ':content' => $data['content'], ':excerpt' => $data['excerpt']]);
    echo "Updated post $id\n";
}
echo "Batch 3 complete.\n";
