	<!-- ============================================== TOP MENU ============================================== -->
	<div class="top-bar animate-dropdown">
		<div class="container">
			<div class="header-top-inner">
				<div class="cnt-account">
					<ul class="list-unstyled">
						<?php
							$sql  = mysql_query("SELECT * FROM modul WHERE id_modul='12'");
							$r    = mysql_fetch_array($sql);
						?>
						<li><a href="#"><i class="icon fa fa-phone"></i><?php echo "$r[static_content]"; ?></a></li>
						
						<?php
							$sqls  = mysql_query("SELECT * FROM modul WHERE id_modul='18'");
							$rs    = mysql_fetch_array($sqls);
						?>
						<li><a href="#"><i class="icon fa fa-envelope"></i><?php echo "$rs[static_content]"; ?></a></li>
					</ul>
				</div><!-- /.cnt-account -->

				<div class="cnt-block">
					<ul class="list-unstyled list-inline">
							<li><a href="contact-us.html"><i class="icon fa fa-sign-in"></i> Contact Us</a></li>
					</ul><!-- /.list-unstyled -->
				</div><!-- /.cnt-cart -->
				<div class="clearfix"></div>
			</div><!-- /.header-top-inner -->
		</div><!-- /.container -->
	</div><!-- /.header-top -->
	<!-- ============================================== TOP MENU : END ============================================== -->
	
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
					<div class="logo" style="margin-top: -9%" >
						<a href="index.html">
							
							<img src="assets/images/logo1.png" alt="">

						</a>
					</div><!-- /.logo -->
					<!-- ============================================================= LOGO : END ============================================================= -->				
				</div><!-- /.logo-holder -->

				<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
					
					<!-- ============================================================= SEARCH AREA ============================================================= -->
					
					<div class="search-area">
						<?php include "well_cont/search.php" ?>
					</div><!-- /.search-area -->
					<!-- ============================================================= SEARCH AREA : END ============================================================= -->				
				</div><!-- /.top-search-holder -->
				
				<div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row" style="margin-top: -23px;">
				<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
				<?php 	
					$sid  = session_id();
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
				</div><!-- /.end-cart -->

				
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div><!-- /.main-header -->