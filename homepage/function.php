<?php

require "koneksi.php";

function cari($data)
{
    global $conn;

    $judul = $data['judul'];
    $kategori = $data['kategori'];

    if (!$kategori) {
        $query = "SELECT * FROM buku JOIN rak USING(idbuku) WHERE judulbuku LIKE '%$judul%' AND kategori = '$kategori' ";
    } else {
        $query = "SELECT * FROM buku JOIN rak USING(idbuku) WHERE judulbuku LIKE '%$judul%' ";
    }

    return mysqli_query($conn, $query);
}

function kirim($data)
{
    require '../phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'iniperpus@gmail.com';
    $mail->Password = 'Perpusmantap12';

    $mail->setFrom($data['email'], $data['nama']);
    // $mail->addAddress($data[''])
    $mail->addReplyTo($data['email'], $data['nama']);

    $mail->isHTML(true);
    $mail->Subject = $data['subject'];
    $mail->Body = '<h1>
    Name :' . $data['nama'] . '<br>
    Email:' . $data['email'] . '<br>
    Pesan:' . $data['pesan'] . '</h1>';

    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}
