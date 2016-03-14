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
		$aksi="module/mod_banner/aksi_banner.php";
		switch($_GET['act']){
			default:
		?>
		
		
		
		<article style="min-width:535px;" class="module width_3_quarter">
			<header><h3 class="tabs_involved">banner Media</h3>
				
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
				$slide = mysql_query("SELECT * FROM banner ORDER BY id_banner ASC");
				while($s=mysql_fetch_array($slide)){
				
				?>
				<tr style="background: #E2E4FF;">  
    				<th><?php echo"$no" ?></th>
    				<td><?php echo"$s[judul]" ?></td> 
    				<td><img width="250px" src="../well_img/banner/<?php echo"$s[gambar]" ?>"/></td> 
    				<td><?php echo"$s[url]" ?></td> 
    				<td style="text-align:center"><a href="<?php echo"?module=banner&act=edit&id=$s[id_banner]";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php /*<a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="<?php echo"$aksi?module=banner&act=hapus&id=$s[id_banner]";?>"><input type="image" src="images/icn_trash.png" title="Trash"></a></td>*/ ?> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
			<div class="clear"></div>
			<div class="clear"></div>
		</article>
		
		<?php /* 
		<article style="min-width:260px;" class="module width_quarter">
			 <header><h3>Add New Banner</h3></header>
			 <form method='POST' enctype='multipart/form-data' action='<?php echo"$aksi"; ?>?module=banner&act=input'>
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
							<label>Gambar Banner</label> : 
							<input type=file name='fupload' size=30> *)File gambar tipe JPG. ( ukuran gambar 230 x 450px )
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
		
		*/
		?>
		
		<?php break; 
		case"edit":
			$banner = mysql_query("SELECT * FROM banner WHERE id_banner='$_GET[id]'");
				$g=mysql_fetch_array($banner);
		
		?>
		
		<article class="module width_quarter">
			 <header><h3 class="tabs_involved">Edit banner Media</h3>
				
				
			</header>
			 <form method='POST' enctype='multipart/form-data' action='<?php echo"$aksi"; ?>?module=banner&act=update'>
				<input type='hidden' name='id' value='<?php echo"$g[id_banner]" ?>'>
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
							<img width="250px" src="../well_img/banner/<?php echo"$g[gambar]" ?>">
						</fieldset>
						<fieldset>
							<label>Ganti Banner</label> : 
							<input type=file name='fupload' size=30> *)File gambar tipe JPG. ( ukuran gambar 230 x 450px )
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