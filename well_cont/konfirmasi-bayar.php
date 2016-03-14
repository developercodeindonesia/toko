<div class="guest">
<?php
if($_GET['action']=='gagal'){
?>
<h5 style="color: #E20606;">No Order Tidak ditemukan di database kami</h5>
<?php
}
?>
<table width="100%">
<form method="POST" action="process-confirm.html">
<tr>
	<td style="width: 228px;"><label for="nama">No Order</label><span>*</span></td><br />
	<td><input style="width:100%;     margin-bottom: 8px;" class="nama" name="frm_no_order" required="" type="number"></td>
</tr>	
<tr>
	<td style="width: 228px;"><label for="email">Email</label><span>*</span></td>
	<td><input style="width:100%;     margin-bottom: 8px;" class="email" name="frm_email" required="" type="email"></td>
</tr>
<tr>
	<td style="width: 228px;"><label for="phone">Phone</label><span>*</span></td>
	<td><input style="width:100%;     margin-bottom: 8px;" class="phone" name="frm_phone" required="" type="number"></td>
</tr>
<tr>
	<td style="width: 228px;"><label for="dayPhone">Nomor Rekening Asal</label><span>*</span></td>
	<td><input style="width:100%;     margin-bottom: 8px;" class="frm_no_rekening" name="frm_no_rekening" required="" type="number"></td>
</tr>
<tr>
	<td style="width: 228px;"><label for="dayPhone">Nama Pemilik Rek. Asal</label><span>*</span></td>
	<td><input style="width:100%;     margin-bottom: 8px;" class="frm_nama_pemilik" name="frm_nama_rekening" required="" type="text"></td>
</tr>
<tr>
	<td style="width: 228px;"><label for="dayPhone">Nama Bank Asal</label><span>*</span></td>
	<td><input style="width:100%;     margin-bottom: 8px;" class="phone" name="frm_nama_bank" required="" type="text"></td>
</tr>

<tr>
	<td style="width: 228px;"><label for="emailAddress">Jumlah Yang Ditranfer</label><span>*</span></td>
	<td><input style="width:100%;     margin-bottom: 8px;" class="Jumlah" name="frm_jumlah" required="" type="number" aria-invalid="true"></td>
</tr>

<tr>
	<td style="width: 228px;"><label for="emailAddress">Catatan Khusus Untuk Kami</label><span>*</span></td>
	<td><textarea name="frm_catatan" style="width:100%;     margin-bottom: 8px;" required=""></textarea>

	</td>
</tr>	
<tr>
	<td></td>
	<td><input type="submit" value="Kirim"></td>
</tr>
</form>
</table>
</div><br /><br />