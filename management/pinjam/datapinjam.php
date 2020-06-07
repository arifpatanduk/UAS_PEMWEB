<?php

require "../koneksi.php";
require "function.php";

$datapinjam = mysqli_query(
    $conn,
    "SELECT peminjaman.id_peminjaman, peminjaman.tanggal_pinjam, peminjaman.jatuh_tempo, buku.judulbuku, anggota.nama_anggota 
FROM peminjaman, buku, anggota 
WHERE peminjaman.id_anggota=anggota.id_anggota 
AND peminjaman.idbuku=buku.idbuku"
);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
</head>

<body>
    <h2>Data Peminjaman Buku</h2>

    <table>
        <thead>
            <tr>
                <th>No. Pinjam</th>
                <th>Nama Anggote</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($datapinjam)) : ?>
                <tr>
                    <td><?= $row['id_peminjaman']; ?></td>
                    <td><?= $row['nama_anggota']; ?></td>
                    <td><?= $row['judulbuku']; ?></td>
                    <td><?= $row['tanggal_pinjam']; ?></td>
                    <td><?= $row['jatuh_tempo']; ?></td>
                    <td>
                        <a href="../kembali/kembali.php?id=<?= $row['id_peminjaman']; ?>" onclick="return confirm('Peminjaman dikembalikan?');">
                            <button> Kembali </button>
                        </a> |
                        <a href="perpanjang.php?id=<?= $row['id_peminjaman']; ?> ">
                            <button> Perpanjang </button>
                        </a>

                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>