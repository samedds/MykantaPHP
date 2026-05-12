
function add_to_wishlist_function(product_id)
{
	if(product_id == "")
	{
		alert("The programming language function field in the clicked button must not be empty please.");
	}
	else
	{		
		//console.log(shopName );
		if( product_id.length < 1 )
		{
	      alert("Log in");
		}
		else
		{
			$.post("/ajax/add_to_wishlist.php",  
		{
		 task : "task",
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
			   //  $("#setproduct").removeClass('loader');
			     $("#wishlist_box").prepend(response);
				 
 document.getElementById("wishlist_box").innerHTML ='<p class="text-success"> Added </p>';
		});
		}
	}
}

function delete_wishlist(product_id)
{
document.getElementById('wishlist_del'+product_id+'').innerHTML = ' <div class="btn btn-md btn-danger" style="width:100%;"><img src="/img/loading.gif"/></div>';  

	if(product_id == "")
	{
		alert("The programming language function field in the clicked button must not be empty please.");
	}
	else
	{		
		//console.log(shopName );
		if( product_id.length < 1 )
		{
	      alert("Log in");
		}
		else
		{
			$.post("/ajax/del_wishlist.php",  
		{
		 task : "task",
		product_id : product_id,
	   cache: false,
			})
			.error(function( )
			   {
 document.getElementById('wishlist_del'+product_id+'').innerHTML ='error';
			   })
			.success(function(response)
			{	 
 document.getElementById('wishlist_del'+product_id+'').innerHTML ='';
			});
		}
	}
}

