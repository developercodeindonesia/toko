<?php
$aksi="module/mod_pengiriman/aksi_pengiriman.php";
switch($_GET[act]){
  // Tampil pengiriman
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='18'");
    $r    = mysql_fetch_array($sql);

		echo "<h2>EDIT PROMO PENGIRIMAN HALAMAN DEPAN WEBSITE</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=pengiriman&act=update>
          <input type=hidden name=id value=$r[id_modul]>
		  
          <table>
			<tr><td><input type='text' placeholder='maksimal 40 karakter' name='isi' value='$r[static_content]' style='width: 35%; padding: 8px; border-radius: 5px;'>
			&nbsp;&nbsp;&nbsp;&nbsp;*)maksimal 40 karakter
			</td></tr>
			<tr><td><input type=submit value=Update></td></tr>";
         echo"</form></table>";
    break;  
}
?>
