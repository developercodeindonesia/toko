<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_product/aksi_product.php";
switch($_GET['act']){
  // Tampil slide
  default:
    echo "<h2>EDIT PRODUK</h2>
			<input type=button  class=butt value='Tambahkan Produk' onclick=location.href='?module=product&act=tambah_produk'>
			<table id='exampless' class='display' cellspacing='0' width='100%'>
				<thead style='background: #9B9B9B;'>
					<tr>
						<th>No</th>
						<th>Thumbnail</th>
						<th>Nama Produk</th>
						<th>kategori</th>
						<th>subkategori</th>
						<th>Aksi</th>
					</tr>
				</thead>
			<tbody>";
    $tampil	=	mysql_query("SELECT * FROM produk p JOIN kategori s ON p.id_kategori = s.id_kategori ORDER BY id_produk DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
		$subkat	=	mysql_query("SELECT * FROM subkategori where id_subkategori= '$r[id_subkategori]'");
		$sub	=	mysql_fetch_array($subkat);
		echo "
			<tr>
				<td>$no</td>
				<td><img height='80px' src='../joimg/produk/$r[gambar]'></td>
				<td>$r[nama_produk]</td>
				<td>$r[nama]</td>
				<td>$sub[nama]</td>
				<td class='center'><a href=?module=product&act=edit_product&id=$r[id_produk]>Edit</a> | 
					";?><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=product&act=hapus&id=$r[id_produk]>Hapus</a>
				<br />
					<a href='?module=gallery&id=$r[id_produk]' style='background: #CC0000;padding: 5px 10px;color: #FFF;line-height: 32px;'>Gallery Produk</a>
				<br />
			
			</tr>";
		$no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambah_produk":
    echo "<h2>TAMBAHKAN PRODUK</h2>
			<form method=POST action='$aksi?module=product&act=input' enctype='multipart/form-data'>
			<table>
				<tr><td>Nama Produk</td><td>  : </td><td><input type=text name='nama' size=30></td></tr>
				<tr><td>Harga Produk</td><td>  : </td><td><input type=text name='harga' size=10></td></tr>
				<tr><td>Kode Produk</td><td>  : </td><td><input type=text name='kode' size=10></td></tr>
				<tr><td>Diskon Product</td><td>  : </td><td><input type=text name='discount' size=2> %</td></tr>
				
<!--
				<tr><td>Type Barang</td><td>  : </td><td><input type=text name='type_brg' size=50></td></tr>
-->				
				<tr><td>Kategori</td><td>  : </td><td><select id='kat' name='kat' onchange='kat()' required>";
						echo "<option value=0>Pilih kategori</option>";
						$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama ASC");
							while($w=mysql_fetch_array($tampil)){
								echo "<option value=$w[id_kategori]>$w[nama]</option>";
							}
		
		echo "		</select></td> </tr>
		
				<tr><td>Sub Kategori</td><td>  : </td><td><select id='subkat' name='subkat'>";
					echo "<option value ='0' selected>Pilih Subkategori</option>";
		echo "		</select></td> </tr>
		
				<tr><td>Supplier</td><td>  : </td><td><select name='supplier'>";
						echo "<option value=0>Pilih Supplier</option>";
						$tampil=mysql_query("SELECT * FROM supplier ORDER BY nama ASC");
							while($w=mysql_fetch_array($tampil)){
								echo "<option value=$w[id_supplier]>$w[nama]</option>";
							}
				echo "</select>
					</td> </tr>
					
				<tr><td>Catalog Produk</td><td>  : </td><td><select name='catalog'>";
					echo "<option value=0> - Pilih Catalog - </option>";
						$catalog=mysql_query("SELECT * FROM catalog ORDER BY nama ASC");
						while($ca=mysql_fetch_array($catalog)){
							echo "<option value=$ca[id_catalog]>$ca[nama]</option>";
						}
								  
		echo "</select></td> </tr>
				
				<tr><td>Color Produk</td><td>  : </td><td>";
								
				$color=mysql_query("SELECT * FROM color");
				while($c=mysql_fetch_array($color)){
					echo "<div class='coloradm' style='float:left;'>";
						echo"<input name='color[]' type='checkbox' value='$c[id_color]'>";
							echo"<div class='clr' style='background-color:$c[color]; height:20px; width: 30px; float:right; position: relative; margin-left:1px; margin-right:1px; margin-bottom: 2px; box-shadow: 0px 0px 8px #555; border-radius:3px;'><div class='clear'></div></div>";
					echo"</div>";
				}
/*		
		echo "<tr><td>Komposisi</td><td>  : </td><td><input type=text name='komposisi' size=50></td></tr>";
		echo "<tr><td>Material</td><td>  : </td><td><input type=text name='material' size=50></td></tr>";
		echo "<tr><td>Finishing</td><td>  : </td><td><input type=text name='finishing' size=50></td></tr>";
*/
		echo "</td> </tr>
				
				<tr>
					<td>Spesial Atribute</td><td>  : </td><td><input type='radio' id='ossm' name='special' value='new'> NEW 
						<input type='radio' id='ossm' name='special' value='promo'> PROMO 
						<input type='radio' id='ossm' name='special' value='hot'> HOT
					</td>
				</tr>
								
				<tr><td colspan=3  style='border-bottom:none; font-weight:bold'>Detail Product</td></tr>
				<tr><td colspan=3><textarea name='detail' width:70% ></textarea></td></tr>
<!--
				<tr><td colspan=3  style='border-bottom:none; font-weight:bold'>Diskripsi Product</td></tr>
				<tr><td colspan=3><textarea name='deskripsi' width:70%></textarea></td></tr>
		  
				<tr><td colspan=3  style='border-bottom:none; font-weight:bold'>Review Product</td></tr>
				<tr><td colspan=3><textarea name='review' width:70%></textarea></td></tr>
-->	
				<tr><td>Gambar Produk</td><td> : </td><td><input type=file name='fupload' size=30> *)</td></tr>
				<tr><td colspan=3><p><small> *)<b>Ukuran foto Images: 410x284 </b></small></p></td></tr>
		  
				<tr>
					<td colspan=3>
						<input type=submit class=butt value=Simpan>
						<input type=button class=butt value=Batal onclick=self.history.back()>
					</td>
				</tr>
			</table></form><br /><br />";
     break;
    
  case "edit_product":
    $edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>EDIT product PRODUK</h2>
			
			<form method=POST enctype='multipart/form-data' action=$aksi?module=product&act=update>
			<input type=hidden name=id value=$r[id_produk]>
			<table>
				<tr><td>Nama Produk</td><td>  : </td><td><input type=text name='nama' size=30 value='$r[nama_produk]'></td></tr>
				<tr><td>Harga Produk</td><td>  : </td><td><input type=text name='harga' size=10 value='$r[harga]'></td></tr>
				<tr><td>Type Barang</td><td>  : </td><td><input type=text name='type_brg' size=50 value='$r[type_brg]'></td></tr>
				<tr><td>kategori</td><td>  : </td><td><select name='kategori'>";
									
							$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama ASC");
								if ($r[id_kategori]==0){
									echo "<option value=0 selected>- Pilih kategori -</option>";
								}
									while($w=mysql_fetch_array($tampil)){
										if ($r[id_kategori]==$w[id_kategori]){
											echo "<option value=$w[id_kategori] selected>$w[nama]</option>";
										}else{
											echo "<option value=$w[id_kategori]>$w[nama]</option>";
										}
									}
									
		echo "</select></td> </tr>";
		echo "<tr><td>Supplier</td><td>  : </td><td><select name='supplier'>";
									
							$tampil=mysql_query("SELECT * FROM supplier ORDER BY nama ASC");
								if ($r[id_supplier]==0){
									echo "<option value=0 selected>- Pilih Supplier -</option>";
								}   

									while($w=mysql_fetch_array($tampil)){
										if ($r[id_supplier]==$w[id_supplier]){
											echo "<option value=$w[id_supplier] selected>$w[nama]</option>";
										}else{
											echo "<option value=$w[id_supplier]>$w[nama]</option>";
										}
									}
									
		echo "</select></td> </tr>";
		echo "<tr><td>Color Produk</td><td>  : </td><td>";
								
								  $color=mysql_query("SELECT * FROM color");
									while($c=mysql_fetch_array($color)){
										$subcolor=mysql_query("SELECT * FROM sub_color WHERE id_produk ='$_GET[id]' AND id_color='$c[id_color]'");
										$sc=mysql_num_rows($subcolor);
										if($sc == 0){
											echo "<div class='coloradm' style='float:left;'>";
												echo "<input name='color[]' type='checkbox' value='$c[id_color]'>";
												echo"<div class='clr' style='background-color:$c[color]; height:20px; width: 30px; float:right; position: relative; margin-left:1px; margin-right:1px; margin-bottom: 2px; box-shadow: 0px 0px 8px #555; border-radius:3px;'><div class='clear'></div></div>";
											echo"</div>";
										}else {
											echo "<div class='coloradm' style='float:left;'>";
												echo "<input name='color[]' type='checkbox' value='$c[id_color]' checked>";
											echo"<div class='clr' style='background-color:$c[color]; height:20px; width: 30px; float:right; position: relative; margin-left:1px; margin-right:1px; margin-bottom: 2px; box-shadow: 0px 0px 8px #555; border-radius:3px;'><div class='clear'></div></div>";
											echo "</div>";
										}
									}

		echo "<tr><td>Komposisi</td><td>  : </td><td><input type=text name='komposisi' size=50 value='$r[komposisi]'></td></tr>";
		echo "<tr><td>Material</td><td>  : </td><td><input type=text name='material' size=50 value='$r[material]'></td></tr>";
		echo "<tr><td>Finishing</td><td>  : </td><td><input type=text name='finishing' size=50 value='$r[finishing]'></td></tr>";
		echo "</td></tr>
				<tr><td>Catalog Produk</td><td>  : </td><td><select name='catalog'>";
							$catalog=mysql_query("SELECT * FROM catalog ORDER BY id_catalog ASC");
								if ($r['id_catalog']==0){
									echo "<option value=0 selected>- Pilih Catalog -</option>";
								}   

									while($ca=mysql_fetch_array($catalog)){
										if ($r['id_catalog']==$ca['id_catalog']){
											echo "<option value=$ca[id_catalog] selected>$ca[nama]</option>";
										}else{
											echo "<option value=$ca[id_catalog]>$ca[nama]</option>";
										}
									}
								  
		echo "</select></td> </tr>
				<tr><td>Diskon Product</td><td>  : </td><td><input type=text name='discount' size=2 style='width: 25px;margin-left: 2px;' value='$r[discount]'> %</td></tr>
				<tr><td>Spesial Atribute</td><td>  : </td><td>";
		  
		  if($r['special'] == 'new'){
		  echo"<input type='radio' id='ossm' name='special' value='new' checked> NEW 
		  <input type='radio' id='ossm' name='special' value='promo'> PROMO 
		  <input type='radio' id='ossm' name='special' value='hot'> HOT ";
		  } elseif($r['special'] == 'promo'){
		  echo"<input type='radio' id='ossm' name='special' value='new'> NEW 
		  <input type='radio' id='ossm' name='special' value='promo' checked> PROMO 
		  <input type='radio' id='ossm' name='special' value='hot'> HOT ";
		  } elseif($r['special'] == 'hot'){
		  echo"<input type='radio' id='ossm' name='special' value='new'> NEW 
		  <input type='radio' id='ossm' name='special' value='promo'> PROMO 
		  <input type='radio' id='ossm' name='special' value='hot' checked> HOT ";
		  }else {
		  echo"<input type='radio' id='ossm' name='special' value='new'> NEW 
		  <input type='radio' id='ossm' name='special' value='promo'> PROMO 
		  <input type='radio' id='ossm' name='special' value='hot'> HOT ";
		  }
		  
		  echo"
		  </td></tr>
		  
          <tr><td colspan=3  style='border-bottom:none; font-weight:bold'>Detail Product</td></tr>
          <tr><td colspan=3><textarea name='detail' width:70%>$r[detail]</textarea></td></tr>
		  
<!--		  
          <tr><td colspan=3  style='border-bottom:none; font-weight:bold'>Diskripsi Product</td></tr>
          <tr><td colspan=3><textarea name='deskripsi' width:70%>$r[deskripsi]</textarea></td></tr>
		  
          <tr><td colspan=3  style='border-bottom:none; font-weight:bold'>Review Product</td></tr>
          <tr><td colspan=3><textarea name='review' width:70%>$r[review]</textarea></td></tr>
-->
		  
          <tr><td>Gambar</td><td>  : </td><td><img width=200 src='../joimg/produk/$r[gambar]'></td></tr>
          <tr><td>Ganti Gambar Produk</td><td>  : </td><td><input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=3><p><small> *)<b>Ukuran foto Images: 410x284 </b></small></p></td></tr>
		  
          <tr><td colspan=3>
		  <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
