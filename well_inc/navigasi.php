	<!-- ============================================== NAVBAR ============================================== -->
	<div class="header-nav animate-dropdown">
		<div class="container">
			<div class="yamm navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="nav-bg-class">
					<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
						<div class="nav-outer">
							<ul class="nav navbar-nav">
								
								<li class="active dropdown">
									<a href="index.html">Home</a>
								</li>

								<li class="dropdown">
									<a href="profile-1.html">Profile</a>
								</li>
								
								<li class="dropdown yamm-fw" onclick="location.href='product.html';">
									<a href="product.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
										Produk
										<span class="menu-label hot-menu hidden-xs">hot</span>
									</a>
									<ul class="dropdown-menu">
										<li>
											<div class="yamm-content">
												<div class="row">
													<div class="col-md-8 col-sm-8">
														<div class="row">
															<div class='col-md-12'>
																<?php 
																	$kategori=mysql_query("SELECT * FROM subkategori");
																	while($k=mysql_fetch_array($kategori)){
																?>
																	   <div class="col-xs-12 col-sm-6 col-md-3">
																			<h2 class="title" onclick="location.href='<?php echo "$k[seo]"; ?>';">
																				<a href="kategori-<?php echo $k['seo'] ?>-<?php echo $k['id_subkategori'] ?>"><?php echo "$k[nama]"; ?></a>
																			</h2>
																			<ul class="links">
																				<?php
																					$subkategori=mysql_query("SELECT * FROM subsub_kategori where id_subkategori = '$k[id_subkategori]' ");
																					while($sk=mysql_fetch_array($subkategori)){
																				?>
																					<li><a href="subkategori-<?php echo "$sk[seo]"; ?>-<?php echo $sk['id_subsub'] ?>"><?php echo "$sk[nama]"; ?></a></li>
																				<?php
																					}
																				?>
																			</ul>
																		</div><!-- /.col -->
																<?php
																	}
																?>
															</div>
															<!--
															<div class="col-md-12">
																
																	<div class="col-sm-6 col-md-6">
																		<div class="wide-banner cnt-strip">
																			<div class="image">
																				<img class="img-responsive" data-echo="assets/images/banners/4.jpg" src="assets/images/blank.gif" alt="">
																			</div>  
																			<div class="strip">
																				<div class="strip-inner text-right">
																					<h3 class="white">new trend</h3>
																					<h2 class="white">apple product</h2>
																				</div>  
																			</div>
																		</div>
																	</div>
															</div>
															-->
														</div>
													</div>
													<div class="col-sm-4">
														<?php 
															$products=mysql_query("SELECT * FROM produk order by id_produk LIMIT 6");
															while($ps=mysql_fetch_array($products)){?>
															<div class="col-sm-6 col-md-6" style="margin-bottom: 25px;">
																<div class="wide-banner cnt-strip">
																	<div class="image">
																	  <a href="product-<?php echo $ps['id_produk']; ?>-<?php echo $ps['produk_seo']; ?>">
																		<img class="img-responsive" data-echo="well_img/produk/<?php echo $ps['gambar'];  ?>" src="well_img/produk/<?php echo $ps['gambar'];  ?>" alt="">
																	  </a>
																	</div>
																</div><!-- /.wide-banner -->
															</div><!-- /.col -->
														<?php } ?>
													</div>
												</div><!-- /.row -->
					   

												<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
					 
											</div><!-- /.yamm-content -->
										</li>
									</ul>
								</li>
								
								
								
								<li class="dropdown">
									<a href="blog.html">Blog</a>
								</li>
								
								<li class="dropdown">
									<a href="download.html">Download</a>
								</li>
								
								<li class="dropdown">
									<a href="contact-us.html">Contact</a>
								</li>
								
								
								
							</ul><!-- /.navbar-nav -->
							<div class="clearfix"></div>				
						</div><!-- /.nav-outer -->
					</div><!-- /.navbar-collapse -->

				</div><!-- /.nav-bg-class -->
			</div><!-- /.navbar-default -->
		</div><!-- /.container-class -->

	</div><!-- /.header-nav -->
	<!-- ============================================== NAVBAR : END ============================================== -->
