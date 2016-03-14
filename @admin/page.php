<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	include("loop.php");
}
else{
	include("../well_sys/koneksi.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="css/reset.css" type="text/css"/>
	<link rel="stylesheet" href="css/screen.css" type="text/css"/>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<link rel="stylesheet" href="css/zistyle.css" type="text/css"/>
	<link rel="stylesheet" href="css/sidebar.css">
	
    <link rel="shortcut icon" href="images/favicon.png" />
	
	<script type="text/javascript" src="js/jquery.js"></script>
	
	<style type="text/css" title="currentStyle">
		@import "media/css/demo_table_jui.css";
		@import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>
	
	<link rel="stylesheet" href="media/css/jquery.dataTables.css" type="text/css"/>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="js/jquery.visualize.js"></script>
	
	
	<script>
		$(document).ready( function () {
			 var oTable = $('#exampless').dataTable( {
							"bJQueryUI": true,
							"sPaginationType": "full_numbers",
						} );		
		} );
	</script>
	
<!-- TinyMCE 4.x --> 
	<script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">

		tinymce.init({
			selector: "textarea",

			// ===========================================
			// INCLUDE THE PLUGIN
			// ===========================================

			plugins: [
			"advlist autolink lists link image charmap print preview anchor spellchecker",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste jbimages"
			],

			// ===========================================
			// PUT PLUGIN'S BUTTON on the toolbar
			// ===========================================

			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect |  bullist numlist outdent indent | link image jbimages",

			// ===========================================
			// SET RELATIVE_URLS to FALSE (This is required for images to display properly)
			// ===========================================

			relative_urls: false

		});
	 
	</script>
<!-- /TinyMCE -->
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!--Menu-->
	<link rel="stylesheet" href="menu/css/stylesheet.css" type="text/css"/>
	<link rel="stylesheet" href="css/icons.css" type="text/css"/>
	<!--
	<script type='text/javascript' src='menu/js/actions.js'></script>
	-->
	<script src="js/script.js"></script>
	<?php 
		//Script Ajax
		include "ajax.php"; 
	?>
</head>
<title>Administrator</title>
<body>
    <div class="header">
        <a class="logo" href="page.php?module=home"><img src="menu/img/logo.png" alt="admin panel" title=""/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
			<li style='color: white;'><strong>Welcome Admin</strong><?php echo "$_POST[username]"; ?></li>
			<li><a href="logout.php"><img src="images/btn_logout.png" width="83" alt="" class="icon" /></a></li>
        </ul>    
    </div>
	<div class="sidebar">
		
		
	<div class="breadLine">            
		<div class="arrow"></div>
		<div class="adminControl active">
			<?php echo "Hallo,$_SESSION[namalengkap]"; ?>
		</div>
	</div>
        
	<div class="admin">
		<div class="kotak">
		<div class="image">
			<img src="images/logo.png" width="100px">
		</div>
		<div class="tulisan">
		
		</div>
		</div>
	</div>
	
	<?php
		include "inc/sidebar.php";
	?>
    </div>
	<div class="main">
		<div class="main-wrap">
		
			<div class="page clear">			
				<!-- MODAL WINDOW -->
				<div id="modal" class="modal-window"></div>
				<!-- CONTENT BOXES -->			
				<div class="content-box">
					<?php include "content.php"; ?>
				</div>
				<!-- /CONTENT BOXES -->
				<div class="clear"></div>
		
				<div class="footer clear">
					<span class="copy" style="margin-left: 14px;color: #fff;"><strong>© 2016 Developed By <a href="jogjasite.com">JogjaSite.com</a></strong>
				</div>
			</div>
		</div>
	</div>
	
	
</body>
</html>
<?php }?>