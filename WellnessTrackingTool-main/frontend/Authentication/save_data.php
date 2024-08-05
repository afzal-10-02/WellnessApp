<?php

include 'connection.php';


$name = $_POST['full_name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

try{
    $sql = "INSERT INTO Login_info(Name , Email , Password) VALUES ('$name','$email','$hashedPassword')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();    
}
catch(PDOException $e){
    echo "Something went Wrong!";
}
exit;
?>
