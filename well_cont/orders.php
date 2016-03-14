<?php
	function anti_injection($data){
		  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		  return $filter;
		}
	
	$nama = anti_injection($_POST[nama]);
	$alamat = anti_injection($_POST[alamat]);
	$nomor = anti_injection($_POST[nomor]);
	$email = anti_injection($_POST[email]);
	$jasa_pengiriman = anti_injection($_POST[jasa_pengiriman]);
	$nama_kota = anti_injection($_POST[nama_kota]);
	$jam = $jam_sekarang;
	
	$sid  = session_id();
	$member = mysql_query("SELECT * FROM memberarea WHERE id_session='$sid'");
	$m=mysql_fetch_array($member);
	
	$id_member = $m['id_member'];
	
	$sql2 = mysql_query("INSERT INTO orders(nama, alamat, nomor, email, id_jasa, id_kota, tgl_order, jam_order, id_member)
						VALUES ('$nama', '$alamat', '$nomor', '$email', '$jasa_pengiriman', '$nama_kota', '$tgl_sekarang', '$jam', '$id_member')");
	$order = mysql_query("SELECT * FROM orders WHERE email='$email' AND jam_order='$jam'");
		$or=mysql_fetch_array($order);
	
	if(isset($_SESSION['idmember'])){
		$ord = mysql_query("SELECT * FROM orders_temp WHERE id_member='$_SESSION[idmember]'");
	}else{
		$ord = mysql_query("SELECT * FROM orders_temp WHERE id_session='$sid'");
	}
	
	while($o=mysql_fetch_array($ord)){
		
			$sql2 = mysql_query("INSERT INTO orders_detail(id_orders, id_produk, jumlah)
						VALUES ('$or[id_orders]', '$o[id_produk]', '$o[jumlah]')");
	}
			
?>

<div class="detail" style="margin-top:15px;color: #555;font-size: 1em;line-height: 1.8em;margin-bottom: 10px;">
	<h3>Data pemesan beserta ordernya adalah sebagai berikut:</h3><br />
	<table style="margin-left:20px;">
		<tr><td>ID Order</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$or[id_orders]"; ?></td></tr>
		<tr><td>Nama</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$nama"; ?></td></tr>
		<tr><td>Alamat</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$alamat"; ?></td></tr>
		<tr><td>Nomor Telepon</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$nomor"; ?></td></tr>
		<tr><td>Email</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$email"; ?></td></tr>
		
			<?php
				$jasa = mysql_query("SELECT * FROM jasa WHERE id_jasa='$jasa_pengiriman'");
				$js=mysql_fetch_array($jasa);
			?>
		<tr><td>Jasa Pengiriman</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$js[jasa_pengiriman]"; ?></td></tr>
		
		<?php
			$kta = mysql_query("SELECT * FROM kota WHERE id_kota='$nama_kota'");
			$k=mysql_fetch_array($kta);
		?>
		<tr><td>Kota Tujuan</td><td style="width:10px;padding-left:10px"> : </td><td><?php echo"$k[nama_kota]"; ?></td></tr>
		</table>
	<br />
	<?php
		$pesan="
		Hello $nama,<br />
		Order anda telah kami terima, kami akan menghubungi anda kembali via telepon untuk konfirmasi order dan detail pembayaran.<br /> Terimakasih telah melakukan pemesanan online di toko kami<br />
					<h3>Data pemesan beserta ordernya adalah sebagai berikut:</h3><br />
					<table style='margin-left:20px;'>
						<tr><td>ID Order</td><td style='width:10px;padding-left:10px'> : </td><td>$or[id_orders]</td></tr>
						<tr><td>Nama</td><td style='width:10px;padding-left:10px'> : </td><td>$nama</td></tr>
						<tr><td>Alamat</td><td style='width:10px;padding-left:10px'> : </td><td>$alamat</td></tr>
						<tr><td>Nomor</td><td style='width:10px;padding-left:10px'> : </td><td>$nomor</td></tr>
						<tr><td>Email</td><td style='width:10px;padding-left:10px'> : </td><td>$email</td></tr>
						<tr><td>Jasa Pengiriman</td><td style='width:10px;padding-left:10px'> : </td><td>$js[jasa_pengiriman]</td></tr>
						<tr><td>Kota Tujuan</td><td style='width:10px;padding-left:10px'> : </td><td>$k[nama_kota]</td></tr>
					</table>
												
												
												<table  class='prodCart' width='100%'>
													<thead>
														<tr>
															<th class='cart-romove item'>No.</th>
															<th class='cart-description item'>Image</th>
															<th class='cart-product-name item'>Product Name</th>
															<th class='cart-qty item'>Quantity</th>
														</tr>
													</thead><!-- /thead -->
													<tbody>
					";
										// Tampilkan produk-produk yang telah dimasukkan ke keranjang belanja
											$sid = session_id();
											//Session Member
											if(isset($_SESSION['id_member'])){
												$sql = mysql_query("SELECT * FROM orders_temp, produk WHERE id_member='$_SESSION[idmember]' AND orders_temp.id_produk=produk.id_produk");
											}else{
												$sql = mysql_query("SELECT * FROM orders_temp, produk WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
											}
											$ketemu=mysql_num_rows($sql);
											
												echo "
													  <form method=post action='joinc/upcart.php?mod=basket&act=update'>";
												
												echo "<table  class='prodCart' width='100%'>";
													echo "<thead>
														<tr>
															<th class='cart-romove item'>No.</th>
															<th class='cart-description item'>Image</th>
															<th class='cart-product-name item'>Product Name</th>
															<th class='cart-qty item'>Quantity</th>
														</tr>
													</thead>
														</tr><tbody>";
												$no=1;
												$total = 0;
												$totalberat=0;
												
												while($r=mysql_fetch_array($sql))
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
													
													$gambar = "<img width='50' height='50'  src='well_img/produk/$r[gambar]' style='float: left; margin-right: 5px;' />";
												   
													echo "
													<tr style='border-bottom: 1px solid #DDD;'>
														<td class='vtop center' style='vertical-align: middle;'><b>$no.</b></td>
															<input type=hidden name=id[$no] value=$r[id_orders_temp]>
														<td class='left vtop' style='vertical-align: middle;'>
															$gambar;
														</td>
														<td class='left vtop' style='vertical-align: middle;'>
															<h1 class='prodMeta _capitalize'><b>$r[nama_produk]</b>
															</h1>
														</td>
														<td class='vtop center' style='vertical-align: middle;'>$r[jumlah]</td>
													</tr>";
													
													 
													$pesan.="
													<tr style='border-bottom: 1px solid #DDD;'>
														<td class='vtop center' style='vertical-align: middle;'><b>$no.</b></td>
														<td class='left vtop' style='vertical-align: middle;color: #5E5E5E;'>
															<img width='50' height='50'  src='http://tokofortunajogja.com/joimg/produk/$r[gambar]' style='float: left; margin-right: 5px;' />
															<h4 class='prodMeta _capitalize' style='margin-top: 14px;'>
																$r[nama_produk]
															</h4>
														</td>
														<td class='vtop center' style='vertical-align: middle;'>$r[jumlah]</td>
														
													</tr>";
													  
												$no++; 
											  } 
												
												
												echo "</tbody></table>";
												echo "</form>";             
													
												
													
													$bank = mysql_query("SELECT * FROM bank ORDER BY id_bank");
													while($ba=mysql_fetch_array($bank)){
														$pesan.="
														$ba[nama_bank]<br />
														$ba[no_rekening]<br />
														a.n. $ba[nama]<br /><br />
														";
													}
													

												$pesan.="
													-------------------------------------------------------------<br />
													Setelah Anda transfer, silahkan konfirmasi pembayaran <a target='_blank' href='http://tokofortunajogja.com/contact-us.html'>di sini.</a>

													<hr />
													<p>Email ini dikirim  sebagai tanda transaksi yang telah dilakukan melalui tokofortunajogja.com 
														dengan menggunakan email <b>$_POST[email]</b>, jika anda merasa tidak pernah melakukan transaksi harap abaikan email ini. </p>
													";
													
													$user = mysql_query("SELECT * FROM users WHERE username = 'admin'");
													$us=mysql_fetch_array($user);
													$email = $us['email'];
												
												
											
												$subjek="Pemesanan Online Toko Fortuna Jogja (tokofortunajogja.com)";
												// Kirim email dalam format HTML
												$dari = "From: $email \n";
												$dari .= "Content-type: text/html \r\n";
												
												// Kirim email ke kustomer
												mail($_POST['email'],$subjek,$pesan,$dari);
												// Kirim email ke pengelola toko online
												mail($email,$subjek,$pesan,$dari);
												// Kirim email ke pengelola toko online
												mail("man.perfect58@yahoo.co.id",$subjek,$pesan,$dari);
												
											
											if(isset($_SESSION['idmember'])){
												$del = mysql_query("DELETE FROM orders_temp WHERE id_member = '$_SESSION[idmember]'");
											}else{
												$del = mysql_query("DELETE FROM orders_temp WHERE id_session = '$sid'");
											}
										?>
	<br />
	<h6>- Data order sudah terkirim ke email Anda dari (<?php echo"$email"; ?>).</h6>
	<h6 onload="addtochart()">- Order anda telah kami terima, kami akan menghubungi anda kembali via telepon untuk konfirmasi order dan detail pembayaran.</h6><br />
</div>