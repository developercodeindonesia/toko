<?php
include "../../../well_sys/koneksi.php";
include "../../../well_sys/library.php";
include "../../../well_sys/fungsi_thumb.php";
include "../../../well_sys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus berita
if ($module=='berita' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM berita WHERE id_berita='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM berita WHERE id_berita='$_GET[id]'");
    unlink("../../../well_img/artikel/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM berita WHERE id_berita='$id'");
	}
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='berita' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $web		= "fortuna_";
  $nama_file_unik = $web.$acak.$nama_file; 
  
  $judul_seo      = seo_title($_POST[judul]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadArtikel($nama_file);
    mysql_query("INSERT INTO berita(nama_berita,
									 seo,
									 isi_berita,
									 tanggal,
									 gambar) 
                            VALUES('$_POST[judul]',
									'$judul_seo',
									'".mysql_real_escape_string($_POST[isi])."',
									now(),
									'$nama_file')");
  }
  else{
    mysql_query("INSERT INTO berita(nama_berita,
									 seo,
									 isi_berita,
									 tanggal) 
                            VALUES('$_POST[judul]',
									'$judul_seo',
									'".mysql_real_escape_string($_POST['isi'])."',
									now())");
  }
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='berita' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $web		= "fortuna_";
  $nama_file_unik = $web.$acak.$nama_file;
  
  $judul_seo      = seo_title($_POST[judul]);
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM berita WHERE id_berita='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../well_img/artikel/$ex[gambar]");
		}
	
	UploadArtikel($nama_file_unik);
  
    mysql_query("UPDATE berita SET nama_berita 	= '$_POST[judul]',
									seo 	= '$judul_seo',
									isi_berita 	= '".mysql_real_escape_string($_POST['isi'])."',
									gambar	= '$nama_file_unik'
                            WHERE id_berita  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE berita SET nama_berita 	= '$_POST[judul]',
									seo 	= '$judul_seo',
									isi_berita 	= '".mysql_real_escape_string($_POST['isi'])."'
                            WHERE id_berita  = '$_POST[id]'");
	}
  header('location:../../page.php?module='.$module);
}
?>
