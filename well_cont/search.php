<form method='POST' action='prosesCari'>
	<div class="control-group">

		
		<?php 
			$sql=mysql_query("SELECT * FROM subkategori ORDER BY nama");
			echo "<select name='katprod'  class='categories-filter animate-dropdown'>";
			echo "<option class='dropdown' value='0' selected> Pilih Kategori Produk </option>";
			while($s=mysql_fetch_array($sql))
			{
				echo "<option class='dropdown' value='$s[id_subkategori]'>$s[nama]</option>";
			}
			echo "<option class='dropdown' value='0'> Semua Kategori </option>";
			echo "</select>";
		?>
		<input name='search' class='search-field' type='text' placeholder='Kata kunci...' />

		<input type='submit' id="find" class='search-button' value='' title='Cari' />
		

	</div>
</form>