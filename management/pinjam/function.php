<?php

require "../koneksi.php";

function query($query)
{
    global  $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows = $row;
    }
    return $rows;
}

function pinjam($data)
{
    global $conn;

    $nama = $data['nama'];
    $id_anggota = mysqli_query($conn, "SELECT id_anggota FROM anggota WHERE nama_anggota = '$nama' ");

    $judul = $data['judul'];
    $idbuku = mysqli_query($conn, "SELECT idbuku FROM buku WHERE judulbuku = '$judul' ");

    $tglpinjam = $data['tglpinjam'];
    $jatuhtempo = $data['jatuhtempo'];

    $query = "INSERT INTO peminjaman VALUES 
    ('', now(), $jatuhtempo, '$idbuku', $id_anggota, 1)";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
