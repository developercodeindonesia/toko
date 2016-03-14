<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_facilities/aksi_facilities.php";
switch($_GET[act]){
  // Tampil slide
  default:
    echo "<h2>EDIT facilities</h2>
          <input type=button  class=butt value='Tambahkan facilities' onclick=location.href='?module=editfacilities&act=tambah_facilities'>
          <table>
          <tr><th>No</th><th>nama facilities</th><th>Thumbnail</th><th>&nbsp;</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM facilities  ORDER BY id DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
      echo "<tr><td>$no</td>
	  <td>$r[judul]</td>
	  
	  <td width=60%><p align='justify'><img width='150px' src='../joimg/facilities/$r[gambar]'></p></td><td>&nbsp;</td>
	  <td ><a href=?module=editfacilities&act=edit_slide&id=$r[id]>Edit</a> | 
	                  <a href=$aksi?module=editfacilities&act=hapus&id=$r[id]>Hapus</a>
		        </tr>";
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambah_facilities":
    echo "<h2>Tambahkan facilities</h2>
          <form method=POST action='$aksi?module=editfacilities&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>nama facilities</td><td>  : <input type=text name='judul' size=30></td></tr>
		   <tr><td>keterangan</td><td>  :<textarea name='keterangan' id='jogmce'></textarea></td> </tr>
		   <tr><td>Gambar</td><td> : <input type=file name='fupload' size=40></td></tr>
          <tr><td colspan=2>
		  		  <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form><br /><br />";
     break;
    
  case "edit_slide":
    $edit = mysql_query("SELECT * FROM facilities WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit facilities</h2>
			
          <form method=POST enctype='multipart/form-data' action=$aksi?module=editfacilities&act=update>
          <input type=hidden name=id value=$r[id]>
		  
          <table>
		   <tr><td>nama facilities</td><td>     : <input type=text name='judul' size=30 value='$r[judul]'></td></tr>
          <tr><td>keterangan</td><td>     : <textarea name='keterangan' id='jogmce'>$r[keterangan]</textarea></td></tr>
          <tr><td>Gambar</td><td>    : <img width=200 src='../joimg/facilities/$r[gambar]'></td></tr>
          <tr><td>Ganti Gambar</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
                    <tr><td colspan=2><input type=submit class=butt value=Update>
                            <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
