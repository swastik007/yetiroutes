<?php
/**
 * Shared partial: dynamic DB-driven route cards for region pages
 * Expects: $routes (array of route objects), $region (string)
 */
if (!empty($routes)):
    $difficultyColors = [
        'easy'        => 'bg-green-100 text-green-700',
        'moderate'    => 'bg-yellow-100 text-yellow-700',
        'challenging' => 'bg-orange-100 text-orange-700',
        'extreme'     => 'bg-red-100 text-red-700',
    ];
?>
<!-- Dynamic Routes from Database -->
<section class="mb-16">
    <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
        <h2 class="text-4xl font-bold mb-2 text-slate-900">All <?= ucfirst(htmlspecialchars($region ?? '')) ?> Region Packages</h2>
        <p class="text-gray-500 mb-8">Choose from our full range of curated treks, tours, and day trips in this region.</p>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($routes as $route): ?>
            <a href="/trek?slug=<?= htmlspecialchars($route->slug) ?>"
               class="group block border border-gray-100 rounded-xl overflow-hidden hover:shadow-lg transition-all duration-300 hover:-translate-y-1">

                <!-- Image placeholder (shows if no featured image) -->
                <div class="relative h-44 bg-gradient-to-br from-slate-700 to-slate-900 overflow-hidden">
                    <?php if (!empty($route->featured_image_path)): ?>
                        <img src="<?= htmlspecialchars($route->featured_image_path) ?>"
                             alt="<?= htmlspecialchars($route->title) ?>"
                             loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <?php else: ?>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="ri-mountain-line text-5xl text-white/20"></i>
                        </div>
                    <?php endif; ?>
                    <!-- Price badge -->
                    <div class="absolute top-3 right-3 bg-brand-lime text-slate-900 text-xs font-bold px-2 py-1 rounded-full">
                        From $<?= number_format($route->base_price) ?>
                    </div>
                    <!-- Route type badge -->
                    <div class="absolute top-3 left-3 bg-black/50 text-white text-xs font-semibold px-2 py-1 rounded-full capitalize">
                        <?= str_replace('_', ' ', $route->route_type) ?>
                    </div>
                </div>

                <div class="p-4">
                    <h3 class="font-bold text-slate-900 text-base mb-2 leading-snug group-hover:text-brand-lime transition">
                        <?= htmlspecialchars($route->title) ?>
                    </h3>
                    <div class="flex flex-wrap gap-2 mb-3">
                        <span class="<?= $difficultyColors[$route->difficulty] ?? 'bg-gray-100 text-gray-700' ?> text-xs font-semibold px-2 py-0.5 rounded-full capitalize">
                            <?= htmlspecialchars($route->difficulty) ?>
                        </span>
                        <span class="bg-slate-100 text-slate-700 text-xs font-semibold px-2 py-0.5 rounded-full">
                            <?= $route->duration_days ?> Days
                        </span>
                        <?php if (!empty($route->max_altitude_meters)): ?>
                        <span class="bg-purple-50 text-purple-700 text-xs font-semibold px-2 py-0.5 rounded-full">
                            <?= number_format($route->max_altitude_meters) ?>m
                        </span>
                        <?php endif; ?>
                    </div>
                    <p class="text-gray-500 text-xs line-clamp-2">
                        <?= htmlspecialchars(mb_strimwidth($route->short_description ?? '', 0, 100, '…')) ?>
                    </p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
