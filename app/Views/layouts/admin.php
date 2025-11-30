<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Admin Panel' ?> - Yeti Routes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar { transition: all 0.3s ease; }
        .sidebar-collapsed { width: 4rem; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar bg-gray-900 text-white w-64 flex-shrink-0 overflow-y-auto">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-center">Yeti Routes</h1>
                <p class="text-xs text-gray-400 text-center">Admin Panel</p>
            </div>

            <nav class="mt-6">
                <a href="/admin" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-home w-6"></i>
                    <span class="ml-3">Dashboard</span>
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
            <header class="bg-white shadow-sm z-10">
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
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                <?php echo $content ?? ''; ?>
            </main>
        </div>
    </div>

    <script>
        // Sidebar toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('sidebar-collapsed');
        });
    </script>
</body>
</html>
