<?php
require ('../../well_sys/koneksi.php');

$kat		=mysql_real_escape_string($_GET['kategori']);
$subkat 	= mysql_query("SELECT * FROM subsub_kategori WHERE id_subkategori='$kat'");
$co			= mysql_num_rows($subkat);
	if($co != 0){
		echo "<option>-- Pilih kategori --</option>";
		while($k = mysql_fetch_array($subkat)){
			echo "<option value=\"".$k['id_subsub']."\">".$k['nama']."</option>\n";
		}
	}else{
		echo "<option>-- Belum Ada kategori --</option>";
	}
	
?>
<?php
/*
require ('../../well_sys/koneksi.php');

$sub			=mysql_real_escape_string($_GET['subkategori']);
$subkat 	= mysql_query("SELECT * FROM subsub_kategori WHERE id_subkategori='$sub'");
$co			= mysql_num_rows($subkat);
	if($co != 0){
		while($k = mysql_fetch_array($subkat)){
			echo "<option value=\"".$k['id_subsub']."\">".$k['nama']."</option>\n";
		}
	}else{
		echo "<option>-- Belum Ada Subkategori --</option>";
	}
*/	
?>