<?php
session_start();
require "koneksi.php";

if (!isset($_SESSION["login"])) {
  header("Location: ../login/login.php");
  exit;
}

?>
<!DOCTYPE html>
<html>

<Head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/">
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Perpustakaan</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
  <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/css/demo.css" rel="stylesheet" />
  <link href="assets/css/animate.min.css" rel="stylesheet" />
  <!-- Highcharts -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>

<body>
  <div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">

      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="#" class="simple-text">
            ADMIN PERPUSTAKAAN
          </a>
        </div>
        <ul class="nav">
          <li class="active">
            <a href="index.php">
              <i class="pe-7s-graph"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="anggota/index.php">
              <i class="pe-7s-user"></i>
              <p>Anggota</p>
            </a>
          </li>
          <li>
            <a href="buku/index.php">
              <i class="pe-7s-notebook"></i>
              <p>Buku</p>
            </a>
          </li>
          <li>
            <a href="pinjam/index.php">
              <i class="pe-7s-note2"></i>
              <p>Peminjaman</p>
            </a>
          </li>
          <li>
            <a href="kembali/index.php">
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
            <a class="navbar-brand" href="#">Dashboard</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="logout.php">
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
            <div class="col-md-6">
              <div id="charts"></div>

              <?php
              $sql = "SELECT tanggal_pinjam, COUNT(tanggal_pinjam) as jumlah FROM peminjaman GROUP BY tanggal_pinjam";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $tanggal[] = '"' . $row['tanggal_pinjam'] . '"';
                  $jumlah[] = $row['jumlah'];
                }
              }
              ?>

              <script>
                Highcharts.chart('charts', {

                  title: {
                    text: 'Data Peminjaman'
                  },

                  subtitle: {
                    text: 'Statistik jumlah peminjaman di perpustakaan'
                  },

                  yAxis: {
                    title: {
                      text: 'Jumlah'
                    }
                  },

                  xAxis: {
                    categories: [<?php echo join($tanggal, ',') ?>],
                    title: {
                      text: null
                    }
                  },

                  legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                  },

                  series: [{
                    name: 'Jumlah peminjam',
                    data: [<?php echo join($jumlah, ',') ?>]
                  }],

                  responsive: {
                    rules: [{
                      condition: {
                        maxWidth: 500
                      },
                      chartOptions: {
                        legend: {
                          layout: 'horizontal',
                          align: 'center',
                          verticalAlign: 'bottom'
                        }
                      }
                    }]
                  }

                });
              </script>
            </div>

            <div class="col-md-6">
              <div id="diagram"></div>

              <?php
              $sql = "SELECT kategori, COUNT(kategori) AS jumlah FROM peminjaman
                                INNER JOIN buku ON peminjaman.idbuku = buku.idbuku
                                GROUP BY kategori";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $kat[] = "'" . $row['kategori'] . "'";
                  $jml[] = $row['jumlah'];
                }
              }
              ?>
              <script>
                Highcharts.chart('diagram', {
                  chart: {
                    type: 'column'
                  },
                  title: {
                    text: 'Kategori buku'
                  },
                  subtitle: {
                    text: 'Kategori buku yang dipinjam'
                  },

                  xAxis: {
                    categories: [<?php echo join($kat, ',') ?>],
                    title: {
                      text: null
                    }
                  },

                  yAxis: {
                    min: 0,
                    title: {
                      text: 'Jumlah'
                    }
                  },
                  legend: {
                    enabled: false
                  },
                  tooltip: {
                    pointFormat: 'Jumlah peminjam:  <b>{point.y} buah</b>'
                  },

                  series: [{
                    name: 'Jumlah pengembalian',
                    data: [<?php echo join($jml, ',') ?>]
                  }],

                });
              </script>

            </div>
          </div>
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
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
  $(document).ready(function() {

    demo.initChartist();

    $.notify({
      icon: 'pe-7s-gift',
      message: "Selamat Datang di <b>Perpustakaan</b>"

    }, {
      type: 'info',
      timer: 4000
    });

  });
</script>

</html>