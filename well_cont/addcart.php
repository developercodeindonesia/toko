<?php
	session_start();
	include "../well_sys/koneksi.php";
	include "../well_sys/library.php";
	include "../well_sys/fungsi_input.php";

	$sid  = session_id();
	$id = $_POST['id'];
	$sql  = mysql_query("SELECT stok FROM produk WHERE id_produk='$id'");
	$s 	  = mysql_fetch_array($sql);
	$stok = $s['stok'];
	//$id_ukuran = $_POST['ukuran'];
	
	$sql = mysql_query("SELECT id_produk FROM orders_temp
				WHERE id_produk='$id' AND id_session='$sid'");
		$ketemu=mysql_num_rows($sql);
	if ($ketemu=="0")
		{
			// put the product in cart table
			mysql_query("INSERT INTO orders_temp (id_produk, jumlah, stok_temp, id_session, tgl_order_temp, jam_order_temp)
			VALUES ('$id', 1, '$stok','$sid', '$tgl_sekarang', '$jam_sekarang')");
		}
		else 
		{
			// update product quantity in cart table
			mysql_query("UPDATE orders_temp SET jumlah = jumlah + 1
					WHERE id_session ='$sid' AND id_produk='$id'");		
		}
	$sql1 = mysql_query("SELECT * FROM orders_temp, produk WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
		$total=mysql_num_rows($sql1);
?>
<div class="cart">	
<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
			<div class="items-cart-inner">
				<div class="total-price-basket">
					<span class="lbl">Shopping Cart</span>
				</div>
				<div class="basket">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
				<div class="basket-item-count"><span class="count"><?php echo"$total";?></span></div>
			
			</div>
		</a>
		<ul class="dropdown-menu">
			<li>
				<?php
					while($r=mysql_fetch_array($sql1)){
				?>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-4">
							<div class="image">
								<a href="detail.html"><img style="width: 45px;" src="well_img/produk/<?php echo $r['gambar']; ?>" alt=""></a>
							</div>
						</div>
						<div class="col-xs-7">
							
							<h3 class="name"><a href="index.php?page-detail"><?php echo $r['nama_produk'] ?></a></h3>
						</div>
						<div class="col-xs-1 action">
							<a href="well_cont/upcart.php?mod=basket&act=del&id=<?php echo $r['id_orders_temp']; ?>"><i class="fa fa-trash"></i></a>
						</div>
					</div>
				</div><!-- /.cart-item -->
				<?php } ?>
				
				<div class="clearfix"></div>
			<hr>
		
			<div class="clearfix cart-total">
				<div class="clearfix"></div>
					
				<a href="cart" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>	
			</div><!-- /.cart-total-->
					
				
		</li>
		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->
</div>