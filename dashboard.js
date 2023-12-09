document.addEventListener('DOMContentLoaded', function () {
    const socket = io('http://localhost:8080');
    const matchPopup = document.getElementById('matchPopup');
    const chatRedirectButton = document.getElementById('chatRedirect');
    socket.on('otherUserLoggedIn', () => {
        matchPopup.style.display = 'block';
    });
    chatRedirectButton.addEventListener('click', () => {
        window.location.href = 'chat.php';
    });
});
