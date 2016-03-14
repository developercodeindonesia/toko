<?php
include "../../../well_sys/koneksi.php";
include "../../../well_sys/library.php";
include "../../../well_sys/fungsi_thumb.php";
include "../../../well_sys/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus
if ($module=='kategori' AND $act=='hapus'){

	$id = $_GET['id'];

	mysql_query("DELETE FROM subkategori WHERE id_subkategori='$id'");
	mysql_query("DELETE FROM produk WHERE id_subkategori='$id'");
	
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='kategori' AND $act=='input'){
  
	$judul_seo      = seo_title($_POST[nama]);
  
    mysql_query("INSERT INTO subkategori(nama,id_kategori, seo) 
                            VALUES('$_POST[nama]',
									'$_POST[kategori]',
									'$judul_seo')");
  
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='kategori' AND $act=='update'){
  
	$judul_seo      = seo_title($_POST[nama]);
  
    mysql_query("UPDATE subkategori SET  nama  = '$_POST[nama]',
								  id_kategori = '$_POST[kategori]',
                                   seo = '$judul_seo'   
							WHERE id_subkategori = '$_POST[id]'");
  
  header('location:../../page.php?module='.$module);
}
?>
