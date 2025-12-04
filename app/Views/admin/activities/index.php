<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Activities - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Admin Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <a href="/admin" class="text-gray-600 hover:text-gray-900">
                        <i class="ri-arrow-left-line text-xl"></i>
                    </a>
                    <h1 class="text-2xl font-bold text-gray-900">Manage Activities</h1>
                </div>
                <a href="/admin/activities/create" class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    <i class="ri-add-line"></i>
                    Add New Activity
                </a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Success/Error Messages -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2">
                    <i class="ri-checkbox-circle-line text-xl"></i>
                    <span><?= $_SESSION['success'] ?></span>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-center gap-2">
                    <i class="ri-error-warning-line text-xl"></i>
                    <span><?= $_SESSION['error'] ?></span>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <!-- Activities Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Difficulty</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php if (isset($activities) && !empty($activities)): ?>
                                <?php foreach ($activities as $activity): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                                                    <i class="<?= $activity->icon_class ?? 'ri-star-line' ?> text-xl text-gray-600"></i>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($activity->title) ?></div>
                                                    <div class="text-sm text-gray-500"><?= htmlspecialchars($activity->slug) ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <?= htmlspecialchars($activity->duration ?? 'N/A') ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php
                                            $difficultyColors = [
                                                'easy' => 'bg-green-100 text-green-800',
                                                'moderate' => 'bg-yellow-100 text-yellow-800',
                                                'challenging' => 'bg-orange-100 text-orange-800',
                                                'extreme' => 'bg-red-100 text-red-800'
                                            ];
                                            $color = $difficultyColors[$activity->difficulty ?? 'moderate'] ?? 'bg-gray-100 text-gray-800';
                                            ?>
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $color ?>">
                                                <?= ucfirst($activity->difficulty ?? 'N/A') ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <?php if ($activity->price_from): ?>
                                                <?= htmlspecialchars($activity->currency ?? 'USD') ?> <?= number_format($activity->price_from) ?>
                                            <?php else: ?>
                                                <span class="text-gray-400">Not set</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-2">
                                                <form method="POST" action="/admin/activities/toggle-active" class="inline">
                                                    <input type="hidden" name="id" value="<?= $activity->id ?>">
                                                    <button type="submit" class="text-sm">
                                                        <?php if ($activity->is_active): ?>
                                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Active</span>
                                                        <?php else: ?>
                                                            <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-semibold">Inactive</span>
                                                        <?php endif; ?>
                                                    </button>
                                                </form>
                                                <form method="POST" action="/admin/activities/toggle-featured" class="inline">
                                                    <input type="hidden" name="id" value="<?= $activity->id ?>">
                                                    <button type="submit" class="text-xl" title="Toggle Featured">
                                                        <?php if ($activity->is_featured): ?>
                                                            <i class="ri-star-fill text-yellow-500"></i>
                                                        <?php else: ?>
                                                            <i class="ri-star-line text-gray-400"></i>
                                                        <?php endif; ?>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?= $activity->display_order ?? 0 ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center justify-end gap-2">
                                                <a href="/admin/activities/edit?id=<?= $activity->id ?>" class="text-blue-600 hover:text-blue-900" title="Edit">
                                                    <i class="ri-edit-line text-lg"></i>
                                                </a>
                                                <form method="POST" action="/admin/activities/delete" class="inline" onsubmit="return confirm('Are you sure you want to delete this activity?');">
                                                    <input type="hidden" name="id" value="<?= $activity->id ?>">
                                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                                        <i class="ri-delete-bin-line text-lg"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center">
                                        <div class="text-gray-400">
                                            <i class="ri-inbox-line text-4xl mb-2"></i>
                                            <p class="text-lg">No activities found</p>
                                            <a href="/admin/activities/create" class="inline-flex items-center gap-2 mt-4 text-blue-600 hover:text-blue-700">
                                                <i class="ri-add-line"></i>
                                                Create your first activity
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Info Card -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-start gap-3">
                    <i class="ri-information-line text-blue-600 text-xl mt-0.5"></i>
                    <div class="text-sm text-blue-800">
                        <p class="font-semibold mb-1">Tips:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Click the star icon to toggle featured status</li>
                            <li>Click the Active/Inactive badge to toggle visibility</li>
                            <li>Featured activities appear on the homepage</li>
                            <li>Use display order to control the sequence of activities</li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
