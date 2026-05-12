
function settings_shop_id(shop_id)
{
	if(shop_id == "")
	{
		alert("The programming language function field in the clicked button must not be empty please.");
	}
	else
	{
	
		 var shopName_setings = $( '#shopName_setings' ).val(); 
		 var shop_descrb_setings = $( '#shop_descrb_setings' ).val();
		 var address_setings = $( '#address_setings' ).val();
		 var telephone_setings = $( '#telephone_setings1' ).val();
		 //var telephone_setings = parseInt(telephone_setings1);
		 var city_setings = $( '#city_setings' ).val();
		
		//console.log(telephone_setings);
		
		if( shopName_setings.length < 1 && shop_descrb_setings.length < 1 && address_setings.length < 1 && telephone_setings.length < 1 && city_setings.length < 1 )
		{
	       document.getElementById("setshop").innerHTML = '<span class="text-danger">No Entry</span>';
		}
		else
		{
		
		$.post("/ajax/settings_shop.php",  
		{
		 task : "task",
		shopName_setings : shopName_setings,
		address_setings : address_setings,
		shop_descrb_setings : shop_descrb_setings,
	    city_setings : city_setings,
		telephone_setings : telephone_setings,
		shop_id : shop_id,
			cache: false,
			})
			.error(
		  
			   function( )
			   {
				  console.log( "Error: " );
			   })
			.success(function(response)
			{
			     $("#setshop").removeClass('loader');
			     $("#setshop").html(response);
				 
				 

			});
		}
	}
}
