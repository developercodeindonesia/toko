<?php 
	$sid  = session_id();
	$member = mysql_query("SELECT * FROM memberarea WHERE id_session='$sid'");
	$m=mysql_fetch_array($member);
?>
<div class="guest">
<table width="100%">
<form method="POST" action="orders">
<tr>
	<td style="width: 228px;"><label for="nama">Nama</label><span>*</span></td><br />
	<td><input style="width:100%;     margin-bottom: 8px;" class="nama" name="nama" required="" type="text"></td>
</tr>	
<tr>
	<td style="width: 228px;"><label for="address1">Alamat</label><span>*</span></td>
	<td><input style="width:100%;     margin-bottom: 8px;" class="alamat" name="alamat" required="" type="text"></td>
</tr>
<tr>
	<td style="width: 228px;"><label for="dayPhone">Nomor Telephone / Handphone</label><span>*</span></td>
	<td><input style="width:100%;     margin-bottom: 8px;" class="nomor" name="nomor" type="text" maxlength='30'></td>
</tr>

<?php if($m['email'] == ''){?>
<tr>
	<td style="width: 228px;"><label for="emailAddress">Alamat Email</label><span>*</span></td>
	<td><input style="width:100%;     margin-bottom: 8px;" class="emailAddress" name="email" required="" type="text" value="" aria-invalid="true"></td>
</tr>

<?php }else{ ?><input style="width:100%;     margin-bottom: 8px;" type="hidden" name="email" value="<?php echo"$m[email]"; ?>"><?php } ?>

<tr>
	<td style="width: 228px;"><label for="jasa">Jasa Pengiriman</label><span>*</span></td>
	<td>
		<select style="text-transform: uppercase; width:100%;     margin-bottom: 8px;"  class="required user-success" required="required" name="jasa_pengiriman" id="jasa_pengiriman">
			<option>- Pilih</option>
			<?php
				$sql = mysql_query("SELECT * FROM jasa");
				while($datakat=mysql_fetch_array($sql)){
				echo "<option value='$datakat[id_jasa]'>$datakat[jasa_pengiriman]</option>";			
			}?>
		
		</select>
	</td>
</tr>

<tr>
	<td style="width: 228px;"><label for="kota">Kota Tujuan</label><span>*</span></td>
	<td><select style="text-transform: uppercase; width:100%;     margin-bottom: 8px;"  class="required user-success" required="required" name="nama_kota" id="nama_kota"></select></td>
</tr>	
		
<tr>
	<td></td>
	<td><input type="submit" value="Checkout"></td>
</tr>
	
		
</form>
</table>
</div><br /><br />
