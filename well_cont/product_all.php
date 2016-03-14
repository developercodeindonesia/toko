    
                <div class='col-md-9'>
                    <!-- ========================================== SECTION – HERO ========================================= -->
                    <div class="category-carousel hidden-xs" id="category">
                        <?php
							$banner = mysql_query("SELECT * FROM banner WHERE id_banner='4'");
							$g=mysql_fetch_array($banner);
						?>
							<div class="item">
								<div class="image">
									<img alt="" class="img-responsive" src="<?php echo "well_img/banner/$g[gambar]"; ?>">
								</div>
								<div class="container-fluid">
									<div class="caption vertical-top text-left">
										<div class="big-text">
											<?php //echo "$g[judul]"; ?>
										</div>
										<div class="excerpt hidden-sm hidden-md">
											<?php echo "$g[judul]"; ?>
										</div>
									</div><!-- /.caption -->
								</div><!-- /.container-fluid -->
							</div>
						
                    </div><!-- ========================================= SECTION – HERO : END ========================================= -->
                    
					<div class="clearfix filters-container m-t-10">
                        <div class="row">
							<div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul class="nav nav-tabs nav-tab-box nav-tab-fa-icon" id="filter-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-list"></i>Grid</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#list-container"><i class="icon fa fa-th"></i>List</a>
                                        </li>
                                    </ul>
                                </div><!-- /.filter-tabs -->
                            </div><!-- /.col -->
                            <div class="col col-sm-12 col-md-6">
								<div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt">
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <label>Sort By </label>
												<select name="sort4" id="sort4" onchange="prosesPrice()">
																<option value="1" selected>
														Price : High to Low               </option>
																<option value="2">
														Price : Low to High               </option>
																<option value="3">
														Name : A - Z               </option>
																<option value="4">
														Name : Z - A               </option>
												</select>
                                            </div>
                                        </div><!-- /.fld -->
                                    </div><!-- /.lbl-cnt -->
                                </div><!-- /.col -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
					<div id="ajaxx" style="margin-top:18px;">
                    <div class="search-result-container">
                        <?php
							$produk = get_all("select * from produk");
						?>
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
															<h3 class="name"><a href="product-<?php echo $p['id_produk'] ?>-<?php echo $p['produk_seo'] ?>"><?php echo "$p[nama_produk]"; ?></a></h3>
														</div><!-- /.product-info -->
														<div class="cart clearfix animate-effect">
															<div class="action">
																<ul class="list-unstyled">
																	<li class="add-cart-button btn-group">
																		<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																			<i class="fa fa-shopping-cart"></i>
																		</button>
																		<a href="product-<?php echo $p['id_produk'] ?>-<?php echo $p['produk_seo'] ?>"><button class="btn btn-primary" type="button">Add to cart</button></a>
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
						
                        <div class="clearfix filters-container">
                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        <li class="prev">
                                            <a href="#"><i class="fa fa-angle-left"></i></a>
                                        </li>
                                        <li>
                                            <a href="#">1</a>
                                        </li>
                                        <li class="active">
                                            <a href="#">2</a>
                                        </li>
                                        <li>
                                            <a href="#">3</a>
                                        </li>
                                        <li>
                                            <a href="#">4</a>
                                        </li>
                                        <li class="next">
                                            <a href="#"><i class="fa fa-angle-right"></i></a>
                                        </li>
                                    </ul><!-- /.list-inline -->
                                </div><!-- /.pagination-container -->
                            </div><!-- /.text-right -->
                        </div><!-- /.filters-container -->
                    </div><!-- /.search-result-container -->
					
                </div><!-- /.col -->