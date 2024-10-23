<?php
session_start();
session_destroy(); // Mengakhiri sesi
header("Location: login.php"); // Kembali ke halaman login
exit();
?>