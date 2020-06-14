<?php
session_start();
require "koneksi.php";

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $password = md5($password);

    $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' and password = '$password' ");

    if (mysqli_num_rows($result) == 1) {

        while ($row = mysqli_fetch_assoc($result)) {

            $_SESSION["id"] = $row["id_petugas"];

            $_SESSION["role"] = $row["jabatan_petugas"];
            if ($_SESSION["role"] == 'admin') {
                header("Location: ../admin/index.php");
            } else {
                header("Location: ../petugas/index.php");
            }
            exit;
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Login | INIPerpus</title>
    <link rel="icon" type="image/png" href="../logo.png">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" />
</head>

<body class="text-center">
    <form class="form-signin" method="POST" action="">
        <img class="mb-4" src="../logo.png" alt="" width="72" height="72" />
        <h1 class="h3 mb-3 font-weight">INIPerpus</h1>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger">
                <strong>Password / Username salah</strong>
            </div>
        <?php endif; ?>

        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus />
        <label for="pass" class="sr-only">Password</label>
        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required />

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">
            Login
        </button>
        <p class="mt-5 mb-3 text-muted">&copy; Copyright INIPerpus 2020</p>
    </form>
</body>

</html>