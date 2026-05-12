
function settings_product_id(product_id)
{
	if(product_id == "")
	{
		alert("The programming language function field in the clicked button must not be empty please.");
	}
	else
	{
var productName_setings = $( '#productName_setings' ).val(); 
var product_id = $( '#product_id' ).val(); 
var product_descrb_setings = $( '#product_descrb_setings' ).code(); 
var price_setings = $( '#price_setings' ).val();
		
		//console.log(shopName );
		if( productName_setings.length < 1 && product_descrb_setings.length < 1 && price_setings.length < 1 )
		{
	       document.getElementById("setproduct").innerHTML = '<span class="text-danger">No entry</span>';
		}
		else
		{
			$.post("/ajax/settings_product.php",  
		{
		 task : "task",
		productName_setings : productName_setings,
		product_descrb_setings : product_descrb_setings,
		price_setings : price_setings,
		product_id : product_id,
	   cache: false,
			})
			.error(
		  
			   function( )
			   {
				  console.log( "Error: " );
			   })
			.success(function(response)
			{
			     $("#setproduct").removeClass('loader');
			     $("#setproduct").html(response);

			});
		}
	}
}

