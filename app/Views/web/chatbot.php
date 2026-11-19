<?php
// Floating Chat Button with chatbot.php integration
// Save this file as index.php or any .php file on your server
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>DHCI Chatbot - Floating Widget</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, 'Segoe UI', 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        /* ========= FLOATING BUTTON ========= */
        #floatingChatButton {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 68px;
            height: 68px;
            background: linear-gradient(145deg, #1a56db, #1e3a8a);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(255,255,255,0.15);
            transition: all 0.25s ease;
            z-index: 10000;
            border: none;
            user-select: none;
        }

        #floatingChatButton:hover {
            transform: scale(1.08);
            background: linear-gradient(145deg, #2563eb, #1e40af);
            box-shadow: 0 18px 32px rgba(0, 0, 0, 0.3);
        }

        #floatingChatButton:active {
            transform: scale(0.96);
        }

        .chat-icon {
            font-size: 32px;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
        }

        /* ========= CHATBOX WINDOW ========= */
        #chatboxWindow {
            position: fixed;
            bottom: 105px;
            right: 24px;
            width: 390px;
            max-width: calc(100vw - 48px);
            height: 560px;
            max-height: 70vh;
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35), 0 0 0 1px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            z-index: 10001;
            transition: opacity 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1), transform 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            opacity: 0;
            transform: scale(0.92) translateY(12px);
            pointer-events: none;
        }

        #chatboxWindow.open {
            opacity: 1;
            transform: scale(1) translateY(0);
            pointer-events: auto;
        }

        /* Header */
        .chatbox-header {
            background: linear-gradient(98deg, #1e3a8a, #2563eb);
            color: white;
            padding: 18px 20px;
            font-weight: 700;
            font-size: 1.2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            letter-spacing: -0.2px;
        }

        .chatbox-header h3 {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0;
        }

        #closeChatbox {
            cursor: pointer;
            font-size: 22px;
            font-weight: bold;
            transition: 0.2s;
            line-height: 1;
            padding: 0 8px;
            border-radius: 40px;
        }

        #closeChatbox:hover {
            opacity: 0.75;
            background-color: rgba(255,255,255,0.2);
        }

        /* Messages Container */
        #chatMessages {
            flex: 1;
            padding: 18px 14px;
            overflow-y: auto;
            background-color: #f8fafc;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Message Bubbles */
        .message {
            max-width: 85%;
            padding: 10px 15px;
            border-radius: 22px;
            font-size: 0.9rem;
            line-height: 1.45;
            word-wrap: break-word;
            animation: fadeSlideUp 0.2s ease;
        }

        .user-message {
            align-self: flex-end;
            background: linear-gradient(115deg, #1e40af, #2563eb);
            color: white;
            border-bottom-right-radius: 6px;
        }

        .bot-message {
            align-self: flex-start;
            background-color: #eef2ff;
            color: #0f172a;
            border-bottom-left-radius: 6px;
            box-shadow: 0 1px 1px rgba(0,0,0,0.03);
        }

        .error-message {
            align-self: flex-start;
            background-color: #ffe4e4;
            color: #b91c1c;
            border-left: 4px solid #ef4444;
            border-radius: 18px;
        }

        /* Typing indicator */
        .typing-indicator {
            align-self: flex-start;
            background-color: #eef2ff;
            border-radius: 24px;
            padding: 12px 18px;
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .typing-indicator span {
            width: 9px;
            height: 9px;
            background-color: #4b5563;
            border-radius: 50%;
            display: inline-block;
            animation: typingBounce 1.4s infinite ease-in-out;
        }

        .typing-indicator span:nth-child(1) { animation-delay: 0s; }
        .typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
        .typing-indicator span:nth-child(3) { animation-delay: 0.4s; }

        @keyframes typingBounce {
            0%, 60%, 100% { transform: translateY(0); opacity: 0.5; }
            30% { transform: translateY(-6px); opacity: 1; }
        }

        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(6px);}
            to { opacity: 1; transform: translateY(0);}
        }

        /* Input area */
        .chat-input-area {
            display: flex;
            padding: 14px 16px;
            border-top: 1px solid #e2e8f0;
            background: white;
            gap: 10px;
            align-items: center;
        }

        #userMessage {
            flex: 1;
            padding: 11px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 40px;
            font-size: 0.9rem;
            outline: none;
            transition: 0.2s;
            background: #ffffff;
        }

        #userMessage:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
        }

        .send-btn {
            background-color: #1e3a8a;
            color: white;
            border: none;
            padding: 9px 20px;
            border-radius: 40px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
            font-size: 0.85rem;
        }

        .send-btn:hover {
            background-color: #0f2b6d;
            transform: scale(0.96);
        }

        .send-btn:active {
            transform: scale(0.94);
        }

        /* Small screens */
        @media (max-width: 480px) {
            #chatboxWindow {
                width: 92vw;
                right: 4vw;
                bottom: 85px;
                height: 62vh;
            }
            #floatingChatButton {
                width: 56px;
                height: 56px;
                bottom: 18px;
                right: 18px;
            }
            .chat-icon {
                font-size: 28px;
            }
        }

        /* Scrollbar */
        #chatMessages::-webkit-scrollbar {
            width: 5px;
        }
        #chatMessages::-webkit-scrollbar-track {
            background: #e2e8f0;
            border-radius: 10px;
        }
        #chatMessages::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<!-- FLOATING CHAT BUTTON -->
<div id="floatingChatButton">
    <span class="chat-icon">💬</span>
</div>

<!-- CHATBOX WINDOW -->
<div id="chatboxWindow">
    <div class="chatbox-header">
        <h3>🤖 DHCI Chatbot</h3>
        <span id="closeChatbox">✖</span>
    </div>

    <div id="chatMessages">
        <!-- Welcome message -->
        <div class="message bot-message">
            👋 Hello! I'm DHCI assistant. Ask me anything — I'm connected to chatbot.php
        </div>
    </div>

    <div class="chat-input-area">
        <input type="text" id="userMessage" placeholder="Type your message..." autocomplete="off">
        <button class="send-btn" onclick="sendMessage()">Send</button>
    </div>
</div>

<script>
    // ============================================================
    // FLOATING CHAT BUTTON WITH chatbot.php INTEGRATION
    // This widget connects to your existing chatbot.php file
    // The backend should accept POST with JSON { "message": "text" }
    // and return JSON { "reply": "response" }
    // ============================================================

    // DEFAULT REPLY - This will be used if chatbot.php is not available or fails
    const DEFAULT_REPLY = "Thank you for your message. Our team will get back to you shortly. 😊";

    // DOM Elements
    const chatButton = document.getElementById('floatingChatButton');
    const chatWindow = document.getElementById('chatboxWindow');
    const closeButton = document.getElementById('closeChatbox');
    const messagesContainer = document.getElementById('chatMessages');
    const userInput = document.getElementById('userMessage');
    
    // State
    let isWaiting = false;
    let typingElement = null;

    // Auto-scroll to bottom
    function scrollToBottom() {
        if (messagesContainer) {
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }
    }

    // Add message to chat
    function addMessage(text, type) {
        const msgDiv = document.createElement('div');
        msgDiv.classList.add('message');
        
        if (type === 'user') {
            msgDiv.classList.add('user-message');
            msgDiv.textContent = text;
        } else if (type === 'bot') {
            msgDiv.classList.add('bot-message');
            msgDiv.textContent = text;
        } else if (type === 'error') {
            msgDiv.classList.add('error-message');
            msgDiv.textContent = '⚠️ ' + text;
        }
        
        messagesContainer.appendChild(msgDiv);
        scrollToBottom();
        return msgDiv;
    }

    // Show typing animation
    function showTyping() {
        removeTyping();
        const indicator = document.createElement('div');
        indicator.classList.add('typing-indicator');
        indicator.id = 'typingIndicator';
        for (let i = 0; i < 3; i++) {
            const dot = document.createElement('span');
            indicator.appendChild(dot);
        }
        messagesContainer.appendChild(indicator);
        scrollToBottom();
        typingElement = indicator;
    }

    function removeTyping() {
        if (typingElement && typingElement.parentNode) {
            typingElement.remove();
            typingElement = null;
        } else {
            const existing = document.getElementById('typingIndicator');
            if (existing) existing.remove();
        }
    }

    // Send message to chatbot.php (your existing backend file)
    async function sendToBackend(userMsg) {
        // Using relative path - chatbot.php should be in same directory
        const backendUrl = 'chatbot.php';
        
        try {
            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), 10000); // 10 second timeout
            
            const response = await fetch(backendUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ message: userMsg }),
                signal: controller.signal
            });
            
            clearTimeout(timeoutId);
            
            if (!response.ok) {
                // If backend fails, return default reply
                console.warn(`Backend responded with ${response.status}, using default reply`);
                return { success: true, reply: DEFAULT_REPLY, usedDefault: true };
            }
            
            const data = await response.json();
            
            // Handle various response formats
            let reply = null;
            if (data.reply) reply = data.reply;
            else if (data.response) reply = data.response;
            else if (data.message) reply = data.message;
            else if (data.answer) reply = data.answer;
            else if (data.text) reply = data.text;
            else if (data.error) {
                // If error from backend, use default reply
                console.warn('Backend returned error, using default reply');
                return { success: true, reply: DEFAULT_REPLY, usedDefault: true };
            }
            else {
                // If no recognizable field, use default reply
                return { success: true, reply: DEFAULT_REPLY, usedDefault: true };
            }
            
            return { success: true, reply: reply, usedDefault: false };
            
        } catch (error) {
            console.error('chatbot.php error:', error);
            // If any error occurs (network, file missing, etc.), return default reply
            return { success: true, reply: DEFAULT_REPLY, usedDefault: true };
        }
    }

    // Main send function
    async function sendMessage() {
        if (isWaiting) {
            addMessage("Please wait, I'm processing...", "error");
            return;
        }
        
        const message = userInput.value.trim();
        if (message === "") {
            addMessage("Please enter a message", "error");
            return;
        }
        
        // Clear input and show user message
        userInput.value = "";
        addMessage(message, "user");
        
        // Set waiting state and show typing
        isWaiting = true;
        showTyping();
        
        // Call your chatbot.php backend (will use default reply if fails)
        const result = await sendToBackend(message);
        
        // Remove typing indicator
        removeTyping();
        
        if (result.success) {
            addMessage(result.reply, "bot");
        } else {
            // Fallback to default reply if something unexpected happens
            addMessage(DEFAULT_REPLY, "bot");
        }
        
        isWaiting = false;
        userInput.focus();
    }

    // Handle Enter key
    function onKeyPress(event) {
        if (event.key === 'Enter' && !isWaiting) {
            event.preventDefault();
            sendMessage();
        }
    }

    // Toggle chat window
    function openChat() {
        chatWindow.classList.add('open');
        setTimeout(() => userInput.focus(), 150);
    }
    
    function closeChat() {
        chatWindow.classList.remove('open');
    }
    
    function toggleChat() {
        if (chatWindow.classList.contains('open')) {
            closeChat();
        } else {
            openChat();
        }
    }

    // Event listeners
    chatButton.addEventListener('click', (e) => {
        e.stopPropagation();
        toggleChat();
    });
    
    closeButton.addEventListener('click', (e) => {
        e.stopPropagation();
        closeChat();
    });
    
    userInput.addEventListener('keypress', onKeyPress);
    
    // Close chat when clicking outside
    document.addEventListener('click', function(event) {
        const isInsideChat = chatWindow.contains(event.target);
        const isOnButton = chatButton.contains(event.target);
        
        if (chatWindow.classList.contains('open') && !isInsideChat && !isOnButton) {
            closeChat();
        }
    });
    
    // Console info
    console.log("✅ Floating chat widget active — connected to chatbot.php");
    console.log("ℹ️ Default reply is set to: " + DEFAULT_REPLY);
    console.log("ℹ️ If chatbot.php is missing or fails, the default reply will be shown automatically");
</script>

</body>
</html>

<?php
// =====================================================
// This is the DEFAULT BACKUP HANDLER
// If your chatbot.php file exists, it will be used.
// If not, THIS DEFAULT REPLY WILL BE SENT automatically.
// You can modify the $defaultReply variable below.
// =====================================================

// Check if this request is for the chat endpoint
// This ensures that if chatbot.php is missing, we still return a default reply
$requestUri = $_SERVER['REQUEST_URI'] ?? '';
$isApiCall = (strpos($requestUri, 'chatbot.php') !== false) || 
             (isset($_SERVER['HTTP_CONTENT_TYPE']) && strpos($_SERVER['HTTP_CONTENT_TYPE'], 'application/json') !== false);

// If it's a POST request and either looking for chatbot.php or has JSON, provide default reply
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $isApiCall) {
    // Read JSON input
    $input = json_decode(file_get_contents('php://input'), true);
    $userMessage = $input['message'] ?? '';
    
    // Default reply message - YOU CAN CHANGE THIS TEXT
    $defaultReply = "Thank you for your message. Our team will get back to you shortly. 😊";
    
    // Optional: You can customize reply based on keywords
    $lowerMsg = strtolower($userMessage);
    if (strpos($lowerMsg, 'hello') !== false || strpos($lowerMsg, 'hi') !== false) {
        $defaultReply = "Hello! How can I help you today?";
    } elseif (strpos($lowerMsg, 'help') !== false) {
        $defaultReply = "Sure! I'm here to help. What do you need assistance with?";
    } elseif (strpos($lowerMsg, 'thanks') !== false || strpos($lowerMsg, 'thank you') !== false) {
        $defaultReply = "You're welcome! Feel free to ask if you need anything else.";
    }
    
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode(['reply' => $defaultReply]);
    exit;
}
?>