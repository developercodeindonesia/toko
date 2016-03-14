<?php
include "../../../well_sys/koneksi.php";
include "../../../well_sys/library.php";
include "../../../well_sys/fungsi_thumb.php";
include "../../../well_sys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus partner
if ($module=='parentkategori' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	mysql_query("DELETE FROM kategori WHERE id_kategori='$id'");
	mysql_query("DELETE FROM produk WHERE id_kategori='$id'");
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='parentkategori' AND $act=='input'){
  
	$seo      = seo_title($_POST[nama]);
	mysql_query("INSERT INTO kategori(nama, seo) 
                            VALUES('$_POST[nama]', '$seo')");
  
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='parentkategori' AND $act=='update'){
  
	$seo      = seo_title($_POST[nama]);
	mysql_query("UPDATE kategori SET  nama  = '$_POST[nama]', seo='$seo' 
							WHERE id_kategori = '$_POST[id]'");
  
  header('location:../../page.php?module='.$module);
}
?>
