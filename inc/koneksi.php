<?php 
// define('DBHOST', 'sql101.epizy.com');
// define('DBUSER', 'epiz_29999770');
// define('DBPASS', 'O6IadwGGCm1S');
// define('DBNAME', 'epiz_29999770_pb');
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'pb');


// define('URL_SITUS', 'http://hhznews.rf.gd/');
// $url_situs= 'http://hhznews.rf.gd/';
define('URL_SITUS', 'http://localhost/PEMWEB%20LAB/00000042583_AlvinOctavianus_UTSIF330/portal_berita/');
$url_situs = 'http://localhost/PEMWEB%20LAB/00000042583_AlvinOctavianus_UTSIF330/portal_berita/';

// define('PATH_LOGO', 'image');
// define('PATH_GAMBAR', 'photo');
// define('FILE_LOGO', 'keren.png');
// define('FILE_ICON', 'icon.png');
// define('PATH_LOGO_USER', 'photoUser');
define('PATH_LOGO', 'image');
define('PATH_GAMBAR', 'photo');
define('PATH_LOGO_USER', 'photoUser');

define('FILE_LOGO', 'keren.png');
define('FILE_ICON', 'icon.png');


define('POPULER_TIME', '-1000'); //lama (hari) rentang waktu berita populer.


$connect = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

if(mysqli_connect_errno()){

	echo "Gagal Koneksi ke Database ". mysqli_connect_error();
}

?>