<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-time Chat</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.js"></script>
</head>
<body>
    <div id="chat"></div>
    
    <script>
        const userId = getParameterByName('user_id');
        const matchedUserId = getParameterByName('matched_user_id');
        const socket = io('http://your-server-address:3000'); // Change to your server address

        socket.on('connect', () => {
            socket.emit('join', { userId, matchedUserId });

            socket.on('message', (data) => {
                $('#chat').append(`<p>${data.userId}: ${data.message}</p>`);
            });

            $('#chat').append('<input type="text" id="message" placeholder="Type your message">');
            $('#chat').append('<button onclick="sendMessage()">Send</button>');
        });

        function sendMessage() {
            const message = $('#message').val();
            socket.emit('message', { userId, matchedUserId, message });
            $('#message').val('');
        }
        function getParameterByName(name, url = window.location.href) {
            name = name.replace(/[\[\]]/g, '\\$&');
            const regex = new RegExp(`[?&]${name}(=([^&#]*)|&|#|$)`);
            const results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
    </script>
</body>
</html>
