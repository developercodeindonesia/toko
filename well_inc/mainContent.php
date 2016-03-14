<?php 
if($_GET['module']=='home') { 
	include("well_cont/home.php");
}

//mod statis
elseif($_GET['module']=='halamanstatis') {
	
	$sql=mysql_query("SELECT * FROM modul WHERE id_modul='$_GET[id]' ");
	$s=mysql_fetch_array($sql);

?>		
		<div class="col-md-12 terms-conditions">
			<h2><?php echo "$s[nama_modul]"; ?></h2>
			<div class="inner-top-sm" style="padding-top: 25px;">
				<p>
					<?php
						echo "$s[static_content]";
					?>
				</p>
			</div>
		</div>
<?php
}

//testimonial
elseif($_GET['module']=='testimonial') {
	include "well_cont/testi.php"; 
}

//konfirmasi bayar
elseif($_GET['module']=='konfirmasi-bayar') {
	include "well_cont/konfirmasi-bayar.php"; 
}

//semua merek
elseif($_GET['module']=='semua-merek') {
	include "well_cont/semua-merek.php"; 
}

//cara berjualan
elseif($_GET['module']=='cara-berjualan') {
	include "well_cont/cara-berjualan.php"; 
}

//kesan penjual
elseif($_GET['module']=='kesan-penjual') {
	include "well_cont/kesan-penjual.php"; 
}
//////////////////////////////////////////////////////////////// BLOG
elseif($_GET['module']=='blog') {
	include "well_cont/blog.php";
}

//mod detail blog
elseif($_GET['module']=='detail_blog') {
	include "well_cont/blog_detail.php";
}

//mod search blog
elseif($_GET['module']=='cari_blog') {
	include "well_cont/blog_search.php";
}

////////////////////////////////////////////////////////////////// PRODUK
elseif($_GET['module']=='all_produk') {
	include "well_cont/product_all.php";
}

elseif($_GET['module']=='produk_detail') {
	include "well_cont/produk_detail.php";
}
////////////////////////////////////////////////////////////////// KONTAK
elseif($_GET['module']=='formkontak') {
	include("well_cont/form_kontak.php"); 
}

elseif($_GET['module']=='kontak') {
	include("well_cont/kontak.php"); 
}

elseif($_GET['module']=='allGallery') {
	include("joinc/album.php"); 
}

elseif($_GET['module']=='detailGallery') {
	include("joinc/album_galeri.php"); 
}
////////////////////////////////////////////////////////////// KATEGORI & SUBKATEGORI
elseif($_GET['module']=='kategori_prod') {
	include("well_cont/kategori_produk.php"); 
}

elseif($_GET['module']=='subkategori_prod') {
	include("well_cont/subkategori_produk.php"); 
}

elseif($_GET['module']=='detail_brand') {
	include("well_cont/detail_brand.php"); 
}

elseif($_GET['module']=='detail_brand_kategori') {
	include("well_cont/detail_brand_kategori.php"); 
}
////////////////////////////////////////////////////////////// DOWNLOAD
elseif($_GET['module']=='download') {
	include("well_cont/download.php"); 
}
////////////////////////////////////////////////////////////// PENCARIAN BY KATEGORI
elseif($_GET['module']=='form_cari') {
	include("well_cont/hasil_cari.php"); 
}
////////////////////////////////////////////////////////// CART
elseif($_GET['module']=='cart') {
	include("well_cont/cart.php"); 
}

elseif($_GET['module']=='checkout') {
	include("well_cont/guest.php"); 
}

elseif($_GET['module']=='orders') {
	include("well_cont/orders.php"); 
}
////////////////////////////////////////////////////////////KONFIRMASI PEMBAYARAN

elseif($_GET['module']=='confirm') {
	include("well_cont/addconf.php"); 
}
?>