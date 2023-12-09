<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: login page.php");
    exit();
}
$instructions = $_POST['instructions']; 
$id = $_SESSION['id'];
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $uploaded_file = $_FILES['file']['tmp_name'];
    $file_path = 'docs/' . $_FILES['file']['name']; 
    move_uploaded_file($uploaded_file, $file_path);
    $mysqli = new mysqli("localhost", "root", "", "users");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    if (empty($instructions)) {
        $query = "INSERT INTO loc (id, instructions, file_path) VALUES (?, ?, ?)";
    } else {
        $query = "UPDATE loc SET instructions = ?, file_path = ? WHERE id = ?";
    }

    $stmt = $mysqli->prepare($query);
    
    if (empty($instructions)) {
        $stmt->bind_param("iss", $id, $instructions, $file_path);
    } else {
        $stmt->bind_param("ssi", $instructions, $file_path,$id);
    }
    
    
    if ($stmt->execute()) {
        header("Location:search.php");
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $mysqli->close();
} else {
    echo "Error uploading the document.";
}
?>
