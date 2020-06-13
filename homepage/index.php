<?php

require "koneksi.php";

$result = mysqli_query($conn, "SELECT * FROM buku ORDER BY idbuku DESC LIMIT 3");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- meta tag -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Home | PerpusKita</title>

  <!-- CSS -->
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />

  <link rel="icon" type="image/png" href="../logo.png">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow" style="background: #0D7377;">
    <a class="navbar-brand" href="index.php"><img src="../logo.png" alt="" width="40"> PerpusKita</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-right justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="books.php">Books</a>
        <a class="nav-item nav-link" href="#">Contact Us</a>
        <a class="nav-item nav-link" href="login/login.html">Login</a>
      </div>
    </div>
  </nav>

  <!-- carousel -->
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/1.jpg" class="d-block w-100" alt="1.jpg" />
        <div class="carousel-caption d-none d-md-block">
          <h5>WELCOME !</h5>
          <p>Let's explore the window of world</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/2.jpg" class="d-block w-100" alt="2.jpg" />
        <div class="carousel-caption d-none d-md-block">
          <h5>DISCOVER NEW THINGS !</h5>
          <p>Just enjoy to read a book</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/3.jpg" class="d-block w-100" alt="3.jpg" />
        <div class="carousel-caption d-none d-md-block">
          <h5>LIBRARY IS OUR HOME</h5>
          <p>
            Read here, work here, learn here
          </p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- konten -->
  <div class="container konten">
    <h3 class="header"><span>NEW BOOKS</span></h3>
    <div class="accordion" id="accordionExample">
      <div class="card">




        <!-- card -->
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <div class="card-deck">
              <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="card">
                  <!-- ribbon -->
                  <?php if ($row['stok'] > 0) : ?>
                    <div class="ribbon">
                      <div class="label">AVAILABLE</div>
                    </div>
                  <?php endif; ?>

                  <img src="../admin/image/<?= $row['gambar']; ?>" class="card-img-top rounded-lg" alt="cover.jpg" height="450" />
                  <div class="card-body">
                    <h5 class="card-title"><?= $row['judulbuku']; ?></h5>
                    <p class="card-text"><?= $row['penulis']; ?></p>
                    <p class="card-text">
                      <small class="text-muted"><?= $row['kategori']; ?></small>
                    </p>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>



      </div>

    </div>
  </div>

  <!-- footer -->
  <div class="foot">
    <div class="row">
      <div class="col-md-5 offset-md-1">
        <h6 class="text-foot">LOREM IPSUM</h6>
        <div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Inventore, explicabo consectetur nam ea ipsum est! Itaque
            necessitatibus cupiditate nesciunt excepturi ex eius beatae. Eum,
            ipsam. Maxime blanditiis animi minus quisquam!
          </p>
        </div>
      </div>
      <div class="col-md-4 offset-md-1">
        <p>&copy copyright</p>
        <p>Lorem ipsum dolor sit amet</p>
        <a href="https://www.facebook.com" target="_blank"><img src="img/facebook-logo.png" alt="facebook-logo.png" class="logo-foot" /></a>
        <a href="https://www.instagram.com" target="_blank"><img src="img/instagram-logo.png" alt="instagram-logo.png" class="logo-foot" /></a>
        <a href="https://www.youtube.com" target="_blank"><img src="img/youtube-logo.png" alt="youtube-logo.png" class="logo-foot" /></a>
      </div>
    </div>
  </div>

  <!-- script -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>