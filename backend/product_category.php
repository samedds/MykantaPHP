<?php 
include "include/conxn.php";
$cat_id =$_GET['cat_id']; 
$new_cat_id = cat_reform($cat_id);

$query = "SELECT shop_id FROM `shop` WHERE category = '$new_cat_id' AND mode = '1'    ";

$advert_query = mysqli_query($link,$query);
 
if( $advert_query2  = mysqli_num_rows($advert_query))
{
	while($advert_query2  = mysqli_fetch_array($advert_query,MYSQLI_ASSOC))
	{  	  $shop_id = safe_input($advert_query2['shop_id']);
           $all_shops[] = $advert_query2['shop_id'];
}
$range = '(' . implode(",",$all_shops) . ')';
	  //now call products from businesses
		  $query1 = "SELECT product_id,shop_id,name,account_id,price,descrb,image_loc,mode
			 FROM product
			 WHERE mode >= '1' AND shop_id IN $range order by RAND() 
			 LIMIT 0 , 50
			 ";
		$query_run1 = mysqli_query($link,$query1);
		$query_num1 = mysqli_num_rows($query_run1);

		echo '<input type="hidden" id="productNum" value="'.$query_num1.'" />
		<script> var productNom = $("#productNum").val();
		document.getElementById("productNo").innerHTML = productNom; 
		</script>';
		
	if($query_num1>=1)
		{ echo ' <ul class="list-inline"> ';
		while ($query_row1 = mysqli_fetch_assoc($query_run1))
		{
		 $product_id = $query_row1['product_id'];
		$shop_id = $query_row1['shop_id'];
		$prduct_name = $query_row1['name'];
		$prduct_name_short = substr($prduct_name, 0, 20). '..';
		$prdt_namel = strtolower($prduct_name_short);
		$prdt_name_ok = ucwords($prdt_namel);
		 $prdt_name_format = strtolower(formatUrl($prduct_name));
		$account_id =$query_row1['account_id'];
		$price1 =$query_row1['price'];
		if($price1 != 0)
	{ $price = ' 
	<p class="text-warning">GHS '.$price1.'</p> '; }
	else
	{ $price = '
	<p class="text-danger">price N/A</p> ';}
		$descrb =$query_row1['descrb'];
		$image_loc =$query_row1['image_loc'];
		$mode =$query_row1['mode'];
		if($mode >= 1)
		{
			//for shop
	$query = "SELECT *
			 FROM shop
			  WHERE shop_id = '$shop_id' AND mode = '1' 
			 LIMIT 1
			 ";
			 
		$query_runNew = mysqli_query($link,$query);
		if(mysqli_num_rows($query_runNew))
		{
		while ($query_run = mysqli_fetch_assoc($query_runNew))
		{
		$prduct_name_new = $query_run['shopName'];
		$shopName_short = substr($prduct_name_new, 0, 24). '..';
		$shopName = strtolower(formatUrl($prduct_name_new));
		
		//for registration
	$query = "SELECT *
			 FROM registration
			  WHERE id = '$account_id'
			 LIMIT 1
			 ";
			 
		$query_runNew = mysqli_query($link,$query);
		if(mysqli_num_rows($query_runNew))
		{
		while ($query_run = mysqli_fetch_assoc($query_runNew))
		{
	//	$query_row = mysql_fetch_assoc($query_run);
		//$query_row = mysql_fetch_array($query_run);
		
		$friend_id = $query_run['id'];
		$firstName =$query_run['firstName'];
		$ny_friendemail =$query_run['email'];
		$telephone =$query_run['telephone'];
		$city =$query_run['city'];
		$country =$query_run['country'];
		 
		  
		
		 echo '
		 
		<li  class=" margin-10 padding-10" style="color:#5bc0de; width:170px; ">
	<div  style="">
		<center style=" width:150px; ">
		<img src="/img/products_images/mini/'.$image_loc.'"   onClick="Load_product_content_on_modal_search('.$product_id .');" style="width:auto; height:auto; position:relative;"  alt="'.$prdt_name_ok.'" title="'.$prdt_name_ok.'"/></center>
	 <a class=" " style="font-size:1.0em; color:black; " title="'.$prduct_name.'" href="/product-link/'.$shopName.'/'. $product_id .'/'.$prdt_name_format.'">'.$prdt_name_ok.'</a>
	<i class="fa fa-fw fa-home txt-color-blue"></i><a class="text-info" style="font-size:0.8em; " title="'.$prduct_name_new.'" href="/business-link/'.$shopName.'">'.$shopName_short.'</a>
	<div class="row" style="">
	<input type="hidden" id="product_id" value="'. $product_id .'" />
	<input type="hidden" id="shopName_search" value="'. $prduct_name_new .'" /><input type="hidden" id="shop_id_search" value="'. $shop_id .'" />
	<div class=" col-xs-12 " align="">
	',product_option($shop_id,$product_id),' <a class="text-info pull-right" href="/product-link/'.$shopName.'/'. $product_id .'/'.$prdt_name_format.'">view page</a>
	</div>
	</div>
	</div>
	</li> ';
		
	 
		 }
		 } 
		 
		 }}}
		 
		 }
		 echo '</ul>';}
		 else
		 {
		echo'<div class=" well well-light col-md-6" > No products yet.</div>';
		 
		 }
			
	
}
else
{ 
echo'<div class=" well well-light col-md-6" > No products yet.</div>';
}
?>