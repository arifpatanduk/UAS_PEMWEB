<?php
session_start();
/*
if( $_SESSION['akses'] == 'guru' or 'cso' or 'he')
{
    $lokasi = $_SESSION['lokasi'];
    $id     = $_SESSION['id'];
    $email  = $_SESSION['email'];
}
else
{
    header('location:../'.$_SESSION['akses'].'/');
}
*/

require "../koneksi.php";

$dataanggota = mysqli_query($conn, "SELECT * FROM anggota");
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
                <li class="active">
                    <a href="index.php">
                        <i class="pe-7s-user"></i>
                        <p>Anggota</p>
                    </a>
                </li>
                <li>
                    <a href="../buku/index.php">
                        <i class="pe-7s-notebook"></i>
                        <p>Buku</p>
                    </a>
                </li>
                <li>
                    <a href="../pinjam/index.php">
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
                    <a class="navbar-brand" href="#">Anggota</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">        
                        <li>
                            <a href="include/logout.php">
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
                                <h4 class="title">Daftar Anggota</h4>
                                <p class="category">Berikut adalah daftar anggota perpustakaan</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Kode Anggota</th>
                                        <th>Nama Anggota</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pekerjaan</th>
                                        <th>Nomor Telepon</th>
                                        <th>Alamat</th>
                                        <th colspan="3">Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($dataanggota)) : ?>
                                            <tr>
                                                <td><?= $row['id_anggota']; ?></td>
                                                <td><?= $row['nama_anggota']; ?></td>
                                                <td><?= $row['jk_anggota']; ?></td>
                                                <td><?= $row['pekerjaan_anggota']; ?></td>
                                                <td><?= $row['no_telp_anggota']; ?></td>
                                                <td><?= $row['alamat_anggota']; ?></td>
                                                <td><?=  "<a href=update_anggota.php?id=".$row['id_anggota'].">Edit</a>";?></td>
                                                <td><?=  "<a href=hapus_anggota.php?id=".$row['id_anggota'].">Hapus</a>";?></td>   
                                                <td><?=  "<a href=kartu_anggota.php?id=".$row['id_anggota'].">Cetak Kartu</a>";?></td>                 
                                            </tr>
                                        <?php endwhile; ?>                                        
                                    </tbody>
                                </table>
                                <p align='center'>
                                    <a href="tambah_anggota.php">Tambah Anggota</a>
                                </p>
                                <p align='center'>
                                    
                                    <a href="cetak_anggota.php">Cetak Data Anggota</a>
                                </p>

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
    <script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
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
