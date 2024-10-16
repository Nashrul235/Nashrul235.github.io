<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $merk = $_POST['merk'];
    $jenis = $_POST['jenis'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Direktori untuk menyimpan file
    $target_dir = "uploads/";
    
    // Buat folder jika belum ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $file_name = basename($_FILES["gambar"]["name"]);
    $file_size = $_FILES["gambar"]["size"];
    $file_tmp = $_FILES["gambar"]["tmp_name"];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Format penamaan file: yyyy-mm-dd hh.mm.ss.ekstensi
    $new_file_name = date("Y-m-d H.i.s") . '.' . $file_ext;
    $target_file = $target_dir . $new_file_name;
    
    // Batas ukuran file maksimal 2MB
    $max_size = 2 * 1024 * 1024;
    
    if ($file_size > $max_size) {
        echo "Ukuran file terlalu besar, maksimal 2MB.";
    } else {
        if (move_uploaded_file($file_tmp, $target_file)) {
            // Simpan data ke database
            $query = "INSERT INTO helm (merk, jenis, stok, harga, gambar) VALUES ('$merk', '$jenis', '$stok', '$harga', '$new_file_name')";
            if (mysqli_query($koneksi, $query)) {
                header('Location: CRUD.php');
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        } else {
            echo "Terjadi kesalahan saat mengupload gambar.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Helm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Tambah Helm</h2>
        <form method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" name="merk" class="form-control" id="merk" required>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <input type="text" name="jenis" class="form-control" id="jenis" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" id="stok" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" id="harga" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar (Maksimal 2MB)</label>
                <input type="file" name="gambar" class="form-control" id="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="CRUD.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
