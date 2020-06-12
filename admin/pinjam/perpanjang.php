<?php

require "../koneksi.php";
require "function.php";

$id_peminjaman = $_GET['id'];

if (perpanjang($id_peminjaman) > 0) {
    echo "
    <script>
    alert('Peminjaman berhasil diperpanjang');
    document.location.href='index.php';
    </script>";
} else {
    echo "
    <script>
    alert('Peminjaman gagal diperpanjang');
    </script>";
}
