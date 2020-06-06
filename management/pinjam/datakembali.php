<?php

require "../koneksi.php";
require "function.php";

$datakembali = mysqli_query(
    $conn,
    "SELECT pengembalian.id_pengembalian, pengembalian.tanggal_pinjam, pengembalian.jatuh_tempo, pengembalian.tanggal_pengembalian, pengembalian.denda, buku.judulbuku, anggota.nama_anggota 
FROM pengembalian, buku, anggota 
WHERE pengembalian.id_anggota=anggota.id_anggota 
AND pengembalian.idbuku=buku.idbuku"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengembalian</title>
</head>

<body>
    <h2>Data Pengembalian Buku</h2>

    <table>
        <thead>
            <tr>
                <th>No. Kembali</th>
                <th>Nama Anggote</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($datakembali)) : ?>
                <tr>
                    <td><?= $row['id_pengembalian']; ?></td>
                    <td><?= $row['nama_anggota']; ?></td>
                    <td><?= $row['judulbuku']; ?></td>
                    <td><?= $row['tanggal_pinjam']; ?></td>
                    <td><?= $row['jatuh_tempo']; ?></td>
                    <td><?= $row['tanggal_pengembalian']; ?></td>
                    <td><?= $row['denda']; ?> </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>