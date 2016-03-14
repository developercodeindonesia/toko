<?php
if($_GET['module']=='halamanstatis'){
	
	$sql=mysql_query("SELECT * FROM modul WHERE id_modul='$_GET[id]' ");
	$s=mysql_fetch_array($sql);
?>
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="index.html">Home</a></li>
					<li class='active'><?php echo "$s[nama_modul]"; ?></li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->
<?php
}elseif($_GET['module']=='blog'){
?>	
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="index.html">Home</a></li>
					<li class='active'>Blog</li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->
	
<?php
}elseif($_GET['module']=='download'){
?>	
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="index.html">Home</a></li>
					<li class='active'>Download</li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->
<?php
}elseif($_GET['module']=='detail_blog'){
	$berita=mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
	$b=mysql_fetch_array($berita);
?>	
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="index.html">Home</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li class='active'><?php echo "$b[nama_berita]"; ?></li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->
<?php
}elseif($_GET['module']=='cari_blog'){
?>	
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="index.html">Home</a></li>
					<li class='active'>Blog Search</li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->
<?php
}elseif($_GET['module']=='formkontak'){
?>	
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="index.html">Home</a></li>
					<li class='active'>Contact Us</li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->
<?php
}elseif($_GET['module']=='all_produk'){
?>	
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="index.html">Home</a></li>
					<li class='active'>All Product</li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->
<?php
}elseif($_GET['module']=='produk_detail'){
	$prod = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
	$p = mysql_fetch_array($prod);
	
	$kat=mysql_query("SELECT * FROM subkategori WHERE id_subkategori='$p[id_subkategori]'");
	$k=mysql_fetch_array($kat);
	
	$subkat=mysql_query("SELECT * FROM subsub_kategori WHERE id_subsub='$p[id_subsub]'");
	$sk=mysql_fetch_array($subkat);
?>	
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li style="margin-left:-2px;"><a href="index.html">Home</a></li>
					<li style="margin-left:-2px;"><a href="kategori-<?php echo $k['seo'] ?>-<?php echo $k['id_subkategori'] ?>"><?php echo "tes 1"; ?></a></li>
					<li style="margin-left:-2px;"><a href="subkategori-<?php echo $sk['seo'] ?>-<?php echo $k['id_subsub'] ?>"><?php echo "$sk[nama]"; ?></a></li>
					<li class='active'><?php echo "$p[nama_produk]"; ?></li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->
<?php
}
?>