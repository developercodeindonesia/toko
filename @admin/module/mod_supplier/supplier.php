<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_supplier/aksi_supplier.php";
switch($_GET[act]){
  // Tampil slide
  default:
    echo "<h2>EDIT Supplier</h2>
          <input type=button  class=butt value='Tambahkan Supplier' onclick=location.href='?module=supplier&act=tambah_slide'>
          <table id='exampless' class='display' cellspacing='0' width='100%'>
          <thead style='background: #9B9B9B;'><tr><th>No</th><th>Supplier</th><th>Aksi</th></tr></thead><tbody>";
    $tampil=mysql_query("SELECT * FROM supplier ORDER BY id_supplier DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
      echo "<tr><td>$no</td>
	  <td>$r[nama]</td>
	  <td><a href=?module=supplier&act=edit_supplier&id=$r[id_supplier]>Edit</a> | 
	                  ";?><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=supplier&act=hapus&id=$r[id_supplier]>Hapus</a>
		        </tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambah_slide":
    echo "<h2>TAMBAHKAN SUPPLIER</h2>
          <form method=POST action='$aksi?module=supplier&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Nama Supplier</td><td>  : <input type=text name='nama' size=30></td></tr>
          <tr><td colspan=2>
		  <input type=submit class=butt value=Simpan>
          <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form><br /><br />";
     break;
    
  case "edit_supplier":
    $edit = mysql_query("SELECT * FROM supplier WHERE id_supplier='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>EDIT SUPPLIER PRODUK</h2>
			
          <form method=POST enctype='multipart/form-data' action=$aksi?module=supplier&act=update>
          <input type=hidden name=id value=$r[id_supplier]>
		  
          <table>
		   <tr><td>Nama Supplier</td><td>     : <input type=text name='nama' size=30 value='$r[nama]'></td></tr>
          <tr><td colspan=2><input type=submit class=butt value=Update>
                            <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
