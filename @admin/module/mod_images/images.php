<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_images/aksi_images.php";
switch($_GET[act]){
  // Tampil slide
  default:
    echo "<h2>EDIT IMAGES</h2>
          <input type=button  class=butt value='Tambahkan Images' onclick=location.href='?module=editimages&act=tambah_images'>
          <table>
          <tr><th>No</th><th>Judul image</th><th>url</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM new_images  ORDER BY id DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
      echo "<tr><td>$no</td>
	  <td>$r[judul]</td>
	  <td>$r[url]</td>
	  <td><a href=?module=editimages&act=edit_images&id=$r[id]>Edit</a> | 
	                  <a href=$aksi?module=editimages&act=hapus&id=$r[id]>Hapus</a>
		        </tr>";
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambah_images":
    echo "<h2>TAMBAHKAN IMAGES</h2>
          <form method=POST action='$aksi?module=editimages&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Judul Images</td><td>  : <input type=text name='judul' size=30></td></tr>
		   <tr><td>URL</td><td>  : <input type=text name='url' size=30></td> </tr>
		   <tr><td>Gambar</td><td> : <input type=file name='fupload' size=40></td></tr>
          <tr><td colspan=2>
		   <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form><br /><br />";
     break;
    
  case "edit_images":
    $edit = mysql_query("SELECT * FROM new_images WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>EDIT IMAGES</h2>
			
          <form method=POST enctype='multipart/form-data' action=$aksi?module=editimages&act=update>
          <input type=hidden name=id value=$r[id]>
		  
          <table>
		   <tr><td>judul Images</td><td>     : <input type=text name='judul' size=30 value='$r[judul]'></td></tr>
          <tr><td>URl</td><td>     : <input type=text name='url' size=30 value='$r[url]'></td></tr>
          <tr><td>Gambar</td><td>    : <img width=200 src='../joimg/images/$r[gambar]'></td></tr>
          <tr><td>Ganti Gambar</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2><p><small> *)<b>Ukuran foto Images: 800x650px , File gambar tipe JPG.</b></small></p></td></tr>
          <tr><td colspan=2><input type=submit class=butt value=Update>
                            <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
