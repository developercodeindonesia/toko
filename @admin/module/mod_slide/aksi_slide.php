<?php
include "../../../well_sys/koneksi.php";
include "../../../well_sys/library.php";
include "../../../well_sys/fungsi_thumb.php";
include "../../../well_sys/fungsi_seo.php";
include "../../../well_sys/watermark.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus slide
if ($module=='slide' AND $act=='hapus'){

	$id = $_GET['id'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM slide WHERE id_slide='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM slide WHERE id_slide='$_GET[id]'");
    unlink("../../../well_img/slide/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM slide WHERE id_slide='$id'");
	}
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='slide' AND $act=='input'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama		= "Fortuna_";
	$nama_file_unik = $nama.$acak.$nama_file; 
  
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadSlide($nama_file_unik);
    mysql_query("INSERT INTO slide(judul,
									 tagline,
									 link,
									 gambar) 
                            VALUES('$_POST[judul]',
									'$_POST[tagline]',
									'$_POST[link]',
									'$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO slide(judul,
									 tagline,
									 link) 
                            VALUES('$_POST[judul]',
									'$_POST[tagline]',
									'$_POST[link]')");
  }
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='slide' AND $act=='update'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama		= "Fortuna_";
	$nama_file_unik = $nama.$acak.$nama_file; 
  
  $judul_seo      = seo_title($_POST[judul]);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM slide WHERE id_slide='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../well_img/slide/$ex[gambar]");
		}
	
	UploadSlide($nama_file_unik);
  
    mysql_query("UPDATE slide SET judul 	= '$_POST[judul]',
									tagline 	= '$_POST[tagline]',
									link 	= '$_POST[link]',
									gambar	= '$nama_file_unik'
                            WHERE id_slide  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE slide SET judul 	= '$_POST[judul]',
									tagline 	= '$_POST[tagline]',
									link 	= '$_POST[link]'
                            WHERE id_slide  = '$_POST[id]'");
	}
  header('location:../../page.php?module='.$module);
}
?>
