<?php

require "../koneksi.php";
require "function.php";

$id = mysqli_query($conn, "SELECT id_anggota FROM anggota");
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
        echo mysqli_error($conn);
        // exit;
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

    <title>Transaksi Peminjaman</title>
</head>

<body>
    <h2>Transaksi Peminjaman Buku</h2>
    <form action="" method="POST">
        <ul>
            <!-- buku -->
            <li>
                <label for="idbuku">Kode Buku :</label>
                <input type="text" name="idbuku" id="idbuku" required>
            </li>

            <li>
                <label for="kategori">Kategori Buku :</label>
                <input type="text" name="kategori" id="kategori" readonly required>
            </li>
            <li>
                <label for="judulbuku">Judul Buku :</label>
                <input type="text" name="judulbuku" id="judulbuku" readonly required>
            </li>

            <!-- anggota/peminjam -->
            <li>
                <label for="id_anggota"> ID Anggota :</label>
                <input type="text" name="id_anggota" id="id_anggota" required>
            </li>

            <li>
                <label for="nama">Nama Anggota :</label>
                <input type="text" name="nama" id="nama" readonly required>
            </li>

            <!-- tanggal -->
            <li>
                <label for="tglpinjam">Tanggal Pinjam :</label>
                <input type="date" name="tglpinjam" id="tglpinjam" value="<?= date("Y-m-d"); ?>" readonly>
            </li>
            <li>
                <label for="jatuhtempo">Jatuh Tempo :</label>
                <input type="date" name="jatuhtempo" id="jatuhtempo" value="<?= date('Y-m-d', time() + (60 * 60 * 24 * 7)); ?>" readonly>
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>

    <script>
        // AUTO ISI BUKU
        $(function() {
            $("#idbuku").change(function() {
                var idbuku = $("#idbuku").val();

                $.ajax({
                    url: 'get_data.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'idbuku': idbuku
                    },
                    success: function(buku) {
                        $("#kategori").val(buku['kategori']);
                        $("#judulbuku").val(buku['judulbuku']);
                    }
                })
            })
        })

        // AUTO ISI ANGGOTA
        $(function() {
            $("#id_anggota").change(function() {
                var id_anggota = $("#id_anggota").val();

                $.ajax({
                    url: 'get_data.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'id_anggota': id_anggota
                    },
                    success: function(anggota) {
                        $("#nama").val(anggota['nama_anggota']);
                    }
                })
            })
        })

        // $("#id_anggota").change(function() {
        //     var id_anggota = $("#id_anggota").val();

        //     $.ajax({
        //         type: "POST",
        //         dataType: "html",
        //         url: "get_data.php",
        //         data: "id_anggota=" + id_anggota,
        //         success: function(data) {
        //             $("#nama").html(data);
        //         }
        //     });
        // });
    </script>

</body>



</html>