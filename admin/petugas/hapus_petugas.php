<?php
	session_start();

	if($_SESSION["role"] != 'admin') {
	  header("Location: ../homepage/login/");
	}

	include "../koneksi.php";
	$id = $_GET['id'];
	$del = "DELETE FROM petugas WHERE id_petugas = '$id' ";
	mysqli_query($conn, $del);
	echo "<script>window.location=('index.php');</script>";
?>