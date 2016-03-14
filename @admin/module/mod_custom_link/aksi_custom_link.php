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

// Hapus custom_link
if ($module=='custom_link' AND $act=='hapus'){

	$id = $_GET['id'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM custom_link WHERE id='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM custom_link WHERE id='$_GET[id]'");
    unlink("../../../well_img/custom_link/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM custom_link WHERE id='$id'");
	}
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='custom_link' AND $act=='input'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama		= "Fortuna_";
	$nama_file_unik = $nama.$acak.$nama_file; 
  
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    Uploadcustom_link($nama_file_unik);
    mysql_query("INSERT INTO custom_link(nama,
									 tanggal,
									 link,
									 gambar) 
                            VALUES('$_POST[judul]',
									now(),
									'$_POST[url]',
									'$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO custom_link(nama,
									 tanggal,
									 link) 
                            VALUES('$_POST[judul]',
									now(),
									'$_POST[url]')");
  }
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='custom_link' AND $act=='update'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama		= "Fortuna_";
	$nama_file_unik = $nama.$acak.$nama_file; 
  
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM custom_link WHERE id='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../well_img/custom_link/$ex[gambar]");
		}
	
	Uploadcustom_link($nama_file_unik);
  
    mysql_query("UPDATE custom_link SET nama 	= '$_POST[judul]',
									link 	= '$_POST[url]',
									gambar	= '$nama_file_unik'
                            WHERE id  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE custom_link SET nama 	= '$_POST[judul]',
									link 	= '$_POST[url]'
                            WHERE id  = '$_POST[id]'");
	}
  header('location:../../page.php?module='.$module);
}

}
?>
