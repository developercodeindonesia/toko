<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_gallery/aksi_gallery.php";
switch($_GET[act]){
  // Tampil slide
  default:
    echo "<h2>EDIT GALLERY</h2>
          <input type=button  class=butt value='Tambahkan Image' onclick=location.href='?module=gallery&act=tambah_gallery&id=$_GET[id]'> 
		  <input type=button  class=butt value='Back' onclick=location.href='?module=product'>
          <table>
          <tr><th>No</th><th>Image</th><th>Aksi</th></tr>";
    $gambar=mysql_query("SELECT * FROM gallery WHERE id_produk='$_GET[id]'");
	$a=mysql_num_rows($gambar);
	
	if($a != 0){
    $no=1;
    while ($g=mysql_fetch_array($gambar)){
    
      echo "<tr>
	  <td style='vertical-align: middle;'>$no</td>
	  <td style='vertical-align: middle;'><img height='130px' src='../well_img/gallery/$g[gambar]'></td>
	  <td style='vertical-align: middle;'>";?><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=gallery&act=hapus&id=$g[id_gallery]&idn=$_GET[id]>Hapus</a>
		        </tr>";
    $no++;
    }
	}else {echo"<tr><td colspan=3>Data belum ada!</td></tr>";}
    echo "</table>";
    break;
  
  case "tambah_gallery":
    echo "<h2>TAMBAHKAN GALLERY</h2>
          <form method=POST action='$aksi?module=gallery&act=input' enctype='multipart/form-data'>
		  <input type='hidden' name='id' value='$_GET[id]'>
          <table>
		   <tr><td>Gambar</td><td> : <input type=file name='fupload' size=40></td></tr>
		   <tr><td colspan=2><p><small> *)<b>Ukuran foto Images: 800x650px , File gambar tipe JPG.</b></small></p></td></tr>
          <tr><td colspan=2>
		   <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form><br /><br />";
     break;
    
}
}
?>
