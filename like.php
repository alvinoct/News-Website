<?php
include 'inc/koneksi.php';
session_start();
if( isset($_POST['ajax']) && isset($_POST['idcomment']) && isset($_POST['action']) ){
 if (!isset($_SESSION['loggedin'])) {
     echo 'unauthorized';
 } else {
     $action = $_POST['action'];
     $idcomment = $_POST['idcomment'];
     $iduser = $_SESSION['loginuserid'];
     if ($action == 'like'){
         $sql = "INSERT INTO islike VALUES ($idcomment, $iduser, 1)";
     } else if ($action == 'unlike') {
         $sql = "DELETE FROM islike WHERE IDcomment=$idcomment and IDuser=$iduser";
     }
     $query = mysqli_query($connect, $sql);
     if (!$query) {
         echo 'error';
     }
     else {
         echo 'success';
     }
    }
    exit;
}
?>