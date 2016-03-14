<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="module/mod_memberarea/aksi_member.php";
switch($_GET[act]){
  // Tampil Member
  default:
    echo "<h2>MEMBER AREA</h2>
          <table id='exampless' class='display' cellspacing='0' width='100%'>
          <thead style='background: #9B9B9B;'>
		  <tr>
		  <th>No</th>
		  <th>Nama</th>
		  <th>Nomor Telepon</th>
		  <th>Blokir</th>
		  <th>Email</th>
		  <th>Aksi</th>
		  </tr></thead><tbody>";
    $tampil=mysql_query("SELECT * FROM memberarea ORDER BY id_member DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    
      echo "<tr><td>$no</td>
	  <td>$r[nama]</td>
	  <td>$r[no_telp]</td>
	  <td>$r[blokir]</td>
	  <td>$r[email]</td>
	  <td><a href=?module=member&act=edit_member&id=$r[id_member]>Detail</a> | 
	  ";?><a onclick="return confirm('Apakah anda yakin menghapus data ini?');" <?php echo"href=$aksi?module=member&act=hapus&id=$r[id_member]>Hapus</a>
	</tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
    
	case "edit_member":
	
	$order = mysql_query("SELECT * FROM memberarea WHERE id_member='$_GET[id]'");
	$r    = mysql_fetch_array($order);

    echo "<h2>Detail Member</h2>"; ?>
		  
		  <form method='POST' enctype='multipart/form-data' action='<?php echo"$aksi"; ?>?module=member&act=update2'>
				<input type='hidden' name='id' value='<?php echo"$_GET[id]" ?>'>
				<div class="module_content">
						<table  style="width:100%;">
							<tr>
								<td style="width:20%;"><label>Nama</label></td>
								<td style="width:70%; margin-bottom:8px;">:<?php echo"$r[nama]" ?></td>
							</tr>
							<tr>
								<td style="width:20%;"><label>Alamat</label></td>
								<td style="width:70%; margin-bottom:8px;">:<?php echo"$r[alamat]" ?></td>
							</tr>
							<tr>
								<td style="width:10%;"><label>Nomor Telepon</label></td>
								<td style="width:70%; margin-bottom:8px;">:<?php echo"$r[no_telp] " ?></td>
							</tr>
							<tr>
								<td style="width:10%;"><label>Email</label></td>
								<td style="width:70%; margin-bottom:8px;">:<?php echo"$r[email] " ?></td>
							</tr>
							<tr>
								<td style="width:10%;"><label>Blokir</label></td>
								<td>
								<?php 
									if($r['blokir'] == 'N'){
								?>
									<input type="radio" name="blokir" class="radio" value="Y" > Yes 
									<input type="radio" name="blokir" class="radio" value="N" checked > No
								<?php } else {?>
									<input type="radio" name="blokir" class="radio" value="Y"  checked> Yes 
									<input type="radio" name="blokir" class="radio" value="N" > No
								<?php } ?>
								</td>
							</tr>
						</table>
						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type='button'  class='tombol' value='Ubah Password' onclick="location.href='?module=member&act=password&id=<?php echo"$r[id_member]"; ?>'">
					<input type="button" onclick='self.history.back()' value="Back"><br /><br />
				</div>
			</footer>
			</form>
			
		  <?php
    break;
		case "password": 
		?>
		<h2>Ubah Password</h2>
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=member&act=password'>
				<input type="hidden" name="id" value='<?php echo"$_GET[id]"; ?>'>
				<div class="module_content">
						<fieldset><label>Password</label><br /><br />
							<input style="width:96%; margin-bottom:8px;" name="password" type="text" required>
						</fieldset>
						<fieldset><label>Retype Password</label><br /><br />
							<input style="width:96%; margin-bottom:8px;" name="password_lama" type="text" required>
						</fieldset>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input type="button" onclick='self.history.back()' value="Back">
				</div>
			</footer>
			</form>
	<?php 
			break;
}
}
?>
