<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_color/aksi_color.php";
switch($_GET[act]){
  // Tampil
  default:
    echo "<h2>EDIT COLOR</h2>
          <input type=button  class=butt value='Tambahkan Color' onclick=location.href='?module=color&act=color'>
          <table id='exampless' class='display' cellspacing='0' width='100%'>
          <thead style='background: #9B9B9B;'><tr><th>No</th><th>Nama Warna</th><th>Color</th><th>Aksi</th></tr></thead><tbody>";
    $tampil=mysql_query("SELECT * FROM color ORDER BY id_color DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
      echo "<tr><td>$no</td>
	  <td>$r[color]</td>
	  
	  <td class='colorproduk' style=' width: 20px; height: 20px;'>
		<div class='clr' style='background-color:$r[color]; height:40px; width: 55px; float:left; position: relative; margin-left:5px; margin-right:0px; margin-bottom: 2px; box-shadow: 0px 0px 8px #000; border-radius:3px;'><div class='clear'></div></div>
	  </td>
	  <td><a href=?module=color&act=edit_color&id=$r[id_color]>Edit</a> | 
	                  ";?><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=color&act=hapus&id=$r[id_color]>Hapus</a>
		        </tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "color":
    echo "<h2>TAMBAHKAN COLOR</h2>
          <form method=POST action='$aksi?module=color&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Nama Color</td><td>  : <input type=color value='' name='color' size=30></td></tr>
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
		   <tr><td>Nama Color</td><td>     : <input type=color name='color' size=30 value='$r[color]'></td></tr>
          <tr><td colspan=2><input type=submit class=butt value=Update>
                            <input type=button class=butt value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>
