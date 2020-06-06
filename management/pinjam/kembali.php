<?php

require "../koneksi.php";
require "function.php";

$id_peminjaman = $_GET['id'];

if (kembali($id_peminjaman) > 0) {
    // hapus data dari table peminjaman
    mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjaman=$id_peminjaman");
    echo "
    <script>
    alert('Pengembalian berhasil');
    document.location.href='datakembali.php';
    </script>";
} else {
    echo "
    <script>
    alert('Pengembalian Gagal');
    </script>";
}
