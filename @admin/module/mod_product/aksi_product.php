<?php
include "../../../well_sys/koneksi.php";
include "../../../well_sys/library.php";
include "../../../well_sys/fungsi_thumb.php";
include "../../../well_sys/fungsi_seo.php";
include "../../../well_sys/fungsi_input.php";
include "../../../well_sys/watermark.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus partner
if ($module=='product' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT * FROM produk WHERE id_produk='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
    unlink("../../../well_img/produk/$cek[gambar]");   
	
		$gallery=mysql_query("SELECT * FROM gallery WHERE id_produk='$_GET[id]' ");
		while($g=mysql_fetch_array($gallery)){
			if($g['gambar']!=''){
				mysql_query("DELETE FROM gallery WHERE id_produk='$g[id_produk]'");
				unlink("../../../well_img/gallery/$g[gambar]"); 
			}else{
				mysql_query("DELETE FROM gallery WHERE id_produk='$g[id_produk]'");
			}
		}
		
		mysql_query("DELETE FROM sub_color WHERE id_produk='$_GET[id]'");
	
  } else { 
	mysql_query("DELETE FROM produk WHERE id_produk='$id'");   
	
		$gallery=mysql_query("SELECT * FROM gallery WHERE id_produk='$_GET[id]' ");
		while($g=mysql_fetch_array($gallery)){
			if($g['gambar']!=''){
				mysql_query("DELETE FROM gallery WHERE id_produk='$g[id_produk]'");
				unlink("../../../well_img/gallery/$g[gambar]"); 
			}else{
				mysql_query("DELETE FROM gallery WHERE id_produk='$g[id_produk]'");
			}
		}
		
		mysql_query("DELETE FROM sub_color WHERE id_produk='$_GET[id]'");
		
	}
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='product' AND $act=='input'){
	
	$lokasi_file    		= $_FILES['fupload']['tmp_name'];
	$tipe_file     		= $_FILES['fupload']['type'];
	$nama_file      	= $_FILES['fupload']['name'];
	$acak				= rand(000000,999999);
	$web					= "fortuna_";
	$nama_file_unik 	= $web.$acak.$nama_file; 
  
	$judul_seo      = seo_title($_POST['nama']);
	
	$now = date("Y-m-d H:i:s");
  
    if(!empty($lokasi_file)){
  
	UploadProduk($nama_file_unik);
	///watermark_image("../../../well_img/produk/$nama_file_unik", "../../../well_img/produk/$nama_file_unik");
	
    mysql_query("INSERT INTO produk(
									id_subkategori,
									id_subsub,
									id_brand,
									tgl_masuk,
									nama_produk,
									produk_seo,
									kode,
									harga,
									berat,
									garansi,
									stok,
									detail,
									discount,
									special,
									tampil_depan,
									deals,
									featured,
									best,
                                    gambar) 
                            VALUES(
									'$_POST[subkategori]',
									'$_POST[subsub]',
									'$_POST[brand]',
									'$now',
									'$_POST[nama]',
									'$judul_seo',
									'$_POST[kode]',
									'$_POST[harga]',
									'$_POST[berat]',
									'$_POST[garansi]',
									'$_POST[stok]',
									'$_POST[detail]',
									'$_POST[discount]',
									'$_POST[special]',
									'$_POST[tampil_depan]',
									'$_POST[deals]',
									'$_POST[featured]',
									'$_POST[best]',
									'$nama_file_unik')");
								   
		$sql=mysql_query("SELECT * FROM produk WHERE tgl_masuk='$now'");
		$s=mysql_fetch_array($sql);
		
		$col = $_POST['color'];
		for($i=0; $i<sizeof($col); $i++){
			mysql_query("INSERT INTO sub_color(id_color, id_produk) VALUES ('$col[$i]', '$s[id_produk]')");
		}
	
	}
	else{
	mysql_query("INSERT INTO produk(
									id_subkategori,
									id_subsub,
									id_brand,
									tgl_masuk,
									nama_produk,
									produk_seo,
									kode,
									harga,
									berat,
									garansi,
									stok,
									detail,
									discount,
									special,
									tampil_depan,
									deals,
									featured,
									best) 
								VALUES(
									'$_POST[subkategori]',
									'$_POST[subsub]',
									'$_POST[brand]',
									'$now',
									'$_POST[nama]',
									'$judul_seo',
									'$_POST[kode]',
									'$_POST[harga]',
									'$_POST[berat]',
									'$_POST[garansi]',
									'$_POST[stok]',
									'$_POST[discount]',
									'$_POST[special]',
									'$_POST[tampil_depan]',
									'$_POST[deals]',
									'$_POST[featured]',
									'$_POST[best]' )");
								   
		$sql=mysql_query("SELECT * FROM produk WHERE tgl_masuk='$now'");
		$s=mysql_fetch_array($sql);
		
		$col = $_POST['color'];
		for($i=0; $i<sizeof($col); $i++){
			mysql_query("INSERT INTO sub_color(id_color, id_produk) VALUES ('$col[$i]', '$s[id_produk]')");
		}
	}
  
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='product' AND $act=='update'){
	$judul_seo      = seo_title($_POST[nama]);
  
    $lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$web					= "fortuna_";
	$nama_file_unik 	= $web.$acak.$nama_file; 
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM produk WHERE id_produk='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex[gambar] != ''){
		unlink("../../../well_img/produk/$ex[gambar]");
		}
	
	UploadProduk($nama_file_unik);
	//watermark_image("../../../well_img/produk/$nama_file_unik", "../../../well_img/produk/$nama_file_unik");
	
    mysql_query("UPDATE produk SET 
									id_subkategori = '$_POST[subkategori]',
									id_subsub = '$_POST[subsub]',
									id_brand = '$_POST[brand]',
									nama_produk = '$_POST[nama]',
									produk_seo = '$judul_seo',
									kode = '$_POST[kode]',
									harga = '$_POST[harga]',
									berat = '$_POST[berat]',
									garansi = '$_POST[garansi]',
									stok = '$_POST[stok]',
									detail = '$_POST[detail]',
									discount = '$_POST[discount]',
									special = '$_POST[special]',
									tampil_depan = '$_POST[tampil_depan]',
									deals = '$_POST[deals]',
									featured = '$_POST[featured]',
									best = '$_POST[best]',
									gambar			= '$nama_file_unik'
                            WHERE id_produk  = '$_POST[id]'");
							
		mysql_query("DELETE FROM sub_color WHERE id_produk='$_POST[id]'");
		
		$col = $_POST['color'];
		for($i=0; $i<sizeof($col); $i++){
			mysql_query("INSERT INTO sub_color(id_color, id_produk) VALUES ('$col[$i]', '$_POST[id]')");
		}					
		
	}
	else{
	mysql_query("UPDATE produk SET 
									id_subkategori = '$_POST[subkategori]',
									id_subsub = '$_POST[subsub]',
									id_brand = '$_POST[brand]',
									nama_produk = '$_POST[nama]',
									produk_seo = '$judul_seo',
									kode = '$_POST[kode]',
									harga = '$_POST[harga]',
									berat = '$_POST[berat]',
									garansi = '$_POST[garansi]',
									stok = '$_POST[stok]',
									detail = '$_POST[detail]',
									discount = '$_POST[discount]',
									special = '$_POST[special]',
									tampil_depan = '$_POST[tampil_depan]'
									deals = '$_POST[deals]',
									featured = '$_POST[featured]',
									best = '$_POST[best]'
                            WHERE id_produk  = '$_POST[id]'");
							
		mysql_query("DELETE FROM sub_color WHERE id_produk='$_POST[id]'");
		
		$col = $_POST['color'];
		for($i=0; $i<sizeof($col); $i++){
			mysql_query("INSERT INTO sub_color(id_color, id_produk) VALUES ('$col[$i]', '$_POST[id]')");
		}		
		
	}
  header('location:../../page.php?module='.$module);
}
?>
