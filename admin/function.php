<?php
session_start();

if($_SESSION["role"] != 'admin') {
  header("Location: ../homepage/login/");
}

require "koneksi.php";
$id         = $_SESSION["id"];

function update($data)
{
    global $conn;
    global $id;

    $nama       = $data['nama'];
    $username   = $data['username'];
    $nomortelp  = $data['nomortelp'];
    $alamat     = $data['alamat'];

    $update = "UPDATE petugas SET nama_petugas = '$nama', username = '$username', no_telp_petugas = '$nomortelp', alamat_petugas = '$alamat' WHERE id_petugas = '$id' ";

    mysqli_query($conn, $update);

    return mysqli_affected_rows($conn);
}

function update_pass($data)
{
    global $conn;
    global $id;

    $passlama   = md5(mysqli_real_escape_string($conn, $data['password_lama']));
    $passbaru   = md5(mysqli_real_escape_string($conn, $data['password_baru']));
    $konfirmasi = md5(mysqli_real_escape_string($conn, $data['konfirmasi']));

    if ($passbaru !== $konfirmasi) {
        echo "
        <script>
        alert('Konfirmasi password salah');
        document.location.href='ganti_password.php';
        </script>";

        return false;
    }

    $cek_password = mysqli_query($conn, "SELECT * FROM petugas WHERE id_petugas = '$id' AND password = '$passlama' ");
    if (mysqli_num_rows($cek_password) == 0) {
        echo "
        <script>
        alert('Password Lama salah');
        document.location.href='ganti_password.php';
        </script>";
        return false;
    }

    $update = "UPDATE petugas SET password = '$passbaru' WHERE id_petugas = '$id' ";

    mysqli_query($conn, $update);

    return mysqli_affected_rows($conn);
}