<?php
	$aksi="module/mod_location/aksi_location.php";
	switch($_GET[act]){
		// Tampil Komentar
		default:
			$sql  = mysql_query("SELECT * FROM modul WHERE id_modul='6'");
			$r    = mysql_fetch_array($sql);
			$sql1  = mysql_query("SELECT * FROM modul WHERE id_modul='2'");
			$rr    = mysql_fetch_array($sql1);

			echo "<h2>EDIT STORE LOCATION</h2>
				<form method=POST enctype='multipart/form-data' action=$aksi?module=location&act=update>
					<input type=hidden name=id value=$r[id_modul]>

					<table>
						<tr>
							<td><textarea name='isi' id='jogmce'>$r[static_content]</textarea></td>
						</tr>
					</table>"; 
			echo "
					<input type='hidden' name='idmap' value='$rr[id_modul]'>
						<fieldset>
							<label>MAP</label>
							<input name='map' type='text' value='$rr[static_content]' style='width: 1000px;' >
						</fieldset>
						<fieldset>
							<p>*Cara Penggunaan :<br/>
							*Cara pakai : Gunakan yang di dari <b><i>https://</i></b> saja sampai <b>PETIK</b> terakhir di <b>https</b>
							Jadi hasilnya seperti ini :<br/>
							<b><i>https://www.google.com/maps/embed?pdsadsddsaddsa</i></b></p>
						</fieldset>
						<br/>
						<input type=submit value=Update style='margin-bottom: 10px;'>
					</form>";

			break; 

	}
?>