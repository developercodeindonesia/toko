<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>
<style type="text/css" title="currentStyle">
    @import "media/css/demo_table_jui.css";
    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
</script>

<script>
$(document).ready( function () {
     var oTable = $('#example').dataTable( {
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
				} );		
} );
</script>
<style>.ui-widget-header{background:none;border:none;}</style>

		
		<?php
		$aksi="module/mod_confirmation/aksi_confirmation.php";
		switch($_GET['act']){
			default:
		?>
		<!-- comment -->
		<article class="module width_full">
			<header><h3>Confirmation Product</h3></header>
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th>No</th> 
    				<th>Date</th> 
    				<th>No Order</th> 
    				<th>Email</th> 
    				<th>Approve</th> 
    				<th>Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$room = mysql_query("SELECT * FROM konfirmasi ORDER BY tanggal DESC");
				while($r=mysql_fetch_array($room)){
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><?php echo"$r[tanggal]" ?></td> 
    				<td align="center"><?php echo"$r[no_order]" ?></td> 
    				<td align="center"><?php echo"$r[email]" ?></td> 
						<?php 
						if($r['approve'] == 'N'){?>
						<td align="center" style="color:#D23D24">No</td> 
						<?php } else{ ?>
						<td align="center" style="color:#3BEB03">Yes</td> 
						<?php } ?>
					<td align="center"><a href="<?php echo"?module=confirmation&act=edit&id=$r[id_konfirmasi]";?>"><input type="image" src="images/icn_edit.png" title="Detail"></a> &nbsp;<a href="<?php echo"$aksi?module=confirmation&act=hapus&id=$r[id_konfirmasi]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
		</article>
		<!-- end of comment -->
		
		
		<?php break; 
		case"edit":
			$room = mysql_query("SELECT * FROM konfirmasi WHERE id_konfirmasi='$_GET[id]'");
			$r=mysql_fetch_array($room);
			
		?>
		<article style="min-width:500px; float:none;" class="module width_quarter">
			 <header><h3>Detail Confirmation</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='<?php echo"$aksi"; ?>?module=confirmation&act=update2'>
				<input type="hidden" name="id" value='<?php echo"$r[id_konfirmasi]"; ?>'>
				<div class="module_content">
						
						<table>
							<tr><td><label>No Order</label></td><td>:</td><td><?php echo"$r[no_order]" ?></td></tr>
							<tr><td><label>Email</label></td><td>:</td><td><?php echo"$r[email]" ?></td></tr>
							<tr><td><label>Phone</label></td><td>:</td><td><?php echo"$r[phone]" ?></td></tr>
							<tr><td><label>Nomor Rekening Pengirim</label></td><td>:</td><td><?php echo"$r[no_rekening]" ?></td></tr>
							<tr><td><label>Nama Pemilik Rekening</label></td><td>:</td><td><?php echo"$r[nama_rekening]" ?></td></tr>
							<tr><td><label>Nama Bank Pengirim</label></td><td>:</td><td><?php echo"$r[nama_bank]" ?></td></tr>
							<tr><td><label>Jumlah</label></td><td>:</td><td><?php echo"$r[jumlah]" ?></td></tr>
							<tr><td style="vertical-align: top;"><label>Catatan</label></td><td style="vertical-align: top;">:</td><td><?php echo"$r[catatan]" ?></td></tr>
							<tr><td><label>Date</label></td><td>:</td><td><?php echo"$r[tanggal]"; ?></td></tr>
							<tr><td><label>Approve</label></td><td>:</td>
								<td>
								<?php 
									if($r['approve'] == 'N'){
								?>
									<input type="radio" name="aktif" class="radio" value="Y" > Yes 
									<input type="radio" name="aktif" class="radio" value="N" checked > No
								<?php } else {?>
									<input type="radio" name="aktif" class="radio" value="Y"  checked> Yes 
									<input type="radio" name="aktif" class="radio" value="N" > No
								<?php } ?>
								</td>
							</tr>
						</table>
						
						
						<style>fieldset input[type=text]{width:87%} fieldset textarea {width:85%}</style>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article --><br />
		<article class="module width_full">
		<header><h3 class="tabs_involved">Kirim Faktur Pembelian</h3>
				
				
			</header>
			 <?php 
			
			$orders = mysql_query("SELECT * FROM orders WHERE id_orders='$r[no_order]'");
			$o=mysql_fetch_array($orders);
			
			
				echo "
          <form method=POST action='?module=confirmation&act=kirimemail'>
          <table>
          <tr><td>Kepada</td><td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td>Subjek</td><td> : <input type=text name='subjek' size=50 value='Faktur Pembelian Toko Online Nikitafurnishing.com'></td></tr>
          <tr><td>Pesan</td><td>
		  <textarea name='pesan' style='height: 450px; width:730px' >	  
		  Dengan ini, Kami sampaikan bahwa kami telah menerima pembayaran order, dan pesanan anda telah kami kirim.<br />
  --------------------------------------------------------------------------------------<br />
		  <b>Detail Pembayaran :</b><br /><br />
		  No. Order : $r[no_order]<br />
		  Atas nama : $r[nama_rekening]<br />
		  Total pembayaran sebesar : Rp. $r[jumlah]<br />
		  Alamat pengiriman : $o[address], $o[city], $o[state], $o[zip]<br /><br />
		 
		  Terima kasih telah belanja di Toko Online kami.<br />
		  Salam kami,<br />
  --------------------------------------------------------------------------------------
  </textarea></td></tr>
          <tr><td colspan=2><input type='submit' value='Kirim' class='butt' />
                            <input type='button' class='butt' value='Batal' onclick=self.history.back()></td></tr>
          </table></form>";
			 
			 ?>
		</article><br /><!-- end of post new article -->
		
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
		
		<?php 
		
		
		break; 
		  case "kirimemail":
			$headers = "From: support@furnishing.com \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			mail($_POST['email'],$_POST['subjek'],$_POST['pesan'],$headers);
			echo "<h2>Status Email</h2>
				  <p>Email telah sukses terkirim ke tujuan</p>
				  <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";	 		  
			
		break;
		 } ?>
		
<?php } ?>