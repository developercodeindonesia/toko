<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/watermark.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Brand profil
if ($module=='gambar' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT * FROM kategori_gambar WHERE id_gambar='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM kategori_gambar WHERE id_gambar='$_GET[id]'");
    unlink("../../../joimg/kategori_gambar/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM kategori_gambar WHERE id_gambar='$id'");
	}
	
  header('location:../../page.php?module='.$module);
}

// Input Brand
elseif ($module=='gambar' AND $act=='input'){
    $lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama_file_unik = $acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadGambar($nama_file_unik); //ada di Fungsi_Thumb.php
    
	mysql_query("INSERT INTO kategori_gambar(id_subkategori, nama, gambar) VALUES ('$_POST[kategori]',
						'$_POST[nama]', '$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO kategori_gambar(id_subkategori, nama) 
	VALUES ('$_POST[kategori]', '$_POST[nama]')");
  }
  header('location:../../page.php?module='.$module);
}

// Update Profil
elseif ($module=='gambar' AND $act=='update'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama_file_unik = $acak.$nama_file; 
	
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM kategori_gambar WHERE id_gambar='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex[gambar] != ''){
		unlink("../../../joimg/kategori_gambar/$ex[gambar]");
		}
	
	UploadGambar($nama_file_unik);
    mysql_query("UPDATE kategori_gambar SET id_subkategori= '$_POST[kategori]', nama = '$_POST[nama]', gambar = '$nama_file_unik' WHERE id_gambar = '$_POST[id]'");		
		
	}else {
		mysql_query("UPDATE kategori_gambar SET id_subkategori= '$_POST[kategori]', nama = '$_POST[nama]' WHERE id_gambar = '$_POST[id]'");
	}
	
  
  header('location:../../page.php?module='.$module);
}
?>
