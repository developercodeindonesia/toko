<?php
require ('../../well_sys/koneksi.php');

$kat			=mysql_real_escape_string($_GET['kategori']);
$subkat 	= mysql_query("SELECT * FROM subkategori WHERE id_kategori='$kat'");
$co			= mysql_num_rows($subkat);
	if($co != 0){
		echo "<option>-- Pilih kategori --</option>";
		while($k = mysql_fetch_array($subkat)){
			echo "<option value=\"".$k['id_subkategori']."\">".$k['nama']."</option>\n";
		}
	}else{
		echo "<option>-- Belum Ada kategori --</option>";
	}
	
?>