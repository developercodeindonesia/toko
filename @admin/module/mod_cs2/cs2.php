<?php
$aksi="module/mod_cs2/aksi_cs2.php";
switch($_GET[act]){
  // Tampil Komentar
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='12'");
    $r    = mysql_fetch_array($sql);

		echo "<h2>EDIT Fast Support</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=cs2&act=update>
          <input type=hidden name=id value=$r[id_modul]>
		  
          <table>
			<tr><td><input style='line-height:20px; width:300px' type='text' name='isi' value='$r[static_content]'/></td></tr>
			<tr><td><input type=submit value=Update></td></tr>";
         echo"</form></table>";
    break;  
}
?>
