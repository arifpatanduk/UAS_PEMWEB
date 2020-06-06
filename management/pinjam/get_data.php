<?php

require "../koneksi.php";
require "function.php";

if (isset($_POST['id_anggota'])) {
    $id_anggota = $_POST['id_anggota'];

    $nama = mysqli_query($conn, "SELECT nama_anggota FROM anggota WHERE id_anggota=$id_anggota");

    while ($row = mysqli_fetch_assoc($nama)) {
?>
        <option value="<?= $row['nama_anggota']; ?>"><?= $row['nama_anggota']; ?></option>
    <?php
    }
}

if (isset($_POST['kategori'])) {
    $kategori = $_POST['kategori'];
    echo "<option value='selected'>-- Pilih Judul Buku --</option>";

    $judul = mysqli_query($conn, "SELECT judulbuku FROM buku WHERE kategori='$kategori' ");

    while ($row = mysqli_fetch_assoc($judul)) {
    ?>
        <option value="<?= $row['judulbuku']; ?>"><?= $row['judulbuku']; ?></option>
<?php
    }
}
?>