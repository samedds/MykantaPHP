<?php
include "include/conxn.php";
if(isset($_POST['place_order']))
{
include "include/conxn.php";
ob_start();
session_start(); 
include "../include/funcxn_vis.php";

//$user_id = $_SESSION['vis_id'];
$shop_id = $_POST['shop_id'];
$order_code = $_POST['con_auth'];
$query = " SELECT cart_id,product_id,option_id,stock FROM cart_vis where shop_id = '$shop_id' AND order_code = '$order_code' ";
$query1 = mysqli_query($link,$query);

if($query_add = mysqli_num_rows($query1))
	{	
	 while($products1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
			{
	 $cart_id = safe_input($products1['cart_id']);
	 $option_id = safe_input($products1['option_id']);
	 $cart_qty_stock = safe_input($products1['stock']);
	$query_op = " SELECT * FROM product_option where id = '$option_id'";
				$query_sq = mysqli_query($link,$query_op);
					if(mysqli_num_rows($query_sq))
					  {		
					   while($op = mysqli_fetch_array($query_sq,MYSQLI_ASSOC))		
						{ 		
						$product_id = $op['product_id'];
						$price = $op['price'];
						$option_id2 = safe_input($op['id']);
						// stock and quantity
						$maximum_order = safe_input($op['stock']); 
						//$stock = safe_input($op['stock']); 
						$stock = $cart_qty_stock;
						$spec_option = $op['spec_option']; 
						 
						$query_name = " SELECT product_id,name FROM product where product_id = '$product_id'";
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
								<td class="text-warning">GHS '.price_figure($price * $stock).'</td>
								</tr>
								'; 
								}
										  

							}
						}
					}
			}
		

	}
	else {echo "No item added to cart.";}
}
if(isset($_POST['place_order2']))
{
include "../include/funcxn_vis.php";
include "../include/check_out_process_vis.php";
$con_auth = $_POST['con_auth'];  
$response = $_POST['response'];  
  $datetime = date('j F Y h:m:s a');
  
 $update = "UPDATE place_order_vis SET mode = 'Confirmed', datetime = '$datetime' WHERE order_code = '$con_auth' ";
 $updatesql = mysqli_query($link, $update);
 if($updatesql)
    {
			  
		//select user_id from billing db
		$query = "SELECT user_id_vis, shop_id, pickup_time_date FROM place_order_vis where order_code = '$con_auth'  ";
		if($query_add = mysqli_query($link,$query))
		{
		while($details = mysqli_fetch_assoc($query_add))
			{
			$user_id_vis = $details['user_id_vis'];
			$shop_id = $details['shop_id'];
			$pickup_time_date = $details['pickup_time_date'];
			}
		}  

		//user
		$query = "SELECT * FROM billing_info_vis where user_id_vis = '$user_id_vis'  ";
		if($query_add = mysqli_query($link,$query))
		{
		while($details = mysqli_fetch_assoc($query_add))
			{
			$firstname = $details['firstname'];
			$lastname = $details['lastname'];
			$user_email = $details['bill_email'];
			$user_city = $details['city'];
			$user_telephone = $details['telephone'];
			$addressline1 = $details['addressline1'];
			$addressline2 = $details['addressline2'];
			$user_region = $details['region'];
			$user_country = $details['country'];

			//$cart_list_in_mails = cart_list_in_mails($shop_id_mail,$order_code );
			//$total_cost_items_mails = total_cost_items_mails($shop_id_mail,$order_code);
				
			//business
			$query = "SELECT * FROM shop WHERE shop_id = '$shop_id'";
			if($query4user_info = mysqli_query($link,$query))
				{
				while($allpalls_info = mysqli_fetch_assoc($query4user_info))
					{
					$shopName = $allpalls_info['shopName'];
					$countryCode = safe_input($allpalls_info['countryCode']);
					$telephone = safe_input($allpalls_info['telephone']);
					$category = safe_input($allpalls_info['category']);
					$shop_descrb = safe_input($allpalls_info['shop_descrb']);
					$address = safe_input($allpalls_info['address']);
					$country = safe_input($allpalls_info['country']);
					$city = safe_input($allpalls_info['city']);
					$email = safe_input($allpalls_info['email']);
					//$shop_id = safe_input($allpalls_info['shop_id']);
					$region = safe_input($allpalls_info['state']);	  
					//$user_id = safe_input($allpalls_info['user_id']);

					}
				}
			}
		}
	//send to mail
	$headers = 'MIME-Version: 1.0'. "\r\n";
	$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
	$headers .= 'From: Mykanta Product Order <support@mykanta.com>'. "\r\n";
	$mail_to_user = $user_email;
	$mail_to_business = $email;
	$mail_to_mykanta = 'hipicompany@gmail.com';
	$mail_from = "support@mykanta.com";
	$subject = "Product Order";
	

//mails
  $message_business =  '<html lang="en-us">
<head>		
</head>
<body class="padding-10">		
<div id="whole1" class="row">	<p>Hello '.$shopName.',</p>
	<p>An order has been made by '.$firstname.'. Below are details of the order.</p>
	'.$pickup_time_date.'
	<p >Transaction Code :<span class="text-info"> '.$con_auth.'</span></p>
	<br>
	<div class="row">
		<div class="col-md-12">
		<u class=""> Buyer Details</u>
		<p>Full name :  <span class="text-info"> '.$firstname.' '.$lastname.' </span></p>
		<p>Telephone :  <span class="text-info"> '.$user_telephone.' </span></p>
		<p>Email :  <span class="text-info"> '.$user_email.'</span></p>
		
		<p>Address Line 1 :  <span class="text-info"> '.$addressline1.' </span></p>
		<p>Address Line 2:  <span class="text-info"> '.$addressline2.'</span> </p>
		<p>Country : <span class="text-info">'.$user_country.' </span>  Region : <span class="text-info">'.$user_region.'</span>  City : <span class="text-info">'.$user_city.' </span></p>
		</div>
	</div>
	<br>
	<u>Order Details</u>
		<table id="list_cart" class="table" style="font-size:1.0em;" cell-padding="0" cell-spacing="0">	
        <tr>
			<td>Product Name</td>
			<td >Type</td>
			<td >Price</td>
			<td>Qty.</td>
			<td> Total </td>
		</tr>
         '.$response.'		
		<tr>
			<td>Total </td>
			<td> </td>
			<td class="hidden-xs hidden-sm"> </td>
			<td class="hidden-xs hidden-sm"> </td>
			<td >GHS '.price_figure(total_cost_items_mails($shop_id,$con_auth)).'</td>
		</tr>			
</table>
		

		<p style="color:#2b8ba6; font-size:9pt;" >Copyright 2015 HIPI,D705/5 AMERICAN HOUSE, TUDU-ACCRA, GHANA.
		</p>
</div>
</body>
</html>';
  $message_mykanta = '"<html lang="en-us">
<head>		
</head>
<body class="padding-10">		
	<div id="whole2" class="row">
	<p>Hello Mykanta,</p>
	<p>An order has been made by '.$firstname.' from '.$shopName.'. Below are details of the order.</p>
	'.$pickup_time_date.'
	<p >Transaction Code :<span class="text-info"> '.$con_auth.'</span></p>
	<br>
	<div class="row">
		<div class="col-md-6">
		<u class=""> Buyer Details</u>
		<p>Full name :  <span class="text-info"> '.$firstname.' '.$lastname.' </span></p>
		<p>Telephone :  <span class="text-info"> '.$user_telephone.' </span></p>
		<p>Email :  <span class="text-info"> '.$user_email.'</span></p>
		
		<p>Address Line 1 :  <span class="text-info"> '.$addressline1.' </span></p>
		<p>Address Line 2:  <span class="text-info"> '.$addressline2.'</span> </p>
		<p>Country : <span class="text-info">'.$user_country.' </span>  Region : <span class="text-info">'.$user_region.'</span>  City : <span class="text-info">'.$user_city.' </span></p></div>
		<div class="col-md-6">
		<u class="">Business Details</u>
		<p>Business Name : <span class="text-info"> '.$shopName.'</span></p>
		<p>Telephone : <span class="text-info">'.$telephone.' </span></p>
		<p>Email : <span class="text-info">'.$email.'</span></p>
		<p>City : <span class="text-info">'.$city.'</span> </p>
		<p>Location : <span class="text-info">'.$address.' </span></p>
		</div>
	</div>
	<br>
	<u>Order Details</u>
		<table id="list_cart1" class="table" style="font-size:1.0em;" cell-padding="0" cell-spacing="0">
			<tr>
					<td>Product Name</td>
					<td >Type</td>
					<td >Price</td>
					<td>Qty.</td>
					<td> Total </td>
				</tr>		
			'.$response.'			
			<tr>
			<td>Total </td>
			<td> </td>
			<td class="hidden-xs hidden-sm"> </td>
			<td class="hidden-xs hidden-sm"> </td>
			<td >GHS '.price_figure(total_cost_items_mails($shop_id,$con_auth)).'</td>
</tr>			
</table>

		<p style="color:#2b8ba6; font-size:9pt;" >Copyright 2015 HIPI,D705/5 AMERICAN HOUSE, TUDU-ACCRA, GHANA.
		</p>
</div>
</body>
</html>"';

//sends the mail
//mail($mail_to_user,$subject,$message_user,$headers);
mail($mail_to_business,$subject,$message_business,$headers);
mail($mail_to_mykanta,$subject,$message_mykanta,$headers);
//end of mails
	 Echo '<span class="text-success">Successfully Confirmed. </span><p> Your order mail has been sent to '.$shopName.'. Mykanta will follow up on your behalf to make sure you get your products from '.$shopName.'. Thank you.</p>'; 
    }
}
?>