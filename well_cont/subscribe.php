<?php				
include('../well_sys/koneksi.php');
	if(!empty($_POST['email'])) {
		mysql_query("INSERT INTO subscribe(email) 
					VALUES( '$_POST[email]' )");
			echo '<script type="text/javascript">window.alert("Terimakasih telah memasukkan email Anda. Dapatkan Promo karena telah berlangganan."); window.location.assign("../index.html")</script>';
	} else {
		echo '<script type="text/javascript">window.alert("Anda belum memasukkan Email"); history.go(-1) </script>';
	}
?>