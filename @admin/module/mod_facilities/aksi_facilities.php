<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";
include "../../../josys/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus partner
if ($module=='editfacilities' AND $act=='hapus'){

	$id = $_GET['id'];
	$gbr= $_GET['file'];

	$cek = mysql_fetch_array(mysql_query("SELECT gambar FROM facilities WHERE id='$id'"));
	if($cek['gambar']!=''){
	mysql_query("DELETE FROM facilities WHERE id='$_GET[id]'");
    unlink("../../../joimg/facilities/$cek[gambar]");   
  } else { 
	mysql_query("DELETE FROM facilities WHERE id='$id'");
	}
	
	header('location:../../page.php?module='.$module);
}

// Input header
elseif ($module=='editfacilities' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    Uploadfacilities($nama_file);
    mysql_query("INSERT INTO facilities(id,judul,
									 keterangan,
									 gambar) 
                            VALUES('$_GET[id]',
									'$_POST[judul]',
									'$_POST[keterangan]',
									'$nama_file')");
  }
  else{
    mysql_query("INSERT INTO facilities(id,judul,
									 keterangan) 
                            VALUES('$_GET[id]',
									'$_POST[judul]',
									'$_POST[keterangan]')");
  }
  header('location:../../page.php?module='.$module);
}

// Update header
elseif ($module=='editfacilities' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE facilities SET judul  = '$_POST[judul]',
								  keterangan ='$_POST[keterangan]'
                                  
                             WHERE id = '$_POST[id]'");
  }
  else{
    Uploadfacilities($nama_file);
    mysql_query("UPDATE facilities SET  judul  = '$_POST[judul]',
								  keterangan ='$_POST[keterangan]',
                                   gambar = '$nama_file'   
								   
                             WHERE id = '$_POST[id]'");
  }
  header('location:../../page.php?module='.$module);
}
?>
