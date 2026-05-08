<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Admin Panel' ?> - Yeti Routes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        .sidebar {
            transition: all 0.3s ease;
        }

        .sidebar-collapsed {
            width: 4rem;
        }

        /* Neo Glassmorphism Utilities */
        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .glass-dark {
            background: rgba(17, 24, 39, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar glass-dark text-white w-64 flex-shrink-0 overflow-y-auto z-20">
            <div class="p-4 flex justify-center">
                <a href="/admin">
                    <img src="/images/logo.png" alt="Yeti Routes" class="h-12 w-auto object-contain">
                </a>
            </div>

            <nav class="mt-6">
                <a href="/admin" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-home w-6"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
                <a href="/admin/inquiries" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 relative">
                    <i class="fas fa-envelope-open-text w-6"></i>
                    <span class="ml-3">Inquiries</span>
                </a>
                <a href="/admin/routes" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-route w-6"></i>
                    <span class="ml-3">Routes</span>
                </a>
                <a href="/admin/bookings" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-ticket-alt w-6"></i>
                    <span class="ml-3">Bookings</span>
                </a>
                <a href="/admin/users" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-users w-6"></i>
                    <span class="ml-3">Users</span>
                </a>
                <a href="/admin/locations" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-map-marker-alt w-6"></i>
                    <span class="ml-3">Locations</span>
                </a>
                <a href="/admin/blog" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-blog w-6"></i>
                    <span class="ml-3">Blog</span>
                </a>
                <a href="/admin/media" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-images w-6"></i>
                    <span class="ml-3">Media Library</span>
                </a>

                <div class="mt-6 border-t border-gray-700 pt-4">
                    <a href="/admin/logout" class="flex items-center px-4 py-3 text-gray-300 hover:bg-red-800">
                        <i class="fas fa-sign-out-alt w-6"></i>
                        <span class="ml-3">Logout</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="glass shadow-sm z-10 sticky top-0">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <button id="sidebarToggle" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h2 class="ml-4 text-xl font-semibold text-gray-800">
                            <?= $pageTitle ?? 'Dashboard' ?>
                        </h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Language Switcher -->
                        <div class="relative group">
                            <button class="flex items-center gap-1 text-gray-600 hover:text-gray-900 transition">
                                <span id="admin-current-lang-display">🇬🇧 EN</span> <i
                                    class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div
                                class="absolute hidden group-hover:block top-full mt-2 right-0 bg-white border border-gray-200 rounded-lg py-2 w-32 shadow-lg z-50">
                                <a href="#" onclick="changeLang('en'); return false;"
                                    class="block px-4 py-2 hover:bg-gray-100 transition flex items-center gap-2 text-gray-700">🇬🇧
                                    English</a>
                                <a href="#" onclick="changeLang('fr'); return false;"
                                    class="block px-4 py-2 hover:bg-gray-100 transition flex items-center gap-2 text-gray-700">🇫🇷
                                    Français</a>
                                <a href="#" onclick="changeLang('de'); return false;"
                                    class="block px-4 py-2 hover:bg-gray-100 transition flex items-center gap-2 text-gray-700">🇩🇪
                                    Deutsch</a>
                            </div>
                        </div>
                        <span class="text-gray-700">
                            <i class="fas fa-user-circle"></i>
                            <?= htmlspecialchars($current_user->full_name ?? 'Admin') ?>
                        </span>
                    </div>
                </div>
            </header>

            <!-- Flash Messages -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mx-6 mt-4" role="alert">
                    <p><?= htmlspecialchars($_SESSION['success']) ?></p>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mx-6 mt-4" role="alert">
                    <p><?= htmlspecialchars($_SESSION['error']) ?></p>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-transparent p-6">
                <?php echo $content ?? ''; ?>
            </main>
        </div>
    </div>

    <script>
        // Sidebar toggle
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('sidebar-collapsed');
        });

        // Language Switcher Logic
        function changeLang(lang) {
            let path = window.location.pathname;
            // Remove existing lang prefix if any
            path = path.replace(/^\/(fr|de)(\/|$)/, '/');

            if (lang !== 'en') {
                if (path === '/') path = '';
                path = '/' + lang + path;
            }
            if (path === '') path = '/';

            window.location.href = path + window.location.search;
        }

        // Update current language display
        document.addEventListener('DOMContentLoaded', () => {
            const path = window.location.pathname;
            const display = document.getElementById('admin-current-lang-display');
            if (path.startsWith('/fr')) {
                display.innerText = '🇫🇷 FR';
            } else if (path.startsWith('/de')) {
                display.innerText = '🇩🇪 DE';
            } else {
                display.innerText = '🇬🇧 EN';
            }
        });
    </script>
</body>

</html>