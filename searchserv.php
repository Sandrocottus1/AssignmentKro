<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'users';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user1Id = $_SESSION['id'];
$distanceKms = 10;
$query = "SELECT u2.id AS user2_id, u2.latitude AS user2_latitude, u2.longitude AS user2_longitude,u2.username1 AS user2_user,u1.username1 AS user1_user,u1.id AS user1_id
          FROM loc u1
          JOIN loc u2 ON u1.id != u2.id
          WHERE u1.id = $user1Id
            AND u1.option_checked != u2.option_checked
            AND u2.status = ''
            AND (
                6371 * ACOS(
                    COS(RADIANS(u1.latitude)) * COS(RADIANS(u2.latitude)) *
                    COS(RADIANS(u2.longitude) - RADIANS(u1.longitude)) +
                    SIN(RADIANS(u1.latitude)) * SIN(RADIANS(u2.latitude))
                )
            ) <= $distanceKms
          LIMIT 1";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user2Id = $row['user2_id'];
    $user1username=$row['user1_user'];
    $user2username=$row['user2_user'];
    $updateQuery="UPDATE loc SET status = $user2Id WHERE id IN ($user1Id)";
    $updateQuery1="UPDATE loc SET status = $user1Id WHERE id IN ($user2Id)";
    $conn->query($updateQuery);
    $conn->query($updateQuery1);
    echo json_encode(['matched' => true, 'user1' => ['user_name' => $user1username,'user_id'=>$user1Id], 'user2' => ['user_name'=>$user2username,'user_id'=>$user2Id]]);
} else {
    echo json_encode(['matched' => false]);
    $updateQuery2="UPDATE loc SET status = '' WHERE id IN ($user1Id)";
    $updateQuery3="UPDATE loc SET status = '' WHERE id IN ($user2Id)";
    $conn->query($updateQuer2);
    $conn->query($updateQuery3);
}
$conn->close();
?>
