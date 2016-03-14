	<div class="row  outer-bottom-vs">
		<div class="blog-page">
			<div class="col-md-9">
				
				<?php
					$cari = $_POST['cari'];
					if(isset($cari))
					{
						if(!empty($cari))
						{ 
								$berita="SELECT * FROM berita WHERE  nama_berita LIKE '%" . $cari . "%' OR isi_berita LIKE '%" . $cari  ."%' ";
								
								$result=mysql_fetch_array(mysql_query($berita));
								
								if(!empty($result)){
									echo "<div class='alert alert-success'>Hasil Pencarian dari <b>&quot; $cari &quot;</b></div>";
								
									$ber = mysql_query($berita);
									while($a = mysql_fetch_array($ber)){
										$tanggal	= date("l, d/m/Y" , strtotime($a['tanggal']));
										$tgl		= strtoupper($tanggal);
										$isi		= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$a['isi_berita'])));			
										$isi		= substr($isi,0,strrpos(substr($isi,0,350)," "));
				?>					
										<div class="blog-post  wow fadeInUp">
											<a href="<?php echo "blog-$a[id_berita]-$a[seo].html"; ?>">
												<img class="img-responsive" src="<?php echo "well_img/artikel/$a[gambar]"; ?>" alt="">
											</a>
											<h1><a href="<?php echo "blog-$a[id_berita]-$a[seo].html"; ?>"><?php echo "$a[nama_berita]"; ?></a></h1>
												<span class="date-time"><?php echo "$tgl"; ?></span>
												<p><?php echo "$isi"; ?>...</p>
												<a href="<?php echo "blog-$a[id_berita]-$a[seo].html"; ?>" class="btn btn-upper btn-primary read-more">read more</a>
										</div>
										
										<div class="clearfix blog-pagination filters-container  wow fadeInUp outer-top-bd">
											<div class="text-right">
												 <div class="pagination-container">
													<ul class="list-inline list-unstyled">
														<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
														<li><a href="#">1</a></li>	
														<li class="active"><a href="#">2</a></li>	
														<li><a href="#">3</a></li>	
														<li><a href="#">4</a></li>	
														<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
													</ul><!-- /.list-inline -->
												</div><!-- /.pagination-container --> 
											</div><!-- /.text-right -->
										</div><!-- /.filters-container -->
										
				<?php 
									}
								}
								else
								{
									echo "<div class='alert alert-warning'><b>Maaf.</b> Tidak ditemukan data yang sesuai dengan kata <b>&quot; $cari &quot;</b>. </div>";
								}			
							 
						}
						else
						{
								echo  "<div class='alert alert-warning'><b>Sorry. </b>Please enter a search query</div>";
						}
					}
					else
					{
						echo  "<div class='alert alert-warning' ><b>Sorry. </b>Please enter a search query</div>";
					}
					?>
				
				
			</div>
			
			<?php
				include "well_inc/sidebar_blog.php";
			?>
			
		</div>
	</div>