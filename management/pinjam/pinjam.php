<?php

require "../koneksi.php";
require "function.php";

$nama = mysqli_query($conn, "SELECT * FROM anggota");
$kategori = mysqli_query($conn, "SELECT kategori FROM buku GROUP BY kategori");

if (isset($_POST['submit'])) {
    if (pinjam($_POST) > 0) {
        echo "
        <script>alert('Peminjaman berhasil');
        document.location.href='datapinjam.php';
        </script>";
    } else {
        echo "
        <script>Gagal</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- AJAX CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Document</title>
</head>

<body>
    <h2>Transaksi Peminjaman</h2>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="nama">Nama Anggota :</label>
                <select name="nama" id="nama">
                    <option value="selected">-- Pilih Nama Anggota --</option>

                    <?php while ($row = mysqli_fetch_assoc($nama)) : ?>
                        <option value="<?= $row['id_anggota']; ?>"><?= $row['nama_anggota']; ?></option>
                    <?php endwhile; ?>

                </select>
            </li>
            <li>
                <label for="kategori">Kategori Buku :</label>
                <select name="kategori" id="kategori">
                    <option value="show-all" selected="selected">-- Pilih Kategori Buku --</option>

                    <?php while ($row = mysqli_fetch_assoc($kategori)) : ?>
                        <option value="<?= $row['kategori']; ?>"><?= $row['kategori']; ?></option>
                    <?php endwhile; ?>

                </select>
            </li>
            <li>
                <label for="judul">Judul Buku :</label>
                <select name="judul" id="judul">
                    <option value="selected">-- Pilih Judul Buku --</option>

                </select>
            </li>
            <li>
                <label for="tglpinjam">Tanggal Pinjam :</label>
                <input type="date" name="tglpinjam" id="tglpinjam" value="<?= date("Y-m-d"); ?>" readonly>
            </li>
            <li>
                <label for="jatuhtempo">Jatuh Tempo :</label>
                <input type="date" name="jatuhtempo" id="jatuhtempo" value="<?= date('Y-m-d', time() + (60 * 60 * 24 * 7)); ?>" readonly>
            </li>
            <li>
                <button type="button" name="submit">Submit</button>
            </li>
        </ul>
    </form>

    <script>
        $("#kategori").change(function() {
            var kategori = $("#kategori").val();

            $.ajax({
                type: "POST",
                dataType: "html",
                url: "get_buku.php",
                data: "kategori=" + kategori,
                success: function(data) {
                    $("#judul").html(data);
                }
            });
        });
    </script>

</body>



</html>