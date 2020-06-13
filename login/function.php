<?php

require "../admin/koneksi.php";

function tambahuser($data)
{
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['pass']);
    $konfirmasi = mysqli_real_escape_string($conn, $data['konfir']);

    $notelp = $data['notelp'];
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
        alert('konfirmasi salah');
        </script>";

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO petugas 
    VALUES('', '$nama', '$username', '$password', 'petugas', $notelp, '$alamat') ");

    return mysqli_affected_rows($conn);
}
