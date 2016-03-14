<?php

include "../well_sys/koneksi.php";
include "../well_sys/library.php";
include "../well_sys/fungsi_combobox.php";
include "../well_sys/fungsi_amerikatgl.php";
include "../well_sys/class_paging.php";
include "../well_sys/fungsi_rupiah.php";

// Bagian Home
if ($_GET['module']=='home')
{?>
	<div class='box-header clear'>
		<h2>Welcome</h2>
		</div>
		<div class="box-body clear">
          <p>&nbsp;&nbsp;&nbsp;&nbsp;* Welcome Admin, click the left menu to change the content. </p>
		<p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modul Administrator</b> <br> 
          	<a href="panduan/panduan_nikita.pdf"><img src="images/download_paduan.png" alt="" class="icon" width=100 style="border: 1px solid #999999;margin-left: 25px; margin-top:13px;"/></a>
		
			<?php
					error_reporting(0);
					  // Statistik user
					  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
					  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
					  $waktu   = time(); // 

					  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
					  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
					  // Kalau belum ada, simpan data user tersebut ke database
					  if(mysql_num_rows($s) == 0){
					  } 
					  else{
					  }

					  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
					  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
					  $hits             = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik WHERE tanggal='$tanggal'"), 0); 
					  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					  $bataswaktu       = time() - 300;
					  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

					  $path = "joinc/counter/";
					  $ext = ".png";

					  $tothitsgbr = sprintf("%06d", $tothitsgbr);
					  for ( $i = 0; $i <= 9; $i++ ){
						   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
					  }

					?>
				<h3>Visitor Website</h3>
				<table style="width:30%; font-weight:bold; font-size:24px; float:left; margin:10px">
					<tr><td width="150px">Today</td><td></td><td></td></tr>
					<tr><td width="150px">Visits</td><td>:</td><td width="50px"><?php echo"$pengunjung"; ?></td></tr>
					<tr><td width="150px">Views</td><td>:</td><td width="50px"><?php echo"$hits"; ?></td></tr>
				</table>
				<table style="width:30%; font-weight:bold; font-size:24px; float:left; margin:10px">
					<tr><td width="150px">All Time</td><td></td><td></td></tr>
					<tr><td width="150px">Visits</td><td>:</td><td width="50px"><?php echo"$totalpengunjung"; ?></td></tr>
					<tr><td width="150px">Views</td><td>:</td><td width="50px"><?php echo"$totalhits"; ?></td></tr>
				</table>
				
				
		
	</div>
<?php
}

//modul about
elseif ($_GET['module']=='about'){
    include "module/mod_about/about.php";
}

//modul about
elseif ($_GET['module']=='brand'){
    include "module/mod_brand/brand.php";
}

//modul about
elseif ($_GET['module']=='cs'){
    include "module/mod_cs/cs.php";
}

//modul about
elseif ($_GET['module']=='cs2'){
    include "module/mod_cs2/cs2.php";
}

//modul about
elseif ($_GET['module']=='email'){
    include "module/mod_email/email.php";
}

//modul about
elseif ($_GET['module']=='beli'){
    include "module/mod_beli/beli.php";
}

//modul about
elseif ($_GET['module']=='opening'){
    include "module/mod_opening/opening.php";
}

//modul about
elseif ($_GET['module']=='desk'){
    include "module/mod_desk/desk.php";
}

//modul career
elseif ($_GET['module']=='career'){
    include "module/mod_career/career.php";
}

//modul kategori
elseif ($_GET['module']=='kategori'){
    include "module/mod_kategori/kategori.php";
}

//modul halaman
elseif ($_GET['module']=='gambar'){
    include "module/mod_kategori/gambar.php";
}

//modul download
elseif ($_GET['module']=='download'){
    include "module/mod_download/download.php";
}

//modul parent kategori
elseif ($_GET['module']=='parentkategori'){
    include "module/mod_parentkategori/parentkategori.php";
}

//modul kategori
elseif ($_GET['module']=='subkategori'){
    include "module/mod_subkategori/subkategori.php";
}

//modul subscribe
elseif ($_GET['module']=='subscribe'){
    include "module/mod_subscribe/subscribe.php";
}

//modul fanpage
elseif ($_GET['module']=='fanpage'){
    include "module/mod_fanpage/fanpage.php";
}

//modul pengiriman
elseif ($_GET['module']=='pengiriman'){
    include "module/mod_pengiriman/pengiriman.php";
}

//modul title
elseif ($_GET['module']=='title'){
    include "module/mod_title/title.php";
}

//modul Description
elseif ($_GET['module']=='description'){
    include "module/mod_description/description.php";
}

//modul Keyword
elseif ($_GET['module']=='keyword'){
    include "module/mod_keyword/keyword.php";
}



//modul location
elseif ($_GET['module']=='location'){
    include "module/mod_location/location.php";
}

//modul location
elseif ($_GET['module']=='custom_link'){
    include "module/mod_custom_link/custom_link.php";
}


//modul contact
elseif ($_GET['module']=='contact'){
    include "module/mod_contact/contact.php";
}

//modul dilivery
elseif ($_GET['module']=='delivery'){
    include "module/mod_delivery/delivery.php";
}

//modul customer
elseif ($_GET['module']=='customer'){
    include "module/mod_customer/customer.php";
}

//modul help
elseif ($_GET['module']=='help'){
    include "module/mod_help/help.php";
}

//modul faq
elseif ($_GET['module']=='faq'){
    include "module/mod_faq/faq.php";
}

//modul supplier
elseif ($_GET['module']=='supplier'){
    include "module/mod_supplier/supplier.php";
}

//modul color
elseif ($_GET['module']=='color'){
    include "module/mod_color/color.php";
}

//modul catalog
elseif ($_GET['module']=='catalog'){
    include "module/mod_catalog/catalog.php";
}

//modul galery
elseif ($_GET['module']=='gallery'){
    include "module/mod_gallery/gallery.php";
}

//modul product
elseif ($_GET['module']=='product'){
    include "module/mod_product/product.php";
}

//modul ordermasuk
elseif ($_GET['module']=='ordermasuk'){
    include "module/mod_ordermasuk/ordermasuk.php";
}

//modul ordercomplete
elseif ($_GET['module']=='ordercomplete'){
    include "module/mod_ordercomplete/ordercomplete.php";
}

//modul berita
elseif ($_GET['module']=='berita'){
    include "module/mod_berita/berita.php";
}

//modul memberarea
elseif ($_GET['module']=='member'){
    include "module/mod_memberarea/member.php";
}

//modul slide
elseif ($_GET['module']=='slide'){
    include "module/mod_slide/slide.php";
}

//modul sosial
elseif ($_GET['module']=='sosial'){
    include "module/mod_sosial/sosial.php";
}

//modul pesan
elseif ($_GET['module']=='pesan'){
    include "module/mod_pesan/pesan.php";
}


//modul banner
elseif ($_GET['module']=='banner'){
    include "module/mod_banner/banner.php";
}

//modul banner
elseif ($_GET['module']=='advertise'){
    include "module/mod_advertise/advertise.php";
}

//modul confirmation
elseif ($_GET['module']=='confirmation'){
    include "module/mod_confirmation/confirmation.php";
}

//modul users
elseif ($_GET['module']=='users'){
    include "module/mod_users/users.php";
}
// Apabila modul tidak ditemukan
else{
  echo "<p><b></b></p>";
}
?>