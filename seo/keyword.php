<?php
	$sql=mysql_query("SELECT static_content FROM modul WHERE id_modul = 16");
	$s=mysql_fetch_array($sql);
	$cek = mysql_num_rows($sql);

	echo $s['static_content']; 
?>