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

// Hapus banner
if ($module=='banner' AND $act=='hapus'){

	$id = $_GET['id'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM banner WHERE id_banner='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM banner WHERE id_banner='$_GET[id]'");
    unlink("../../../well_img/banner/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM banner WHERE id_banner='$id'");
	}
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='banner' AND $act=='input'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama		= "Fortuna_";
	$nama_file_unik = $nama.$acak.$nama_file; 
  
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadBanner($nama_file_unik);
    mysql_query("INSERT INTO banner(judul,
									 tgl_posting,
									 url,
									 gambar) 
                            VALUES('$_POST[judul]',
									now(),
									'$_POST[url]',
									'$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO banner(judul,
									 tgl_posting,
									 url) 
                            VALUES('$_POST[judul]',
									now(),
									'$_POST[url]')");
  }
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='banner' AND $act=='update'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama		= "Fortuna_";
	$nama_file_unik = $nama.$acak.$nama_file; 
  
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM banner WHERE id_banner='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../well_img/banner/$ex[gambar]");
		}
	
	UploadBanner($nama_file_unik);
  
    mysql_query("UPDATE banner SET judul 	= '$_POST[judul]',
									url 	= '$_POST[url]',
									gambar	= '$nama_file_unik'
                            WHERE id_banner  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE banner SET judul 	= '$_POST[judul]',
									url 	= '$_POST[url]'
                            WHERE id_banner  = '$_POST[id]'");
	}
  header('location:../../page.php?module='.$module);
}

}
?>
