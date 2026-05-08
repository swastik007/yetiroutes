<?php
/**
 * Admin Chat List View
 *
 * @var array $conversations
 * @var object $current_user
 */
$pageTitle = 'Live Chat';
ob_start();
?>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="glass-card rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Active Conversations</p>
                <p class="text-3xl font-bold text-gray-900"><?= count($conversations) ?></p>
            </div>
            <div class="bg-blue-100 bg-opacity-60 rounded-full p-3 shadow-inner">
                <i class="fas fa-comments text-blue-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Placeholder for other stats -->
    <div class="glass-card rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Response Rate</p>
                <p class="text-3xl font-bold text-gray-900">100%</p>
            </div>
            <div class="bg-green-100 bg-opacity-60 rounded-full p-3 shadow-inner">
                <i class="fas fa-stopwatch text-green-600 text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Chat List -->
<div class="glass-card rounded-lg overflow-hidden">
    <div
        class="px-6 py-4 border-b border-gray-200 border-opacity-40 bg-white bg-opacity-30 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-900">Active Conversations</h3>
        <button id="refresh-chat"
            class="text-sm bg-white bg-opacity-50 hover:bg-opacity-80 text-gray-700 px-3 py-1 rounded transition-colors shadow-sm ring-1 ring-gray-200">
            <i class="fas fa-sync-alt mr-1"></i> Refresh
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 bg-opacity-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User /
                        Visitor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last
                        Message</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                    </th>
                </tr>
            </thead>
            <tbody id="chat-list-body" class="divide-y divide-gray-200 divide-opacity-40">
                <?php if (empty($conversations)): ?>
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-inbox text-4xl text-gray-300 mb-3 opacity-50"></i>
                                <p>No active conversations found.</p>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($conversations as $conv): ?>
                        <tr class="hover:bg-blue-50 hover:bg-opacity-30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <div
                                            class="w-full h-full rounded-full bg-indigo-100 flex items-center justify-center text-indigo-500 font-bold text-lg border-2 border-white shadow-sm">
                                            <?php echo strtoupper(substr($conv->user_name ?? 'Guest', 0, 1)); ?>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-gray-900 font-medium">
                                            <?php echo htmlspecialchars($conv->user_name ?? 'Guest'); ?>
                                        </p>
                                        <?php if (!empty($conv->user_email)): ?>
                                            <p class="text-gray-500 text-xs truncate w-48 mb-0.5">
                                                <i class="fas fa-envelope text-gray-400 mr-1"></i>
                                                <?php echo htmlspecialchars($conv->user_email); ?>
                                            </p>
                                        <?php endif; ?>
                                        <p class="text-gray-400 text-xs truncate w-32" title="<?php echo $conv->visitor_id; ?>">
                                            ID: <?php echo substr($conv->visitor_id, 0, 8); ?>...
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full shadow-sm
                                <?php echo $conv->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'; ?>">
                                    <?php echo ucfirst($conv->status); ?>
                                </span>
                                <?php if ($conv->unread_count > 0): ?>
                                    <span
                                        class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 animate-pulse shadow-sm">
                                        <?php echo $conv->unread_count; ?> new
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <div class="flex flex-col">
                                    <span><?php echo date('M j, H:i', strtotime($conv->last_message_at ?? $conv->created_at)); ?></span>
                                    <span class="text-xs text-gray-400"><?php echo $conv->message_count; ?> messages</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="/admin/chat/conversation?id=<?php echo $conv->id; ?>"
                                    class="text-indigo-600 hover:text-indigo-900 font-semibold bg-indigo-50 px-3 py-1 rounded hover:bg-indigo-100 transition-colors border border-indigo-100">
                                    Open Chat
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('refresh-chat').addEventListener('click', function () {
        window.location.reload();
    });

    // Simple polling every 10 seconds to update lists
    setInterval(function () {
        fetch('/admin/chat/conversations')
            .then(response => response.json())
            .then(data => {
                if (data.success && data.conversations.length > 0) {
                    // Logic to detect changes and reload if needed
                    // For now, let's just update the badge
                    const unreadCount = data.conversations.reduce((acc, conv) => acc + conv.unread_count, 0);
                    const badge = document.getElementById('chat-notification');
                    if (badge) {
                        badge.innerText = unreadCount;
                        badge.classList.toggle('hidden', unreadCount === 0);
                    }
                }
            });
    }, 10000);
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/admin.php';
?>