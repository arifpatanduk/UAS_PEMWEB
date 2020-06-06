<?php

require "../koneksi.php";

$dataanggota = mysqli_query($conn, "SELECT * FROM anggota");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota</title>
</head>

<body>
    <h2>Data Anggota</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Kode Anggota</th>
                <th>Nama Anggota</th>
                <th>Jenis Kelamin</th>
                <th>Pekerjaan</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($dataanggota)) : ?>
                <tr>
                    <td><?= $row['id_anggota']; ?></td>
                    <td><?= $row['nama_anggota']; ?></td>
                    <td><?= $row['jk_anggota']; ?></td>
                    <td><?= $row['pekerjaan_anggota']; ?></td>
                    <td><?= $row['no_telp_anggota']; ?></td>
                    <td><?= $row['alamat_anggota']; ?></td>
                    <td><?=  "<a href=update_anggota.php?id=".$row['id_anggota'].">Edit</a>";?></td>
                    <td><?=  "<a href=hapus_anggota.php?id=".$row['id_anggota'].">Hapus</a>";?></td>   
                    <td><?=  "<a href=kartu_anggota.php?id=".$row['id_anggota'].">Cetak Kartu</a>";?></td>                 
                </tr>
            <?php endwhile; ?>
            <tr>
                <td colspan="9" align="center"><a href="tambah_anggota.php">Tambah Anggota</a></td>
            </tr>
            <tr>
                <td colspan="9" align="center"><a href="cetak_anggota.php">Cetak Data Anggota</a></td>
            </tr>
        </tbody>
    </table>
</body>

</html>