<?php

require "function.php";
// require "koneksi.php";
$respon = '';
if (isset($_POST['kirim'])) {
    if (kirim($_POST)) {
        $respon = 1;
    } else {
        $respon = 0;
    }
}
// $respon = "Thanks" . $data['nama'] . "for contacting us. We'll get back to you soon!";
// $respon = "Something went wrong. Please try again";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tag -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Contact Us | INIPerpus</title>
    <link rel="icon" type="image/png" href="logo.png">

    <!-- CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />

    <script src="https://kit.fontawesome.com/5994dec7bb.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow" style="background: #0D7377;">
        <a class="navbar-brand" href="index.php"><img src="logo.png" alt="" width="40"> INIPerpus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-right justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="books.php">Books</a>
                <a class="nav-item nav-link active" href="contact.php">Contact Us</a>
                <a class="nav-item nav-link" href="login/login.php">Login</a>
            </div>
        </div>
    </nav>

    <!-- konten -->
    <div class="container konten">
        <div class="card-deck mt-5">

            <!-- send email -->
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-paper-plane"></i>
                        Send Email
                    </h4>
                </div>
                <div class="card-body">

                    <?php if ($respon === 1) : ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong>
                            Thanks <?= $_POST['nama']; ?> for contacting us. We'll get back to you soon!
                        </div>
                    <?php elseif ($respon === 0) : ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong> Something went wrong. Please try again.
                        </div>
                    <?php else : ?>
                        <div></div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="nama" placeholder="Enter your name" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-at"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="subject" placeholder="Enter subject" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-keyboard"></i>
                                </span>
                            </div>
                            <textarea type="text" class="form-control" name="pesan" placeholder="Write your message" required></textarea>
                        </div>
                        <div>
                            <button type="submit" class=" btn btn-block btn-dark">Send Email</button>
                        </div>

                    </form>
                </div>
            </div>

            <!-- information -->
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-info-circle"></i>
                        Information
                    </h4>
                </div>
                <div class="card-body">
                    <h4>
                        <img src="../logo.png" alt="" width="60"> INIPerpus
                    </h4>
                    <div class="mt-5">
                        <table class="table-sm table-borderless">
                            <tr>
                                <td class="text-center"><i class="fas fa-home"></i></td>
                                <td>Informatics Education, UNS</td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="fas fa-map-marker-alt"></i></td>
                                <td>Jalan A. Yani Makam Haji, Makamhaji, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57161</td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="fas fa-phone-alt"></i></td>
                                <td>+62 852 5459 0505</td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="fas fa-envelope"></i></td>
                                <td>iniperpus@gmail.com</td>
                            </tr>

                        </table>
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