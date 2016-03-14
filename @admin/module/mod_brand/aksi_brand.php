<?php
include "../../../well_sys/koneksi.php";
include "../../../well_sys/library.php";
include "../../../well_sys/fungsi_thumb.php";
include "../../../well_sys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Brand
if ($module=='brand' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT * FROM brand WHERE id_brand='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM brand WHERE id_brand='$_GET[id]'");
    unlink("../../../well_img/brand/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM brand WHERE id_brand='$id'");
	}
	
  header('location:../../page.php?module='.$module);
}

// Input Brand
elseif ($module=='brand' AND $act=='input'){
	$judul_seo      = seo_title($_POST[nama_brand]);
    $lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama		= "Fortuna_";
	$nama_file_unik = $nama.$acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadBrand($nama_file_unik); //ada di Fungsi_Thumb.php
    
	mysql_query("INSERT INTO brand( nama_brand, seo, gambar) VALUES (
	'$_POST[nama_brand]', '$judul_seo', '$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO brand( nama_brand, seo) 
	VALUES ( '$_POST[nama_brand]', '$judul_seo')");
  }
  header('location:../../page.php?module='.$module);
}

// Update Brand
elseif ($module=='brand' AND $act=='update'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama		= "Fortuna_";
	$nama_file_unik = $nama.$acak.$nama_file; 

	$judul_seo      = seo_title($_POST[nama_brand]);
	
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM brand WHERE id_brand='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex[gambar] != ''){
		unlink("../../../well_img/brand/$ex[gambar]");
		}
	
	UploadBrand($nama_file_unik);
    mysql_query("UPDATE brand SET nama_brand = '$_POST[nama_brand]', seo = '$judul_seo',
				gambar = '$nama_file_unik' WHERE id_brand = '$_POST[id]'");		
	
	}else {
		mysql_query("UPDATE brand SET nama_brand = '$_POST[nama_brand]', seo = '$judul_seo'
					WHERE id_brand = '$_POST[id]'");
	}
	
  
  header('location:../../page.php?module='.$module);
}
?>
