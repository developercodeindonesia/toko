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

// Hapus desk
if ($module=='desk' AND $act=='hapus'){

	$id = $_GET['id'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM desk WHERE id_desk='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM desk WHERE id_desk='$_GET[id]'");
    unlink("../../../well_img/desk/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM desk WHERE id_desk='$id'");
	}
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='desk' AND $act=='input'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama		= "Fortuna_";
	$nama_file_unik = $nama.$acak.$nama_file; 
  
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    Uploaddesk($nama_file_unik);
    mysql_query("INSERT INTO desk(judul,
									 tgl_posting,
									 deskripsi,
									 gambar) 
                            VALUES('$_POST[judul]',
									now(),
									'$_POST[deskripsi]',
									'$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO desk(judul,
									 tgl_posting,
									 deskripsi) 
                            VALUES('$_POST[judul]',
									now(),
									'$_POST[deskripsi]')");
  }
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='desk' AND $act=='update'){
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama		= "Fortuna_";
	$nama_file_unik = $nama.$acak.$nama_file; 
  
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM desk WHERE id_desk='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex['gambar'] != ''){
		unlink("../../../well_img/desk/$ex[gambar]");
		}
	
	Uploaddesk($nama_file_unik);
  
    mysql_query("UPDATE desk SET judul 	= '$_POST[judul]',
									deskripsi 	= '$_POST[deskripsi]',
									gambar	= '$nama_file_unik'
                            WHERE id_desk  = '$_POST[id]'");
	}
	else{
	mysql_query("UPDATE desk SET judul 	= '$_POST[judul]',
									tgl_posting		= NOW(),
									deskripsi 	= '$_POST[deskripsi]'
                            WHERE id_desk  = '$_POST[id]'");
	}
  header('location:../../page.php?module='.$module);
}

}
?>
