<?php
$pageTitle = htmlspecialchars($route->title ?? 'Trek Detail');
$metaDescription = htmlspecialchars($route->meta_description ?? substr($route->short_description ?? '', 0, 160));
$ogImage = $route->featured_image_path ?? 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200&q=80';
$ogType  = 'article';
$isTrek  = in_array($route->route_type ?? '', ['trek', 'expedition']);
$pageSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'TouristTrip',
    'name'        => $route->title ?? '',
    'description' => strip_tags($route->meta_description ?? $route->short_description ?? ''),
    'image'       => $ogImage,
    'url'         => 'https://yetiroutes.com/trek?slug=' . ($route->slug ?? ''),
    'touristType' => ucfirst($route->route_type ?? 'trek'),
    'provider'    => ['@type' => 'TravelAgency', 'name' => 'Yeti Routes', 'url' => 'https://yetiroutes.com'],
    'offers'      => [
        '@type'         => 'Offer',
        'price'         => $route->base_price ?? 0,
        'priceCurrency' => 'USD',
        'availability'  => 'https://schema.org/InStock',
    ],
];
if (!empty($route->duration_days)) {
    $pageSchema['duration'] = 'P' . $route->duration_days . 'D';
}
$breadcrumbs = [
    ['name' => 'Home',  'url' => '/'],
    ['name' => 'Treks', 'url' => '/treks'],
    ['name' => $route->title ?? '', 'url' => '/trek?slug=' . ($route->slug ?? '')],
];
ob_start();
?>

<!-- Hero Section -->
<section class="relative h-[60vh] overflow-hidden">
    <img src="<?= htmlspecialchars($route->featured_image_path ?? 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920') ?>"
        alt="<?= htmlspecialchars($route->title) ?>" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/20 flex items-end pb-16">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl">
                <div class="flex gap-2 mb-4">
                    <span
                        class="px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-bold text-white uppercase tracking-wider border border-white/10">
                        <?= ucfirst(str_replace('_', ' ', $route->route_type ?? 'Adventure')) ?>
                    </span>
                    <?php if ($route->is_featured): ?>
                        <span
                            class="px-3 py-1 bg-yellow-400 text-black rounded-full text-xs font-bold uppercase tracking-wider shadow-lg">Featured</span>
                    <?php endif; ?>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                    <?= htmlspecialchars($route->title) ?></h1>
                <div class="flex flex-wrap gap-6 text-white text-lg font-medium">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-clock text-blue-400"></i>
                        <span><?= $route->duration_days ?> Days</span>
                    </div>
                    <?php if ($isTrek): ?>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-mountain text-emerald-400"></i>
                            <span><?= number_format($route->max_altitude_meters) ?>m</span>
                        </div>
                    <?php endif; ?>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-signal text-orange-400"></i>
                        <span><?= ucfirst($route->difficulty) ?></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-users text-purple-400"></i>
                        <span>Max 12 People</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gray-50 bg-[url('/images/pattern-light.svg')]">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Left Content -->
            <div class="lg:col-span-8">
                <!-- Navigation Tabs (Sticky) -->
                <div
                    class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-gray-100 mb-8 sticky top-24 z-30 overflow-x-auto">
                    <div class="flex p-2 min-w-max">
                        <button
                            class="tab-btn active px-6 py-3 rounded-xl text-sm font-bold transition-all text-slate-900 bg-gray-100 hover:bg-gray-200"
                            data-tab="overview">
                            Overview
                        </button>
                        <button
                            class="tab-btn px-6 py-3 rounded-xl text-sm font-bold text-gray-500 hover:text-slate-900 hover:bg-gray-50 transition-all"
                            data-tab="highlights">
                            Highlights
                        </button>
                        <button
                            class="tab-btn px-6 py-3 rounded-xl text-sm font-bold text-gray-500 hover:text-slate-900 hover:bg-gray-50 transition-all"
                            data-tab="itinerary">
                            Itinerary
                        </button>
                        <button
                            class="tab-btn px-6 py-3 rounded-xl text-sm font-bold text-gray-500 hover:text-slate-900 hover:bg-gray-50 transition-all"
                            data-tab="inclusions">
                            Included
                        </button>
                        <button
                            class="tab-btn px-6 py-3 rounded-xl text-sm font-bold text-gray-500 hover:text-slate-900 hover:bg-gray-50 transition-all"
                            data-tab="reviews">
                            Reviews
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8 md:p-12 mb-8">
                    <!-- Overview Tab -->
                    <div id="overview-tab" class="tab-content">
                        <h2 class="text-3xl font-bold text-slate-900 mb-6 font-heading">Overview</h2>
                        <div class="prose prose-lg prose-slate max-w-none mb-12">
                            <?= nl2br(htmlspecialchars($route->full_description)) ?>
                        </div>

                        <!-- Trip Facts Grid -->
                        <h3 class="text-xl font-bold mb-6 border-l-4 border-blue-500 pl-4">Key Facts</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                            <div class="bg-gray-50 p-6 rounded-2xl">
                                <div class="text-gray-500 text-xs uppercase tracking-wider font-bold mb-2">Duration
                                </div>
                                <div class="font-bold text-slate-900 text-lg"><?= $route->duration_days ?> Days</div>
                            </div>
                            <?php if ($isTrek): ?>
                                <div class="bg-gray-50 p-6 rounded-2xl">
                                    <div class="text-gray-500 text-xs uppercase tracking-wider font-bold mb-2">Max Altitude
                                    </div>
                                    <div class="font-bold text-slate-900 text-lg">
                                        <?= number_format($route->max_altitude_meters) ?>m</div>
                                </div>
                            <?php endif; ?>
                            <div class="bg-gray-50 p-6 rounded-2xl">
                                <div class="text-gray-500 text-xs uppercase tracking-wider font-bold mb-2">Difficulty
                                </div>
                                <div class="font-bold text-slate-900 text-lg"><?= ucfirst($route->difficulty) ?></div>
                            </div>
                            <div class="bg-gray-50 p-6 rounded-2xl">
                                <div class="text-gray-500 text-xs uppercase tracking-wider font-bold mb-2">Best Season
                                </div>
                                <div class="font-bold text-slate-900 text-lg"><?= $route->best_season ?? 'Year Round' ?>
                                </div>
                            </div>
                            <div class="bg-gray-50 p-6 rounded-2xl">
                                <div class="text-gray-500 text-xs uppercase tracking-wider font-bold mb-2">Group Size
                                </div>
                                <div class="font-bold text-slate-900 text-lg">Max 12 People</div>
                            </div>
                            <div class="bg-gray-50 p-6 rounded-2xl">
                                <div class="text-gray-500 text-xs uppercase tracking-wider font-bold mb-2">Accommodation
                                </div>
                                <div class="font-bold text-slate-900 text-lg">
                                    <?= $isTrek ? 'Teahouse/Lodge' : 'Hotel/Resort' ?></div>
                            </div>
                        </div>
                    </div>

                    <!-- Highlights Tab -->
                    <div id="highlights-tab" class="tab-content hidden">
                        <h2 class="text-3xl font-bold text-slate-900 mb-8 font-heading">Highlights</h2>
                        <?php
                        $highlights = json_decode($route->highlights ?? '[]', true);
                        if (!empty($highlights)):
                            ?>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <?php foreach ($highlights as $highlight): ?>
                                    <div class="flex items-start gap-4 bg-brand-lime/10 p-4 rounded-xl">
                                        <div
                                            class="w-8 h-8 rounded-full bg-brand-lime flex items-center justify-center flex-shrink-0 mt-1">
                                            <i class="fas fa-check text-slate-900 text-xs"></i>
                                        </div>
                                        <span class="text-slate-800 font-medium"><?= htmlspecialchars($highlight) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p class="text-gray-600">Highlights coming soon...</p>
                        <?php endif; ?>
                    </div>

                    <!-- Itinerary Tab -->
                    <div id="itinerary-tab" class="tab-content hidden">
                        <div class="flex justify-between items-end mb-8">
                            <h2 class="text-3xl font-bold text-slate-900 font-heading">Itinerary</h2>
                            <button onclick="window.print()" class="text-blue-600 font-bold text-sm hover:underline"><i
                                    class="fas fa-print mr-1"></i> Print</button>
                        </div>

                        <?php if (!empty($itinerary)): ?>
                            <div
                                class="space-y-6 relative before:absolute before:inset-0 before:ml-6 before:w-0.5 before:bg-gray-200">
                                <?php foreach ($itinerary as $day): ?>
                                    <div class="relative pl-16">
                                        <div
                                            class="absolute left-0 top-0 w-12 h-12 bg-white border-2 border-brand-lime rounded-full flex items-center justify-center font-bold text-slate-900 z-10 shadow-sm">
                                            <?= $day->day_number ?>
                                        </div>
                                        <div
                                            class="bg-gray-50 rounded-2xl p-6 hover:bg-white hover:shadow-md transition-all border border-transparent hover:border-gray-100">
                                            <div class="flex flex-wrap gap-4 mb-3 text-sm text-gray-500">
                                                <?php if ($isTrek && $day->overnight_altitude_meters): ?>
                                                    <span class="flex items-center gap-1"><i class="fas fa-mountain"></i>
                                                        <?= $day->overnight_altitude_meters ?>m</span>
                                                <?php endif; ?>
                                                <?php if ($day->is_acclimatization_day): ?>
                                                    <span
                                                        class="text-orange-500 font-bold flex items-center gap-1 bg-orange-100 px-2 py-0.5 rounded-full text-xs">
                                                        <i class="fas fa-pause-circle"></i> Acclimatization
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <h3 class="text-xl font-bold text-slate-900 mb-3">
                                                <?= htmlspecialchars($day->title) ?></h3>
                                            <p class="text-gray-600 leading-relaxed">
                                                <?= htmlspecialchars($day->description ?? '') ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p class="text-gray-600">Detailed itinerary coming soon...</p>
                        <?php endif; ?>
                    </div>

                    <!-- Inclusions Tab -->
                    <div id="inclusions-tab" class="tab-content hidden">
                        <h2 class="text-3xl font-bold text-slate-900 mb-8 font-heading">What's Included</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div>
                                <h3
                                    class="flex items-center gap-2 text-lg font-bold mb-6 text-green-700 bg-green-50 w-fit px-4 py-2 rounded-lg">
                                    <i class="fas fa-check-circle"></i> Price Includes
                                </h3>
                                <?php
                                $inclusions = json_decode($route->inclusions ?? '[]', true);
                                if (!empty($inclusions)):
                                    ?>
                                    <ul class="space-y-4">
                                        <?php foreach ($inclusions as $item): ?>
                                            <li class="flex items-start gap-3">
                                                <i class="fas fa-check text-green-500 mt-1 flex-shrink-0"></i>
                                                <span class="text-gray-700"><?= htmlspecialchars($item) ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <p class="text-gray-600">Details coming soon...</p>
                                <?php endif; ?>
                            </div>

                            <div>
                                <h3
                                    class="flex items-center gap-2 text-lg font-bold mb-6 text-red-700 bg-red-50 w-fit px-4 py-2 rounded-lg">
                                    <i class="fas fa-times-circle"></i> Price Excludes
                                </h3>
                                <?php
                                $exclusions = json_decode($route->exclusions ?? '[]', true);
                                if (!empty($exclusions)):
                                    ?>
                                    <ul class="space-y-4">
                                        <?php foreach ($exclusions as $item): ?>
                                            <li class="flex items-start gap-3">
                                                <i class="fas fa-times text-red-500 mt-1 flex-shrink-0"></i>
                                                <span class="text-gray-700"><?= htmlspecialchars($item) ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <p class="text-gray-600">Details coming soon...</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews Tab -->
                    <div id="reviews-tab" class="tab-content hidden">
                        <h2 class="text-3xl font-bold text-slate-900 mb-8 font-heading">Reviews</h2>
                        <div class="bg-blue-50 rounded-2xl p-8 text-center mb-8">
                            <div class="text-5xl font-bold text-slate-900 mb-2">4.9</div>
                            <div class="text-yellow-400 text-2xl mb-2">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="text-gray-600">Based on 150+ traveler reviews</div>
                        </div>

                        <!-- Placeholder Review -->
                        <div class="border-b border-gray-100 pb-8 mb-8">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden">
                                    <img src="https://i.pravatar.cc/100?img=5" alt="Reviewer"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div class="font-bold text-slate-900">Sarah Johnson</div>
                                    <div class="text-sm text-gray-500">United Kingdom • March 2024</div>
                                </div>
                                <div class="ml-auto text-yellow-500 text-sm">★★★★★</div>
                            </div>
                            <p class="text-gray-700 italic">"An unforgettable journey! The guides were so professional
                                and caring. The views were breathtaking. Highly recommend Yeti Routes!"</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Booking Card -->
            <div class="lg:col-span-4">
                <div class="sticky top-24 space-y-6">
                    <!-- Booking Card -->
                    <div class="bg-white rounded-[2rem] shadow-xl p-8 border border-gray-100 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 to-brand-lime">
                        </div>

                        <div class="text-center mb-8">
                            <span class="text-gray-500 text-sm font-medium uppercase tracking-wider">Starting
                                From</span>
                            <div class="flex items-center justify-center gap-2 mt-2">
                                <span
                                    class="text-4xl font-bold text-slate-900">$<?= number_format($route->base_price) ?></span>
                                <span class="text-gray-400">/ person</span>
                            </div>
                        </div>

                        <!-- Date Selection Placeholder -->
                        <?php if (!empty($departures)): ?>
                            <div class="mb-6">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Select Date</label>
                                <div class="relative">
                                    <select
                                        class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500 font-medium">
                                        <?php foreach ($departures as $departure): ?>
                                            <option value="<?= $departure->id ?>">
                                                <?= date('M d', strtotime($departure->start_date)) ?> -
                                                <?= date('M d', strtotime($departure->end_date ?? $departure->start_date)) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div
                                        class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="space-y-3">
                            <a href="/booking/<?= $route->slug ?>"
                                class="block w-full bg-slate-900 hover:bg-slate-800 text-white text-center py-4 rounded-xl font-bold text-lg transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                Book This Trip
                            </a>
                            <a href="https://wa.me/9779843183934?text=Hi, I'm interested in <?= urlencode($route->title) ?>"
                                class="block w-full bg-[#25D366] hover:bg-[#20bd5a] text-white text-center py-4 rounded-xl font-bold transition-all flex items-center justify-center gap-2">
                                <i class="fab fa-whatsapp text-xl"></i> Chat on WhatsApp
                            </a>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <div class="space-y-3">
                                <div class="flex items-center gap-3 text-sm text-gray-600">
                                    <i class="far fa-check-circle text-green-500"></i>
                                    <span>Free cancellation (48h notice)</span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-gray-600">
                                    <i class="far fa-check-circle text-green-500"></i>
                                    <span>Instant confirmation</span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-gray-600">
                                    <i class="far fa-check-circle text-green-500"></i>
                                    <span>Best price guarantee</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assistance Card -->
                    <div class="bg-blue-50 rounded-2xl p-8 border border-blue-100">
                        <h4 class="font-bold text-slate-900 mb-2">Need Help?</h4>
                        <p class="text-sm text-gray-600 mb-4">Our expert travel consultants are ready to help you plan
                            your perfect trip.</p>
                        <a href="/contact?trek=<?= $route->slug ?>" class="text-blue-600 font-bold hover:underline">Get
                            a Custom Quote →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Similar Adventures section intentionally hidden until real related-trek data is available -->

<script>
    // Tab switching
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const tabName = this.dataset.tab;

            // Reset all buttons
            document.querySelectorAll('.tab-btn').forEach(b => {
                b.classList.remove('active', 'bg-gray-100', 'text-slate-900');
                b.classList.add('text-gray-500', 'hover:bg-gray-50');
            });

            // Hide all content
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Activate clicked
            this.classList.remove('text-gray-500', 'hover:bg-gray-50');
            this.classList.add('active', 'bg-gray-100', 'text-slate-900');
            document.getElementById(tabName + '-tab').classList.remove('hidden');
        });
    });
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/frontend.php';
?>