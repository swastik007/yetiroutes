<?php
$pageTitle = 'Manage Blog Posts';
ob_start();
?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Blog Posts</h2>
        <p class="text-gray-600">Manage your blog content</p>
    </div>
    <a href="/admin/blog/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        <i class="fas fa-plus mr-2"></i>Create New Post
    </a>
</div>

<!-- Flash Messages -->
<?php if (isset($_SESSION['success'])): ?>
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>
<?php if (isset($_SESSION['error'])): ?>
    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Author</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Views</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (!empty($posts)): ?>
                    <?php foreach ($posts as $post): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $post->id ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <div class="font-medium max-w-xs truncate"><?= htmlspecialchars($post->title) ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <?= htmlspecialchars($post->author_name ?? 'Unknown') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <?= htmlspecialchars($post->category_name ?? 'Uncategorized') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if ($post->status === 'published'): ?>
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs font-semibold">Published</span>
                                <?php elseif ($post->status === 'draft'): ?>
                                    <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded text-xs font-semibold">Draft</span>
                                <?php else: ?>
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs font-semibold">Scheduled</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <?= number_format($post->views ?? 0) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= date('M d, Y', strtotime($post->created_at)) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="/admin/blog/edit?id=<?= $post->id ?>" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/blog/article?slug=<?= $post->slug ?>" target="_blank" class="text-green-600 hover:text-green-900 mr-3" title="Preview">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button onclick="deletePost(<?= $post->id ?>)" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                            <i class="fas fa-blog text-4xl mb-2"></i>
                            <p>No blog posts yet. Create your first post to get started!</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function deletePost(id) {
    if (confirm('Are you sure you want to delete this blog post? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/admin/blog/delete';

        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id';
        input.value = id;

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../layouts/admin.php';
?>
