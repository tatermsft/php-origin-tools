<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Room</title>
    <link rel="stylesheet" href="wsstyles.css">
</head>
<body>
    <div class="chat-container">
        <div id="chat-box" class="chat-box"></div>
        <div id="username-container">
            <input type="text" id="username" placeholder="Enter your username">
            <button onclick="setUsername()">Set Username</button>
        </div>
        <input type="text" id="message" placeholder="Type your message here..." style="display: none;">
        <button onclick="sendMessage()" style="display: none;">Send</button>
        <button onclick="connect()">Connect</button>
        <button onclick="disconnect()">Disconnect</button>
    </div>

    <script>
        let ws;
        let username;

        function connect() {
            ws = new WebSocket('wss://wss.russellrundell.com:443');

            ws.onopen = () => {
                writeMessage('Connected to the WebSocket server');
            };

            ws.onmessage = (event) => {
                writeMessage(event.data);
            };

            ws.onclose = () => {
                writeMessage('Disconnected from the WebSocket server');
            };
        }

        function disconnect() {
            if (ws) {
                ws.close();
            }
        }

        function setUsername() {
            const userInput = document.getElementById('username');
            username = userInput.value;
            document.getElementById('username-container').style.display = 'none';
            document.getElementById('message').style.display = 'block';
            document.querySelector('button[onclick="sendMessage()"]').style.display = 'block';
        }

        function sendMessage() {
            const input = document.getElementById('message');
            const message = username + ': ' + input.value;
            ws.send(message);
            input.value = '';
        }

        function writeMessage(message) {
            const chatBox = document.getElementById('chat-box');
            const messageDiv = document.createElement('div');
            messageDiv.className = 'message';
            messageDiv.textContent = message;
            chatBox.appendChild(messageDiv);
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
</body>
</html>
