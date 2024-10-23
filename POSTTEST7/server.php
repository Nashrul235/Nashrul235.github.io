<?php
// login.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Simple validation and response
    if (!empty($username) && !empty($password) && !empty($phone)) {
        echo "<h1>Login Successful</h1>";
        echo "Username: " . htmlspecialchars($username) . "<br>";
        echo "Phone: " . htmlspecialchars($phone) . "<br>";
    } else {
        echo "<h1>Login Failed</h1>";
        echo "Please provide all required fields.";
    }
}
?>
