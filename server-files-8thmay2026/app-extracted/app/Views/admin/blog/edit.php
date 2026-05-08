<?php
$pageTitle = 'Edit Blog Post';
ob_start();
?>

<div class="mb-6">
    <a href="/admin/blog" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i>Back to Blog Posts
    </a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Edit Post: <?= htmlspecialchars($post->title) ?></h2>

    <form action="/admin/blog/update" method="POST" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <input type="hidden" name="id" value="<?= $post->id ?>">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content (Left - 2/3) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Post Title *</label>
                    <input type="text" name="title" required value="<?= htmlspecialchars($post->title) ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Slug (Read-only) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slug (URL)</label>
                    <input type="text" value="<?= htmlspecialchars($post->slug) ?>" readonly
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50">
                    <p class="text-xs text-gray-500 mt-1">The slug is auto-generated and cannot be changed</p>
                </div>

                <!-- Excerpt -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Excerpt *</label>
                    <textarea name="excerpt" rows="3" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($post->excerpt ?? '') ?></textarea>
                    <p class="text-xs text-gray-500 mt-1">This will appear in blog listings and search results</p>
                </div>

                <!-- Content -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                    <textarea name="content" rows="20" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 font-mono text-sm"><?= htmlspecialchars($post->content ?? '') ?></textarea>
                    <p class="text-xs text-gray-500 mt-1">You can use HTML for formatting. Headings will be used for table of contents.</p>
                </div>

                <!-- SEO Section -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">SEO Settings</h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                            <input type="text" name="meta_title" value="<?= htmlspecialchars($post->meta_title ?? '') ?>"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                   placeholder="Leave blank to use post title">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                            <textarea name="meta_description" rows="2"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                      placeholder="Leave blank to use excerpt"><?= htmlspecialchars($post->meta_description ?? '') ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Stats -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistics</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-gray-50 p-4 rounded">
                            <p class="text-sm text-gray-600">Views</p>
                            <p class="text-2xl font-bold"><?= number_format($post->views ?? 0) ?></p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded">
                            <p class="text-sm text-gray-600">Created</p>
                            <p class="text-sm font-semibold"><?= date('M d, Y', strtotime($post->created_at)) ?></p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded">
                            <p class="text-sm text-gray-600">Last Updated</p>
                            <p class="text-sm font-semibold"><?= date('M d, Y', strtotime($post->updated_at ?? $post->created_at)) ?></p>
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
                                <option value="draft" <?= $post->status === 'draft' ? 'selected' : '' ?>>Draft</option>
                                <option value="published" <?= $post->status === 'published' ? 'selected' : '' ?>>Published</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                            <select name="category" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="">Select Category</option>
                                <?php
                                $currentCategory = $post->category ?? '';
                                $categories = ['trekking-guides', 'trip-reports', 'travel-tips', 'culture-people', 'gear-reviews'];
                                foreach ($categories as $cat):
                                    $label = ucwords(str_replace('-', ' ', $cat));
                                ?>
                                    <option value="<?= $cat ?>" <?= $currentCategory === $cat ? 'selected' : '' ?>><?= $label ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Featured Image</h3>
                    <?php if (!empty($post->featured_image)): ?>
                        <img src="<?= htmlspecialchars($post->featured_image) ?>" alt="Current featured image" class="w-full h-32 object-cover rounded mb-2">
                    <?php endif; ?>
                    <input type="file" name="featured_image" accept="image/*"
                           class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="text-xs text-gray-500 mt-2">Recommended: 1200x630px, max 2MB</p>
                </div>

                <!-- Tags -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Tags</h3>
                    <input type="text" name="tags"
                           value="<?= htmlspecialchars(is_array($tags = json_decode($post->tags ?? '[]', true)) ? implode(', ', $tags) : '') ?>"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="everest, trekking, nepal">
                    <p class="text-xs text-gray-500 mt-2">Separate tags with commas</p>
                </div>

                <!-- Read Time -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Read Time</h3>
                    <input type="number" name="read_time" min="1" value="<?= $post->read_time ?? '' ?>"
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
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Update Post
            </button>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../layouts/admin.php';
?>
