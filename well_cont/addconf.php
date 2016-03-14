<?php
		
	
		$no_order=mysql_real_escape_string($_POST['frm_no_order']);
		$email=mysql_real_escape_string($_POST['frm_email']);
		$phone=mysql_escape_string($_POST['frm_phone']);
		$no_rekening=mysql_real_escape_string($_POST['frm_no_rekening']);
		$nama_rekening=mysql_real_escape_string($_POST['frm_nama_rekening']);
		$nama_bank=mysql_real_escape_string($_POST['frm_nama_bank']);
		$jumlah=mysql_real_escape_string($_POST['frm_jumlah']);
		$catatan=mysql_real_escape_string($_POST['frm_catatan']);
		$tanggal=date("Y-m-d");

		$cek_id_order="select id_orders from orders where id_orders='".$no_order."'";
		$result_order=mysql_query($cek_id_order);
		$rows=mysql_num_rows($result_order);
		if($rows == 0){
		header("location: konfirmasi-not-found.html");
		}else{

		$sql_insert="insert into konfirmasi values ('',
				'$no_order',
				'$email',
				'$phone',
				'$no_rekening',
				'$nama_rekening',
				'$nama_bank',
				'$jumlah',
				'$catatan',
				'$tanggal',
				'N')";
		// echo $sql_insert; exit;
		$result=mysql_query($sql_insert);
		if($result){
		header("location: konfirmasi-bayar.html");
	}
}

?>