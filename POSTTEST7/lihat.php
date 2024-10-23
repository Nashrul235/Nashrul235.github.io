<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM helm WHERE id_helm = $id";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Helm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Detail Helm</h2>
        <div class="card w-50 mx-auto">
            <div class="card-body">
                <h5 class="card-title"><?= $row['merk']; ?></h5>
                <p class="card-text"><strong>Jenis:</strong> <?= $row['jenis']; ?></p>
                <p class="card-text"><strong>Stok:</strong> <?= $row['stok']; ?></p>
                <p class="card-text"><strong>Harga:</strong> <?= $row['harga']; ?></p>
                <p class="card-text"><strong>Gambar:</strong></p>
                <?php if ($row['gambar']) : ?>
                    <img src="uploads/<?= $row['gambar']; ?>" alt="Gambar Helm" style="width: 200px;">
                <?php else : ?>
                    Tidak ada gambar
                <?php endif; ?>
                <a href="CRUD.php" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>
