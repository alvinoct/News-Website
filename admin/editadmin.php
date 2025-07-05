<?php
include_once('../inc/fungsi.php');
?>

<?php
//include '../inc/koneksi.php';
	$id = (int)$_GET['id'];
	
	$sql = mysqli_query($connect,"SELECT * FROM administrator WHERE ID = '$id' ");
	$b = mysqli_fetch_array($sql,MYSQLI_ASSOC);
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

</head>

<body class="color-2">
<div class="w20 fn loginpage card w-50 center-object mt20 " >
<div class="logo">
	<a href="<?=URL_SITUS?>">
		<img class="" src="<?=URL_SITUS.PATH_LOGO.'/'.FILE_LOGO;?>" style="width:150px">
	</a>
	</div>

	<div class="clear pd5 "></div>
<form action="doEdit.php" method="POST">
	<input type="hidden" name="userid" value="<?=$b['ID']?>">
	<div class="formnama">
		<label>Nama Admin</label><br>
		<input type="text" name="nama" placeholder="Nama Lengkap" value="<?=$b['Nama']?>">
	</div>

	<div class="formnama">
		<label>Username Admin</label><br>
		<input type="text" name="username" placeholder="Username" value="<?=$b['username']?>">
	</div>

	<div class="formnama">
		<label>Password</label><br>
		<input type="password" name="password">
	</div>

	<div class="formnama">
		<label>Email</label><br>
		<input type="text" name="email" placeholder="Email address" value="<?=$b['email']?>">
	</div>

	<br>
            <input class="btn btn-primary" type="submit" value="Submit" name="submit">
</div>
</div>
	</body>
</form>




