<?php
$pageTitle = 'Edit Route';
ob_start();
?>

<div class="mb-6">
    <a href="/admin/routes" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i>Back to Routes
    </a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Edit Route: <?= htmlspecialchars($route->title) ?></h2>

    <form action="/admin/routes/update" method="POST" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <input type="hidden" name="id" value="<?= $route->id ?>">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Route Title *</label>
                <input type="text" name="title" required value="<?= htmlspecialchars($route->title) ?>"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Slug (Read-only) -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Slug (URL)</label>
                <input type="text" value="<?= htmlspecialchars($route->slug) ?>" readonly
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50">
                <p class="text-xs text-gray-500 mt-1">The slug is auto-generated and cannot be changed</p>
            </div>

            <!-- Location -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Location *</label>
                <select name="location_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Location</option>
                    <?php foreach ($locations as $location): ?>
                        <option value="<?= $location->id ?>" <?= $location->id == $route->location_id ? 'selected' : '' ?>>
                            <?= htmlspecialchars($location->name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Difficulty -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Difficulty *</label>
                <select name="difficulty" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="easy" <?= $route->difficulty === 'easy' ? 'selected' : '' ?>>Easy</option>
                    <option value="moderate" <?= $route->difficulty === 'moderate' ? 'selected' : '' ?>>Moderate</option>
                    <option value="challenging" <?= $route->difficulty === 'challenging' ? 'selected' : '' ?>>Challenging</option>
                    <option value="extreme" <?= $route->difficulty === 'extreme' ? 'selected' : '' ?>>Extreme</option>
                </select>
            </div>

            <!-- Duration -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Duration (Days) *</label>
                <input type="number" name="duration_days" required min="1" value="<?= $route->duration_days ?>"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Max Altitude -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Max Altitude (meters)</label>
                <input type="number" name="max_altitude_meters" value="<?= $route->max_altitude_meters ?>"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Base Price -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Base Price (USD) *</label>
                <input type="number" name="base_price" step="0.01" required value="<?= $route->base_price ?>"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Best Season -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Best Season</label>
                <input type="text" name="best_season" value="<?= htmlspecialchars($route->best_season ?? '') ?>"
                       placeholder="e.g., March-May, September-November"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Terrain Type -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Terrain Type</label>
                <select name="terrain_type"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="mountain" <?= $route->terrain_type === 'mountain' ? 'selected' : '' ?>>Mountain</option>
                    <option value="valley" <?= $route->terrain_type === 'valley' ? 'selected' : '' ?>>Valley</option>
                    <option value="mixed" <?= $route->terrain_type === 'mixed' ? 'selected' : '' ?>>Mixed</option>
                    <option value="glacier" <?= $route->terrain_type === 'glacier' ? 'selected' : '' ?>>Glacier</option>
                </select>
            </div>

            <!-- Fitness Score -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Fitness Score Required (1-10)</label>
                <input type="number" name="fitness_score_required" min="1" max="10"
                       value="<?= $route->fitness_score_required ?? 5 ?>"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Short Description -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Short Description *</label>
                <textarea name="short_description" rows="3" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($route->short_description) ?></textarea>
            </div>

            <!-- Full Description -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Full Description *</label>
                <textarea name="full_description" rows="8" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($route->full_description) ?></textarea>
            </div>

            <!-- Highlights -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Highlights (one per line)</label>
                <textarea name="highlights" rows="5" placeholder="Enter each highlight on a new line"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"><?php
                              $highlights = json_decode($route->highlights ?? '[]', true);
                              echo is_array($highlights) ? implode("\n", $highlights) : '';
                          ?></textarea>
            </div>

            <!-- Inclusions -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Inclusions (one per line)</label>
                <textarea name="inclusions" rows="5" placeholder="Enter each inclusion on a new line"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"><?php
                              $inclusions = json_decode($route->inclusions ?? '[]', true);
                              echo is_array($inclusions) ? implode("\n", $inclusions) : '';
                          ?></textarea>
            </div>

            <!-- Exclusions -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Exclusions (one per line)</label>
                <textarea name="exclusions" rows="5" placeholder="Enter each exclusion on a new line"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"><?php
                              $exclusions = json_decode($route->exclusions ?? '[]', true);
                              echo is_array($exclusions) ? implode("\n", $exclusions) : '';
                          ?></textarea>
            </div>

            <!-- Meta Title -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title (SEO)</label>
                <input type="text" name="meta_title" value="<?= htmlspecialchars($route->meta_title ?? '') ?>"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Meta Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description (SEO)</label>
                <input type="text" name="meta_description" value="<?= htmlspecialchars($route->meta_description ?? '') ?>"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Featured Image Upload -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                <?php if (!empty($route->featured_image_path)): ?>
                    <div class="mb-3">
                        <img src="<?= htmlspecialchars($route->featured_image_path) ?>" alt="Current image" class="h-32 rounded border">
                        <p class="text-xs text-gray-500 mt-1">Current image (upload new to replace)</p>
                    </div>
                <?php endif; ?>
                <input type="file" name="featured_image" accept="image/*"
                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-xs text-gray-500 mt-1">Recommended: 1200x800px, JPG/PNG, max 2MB</p>
            </div>

            <!-- Checkboxes -->
            <div class="md:col-span-2 flex space-x-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" <?= $route->is_featured ? 'checked' : '' ?>
                           class="rounded border-gray-300 text-blue-600">
                    <span class="ml-2 text-sm text-gray-700">Featured Route</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" <?= $route->is_active ? 'checked' : '' ?>
                           class="rounded border-gray-300 text-blue-600">
                    <span class="ml-2 text-sm text-gray-700">Active</span>
                </label>
            </div>
        </div>

        <div class="flex justify-between items-center pt-6 border-t">
            <div>
                <a href="/admin/routes/itinerary?id=<?= $route->id ?>" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-list mr-2"></i>Manage Itinerary
                </a>
            </div>
            <div class="flex space-x-4">
                <a href="/admin/routes" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Update Route
                </button>
            </div>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../layouts/admin.php';
?>
