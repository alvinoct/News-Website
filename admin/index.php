<?php 
include("ceklogin.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator - <?=getprofilweb('site_title')?></title>
	<meta name="description" content="<?=getprofilweb('meta_desc')?>">
	<meta name="keywords" content="<?=getprofilweb('meta_key')?>">
	<link rel="stylesheet" type="text/css" href="../assets/style.css">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




    <script>
    	$(document).ready(function() {
		  $('.summernote').summernote({

	        tabsize: 2,
	        height: 300
		  });
		});

    </script>

</head>
<body class="color-2">

<div class="wrap shadow mt10 mb10  ">
	<div class="color-5 text-white">
		<div class="logo">
			<a href="<?=URL_SITUS?>">
				<img src="<?=URL_SITUS.PATH_LOGO.'/'.FILE_LOGO;?>" style="width:150px">
			</a>
		</div>
		
		<h3 class="pd10 clear" >Selamat Datang di Halaman Administrator</h3>

		<button type="button" class="btn color-2"><a class="text-dark" href="../index.php">Kembali</a></button>
		<br><br>
		<div class="menu pd10 card">

			<a href="./">Home</a>
			<a href="?mod=kategori">Kategori</a>
			<a href="?mod=berita">Berita</a>
			<a href="?mod=useradmin">User Admin</a>

			<span class="fr"><a href="logout.php">Log Out</a></span>


		</div>
	


		<div class="clear"></div>
	</div>

	<div class="pd10">
		
		<?php 
		$mod = (isset($_GET['mod']) ? $_GET['mod'] : '');

		switch ($mod) {
			case 'useradmin':
				include("useradmin.php");
				break;
			case 'berita':
				include("berita.php");
				break;
			case 'kategori':
				include("kategori.php");
				break;
			
			default:
				echo "<div class=''><h3 class='halo'>Selamat Datang <b>".$_SESSION['loginadminnama']."</b> di halaman Administrator. <br><br>Selamat bertugas!</h3></div>";
				break;
		}

		 ?>

	</div>
	

</div>

</body>
</html>