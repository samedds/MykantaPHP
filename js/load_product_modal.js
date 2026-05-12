function Load_product_content_on_modal(product)
{
	if(product == "")
	{
		alert("Please report this to support@mykanta.com");
	}
	else
	{
		//$(".modal-body-prd").html('');
	
		document.getElementById('modal-body-prd').innerHTML  = '<div class=""><img src="/img/loading.gif"/></div>'; 
		$("#product").modal('show');
		
		var product_id = product;
		var shop_id = $('#shop_id').val();
		var shopName = $('#shopName').val();	//new
		
		$.post("/ajax/load_product_modal.php",  
		{
		 task : "load_product",
		product_id: product_id,
		shop_id: shop_id,
		shopName: shopName,						//new
			cache: false,
			})
			.error(
		  
			   function( )
			   {
			   $(".modal-body-prd").html("Failed, reload page and try again");
			   })
			.success(function(response)
			{
			     //$(".modal-body-prd").removeClass('loader');
			     $(".modal-body-prd").html(response);
				
			});
		
	}
}

