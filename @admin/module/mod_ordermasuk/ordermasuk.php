<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_ordermasuk/aksi_ordermasuk.php";
switch($_GET[act]){
  // Tampil Modul
  default:
    echo "<h2>ORDER MASUK PRODUK</h2>
          <table id='exampless' class='display' cellspacing='0' width='100%'>
          <thead style='background: #9B9B9B;'>
		  <tr>
			<th>No</th><th>No Order</th>
			<th>Nama Pembeli</th>
			<th>Email</th><th>Status</th>
			<th>Aksi</th>
		  </tr></thead><tbody>";
		  
    $tampil=mysql_query("SELECT * FROM orders ORDER BY id_orders DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
      echo "<tr><td>$no</td>
	  <td>$r[id_orders]</td>
	  <td>$r[nama]</td>
	  <td>$r[email]</td>";
	if($r[status_order] == 'Completed') {
		echo"<td style='color:#FFA300'>$r[status_order]</td>";
	}elseif($r[status_order] == 'Baru') {
		echo"<td style='color:#5ACC00'>$r[status_order]</td>";
	}else{echo"<td style='color:#CC0008'>$r[status_order]</td>";}

	 echo "<td><a href=?module=ordermasuk&act=edit_ordermasuk&id=$r[id_orders]>Detail</a> | 
	                  ";?><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=ordermasuk&act=hapus&id=$r[id_orders]>Hapus</a>
		        </tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
    
	case "edit_ordermasuk":
	
	$order = mysql_query("SELECT * FROM orders WHERE id_orders='$_GET[id]'");
	$r2    = mysql_fetch_array($order);
	
	echo "<h2>Detail Order Produk</h2>"; ?>
		  
		  <form method='POST' enctype='multipart/form-data' action='<?php echo"$aksi"; ?>?module=ordermasuk&act=update'>
				<input type='hidden' name='ide' value='<?php echo"$_GET[id]" ?>'>
				<div class="module_content">
						<table  style="width:100%;">
							<tr>
								<td style="width:30%;"><label>No. Order</label></td>
								<td style="width:70%; margin-bottom:8px;">:<?php echo"$r2[id_orders]" ?></td>
							</tr>
							<tr>
								<td style="width:10%;"><label>Date and Time Order</label></td>
								<td style="width:1000px; margin-bottom:8px;">:<?php echo"$r2[tgl_order], $r2[jam_order] " ?></td>
							</tr>
							<tr>
								<?php
									$jasa = mysql_query("SELECT * FROM jasa WHERE id_jasa='$r2[id_jasa]'");
									$js=mysql_fetch_array($jasa);
								?>
								<td style="width:10%;"><label>Jasa Pengiriman</label></td>
								<td style="width:1000px; margin-bottom:8px;">:<?php echo"$js[jasa_pengiriman]" ?></td>
							</tr>
							<tr>
								<?php
									$kta = mysql_query("SELECT * FROM kota WHERE id_kota='$r2[id_kota]'");
									$k=mysql_fetch_array($kta);
								?>
								<td style="width:10%;"><label>Kota Tujuan</label></td>
								<td style="width:1000px; margin-bottom:8px;">:<?php echo"$k[nama_kota]" ?></td>
							</tr>
							<tr>
								<td style="width:10%;"><label>Status Order</label></td>
								<td style="width:1000px; margin-bottom:8px;">:
									<select name="status">
										<?php 
										if($r2['status_order']=='Baru'){
											echo'	<option value="Completed">Completed</option>
													<option value="Canceled">Canceled</option>
													<option value="Baru" selected>Baru</option>';											
										}elseif($r2['status_order']=='Canceled'){
											echo'	<option value="Completed">Completed</option>
													<option value="Canceled" selected>Canceled</option>
													<option value="Baru">Baru</option>';											
										}else{
											echo'	<option value="Completed" selected>Completed</option>
													<option value="Canceled">Canceled</option>
													<option value="Baru">Baru</option>';			
										}
										?>
									</select>
									<input class='butt' type='submit' value='Change Status'>
								</td>
							</tr>
							
						</table>
						<fieldset><label width="100%">Keterangan</label><br /><br />
						<?php
							// tampilkan rincian produk yang di order
							$sql2=mysql_query("SELECT * FROM orders_detail o JOIN produk p ON o.id_produk=p.id_produk WHERE id_orders='$_GET[id]' ");
							
							echo "<table  class='prodCart' width='100%'>";
													echo "<thead><tr style='border-bottom: 1px solid #DDD; font-weight:bold;'>
															<td class='center'>No.</td>
															<td class='center' colspan='2'>Produk</td>
															<td class='center'>Quantity</td>
															
															</thead>
														</tr><tbody>";
												$no=1;
												$total = 0;
												$totalberat=0;
												
												while($r=mysql_fetch_array($sql2))
												{
													$disc        = ($r['discount']/100)*$r['harga'];
													$hargadisc   = number_format(($r['harga']-$disc),0,",",".");
													$subtotal    = ($r['harga']-$disc) * $r['jumlah'];
													$total       = $total + $subtotal;
													
													//Berat Produk
													$berat       = $r['berat'] * $r['jumlah'];
													$totalberat  = $totalberat + $berat;
													$ongkir = ceil($totalberat) * $k['ongkos_kirim'];
													
													//Grand Total
													$grandtotal    = $total + $ongkir; 
													
													$subtotal_rp = format_rupiah($subtotal);
													$total_rp    = format_rupiah($total);
													$grandtotal_rp  = format_rupiah($grandtotal); 
													$ongkos_rp    = format_rupiah($ongkir);
													$harga       = format_rupiah($r['harga']);
													
												   
													echo "
													<tr style='border-bottom: 1px solid #DDD;'>
														<td class='vtop center' style='vertical-align: middle;'><b>$no.</b></td>
															<input type=hidden name=id[$no] value=$r[id_orders_temp]>
														<td class='vtop center' style='vertical-align: middle;'><img height='50px' src='../well_img/produk/$r[gambar]'></td>
														  <td class='left vtop' style='vertical-align: middle;'>
															<h1 class='prodMeta _capitalize'><b>$r[nama_produk]</b>
															
															</h1>
														  </td>
														  <td class='vtop center' style='vertical-align: middle;'>$r[jumlah]</td>
														
													  </tr>";
													  
												$no++; 
											  } 
												
												echo "</tbody></table>";
						?>
						</fieldset>
						<?php
							$sql4=mysql_query("SELECT * FROM produk WHERE id_produk='$s[id_produk]' ");		
							$m=mysql_fetch_array($sql4);	
						?>
						<table  style="width:100%;">
							<tr>
								<td style="width:30%;"><label>Customer Name</label></td>
								<td style="width:70%; margin-bottom:8px;">: <?php echo"$r2[nama]" ?></td>
							</tr>
							<tr>
								<td style="width:30%;"><label>Email</label></td>
								<td style="width:70%; margin-bottom:8px;">: <?php echo"$r2[email]" ?></td>
							</tr>
							<tr>
								<td style="width:10%;"><label>Address</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$r2[alamat] " ?></td>
							</tr>
							</tr>
							<tr>
								<td style="width:10%;"><label>Number Phone</label></td>
								<td style="width:1000px; margin-bottom:8px;">: <?php echo"$r2[nomor] " ?></td>
							</tr>
							
						</table>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div><br />
			</footer>
			</form>
			
		  <?php
    break;  
}
}
?>
