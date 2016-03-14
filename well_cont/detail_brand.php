<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
	<!-- ============================================== INFO BOXES : END ============================================== -->
	<!-- ============================================== SCROLL TABS ============================================== -->
	<?php $sp=mysql_fetch_array(mysql_query("SELECT * FROM brand where id_brand ='$_GET[id]'")); ?>
	<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
		<div class="more-info-tab clearfix ">
		   <h3 class="new-product-title pull-left"><?php echo $sp['nama_brand']; ?></h3>
			<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
				<li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
				<li><a data-transition-type="backSlide" href="#new" data-toggle="tab">new</a></li>
				<li><a data-transition-type="backSlide" href="#sale" data-toggle="tab">sale</a></li>
				<li><a data-transition-type="backSlide" href="#hot" data-toggle="tab">hot</a></li>
			</ul><!-- /.nav-tabs -->
		</div>

		<div class="tab-content outer-top-xs">
			
			<div class="tab-pane in active" id="all">			
				<div class="product-slider">
					<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
					<?php
						$produk = mysql_query("SELECT * FROM produk where tampil_depan = 'Y' AND id_brand = '$_GET[id]' ORDER BY id_produk DESC limit 16");
						while($p = mysql_fetch_array($produk)){
					?>
							<div class="item item-carousel">
								<div class="products">
									
									<div class="product">		
										<div class="product-image">
											<div class="image">
												<a href="<?php echo "product-$p[id_produk]-$p[produk_seo].html"; ?>">
													<img  src="assets/images/blank.gif" data-echo="<?php echo "well_img/produk/$p[gambar]"; ?>" alt="" style="width: 90%;">
												</a>
											</div><!-- /.image -->
											<?php if($p['special'] == 'new'){?>
												<div class="tag new">
													<span>new</span>
												</div>
											<?php }elseif($p['special'] == 'promo'){?>
												<div class="tag sale">
													<span>sale</span>
												</div>
											<?php }elseif($p['special'] == 'hot'){?>
												<div class="tag hot">
													<span>hot</span>
												</div>
											<?php } ?>
										</div><!-- /.product-image -->
										
										<div class="product-info text-left">
											<h3 class="name"><a href="<?php echo ""; ?>"><?php echo "$p[nama_produk]"; ?></a></h3>
										</div><!-- /.product-info -->
										
										<div class="cart clearfix animate-effect">
											<div class="action">
												<ul class="list-unstyled">
													<li class="add-cart-button btn-group">
														<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
															<i class="fa fa-shopping-cart"></i>													
														</button>
														<button class="btn btn-primary" type="button">Add to cart</button>
													</li>
												   
												</ul>
											</div><!-- /.action -->
										</div><!-- /.cart -->
									</div><!-- /.product -->
						  
								</div><!-- /.products -->
							</div><!-- /.item -->
					<?php
						}
					?>
					</div><!-- /.home-owl-carousel -->
				</div><!-- /.product-slider -->
			</div><!-- /.tab-pane -->

			<div class="tab-pane" id="new">
				<div class="product-slider">
					<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
						<?php
							$new = mysql_query("SELECT * FROM produk where special = 'new' AND tampil_depan = 'Y' AND id_subsub = '$_GET[id]' ORDER BY id_produk DESC limit 8");
							while($n = mysql_fetch_array($new)){
						?>
								<div class="item item-carousel">
									<div class="products">
										
										<div class="product">		
											<div class="product-image">
												<div class="image">
													<a href="<?php echo "product-$n[id_produk]-$n[produk_seo].html"; ?>">
														<img  src="assets/images/blank.gif" data-echo="<?php echo "well_img/produk/$n[gambar]"; ?>" alt="" style="width: 90%;">
													</a>
												</div><!-- /.image -->
												<div class="tag new">
													<span>new</span>
												</div>
											</div><!-- /.product-image -->
												
											<div class="product-info text-left">
												<h3 class="name">
													<a href="<?php echo "product-$n[id_produk]-$n[produk_seo].html"; ?>">
														<?php echo "$n[nama_produk]"; ?>
													</a>
												</h3>
											</div><!-- /.product-info -->
											
											<div class="cart clearfix animate-effect">
												<div class="action">
													<ul class="list-unstyled">
														<li class="add-cart-button btn-group">
															<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																<i class="fa fa-shopping-cart"></i>													
															</button>
															<button class="btn btn-primary" type="button">Add to cart</button>					
														</li>
													</ul>
												</div><!-- /.action -->
											</div><!-- /.cart -->
											
										</div><!-- /.product -->
							  
									</div><!-- /.products -->
								</div><!-- /.item -->
						<?php
							}
						?>
					</div><!-- /.home-owl-carousel -->
				</div><!-- /.product-slider -->
			</div><!-- /.tab-pane -->

			<div class="tab-pane" id="hot">
				<div class="product-slider">
					<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
						<?php
							$hot = mysql_query("SELECT * FROM produk where special = 'hot' AND tampil_depan = 'Y' AND id_subsub = '$_GET[id]' ORDER BY id_produk DESC limit 8");
							while($h = mysql_fetch_array($hot)){
						?>
								<div class="item item-carousel">
									<div class="products">
										
										<div class="product">		
											<div class="product-image">
												<div class="image">
													<a href="<?php echo "product-$h[id_produk]-$h[produk_seo].html"; ?>">
														<img  src="assets/images/blank.gif" data-echo="<?php echo "well_img/produk/$h[gambar]"; ?>" alt="" style="width: 90%;">
													</a>
												</div><!-- /.image -->
												<div class="tag hot">
													<span>hot</span>
												</div>
											</div><!-- /.product-image -->
												
											<div class="product-info text-left">
												<h3 class="name"><a href="<?php echo "product-$h[id_produk]-$h[produk_seo].html"; ?>"><?php echo "$h[nama_produk]"; ?></a></h3>
											</div><!-- /.product-info -->
											
											<div class="cart clearfix animate-effect">
												<div class="action">
													<ul class="list-unstyled">
														<li class="add-cart-button btn-group">
															<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																<i class="fa fa-shopping-cart"></i>													
															</button>
															<button class="btn btn-primary" type="button">Add to cart</button>					
														</li>
													</ul>
												</div><!-- /.action -->
											</div><!-- /.cart -->
											
										</div><!-- /.product -->
							  
									</div><!-- /.products -->
								</div><!-- /.item -->
						<?php
							}
						?>
					</div><!-- /.home-owl-carousel -->
				</div><!-- /.product-slider -->
			</div><!-- /.tab-pane -->
			
			<div class="tab-pane" id="sale">
				<div class="product-slider">
					<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
						<?php
							$promo = mysql_query("SELECT * FROM produk where special = 'promo' AND tampil_depan = 'Y' AND id_subsub = '$_GET[id]' ORDER BY id_produk DESC limit 8");
							while($pr = mysql_fetch_array($promo)){
						?>
								<div class="item item-carousel">
									<div class="products">
										
										<div class="product">		
											<div class="product-image">
												<div class="image">
													<a href="<?php echo "product-$pr[id_produk]-$pr[produk_seo].html"; ?>">
														<img  src="assets/images/blank.gif" data-echo="<?php echo "well_img/produk/$pr[gambar]"; ?>" alt="" style="width: 90%;">
													</a>
												</div><!-- /.image -->
												<div class="tag sale">
													<span>sale</span>
												</div>
											</div><!-- /.product-image -->
												
											<div class="product-info text-left">
												<h3 class="name"><a href="<?php echo "product-$pr[id_produk]-$pr[produk_seo].html"; ?>"><?php echo "$pr[nama_produk]"; ?></a></h3>
											</div><!-- /.product-info -->
											
											<div class="cart clearfix animate-effect">
												<div class="action">
													<ul class="list-unstyled">
														<li class="add-cart-button btn-group">
															<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																<i class="fa fa-shopping-cart"></i>													
															</button>
															<button class="btn btn-primary" type="button">Add to cart</button>					
														</li>
													</ul>
												</div><!-- /.action -->
											</div><!-- /.cart -->
											
										</div><!-- /.product -->
							  
									</div><!-- /.products -->
								</div><!-- /.item -->
						<?php
							}
						?>
					</div><!-- /.home-owl-carousel -->
				</div><!-- /.product-slider -->
			</div><!-- /.tab-pane -->
			
		</div><!-- /.tab-content -->
	</div><!-- /.scroll-tabs -->
	<!-- ============================================== SCROLL TABS : END ============================================== -->
	
	<!-- ============================================== WIDE PRODUCTS ============================================== -->
	<div class="wide-banners wow fadeInUp outer-bottom-vs">
		<div class="row">
			
			<?php
			$banner = mysql_query("SELECT * FROM banner WHERE id_banner='1'");
				$g=mysql_fetch_array($banner);
			?>
			<div class="col-md-7">
				<div class="wide-banner cnt-strip">
					<div class="image">
						<img class="img-responsive" data-echo="<?php echo "well_img/banner/$g[gambar]"; ?>" src="assets/images/blank.gif" alt="">
					</div>	
					<div class="strip">
						<div class="strip-inner">
							<h2><?php echo "$g[judul]"; ?></h2>
						</div>	
					</div>
				</div><!-- /.wide-banner -->
			</div><!-- /.col -->
			
			<?php
			$banner2 = mysql_query("SELECT * FROM banner WHERE id_banner='2'");
				$gg=mysql_fetch_array($banner2);
			?>
			<div class="col-md-5">
				<div class="wide-banner cnt-strip">
					<div class="image">
						<img class="img-responsive" data-echo="<?php echo "well_img/banner/$gg[gambar]"; ?>" src="assets/images/blank.gif" alt="">
					</div>	
					<div class="strip">
						<div class="strip-inner">
							<h2><?php echo "$gg[judul]"; ?></h2>
						</div>	
					</div>
				</div><!-- /.wide-banner -->
			</div><!-- /.col -->
			
		</div><!-- /.row -->
	</div><!-- /.wide-banners -->

	<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
	
	<!-- ============================================== BLOG SLIDER : END ============================================== -->	

</div>
<!-- /.homebanner-holder -->