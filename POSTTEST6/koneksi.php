<?php
$host = "localhost"; // Server host
$user = "root"; // Database username
$password = ""; // Database password
$database = "db_helm"; // Database name

// Create connection
$koneksi = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
