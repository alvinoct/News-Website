<?php
include '../inc/koneksi.php';
$error = "";

	global $connect;
	
	$username = mysqli_real_escape_string($connect,$_POST['username']);
	$password = mysqli_real_escape_string($connect,$_POST['password']);
	$salt = mysqli_real_escape_string($connect,$_POST['salt']);


	$sql = mysqli_query($connect, "SELECT * FROM administrator WHERE username='".$username."' ");

	// $result = mysqli_query($connect,$sql);
	$hasil = mysqli_num_rows($sql);
	$r = mysqli_fetch_array($sql);
	$pw = ($password. '' .$salt);

	$hashedpw = md5($pw);
	if ($hasil > 0) {
		
		$error = "Username dan email sudah pernah didaftarkan";

	}else{

		$sql = mysqli_query($connect,"INSERT INTO administrator (Nama,username,password,salt,email) VALUES ('".$_POST['nama']."','$username','$hashedpw','$salt','".$_POST['email']."')  ");

		$error = "Berhasil menambahkan user admin baru";
    }
    header('Location: index.php');
