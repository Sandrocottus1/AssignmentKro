<?php
session_start();
include 'pdo.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username1 = $_POST['username1'];
    $password_11 = $_POST['password_11'];
    try {
        $sql = "SELECT id FROM loc WHERE username1 = :username1 AND password_11 = :password_11";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username1', $username1, PDO::PARAM_STR);
        $stmt->bindParam(':password_11', $password_11, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $_SESSION['id'] = $user['id'];
            header("Location: location.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>