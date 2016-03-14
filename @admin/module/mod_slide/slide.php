<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_slide/aksi_slide.php";
switch($_GET[act]){
  // Tampil slide
  default:
    echo "<h2>EDIT slide PRODUK</h2>
          <input type=button  class=butt value='Tambahkan slide' onclick=location.href='?module=slide&act=tambah_slide'>
          <table id='exampless' class='display' cellspacing='0' width='100%'>
          <thead style='background: #9B9B9B;'><tr><th>No</th><th>Judul</th><th>Thumbnail</th><th>Aksi</th></tr></thead><tbody>";
    $tampil=mysql_query("SELECT * FROM slide ORDER BY id_slide DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
      echo "<tr><td>$no</td>
	  <td>$r[judul]</td>
	  <td><img width='200px' src='../well_img/slide/$r[gambar]'></td>
	  <td><a href=?module=slide&act=edit_slide&id=$r[id_slide]>Edit</a> | 
	                  ";?><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=slide&act=hapus&id=$r[id_slide]>Hapus</a>
		        </tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambah_slide":
    echo "<h2>TAMBAHKAN slide</h2>
          <form method=POST action='$aksi?module=slide&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Judul</td><td>  : <input type=text name='judul' size=30></td></tr>
          <tr><td>Tag Line</td><td>  : <input type=text name='tagline' size=30></td></tr>
          <tr><td>Link</td><td>  : <input type=text name='link' size=30></td></tr>
          <tr><td>Gambar Slide</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2><p><small> *)<b>Ukuran foto Images: 870 x 368px , File gambar tipe JPG.</b></small></p></td></tr>
          <tr><td colspan=2>
		  <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form><br /><br />";
     break;
    
  case "edit_slide":
    $edit = mysql_query("SELECT * FROM slide WHERE id_slide='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>EDIT Slide</h2>
			
          <form method=POST enctype='multipart/form-data' action=$aksi?module=slide&act=update>
          <input type=hidden name=id value=$r[id_slide]>
		  
          <table>
          <tr><td>Judul</td><td>  : <input type=text name='judul' size=30 value='$r[judul]'></td></tr>
          <tr><td>Tag Line</td><td>  : <input type=text name='tagline' size=30  value='$r[tagline]'></td></tr>
          <tr><td>Link</td><td>  : <input type=text name='link' size=30  value='$r[link]'></td></tr>
		  <tr><td>Gambar</td><td>    : <img width=200 src='../well_img/slide/$r[gambar]'></td></tr>
          <tr><td>Gambar Slide</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2><p><small> *)<b>Ukuran foto Images: 870 x 368px , File gambar tipe JPG.</b></small></p></td></tr>
          <tr><td colspan=2>
		  <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
