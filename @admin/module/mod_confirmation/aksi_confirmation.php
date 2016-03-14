<?php
session_start();
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


$module=$_GET['module'];
$act=$_GET['act'];


// Hapus
if ($module=='confirmation' AND $act=='hapus'){
	
	
	mysql_query("DELETE FROM konfirmasi WHERE id_konfirmasi='$_GET[id]'");
	
  header('location:../../page.php?module='.$module);
}
// Hapus pesan
if ($module=='confirmation' AND $act=='update2'){
	
		mysql_query("UPDATE konfirmasi SET approve = '$_POST[aktif]' 
                            WHERE id_konfirmasi = '$_POST[id]'");
	
  header('location:../../page.php?module='.$module);
}


// Hapus pesan
if ($module=='confirmation' AND $act=='kirimemail'){
	
		mysql_query("UPDATE konfirmasi SET approve = '$_POST[aktif]' 
                            WHERE id_konfirmasi = '$_POST[id]'");
	
  header('location:../../page.php?module='.$module);
}


}
?>
