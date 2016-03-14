<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_kategori/aksi_kategori.php";
switch($_GET[act]){
  // Tampil slide
  default:
    echo "<h2>EDIT KATEGORI</h2>
          <input type=button  class=butt value='Tambahkan Kategori' onclick=location.href='?module=kategori&act=tambah_kategori'>
          <table id='exampless' class='display' cellspacing='0' width='100%'>
          <thead style='background: #9B9B9B;'><tr><th>No</th><th>kategori</th><th>Parent Kategori</th><th>Aksi</th></tr></thead><tbody>";
   
	$tampil=mysql_query("SELECT * FROM subkategori");
	//$tampil=mysql_query("SELECT s.nama as sub, k.nama as kat, id_subkategori FROM subkategori s JOIN kategori k ON s.id_kategori = k.id_kategori ORDER BY id_subkategori DESC");
	$no=1;
		while ($r=mysql_fetch_array($tampil)){
			
			$kateg=mysql_query("SELECT * FROM kategori where id_kategori = '$r[id_kategori]' ");
			$k = mysql_fetch_array($kateg);
			echo "
			<tr>
				<td>$no</td>
				<td>$r[nama]</td>
				<td>$k[nama]</td>
				<td><a href=?module=kategori&act=edit_kategori&id=$r[id_subkategori]>Edit</a> | 
			";?><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=kategori&act=hapus&id=$r[id_subkategori]>Hapus</a>
			</tr>";
			$no++;
		}
    echo "</tbody></table>";
    break;
  
case "tambah_kategori":
	echo "<h2>TAMBAHKAN KATEGORI</h2>
		<form method=POST action='$aksi?module=kategori&act=input' enctype='multipart/form-data'>
			<table>
					<tr><td>Parent Kategori</td><td>  : <select name='kategori'>";
									
					$tampil=mysql_query("SELECT * FROM kategori ORDER BY id_kategori ASC");
					while($w=mysql_fetch_array($tampil)){
						echo "<option value='0'> - </option>";
						echo "<option value=$w[id_kategori]>$w[nama]</option>";
					}
									  
			echo "</select></td> </tr>
					<tr><td>kategori</td><td>  : <input type=text name='nama' size=30></td></tr>
					<tr><td colspan=2>
				<input type=submit class=butt value=Simpan>
				<input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
			</table>
		</form><br /><br />";
     break;
    
case "edit_kategori":
	$edit = mysql_query("SELECT * FROM subkategori WHERE id_subkategori='$_GET[id]'");
	$r    = mysql_fetch_array($edit);

    echo "<h2>EDIT KATEGORI PRODUK</h2>
			
          <form method=POST enctype='multipart/form-data' action=$aksi?module=kategori&act=update>
          <input type=hidden name=id value=$r[id_subkategori]>
		  
          <table>
		   <tr><td>kategori</td><td>     : <input type=text name='nama' size=30 value='$r[nama]'></td></tr>
          <tr><td>Parent Kategori</td><td>  : <select name='kategori'>";
								
				$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama ASC");
				if ($r['id_kategori']==0){
					echo "<option value=0 selected>- Pilih Kategori -</option>";
				}  
				while($w=mysql_fetch_array($tampil)){
					if ($r['id_kategori']==$w['id_kategori']){
						echo "<option value=$w[id_kategori] selected>$w[nama]</option>";
						echo "<option value=0 > - </option>";
					}
					else{
						echo "<option value=$w[id_kategori]>$w[nama]</option>";
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
