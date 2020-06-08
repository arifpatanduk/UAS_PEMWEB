<?php
	include "../koneksi.php";
	$id = $_GET['id'];
	
	$del_buku = "DELETE FROM buku WHERE idbuku = '$id' " ;
	mysqli_query($conn, $del_buku);

	$del_rak = "DELETE FROM rak WHERE idbuku = '$id' ";
	mysqli_query($conn, $del_rak);
	echo "<script>window.location=('index.php');</script>";
?>