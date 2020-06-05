<?php

require "../koneksi.php";

function tambah($data)
{
    global $conn;

    $kode   = $data['kode'];
    $nama   = $data['nama'];
    $jk     = $data['jk'];
    $pekerjaan = $data['pekerjaan'];
    $nomor  = $data['nomortelp'];
    $alamat = $data['alamat'];

    $scan = mysqli_query($conn, "SELECT * FROM anggota WHERE kode_anggota = '$kode' ");
        if($scan -> num_rows == 0){
            $add    = "INSERT INTO anggota VALUES ('', '$kode', '$nama', '$jk', '$pekerjaan', '$nomor', '$alamat')";
            mysqli_query($conn, $add);

            return mysqli_affected_rows($conn);
        }
        else{
            echo "<script>alert('Kode anggota sudah ada')</script>";
            echo "<script>window.location=('tambah_anggota.php');</script>";
        }

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