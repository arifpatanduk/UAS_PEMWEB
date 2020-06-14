<?php

require "../koneksi.php";
require "function.php";

$datapinjam = mysqli_query(
    $conn,
    "SELECT peminjaman.id_peminjaman, peminjaman.tanggal_pinjam, peminjaman.jatuh_tempo, buku.judulbuku, anggota.nama_anggota 
    FROM peminjaman, buku, anggota 
    WHERE peminjaman.id_anggota=anggota.id_anggota 
    AND peminjaman.idbuku=buku.idbuku"
    );

$id = mysqli_query($conn, "SELECT id_anggota FROM anggota");

$kategori = mysqli_query($conn, "SELECT kategori FROM buku GROUP BY kategori");

if (isset($_POST['submit'])) {
    if (pinjam($_POST) > 0) {
        echo "
        <script>alert('Peminjaman berhasil');
        document.location.href='index.php';
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
<html>
 <Head>
 <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Perpustakaan</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="../assets/css/Pretty-Registration-Form.css">
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>
     <!-- AJAX CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Data Tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

 </head>
 <body>
 <div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="../assets/img/sidebar-5.jpg">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    ADMIN PERPUSTAKAAN
                </a>
            </div>
           <ul class="nav">
                <li>
                    <a href="../index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="../petugas/index.php">
                      <i class="pe-7s-users"></i>
                      <p>Petugas</p>
                    </a>
                </li>
                <li>
                    <a href="../anggota/index.php">
                        <i class="pe-7s-users"></i>
                        <p>Anggota</p>
                    </a>
                </li>
                <li>
                    <a href="../buku/index.php">
                        <i class="pe-7s-notebook"></i>
                        <p>Buku</p>
                    </a>
                </li>
                <li class="active">
                    <a href="index.php">
                        <i class="pe-7s-note2"></i>
                        <p>Peminjaman</p>
                    </a>
                </li>
                <li>
                    <a href="../kembali/index.php">
                        <i class="pe-7s-note2"></i>
                        <p>Pengembalian</p>
                    </a>
                </li>
                <li>
                    <a href="../profile.php">
                      <i class="pe-7s-user"></i>
                      <p>My Profile</p>
                    </a>
                </li>
                <li>
                    <a href="../ganti_password.php">
                      <i class="pe-7s-key"></i>
                      <p>Ganti Password</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Peminjaman</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                          
                    </ul>
                    <ul class="nav navbar-nav navbar-right">   
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    Menu
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php">Transaksi Peminjaman</a></li>
                                <li class="active"><a href="pinjam.php">Daftar Peminjaman</a></li>
                              </ul>
                        </li>   
                        <li>
                            <a href="../logout.php">
                                <p>Log out</p>
                            </a>
                        </li>

                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Daftar Peminjaman</h4>
                                <p class="category">Berikut adalah daftar peminjaman perpustakaan</p>
                            </div>
                            <div class="content table-responsive">
                                <table id="tabel-data" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No. Pinjam</th>
                                            <th>Nama Anggota</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($row = mysqli_fetch_array($datapinjam))
                                        {
                                            echo "<tr>
                                            <td>".$row['id_peminjaman']."</td>
                                            <td>".$row['nama_anggota']."</td>
                                            <td>".$row['judulbuku']."</td>
                                            <td>".$row['tanggal_pinjam']."</td>
                                            <td>".$row['jatuh_tempo']."</td>
                                            <td>
                                                <a href='../kembali/kembali.php?id=".$row['id_peminjaman']."' onclick='return confirm('Peminjaman dikembalikan?');'>
                                                    Kembali
                                                </a>    |   
                                                <a href='perpanjang.php?id=".$row['id_peminjaman']." '>
                                                    Perpanjang
                                                </a>
                                            </td>
                                        </tr>";
                                        }
                                    ?>
                                    </tbody>

                                    <script>
                                    $(document).ready(function(){
                                        $('#tabel-data').DataTable();
                                    });
                                </script>
                                 
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <footer class="footer" style="margin-top:0px;">
        <div class="container-fluid">
            <p class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script> Dibuat oleh Mahasiswa PTIK
            </p>
        </div>
    </footer>
    </div>
 </div>
</body>

    <!--   Core JS Files   -->
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="../assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="../assets/js/demo.js"></script>

</html>
