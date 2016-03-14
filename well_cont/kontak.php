<?php				
include('../well_sys/koneksi.php');
	if(!empty($_POST['kode'])) {
		if($_POST['kode'] == $_POST['rahasia']) {
			mysql_query("INSERT INTO kontak(nama, email, subjek, tanggal, pesan) 
						VALUES('$_POST[nama]','$_POST[email]', '$_POST[subjek]', now(), '$_POST[pesan]')");
				echo '<script type="text/javascript">window.alert("Terimakasih telah menghubungi kami. Kami akan segera meresponnya."); window.location.assign("../contact-us.html")</script>';
			} else {
				echo '<script type="text/javascript">window.alert("Hitungan Anda salah, ulangi lagi"); history.go(-1) </script>';
				}
	} else {
		echo '<script type="text/javascript">window.alert("Anda belum memasukkan kode"); history.go(-1) </script>';
		}
?>