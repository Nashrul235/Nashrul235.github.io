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

    // Cek apakah ada gambar baru diupload
    if ($_FILES['gambar']['name']) {
        // Hapus gambar lama
        if ($row['gambar']) {
            unlink("uploads/" . $row['gambar']);
        }

        // Upload gambar baru
        $target_dir = "uploads/";
        $file_name = basename($_FILES["gambar"]["name"]);
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $new_file_name = date("Y-m-d H.i.s") . '.' . $file_ext;
        $target_file = $target_dir . $new_file_name;

        // Batas ukuran file maksimal 2MB
        $max_size = 2 * 1024 * 1024;
        if ($_FILES['gambar']['size'] > $max_size) {
            echo "Ukuran file terlalu besar, maksimal 2MB.";
        } else {
            move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file);
            $query = "UPDATE helm SET merk = '$merk', jenis = '$jenis', stok = '$stok', harga = '$harga', gambar = '$new_file_name' WHERE id_helm = $id";
        }
    } else {
        // Update tanpa mengubah gambar
        $query = "UPDATE helm SET merk = '$merk', jenis = '$jenis', stok = '$stok', harga = '$harga' WHERE id_helm = $id";
    }

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
        <form method="POST" enctype="multipart/form-data" class="w-50 mx-auto">
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
            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar Baru (Maksimal 2MB)</label>
                <input type="file" name="gambar" class="form-control" id="gambar">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="CRUD.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
