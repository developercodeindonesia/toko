<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
	$aksi="module/mod_product/aksi_product.php";
	switch($_GET[act]){
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
								<th class='center'>Aksi</th>
							</tr>
						</thead><tbody>";
						$tampil=mysql_query("SELECT * FROM produk p JOIN subkategori s ON p.id_subkategori = s.id_subkategori ORDER BY id_produk DESC");
						$no=1;
						while ($r=mysql_fetch_array($tampil)){
							$subkat	=	mysql_query("SELECT * FROM subsub_kategori where id_subsub = '$r[id_subsub]'");
							$sk	=	mysql_fetch_array($subkat);
							
						  echo "<tr><td>$no</td>
										<td><img height='80px' src='../well_img/produk/$r[gambar]'></td>
										<td>$r[nama_produk]</td>
										<td>$r[nama]</td>
										<td>$sk[nama]</td>
										<td class='center'><a href=?module=product&act=edit_product&id=$r[id_produk]>Edit</a> | 
											";?><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=product&act=hapus&id=$r[id_produk]>Hapus</a>
										<br />";
										/*	<a href='?module=gallery&id=$r[id_produk]' style='background: #CC0000;padding: 5px 10px;color: #FFF;line-height: 32px;'>Gallery Produk</a>*/
										echo"<br />
									</tr>";
						$no++;
						}
				echo "</tbody>
					</table>";
			break;
  
  case "tambah_produk":
    echo "<h2>TAMBAHKAN PRODUK</h2>
			<form method=POST action='$aksi?module=product&act=input' enctype='multipart/form-data'>
			<table>";
		echo "<tr>
					<td>Kategori</td>
					<td>  : </td>
					<td><select id='kat' name='subkategori' required>";
						echo "<option> - Pilih  kategori - </option>";
						
						$subkat=mysql_query("SELECT * FROM subkategori ORDER BY nama ASC");
							while($s=mysql_fetch_array($subkat)){
								echo "<option value=$s[id_subkategori]>$s[nama]</option>";
							}
						
		echo "		</select>
					</td>
				</tr>
				
				<tr>
					<td>Sub Kategori</td><td>  : </td>
					<td><select id='subkat' name='subsub'>";
					echo "<option> - Pilih Sub kategori - </option>";
		echo "		</select>
					</td>
				</tr>";
		/*
		echo "<tr>
					<td>Parent Kategori</td>
					<td>  : </td>
					<td><select id='kat' name='kategori' required>";
						echo "<option> - Pilih Parent kategori - </option>";
						
						$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama ASC");
							while($w=mysql_fetch_array($tampil)){
								echo "<option value=$w[id_kategori]>$w[nama]</option>";
							}
						
		echo "		</select>
					</td>
				</tr>
				
				<tr>
					<td>Kategori</td>
					<td>  : </td>
					<td><select id='subkat' name='subkategori' required>";
						echo "<option> - Pilih  kategori - </option>";
						
						$subkat=mysql_query("SELECT * FROM subkategori ORDER BY nama ASC");
							while($s=mysql_fetch_array($tampil)){
								echo "<option value=$s[id_subkategori]>$s[nama]</option>";
							}
						
		echo "		</select>
					</td>
				</tr>
				
				<tr>
					<td>Sub Kategori</td><td>  : </td>
					<td><select id='subsub' name='subsub'>";
					echo "<option> - Pilih Sub kategori - </option>";
		echo "		</select>
					</td>
				</tr>";
		*/
		echo "<tr>
					<td>Brand</td><td>  : </td><td>
						<select name='brand'>";
						echo "<option value=0> - Pilih Brand - </option>";
						$tampil=mysql_query("SELECT id_brand, nama_brand FROM brand ORDER BY nama_brand ASC");
							while($w=mysql_fetch_array($tampil)){
								echo "<option value=$w[id_brand]>$w[nama_brand]</option>";
							}
		echo "		</select>
					</td>
				</tr>";
		echo "<tr><td>Nama Produk</td><td>  : </td><td><input type=text name='nama' size=50 placeholder='Nama Produk' required></td></tr>
				<tr><td>Kode Produk</td><td>  : </td><td><input type=text name='kode' size=10 placeholder='Kode'></td></tr>
				<tr><td>Harga Produk</td><td>  : </td><td><input type=text name='harga' size=10 placeholder='100000'> *) Hanya angka saja</td></tr>
				<tr><td>Berat Produk</td><td>  : </td><td><input type=text name='berat' size=10 placeholder='0.5'> *) Satuan Killogram (KG)</td></tr>
				<tr><td>Garansi Produk</td><td>  : </td><td><input type=text name='garansi' size=50 placeholder='Garansi Produk'></td></tr>
				<tr><td>Stok Produk</td><td>  : </td><td><input type=number name='stok' size=2 min=0></td></tr>
				";
		echo "</select></td> </tr>
				<tr><td>Color Produk</td><td>  : </td><td>";	
						$color=mysql_query("SELECT * FROM color");
							while($c=mysql_fetch_array($color)){
								echo "<div class='coloradm' style='float:left;'>";
									echo"<input name='color[]' type='checkbox' value='$c[id_color]'>";
										echo"<div class='clr' style='background-color:$c[color]; height:20px; width: 30px; float:right; position: relative; margin-left:1px; margin-right:1px; margin-bottom: 2px; box-shadow: 0px 0px 8px #555; border-radius:3px;'><div class='clear'></div></div>";
								echo"</div>";
							}
		
		echo "<tr><td>Diskon Product</td><td>  : </td><td><input type=text name='discount' size=2> %</td></tr>
				
				<tr>
					<td>Spesial Atribute</td><td>  : </td>
					<td>
						<input type='radio' id='ossm' name='special' value='new'> NEW 
						<input type='radio' id='ossm' name='special' value='promo'> PROMO 
						<input type='radio' id='ossm' name='special' value='hot'> HOT
						<input type='radio' id='ossm' name='special' value='none'> None
					</td>
				</tr>
				
				<tr>
					<td>Tampil Depan</td><td> : </td>
					<td>
						<input type='radio' id='ossm' name='tampil_depan' value='Y'> Yes 
						<input type='radio' id='ossm' name='tampil_depan' value='N' checked> No
					</td>
				</tr>
				
				<tr>
					<td>Deals</td><td> : </td>
					<td>
						<input type='radio' id='ossm' name='deals' value='Y'> Yes 
						<input type='radio' id='ossm' name='deals' value='N' checked> No
					</td>
				</tr>
				
				<tr>
					<td>Featured</td><td> : </td>
					<td>
						<input type='radio' id='ossm' name='featured' value='Y'> Yes 
						<input type='radio' id='ossm' name='featured' value='N' checked> No
					</td>
				</tr>
				
				<tr>
					<td>Best Seller</td><td> : </td>
					<td>
						<input type='radio' id='ossm' name='best' value='Y'> Yes 
						<input type='radio' id='ossm' name='best' value='N' checked> No
					</td>
				</tr>
				
				<tr><td colspan=3  style='border-bottom:none; font-weight:bold'>Diskripsi Product</td></tr>
				<tr><td colspan=3><textarea name='detail' width:70%></textarea></td></tr>
		
				<tr><td>Gambar Produk</td><td> : </td><td><input type=file name='fupload' size=30> *)</td></tr>
				<tr><td colspan=3><p><small> *)<b>Ukuran foto Images: 410x284 </b></small></p></td></tr>
		  
				<tr><td colspan=3>
					<input type=submit class=butt value=Simpan>
					<input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
			</table></form><br /><br />";
     break;
    
  case "edit_product":
    $edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>EDIT product PRODUK</h2>
			
			<form method=POST enctype='multipart/form-data' action=$aksi?module=product&act=update>
			<input type=hidden name=id value=$r[id_produk]>
			<table>";
		
		echo "<tr><td>Kategori</td><td>  : </td><td><select name='subkategori' id='kat'>";
									
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
									
		echo "</select></td> </tr>";
		
		echo "<tr><td>Sub kategori</td><td>  : </td><td><select name='subsub' id='subkat'>";
									
							$tampil=mysql_query("SELECT * FROM subsub_kategori ORDER BY nama ASC");
								if ($r[id_subsub]==0){
									echo "<option value=0 selected>- Pilih sub kategori -</option>";
								}
								while($w=mysql_fetch_array($tampil)){
										if ($r[id_subsub]==$w[id_subsub]){
											echo "<option value=$w[id_subsub] selected>$w[nama]</option>";
										}else{
											echo "<option value=$w[id_subsub]>$w[nama]</option>";
										}
									}
									
		echo "</select></td> </tr>";
		
		echo "<tr><td>Brand</td><td>  : </td><td><select name='brand'>";
							$tampil=mysql_query("SELECT id_brand, nama_brand FROM brand ORDER BY nama_brand ASC");
								if ($r[id_brand]==0){
									echo "<option value=0 selected>- Pilih Brand -</option>";
								}
									while($w=mysql_fetch_array($tampil)){
										if ($r[id_brand]==$w[id_brand]){
											echo "<option value=$w[id_brand] selected>$w[nama_brand]</option>";
										}else{
											echo "<option value=$w[id_brand]>$w[nama_brand]</option>";
										}
									}					
		echo "			</select>
					</td>
				</tr>";
		echo "<tr><td>Nama Produk</td><td>  : </td><td><input type=text name='nama' size=50 value='$r[nama_produk]'></td></tr>
				<tr><td>Kode Produk</td><td>  : </td><td><input type=text name='kode' size=10 value='$r[kode]'></td></tr>
				<tr><td>Harga Produk</td><td>  : </td><td><input type=text name='harga' size=10 value='$r[harga]'> *) Hanya Angka</td></tr>
				<tr><td>Berat Produk</td><td>  : </td><td><input type=text name='berat' size=10 value='$r[berat]'> *) Berat dalam satuan Kilogram (KG)</td></tr>
				<tr><td>Garansi Barang</td><td>  : </td><td><input type=text name='garansi' size=50 value='$r[garansi]'></td></tr>
				<tr><td>Stok Barang</td><td>  : </td><td><input type=number name='stok' size=5 min=0 value='$r[stok]'></td></tr>";
		
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

		echo "
				<tr><td>Diskon Product</td><td>  : </td><td><input type=text name='discount' size=2 style='width: 25px;margin-left: 2px;' value='$r[discount]'> %</td></tr>
				
				<tr>
					<td>Spesial Atribute</td><td>  : </td><td>";
						if($r['special'] == 'new'){
							  echo"<input type='radio' id='ossm' name='special' value='new' checked> NEW 
							  <input type='radio' id='ossm' name='special' value='promo'> PROMO 
							  <input type='radio' id='ossm' name='special' value='hot'> HOT 
							  <input type='radio' id='ossm' name='none' value='none'> NONE";
						} elseif($r['special'] == 'promo'){
							  echo"<input type='radio' id='ossm' name='special' value='new'> NEW 
							  <input type='radio' id='ossm' name='special' value='promo' checked> PROMO 
							  <input type='radio' id='ossm' name='special' value='hot'> HOT 
							  <input type='radio' id='ossm' name='none' value='none'> NONE";
						} elseif($r['special'] == 'hot'){
							  echo"<input type='radio' id='ossm' name='special' value='new'> NEW 
							  <input type='radio' id='ossm' name='special' value='promo'> PROMO 
							  <input type='radio' id='ossm' name='special' value='hot' checked> HOT
							  <input type='radio' id='ossm' name='none' value='none'> NONE ";
						}else {
							  echo"<input type='radio' id='ossm' name='special' value='new'> NEW 
							  <input type='radio' id='ossm' name='special' value='promo'> PROMO 
							  <input type='radio' id='ossm' name='special' value='hot'> HOT 
							  <input type='radio' id='ossm' name='none' value='none' checked> NONE ";
						  }
		  echo"
					</td>
				</tr>
				
				<tr>
					<td>Tampil Depan</td><td>  : </td>
					<td>";
						if($r['tampil_depan'] == 'N'){
						echo"<input type='radio' id='ossm' name='tampil_depan' value='Y'> Yes 
						<input type='radio' id='ossm' name='tampil_depan' value='N' checked> No ";
						}else {
						echo"<input type='radio' id='ossm' name='tampil_depan' value='Y' checked> Yes 
						<input type='radio' id='ossm' name='tampil_depan' value='N'> No ";
						}
			echo"
					</td>
				</tr>
				
				<tr>
					<td>Deals</td><td>  : </td>
					<td>";
						if($r['deals'] == 'N'){
						echo"<input type='radio' id='ossm' name='deals' value='Y'> Yes 
						<input type='radio' id='ossm' name='deals' value='N' checked> No ";
						}else {
						echo"<input type='radio' id='ossm' name='deals' value='Y' checked> Yes 
						<input type='radio' id='ossm' name='deals' value='N'> No ";
						}
			echo"
					</td>
				</tr>
				
				<tr>
					<td>Featured</td><td>  : </td>
					<td>";
						if($r['featured'] == 'N'){
						echo"<input type='radio' id='ossm' name='featured' value='Y'> Yes 
						<input type='radio' id='ossm' name='featured' value='N' checked> No ";
						}else {
						echo"<input type='radio' id='ossm' name='featured' value='Y' checked> Yes 
						<input type='radio' id='ossm' name='featured' value='N'> No ";
						}
			echo"
					</td>
				</tr>
				
				<tr>
					<td>Best</td><td>  : </td>
					<td>";
						if($r['best'] == 'N'){
						echo"<input type='radio' id='ossm' name='best' value='Y'> Yes 
						<input type='radio' id='ossm' name='best' value='N' checked> No ";
						}else {
						echo"<input type='radio' id='ossm' name='best' value='Y' checked> Yes 
						<input type='radio' id='ossm' name='best' value='N'> No ";
						}
			echo"
					</td>
				</tr>
				<tr><td colspan=3  style='border-bottom:none; font-weight:bold'>Deskripsi Product</td></tr>
				<tr><td colspan=3><textarea name='detail' width:70%>$r[detail]</textarea></td></tr>
	  
				<tr><td>Gambar</td><td>  : </td><td><img width=200 src='../well_img/produk/$r[gambar]'></td></tr>
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
