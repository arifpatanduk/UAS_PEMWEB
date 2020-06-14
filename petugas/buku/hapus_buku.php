<?php

	session_start();

	if($_SESSION["role"] != 'petugas') {
	  header("Location: ../homepage/login/");
	}

	include "../koneksi.php";
	$id = $_GET['id'];
	$del_rak = "DELETE FROM rak WHERE idbuku = '$id' ";
	mysqli_query($conn, $del_rak);

	$del_buku = "DELETE FROM buku WHERE idbuku = '$id' " ;
	mysqli_query($conn, $del_buku);
	echo "<script>window.location=('index.php');</script>";
?>