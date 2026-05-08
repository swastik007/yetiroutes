<?php
$pageTitle = '404 - Page Not Found';
$metaDescription = 'The page you are looking for could not be found. Explore our treks and tours or contact us for assistance.';
ob_start();
?>

<!-- 404 Error Page - SEO Optimized -->
<section class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white flex items-center justify-center px-6 py-20">
    <div class="max-w-4xl mx-auto text-center">
        <!-- 404 Illustration -->
        <div class="mb-12 relative">
            <h1 class="text-[150px] md:text-[200px] font-bold text-white/5 leading-none select-none">404</h1>
            <div class="absolute inset-0 flex items-center justify-center">
                <i class="fas fa-mountain text-6xl md:text-8xl text-brand-lime opacity-80"></i>
            </div>
        </div>

        <!-- Error Message -->
        <h2 class="text-4xl md:text-5xl font-bold mb-6">
            Oops! You've Wandered Off the Trail
        </h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
            The page you're looking for seems to have taken a different route.
            Don't worry—every great adventure has a few detours!
        </p>

        <!-- Search Box -->
        <div class="mb-12 max-w-xl mx-auto">
            <form action="/treks" method="GET" class="relative">
                <input
                    type="text"
                    name="search"
                    placeholder="Search for treks, tours, or activities..."
                    class="w-full px-6 py-4 pr-32 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-lime focus:border-transparent backdrop-blur-sm"
                    aria-label="Search"
                >
                <button
                    type="submit"
                    class="absolute right-2 top-1/2 -translate-y-1/2 px-6 py-2 bg-brand-lime text-slate-900 rounded-lg font-bold hover:bg-brand-lime/90 transition"
                >
                    Search
                </button>
            </form>
        </div>

        <!-- Quick Links -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Popular Treks -->
            <a href="/treks" class="group bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl p-8 transition-all hover:scale-105">
                <i class="fas fa-hiking text-4xl text-brand-lime mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Browse Treks</h3>
                <p class="text-gray-400 text-sm mb-4">Explore our collection of Himalayan adventures</p>
                <span class="text-brand-lime font-semibold group-hover:gap-2 inline-flex items-center gap-1 transition-all">
                    View All Treks <i class="fas fa-arrow-right text-sm"></i>
                </span>
            </a>

            <!-- Tours -->
            <a href="/tours" class="group bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl p-8 transition-all hover:scale-105">
                <i class="fas fa-compass text-4xl text-blue-400 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Explore Tours</h3>
                <p class="text-gray-400 text-sm mb-4">Discover guided tours and cultural experiences</p>
                <span class="text-blue-400 font-semibold group-hover:gap-2 inline-flex items-center gap-1 transition-all">
                    View All Tours <i class="fas fa-arrow-right text-sm"></i>
                </span>
            </a>

            <!-- Contact -->
            <a href="/contact" class="group bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl p-8 transition-all hover:scale-105">
                <i class="fas fa-headset text-4xl text-orange-400 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Get Help</h3>
                <p class="text-gray-400 text-sm mb-4">Our team is here to assist you</p>
                <span class="text-orange-400 font-semibold group-hover:gap-2 inline-flex items-center gap-1 transition-all">
                    Contact Us <i class="fas fa-arrow-right text-sm"></i>
                </span>
            </a>
        </div>

        <!-- Primary Actions -->
        <div class="flex flex-wrap gap-4 justify-center items-center">
            <a href="/" class="px-8 py-4 bg-brand-lime text-slate-900 rounded-xl font-bold text-lg hover:bg-brand-lime/90 transition-all hover:scale-105 inline-flex items-center gap-2">
                <i class="fas fa-home"></i> Back to Homepage
            </a>
            <a href="https://wa.me/9779843183934?text=Hi, I need help finding something on your website"
               class="px-8 py-4 bg-[#25D366] text-white rounded-xl font-bold text-lg hover:bg-[#20bd5a] transition-all hover:scale-105 inline-flex items-center gap-2">
                <i class="fab fa-whatsapp text-xl"></i> Chat on WhatsApp
            </a>
        </div>

        <!-- SEO-Friendly Error Information -->
        <div class="mt-16 pt-8 border-t border-white/10">
            <p class="text-sm text-gray-500">
                Error Code: 404 | Page Not Found |
                <a href="/" class="text-brand-lime hover:underline">Return to Homepage</a> |
                <a href="/sitemap.xml" class="text-brand-lime hover:underline">View Sitemap</a>
            </p>
        </div>
    </div>
</section>

<!-- Popular Treks Section for Internal Linking -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-slate-900 mb-8 text-center">You Might Be Interested In</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- These would be dynamically populated with popular treks -->
            <a href="/trek/everest-base-camp" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition">
                <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-600"></div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 group-hover:text-blue-600 transition">Everest Base Camp Trek</h3>
                    <p class="text-gray-600 text-sm mb-4">14 days of Himalayan adventure</p>
                    <span class="text-blue-600 font-semibold">Explore Trek →</span>
                </div>
            </a>

            <a href="/trek/annapurna-base-camp" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition">
                <div class="h-48 bg-gradient-to-br from-emerald-500 to-emerald-600"></div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 group-hover:text-emerald-600 transition">Annapurna Base Camp</h3>
                    <p class="text-gray-600 text-sm mb-4">10 days through stunning valleys</p>
                    <span class="text-emerald-600 font-semibold">Explore Trek →</span>
                </div>
            </a>

            <a href="/activities" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition">
                <div class="h-48 bg-gradient-to-br from-orange-500 to-orange-600"></div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 group-hover:text-orange-600 transition">Adventure Activities</h3>
                    <p class="text-gray-600 text-sm mb-4">Rafting, paragliding, and more</p>
                    <span class="text-orange-600 font-semibold">Explore Activities →</span>
                </div>
            </a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/frontend.php';
?>
