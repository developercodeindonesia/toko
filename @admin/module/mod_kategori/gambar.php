<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_kategori/aksi_gambar.php";
switch($_GET[act]){
  // Tampil slide
  default:
    echo "<h2>EDIT GAMBAR KATEGORI</h2>
          <input type=button  class=butt value='Tambahkan Gambar Kategori' onclick=location.href='?module=gambar&act=tambah'><br /><br />
          <table id='exampless' class='display' cellspacing='0' width='100%'>
          <thead style='background: #9B9B9B;'>
			<tr>
				<th>No</th>
				<th>Kategori</th>
				<th>Nama</th>
				<th>Thumbnail</th>
				<th>Aksi</th>
			</tr>
		  </thead>
		  <tbody>";
    $tampil=mysql_query("SELECT * FROM kategori_gambar ORDER BY id_gambar ASC");
    $no=1;
	while ($r=mysql_fetch_array($tampil)){
		
		$kateg=mysql_query("SELECT * FROM subkategori where id_subkategori = '$r[id_subkategori]' ");
		$k=mysql_fetch_array($kateg);
	echo 
		"<tr>
			<td>$no</td>
			<td>$k[nama]</td>
			<td>$r[nama]</td>
			<td style='vertical-align: middle;'><img height='130px' width='200px' src='../joimg/kategori_gambar/$r[gambar]'></td>
			<td><a href=?module=gambar&act=edit&id=$r[id_gambar]>Edit</a> |";?>
				<a onclick="return confirm('Apakah anda yakin menghapus data ini?');" 
					<?php echo"href=$aksi?module=gambar&act=hapus&id=$r[id_gambar]>Hapus</a>
		</tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambah":
    echo "<h2>TAMBAHKAN GAMBAR KATEGORI</h2>
		<form method=POST action='$aksi?module=gambar&act=input' enctype='multipart/form-data'>
		<table>
		  
			<tr>
				<td>Kategori Produk</td><td>  : 
					<select id='kategori' name='kategori' required>";
						echo "<option value=0>Pilih Kategori</option>";
						$tampil=mysql_query("SELECT * FROM subkategori ORDER BY nama ASC");
						while($w=mysql_fetch_array($tampil)){
							echo "<option value=$w[id_subkategori]>$w[nama]</option>";
						}
								  
			echo "</select>
				</td>
			</tr>
			<tr>
				<td>Nama Gambar</td>
				<td> : <input type=text name='nama' size=30 required></td>
			</tr>

			<tr>
				<td>Gambar</td>
				<td> : <input type=file name='fupload' size=40></td>
			</tr>

			<tr>
				<td colspan=2><p><small> *)<b>Ukuran foto Images: 800x650px , File gambar tipe JPG.</b></small></p>
			</td>
			</tr>

			<tr><td colspan=2>
			<input type=submit class=butt value=Simpan>
			<input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
		</table></form><br /><br />";
	break;
 
	case "edit":
	$edit = mysql_query("SELECT * FROM kategori_gambar WHERE id_gambar='$_GET[id]'");
	$r    = mysql_fetch_array($edit);

    echo "<h2>EDIT GAMBAR KATEGORI</h2>
			
		<form method=POST enctype='multipart/form-data' action=$aksi?module=gambar&act=update>
			<input type=hidden name=id value=$r[id_gambar]>

			<table>
				 <tr>
					<td>Kategori Produk :</td>
					<td><select id='kategori' name='kategori' required>";
									
					$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama ASC");
					if ($r[id_subkategori]==0){
						echo "<option value=0 selected>- Pilih Kategori -</option>";
					}   

					while($w=mysql_fetch_array($tampil)){
						if ($r[id_subkategori]==$w[id_subkategori]){
							echo "<option value=$w[id_subkategori] selected>$w[nama]</option>";
						}else{
							echo "<option value=$w[id_subkategori]>$w[nama]</option>";
						}
					}

				echo "</select>
					</td>
				</tr>
				<tr><td>Nama :</td><td><input type=text name='nama' size=30 value='$r[nama]' required></td></tr>

				<tr><td>Gambar : </td><td><img width='200px' src='../joimg/kategori_gambar/$r[gambar]'></td></tr>
				<tr><td>Ganti Gambar Produk</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
				<tr><td colspan=2><p><small> *)<b>Ukuran foto Images: 30x30px , File gambar tipe JPG.</b></small></p></td></tr>

				<tr><td colspan=2>
					<input type=submit class=butt value=Update>
					<input type=button class=butt value=Batal onclick=self.history.back()>
				</td></tr>
			</table>
		</form>";
    break;
}
}
?>
