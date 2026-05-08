<?php
$pageTitle = $pageTitle ?? 'Explore Treks & Tours | Yeti Routes';
$metaDescription = $metaDescription ?? 'Browse our curated collection of Himalayan adventures. From Everest to Annapurna, find your perfect trek.';
ob_start();
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap');

    .font-heading {
        font-family: 'Playfair Display', serif;
    }

    .font-body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease-out;
    }

    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    /* Custom Checkbox */
    .custom-checkbox:checked {
        background-color: #0F172A;
        border-color: #0F172A;
    }
</style>

<section class="relative h-[40vh] flex items-center justify-center overflow-hidden font-body bg-slate-900">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?w=1920&q=80" alt="Trekking in Nepal"
            class="w-full h-full object-cover opacity-60">
    </div>

    <div class="relative z-10 text-center px-4 reveal active">
        <span class="text-blue-400 font-bold tracking-[0.2em] text-xs uppercase mb-4 block">Our Collection</span>
        <h1 class="font-heading text-5xl md:text-7xl font-bold text-white mb-4">Find Your Path</h1>
        <p class="text-lg text-gray-300 max-w-xl mx-auto font-light">
            Curated adventures for every level of explorer.
        </p>
    </div>
</section>

<section class="py-16 bg-gray-50 font-body min-h-screen">
    <div class="container mx-auto px-6">

        <div class="lg:hidden mb-8">
            <button onclick="document.getElementById('mobileFilters').classList.toggle('hidden')"
                class="w-full bg-white border border-gray-200 p-4 rounded-xl flex justify-between items-center shadow-sm font-bold text-slate-900">
                <span><i class="fas fa-sliders-h mr-2 text-blue-600"></i> Filter Treks</span>
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <aside class="lg:col-span-3">
                <div id="mobileFilters"
                    class="hidden lg:block sticky top-24 bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 transition-all">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-heading text-xl font-bold text-slate-900">Filters</h3>
                        <a href="/treks"
                            class="text-xs text-blue-600 font-bold uppercase tracking-wider hover:text-blue-800">Reset</a>
                    </div>

                    <form method="GET" action="/treks" id="filterForm">
                        <div class="mb-8">
                            <div class="relative">
                                <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                                    placeholder="Search (e.g. Everest)"
                                    class="w-full pl-10 pr-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-100 transition outline-none text-sm font-medium">
                                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>

                        <div class="mb-8">
                            <h4 class="font-bold text-sm text-slate-900 mb-4 uppercase tracking-wider">Region</h4>
                            <div class="space-y-3">
                                <?php
                                $regions = ['everest' => 'Everest', 'annapurna' => 'Annapurna', 'langtang' => 'Langtang', 'manaslu' => 'Manaslu'];
                                foreach ($regions as $val => $label):
                                    ?>
                                    <label class="flex items-center space-x-3 cursor-pointer group">
                                        <input type="radio" name="region" value="<?= $val ?>" <?= (($_GET['region'] ?? '') === $val) ? 'checked' : '' ?>
                                            class="form-radio h-5 w-5 text-slate-900 border-gray-300 focus:ring-slate-900 cursor-pointer">
                                        <span
                                            class="text-gray-600 group-hover:text-slate-900 transition-colors"><?= $label ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="mb-8">
                            <h4 class="font-bold text-sm text-slate-900 mb-4 uppercase tracking-wider">Difficulty</h4>
                            <div class="space-y-3">
                                <?php
                                $levels = ['easy' => 'Easy', 'moderate' => 'Moderate', 'challenging' => 'Challenging', 'extreme' => 'Extreme'];
                                foreach ($levels as $val => $label):
                                    ?>
                                    <label class="flex items-center space-x-3 cursor-pointer group">
                                        <input type="radio" name="difficulty" value="<?= $val ?>" <?= (($_GET['difficulty'] ?? '') === $val) ? 'checked' : '' ?>
                                            class="form-radio h-5 w-5 text-slate-900 border-gray-300 focus:ring-slate-900 cursor-pointer">
                                        <span
                                            class="text-gray-600 group-hover:text-slate-900 transition-colors"><?= $label ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="mb-8">
                            <h4 class="font-bold text-sm text-slate-900 mb-4 uppercase tracking-wider">Duration</h4>
                            <select name="duration"
                                class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-100 outline-none text-sm text-gray-600">
                                <option value="">Any Duration</option>
                                <option value="1-5" <?= (($_GET['duration'] ?? '') === '1-5') ? 'selected' : '' ?>>Short
                                    (1-5 Days)</option>
                                <option value="6-10" <?= (($_GET['duration'] ?? '') === '6-10') ? 'selected' : '' ?>>Medium
                                    (6-10 Days)</option>
                                <option value="11-15" <?= (($_GET['duration'] ?? '') === '11-15') ? 'selected' : '' ?>>Long
                                    (11-15 Days)</option>
                                <option value="15+" <?= (($_GET['duration'] ?? '') === '15+') ? 'selected' : '' ?>>Epic
                                    (15+ Days)</option>
                            </select>
                        </div>

                        <button type="submit"
                            class="w-full bg-slate-900 text-white py-3 rounded-xl font-bold hover:bg-blue-600 transition-colors shadow-lg shadow-blue-900/20">
                            Apply Filters
                        </button>
                    </form>
                </div>
            </aside>

            <div class="lg:col-span-9">

                <div class="flex flex-col sm:flex-row justify-between items-center mb-8 pb-4 border-b border-gray-200">
                    <p class="text-gray-500 text-sm mb-4 sm:mb-0">Showing <span
                            class="font-bold text-slate-900"><?= count($routes) ?></span> adventures</p>

                    <form method="GET" class="flex items-center gap-3">
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400">Sort By</span>
                        <select name="sort" onchange="this.form.submit()"
                            class="bg-transparent font-bold text-slate-900 border-none focus:ring-0 cursor-pointer hover:text-blue-600 transition-colors text-right pr-8">
                            <option value="popular">Popularity</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="duration">Duration</option>
                        </select>
                    </form>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php if (!empty($routes)): ?>
                        <?php foreach ($routes as $index => $route): ?>
                            <div
                                class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 relative reveal delay-<?= ($index % 3) * 100 ?>">

                                <div class="relative h-72 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?w=600&q=80"
                                        alt="<?= htmlspecialchars($route->title) ?>"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity">
                                    </div>

                                    <?php if ($route->is_featured): ?>
                                        <span
                                            class="absolute top-4 left-4 bg-yellow-400 text-black text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-lg">Featured</span>
                                    <?php endif; ?>

                                    <div
                                        class="absolute top-4 right-4 bg-white/20 backdrop-blur-md border border-white/20 text-white px-4 py-2 rounded-xl">
                                        <span class="block text-[10px] uppercase tracking-wide opacity-80">From</span>
                                        <span class="font-bold text-lg">$<?= number_format($route->base_price) ?></span>
                                    </div>

                                    <div
                                        class="absolute bottom-4 left-4 right-4 bg-white/10 backdrop-blur-md border border-white/10 rounded-xl p-3 flex justify-between items-center text-white">
                                        <div class="flex items-center gap-2">
                                            <i class="far fa-clock text-blue-300"></i>
                                            <span class="text-xs font-bold"><?= $route->duration_days ?> Days</span>
                                        </div>
                                        <div class="w-px h-4 bg-white/20"></div>
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-mountain text-green-300"></i>
                                            <span
                                                class="text-xs font-bold"><?= number_format($route->max_altitude_meters) ?>m</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-6">
                                    <div class="flex items-center gap-2 mb-3">
                                        <?php
                                        $diffColor = match ($route->difficulty) {
                                            'easy' => 'bg-green-100 text-green-700',
                                            'moderate' => 'bg-blue-100 text-blue-700',
                                            'challenging' => 'bg-orange-100 text-orange-700',
                                            'extreme' => 'bg-red-100 text-red-700',
                                            default => 'bg-gray-100 text-gray-700'
                                        };
                                        ?>
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider <?= $diffColor ?>">
                                            <?= $route->difficulty ?>
                                        </span>
                                        <span class="text-xs text-gray-400">|</span>
                                        <span
                                            class="text-xs text-gray-500 font-medium"><?= htmlspecialchars($route->location_name ?? 'Nepal') ?></span>
                                    </div>

                                    <h3
                                        class="text-xl font-heading font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors leading-tight">
                                        <a href="/trek/<?= htmlspecialchars($route->slug) ?>">
                                            <?= htmlspecialchars($route->title) ?>
                                        </a>
                                    </h3>

                                    <p class="text-sm text-gray-500 line-clamp-2 mb-6">
                                        <?= htmlspecialchars($route->short_description) ?>
                                    </p>

                                    <a href="/trek/<?= htmlspecialchars($route->slug) ?>"
                                        class="block w-full py-3 rounded-xl border-2 border-slate-900 text-slate-900 font-bold text-center text-sm group-hover:bg-slate-900 group-hover:text-white transition-all">
                                        View Itinerary
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-1 lg:col-span-3 text-center py-20 bg-white rounded-[3rem] shadow-sm">
                            <div class="text-6xl mb-6 opacity-20">🏔️</div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-2">No adventures found</h3>
                            <p class="text-gray-500 mb-8 max-w-md mx-auto">We couldn't find any treks matching those
                                specific filters. Try broadening your search.</p>
                            <a href="/treks"
                                class="px-8 py-3 bg-slate-900 text-white rounded-full font-bold hover:bg-blue-600 transition">Reset
                                All Filters</a>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (!empty($routes) && ($total_pages ?? 1) > 1): ?>
                    <div class="mt-16 flex justify-center">
                        <div class="flex gap-3 bg-white p-2 rounded-full shadow-sm">
                            <?php if ($current_page > 1): ?>
                                <a href="?page=<?= $current_page - 1 ?>"
                                    class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 text-gray-600 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition"><i
                                        class="fas fa-chevron-left"></i></a>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= min(3, $total_pages); $i++): ?>
                                <a href="?page=<?= $i ?>"
                                    class="w-10 h-10 flex items-center justify-center rounded-full text-sm font-bold transition <?= $i === $current_page ? 'bg-slate-900 text-white shadow-md' : 'text-gray-500 hover:bg-gray-100' ?>">
                                    <?= $i ?>
                                </a>
                            <?php endfor; ?>

                            <?php if ($total_pages > 3): ?>
                                <span class="w-10 h-10 flex items-center justify-center text-gray-400">...</span>
                            <?php endif; ?>

                            <?php if ($current_page < $total_pages): ?>
                                <a href="?page=<?= $current_page + 1 ?>"
                                    class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 text-gray-600 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition"><i
                                        class="fas fa-chevron-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-slate-900 text-white font-body text-center overflow-hidden relative">
    <div class="absolute top-0 left-0 w-64 h-64 bg-blue-600/20 rounded-full blur-[80px]"></div>
    <div class="absolute bottom-0 right-0 w-64 h-64 bg-purple-600/20 rounded-full blur-[80px]"></div>

    <div class="container mx-auto px-6 relative z-10 reveal">
        <h2 class="font-heading text-4xl font-bold mb-4">Still undecided?</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Our experts can craft a custom itinerary just for you.</p>
        <a href="/contact"
            class="inline-flex items-center gap-2 bg-white text-slate-900 px-8 py-4 rounded-full font-bold hover:bg-blue-50 transition transform hover:-translate-y-1">
            <i class="fas fa-magic"></i> Plan My Custom Trip
        </a>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('active');
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    });
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/frontend.php';
?>