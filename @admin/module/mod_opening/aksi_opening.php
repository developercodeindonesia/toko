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

$module=$_GET[module];
$act=$_GET[act];

// Hapus berita
if ($module=='opening' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM modul WHERE id_modul='$_GET[id]'"));
  if ($data['gambar']!=''){
	 unlink("../../../joimg/foto_content/$data[gambar]");
     mysql_query("DELETE FROM modul WHERE id_modul='$_GET[id]'");
    
  }
  else{
     mysql_query("DELETE FROM modul WHERE id_modul='$_GET[id]'");
  }
  header('location:../../page.php?module='.$module);
}

// Update berita
elseif ($module=='opening' AND $act=='update'){
  
	mysql_query("UPDATE modul SET 	static_content 	= '".mysql_real_escape_string($_POST[isi])."'
                            WHERE id_modul  = '$_POST[id]'");
	
  header('location:../../page.php?module='.$module);
}
}
?>
