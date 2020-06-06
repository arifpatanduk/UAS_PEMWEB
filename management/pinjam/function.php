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


    $id_anggota = $data['id_anggota'];

    $judul = $data['judul'];
    $get_idbuku = query("SELECT idbuku FROM buku WHERE judulbuku='$judul' ");
    $idbuku = $get_idbuku['idbuku'];

    $tglpinjam = $data['tglpinjam'];
    $jatuhtempo = $data['jatuhtempo'];

    $query = "INSERT INTO peminjaman VALUES 
    ('', now(), ADDDATE(now(), INTERVAL 7 day), '$idbuku', $id_anggota, 1)";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
