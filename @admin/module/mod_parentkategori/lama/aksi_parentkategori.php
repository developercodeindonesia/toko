<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus partner
if ($module=='parentkategori' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	
	mysql_query("DELETE FROM parentkategori WHERE id_parentkategori='$id'");
	mysql_query("DELETE FROM kategori WHERE id_parentkategori='$id'");
	mysql_query("DELETE FROM produk WHERE id_parentkategori='$id'");
	
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='parentkategori' AND $act=='input'){
  
    mysql_query("INSERT INTO parentkategori(nama) VALUES ('$_POST[parentkategori]')");
  
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='parentkategori' AND $act=='update'){
  
    mysql_query("UPDATE parentkategori SET nama = '$_POST[parentkategori]' WHERE id_parentkategori = '$_POST[id]'");
  
  header('location:../../page.php?module='.$module);
}
?>
