<?php
include 'connection.php';

$email = $_POST["username"];
$pass = $_POST["password"];

try{
    $sql = "SELECT * FROM Login_info WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Fetch user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($pass, $user['Password'])) {
        // Password is correct, user is authenticated
        echo "Login successful. Welcome, " . $user['Email'];

        // Perform further actions like setting session variables
    } else {
        // Invalid credentials
        echo "Invalid password.";
    }}
    catch(PDOException $e){
        echo "Not Registered Sign in";
    }
exit;
?>