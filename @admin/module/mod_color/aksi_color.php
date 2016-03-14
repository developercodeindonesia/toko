<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus partner
if ($module=='color' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	
	mysql_query("DELETE FROM color WHERE id_color='$id'");
	mysql_query("DELETE FROM subcolor WHERE id_color='$id'");
	
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='color' AND $act=='input'){
  
    mysql_query("INSERT INTO color(color) VALUES ('$_POST[color]')");
  
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='color' AND $act=='update'){
  
    mysql_query("UPDATE color SET color = '$_POST[color]' WHERE id_color = '$_POST[id]'");
  
  header('location:../../page.php?module='.$module);
}
?>
