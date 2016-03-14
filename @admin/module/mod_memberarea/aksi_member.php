<?php
include "../../../josys/koneksi.php";
include "../../../josys/library.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus partner
if ($module=='member' AND $act=='hapus'){

	$id = $_GET['id'];

	mysql_query("DELETE FROM memberarea WHERE id_member='$id'");
	
	header('location:../../page.php?module='.$module);
}

// Update Member
elseif ($module=='member' AND $act=='update2'){
    mysql_query("UPDATE memberarea SET blokir = '$_POST[blokir]' 
                            WHERE id_member = '$_POST[id]'");
	
	header('location:../../page.php?module='.$module);
  
}


// Update Password
elseif ($module=='member' AND $act=='password'){
	$password = $_POST['password'];
	$password_lama = $_POST['password_lama'];
	$pass = md5($_POST['password']);
	
    if($password == $password_lama){
			mysql_query("UPDATE memberarea SET password = '$pass' 
                            WHERE id_member = '$_POST[id]'");
	
	header('location:../../page.php?module='.$module);
	}else{echo"<script type='text/javascript'>alert('Password yang anda masukkan salah. Coba lagi!'); history.go(-1) </script>";}
	
}
?>
