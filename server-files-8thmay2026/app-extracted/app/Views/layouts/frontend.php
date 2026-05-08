<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Yeti Routes' ?> - Authentic Himalayan Adventures</title>
    <meta name="description"
        content="<?= $metaDescription ?? 'Experience the Himalayas with Yeti Routes - Expert guides, authentic treks, fair prices.' ?>">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- RemixIcon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Font Awesome (for compatibility) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts - DM Sans & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

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
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', 'Poppins', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .mountain-gradient {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.7) 100%);
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-slate-900 text-white antialiased">

    <!-- Header -->
    <header id="main-header"
        class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-6 py-6 md:px-12 transition-all duration-300">

        <!-- Logo -->
        <a href="<?= $langPrefix ?>/"
            class="font-serif text-2xl md:text-3xl font-bold tracking-wide hover:text-brand-lime transition duration-300">
            <img src="/images/logo.png" alt="Yeti Routes" class="h-12 w-auto object-contain">
        </a>

        <!-- Desktop Navigation (Centered with Glass Effect) -->
        <nav class="hidden lg:block bg-black/30 backdrop-blur-md border border-white/10 rounded-full px-8 py-3">
            <ul class="flex gap-8 text-sm font-medium text-white/80">
                <li><a href="<?= $langPrefix ?>/"
                        class="hover:text-white transition"><?= $trans['nav']['home'] ?? 'Home' ?></a></li>

                <li class="relative group">
                    <a href="<?= $langPrefix ?>/treks" class="hover:text-white transition cursor-pointer">
                        <?= $trans['nav']['treks'] ?? 'Treks & Tours' ?> <i class="ri-arrow-down-s-line text-xs"></i>
                    </a>
                    <!-- Dropdown -->
                    <div
                        class="absolute hidden group-hover:block top-full mt-2 left-0 bg-black/90 backdrop-blur-md border border-white/10 rounded-2xl py-3 w-56 shadow-xl">
                        <a href="<?= $langPrefix ?>/treks/everest"
                            class="block px-5 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">Everest
                            Region</a>
                        <a href="<?= $langPrefix ?>/treks/annapurna"
                            class="block px-5 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">Annapurna
                            Region</a>
                        <a href="<?= $langPrefix ?>/treks/langtang"
                            class="block px-5 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">Langtang
                            Region</a>
                        <a href="<?= $langPrefix ?>/treks/manaslu"
                            class="block px-5 py-2 text-white/80 hover:text-white hover:bg-white/10 transition">Manaslu
                            Region</a>
                        <div class="border-t border-white/10 my-2"></div>
                        <a href="<?= $langPrefix ?>/treks"
                            class="block px-5 py-2 text-brand-lime hover:text-white transition">View All
                            Treks →</a>
                    </div>
                </li>

                <li><a href="<?= $langPrefix ?>/about"
                        class="hover:text-white transition"><?= $trans['nav']['about'] ?? 'About' ?></a></li>
                <li><a href="<?= $langPrefix ?>/guides"
                        class="hover:text-white transition"><?= $trans['nav']['guides'] ?? 'Guides' ?></a></li>
                <li><a href="<?= $langPrefix ?>/travel-info"
                        class="hover:text-white transition"><?= $trans['nav']['travel_info'] ?? 'Travel Info' ?></a>
                </li>
                <li><a href="<?= $langPrefix ?>/blog"
                        class="hover:text-white transition"><?= $trans['nav']['blog'] ?? 'Blog' ?></a></li>
                <li><a href="<?= $langPrefix ?>/contact"
                        class="hover:text-white transition"><?= $trans['nav']['contact'] ?? 'Contact' ?></a></li>

                <!-- Language Switcher -->
                <li class="relative group ml-2">
                    <button class="flex items-center gap-1 hover:text-white transition">
                        <span id="current-lang-display">🇬🇧 EN</span> <i class="ri-arrow-down-s-line text-xs"></i>
                    </button>
                    <div
                        class="absolute hidden group-hover:block top-full mt-2 right-0 bg-black/90 backdrop-blur-md border border-white/10 rounded-xl py-2 w-32 shadow-xl">
                        <a href="#" onclick="changeLang('en'); return false;"
                            class="block px-4 py-2 hover:bg-white/10 transition flex items-center gap-2">🇬🇧 EN</a>
                        <a href="#" onclick="changeLang('fr'); return false;"
                            class="block px-4 py-2 hover:bg-white/10 transition flex items-center gap-2">🇫🇷 FR</a>
                        <a href="#" onclick="changeLang('de'); return false;"
                            class="block px-4 py-2 hover:bg-white/10 transition flex items-center gap-2">🇩🇪 DE</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- CTA Button -->
        <a href="<?= $langPrefix ?>/contact"
            class="group hidden md:flex items-center gap-3 bg-white/20 backdrop-blur-sm border border-white/10 pl-6 pr-2 py-2 rounded-full hover:bg-white/30 transition duration-300">
            <span class="text-sm font-medium"><?= $trans['nav']['book_now'] ?? 'Book Now' ?></span>
            <div
                class="w-8 h-8 bg-white text-slate-900 rounded-full flex items-center justify-center group-hover:rotate-45 transition duration-300">
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
                    <li><a href="<?= $langPrefix ?>/"
                            class="block text-white hover:text-brand-lime transition"><?= $trans['nav']['home'] ?? 'Home' ?></a>
                    </li>
                    <li><a href="<?= $langPrefix ?>/treks"
                            class="block text-white hover:text-brand-lime transition"><?= $trans['nav']['treks'] ?? 'Treks & Tours' ?></a>
                    </li>
                    <li><a href="<?= $langPrefix ?>/about"
                            class="block text-white hover:text-brand-lime transition"><?= $trans['nav']['about'] ?? 'About' ?></a>
                    </li>
                    <li><a href="<?= $langPrefix ?>/guides"
                            class="block text-white hover:text-brand-lime transition"><?= $trans['nav']['guides'] ?? 'Our Guides' ?></a>
                    </li>
                    <li><a href="<?= $langPrefix ?>/travel-info"
                            class="block text-white hover:text-brand-lime transition"><?= $trans['nav']['travel_info'] ?? 'Travel Info' ?></a>
                    </li>
                    <li><a href="<?= $langPrefix ?>/blog"
                            class="block text-white hover:text-brand-lime transition"><?= $trans['nav']['blog'] ?? 'Blog' ?></a>
                    </li>
                    <li><a href="<?= $langPrefix ?>/contact"
                            class="block text-white hover:text-brand-lime transition"><?= $trans['nav']['contact'] ?? 'Contact' ?></a>
                    </li>
                </ul>

                <!-- Mobile CTA -->
                <div class="mt-12">
                    <a href="<?= $langPrefix ?>/contact"
                        class="flex items-center justify-center gap-3 bg-brand-lime text-slate-900 px-8 py-4 rounded-full font-semibold text-lg hover:bg-[#bfff4f] transition">
                        <?= $trans['nav']['book_now'] ?? 'Book Your Trek' ?>
                        <i class="ri-arrow-right-up-line"></i>
                    </a>
                </div>

                <!-- Social Links -->
                <div class="mt-8 flex justify-center gap-4">
                    <a href="#"
                        class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/20 transition">
                        <i class="ri-facebook-fill text-xl"></i>
                    </a>
                    <a href="#"
                        class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/20 transition">
                        <i class="ri-instagram-line text-xl"></i>
                    </a>
                    <a href="https://wa.me/9779841234567"
                        class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center hover:bg-green-600 transition">
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


    <!-- Chat Widget -->
    <?php include __DIR__ . '/../partials/chat-widget.php'; ?>

    <!-- Scripts -->
    <script>
        // Header scroll effect
        const header = document.getElementById('main-header');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                // Darker background used as per request
                header.classList.add('bg-black/90', 'backdrop-blur-lg', 'shadow-md', 'py-4');
                header.classList.remove('py-6');
            } else {
                header.classList.remove('bg-black/90', 'backdrop-blur-lg', 'shadow-md', 'py-4');
                header.classList.add('py-6');
            }
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuClose = document.getElementById('mobile-menu-close');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });

            if (mobileMenuClose) {
                mobileMenuClose.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                });
            }

            // Close mobile menu on link click
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                });
            });
        }

        // Language Switcher Logic
        function changeLang(lang) {
            let path = window.location.pathname;
            let search = window.location.search;

            // Regex to match existing language prefix (/fr or /de) at the start
            // Matches /fr/, /fr, /de/, /de
            let prefixRegex = /^\/(fr|de)(\/|$)/;

            // Remove existing prefix -> returns '/' or '/about'
            let cleanPath = path.replace(prefixRegex, '/');

            // Ensure single leading slash
            if (!cleanPath.startsWith('/')) cleanPath = '/' + cleanPath;

            let newPath = cleanPath;
            if (lang !== 'en') {
                // Prepend new language
                // If cleanPath is '/', result should be '/fr' (or '/fr/')
                // If cleanPath is '/about', result should be '/fr/about'
                newPath = '/' + lang + cleanPath;
            }

            // Clean up any double slashes (e.g. /fr// -> /fr/)
            newPath = newPath.replace(/\/\//g, '/');

            // Remove trailing slash if it's not just the root lang path '/fr/' (optional preference)
            // But let's keep it simple.

            window.location.href = newPath + search;
        }

        // Update current language display
        document.addEventListener('DOMContentLoaded', () => {
            const path = window.location.pathname;
            const display = document.getElementById('current-lang-display');
            if (display) {
                if (path.startsWith('/fr')) {
                    display.innerText = '🇫🇷 FR';
                } else if (path.startsWith('/de')) {
                    display.innerText = '🇩🇪 DE';
                } else {
                    display.innerText = '🇬🇧 EN';
                }
            }
        });
    </script>
</body>

</html>