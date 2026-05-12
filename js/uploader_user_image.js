
function insert_image_loc_to_db_and_count(product)
{
var myfile = $('#myfile').val();
	if(myfile == "")
	{
	
	    $('#vpb_uploads_displayer').html('<h4 class="text-warning">Choose a product image</h4>');
		
	}
	else
	{
		
		
		
		var shop_id = $('#shop_id').val();
		var product_id = product;
	    var myfile = $('#myfile').val();
		
		
		$.post("/ajax/add_product_image.php",  
		{
		 task : "add_product",
		product_id: product_id,
		shop_id: shop_id,
		myfile: myfile,
			cache: false,
			})
			
		.error(
		  
			   function( )
			   {
				  console.log( "Error: "+myfile +product_id +shop_id );
			   })
			   
		.success(function(response)
			{
			 $( '#myfile' ).val("");
			 console.log( "Error: "+myfile +product_id +shop_id );
	 $(".upload_message").removeClass('loading');
	 $(".upload_message").html(response);
				
			});
		
	}
}

