<?php
$pageTitle = 'Manage Users';
ob_start();
?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Users</h2>
        <p class="text-gray-600">Manage system users</p>
    </div>
    <a href="/admin/users/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        <i class="fas fa-plus mr-2"></i>Add New User
    </a>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Joined</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (!empty($users['data'])): ?>
                    <?php foreach ($users['data'] as $user): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $user->id ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?= htmlspecialchars($user->full_name) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <?= htmlspecialchars($user->email) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <?= htmlspecialchars($user->phone ?? 'N/A') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if ($user->is_active): ?>
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">Active</span>
                                <?php else: ?>
                                    <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-xs">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= date('M d, Y', strtotime($user->created_at)) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button onclick="deleteUser(<?= $user->id ?>)" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No users found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function deleteUser(id) {
    if (confirm('Are you sure you want to delete this user?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/admin/users/delete';

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
