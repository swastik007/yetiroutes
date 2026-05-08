<?php
$pageTitle = 'Start Your Journey | Yeti Routes';
$metaDescription = 'Contact Yeti Routes. Whether you need a custom itinerary or just want to say Namaste, we are here.';
ob_start();
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap');

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

    /* Dark Glass Card */
    .dark-glass {
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.01) 100%);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }
    
    .dark-glass:hover {
        border-color: rgba(255, 255, 255, 0.1);
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0.02) 100%);
        transform: translateY(-5px);
    }

    /* Input Styling */
    .form-input {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    .form-input:focus {
        background: #ffffff;
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        outline: none;
    }
</style>

<section class="relative h-[60vh] flex items-center justify-center overflow-hidden font-body">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1544634076-a90160bcad7b?w=1920&q=80" alt="Tea in Himalayas" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/40 to-[#0B1120]"></div>
    </div>
    
    <div class="relative z-10 text-center px-4 reveal active">
        <span class="text-blue-400 font-bold tracking-[0.2em] text-xs uppercase mb-4 block">We are listening</span>
        <h1 class="font-heading text-5xl md:text-7xl font-bold text-white mb-6">Let's Start the Conversation</h1>
        <p class="text-xl text-gray-200 max-w-2xl mx-auto font-light border-l-2 border-blue-500 pl-6 text-left md:text-center md:border-none md:pl-0">
            Whether you have a fully formed itinerary or just a vague dream of mountains, we're here to make it happen.
        </p>
    </div>
</section>

<section class="relative py-24 bg-[#0B1120] font-body overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-green-600/10 rounded-full blur-[100px]"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <a href="https://wa.me/9779843183934?text=Hi%2C%20I%27m%20interested%20in%20trekking%20in%20Nepal" target="_blank" class="dark-glass p-8 rounded-3xl group transition-all duration-500 reveal">
                <div class="w-14 h-14 bg-green-500/20 rounded-2xl flex items-center justify-center text-green-400 text-3xl mb-6 group-hover:scale-110 transition-transform">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <h3 class="text-white text-xl font-bold mb-2">WhatsApp</h3>
                <p class="text-gray-400 text-sm mb-4">Fastest way to reach us.</p>
                <span class="text-green-400 text-sm font-bold flex items-center gap-2 group-hover:gap-3 transition-all">Chat Now <i class="fas fa-arrow-right"></i></span>
            </a>

            <a href="tel:+9779843183934" class="dark-glass p-8 rounded-3xl group transition-all duration-500 reveal delay-100">
                <div class="w-14 h-14 bg-blue-500/20 rounded-2xl flex items-center justify-center text-blue-400 text-3xl mb-6 group-hover:rotate-12 transition-transform">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3 class="text-white text-xl font-bold mb-2">Call Us</h3>
                <p class="text-gray-400 text-sm mb-4">Mon-Sat, 9AM - 6PM NPT</p>
                <span class="text-blue-400 text-sm font-bold flex items-center gap-2 group-hover:gap-3 transition-all">+977 9843-183934 <i class="fas fa-arrow-right"></i></span>
            </a>

            <a href="mailto:info@yetiroutes.com" class="dark-glass p-8 rounded-3xl group transition-all duration-500 reveal delay-200">
                <div class="w-14 h-14 bg-purple-500/20 rounded-2xl flex items-center justify-center text-purple-400 text-3xl mb-6 group-hover:translate-y-[-5px] transition-transform">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <h3 class="text-white text-xl font-bold mb-2">Email</h3>
                <p class="text-gray-400 text-sm mb-4">For detailed itineraries.</p>
                <div class="flex flex-col gap-1">
                    <span class="text-purple-400 text-sm font-bold flex items-center gap-2 group-hover:gap-3 transition-all">info@yetiroutes.com <i class="fas fa-arrow-right"></i></span>
                    <span class="text-purple-300 text-xs">yetiroutes@gmail.com</span>
                </div>
            </a>

            <div class="dark-glass p-8 rounded-3xl group transition-all duration-500 reveal delay-300">
                <div class="w-14 h-14 bg-orange-500/20 rounded-2xl flex items-center justify-center text-orange-400 text-3xl mb-6">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h3 class="text-white text-xl font-bold mb-2">Visit Us</h3>
                <p class="text-gray-400 text-sm">Thamel, Kathmandu<br>Opposite Garden of Dreams</p>
            </div>

        </div>
    </div>
</section>

<section class="py-24 bg-white font-body">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-16">
            
            <div class="w-full lg:w-1/3 reveal">
                <span class="text-blue-600 font-bold uppercase tracking-wider text-sm">Plan Your Trip</span>
                <h2 class="font-heading text-4xl font-bold text-slate-900 mt-2 mb-6">Tell us about your dream adventure.</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Filling out this form is the first step towards the Himalayas. We don't use automated bots; a real human expert (likely a guide) will read this and reply.
                </p>

                <div class="bg-gray-50 p-8 rounded-3xl space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 shrink-0"><i class="fas fa-clock"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-900">24-Hour Response</h4>
                            <p class="text-sm text-gray-500">We respect your time.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 shrink-0"><i class="fas fa-pencil-ruler"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-900">Custom Itineraries</h4>
                            <p class="text-sm text-gray-500">Tailored to your fitness & budget.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 shrink-0"><i class="fas fa-comment-dollar"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-900">No Hidden Costs</h4>
                            <p class="text-sm text-gray-500">Transparent pricing, always.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-2/3 reveal delay-100">
                <form id="contactForm" method="POST" action="/contact/submit" class="bg-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Name</label>
                            <input type="text" id="name" name="name" required class="form-input w-full px-4 py-3 rounded-xl" placeholder="Your full name">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" required class="form-input w-full px-4 py-3 rounded-xl" placeholder="hello@example.com">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">WhatsApp / Phone</label>
                            <input type="tel" id="phone" name="phone" class="form-input w-full px-4 py-3 rounded-xl" placeholder="+1 (555) 000-0000">
                        </div>
                        <div>
                            <label for="nationality" class="block text-sm font-bold text-gray-700 mb-2">Nationality</label>
                            <input type="text" id="nationality" name="nationality" class="form-input w-full px-4 py-3 rounded-xl" placeholder="e.g. Australian">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label for="trek_interest" class="block text-sm font-bold text-gray-700 mb-2">Interested In</label>
                            <div class="relative">
                                <select id="trek_interest" name="trek_interest" class="form-input w-full px-4 py-3 rounded-xl appearance-none bg-white">
                                    <option value="">Select Adventure...</option>
                                    <option value="everest-base-camp">Everest Base Camp</option>
                                    <option value="annapurna-circuit">Annapurna Circuit</option>
                                    <option value="langtang-valley">Langtang Valley</option>
                                    <option value="manaslu-circuit">Manaslu Circuit</option>
                                    <option value="custom">Custom / Other</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500"><i class="fas fa-chevron-down text-xs"></i></div>
                            </div>
                        </div>
                        <div>
                            <label for="travel_date" class="block text-sm font-bold text-gray-700 mb-2">Rough Date</label>
                            <input type="date" id="travel_date" name="travel_date" class="form-input w-full px-4 py-3 rounded-xl text-gray-500">
                        </div>
                        <div>
                            <label for="group_size" class="block text-sm font-bold text-gray-700 mb-2">Group Size</label>
                            <div class="relative">
                                <select id="group_size" name="group_size" class="form-input w-full px-4 py-3 rounded-xl appearance-none bg-white">
                                    <option value="solo">Solo</option>
                                    <option value="2">Couple (2)</option>
                                    <option value="3-5">Small Group (3-5)</option>
                                    <option value="6-10">Medium Group (6-10)</option>
                                    <option value="10+">Large Group (10+)</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500"><i class="fas fa-chevron-down text-xs"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label for="message" class="block text-sm font-bold text-gray-700 mb-2">How can we help?</label>
                        <textarea id="message" name="message" rows="4" required class="form-input w-full px-4 py-3 rounded-xl" placeholder="Tell us about your fitness level, specific interests, or any questions..."></textarea>
                    </div>

                    <button type="submit" class="group w-full md:w-auto bg-slate-900 text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-blue-600 transition-all duration-300 shadow-xl hover:shadow-blue-500/30 flex items-center justify-center gap-2">
                        Send Message
                        <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform"></i>
                    </button>

                    <div id="formMessage" class="mt-6 hidden p-4 rounded-xl text-sm font-medium"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-gray-50 font-body">
    <div class="container mx-auto px-6 text-center mb-12">
        <h2 class="font-heading text-4xl font-bold text-slate-900">Find us in Kathmandu</h2>
    </div>
    
    <div class="relative h-[500px] w-full reveal">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 w-[90%] max-w-sm">
            <div class="bg-white/90 backdrop-blur-md p-8 rounded-3xl shadow-2xl border border-white">
                <div class="text-blue-600 text-3xl mb-4"><i class="fas fa-map-pin"></i></div>
                <h3 class="font-bold text-xl mb-2">Yeti Routes HQ</h3>
                <p class="text-gray-600 mb-6">Tridevi Marg, Thamel<br>Kathmandu 44600, Nepal</p>
                <a href="https://maps.google.com" target="_blank" class="text-sm font-bold text-blue-600 hover:text-blue-800 uppercase tracking-wider flex items-center gap-2">
                    Get Directions <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
        </div>

        <iframe
            src="http://maps.google.com/maps?q=Thamel,+Kathmandu&z=15&output=embed"
            width="100%"
            height="100%"
            style="border:0; filter: grayscale(100%) contrast(1.2);"
            allowfullscreen=""
            loading="lazy"
            class="w-full h-full object-cover">
        </iframe>
        <div class="absolute inset-0 bg-blue-900/10 pointer-events-none"></div>
    </div>
</section>

<section class="py-24 bg-white font-body">
    <div class="container mx-auto px-6 max-w-4xl">
        <h2 class="font-heading text-4xl font-bold text-center text-slate-900 mb-16 reveal">Common Questions</h2>

        <div class="space-y-4 reveal">
            <div class="border border-gray-100 rounded-2xl overflow-hidden group">
                <button class="faq-toggle w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors">
                    <span class="font-bold text-lg text-slate-900">How do I book a trek?</span>
                    <span class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 transition-transform duration-300 icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-content h-0 overflow-hidden transition-all duration-300">
                    <div class="px-8 pb-8 text-gray-600 border-t border-gray-100 pt-4">
                        <p>Fill out the form above! We'll send a quote within 24 hours. Once you confirm, a 25% deposit secures your booking.</p>
                    </div>
                </div>
            </div>

            <div class="border border-gray-100 rounded-2xl overflow-hidden group">
                <button class="faq-toggle w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors">
                    <span class="font-bold text-lg text-slate-900">Can you create custom itineraries?</span>
                    <span class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 transition-transform duration-300 icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-content h-0 overflow-hidden transition-all duration-300">
                    <div class="px-8 pb-8 text-gray-600 border-t border-gray-100 pt-4">
                        <p>Absolutely. Custom treks are our specialty. Tell us your dates and fitness level, and we'll design the rest.</p>
                    </div>
                </div>
            </div>

            <div class="border border-gray-100 rounded-2xl overflow-hidden group">
                <button class="faq-toggle w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors">
                    <span class="font-bold text-lg text-slate-900">What is your cancellation policy?</span>
                    <span class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 transition-transform duration-300 icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-content h-0 overflow-hidden transition-all duration-300">
                    <div class="px-8 pb-8 text-gray-600 border-t border-gray-100 pt-4">
                        <p>We offer full refunds (minus processing fees) for cancellations made 30+ days before departure.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-slate-900 text-center font-body">
    <div class="container mx-auto px-6 reveal">
        <p class="text-blue-400 font-bold tracking-widest text-xs uppercase mb-6">Join the Community</p>
        <div class="flex justify-center gap-6">
            <a href="#" class="w-12 h-12 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-blue-600 hover:border-blue-600 transition-all"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="w-12 h-12 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-pink-600 hover:border-pink-600 transition-all"><i class="fab fa-instagram"></i></a>
            <a href="#" class="w-12 h-12 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-red-600 hover:border-red-600 transition-all"><i class="fab fa-youtube"></i></a>
            <a href="#" class="w-12 h-12 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-green-600 hover:border-green-600 transition-all"><i class="fab fa-tripadvisor"></i></a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Scroll Reveal
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('active');
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // 2. FAQ Accordion
    const toggles = document.querySelectorAll('.faq-toggle');
    toggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const content = toggle.nextElementSibling;
            const icon = toggle.querySelector('.icon i');
            
            // Close others
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

    // 3. Form Submission
    document.getElementById('contactForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const messageDiv = document.getElementById('formMessage');
        const submitBtn = e.target.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;

        // Loading State
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';

        try {
            const response = await fetch('/contact/submit', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();

            messageDiv.classList.remove('hidden', 'bg-red-100', 'text-red-700', 'bg-green-100', 'text-green-700');

            if (result.success) {
                messageDiv.classList.add('bg-green-100', 'text-green-700');
                messageDiv.innerHTML = '<i class="fas fa-check-circle mr-2"></i> Message sent! We will contact you shortly.';
                e.target.reset();
            } else {
                throw new Error(result.message);
            }
        } catch (error) {
            messageDiv.classList.add('bg-red-100', 'text-red-700');
            messageDiv.innerHTML = '<i class="fas fa-exclamation-circle mr-2"></i> ' + (error.message || 'Error sending message. Please try WhatsApp.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
            messageDiv.classList.remove('hidden');
        }
    });
});
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/frontend.php';
?>