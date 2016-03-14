<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus berita
if ($module=='editconcept' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM modul WHERE id_modul='$_GET[id]'"));
  if ($data['gambar']!=''){
	 unlink("../../../joimg/foto_content/$data[gambar]");
     mysql_query("DELETE FROM modul WHERE id_modul='$_GET[id]'");
    
  }
  else{
     mysql_query("DELETE FROM modul WHERE id_modul='$_GET[id]'");
  }
  header('promo:../../page.php?module='.$module);
}

// Update berita
elseif ($module=='editpromo' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM modul WHERE id_modul='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../joimg/foto_content/$ex[gambar]");
		unlink("../../../joimg/foto_content/small_$ex[gambar]");
		}
	
	UploadContent($nama_file_unik);
  
    mysql_query("UPDATE modul SET 	nama_modul 	= '$_POST[judul]',
									static_content 	= '".mysql_real_escape_string($_POST[isi])."',
									gambar	= '$nama_file_unik'
                            WHERE id_modul  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE modul SET 	nama_modul 	= '$_POST[judul]',
									static_content 	= '".mysql_real_escape_string($_POST[isi])."'
                            WHERE id_modul  = '$_POST[id]'");
	}
  header('location:../../page.php?module='.$module);
}
}
?>
