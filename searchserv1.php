<?php
include 'connect.php';
session_start();
$sql = "SELECT username1 FROM loc WHERE status = '' ORDER BY RAND() LIMIT 2";
$result = $con->query($sql);
if ($result->num_rows === 2) {
    $row1 = $result->fetch_assoc();
    $row2 = $result->fetch_assoc();
    $updateSql1="INSERT INTO messages (sender_id,receiver_id) VALUES ('" . $row1["username1"] . "', '" . $row2["username2"] . "')";
    if ($con->query($updateSql1) === TRUE){
        header("Content-Type: application/json");
        echo json_encode(["success" => true]);
        
    } else {
        header("Content-Type: application/json");
        echo json_encode(["success" => false, "error" => "Error updating user status"]);
    }
} else {
    header("Content-Type: application/json");
    echo json_encode(["success" => false, "error" => "Not enough active users to match"]);
}
$con->close();
?>
