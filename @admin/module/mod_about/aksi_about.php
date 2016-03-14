<?php
session_start();
//error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

include "../../../well_sys/koneksi.php";
include "../../../well_sys/library.php";
include "../../../well_sys/fungsi_thumb.php";
include "../../../well_sys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Update berita
if ($module=='about' AND $act=='update'){
  
	mysql_query("UPDATE modul SET 	static_content 	= '".mysql_real_escape_string($_POST[isi])."'
                            WHERE id_modul  = '$_POST[id]'");
	
  header('location:../../page.php?module='.$module);
  }
}

?>
