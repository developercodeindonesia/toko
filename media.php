<?php
	//start session
	ob_start();
	session_start();
	error_reporting(0);
	//require system files
	include "well_sys/koneksi.php";
	include "well_sys/library.php";
	include "well_sys/fungsi_input.php";
	include "well_sys/fungsi_rupiah.php";
	include "well_sys/class_paging.php";
	include "well_sys/iuk.php";
	//include template
	//include "breadcumb.php";
	include "template.php";
	ob_end_flush();
?>
