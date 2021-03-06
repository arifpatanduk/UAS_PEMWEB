<?php
require '../koneksi.php';
require 'function.php';

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>alert('Tambah Anggota berhasil');
        document.location.href='index.php';
        </script>";
    } else {
        echo "
        <script>Gagal</script>";
        exit;
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
    <title>Tambah Anggota | INIPerpus</title>
    <link rel="icon" type="image/png" href="../../logo.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="../assets/css/Pretty-Registration-Form.css">
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="../assets/css/animate.min.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="azure" data-image="../assets/img/sidebar-5.jpg">

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a class="simple-text" href="index.php"><img src="../logo.png" alt="" width="40"> INIPerpus</a>
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
                    <li class="active">
                        <a href="index.php">
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
                        <a class="navbar-brand" href="#">Anggota</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
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
                <div class="row register-form" style="margin-top:-50px;">
                    <form class="form-horizontal custom-form" action="" method="post">
                        <h1>Tambah Anggota</h1>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="name-input-field">Nama Anggota</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="name-input-field">Jenis Kelamin</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <select name="jk" class="form-control" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="name-input-field">Pekerjaan</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input type="text" class="form-control" name="pekerjaan" placeholder="Masukkan pekerjaan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="name-input-field">Nomor Telepon</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input type="text" class="form-control" name="nomortelp" placeholder="Masukkan Nomor Telepon" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="name-input-field">Alamat</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" required>
                            </div>
                        </div>
                        <button class="btn btn-default submit-button" type="submit" name="submit" id="yes">Tambah Anggota</button>
                    </form>
                </div>
            </div>
            <footer class="footer" style="margin-top:0px;">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy; <script>
                            document.write(new Date().getFullYear())
                        </script> Dibuat oleh Mahasiswa PTIK
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