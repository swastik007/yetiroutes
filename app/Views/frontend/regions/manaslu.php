<?php
/**
 * Manaslu Region SEO Page
 * Target Keywords: Manaslu trek, Manaslu Circuit, Tsum Valley trek, Manaslu region Nepal
 * Monthly Search Volume: ~800
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

<!-- Hero Section - Purple Theme for Wilderness -->
<section class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-slate-800 text-white py-20">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                Manaslu Region: Nepal's Best-Kept Secret
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200 leading-relaxed">
                Experience the authentic Himalayan wilderness on Nepal's most pristine and less-crowded trekking circuit.
                Cross the dramatic Larkya La Pass and immerse yourself in untouched Tibetan culture.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="/treks" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold px-8 py-4 rounded-lg transition transform hover:scale-105 shadow-xl">
                    View Manaslu Treks
                </a>
                <a href="/contact" class="inline-block bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white font-semibold px-8 py-4 rounded-lg transition border border-white/30">
                    Plan Your Trek
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Bar -->
<section class="bg-purple-50 py-8 border-b border-purple-100">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-6 text-center">
            <div>
                <div class="text-4xl font-bold text-purple-600 mb-2">8,163m</div>
                <div class="text-gray-600">Manaslu Summit - 8th Highest</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-purple-600 mb-2">~4,000</div>
                <div class="text-gray-600">Annual Trekkers (vs 50,000+ Everest)</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-purple-600 mb-2">5,160m</div>
                <div class="text-gray-600">Larkya La Pass Altitude</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">

            <!-- Introduction -->
            <div class="prose prose-lg max-w-none mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Nepal's Most Authentic Himalayan Wilderness</h2>

                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    The <strong>Manaslu region</strong> offers what many trekkers seek but few find: genuine wilderness, authentic culture,
                    and spectacular mountain scenery without the crowds of Everest or Annapurna. Circling the world's eighth-highest peak,
                    <strong>Mount Manaslu (8,163m)</strong>, this restricted area trek has become the choice for experienced trekkers seeking
                    an unspoiled Himalayan experience.
                </p>

                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    With only around <strong>4,000 trekkers annually</strong> compared to over 50,000 on the Everest Base Camp route,
                    the Manaslu Circuit remains refreshingly uncrowded. The journey takes you through remote villages where ancient Tibetan
                    Buddhist culture thrives unchanged, across suspension bridges spanning turquoise rivers, and over the challenging
                    <strong>Larkya La Pass (5,160m)</strong>—one of the most dramatic pass crossings in Nepal.
                </p>

                <div class="bg-purple-50 border-l-4 border-purple-600 p-6 my-8 rounded-r-lg">
                    <p class="text-gray-800 font-medium mb-2">Restricted Area Trekking</p>
                    <p class="text-gray-700">
                        Manaslu is a <strong>restricted area</strong>, meaning trekkers must obtain a special permit and trek with a
                        registered guide. This regulation helps preserve the region's pristine environment and authentic culture while
                        ensuring trekker safety. Yeti Routes handles all permit arrangements as part of our comprehensive service.
                    </p>
                </div>

                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    The region's relative isolation has preserved traditional Tibetan Buddhist culture in villages like <strong>Samagaun</strong>
                    and <strong>Samdo</strong>, where prayer flags flutter from stone houses and centuries-old monasteries welcome visitors.
                    The scenery transitions from subtropical forests with rhododendrons and bamboo groves to high-altitude desert landscapes
                    reminiscent of Tibet, culminating in glacier-draped peaks that surround you in every direction.
                </p>

                <p class="text-lg text-gray-700 leading-relaxed">
                    The <strong>Manaslu Conservation Area</strong>, established in 1998, protects 1,663 square kilometers of diverse ecosystems
                    that are home to snow leopards, red pandas, Himalayan tahr, and over 110 bird species. The conservation efforts have
                    maintained the pristine beauty that makes this region so special for wilderness enthusiasts.
                </p>
            </div>

            <!-- Popular Treks Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Popular Manaslu Region Treks</h2>

                <div class="space-y-8">
                    <!-- Manaslu Circuit -->
                    <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-xl transition duration-300">
                        <h3 class="text-2xl font-bold text-purple-600 mb-4">
                            <a href="/trek?slug=manaslu-circuit-trek" class="hover:text-purple-700 transition">
                                Manaslu Circuit Trek
                            </a>
                        </h3>
                        <div class="flex flex-wrap gap-3 mb-4">
                            <span class="bg-orange-100 text-orange-800 px-4 py-2 rounded-full text-sm font-semibold">Challenging</span>
                            <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold">14-18 days</span>
                            <span class="bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-semibold">Max: 5,160m</span>
                        </div>
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Nepal's classic teahouse circuit that rivals Annapurna in scenery but with a fraction of the crowds.
                            Circle Mount Manaslu through diverse landscapes from subtropical forests to high-altitude desert, crossing
                            the spectacular Larkya La Pass with panoramic views of Manaslu, Himlung Himal, and Annapurna II.
                        </p>
                        <div class="grid md:grid-cols-2 gap-4 text-sm text-gray-600">
                            <div>
                                <span class="font-semibold text-gray-900">Highlights:</span> Larkya La Pass, Birendra Lake,
                                Samagaun village, ancient monasteries
                            </div>
                            <div>
                                <span class="font-semibold text-gray-900">Best Season:</span> March-May, September-November
                            </div>
                        </div>
                    </div>

                    <!-- Tsum Valley -->
                    <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-xl transition duration-300">
                        <h3 class="text-2xl font-bold text-purple-600 mb-4">
                            <a href="/trek?slug=tsum-valley-trek" class="hover:text-purple-700 transition">
                                Tsum Valley Trek
                            </a>
                        </h3>
                        <div class="flex flex-wrap gap-3 mb-4">
                            <span class="bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold">Moderate-Challenging</span>
                            <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold">12-14 days</span>
                            <span class="bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-semibold">Max: 3,700m</span>
                        </div>
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Enter the sacred "Hidden Valley" where ancient Tibetan Buddhism flourishes untouched by modernity.
                            This culturally rich trek visits centuries-old monasteries, passes intricate mani walls, and explores
                            villages where polyandry is still practiced. Often called the "Valley of Happiness."
                        </p>
                        <div class="grid md:grid-cols-2 gap-4 text-sm text-gray-600">
                            <div>
                                <span class="font-semibold text-gray-900">Highlights:</span> Mu Gompa monastery, Milarepa's Cave,
                                Rachen Gompa, authentic Tibetan culture
                            </div>
                            <div>
                                <span class="font-semibold text-gray-900">Best Season:</span> March-May, September-November
                            </div>
                        </div>
                    </div>

                    <!-- Manaslu + Tsum Valley Combined -->
                    <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-xl transition duration-300">
                        <h3 class="text-2xl font-bold text-purple-600 mb-4">
                            Manaslu Circuit with Tsum Valley
                        </h3>
                        <div class="flex flex-wrap gap-3 mb-4">
                            <span class="bg-red-100 text-red-800 px-4 py-2 rounded-full text-sm font-semibold">Very Challenging</span>
                            <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold">20-24 days</span>
                            <span class="bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-semibold">Max: 5,160m</span>
                        </div>
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            The ultimate Manaslu experience combining the cultural immersion of Tsum Valley with the dramatic
                            scenery and high-pass adventure of the Manaslu Circuit. This extended trek offers the complete picture
                            of the region's diversity, from sacred monasteries to glaciated peaks.
                        </p>
                        <div class="grid md:grid-cols-2 gap-4 text-sm text-gray-600">
                            <div>
                                <span class="font-semibold text-gray-900">Highlights:</span> Complete cultural and mountain experience,
                                Mu Gompa, Larkya La, remote villages
                            </div>
                            <div>
                                <span class="font-semibold text-gray-900">Best Season:</span> March-May, September-November
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <a href="/treks" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold px-8 py-4 rounded-lg transition">
                        View All Manaslu Treks →
                    </a>
                </div>
            </div>

            <!-- Why Choose Manaslu -->
            <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-2xl p-8 mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Why Choose Manaslu Region</h2>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <div class="text-3xl mb-3">🏔️</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Pristine Wilderness</h3>
                        <p class="text-gray-700">
                            Experience Nepal as it was decades ago, with only 4,000 trekkers annually compared to 50,000+ on popular routes.
                            Enjoy trails, teahouses, and mountain vistas without the crowds.
                        </p>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <div class="text-3xl mb-3">🙏</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Authentic Culture</h3>
                        <p class="text-gray-700">
                            Trek through villages where ancient Tibetan Buddhist traditions remain vibrant and unchanged. Visit centuries-old
                            monasteries, witness daily rituals, and experience genuine Himalayan hospitality.
                        </p>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <div class="text-3xl mb-3">⛰️</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Spectacular Scenery</h3>
                        <p class="text-gray-700">
                            The Larkya La crossing offers 360-degree views of six peaks over 7,000m, including Manaslu (8,163m),
                            Himlung Himal, and Annapurna II. Dramatic and diverse landscapes rival anything in the Himalayas.
                        </p>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <div class="text-3xl mb-3">🎯</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Achievement & Adventure</h3>
                        <p class="text-gray-700">
                            The Manaslu Circuit's challenging terrain and high passes offer a genuine sense of accomplishment.
                            Perfect for trekkers who've done Everest Base Camp or Annapurna Circuit and want a bigger challenge.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Best Time to Trek -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Best Time to Trek Manaslu</h2>

                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                        <h3 class="text-xl font-bold text-green-900 mb-3">🌸 Spring (March-May)</h3>
                        <p class="text-gray-700 mb-4">
                            Warmer temperatures with rhododendrons blooming at lower elevations. Clear mountain views and
                            stable weather make this ideal for the Larkya La crossing. Days are longer and increasingly warm.
                        </p>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li>✓ Excellent visibility and weather stability</li>
                            <li>✓ Rhododendron forests in full bloom</li>
                            <li>✓ Moderate temperatures throughout the trek</li>
                        </ul>
                    </div>

                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-3">🍂 Autumn (September-November)</h3>
                        <p class="text-gray-700 mb-4">
                            The most popular trekking season with crystal-clear skies, perfect visibility, and pleasant temperatures.
                            Post-monsoon freshness makes landscapes vibrant. Ideal for photography and Larkya La crossing.
                        </p>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li>✓ Best visibility of the entire year</li>
                            <li>✓ Stable weather with minimal precipitation</li>
                            <li>✓ Comfortable temperatures for high-altitude trekking</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-r-lg">
                    <p class="text-gray-800">
                        <strong>Note:</strong> Winter (December-February) is possible but very cold with heavy snow at Larkya La.
                        Monsoon (June-August) brings landslide risks and poor visibility. We strongly recommend spring or autumn for the best experience.
                    </p>
                </div>
            </div>

            <!-- Cultural Highlights -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Tibetan Buddhist Heritage & Culture</h2>

                <div class="prose prose-lg max-w-none">
                    <p class="text-gray-700 leading-relaxed mb-6">
                        The <strong>Manaslu region</strong> is predominantly inhabited by <strong>Nubri and Tsum people</strong> of Tibetan descent,
                        who migrated from Tibet centuries ago and have preserved their distinct cultural identity. The region's isolation
                        has kept ancient Tibetan Buddhist traditions alive in their purest form.
                    </p>

                    <div class="grid md:grid-cols-3 gap-6 mb-8">
                        <div class="text-center">
                            <div class="text-5xl mb-3">🕉️</div>
                            <h4 class="font-bold text-gray-900 mb-2">Ancient Monasteries</h4>
                            <p class="text-sm text-gray-600">
                                Visit Mu Gompa, Rachen Gompa, and Pungyen Gompa—centuries-old monasteries where monks maintain
                                daily prayer rituals and traditional Buddhist education.
                            </p>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl mb-3">🏔️</div>
                            <h4 class="font-bold text-gray-900 mb-2">Mani Walls & Chortens</h4>
                            <p class="text-sm text-gray-600">
                                Marvel at intricate stone mani walls carved with Buddhist mantras and colorful chortens (stupas)
                                that dot the landscape—always pass on the left as per tradition.
                            </p>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl mb-3">🎭</div>
                            <h4 class="font-bold text-gray-900 mb-2">Living Traditions</h4>
                            <p class="text-sm text-gray-600">
                                Experience authentic Tibetan culture including polyandry practices in Tsum Valley, butter tea hospitality,
                                and traditional stone houses with prayer rooms.
                            </p>
                        </div>
                    </div>

                    <p class="text-gray-700 leading-relaxed mb-6">
                        Villages like <strong>Samagaun</strong> (3,530m) serve as cultural hubs with gompa (monasteries), traditional stone houses,
                        and friendly locals who welcome trekkers warmly. The village offers stunning views of Manaslu and serves as an
                        acclimatization stop before the Larkya La crossing.
                    </p>

                    <p class="text-gray-700 leading-relaxed">
                        In <strong>Tsum Valley</strong>, known as the "Hidden Valley of Happiness," the practice of <em>beyul</em>
                        (sacred hidden valleys) designation means the valley was blessed by Guru Rinpoche and is considered spiritually protected.
                        Animal slaughter is prohibited, making the valley a sanctuary for wildlife and spiritual seekers alike.
                    </p>
                </div>
            </div>

            <!-- FAQs Section -->
            <?php if (isset($faqs) && !empty($faqs)): ?>
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Frequently Asked Questions</h2>

                <div class="space-y-4">
                    <?php foreach ($faqs as $index => $faq): ?>
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                            <button
                                onclick="toggleFaq('manaslu-faq-<?= $index ?>')"
                                class="w-full text-left px-6 py-4 bg-white hover:bg-gray-50 transition flex justify-between items-center"
                            >
                                <span class="font-semibold text-gray-900 pr-4"><?= htmlspecialchars($faq['question']) ?></span>
                                <svg class="w-5 h-5 text-purple-600 transform transition-transform" id="manaslu-faq-<?= $index ?>-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="manaslu-faq-<?= $index ?>" class="hidden px-6 py-4 bg-gray-50 border-t border-gray-200">
                                <p class="text-gray-700 leading-relaxed"><?= nl2br(htmlspecialchars($faq['answer'])) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Dynamic Route Cards -->
            <?php include __DIR__ . '/_routes-grid.php'; ?>

            <!-- CTA Section -->
            <div class="bg-gradient-to-br from-purple-600 to-indigo-600 rounded-2xl p-8 md:p-12 text-center text-white">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Discover Nepal's Hidden Gem?</h2>
                <p class="text-xl mb-8 text-purple-100">
                    Experience the authentic Himalayan wilderness with Yeti Routes' expert guides and comprehensive support.
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="/treks" class="inline-block bg-white text-purple-600 hover:bg-gray-100 font-semibold px-8 py-4 rounded-lg transition transform hover:scale-105 shadow-xl">
                        Explore Manaslu Treks
                    </a>
                    <a href="/contact" class="inline-block bg-purple-700 hover:bg-purple-800 text-white font-semibold px-8 py-4 rounded-lg transition border-2 border-white/30">
                        Request Custom Itinerary
                    </a>
                </div>
                <p class="mt-6 text-sm text-purple-200">
                    Expert guides • All permits arranged • 15+ years experience in Manaslu region
                </p>
            </div>

        </div>
    </div>
</section>

<script>
function toggleFaq(id) {
    const content = document.getElementById(id);
    const icon = document.getElementById(id + '-icon');

    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
    } else {
        content.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
    }
}
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../layouts/frontend.php';
?>
