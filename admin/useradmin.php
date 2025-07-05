<form action="addAdmin.php" method="POST">
	<input type="hidden" name="userid" value="<?=$b['ID']?>">
	<fieldset>
		<legend>Tambah user</legend>

	<div class="formnama">
		<label>Nama User</label><br>
		<input type="text" name="nama" placeholder="Nama Lengkap" >
	</div>

	<div class="formnama">
		<label>Username</label><br>
		<input type="text" name="username" placeholder="Username" >
	</div>

	<div class="formnama">
		<label>Password</label><br>
		<input type="password" name="password" placeholder="Password">
	</div>

	<div class="formnama">
		<label>Salt</label><br>
		<input type="text" name="salt" placeholder="Salt">
	</div>

	<div class="formnama">
		<label>Email</label><br>
		<input type="text" name="email" placeholder="Email address" >
	</div>

	<input type="submit" name="submit" class="btn color-5 text-white no-border" >

	</fieldset>
</form>

<fieldset>
	<legend>List user</legend>

	<div class="w100 ">
		<!-- <hr>
		<div class="w10 bold fl">No.</div>
		<div class="w30 bold fl">Username</div>
		<div class="w20 bold fl">Nama</div>
		<div class="w20 bold fl">Email</div>
		<div class="w20 bold fl">Aksi</div>
		<div class="clear"></div>
		<hr> -->
		<table class="w100">
		<thead class="text-white color-5">
			<th>No.</th>
			<th>Username</th>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</thead>
		<tbody>
		<!-- <table>
			<thead>
				<th></th>
				<th></th>
			</thead>
			<tbody>
				<tr>
					<td>
						
					</td>
				</tr>
			</tbody>
		</table> -->
		
		<?php
		// include '../inc/koneksi.php';
		$i= 1;

		$sql = mysqli_query($connect,"SELECT * FROM administrator ORDER BY ID ASC");
		while($r = mysqli_fetch_array($sql)){
			extract($r);

			// echo'
			// <div class="list">
			// <div class="w10 fl">'.$i++.'</div>
			// <div class="w30 fl">'.$username.'</div>
			// <div class="w20 fl">'.$Nama.'</div>
			// <div class="w20 fl">'.$email.'</div>
			// <div class="w20 fl">
			// <a href="editadmin.php?id='.$ID.'" class="small btn btn-primary">Edit</a><br> <a href="hapusadmin.php?id='.$ID.'" class=" btn btn-danger">Hapus</a></div>
			// <div class="clear"></div>
			// </div>
			// ';
			echo 
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$username.'</td>
				<td>'.$Nama.'</td>
				<td>'.$email.'</td> 
				<td><a href="editadmin.php?id='.$ID.'" class="btn btn-primary">Edit</a><a href="hapusadmin.php?id='.$ID.'" class=" btn btn-danger">Hapus</a></td>
			</tr>
			';



		}
		echo '</tbody> </table>'

		 ?>

	</div>

</fieldset>