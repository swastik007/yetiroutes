<?php
$pageTitle = 'Create Blog Post';
ob_start();
?>

<div class="mb-6">
    <a href="/admin/blog" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i>Back to Blog Posts
    </a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Create New Blog Post</h2>

    <form action="/admin/blog/store" method="POST" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content (Left - 2/3) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Post Title *</label>
                    <input type="text" name="title" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Enter an engaging title...">
                </div>

                <!-- Excerpt -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Excerpt *</label>
                    <textarea name="excerpt" rows="3" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                              placeholder="Write a short summary (160 characters recommended)..."></textarea>
                    <p class="text-xs text-gray-500 mt-1">This will appear in blog listings and search results</p>
                </div>

                <!-- Content -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                    <textarea name="content" rows="20" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 font-mono text-sm"
                              placeholder="Write your blog post content here... (HTML supported)"></textarea>
                    <p class="text-xs text-gray-500 mt-1">You can use HTML for formatting. Headings will be used for table of contents.</p>
                </div>

                <!-- SEO Section -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">SEO Settings</h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                            <input type="text" name="meta_title"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                   placeholder="Leave blank to use post title">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                            <textarea name="meta_description" rows="2"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                      placeholder="Leave blank to use excerpt"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar (Right - 1/3) -->
            <div class="space-y-6">
                <!-- Publish Settings -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Publish Settings</h3>

                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select name="status" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                            <select name="category" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="">Select Category</option>
                                <option value="trekking-guides">Trekking Guides</option>
                                <option value="trip-reports">Trip Reports</option>
                                <option value="travel-tips">Travel Tips</option>
                                <option value="culture-people">Culture & People</option>
                                <option value="gear-reviews">Gear Reviews</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Featured Image</h3>
                    <input type="file" name="featured_image" accept="image/*"
                           class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="text-xs text-gray-500 mt-2">Recommended: 1200x630px, max 2MB</p>
                </div>

                <!-- Tags -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Tags</h3>
                    <input type="text" name="tags"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="everest, trekking, nepal">
                    <p class="text-xs text-gray-500 mt-2">Separate tags with commas</p>
                </div>

                <!-- Read Time -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Read Time</h3>
                    <input type="number" name="read_time" min="1"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="5">
                    <p class="text-xs text-gray-500 mt-2">Minutes (leave blank to auto-calculate)</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4 pt-6 border-t">
            <a href="/admin/blog" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit" name="status" value="draft" class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                Save as Draft
            </button>
            <button type="submit" name="status" value="published" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Publish Now
            </button>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../layouts/admin.php';
?>
