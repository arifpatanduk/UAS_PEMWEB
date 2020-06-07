<?php

require "../koneksi.php";
require "function.php";

// AUTO ISI BUKU
if (isset($_POST['idbuku'])) {
    $idbuku = $_POST['idbuku'];
    $query = mysqli_query($conn, "SELECT * FROM buku WHERE idbuku='$idbuku'");
    $buku = mysqli_fetch_array($query);

    echo json_encode($buku);
}

if (isset($_POST['id_anggota'])) {
    $id_anggota = $_POST['id_anggota'];
    $query = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota=$id_anggota");
    $anggota = mysqli_fetch_array($query);

    echo json_encode($anggota);
}
