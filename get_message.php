<?php
include 'connect.php';
session_start();
$id = $_SESSION['id'];
$query = "SELECT * FROM loc WHERE id = ? ORDER BY created_at DESC";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo "<p>Instructions: " . $row['instructions'] . "</p>";
    if (!empty($row['file_path'])) {
        echo "<a href='" . $row['file_path'] . "' target='_blank'>View Document</a>";
    }
    echo "<hr>";
}
$stmt->close();
$mysqli->close();
?>
