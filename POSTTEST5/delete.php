<?php
include 'koneksi.php';
$db="db_helm";
$id = $_GET['id'];
$query = "DELETE FROM helm WHERE id_helm = $id";
mysqli_query($koneksi, $query);

header('Location: CRUD.php');
?>
