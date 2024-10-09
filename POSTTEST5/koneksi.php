<?php

$host="localhost";
$user="root";
$password="";
$db="db_helm";

$koneksi = mysqli_connect("localhost", "root", "", "db_helm");
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}
?>
