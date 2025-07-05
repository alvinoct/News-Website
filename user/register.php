<?php 
include("../inc/fungsi.php");
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
    <div class="w40 loginpage card">
        <form action="addUser.php" method="POST" enctype="multipart/form-data">
        <div class="logo text-center">
		<a href="<?=URL_SITUS?>">
			<img src="<?=URL_SITUS.PATH_LOGO.'/'.FILE_LOGO;?>" style="width:150px">
		</a>
	</div>
            <input type="hidden" name="userid" value="<?=$b['IDuser']?>">
            <!-- <fieldset>
                <legend>Register user</legend> -->
            <div class="clear pd5"></div>
            <div class="formnama">
                <label>Nama Depan</label><br>
                <input class="fshadow" type="text" name="namaDepan" placeholder="Nama Depan" >
            </div>

            <div class="formnama">
                <label>Nama Belakang</label><br>
                <input class="fshadow" type="text" name="namaBelakang" placeholder="Nama Belakang" >
            </div>

            <div class="formnama">
                <label>Tanggal Lahir</label><br>
                <input class="fshadow" type="date" name="tanggalLahir" placeholder="Tanggal Lahir" >
            </div>

            <div class="formnama ">
                <label>Jenis Kelamin</label><br>
                    <input class="form-check-input" type="radio" name="jeniskelamin" id="lakilaki" value="Male">
                    <label class="form-check-label" for="lakilaki">Laki - laki</label>
            </div>
            <div class=" formnama">
                    <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="Female">
                    <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>

            <div class="formnama">
                <label>Username</label><br>
                <input class="fshadow" type="text" name="username" placeholder="Username" >
            </div>
            
            <div class="formnama">
                <label>Email</label><br>
                <input class="fshadow"  type="text" name="email" placeholder="Email address" >
            </div>

            <div class="formnama">
				<label>Gambar</label>:<br>
				<input class="fshadow" type="file" name="foto" required>
			</div>

            <div class="formnama">
                <label>Salt</label><br>
                <input class="fshadow" type="text" name="salt" placeholder="Salt">
            </div>

            <div class="formnama">
                <label>Password</label><br>
                <input class="fshadow" type="password" name="password" placeholder="Password">
            </div>

            <br>
            <input class="btn btn-primary" type="submit" value="Submit" name="submit">
            
<!-- 
            </fieldset> -->
        </form>
    </div>
    <br><BR><BR></BR></BR>
</body>

</html>