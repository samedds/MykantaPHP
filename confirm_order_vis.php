<!DOCTYPE html>
<?php
//include "include/funcxn.php";
include "include/conxn.php";
ob_start();
session_start();
include "include/funcxn_vis.php";
include "include/check_out_process_vis.php";
$shop_id = $_GET['shp'];
$con_auth = $_GET['con_auth'];
?>
<html lang="en-us">
<meta charset="utf-8" />
<head>
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css"/>	
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css"/>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
</head><body id="main">
<div class="container">
<div class="padding-10" id="one" >
<?php if  (isset($_GET['con_auth']) && !empty($_GET['con_auth']))
{
  echo ' Thank you for placing an order on mykanta.Kindly confirm your Order. <p class="font-xs text-info"> This will send the business you ordered from a confirmed order mail. </p> <button class="btn btn-sm btn-success" type=""onclick="confirm_button('.$shop_id.')" > Confirm Order </button> ';
} 
else
{
 Echo '<span class="text=success">Click <a href="/www.mykanta.com"> Mykanta.com</a> You are not authorised to view this page </span>'; 
}				
?>
</div>
<div id="two" ></div>
<input type="hidden" id="shop_id" value="<?php echo $shop_id ; ?>" /> 
<input type="hidden" id="con_auth" value="<?php echo $con_auth ; ?>" />

 <script type="text/javascript" >
function confirm_button(shop_id){	
var con_auth = $( '#con_auth' ).val(); 
$.post("/ajax/cart_list_forvis.php",  
	{
	place_order : "task",
	shop_id: shop_id,
	con_auth: con_auth,
	cache: false,
	}).error(function( )
	   {
	 console.log( "Error: " );
	   })
	
	.success(function(response)
			{
			 
			 $.post("/ajax/cart_list_forvis.php",  
				{
				place_order2: "task",
				shop_id: shop_id,
				response: response,
				con_auth: con_auth,
				cache: false,
				}).error(function( )
				   {
				 console.log( "Error: " );
				   })
				   .success(function(response)
					{
					 console.log(response); 
					 document.getElementById("one").innerHTML =response;  
					 //-----------------------
					 setTimeout(function() {
					 //  $('#whole1').hide();
						//$('#whole2').hide();
					}, 5000);//---------------
	
					});
			 //console.log(response); 
             //document.getElementById("one").innerHTML =response;  
			 //document.getElementById("two").innerHTML =response;
			 //-----------------------
			 setTimeout(function() {
			 //  $('#whole1').hide();
				//$('#whole2').hide();
			}, 5000);//---------------

 		}); 
	}
	

</script>
</div>

</body>
</html>