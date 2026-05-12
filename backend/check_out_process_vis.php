<?php 
function order_code($shop_id_mail)
{
include "include/conxn.php";
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
$query = " SELECT order_code FROM place_order where user_id = '$user_id'  AND mode = 'pending' AND shop_id = '$shop_id_mail'";
$query1 = mysqli_query($link,$query);
if($query_add = mysqli_num_rows($query1))
	{
while($products = mysqli_fetch_assoc($query1))		
		 {
		
		 $order_code = $products['order_code'];
		 }
		return $order_code ;
 }
 }
 
function check_out_process()
{
include "include/conxn.php";
//$user_raw = $_SESSION['vis_id'];
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
$query = " SELECT * FROM cart_vis where account_id = '$user_id' AND order_code = '0' LIMIT 20";
$query1 = mysqli_query($link,$query);
if($query_add = mysqli_num_rows($query1))
	{	
	echo '<ul class="list-inline ">';
	while($products = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
	 {
	  $product_id = safe_input($products['product_id']);
	  $cart_id = safe_input($products['cart_id']);
	  $option_id = safe_input($products['option_id']);
	  $cart_qty_stock = safe_input($products['stock']);
	  
	  $query_name = " SELECT name FROM product where product_id = '$product_id' LIMIT 1";
		$query_sql = mysqli_query($link,$query_name);
			if(mysqli_num_rows($query_sql))
			  {		
			   while($products = mysqli_fetch_array($query_sql,MYSQLI_ASSOC))		
				{
				 $prdt_name = safe_input($products['name']);
				 $prdt_name_format= formatUrl($prdt_name);
				 $prduct_name_short = substr($prdt_name, 0, 26). '..';
				 $prduct_name_1 = strtolower($prduct_name_short);
				 $prduct_name_ok = ucwords($prdt_name_format);

				$query_op = " SELECT * FROM product_option where id = '$option_id' LIMIT 1";
				$query_sq = mysqli_query($link,$query_op);
				if(mysqli_num_rows($query_sq))
				  {		
				   while($op = mysqli_fetch_array($query_sq,MYSQLI_ASSOC))		
					{
					  $price = $op['price'];
					   $option_id2 = safe_input($op['id']);
					  // stock and quantity
					  $maximum_order = safe_input($op['stock']); 
					  //$stock = safe_input($op['stock']); 
					  $stock = $cart_qty_stock;
					  $spec_option = $op['spec_option']; 

						$query2 = " SELECT shop_id FROM product where product_id = '$product_id'   ";
						$query12 = mysqli_query($link,$query2);
						if($query_add1 = mysqli_num_rows($query12))
						{
							while($products2 = mysqli_fetch_array($query12,MYSQLI_ASSOC))		
							{		    
							$shop_id = safe_input($products2['shop_id']);
							$query23 = " SELECT shopName FROM shop where shop_id = '$shop_id'   ";
							$query123 = mysqli_query($link,$query23);
							if($query_add13 = mysqli_num_rows($query123))
								{
								 while($products23 = mysqli_fetch_array($query123,MYSQLI_ASSOC))		
									{		     
									$shopName = formatUrl(safe_input($products23['shopName']));
  
									echo '   
									<tr id="cart_del'.$cart_id.'" class=" " style=" font-size:8pt;"><small>
									<td class=""><a href="/product/'.$shopName.'/'. $product_id .'/'.$prdt_name_format.'">'.$prduct_name_ok.'</a></td>
									<td class="hidden-xs hidden-sm">
									'.$shopName.'</td>
									<td class="hidden-xs hidden-sm">'.$spec_option.'</td>
								    <td class="text-warning " id="price_cell'.$product_id.'">GHS '.price_figure($price).'</td>
									<td><input type="number" class="number" min="1" max="',max_qty($option_id),'" id="qty_cell'.$option_id.'" value="'.$stock.'"onchange= "qty_change('.$price.','.$stock.','.$option_id.')"/>
									<input type="hidden" id="hdqty'.$option_id.'" value="'.$stock.'" />
									</td>
									<td class="" id="total_cell'.$option_id.'" >
								    GHS '.price_figure(price_figure($price)* $stock).'</td>
									<td>
									<a href="javascript:void(0);" class="text-danger" onclick="delete_cart_item('.$cart_id.')"><i class="glyphicon glyphicon-remove"></i></a>
									</td></small></tr>
									'; 
									}
								}							
							}
						}
					}
				}
				}
			}
		}
	}
	else {echo '<div class="padding-10 row" > <div class="padding-10"><i class="fa fa-search fa-2x"></i> Browse Products to Add to Cart.</div></div>';}
} 

function bill_info_used()
{
include "include/conxn.php";
//$user_raw = $_SESSION['vis_id'];
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
$query = " SELECT * FROM billing_info_vis where user_id_vis = '$user_id'   LIMIT 1";
if($query_add = mysqli_query($link,$query))
	{	
	while($products = mysqli_fetch_assoc($query_add))		
	 {
	  $addressline1 = safe_input($products['addressline1']);
	  $firstname = safe_input($products['firstname']);
	  $lastname = safe_input($products['lastname']);
	  //$cart_qty_stock = safe_input($products['stock']);
	  
	  echo '<h4 class=" ">'.$firstname.' '.$lastname.' <br>'.$addressline1.'
	  <button class="btn btn-primary  btn-md " onClick="use_billing_info()">Use this Billing Info.</button></h4> <h3>OR</h3>Fill the Billing Info.';
	 }
	}
}
function items_of_business($shop_id)
{
include "include/conxn.php";
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
$query = " SELECT * FROM cart_vis where account_id = '$user_id' AND shop_id = '$shop_id' AND order_code = '0' LIMIT 20";
$query1 = mysqli_query($link,$query);
if($query_add = mysqli_num_rows($query1))
	{	
	echo '<ul class="list-inline ">';
	while($products = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
	 {
	  $product_id = safe_input($products['product_id']);
	  $cart_id = safe_input($products['cart_id']);
	  $option_id = safe_input($products['option_id']);
	  $cart_qty_stock = safe_input($products['stock']);
	  
	  $query_name = " SELECT name FROM product where product_id = '$product_id' LIMIT 1";
		$query_sql = mysqli_query($link,$query_name);
			if(mysqli_num_rows($query_sql))
			  {		
			   while($products = mysqli_fetch_array($query_sql,MYSQLI_ASSOC))		
				{
				 $prdt_name = safe_input($products['name']);
				 $prdt_name_format= formatUrl($prdt_name);
				 $prduct_name_short = substr($prdt_name, 0, 26). '..';
				 $prduct_name_1 = strtolower($prduct_name_short);
				 $prduct_name_ok = ucwords($prdt_name_format);

				$query_op = " SELECT * FROM product_option where id = '$option_id' LIMIT 1";
				$query_sq = mysqli_query($link,$query_op);
				if(mysqli_num_rows($query_sq))
				  {		
				   while($op = mysqli_fetch_array($query_sq,MYSQLI_ASSOC))		
					{
					  $price = $op['price'];
					   $option_id2 = safe_input($op['id']);
					  // stock and quantity
					  $maximum_order = safe_input($op['stock']); 
					  //$stock = safe_input($op['stock']); 
					  $stock = $cart_qty_stock;
					  $spec_option = $op['spec_option']; 

						$query2 = " SELECT shop_id FROM product where product_id = '$product_id'   ";
						$query12 = mysqli_query($link,$query2);
						if($query_add1 = mysqli_num_rows($query12))
						{
							while($products2 = mysqli_fetch_array($query12,MYSQLI_ASSOC))		
							{		    
							$shop_id = safe_input($products2['shop_id']);
							$query23 = " SELECT shopName FROM shop where shop_id = '$shop_id'   ";
							$query123 = mysqli_query($link,$query23);
							if($query_add13 = mysqli_num_rows($query123))
								{
								 while($products23 = mysqli_fetch_array($query123,MYSQLI_ASSOC))		
									{		     
									$shopName = formatUrl(safe_input($products23['shopName']));
  
									echo '<span style="font-size:0.9em; margin-left:20px;" class="text-muted">'.$prduct_name_ok.'('.$stock.') <span style="" class="pull-right text-warning"> GHs '.price_figure($price).'</span></span><br>';
									}
								}							
							}		
						}
					}
						
				}
				}
			}
		}
		echo '<h2 >Total to pay <span  class="pull-right text-warning" style="font-size:1.2em;" id="final_cost'.$shop_id.'"> ',total_cost_items_of_bus($shop_id),' </span><span  class="pull-right" style="font-size: 0.9em; margin-top: 6px;margin-right: 5px;"> GHs </span></h2><input class="hidden" value="',total_cost_items_of_bus($shop_id),'" id="final_cost_fig'.$shop_id.'" /><hr>';
		
		
		echo '<h4>Pay via Mobile Money</h4><br><input id="mobile_code1'.$shop_id.'"  name="mobile_code'.$shop_id.'" checked="checked" value="MTN" type="radio"><i></i><img style="width:50px;" src="/img/mtn.jpg"/></input>   <input name="mobile_code'.$shop_id.'" class="hidden" id="mobile_code2'.$shop_id.'" checked=""value="AIR" type="radio"/><i></i> <img style="width:100px;"class="hidden" src="/img/tigo.jpg"/></input>  <input name="mobile_code'.$shop_id.'" id="mobile_code3'.$shop_id.'" checked=""value="TIG" type="radio"/><i></i> <img style="width:100px;" src="/img/tigo.jpg"/></input>  <input class=" " name="mobile_code'.$shop_id.'" id="mobile_code4'.$shop_id.'" onclick="voucher('.$shop_id.')"  value="VOD" type="radio"><i></i> <img style="width:50px;"class=" " src="/img/vodafone.jpg"/></input><br><br>  <input id="phone_number'.$shop_id.'" name="phone" type="number"  style="border-radius:6px; margin-bottom:10px; height:40px; border:1px solid grey;"autocomplete="address-level1" placeholder="example: 0244100100" class="margin-10 padding-10"/>  <input id="vodafone_voucher_code'.$shop_id.'" name="vodafone_voucher_code" type="number"  style="display:none; border-radius:6px;margin-bottom:10px; height:40px;width:100%; border:1px solid grey;"autocomplete="address-level1" placeholder="Dial *110# and option 6 to genreate voucher" class="padding-10 margin-10"/>  <input id="region_bill" name="region" type="text"  style="border-radius:6px; margin-bottom:10px;height:20px; display:none; width:50%; height:40px; border:1px solid grey;"autocomplete="address-level1" placeholder="Ref ID" class="hidden padding-10"/>';
		
		echo  '<br><span id="place_order'.$shop_id.'"><button id="place_order_btn'.$shop_id.'" onclick="check_out_order('.$shop_id.')" class="btn btn-block btn-success pull-right btn-md btn-sm btn-xs" type="submit" value="">Order</button></span><br>';
	}
	else {echo '<div class="padding-10 row" > <div class="padding-10"><i class="fa fa-search fa-2x"></i> Browse Products to Add to Cart.</div></div>';}
}
 
function cart_list_in_mails($shop_id_mail,$order_code)
{
include "include/conxn.php";
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
$query = " SELECT * FROM cart_vis where account_id = '$user_id' AND order_code = '$order_code' ";
$query1 = mysqli_query($link,$query);

if($query_add = mysqli_num_rows($query1))
	{		
			while($products = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
			{
	 $cart_id = safe_input($products['cart_id']);
	 $option_id = safe_input($products['option_id']);
	 $cart_qty_stock = safe_input($products['stock']);
	$query_op = " SELECT * FROM product_option where id = '$option_id'";
				$query_sq = mysqli_query($link,$query_op);
					if(mysqli_num_rows($query_sq))
					  {		
					   while($op = mysqli_fetch_array($query_sq,MYSQLI_ASSOC))		
						{ 		
						$product_id = $products['product_id'];
						$price = $op['price'];
						$option_id2 = safe_input($op['id']);
						// stock and quantity
						$maximum_order = safe_input($op['stock']); 
						//$stock = safe_input($op['stock']); 
						$stock = $cart_qty_stock;
						$spec_option = $op['spec_option']; 
						 
						$query_name = " SELECT * FROM product where product_id = '$product_id'";
						$query_sql = mysqli_query($link,$query_name);
						if(mysqli_num_rows($query_sql))
						  {	

											  
							while($products = mysqli_fetch_array($query_sql,MYSQLI_ASSOC))		
							{	
							 $product_id2 = $products['product_id'];
							 $prdt_name = safe_input($products['name']);
							 $prdt_name_format= formatUrl($prdt_name);
							 $prduct_name_short = substr($prdt_name, 0, 26). '..';
							 $prduct_name_1 = strtolower($prduct_name_short);
							 $prduct_name_ok = ucwords($prdt_name_format);

								echo '
								<tr style="font-size:0.8em;">
								<td class="">'.$prduct_name_ok.' </td>
								<td class=""><span class="text-info"> '.$spec_option.'</span></td>
								<td class="text-warning" id="price_cell'.$product_id2.'">GHS '.price_figure($price).'</td>
								<td>'.$cart_qty_stock.'</td>
								<td class="text-warning">GHS '.price_figure(price_figure($price)* $stock).'</td>
								</tr><br>
								'; 
								}
										  

							}
						}
					}
			}

	}
	else {echo "No item added to cart.";}
		
}

function cart_list_in_mail($shop_id_mail,$order_code )
{
include "include/conxn.php";
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
$query = " SELECT * FROM cart_vis where account_id = '$user_id' AND order_code = '$order_code'";
$query1 = mysqli_query($link,$query);
if($query_add = mysqli_num_rows($query1))
	{		
while($products = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
		 {
	      $product_id = safe_input($products['product_id']);
	      $cart_id = safe_input($products['cart_id']);
	      $option_id = safe_input($products['option_id']);
	      $cart_qty_stock = safe_input($products['stock']);
		  
		 
$query_op = " SELECT * FROM product_option where id = '$option_id'";
$query_sq = mysqli_query($link,$query_op);
if(mysqli_num_rows($query_sq))
  {		
   while($op = mysqli_fetch_array($query_sq,MYSQLI_ASSOC))		
{
          $price = $op['price'];
		   $option_id2 = safe_input($op['id']);
		  // stock and quantity
          $maximum_order = safe_input($op['stock']); 
          //$stock = safe_input($op['stock']); 
		  $stock = $cart_qty_stock;
          $spec_option = $op['spec_option']; 
          $product_id2 = $op['product_id']; 
		  
 $query_name = " SELECT name FROM product where product_id = '$product_id2' ";
$query_sql = mysqli_query($link,$query_name);
if(mysqli_num_rows($query_sql))
  {		
   while($products = mysqli_fetch_array($query_sql,MYSQLI_ASSOC))		
{
$prdt_name = safe_input($products['name']);
$prdt_name_format= formatUrl($prdt_name);
$prduct_name_short = substr($prdt_name, 0, 26). '..';
$prduct_name_1 = strtolower($prduct_name_short);
$prduct_name_ok = ucwords($prdt_name_format);

$query2 = " SELECT shop_id FROM product where product_id = '$product_id2'   ";
$query12 = mysqli_query($link,$query2);
if($query_add1 = mysqli_num_rows($query12))
	{
while($products2 = mysqli_fetch_array($query12,MYSQLI_ASSOC))		
		 {		      $shop_id = safe_input($products2['shop_id']);
		 
	  $query23 = " SELECT shopName FROM shop where shop_id = '$shop_id'   ";
$query123 = mysqli_query($link,$query23);
if($query_add13 = mysqli_num_rows($query123))
	{
while($products23 = mysqli_fetch_array($query123,MYSQLI_ASSOC))		
		 {		      $shopName = safe_input($products23['shopName']);
	  
	   return '   
	   <small>
        <td class="">'.$prduct_name_ok.'</td>
		<td class=""> '.$shopName.'</td>
		<td>'.$spec_option.'</td>
		<td class="text-warning">GHS '.price_figure($price).'</td>
		<td> '.$stock.'</td>
		 <td class="text-warning" > GHS '.price_figure(price_figure($price)* $stock).'</td>
	
        
	    '; 
  }
  }}
  }
  }
  }
  }
  }
  }

 }
 else {echo "No item added to cart.";}
 }
 
 
function total_cost_items_of_bus($shop_id)
{
include "include/conxn.php";
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
$option = total_cost_items_b();  
$query_op = "SELECT sum(option_total)as total FROM cart_vis where option_id IN($option) AND order_code = '0' AND account_id = '$user_id' AND shop_id = '$shop_id'";
if( $query_add = mysqli_query($link,$query_op))
  {		
   while($op = mysqli_fetch_assoc($query_add))		
	{     
	 $price =  $op['total'] ;
	}
	
  }if(empty($price))
	{echo "00.00";} else {echo $price;}

}
 
function total_cost_items()
{
include "include/conxn.php";

//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}

$option = total_cost_items_b();  
$query_op = "SELECT sum(option_total)as total FROM cart_vis where option_id IN($option) AND order_code = '0' AND account_id = '$user_id'";
if( $query_add = mysqli_query($link,$query_op))
  {		
   while($op = mysqli_fetch_assoc($query_add))		
	{     
	 $price =  price_figure($op['total']) ;
	}
	
  }if(empty($price))
	{echo "00.00";} else {echo $price;}

}

function total_cost_items_mails($shop_id_mail,$order_code)
{
include "include/conxn.php";
//$option = total_cost_items_b_mails($shop_id_mail,$order_code);  
$query_op = " SELECT sum(option_total)as total FROM cart_vis where order_code = '$order_code' ";
if( $query_add = mysqli_query($link,$query_op))
  {		
   while($op = mysqli_fetch_assoc($query_add))		
	{     
	 $price = $op['total'];
	} return  price_figure($price);
  }
}

function total_cost_items_b()
{
include "include/conxn.php";
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}

$query = " SELECT DISTINCT option_id FROM cart_vis where account_id = '$user_id' AND order_code = '0'";
$query1 = mysqli_query($link,$query);
if($query_add = mysqli_num_rows($query1))
	{
while($products = mysqli_fetch_assoc($query1))		
		 {
		 $new_array = array();
		 $option[] = $products['option_id'];
		 }
		return $range = '' . implode(",",$option) . '';
 }

 }

function total_cost_items_b_mails($shop_id_mail,$order_code)
{
include "include/conxn.php";
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
// $order_code = order_code($shop_id_mail);
$query = " SELECT DISTINCT option_id FROM cart_vis where account_id = '$user_id' AND order_code = '$order_code'";
$query1 = mysqli_query($link,$query);
if($query_add = mysqli_num_rows($query1))
	{
while($products = mysqli_fetch_assoc($query1))		
		 {
		 $new_array = array();
		 $option[] = $products['option_id'];
		 }
		return $range = '' . implode(",",$option) . '';
 }
 else {echo "No option selected by user.";}
 }

 function check_out_delivery()
{
include "include/conxn.php";
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
$query = " SELECT DISTINCT shop_id FROM cart_vis where account_id = '$user_id' AND order_code = '0'";
$query1 = mysqli_query($link,$query);
if($query_add = mysqli_num_rows($query1))
	{	 
while($products = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
	  {
	    $shop_id = safe_input($products['shop_id']);
	  //  $product_id = safe_input($products['product_id']);

	  $query23 = " SELECT DISTINCT `shopName`,`city`,`address` FROM `shop` where `shop_id` = '$shop_id' ";
$query123 = mysqli_query($link,$query23);
if($query_add13 = mysqli_num_rows($query123))
	{
while($products23 = mysqli_fetch_array($query123,MYSQLI_ASSOC))		
		 {		
		 $shopName_link = formatUrl(safe_input($products23['shopName']));	  
		 $shopName = ucwords($products23['shopName']);	  
		 $city = ucwords($products23['city']);	  
		 $address = ucwords($products23['address']);	  
	   echo '   
       <div class="row padding-5 margin-5" style="font-size:10pt;" id="place_holder_box'.$shop_id.'">
        <div class="col-md-3 col-xs-12"><a href="/business-link/'.$shopName_link.'"style="font-size:1.1em;"><i class="fa fa-home"></i> '.$shopName.'</a><p class="text-info" ><i class="fa fa-building "></i> '.$city.'</p><p  class="text-info"><i class="fa fa-map-marker"></i>  '.$address.'</p></div>
		<div class="col-md-4 col-xs-12 padding-10" style="margin-right:30px;" id="'.$shop_id.'"><p  style="font-size:11pt;"><i class="fa fa-truck"></i> Delivery Option</p> ',select_delivery_options($shop_id),' </div>
		<div class="col-md-4 col-xs-12 padding-10"   id="paymentbox'.$shop_id.'" >
		<p  style="font-size:11pt;"><i class="fa fa-credit-card"></i>Payment Option</p>
		
		<p class="text-muted" style="font-size:10pt;"><i class="fa fa-file-text-o"></i>Mini Statement</p>
		<div class=""  id="delivery_cost'.$shop_id.'" style="margin-right:-10px; position:abso lute;" >  </div>
		<div class=""  id="mini_st'.$shop_id.'" style="display:none;" > ',items_of_business($shop_id),' </div>
		
			</div>
	   </div><hr>
	    '; 
  }
 
  }
  }
 }
 else {echo "No item added to cart.";}
 }
 /*
 function option_item($product_id)
 {include "include/conxn.php";
 $query_op = " SELECT * FROM product_option where product_id = '$product_id' LIMIT 5";
if($query_sq = mysqli_query($link,$query_op))
  {		
   while($op = mysqli_fetch_array($query_sq,MYSQLI_ASSOC))		
{
     $price = safe_input($op['price']);
	 $option_id = safe_input($op['id']); 
     $spec_option =$op['spec_option']; 
	 
	  echo    '<option id="'.$spec_option.'" onclick="live_edit_cart('.$price.','.$product_id.')">'.$spec_option.'</option>';
 }
 }
 } */
 
 function select_delivery_options($shop_id)
{include "include/conxn.php";
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
$queryA = " SELECT * FROM delivery_option where shop_id = '$shop_id'  LIMIT 1 ";

$query_Am = mysqli_query($link,$queryA);

if(mysqli_num_rows($query_Am) >= 1)
{
while($products = mysqli_fetch_assoc($query_Am))
{
  $option_1 = $products['option_1'];
  $option_2 = $products['option_2'];
  $option_3 = $products['option_3'];
		
	
  if ( $option_2 == 1)
  {
     echo '<label class="radio"style="margin-left: 35px;">
		<input name="radio'.$shop_id.'" value="choice_bus_deliver" id="radio2'.$shop_id.'" type="radio" onclick="delivery_choice2('.$shop_id.')">
		<i></i><p class="text-info" style="font-size: 14px;" onclick="delivery_choice2('.$shop_id.')">Business will deliver to your Location.</p>
		<p class="text-default"id="dev2_info'.$shop_id.'" style="font-size: 14px; display:none;" onclick="delivery_choice2('.$shop_id.')">Delivery to Your Door step<br><a onclick="check_out_next();"class=" " value="">Edit Address</a><br><br><em class="text-muted">The business will contact you and deliver to your location. please do not put off your phone.<br><br> Delivery may take 1 - 2 working days</em></p></label>';
  }
	
  if ( $option_1 == 1)
  {
     echo '
	<label class="radio"style="margin-left: 35px;">
		<input name="radio'.$shop_id.'" id="radio1'.$shop_id.'"  value="choice_pick_up" type="radio" onclick="delivery_choice1('.$shop_id.')">
		
		<i></i><p class="text-info" style="font-size: 14px;" onclick="delivery_choice1('.$shop_id.')" >Pick Up from business location.</p></label>
		<div class="row no-padding"id="time_info'.$shop_id.'" style="display:none;margin-left:25px;">
			<div class="control-group">
				<label for="pickup_date" class="control-label col-sm-6">Pick up Date </label>
				<div class="col-sm-6">
					<input id="pickup_date'.$shop_id.'" name="pickup_date" type="text"  placeholder="DD/MM/YY" class="padding-10" style="border-radius:6px; height:25px; border:1px solid grey;width:150px; ">
					<p class="help-block"></p>
				</div>
			</div>
<label class="control-label col-sm-6">Time for pick-up</label>
            <div class="col-sm-6" >
                <select id="time'.$shop_id.'" name="time" autocomplete="time" class="padding-10 " style="width:150px; border-radius:6px; height:25px; border:1px solid grey;">
                    <option value="" selected="selected">(please select a time)</option>
                    <option value="7:00 ">7:00 </option>
                    <option value="7:30 ">7:30 </option>
                    <option value="8:00 ">8:00 </option>
                    <option value="8:30 ">8:30 </option>
                    <option value="9:00 ">9:00 </option>
                    <option value="9:30 ">9:30 </option>
                    <option value="10:00 ">10:00 </option>
                    <option value="10:30 ">10:30 </option>
                    <option value="11:00 ">11:00 </option>
                    <option value="11:30 ">11:30 </option>
                    <option value="12:00 ">12:00 </option>
                    <option value="12:30 ">12:30 </option>
                    <option value="13:00 ">13:00 </option>
                    <option value="13:30 ">13:30 </option>
                    <option value="14:00 ">14:00 </option>
                    <option class="text-warning" value="14:30 ">14:30 </option>
                    <option class="text-warning" value="15:00 ">15:00 </option>
                    <option class="text-warning" value="15:30 ">15:30 </option>
                    <option class="text-danger" value="16:00 ">16:00 </option>
                    <option class="text-danger" value="16:30 ">16:30 </option>
                    <option class="text-danger" value="17:00 ">17:00 </option>
                    <option class="text-danger" value="17:30 ">17:30 </option>
                    <option class="text-danger" value="18:00 ">18:00 </option>
                   
				</select>
			</div>
		</label>	
	</div>
	';
  }
		
  if ( $option_3 == 1)
  {
     echo '<label class="radio"style="margin-left: 35px;">
		<input name="radio'.$shop_id.'" id="radio3'.$shop_id.'" value="choice_third_deliver" type="radio" onclick="delivery_choice3('.$shop_id.');">
		<i></i><p class="text-info" style="font-size: 14px;" onclick="delivery_choice3('.$shop_id.');">Mykanta Express Delivery</p>
		<div class="" style="margin-left:15px;"  id="courier_ser'.$shop_id.'">  <img style="width:200px;" src="/img/mkdelivery.jpg"/></div></label>
		';
  }
}

}

			
else {echo  '<p class="text-danger "> No Delivery option available </p>';}


}
function delivery_options_checkout($shop_id)
{include "include/conxn.php";
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
$queryA = " SELECT * FROM delivery_option where shop_id = '$shop_id'  LIMIT 1 ";

$query_Am = mysqli_query($link,$queryA);

if(mysqli_num_rows($query_Am) >= 1)
{
while($products = mysqli_fetch_assoc($query_Am))
{
  $option_1 = $products['option_1'];
  $option_2 = $products['option_2'];
  $option_3 = $products['option_3'];
  
  if ( $option_1 == '1')
  {
     echo '<p class="text-primary" style="font-size: 12px;" > You can pick up from our store.</p>';
  }
  if ( $option_2 == "1")
  {
     echo '<p class="text-primary" style="font-size: 12px;" > We can deliver to you.</p>';
  }
  if ( $option_3 == 1)
  {
     echo '<p class="text-primary">We allow other courier or delivery agencies</p>';
  }
}
}
else {echo  '<p class="text-danger "> No Delivery option available </p>';}
}
 
 function max_qty($option_id)
 {include "include/conxn.php";
 $query_op = " SELECT * FROM product_option where id = '$option_id'";
if($query_sq = mysqli_query($link,$query_op))
  {		
   while($op = mysqli_fetch_array($query_sq,MYSQLI_ASSOC))		
{
       echo        $maximum_order = $op['stock']; 
 }
 }
 }

?>