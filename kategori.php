<div class="mainpage">

	<div class="content">

		<?php 
		global $connect;

		$catid = (isset($_GET['id']) ? $_GET['id'] : '');

		$getalias = mysqli_query($connect,"SELECT * FROM kategori WHERE ID='".$catid."'");
		while ($al = mysqli_fetch_array($getalias)) {


			$sql = mysqli_query($connect,"SELECT * FROM berita WHERE Terbit='1' AND Kategori='".$al['alias']."' ORDER BY ID DESC LIMIT 0,10");
			while ($b = mysqli_fetch_array($sql)) {
				extract($b);
			
			echo'
			<div data-aos="flip-left" class="card w-75 color-2 no-border" style="width: 18rem;">
			<img class="card-img-top" src="'.$url_situs.$Gambar.'" alt="Card image cap">
			<div class="card-body">
			  <h5 class="card-title">'.$Judul.'</h5>
			  <p class="'.substr(strip_tags($Isi),0,200).'</p>
			  <a href="./"></a>
			  <a href="./?open=detail&id='.$ID.'" class="btn btn-light color-5 text-white no-border">Berita Selengkapnya</a>
			</div>
		  </div>
		  <br>
		  ';

			}

		}
		?>


	</div>

	<div class="sidebar">

		<?php include 'sidebar.php'; ?>
		
	</div>

	<div class="clear"></div>
</div>

<div class="clear"></div>