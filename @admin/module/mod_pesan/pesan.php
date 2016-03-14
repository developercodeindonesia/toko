<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_pesan/aksi_pesan.php";
switch($_GET[act]){
  // Tampil slide
  default:
    echo "<h2>PESAN MASUK</h2>
          <table id='exampless' class='display' cellspacing='0' width='100%'>
          <thead style='background: #9B9B9B;'>
		  <tr>
		  <th>No</th>
		  <th>Nama</th>
		  <th>Email</th>
		  <th>Tanggal</th>
		  <th>Aksi</th>
		  </tr></thead><tbody>";
    $tampil=mysql_query("SELECT * FROM kontak ORDER BY id_kontak DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
      echo "<tr><td>$no</td>
	  <td>$r[nama]</td>
	  <td>$r[email]</td>
	  <td>$r[tanggal]</td>
	  <td><a href=?module=pesan&act=edit_pesan&id=$r[id_kontak]>Detail</a> | 
	                  ";?><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=pesan&act=hapus&id=$r[id_kontak]>Hapus</a>
		        </tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
    
	case "edit_pesan":
	
	$order = mysql_query("SELECT * FROM kontak WHERE id_kontak='$_GET[id]'");
	$r    = mysql_fetch_array($order);

    echo "<h2>Detail Pesan Masuk</h2>"; ?>
		  
		  <form method='POST' enctype='multipart/form-data' action='<?php echo"$aksi"; ?>?module=pesan&act=update'>
				<input type='hidden' name='ide' value='<?php echo"$_GET[id]" ?>'>
				<div class="module_content">
						<table  style="width:100%;">
							<tr>
								<td style="width:30%;"><label>Nama</label></td>
								<td style="width:70%; margin-bottom:8px;">:<?php echo"$r[nama]" ?></td>
							</tr>
							<tr>
								<td style="width:10%;"><label>Date and Time Order</label></td>
								<td style="width:1000px; margin-bottom:8px;">:<?php echo"$r[tanggal] " ?></td>
							</tr>
							<tr>
								<td style="width:10%;"><label>Email</label></td>
								<td style="width:1000px; margin-bottom:8px;">:<?php echo"$r[email] " ?></td>
							</tr>
							<tr>
								<td style="width:10%;"><label>Subject</label></td>
								<td style="width:1000px; margin-bottom:8px;">:<?php echo"$r[subjek] " ?></td>
							</tr>
							<tr>
								<td style="width:10%;"><label>Message</label></td>
								<td style="width:1000px; margin-bottom:8px;">:<?php echo"$r[pesan] " ?></td>
							</tr>
						</table>
						
						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="button" onclick='self.history.back()' value="Back"><br /><br />
				</div>
			</footer>
			</form>
			
		  <?php
    break;  
}
}
?>
