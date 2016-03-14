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

// Hapus advertise
if ($module=='advertise' AND $act=='hapus'){

	$id = $_GET['id'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM advertise WHERE id_advertise='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM advertise WHERE id_advertise='$_GET[id]'");
    unlink("../../../well_img/advertise/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM advertise WHERE id_advertise='$id'");
	}
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='advertise' AND $act=='input'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama		= "Fortuna_";
	$nama_file_unik = $nama.$acak.$nama_file; 
  
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadAdvertise($nama_file_unik);
    mysql_query("INSERT INTO advertise(judul,
									 tgl_posting,
									 url,
									 gambar) 
                            VALUES('$_POST[judul]',
									now(),
									'$_POST[url]',
									'$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO advertise(judul,
									 tgl_posting,
									 url) 
                            VALUES('$_POST[judul]',
									now(),
									'$_POST[url]')");
  }
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='advertise' AND $act=='update'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama		= "Fortuna_";
	$nama_file_unik = $nama.$acak.$nama_file; 
  
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM advertise WHERE id_advertise='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../well_img/advertise/$ex[gambar]");
		}
	
	UploadAdvertise($nama_file_unik);
  
    mysql_query("UPDATE advertise SET judul 	= '$_POST[judul]',
									url 	= '$_POST[url]',
									gambar	= '$nama_file_unik'
                            WHERE id_advertise  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE advertise SET judul 	= '$_POST[judul]',
									url 	= '$_POST[url]'
                            WHERE id_advertise  = '$_POST[id]'");
	}
  header('location:../../page.php?module='.$module);
}

}
?>
