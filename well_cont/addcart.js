
	function addtochart(id){
        
		var color = $('select#ukur option:selected').val();
		
		$.ajax( {
			type: 'POST',
			url: 'well_cont/addcart.php',
			data: {id:id, color:color}, 

			success: function(data) {
				$('.cart').html(data);
			}
		} );
		
      }