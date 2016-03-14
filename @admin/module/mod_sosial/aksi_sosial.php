<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
	else{
	include "../../../josys/koneksi.php";
	include "../../../josys/fungsi_thumb.php";

	$module=$_GET['module'];
	$act=$_GET['act'];

	// Update sosial
	if ($module=='sosial' AND $act=='update'){
		
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
		
		if(!empty($lokasi_file)){	  
			$tampil=mysql_query("SELECT * FROM sosial WHERE id_sosial='$_POST[id]'");
			$ex=mysql_fetch_array($tampil);
			if($ex['gambar'] != ''){
				unlink("../../../joimg/sosmed/$ex[gambar]");
			}
		
		UploadSosmed($nama_file_unik);
		
		mysql_query("UPDATE sosial SET 	judul 	= '$_POST[judul]',
										link 	= '$_POST[link]',
										gambar	= '$nama_file_unik'
								WHERE id_sosial		= '$_POST[id]'");
		
		} else{
			mysql_query("UPDATE sosial SET 	judul 	= '$_POST[judul]',
											link	= '$_POST[link]'
									WHERE id_sosial  = '$_POST[id]'");
		}
		
	  header('location:../../page.php?module='.$module);
	}
	// Update Hapus Message
	if ($module=='sosial' AND $act=='hapus'){
		$tampil=mysql_query("SELECT * FROM sosial WHERE id_sosial='$_GET[id]'");
		$ex=mysql_fetch_array($tampil);
		
		if($ex['gambar'] != ''){
			unlink("../../../joimg/sosmed/$ex[gambar]");
		mysql_query("DELETE FROM sosial WHERE id_sosial='$_GET[id]'");
		
		}else {
		
		mysql_query("DELETE FROM sosial WHERE id_sosial='$_GET[id]'");
		}
	  header('location:../../page.php?module='.$module);
	}
	
	// Update Tambah sosial
	if ($module=='sosial' AND $act=='insertnew'){	  
		
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$acak           = rand(000000,999999);
		$nama_file_unik = $acak.$nama_file; 
		
		if(!empty($lokasi_file)){	  
			UploadSosmed($nama_file_unik);
		
		mysql_query("INSERT INTO sosial(judul,
										gambar,
										link) 
								VALUES('$_POST[judul]',
										'$nama_file_unik',
										'$_POST[link]')");
		
		}else{
		
		mysql_query("INSERT INTO sosial(judul,
										link) 
								VALUES('$_POST[nama]',
										'$_POST[link]')");
		}
		
		header('location:../../page.php?module='.$module);
	}

}
?>
