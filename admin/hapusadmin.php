<?php
include '../inc/koneksi.php';
	$id = (int)$_GET['id'];
	
	$sql = mysqli_query($connect,"DELETE FROM administrator WHERE ID = '$id' ");


	$error = "Data user admin berhasil dihapus";
    header('Location: logout.php');


