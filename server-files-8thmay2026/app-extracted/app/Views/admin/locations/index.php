<?php
$pageTitle = 'Manage Locations';
ob_start();
?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Locations & Regions</h2>
        <p class="text-gray-600">Manage trek locations and regions</p>
    </div>
    <button onclick="showAddModal()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        <i class="fas fa-plus mr-2"></i>Add New Location
    </button>
</div>

<!-- Flash Messages -->
<?php if (isset($_SESSION['success'])): ?>
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Coordinates</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Treks</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (!empty($locations)): ?>
                    <?php foreach ($locations as $location): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $location->id ?></td>
                            <td class="px-6 py-4 text-sm">
                                <div class="font-medium text-gray-900"><?= htmlspecialchars($location->name) ?></div>
                                <?php if ($location->parent_name): ?>
                                    <div class="text-xs text-gray-500">Under: <?= htmlspecialchars($location->parent_name) ?></div>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <?= htmlspecialchars($location->slug) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <?php if ($location->parent_id): ?>
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs">Sub-region</span>
                                <?php else: ?>
                                    <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded text-xs">Main Region</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <?php if ($location->latitude && $location->longitude): ?>
                                    <?= number_format($location->latitude, 4) ?>, <?= number_format($location->longitude, 4) ?>
                                <?php else: ?>
                                    <span class="text-gray-400">Not set</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span class="font-semibold"><?= $location->route_count ?? 0 ?></span> treks
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button onclick="editLocation(<?= $location->id ?>)" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deleteLocation(<?= $location->id ?>)" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                            <i class="fas fa-map-marker-alt text-4xl mb-2"></i>
                            <p>No locations yet. Add your first location to get started!</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add/Edit Modal -->
<div id="locationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Add New Location</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <form action="/admin/locations/store" method="POST" class="space-y-6">
                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?? '' ?>">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Location Name *</label>
                    <input type="text" name="name" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="e.g., Everest Region">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Parent Region</label>
                    <select name="parent_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">None (Main Region)</option>
                        <?php if (!empty($locations)): ?>
                            <?php foreach ($locations as $loc): ?>
                                <?php if (!$loc->parent_id): // Only show main regions ?>
                                    <option value="<?= $loc->id ?>"><?= htmlspecialchars($loc->name) ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <p class="text-xs text-gray-500 mt-1">Select a parent if this is a sub-region</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Latitude</label>
                        <input type="number" step="0.000001" name="latitude"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                               placeholder="27.9881">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Longitude</label>
                        <input type="number" step="0.000001" name="longitude"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                               placeholder="86.9250">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title (SEO)</label>
                    <input type="text" name="meta_title"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                           placeholder="Everest Region Treks - Yeti Routes">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description (SEO)</label>
                    <textarea name="meta_description" rows="2"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                              placeholder="Discover amazing treks in the Everest region..."></textarea>
                </div>

                <div class="flex justify-end space-x-4 pt-4 border-t">
                    <button type="button" onclick="closeModal()" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Add Location
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function showAddModal() {
    document.getElementById('locationModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('locationModal').classList.add('hidden');
}

function editLocation(id) {
    // TODO: Implement edit functionality
    alert('Edit functionality coming soon! ID: ' + id);
}

function deleteLocation(id) {
    if (confirm('Are you sure you want to delete this location?')) {
        // TODO: Implement delete
        alert('Delete functionality coming soon! ID: ' + id);
    }
}

// Close modal on ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});

// Close modal on background click
document.getElementById('locationModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../layouts/admin.php';
?>
