<?php

require "../koneksi.php";

$databuku = mysqli_query($conn, "SELECT * FROM buku INNER JOIN rak ON buku.idbuku = rak.idbuku");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
</head>

<body>
    <h2>Data Buku</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Kode Buku</th>
                <th>Gambar</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Stok</th>
                <th>Nama Rak</th>
                <th>Lokasi Rak</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($databuku)) : ?>
                <tr>
                    <td><?= $row['idbuku']; ?></td>
                    <td><img src="../image/<?= $row['gambar']; ?>" width="50" height="50"></td>
                    <td><?= $row['judulbuku']; ?></td>
                    <td><?= $row['kategori']; ?></td>
                    <td><?= $row['penulis']; ?></td>
                    <td><?= $row['penerbit']; ?></td>
                    <td><?= $row['stok']; ?></td>
                    <td><?= $row['nama_rak']; ?></td>
                    <td><?= $row['lokasi_rak']; ?></td>
                    <td><?=  "<a href=update_buku.php?id=".$row['idbuku'].">Edit</a>";?></td>
                    <td><?=  "<a href=hapus_buku.php?id=".$row['idbuku'].">Hapus</a>";?></td>                  
                </tr>
            <?php endwhile; ?>
            <tr>
                <td colspan="11" align="center"><a href="tambah_buku.php">Tambah Buku</a></td>
            </tr>
            <tr>
                <td colspan="11" align="center"><a href="cetak_buku.php">Cetak Data Buku</a></td>
            </tr>
        </tbody>
    </table>
</body>

</html>