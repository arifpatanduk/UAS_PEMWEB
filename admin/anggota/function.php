<?php
session_start();

if($_SESSION["role"] != 'admin') {
  header("Location: ../homepage/login/");
}

require "../koneksi.php";

function tambah($data)
{
    global $conn;

    $nama   = $data['nama'];
    $jk     = $data['jk'];
    $pekerjaan = $data['pekerjaan'];
    $nomor  = $data['nomortelp'];
    $alamat = $data['alamat'];

    $add    = "INSERT INTO anggota VALUES ('', '$nama', '$jk', '$pekerjaan', '$nomor', '$alamat')";
    mysqli_query($conn, $add);

    return mysqli_affected_rows($conn);

}

function update($data)
{
    global $conn;

    $id     = $data['id'];
    $nama   = $data['nama'];
    $jk     = $data['jk'];
    $pekerjaan = $data['pekerjaan'];
    $nomor  = $data['nomortelp'];
    $alamat = $data['alamat'];

    $update = "UPDATE anggota SET nama_anggota = '$nama', jk_anggota = '$jk', pekerjaan_anggota = '$pekerjaan', no_telp_anggota = '$nomor', alamat_anggota = '$alamat' WHERE id_anggota = '$id' ";

    mysqli_query($conn, $update);

    return mysqli_affected_rows($conn);
}