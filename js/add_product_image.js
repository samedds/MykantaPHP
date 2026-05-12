
function insert_image_loc_to_db_and_count(myfile,product_id)
{

	if(myfile == "")
	{
	var shop_id = $('#shop_id').val();
	    $('#vpb_uploads_displayer').html('<h4 class="text-warning">Choose a product image </h4>'+myfile +product_id +shop_id);
	}
	else
	{
		var shop_id = $('#shop_id').val();
		var product_id = product_id;
	    var myfile = myfile;
		
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
				  $(".upload_message").html(response);
			   })
			   
		.success(function(response)
			{
              $(".upload_message").removeClass('loading');
	          $(".upload_message").html(response);
			});
		
	}
}

