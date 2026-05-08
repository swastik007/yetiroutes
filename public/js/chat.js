// Chat functionality for Yeti Routes
console.log('chat.js file loaded successfully');

class YetiChat {
    constructor() {
        this.conversationId = 0;
        this.visitorId = '';
        this.lastMessageId = 0;
        this.isOpen = false;
        this.pollInterval = null;
        this.isPolling = false;
        this.userName = '';
        this.userEmail = '';
        this.currentState = 'prechat'; // prechat, greeting, menu, chatting
        this.selectedOption = null;
    }

    // Initialize chat widget
    initialize() {
        console.log('YetiChat.initialize() called');
        this.bindEvents();
        this.visitorId = document.querySelector('meta[name="chat-visitor-id"]')?.content || this.generateVisitorId();
        console.log('YetiChat initialized for visitor:', this.visitorId);
        console.log('Chat toggle button found:', document.getElementById('chat-toggle'));
    }

    // Generate visitor ID if not provided
    generateVisitorId() {
        return 'visitor_' + Math.random().toString(36).substr(2, 9);
    }

    // Bind event listeners
    bindEvents() {
        console.log('YetiChat.bindEvents() called');

        // Toggle chat
        const toggleBtn = document.getElementById('chat-toggle');
        console.log('Toggle button element:', toggleBtn);
        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => this.toggleChat());
            console.log('Chat event listeners attached');
        }

        document.getElementById('chat-close')?.addEventListener('click', () => this.closeChat());
        document.getElementById('pre-chat-form')?.addEventListener('submit', (e) => this.handlePreChatForm(e));
        document.getElementById('chat-form')?.addEventListener('submit', (e) => this.sendMessage(e));
        document.getElementById('chat-input')?.addEventListener('focus', () => this.scrollToBottom());

        // Option menu buttons
        document.querySelectorAll('.option-btn').forEach(btn => {
            btn.addEventListener('click', (e) => this.handleOptionSelect(e));
        });
    }

    // Toggle chat visibility
    toggleChat() {
        console.log('Toggle chat called');
        const chatBox = document.getElementById('chat-box');

        if (chatBox.classList.contains('hidden')) {
            this.openChat();
        } else {
            this.closeChat();
        }
    }

    // Open chat
    openChat() {
        console.log('Opening chat box, current state:', this.currentState);
        const chatBox = document.getElementById('chat-box');
        chatBox.classList.remove('hidden');
        this.isOpen = true;

        // Show appropriate interface based on current state
        switch(this.currentState) {
            case 'prechat':
                this.showPreChatForm();
                break;
            case 'greeting':
                this.showPersonalizedGreeting();
                break;
            case 'menu':
                this.showOptionMenu();
                break;
            case 'chatting':
                this.showChatInterface();
                this.startPolling();
                break;
            default:
                this.showPreChatForm();
        }
    }

    // Close chat
    closeChat() {
        console.log('Closing chat box');
        const chatBox = document.getElementById('chat-box');
        chatBox.classList.add('hidden');
        chatBox.style.border = 'none';
        this.isOpen = false;
        this.stopPolling();
    }

    // Show pre-chat form
    showPreChatForm() {
        document.getElementById('chat-pre-form').classList.remove('hidden');
        document.getElementById('chat-messages').classList.add('hidden');
        document.getElementById('chat-input-container').classList.add('hidden');
        document.getElementById('chat-status').classList.add('hidden');
    }

    // Show personalized greeting
    showPersonalizedGreeting() {
        document.getElementById('chat-pre-form').classList.add('hidden');
        document.getElementById('personalized-greeting').classList.remove('hidden');

        // Set the user's name in the greeting
        const greetingName = document.getElementById('greeting-name');
        if (greetingName && this.userName) {
            greetingName.textContent = this.userName;
        }

        // Auto-show option menu after 2 seconds
        setTimeout(() => {
            this.showOptionMenu();
        }, 2000);
    }

    // Show option menu
    showOptionMenu() {
        document.getElementById('personalized-greeting').classList.add('hidden');
        document.getElementById('option-menu').classList.remove('hidden');
        this.currentState = 'menu';
        this.setStatus('Choose an option');
    }

    // Show chat interface
    showChatInterface() {
        document.getElementById('option-menu').classList.add('hidden');
        document.getElementById('chat-messages').classList.remove('hidden');
        document.getElementById('chat-input-container').classList.remove('hidden');
        document.getElementById('chat-status').classList.remove('hidden');
        this.currentState = 'chatting';
    }

    // Handle pre-chat form submission
    async handlePreChatForm(e) {
        e.preventDefault();

        // Validate form
        const nameInput = e.target.querySelector('input[name="user_name"]');
        const emailInput = e.target.querySelector('input[name="user_email"]');

        const name = nameInput.value.trim();
        const email = emailInput.value.trim();

        if (!name || !email) {
            this.setStatus('Please fill in all fields', 'error');
            return;
        }

        if (!this.isValidEmail(email)) {
            this.setStatus('Please enter a valid email address', 'error');
            return;
        }

        // Show loading state
        this.setButtonLoading(true);

        const userData = {
            user_name: name,
            user_email: email
        };

        this.setStatus('Starting conversation...');

        try {
            const response = await this.apiCall('/chat/start', 'POST', userData);

            if (response.success) {
                this.userName = name;
                this.userEmail = email;
                this.conversationId = response.conversation_id;
                document.getElementById('conversation-id').value = this.conversationId;
                this.currentState = 'greeting';
                this.showPersonalizedGreeting();
                this.setStatus('Welcome!');
            } else {
                this.setStatus('Error: ' + (response.error || 'Failed to start conversation'), 'error');
                this.setButtonLoading(false);
            }
        } catch (error) {
            console.error('Chat start error:', error);
            this.setStatus('Connection error. Please try again.', 'error');
            this.setButtonLoading(false);
        }
    }

    // Validate email format
    isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Handle button loading state
    setButtonLoading(loading) {
        const btn = document.getElementById('start-chat-btn');
        const text = document.getElementById('start-btn-text');
        const icon = document.getElementById('start-btn-icon');
        const spinner = document.getElementById('start-btn-spinner');

        if (loading) {
            btn.disabled = true;
            text.textContent = 'Connecting...';
            icon.classList.add('hidden');
            spinner.classList.remove('hidden');
        } else {
            btn.disabled = false;
            text.textContent = 'Start Conversation';
            icon.classList.remove('hidden');
            spinner.classList.add('hidden');
        }
    }

    // Send message
    async sendMessage(e) {
        e.preventDefault();

        const input = document.getElementById('chat-input');
        const message = input.value.trim();

        if (!message) return;

        // Show typing indicator briefly
        this.showTypingIndicator();

        // Add message to UI immediately
        this.addMessageToUI('visitor', message);
        input.value = '';
        this.scrollToBottom();

        try {
            const formData = new FormData(e.target);
            formData.append('message', message);

            const response = await this.apiCall('/chat/send', 'POST', formData);

            if (!response.success) {
                this.setStatus('Failed to send message. Please try again.', 'error');
                // Could add retry logic here
            } else {
                this.setStatus('Message sent successfully');
            }
        } catch (error) {
            console.error('Send message error:', error);
            this.setStatus('Connection error. Please check your internet and try again.', 'error');
        } finally {
            this.hideTypingIndicator();
        }
    }

    // Show typing indicator
    showTypingIndicator() {
        const indicator = document.getElementById('typing-indicator');
        if (indicator) {
            indicator.classList.remove('hidden');
            this.scrollToBottom();
        }
    }

    // Hide typing indicator
    hideTypingIndicator() {
        const indicator = document.getElementById('typing-indicator');
        if (indicator) {
            indicator.classList.add('hidden');
        }
    }

    // Start polling for new messages
    startPolling() {
        if (this.pollInterval) {
            clearInterval(this.pollInterval);
        }

        this.pollInterval = setInterval(() => {
            if (!this.isPolling) {
                this.pollMessages();
            }
        }, 3000); // Poll every 3 seconds
    }

    // Stop polling
    stopPolling() {
        if (this.pollInterval) {
            clearInterval(this.pollInterval);
            this.pollInterval = null;
        }
    }

    // Poll for new messages
    async pollMessages() {
        if (!this.conversationId || this.isPolling) return;

        this.isPolling = true;

        try {
            console.log('🔄 Polling for messages, conversation:', this.conversationId, 'since_id:', this.lastMessageId, 'visitor_id:', this.visitorId);
            const response = await this.apiCall(`/chat/messages?conversation_id=${this.conversationId}&since_id=${this.lastMessageId}`);
            console.log('📡 Poll response received:', response);

            if (response.success) {
                console.log('✅ API call successful, messages array length:', response.messages ? response.messages.length : 'undefined');

                if (response.messages && response.messages.length > 0) {
                    console.log('📨 Processing', response.messages.length, 'new messages');
                    response.messages.forEach((message, index) => {
                        console.log(`💬 Message ${index + 1}: ID ${message.id}, sender: ${message.sender_type}, content: "${message.message.substring(0, 50)}..."`);
                        this.addMessageToUI(message.sender_type, message.message, message.created_at);
                        this.lastMessageId = Math.max(this.lastMessageId, message.id);
                    });
                    this.scrollToBottom();
                    this.setStatus('Online - New messages received');
                } else {
                    console.log('📭 No new messages in this poll');
                    this.setStatus('Online');
                }
            } else {
                console.error('❌ API call failed:', response.error);
                this.setStatus('Connection issues', 'error');
            }
        } catch (error) {
            console.error('🚨 Poll error:', error);
            this.setStatus('Connection issues', 'error');
        } finally {
            this.isPolling = false;
        }
    }

    // Add message to UI
    addMessageToUI(senderType, message, timestamp = null) {
        console.log('🎨 Adding message to UI:', senderType, message.substring(0, 30) + '...');

        const messagesContainer = document.getElementById('chat-messages');
        if (!messagesContainer) {
            console.error('❌ Messages container not found!');
            return;
        }

        const messageDiv = document.createElement('div');
        messageDiv.className = `flex ${senderType === 'visitor' ? 'justify-end' : 'justify-start'}`;

        const bubbleClass = senderType === 'visitor'
            ? 'bg-brand-lime text-black'
            : 'bg-white text-gray-800 border border-gray-200';

        const time = timestamp ? new Date(timestamp).toLocaleTimeString() : new Date().toLocaleTimeString();

        messageDiv.innerHTML = `
            <div class="max-w-xs">
                <div class="${bubbleClass} rounded-lg px-4 py-2 mb-1">
                    ${this.escapeHtml(message)}
                </div>
                <div class="text-xs text-gray-500 text-${senderType === 'visitor' ? 'right' : 'left'}">
                    ${time}
                </div>
            </div>
        `;

        messagesContainer.appendChild(messageDiv);
        console.log('✅ Message added to DOM successfully');
    }

    // Scroll to bottom of messages
    scrollToBottom() {
        const messagesContainer = document.getElementById('chat-messages');
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    // Set status message
    setStatus(message, type = 'info') {
        const statusElement = document.getElementById('status-text');
        if (statusElement) {
            statusElement.textContent = message;
            statusElement.className = `text-xs ${
                type === 'error' ? 'text-red-500' :
                type === 'warning' ? 'text-yellow-500' :
                'text-gray-500'
            }`;
        }
    }

    // API call helper
    async apiCall(url, method = 'GET', data = null) {
        const options = {
            method: method,
            headers: {
                'Content-Type': 'application/json',
            },
        };

        if (data && method !== 'GET') {
            if (data instanceof FormData) {
                options.body = data;
                delete options.headers['Content-Type']; // Let browser set content-type for FormData
            } else {
                options.body = JSON.stringify(data);
                options.headers['Content-Type'] = 'application/json';
            }
        }

        try {
            const response = await fetch(url, options);
            return await response.json();
        } catch (error) {
            console.error('API call error:', error);
            throw error;
        }
    }

    // Handle option selection
    handleOptionSelect(e) {
        const option = e.currentTarget.dataset.option;
        this.selectedOption = option;

        console.log('Selected option:', option);

        // Show chat interface and start the specific workflow
        this.showChatInterface();

        // Handle different options
        switch(option) {
            case 'permit':
                this.startPermitWorkflow();
                break;
            case 'cost':
                this.startCostCalculatorWorkflow();
                break;
            case 'itinerary':
                this.startItineraryWorkflow();
                break;
            case 'vacation':
                this.startVacationWorkflow();
                break;
            default:
                this.addMessageToUI('agent', 'How can I help you with your Himalayan adventure?');
        }
    }

    // Start permit information workflow
    startPermitWorkflow() {
        this.addMessageToUI('agent', `Hi ${this.userName}! I'd be happy to help you with permit information for Nepal. Which region are you planning to visit?`);
        this.addMessageToUI('agent', 'Options: Everest, Annapurna, Langtang, or Manaslu region');
    }

    // Start cost calculator workflow
    startCostCalculatorWorkflow() {
        this.addMessageToUI('agent', `Great to meet you ${this.userName}! Let's calculate the costs for your trek. How many days is your planned trek?`);
    }

    // Start itinerary planning workflow
    startItineraryWorkflow() {
        this.addMessageToUI('agent', `Hello ${this.userName}! I'm excited to help you plan your custom trek itinerary. What type of trekking experience are you looking for?`);
        this.addMessageToUI('agent', 'Options: Cultural trek, Scenic views, Adventure trek, or Tea house trek');
    }

    // Start vacation planning workflow
    startVacationWorkflow() {
        this.addMessageToUI('agent', `Hi ${this.userName}! Let's plan your complete vacation. How many days do you have for your trip to Nepal?`);
    }

    // Escape HTML for security
    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
}

// Test function for debugging
window.testChatFlow = async function() {
    console.log('🧪 Testing chat flow...');

    if (!window.yetiChat) {
        console.error('❌ YetiChat not initialized');
        return;
    }

    console.log('📊 Current chat state:');
    console.log('- Conversation ID:', window.yetiChat.conversationId);
    console.log('- Visitor ID:', window.yetiChat.visitorId);
    console.log('- Last Message ID:', window.yetiChat.lastMessageId);
    console.log('- Current State:', window.yetiChat.currentState);

    // Test API call
    try {
        console.log('🔍 Testing API connectivity...');
        const response = await window.yetiChat.apiCall('/chat/debug');
        console.log('📡 Debug API response:', response);
    } catch (error) {
        console.error('🚨 API test failed:', error);
    }

    // Test polling
    if (window.yetiChat.conversationId) {
        console.log('🔄 Testing manual poll...');
        await window.yetiChat.pollMessages();
    } else {
        console.log('⚠️ No active conversation to poll');
    }
};

// Initialize chat when document is ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('chat.js: Initializing YetiChat...');
    try {
        window.yetiChat = new YetiChat();
        window.yetiChat.initialize();
        console.log('chat.js: YetiChat initialized successfully');

        // Make test function globally available
        window.testChatFlow = window.testChatFlow;
        console.log('💡 Run testChatFlow() in console to debug');
    } catch (error) {
        console.error('chat.js: Error initializing YetiChat:', error);
    }
});

// Global function for external access
window.toggleChat = function() {
    if (window.yetiChat) {
        window.yetiChat.toggleChat();
    }
};

function sendMessage() {
    const form = document.getElementById('chat-form');
    if (form) {
        form.dispatchEvent(new Event('submit', { cancelable: true }));
    }
}
