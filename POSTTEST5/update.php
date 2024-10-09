<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM helm WHERE id_helm = $id";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $merk = $_POST['merk'];
    $jenis = $_POST['jenis'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $query = "UPDATE helm SET merk = '$merk', jenis = '$jenis', stok = '$stok', harga = '$harga' WHERE id_helm = $id";
    mysqli_query($koneksi, $query);

    header('Location: CRUD.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Helm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Edit Helm</h2>
        <form method="POST" class="w-50 mx-auto">
            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" name="merk" class="form-control" id="merk" value="<?= $row['merk']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <input type="text" name="jenis" class="form-control" id="jenis" value="<?= $row['jenis']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" id="stok" value="<?= $row['stok']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" id="harga" value="<?= $row['harga']; ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="CRUD.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
