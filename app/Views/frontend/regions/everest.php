<?php
/**
 * Everest Region Treks Page
 * Target: "Everest region treks", "Khumbu trekking", "Everest Base Camp"
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
<section class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 text-white py-20">
    <div class="absolute inset-0 bg-[url('/images/hero-pattern.svg')] opacity-10"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block bg-brand-lime/20 backdrop-blur px-4 py-2 rounded-full mb-4">
                <span class="text-brand-lime font-semibold">Home to the World's Highest Peak</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                Everest Region Treks
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed">
                Trek through the legendary Khumbu valley, home to Mount Everest, Sherpa culture, and the most iconic mountain views on Earth. From teahouses to base camps, experience the ultimate Himalayan adventure.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/trek/everest-base-camp" class="bg-brand-lime text-slate-900 px-8 py-4 rounded-full font-semibold hover:bg-[#bfff4f] transition shadow-lg">
                    Everest Base Camp Trek
                </a>
                <a href="/contact" class="bg-white/10 backdrop-blur text-white px-8 py-4 rounded-full font-semibold hover:bg-white/20 transition border-2 border-white/30">
                    Plan Custom Everest Trek
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="bg-gray-50">
    <div class="container mx-auto px-6 py-16">
        <div class="max-w-4xl mx-auto">

            <!-- Overview -->
            <section class="mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-6 text-slate-900">The Legendary Khumbu Region</h2>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        The <strong>Everest region</strong>, known locally as <strong>Khumbu</strong>, is Nepal's most iconic trekking destination and the birthplace of mountaineering legends. Home to <strong>Mount Everest (Sagarmatha)</strong> at 8,849m, this region offers unparalleled mountain scenery, rich Sherpa culture, and the world's most famous trekking routes.
                    </p>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        What sets the Everest region apart is not just the towering peaks, but the complete Himalayan experience: colorful prayer flags fluttering in the wind, the distinctive architecture of Sherpa villages, the spiritual atmosphere of ancient Buddhist monasteries like Tengboche, and the warm hospitality of mountain communities that have guided climbers to Everest's summit for generations.
                    </p>

                    <div class="grid md:grid-cols-3 gap-6 my-8">
                        <div class="bg-brand-lime/10 p-6 rounded-xl">
                            <div class="text-3xl font-bold text-brand-lime mb-2">8,849m</div>
                            <div class="text-gray-700">Mount Everest Summit</div>
                        </div>
                        <div class="bg-purple-50 p-6 rounded-xl">
                            <div class="text-3xl font-bold text-purple-600 mb-2">50,000+</div>
                            <div class="text-gray-700">Annual Trekkers</div>
                        </div>
                        <div class="bg-green-50 p-6 rounded-xl">
                            <div class="text-3xl font-bold text-green-600 mb-2">1,148 km²</div>
                            <div class="text-gray-700">Sagarmatha National Park</div>
                        </div>
                    </div>

                    <p class="text-lg text-gray-700 leading-relaxed">
                        The region is protected within <strong>Sagarmatha National Park</strong> (UNESCO World Heritage Site), ensuring preservation of its unique biodiversity including snow leopards, red pandas, and Himalayan tahr. The well-developed trail system, with teahouse lodges every few hours, makes high-altitude trekking accessible to determined trekkers worldwide.
                    </p>

                </div>
            </section>

            <!-- Popular Treks -->
            <section class="mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-8 text-slate-900">Popular Treks in Everest Region</h2>

                    <!-- EBC -->
                    <div class="mb-10 pb-10 border-b border-gray-200">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="bg-brand-lime text-slate-900 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl flex-shrink-0">1</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2">
                                    <a href="/trek/everest-base-camp" class="text-brand-lime hover:text-[#bfff4f]">Everest Base Camp Trek</a>
                                </h3>
                                <div class="flex flex-wrap gap-3 mb-3">
                                    <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">Challenging</span>
                                    <span class="bg-brand-lime/15 text-brand-lime px-3 py-1 rounded-full text-sm">12-14 days</span>
                                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Max: 5,545m</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    The ultimate bucket-list trek. Stand at the base camp of the world's highest mountain, climb Kala Patthar for sunrise Everest views, immerse yourself in Sherpa culture, and follow in the footsteps of legendary mountaineers.
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <strong>Highlights:</strong> Kala Patthar (5,545m) summit views, Tengboche Monastery, Namche Bazaar, Khumbu Icefall views, Sherpa villages.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Gokyo Lakes -->
                    <div class="mb-10 pb-10 border-b border-gray-200">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="bg-teal-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl flex-shrink-0">2</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2">Gokyo Lakes Trek</h3>
                                <div class="flex flex-wrap gap-3 mb-3">
                                    <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">Challenging</span>
                                    <span class="bg-brand-lime/15 text-brand-lime px-3 py-1 rounded-full text-sm">12-15 days</span>
                                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Max: 5,357m</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    Trek to stunning turquoise glacial lakes and climb Gokyo Ri for panoramic views of four 8,000m peaks: Everest, Lhotse, Makalu, and Cho Oyu. Less crowded than EBC with equally spectacular scenery.
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <strong>Highlights:</strong> 6 sacred Gokyo Lakes, Gokyo Ri summit (5,357m), Ngozumpa Glacier (world's largest), 360° mountain panorama.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Three Passes -->
                    <div class="mb-10 pb-10 border-b border-gray-200">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="bg-red-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl flex-shrink-0">3</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2">Three Passes Trek</h3>
                                <div class="flex flex-wrap gap-3 mb-3">
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">Strenuous</span>
                                    <span class="bg-brand-lime/15 text-brand-lime px-3 py-1 rounded-full text-sm">18-21 days</span>
                                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Max: 5,535m</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    The ultimate Everest region challenge. Cross three high passes (Kongma La, Cho La, Renjo La), visit both EBC and Gokyo Lakes, and trek through remote valleys rarely visited by tourists.
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <strong>Highlights:</strong> Three 5,400m+ passes, combines EBC & Gokyo, Chukhung Ri views, remote Ngozumpa Glacier, ultimate adventure.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Everest View Trek -->
                    <div>
                        <div class="flex items-start gap-4 mb-4">
                            <div class="bg-green-600 text-white w-12 h-12 rounded-full flex-items-center justify-center font-bold text-xl flex-shrink-0">4</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2">Everest View Trek</h3>
                                <div class="flex flex-wrap gap-3 mb-3">
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Moderate</span>
                                    <span class="bg-brand-lime/15 text-brand-lime px-3 py-1 rounded-full text-sm">7-10 days</span>
                                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Max: 3,962m</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    Perfect introduction to Everest region for those with limited time. Trek to Namche Bazaar and Hotel Everest View for stunning mountain panoramas without extreme altitude.
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <strong>Highlights:</strong> Everest views, Namche Bazaar, Tengboche Monastery, Sherpa culture, shorter duration, lower altitude.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Best Time -->
            <section class="mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-8 text-slate-900">Best Time to Trek in Everest Region</h2>

                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="bg-gradient-to-br from-orange-50 to-yellow-50 rounded-xl p-6 border-2 border-orange-200">
                            <div class="flex items-center gap-3 mb-4">
                                <i class="ri-sun-line text-4xl text-orange-600"></i>
                                <div>
                                    <h3 class="text-2xl font-bold text-orange-800">Spring (March-May)</h3>
                                    <p class="text-orange-600">Peak Trekking Season</p>
                                </div>
                            </div>
                            <ul class="space-y-2 text-gray-700 mb-4">
                                <li><strong>✓ Weather:</strong> Warmer days (10-15°C), cold nights (-10°C)</li>
                                <li><strong>✓ Views:</strong> Clear mornings, afternoon clouds possible</li>
                                <li><strong>✓ Flora:</strong> Blooming rhododendrons at lower altitudes</li>
                                <li><strong>✓ Crowds:</strong> Busy but manageable</li>
                            </ul>
                            <p class="text-sm text-gray-600">
                                <strong>Best For:</strong> First-time trekkers, warmer conditions, photography
                            </p>
                        </div>

                        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl p-6 border-2 border-blue-200">
                            <div class="flex items-center gap-3 mb-4">
                                <i class="ri-contrast-2-line text-4xl text-brand-lime"></i>
                                <div>
                                    <h3 class="text-2xl font-bold text-slate-900">Autumn (Sept-Nov)</h3>
                                    <p class="text-brand-lime">Best Season - Clearest Views</p>
                                </div>
                            </div>
                            <ul class="space-y-2 text-gray-700 mb-4">
                                <li><strong>✓ Weather:</strong> Stable, dry, crisp (5-15°C days)</li>
                                <li><strong>✓ Views:</strong> Crystal clear mountain visibility</li>
                                <li><strong>✓ Conditions:</strong> Best overall trekking weather</li>
                                <li><strong>✓ Crowds:</strong> Peak season - very busy</li>
                            </ul>
                            <p class="text-sm text-gray-600">
                                <strong>Best For:</strong> Clear views, stable weather, experienced trekkers
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 bg-gray-100 rounded-xl p-6">
                        <h4 class="font-bold mb-3">Off-Season Considerations:</h4>
                        <div class="grid md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <strong class="text-brand-lime">Winter (Dec-Feb):</strong>
                                <p class="text-gray-700">Very cold (-20°C nights), fewer trekkers, lower prices. Possible but challenging.</p>
                            </div>
                            <div>
                                <strong class="text-green-700">Monsoon (Jun-Aug):</strong>
                                <p class="text-gray-700">Heavy rain, leeches, obscured views, flight cancellations. Not recommended.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Cultural Highlights -->
            <section class="mb-16">
                <div class="bg-gradient-to-br from-purple-600 to-indigo-700 text-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-6">Sherpa Culture & Heritage</h2>

                    <p class="text-xl text-purple-100 mb-8">
                        The Everest region is the heartland of the Sherpa people, whose mountaineering expertise and warm hospitality have made Himalayan trekking possible. Experience living culture unchanged for centuries.
                    </p>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3 flex items-center">
                                <i class="ri-ancient-pavilion-line text-lime-400 mr-2 text-2xl"></i>
                                Buddhist Monasteries
                            </h3>
                            <p class="text-purple-100">
                                Visit <strong>Tengboche Monastery</strong> (3,867m), the spiritual heart of the Khumbu. Witness morning prayers, colorful festivals, and receive blessings from monks for your trek. The monastery's location offers spectacular Everest, Ama Dablam, and Lhotse views.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3 flex items-center">
                                <i class="ri-community-line text-lime-400 mr-2 text-2xl"></i>
                                Sherpa Villages
                            </h3>
                            <p class="text-purple-100">
                                Trek through traditional stone-built villages like <strong>Namche Bazaar</strong>, the region's trading hub, and <strong>Khumjung</strong>, home to Hillary School. Experience authentic Sherpa hospitality, cuisine, and learn about their mountaineering heritage.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3 flex items-center">
                                <i class="ri-flag-2-line text-lime-400 mr-2 text-2xl"></i>
                                Prayer Flags & Stupas
                            </h3>
                            <p class="text-purple-100">
                                Colorful prayer flags flutter everywhere, carrying mantras on mountain winds. Pass countless <strong>mani walls</strong> (carved stone prayers), <strong>chortens</strong> (Buddhist shrines), and suspension bridges adorned with prayer flags.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3 flex items-center">
                                <i class="ri-cake-3-line text-lime-400 mr-2 text-2xl"></i>
                                Local Cuisine
                            </h3>
                            <p class="text-purple-100">
                                Taste authentic Sherpa food: <strong>Dal Bhat</strong> (unlimited refills!), <strong>Sherpa stew</strong>, <strong>momos</strong> (dumplings), <strong>Tibetan bread</strong>, and warm <strong>butter tea</strong>. Food is fuel and cultural experience combined.
                            </p>
                        </div>
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
                                <i class="ri-arrow-down-s-line text-2xl text-brand-lime transform transition-transform duration-200" id="icon-faq-<?= $index ?>"></i>
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
                <div class="bg-gradient-to-br from-slate-900 to-blue-900 text-white rounded-2xl shadow-lg p-12 text-center">
                    <h2 class="text-4xl font-bold mb-4">Ready for Your Everest Adventure?</h2>
                    <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                        Let our expert Sherpa guides create a customized Everest region trek tailored to your fitness, timeline, and dreams.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="/trek/everest-base-camp" class="bg-brand-lime text-slate-900 px-8 py-4 rounded-full font-bold text-lg hover:bg-[#bfff4f] transition">
                            View EBC Trek Details
                        </a>
                        <a href="/contact" class="bg-white/10 backdrop-blur text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white/20 transition border-2 border-white/30">
                            Plan Custom Everest Trek
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
require_once __DIR__ . '/../../layouts/frontend.php';
?>
