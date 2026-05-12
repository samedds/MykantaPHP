<?php 

function check_out_process()
{
include "include/conxn.php";
$user_id = $_SESSION['id'];
$query = " SELECT * FROM cart where account_id = '$user_id' AND order_code = '0' LIMIT 20";
$query1 = mysqli_query($link,$query);
if($query_add = mysqli_num_rows($query1))
	{		echo '<ul class="list-inline ">';
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
		 {		      $shop_id = safe_input($products2['shop_id']);
		 
	  $query23 = " SELECT shopName FROM shop where shop_id = '$shop_id'   ";
$query123 = mysqli_query($link,$query23);
if($query_add13 = mysqli_num_rows($query123))
	{
while($products23 = mysqli_fetch_array($query123,MYSQLI_ASSOC))		
		 {		      $shopName = formatUrl(safe_input($products23['shopName']));
	  
	   echo '   
       <tr id="cart_del'.$cart_id.'" class=" " style=" font-size:8pt;"><small>
        <td class=""><a href="/product-link/'.$shopName.'/'. $product_id .'/'.$prdt_name_format.'">'.$prduct_name_ok.'</a></td>
		<td class="hidden-xs hidden-sm">
	        '.$shopName.'
		</td>
		<td>
	      '.$spec_option.'
			
		</td>
		<td class="text-warning hidden-xs hidden-sm" id="price_cell'.$product_id.'">GHS '.price_figure($price).'
		</td> <td class="" id="total_cell'.$option_id.'" >
	       GHS '.price_figure(price_figure($price)* $stock).'
		</td>
		<td>
	       <a href="javascript:void(0);" class="text-danger" onclick="delete_cart_item('.$cart_id.')"><i class="glyphicon glyphicon-remove"></i></a>
		</td>
		</small>
         </tr>
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
 else {echo '<div class="padding-10 row" ><i class="fa fa-search fa-2x"></i> Browse Products to Add to Cart.</div>';}
 }
 function cart_list_in_mails($shop_id_mail)
{
include "include/conxn.php";
$user_id = $_SESSION['id'];
$order_code = order_code($shop_id_mail);
$query = " SELECT * FROM cart where account_id = '$user_id' AND order_code = '$order_code' LIMIT 20";
$query1 = mysqli_query($link,$query);
if($query_add = mysqli_num_rows($query1))
	{		
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
		
		<td>'.$spec_option.'</td>
		<td class="text-warning">GHS '.price_figure($price).'</td>
		<td> '.$stock.'</td>
		 <td class="text-warning" >GHS '.price_figure(price_figure($price)* $stock).'</td>
	
        
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
 
function total_cost_items()
{
include "include/conxn.php";
$user_id = $_SESSION['id'];
$option = total_cost_items_b();  
$query_op = "SELECT sum(option_total)as total FROM cart where option_id IN($option) AND order_code = '0' AND account_id = '$user_id'";
if( $query_add = mysqli_query($link,$query_op))
  {		
   while($op = mysqli_fetch_assoc($query_add))		
	{     
	 $price = price_figure($op['total']);
	}
	if(empty($price))
	{echo "00.00";} else {echo $price;}
  }

}

function total_cost_items_b()
{
include "include/conxn.php";
$user_id = $_SESSION['id'];
$query = " SELECT DISTINCT option_id FROM cart where account_id = '$user_id' AND order_code = '0' ";
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

function total_cost_items_mails($shop_id_mail,$order_code)
{
include "include/conxn.php";
$user_id = $_SESSION['id'];
//$option = total_cost_items_b_mails($shop_id_mail);  
$query_op = " SELECT sum(option_total)as total FROM cart where order_code = '$order_code'";
if( $query_add = mysqli_query($link,$query_op))
  {		
   while($op = mysqli_fetch_assoc($query_add))		
	{     
	 $price = $op['total'];
	}return $price;
  }
  else echo "no item added to cart";
}

function total_cost_items_b_mails($shop_id_mail)
{
include "include/conxn.php";
$user_id = $_SESSION['id'];
$order_code = order_code($shop_id_mail);
$query = " SELECT DISTINCT option_id FROM cart where account_id = '$user_id' AND order_code = '$order_code'";
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
 else {echo "No item added to cart.";}
 } 
function order_code($shop_id_mail)
{
include "include/conxn.php";
$user_id = $_SESSION['id'];
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
 
 function check_out_delivery()
{
include "include/conxn.php";
$user_id = $_SESSION['id'];
$query = " SELECT DISTINCT shop_id FROM cart where account_id = '$user_id' AND order_code = '0'";
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
		 $shopName = formatUrl(safe_input($products23['shopName']));	  
		 $city = safe_input($products23['city']);	  
		 $address = safe_input($products23['address']);	  
	   echo '   
       <div class="row padding-5 margin-5" style="font-size:10pt;" id="place_holder_box'.$shop_id.'">
        <div class="col-md-4 col-xs-4"><a href="/business-link/'.$shopName.'"style="font-size:1.1em;">'.$shopName.'</a><p class="text-info" >'.$city.'</p><p class="text-muted"style="font-size:0.8em;">'.$address.'</p></div>
		<div class="col-md-6 col-xs-6" id="'.$shop_id.'">',select_delivery_options($shop_id),'</div>
		<div class="col-md-2 col-xs-2 padding-10" id="delivery_cost'.$shop_id.'">
		 <button id="place_order" onclick="check_out_order('.$shop_id.')" class="btn btn-primary pull-right btn-md btn-sm btn-sm" value="">Order</button></div>
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
 $user_id = $_SESSION['id'];
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
     echo '<label class="radio">
		<input name="radio'.$shop_id.'" id="radio2'.$shop_id.'" type="radio" onclick="delivery_choice2('.$shop_id.')">
		<i></i><p class="text-primary" style="font-size: 13px;" onclick="delivery_choice2('.$shop_id.')">Deliver to your Location.</p>
		<p class="text-muted"id="dev2_info'.$shop_id.'" style="font-size: 12px; display:none;" onclick="delivery_choice2('.$shop_id.')">The business will contact you and deliver to your location. please do not put off your phone.</p></label>';
  }
	
  if ( $option_1 == 1)
  {
     echo '
	<label class="radio">
		<input name="radio'.$shop_id.'" id="radio1'.$shop_id.'"  type="radio" onclick="delivery_choice1('.$shop_id.')">
		
		<i></i><p class="text-primary" style="font-size: 13px;" onclick="delivery_choice1('.$shop_id.')" >Pick Up from business location.</p></label>
		<div class="row no-padding"id="time_info'.$shop_id.'" style="display:none;">
			<div class="control-group">
				<label for="pickup_date" class="control-label col-sm-6"> Pick up Date </label>
				<div class="col-sm-6">
					<input id="pickup_date'.$shop_id.'" name="pickup_date" class="padding-10" type="text" style="border-radius:6px; height:40px; border:1px solid grey;" placeholder="DD/MM/YY"  
					<p class="help-block"></p>
				</div>
			</div>
<label class="control-label col-sm-6">Time for pick-up</label>
            <div class="col-sm-6">
                <select id="time'.$shop_id.'" name="time" autocomplete="time" class="padding-10 "  style="border-radius:6px; height:40px; border:1px solid grey;">
                    <option value="" selected="selected">(select a time)</option>
                    <option value="70">7:00 </option>
                    <option value="73">7:30 </option>
                    <option value="80">8:00 </option>
                    <option value="83">8:30 </option>
                    <option value="90">9:00 </option>
                    <option value="93">9:30 </option>
                    <option value="100">10:00 </option>
                    <option value="103">10:30 </option>
                    <option value="110">11:00 </option>
                    <option value="113">11:30 </option>
                    <option value="120">12:00 </option>
                    <option value="130">13:00 </option>
                    <option value="140">14:00 </option>
                    <option class="text-warning" value="14:30">14:30 </option>
                    <option class="text-warning" value="15:00">15:00 </option>
                    <option class="text-warning" value="15:30">15:30 </option>
                    <option class="text-danger" value="16:00">16:00 </option>
                    <option class="text-danger" value="16:30">16:30 </option>
                    <option class="text-danger" value="17:00">17:00 </option>
                    <option class="text-danger" value="17:30">17:30 </option>
                    <option class="text-danger" value="18:00">18:00 </option>


				</select>
			</div>
		</label>	
	</div>
	';
  }
		
  if ( $option_3 == 2)
  {
     echo '<label class="radio">
		<input name="radio'.$shop_id.'"  type="radio" onclick="delivery_choice3('.$shop_id.')">
		<i></i><p class="text-info" style="font-size: 12px;" onclick="delivery_choice3('.$shop_id.')">I want a third party delivery agency.</p></label>
		<div class="" style="margin-left:50px;"  id="courier_ser'.$shop_id.'"> </div>
		';
  }
}

}

			
else {echo  '<p class="text-danger "> No Delivery option available </p>';}


}
function delivery_options_checkout($shop_id)
{include "include/conxn.php";
 $user_id = $_SESSION['id'];
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