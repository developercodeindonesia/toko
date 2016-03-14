<div class='col-md-9'>
	<?php
	$id = $_GET['id'];
	$prod = mysql_query("SELECT * FROM produk WHERE id_produk = '$id'");
	$p = mysql_fetch_array($prod);
	
	$harga       = number_format(($p['harga']),0,",",".");
	$disc        = ($p['discount']/100)*$p['harga'];
	$hargadisc   = number_format(($p['harga']-$disc),0,",",".");
	?>
		<div class="row wow fadeInUp">

			<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
				<div class="product-item-holder size-big single-product-gallery small-gallery">
                    <div id="owl-single-product">
						
						<div class="single-product-gallery-item" id="<?php echo "#$p[gambar]"; ?>">
							<a data-lightbox="image-1" data-title="<?php echo "$p[nama_produk]"; ?>" href="<?php echo "well_img/produk/$p[gambar]"; ?>">
								<img alt="" class="img-responsive" data-echo="<?php echo "well_img/produk/$p[gambar]"; ?>"src="assets/images/blank.gif">
							</a>
						</div>
						
						<?php
						
						$subimg = mysql_query("SELECT * FROM gallery WHERE id_produk = '$id' ");
						while($si = mysql_fetch_array($subimg))
						{
						?>
						<div class="single-product-gallery-item" id="<?php echo "#$si[gambar]"; ?>">
							<a data-lightbox="image-1" data-title="<?php echo "$p[nama_produk]"; ?>" href="<?php echo "well_img/gallery/$si[gambar]"; ?>">
								<img alt="" class="img-responsive" data-echo="<?php echo "well_img/gallery/$si[gambar]"; ?>"src="assets/images/blank.gif">
							</a>
						</div><!-- /.single-product-gallery-item -->
						<?php
						}
						?>
                    </div><!-- /.single-product-slider -->
                    <div class="single-product-gallery-thumbs gallery-thumbs">
                        <div id="owl-single-product-thumbnails">
								
								<div class="item">
									<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="<?php echo "$p[id_produk]"; ?>" href="<?php echo "#$p[gambar]"; ?>">
										<img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="<?php echo "well_img/produk/$p[gambar]"; ?>" />
									</a>
								</div>
								
							<?php
							
							$subimg = mysql_query("SELECT * FROM gallery WHERE id_produk = '$id' ");
							while($si = mysql_fetch_array($subimg))
							{
							?>
								<div class="item">
									<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="<?php echo "$si[id_gallery]"; ?>" href="<?php echo "#$si[gambar]"; ?>">
										<img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="<?php echo "well_img/gallery/$si[gambar]"; ?>" />
									</a>
								</div>
							<?php
							}				
							?>
                        </div><!-- /#owl-single-product-thumbnails -->
                    </div><!-- /.gallery-thumbs -->
                </div><!-- /.single-product-gallery -->
            </div><!-- /.gallery-holder -->
			
            <div class='col-sm-6 col-md-7 product-info-block'>
                <div class="product-info">
                    <h1 class="name"><?php echo "$p[nama_produk]"; ?></h1>
                    
					<div class="rating-reviews m-t-20">
                        <div class="row">
							<!--
                            <div class="col-sm-3">
                                <div class="rating rateit-small"></div>
                            </div>
                            <div class="col-sm-8">
                                <div class="reviews">
                                    <a class="lnk" href="#">(06 Reviews)</a>
                                </div>
                            </div>
							-->
                        </div>
                    </div>
					
                    <div class="stock-container info-container m-t-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="stock-box">
                                    <span class="label">Availability :</span>
                                </div>
                            </div>
                            <?php
							$cek = mysql_num_rows($prod);
							if($cek['stok'] != 0)
							{
							?>
								<div class="col-sm-9">
									<div class="stock-box">
										<span class="value" style="color: green;">In Stock</span>
									</div>
								</div>
							<?php
							}else{
							?>
								<div class="col-sm-9">
									<div class="stock-box">
										<span class="value">Out of Stock</span>
									</div>
								</div>
							<?php
							}
							?>
							
							<?php
							$cek = mysql_num_rows($prod);
							if($cek['garansi'] != 0)
							{
							?>
							<div class="col-sm-3">
                                <div class="stock-box">
                                    <span class="label">Garansi :</span>
                                </div>
                            </div>                            
							<div class="col-sm-9">
								<div class="stock-box">
									<span class="value" style="color: green;"><?php echo "$p[garansi]"; ?></span>
								</div>
							</div>
							<?php
							}
							?>
                        </div><!-- /.row -->
                    </div><!-- /.stock-container -->
					<?php 
						$color=mysql_query("SELECT * FROM sub_color s JOIN color c ON s.id_color=c.id_color WHERE id_produk = '$_GET[id]'");
						$cc = mysql_num_rows($color);
						if($cc != 0){
					?>
					<div class="stock-container info-container m-t-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="stock-box">
                                    <span class="label">Color :</span>
                                </div>
                            </div>
                            <?php
							
								while($c=mysql_fetch_array($color)){
									echo "<div class='coloradm' style='float:left;'>";
										echo"<div class='clr' style='background-color:$c[color]; height:20px; width: 30px; float:right; position: relative; margin-left:5px; margin-right:1px; margin-bottom: 2px; box-shadow: 0px 0px 8px #555; border-radius:3px;'><div class='clear'></div></div>";
									echo"</div>";
								}
							?>

                        </div><!-- /.row -->
                    </div><!-- /.stock-container -->
					<?php
						}
					?>
					<!--
                    <div class="description-container m-t-20">
						<?php
							echo "$p[detail]";
						?>
                    </div><!-- /.description-container -->
					<!--
                    <div class="price-container info-container m-t-20">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="price-box">
								<?php
								if($p['discount'] != 0){
								?>
                                    <span class="price">Rp. <?php echo "$hargadisc"; ?></span>
									<span class="price-strike">Rp. <?php echo "$harga"; ?></span>
                                <?php
								}else{
								?>	
									<span class="price">Rp. <?php echo "$harga"; ?></span>
								<?php	
								}
								?>
								</div>
                            </div>
                        </div>
                    </div>
					
					<div class="quantity-container info-container">
                        <div class="row">
                            <div class="col-sm-2">
                                <span class="label">Qty :</span>
                            </div>
                            <div class="col-sm-2">
                                <div class="cart-quantity">
                                    <div class="quant-input">
                                        <div class="arrows">
                                            <div class="arrow plus gradient">
                                                <span class="ir"><i class="icon fa fa-sort-asc"></i></span>
                                            </div>
                                            <div class="arrow minus gradient">
                                                <span class="ir"><i class="icon fa fa-sort-desc"></i></span>
                                            </div>
                                        </div><input type="text" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <a class="btn btn-primary" href="#"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                            </div>
                        </div>
                    </div>
					-->
					<div class="stock-container info-container m-t-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="stock-box">
                                    <span class="label">Brand :</span>
                                </div>
                            </div>
                           <?php
								$brand=mysql_query("SELECT * FROM brand where id_brand='$p[id_brand]' ");
								$b = mysql_num_rows($brand);
								$g = mysql_fetch_array($brand);
								if($b != 0){
									echo "<a href='brand-$g[seo]-$g[id_brand]'>";
										echo "<img width='130px' src='well_img/brand/$g[gambar]'>"; 	
									echo "</a>";
								}
								?>
                        </div><!-- /.row -->
                    </div><!-- /.stock-container -->
					
                    <div class="product-social-link m-t-20 text-right">
                        <span class="social-label">Share :</span>
                        <div class="social-icons">
							<ul class="list-inline">
                                <li class='st_facebook_large' displayText='Facebook'></li>
                                <li class='st_twitter_large' displayText='Tweet'></li>
                                <li class='st_email_large' displayText='Email'></a></li>
								<li class='st_googleplus_large' displayText='Google +'></li>
                                <li class='st_blogger_large' displayText='Blogger'></li>
                            </ul><!-- /.social-icons -->
                        </div>
                    </div>
					
					
								
								<div class="add-cart-button btn-group">
									<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
										<i class="fa fa-shopping-cart"></i>													
									</button>
									<a href="javascript: addtochart(<?php echo"$p[id_produk]"; ?>)"><button class="btn btn-primary" type="button">Add to cart</button></a>
															
								</div>
								
					
                </div><!-- /.product-info -->
            </div><!-- /.col-sm-7 -->
        </div><!-- /.row -->
		
        <div class="product-tabs inner-bottom-xs wow fadeInUp">
            <div class="row">
                <div class="col-sm-3">
                    <ul class="nav nav-tabs nav-tab-cell" id="product-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#description">DESCRIPTION</a>
                        </li>
                    </ul><!-- /.nav-tabs #product-tabs -->
                </div>
                <div class="col-sm-9">
                    <div class="tab-content">
                        
						<div class="tab-pane in active" id="description">
                            <div class="product-tab">
                                <p class="text">
								<?php
									echo "$p[detail]";
								?>
								</p>
							</div>
                        </div><!-- /.tab-pane -->
                        
                    </div><!-- /.tab-content -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.product-tabs -->
		
        <!-- ============================================== UPSELL PRODUCTS ============================================== -->
		
		<section class="section featured-product wow fadeInUp">
            <h3 class="section-title">upsell products</h3>
            <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
				<?php
				$sql=mysql_query("SELECT * FROM produk WHERE id_subkategori='$p[id_subkategori]' And id_produk!='$p[id_produk]' LIMIT 4");
				$cek = mysql_num_rows($sql);
				if($cek != 0)
				{
					while($s=mysql_fetch_array($sql)){
					$harga       = number_format(($s['harga']),0,",",".");
					$disc        = ($s['discount']/100)*$s['harga'];
					$hargadisc   = number_format(($s['harga']-$disc),0,",",".");
			   ?>
					<div class="item item-carousel">
						<div class="products">
							<div class="product">
								<div class="product-image">
									<div class="image">
										<a href="<?php echo "product-$s[id_produk]-$s[produk_seo].html"; ?>">
											<img alt="" data-echo="<?php echo "well_img/produk/$s[gambar]"; ?>" src="assets/images/blank.gif" style="width: 90%;">
										</a>
									</div><!-- /.image -->
								<?php if($s['special'] == 'new'){?>
									<div class="tag new">
										<span>new</span>
									</div>
								<?php }elseif($s['special'] == 'promo'){?>
									<div class="tag sale">
										<span>sale</span>
									</div>
								<?php }elseif($s['special'] == 'hot'){?>
									<div class="tag hot">
										<span>hot</span>
									</div>
								<?php } ?>
								</div><!-- /.product-image -->
								<div class="product-info text-left">
									<h3 class="name">
										<a href="<?php echo "product-$s[id_produk]-$s[produk_seo].html"; ?>">
											<?php echo "$s[nama_produk]"; ?>
										</a>
									</h3>
								   
									<div class="product-price">
										<?php /*
										if($s['discount'] != 0){
										?>
											<span class="price">Rp. <?php echo "$hargadisc"; ?></span>
											<span class="price-before-discount">Rp. <?php echo "$harga"; ?></span>
										<?php
										}else{
										?>	
											<span class="price">Rp. <?php echo "$harga"; ?></span>
										<?php	
										}
										
										*/
										?>
									</div><!-- /.product-price -->
								</div><!-- /.product-info -->
								<div class="cart clearfix animate-effect">
									<div class="action">
										<ul class="list-unstyled">
											<li class="add-cart-button btn-group">
												<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
													<i class="fa fa-shopping-cart">
													</i>
												</button>
												<a href="<?php echo "product-$s[id_produk]-$s[produk_seo].html"; ?>">
													<button class="btn btn-primary" type="button">Detail produk</button>
												</a>
											</li>
										</ul>
									</div><!-- /.action -->
								</div><!-- /.cart -->
							</div><!-- /.product -->
						</div><!-- /.products -->
					</div><!-- /.item -->
				<?php
					}
				}
				?>
            </div><!-- /.home-owl-carousel -->
        </section><!-- /.section -->
        <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
</div><!-- /.col -->
<div class="clearfix"></div>