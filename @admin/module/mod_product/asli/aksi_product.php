<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";
include "../../../josys/fungsi_seo.php";
include "../../../josys/fungsi_input.php";
include "../../../josys/watermark.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus partner
if ($module=='product' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT * FROM produk WHERE id_produk='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
    unlink("../../../joimg/produk/$cek[gambar]");   
	
		$gallery=mysql_query("SELECT * FROM gallery WHERE id_produk='$_GET[id]' ");
		while($g=mysql_fetch_array($gallery)){
			if($g['gambar']!=''){
				mysql_query("DELETE FROM gallery WHERE id_produk='$g[id_produk]'");
				unlink("../../../joimg/gallery/$g[gambar]"); 
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
				unlink("../../../joimg/gallery/$g[gambar]"); 
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
	
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file      = $_FILES['fupload']['name'];
	$acak           = rand(000000,999999);
	$nama_file_unik = $acak.$nama_file; 
  
	$judul_seo      = seo_title($_POST[nama]);
	
	$now = date("Y-m-d H:i:s");
  
    if(!empty($lokasi_file)){
  
	UploadProduk($nama_file_unik);
  
    mysql_query("INSERT INTO produk(
									id_kategori,
									id_subkategori,
									id_supplier,
									tgl_masuk,
									nama_produk,
									produk_seo,
									kode,
									detail,
									harga,
									discount,
									special,
									id_catalog,
                                    gambar) 
                            VALUES('$_POST[kat]',
									'$_POST[subkat]',
									'$_POST[supplier]',
									'$now',
									'$_POST[nama]',
                                   '$judul_seo',
                                   '$_POST[kode]',
                                   '$_POST[detail]',
                                   '$_POST[harga]',
                                   '$_POST[discount]',
                                   '$_POST[special]',
                                   '$_POST[catalog]',
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
									id_kategori,
									id_subkategori,
									id_supplier,
									tgl_masuk,
									nama_produk,
									produk_seo,
									kode,
									detail,
									harga,
									discount,
									special,
									id_catalog) 
                            VALUES('$_POST[kat]',
									'$_POST[subkat]',
									'$_POST[supplier]',
									'$now',
									'$_POST[nama]',
                                   '$judul_seo',
                                   '$_POST[kode]',
                                   '$_POST[detail]',
                                   '$_POST[harga]',
                                   '$_POST[discount]',
                                   '$_POST[special]',
                                   '$_POST[catalog]')");
								   
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
	$nama_file_unik = $acak.$nama_file; 
  
	if(!empty($lokasi_file)){
  
	$tampil=mysql_query("SELECT * FROM produk WHERE id_produk='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
		if($ex[gambar] != ''){
		unlink("../../../joimg/produk/$ex[gambar]");
		}
	
	UploadProduk($nama_file_unik);
  
    mysql_query("UPDATE produk SET id_kategori = '$_POST[kategori]',
									id_subkategori = '$_POST[subkat]',
									id_supplier = '$_POST[supplier]',
									nama_produk = '$_POST[nama]',
									produk_seo = '$judul_seo',
									detail = '$_POST[detail]',
									review = '$_POST[review]',
									deskripsi = '$_POST[deskripsi]',
									harga = '$_POST[harga]',
									discount = '$_POST[discount]',
									special = '$_POST[special]',
									type_brg = '$_POST[type_brg]',
									komposisi = '$_POST[komposisi]',
									material = '$_POST[material]',
									finishing = '$_POST[finishing]',
									id_catalog = '$_POST[catalog]',
									gambar			= '$nama_file_unik'
                            WHERE id_produk  = '$_POST[id]'");
							
		mysql_query("DELETE FROM sub_color WHERE id_produk='$_POST[id]'");
		
		$col = $_POST['color'];
		for($i=0; $i<sizeof($col); $i++){
			mysql_query("INSERT INTO sub_color(id_color, id_produk) VALUES ('$col[$i]', '$_POST[id]')");
		}					
		
	}
	else{
	mysql_query("UPDATE produk SET id_kategori = '$_POST[kategori]',
									id_subkategori = '$_POST[subkat]',
									id_supplier = '$_POST[supplier]',
									nama_produk = '$_POST[nama]',
									produk_seo = '$judul_seo',
									detail = '$_POST[detail]',
									review = '$_POST[review]',
									deskripsi = '$_POST[deskripsi]',
									harga = '$_POST[harga]',
									discount = '$_POST[discount]',
									special = '$_POST[special]',
									type_brg = '$_POST[type_brg]',
									komposisi = '$_POST[komposisi]',
									material = '$_POST[material]',
									finishing = '$_POST[finishing]',
									id_catalog = '$_POST[catalog]'
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
