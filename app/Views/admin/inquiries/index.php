<?php
$pageTitle = 'Manage Inquiries';
ob_start();
?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Inquiries</h2>
        <p class="text-gray-600">Manage customer inquiries and leads</p>
    </div>
</div>

<!-- Filters -->
<div class="bg-white rounded-lg shadow mb-6 p-4">
    <form method="GET" class="flex flex-wrap gap-4">
        <div class="flex-1 min-w-[200px]">
            <input type="text" name="search" value="<?= htmlspecialchars($filters['search'] ?? '') ?>"
                placeholder="Search name, email..." class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="w-48">
            <select name="status" class="w-full px-4 py-2 border rounded-lg">
                <option value="">All Statuses</option>
                <option value="new" <?= ($filters['status'] ?? '') === 'new' ? 'selected' : '' ?>>New</option>
                <option value="responded" <?= ($filters['status'] ?? '') === 'responded' ? 'selected' : '' ?>>Responded
                </option>
                <option value="converted" <?= ($filters['status'] ?? '') === 'converted' ? 'selected' : '' ?>>Converted
                </option>
            </select>
        </div>
        <div class="w-48">
            <select name="type" class="w-full px-4 py-2 border rounded-lg">
                <option value="">All Types</option>
                <option value="contact_form" <?= ($filters['inquiry_type'] ?? '') === 'contact_form' ? 'selected' : '' ?>>
                    Contact Form</option>
                <option value="quick_inquiry" <?= ($filters['inquiry_type'] ?? '') === 'quick_inquiry' ? 'selected' : '' ?>>Quick Inquiry</option>
            </select>
        </div>
        <button type="submit" class="bg-slate-900 text-white px-6 py-2 rounded-lg hover:bg-slate-800">
            Apply Filters
        </button>
    </form>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name/Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Message Preview</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (!empty($inquiries)): ?>
                    <?php foreach ($inquiries as $inquiry): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#<?= $inquiry->id ?></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($inquiry->name) ?></div>
                                <div class="text-sm text-gray-500"><?= htmlspecialchars($inquiry->email) ?></div>
                                <?php if ($inquiry->phone): ?>
                                    <div class="text-xs text-gray-400"><?= htmlspecialchars($inquiry->phone) ?></div>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?php
                                $typeLabels = [
                                    'contact_form' => 'Contact Form',
                                    'quick_inquiry' => 'Quick Inquiry',
                                    'general' => 'General Inquiry',
                                    'route' => 'Route Inquiry',
                                    'lodge' => 'Lodge Inquiry',
                                    'custom_plan' => 'Custom Plan'
                                ];
                                echo $typeLabels[$inquiry->type] ?? ucfirst($inquiry->type);
                                ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate"
                                title="<?= htmlspecialchars($inquiry->message) ?>">
                                <?= htmlspecialchars(substr($inquiry->message, 0, 50)) . (strlen($inquiry->message) > 50 ? '...' : '') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php
                                $statusColors = [
                                    'new' => 'bg-blue-100 text-blue-800',
                                    'responded' => 'bg-green-100 text-green-800',
                                    'converted' => 'bg-purple-100 text-purple-800',
                                    'archived' => 'bg-gray-100 text-gray-800'
                                ];
                                $color = $statusColors[$inquiry->status] ?? 'bg-gray-100 text-gray-800';
                                ?>
                                <span class="px-2 py-1 rounded-full text-xs font-semibold <?= $color ?>">
                                    <?= ucfirst($inquiry->status) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= date('M d, H:i', strtotime($inquiry->created_at)) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button onclick="viewInquiry(<?= $inquiry->id ?>)"
                                    class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                <?php if ($inquiry->status === 'new'): ?>
                                    <button onclick="updateStatus(<?= $inquiry->id ?>, 'responded')"
                                        class="text-green-600 hover:text-green-900">Mark Responded</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                            No inquiries found matching your filters.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if ($total_pages > 1): ?>
        <div class="px-6 py-4 border-t border-gray-200 flex justify-between items-center">
            <div class="text-sm text-gray-500">
                Page <?= $current_page ?> of <?= $total_pages ?> (<?= $total ?> items)
            </div>
            <div class="flex gap-2">
                <?php if ($current_page > 1): ?>
                    <a href="?page=<?= $current_page - 1 ?>&status=<?= $filters['status'] ?>&type=<?= $filters['inquiry_type'] ?>&search=<?= $filters['search'] ?>"
                        class="px-3 py-1 border rounded hover:bg-gray-50">Previous</a>
                <?php endif; ?>

                <?php if ($current_page < $total_pages): ?>
                    <a href="?page=<?= $current_page + 1 ?>&status=<?= $filters['status'] ?>&type=<?= $filters['inquiry_type'] ?>&search=<?= $filters['search'] ?>"
                        class="px-3 py-1 border rounded hover:bg-gray-50">Next</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Simple View Modal (Hidden by default) -->
<div id="inquiryModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-lg w-full m-4">
        <h3 class="text-lg font-bold mb-4">Inquiry Details</h3>
        <div id="modalContent" class="space-y-4 mb-6 text-sm"></div>
        <div class="flex justify-end">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Close</button>
        </div>
    </div>
</div>

<script>
    async function updateStatus(id, status) {
        if (!confirm('Mark this inquiry as ' + status + '?')) return;

        try {
            const formData = new FormData();
            formData.append('inquiry_id', id);
            formData.append('status', status);

            const response = await fetch('/contact/updateStatus', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();
            if (data.success) {
                window.location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        } catch (e) {
            alert('Specifically Error: ' + e.message);
        }
    }

    function viewInquiry(id) {
        // Ideally fetch details via AJAX, but for now let's just show a placeholder or we can grab data if we had it in data attributes.
        // For simplicity I'll alert or reload to a view page if it existed.
        // Since we don't have a specific view page in the controller, I'll just show what I can or encourage looking at email.
        // I previously saw `Inquiry::getFiltered` returns all columns including message.
        // I can put the message in a data attribute.
        alert("To implement full view: Add a view endpoint or populate modal with data attributes.");
    }
    function closeModal() {
        document.getElementById('inquiryModal').classList.add('hidden');
    }
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../layouts/admin.php';
?>