<?php
$aksi="module/mod_description/aksi_description.php";
switch($_GET[act]){
  // Tampil Description
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='15'");
    $r    = mysql_fetch_array($sql);

		echo "<h2>EDIT DESCRIPTION WEBSITE</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=description&act=update>
          <input type=hidden name=id value=$r[id_modul]>
		  
          <table>
			<tr><td><input type='text' name='isi' value='$r[static_content]' style='width: 98%; padding: 8px; border-radius: 5px;'></td></tr>
			<tr><td><input type=submit value=Update></td></tr>";
         echo"</form></table>";
    break;  
}
?>
