<?php
/**
 * Langtang Region Treks Page
 * Target: "Langtang Valley trek", "Langtang National Park", "Gosainkunda"
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
<section class="relative bg-gradient-to-br from-slate-900 via-indigo-900 to-slate-900 text-white py-20">
    <div class="absolute inset-0 bg-[url('/images/hero-pattern.svg')] opacity-10"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block bg-indigo-500/20 backdrop-blur px-4 py-2 rounded-full mb-4">
                <span class="text-indigo-300 font-semibold">Closest Region to Kathmandu</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                Langtang Valley Treks
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed">
                The "Valley of Glaciers" combines stunning mountain scenery, rich Tamang culture, and authentic wilderness - all just hours from Kathmandu. Rebuilt with resilience after 2015, Langtang welcomes you.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/trek/langtang-valley" class="bg-brand-lime text-slate-900 px-8 py-4 rounded-full font-semibold hover:bg-[#bfff4f] transition shadow-lg">
                    Langtang Valley Trek
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

            <!-- Overview -->
            <section class="mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-6 text-slate-900">Nepal's Hidden Valley Treasure</h2>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        <strong>Langtang Valley</strong>, known as the "Valley of Glaciers," is the closest major trekking region to Kathmandu yet feels wonderfully remote. This narrow valley, wedged between the main Himalayan range and Tibetan plateau, offers spectacular mountain scenery, rich Tamang-Tibetan culture, and some of Nepal's best cheese!
                    </p>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        The 2015 earthquake devastated Langtang village, but the community has rebuilt with remarkable resilience. Today's Langtang is better than ever - modern earthquake-resistant lodges, improved trails, and warm hospitality from people who deeply appreciate every trekker's visit. Your trek directly supports community recovery.
                    </p>

                    <div class="grid md:grid-cols-3 gap-6 my-8">
                        <div class="bg-indigo-50 p-6 rounded-xl">
                            <div class="text-3xl font-bold text-indigo-600 mb-2">7-8 hours</div>
                            <div class="text-gray-700">Drive from Kathmandu</div>
                        </div>
                        <div class="bg-purple-50 p-6 rounded-xl">
                            <div class="text-3xl font-bold text-purple-600 mb-2">7,227m</div>
                            <div class="text-gray-700">Langtang Lirung Peak</div>
                        </div>
                        <div class="bg-blue-50 p-6 rounded-xl">
                            <div class="text-3xl font-bold text-brand-lime mb-2">30,000+</div>
                            <div class="text-gray-700">Annual Visitors</div>
                        </div>
                    </div>

                    <p class="text-lg text-gray-700 leading-relaxed">
                        Protected within <strong>Langtang National Park</strong>, this region is home to red pandas, snow leopards, Himalayan black bears, and over 250 bird species. The valley offers perfect acclimatization, stunning views of Langtang Lirung (7,227m), and authentic cultural experiences in Tamang villages.
                    </p>

                </div>
            </section>

            <!-- Popular Treks -->
            <section class="mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-8 text-slate-900">Popular Treks in Langtang Region</h2>

                    <!-- Langtang Valley -->
                    <div class="mb-10 pb-10 border-b border-gray-200">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="bg-indigo-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl flex-shrink-0">1</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2">
                                    <a href="/trek/langtang-valley" class="text-indigo-600 hover:text-indigo-800">Langtang Valley Trek</a>
                                </h3>
                                <div class="flex flex-wrap gap-3 mb-3">
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Moderate</span>
                                    <span class="bg-brand-lime/15 text-brand-lime px-3 py-1 rounded-full text-sm">7-10 days</span>
                                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Max: 3,870m</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    Classic trek through the rebuilt valley to Kyanjin Gompa. Climb Tserko Ri (4,984m) for breathtaking panoramas of Langtang Lirung and dozens of 6,000m+ peaks.
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <strong>Highlights:</strong> Kyanjin Gompa monastery, Tserko Ri viewpoint, yak cheese factory, Tamang culture, glacier views.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Gosainkunda -->
                    <div class="mb-10 pb-10 border-b border-gray-200">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="bg-cyan-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl flex-shrink-0">2</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2">Gosainkunda Lake Trek</h3>
                                <div class="flex flex-wrap gap-3 mb-3">
                                    <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">Challenging</span>
                                    <span class="bg-brand-lime/15 text-brand-lime px-3 py-1 rounded-full text-sm">7-9 days</span>
                                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Max: 4,380m</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    Trek to sacred alpine lakes at 4,380m, holy pilgrimage site for Hindus and Buddhists. Stunning turquoise waters surrounded by snow-capped peaks.
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <strong>Highlights:</strong> Sacred Gosainkunda Lake, panoramic mountain views, Janai Purnima festival (August).
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Langtang-Gosainkunda Combined -->
                    <div class="mb-10 pb-10 border-b border-gray-200">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="bg-purple-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl flex-shrink-0">3</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2">Langtang-Gosainkunda Circuit</h3>
                                <div class="flex flex-wrap gap-3 mb-3">
                                    <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">Challenging</span>
                                    <span class="bg-brand-lime/15 text-brand-lime px-3 py-1 rounded-full text-sm">12-14 days</span>
                                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Max: 4,610m</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    Combine Langtang Valley and Gosainkunda via Laurebina Pass (4,610m). Experience the best of both worlds - valley trekking and high-altitude lakes.
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <strong>Highlights:</strong> Full Langtang experience, Laurebina Pass crossing, sacred lakes, diverse landscapes.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tamang Heritage Trail -->
                    <div>
                        <div class="flex items-start gap-4 mb-4">
                            <div class="bg-amber-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl flex-shrink-0">4</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2">Tamang Heritage Trail</h3>
                                <div class="flex flex-wrap gap-3 mb-3">
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Moderate</span>
                                    <span class="bg-brand-lime/15 text-brand-lime px-3 py-1 rounded-full text-sm">7-10 days</span>
                                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Max: 3,700m</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    Cultural trek through authentic Tamang villages near Tibet border. Experience homestays, traditional lifestyles, and natural hot springs at Tatopani.
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <strong>Highlights:</strong> Tamang culture, Gatlang & Thuman villages, Tatopani hot springs, homestays, less crowded.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Cultural Highlights -->
            <section class="mb-16">
                <div class="bg-gradient-to-br from-indigo-600 to-purple-700 text-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-6">Tamang-Tibetan Heritage</h2>

                    <p class="text-xl text-indigo-100 mb-8">
                        The Langtang region is the heartland of Tamang people, whose culture closely resembles Tibetan traditions. Experience authentic mountain life unchanged for generations.
                    </p>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3">
                                <i class="ri-building-2-line text-lime-400 mr-2"></i>
                                Traditional Architecture
                            </h3>
                            <p class="text-indigo-100">
                                Stone houses with carved wooden windows, prayer wheels, and colorful prayer flags. The rebuilt Langtang village combines traditional aesthetics with modern earthquake-resistant design.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3">
                                <i class="ri-store-2-line text-lime-400 mr-2"></i>
                                Kyanjin Cheese Factory
                            </h3>
                            <p class="text-indigo-100">
                                Visit the famous yak cheese factory at Kyanjin Gompa. Taste authentic Himalayan cheese made by local cooperatives - a unique mountain experience and great trekking snack!
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3">
                                <i class="ri-fire-line text-lime-400 mr-2"></i>
                                Natural Hot Springs
                            </h3>
                            <p class="text-indigo-100">
                                Soak in natural hot springs at Tatopani on the Tamang Heritage Trail. The mineral-rich waters are believed to have healing properties and provide perfect relaxation after trekking.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3">
                                <i class="ri-hand-heart-line text-lime-400 mr-2"></i>
                                Community Recovery
                            </h3>
                            <p class="text-indigo-100">
                                By trekking Langtang, you directly support earthquake recovery. Locals are deeply grateful for every visitor who helps rebuild their tourism-dependent economy.
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
                                <i class="ri-arrow-down-s-line text-2xl text-indigo-600 transform transition-transform duration-200" id="icon-faq-<?= $index ?>"></i>
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
                <div class="bg-gradient-to-br from-slate-900 to-indigo-900 text-white rounded-2xl shadow-lg p-12 text-center">
                    <h2 class="text-4xl font-bold mb-4">Discover Langtang Valley</h2>
                    <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                        Trek the rebuilt valley, support local communities, and experience authentic Himalayan culture close to Kathmandu.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="/trek/langtang-valley" class="bg-brand-lime text-slate-900 px-8 py-4 rounded-full font-bold text-lg hover:bg-[#bfff4f] transition">
                            View Langtang Trek Details
                        </a>
                        <a href="/contact" class="bg-white/10 backdrop-blur text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white/20 transition border-2 border-white/30">
                            Plan Custom Langtang Trek
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
