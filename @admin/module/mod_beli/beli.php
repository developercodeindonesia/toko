<?php
$aksi="module/mod_beli/aksi_beli.php";
switch($_GET[act]){
  // Tampil Komentar
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='13'");
    $r    = mysql_fetch_array($sql);

		echo "<h2>EDIT HOW TO BUY</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=beli&act=update>
          <input type=hidden name=id value=$r[id_modul]>
		  
          <table>
			<tr><td><textarea name='isi' id='jogmce'>$r[static_content]</textarea></td></tr>
			<tr><td><input type=submit value=Update></td></tr>";
         echo"</form></table>";
    break;  
}
?>
