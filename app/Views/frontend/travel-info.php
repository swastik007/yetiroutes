<?php
$pageTitle = 'The Explorer\'s Handbook | Yeti Routes';
$metaDescription = 'Your essential guide to trekking in Nepal. Visa fees, packing lists, altitude safety, and fitness requirements.';
ob_start();
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap');

    .font-heading { font-family: 'Playfair Display', serif; }
    .font-body { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    html { scroll-behavior: smooth; }

    /* Glass Navigation Pill */
    .nav-pill {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
    }
    
    .nav-link.active {
        background-color: #0F172A; /* Slate 900 */
        color: white;
    }

    /* Dark Glass Card */
    .dark-glass {
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<section class="relative h-[60vh] flex items-center justify-center overflow-hidden font-body">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1533130061792-649d45e412ea?w=1920&q=80" alt="Preparation" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-slate-900/60"></div>
    </div>
    
    <div class="relative z-10 text-center px-4 reveal active">
        <div class="inline-block px-4 py-1 border border-white/30 rounded-full bg-white/10 backdrop-blur-md text-white text-xs uppercase tracking-widest mb-4">Preparation Guide</div>
        <h1 class="font-heading text-5xl md:text-7xl font-bold text-white mb-6">The Explorer's Handbook</h1>
        <p class="text-xl text-gray-200 max-w-2xl mx-auto font-light">
            Nepal is wild and wonderful. Here is everything you need to know before you lace up your boots.
        </p>
    </div>
</section>

<div class="sticky top-6 z-50 px-4 font-body">
    <div class="container mx-auto max-w-5xl">
        <nav class="nav-pill rounded-full p-2 flex items-center justify-between md:justify-center gap-2 overflow-x-auto no-scrollbar">
            <a href="#permits" class="nav-link px-5 py-2.5 rounded-full text-sm font-semibold text-gray-600 hover:text-slate-900 transition whitespace-nowrap">Visas & Permits</a>
            <a href="#seasons" class="nav-link px-5 py-2.5 rounded-full text-sm font-semibold text-gray-600 hover:text-slate-900 transition whitespace-nowrap">Best Time</a>
            <a href="#packing" class="nav-link px-5 py-2.5 rounded-full text-sm font-semibold text-gray-600 hover:text-slate-900 transition whitespace-nowrap">Packing</a>
            <a href="#safety" class="nav-link px-5 py-2.5 rounded-full text-sm font-semibold text-gray-600 hover:text-slate-900 transition whitespace-nowrap">Safety & Health</a>
            <a href="#faq" class="nav-link px-5 py-2.5 rounded-full text-sm font-semibold text-gray-600 hover:text-slate-900 transition whitespace-nowrap">FAQ</a>
        </nav>
    </div>
</div>

<section id="permits" class="py-24 bg-gray-50 font-body scroll-mt-24">
    <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center mb-16 reveal">
            <h2 class="font-heading text-4xl font-bold text-slate-900 mb-4">Paperwork & Logistics</h2>
            <p class="text-gray-600">Don't worry about the red tape. We handle the trekking permits; you just handle the visa.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="md:col-span-2 bg-white p-8 rounded-[2rem] shadow-sm reveal">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600"><i class="fas fa-passport text-xl"></i></div>
                    <h3 class="text-2xl font-bold font-heading">Tourist Visa On Arrival</h3>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100 text-center">
                        <p class="text-sm text-gray-500 mb-1">15 Days</p>
                        <p class="text-3xl font-bold text-slate-900">$30</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-blue-50 border border-blue-100 text-center relative overflow-hidden">
                        <div class="absolute top-0 right-0 bg-blue-500 text-white text-[10px] px-2 py-0.5 rounded-bl-lg">Popular</div>
                        <p class="text-sm text-blue-600 mb-1">30 Days</p>
                        <p class="text-3xl font-bold text-blue-900">$50</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100 text-center">
                        <p class="text-sm text-gray-500 mb-1">90 Days</p>
                        <p class="text-3xl font-bold text-slate-900">$125</p>
                    </div>
                </div>
                <div class="mt-6 flex items-start gap-3 text-sm text-gray-500 bg-gray-50 p-4 rounded-xl">
                    <i class="fas fa-info-circle mt-1 text-blue-500"></i>
                    <p>Available at Tribhuvan International Airport (TIA). Please bring 2 passport-sized photos and cash (USD/EUR) just in case the digital kiosks are down.</p>
                </div>
            </div>

            <div class="bg-slate-900 text-white p-8 rounded-[2rem] shadow-xl relative overflow-hidden reveal delay-100">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500 rounded-full blur-[60px] opacity-20"></div>
                
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center text-white mb-6"><i class="fas fa-id-card-alt text-xl"></i></div>
                    <h3 class="text-2xl font-bold font-heading mb-2">Trekking Permits</h3>
                    <p class="text-gray-400 text-sm mb-6">TIMS Card & National Park fees.</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-green-500/20 text-green-400 flex items-center justify-center text-xs"><i class="fas fa-check"></i></div>
                            <span class="font-medium">Arranged by Yeti Routes</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-green-500/20 text-green-400 flex items-center justify-center text-xs"><i class="fas fa-check"></i></div>
                            <span class="font-medium">Included in Package Price</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-green-500/20 text-green-400 flex items-center justify-center text-xs"><i class="fas fa-check"></i></div>
                            <span class="font-medium">No Queueing for You</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="seasons" class="py-24 bg-white font-body scroll-mt-24">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 reveal">
            <div class="max-w-2xl">
                <h2 class="font-heading text-4xl font-bold text-slate-900 mb-4">Chasing the Sun</h2>
                <p class="text-gray-600">Nepal has two major trekking windows. Choosing the right one depends on what you value more: crystal clear views or solitude.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="group p-8 rounded-3xl border border-gray-100 hover:border-green-200 hover:shadow-xl hover:shadow-green-500/5 transition-all duration-300 bg-white reveal">
                <div class="text-green-600 font-bold tracking-widest text-xs uppercase mb-2">Mar — May</div>
                <h3 class="text-2xl font-heading font-bold mb-4">Spring</h3>
                <ul class="space-y-3 mb-6">
                    <li class="flex gap-2 text-sm text-gray-600"><i class="fas fa-check text-green-500 mt-1"></i> Rhododendrons bloom</li>
                    <li class="flex gap-2 text-sm text-gray-600"><i class="fas fa-check text-green-500 mt-1"></i> Warmer days</li>
                    <li class="flex gap-2 text-sm text-gray-600"><i class="fas fa-check text-green-500 mt-1"></i> Hazy afternoon views</li>
                </ul>
                <div class="w-full h-1 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-green-500 w-[90%]"></div>
                </div>
                <p class="text-xs text-gray-400 mt-2 text-right">Crowd Level: High</p>
            </div>

            <div class="group p-8 rounded-3xl border border-gray-100 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-500/5 transition-all duration-300 bg-white opacity-60 hover:opacity-100 reveal delay-100">
                <div class="text-blue-400 font-bold tracking-widest text-xs uppercase mb-2">Jun — Aug</div>
                <h3 class="text-2xl font-heading font-bold mb-4">Summer</h3>
                <ul class="space-y-3 mb-6">
                    <li class="flex gap-2 text-sm text-gray-600"><i class="fas fa-check text-blue-400 mt-1"></i> Lush green valleys</li>
                    <li class="flex gap-2 text-sm text-gray-600"><i class="fas fa-exclamation-triangle text-yellow-500 mt-1"></i> Leeches & Rain</li>
                    <li class="flex gap-2 text-sm text-gray-600"><i class="fas fa-check text-blue-400 mt-1"></i> Empty trails</li>
                </ul>
                <div class="w-full h-1 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-blue-300 w-[20%]"></div>
                </div>
                <p class="text-xs text-gray-400 mt-2 text-right">Crowd Level: Low</p>
            </div>

            <div class="group p-8 rounded-3xl border-2 border-orange-100 bg-orange-50/30 hover:shadow-xl hover:shadow-orange-500/10 transition-all duration-300 reveal delay-200 relative overflow-hidden">
                <div class="absolute top-4 right-4 text-orange-500"><i class="fas fa-star"></i></div>
                <div class="text-orange-600 font-bold tracking-widest text-xs uppercase mb-2">Sep — Nov</div>
                <h3 class="text-2xl font-heading font-bold mb-4">Autumn</h3>
                <ul class="space-y-3 mb-6">
                    <li class="flex gap-2 text-sm text-gray-600"><i class="fas fa-check text-orange-500 mt-1"></i> Crystal clear skies</li>
                    <li class="flex gap-2 text-sm text-gray-600"><i class="fas fa-check text-orange-500 mt-1"></i> Perfect visibility</li>
                    <li class="flex gap-2 text-sm text-gray-600"><i class="fas fa-check text-orange-500 mt-1"></i> Festive atmosphere</li>
                </ul>
                <div class="w-full h-1 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-orange-500 w-[95%]"></div>
                </div>
                <p class="text-xs text-gray-400 mt-2 text-right">Crowd Level: Very High</p>
            </div>

            <div class="group p-8 rounded-3xl border border-gray-100 hover:border-cyan-200 hover:shadow-xl hover:shadow-cyan-500/5 transition-all duration-300 bg-white reveal delay-300">
                <div class="text-cyan-600 font-bold tracking-widest text-xs uppercase mb-2">Dec — Feb</div>
                <h3 class="text-2xl font-heading font-bold mb-4">Winter</h3>
                <ul class="space-y-3 mb-6">
                    <li class="flex gap-2 text-sm text-gray-600"><i class="fas fa-check text-cyan-500 mt-1"></i> Crisp photography</li>
                    <li class="flex gap-2 text-sm text-gray-600"><i class="fas fa-snowflake text-cyan-500 mt-1"></i> Very cold nights</li>
                    <li class="flex gap-2 text-sm text-gray-600"><i class="fas fa-exclamation-circle text-orange-500 mt-1"></i> High passes closed</li>
                </ul>
                <div class="w-full h-1 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-cyan-500 w-[40%]"></div>
                </div>
                <p class="text-xs text-gray-400 mt-2 text-right">Crowd Level: Low</p>
            </div>
        </div>
    </div>
</section>

<section id="packing" class="py-24 bg-blue-50/50 font-body scroll-mt-24">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="w-full md:w-1/2 reveal">
                <h2 class="font-heading text-4xl font-bold text-slate-900 mb-6">Pack Light, Pack Right.</h2>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                    The golden rule of trekking: "Ounces equal pounds, and pounds equal pain." We provide the heavy gear (sleeping bags, down jackets, duffel bags). You focus on the layers.
                </p>
                
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center shadow-sm text-blue-600 font-bold">1</div>
                        <div>
                            <h4 class="font-bold text-slate-900">Base Layers</h4>
                            <p class="text-sm text-gray-500">Merino wool is your best friend. Avoid cotton at all costs.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center shadow-sm text-blue-600 font-bold">2</div>
                        <div>
                            <h4 class="font-bold text-slate-900">Footwear</h4>
                            <p class="text-sm text-gray-500">Break in your boots <i>before</i> you arrive in Kathmandu.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center shadow-sm text-blue-600 font-bold">3</div>
                        <div>
                            <h4 class="font-bold text-slate-900">The "Small" Things</h4>
                            <p class="text-sm text-gray-500">Headlamp, power bank, lip balm, and wet wipes are lifesavers.</p>
                        </div>
                    </div>
                </div>

                <a href="/downloads/yeti-packing-list.pdf" class="mt-10 inline-flex items-center gap-2 bg-slate-900 text-white px-8 py-4 rounded-full font-bold hover:bg-blue-600 transition shadow-lg hover:shadow-blue-500/20">
                    <i class="fas fa-download"></i> Download Full Checklist (PDF)
                </a>
            </div>

            <div class="w-full md:w-1/2 relative reveal delay-100">
                <div class="bg-white p-8 rounded-[2.5rem] shadow-2xl relative z-10 rotate-2 hover:rotate-0 transition-transform duration-500">
                    <h3 class="font-heading text-xl font-bold mb-6 border-b pb-4">The Essentials</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                            <i class="fas fa-tshirt text-blue-500"></i> <span class="text-sm font-medium">Thermal Tops</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                            <i class="fas fa-cloud-showers-heavy text-blue-500"></i> <span class="text-sm font-medium">Rain Shell</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                            <i class="fas fa-mitten text-blue-500"></i> <span class="text-sm font-medium">Gloves</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                            <i class="fas fa-socks text-blue-500"></i> <span class="text-sm font-medium">Wool Socks</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                            <i class="fas fa-glasses text-blue-500"></i> <span class="text-sm font-medium">Sunglasses</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                            <i class="fas fa-medkit text-blue-500"></i> <span class="text-sm font-medium">Personal Meds</span>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0 bg-blue-600 rounded-[2.5rem] -rotate-3 opacity-20 scale-95 z-0"></div>
            </div>
        </div>
    </div>
</section>

<section id="safety" class="relative py-24 bg-[#0B1120] text-white font-body scroll-mt-24 overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-red-600/10 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-600/10 rounded-full blur-[100px]"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-3xl mx-auto text-center mb-16 reveal">
            <div class="inline-block px-3 py-1 bg-red-500/10 text-red-400 border border-red-500/20 rounded-full text-xs font-bold uppercase tracking-wider mb-4">Crucial Information</div>
            <h2 class="font-heading text-4xl md:text-5xl font-bold mb-6">Altitude & Health</h2>
            <p class="text-gray-400 text-lg">
                We take safety seriously. Understanding AMS (Acute Mountain Sickness) is the key to a successful trek. We follow the "Climb High, Sleep Low" philosophy.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="dark-glass p-8 rounded-3xl reveal">
                <div class="w-14 h-14 bg-red-500/20 rounded-full flex items-center justify-center text-red-400 text-2xl mb-6">
                    <i class="fas fa-lungs"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Listen to Your Body</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Headaches, nausea, and dizziness are early warning signs. Never ignore them. Inform your guide immediately—they are trained to measure your oxygen saturation.
                </p>
            </div>

            <div class="dark-glass p-8 rounded-3xl reveal delay-100 border-t-4 border-t-blue-500">
                <div class="w-14 h-14 bg-blue-500/20 rounded-full flex items-center justify-center text-blue-400 text-2xl mb-6">
                    <i class="fas fa-tint"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Hydration is Key</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    At altitude, you lose water faster through respiration. Drink at least 3-4 liters of water daily. Avoid alcohol completely during the ascent.
                </p>
            </div>

            <div class="dark-glass p-8 rounded-3xl reveal delay-200">
                <div class="w-14 h-14 bg-green-500/20 rounded-full flex items-center justify-center text-green-400 text-2xl mb-6">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Insurance is Mandatory</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    You must have travel insurance that covers <strong>emergency helicopter evacuation</strong> up to 6,000m. We recommend World Nomads or Global Rescue.
                </p>
            </div>
        </div>

        <div class="bg-white/5 border border-white/10 rounded-3xl p-8 md:p-12 flex flex-col md:flex-row items-center gap-10 reveal">
            <div class="w-full md:w-1/3">
                <h3 class="text-3xl font-heading font-bold mb-2">Fitness Levels</h3>
                <p class="text-gray-400">Be honest about your capability.</p>
            </div>
            <div class="w-full md:w-2/3 grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="p-4 bg-white/5 rounded-2xl text-center">
                    <span class="block text-green-400 font-bold mb-1">Easy</span>
                    <span class="text-xs text-gray-400">4-5 hours walk/day<br>Low altitude</span>
                </div>
                <div class="p-4 bg-white/5 rounded-2xl text-center border border-blue-500/30">
                    <span class="block text-blue-400 font-bold mb-1">Moderate</span>
                    <span class="text-xs text-gray-400">5-7 hours walk/day<br>Steep terrain</span>
                </div>
                <div class="p-4 bg-white/5 rounded-2xl text-center">
                    <span class="block text-orange-400 font-bold mb-1">Challenging</span>
                    <span class="text-xs text-gray-400">7+ hours walk/day<br>High passes (>5000m)</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="faq" class="py-24 bg-white font-body scroll-mt-24">
    <div class="container mx-auto px-6 max-w-4xl">
        <h2 class="font-heading text-4xl font-bold text-center text-slate-900 mb-16 reveal">Common Questions</h2>

        <div class="space-y-4 reveal">
            <?php
            $faqs = [
                ['q' => 'Do I need a guide, or can I trek solo?', 'a' => 'As of 2023, the Nepal government has mandated guides for almost all trekking regions to ensure safety. Beyond rules, a guide enriches your cultural experience and manages logistics.'],
                ['q' => 'What is the accommodation like?', 'a' => 'We stay in "Teahouses" — local family-run lodges. They are simple but cozy. Expect twin beds, thick blankets, and a communal dining hall with a fire. Toilets are often shared, though attached bathrooms are becoming common in lower altitudes.'],
                ['q' => 'Is electricity and WiFi available?', 'a' => 'Yes, but it costs extra. Teahouses charge small fees ($2-$5) to charge devices or use WiFi. Pro tip: Bring a high-capacity power bank and enjoy a digital detox!'],
                ['q' => 'What happens if I get sick?', 'a' => 'Our guides are trained to assess your health daily. If it is minor, we rest. If it is AMS or serious injury, we coordinate a helicopter evacuation immediately (which is why insurance is mandatory).'],
                ['q' => 'How much cash should I carry?', 'a' => 'Most packages cover food and sleep. However, carry approx $15-$20 USD per day in Nepali Rupees for extras like hot showers, charging, chocolate bars, beer, and tips for the crew.'],
            ];
            
            foreach($faqs as $index => $faq):
            ?>
            <div class="border border-gray-100 rounded-2xl overflow-hidden">
                <button class="faq-toggle w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors">
                    <span class="font-bold text-lg text-slate-900"><?= $faq['q'] ?></span>
                    <span class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 transition-transform duration-300 icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-content h-0 overflow-hidden transition-all duration-300">
                    <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                        <?= $faq['a'] ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-24 bg-slate-900 text-white font-body text-center">
    <div class="container mx-auto px-6 reveal">
        <h2 class="font-heading text-4xl md:text-5xl font-bold mb-6">Still have questions?</h2>
        <p class="text-xl text-gray-400 mb-10">Our team in Kathmandu is ready to help you plan every detail.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <a href="/contact" class="px-8 py-4 bg-white text-slate-900 rounded-full font-bold hover:scale-105 transition-transform">Contact Us</a>
            <a href="https://wa.me/9779843183934" class="px-8 py-4 border border-white/20 rounded-full font-bold hover:bg-white/10 transition-colors flex items-center justify-center gap-2">
                <i class="fab fa-whatsapp"></i> Chat on WhatsApp
            </a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Scroll Reveal Animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        // 2. FAQ Accordion Logic
        const toggles = document.querySelectorAll('.faq-toggle');
        toggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const content = toggle.nextElementSibling;
                const icon = toggle.querySelector('.icon i');
                
                // Close others (optional - for accordion style)
                document.querySelectorAll('.faq-content').forEach(c => {
                    if (c !== content) {
                        c.style.height = "0px";
                        c.previousElementSibling.querySelector('.icon i').classList.replace('fa-minus', 'fa-plus');
                    }
                });

                if (content.style.height && content.style.height !== "0px") {
                    content.style.height = "0px";
                    icon.classList.replace('fa-minus', 'fa-plus');
                } else {
                    content.style.height = content.scrollHeight + "px";
                    icon.classList.replace('fa-plus', 'fa-minus');
                }
            });
        });

        // 3. Scroll Spy for Nav Pill
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('.nav-link');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= (sectionTop - 200)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('active');
                }
            });
        });
    });
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/frontend.php';
?>