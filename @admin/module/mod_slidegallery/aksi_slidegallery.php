<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus partner
if ($module=='editslidegallery' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM new_slidegallery WHERE id='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM new_slidegallery WHERE id='$_GET[id]'");
    unlink("../../../joimg/galeri/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM new_slidegallery WHERE id='$id'");
	}
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='editslidegallery' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadSlide($nama_file);
    mysql_query("INSERT INTO new_slidegallery(id,judul,
									 url,
									 gambar) 
                            VALUES('$_GET[id]',
									'$_POST[judul]',
									'$_POST[url]',
									'$nama_file')");
  }
  else{
    mysql_query("INSERT INTO new_slidegallery(id,judul,
									 url) 
                            VALUES('$_GET[id]',
									'$_POST[judul]',
									'$_POST[url]')");
  }
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='editslidegallery' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE new_slidegallery SET judul  = '$_POST[judul]',
								  url ='$_POST[url]'
                                  
                             WHERE id = '$_POST[id]'");
  }
  else{
    UploadSlide($nama_file);
    mysql_query("UPDATE new_slidegallery SET  judul  = '$_POST[judul]',
								  url ='$_POST[url]',
                                   gambar = '$nama_file'   
								   
                             WHERE id = '$_POST[id]'");
  }
  header('location:../../page.php?module='.$module);
}
?>
