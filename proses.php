<?php
require ('well_sys/koneksi.php');

$jp =mysql_real_escape_string($_GET['kota']);
$kt = mysql_query("SELECT * FROM kota WHERE id_jasa='$jp'");
while($data = mysql_fetch_array($kt)){
    echo "<option value='$data[id_kota]'>$data[nama_kota]</option>";
}
?>
