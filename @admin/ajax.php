<!--Kategori-->
<script type="text/javascript">
	$(document).ready(function(){
		$("#kat").change(function(){
			var kategori=$("#kat").val();
			$.ajax({
				url:"file_ajax/kateg.php",
				data:"kategori="+kategori,
				success:function(data){
					$("#subkat").html(data);
				}
			})
		})
		
	});
</script>
<!--
<script type="text/javascript">
	$(document).ready(function(){
		$("#kat").change(function(){
			var kategori=$("#kat").val();
			$.ajax({
				url:"file_ajax/kategori.php",
				data:"kategori="+kategori,
				success:function(data){
					$("#subkat").html(data);
				}
			})
		})
		
		$("#subkat").change(function(){
			var subkategori=$("#subkat").val();
			$.ajax({
				url:"file_ajax/subkategori.php",
				data:"subkategori="+subkategori,
				success:function(data){
					$("#subsub").html(data);
				}
			})
		})
	});
</script>
-->