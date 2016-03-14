<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../josys/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='users' AND $act=='hapus'){		
	mysql_query("DELETE FROM users WHERE id='$_GET[id]'");
	header('location:../../page.php?module='.$module);
}

// Input users
if ($module=='users' AND $act=='input'){
  $pass=md5($_POST['password']);
  mysql_query("INSERT INTO users(usersname,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
                                 level) 
	                       VALUES('$_POST[usersname]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
                                '$_POST[level]' )");
  header('location:../../page.php?module='.$module);
}

// Update users
elseif ($module=='users' AND $act=='update'){
  if (empty($_POST['password'])) {
    mysql_query("UPDATE users SET nama_lengkap   = '$_POST[nama_lengkap]',
                                  email          = '$_POST[email]', 
                                  no_telp        = '$_POST[no_telp]'  
                           WHERE  id     = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST['password']);
    mysql_query("UPDATE users SET password        = '$pass',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
                                 email           = '$_POST[email]',   
                                 no_telp         = '$_POST[no_telp]'  
                           WHERE id      = '$_POST[id]'");
  }
  header('location:../../page.php?module='.$module);
}

elseif ($module=='users' AND $act=='ubahpassword'){
	
	$tampil=mysql_query("SELECT * FROM users WHERE id='$_POST[id]'");
	$ex=mysql_fetch_array($tampil);
	$pass=md5($_POST['password']);
	$password_baru=md5($_POST['password_baru']);
	
	
	if($ex['password']==$pass){	
		if($_POST['password_baru'] == $_POST['password_baru2']){
			mysql_query("UPDATE users SET password   = '$password_baru'
                           WHERE  id     = '$_POST[id]'");
			
			echo"<script type='text/javascript'>window.alert('Password berhasil di ubah!'); history.go(-2) </script>";
		}else{
			echo"<script type='text/javascript'>window.alert('Password baru tidak sama! Ulangi lagi'); history.go(-1) </script>";
		}
	}else{
		echo"<script type='text/javascript'>window.alert('Password lama salah! Ulangi lagi'); history.go(-1) </script>";
	}

}
}
?>
