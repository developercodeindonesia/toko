<div class="col-md-3 sidebar">
	<div class="sidebar-module-container">
		<div class="search-area outer-bottom-small">
			<form method="POST" action="searching-blog.html">
				<div class="control-group">
					<input type="text" name="cari" placeholder="Search blog" class="search-field" required>
					<a href="searching-blog.html" type="submit" class="search-button"></a>   
				</div>
			</form>
		</div>						
		
		<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
			<h3 class="section-title">blog widget</h3>
			<ul class="nav nav-tabs">
			  <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
			  <li><a href="#recent" data-toggle="tab">recent post</a></li>
			</ul>
			<div class="tab-content">
			   <div class="tab-pane active m-t-20" id="popular">
					<?php
					$sql22 = mysql_query("SELECT * FROM berita ORDER by id_berita DESC LIMIT 5");
					while($a=mysql_fetch_array($sql22)){
						$tanggal = date("l, d/m/Y" , strtotime($a['tanggal']));
						$tgl					= strtoupper($tanggal);
						$isi 					= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$a['isi_berita'])));			
						$isi					= substr($isi,0,strrpos(substr($isi,0,125)," "));
					?>
						<div class="blog-post inner-bottom-30 " >
							<img class="img-responsive" src="<?php echo "well_img/artikel/$a[gambar]"; ?>" alt="">
							<h4><a href="<?php echo "blog-$a[id_berita]-$a[seo].html"; ?>"><?php echo "$a[nama_berita]"; ?></a></h4>							
								<span class="date-time"><?php echo "$tgl"; ?></span>
								<p><?php echo "$isi"; ?></p>
						</div>
					<?php
					}
					?>
				</div>

				<div class="tab-pane m-t-20" id="recent">
					
					<?php
					$sql22 = mysql_query("SELECT * FROM berita ORDER by id_berita DESC LIMIT 5");
					while($a=mysql_fetch_array($sql22)){
						$tanggal = date("l, d/m/Y" , strtotime($a['tanggal']));
						$tgl					= strtoupper($tanggal);
						$isi 					= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$a['isi_berita'])));			
						$isi					= substr($isi,0,strrpos(substr($isi,0,125)," "));
					?>
						<div class="blog-post inner-bottom-30 " >
							<img class="img-responsive" src="<?php echo "well_img/artikel/$a[gambar]"; ?>" alt="">
							<h4><a href="<?php echo "blog-$a[id_berita]-$a[seo].html"; ?>"><?php echo "$a[nama_berita]"; ?></a></h4>							
								<span class="date-time"><?php echo "$tgl"; ?></span>
								<p><?php echo "$isi"; ?></p>
						</div>
					<?php
					}
					?>
					
				</div>
			</div>
		</div>
		
	</div>
</div>