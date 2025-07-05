<?php 
include_once('../inc/fungsi.php');

session_start();

if(isset($_GET["keluar"]) && $_GET["keluar"]=='yes'){
	session_destroy();
	header('Location:index.php');
}

include_once("../inc/koneksi.php");

include_once("../assets/captcha.php");

$_SESSION["loginuser"] = '';
$_SESSION["loginuserid"] = '';
$_SESSION["loginuseremail"] = '';
$_SESSION["loginusernama"] = '';

if (isset($_POST["submit"] ) ) {
	
	global $connect;

	
    $username = mysqli_real_escape_string($connect,$_POST['username']);
	$password = mysqli_real_escape_string($connect,$_POST['password']);

	$sql 	= "SELECT * FROM user WHERE username='".$username."'";

	$result = mysqli_query($connect,$sql);
	$numrow	= mysqli_num_rows($result);



	$r = mysqli_fetch_array($result);
	$pw = ($password.$r['salt']);
	$hashedpw = md5($pw);
	if($hashedpw == $r['password'] && $response_arr["success"]==true){
		if($numrow > 0)
		{
			$_SESSION["loginuser"] = $r['username'];
			$_SESSION["loginuserid"] = $r['IDuser'];
			$_SESSION["loginuseremail"] = $r['email'];
			$_SESSION["loginusernama"] = $r['nama'];
			$_SESSION["loggedin"] = true;
			header('Location: ../index.php');
		}else{
?>
			<script type="text/javascript">
				alert('Username atau Password Tidak ditemukan!');
				location.replace("./login.php");
			</script><?php
			exit;
		}

	}else{
		?>
		<script type="text/javascript">
			alert('Pastikan anda sudah memasukkan semua dengan benar! Silahkan coba lagi!');
			location.replace("./login.php");
		</script><?php
	}

}


if(empty($_SESSION["loginuser"]))
{
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=getprofilweb('site_title')?></title>
	<meta name="description" content="<?=getprofilweb('meta_desc')?>">
	<meta name="keywords" content="<?=getprofilweb('meta_key')?>">
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	
</head>
<body class="color-2">
<div class="w20 fn loginpage card w-50 center-object mt20 " >
	<div class="logo">
	<a href="<?=URL_SITUS?>">
		<img class="" src="<?=URL_SITUS.PATH_LOGO.'/'.FILE_LOGO;?>" style="width:150px">
	</a>
	</div>

	<div class="clear pd5 "></div>
	
	<form action="" method="POST">
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username goes here" required>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control"  placeholder="Password goes here" name="password" required>
		</div>

        <div class="g-recaptcha" data-sitekey="6LdbsbUcAAAAAAwuRQVHT5cXSFg4Wf1E2RnDMfa0" style="margin-bottom: 10px" ></div>
    	
		

		<button type="submit" class="btn btn-dark" value="Login" name="submit">Login</button>
		<button type="button" class="btn color-2"><a class="text-dark" href="register.php">Register</a></button>
	</form>

</div>
</body>
</html>
<?php } ?>