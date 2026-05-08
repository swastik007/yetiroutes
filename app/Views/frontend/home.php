<?php
$pageTitle = 'Home';
$metaDescription = 'Experience authentic Himalayan adventures with Yeti Routes. Expert guides, small groups, fair prices. Trek Everest, Annapurna, Langtang and more.';
ob_start();
?>
<style>
    .text-outline {
        -webkit-text-stroke: 1px rgba(0, 0, 0, 0.05);
        color: transparent;
    }

    .tech-grid {
        background-size: 40px 40px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0.05) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(0, 0, 0, 0.05) 1px, transparent 1px);
    }
</style>
<!-- Hero Section -->
<section class="relative w-full h-screen flex flex-col justify-center items-center text-center px-4">

    <!-- Background Video with Overlay -->
    <div class="absolute inset-0 w-full h-full -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-black/20 z-10"></div>
        <video autoplay muted loop playsinline
            poster="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=2070"
            class="w-full h-full object-cover">
            <source src="https://videos.pexels.com/video-files/4125348/4125348-hd_1920_1080_25fps.mp4" type="video/mp4">
            <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?w=1920" alt="Himalayas">
        </video>
    </div>

    <!-- Hero Content -->
    <div class="relative z-20 flex flex-col items-center gap-10 mt-16 max-w-4xl mx-auto">

        <!-- Main Heading -->
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-medium leading-[1.1] tracking-tight">
            <?= $trans['home']['hero_title'] ?? 'Your Next Adventure <br> Starts Here' ?>
        </h1>

        <!-- CTA Buttons -->
        <div class="flex items-center gap-4">
            <a href="#featured-treks"
                class="bg-white text-black px-9 py-4 rounded-full font-medium text-lg hover:-translate-y-1 hover:shadow-lg transition transform duration-300">
                <?= $trans['home']['hero_cta'] ?? 'Book Your Trek' ?>
            </a>

            <a href="/contact"
                class="w-14 h-14 bg-brand-lime text-black rounded-full flex items-center justify-center text-xl hover:bg-[#bfff4f] hover:rotate-45 transition transform duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </a>
        </div>

        <!-- Trip Finder Form -->
        <div id="hero-form-container" class="w-full max-w-2xl mt-8">
            <form action="/treks" method="GET"
                class="bg-black/30 backdrop-blur-md border border-white/10 rounded-3xl p-6">
                <h3 class="text-xl font-semibold mb-4"><?= $trans['home']['find_trek'] ?? 'Find Your Perfect Trek' ?>
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <select name="region"
                        class="px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 text-white rounded-xl focus:ring-2 focus:ring-brand-lime focus:outline-none">
                        <option value="" class="text-gray-800">All Regions</option>
                        <option value="everest" class="text-gray-800">Everest Region</option>
                        <option value="annapurna" class="text-gray-800">Annapurna Region</option>
                        <option value="langtang" class="text-gray-800">Langtang Region</option>
                        <option value="manaslu" class="text-gray-800">Manaslu Region</option>
                    </select>

                    <select name="difficulty"
                        class="px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 text-white rounded-xl focus:ring-2 focus:ring-brand-lime focus:outline-none">
                        <option value="" class="text-gray-800">All Levels</option>
                        <option value="easy" class="text-gray-800">Easy</option>
                        <option value="moderate" class="text-gray-800">Moderate</option>
                        <option value="challenging" class="text-gray-800">Challenging</option>
                        <option value="extreme" class="text-gray-800">Extreme</option>
                    </select>
                </div>

                <button type="submit"
                    class="group w-full bg-brand-lime text-black px-6 py-4 rounded-xl font-semibold text-lg hover:bg-[#bfff4f] transition duration-300 flex items-center justify-center gap-2">
                    <i class="ri-search-line"></i> Search Treks
                    <i class="ri-arrow-right-line group-hover:translate-x-1 transition"></i>
                </button>
            </form>
        </div>

        <!-- Quick Stats -->
        <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-8 text-white/90">
            <div class="text-center">
                <div class="text-4xl font-bold">1000+</div>
                <div class="text-sm text-white/70 mt-1">Happy Trekkers</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold">50+</div>
                <div class="text-sm text-white/70 mt-1">Trek Routes</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold">15+</div>
                <div class="text-sm text-white/70 mt-1">Expert Guides</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold">10</div>
                <div class="text-sm text-white/70 mt-1">Years Experience</div>
            </div>
        </div>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
        <i class="ri-arrow-down-s-line text-white text-3xl"></i>
    </div>
</section>
<!-- About yeti Block Section -->
<section class="bg-slate-100 text-slate-800 antialiased">

    <div class="flex flex-col gap-24 py-24 overflow-hidden">

        <section class="relative container mx-auto px-4">
            <div
                class="absolute -top-20 -left-10 text-[200px] font-serif font-bold text-slate-200 select-none z-0 hidden lg:block">
                01</div>

            <div class="flex flex-wrap lg:flex-nowrap items-center relative z-10">
                <div class="w-full lg:w-1/2 lg:pr-20 mb-12 lg:mb-0">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="h-px w-12 bg-brand-lime"></div>
                        <span class="uppercase tracking-[0.2em] text-xs font-bold text-slate-500">Our Origins</span>
                    </div>
                    <h2 class="font-serif text-5xl md:text-6xl font-medium leading-tight mb-8 text-slate-900">
                        Born on the <span class="italic text-brand-lime">Trails</span>,<br>Built on Trust.
                    </h2>
                    <p class="text-slate-600 text-lg leading-relaxed mb-8 font-light">
                        Yeti Routes wasn't founded in a boardroom; it was forged on the Thorong La Pass. Since 2014,
                        we've moved beyond being a tour operator to becoming your local partner. We don't just show you
                        the mountains; we share our home.
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="pl-4 border-l-2 border-brand-lime">
                            <p class="text-sm text-slate-500 italic">"We handle the complex logistics so you can focus
                                on
                                the transformation."</p>
                        </div>
                    </div>
                    <a href="/about"
                        class="mt-10 group flex items-center gap-3 text-sm font-bold uppercase tracking-widest hover:text-brand-lime transition-colors text-slate-900">
                        Read Our Story
                        <i class="ri-arrow-right-line text-lg transition-transform group-hover:translate-x-2"></i>
                    </a>
                </div>

                <div class="w-full lg:w-1/2 relative">
                    <div
                        class="absolute top-0 right-0 w-3/4 h-full bg-white rounded-tr-[100px] -z-10 transform translate-x-8 -translate-y-8 shadow-sm">
                    </div>
                    <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?q=80&w=1350&auto=format&fit=crop"
                        class="w-full h-[500px] object-cover rounded-tl-[100px] rounded-br-[100px] shadow-2xl transition-all duration-700 hover:scale-[1.02]"
                        alt="Team Planning">

                    <div
                        class="absolute bottom-12 -left-8 bg-white p-6 shadow-xl rounded-lg border-l-4 border-brand-lime hidden md:block">
                        <div class="text-4xl font-serif font-bold text-slate-900">10+</div>
                        <div class="text-xs uppercase tracking-widest text-slate-500 mt-1">Years of<br>Excellence</div>
                    </div>
                    <div class="text-4xl font-serif font-bold text-slate-900">10+</div>
                    <div class="text-xs uppercase tracking-widest text-slate-500 mt-1">Years of<br>Excellence</div>
                </div>
            </div>
        
    </section>
    <section class="relative container mx-auto px-4">
    <div
        class="absolute -top-20 -right-10 text-[200px] font-serif font-bold text-slate-200 select-none z-0 hidden lg:block">
        02</div>

    <div class="flex flex-wrap lg:flex-nowrap flex-row-reverse items-center relative z-10">
        <div class="w-full lg:w-1/2 lg:pl-20 mb-12 lg:mb-0">
            <div class="flex items-center gap-4 mb-6">
                <div class="h-px w-12 bg-brand-lime"></div>
                <span class="uppercase tracking-[0.2em] text-xs font-bold text-slate-500">The Team</span>
            </div>
            <h2 class="font-serif text-5xl md:text-6xl font-medium leading-tight mb-8 text-slate-900">
                More Than Guides.<br>Himalayan <span class="italic text-brand-lime">Guardians.</span>
            </h2>
            <p class="text-slate-600 text-lg leading-relaxed mb-8 font-light">
                Our Sherpa team brings decades of high-altitude intuition. They are storytellers, safety
                experts, and cultural ambassadors. When you trek with Yeti Routes, you aren't just following a
                map; you are walking with legends who know every stone and storm.
            </p>

            <div class="grid grid-cols-2 gap-6 mb-8">
                <div class="flex items-start gap-3">
                    <div class="bg-brand-lime/10 p-2 rounded-full text-brand-lime"><i class="ri-medal-line"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-slate-900">Gov. Certified</h4>
                        <p class="text-xs text-slate-500">NMA & TAAN Licensed</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="bg-brand-lime/10 p-2 rounded-full text-brand-lime"><i class="ri-heart-pulse-line"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-slate-900">First Aid Experts</h4>
                        <p class="text-xs text-slate-500">High Altitude Trained</p>
                    </div>
                </div>
            </div>

            <a href="/guides"
                class="group inline-block bg-slate-900 text-white px-8 py-4 text-xs font-bold uppercase tracking-widest hover:bg-brand-lime hover:text-slate-900 transition-all duration-300">
                Meet The Legends
            </a>
        </div>

        <div class="w-full lg:w-1/2 relative group">
            <div
                class="absolute inset-0 bg-brand-lime/20 transform rotate-3 rounded-3xl transition-transform group-hover:rotate-6">
            </div>
            <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?q=80&w=2072&auto=format&fit=crop"
                class="relative w-full h-[600px] object-cover rounded-3xl shadow-2xl" alt="Sherpa Guide">

            <div
                class="absolute bottom-8 right-8 bg-white/90 backdrop-blur-md border border-white/20 p-4 rounded-xl text-slate-900 w-64 shadow-lg">
                <div class="flex items-center gap-3 mb-2">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=150&auto=format&fit=crop"
                        class="w-10 h-10 rounded-full border-2 border-brand-lime object-cover">
                    <div>
                        <div class="font-bold text-sm">Pasang Sherpa</div>
                        <div class="text-[10px] uppercase tracking-wider text-slate-500">Head Guide</div>
                    </div>
                </div>
                <p class="text-xs text-slate-600 italic">"The mountain does not let you conquer it; it lets you
                    visit."</p>
            </div>
        </div>
    </div>
</section>

<section class="relative container mx-auto px-4">
    <div
        class="absolute -top-20 -left-10 text-[200px] font-serif font-bold text-slate-200 select-none z-0 hidden lg:block">
        03</div>

    <div
        class="bg-white rounded-[3rem] p-8 md:p-16 relative overflow-hidden tech-grid border border-slate-200 shadow-lg">

        <div class="flex flex-wrap lg:flex-nowrap items-center relative z-10">
            <div class="w-full lg:w-1/2 lg:pr-12 mb-12 lg:mb-0">
                <div
                    class="inline-block bg-brand-lime text-slate-900 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest mb-6">
                    Yeti Digital™
                </div>
                <h2 class="font-serif text-4xl md:text-5xl font-medium leading-tight mb-6 text-slate-900">
                    Ancient Trails,<br>Modern <span class="italic text-brand-lime">Intelligence.</span>
                </h2>
                <p class="text-slate-600 leading-relaxed mb-8">
                    We are bridging the gap in the Nepal travel industry. Say goodbye to messy paper trails and
                    cash-only confusion. Yeti Routes integrates <strong>AI-driven personalization</strong> with
                    real-time logistics.
                </p>

                <div class="space-y-4 mb-8">
                    <div
                        class="flex items-center gap-4 bg-slate-50 p-4 rounded-xl shadow-sm border border-slate-100 hover:border-brand-lime transition-colors">
                        <div class="bg-white p-2 rounded-lg shadow-sm"><i
                                class="ri-brain-line text-xl text-brand-lime"></i></div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-900">AI Itinerary Builder</h4>
                            <p class="text-xs text-slate-500">Custom trips based on your fitness & interests</p>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-4 bg-slate-50 p-4 rounded-xl shadow-sm border border-slate-100 hover:border-brand-lime transition-colors">
                        <div class="bg-white p-2 rounded-lg shadow-sm"><i
                                class="ri-smartphone-line text-xl text-brand-lime"></i></div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-900">Digital Dashboard</h4>
                            <p class="text-xs text-slate-500">Permits, maps, and bookings in one pocket</p>
                        </div>
                    </div>
                </div>

                <a href="/#hero-form-container"
                    class="text-sm font-bold uppercase tracking-widest border-b-2 border-slate-900 pb-1 hover:text-brand-lime hover:border-brand-lime transition-colors text-slate-900">
                    Try The Trip Planner
                </a>
            </div>

            <div class="w-full lg:w-1/2 relative flex justify-center items-center">
                <div class="relative w-full max-w-md transform rotate-1 transition-transform hover:rotate-0">
                    <img src="https://images.unsplash.com/photo-1555421689-491a97ff2040?q=80&w=800&auto=format&fit=crop"
                        alt="Yeti Routes Trip Planner App"
                        class="w-full h-auto rounded-2xl shadow-2xl border border-slate-100">
                </div>
            </div>
</section>
</div>
</section>



<!-- Features Treks Section -->
<section id="featured-treks" class="py-24 bg-gradient-to-b from-black to-zinc-900 relative text-white">
    <div class="container mx-auto px-4 md:px-6">

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div>
                <span class="text-brand-lime uppercase tracking-widest text-sm font-semibold mb-2 block">
                    <?= $trans['home']['featured']['subtitle'] ?? 'Handpicked Adventures' ?>
                </span>
                <h2 class="text-4xl md:text-5xl font-serif">
                    <?= $trans['home']['featured']['title'] ?? 'Featured Treks' ?>
                </h2>
            </div>
            <a href="/treks"
                class="group flex items-center gap-2 text-white hover:text-brand-lime transition-colors pb-1 border-b border-transparent hover:border-brand-lime">
                <?= $trans['home']['featured']['view_all_dest'] ?? 'View All Destinations' ?>
                <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
            </a>
        </div>

        <!-- Scrollable Carousel Wrapper -->
        <div class="relative mb-12">
            <!-- Navigation Buttons -->
            <button id="featured-scroll-left"
                class="absolute -left-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-brand-lime text-black rounded-full flex items-center justify-center hover:bg-[#bfff4f] transition shadow-xl opacity-0 pointer-events-none lg:opacity-100 lg:pointer-events-auto">
                <i class="ri-arrow-left-s-line text-2xl"></i>
            </button>
            <button id="featured-scroll-right"
                class="absolute -right-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-brand-lime text-black rounded-full flex items-center justify-center hover:bg-[#bfff4f] transition shadow-xl opacity-0 pointer-events-none lg:opacity-100 lg:pointer-events-auto">
                <i class="ri-arrow-right-s-line text-2xl"></i>
            </button>

            <!-- Scrollable Container -->
            <div id="featured-carousel" class="overflow-x-auto scrollbar-hide scroll-smooth pb-4"
                style="scrollbar-width: none; -ms-overflow-style: none;">
                <div class="flex gap-6 lg:gap-8" style="width: max-content;">

                    <?php if (isset($featured_routes) && !empty($featured_routes)): ?>
                        <?php foreach ($featured_routes as $route): ?>
                            <!-- Trek Card -->
                            <div
                                class="group relative bg-white/5 border border-white/5 rounded-3xl overflow-hidden hover:border-white/20 transition-all duration-500 hover:-translate-y-2 flex-shrink-0 w-[320px] lg:w-[380px]">
                                <div class="h-72 overflow-hidden relative">
                                    <?php
                                    // Fallback images based on location name
                                    $fallbackImages = [
                                        'everest' => 'photo-1533130061792-649d45df8db5',
                                        'annapurna' => 'photo-1544735716-392fe2489ffa',
                                        'langtang' => 'photo-1623492701902-47dc207df5b5',
                                        'manaslu' => 'photo-1589182373726-e4f658ab50f0',
                                        'mustang' => 'photo-1526772662000-3f88f107f5d8',
                                        'default' => 'photo-1464822759023-fed622ff2c3b'
                                    ];

                                    $locationKey = strtolower($route->location_name ?? 'default');
                                    // fuzzy match check
                                    $imageId = $fallbackImages['default'];
                                    foreach ($fallbackImages as $key => $id) {
                                        if (str_contains($locationKey, $key)) {
                                            $imageId = $id;
                                            break;
                                        }
                                    }

                                    $imageUrl = "https://images.unsplash.com/{$imageId}?w=800&auto=format&fit=crop&q=80";
                                    ?>
                                    <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($route->title) ?>"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>

                                    <div class="absolute top-4 left-4 flex gap-2">
                                        <span
                                            class="text-xs font-bold px-3 py-1 bg-black/50 backdrop-blur-md rounded-full border border-white/10">
                                            <?= $trans['home']['featured']['badge'] ?? 'Featured' ?>
                                        </span>
                                        <?php if ($route->terrain_type ?? false): ?>
                                            <span
                                                class="text-xs font-bold px-3 py-1 bg-black/50 backdrop-blur-md rounded-full border border-white/10"><?= ucfirst(htmlspecialchars($route->terrain_type)) ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="absolute bottom-4 left-4 text-white">
                                        <div class="flex items-center gap-4 text-sm font-medium">
                                            <span class="flex items-center gap-1"><i class="ri-time-line text-brand-lime"></i>
                                                <?= htmlspecialchars($route->duration_days ?? 'N/A') ?> Days</span>
                                            <?php if ($route->max_altitude_meters ?? false): ?>
                                                <span class="flex items-center gap-1"><i
                                                        class="ri-mountain-line text-brand-lime"></i>
                                                    <?= number_format($route->max_altitude_meters) ?>m</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-6">
                                    <div class="flex justify-between items-start mb-4">
                                        <h3 class="text-2xl font-serif group-hover:text-brand-lime transition-colors">
                                            <?= htmlspecialchars($route->title) ?>
                                        </h3>
                                        <div class="text-right">
                                            <span class="block text-xs text-white/50">
                                                <?= $trans['home']['featured']['from'] ?? 'From' ?>
                                            </span>
                                            <span
                                                class="text-xl font-bold text-brand-lime">$<?= number_format($route->base_price ?? 0) ?></span>
                                        </div>
                                    </div>

                                    <div class="flex justify-between items-center border-t border-white/10 pt-4 mt-4">
                                        <?php
                                        $difficultyColors = [
                                            'easy' => 'bg-green-500',
                                            'moderate' => 'bg-yellow-500',
                                            'challenging' => 'bg-orange-500',
                                            'extreme' => 'bg-red-500'
                                        ];
                                        $difficulty = strtolower($route->difficulty ?? 'moderate');
                                        $color = $difficultyColors[$difficulty] ?? 'bg-gray-500';
                                        ?>
                                        <span class="text-sm text-white/60 flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full <?= $color ?>"></span> <?= ucfirst($difficulty) ?>
                                        </span>
                                        <a href="/trek?slug=<?= htmlspecialchars($route->slug) ?>"
                                            class="text-sm font-bold uppercase tracking-wide flex items-center gap-2 group/btn">
                                            <?= $trans['home']['featured']['explore'] ?? 'Explore' ?>
                                            <span
                                                class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center group-hover/btn:bg-brand-lime group-hover/btn:text-black transition-colors">
                                                <i class="ri-arrow-right-up-line"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="w-full text-center py-12">
                            <p class="text-gray-400 text-lg">No featured treks available at the moment. Check back soon!</p>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <!-- Slider JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const carousel = document.getElementById('featured-carousel');
                const scrollLeft = document.getElementById('featured-scroll-left');
                const scrollRight = document.getElementById('featured-scroll-right');

                if (carousel && scrollLeft && scrollRight) {
                    const scrollAmount = window.innerWidth >= 1024 ? 1200 : 700;

                    scrollRight.addEventListener('click', () => {
                        carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                    });

                    scrollLeft.addEventListener('click', () => {
                        carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                    });

                    function updateButtons() {
                        const maxScroll = carousel.scrollWidth - carousel.clientWidth;

                        if (carousel.scrollLeft <= 0) {
                            scrollLeft.style.opacity = '0.5';
                            scrollLeft.style.pointerEvents = 'none';
                        } else {
                            scrollLeft.style.opacity = '1';
                            scrollLeft.style.pointerEvents = 'auto';
                        }

                        if (carousel.scrollLeft >= maxScroll - 10) {
                            scrollRight.style.opacity = '0.5';
                            scrollRight.style.pointerEvents = 'none';
                        } else {
                            scrollRight.style.opacity = '1';
                            scrollRight.style.pointerEvents = 'auto';
                        }
                    }

                    carousel.addEventListener('scroll', updateButtons);
                    updateButtons();
                }
            });
        </script>

        <style>
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }

            @media (max-width: 1023px) {
                #featured-carousel {
                    scroll-snap-type: x mandatory;
                }

                #featured-carousel>div>div {
                    scroll-snap-align: start;
                }
            }
        </style>
    </div>

    <!-- Decorative Glow -->
    <div class="absolute top-1/4 right-0 w-96 h-96 bg-brand-lime/10 rounded-full blur-[128px] pointer-events-none">
    </div>
</section>
<!-- Most Popular Tours Section -->
<section class="py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-4">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div class="max-w-2xl">
                <div class="flex items-center gap-2 mb-3">
                    <span class="w-8 h-[2px] bg-brand-lime"></span>
                    <span class="text-brand-lime font-bold text-sm uppercase tracking-[0.2em]">Top Rated
                        Experiences</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 leading-tight mb-4">
                    Popular Tours in Nepal
                </h2>
                <p class="text-lg text-slate-600">
                    Handpicked itineraries that offer the perfect blend of adventure, culture, and breathtaking scenery.
                    These are the journeys our travelers love the most.
                </p>
            </div>

            <div class="flex gap-3">
                <button id="tours-scroll-left"
                    class="w-12 h-12 rounded-full border border-slate-200 flex items-center justify-center hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all duration-300 group">
                    <i class="ri-arrow-left-line text-xl group-hover:-translate-x-1 transition-transform"></i>
                </button>
                <button id="tours-scroll-right"
                    class="w-12 h-12 rounded-full border border-slate-200 flex items-center justify-center hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all duration-300 group">
                    <i class="ri-arrow-right-line text-xl group-hover:translate-x-1 transition-transform"></i>
                </button>
            </div>
        </div>

        <div class="relative -mx-4 px-4 md:mx-0 md:px-0">
            <div id="tours-carousel" class="overflow-x-auto scrollbar-hide scroll-smooth pb-12"
                style="scrollbar-width: none; -ms-overflow-style: none;">
                <div class="flex gap-6" style="width: max-content;">

                    <?php if (isset($tour_routes) && !empty($tour_routes)): ?>
                        <?php foreach ($tour_routes as $tour): ?>

                            <?php
                            // Logic setup
                            $tourImages = [
                                'everest' => 'photo-1544735716-392fe2489ffa',
                                'annapurna' => 'photo-1590416972823-74d3d4999719',
                                'langtang' => 'photo-1625505826533-5c80aca7d157',
                                'manaslu' => 'photo-1464822759023-fed622ff2c3b',
                                'mustang' => 'photo-1526487999127-d04b39a38f6c',
                                'chitwan' => 'photo-1579549392258-005d5d36e2f1',
                                'default' => 'photo-1506905925346-21bda4d32df4'
                            ];
                            $locationKey = strtolower($tour->location_name ?? 'default');
                            $imageId = $tourImages[$locationKey] ?? $tourImages['default'];
                            $imageUrl = "https://images.unsplash.com/{$imageId}?w=600&q=80&fit=crop";

                            $isDayTrip = ($tour->route_type === 'day_trip');
                            $badgeText = $isDayTrip ? 'Day Trip' : ucfirst($tour->route_type);
                            $badgeClass = $isDayTrip ? 'bg-orange-500' : 'bg-brand-lime';
                            ?>

                            <div
                                class="group relative h-[500px] w-[300px] md:w-[350px] flex-shrink-0 rounded-3xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-shadow duration-500 snap-center">

                                <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($tour->title) ?>"
                                    class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">

                                <div class="absolute top-5 right-5 z-20">
                                    <span
                                        class="<?= $badgeClass ?> text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg">
                                        <?= htmlspecialchars($badgeText) ?>
                                    </span>
                                </div>

                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-500">
                                </div>

                                <div class="absolute bottom-0 left-0 w-full p-8 flex flex-col justify-end h-full">

                                    <div
                                        class="transform translate-y-12 group-hover:translate-y-0 transition-transform duration-500 ease-out">

                                        <h3 class="text-2xl font-bold text-white leading-tight mb-2 font-serif">
                                            <?= htmlspecialchars($tour->title) ?>
                                        </h3>

                                        <div class="flex items-center gap-4 text-white/90 text-sm font-medium mb-4">
                                            <div class="flex items-center gap-1.5">
                                                <i class="ri-time-line text-brand-lime"></i>
                                                <span><?= htmlspecialchars($tour->duration_days ?? '1') ?> Days</span>
                                            </div>
                                            <div class="w-1 h-1 bg-white/50 rounded-full"></div>
                                            <div class="flex items-center gap-1.5">
                                                <i class="ri-money-dollar-circle-line text-brand-lime"></i>
                                                <span>From $<?= number_format($tour->base_price ?? 0) ?></span>
                                            </div>
                                        </div>

                                        <div
                                            class="opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                            <div class="h-px w-full bg-white/20 mb-4"></div>
                                            <p class="text-gray-300 text-sm leading-relaxed line-clamp-3 mb-6">
                                                <?= htmlspecialchars($tour->short_description ?? 'Embark on an unforgettable journey through the heart of the Himalayas.') ?>
                                            </p>

                                            <a href="/trek?slug=<?= htmlspecialchars($tour->slug) ?>"
                                                class="inline-flex items-center gap-2 text-brand-lime font-bold uppercase text-xs tracking-widest hover:text-white transition-colors">
                                                View Details <i class="ri-arrow-right-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="w-full text-center py-12 px-4 border-2 border-dashed border-slate-200 rounded-3xl">
                            <i class="ri-map-pin-time-line text-4xl text-slate-300 mb-2"></i>
                            <p class="text-slate-500">No tours available at the moment.</p>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carousel = document.getElementById('tours-carousel');
            const scrollLeft = document.getElementById('tours-scroll-left');
            const scrollRight = document.getElementById('tours-scroll-right');

            if (carousel && scrollLeft && scrollRight) {
                const scrollAmount = 370; // Adjusted for card width + gap

                scrollRight.addEventListener('click', () => {
                    carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                });

                scrollLeft.addEventListener('click', () => {
                    carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                });

                // Optional: Hide buttons if content fits
                function checkScroll() {
                    if (carousel.scrollWidth <= carousel.clientWidth) {
                        scrollLeft.style.display = 'none';
                        scrollRight.style.display = 'none';
                    }
                }
                checkScroll();
            }
        });
    </script>

    <style>
        #tours-carousel::-webkit-scrollbar {
            display: none;
        }

        @media (max-width: 768px) {
            #tours-carousel {
                scroll-snap-type: x mandatory;
            }

            #tours-carousel>div>div {
                scroll-snap-align: center;
            }
        }
    </style>
</section>
<!-- Dream Vacation Section -->
<section class="relative py-24 bg-yellow-50 overflow-hidden">
    <!-- Dotted Background Pattern -->

    <div
        class="container mx-auto px-4 relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 bg-transparent rounded-3xl">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12 items-end">
            <div>
                <h2 class="text-4xl md:text-5xl font-serif font-bold text-gray-900 leading-tight">
                    Find your dream vacation in...
                </h2>
                <div class="h-1 w-20 bg-brand-lime mt-6 mb-2"></div>
            </div>

            <div>
                <p class="text-gray-600 text-lg leading-relaxed">
                    We bring the Himalayas alive with tours that look beyond the highlights: revealing hidden trails,
                    spiritual encounters, and jungle safaris that build into multi-faceted and compelling travel
                    experiences in the heart of Nepal.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $regions = [
                ['name' => 'Everest Region', 'treks' => '15+ Treks', 'img' => 'photo-1506905925346-21bda4d32df4', 'url' => '/treks/everest'],
                ['name' => 'Annapurna Region', 'treks' => '20+ Treks', 'img' => 'photo-1544735716-392fe2489ffa', 'url' => '/treks/annapurna'],
                ['name' => 'Langtang Region', 'treks' => '10+ Treks', 'img' => 'photo-1486870591958-9b9d0d1dda99', 'url' => '/treks/langtang'],
                ['name' => 'Manaslu Region', 'treks' => '8+ Treks', 'img' => 'photo-1519904981063-b0cf448d479e', 'url' => '/treks/manaslu'],
            ];
            foreach ($regions as $region): ?>
                <a href="<?= $region['url'] ?>" class="group relative h-80 rounded-2xl overflow-hidden">
                    <img src="https://images.unsplash.com/<?= $region['img'] ?>?w=400" alt="<?= $region['name'] ?>"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-2xl font-bold mb-2"><?= $region['name'] ?></h3>
                        <p class="text-gray-300 mb-4"><?= $region['treks'] ?> Available</p>
                        <div class="flex items-center gap-2 text-brand-lime font-semibold">
                            Explore Region
                            <i class="ri-arrow-right-line group-hover:translate-x-2 transition"></i>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Activities -->
<section class="relative py-24 bg-slate-50 overflow-hidden" id="activities-section">
    <div class="absolute inset-0 opacity-[0.03]"
        style="background-image: radial-gradient(circle, #000 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div
        class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-lime/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none">
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-wrap lg:flex-nowrap gap-12 xl:gap-16">

            <div class="w-full lg:w-4/12 xl:w-3/12 hidden lg:block">
                <div class="sticky top-5">
                    <div class="relative rounded-[2rem] overflow-hidden shadow-2xl group h-[600px]">
                        <img src="https://images.unsplash.com/photo-1501555088652-021faa106b9b?w=800&q=80"
                            alt="Trekker in the Himalayas"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent">
                        </div>

                        <div
                            class="absolute top-6 right-6 bg-white/95 backdrop-blur-md rounded-xl p-3 shadow-lg border border-white/20">
                            <div class="flex items-center gap-2">
                                <i class="ri-star-fill text-brand-lime text-sm"></i>
                                <span class="text-sm font-bold text-slate-900">4.9/5</span>
                            </div>
                        </div>

                        <div class="absolute bottom-8 left-8 text-white max-w-[80%]">
                            <p class="font-serif italic text-2xl">"The mountains are calling..."</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-8/12 xl:w-9/12">

                <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-6 h-[2px] bg-brand-lime"></span>
                            <span class="text-brand-lime font-bold text-xs uppercase tracking-[0.2em]">Curated
                                Adventures</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 leading-tight">
                            Explore Activities
                        </h2>
                        <p class="leading-relaxed text-gray-800">Lifelong Memories<br />
                            Just A Few Days Away<br />
                            Experience the thrill of the Himalayas with our expertly curated adventures. From
                            challenging treks to serene nature walks, we offer unforgettable journeys that create
                            memories to last a lifetime.
                        <p>
                    </div>
                    <a href="/activities"
                        class="hidden md:flex items-center gap-2 text-xs font-bold uppercase tracking-widest hover:text-brand-lime transition-colors">
                        View All <i class="ri-arrow-right-line"></i>
                    </a>
                </div>

                <?php
                // Logic (Same as before, simplified for display)
                $fallbackImages = [
                    'meditation' => 'photo-1506126613408-eca07ce68773',
                    'cycling' => 'photo-1559080509-e7e68ef8bd42',
                    'hiking' => 'photo-1551632811-561732d1e306',
                    'safari' => 'photo-1579549392258-005d5d36e2f1',
                    'hike' => 'photo-1464822759023-fed622ff2c3b',
                    'bungee' => 'photo-1519904981063-b0cf448d479e',
                    'balloon' => 'photo-1506905925346-21bda4d32df4',
                    'flight' => 'photo-1544735716-392fe2489ffa',
                    'rafting' => 'photo-1530866495561-507c9faab2ed',
                    'trek' => 'photo-1501555088652-021faa106b9b',
                    'default' => 'photo-1506905925346-21bda4d32df4'
                ];
                ?>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                    <?php if (isset($activities) && !empty($activities)): ?>
                        <?php foreach ($activities as $index => $activity):
                            $slugKey = strtolower(explode('-', $activity->slug)[0]);
                            $imageId = $fallbackImages[$slugKey] ?? $fallbackImages['default'];
                            $imageUrl = "https://images.unsplash.com/{$imageId}?w=400&q=80&auto=format&fit=crop";
                            ?>

                            <a href="/activity?slug=<?= htmlspecialchars($activity->slug) ?>"
                                class="group relative block h-56 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500">

                                <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($activity->title) ?>"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity">
                                </div>

                                <div
                                    class="absolute top-3 right-3 w-8 h-8 bg-white/20 backdrop-blur-md border border-white/20 rounded-full flex items-center justify-center group-hover:bg-brand-lime group-hover:border-brand-lime transition-colors duration-300">
                                    <i class="<?= $activity->icon_class ?? 'ri-compass-3-line' ?> text-white text-sm"></i>
                                </div>

                                <div
                                    class="absolute bottom-0 left-0 w-full p-4 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                    <span
                                        class="text-[10px] font-bold text-brand-lime uppercase tracking-widest mb-1 block">Activity</span>
                                    <h3
                                        class="text-lg font-bold text-white leading-tight mb-1 group-hover:text-brand-lime transition-colors">
                                        <?= htmlspecialchars($activity->title) ?>
                                    </h3>
                                    <p
                                        class="text-gray-300 text-xs line-clamp-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-75">
                                        <?= htmlspecialchars($activity->short_description) ?>
                                    </p>
                                </div>
                            </a>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-full py-12 text-center border border-dashed border-slate-200 rounded-2xl">
                            <p class="text-slate-500 text-sm">No activities found.</p>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="mt-8 text-center md:hidden">
                    <a href="/activities"
                        class="inline-block text-xs font-bold uppercase tracking-widest border-b border-slate-900 pb-1">
                        View All Activities
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- Testimonials Section -->
<section class="py-16 bg-stone-100 text-stone-800 overflow-hidden">
    <div class="container mx-auto px-4">

        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 tracking-tight text-stone-900">
                Trusted by Travelers Worldwide
            </h2>

            <div
                class="inline-flex flex-wrap justify-center items-center gap-4 md:gap-8 bg-white/60 backdrop-blur-md px-6 py-3 rounded-full border border-stone-200 shadow-sm">

                <a href="#" class="flex items-center gap-2 group transition-opacity hover:opacity-70">
                    <div class="bg-white p-1.5 rounded-full shadow-sm">
                        <i class="ri-google-fill text-yellow-500 text-lg"></i>
                    </div>
                    <div class="text-left leading-tight">
                        <div class="font-bold text-sm">4.9/5</div>
                        <div class="text-[10px] text-gray-500 uppercase tracking-wide">Google</div>
                    </div>
                </a>

                <div class="w-px h-8 bg-stone-300"></div>

                <a href="#" class="flex items-center gap-2 group transition-opacity hover:opacity-70">
                    <div class="bg-white p-1.5 rounded-full shadow-sm">
                        <i class="ri-treasure-map-line text-green-500 text-lg"></i>
                    </div>
                    <div class="text-left leading-tight">
                        <div class="font-bold text-sm">5.0/5</div>
                        <div class="text-[10px] text-gray-500 uppercase tracking-wide">TripAdvisor</div>
                    </div>
                </a>

                <div class="w-px h-8 bg-stone-300 hidden md:block"></div>

                <div class="flex items-center gap-2 hidden md:flex">
                    <div class="bg-white p-1.5 rounded-full shadow-sm">
                        <i class="ri-shield-check-line text-lime-600 text-lg"></i>
                    </div>
                    <div class="text-left leading-tight">
                        <div class="font-bold text-sm">Lic. 1234/075</div>
                        <div class="text-[10px] text-gray-500 uppercase tracking-wide">Gov. Certified</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $reviews = [
                ['text' => 'Best trek of my life! The guides were knowledgeable, friendly, and always put safety first. Can\'t wait to come back!', 'name' => 'Sarah M.', 'country' => 'Australia', 'img' => 1],
                ['text' => 'Incredible experience! Small group, authentic local interactions, and fair pricing. Highly recommend Yeti Routes!', 'name' => 'John D.', 'country' => 'USA', 'img' => 12],
                ['text' => 'Professional, organized, and genuinely caring. The team went above and beyond to make our trek amazing!', 'name' => 'Emma L.', 'country' => 'UK', 'img' => 5],
            ];
            foreach ($reviews as $review): ?>

                <div
                    class="group bg-white p-8 rounded-2xl border border-stone-200 shadow-sm hover:shadow-xl transition-all duration-300 ease-out hover:-translate-y-1 relative">

                    <div
                        class="absolute top-6 right-8 text-6xl text-lime-100 font-serif leading-none select-none group-hover:text-lime-200 transition-colors">
                        &rdquo;
                    </div>

                    <div class="flex gap-1 mb-4 text-yellow-400 text-sm">
                        <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i
                            class="ri-star-fill"></i><i class="ri-star-fill"></i>
                    </div>

                    <p class="text-stone-600 mb-6 leading-relaxed relative z-10">
                        <?= $review['text'] ?>
                    </p>

                    <div class="flex items-center border-t border-stone-100 pt-4 mt-auto">
                        <img src="https://i.pravatar.cc/150?img=<?= $review['img'] ?>" alt="<?= $review['name'] ?>"
                            class="w-10 h-10 rounded-full mr-3 ring-2 ring-stone-100 group-hover:ring-lime-400 transition-all">
                        <div>
                            <div class="font-bold text-stone-900 text-sm">
                                <?= $review['name'] ?>
                            </div>
                            <div class="text-xs text-stone-400 font-medium uppercase tracking-wider">
                                <?= $review['country'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-10">
            <a href="#"
                class="inline-flex items-center gap-2 text-stone-500 hover:text-lime-600 font-medium text-sm transition-colors group">
                Read all 500+ reviews on Google
                <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</section>
<!-- Final CTA Section -->
<section class="py-24 bg-brand-lime text-black">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl md:text-6xl font-bold mb-6">Ready for Your Himalayan Adventure?</h2>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
            Let's plan the trek of a lifetime. Contact us today for a free consultation!
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="/contact"
                class="inline-flex items-center gap-2 bg-black text-white hover:bg-slate-800 px-8 py-4 rounded-full text-lg font-semibold transition duration-300">
                <i class="ri-mail-line"></i> Contact Us
            </a>
            <a href="https://wa.me/9779843183934"
                class="inline-flex items-center gap-2 bg-white text-black hover:bg-slate-100 px-8 py-4 rounded-full text-lg font-semibold transition duration-300">
                <i class="ri-whatsapp-line"></i> Chat on WhatsApp
            </a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/frontend.php';
?>