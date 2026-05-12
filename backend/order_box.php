<?php 
include "include/conxn.php";
if(isset($_GET['shop_id']))
{
include "include/conxn.php";
include "include/sessionfile.php";  
include "../include/funcxn.php";
include "../include/check_out_process.php";
echo $user_id = $_SESSION['id'];
$shop_id = $_GET['shop_id'];
if(!empty($shop_id))
{
$query = "SELECT * FROM place_order where shop_id  = '$shop_id'   ";
if($query = mysqli_query($link,$new_Query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		{
	
		$order_id =  $details['id'];
		$client_id =  $details['user_id'];
		$order_code = $details['order_code'];
		echo $mode =       $details['mode'];
		$datetime =   $details['datetime'];
		$pickup_date =   $details['pickup_date'];
		
		//user
		$query = "SELECT * FROM billing_info where user_id = '$client_id'  ";
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
			echo	$addressline2 = $details['addressline2'];
				$user_region = $details['region'];
				$user_country = $details['country'];
				if(isset($_POST['pickup_date']) && isset($datetime))
				{
				$pickup =  'Pick up Date: <span class="text-info">'.$_POST['pickup_date'].'</span> <br> Pick up Time: <span class="text-info">'.$_POST['time_date'].'</span> ';
				}
				else{
				$pickup = 'User wants goods to be delivered to address.';


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
				$shop_id = safe_input($allpalls_info['shop_id']);
				$region = safe_input($allpalls_info['state']);	  
				//$user_id = safe_input($allpalls_info['user_id']);
				//for($i=0; $i<count($user_id); ++$i){
				$query2 = "UPDATE cart SET order_code = '$order_code' WHERE account_id = '$user_id' AND shop_id = '$shop_id' AND  order_code = '0'";
				if($new_q = mysqli_query($link,$query2))
				{
				$message_business =  '"
				<h3>Product Order</h3>
				<p><img src="http://www.mykanta.com/img/site_img/email_mk.png" /></p>		
				<p>Hello '.$shopName.',</p>
				<p>An order has been made by '.$firstname.'. Below are details of the order.</p>
				'.$pickup.'
				<p >Transaction Code :<span class="text-info"> '.$order_code.'</span></p>
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
				<table class="table" style="font-size:1.0em;" cell-padding="0" cell-spacing="0">
				<tr>
						<td>Product Name</td>
						<td >Type</td>
						<td >Price</td>
						<td>Qty.</td>
						<td> Total </td>
					</tr>
				'.$cart_list.'
						<tr>
					<td>Total </td>
					<td> </td>
					<td class="hidden-xs hidden-sm"> </td>
					<td class="hidden-xs hidden-sm"> </td>
					<td >GHS '.price_figure(total_cost_items_mails($shop_id_mail,$order_code)).'</td>	</tr>
				</table>
				"';
				}
				}
				}
				}
				}
				}
		else{echo "error";}

		}
	}
}
}
else 'not working';
?>