<?php
$pageTitle = 'Our Story | Yeti Routes';
$metaDescription = 'Born from the Himalayas. The story of Yeti Routes, our mission, and the people dedicated to your journey.';
ob_start();
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap');

    .font-heading { font-family: 'Playfair Display', serif; }
    .font-body { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    /* Scroll Reveal Animation Classes */
    .reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Stagger delays */
    .delay-100 { transition-delay: 0.1s; }
    .delay-200 { transition-delay: 0.2s; }
    .delay-300 { transition-delay: 0.3s; }
</style>

<section class="relative h-[85vh] overflow-hidden font-body">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?w=1920&q=80" alt="Himalayan Peaks" class="w-full h-full object-cover scale-105 animate-[pulse_10s_ease-in-out_infinite] transition-transform duration-[20s] hover:scale-110">
        <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-black/20 to-black/80"></div>
    </div>
    
    <div class="relative container mx-auto px-6 h-full flex flex-col justify-end pb-24 md:pb-32">
        <div class="max-w-4xl reveal active">
            <span class="inline-block py-1 px-3 border border-white/30 rounded-full text-sm text-white/90 mb-6 backdrop-blur-sm uppercase tracking-wider">Est. 2014</span>
            <h1 class="font-heading text-5xl md:text-7xl lg:text-8xl font-bold text-white mb-6 leading-tight">
                Follow the Yeti.<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">Discover Yourself.</span>
            </h1>
            <p class="text-xl text-gray-200 max-w-xl font-light leading-relaxed border-l-2 border-blue-500 pl-6">
                Born from a passion for the Himalayas, built on trust, and dedicated to the art of authentic adventure.
            </p>
        </div>
    </div>
</section>
<section class="relative py-32 bg-white overflow-hidden font-body">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gray-50 skew-x-12 translate-x-20 z-0"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-50 rounded-full blur-3xl opacity-60 z-0"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
            
            <div class="w-full lg:w-1/2 relative group">
                <div class="relative z-10 w-4/5 reveal">
                    <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition duration-700 z-20 pointer-events-none"></div>
                    <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?w=800&q=80" 
                         alt="Authentic Himalayan Trekking Experience" 
                         class="w-full h-[600px] object-cover rounded shadow-2xl transition-transform duration-700 group-hover:scale-[1.02]">
                </div>

                <div class="absolute bottom-12 -right-4 md:-right-12 w-3/5 z-20 reveal delay-200">
                    <img src="https://images.unsplash.com/photo-1605640840605-14ac1855827b?w=600&q=80" 
                         alt="Moments of connection in Nepal" 
                         class="w-full h-64 object-cover rounded shadow-2xl border-4 border-white transform transition-transform duration-500 group-hover:-translate-y-4 group-hover:rotate-1">
                    
                    <div class="absolute -top-6 -left-6 bg-blue-600 text-white p-4 rounded shadow-lg">
                        <p class="text-xs uppercase tracking-widest font-bold">Est.</p>
                        <p class="text-2xl font-heading font-bold">2014</p>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/2 reveal delay-100">
                <span class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-2 block">Our Philosophy</span>
                
                <h2 class="font-heading text-4xl md:text-6xl font-bold text-gray-900 mb-8 leading-tight">
                    Don't just go.<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 italic">Feel.</span>
                </h2>

                <div class="prose prose-lg text-gray-600 mb-8">
                    <p class="mb-6 leading-relaxed">
                        <span class="text-5xl float-left mr-3 mt-[-10px] font-heading text-blue-200 font-bold">T</span>
                        ravel has always been about more than just changing coordinates. For us, the Himalayas aren't just a destination on a map—they are a feeling. Breathless, beautiful, and profoundly moving.
                    </p>
                    
                    <p class="mb-6 text-lg font-light text-gray-800 border-l-4 border-blue-500 pl-4 italic">
                        "It's about that emotional high that stays with you long after you've unpacked your bags."
                    </p>

                    <p class="leading-relaxed">
                        Since our founding in 2014, <strong class="text-gray-900">Yeti Routes</strong> has moved beyond the standard itinerary. We exist to craft remarkable, <a href="#" class="text-blue-600 underline decoration-blue-300 underline-offset-4 hover:text-blue-800 transition">tailor-made trips</a> for clients who seek the authentic pulse of Nepal. We don't just show you the mountains; we help you find the quiet transformation that happens within them.
                    </p>
                </div>

                <div class="flex items-center gap-6 mt-10 border-t border-gray-100 pt-8">
                    <img src="https://ui-avatars.com/api/?name=Pasang+Sherpa&background=0D8ABC&color=fff" alt="Founder Signature" class="w-12 h-12 rounded-full ring-2 ring-white shadow-md">
                    <div>
                        <p class="text-sm font-bold text-gray-900">Pasang Sherpa</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Head Guide & Founder</p>
                    </div>
                    
                    <a href="/our-story" class="ml-auto group flex items-center gap-2 text-gray-900 font-semibold hover:text-blue-600 transition">
                        Read full story 
                        <i class="fas fa-arrow-right transform group-hover:translate-x-1 transition"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="py-20 bg-slate-900 text-white font-body relative">
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center divide-x divide-slate-800">
            <div class="reveal">
                <div class="text-4xl md:text-5xl font-bold text-blue-400 mb-2">10+</div>
                <div class="text-sm uppercase tracking-widest text-slate-400">Years Experience</div>
            </div>
            <div class="reveal delay-100">
                <div class="text-4xl md:text-5xl font-bold text-purple-400 mb-2">1k+</div>
                <div class="text-sm uppercase tracking-widest text-slate-400">Summits & Treks</div>
            </div>
            <div class="reveal delay-200">
                <div class="text-4xl md:text-5xl font-bold text-green-400 mb-2">50+</div>
                <div class="text-sm uppercase tracking-widest text-slate-400">Nations Served</div>
            </div>
            <div class="reveal delay-300">
                <div class="text-4xl md:text-5xl font-bold text-orange-400 mb-2">100%</div>
                <div class="text-sm uppercase tracking-widest text-slate-400">Safety Record</div>
            </div>
        </div>
    </div>
</section>

<section class="relative py-24 bg-[#0B1120] font-body overflow-hidden selection:bg-cyan-500 selection:text-white">

    <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600/20 rounded-full blur-[100px] animate-pulse"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-600/20 rounded-full blur-[100px] animate-pulse" style="animation-delay: 2s;"></div>
    <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-cyan-500/10 rounded-full blur-[80px]"></div>

    <style>
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
    </style>

    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-20 reveal">
            <h2 class="font-heading text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white via-gray-200 to-gray-400 mb-6 drop-shadow-lg">
                The Yeti Way
            </h2>
            <p class="text-lg text-gray-400 font-light">
                Bridging the ancient Himalayas with modern innovation.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="md:col-span-2 glass-card rounded-[2rem] p-10 transition-all duration-500 group reveal">
                <div class="flex flex-col md:flex-row items-start gap-8">
                    <div class="neo-icon w-20 h-20 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-shield-alt text-3xl text-blue-400 drop-shadow-[0_0_10px_rgba(96,165,250,0.5)]"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-blue-300 transition-colors">Uncompromised Safety</h3>
                        <p class="text-gray-400 leading-relaxed text-lg">
                            We don't cut corners. From satellite phones to Gamow bags and helicopter rescue partnerships, we prepare for the unexpected so you can focus on the view.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative rounded-[2rem] p-10 overflow-hidden shadow-2xl transition-transform duration-500 hover:-translate-y-2 reveal delay-100 group">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-600/80 to-purple-800/80 backdrop-blur-md"></div>
                <div class="absolute inset-0 opacity-0 group-hover:opacity-20 bg-gradient-to-tr from-transparent via-white to-transparent transition-opacity duration-700"></div>
                <div class="relative z-10 h-full flex flex-col justify-between">
                    <div>
                        <div class="w-16 h-16 bg-white/10 border border-white/20 rounded-2xl flex items-center justify-center mb-6 backdrop-blur-sm shadow-inner">
                            <i class="fas fa-leaf text-2xl text-green-300"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3">Eco-Conscious</h3>
                        <p class="text-blue-100/80 leading-relaxed font-light">
                            Strict "Leave No Trace" policies. We carry out what we carry in.
                        </p>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2 glass-card rounded-[2rem] p-10 transition-all duration-500 group reveal delay-150 relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10"></div>
                
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8 relative z-10">
                    <div class="neo-icon w-20 h-20 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:rotate-12 transition-transform duration-300 border border-cyan-500/30">
                        <i class="fas fa-microchip text-3xl text-cyan-400 drop-shadow-[0_0_15px_rgba(34,211,238,0.8)]"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-cyan-300 transition-colors">Smart Tradition</h3>
                        <p class="text-gray-400 leading-relaxed text-lg">
                            We bridge the gap between ancient trails and modern technology. We utilize <span class="text-cyan-400 font-medium">AI-driven data</span> for weather prediction, route optimization, and safety monitoring—enhancing your adventure without losing the human connection.
                        </p>
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-[2rem] p-8 transition-all duration-500 group reveal delay-200">
                <div class="neo-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                    <i class="fas fa-users text-2xl text-orange-400 drop-shadow-[0_0_8px_rgba(251,146,60,0.5)]"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-3 group-hover:text-orange-300 transition-colors">Small Groups</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Max 12 people. Intimate groups where strangers become family.
                </p>
            </div>

            <div class="glass-card rounded-[2rem] p-8 transition-all duration-500 group reveal delay-200">
                <div class="neo-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform duration-300">
                    <i class="fas fa-hand-holding-usd text-2xl text-green-400 drop-shadow-[0_0_8px_rgba(74,222,128,0.5)]"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-3 group-hover:text-green-300 transition-colors">Fair Wages</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Paying our porters above-industry standards with full insurance.
                </p>
            </div>

            <div class="md:col-span-2 glass-card rounded-[2rem] p-8 transition-all duration-500 group reveal delay-300">
                <div class="flex items-center gap-6">
                    <div class="neo-icon w-16 h-16 rounded-2xl flex items-center justify-center flex-shrink-0 mb-0 group-hover:rotate-6 transition-transform duration-300">
                        <i class="fas fa-certificate text-2xl text-purple-400 drop-shadow-[0_0_8px_rgba(192,132,252,0.5)]"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-purple-300 transition-colors">Certified Experts</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">
                            Fully licensed by Nepal Tourism Board, TAAN members, and NMA certified professionals.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-24 bg-white font-body">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 reveal">
            <div>
                <span class="text-blue-600 font-bold uppercase tracking-wider text-sm">The Experts</span>
                <h2 class="font-heading text-4xl font-bold mt-2">Guided by the Best</h2>
            </div>
            <a href="/team" class="hidden md:inline-flex items-center text-gray-500 hover:text-blue-600 transition">
                Meet the whole team <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group relative overflow-hidden rounded-2xl reveal">
                <img src="https://images.unsplash.com/photo-1519058082700-08a0b56da9b4?w=500&q=80" alt="Guide Name" class="w-full h-96 object-cover grayscale group-hover:grayscale-0 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent opacity-90"></div>
                <div class="absolute bottom-0 left-0 p-6 text-white translate-y-4 group-hover:translate-y-0 transition duration-300">
                    <p class="text-sm font-bold text-blue-400 uppercase">Senior Guide</p>
                    <h3 class="text-2xl font-heading">Pasang Sherpa</h3>
                    <p class="text-sm text-gray-300 mt-2 opacity-0 group-hover:opacity-100 transition delay-100">15 years experience. Everest Summitter x3.</p>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl reveal delay-100">
                <img src="https://images.unsplash.com/photo-1551571590-b1d61972be3f?w=500&q=80" alt="Guide Name" class="w-full h-96 object-cover grayscale group-hover:grayscale-0 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent opacity-90"></div>
                <div class="absolute bottom-0 left-0 p-6 text-white translate-y-4 group-hover:translate-y-0 transition duration-300">
                    <p class="text-sm font-bold text-blue-400 uppercase">Operations Director</p>
                    <h3 class="text-2xl font-heading">Sita Gurung</h3>
                    <p class="text-sm text-gray-300 mt-2 opacity-0 group-hover:opacity-100 transition delay-100">Logistics expert ensuring smooth journeys.</p>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl reveal delay-200">
                <img src="https://images.unsplash.com/photo-1543324623-6e4cb791336b?w=500&q=80" alt="Guide Name" class="w-full h-96 object-cover grayscale group-hover:grayscale-0 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent opacity-90"></div>
                <div class="absolute bottom-0 left-0 p-6 text-white translate-y-4 group-hover:translate-y-0 transition duration-300">
                    <p class="text-sm font-bold text-blue-400 uppercase">Cultural Expert</p>
                    <h3 class="text-2xl font-heading">Ramesh Thapa</h3>
                    <p class="text-sm text-gray-300 mt-2 opacity-0 group-hover:opacity-100 transition delay-100">Historian and expert in high-altitude flora.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-12 border-t border-gray-100 bg-white">
    <div class="container mx-auto px-6">
        <p class="text-center text-gray-400 text-sm uppercase tracking-widest mb-8">Officially Recognized By</p>
        <div class="flex flex-wrap justify-center items-center gap-12 md:gap-24 opacity-60 grayscale hover:grayscale-0 hover:opacity-100 transition duration-500">
            <div class="text-xl font-bold text-gray-800 flex items-center gap-2"><i class="fas fa-mountain"></i> Nepal Tourism Board</div>
            <div class="text-xl font-bold text-gray-800 flex items-center gap-2"><i class="fas fa-hiking"></i> TAAN</div>
            <div class="text-xl font-bold text-gray-800 flex items-center gap-2"><i class="fas fa-snowflake"></i> NMA</div>
        </div>
    </div>
</section>

<section class="relative py-32 bg-slate-900 overflow-hidden text-center font-body">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    </div>

    <div class="relative z-10 container mx-auto px-6 reveal">
        <h2 class="font-heading text-4xl md:text-6xl font-bold text-white mb-6">The Mountains are Calling.</h2>
        <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto">Your journey of a lifetime begins with a single click. Let us handle the logistics while you handle the adventure.</p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <a href="/treks" class="group relative px-8 py-4 bg-white text-slate-900 rounded-full font-bold text-lg overflow-hidden transition-all hover:scale-105">
                <span class="relative z-10">Find Your Trek</span>
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
                    observer.unobserve(entry.target); // Only animate once
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