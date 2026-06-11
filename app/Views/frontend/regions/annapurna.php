<?php
/**
 * Annapurna Region Treks Page
 * Target: "Annapurna region treks", "Annapurna Base Camp", "Annapurna Circuit"
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
<section class="relative bg-gradient-to-br from-slate-900 via-green-900 to-slate-900 text-white py-20">
    <div class="absolute inset-0 bg-[url('/images/hero-pattern.svg')] opacity-10"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block bg-green-500/20 backdrop-blur px-4 py-2 rounded-full mb-4">
                <span class="text-green-300 font-semibold">Nepal's Most Diverse Trekking Region</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                Annapurna Region Treks
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed">
                From lush rhododendron forests to high-altitude passes, the Annapurna region offers incredible diversity. Trek to base camps, cross dramatic passes, or enjoy sunrise from Poon Hill.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/trek?slug=annapurna-base-camp" class="bg-brand-lime text-slate-900 px-8 py-4 rounded-full font-semibold hover:bg-[#bfff4f] transition shadow-lg">
                    Annapurna Base Camp Trek
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
                    <h2 class="text-4xl font-bold mb-6 text-slate-900">Nepal's Most Accessible Trekking Paradise</h2>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        The <strong>Annapurna region</strong> is Nepal's most diverse and accessible trekking destination, offering everything from easy 4-day walks to challenging 3-week circuits. Located just a short drive from Pokhara, this region features the widest variety of landscapes, cultures, and trekking options in the Himalayas.
                    </p>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        What makes Annapurna special is its incredible diversity compressed into a relatively small area. In a single trek, you'll pass through subtropical forests with rhododendrons, traditional Gurung villages, alpine meadows, and high-altitude deserts - all while surrounded by stunning peaks including Annapurna I (8,091m), Machapuchare (Fishtail), and Dhaulagiri (8,167m).
                    </p>

                    <div class="grid md:grid-cols-3 gap-6 my-8">
                        <div class="bg-green-50 p-6 rounded-xl">
                            <div class="text-3xl font-bold text-green-600 mb-2">7,629 km²</div>
                            <div class="text-gray-700">Conservation Area</div>
                        </div>
                        <div class="bg-purple-50 p-6 rounded-xl">
                            <div class="text-3xl font-bold text-purple-600 mb-2">100+ Peaks</div>
                            <div class="text-gray-700">Over 6,000m</div>
                        </div>
                        <div class="bg-blue-50 p-6 rounded-xl">
                            <div class="text-3xl font-bold text-brand-lime mb-2">200,000+</div>
                            <div class="text-gray-700">Annual Trekkers</div>
                        </div>
                    </div>

                    <p class="text-lg text-gray-700 leading-relaxed">
                        Protected within the <strong>Annapurna Conservation Area Project (ACAP)</strong>, this region pioneered community-based conservation in Nepal. The excellent teahouse infrastructure, shorter access times from Pokhara, and range of difficulty levels make it perfect for first-time trekkers and experienced mountaineers alike.
                    </p>

                </div>
            </section>

            <!-- Popular Treks -->
            <section class="mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-8 text-slate-900">Popular Treks in Annapurna Region</h2>

                    <!-- ABC -->
                    <div class="mb-10 pb-10 border-b border-gray-200">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="bg-green-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl flex-shrink-0">1</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2">
                                    <a href="/trek?slug=annapurna-base-camp" class="text-green-600 hover:text-green-800">Annapurna Base Camp Trek</a>
                                </h3>
                                <div class="flex flex-wrap gap-3 mb-3">
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Moderate</span>
                                    <span class="bg-brand-lime/15 text-brand-lime px-3 py-1 rounded-full text-sm">7-10 days</span>
                                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Max: 4,130m</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    Trek into a spectacular mountain amphitheater surrounded by 7,000m+ peaks. The ABC trek offers stunning scenery with moderate difficulty, making it perfect for beginners and those with limited time.
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <strong>Highlights:</strong> 360° mountain amphitheater, Machapuchare views, Gurung villages, hot springs, rhododendron forests.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Annapurna Circuit -->
                    <div class="mb-10 pb-10 border-b border-gray-200">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="bg-orange-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl flex-shrink-0">2</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2">Annapurna Circuit Trek</h3>
                                <div class="flex flex-wrap gap-3 mb-3">
                                    <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">Challenging</span>
                                    <span class="bg-brand-lime/15 text-brand-lime px-3 py-1 rounded-full text-sm">15-18 days</span>
                                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Max: 5,416m</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    One of the world's greatest treks. Circle the Annapurna massif, crossing the Thorong La Pass (5,416m), experiencing dramatic landscape changes from subtropical to alpine desert.
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <strong>Highlights:</strong> Thorong La Pass, Muktinath temple, diverse landscapes, cultural variety, Manang valley.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Poon Hill -->
                    <div class="mb-10 pb-10 border-b border-gray-200">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="bg-lime-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl flex-shrink-0">3</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2">Ghorepani Poon Hill Trek</h3>
                                <div class="flex flex-wrap gap-3 mb-3">
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Easy</span>
                                    <span class="bg-brand-lime/15 text-brand-lime px-3 py-1 rounded-full text-sm">4-5 days</span>
                                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Max: 3,210m</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    Perfect introduction to Himalayan trekking. Watch sunrise over Annapurna and Dhaulagiri ranges from Poon Hill viewpoint. Ideal for families and beginners.
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <strong>Highlights:</strong> Sunrise panorama, blooming rhododendrons (March-April), Gurung culture, short duration.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Mardi Himal -->
                    <div>
                        <div class="flex items-start gap-4 mb-4">
                            <div class="bg-teal-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl flex-shrink-0">4</div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2">Mardi Himal Trek</h3>
                                <div class="flex flex-wrap gap-3 mb-3">
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Moderate</span>
                                    <span class="bg-brand-lime/15 text-brand-lime px-3 py-1 rounded-full text-sm">5-7 days</span>
                                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Max: 4,500m</span>
                                </div>
                                <p class="text-gray-700 mb-3">
                                    Newly opened trail offering solitude and wilderness. Trek to the base of Machapuchare (Fishtail) with dramatic ridge walking and intimate mountain views.
                                </p>
                                <p class="text-gray-600 text-sm">
                                    <strong>Highlights:</strong> Less crowded, close Machapuchare views, ridge walking, wilderness experience.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Cultural Highlights -->
            <section class="mb-16">
                <div class="bg-gradient-to-br from-green-600 to-teal-700 text-white rounded-2xl shadow-lg p-8 md:p-12">
                    <h2 class="text-4xl font-bold mb-6">Cultural Diversity & Local Life</h2>

                    <p class="text-xl text-green-100 mb-8">
                        The Annapurna region is home to diverse ethnic groups including Gurung, Manangi, Thakali, and Tibetan communities. Each valley has its own unique culture, architecture, and traditions.
                    </p>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3">
                                <i class="ri-home-4-line text-lime-400 mr-2"></i>
                                Traditional Villages
                            </h3>
                            <p class="text-green-100">
                                Visit <strong>Ghandruk</strong> and <strong>Chhomrong</strong> - beautiful Gurung villages with stone houses. In <strong>Manang</strong>, experience Tibetan-influenced culture. Each village offers authentic homestays and cultural immersion.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3">
                                <i class="ri-goblet-line text-lime-400 mr-2"></i>
                                Local Cuisine & Hospitality
                            </h3>
                            <p class="text-green-100">
                                Taste authentic <strong>Dal Bhat</strong>, <strong>Gurung bread</strong>, and <strong>Thakali thali</strong>. The Annapurna region is famous for exceptional food quality and warm hospitality at teahouses.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3">
                                <i class="ri-contrast-2-line text-lime-400 mr-2"></i>
                                Natural Hot Springs
                            </h3>
                            <p class="text-green-100">
                                Relax in natural hot springs at <strong>Jhinu Danda</strong> after the ABC trek, or visit <strong>Tatopani</strong> on the Annapurna Circuit - perfect for soothing tired muscles.
                            </p>
                        </div>

                        <div class="bg-white/10 backdrop-blur rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-3">
                                <i class="ri-seedling-line text-lime-400 mr-2"></i>
                                Rhododendron Forests
                            </h3>
                            <p class="text-green-100">
                                Trek through Nepal's national flower in full bloom (March-April). The forests between Ghorepani and Ghandruk transform into a pink wonderland - a photographer's dream.
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
                                <i class="ri-arrow-down-s-line text-2xl text-green-600 transform transition-transform duration-200" id="icon-faq-<?= $index ?>"></i>
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

            <!-- Dynamic Route Cards -->
            <?php include __DIR__ . '/_routes-grid.php'; ?>

            <!-- Final CTA -->
            <section class="mb-16">
                <div class="bg-gradient-to-br from-slate-900 to-green-900 text-white rounded-2xl shadow-lg p-12 text-center">
                    <h2 class="text-4xl font-bold mb-4">Ready to Explore Annapurna?</h2>
                    <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                        From easy walks to epic adventures, let us create the perfect Annapurna trek for your fitness level and timeline.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="/trek?slug=annapurna-base-camp" class="bg-brand-lime text-slate-900 px-8 py-4 rounded-full font-bold text-lg hover:bg-[#bfff4f] transition">
                            View ABC Trek Details
                        </a>
                        <a href="/contact" class="bg-white/10 backdrop-blur text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white/20 transition border-2 border-white/30">
                            Plan Custom Annapurna Trek
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
