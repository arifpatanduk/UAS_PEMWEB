<?php

require "../koneksi.php";

function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $konfirmasi = mysqli_real_escape_string($conn, $data['konfirmasi']);

    $notelp = $data['nomortelp'];
    $alamat = htmlspecialchars($data['alamat']);

    $cek_username = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' ");
    if (mysqli_fetch_assoc($cek_username)) {
        echo "
        <script>
        alert('username sudah terdaftar');
        </script>";
        return false;
    }

    if ($password !== $konfirmasi) {
        echo "
        <script>
        alert('konfirmasi Password salah');
        document.location.href='tambah_petugas.php';
        </script>";

        return false;
    }

    $password = md5($password);

    mysqli_query($conn, "INSERT INTO petugas 
    VALUES('', '$nama', '$username', '$password', 'petugas', $notelp, '$alamat') ");

    return mysqli_affected_rows($conn);
}
