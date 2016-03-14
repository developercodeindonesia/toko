<?php
// Tampilkan produk-produk yang telah dimasukkan ke keranjang belanja
$sid = session_id();
$sql = mysql_query("SELECT * FROM orders_temp, produk WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
$ketemu=mysql_num_rows($sql);
if($ketemu < 1){
echo "<script>window.alert('Keranjang Belanja masih kosong. Silahkan pilih produk yang tersedia!');
	window.location=('index.php')</script>";
}
	else
{
?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div>
<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
					<div class="table-responsive">
					 <form method="POST" action="well_cont/upcart.php?mod=basket&act=update">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="cart-romove item">No.</th>
									<th class="cart-description item">Image</th>
									<th class="cart-product-name item">Product Name</th>
									<th class="cart-qty item">Quantity</th>
									<th class="cart-romove item">Remove</th>
								</tr>
							</thead><!-- /thead -->
							<tfoot>
								<tr>
									<td colspan="7">
										<div class="shopping-cart-btn">
											<span class="">
												<a href="product.html" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
												<a href="checkout" class="btn btn-upper btn-primary pull-right outer-right-xs">checkout</a>
											</span>
										</div><!-- /.shopping-cart-btn -->
									</td>
								</tr>
							</tfoot>
							
						
							<tbody>
							<?php
								$no=1;
								$total=0;
								while($r=mysql_fetch_array($sql)){
									
									$disc        = ($r['discount']/100)*$r['harga'];
									$hargadisc   = number_format(($r['harga']-$disc),0,",",".");
									$subtotal    = ($r['harga']-$disc) * $r['jumlah'];
									$total       = $total + $subtotal;
									
									//Berat Produk
									$berat       = $r['berat'] * $r['jumlah'];
									
									$subtotal_rp = format_rupiah($subtotal);
									$total_rp    = format_rupiah($total);
									$harga       = format_rupiah($r['harga']);
									
									$brd=mysql_fetch_array(mysql_query("SELECT * FROM brand where id_brand='$r[id_brand]'"));
							?>
							
								<tr>
									<input type="hidden" name="<?php echo "id[$no]";?>" value="<?php echo "$r[id_orders_temp]"; ?>">
									<td class="romove-item"><?php echo $no."."; ?></td>
									<td class="cart-image">
										<a class="entry-thumbnail" href="detail.html">
											<img style="height :100px;" src="well_img/produk/<?php echo $r['gambar']; ?>" alt="<?php echo $r['nama_produk']; ?>">
										</a>
									</td>
									<td class="cart-product-name-info">
										<h4 class="cart-product-description"><a href="product-<?php echo $r['id_produk']; ?>-<?php echo $r['produk_seo'] ?>.html"><?php echo $r['nama_produk']; ?></a></h4>
										
										<div class="cart-product-info">
											<span class="product-imel">Brand: <?php echo $brd['nama_brand'] ?></span><br>
										</div>
									</td>
									
									<td class="cart-product-quantity">
										<div class="quant-input">
												<div class="arrows">
												  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
												  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
												  <?php echo "
													<input style='margin-left: 42px;' type=submit value='Update' >"
												  ?>
												</div>
												<?php
												echo "
													<input type=text name='jml[$no]' value=$r[jumlah] size=1 onchange=\"this.form.submit()\" onkeypress=\"return harusangka(event)\" > ;"
												?>
												
										  </div>
									</td>
									<td class="romove-item"><a href="well_cont/upcart.php?mod=basket&act=del&id=<?php echo $r['id_orders_temp']; ?>" title="Delete" class="icon"><i class="fa fa-trash-o"></i></a></td>
								</tr>
								
							<?php $no++;  } ?>
							</tbody><!-- /tbody -->
						</table><!-- /table -->
					</form>
					</div>
				</div>
			</div><!-- /.estimate-ship-tax -->
		</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
</div><!-- /.container -->
<?php } ?>
