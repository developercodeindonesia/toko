<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_parentkategori/aksi_parentkategori.php";
switch($_GET[act]){
  // Tampil daftar
  default:
    echo "<h2>EDIT PARENT KATEGORI</h2>
          <input type=button  class=butt value='Tambahkan Parent Kategori' onclick=location.href='?module=parentkategori&act=tambah_parentkategori'>
          <table id='exampless' class='display' cellspacing='0' width='100%'>
          <thead style='background: #9B9B9B;'><tr><th>No</th><th>Parent Kategori</th><th>Aksi</th></tr></thead><tbody>";
    $tampil=mysql_query("SELECT * FROM parentkategori ORDER BY id_parentkategori ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
      echo "<tr><td>$no</td>
	  <td>$r[nama]</td>
	  <td><a href=?module=parentkategori&act=edit_parentkategori&id=$r[id_parentkategori]>Edit</a> | 
	                  ";?><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=parentkategori&act=hapus&id=$r[id_parentkategori]>Hapus</a>
		        </tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambah_parentkategori":
    echo "<h2>TAMBAHKAN PARENT KATEGORI</h2>
          <form method=POST action='$aksi?module=parentkategori&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Nama Parent Kategori</td><td>  : <input type=text name='parentkategori' size=30></td></tr>
          <tr><td colspan=2>
		  <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form><br /><br />";
     break;
    
  case "edit_parentkategori":
    $edit = mysql_query("SELECT * FROM parentkategori WHERE id_parentkategori='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>EDIT PARENT KATEGORI PRODUK</h2>
			
          <form method=POST enctype='multipart/form-data' action=$aksi?module=parentkategori&act=update>
          <input type=hidden name=id value=$r[id_parentkategori]>
		  
          <table>
		   <tr><td>Nama Parent Kategori</td><td>     : <input type=text name='parentkategori' size=30 value='$r[nama]'></td></tr>
          <tr><td colspan=2><input type=submit class=butt value=Update>
                            <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
