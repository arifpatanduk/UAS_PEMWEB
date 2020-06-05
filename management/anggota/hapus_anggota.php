<?php
	include "../koneksi.php";
	$id = $_GET['id'];
	$del = "DELETE FROM anggota WHERE id_anggota = $id" ;
	$query = mysqli_query($conn, $del);
	echo "<script>window.location=('index.php');</script>";
?>