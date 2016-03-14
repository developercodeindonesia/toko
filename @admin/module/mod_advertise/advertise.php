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
		$aksi="module/mod_advertise/aksi_advertise.php";
		switch($_GET['act']){
			default:
		?>
		
		
		
		<article style="min-width:535px;" class="module width_3_quarter">
			<header><h3 class="tabs_involved">Advertise Media</h3>
				
			</header>

			<table class='display' id='example'>
			<thead> 
				<tr>  
    				<th>No</th>
    				<th>Thumbnail</th> 
    				<th>Judul</th> 
    				<th>Link</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$slide = mysql_query("SELECT * FROM advertise ORDER BY id_advertise ASC");
				while($s=mysql_fetch_array($slide)){
				
				?>
				<tr style="background: #E2E4FF;">  
    				<th><?php echo"$no" ?></th>
    				<td><?php echo"$s[judul]" ?></td> 
    				<td><img width="250px" src="../well_img/advertise/<?php echo"$s[gambar]" ?>"/></td> 
    				<td><?php echo"$s[url]" ?></td> 
    				<td style="text-align:center">
						<a href="<?php echo"?module=advertise&act=edit&id=$s[id_advertise]";?>">
							<input type="image" src="images/icn_edit.png" title="Edit"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="<?php echo"$aksi?module=advertise&act=hapus&id=$s[id_advertise]";?>">
							<input type="image" src="images/icn_trash.png" title="Trash">
						</a>
					</td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
			<div class="clear"></div>
			<div class="clear"></div>
		</article>
		
		
		<article style="min-width:260px;" class="module width_quarter">
			 <header><h3>Add New advertise</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='<?php echo"$aksi"; ?>?module=advertise&act=input'>
				<div class="module_content">
						<fieldset>
							<label>Title</label> : 
							<input name="judul" type="text">
						</fieldset>
						<fieldset>
							<label>Link</label> : 
							<input name="url" type="text">
							&nbsp;&nbsp;&nbsp;&nbsp;*)Link harus mengunakan <b><i>http://</i></b> (contoh : <b><i>http://facebook.com/</i></b>)
						</fieldset>
						<fieldset>
							<label>Gambar advertise</label> : 
							<input type=file name='fupload' size=30> *)File gambar tipe JPG. ( ukuran gambar 270 x 387px )
						</fieldset>
						<br />
						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Publish" class="alt_btn"><br /><br />
				</div>
			</footer>
			</form>
		</article>
		<!-- end of post new article -->
		
		
		<?php break; 
		case"edit":
			$advertise = mysql_query("SELECT * FROM advertise WHERE id_advertise='$_GET[id]'");
				$g=mysql_fetch_array($advertise);
		
		?>
		
		<article class="module width_quarter">
			 <header><h3 class="tabs_involved">Edit advertise Media</h3>
				
				
			</header>
			 <form method='POST' enctype='multipart/form-data' action='<?php echo"$aksi"; ?>?module=advertise&act=update'>
				<input type='hidden' name='id' value='<?php echo"$g[id_advertise]" ?>'>
				<div class="module_content">
						<fieldset>
							<label>Title</label> : 
							<input name="judul" type="text" value="<?php echo"$g[judul]" ?>">
						</fieldset>
						<fieldset>
							<label>Link</label> : 
							<input name="url" type="text" value="<?php echo"$g[url]" ?>">
						</fieldset>
						<fieldset>
							<label>Gambar Slide</label> :<br />
							<img width="250px" src="../well_img/advertise/<?php echo"$g[gambar]" ?>">
						</fieldset>
						<fieldset>
							<label>Ganti advertise</label> : 
							<input type=file name='fupload' size=30> *)File gambar tipe JPG. ( ukuran gambar 270 x 387px )
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