<div class="mainpage">

	<div class="content">

		<?php 
    
		$id = (isset($_GET['id']) ? $_GET['id'] : '');
    
		global $connect;
    // if(isset($_SESSION['loginuser'])){
    // $iduser = $_SESSION['loginuser'];
    // $ceklike = mysqli_query($connect,"SELECT * FROM isLike WHERE IDuser='".$iduser."' AND IDberita = '".$id."' ");
    // }
    $_GET["type"]= '';

    if(null !== ($_GET['type'] && $_GET['id'])){
      $type = $_GET["type"];  
      $id = (int)$_GET["id"];  
      if($type == "like"){
        $query = " INSERT INTO islike (IDuser, IDberita, isLike) 
                  VALUE ('".$_SESSION['loginuserid']."','".$id."', 1)
        
        ";
        mysqli_query($connect, $query);  
        header("location:#");  
      }

    }

		$sql = mysqli_query($connect,"SELECT * FROM berita WHERE Terbit='1' AND ID = '".$id."' ");
		while ($b = mysqli_fetch_array($sql)) {
		extract($b);

		$Updateviewnum = mysqli_query($connect,"UPDATE berita SET Viewnum=Viewnum+1 WHERE ID = '".$id."' ");
		
		echo'
		<div class="detail color-2 card">
			<h1>'.$Judul.'</h1>
			<div class="info text-dark">
				<span> Tanggal: '.$Tanggal.' </span> | <span> Update by: '.$Updateby.' </span> | <span>Category Tag: '.$Kategori.'</span>
			</div>
			 <div class="img">
			 	<img src="'.$url_situs.$Gambar.'">

			 	<div class="teks-foto text-dark">'.$Teks.'</div>

			 </div>
			 
			 <p>'.nl2br($Isi).'</p>

			 <div class="clear"></div>';
       ;
       
       include('comment.php');
       
       

		echo '</div>
		

		';

		}
		?>
		<div class="clear"></div>



	</div>

	<div class="sidebar">

		<?php 
		include 'sidebar.php';
		 ?>
		
	</div>

	<div class="clear"></div>

</div>
<?php

?>
