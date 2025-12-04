<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Yeti Routes' ?> - Authentic Himalayan Adventures</title>
    <meta name="description" content="<?= $metaDescription ?? 'Experience the Himalayas with Yeti Routes - Expert guides, authentic treks, fair prices.' ?>">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- RemixIcon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Font Awesome (for compatibility) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts - DM Sans & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"DM Sans"', '"Poppins"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                    },
                    colors: {
                        'brand-lime': '#a3e635',
                        'brand-blue': '#4A5FFF',
                        'brand-purple': '#764BA2',
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'DM Sans', 'Poppins', sans-serif; }
        .hero-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .mountain-gradient { background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.7) 100%); }
        .hover-scale { transition: transform 0.3s ease; }
        .hover-scale:hover { transform: scale(1.05); }
    </style>
</head>
<body class="bg-slate-900 text-white antialiased">

    <!-- Header -->
    <header id="main-header" class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-6 py-6 md:px-12 transition-all duration-300">

        <!-- Logo -->
        <a href="/" class="font-serif text-2xl md:text-3xl font-bold tracking-wide hover:text-brand-lime transition duration-300">
            <i class="ri-mountains-line"></i> Yeti Routes
        </a>

        <!-- Desktop Navigation (Centered with Glass Effect) -->
        <nav class="hidden lg:block bg-black/30 backdrop-blur-md border border-white/10 rounded-full px-8 py-3">
            <ul class="flex gap-8 text-sm font-medium text-white/80">
                <li><a href="/" class="hover:text-white transition">Home</a></li>

                <li class="relative group">
                    <a href="/treks" class="hover:text-white transition cursor-pointer">
                        Treks <i class="ri-arrow-down-s-line text-xs"></i>
                    </a>
                    <!-- Dropdown -->
                    <div class="absolute hidden group-hover:block top-full mt-2 left-0 bg-black/90 backdrop-blur-md border border-white/10 rounded-2xl py-3 w-56 shadow-xl">
                        <a href="/treks/everest" class="block px-5 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">Everest Region</a>
                        <a href="/treks/annapurna" class="block px-5 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">Annapurna Region</a>
                        <a href="/treks/langtang" class="block px-5 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">Langtang Region</a>
                        <a href="/treks/manaslu" class="block px-5 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">Manaslu Region</a>
                        <div class="border-t border-white/10 my-2"></div>
                        <a href="/treks" class="block px-5 py-2 text-brand-lime hover:text-white transition">View All Treks →</a>
                    </div>
                </li>

                <li><a href="/about" class="hover:text-white transition">About</a></li>
                <li><a href="/guides" class="hover:text-white transition">Guides</a></li>
                <li><a href="/travel-info" class="hover:text-white transition">Travel Info</a></li>
                <li><a href="/blog" class="hover:text-white transition">Blog</a></li>
                <li><a href="/contact" class="hover:text-white transition">Contact</a></li>
            </ul>
        </nav>

        <!-- CTA Button -->
        <a href="/contact" class="group hidden md:flex items-center gap-3 bg-white/20 backdrop-blur-sm border border-white/10 pl-6 pr-2 py-2 rounded-full hover:bg-white/30 transition duration-300">
            <span class="text-sm font-medium">Book Now</span>
            <div class="w-8 h-8 bg-white text-slate-900 rounded-full flex items-center justify-center group-hover:rotate-45 transition duration-300">
                <i class="ri-arrow-right-up-line"></i>
            </div>
        </a>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="md:hidden text-white">
            <i class="ri-menu-line text-3xl"></i>
        </button>
    </header>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 bg-slate-900/95 backdrop-blur-lg z-40 hidden md:hidden">
        <div class="flex flex-col h-full">
            <!-- Close Button -->
            <div class="flex justify-end p-6">
                <button id="mobile-menu-close" class="text-white">
                    <i class="ri-close-line text-3xl"></i>
                </button>
            </div>

            <!-- Menu Items -->
            <nav class="flex-1 px-8 py-4">
                <ul class="space-y-6 text-2xl font-medium">
                    <li><a href="/" class="block text-white hover:text-brand-lime transition">Home</a></li>
                    <li><a href="/treks" class="block text-white hover:text-brand-lime transition">Treks & Tours</a></li>
                    <li><a href="/about" class="block text-white hover:text-brand-lime transition">About</a></li>
                    <li><a href="/guides" class="block text-white hover:text-brand-lime transition">Our Guides</a></li>
                    <li><a href="/travel-info" class="block text-white hover:text-brand-lime transition">Travel Info</a></li>
                    <li><a href="/blog" class="block text-white hover:text-brand-lime transition">Blog</a></li>
                    <li><a href="/contact" class="block text-white hover:text-brand-lime transition">Contact</a></li>
                </ul>

                <!-- Mobile CTA -->
                <div class="mt-12">
                    <a href="/contact" class="flex items-center justify-center gap-3 bg-brand-lime text-slate-900 px-8 py-4 rounded-full font-semibold text-lg hover:bg-[#bfff4f] transition">
                        Book Your Trek
                        <i class="ri-arrow-right-up-line"></i>
                    </a>
                </div>

                <!-- Social Links -->
                <div class="mt-8 flex justify-center gap-4">
                    <a href="#" class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/20 transition">
                        <i class="ri-facebook-fill text-xl"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/20 transition">
                        <i class="ri-instagram-line text-xl"></i>
                    </a>
                    <a href="https://wa.me/9779841234567" class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center hover:bg-green-600 transition">
                        <i class="ri-whatsapp-line text-xl"></i>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        <?= $content ?? '' ?>
    </main>
<?php include 'footer.php'; ?>
   

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/9779841234567" target="_blank" class="fixed bottom-6 right-6 w-14 h-14 bg-brand-lime text-slate-900 rounded-full flex items-center justify-center shadow-lg hover:bg-[#bfff4f] hover:rotate-45 transition transform duration-300 z-50">
        <i class="ri-whatsapp-line text-2xl"></i>
    </a>

    <!-- Scripts -->
    <script>
        // Header scroll effect
        const header = document.getElementById('main-header');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('bg-black/80', 'backdrop-blur-lg', 'shadow-md', 'py-4');
                header.classList.remove('py-6');
            } else {
                header.classList.remove('bg-black/80', 'backdrop-blur-lg', 'shadow-md', 'py-4');
                header.classList.add('py-6');
            }
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuClose = document.getElementById('mobile-menu-close');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        mobileMenuClose.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });

        // Close mobile menu on link click
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>
