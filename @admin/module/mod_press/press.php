<?php
$aksi="module/mod_press/aksi_press.php";
switch($_GET[act]){
  // Tampil Komentar
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='3'");
    $r    = mysql_fetch_array($sql);

		echo "<h2>EDIT PRESS</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=press&act=update>
          <input type=hidden name=id value=$r[id_modul]>
		  
          <table>
			<tr><td><textarea name='isi' id='jogmce'>$r[static_content]</textarea></td></tr>
			<tr><td><input type=submit value=Update></td></tr>";
         echo"</form></table>";
    break;  
}
?>
