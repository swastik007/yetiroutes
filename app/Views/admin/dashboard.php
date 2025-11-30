<?php
$pageTitle = 'Dashboard';
ob_start();
?>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- Total Users -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Users</p>
                <p class="text-3xl font-bold text-gray-900"><?= $stats['total_users'] ?? 0 ?></p>
            </div>
            <div class="bg-blue-100 rounded-full p-3">
                <i class="fas fa-users text-blue-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Total Routes -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Routes</p>
                <p class="text-3xl font-bold text-gray-900"><?= $stats['total_routes'] ?? 0 ?></p>
            </div>
            <div class="bg-green-100 rounded-full p-3">
                <i class="fas fa-route text-green-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Total Bookings -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Bookings</p>
                <p class="text-3xl font-bold text-gray-900"><?= $stats['total_bookings'] ?? 0 ?></p>
            </div>
            <div class="bg-purple-100 rounded-full p-3">
                <i class="fas fa-ticket-alt text-purple-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Pending Bookings -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Pending Bookings</p>
                <p class="text-3xl font-bold text-orange-600"><?= $stats['pending_bookings'] ?? 0 ?></p>
            </div>
            <div class="bg-orange-100 rounded-full p-3">
                <i class="fas fa-clock text-orange-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Featured Routes -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Featured Routes</p>
                <p class="text-3xl font-bold text-gray-900"><?= $stats['featured_routes'] ?? 0 ?></p>
            </div>
            <div class="bg-yellow-100 rounded-full p-3">
                <i class="fas fa-star text-yellow-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Blog Posts -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Blog Posts</p>
                <p class="text-3xl font-bold text-gray-900"><?= $stats['total_blogs'] ?? 0 ?></p>
            </div>
            <div class="bg-indigo-100 rounded-full p-3">
                <i class="fas fa-blog text-indigo-600 text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Bookings -->
<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900">Recent Bookings</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ref</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Route</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (!empty($recent_bookings)): ?>
                    <?php foreach ($recent_bookings as $booking): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?= htmlspecialchars($booking->booking_reference) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <?= htmlspecialchars($booking->customer_name ?? $booking->customer_email) ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <?= htmlspecialchars($booking->route_title ?? 'N/A') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                $<?= number_format($booking->total_amount, 2) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    <?php if ($booking->booking_status === 'confirmed'): ?>bg-green-100 text-green-800
                                    <?php elseif ($booking->booking_status === 'pending'): ?>bg-yellow-100 text-yellow-800
                                    <?php else: ?>bg-gray-100 text-gray-800<?php endif; ?>">
                                    <?= ucfirst($booking->booking_status) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= date('M d, Y', strtotime($booking->created_at)) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No bookings yet</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/admin.php';
?>
