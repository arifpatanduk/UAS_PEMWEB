<?php

require '../koneksi.php';
require 'function.php';

$id = $_GET['id'];

$dataanggota = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota = '$id' ");

if (isset($_POST['submit'])) {
    if (update($_POST) > 0) {
        echo "
        <script>alert('Update Anggota berhasil');
        document.location.href='index.php';
        </script>";
    } else {
        echo "
        <script>Gagal</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Anggota</title>
</head>

<body>
    <h2>Update Anggota</h2>
    <form action="" method="POST">
        <?php while ($row = mysqli_fetch_assoc($dataanggota)) : ?>
        <input type="hidden" name="id" value="<?= $row['id_anggota']; ?>">
        <label>Kode Anggota</label>
        <input type="text" name="kode" value="<?= $row['kode_anggota']; ?>" required disabled>
        <br>
        <label>Nama Anggota</label>
        <input type="text" name="nama" value="<?= $row['nama_anggota']; ?>" required>
        <br>
        <label>Jenis Kelamin</label>
        <select name="jk">
            <option value="<?= $row['jk_anggota'];?>">
                <?php
                    if($row['jk_anggota'] == 'L'){
                        echo "Laki-laki";
                    }else{
                        echo "Perempuan";
                    }
                ?>
            </option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        <br>
        <label>Pekerjaan</label>
        <input type="text" name="pekerjaan" value="<?= $row['pekerjaan_anggota']; ?>" required>
        <br>
        <label>Nomor Telepon</label>
        <input type="text" name="nomortelp" value="<?= $row['no_telp_anggota']; ?>" required>
        <br>
        <label>Alamat</label>
        <input type="text" name="alamat" value="<?= $row['alamat_anggota']; ?>" required>

        <br>
        <?php endwhile; ?>
        <button type="submit" name="submit">Update Anggota</button>
    </form>
</body>

</html>