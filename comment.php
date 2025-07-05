<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  let disukai = {};
  let jmlsuka = {};
  function handleLike(id) {
    if (disukai[id] == 0) {
      $.ajax({
      url: 'like.php',
      type: 'post',
      data: {ajax: 1,idcomment: id,action:'like'},
      success: function(response){
        if (response=='unauthorized') {
          alert("Anda harus login");
          location.replace('user/login.php');
        } else if (response=="success") {
          disukai[id]=1;
          jmlsuka[id]+=1;
          $('#count'+id).text(jmlsuka[id]);
          $('#like'+id).text("Batalkan Suka");
        }
      }});
    } else {
      $.ajax({
      url: 'like.php',
      type: 'post',
      data: {ajax: 1,idcomment: id,action:'unlike'},
      success: function(response){
        console.log(response);
        if (response=='unauthorized') {
          alert("Anda harus login");
          location.replace('user/login.php');
        } else if (response=="success") {
          disukai[id]=0;
          jmlsuka[id]-=1;
          $('#count'+id).text(jmlsuka[id]);
          $('#like'+id).text("Suka");
        }
      }});
    }
  }
</script>
<?php
    if(isset($_POST['postcomment'])){
        if(isset($_SESSION['loggedin'])){
            $IDberita = $id;
            $IDuser = $_SESSION['loginuserid'];
            $isi = $_POST['isikomen'];
            $tanggal = date('Y-m-d');
            $sql = "INSERT INTO comment (IDberita, IDuser, isi, tanggal) VALUES ('$IDberita', '$IDuser', '$isi', '$tanggal')";
            $query = mysqli_query($connect, $sql);
            if(!$query){
              ?>
                    <script type="text/javascript">
                      alert('Terjadi kesalahan!');
                    </script><?php
                    // echo mysqli_error($connect);
                  }
        }
        else{
          ?>
                <script type="text/javascript">
                  alert('Silakan login untuk berkomentar!');
                  location.replace("user/login.php");
                </script><?php
              }
    }
    if(isset($_SESSION['loggedin'])){
      if ($_SESSION['loginuserid'] != ''){
      $iduser = $_SESSION['loginuserid'];
    }else{
      $iduser = 0;
    }
    }else{
      $iduser = 0;
    }
    $sql = mysqli_query($connect,"SELECT comment.*, COUNT(islike.isLike) as likes, SUM(islike.IDuser=$iduser) as liked FROM comment LEFT JOIN islike ON comment.IDcomment = islike.IDcomment WHERE comment.IDberita=$id GROUP BY comment.IDcomment ORDER BY comment.tanggal ASC");
    echo '<section>
    <div class="container my-5 py-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
          <div class="card">';
		while ($b = mysqli_fetch_array($sql)) {
			// extract($b);
      $query = mysqli_query($connect,"SELECT username, gambar FROM user WHERE IDuser = '".$b['IDuser']."' "); 
      $v = mysqli_fetch_array($query);
      $namauser=$v['username'];
      $gambaruser=$v['gambar'];
      $tanggalkom=$b['tanggal'];
      $komen=$b['isi'];
      $IDcomment=$b['IDcomment'];
      $jmlsuka=$b['likes'];
      if($b['liked']==0 || $b['liked']==null){
        $disukai=0;
      }else{
        $disukai=1;
      }
      echo "<script>disukai[$IDcomment]=$disukai;jmlsuka[$IDcomment]=$jmlsuka;</script>";
              echo'<div class="card-body">
                <div class="d-flex flex-start align-items-center">
                  <img
                    class="rounded-circle shadow-1-strong me-3"
                    src="'.$url_situs.$gambaruser.'"
                    alt="avatar"
                    width="60"
                    height="60"
                  />
                  <div>
                    <h6 class="fw-bold text-primary mb-1">'.$namauser.'</h6>
                    <p class="text-muted small mb-0">
                      Tanggal komen: '.$tanggalkom.'
                    </p>
                  </div>
                </div>
    
                <p class="mt-3 mb-4 pb-2">'.$komen.'</p>
                <span id="count'.$IDcomment.'">'.$jmlsuka.'</span> suka |
                 <a id="like'.$IDcomment.'" href="#"
                 onClick="handleLike('.$IDcomment.')">';
                 if($disukai){
                   echo 'Batalkan Suka';
                 }else{
                   echo 'Suka';
                 }
                 echo'</a>
                <hr>
              </div>';
            }
            echo'<div class="form-outline w-100">
            <form action="" method="POST">
            <label class="form-label" for="textAreaExample">Message</label>
              <textarea
                class="form-control"
                id="textAreaExample"
                rows="4"
                name="isikomen"
                style="background: #fff"
                required
              ></textarea>
              <div class="float-end mt-2 pt-1">
                <input type="submit" name="postcomment" value="Post comment" class="btn btn-primary btn-sm">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  ';
?>