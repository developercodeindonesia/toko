<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus
if ($module=='supplier' AND $act=='hapus'){

	$id = $_GET['id'];
	
	mysql_query("DELETE FROM supplier WHERE id_supplier='$id'");
	mysql_query("DELETE FROM kategori WHERE id_supplier='$id'");
	mysql_query("DELETE FROM produk WHERE id_supplier='$id'");
	
	
	header('location:../../page.php?module='.$module);
}

// Input
elseif ($module=='supplier' AND $act=='input'){
  
    mysql_query("INSERT INTO supplier(nama) VALUES ('$_POST[nama]')");
  
  header('location:../../page.php?module='.$module);
}

// Update
elseif ($module=='supplier' AND $act=='update'){
  
    mysql_query("UPDATE supplier SET nama = '$_POST[nama]' WHERE id_supplier = '$_POST[id]'");
  
  header('location:../../page.php?module='.$module);
}
?>
