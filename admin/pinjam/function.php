<?php

session_start();

if($_SESSION["role"] != 'admin') {
  header("Location: ../homepage/login/");
}

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

    $id_anggota = htmlspecialchars($data['id_anggota']);
    $idbuku = htmlspecialchars($data['idbuku']);

    // kurangi stok buku
    $stok = "UPDATE buku SET stok=stok-1 WHERE idbuku='$idbuku' ";
    mysqli_query($conn, $stok);

    $query = "INSERT INTO peminjaman VALUES 
    ('', now(), ADDDATE(now(), INTERVAL 7 day), '$idbuku', $id_anggota, 1)";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function kembali($id_peminjaman)
{
    global $conn;

    // ambil data dari table peminjaman
    $data = query("SELECT * FROM peminjaman WHERE id_peminjaman=$id_peminjaman");
    $tgl_pinjam = $data['tanggal_pinjam'];
    $jatuh_tempo = $data['jatuh_tempo'];
    $idbuku = $data['idbuku'];
    $id_anggota = $data['id_anggota'];
    $id_petugas = $data['id_petugas'];

    // denda
    $tempo = date_create($jatuh_tempo);
    $kembali = date_create();
    $selisih = date_diff($tempo, $kembali);
    $denda = 0;

    if ($kembali > $tempo) {
        $denda = $selisih->d * 10000;
    }

    // insert data ke pengembalian
    mysqli_query($conn, "INSERT INTO pengembalian VALUES 
    ('', '$tgl_pinjam', '$jatuh_tempo', now(), $denda, '$idbuku', $id_anggota, $id_petugas) 
    ");

    // update stok buku
    $stok = "UPDATE buku SET stok=stok+1 WHERE idbuku='$idbuku' ";
    mysqli_query($conn, $stok);

    return mysqli_affected_rows($conn);
}

function perpanjang($id_peminjaman)
{
    global $conn;

    $data = query("SELECT * FROM peminjaman WHERE id_peminjaman=$id_peminjaman");
    $jatuh_tempo = $data['jatuh_tempo'];

    $tempo_baru = date('Y-m-d', strtotime('+7 day', strtotime($jatuh_tempo)));

    mysqli_query($conn, "UPDATE peminjaman SET jatuh_tempo='$tempo_baru'
    WHERE id_peminjaman=$id_peminjaman ");
    return mysqli_affected_rows($conn);
}
