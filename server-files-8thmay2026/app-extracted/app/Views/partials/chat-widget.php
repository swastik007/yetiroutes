<?php
// Generate unique visitor ID if not exists
if (!isset($_SESSION['chat_visitor_id'])) {
    $_SESSION['chat_visitor_id'] = bin2hex(random_bytes(16));
}
$visitorId = $_SESSION['chat_visitor_id'];
?>

<div id="inquiry-widget"
    class="fixed bottom-6 right-6 z-50 flex flex-col items-end md:bottom-6 md:right-6 sm:bottom-4 sm:right-4 font-sans">

    <!-- Inquiry Box -->
    <div id="inquiry-box"
        class="hidden flex-col mb-4 w-[350px] max-w-[calc(100vw-2rem)] bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden transform origin-bottom-right transition-all duration-300 ease-out">

        <!-- Header -->
        <div class="relative bg-slate-900 overflow-hidden p-0 rounded-t-2xl shrink-0">
            <!-- Decorative background elements -->
            <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-brand-lime opacity-20 blur-xl">
            </div>
            <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-32 h-32 rounded-full bg-blue-500 opacity-20 blur-xl">
            </div>

            <div class="relative z-10 px-5 py-6 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-lime to-green-400 flex items-center justify-center text-brand-dark font-bold shadow-lg">
                            <i class="ri-question-answer-fill text-slate-900"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-white tracking-wide text-lg">Quick Inquiry</h3>
                        <p class="text-xs text-gray-300">We usually reply within 24 hours</p>
                    </div>
                </div>

                <button id="inquiry-close"
                    class="w-8 h-8 flex items-center justify-center rounded-full text-gray-400 hover:text-white hover:bg-white/10 transition-colors">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Inquiry Form -->
        <div id="inquiry-form-container" class="p-6 bg-gray-50">

            <div id="inquiry-success-message"
                class="hidden flex-col items-center justify-center py-8 text-center animate-fade-in">
                <div
                    class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 text-green-500 text-3xl">
                    <i class="ri-check-line"></i>
                </div>
                <h4 class="font-bold text-slate-800 text-xl mb-2">Inquiry Sent!</h4>
                <p class="text-slate-600 text-sm mb-6">Thank you for reaching out. Our team will get back to you
                    shortly.</p>
                <button type="button" id="inquiry-reset-btn"
                    class="px-6 py-2 bg-slate-200 hover:bg-slate-300 rounded-lg text-slate-700 font-medium text-sm transition">
                    Send Another
                </button>
            </div>

            <form id="inquiry-form" class="space-y-4">
                <div class="grid grid-cols-2 gap-3">
                    <div class="group relative">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Name</label>
                        <input type="text" name="name"
                            class="w-full px-3 py-2.5 bg-white text-gray-900 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand-lime/50 focus:border-brand-lime transition-all relative z-10"
                            placeholder="Your name" required>
                    </div>
                    <div class="group relative">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Email</label>
                        <input type="email" name="email"
                            class="w-full px-3 py-2.5 bg-white text-gray-900 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand-lime/50 focus:border-brand-lime transition-all relative z-10"
                            placeholder="email@example.com" required>
                    </div>
                </div>

                <div class="group relative">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Interested
                        Service</label>
                    <select name="trek_interest"
                        class="w-full px-3 py-2.5 bg-white text-gray-900 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand-lime/50 focus:border-brand-lime transition-all appearance-none cursor-pointer relative z-10">
                        <option value="General Inquiry" class="text-gray-900">General Inquiry</option>
                        <option value="Everest Region" class="text-gray-900">Everest Region</option>
                        <option value="Annapurna Region" class="text-gray-900">Annapurna Region</option>
                        <option value="Langtang Region" class="text-gray-900">Langtang Region</option>
                        <option value="Manaslu Region" class="text-gray-900">Manaslu Region</option>
                        <option value="Custom Trip" class="text-gray-900">Custom Trip Planning</option>
                    </select>
                </div>

                <div class="group relative">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Message</label>
                    <textarea name="message" rows="3"
                        class="w-full px-3 py-2.5 bg-white text-gray-900 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand-lime/50 focus:border-brand-lime transition-all resize-none relative z-10"
                        placeholder="How can we help you plan your adventure?" required></textarea>
                </div>

                <button type="submit"
                    class="w-full mt-2 bg-slate-900 text-white py-3.5 rounded-xl font-bold text-sm shadow-lg shadow-gray-200 hover:shadow-xl hover:bg-black transition-all transform active:scale-[0.98] flex justify-center items-center gap-2">
                    <span>Submit Inquiry</span>
                    <i class="ri-send-plane-fill"></i>
                </button>
            </form>

            <p class="mt-4 text-center text-[10px] text-gray-400">
                Securely sent directly to our support team.
            </p>
        </div>
    </div>

    <!-- Toggle Button -->
    <div class="relative group animate-bounce-slow"
        style="animation-duration: 4s; animation-iteration-count: infinite;">
        <button id="inquiry-toggle"
            class="relative w-16 h-16 rounded-full bg-slate-900 text-white flex items-center justify-center shadow-2xl hover:bg-black transition-all duration-300 hover:scale-110 active:scale-95 z-50 overflow-hidden border-2 border-white/20">

            <!-- Animated Background Rings -->
            <div
                class="absolute inset-0 rounded-full bg-brand-lime opacity-0 group-hover:opacity-20 transition-opacity duration-500">
            </div>

            <!-- Icon -->
            <div class="relative z-10 transition-transform duration-300 group-hover:rotate-12">
                <i class="ri-question-answer-line text-3xl"></i>
            </div>
        </button>

        <!-- Tooltip -->
        <div
            class="absolute right-full mr-4 top-1/2 transform -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none z-50">
            <div
                class="bg-white text-slate-800 px-4 py-2 rounded-xl text-sm whitespace-nowrap shadow-xl border border-gray-100 font-bold">
                Have a question?
                <div
                    class="absolute left-full top-1/2 transform -translate-y-1/2 border-8 border-transparent border-l-white">
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.3s ease-out forwards;
    }

    .animate-bounce-slow {
        animation: bounce 3s infinite;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('inquiry-toggle');
        const closeBtn = document.getElementById('inquiry-close');
        const box = document.getElementById('inquiry-box');
        const form = document.getElementById('inquiry-form');
        const successMsg = document.getElementById('inquiry-success-message');
        const resetBtn = document.getElementById('inquiry-reset-btn');

        if (toggleBtn && box) {
            // Toggle Logic
            toggleBtn.addEventListener('click', () => {
                box.classList.toggle('hidden');
                box.classList.toggle('flex');
                // Remove bounce animation on first click
                toggleBtn.parentElement.style.animation = 'none';
            });

            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    box.classList.add('hidden');
                    box.classList.remove('flex');
                });
            }

            // Form Submission Logic
            if (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    // Show loading state
                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalBtnText = submitBtn.innerHTML;
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="ri-loader-4-line animate-spin text-xl"></i> Sending...';

                    const formData = new FormData(form);
                    // Append inquiry type manually as it's not in the form fields (or could be hidden input)
                    formData.append('inquiry_type', 'quick_inquiry');

                    // Using fetch to submit to ContactController
                    fetch('/contact/submit', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(text => {
                            try {
                                const data = JSON.parse(text);
                                if (data.success) {
                                    // Show success
                                    form.classList.add('hidden');
                                    if (successMsg) {
                                        successMsg.classList.remove('hidden');
                                        successMsg.classList.add('flex');
                                    }
                                } else {
                                    alert(data.message || 'Something went wrong. Please try again.');
                                }
                            } catch (e) {
                                console.error('Server Response Error:', text);
                                alert('Server Error (Not JSON): ' + text.substring(0, 200));
                            }
                        })
                        .catch(error => {
                            console.error('Network Error:', error);
                            alert('Network Error: ' + error.message);
                        })
                        .finally(() => {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnText;
                        });
                });
            }

            // Reset Logic
            if (resetBtn) {
                resetBtn.addEventListener('click', () => {
                    form.reset();
                    if (successMsg) successMsg.classList.add('hidden');
                    if (successMsg) successMsg.classList.remove('flex');
                    form.classList.remove('hidden');
                });
            }
        }
    });
</script>