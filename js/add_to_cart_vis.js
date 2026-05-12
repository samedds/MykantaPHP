//for adding to cart
function add_to_cart_function(product_id,option_id,price)
{
var item_stock = Number($( '#item_stock_'+option_id+'').val());

document.getElementById('cart_box'+option_id+'').innerHTML = ' <div class=""><img src="/img/loading.gif"/></div>'; 

	if(product_id == "")
	{
		alert("The programming language function field in the clicked button must not be empty please.");
	}
	else
	{		
		if( product_id.length < 1 )
		{
	      alert("Log in");
		}
		else
		{
			$.post("/ajax/add_to_cart.php",  
		{
		 task : "task",
		product_id : product_id,
		price : price,
		item_stock : item_stock,
		option_id : option_id,
	   cache: false,
			})
			.error(
		     function( )
			   {
				 
			   })
			.success(function(response)
			{
			    document.getElementById('cart_box'+option_id+'').innerHTML = response; 
			});
		}
	}
}
//for adding verifiction
function add_verif_cart(number)
{
document.getElementById('agentbox').innerHTML = ' <div class=""><img src="/img/loading.gif"/></div>'; 

			$.post("/ajax/add_to_cart.php",  
		{
		 add_verif_cart : "add_verif_cart",
		number : number,
		 cache: false,
			})
			.error(
		     function( )
			   {
				 
			   })
			.success(function(response)
			{
			    document.getElementById('agentbox').innerHTML = response; 
				
				document.getElementById("agentbox").innerHTML = ' <label for="pakage3 padding-10" style="width:30%;"> <button type="button" style="height:60px; margin-right:5px;"  class="btn btn-success btn-lg"><i class="glyphicon glyphicon-shopping-cart"></i>  <h4 style="font-size:1.5em;">PAY NOW</h4>  </button></label>'; 
				document.location.href = "/check_out.php";
			});
		
	
}

function delete_cart_item(product_id)
{
document.getElementById('cart_del'+product_id+'').innerHTML = ' <div class="btn btn-sm btn-danger" style="width:100%;"><img src="img/loading.gif"/></div>';  

	if(product_id == "")
	{
		alert("The programming language function field in the clicked button must not be empty please.");
	}
	else
	{		
		
		if( product_id.length < 1 )
		{
	      alert("No product");
		}
		else
		{
			$.post("/ajax/del_cart_item.php",  
		{
		task_vis_del : "task",
		product_id : product_id,
		cache: false,
			})
			.error(function( )
			   {
				document.getElementById('cart_del'+product_id+'').innerHTML ='error, please reload page.';
			   })
			.success(function(response)
			{	 
			document.getElementById('cart_del'+product_id+'').innerHTML =response;
			
			location.reload();
			});
		}
	}
}

