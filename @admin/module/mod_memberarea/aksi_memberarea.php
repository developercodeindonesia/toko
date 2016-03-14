<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../josys/koneksi.php";
include "../../../josys/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];


// Hapus
if ($module=='memberarea' AND $act=='hapus'){
	
	
	mysql_query("DELETE FROM memberarea WHERE id_member='$_GET[id]'");
	
  header('location:../../page.php?module='.$module);
}
// Hapus pesan
if ($module=='memberarea' AND $act=='update2'){
	
		mysql_query("UPDATE memberarea SET blokir = '$_POST[aktif]' 
                            WHERE id_member = '$_POST[id]'");
	
  header('location:../../page.php?module='.$module);
}


}
?>
