<?php
$aksi="module/mod_help/aksi_help.php";
switch($_GET[act]){
  // Tampil Komentar
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='4'");
    $r    = mysql_fetch_array($sql);

		echo "<h2>EDIT HELP</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=help&act=update>
          <input type=hidden name=id value=$r[id_modul]>
		  
          <table>
			<tr><td><textarea name='isi' id='jogmce'>$r[static_content]</textarea></td></tr>
			<tr><td><input type=submit value=Update></td></tr>";
         echo"</form></table>";
    break;  
}
?>
