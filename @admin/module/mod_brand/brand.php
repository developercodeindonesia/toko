<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_brand/aksi_brand.php";
switch($_GET[act]){
  // Tampil slide
  default:
    echo "<h2>Semua Brand</h2>
          <input type=button  class=butt value='Tambahkan Brand' onclick=location.href='?module=brand&act=tambah_brand'><br /><br />
          <table id='exampless' class='display' cellspacing='0' width='100%'>
          <thead style='background: #9B9B9B;'>
			<tr>
				<th>No</th>
				<th>Brand</th>
				<th>Thumbnail</th>
				<th>Aksi</th>
			</tr>
		  </thead>
		  <tbody>";
    $tampil=mysql_query("SELECT * FROM brand ORDER BY id_brand ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
		echo 
		"<tr>
			<td>$no</td>
			<td>$r[nama_brand]</td>
			<td style='vertical-align: middle;'>
				<img width='130px' src='../well_img/brand/$r[gambar]'>
			</td>
			<td><a href=?module=brand&act=edit_brand&id=$r[id_brand]>Edit</a> |";?>
				<a onclick="return confirm('Apakah anda yakin menghapus data ini?');" 
					<?php echo"href=$aksi?module=brand&act=hapus&id=$r[id_brand]>Hapus</a>
		</tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambah_brand":
    echo "<h2>TAMBAHKAN Brand</h2>
		<form method=POST action='$aksi?module=brand&act=input' enctype='multipart/form-data'>
			<table>
				<tr>
					<td>Nama Brand</td>
					<td>  : <input type=text name='nama_brand' size=30 required></td>
				</tr>
				<tr>
					<td>Gambar</td>
					<td> : <input type=file name='fupload' size=40></td>
				</tr>
				<tr>
					<td colspan=2><p><small> *)<b>Ukuran foto Images: 800x650px , File gambar tipe JPG.</b></small></p></td>
				</tr>

				<tr>
					<td colspan=2>
						<input type=submit class=butt value=Simpan>
						<input type=button class=butt value=Batal onclick=self.history.back()>
					</td>
				</tr>
			</table>
		</form><br /><br />";
     break;

  case "edit_brand":
    $edit = mysql_query("SELECT * FROM brand WHERE id_brand='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>EDIT brand PRODUK</h2>
			
			<form method=POST enctype='multipart/form-data' action=$aksi?module=brand&act=update>
				<input type=hidden name=id value=$r[id_brand]>
				<table>
					<tr><td>Nama brand</td><td>     : <input type=text name='nama_brand' size=30 value='$r[nama_brand]' required></td></tr>
					<tr><td>Gambar</td><td>    : <img width=130 src='../well_img/brand/$r[gambar]'></td></tr>
					<tr><td>Ganti Gambar Brand</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
					<tr><td colspan=2><p><small> *)<b>Ukuran foto Images: 30x30px , File gambar tipe JPG.</b></small></p></td></tr>  
					<tr>
						<td colspan=2>
							<input type=submit class=butt value=Update>
							<input type=button class=butt value=Batal onclick=self.history.back()>
						</td>
					</tr>
				</table>
			</form>";
    break;  
}
}
?>
