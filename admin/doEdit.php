<?php
include '../inc/koneksi.php';
$username = mysqli_real_escape_string($connect,$_POST['username']);

$sql = mysqli_query($connect, "UPDATE administrator SET username='".$username."', Nama ='".$_POST['nama']."', email='".$_POST['email']."' WHERE ID = '".$_POST['userid']."' ");

$error = "Data user admin berhasil diperbaharui";
if($sql){
echo "<script type='text/javascript'>alert('tes');</script>";
header('Location: index.php');
}
// header('Location: index.php');
?>
