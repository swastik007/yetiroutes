<?php
$pageTitle = 'Create Route';
ob_start();
?>

<div class="mb-6">
    <a href="/admin/routes" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i>Back to Routes
    </a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Create New Route</h2>

    <form action="/admin/routes/store" method="POST" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Route Title *</label>
                <input type="text" name="title" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Location -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Location *</label>
                <select name="location_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Location</option>
                    <?php foreach ($locations as $location): ?>
                        <option value="<?= $location->id ?>"><?= htmlspecialchars($location->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Difficulty -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Difficulty *</label>
                <select name="difficulty" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="easy">Easy</option>
                    <option value="moderate" selected>Moderate</option>
                    <option value="challenging">Challenging</option>
                    <option value="extreme">Extreme</option>
                </select>
            </div>

            <!-- Duration -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Duration (Days) *</label>
                <input type="number" name="duration_days" required min="1"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Max Altitude -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Max Altitude (meters)</label>
                <input type="number" name="max_altitude_meters"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Base Price -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Base Price (USD) *</label>
                <input type="number" name="base_price" step="0.01" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Best Season -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Best Season</label>
                <input type="text" name="best_season" placeholder="e.g., March-May, September-November"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Short Description -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Short Description *</label>
                <textarea name="short_description" rows="3" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <!-- Full Description -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Full Description *</label>
                <textarea name="full_description" rows="8" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <!-- Meta Title -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title (SEO)</label>
                <input type="text" name="meta_title"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Meta Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description (SEO)</label>
                <input type="text" name="meta_description"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Checkboxes -->
            <div class="md:col-span-2 flex space-x-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" class="rounded border-gray-300 text-blue-600">
                    <span class="ml-2 text-sm text-gray-700">Featured Route</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" checked class="rounded border-gray-300 text-blue-600">
                    <span class="ml-2 text-sm text-gray-700">Active</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end space-x-4 pt-6 border-t">
            <a href="/admin/routes" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Create Route
            </button>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../layouts/admin.php';
?>
