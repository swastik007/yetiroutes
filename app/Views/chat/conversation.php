<?php
/**
 * Admin Chat Conversation View
 *
 * @var object $conversation
 * @var object $current_user
 * @var string $csrf_token
 */
$pageTitle = 'Chat Details';
ob_start();
?>

<div class="flex flex-col h-[calc(100vh-140px)]">
    <!-- Header Controls -->
    <div
        class="glass-card rounded-t-lg p-4 border-b border-gray-200 border-opacity-40 flex justify-between items-center z-10">
        <div class="flex items-center">
            <a href="/admin/chat" class="text-gray-500 hover:text-gray-700 mr-4 transition-colors">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <?php echo htmlspecialchars($conversation->user_name ?? 'Guest'); ?>
                    <span
                        class="ml-2 px-2 py-0.5 text-xs rounded-full shadow-sm
                        <?php echo $conversation->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'; ?>">
                        <?php echo ucfirst($conversation->status); ?>
                    </span>
                </h3>
                <p class="text-xs text-gray-500">Visitor ID: <?php echo substr($conversation->visitor_id, 0, 12); ?></p>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <?php if ($conversation->status === 'active'): ?>
                <form action="/admin/chat/resolve" method="POST" onsubmit="return confirm('End this conversation?');">
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                    <input type="hidden" name="conversation_id" value="<?php echo $conversation->id; ?>">
                    <button type="submit"
                        class="text-red-600 hover:text-red-800 text-sm font-medium px-3 py-1 rounded hover:bg-red-50 transition-colors">
                        <i class="fas fa-check-circle mr-1"></i> Mark Resolved
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <!-- Chat Messages Area -->
    <div
        class="flex-1 glass-card rounded-b-lg rounded-t-none shadow-sm overflow-hidden flex flex-col relative border-t-0 -mt-px">
        <div id="messages-container" class="flex-1 overflow-y-auto p-6 bg-white bg-opacity-40 space-y-4">
            <?php if (empty($conversation->messages)): ?>
                <div class="flex flex-col items-center justify-center h-full text-gray-400">
                    <i class="far fa-comments text-5xl mb-3 opacity-20"></i>
                    <p>No messages yet.</p>
                </div>
            <?php else: ?>
                <?php foreach ($conversation->messages as $msg): ?>
                    <?php
                    $isAgent = $msg->sender_type === 'agent';
                    $align = $isAgent ? 'justify-end' : 'justify-start';
                    $senderName = $isAgent ? 'You' : ($conversation->user_name ?? 'Guest');
                    ?>
                    <div class="flex <?php echo $align; ?>">
                        <div class="max-w-lg flex flex-col <?php echo $isAgent ? 'items-end' : 'items-start'; ?>">
                            <div
                                class="flex items-center space-x-2 text-xs text-gray-500 mb-1 <?php echo $isAgent ? 'flex-row-reverse space-x-reverse' : ''; ?>">
                                <span class="font-medium"><?php echo htmlspecialchars($senderName); ?></span>
                                <span><?php echo date('H:i', strtotime($msg->created_at)); ?></span>
                            </div>
                            <div
                                class="px-4 py-2 rounded-lg shadow-sm text-sm break-words 
                                <?php echo $isAgent ? 'bg-blue-600 text-white rounded-br-none shadow-md' : 'bg-white text-gray-800 border border-gray-100 rounded-bl-none shadow-sm'; ?>">
                                <?php echo nl2br(htmlspecialchars($msg->message)); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Input Area (Sticky Bottom) -->
        <div
            class="p-4 bg-white bg-opacity-60 backdrop-filter backdrop-blur-sm border-t border-gray-200 border-opacity-40">
            <?php if ($conversation->status === 'active'): ?>
                <form id="reply-form" class="flex gap-4">
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                    <input type="hidden" name="conversation_id" value="<?php echo $conversation->id; ?>">

                    <div class="flex-1 relative">
                        <input type="text" name="message" id="message-input"
                            class="w-full rounded-full border-gray-300 pl-4 pr-12 py-3 focus:border-blue-500 focus:ring-blue-500 shadow-sm bg-white bg-opacity-80"
                            placeholder="Type your reply..." autocomplete="off" required>
                        <button type="submit"
                            class="absolute right-2 top-2 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700 transition-colors shadow-md w-8 h-8 flex items-center justify-center">
                            <i class="fas fa-paper-plane text-xs"></i>
                        </button>
                    </div>
                </form>
            <?php else: ?>
                <div class="text-center p-3 bg-gray-50 bg-opacity-50 rounded-lg text-gray-500 text-sm">
                    <i class="fas fa-lock mr-2"></i> This conversation is resolved.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    const conversationId = <?php echo $conversation->id; ?>;
    const messagesContainer = document.getElementById('messages-container');
    const replyForm = document.getElementById('reply-form');
    const csrfToken = '<?php echo $csrf_token; ?>';
    let lastMessageId = <?php echo empty($conversation->messages) ? 0 : end($conversation->messages)->id; ?>;

    // Scroll to bottom on load
    function scrollToBottom() {
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
    scrollToBottom();

    if (replyForm) {
        // Handle Reply
        replyForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const input = document.getElementById('message-input');
            const message = input.value.trim();
            if (!message) return;

            const formData = new FormData(this);

            // Optimistic UI update
            addMessageToUi(message, true, new Date().toISOString());
            input.value = '';

            // Send actual request
            fetch('/admin/chat/reply', { method: 'POST', body: formData })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        lastMessageId = data.message_id;
                    } else {
                        alert('Failed to send: ' + (data.error || 'Unknown error'));
                        // TODO: Remove optimistic message or show error state
                    }
                })
                .catch(err => console.error(err));
        });
    }

    function addMessageToUi(text, isAgent, timeStr) {
        const align = isAgent ? 'justify-end' : 'justify-start';
        const itemsAlign = isAgent ? 'items-end' : 'items-start';
        const rowReverse = isAgent ? 'flex-row-reverse space-x-reverse' : '';
        const bgColor = isAgent ? 'bg-blue-600 text-white rounded-br-none' : 'bg-white text-gray-800 border border-gray-100 rounded-bl-none';
        const sender = isAgent ? 'You' : '<?php echo addslashes($conversation->user_name ?? 'Guest'); ?>';

        const date = new Date(timeStr);
        const time = date.getHours().toString().padStart(2, '0') + ':' + date.getMinutes().toString().padStart(2, '0');

        const html = `
        <div class="flex ${align}">
            <div class="max-w-lg flex flex-col ${itemsAlign}">
                <div class="flex items-center space-x-2 text-xs text-gray-500 mb-1 ${rowReverse}">
                    <span class="font-medium">${sender}</span>
                    <span>${time}</span>
                </div>
                <div class="px-4 py-2 rounded-lg shadow-sm text-sm break-words ${bgColor}">
                    ${text}
                </div>
            </div>
        </div>
    `;

        // Check if we act on specific div or insert adjacent
        // If empty state exists, remove it
        const emptyState = messagesContainer.querySelector('.flex-col.items-center');
        if (emptyState) emptyState.remove();

        messagesContainer.insertAdjacentHTML('beforeend', html);
        scrollToBottom();
    }

    // Poll for new messages
    setInterval(function () {
        fetch(`/chat/messages?conversation_id=${conversationId}&since_id=${lastMessageId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success && data.messages.length > 0) {
                    data.messages.forEach(msg => {
                        const isAgent = msg.sender_type === 'agent';
                        if (!isAgent) {
                            addMessageToUi(msg.message, false, msg.created_at);
                        }
                        if (msg.id > lastMessageId) {
                            lastMessageId = msg.id;
                        }
                    });

                    // Mark read
                    fetch('/admin/chat/mark-read', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `id=${conversationId}&csrf_token=${csrfToken}`
                    });
                }
            });
    }, 5000);
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/admin.php';
?>