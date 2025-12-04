<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? $activity->title ?> - Yeti Routes</title>
    <meta name="description" content="<?= $metaDescription ?? $activity->short_description ?>">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-lime': '#d4ff00',
                        'brand-teal': '#00796B',
                        'brand-dark': '#1a1a1a'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white">
    <?php require_once BASE_PATH . '/app/Views/layouts/frontend.php'; ?>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white py-24">
        <?php
        $fallbackImages = [
            'meditation' => 'photo-1506126613408-eca07ce68773',
            'cycling' => 'photo-1559080509-e7e68ef8bd42',
            'hiking' => 'photo-1551632811-561732d1e306',
            'safari' => 'photo-1579549392258-005d5d36e2f1',
            'hike' => 'photo-1464822759023-fed622ff2c3b',
            'bungee' => 'photo-1519904981063-b0cf448d479e',
            'balloon' => 'photo-1506905925346-21bda4d32df4',
            'flight' => 'photo-1544735716-392fe2489ffa',
            'default' => 'photo-1506905925346-21bda4d32df4'
        ];
        $slugKey = strtolower(explode('-', $activity->slug)[0]);
        $imageId = $fallbackImages[$slugKey] ?? $fallbackImages['default'];
        $heroImage = "https://images.unsplash.com/{$imageId}?w=1920";
        ?>
        <div class="absolute inset-0 bg-[url('<?= $heroImage ?>')] bg-cover bg-center opacity-20"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl">
                <!-- Breadcrumb -->
                <nav class="mb-6">
                    <ol class="flex items-center gap-2 text-sm text-gray-300">
                        <li><a href="/" class="hover:text-brand-lime transition">Home</a></li>
                        <li><i class="ri-arrow-right-s-line"></i></li>
                        <li><a href="/activities" class="hover:text-brand-lime transition">Activities</a></li>
                        <li><i class="ri-arrow-right-s-line"></i></li>
                        <li class="text-white"><?= htmlspecialchars($activity->title) ?></li>
                    </ol>
                </nav>

                <!-- Title & Icon -->
                <div class="flex items-start gap-6 mb-6">
                    <div class="w-16 h-16 bg-brand-lime rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="<?= $activity->icon_class ?? 'ri-star-line' ?> text-3xl text-slate-900"></i>
                    </div>
                    <div>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
                            <?= htmlspecialchars($activity->title) ?>
                        </h1>
                        <p class="text-xl text-gray-300">
                            <?= htmlspecialchars($activity->short_description) ?>
                        </p>
                    </div>
                </div>

                <!-- Key Info Badges -->
                <div class="flex flex-wrap gap-4">
                    <?php if ($activity->duration): ?>
                        <div class="flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full">
                            <i class="ri-time-line text-brand-lime"></i>
                            <span><?= htmlspecialchars($activity->duration) ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($activity->difficulty): ?>
                        <?php
                        $difficultyColors = [
                            'easy' => 'bg-green-500/20 text-green-300',
                            'moderate' => 'bg-yellow-500/20 text-yellow-300',
                            'challenging' => 'bg-orange-500/20 text-orange-300',
                            'extreme' => 'bg-red-500/20 text-red-300'
                        ];
                        $diffClass = $difficultyColors[$activity->difficulty] ?? 'bg-gray-500/20 text-gray-300';
                        ?>
                        <div class="px-4 py-2 <?= $diffClass ?> rounded-full font-semibold">
                            <?= ucfirst($activity->difficulty) ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($activity->location): ?>
                        <div class="flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full">
                            <i class="ri-map-pin-line text-brand-lime"></i>
                            <span><?= htmlspecialchars($activity->location) ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($activity->price_from): ?>
                        <div class="flex items-center gap-2 px-4 py-2 bg-brand-lime text-slate-900 rounded-full font-bold">
                            <span>From <?= htmlspecialchars($activity->currency ?? 'USD') ?> <?= number_format($activity->price_from) ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                <!-- Main Content Column -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Overview -->
                    <?php if ($activity->full_description): ?>
                        <div class="bg-white rounded-2xl shadow-lg p-8">
                            <h2 class="text-3xl font-bold mb-6 flex items-center gap-3">
                                <i class="ri-information-line text-brand-teal"></i>
                                Overview
                            </h2>
                            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                                <?= nl2br(htmlspecialchars($activity->full_description)) ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Highlights -->
                    <?php if (!empty($activity->highlights) && is_array($activity->highlights)): ?>
                        <div class="bg-gradient-to-br from-brand-teal to-teal-600 rounded-2xl shadow-lg p-8 text-white">
                            <h2 class="text-3xl font-bold mb-6 flex items-center gap-3">
                                <i class="ri-star-line"></i>
                                Highlights
                            </h2>
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <?php foreach ($activity->highlights as $highlight): ?>
                                    <li class="flex items-start gap-3">
                                        <i class="ri-checkbox-circle-fill text-brand-lime text-xl flex-shrink-0 mt-1"></i>
                                        <span class="text-lg"><?= htmlspecialchars($highlight) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Inclusions & Exclusions -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Inclusions -->
                        <?php if (!empty($activity->inclusions) && is_array($activity->inclusions)): ?>
                            <div class="bg-white rounded-2xl shadow-lg p-8">
                                <h3 class="text-2xl font-bold mb-6 flex items-center gap-3 text-green-600">
                                    <i class="ri-checkbox-circle-line"></i>
                                    Included
                                </h3>
                                <ul class="space-y-3">
                                    <?php foreach ($activity->inclusions as $inclusion): ?>
                                        <li class="flex items-start gap-3 text-gray-700">
                                            <i class="ri-check-line text-green-600 text-xl flex-shrink-0 mt-0.5"></i>
                                            <span><?= htmlspecialchars($inclusion) ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <!-- Exclusions -->
                        <?php if (!empty($activity->exclusions) && is_array($activity->exclusions)): ?>
                            <div class="bg-white rounded-2xl shadow-lg p-8">
                                <h3 class="text-2xl font-bold mb-6 flex items-center gap-3 text-red-600">
                                    <i class="ri-close-circle-line"></i>
                                    Not Included
                                </h3>
                                <ul class="space-y-3">
                                    <?php foreach ($activity->exclusions as $exclusion): ?>
                                        <li class="flex items-start gap-3 text-gray-700">
                                            <i class="ri-close-line text-red-600 text-xl flex-shrink-0 mt-0.5"></i>
                                            <span><?= htmlspecialchars($exclusion) ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Requirements -->
                    <?php if ($activity->requirements): ?>
                        <div class="bg-amber-50 border-l-4 border-amber-500 rounded-lg p-6">
                            <h3 class="text-xl font-bold mb-3 flex items-center gap-2 text-amber-900">
                                <i class="ri-alert-line"></i>
                                Requirements
                            </h3>
                            <p class="text-amber-900 leading-relaxed">
                                <?= nl2br(htmlspecialchars($activity->requirements)) ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Sidebar Column -->
                <div class="space-y-6">
                    <!-- Booking Card -->
                    <div class="bg-white rounded-2xl shadow-xl p-8 sticky top-4">
                        <h3 class="text-2xl font-bold mb-6">Book This Activity</h3>

                        <?php if ($activity->price_from): ?>
                            <div class="mb-6 p-4 bg-brand-lime/10 rounded-lg">
                                <div class="text-sm text-gray-600 mb-1">Starting from</div>
                                <div class="text-3xl font-bold text-slate-900">
                                    <?= htmlspecialchars($activity->currency ?? 'USD') ?> <?= number_format($activity->price_from) ?>
                                </div>
                                <div class="text-sm text-gray-500 mt-1">per person</div>
                            </div>
                        <?php endif; ?>

                        <form action="/contact/submit" method="POST" class="space-y-4">
                            <input type="hidden" name="inquiry_type" value="activity">
                            <input type="hidden" name="activity_name" value="<?= htmlspecialchars($activity->title) ?>">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Your Name *</label>
                                <input type="text" name="name" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                <input type="email" name="email" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                <input type="tel" name="phone"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Preferred Date</label>
                                <input type="date" name="preferred_date"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Number of People</label>
                                <input type="number" name="group_size" min="1" value="1"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                                <textarea name="message" rows="4"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-teal focus:border-transparent"
                                    placeholder="Any special requests or questions?"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-brand-teal text-white py-3 rounded-lg font-bold hover:bg-brand-teal/90 transition flex items-center justify-center gap-2">
                                <i class="ri-send-plane-line"></i>
                                Send Inquiry
                            </button>
                        </form>

                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                <i class="ri-shield-check-line text-green-600 text-xl"></i>
                                <span>Free cancellation up to 24 hours before</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Info Card -->
                    <div class="bg-slate-50 rounded-2xl p-6">
                        <h4 class="font-bold mb-4">Quick Info</h4>
                        <dl class="space-y-3 text-sm">
                            <?php if ($activity->duration): ?>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Duration:</dt>
                                    <dd class="font-semibold"><?= htmlspecialchars($activity->duration) ?></dd>
                                </div>
                            <?php endif; ?>
                            <?php if ($activity->difficulty): ?>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Difficulty:</dt>
                                    <dd class="font-semibold"><?= ucfirst($activity->difficulty) ?></dd>
                                </div>
                            <?php endif; ?>
                            <?php if ($activity->best_season): ?>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Best Season:</dt>
                                    <dd class="font-semibold"><?= htmlspecialchars($activity->best_season) ?></dd>
                                </div>
                            <?php endif; ?>
                            <?php if ($activity->group_size_min && $activity->group_size_max): ?>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Group Size:</dt>
                                    <dd class="font-semibold"><?= $activity->group_size_min ?>-<?= $activity->group_size_max ?> people</dd>
                                </div>
                            <?php endif; ?>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Activities -->
    <?php if (isset($related_activities) && !empty($related_activities)): ?>
        <section class="py-16 bg-slate-50">
            <div class="container mx-auto px-4">
                <div class="max-w-7xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center">You Might Also Like</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <?php
                        $colors = ['purple', 'blue', 'green', 'orange'];
                        $colorClasses = [
                            'purple' => ['text' => 'text-purple-500'],
                            'blue' => ['text' => 'text-blue-500'],
                            'green' => ['text' => 'text-green-500'],
                            'orange' => ['text' => 'text-orange-500']
                        ];
                        foreach (array_slice($related_activities, 0, 4) as $index => $related):
                            if ($related->slug === $activity->slug) continue;
                            $color = $colorClasses[$colors[$index % 4]];
                            $slugKey = strtolower(explode('-', $related->slug)[0]);
                            $imageId = $fallbackImages[$slugKey] ?? $fallbackImages['default'];
                        ?>
                            <a href="/activity?slug=<?= htmlspecialchars($related->slug) ?>"
                               class="group bg-white rounded-xl overflow-hidden shadow hover:shadow-xl transition">
                                <div class="h-48 overflow-hidden">
                                    <img src="https://images.unsplash.com/<?= $imageId ?>?w=400"
                                         alt="<?= htmlspecialchars($related->title) ?>"
                                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                </div>
                                <div class="p-4">
                                    <h4 class="font-bold text-lg mb-2"><?= htmlspecialchars($related->title) ?></h4>
                                    <p class="text-sm text-gray-600 line-clamp-2"><?= htmlspecialchars($related->short_description) ?></p>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php require_once BASE_PATH . '/app/Views/layouts/footer.php'; ?>
</body>
</html>
