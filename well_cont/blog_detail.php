<div class="row">
	<div class="blog-page">
		<?php 
			$berita=mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
			$a=mysql_fetch_array($berita);
			$tanggal = date("l, d/m/Y" , strtotime($a['tanggal']));
			$tgl					= strtoupper($tanggal);
		?>
		<div class="col-md-9">
			<div class="blog-post wow fadeInUp">
				<img class="img-responsive" src="<?php echo "well_img/artikel/$a[gambar]"; ?>" alt="">
				<h1><?php echo "$a[nama_berita]"; ?></h1>
				
				<span class="date-time"><?php echo "$tgl"; ?></span>
				
				<p><?php echo "$a[isi_berita]"; ?></p>
				<div class="social-media">
					<span>share post:</span>
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href=""><i class="fa fa-rss"></i></a>
					<a href="" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
				</div>
				
			</div>
		</div>
		
		<?php
			include "well_inc/sidebar_blog.php";
		?>
		
	</div>
</div>