<?php 
session_start();
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "users";
        $conn = mysqli_connect($hostname, $username, $password, $database);
        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        $id=$_SESSION['id'];
        $sql="SELECT status,username1 FROM loc WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          $row = mysqli_fetch_assoc($result);
          $userStatus = $row['status'];
          $username=$row['username1'];
          if (!empty($userStatus)) {
            echo 'User ID: ' . $row['status'] .'<br>';
            echo 'Matched with: ' . $row['username1'];
            echo '<button id="chatButton">Start Chatting</button>';
          }
      } else {
          echo 'Error: Unable to fetch user status.';
      }
      mysqli_close($conn);
      ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
    const chatButton = document.getElementById("chatButton");
    chatButton.addEventListener('click', function() {
        window.location.href = 'chat.php'; 
    });
});
      </script>