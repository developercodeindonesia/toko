<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus partner
if ($module=='editimages' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM new_images WHERE id='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM new_images WHERE id='$_GET[id]'");
    unlink("../../../joimg/images/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM new_images WHERE id='$id'");
	}
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='editimages' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadImg($nama_file);
    mysql_query("INSERT INTO new_images(id,judul,
									 url,
									 gambar) 
                            VALUES('$_GET[id]',
									'$_POST[judul]',
									'$_POST[url]',
									'$nama_file')");
  }
  else{
    mysql_query("INSERT INTO new_images(id,judul,
									 url) 
                            VALUES('$_GET[id]',
									'$_POST[judul]',
									'$_POST[url]')");
  }
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='editimages' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE new_images SET judul  = '$_POST[judul]',
								  url ='$_POST[url]'
                                  
                             WHERE id = '$_POST[id]'");
  }
  else{
    UploadImg($nama_file);
    mysql_query("UPDATE new_images SET  judul  = '$_POST[judul]',
								  url ='$_POST[url]',
                                   gambar = '$nama_file'   
								   
                             WHERE id = '$_POST[id]'");
  }
  header('location:../../page.php?module='.$module);
}
?>
