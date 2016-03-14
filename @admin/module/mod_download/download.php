<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_download/aksi_download.php";
switch($_GET[act]){
  // Tampil download
  default:
    echo "<h2>EDIT DOWNLOAD FILE</h2>
          <input type=button  class=butt value='Tambahkan File' onclick=location.href='?module=download&act=tambah_file'><br /><br />
          <table id='exampless' class='display' cellspacing='0' width='100%'>
          <thead style='background: #9B9B9B;'>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Nama File</th>
				<th>Aksi</th>
			</tr>
		  </thead>
		  <tbody>";
    $tampil=mysql_query("SELECT * FROM download ORDER BY id_download ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
      echo "<tr>
	  <td>$no</td>
	  <td>$r[judul]</td>
	  <td>$r[nama_file]</td>
	  <td>";?>
		<!--<a href=?module=download&act=edit_download&id=$r[id_download]>Edit</a> | -->
		  <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=download&act=hapus&id=$r[id_download]>Hapus</a>
	</tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambah_file":
    echo "<h2>TAMBAHKAN FILE DOWNLOAD</h2>
          <form method=POST action='$aksi?module=download&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Judul File</td><td>  : <input type=text name='judul' size=30 required></td></tr>
		  <tr><td>File</td><td> : <input type=file name='fupload' size=30 required> </td></tr>
          <tr><td colspan=2>
		  <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form><br /><br />";
     break;
    
  case "edit_color":
    $edit = mysql_query("SELECT * FROM color WHERE id_color='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>EDIT color PRODUK</h2>
			
          <form method=POST enctype='multipart/form-data' action=$aksi?module=color&act=update>
          <input type=hidden name=id value=$r[id_color]>
		  
          <table>
		   <tr><td>Nama Color</td><td>     : <input type=text name='color' size=30 value='$r[color]' required></td></tr>
		   <tr><td>Gambar</td><td>    : <img width=30 src='../joimg/color/$r[gambar]'></td></tr>
          <tr><td>Ganti Gambar Produk</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2><p><small> *)<b>Ukuran foto Images: 30x30px , File gambar tipe JPG.</b></small></p></td></tr>
          <tr><td colspan=2><input type=submit class=butt value=Update>
                            <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
