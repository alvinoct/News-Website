<?php 
include("inc/fungsi.php");
session_start();
// $_SESSION["loginuser"]='';
 ?>
<!DOCTYPE html>
<html>
<head>	

	<title><?=getprofilweb('site_title')?></title>
	<meta name="description" content="<?=getprofilweb('meta_desc')?>">
	<meta name="keywords" content="<?=getprofilweb('meta_key')?>">	
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>
<body class="color-3">
	<div class="wrap">
		<div class="pd10">
	<script>
  AOS.init();
</script>	

		<header>
		<nav class="navbar navbar-expand-lg navbar-light color-5 pt25 text-white">
			<a class="navbar-brand text-white" href="./">
				<img src="<?=URL_SITUS.PATH_LOGO.'/'.FILE_LOGO;?>" style="width:150px">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse   text-white" id="navbarNav">
				<ul class="navbar-nav text-white">
				<li class="nav-item active">
					<a class="nav-link   text-white" href="./">Home <span class="sr-only">(current)</span></a>
				</li>
				<?php 
				global $connect;

				$menu = mysqli_query($connect,"SELECT * FROM kategori WHERE Terbit='1' ORDER BY ID ASC LIMIT 0,10");
				while ($r = mysqli_fetch_array($menu)) {
					extract($r);
					
					echo'
					<li class="nav-item active"><a class="nav-link   text-white" href="./?open=cat&id='.$ID.'">'.$Kategori.'</a></li>
					';
				}

				 
				if(isset($_SESSION['loggedin'])){
					echo'
					<li class="nav-item active   text-white"><a class="nav-link text-white" href="user/logoutuser.php">Logout</a></li>
					';
				}else{
				echo '<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Login
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="user/login.php">Users</a>
						<a class="dropdown-item" href="./admin">Admin</a>
						</div>
				</li>';
			}
				?>
				</ul>
			</div>
		</nav>
		</header>