<?php

require "koneksi.php";

function cari($data)
{
    global $conn;

    $judul = $data['judul'];
    $kategori = $data['kategori'];

    if (!$kategori) {
        $query = "SELECT * FROM buku JOIN rak USING(idbuku) WHERE judulbuku LIKE '%$judul%' AND kategori = '$kategori' ";
    } else {
        $query = "SELECT * FROM buku JOIN rak USING(idbuku) WHERE judulbuku LIKE '%$judul%' ";
    }

    return mysqli_query($conn, $query);
}
