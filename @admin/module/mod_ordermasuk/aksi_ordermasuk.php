<?php
include "../../../well_sys/koneksi.php";
include "../../../well_sys/library.php";
include "../../../well_sys/fungsi_thumb.php";
include "../../../well_sys/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus partner
if ($module=='ordermasuk' AND $act=='hapus'){

	$id = $_GET['id'];

	mysql_query("DELETE FROM orders WHERE id_orders='$id'");
	
	header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='ordermasuk' AND $act=='update'){
    mysql_query("UPDATE orders SET status_order = '$_POST[status]' WHERE id_orders = '$_POST[ide]'");
	
	header('location:../../page.php?module='.$module);
  
}
?>
