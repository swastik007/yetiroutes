<?php
$pageTitle = 'Manage Routes';
ob_start();
?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Routes</h2>
        <p class="text-gray-600">Manage your trekking routes</p>
    </div>
    <a href="/admin/routes/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        <i class="fas fa-plus mr-2"></i>Add New Route
    </a>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Difficulty</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Duration</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (!empty($routes['data'])): ?>
                    <?php foreach ($routes['data'] as $route): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $route->id ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <div class="font-medium"><?= htmlspecialchars($route->title) ?></div>
                                <?php if ($route->is_featured): ?>
                                    <span class="text-xs text-yellow-600"><i class="fas fa-star"></i> Featured</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 py-1 rounded text-xs
                                    <?php if ($route->difficulty === 'easy'): ?>bg-green-100 text-green-800
                                    <?php elseif ($route->difficulty === 'moderate'): ?>bg-blue-100 text-blue-800
                                    <?php elseif ($route->difficulty === 'challenging'): ?>bg-orange-100 text-orange-800
                                    <?php else: ?>bg-red-100 text-red-800<?php endif; ?>">
                                    <?= ucfirst($route->difficulty) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $route->duration_days ?> days</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                $<?= number_format($route->base_price, 2) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if ($route->is_active): ?>
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">Active</span>
                                <?php else: ?>
                                    <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded text-xs">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="/admin/routes/edit?id=<?= $route->id ?>" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="deleteRoute(<?= $route->id ?>)" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No routes found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if ($routes['total_pages'] > 1): ?>
        <div class="px-6 py-4 border-t border-gray-200 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Showing page <?= $routes['current_page'] ?> of <?= $routes['total_pages'] ?>
            </div>
            <div class="flex space-x-2">
                <?php if ($routes['current_page'] > 1): ?>
                    <a href="?page=<?= $routes['current_page'] - 1 ?>" class="px-3 py-1 bg-white border rounded hover:bg-gray-50">Previous</a>
                <?php endif; ?>
                <?php if ($routes['current_page'] < $routes['total_pages']): ?>
                    <a href="?page=<?= $routes['current_page'] + 1 ?>" class="px-3 py-1 bg-white border rounded hover:bg-gray-50">Next</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
function deleteRoute(id) {
    if (confirm('Are you sure you want to delete this route?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/admin/routes/delete';

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
