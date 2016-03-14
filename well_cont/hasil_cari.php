<?php 
// menghilangkan spasi di kiri dan kanannya
  $kata = trim($_POST['search']);
  
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;
  
  $katb = $_POST['katprod'];
?>
<div class='col-md-9'>
		
<?php
	if($_POST['search']=='Kata kunci...' || $_POST['search']=='')
			{
				echo "<script>window.alert('Silahkan ketikan kata kunci pencarian terlebih dahulu.');window.location(history.back(-1))</script>";
			}
			
	if($_POST['katprod']=='0')
	{
			$cari = "SELECT * FROM produk WHERE " ;
				for ($i=0; $i<=$jml_kata; $i++){
					$cari .= "nama_produk LIKE '%$pisah_kata[$i]%' ";
					if ($i < $jml_kata ){
						$cari .= " AND ";
					  }
				}
				  $cari .= " ORDER BY id_produk";
				  $hasil  = mysql_query($cari);
				  $ketemu = mysql_num_rows($hasil);
				
				
				echo "<h1 class='hTitle _capitalize'>Hasil pencarian</h1>";
				  if ($ketemu > 0)
				  {	 
?>
					<p class="_capitalize">kata kunci &raquo; <b style="color:#7A0503"> <?php echo $kata; ?> </b>, <b style="color:#7A0503"> Semua kategori </b></p>
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
                        </div><!-- /.row -->
                    </div>
					
					<div class="search-result-container">
                        <?php
							$produk = get_all($cari);
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
<?php	
				  }
				  else{
						$sql=mysql_query("SELECT nama FROM subkategori WHERE id_subkategori='$katb'");
						$s=mysql_fetch_array($sql);
						echo "<p class='_capitalize'>Tidak ditemukan produk dengan kata <b style='color:#7A0503'> $kata</b>, pada <b style='color:#7A0503'> semua kategori</b></p>";
					}
	} else {
				$cari = "SELECT * FROM produk WHERE " ;
				for ($i=0; $i<=$jml_kata; $i++){
					$cari .= "id_subkategori='$katb' AND nama_produk LIKE '%$pisah_kata[$i]%' ";
					if ($i < $jml_kata ){
						$cari .= " AND ";
					  }
				}
				  $cari .= " ORDER BY id_produk";
				  $hasil  = mysql_query($cari);
				  $ketemu = mysql_num_rows($hasil);
				
				
				echo "<h1 class='hTitle _capitalize'> Hasil pencarian </h1>";
				  if ($ketemu > 0)
				  {	 
					$sql=mysql_query("SELECT nama FROM subkategori WHERE id_subkategori='$katb'");
					$s=mysql_fetch_array($sql);
					
					echo "<p class='_capitalize'>kata kunci &raquo; <b style='color:#7A0503'> $kata </b>, kategori &raquo; <b style='color:#7A0503'> $s[nama] </b></p>";
?>
					<div class="search-result-container">
                        <?php
							$produk = get_all($cari);
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
<?php                                                          
				  }
				  else{
						$sql=mysql_query("SELECT nama FROM subkategori WHERE id_subkategori='$katb'");
						$s=mysql_fetch_array($sql);
						echo "<p class='_capitalize'>Tidak ditemukan produk dengan kata <b style='color:#7A0503'> $kata</b>, pada kategori <b style='color:#7A0503'> $s[nama]</b></p>";
					}
	}

  echo "</div>";
  
 ?>