<?php
include "../../../well_sys/koneksi.php";
include "../../../well_sys/library.php";
include "../../../well_sys/fungsi_thumb.php";
include "../../../well_sys/watermark.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus partner
if ($module=='gallery' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT * FROM gallery WHERE id_gallery='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM gallery WHERE id_gallery='$_GET[id]'");
    unlink("../../../well_img/gallery/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM gallery WHERE id_gallery='$id'");
	}
	
  header("location:../../page.php?module=$module&id=$_GET[idn]");
}

// Input header
elseif ($module=='gallery' AND $act=='input'){
    $lokasi_file    		= $_FILES['fupload']['tmp_name'];
	$tipe_file      		= $_FILES['fupload']['type'];
	$nama_file			= $_FILES['fupload']['name'];
	$acak				= rand(000000,999999);
	$web					= "fortuna_";
	$nama_file_unik 	= $web.$acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadGallery($nama_file_unik);	
	watermark_image("../../../well_img/gallery/$nama_file_unik", "../../../well_img/gallery/$nama_file_unik");
	
    mysql_query("INSERT INTO gallery(id_produk,
									 gambar) 
                            VALUES('$_POST[id]',
									'$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO gallery(id_produk) VALUES('$_POST[id]')");
  }
  header("location:../../page.php?module=$module&id=$_POST[id]");
}

?>
