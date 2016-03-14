<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus partner
if ($module=='pesan' AND $act=='hapus'){

	$id = $_GET['id'];

	mysql_query("DELETE FROM kontak WHERE id_kontak='$id'");
	
	header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='ordermasuk' AND $act=='update'){
    mysql_query("UPDATE orders SET status_order = '$_POST[status]' WHERE id_orders = '$_POST[ide]'");
	
	header('location:../../page.php?module='.$module);
  
}
?>
