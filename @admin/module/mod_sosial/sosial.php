<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else { ?>

<style type="text/css" title="currentStyle">
    @import "media/css/demo_table_jui.css";
    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
</script>

<script>
$(document).ready( function () {
     var oTable = $('#example').dataTable( {
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
				} );		
} );
</script>
<style>.ui-widget-header{background:none;border:none;}</style>


		
		<?php
		$aksi="module/mod_sosial/aksi_sosial.php";
		switch($_GET['act']){
			default:
		?>
		
		
		
		<article style="min-width:535px;" class="module width_3_quarter">
			<header><h3 class="tabs_involved">Sosial Media</h3>
				
			</header>

			<table class='display' id='example'>
			<thead> 
				<tr>  
    				<th>No</th>
    				<th>Tittle</th> 
    				<th>Link</th> 
					<th width="30%">Thumbnail</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$slide = mysql_query("SELECT * FROM sosial ORDER BY id_sosial ASC");
				while($s=mysql_fetch_array($slide)){
				
				?>
				<tr style="background: #E2E4FF;">  
    				<th><?php echo"$no" ?></th>
    				<td><?php echo"$s[judul]" ?></td> 
    				<td><?php echo"$s[link]" ?></td> 
					<td width="50px"><img height="50px" src="../joimg/sosmed/<?php echo"$s[gambar]" ?>"></td> 
    				<td style="text-align:center"><a href="<?php echo"?module=sosial&act=edit&id=$s[id_sosial]";?>">
						<input type="image" src="images/icn_edit.png" title="Edit"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="<?php echo"$aksi?module=sosial&act=hapus&id=$s[id_sosial]";?>">
						<input type="image" src="images/icn_trash.png" title="Trash"></a>
					</td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
			<div class="clear"></div>
			<div class="clear"></div>
		</article>
		
		<article style="min-width:260px;" class="module width_quarter">
			 <header><h3>Add New Sosial Media</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='<?php echo"$aksi"; ?>?module=sosial&act=insertnew'>
				<div class="module_content">
						<fieldset>
							<label>Title</label>
							<input name="judul" type="text">
						</fieldset>
						<fieldset>
							<label>Link</label>
							<input name="link" type="text">
							&nbsp;&nbsp;&nbsp;&nbsp;*)Link harus mengunakan <b><i>http://</i></b> (contoh : <b><i>http://facebook.com/</i></b>)
						</fieldset>
						<fieldset style="float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Thumbnail</label><br />
							<input style="margin-left:10px; margin-right:-20px;" type="file" name="fupload">
							&nbsp;&nbsp;&nbsp;&nbsp;*) Important image size 188x106 px.
						</fieldset>
						<div class="clear"></div><br/>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Publish" class="alt_btn">
				</div>
			</footer><br/>
			</form>
		</article><!-- end of post new article -->
		
		
		<?php break; 
		case"edit":
			$sosial = mysql_query("SELECT * FROM sosial WHERE id_sosial='$_GET[id]'");
				$g=mysql_fetch_array($sosial);
		
		?>
		
		<article class="module width_quarter">
			 <header><h3 class="tabs_involved">Edit Sosial Media</h3>
				
				
			</header>
			 <form method='POST' enctype='multipart/form-data' action='<?php echo"$aksi"; ?>?module=sosial&act=update'>
				<input type='hidden' name='id' value='<?php echo"$g[id_sosial]" ?>'>
				<div class="module_content">
						<fieldset>
							<label>Title</label>
							<input name="judul" type="text" value="<?php echo"$g[judul]" ?>">
						</fieldset>
						<fieldset>
							<label>Link</label>
							<input name="link" type="text" value="<?php echo"$g[link]" ?>">
						</fieldset>
						<fieldset style="float:left; width:30%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Change Thumbnail</label><br /><br />
							<input style="margin-left:10px; margin-right:-20px;" type="file" name="fupload">
							<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 188x106 px.
						</fieldset>
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
					<input style="margin-top:5px;margin-right:10px;" type='button'  class='tombol' value='Back' onclick='self.history.back()'>
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		<br />
		
		<?php
		
		break; 
		 } ?>
		
<?php } ?>