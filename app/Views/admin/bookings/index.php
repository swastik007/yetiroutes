<?php
$pageTitle = 'Manage Bookings';
ob_start();
?>

<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900">Bookings</h2>
    <p class="text-gray-600">Manage all trek bookings</p>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Reference</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Route</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Payment</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (!empty($bookings)): ?>
                    <?php foreach ($bookings as $booking): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">
                                <?= htmlspecialchars($booking->booking_reference) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <?= htmlspecialchars($booking->customer_name ?? $booking->customer_email) ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <?= htmlspecialchars($booking->route_title ?? 'N/A') ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                $<?= number_format($booking->total_amount, 2) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 rounded text-xs
                                    <?php if ($booking->booking_status === 'confirmed'): ?>bg-green-100 text-green-800
                                    <?php elseif ($booking->booking_status === 'pending'): ?>bg-yellow-100 text-yellow-800
                                    <?php elseif ($booking->booking_status === 'cancelled'): ?>bg-red-100 text-red-800
                                    <?php else: ?>bg-blue-100 text-blue-800<?php endif; ?>">
                                    <?= ucfirst($booking->booking_status) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 rounded text-xs
                                    <?php if ($booking->payment_status === 'fully_paid'): ?>bg-green-100 text-green-800
                                    <?php elseif ($booking->payment_status === 'partial'): ?>bg-yellow-100 text-yellow-800
                                    <?php else: ?>bg-red-100 text-red-800<?php endif; ?>">
                                    <?= ucfirst(str_replace('_', ' ', $booking->payment_status)) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= date('M d, Y', strtotime($booking->created_at)) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="/admin/bookings/view?id=<?= $booking->id ?>" class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">No bookings found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../layouts/admin.php';
?>
