<?php
/**
 * Trekking in Nepal - SEO Pillar Page
 * Target: "trekking in Nepal", "Nepal trekking tours", "best treks in Nepal"
 */

use App\Services\SeoService;
$seo = new SeoService();
?>

<?php ob_start(); ?>

<!-- Breadcrumbs -->
<?php if (isset($breadcrumbs) && !empty($breadcrumbs)): ?>
    <div class="container mx-auto px-6 pt-6">
        <?= $seo->renderBreadcrumbs($breadcrumbs) ?>
    </div>
<?php endif; ?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white py-20">
    <div class="absolute inset-0 bg-[url('/images/hero-pattern.svg')] opacity-10"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                Trekking in Nepal: Complete Guide 2026
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed">
                Discover the world's premier trekking destination. From the towering peaks of Everest to the hidden valleys of Manaslu, experience the Himalayas with expert local guides.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/treks" class="bg-lime-400 text-slate-900 px-8 py-4 rounded-full font-semibold hover:bg-lime-300 transition shadow-lg">
                    Explore All Treks
                </a>
                <a href="/contact" class="bg-white/10 backdrop-blur text-white px-8 py-4 rounded-full font-semibold hover:bg-white/20 transition border-2 border-white/30">
                    Plan Custom Trek
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="bg-gray-50">
    <div class="container mx-auto px-6 py-16">
        <div class="max-w-4xl mx-auto">

            <!-- Introduction -->
            <article class="prose prose-lg max-w-none mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">

                    <h2 class="text-4xl font-bold mb-6 text-slate-900">Why Nepal is the World's Premier Trekking Destination</h2>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        Nepal is home to <strong>8 of the world's 14 highest peaks</strong>, including Mount Everest (8,849m), making it the ultimate destination for mountain enthusiasts. But trekking in Nepal offers far more than just mountain views. You'll journey through ancient Buddhist monasteries, cross suspension bridges over roaring rivers, experience warm Himalayan hospitality in traditional teahouses, and witness cultural diversity from Sherpa villages to Tibetan settlements.
                    </p>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        What makes Nepal exceptional is the accessibility of these adventures. Unlike mountaineering expeditions that require technical skills, most Nepal treks are <strong>non-technical hiking routes</strong> suitable for anyone with good fitness and determination. You'll walk on well-established trails used by locals for centuries, staying in comfortable lodges with hot meals, surrounded by the world's most spectacular mountain scenery.
                    </p>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        Whether you have 5 days or 5 weeks, there's a perfect trek waiting for you. From the iconic <a href="/trek/everest-base-camp" class="text-purple-600 hover:text-purple-800 font-semibold">Everest Base Camp trek</a> to the off-the-beaten-path <a href="/trek/manaslu-circuit" class="text-purple-600 hover:text-purple-800 font-semibold">Manaslu Circuit</a>, Nepal's diverse trekking routes cater to every experience level, budget, and timeline.
                    </p>

                </div>
            </article>

            <!-- Best Trekking Regions -->
            <section class="mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-8 text-slate-900">Best Trekking Regions in Nepal</h2>

                    <p class="text-lg text-gray-700 mb-10">
                        Nepal's trekking regions each offer unique landscapes, cultural experiences, and challenges. Here's your guide to choosing the perfect region for your adventure.
                    </p>

                    <!-- Everest Region -->
                    <div class="mb-12 pb-12 border-b border-gray-200">
                        <h3 class="text-3xl font-bold mb-4 text-slate-900">
                            <i class="ri-mountain-line text-purple-600 mr-2"></i>
                            Everest Region (Khumbu)
                        </h3>
                        <p class="text-lg text-gray-700 mb-4">
                            The <strong>Everest region</strong> is the crown jewel of Nepal trekking, home to the world's highest mountain and the legendary Sherpa people. This region offers the most iconic trekking experience with dramatic Himalayan scenery, traditional Buddhist culture, and well-developed infrastructure.
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Highlights:</strong> Mount Everest views, Tengboche Monastery, Sherpa culture, Namche Bazaar (mountain trading hub), challenging high-altitude passes.
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Popular Treks:</strong> <a href="/trek/everest-base-camp" class="text-purple-600 hover:underline">Everest Base Camp</a> (12-14 days), Gokyo Lakes (12 days), Three Passes Trek (18-20 days), Everest View Trek (7 days).
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Best For:</strong> Trekkers seeking the ultimate high-altitude challenge, photography enthusiasts, and those who dream of standing at the foot of Everest.
                        </p>
                        <p class="text-gray-700">
                            <strong>Difficulty:</strong> Moderate to Challenging | <strong>Max Altitude:</strong> 5,545m | <strong>Best Season:</strong> March-May, September-November
                        </p>
                    </div>

                    <!-- Annapurna Region -->
                    <div class="mb-12 pb-12 border-b border-gray-200">
                        <h3 class="text-3xl font-bold mb-4 text-slate-900">
                            <i class="ri-landscape-line text-purple-600 mr-2"></i>
                            Annapurna Region
                        </h3>
                        <p class="text-lg text-gray-700 mb-4">
                            The <strong>Annapurna region</strong> is Nepal's most diverse trekking area, offering everything from lush rhododendron forests to high-altitude deserts. With the widest variety of trekking options, this region suits all experience levels and timeframes.
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Highlights:</strong> Diverse landscapes, cultural variety (Gurung, Manangi, Thakali people), natural hot springs, dramatic gorges, easier access from Pokhara.
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Popular Treks:</strong> <a href="/trek/annapurna-base-camp" class="text-purple-600 hover:underline">Annapurna Base Camp</a> (7-10 days), Annapurna Circuit (15-18 days), Ghorepani Poon Hill (4-5 days), Mardi Himal (5-7 days).
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Best For:</strong> First-time trekkers, families, budget-conscious travelers, and those seeking diverse scenery without extreme altitude.
                        </p>
                        <p class="text-gray-700">
                            <strong>Difficulty:</strong> Easy to Challenging | <strong>Max Altitude:</strong> 5,416m | <strong>Best Season:</strong> March-May, September-November
                        </p>
                    </div>

                    <!-- Langtang Region -->
                    <div class="mb-12 pb-12 border-b border-gray-200">
                        <h3 class="text-3xl font-bold mb-4 text-slate-900">
                            <i class="ri-plant-line text-purple-600 mr-2"></i>
                            Langtang Region
                        </h3>
                        <p class="text-lg text-gray-700 mb-4">
                            The <strong>Langtang region</strong>, closest to Kathmandu, offers stunning mountain views with fewer crowds. Known as the "valley of glaciers," this region provides an authentic Himalayan experience with strong Tibetan cultural influences.
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Highlights:</strong> Close to Kathmandu (7-hour drive), Tibetan Buddhist culture, spectacular Langtang Lirung views (7,227m), less crowded trails, sacred Gosainkunda lakes.
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Popular Treks:</strong> <a href="/trek/langtang-valley" class="text-purple-600 hover:underline">Langtang Valley</a> (7-10 days), Gosainkunda Trek (7-9 days), Tamang Heritage Trail (8 days).
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Best For:</strong> Trekkers with limited time, those seeking authentic culture, photographers wanting dramatic mountain-valley contrasts.
                        </p>
                        <p class="text-gray-700">
                            <strong>Difficulty:</strong> Moderate | <strong>Max Altitude:</strong> 4,984m | <strong>Best Season:</strong> March-May, September-November
                        </p>
                    </div>

                    <!-- Manaslu Region -->
                    <div class="mb-8">
                        <h3 class="text-3xl font-bold mb-4 text-slate-900">
                            <i class="ri-compass-3-line text-purple-600 mr-2"></i>
                            Manaslu Region
                        </h3>
                        <p class="text-lg text-gray-700 mb-4">
                            The <strong>Manaslu region</strong> is Nepal's best-kept secret - a restricted area offering pristine wilderness, authentic culture, and dramatic scenery without the crowds of Everest or Annapurna. This is trekking as it used to be.
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Highlights:</strong> Remote and untouched, circumnavigates world's 8th highest peak (8,163m), rich Tibetan culture, diverse ecosystems from subtropical to alpine, fewer trekkers.
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Popular Treks:</strong> <a href="/trek/manaslu-circuit" class="text-purple-600 hover:underline">Manaslu Circuit</a> (14-16 days), Tsum Valley (15-18 days).
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Best For:</strong> Experienced trekkers seeking adventure off the beaten path, culture enthusiasts, those who prefer quieter trails.
                        </p>
                        <p class="text-gray-700">
                            <strong>Difficulty:</strong> Challenging | <strong>Max Altitude:</strong> 5,160m | <strong>Best Season:</strong> March-May, September-November | <strong>Note:</strong> Requires guide and restricted area permit
                        </p>
                    </div>

                </div>
            </section>

            <!-- Best Time to Trek -->
            <section class="mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-8 text-slate-900">Best Time to Trek in Nepal</h2>

                    <p class="text-lg text-gray-700 mb-8">
                        Timing is crucial for a successful trek. Nepal has four distinct seasons, but two are optimal for trekking.
                    </p>

                    <div class="grid md:grid-cols-2 gap-8 mb-8">
                        <!-- Spring Season -->
                        <div class="bg-lime-50 rounded-xl p-6 border-2 border-lime-200">
                            <h3 class="text-2xl font-bold mb-4 text-lime-800">
                                <i class="ri-sun-line mr-2"></i>Spring (March-May)
                            </h3>
                            <p class="text-gray-700 mb-4">
                                <strong>Peak Season</strong> - Warmer temperatures, blooming rhododendrons, and clear skies make spring ideal for trekking.
                            </p>
                            <ul class="space-y-2 text-gray-700">
                                <li><strong>✓ Weather:</strong> Clear mornings, occasional afternoon clouds</li>
                                <li><strong>✓ Temperature:</strong> 15-20°C at low altitude, -10°C at high camps</li>
                                <li><strong>✓ Highlights:</strong> Rhododendron forests in full bloom</li>
                                <li><strong>✓ Crowds:</strong> Moderate to busy on popular routes</li>
                            </ul>
                        </div>

                        <!-- Autumn Season -->
                        <div class="bg-orange-50 rounded-xl p-6 border-2 border-orange-200">
                            <h3 class="text-2xl font-bold mb-4 text-orange-800">
                                <i class="ri-cloudy-line mr-2"></i>Autumn (September-November)
                            </h3>
                            <p class="text-gray-700 mb-4">
                                <strong>Best Season</strong> - The clearest skies of the year provide spectacular mountain views and stable weather.
                            </p>
                            <ul class="space-y-2 text-gray-700">
                                <li><strong>✓ Weather:</strong> Crisp, clear, and stable</li>
                                <li><strong>✓ Temperature:</strong> 10-20°C at low altitude, -15°C at high camps</li>
                                <li><strong>✓ Highlights:</strong> Best mountain visibility, harvest festivals</li>
                                <li><strong>✓ Crowds:</strong> Peak season - busiest trails</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-blue-50 rounded-xl p-6 border-2 border-blue-200">
                        <h3 class="text-xl font-bold mb-3 text-blue-800">Winter & Monsoon Trekking</h3>
                        <p class="text-gray-700 mb-2">
                            <strong>Winter (December-February):</strong> Possible for lower-altitude treks (below 4,000m). Very cold at night but clearer skies. High passes may be snow-blocked.
                        </p>
                        <p class="text-gray-700">
                            <strong>Monsoon (June-August):</strong> Heavy rainfall, leeches, obscured views. Best avoided except for rain-shadow areas like Upper Mustang.
                        </p>
                    </div>

                </div>
            </section>

            <!-- Difficulty Levels -->
            <section class="mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-8 text-slate-900">Trekking Difficulty Levels Explained</h2>

                    <p class="text-lg text-gray-700 mb-8">
                        Understanding difficulty levels helps you choose the right trek for your fitness and experience. Here's what each level means in practical terms.
                    </p>

                    <div class="space-y-6">
                        <!-- Easy -->
                        <div class="flex gap-4 p-6 bg-green-50 rounded-xl border-l-4 border-green-500">
                            <div class="flex-shrink-0">
                                <span class="inline-block px-4 py-2 bg-green-500 text-white font-bold rounded-lg">EASY</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold mb-2 text-green-800">Beginner-Friendly Treks</h3>
                                <p class="text-gray-700 mb-2">
                                    <strong>Examples:</strong> Ghorepani Poon Hill (4-5 days), Kathmandu Valley Rim (3-4 days)
                                </p>
                                <p class="text-gray-700">
                                    <strong>What to Expect:</strong> 4-6 hours walking daily, maximum altitude 3,500m, well-maintained trails, suitable for families. Basic fitness required - if you can walk 2-3 hours comfortably, you can do these treks.
                                </p>
                            </div>
                        </div>

                        <!-- Moderate -->
                        <div class="flex gap-4 p-6 bg-yellow-50 rounded-xl border-l-4 border-yellow-500">
                            <div class="flex-shrink-0">
                                <span class="inline-block px-4 py-2 bg-yellow-500 text-white font-bold rounded-lg">MODERATE</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold mb-2 text-yellow-800">Intermediate Treks</h3>
                                <p class="text-gray-700 mb-2">
                                    <strong>Examples:</strong> Langtang Valley (7-10 days), Annapurna Base Camp (7-10 days), Mardi Himal (5-7 days)
                                </p>
                                <p class="text-gray-700">
                                    <strong>What to Expect:</strong> 5-7 hours walking daily, altitude 4,000-5,000m, some steep sections, acclimatization important. Good fitness required - regular cardio exercise (running, cycling) for 2-3 months before recommended.
                                </p>
                            </div>
                        </div>

                        <!-- Challenging -->
                        <div class="flex gap-4 p-6 bg-orange-50 rounded-xl border-l-4 border-orange-500">
                            <div class="flex-shrink-0">
                                <span class="inline-block px-4 py-2 bg-orange-500 text-white font-bold rounded-lg">CHALLENGING</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold mb-2 text-orange-800">Advanced High-Altitude Treks</h3>
                                <p class="text-gray-700 mb-2">
                                    <strong>Examples:</strong> Everest Base Camp (12-14 days), Annapurna Circuit (15-18 days), Manaslu Circuit (14-16 days)
                                </p>
                                <p class="text-gray-700">
                                    <strong>What to Expect:</strong> 6-8 hours walking daily, altitude above 5,000m, high passes, altitude sickness risk. Excellent fitness required - 3-4 months of training including hill walking, stair climbing, and cardio workouts. Mental toughness essential.
                                </p>
                            </div>
                        </div>

                        <!-- Strenuous -->
                        <div class="flex gap-4 p-6 bg-red-50 rounded-xl border-l-4 border-red-500">
                            <div class="flex-shrink-0">
                                <span class="inline-block px-4 py-2 bg-red-500 text-white font-bold rounded-lg">STRENUOUS</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold mb-2 text-red-800">Extreme Adventure Treks</h3>
                                <p class="text-gray-700 mb-2">
                                    <strong>Examples:</strong> Three Passes Trek (18-20 days), Great Himalaya Trail sections, Peak climbing combinations
                                </p>
                                <p class="text-gray-700">
                                    <strong>What to Expect:</strong> 7-9 hours walking daily, multiple high passes above 5,400m, remote areas, self-sufficiency important. Peak physical condition required - 6 months training minimum. Previous high-altitude experience highly recommended.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Permit Requirements -->
            <section class="mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-8 text-slate-900">Trekking Permits & Requirements</h2>

                    <p class="text-lg text-gray-700 mb-8">
                        All trekkers in Nepal need permits. Here's your complete guide to understanding and obtaining the necessary documentation.
                    </p>

                    <div class="space-y-8">
                        <!-- TIMS Card -->
                        <div class="bg-purple-50 p-6 rounded-xl">
                            <h3 class="text-2xl font-bold mb-4 text-purple-800">
                                <i class="ri-file-list-line mr-2"></i>TIMS Card (Trekkers' Information Management System)
                            </h3>
                            <p class="text-gray-700 mb-4">
                                A database system for trekker safety and rescue coordination.
                            </p>
                            <ul class="space-y-2 text-gray-700 ml-4">
                                <li><strong>• Cost:</strong> NPR 2,000 ($15) for independent trekkers, NPR 1,000 ($8) with registered agency</li>
                                <li><strong>• Where to Get:</strong> Nepal Tourism Board office in Kathmandu or Pokhara, or through trekking agency</li>
                                <li><strong>• Required For:</strong> Most trekking regions (exceptions: Everest region from 2018 onwards)</li>
                                <li><strong>• Documents Needed:</strong> 2 passport-size photos, passport copy</li>
                            </ul>
                        </div>

                        <!-- National Park Permits -->
                        <div class="bg-green-50 p-6 rounded-xl">
                            <h3 class="text-2xl font-bold mb-4 text-green-800">
                                <i class="ri-landscape-line mr-2"></i>National Park & Conservation Area Permits
                            </h3>
                            <p class="text-gray-700 mb-4">
                                Entry fees for protected areas where most popular treks are located.
                            </p>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="bg-white p-4 rounded-lg">
                                    <h4 class="font-bold mb-2">Sagarmatha National Park (Everest)</h4>
                                    <p class="text-gray-700">NPR 3,000 ($23)</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg">
                                    <h4 class="font-bold mb-2">Annapurna Conservation Area</h4>
                                    <p class="text-gray-700">NPR 3,000 ($23)</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg">
                                    <h4 class="font-bold mb-2">Langtang National Park</h4>
                                    <p class="text-gray-700">NPR 3,000 ($23)</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg">
                                    <h4 class="font-bold mb-2">Makalu Barun National Park</h4>
                                    <p class="text-gray-700">NPR 3,000 ($23)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Restricted Area Permits -->
                        <div class="bg-orange-50 p-6 rounded-xl">
                            <h3 class="text-2xl font-bold mb-4 text-orange-800">
                                <i class="ri-lock-line mr-2"></i>Restricted Area Permits (RAP)
                            </h3>
                            <p class="text-gray-700 mb-4">
                                Special permits for remote, restricted regions. <strong>Requires licensed guide and minimum 2 trekkers.</strong>
                            </p>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="bg-white p-4 rounded-lg">
                                    <h4 class="font-bold mb-2">Manaslu Circuit</h4>
                                    <p class="text-gray-700">$100 USD (September-November)<br>$75 USD (December-August)</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg">
                                    <h4 class="font-bold mb-2">Upper Mustang</h4>
                                    <p class="text-gray-700">$500 USD for 10 days</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg">
                                    <h4 class="font-bold mb-2">Tsum Valley</h4>
                                    <p class="text-gray-700">$40 USD per week</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg">
                                    <h4 class="font-bold mb-2">Kanchenjunga</h4>
                                    <p class="text-gray-700">$20 USD per week</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-blue-50 p-6 rounded-xl">
                            <h3 class="text-xl font-bold mb-3 text-blue-800">How to Obtain Permits</h3>
                            <ol class="space-y-2 text-gray-700 ml-4 list-decimal">
                                <li><strong>Through Trekking Agency (Recommended):</strong> Your agency handles all permits as part of your package. Saves time and hassle.</li>
                                <li><strong>Independently:</strong> Visit Nepal Tourism Board office in Kathmandu (Pradarshani Marg, Kathmandu) or Pokhara. Bring passport, 2 photos, and cash (USD or NPR).</li>
                                <li><strong>Processing Time:</strong> Same day for most permits (1-2 hours). Restricted area permits may take 1-2 days.</li>
                            </ol>
                        </div>

                    </div>

                </div>
            </section>

            <!-- Cost of Trekking -->
            <section class="mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-8 text-slate-900">How Much Does Trekking in Nepal Cost?</h2>

                    <p class="text-lg text-gray-700 mb-8">
                        Nepal trekking offers exceptional value compared to other mountain destinations. Here's a realistic breakdown of costs for different budgets.
                    </p>

                    <div class="grid md:grid-cols-3 gap-6 mb-8">
                        <!-- Budget -->
                        <div class="bg-green-50 rounded-xl p-6 border-2 border-green-300">
                            <h3 class="text-2xl font-bold mb-4 text-green-800">Budget Trekking</h3>
                            <div class="text-4xl font-bold text-green-600 mb-4">$30-50<span class="text-lg">/day</span></div>
                            <ul class="space-y-2 text-gray-700 text-sm">
                                <li>✓ Independent teahouse trekking</li>
                                <li>✓ Basic accommodation</li>
                                <li>✓ Self-organized permits</li>
                                <li>✓ Local meals (Dal Bhat)</li>
                                <li>✓ No guide/porter</li>
                            </ul>
                        </div>

                        <!-- Mid-Range -->
                        <div class="bg-purple-50 rounded-xl p-6 border-2 border-purple-300">
                            <h3 class="text-2xl font-bold mb-4 text-purple-800">Mid-Range Guided</h3>
                            <div class="text-4xl font-bold text-purple-600 mb-4">$70-120<span class="text-lg">/day</span></div>
                            <ul class="space-y-2 text-gray-700 text-sm">
                                <li>✓ Licensed guide & porter</li>
                                <li>✓ Quality teahouse accommodation</li>
                                <li>✓ All permits included</li>
                                <li>✓ 3 meals daily</li>
                                <li>✓ Insurance for staff</li>
                            </ul>
                        </div>

                        <!-- Premium -->
                        <div class="bg-orange-50 rounded-xl p-6 border-2 border-orange-300">
                            <h3 class="text-2xl font-bold mb-4 text-orange-800">Premium Private</h3>
                            <div class="text-4xl font-bold text-orange-600 mb-4">$150-250<span class="text-lg">/day</span></div>
                            <ul class="space-y-2 text-gray-700 text-sm">
                                <li>✓ Private experienced guide</li>
                                <li>✓ Best available lodges</li>
                                <li>✓ Flexible itinerary</li>
                                <li>✓ Airport transfers</li>
                                <li>✓ All logistics handled</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-gray-100 p-6 rounded-xl">
                        <h3 class="text-xl font-bold mb-4">Detailed Cost Breakdown (14-day Everest Base Camp Trek)</h3>
                        <div class="space-y-2 text-gray-700">
                            <div class="flex justify-between border-b border-gray-300 pb-2">
                                <span>Permits (Sagarmatha NP)</span>
                                <span class="font-semibold">$30</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-300 pb-2">
                                <span>Kathmandu-Lukla flights (round-trip)</span>
                                <span class="font-semibold">$350-400</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-300 pb-2">
                                <span>Accommodation (13 nights × $5-15)</span>
                                <span class="font-semibold">$65-195</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-300 pb-2">
                                <span>Meals (14 days × $20-30)</span>
                                <span class="font-semibold">$280-420</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-300 pb-2">
                                <span>Guide (14 days × $30)</span>
                                <span class="font-semibold">$420</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-300 pb-2">
                                <span>Porter (14 days × $25)</span>
                                <span class="font-semibold">$350</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-300 pb-2">
                                <span>Gear rental (sleeping bag, down jacket)</span>
                                <span class="font-semibold">$50-100</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-300 pb-2">
                                <span>Travel insurance</span>
                                <span class="font-semibold">$100-200</span>
                            </div>
                            <div class="flex justify-between font-bold text-lg pt-2">
                                <span>TOTAL ESTIMATE</span>
                                <span class="text-purple-600">$1,645-2,315</span>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Why Choose Yeti Routes -->
            <section class="mb-16">
                <div class="bg-gradient-to-br from-purple-600 to-purple-800 text-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-6">Why Trek with Yeti Routes?</h2>

                    <p class="text-xl text-purple-100 mb-8">
                        We're not just a trekking agency - we're local mountain experts dedicated to creating authentic, safe, and unforgettable Himalayan experiences.
                    </p>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3 flex items-center">
                                <i class="ri-map-pin-line text-lime-400 mr-2 text-2xl"></i>
                                100% Local Expertise
                            </h3>
                            <p class="text-purple-100">
                                Our guides are born and raised in the mountains. They don't just know the trails - they know the culture, language, and hidden gems that make Nepal special.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3 flex items-center">
                                <i class="ri-shield-check-line text-lime-400 mr-2 text-2xl"></i>
                                Safety First, Always
                            </h3>
                            <p class="text-purple-100">
                                Government-licensed guides, comprehensive insurance, satellite phones, first aid training, and evacuation protocols ensure your safety at altitude.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3 flex items-center">
                                <i class="ri-settings-3-line text-lime-400 mr-2 text-2xl"></i>
                                Fully Customizable Itineraries
                            </h3>
                            <p class="text-purple-100">
                                Every trek is tailored to your fitness, timeline, and interests. Want to add a rest day? Extend to a remote valley? We make it happen.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3 flex items-center">
                                <i class="ri-hand-heart-line text-lime-400 mr-2 text-2xl"></i>
                                Fair Prices, Fair Wages
                            </h3>
                            <p class="text-purple-100">
                                Transparent pricing with no hidden costs. We pay our guides and porters fair wages and provide proper equipment and insurance.
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 text-center">
                        <a href="/contact" class="inline-block bg-lime-400 text-slate-900 px-8 py-4 rounded-full font-bold text-lg hover:bg-lime-300 transition shadow-xl">
                            Plan Your Custom Trek →
                        </a>
                    </div>

                </div>
            </section>

            <!-- FAQ Section -->
            <?php if (isset($faqs) && !empty($faqs)): ?>
            <section class="mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-8 text-slate-900">Frequently Asked Questions</h2>

                    <div class="space-y-4">
                        <?php foreach ($faqs as $index => $faq): ?>
                        <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                            <button
                                class="faq-toggle w-full text-left px-6 py-4 flex justify-between items-center hover:bg-gray-100 transition"
                                onclick="toggleFaq('faq-<?= $index ?>')"
                                type="button"
                            >
                                <h3 class="text-lg font-semibold text-slate-900 pr-4">
                                    <?= htmlspecialchars($faq['question']) ?>
                                </h3>
                                <i class="ri-arrow-down-s-line text-2xl text-purple-600 transform transition-transform duration-200" id="icon-faq-<?= $index ?>"></i>
                            </button>
                            <div id="faq-<?= $index ?>" class="faq-answer hidden px-6 pb-4">
                                <p class="text-gray-700 leading-relaxed">
                                    <?= nl2br(htmlspecialchars($faq['answer'])) ?>
                                </p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </section>
            <?php endif; ?>

            <!-- Final CTA -->
            <section class="mb-16">
                <div class="bg-gradient-to-br from-slate-900 to-purple-900 text-white rounded-2xl shadow-lg p-12 text-center">
                    <h2 class="text-4xl font-bold mb-4">Ready to Start Your Himalayan Adventure?</h2>
                    <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                        Let our local experts create a personalized trekking experience tailored to your dreams, fitness, and timeline.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="/treks" class="bg-lime-400 text-slate-900 px-8 py-4 rounded-full font-bold text-lg hover:bg-lime-300 transition">
                            Browse All Treks
                        </a>
                        <a href="/contact" class="bg-white/10 backdrop-blur text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white/20 transition border-2 border-white/30">
                            Get Custom Itinerary
                        </a>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>

<script>
function toggleFaq(id) {
    const answer = document.getElementById(id);
    const icon = document.getElementById('icon-' + id);

    if (answer.classList.contains('hidden')) {
        answer.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
    } else {
        answer.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
    }
}
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/frontend.php';
?>
