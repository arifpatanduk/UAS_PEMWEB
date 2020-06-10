<?php

require '../koneksi.php';
require 'function.php';

$id = $_GET['id'];

$databuku = mysqli_query($conn, "SELECT * FROM buku INNER JOIN rak ON buku.idbuku = rak.idbuku WHERE buku.idbuku = '$id' ");

if (isset($_POST['submit'])) {
    if (update($_POST) > 0) {
        echo "
        <script>alert('Update Buku berhasil');
        document.location.href='index.php';
        </script>";
    } else {
        echo "
        <script>alert('Gagal')</script>";
        exit;
    }
}
?>

<body>
    <h2>Update Buku</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php while ($row = mysqli_fetch_assoc($databuku)) : ?>
        <input type="hidden" name="id" value="<?= $row['idbuku']; ?>" >
        <label>Kode Buku</label>
        <input type="text" name="kode" value="<?= $row['idbuku']; ?>" required disabled>
        <br>
        <label>Judul Buku</label>
        <input type="text" name="judul" value="<?= $row['judulbuku']; ?>" required>
        <br>
        <label>Kategori</label>
        <input type="text" name="kategori" value="<?= $row['kategori']; ?>" required>
        <br>
        <label>Penulis</label>
        <input type="text" name="penulis" value="<?= $row['penulis']; ?>" required>
        <br>
        <label>Penerbit</label>
        <input type="text" name="penerbit" value="<?= $row['penerbit']; ?>" required>
        <br>
        <label>Stok</label>
        <input type="number" name="stok" value="<?= $row['stok']; ?>" required>
        <br>
        <label>Gambar</label>
        <img src="../image/<?= $row['gambar']; ?>" width="50" height="50">
        <input type="file" name="gambar" id="gambar">
        <br>
        <br>
        <label>Nama Rak</label>
        <input type="text" name="nama_rak" value="<?= $row['nama_rak']; ?>">
        <br>
        <label>Lokasi Rak</label>
        <input type="text" name="lokasi_rak" value="<?= $row['lokasi_rak']; ?>">

        <br>
        <?php endwhile; ?>
        <button type="submit" name="submit">Update Buku</button>
    </form>
</body>

</html>