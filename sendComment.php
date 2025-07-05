<?php
if(isset($_POST)){
        if(isset($_SESSION['loginuser'])){
            $IDberita = $id;
            $IDuser = $_SESSION['loginuserid'];
            $isi = $_POST['isikomen'];
        }
        else{
        echo '<p><a href="user/login.php">Login</a>untuk berkomentar</p>';
        }
    }