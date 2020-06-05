<?php

require '../koneksi.php';
require 'function.php';

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>alert('Tambah Anggota berhasil');
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
    <title>Tambah Anggota</title>
</head>

<body>
    <h2>Tambah Anggota</h2>
    <form action="" method="POST">
    	<label>Kode Anggota</label>
    	<input type="text" name="kode" required>
    	<br>
    	<label>Nama Anggota</label>
    	<input type="text" name="nama" required>
    	<br>
    	<label>Jenis Kelamin</label>
    	<select name="jk">
    		<option value="L">Laki-laki</option>
    		<option value="P">Perempuan</option>
    	</select>
    	<br>
    	<label>Pekerjaan</label>
    	<input type="text" name="pekerjaan" required>
    	<br>
    	<label>Nomor Telepon</label>
    	<input type="text" name="nomortelp" required>
    	<br>
    	<label>Alamat</label>
    	<input type="text" name="alamat" required>

    	<br>
    	<button type="submit" name="submit">Tambah Anggota</button>
    </form>
</body>

</html>