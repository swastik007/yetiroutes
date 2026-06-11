<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Activities' ?> - Yeti Routes</title>
    <meta name="description" content="<?= $metaDescription ?? 'Explore adventure activities in Nepal' ?>">
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
    <section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white py-32">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920')] bg-cover bg-center opacity-10"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6">
                    Adventure Activities
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed">
                    Beyond trekking, experience the thrill of the Himalayas with our diverse range of adventure activities
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <span class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm">
                        <i class="ri-star-line text-brand-lime"></i> Curated Experiences
                    </span>
                    <span class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm">
                        <i class="ri-shield-check-line text-brand-lime"></i> Safety First
                    </span>
                    <span class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm">
                        <i class="ri-team-line text-brand-lime"></i> Expert Guides
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Activities Grid Section -->
    <section class="py-24 bg-gradient-to-b from-white to-slate-50">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="max-w-3xl mx-auto text-center mb-16">
                <span class="text-brand-lime font-semibold text-lg uppercase tracking-widest">CHOOSE YOUR ADVENTURE</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-4 mb-6 text-slate-900">All Activities</h2>
                <p class="text-xl text-gray-600">
                    From serene meditation tours to adrenaline-pumping bungee jumps, find the perfect activity to complement your Himalayan journey
                </p>
            </div>

            <!-- Activities Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 max-w-7xl mx-auto">
                <?php if (isset($activities) && !empty($activities)): ?>
                    <?php
                    // Fallback images based on activity slug/keywords
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

                    // Color rotation for variety
                    $colors = ['purple', 'blue', 'green', 'orange', 'teal', 'red', 'yellow', 'indigo'];
                    $colorClasses = [
                        'purple' => ['bg' => 'bg-purple-500', 'hover' => 'group-hover:bg-purple-500', 'text' => 'text-purple-500'],
                        'blue' => ['bg' => 'bg-blue-500', 'hover' => 'group-hover:bg-blue-500', 'text' => 'text-blue-500'],
                        'green' => ['bg' => 'bg-green-500', 'hover' => 'group-hover:bg-green-500', 'text' => 'text-green-500'],
                        'orange' => ['bg' => 'bg-orange-500', 'hover' => 'group-hover:bg-orange-500', 'text' => 'text-orange-500'],
                        'teal' => ['bg' => 'bg-teal-500', 'hover' => 'group-hover:bg-teal-500', 'text' => 'text-teal-500'],
                        'red' => ['bg' => 'bg-red-500', 'hover' => 'group-hover:bg-red-500', 'text' => 'text-red-500'],
                        'yellow' => ['bg' => 'bg-yellow-500', 'hover' => 'group-hover:bg-yellow-500', 'text' => 'text-yellow-500'],
                        'indigo' => ['bg' => 'bg-indigo-500', 'hover' => 'group-hover:bg-indigo-500', 'text' => 'text-indigo-500']
                    ];

                    foreach ($activities as $index => $activity):
                        // Get color for this activity
                        $colorIndex = $index % count($colors);
                        $colorName = $colors[$colorIndex];
                        $currentColors = $colorClasses[$colorName];

                        // Get fallback image based on slug
                        $slugKey = strtolower(explode('-', $activity->slug)[0]);
                        $imageId = $fallbackImages[$slugKey] ?? $fallbackImages['default'];
                        $imageUrl = "https://images.unsplash.com/{$imageId}?w=500";
                    ?>
                        <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <!-- Image Background -->
                            <div class="relative h-64 overflow-hidden">
                                <img src="<?= htmlspecialchars($imageUrl) ?>"
                                     alt="<?= htmlspecialchars($activity->title) ?>"
                                     loading="lazy"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                                <!-- Icon -->
                                <div class="absolute top-4 right-4 w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center <?= $currentColors['hover'] ?> transition-colors duration-300">
                                    <i class="<?= $activity->icon_class ?? 'ri-star-line' ?> text-2xl <?= $currentColors['text'] ?> group-hover:text-white transition-colors duration-300"></i>
                                </div>

                                <!-- Difficulty Badge -->
                                <?php if ($activity->difficulty): ?>
                                    <?php
                                    $difficultyColors = [
                                        'easy' => 'bg-green-500',
                                        'moderate' => 'bg-yellow-500',
                                        'challenging' => 'bg-orange-500',
                                        'extreme' => 'bg-red-500'
                                    ];
                                    $diffBg = $difficultyColors[$activity->difficulty] ?? 'bg-gray-500';
                                    ?>
                                    <div class="absolute top-4 left-4">
                                        <span class="<?= $diffBg ?> text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                            <?= ucfirst($activity->difficulty) ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <!-- Title -->
                                <div class="absolute bottom-4 left-4 right-4">
                                    <h3 class="text-2xl font-bold text-white mb-2"><?= htmlspecialchars($activity->title) ?></h3>
                                    <?php if ($activity->duration): ?>
                                        <div class="flex items-center gap-2 text-sm text-white/90">
                                            <i class="ri-time-line"></i>
                                            <span><?= htmlspecialchars($activity->duration) ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <p class="text-gray-600 leading-relaxed mb-4 line-clamp-2">
                                    <?= htmlspecialchars($activity->short_description) ?>
                                </p>

                                <div class="flex items-center justify-between mb-4">
                                    <?php if ($activity->price_from): ?>
                                        <div class="text-lg font-bold text-slate-900">
                                            From <?= htmlspecialchars($activity->currency ?? 'USD') ?> <?= number_format($activity->price_from) ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-sm text-gray-500">Price on request</div>
                                    <?php endif; ?>
                                </div>

                                <a href="/activity?slug=<?= htmlspecialchars($activity->slug) ?>"
                                   class="inline-flex items-center gap-2 text-sm font-semibold <?= $currentColors['text'] ?> group-hover:gap-3 transition-all duration-300">
                                    View Details
                                    <i class="ri-arrow-right-line"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-full text-center py-24">
                        <div class="max-w-md mx-auto">
                            <i class="ri-inbox-line text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-2xl font-bold text-gray-600 mb-2">No Activities Found</h3>
                            <p class="text-gray-500 mb-6">We're working on adding more exciting activities. Check back soon!</p>
                            <a href="/" class="inline-flex items-center gap-2 px-6 py-3 bg-brand-teal text-white rounded-full font-semibold hover:bg-brand-teal/90 transition">
                                <i class="ri-home-line"></i>
                                Back to Homepage
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- CTA Section -->
            <?php if (isset($activities) && !empty($activities)): ?>
                <div class="mt-20 text-center">
                    <div class="bg-gradient-to-r from-brand-teal to-teal-600 rounded-2xl p-12 max-w-4xl mx-auto">
                        <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">
                            Ready for Your Adventure?
                        </h3>
                        <p class="text-xl text-white/90 mb-8">
                            Contact us to customize your perfect Himalayan experience
                        </p>
                        <div class="flex flex-wrap items-center justify-center gap-4">
                            <a href="/contact" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-brand-teal rounded-full font-bold text-lg hover:-translate-y-1 transition transform duration-300 shadow-xl">
                                Get in Touch
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="/treks" class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 backdrop-blur-sm text-white rounded-full font-bold text-lg hover:bg-white/20 transition duration-300">
                                View Treks
                                <i class="ri-footprint-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php require_once BASE_PATH . '/app/Views/layouts/footer.php'; ?>
</body>
</html>
