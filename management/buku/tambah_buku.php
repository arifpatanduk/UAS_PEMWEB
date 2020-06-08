<?php

require '../koneksi.php';
require 'function.php';

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>alert('Tambah Buku berhasil');
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
    <title>Tambah Buku</title>
</head>

<body>
    <h2>Tambah Buku</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    	<label>Kode Buku</label>
    	<input type="text" name="kode" required>
    	<br>
    	<label>Judul Buku</label>
    	<input type="text" name="judul" required>
    	<br>
    	<label>Kategori</label>
    	<input type="text" name="kategori">
    	<br>
    	<label>Penulis</label>
    	<input type="text" name="penulis" required>
    	<br>
    	<label>Penerbit</label>
    	<input type="text" name="penerbit" required>
    	<br>
    	<label>Stok</label>
    	<input type="number" name="stok" required>
        <br>
        <label>Gambar</label>
        <input type="file" name="gambar" id="gambar">
    	<br>
        <label>Nama Rak</label>
        <input type="text" name="nama_rak" required>
        <br>
        <label>Lokasi Rak</label>
        <input type="text" name="lokasi" required>
        <br>
    	<button type="submit" name="submit">Tambah Buku</button>
    </form>
</body>

</html>