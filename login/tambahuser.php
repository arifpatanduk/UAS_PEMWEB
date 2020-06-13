<?php

require "../koneksi.php";
require "function.php";

if (isset($_POST['register'])) {
    if (tambahuser($_POST) > 0) {
        echo "
        <script> alert('Berhasil');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Tambah User</h2>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="nama">Nama Petugas :</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="pass">Password :</label>
                <input type="password" name="pass" id="pass">
            </li>
            <li>
                <label for="konfir">Konfirmasi Password :</label>
                <input type="password" name="konfir" id="konfir">
            </li>
            <li>
                <label for="notelp">Nomor Telepon :</label>
                <input type="number" name="notelp" id="notelp">
            </li>
            <li>
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat">
            </li>
            <li>
                <button type="submit" name="register" id="register">Register</button>
            </li>
        </ul>
    </form>
</body>

</html>