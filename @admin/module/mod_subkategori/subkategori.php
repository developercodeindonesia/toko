<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_subkategori/aksi_subkategori.php";
switch($_GET['act']){
  // Tampil slide
  default:
    echo "<h2>EDIT SUBKATEGORI</h2>
		<input type=button  class=butt value='Tambahkan SubKategori' onclick=location.href='?module=subkategori&act=tambah'>
		<table id='exampless' class='display' cellspacing='0' width='100%'>
			<thead style='background: #9B9B9B;'>
				<tr>
					<th>No</th>
					<th>Subkategori</th>
					<th>Kategori</th>
					<th>Aksi</th>
				</tr>
			</thead>
		<tbody>";
   
	$tampil=mysql_query("SELECT s.nama as sub, k.nama as kat, id_subsub FROM subsub_kategori s JOIN subkategori k ON s.id_subkategori = k.id_subkategori ORDER BY id_subsub DESC");
	
	//parent
	//$parent=mysql_query("SELECT s.nama as sub, k.nama as par, id_subsub FROM subsub_kategori s JOIN kategori k ON s.id_kategori = k.id_kategori ORDER BY id_subsub DESC");
	//$w=mysql_fetch_array($parent);
	
	$no=1;
		while ($r=mysql_fetch_array($tampil)){
			echo "
			<tr>
				<td>$no</td>
				<td>$r[sub]</td>
				<td>$r[kat]</td>
				<td><a href=?module=subkategori&act=edit&id=$r[id_subsub]>Edit</a> | 
			";?><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=subkategori&act=hapus&id=$r[id_subsub]>Hapus</a>
			</tr>";
			$no++;
		}
    echo "</tbody></table>";
    break;
  
case "tambah":
	echo "<h2>TAMBAHKAN SUBKATEGORI</h2>
		<form method=POST action='$aksi?module=subkategori&act=input' enctype='multipart/form-data'>
			<table>
					<tr>
						<td>Kategori</td>
						<td> : <select id='kat' name='subkategori' required>";
							echo "<option> - Pilih kategori - </option>";
							
							$tampil=mysql_query("SELECT * FROM subkategori ORDER BY nama ASC");
								while($w=mysql_fetch_array($tampil)){
									echo "<option value=$w[id_subkategori]>$w[nama]</option>";
								}
							
			echo "		</select>
						</td>
					</tr>
					
					<tr><td>subkategori</td><td>  : <input type=text name='nama' size=30></td></tr>
					<tr><td colspan=2>
				<input type=submit class=butt value=Simpan>
				<input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
			</table>
		</form><br /><br />";
     break;
    
case "edit":
	$edit = mysql_query("SELECT * FROM subsub_kategori WHERE id_subsub='$_GET[id]'");
	$r    = mysql_fetch_array($edit);

    echo "<h2>EDIT SUB KATEGORI PRODUK</h2>
			
			<form method=POST enctype='multipart/form-data' action=$aksi?module=subkategori&act=update>
			<input type=hidden name=id value=$r[id_subsub]>
			<table>
			<tr><td>kategori</td><td>     : <input type=text name='nama' size=30 value='$r[nama]'></td></tr>
			<!--
			<tr><td>Parent kategori</td><td> : <select name='kategori' id='kat'>";
									
							$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama ASC");
								if ($r['id_kategori']==0){
									echo "<option value=0 selected>- Pilih parent kategori -</option>";
								}
									while($w=mysql_fetch_array($tampil)){
										if ($r['id_kategori']==$w['id_kategori']){
											echo "<option value=$w[id_kategori] selected>$w[nama]</option>";
										}else{
											echo "<option value=$w[id_kategori]>$w[nama]</option>";
										}
									}
									
		echo "</select></td> </tr>
			-->";
		
		echo "<tr><td>Kategori</td><td> : <select name='subkategori' id='subkat'>";
									
							$tampil=mysql_query("SELECT * FROM subkategori ORDER BY nama ASC");
								if ($r[id_subkategori]==0){
									echo "<option value=0 selected>- Pilih kategori -</option>";
								}
								while($w=mysql_fetch_array($tampil)){
										if ($r[id_subkategori]==$w[id_subkategori]){
											echo "<option value=$w[id_subkategori] selected>$w[nama]</option>";
										}else{
											echo "<option value=$w[id_subkategori]>$w[nama]</option>";
										}
									}
									
		echo "</select></td> </tr>
		
          <tr><td colspan=2><input type=submit class=butt value=Update>
                            <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
