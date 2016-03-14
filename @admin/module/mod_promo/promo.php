<?php
$aksi="module/mod_promo/aksi_promo.php";
switch($_GET[act]){
  // Tampil Komentar
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='10'");
    $r    = mysql_fetch_array($sql);

		echo "<h2>EDIT CONCEPT</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=editpromo&act=update>
          <input type=hidden name=id value=$r[id_modul]>
		  
          <table>
     	 <tr><td>Judul</td><td><input type='text' name='judul' value='$r[nama_modul]' width:50px></td></tr>
         <tr><td>Keterangan</td><td><textarea name='isi' id='jogmce'>$r[static_content]</textarea></td></tr>
		 <tr><td>Gambar</td>       <td> :  ";
          if ($r[gambar]!=''){
              echo "<img src='../joimg/foto_content/$r[gambar]'> ";
          }
         echo"</td></tr>
          <tr><td>Ganti Gambar</td>    <td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
		  <tr><td><input type=submit value=Update></td></tr>";
         echo"</form></table>";
    break;  
}
?>
