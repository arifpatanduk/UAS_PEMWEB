<?php
session_start();
require "../admin/koneksi.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['pass'];

    $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' and password = '$password' ");

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        
        $_SESSION["login"] = true;
        $_SESION["role"]   = $row["jabatan_petugas"];
        if($_SESION["role"] == 'admin'){
            header("Location: ../admin/index.php");   
        }else{
            header("Location: ../petugas/index.php");
        }
        exit;
    }

    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Login</h2>
    <?php if (isset($error)) : ?>
        <p>username/password salah</p>
    <?php endif; ?>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="pass">Password :</label>
                <input type="password" name="pass" id="pass">
            </li>
            <li>
                <button type="submit" name="login" id="login">Login</button>
            </li>
        </ul>
    </form>
</body>

</html>