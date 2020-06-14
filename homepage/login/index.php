<?php
session_start();
require "../koneksi.php";

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $password = md5($password);

    $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' and password = '$password' ");

    if (mysqli_num_rows($result) == 1) {

          while ($row = mysqli_fetch_assoc($result)) {

            $_SESSION["id"] = $row["id_petugas"];

            $_SESSION["role"] = $row["jabatan_petugas"];
            if($_SESSION["role"] == 'admin'){
                header("Location: ../../admin/index.php");   
            }else{
                header("Location: ../../petugas/index.php");
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
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
  <style type="text/css">
    img{
      border-radius: 50%;
    }
  </style>
</head>
<body>
	<div class="login-card">
  </br><center><img src="logo.png" width="150" height="150"></center>
    <h1>Login</h1><br/>
  <form method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="Login">
  </form>
</div>
</body>
</html>
