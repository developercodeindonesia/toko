<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_slidegallery/aksi_slidegallery.php";
switch($_GET[act]){
  // Tampil slide
  default:
    echo "<h2>EDIT FOTO GALLERY</h2>
          <input type=button  class=butt value='Tambahkan foto' onclick=location.href='?module=editslidegallery&act=tambah_slide'>
          <table>
          <tr><th>No</th><th>Judul slide</th><th>url</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM new_slidegallery  ORDER BY id DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
      echo "<tr><td>$no</td>
	  <td>$r[judul]</td>
	  <td>$r[url]</td>
	  <td><a href=?module=editslidegallery&act=edit_slide&id=$r[id]>Edit</a> | 
	                  <a href=$aksi?module=editslidegallery&act=hapus&id=$r[id]>Hapus</a>
		        </tr>";
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambah_slide":
    echo "<h2>TAMBAHKAN FOTO</h2>
          <form method=POST action='$aksi?module=editslidegallery&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Judul slide</td><td>  : <input type=text name='judul' size=30></td></tr>
		   <tr><td>URL</td><td>  : <input type=text name='url' size=30></td> </tr>
		   <tr><td>Gambar</td><td> : <input type=file name='fupload' size=40></td></tr>
          <tr><td colspan=2>
		  <p><small> <b>Ukuran foto slide: 758x532px </b></small></p>
		  <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form><br /><br />";
     break;
    
  case "edit_slide":
    $edit = mysql_query("SELECT * FROM new_slidegallery WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>EDIT FOTO</h2>
			
          <form method=POST enctype='multipart/form-data' action=$aksi?module=editslidegallery&act=update>
          <input type=hidden name=id value=$r[id]>
		  
          <table>
		   <tr><td>judul slide</td><td>     : <input type=text name='judul' size=30 value='$r[judul]'></td></tr>
          <tr><td>URl</td><td>     : <input type=text name='url' size=30 value='$r[url]'></td></tr>
          <tr><td>Gambar</td><td>    : <img width=200 src='../joimg/galeri/$r[gambar]'></td></tr>
          <tr><td>Ganti Gambar</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2><p><small> *)<b>Ukuran foto slide: 541x519px , File gambar tipe JPG.</b></small></p></td></tr>
          <tr><td colspan=2><input type=submit class=butt value=Update>
                            <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
