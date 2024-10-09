<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $merk = $_POST['merk'];
    $jenis = $_POST['jenis'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO helm (merk, jenis, stok, harga) VALUES ('$merk', '$jenis', '$stok', '$harga')";
    mysqli_query($koneksi, $query);

    header('Location: CRUD.php');
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
        <form method="POST" class="w-50 mx-auto">
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
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="CRUD.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
