<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DHCI Chatbot - CodeIgniter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        /* Demo Content */
        .content {
            max-width: 800px;
            margin: 0 auto;
            padding: 50px 20px;
            text-align: center;
            color: white;
        }

        .content h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin-top: 30px;
        }

        /* Floating Chat Button - Left Side */
        .chatbot-float {
            position: fixed;
            bottom: 30px;
            left: 30px;
            width: 65px;
            height: 65px;
            background: linear-gradient(145deg, #25D366, #128C7E);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
            transition: all 0.3s ease;
            z-index: 9999;
            font-size: 32px;
            color: white;
            animation: pulse 2s infinite;
        }

        .chatbot-float:hover {
            transform: scale(1.1);
            background: linear-gradient(145deg, #128C7E, #075e54);
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        /* Chat Window */
        .chat-window {
            position: fixed;
            bottom: 110px;
            left: 30px;
            width: 380px;
            max-width: calc(100vw - 60px);
            height: 550px;
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 10000;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .chat-header {
            background: linear-gradient(98deg, #075e54, #128C7E);
            color: white;
            padding: 16px 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-info i {
            font-size: 24px;
        }

        .header-info h4 {
            margin: 0;
            font-size: 1rem;
        }

        .header-info p {
            margin: 0;
            font-size: 0.7rem;
            opacity: 0.9;
        }

        .close-chat {
            cursor: pointer;
            font-size: 22px;
            padding: 0 8px;
            border-radius: 50%;
        }

        .close-chat:hover {
            background: rgba(255,255,255,0.2);
        }

        /* Messages Area */
        .messages-area {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            background: #e5ddd5;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .message {
            max-width: 80%;
            padding: 10px 14px;
            border-radius: 18px;
            font-size: 0.9rem;
            line-height: 1.4;
            word-wrap: break-word;
        }

        .user-msg {
            align-self: flex-end;
            background: #dcf8c5;
            color: #075e54;
            border-bottom-right-radius: 4px;
        }

        .bot-msg {
            align-self: flex-start;
            background: white;
            color: #1a1a1a;
            border-bottom-left-radius: 4px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .typing {
            align-self: flex-start;
            background: white;
            padding: 10px 15px;
            border-radius: 18px;
            display: flex;
            gap: 4px;
        }

        .typing span {
            width: 8px;
            height: 8px;
            background: #999;
            border-radius: 50%;
            animation: typingAnim 1.4s infinite;
        }

        .typing span:nth-child(2) { animation-delay: 0.2s; }
        .typing span:nth-child(3) { animation-delay: 0.4s; }

        @keyframes typingAnim {
            0%, 60%, 100% { transform: translateY(0); opacity: 0.5; }
            30% { transform: translateY(-5px); opacity: 1; }
        }

        /* Input Area */
        .input-area {
            display: flex;
            padding: 12px;
            background: white;
            border-top: 1px solid #ddd;
            gap: 8px;
        }

        .input-area input {
            flex: 1;
            padding: 10px 14px;
            border: 1px solid #ddd;
            border-radius: 25px;
            outline: none;
            font-size: 0.9rem;
        }

        .input-area input:focus {
            border-color: #128C7E;
        }

        .input-area button {
            background: #128C7E;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .input-area button:hover {
            background: #075e54;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            z-index: 9998;
            display: none;
        }

        @media (max-width: 550px) {
            .chat-window {
                width: 90vw;
                left: 5vw;
                height: 60vh;
            }
            .chatbot-float {
                width: 55px;
                height: 55px;
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

<div class="content">
    <h1>💬 DHCI Chatbot</h1>
    <div class="card">
        <h3>CodeIgniter Integration</h3>
        <p>Click the floating button on the LEFT side to start chatting</p>
        <i class="fa-regular fa-message" style="font-size: 40px; margin-top: 15px;"></i>
    </div>
</div>

<!-- Floating Button -->
<div class="chatbot-float" id="chatbotFloat">
    <i class="fa-regular fa-comment-dots"></i>
</div>

<!-- Overlay -->
<div class="overlay" id="overlay"></div>

<!-- Chat Window -->
<div class="chat-window" id="chatWindow">
    <div class="chat-header">
        <div class="header-info">
            <i class="fa-regular fa-circle-user"></i>
            <div>
                <h4>DHCI Chatbot</h4>
                <p>● Online | Usually replies instantly</p>
            </div>
        </div>
        <div class="close-chat" id="closeChat">✖</div>
    </div>
    
    <div class="messages-area" id="messagesArea">
        <div class="message bot-msg">
            👋 Hello! Welcome to DHCI. How can I help you today?
        </div>
    </div>
    
    <div class="input-area">
        <input type="text" id="userInput" placeholder="Type your message..." autocomplete="off">
        <button id="sendBtn">Send</button>
    </div>
</div>

<script>
    const floatBtn = document.getElementById('chatbotFloat');
    const chatWindow = document.getElementById('chatWindow');
    const closeChat = document.getElementById('closeChat');
    const overlay = document.getElementById('overlay');
    const messagesArea = document.getElementById('messagesArea');
    const userInput = document.getElementById('userInput');
    const sendBtn = document.getElementById('sendBtn');
    
    let isWaiting = false;

    // Open/Close functions
    function openChat() {
        chatWindow.style.display = 'flex';
        overlay.style.display = 'block';
        document.body.style.overflow = 'hidden';
        userInput.focus();
    }

    function closeChat() {
        chatWindow.style.display = 'none';
        overlay.style.display = 'none';
        document.body.style.overflow = '';
    }

    floatBtn.addEventListener('click', openChat);
    closeChat.addEventListener('click', closeChat);
    overlay.addEventListener('click', closeChat);

    // Add message to chat
    function addMessage(text, type) {
        const msgDiv = document.createElement('div');
        msgDiv.classList.add('message');
        msgDiv.classList.add(type === 'user' ? 'user-msg' : 'bot-msg');
        msgDiv.textContent = text;
        messagesArea.appendChild(msgDiv);
        messagesArea.scrollTop = messagesArea.scrollHeight;
    }

    // Show typing indicator
    function showTyping() {
        const typingDiv = document.createElement('div');
        typingDiv.classList.add('typing');
        typingDiv.id = 'typingIndicator';
        for (let i = 0; i < 3; i++) {
            const span = document.createElement('span');
            typingDiv.appendChild(span);
        }
        messagesArea.appendChild(typingDiv);
        messagesArea.scrollTop = messagesArea.scrollHeight;
    }

    function removeTyping() {
        const typing = document.getElementById('typingIndicator');
        if (typing) typing.remove();
    }

    // Send message to CodeIgniter backend
    async function sendMessage() {
        if (isWaiting) return;
        
        const message = userInput.value.trim();
        if (message === '') return;
        
        // Clear input and show user message
        userInput.value = '';
        addMessage(message, 'user');
        
        isWaiting = true;
        showTyping();
        
        try {
            // Create form data for CodeIgniter
            const formData = new FormData();
            formData.append('message', message);
            
            const response = await fetch('<?= base_url("chatbot/send_message") ?>', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            const data = await response.json();
            removeTyping();
            addMessage(data.reply, 'bot');
            
        } catch(error) {
            removeTyping();
            addMessage('⚠️ Network error. Please try again.', 'bot');
            console.error('Error:', error);
        }
        
        isWaiting = false;
        userInput.focus();
    }

    // Event listeners
    sendBtn.addEventListener('click', sendMessage);
    userInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });

    console.log('✅ Chatbot ready! Connected to CodeIgniter backend.');
</script>

</body>
</html>