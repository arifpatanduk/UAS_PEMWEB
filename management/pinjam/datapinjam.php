<?php

require "../koneksi.php";
require "function.php";

$datapinjam = mysqli_query($conn, "SELECT * FROM peminjaman");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Data Peminjaman</h2>

    <table>
        <thead>
            <tr>
                <th>No. Pinjam</th>
                <th>ID Anggote</th>
                <th>ID Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($datapinjam)) : ?>
                <tr>
                    <td><?= $row['id_peminjaman']; ?></td>
                    <td><?= $row['id_anggota']; ?></td>
                    <td><?= $row['idbuku']; ?></td>
                    <td><?= $row['tanggal_pinjam']; ?></td>
                    <td><?= $row['tanggal_kembali']; ?></td>
                    <td>
                        <button> Kembali </button> |
                        <button> Perpanjang </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>