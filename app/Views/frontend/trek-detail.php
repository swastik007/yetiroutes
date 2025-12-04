<?php
$pageTitle = htmlspecialchars($route->title ?? 'Trek Detail');
$metaDescription = htmlspecialchars($route->meta_description ?? substr($route->short_description ?? '', 0, 160));
ob_start();
?>

<!-- Hero Section -->
<section class="relative h-96 overflow-hidden">
    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920" alt="<?= htmlspecialchars($route->title) ?>" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl">
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-4"><?= htmlspecialchars($route->title) ?></h1>
                <div class="flex flex-wrap gap-4 text-white text-lg">
                    <span><i class="fas fa-clock mr-2"></i><?= $route->duration_days ?> Days</span>
                    <span><i class="fas fa-mountain mr-2"></i><?= number_format($route->max_altitude_meters) ?>m</span>
                    <span><i class="fas fa-signal mr-2"></i><?= ucfirst($route->difficulty) ?></span>
                    <span><i class="fas fa-users mr-2"></i>Max 12 People</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Content -->
            <div class="lg:col-span-2">
                <!-- Tabs Navigation -->
                <div class="bg-white rounded-xl shadow-md mb-6">
                    <div class="flex border-b overflow-x-auto">
                        <button class="tab-btn active px-6 py-4 font-semibold border-b-2 border-blue-600 text-blue-600" data-tab="overview">
                            Overview
                        </button>
                        <button class="tab-btn px-6 py-4 font-semibold hover:text-blue-600" data-tab="highlights">
                            Highlights
                        </button>
                        <button class="tab-btn px-6 py-4 font-semibold hover:text-blue-600" data-tab="itinerary">
                            Itinerary
                        </button>
                        <button class="tab-btn px-6 py-4 font-semibold hover:text-blue-600" data-tab="inclusions">
                            Inclusions
                        </button>
                        <button class="tab-btn px-6 py-4 font-semibold hover:text-blue-600" data-tab="reviews">
                            Reviews
                        </button>
                        <button class="tab-btn px-6 py-4 font-semibold hover:text-blue-600" data-tab="faq">
                            FAQ
                        </button>
                    </div>

                    <!-- Tab Content -->
                    <div class="p-8">
                        <!-- Overview Tab -->
                        <div id="overview-tab" class="tab-content">
                            <h2 class="text-3xl font-bold mb-6">Trek Overview</h2>
                            <div class="prose max-w-none">
                                <?= nl2br(htmlspecialchars($route->full_description)) ?>
                            </div>

                            <!-- Trip Facts -->
                            <div class="mt-8 grid grid-cols-2 gap-4">
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="text-gray-600 text-sm">Duration</div>
                                    <div class="font-bold text-lg"><?= $route->duration_days ?> Days</div>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="text-gray-600 text-sm">Max Altitude</div>
                                    <div class="font-bold text-lg"><?= number_format($route->max_altitude_meters) ?>m</div>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="text-gray-600 text-sm">Difficulty</div>
                                    <div class="font-bold text-lg"><?= ucfirst($route->difficulty) ?></div>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="text-gray-600 text-sm">Best Season</div>
                                    <div class="font-bold text-lg"><?= $route->best_season ?? 'Year Round' ?></div>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="text-gray-600 text-sm">Group Size</div>
                                    <div class="font-bold text-lg">Max 12 People</div>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="text-gray-600 text-sm">Accommodation</div>
                                    <div class="font-bold text-lg">Teahouse/Lodge</div>
                                </div>
                            </div>
                        </div>

                        <!-- Highlights Tab -->
                        <div id="highlights-tab" class="tab-content hidden">
                            <h2 class="text-3xl font-bold mb-6">Trek Highlights</h2>
                            <?php
                            $highlights = json_decode($route->highlights ?? '[]', true);
                            if (!empty($highlights)):
                            ?>
                                <ul class="space-y-3">
                                    <?php foreach ($highlights as $highlight): ?>
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-green-600 mt-1 mr-3"></i>
                                            <span class="text-lg"><?= htmlspecialchars($highlight) ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p class="text-gray-600">Highlights coming soon...</p>
                            <?php endif; ?>
                        </div>

                        <!-- Itinerary Tab -->
                        <div id="itinerary-tab" class="tab-content hidden">
                            <h2 class="text-3xl font-bold mb-6">Day-by-Day Itinerary</h2>
                            <?php if (!empty($itinerary)): ?>
                                <div class="space-y-6">
                                    <?php foreach ($itinerary as $day): ?>
                                        <div class="border-l-4 border-blue-600 pl-6 pb-6">
                                            <div class="flex items-start justify-between">
                                                <div class="flex-1">
                                                    <div class="text-blue-600 font-semibold mb-1">Day <?= $day->day_number ?></div>
                                                    <h3 class="text-xl font-bold mb-2"><?= htmlspecialchars($day->title) ?></h3>
                                                    <p class="text-gray-700 mb-2"><?= htmlspecialchars($day->description ?? '') ?></p>
                                                    <div class="flex items-center text-sm text-gray-600">
                                                        <span class="mr-4"><i class="fas fa-bed mr-1"></i> <?= $day->overnight_altitude_meters ?>m</span>
                                                        <?php if ($day->is_acclimatization_day): ?>
                                                            <span class="text-orange-600"><i class="fas fa-exclamation-triangle mr-1"></i> Acclimatization Day</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
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
                            <h2 class="text-3xl font-bold mb-6">What's Included & Excluded</h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <h3 class="text-xl font-bold mb-4 text-green-600"><i class="fas fa-check-circle mr-2"></i>Included</h3>
                                    <?php
                                    $inclusions = json_decode($route->inclusions ?? '[]', true);
                                    if (!empty($inclusions)):
                                    ?>
                                        <ul class="space-y-2">
                                            <?php foreach ($inclusions as $item): ?>
                                                <li class="flex items-start">
                                                    <i class="fas fa-check text-green-600 mt-1 mr-2"></i>
                                                    <span><?= htmlspecialchars($item) ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                        <p class="text-gray-600">Details coming soon...</p>
                                    <?php endif; ?>
                                </div>

                                <div>
                                    <h3 class="text-xl font-bold mb-4 text-red-600"><i class="fas fa-times-circle mr-2"></i>Excluded</h3>
                                    <?php
                                    $exclusions = json_decode($route->exclusions ?? '[]', true);
                                    if (!empty($exclusions)):
                                    ?>
                                        <ul class="space-y-2">
                                            <?php foreach ($exclusions as $item): ?>
                                                <li class="flex items-start">
                                                    <i class="fas fa-times text-red-600 mt-1 mr-2"></i>
                                                    <span><?= htmlspecialchars($item) ?></span>
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
                            <h2 class="text-3xl font-bold mb-6">Customer Reviews</h2>
                            <div class="mb-8 bg-gray-50 p-6 rounded-lg text-center">
                                <div class="text-5xl font-bold mb-2">4.9/5</div>
                                <div class="text-yellow-500 text-3xl mb-2">★★★★★</div>
                                <div class="text-gray-600">Based on 150+ reviews</div>
                            </div>

                            <div class="space-y-6">
                                <div class="border-b pb-6">
                                    <div class="flex items-start justify-between mb-3">
                                        <div class="flex items-center">
                                            <img src="https://i.pravatar.cc/50?img=1" alt="Reviewer" class="w-12 h-12 rounded-full mr-3">
                                            <div>
                                                <div class="font-semibold">Sarah Johnson</div>
                                                <div class="text-sm text-gray-500">March 2024</div>
                                            </div>
                                        </div>
                                        <div class="text-yellow-500">★★★★★</div>
                                    </div>
                                    <p class="text-gray-700">"Absolutely incredible experience! The guide was knowledgeable and friendly. Highly recommend!"</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Tab -->
                        <div id="faq-tab" class="tab-content hidden">
                            <h2 class="text-3xl font-bold mb-6">Frequently Asked Questions</h2>
                            <div class="space-y-4">
                                <div class="border rounded-lg">
                                    <button class="faq-btn w-full text-left p-4 font-semibold hover:bg-gray-50">
                                        <div class="flex items-center justify-between">
                                            <span>What fitness level is required?</span>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </button>
                                    <div class="faq-answer hidden p-4 border-t">
                                        <p>Moderate fitness is required. You should be able to walk 5-6 hours a day with a light daypack.</p>
                                    </div>
                                </div>

                                <div class="border rounded-lg">
                                    <button class="faq-btn w-full text-left p-4 font-semibold hover:bg-gray-50">
                                        <div class="flex items-center justify-between">
                                            <span>Do I need travel insurance?</span>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </button>
                                    <div class="faq-answer hidden p-4 border-t">
                                        <p>Yes, comprehensive travel insurance including helicopter evacuation up to 6000m is mandatory.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Booking Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                    <div class="text-center mb-6">
                        <div class="text-gray-600 mb-2">Starting from</div>
                        <div class="text-4xl font-bold text-blue-600 mb-1">
                            $<?= number_format($route->base_price) ?>
                        </div>
                        <div class="text-sm text-gray-500">per person</div>
                    </div>

                    <!-- Upcoming Departures -->
                    <?php if (!empty($departures)): ?>
                        <div class="mb-6">
                            <h4 class="font-semibold mb-3">Available Dates</h4>
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-4">
                                <?php foreach ($departures as $departure): ?>
                                    <option value="<?= $departure->id ?>">
                                        <?= date('M d, Y', strtotime($departure->start_date)) ?>
                                        (<?= $departure->seats_total - $departure->seats_booked ?> seats left)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="space-y-3">
                        <a href="/booking/<?= $route->slug ?>" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-4 rounded-lg font-semibold text-lg transition">
                            <i class="fas fa-calendar-check mr-2"></i> Book Now
                        </a>
                        <a href="https://wa.me/9779841234567?text=Hi, I'm interested in <?= urlencode($route->title) ?>" class="block w-full bg-green-500 hover:bg-green-600 text-white text-center py-4 rounded-lg font-semibold transition">
                            <i class="fab fa-whatsapp mr-2"></i> WhatsApp Inquiry
                        </a>
                        <a href="/contact?trek=<?= $route->slug ?>" class="block w-full border-2 border-blue-600 text-blue-600 hover:bg-blue-50 text-center py-4 rounded-lg font-semibold transition">
                            <i class="fas fa-envelope mr-2"></i> Get Custom Quote
                        </a>
                    </div>

                    <div class="mt-6 pt-6 border-t space-y-3 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-2"></i>
                            Free cancellation up to 30 days
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-2"></i>
                            Best price guarantee
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-2"></i>
                            24/7 support available
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Treks -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8">You Might Also Like</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Similar treks would go here -->
        </div>
    </div>
</section>

<script>
// Tab switching
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const tabName = this.dataset.tab;

        // Remove active from all
        document.querySelectorAll('.tab-btn').forEach(b => {
            b.classList.remove('active', 'border-b-2', 'border-blue-600', 'text-blue-600');
        });
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });

        // Add active to clicked
        this.classList.add('active', 'border-b-2', 'border-blue-600', 'text-blue-600');
        document.getElementById(tabName + '-tab').classList.remove('hidden');
    });
});

// FAQ accordion
document.querySelectorAll('.faq-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const answer = this.nextElementSibling;
        answer.classList.toggle('hidden');
    });
});
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/frontend.php';
?>
