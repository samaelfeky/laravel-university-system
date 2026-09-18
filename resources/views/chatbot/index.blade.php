<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clarity AI</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
        }

        .chat-container {
            width: 100%;
            max-width: 800px;
            height: 90vh;
            margin: 5vh auto;
            background: white;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .header {
            padding: 20px;
            border-bottom: 1px solid #eee;
            font-size: 22px;
            font-weight: bold;
        }

        .messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .message {
            margin-bottom: 15px;
            padding: 12px 16px;
            border-radius: 12px;
            max-width: 80%;
            line-height: 1.5;
        }

        .user {
            margin-left: auto;
            background: #e8f0ff;
        }

        .bot {
            background: #f1f1f1;
        }

        .composer {
            display: flex;
            gap: 10px;
            padding: 15px;
            border-top: 1px solid #eee;
        }

        .composer textarea {
            flex: 1;
            resize: none;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            outline: none;
        }

        .composer button {
            border: none;
            background: #111827;
            color: white;
            padding: 0 20px;
            border-radius: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="chat-container">

    <div class="header">
        clarity. <span style="font-size:14px;color:#777;">AI Assistant</span>
    </div>

    <div id="messages" class="messages">
        <div class="message bot">
            Hello! How can I help you today?
        </div>
    </div>

    <div class="composer">
        <textarea
            id="message"
            rows="2"
            placeholder="Type your message..."
        ></textarea>

        <button onclick="sendMessage()">
            Send
        </button>
    </div>

</div>

<script>
async function sendMessage() {

    const input = document.getElementById('message');
    const messages = document.getElementById('messages');

    const message = input.value.trim();

    if (!message) {
        return;
    }

    messages.innerHTML += `
        <div class="message user">
            ${message}
        </div>
    `;

    input.value = '';

    const response = await fetch('/api/chatbot', {
        method: 'POST',

        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },

        body: JSON.stringify({
            message: message
        })
    });

    const data = await response.json();

    messages.innerHTML += `
        <div class="message bot">
            ${data.reply ?? 'Something went wrong.'}
        </div>
    `;

    messages.scrollTop = messages.scrollHeight;
}
</script>

</body>
</html>