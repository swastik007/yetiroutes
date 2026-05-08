<?php
$pageTitle = 'Meet Our Expert Guides | Yeti Routes';
$metaDescription = 'Meet the experienced mountain guides of Yeti Routes. Certified professionals with decades of Himalayan expertise.';
ob_start();

// Data Array for Guides (Scalable structure for future additions)
$guides = [
    [
        'name' => 'Pemba Sherpa',
        'role' => 'Lead Guide & Co-Founder',
        'experience' => '15 Years',
        'languages' => 'English, Nepali',
        'img' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&q=80&w=800', // Placeholder or use specific ID
        'specialty' => 'Everest Region',
        'quote' => 'The mountains are my home, and I love sharing their magic.'
    ],
    [
        'name' => 'Lakpa Tamang',
        'role' => 'Senior Trek Leader',
        'experience' => '12 Years',
        'languages' => 'English, French, Nepali',
        'img' => 'https://images.unsplash.com/photo-1552168324-d61283865567?auto=format&fit=crop&q=80&w=800',
        'specialty' => 'Langtang & Culture',
        'quote' => 'Every trek is a journey through culture and spirituality.'
    ],
    [
        'name' => 'Dawa Lama',
        'role' => 'Annapurna Specialist',
        'experience' => '10 Years',
        'languages' => 'English, German, Nepali',
        'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=800',
        'specialty' => 'Annapurna Region',
        'quote' => 'The Annapurna region is paradise. Let me show you why.'
    ],
    // You can easily add 20+ more guides here in the future
];

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap');

    .font-heading { font-family: 'Playfair Display', serif; }
    .font-body { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    .reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }
    
    .glass-card {
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1), inset 0 0 0 1px rgba(255, 255, 255, 0.05);
    }
    .glass-card:hover {
        border-color: rgba(255, 255, 255, 0.2);
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.02) 100%);
        transform: translateY(-5px);
    }
    .neo-icon {
        background: linear-gradient(145deg, #131c2e, #0f1625);
        box-shadow:  5px 5px 10px #080b13, -5px -5px 10px #1a2741;
    }

    .delay-100 { transition-delay: 0.1s; }
    .delay-200 { transition-delay: 0.2s; }
</style>

<section class="relative h-[60vh] md:h-[70vh] overflow-hidden font-body">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1519904981063-b0cf448d479e?w=1920&q=80" alt="Himalayan Guide" class="w-full h-full object-cover scale-105 animate-[pulse_10s_ease-in-out_infinite] transition-transform duration-[20s] hover:scale-110">
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/20 to-[#0B1120]"></div>
    </div>
    
    <div class="relative container mx-auto px-6 h-full flex flex-col justify-end pb-16">
        <div class="max-w-4xl reveal active">
            <span class="inline-block py-1 px-3 border border-white/30 rounded-full text-sm text-white/90 mb-6 backdrop-blur-sm uppercase tracking-wider">The Heart of Yeti Routes</span>
            <h1 class="font-heading text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                Meet the <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Guardians</span><br>
                of the Himalayas
            </h1>
            <p class="text-xl text-gray-300 max-w-xl font-light leading-relaxed border-l-2 border-blue-500 pl-6">
                Experienced, certified, and passionate. They don't just lead the way; they share their home.
            </p>
        </div>
    </div>
</section>

<section class="relative py-24 bg-[#0B1120] font-body overflow-hidden">
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600/20 rounded-full blur-[100px] animate-pulse"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-600/20 rounded-full blur-[100px] animate-pulse" style="animation-delay: 2s;"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-20 reveal">
            <h2 class="font-heading text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white via-gray-200 to-gray-400 mb-6 drop-shadow-lg">
                The Gold Standard
            </h2>
            <p class="text-lg text-gray-400 font-light">
                We set the highest benchmarks for safety, knowledge, and hospitality in Nepal.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="glass-card rounded-[2rem] p-8 transition-all duration-500 group reveal">
                <div class="neo-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                    <i class="fas fa-certificate text-2xl text-blue-400 drop-shadow-[0_0_8px_rgba(96,165,250,0.5)]"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Government Certified</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    All guides hold valid licenses from the Nepal Tourism Board and undergo annual training updates to ensure compliance and excellence.
                </p>
            </div>

            <div class="glass-card rounded-[2rem] p-8 transition-all duration-500 group reveal delay-100">
                <div class="neo-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                    <i class="fas fa-first-aid text-2xl text-red-400 drop-shadow-[0_0_8px_rgba(248,113,113,0.5)]"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Medical Experts</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Certified Wilderness First Responders trained in high-altitude sickness recognition, Gamow bag usage, and emergency evacuation.
                </p>
            </div>

            <div class="glass-card rounded-[2rem] p-8 transition-all duration-500 group reveal delay-200">
                <div class="neo-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                    <i class="fas fa-language text-2xl text-green-400 drop-shadow-[0_0_8px_rgba(74,222,128,0.5)]"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Multi-Lingual</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Fluent in English with specialists in French, German, Spanish, and Japanese to ensure clear communication on the trail.
                </p>
            </div>

            <div class="glass-card rounded-[2rem] p-8 transition-all duration-500 group reveal">
                <div class="neo-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                    <i class="fas fa-heart text-2xl text-purple-400 drop-shadow-[0_0_8px_rgba(192,132,252,0.5)]"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Local Knowledge</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Born and raised in mountain communities. They share folklore, hidden trails, and cultural nuances you won't find in guidebooks.
                </p>
            </div>

            <div class="glass-card rounded-[2rem] p-8 transition-all duration-500 group reveal delay-100">
                <div class="neo-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                    <i class="fas fa-users text-2xl text-orange-400 drop-shadow-[0_0_8px_rgba(251,146,60,0.5)]"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">People Skills</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Friendly, patient, and excellent at reading group dynamics. They know when to push you and when to let you rest.
                </p>
            </div>

             <div class="glass-card rounded-[2rem] p-8 transition-all duration-500 group reveal delay-200">
                <div class="neo-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                    <i class="fas fa-shield-alt text-2xl text-cyan-400 drop-shadow-[0_0_8px_rgba(34,211,238,0.5)]"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Crisis Management</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Extensive experience in risk management. In the mountains, their decision-making keeps you safe.
                </p>
            </div>

        </div>
    </div>
</section>

<section class="py-12 bg-white border-b border-gray-100 font-body">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-gray-100">
            <div>
                <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-1">15+</div>
                <div class="text-xs uppercase tracking-widest text-gray-500">Expert Guides</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold text-green-600 mb-1">100%</div>
                <div class="text-xs uppercase tracking-widest text-gray-500">Certified</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold text-purple-600 mb-1">10+</div>
                <div class="text-xs uppercase tracking-widest text-gray-500">Avg Years Exp</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold text-orange-600 mb-1">8</div>
                <div class="text-xs uppercase tracking-widest text-gray-500">Languages</div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-gray-50 font-body">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 reveal">
            <div>
                <span class="text-blue-600 font-bold uppercase tracking-wider text-sm">Our Team</span>
                <h2 class="font-heading text-4xl font-bold mt-2 text-gray-900">Lead Guides</h2>
            </div>
            <div class="hidden md:flex gap-4">
                <button class="px-4 py-2 rounded-full bg-slate-900 text-white text-sm font-medium">All</button>
                <button class="px-4 py-2 rounded-full bg-white text-gray-600 border border-gray-200 text-sm font-medium hover:bg-gray-100">Everest</button>
                <button class="px-4 py-2 rounded-full bg-white text-gray-600 border border-gray-200 text-sm font-medium hover:bg-gray-100">Annapurna</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <?php foreach ($guides as $index => $guide): ?>
            <div class="group relative overflow-hidden rounded-[2rem] shadow-sm hover:shadow-2xl transition-all duration-500 bg-white reveal delay-<?= ($index * 100) % 300 ?>">
                <div class="relative h-96 overflow-hidden">
                    <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent z-10 transition-colors duration-500"></div>
                    <img src="<?= htmlspecialchars($guide['img']) ?>" alt="<?= htmlspecialchars($guide['name']) ?>" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-105">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-90"></div>
                    
                    <div class="absolute bottom-0 left-0 p-8 w-full text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <p class="text-xs font-bold text-blue-400 uppercase tracking-wider mb-2"><?= htmlspecialchars($guide['role']) ?></p>
                        <h3 class="text-2xl font-heading mb-4"><?= htmlspecialchars($guide['name']) ?></h3>
                        
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100 space-y-3">
                            <div class="flex items-center text-sm text-gray-300">
                                <i class="fas fa-mountain w-6 text-center text-blue-400"></i>
                                <span><?= htmlspecialchars($guide['experience']) ?> Experience</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-300">
                                <i class="fas fa-map-marker-alt w-6 text-center text-green-400"></i>
                                <span><?= htmlspecialchars($guide['specialty']) ?></span>
                            </div>
                            <div class="flex items-center text-sm text-gray-300">
                                <i class="fas fa-language w-6 text-center text-purple-400"></i>
                                <span><?= htmlspecialchars($guide['languages']) ?></span>
                            </div>
                            
                            <p class="text-xs text-gray-400 italic mt-4 pt-4 border-t border-white/20">
                                "<?= htmlspecialchars($guide['quote']) ?>"
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="relative py-32 bg-slate-900 overflow-hidden text-center font-body">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    </div>

    <div class="relative z-10 container mx-auto px-6 reveal">
        <h2 class="font-heading text-4xl md:text-6xl font-bold text-white mb-6">Trek with the Masters.</h2>
        <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
            Our guides are ready to turn your Himalayan dream into a safe, unforgettable reality.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <a href="/treks" class="group relative px-8 py-4 bg-white text-slate-900 rounded-full font-bold text-lg overflow-hidden transition-all hover:scale-105">
                <span class="relative z-10">Browse Adventures</span>
                <div class="absolute inset-0 h-full w-full scale-0 rounded-full transition-all duration-300 group-hover:scale-100 group-hover:bg-blue-50"></div>
            </a>
            <a href="/contact" class="px-8 py-4 border border-white/30 text-white rounded-full font-bold text-lg hover:bg-white/10 transition-all hover:scale-105">
                Talk to an Expert
            </a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: "0px 0px -50px 0px"
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target); 
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal').forEach(el => {
            observer.observe(el);
        });
    });
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/frontend.php';
?>