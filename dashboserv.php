<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['id'])) {
    echo json_encode(['success' =>false]);
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id=$_SESSION['id'];
$selectedOption=json_decode(file_get_contents("php://input"));
$selectedOptio=intval($selectedOption[0]);
$sql="UPDATE loc SET option_checked=$selectedOptio WHERE id=$id";
    if (mysqli_query($con, $sql)) {
        $response = ["success" => true];
        $optionURL=[
            "1"=>"upload.php",
            "2"=>"#"
        ];
        if(array_key_exists($selectedOptio,$optionURL)){
            $response["redirect"]=$optionURL[$selectedOptio];
        }
} else {
        $response = ["success" => false]; 
}
mysqli_close($con);
header('Content-type: application/json');
echo json_encode($response);
}
?>