<?php
session_start();
session_destroy();
header('Location: ceklogin.php');
exit();
?>