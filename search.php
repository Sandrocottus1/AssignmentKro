<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Match Users</title>
</head>
<body>
    <button id="matchButton">Match Users</button>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const matchButton = document.getElementById("matchButton");
    matchButton.addEventListener("click", function() {
        fetch("searchserv.php")
            .then(response => response.json())
            .then(data => {
                if (data.matched) {
                    const user1 = data.user1;
                    const user2 = data.user2;
                    const user1Confirmation = confirm(`You have a match with User ID ${user2.user_name}. Do you want to proceed?`);
                    const user2Confirmation = confirm(`You have a match with User ID ${user1.user_name}. Do you want to proceed?`);
                    if (user1Confirmation && user2Confirmation) {
                        Swal.fire("Match confirmed! You are now connected.");
                        document.ready(window.setTimeout(location.href = `chat.php?user1=${user2.user_id}&user2=${user1.user_id}`,5000));
                    } else {
                        Swal.fire("Match declined.");
                    }
                } else {
                    Swal.fire("No matches found. Retry later.");
                }
            })
            .catch(error => {
                console.error("Error finding a match:", error);
            });
            
    });
});

    </script>
</body>
</html>
