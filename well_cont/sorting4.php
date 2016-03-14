
	<?php 
	include('../well_sys/koneksi.php');
	include('../well_sys/fungsi_rupiah.php');
	include('../well_sys/iuk.php');
	
		if($_POST['sort4'] == 1){
			$produks="SELECT * FROM produk ORDER BY harga DESC";
		}else if($_POST['sort4'] == 2){
			$produks="SELECT * FROM produk ORDER BY harga ASC";
		}else if($_POST['sort4'] == 3){
			$produks="SELECT * FROM produk ORDER BY nama_produk ASC";
		}else if($_POST['sort4'] == 4){
			$produks= "SELECT * FROM produk ORDER BY nama_produk DESC" ;
		}
		
			$produk = get_all($produks);
		?>
				
	<div style="margin-top:18px;">
    <div class="search-result-container">
                        
						<div class="tab-content" id="myTabContent">
						
                            <div class="tab-pane active" id="grid-container">
                                <div class="category-product inner-top-vs">
                                    <div class="row">
                                       <?php
									   foreach($produk as $iuk => $p){
									   ?>
											<div class="col-sm-6 col-md-4 wow fadeInUp">
												<div class="products">
													<div class="product">
														<div class="product-image">
															<div class="image">
																<a href="<?php echo ""; ?>">
																	<img alt="" data-echo="<?php echo "well_img/produk/$p[gambar]"; ?>" src="assets/images/blank.gif">
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
															<h3 class="name"><a href="detail.html"><?php echo "$p[nama_produk]"; ?></a></h3>
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
                                    </div><!-- /.row -->
                                </div><!-- /.category-product -->
                            </div><!-- /.tab-pane -->
							
                            <div class="tab-pane" id="list-container">
                                <div class="category-product inner-top-vs">
									<?php
									   foreach($produk as $iuk => $p2){
								   ?>
										<div class="category-product-inner wow fadeInUp">
											<div class="products">
												<div class="product-list product">
													<div class="row product-list-row">
													
														<div class="col col-sm-4 col-lg-4">
															<div class="product-image">
																<div class="image">
																	<img alt="" data-echo="<?php echo "well_img/produk/$p2[gambar]"; ?>" src="assets/images/blank.gif">
																</div>
															</div><!-- /.product-image -->
														<?php if($p2['special'] == 'new'){?>
															<div class="tag new">
																<span>new</span>
															</div>
														<?php }elseif($p2['special'] == 'promo'){?>
															<div class="tag sale">
																<span>sale</span>
															</div>
														<?php }elseif($p2['special'] == 'hot'){?>
															<div class="tag hot">
																<span>hot</span>
															</div>
														<?php } ?>
														</div><!-- /.col -->
														<div class="col col-sm-8 col-lg-8">
															<div class="product-info">
																<h3 class="name">
																	<a href="<?php echo ""; ?>"><?php echo "$p2[nama_produk]"; ?></a>
																</h3>
															   
																<div class="description m-t-10">
																	<?php echo "$p2[detail]"; ?>
																</div>
																
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
															</div><!-- /.product-info -->
														</div><!-- /.col -->
													</div><!-- /.product-list-row -->
													
												</div><!-- /.product-list -->
											</div><!-- /.products -->
										</div><!-- /.category-product-inner -->
									<?php
									   }
									?>
                                </div><!-- /.category-product -->
                            </div><!-- /.tab-pane #list-container -->
                        </div><!-- /.tab-content -->
						</div>                                       
</div>
					
					