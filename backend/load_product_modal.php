<?php
include "include/conxn.php";

if(isset($_POST['product_id']) && !empty($_POST['product_id']) && isset($_POST['shop_id']) && !empty($_POST['shop_id']))

{ include "include/conxn.php";
 include "../include/funcxn.php";
include "include/sessionfile.php";

 $user_id = $_SESSION['id'];
 $product_id = $_POST['product_id'];
$shop_id = safe_input($_POST['shop_id']);
$shopName = safe_input($_POST['shopName']);		//new
$shopNameformat= formatUrl($shopName);			//new

$query = "SELECT shop_id FROM product_view
		 WHERE product_id = '$product_id' && user_id = '$user_id' ";
	$queryb = mysqli_query($link,$query);	
	if(mysqli_num_rows($queryb) >=1)
	{  
	 $product_id = safe_input($_POST['product_id']);
$query = "SELECT * FROM product where product_id = $product_id LIMIT 30 ";

if($query_add = mysqli_query($link,$query))
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
		  $product_id = safe_input($products['product_id']);
	    $prdt_name = safe_input($products['name']);
	    $prdt_name_format = formatUrl($prdt_name);			//new
	      $prdt_desc = $products['descrb'];
	      $shop_id = safe_input($products['shop_id']);
	      $price = safe_input($products['price']);
	      $image_loc = safe_input($products['image_loc']);
	     
	 echo ' <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button><h4 class="text-default "> ' .$prdt_name.'
	 <a href="/product-link/'.strtolower($shopName).'/'.$product_id .'/'.strtolower($prdt_name_format).'">
	 <small class="text-info ">View product page</small>
	 </a>
	 </h4> <br>
	<div class=" row "style="">
		<div class=" col-md-6 no-margin   " >
		  <ul class="list-inline ">	
			 
			<!-- <li class="">
                <a href="#" onCLick="add_to_cart_function('.$product_id.')">Add to Wish list</a>
             </li> -->
		  </ul>
	   </div>
	</div>             
	<div class="row no-padding no-margin">
		<div class="  col-md-7">
			<img src="/img/products_images/'.$image_loc.'"  class="img" style="width:300px;" />	
				
		</div>
		<div class=" col-md-5">
			<h4 class="text-default">Description</h4>
			<hr class="no-padding	"> 
			'.$prdt_desc.'
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">
				Close
			</button>
	</div>'; 
  }
 }

else
{
	echo "<div class='info'>Sorry, no data was passed. Please try again or contact the site admin if this problem persist. Thanks...</div>";
}
}

else 
{
$user_id = safe_input($_SESSION['id']);
$product_id = safe_input($_POST['product_id']);
$shop_id = safe_input($_POST['shop_id']);
$shopName = safe_input($_POST['shopName']);		//new
$shopNameformat= formatUrl($shopName);			//new
$datetime =  date('Y\-m\-d\ H:i:s');
		   
$sql = "INSERT INTO product_view (id, product_id, user_id, shop_id, datetime) VALUES (NULL, '$product_id', '$user_id', '$shop_id', '$datetime');";
$query = mysqli_query($link,$sql);
if($query)
	{
	$product_id = $_POST['product_id'];
    $query = " SELECT * FROM product where product_id = '$product_id' LIMIT 1 ";
		if($query_add = mysqli_query($link,$query))
			{
			while($products = mysqli_fetch_assoc($query_add))
				 {
				  $product_id = safe_input($products['product_id']);
				$prdt_name = safe_input($products['name']);
				$prdt_name_format = formatUrl($prdt_name);			//new
				  $prdt_desc = $products['descrb'];
				  $shop_id = safe_input($products['shop_id']);
				  $price = safe_input($products['price']);
				  $image_loc = safe_input($products['image_loc']);
				 
				   echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button> <h4 class="text-default "> ' .$prdt_name.'
	  <a href="/product-link/'.strtolower($shopName).'/'.$product_id .'/'.strtolower($prdt_name_format).'">
	 <small class="text-info ">View product page</small>
	 </a>
	 </h4> <br>
	<div class=" row "style="">
		<div class=" col-md-6 no-margin   " >
		  <ul class="list-inline ">	
			 
			<!-- <li class="">
                <a href="#" onCLick="add_to_cart_function('.$product_id.')">Add to Wish list</a>
             </li> -->
		  </ul>
	   </div>
	</div>             
	<div class="row no-padding no-margin">
		<div class="  col-md-7">
			<img src="/img/products_images/'.$image_loc.'"  class="img" style="width:300px;" />	
				
		</div>
		<div class=" col-md-5">
			<h4 class="text-default">Description</h4>
			<hr class="no-padding	"> 
			'.$prdt_desc.'
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">
				Close
			</button>
	</div>';
		  }
		   }

else
{
	echo "<div class='info'>Sorry, no data was passed. Please try again or contact the site admin if this problem persist. Thanks...</div>";
}		 
}
}
}
?>