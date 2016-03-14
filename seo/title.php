<?php

$sql=mysql_query("SELECT static_content FROM modul WHERE id_modul = '14' ");
$s=mysql_fetch_array($sql);

$default = trim($s['static_content']) ;

	if($_GET['module']=='home')
	{
		echo "$default";
	}
	
	else if($_GET['module']=='halamanstatis')
	{
		$sql=mysql_query("SELECT nama_modul FROM modul WHERE id_modul ='$_GET[id]' ");
		$s=mysql_fetch_array($sql);
		
			echo "$s[nama_modul] | $default";
	}
	
	//////////////////// BLOG ARTIKEL ///////////////////
	else if($_GET['module']=='blog')
	{
		echo "Blog | $default";
	}
	
	else if($_GET['module']=='detail_blog')
	{
		$berita=mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
		$a=mysql_fetch_array($berita);
		
		echo "$a[nama_berita] | $default";
	}
	
	else if($_GET['module']=='cari_blog')
	{
		echo "Search Result | $default";
	}
	
	/////////////////////// KONTAK //////////////////////////////
	else if($_GET['module']=='formkontak')
	{
		echo "Contact Form | $default";
	}
	
	else if($_GET['module']=='orders_finish')
	{
		echo "Pemesanan | $default";
	}
	
	else if($_GET['module']=='cara_order')
	{
		echo "Cara Pesan | $default";
	}
	
	else if($_GET['module']=='product_result')
	{
		echo "Cari Produk | $default";
	}
	
	/////////////////// PRODUK ////////////////////////////////////////////
	else if($_GET['module']=='all_produk')
	{
		echo "All Produk | $default";
	}
	
	else if($_GET['module']=='detail_product')
	{
		$edit=mysql_query("SELECT * FROM produk WHERE id_produk = '$_GET[id]' ");
		$r=mysql_fetch_array($edit);
		
		echo "$r[nama] | $default";
	}
	
	else if($_GET['module']=='product_category')
	{
		$edit=mysql_query("SELECT * FROM kategori WHERE id_kategori = '$_GET[id]' ");
		$r=mysql_fetch_array($edit);
		
		echo "$r[nama] | $default";
	}
	
	else {
	
		echo "$default";
	}

?>
