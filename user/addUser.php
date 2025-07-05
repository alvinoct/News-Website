<?php
include '../inc/koneksi.php';
$error = "";
	global $connect;
	global $foto;
	if(!empty($_FILES['foto']['name']) && ($_FILES['foto']['error'] !== 4 ))
	{
		$fotofile = $_FILES['foto']['tmp_name'];
		$fotofile_name = $_FILES['foto']['name'];

		$filetype = $_FILES['foto']['type'];

		$allowtype = array('image/jpeg', 'image/jpg', 'image/png');

		if(!in_array($filetype, $allowtype))
		{

			echo 'Invalid file type';
			exit;
		}

		$path = PATH_LOGO_USER.'/';

		if( isset($fotofile) && isset($fotofile_name) ) {

			$fotobaru = preg_replace("/[^a-zA-Z0-9]/", "_", $_POST['username']);

			$dest1 = '../'.$path.$fotobaru.'.jpg';
			$dest2 = $path.$fotobaru.'.jpg';


			copy($_FILES['foto']['tmp_name'], $dest1);

			$foto = $dest2;

		} else {

			$foto = $_POST['foto'];
			// var_dump($foto); die;
		}
	}
	


	$username = mysqli_real_escape_string($connect,$_POST['username']);
	$password = mysqli_real_escape_string($connect,$_POST['password']);
	$salt = mysqli_real_escape_string($connect,$_POST['salt']);
	$namaDepan = mysqli_real_escape_string($connect,$_POST['namaDepan']);
	$namaBelakang = mysqli_real_escape_string($connect,$_POST['namaBelakang']);
	$tanggalLahir = mysqli_real_escape_string($connect,$_POST['tanggalLahir']);
	$jeniskelamin = mysqli_real_escape_string($connect,$_POST['jeniskelamin']);



	$sql = mysqli_query($connect, "SELECT * FROM user WHERE username='".$username."' ");

	// $result = mysqli_query($connect,$sql);
	$hasil = mysqli_num_rows($sql);
	$r = mysqli_fetch_array($sql);
	$pw = ($password . '' . $salt);
    // echo $pw;
	$hashedpw = md5($pw);
	if ($hasil > 0) {
		
		$error = "Username dan email sudah pernah didaftarkan";

	}else{

		$sql = mysqli_query($connect,"INSERT INTO user (namaDepan,namaBelakang,tanggalLahir,jeniskelamin,username,email,gambar,salt,password) VALUES ('$namaDepan','$namaBelakang','".$_POST['tanggalLahir']."','".$_POST['jeniskelamin']."','$username','".$_POST['email']."','$foto','$salt','$hashedpw')  ");

		$error = "Berhasil menambahkan  user baru";
        header('Location: login.php');
    }
	


    