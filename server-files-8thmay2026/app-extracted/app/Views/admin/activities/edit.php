<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Activity - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Admin Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center gap-4">
                <a href="/admin/activities" class="text-gray-600 hover:text-gray-900">
                    <i class="ri-arrow-left-line text-xl"></i>
                </a>
                <h1 class="text-2xl font-bold text-gray-900">Edit Activity</h1>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <form method="POST" action="/admin/activities/update" class="space-y-6">
                <input type="hidden" name="id" value="<?= $activity->id ?>">

                <!-- Basic Information Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>

                    <div class="space-y-4">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                                Activity Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="title" name="title" required
                                value="<?= htmlspecialchars($activity->title) ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <!-- Icon Class -->
                        <div>
                            <label for="icon_class" class="block text-sm font-medium text-gray-700 mb-1">
                                Icon Class (Remixicon)
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="icon_class" name="icon_class"
                                    value="<?= htmlspecialchars($activity->icon_class ?? '') ?>"
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <a href="https://remixicon.com/" target="_blank"
                                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 flex items-center gap-2">
                                    <i class="ri-external-link-line"></i>
                                    Browse Icons
                                </a>
                            </div>
                        </div>

                        <!-- Short Description -->
                        <div>
                            <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1">
                                Short Description <span class="text-red-500">*</span>
                            </label>
                            <textarea id="short_description" name="short_description" rows="2" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"><?= htmlspecialchars($activity->short_description) ?></textarea>
                        </div>

                        <!-- Full Description -->
                        <div>
                            <label for="full_description" class="block text-sm font-medium text-gray-700 mb-1">
                                Full Description
                            </label>
                            <textarea id="full_description" name="full_description" rows="6"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"><?= htmlspecialchars($activity->full_description ?? '') ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Activity Details Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Activity Details</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Duration -->
                        <div>
                            <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">
                                Duration
                            </label>
                            <input type="text" id="duration" name="duration"
                                value="<?= htmlspecialchars($activity->duration ?? '') ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <!-- Difficulty -->
                        <div>
                            <label for="difficulty" class="block text-sm font-medium text-gray-700 mb-1">
                                Difficulty Level
                            </label>
                            <select id="difficulty" name="difficulty"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="easy" <?= ($activity->difficulty === 'easy') ? 'selected' : '' ?>>Easy</option>
                                <option value="moderate" <?= ($activity->difficulty === 'moderate') ? 'selected' : '' ?>>Moderate</option>
                                <option value="challenging" <?= ($activity->difficulty === 'challenging') ? 'selected' : '' ?>>Challenging</option>
                                <option value="extreme" <?= ($activity->difficulty === 'extreme') ? 'selected' : '' ?>>Extreme</option>
                            </select>
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="price_from" class="block text-sm font-medium text-gray-700 mb-1">
                                Price From
                            </label>
                            <input type="number" id="price_from" name="price_from" step="0.01"
                                value="<?= htmlspecialchars($activity->price_from ?? '') ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <!-- Currency -->
                        <div>
                            <label for="currency" class="block text-sm font-medium text-gray-700 mb-1">
                                Currency
                            </label>
                            <select id="currency" name="currency"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="USD" <?= ($activity->currency === 'USD') ? 'selected' : '' ?>>USD</option>
                                <option value="EUR" <?= ($activity->currency === 'EUR') ? 'selected' : '' ?>>EUR</option>
                                <option value="NPR" <?= ($activity->currency === 'NPR') ? 'selected' : '' ?>>NPR</option>
                            </select>
                        </div>

                        <!-- Best Season -->
                        <div>
                            <label for="best_season" class="block text-sm font-medium text-gray-700 mb-1">
                                Best Season
                            </label>
                            <input type="text" id="best_season" name="best_season"
                                value="<?= htmlspecialchars($activity->best_season ?? '') ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">
                                Location
                            </label>
                            <input type="text" id="location" name="location"
                                value="<?= htmlspecialchars($activity->location ?? '') ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <!-- Group Size Min -->
                        <div>
                            <label for="group_size_min" class="block text-sm font-medium text-gray-700 mb-1">
                                Min Group Size
                            </label>
                            <input type="number" id="group_size_min" name="group_size_min"
                                value="<?= htmlspecialchars($activity->group_size_min ?? 1) ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <!-- Group Size Max -->
                        <div>
                            <label for="group_size_max" class="block text-sm font-medium text-gray-700 mb-1">
                                Max Group Size
                            </label>
                            <input type="number" id="group_size_max" name="group_size_max"
                                value="<?= htmlspecialchars($activity->group_size_max ?? 20) ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Highlights Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Highlights</h3>
                    <div id="highlights-container" class="space-y-2">
                        <?php if (!empty($activity->highlights) && is_array($activity->highlights)): ?>
                            <?php foreach ($activity->highlights as $highlight): ?>
                                <div class="flex gap-2">
                                    <input type="text" name="highlights[]" value="<?= htmlspecialchars($highlight) ?>"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <button type="button" onclick="this.parentElement.remove()"
                                        class="px-3 py-2 text-red-600 hover:text-red-700">
                                        <i class="ri-delete-bin-line text-lg"></i>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="flex gap-2">
                                <input type="text" name="highlights[]"
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="Add a highlight">
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="button" onclick="addField('highlights')"
                        class="mt-2 text-sm text-blue-600 hover:text-blue-700 flex items-center gap-1">
                        <i class="ri-add-line"></i> Add Another Highlight
                    </button>
                </div>

                <!-- Inclusions Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Inclusions</h3>
                    <div id="inclusions-container" class="space-y-2">
                        <?php if (!empty($activity->inclusions) && is_array($activity->inclusions)): ?>
                            <?php foreach ($activity->inclusions as $inclusion): ?>
                                <div class="flex gap-2">
                                    <input type="text" name="inclusions[]" value="<?= htmlspecialchars($inclusion) ?>"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <button type="button" onclick="this.parentElement.remove()"
                                        class="px-3 py-2 text-red-600 hover:text-red-700">
                                        <i class="ri-delete-bin-line text-lg"></i>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="flex gap-2">
                                <input type="text" name="inclusions[]"
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="What's included">
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="button" onclick="addField('inclusions')"
                        class="mt-2 text-sm text-blue-600 hover:text-blue-700 flex items-center gap-1">
                        <i class="ri-add-line"></i> Add Another Inclusion
                    </button>
                </div>

                <!-- Exclusions Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Exclusions</h3>
                    <div id="exclusions-container" class="space-y-2">
                        <?php if (!empty($activity->exclusions) && is_array($activity->exclusions)): ?>
                            <?php foreach ($activity->exclusions as $exclusion): ?>
                                <div class="flex gap-2">
                                    <input type="text" name="exclusions[]" value="<?= htmlspecialchars($exclusion) ?>"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <button type="button" onclick="this.parentElement.remove()"
                                        class="px-3 py-2 text-red-600 hover:text-red-700">
                                        <i class="ri-delete-bin-line text-lg"></i>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="flex gap-2">
                                <input type="text" name="exclusions[]"
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="What's not included">
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="button" onclick="addField('exclusions')"
                        class="mt-2 text-sm text-blue-600 hover:text-blue-700 flex items-center gap-1">
                        <i class="ri-add-line"></i> Add Another Exclusion
                    </button>
                </div>

                <!-- Requirements -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Requirements</h3>
                    <textarea id="requirements" name="requirements" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"><?= htmlspecialchars($activity->requirements ?? '') ?></textarea>
                </div>

                <!-- SEO & Settings Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">SEO & Settings</h3>

                    <div class="space-y-4">
                        <!-- Meta Title -->
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-1">
                                Meta Title
                            </label>
                            <input type="text" id="meta_title" name="meta_title"
                                value="<?= htmlspecialchars($activity->meta_title ?? '') ?>"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <!-- Meta Description -->
                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-1">
                                Meta Description
                            </label>
                            <textarea id="meta_description" name="meta_description" rows="2"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"><?= htmlspecialchars($activity->meta_description ?? '') ?></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Display Order -->
                            <div>
                                <label for="display_order" class="block text-sm font-medium text-gray-700 mb-1">
                                    Display Order
                                </label>
                                <input type="number" id="display_order" name="display_order"
                                    value="<?= htmlspecialchars($activity->display_order ?? 0) ?>"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>

                        <!-- Checkboxes -->
                        <div class="flex items-center gap-6">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="is_featured" value="1"
                                    <?= $activity->is_featured ? 'checked' : '' ?>
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Featured Activity</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="is_active" value="1"
                                    <?= $activity->is_active ? 'checked' : '' ?>
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Active</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end gap-4">
                    <a href="/admin/activities" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center gap-2">
                        <i class="ri-save-line"></i>
                        Update Activity
                    </button>
                </div>
            </form>
        </main>
    </div>

    <script>
        function addField(type) {
            const container = document.getElementById(`${type}-container`);
            const newField = document.createElement('div');
            newField.className = 'flex gap-2';
            newField.innerHTML = `
                <input type="text" name="${type}[]"
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="${type === 'highlights' ? 'Add a highlight' : type === 'inclusions' ? 'What\'s included' : 'What\'s not included'}">
                <button type="button" onclick="this.parentElement.remove()"
                    class="px-3 py-2 text-red-600 hover:text-red-700">
                    <i class="ri-delete-bin-line text-lg"></i>
                </button>
            `;
            container.appendChild(newField);
        }
    </script>
</body>
</html>
