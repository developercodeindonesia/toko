<?php
include "../../../well_sys/koneksi.php";
include "../../../well_sys/library.php";
include "../../../well_sys/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus
if ($module=='subkategori' AND $act=='hapus'){

	$id = $_GET['id'];

	mysql_query("DELETE FROM subsub_kategori WHERE id_subsub='$id'");
	mysql_query("DELETE FROM produk WHERE id_subsub='$id'");
	
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='subkategori' AND $act=='input'){
  
	$judul_seo      = seo_title($_POST['nama']);
  
    mysql_query("INSERT INTO subsub_kategori(nama, id_subkategori, seo) 
                            VALUES('$_POST[nama]',
									'$_POST[subkategori]',
									'$judul_seo')");
  
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='subkategori' AND $act=='update'){
  
	$judul_seo      = seo_title($_POST[nama]);
  
    mysql_query("UPDATE subsub_kategori SET  nama  = '$_POST[nama]',
								  id_subkategori = '$_POST[subkategori]',
                                  seo = '$judul_seo'   
							WHERE id_subsub = '$_POST[id]'");
  
  header('location:../../page.php?module='.$module);
}
?>
