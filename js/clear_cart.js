
function clear_cart_function(user_id)
{
	if(user_id == "")
	{
		alert("The programming language function field in the clicked button must not be empty please.");
	}
	else
	{		
		//console.log(shopName );
		if( user_id.length < 1 )
		{
	      alert("Log in");
		}
		else
		{
			$.post("/ajax/clear_cart.php",  
		{
		 task : "task",
		user_id : user_id,
	   cache: false,
			})
			.error(
		  
			   function( )
			   {
				  console.log( "Error: " );
			   })
			.success(function(response)
			{
			   //  $("#setproduct").removeClass('loader');
			     $("#cart_body").html(response); 
				 
				 
// document.getElementById("cart_body").innerHTML ='<span> Wish List cleared </span>';
				 
				

			});
		}
	}
}

