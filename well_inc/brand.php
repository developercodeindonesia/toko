


<h3 class="section-title">Our Brands</h3>
<div class="logo-slider-inner">	
	<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
		
		<?php
		 $tampil=mysql_query("SELECT * FROM brand ORDER BY id_brand ASC");
		while ($r=mysql_fetch_array($tampil)){
		?>
		
			<div class="item m-t-15">
				<a href="brand-<?php echo "$r[seo]"; ?>-<?php echo $r['id_brand'] ?>" class="image">
					<img data-echo="<?php echo "well_img/brand/$r[gambar]"; ?>" src="assets/images/blank.gif" alt="">
				</a>	
			</div><!--/.item-->	
		
		<?php
		}
		?>
	</div><!-- /.owl-carousel #logo-slider -->
</div><!-- /.logo-slider-inner -->