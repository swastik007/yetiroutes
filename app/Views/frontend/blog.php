<?php
$pageTitle = 'The Himalayan Journal | Yeti Routes';
$metaDescription = 'Stories from the trail. Expert advice, cultural insights, and the latest news from the mountains of Nepal.';
ob_start();
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap');

    .font-heading { font-family: 'Playfair Display', serif; }
    .font-body { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    /* Scroll Reveal */
    .reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    /* Stagger Animation for Filters */
    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(20px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    .stagger-item {
        opacity: 0;
        animation: slideInRight 0.5s ease-out forwards;
    }
    
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<section class="relative h-[60vh] flex items-center justify-center overflow-hidden font-body">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1517021897933-0e03195bb585?w=1920&q=80" alt="Himalayan Journal" class="w-full h-full object-cover animate-[pulse_10s_ease-in-out_infinite] scale-105">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/70"></div>
    </div>
    
    <div class="container mx-auto px-6 text-center relative z-10 reveal active">
        <span class="inline-block px-4 py-1 border border-white/30 rounded-full bg-white/10 backdrop-blur-md text-white text-xs uppercase tracking-widest mb-6">Travel Blog</span>
        <h1 class="font-heading text-6xl md:text-8xl font-bold text-white mb-6 drop-shadow-lg">The Journal</h1>
        <p class="text-xl text-gray-200 max-w-2xl mx-auto font-light leading-relaxed">
            Tales of altitude, culture, and the pursuit of the sublime in the heart of the Himalayas.
        </p>
    </div>
</section>

<div class="sticky top-0 z-50 bg-white border-b border-gray-100 shadow-sm font-body transition-all duration-300">
    <div class="container mx-auto px-6">
        <nav class="flex items-center justify-start md:justify-center gap-4 overflow-x-auto no-scrollbar py-4">
            
            <a href="/blog" class="stagger-item delay-100 px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 hover:-translate-y-1 hover:shadow-md whitespace-nowrap <?= empty($_GET['category']) ? 'bg-slate-900 text-white shadow-lg' : 'bg-gray-50 text-gray-600 hover:bg-white hover:text-blue-600' ?>">
                All Stories
            </a>
            
            <a href="/blog?category=trekking-guides" class="stagger-item delay-200 px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 hover:-translate-y-1 hover:shadow-md whitespace-nowrap <?= ($_GET['category'] ?? '') === 'trekking-guides' ? 'bg-slate-900 text-white shadow-lg' : 'bg-gray-50 text-gray-600 hover:bg-white hover:text-blue-600' ?>">
                Guides
            </a>
            
            <a href="/blog?category=trip-reports" class="stagger-item delay-300 px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 hover:-translate-y-1 hover:shadow-md whitespace-nowrap <?= ($_GET['category'] ?? '') === 'trip-reports' ? 'bg-slate-900 text-white shadow-lg' : 'bg-gray-50 text-gray-600 hover:bg-white hover:text-blue-600' ?>">
                Trip Reports
            </a>
            
            <a href="/blog?category=culture" class="stagger-item delay-400 px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 hover:-translate-y-1 hover:shadow-md whitespace-nowrap <?= ($_GET['category'] ?? '') === 'culture' ? 'bg-slate-900 text-white shadow-lg' : 'bg-gray-50 text-gray-600 hover:bg-white hover:text-blue-600' ?>">
                Culture
            </a>
            
            <a href="/blog?category=gear-reviews" class="stagger-item delay-500 px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 hover:-translate-y-1 hover:shadow-md whitespace-nowrap <?= ($_GET['category'] ?? '') === 'gear-reviews' ? 'bg-slate-900 text-white shadow-lg' : 'bg-gray-50 text-gray-600 hover:bg-white hover:text-blue-600' ?>">
                Gear
            </a>

        </nav>
    </div>
</div>

<section class="py-16 font-body bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <div class="lg:col-span-8 space-y-16">
                
                <?php if (!empty($posts)): ?>
                    
                    <?php if (isset($posts[0]) && $current_page === 1): 
                        $featured = $posts[0];
                    ?>
                    <article class="group relative rounded-[2rem] overflow-hidden shadow-xl reveal bg-white">
                        <div class="aspect-[16/9] w-full overflow-hidden">
                            <img src="<?= $featured->featured_image ?? 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200&q=80' ?>" 
                                 alt="<?= htmlspecialchars($featured->title) ?>" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
                        
                        <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Featured</span>
                                <span class="text-white/80 text-sm font-medium"><i class="far fa-clock mr-1"></i> <?= $featured->read_time ?? 5 ?> min read</span>
                            </div>
                            <h2 class="text-3xl md:text-5xl font-heading font-bold text-white mb-4 leading-tight group-hover:text-blue-200 transition-colors">
                                <a href="/blog/article?slug=<?= htmlspecialchars($featured->slug) ?>">
                                    <?= htmlspecialchars($featured->title) ?>
                                </a>
                            </h2>
                            <p class="text-gray-200 text-lg line-clamp-2 mb-6 max-w-2xl">
                                <?= htmlspecialchars($featured->excerpt ?? $featured->meta_description) ?>
                            </p>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm overflow-hidden border border-white/30">
                                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($featured->author_name) ?>&background=random" alt="Author" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-white text-sm font-bold"><?= htmlspecialchars($featured->author_name ?? 'Yeti Editor') ?></p>
                                    <p class="text-white/60 text-xs"><?= date('M d, Y', strtotime($featured->published_at)) ?></p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endif; ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-12">
                        <?php
                        $startIndex = ($current_page === 1 && isset($posts[0])) ? 1 : 0;
                        for ($i = $startIndex; $i < count($posts); $i++):
                            $post = $posts[$i];
                        ?>
                        <article class="group flex flex-col h-full reveal bg-white p-4 rounded-3xl hover:shadow-lg transition-all duration-300 border border-transparent hover:border-gray-100">
                            <a href="/blog/article?slug=<?= htmlspecialchars($post->slug) ?>" class="block overflow-hidden rounded-2xl mb-4 shadow-sm relative">
                                <img src="<?= $post->featured_image ?? 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?w=600&q=80' ?>"
                                     alt="<?= htmlspecialchars($post->title) ?>"
                                     loading="lazy"
                                     class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                                     
                                <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-slate-900 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                    <?= htmlspecialchars($post->category ?? 'Travel') ?>
                                </span>
                            </a>
                            
                            <div class="flex items-center gap-3 text-xs text-gray-400 mb-2 px-2">
                                <span><i class="far fa-calendar mr-1"></i> <?= date('M d, Y', strtotime($post->published_at)) ?></span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span><?= $post->read_time ?? 5 ?> min read</span>
                            </div>

                            <h3 class="text-xl font-heading font-bold text-slate-900 mb-3 px-2 group-hover:text-blue-600 transition-colors leading-snug">
                                <a href="/blog/article?slug=<?= htmlspecialchars($post->slug) ?>">
                                    <?= htmlspecialchars($post->title) ?>
                                </a>
                            </h3>

                            <p class="text-gray-600 text-sm leading-relaxed mb-4 px-2 line-clamp-3 flex-grow">
                                <?= htmlspecialchars($post->excerpt ?? $post->meta_description) ?>
                            </p>

                            <div class="px-2 mt-auto">
                                <a href="/blog/article?slug=<?= htmlspecialchars($post->slug) ?>" class="inline-flex items-center text-sm font-bold text-slate-900 hover:text-blue-600 transition-colors border-b-2 border-slate-900 hover:border-blue-600 pb-0.5">
                                    Read Story
                                </a>
                            </div>
                        </article>
                        <?php endfor; ?>
                    </div>

                    <?php if (($total_pages ?? 1) > 1): ?>
                        <div class="flex justify-center pt-8">
                            <div class="flex gap-2 bg-white p-2 rounded-full shadow-sm">
                                <?php if ($current_page > 1): ?>
                                    <a href="?page=<?= $current_page - 1 ?>" class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-100 text-gray-600 hover:bg-slate-900 hover:text-white transition"><i class="fas fa-chevron-left"></i></a>
                                <?php endif; ?>
                                
                                <span class="px-6 h-10 flex items-center justify-center font-bold text-slate-900 text-sm">
                                    Page <?= $current_page ?> of <?= $total_pages ?>
                                </span>

                                <?php if ($current_page < $total_pages): ?>
                                    <a href="?page=<?= $current_page + 1 ?>" class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-100 text-gray-600 hover:bg-slate-900 hover:text-white transition"><i class="fas fa-chevron-right"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="text-center py-24 bg-white rounded-3xl shadow-sm">
                        <div class="text-6xl mb-4 opacity-20">🏔️</div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Quiet on the trail...</h3>
                        <p class="text-gray-500">No stories found matching your criteria. Check back soon.</p>
                        <a href="/blog" class="mt-6 inline-block px-6 py-2 bg-slate-900 text-white rounded-full text-sm font-bold hover:bg-blue-600 transition">View All</a>
                    </div>
                <?php endif; ?>
            </div>

            <aside class="lg:col-span-4 space-y-8">
                
                <div class="bg-white p-8 rounded-[2rem] shadow-sm reveal delay-100 border border-gray-100">
                    <h3 class="font-heading text-2xl font-bold text-slate-900 mb-6">Search</h3>
                    <form method="GET" action="/blog" class="relative">
                        <input type="text" name="search" placeholder="Everest, Gear, Tips..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" 
                               class="w-full pl-5 pr-12 py-4 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-100 transition outline-none text-sm font-medium">
                        <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-blue-600">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <?php if (!empty($popular_posts)): ?>
                <div class="bg-white p-8 rounded-[2rem] shadow-sm reveal delay-200 border border-gray-100">
                    <h3 class="font-heading text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                        Trending <i class="fas fa-fire-alt text-orange-500 text-lg animate-pulse"></i>
                    </h3>
                    <div class="space-y-6">
                        <?php foreach (array_slice($popular_posts, 0, 4) as $index => $popular): ?>
                        <a href="/blog/article?slug=<?= htmlspecialchars($popular->slug) ?>" class="flex gap-4 group items-start">
                            <span class="text-3xl font-heading font-bold text-gray-100 group-hover:text-blue-100 transition-colors leading-none">0<?= $index + 1 ?></span>
                            <div>
                                <h4 class="font-bold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug mb-1 text-sm">
                                    <?= htmlspecialchars($popular->title) ?>
                                </h4>
                                <span class="text-xs text-gray-400 font-medium"><?= date('M d', strtotime($popular->published_at)) ?></span>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (!empty($popular_tags)): ?>
                <div class="bg-white p-8 rounded-[2rem] shadow-sm reveal delay-300 border border-gray-100">
                    <h3 class="font-heading text-2xl font-bold text-slate-900 mb-6">Topics</h3>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($popular_tags as $tag): ?>
                        <a href="/blog?search=<?= urlencode($tag) ?>" class="px-4 py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-slate-900 hover:text-white transition-colors uppercase tracking-wide">
                            #<?= htmlspecialchars($tag) ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="relative overflow-hidden rounded-[2rem] bg-slate-900 p-8 text-center text-white reveal delay-300 shadow-xl">
                    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-blue-500/20 rounded-full blur-[40px]"></div>
                    <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-32 h-32 bg-purple-500/20 rounded-full blur-[40px]"></div>
                    
                    <div class="relative z-10">
                        <i class="fas fa-paper-plane text-3xl text-blue-400 mb-4 block"></i>
                        <h3 class="font-heading text-2xl font-bold mb-2">Weekly Sherpa</h3>
                        <p class="text-gray-400 text-sm mb-6">Join 5,000+ subscribers for trekking tips and stories.</p>
                        
                        <form method="POST" action="/newsletter/subscribe" id="sidebarNewsletter">
                            <input type="email" name="email" placeholder="Email address" required 
                                   class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:bg-white/20 focus:border-white/30 mb-3 text-center text-sm transition-all">
                            <button type="submit" class="w-full py-3 bg-white text-slate-900 rounded-xl font-bold text-sm hover:bg-blue-50 transition shadow-lg">Subscribe</button>
                        </form>
                    </div>
                </div>

            </aside>

        </div>
    </div>
</section>

<section class="py-24 bg-white border-t border-gray-100 font-body text-center">
    <div class="container mx-auto px-6 reveal">
        <h2 class="font-heading text-4xl md:text-5xl font-bold text-slate-900 mb-6">Inspired to explore?</h2>
        <p class="text-xl text-gray-500 mb-10 max-w-2xl mx-auto">Read enough? Turn these stories into your own memories.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <a href="/treks" class="px-8 py-4 bg-slate-900 text-white rounded-full font-bold hover:scale-105 transition-transform shadow-lg shadow-slate-900/20">Find a Trek</a>
            <a href="/contact" class="px-8 py-4 bg-white border-2 border-gray-100 text-slate-900 rounded-full font-bold hover:border-slate-900 transition-colors">Contact Us</a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Scroll Reveal
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('active');
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // Newsletter Handler
    const forms = document.querySelectorAll('form[action="/newsletter/subscribe"]');
    forms.forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = form.querySelector('button');
            const originalText = btn.innerText;
            btn.innerText = '...';
            
            // Simulation
            setTimeout(() => {
                btn.innerText = 'Subscribed!';
                btn.classList.add('bg-green-500', 'text-white');
                form.reset();
                setTimeout(() => {
                    btn.innerText = originalText;
                    btn.classList.remove('bg-green-500', 'text-white');
                }, 3000);
            }, 1000);
        });
    });
});
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/frontend.php';
?>