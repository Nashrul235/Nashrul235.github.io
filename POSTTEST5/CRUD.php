<?php
include 'koneksi.php'; // Koneksi ke database

$query = "SELECT * FROM helm";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Helm Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Daftar Helm Motor</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Helm</a>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID Helm</th>
                    <th>Merk</th>
                    <th>Jenis</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?= $row['id_helm']; ?></td>
                        <td><?= $row['merk']; ?></td>
                        <td><?= $row['jenis']; ?></td>
                        <td><?= $row['stok']; ?></td>
                        <td><?= $row['harga']; ?></td>
                        <td>
                            <a href="lihat.php?id=<?= $row['id_helm']; ?>" class="btn btn-info btn-sm">Lihat</a>
                            <a href="update.php?id=<?= $row['id_helm']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $row['id_helm']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
