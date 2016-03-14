<div class="col-md-12 terms-conditions">
	<?php
	$sssql=mysql_query("SELECT * FROM modul WHERE id_modul='$_GET[id]' ");
	$sss=mysql_fetch_array($sssql);?>
	<h2><?php echo "$sss[nama_modul]"; ?></h2>
	<div class="inner-top-sm" style="padding-top: 25px;">
		<table id="datatables" class="display">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Nama</th>
					<th>File</th>
					<th>Download</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$result = mysql_query("SELECT * FROM download");
				$nos = 1;
				while ($cz = mysql_fetch_array($result)) {
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $cz['tanggal']?></td>
						<td><?php echo $cz['judul']?></td>
						<td><?php echo $cz['nama_file']?></td>
						<td><a target="_blank" href="<?php echo "files/$cz[nama_file]"; ?>">View</a></td>
					</tr>
					<?php
					$nos++;
				}
				?>
			</tbody>
		</table>
	<div class="clear"></div>
	</div>
</div>
		
	