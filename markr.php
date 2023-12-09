<?php
session_start();
require_once 'pdo.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];
        $latitude=$_POST['lat'];
        $longitude=$_POST['lng'];
        try{
            $sql="SELECT * FROM loc WHERE id=:id";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            if($stmt->rowCount()>0){
                $update_sql = "UPDATE loc SET latitude = :latitude, longitude = :longitude WHERE id = :id";
                $update_stmt = $pdo->prepare($update_sql);
            }else{
                $insert_sql = "INSERT INTO loc (id, latitude, longitude) VALUES (:id,:latitude, :longitude)";
                $update_stmt = $pdo->prepare($insert_sql);
            }
            $update_stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $update_stmt->bindParam(':latitude', $latitude, PDO::PARAM_STR);
            $update_stmt->bindParam(':longitude', $longitude, PDO::PARAM_STR);         
            $update_stmt->execute();
            echo("Location saved sucessfully!!");
            
        } catch(PDOException $e){
            echo "Error: " .$e->getMessage();
        }
    }else{
        echo "User not authenticated.";
    }
}else{
    echo "Invalid Request.";
}
?>





