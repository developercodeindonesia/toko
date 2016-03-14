<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus partner
if ($module=='catalog' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	
	mysql_query("DELETE FROM catalog WHERE id_catalog='$id'");
	
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='catalog' AND $act=='input'){

	$judul_seo      = seo_title($_POST[catalog]);
  
    mysql_query("INSERT INTO catalog(nama, seo) VALUES ('$_POST[catalog]','$judul_seo')");
  
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='catalog' AND $act=='update'){

	$judul_seo      = seo_title($_POST[catalog]);
  
    mysql_query("UPDATE catalog SET nama = '$_POST[catalog]', seo = '$judul_seo' WHERE id_catalog = '$_POST[id]'");
  
  header('location:../../page.php?module='.$module);
}
?>
