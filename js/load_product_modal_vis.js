function Load_product_content_on_modal(product_id)
{
	if(product_id == "")
	{
		alert("Please report this to support@mykanta.com");
	}
	else
	{
		document.getElementById('modal-body-prd').innerHTML  = '<div class=""><img src="/img/loading.gif"/></div>'; 
		$("#product").modal('show');
		var shopName = $('#shopName').val();
		var shop_id = $('#shop_id').val();
		
		$.post("/ajax/load_product_modal_vis.php",  
		{
		 task : "load_product",
		product_id: product_id,
		shop_id: shop_id,
		shopName: shopName,
			cache: false,
			})
			.error(
		  
			   function( )
			   {
				   $(".modal-body-prd").html("Failed, reload page and try again");
			   })
			.success(function(response)
			{
	 // $(".modal-body-prd").removeClass('loader');
			     $(".modal-body-prd").html(response);
				
			});
		
	}
}



function Load_product_content_on_modal_search(product)
{
	if(product == "")
	{
		alert("Please report this to support@mykanta.com");
	}
	else
	{
		document.getElementById('modal-body-prd').innerHTML  = '<div class=""><img src="/img/loading.gif"/></div>'; 
		$("#product").modal('show');
		
		var product_id = product;
		var shop_id = $('#shop_id_search').val();
		var shopName = $('#shopName_search').val();	//new
		
		$.post("/ajax/load_product_modal_vis.php",  
		{
		 load_product_search : "load_product_search",
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
			    // $(".modal-body-prd").removeClass('loader');
			     $(".modal-body-prd").html(response);
				
			});
		
	}
}

