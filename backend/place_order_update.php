<?php
include "include/conxn.php";
if(isset($_POST['place_order_update']))
{
	include "include/conxn.php";
	include "include/sessionfile.php"; 
	include "../include/funcxn.php";

		echo $user_id = $_SESSION['id'];
		echo $order_id = $_POST['order_id'];
		
		$query_shop ="UPDATE `myshop`.`place_order` SET `mode` = '1' WHERE `place_order`.`id` ='$order_id'";

		if(mysqli_query($link,$query_shop))
			 {
				echo '<span class="text-successful">Shop details saved</span>'; 
			 }
		else 
			{
				echo 'there was an error, reload the page please';
			}			
}

if(isset($_POST['place_order_update_vis']))
{
	include "include/conxn.php";
	include "include/sessionfile.php"; 
	include "../include/funcxn.php";

		 //$user_id = $_SESSION['id'];
		 $order_id = $_POST['order_id'];
		
		$query_shop ="UPDATE place_order_vis SET mode = '1' WHERE id ='$order_id'";

		if(mysqli_query($link,$query_shop))
			 {
				echo '<span class="text-successful">Shop details saved</span>'; 
			 }
		else 
			{
				echo 'there was an error, reload the page please';
			}			
}

if(isset($_POST['place_order_cancel']))
{
	include "include/conxn.php";
	include "include/sessionfile.php"; 
	include "../include/funcxn.php";

		echo $user_id = $_SESSION['id'];
		echo $order_id = $_POST['order_id'];
		
		$query_shop ="UPDATE `myshop`.`place_order` SET `mode` = '0' WHERE `place_order`.`id` ='$order_id'";

		if(mysqli_query($link,$query_shop))
			 {
				echo '<span class="text-successful">Shop details saved</span>'; 
			 }
		else 
			{
				echo 'there was an error, reload the page please';
			}			
}

if(isset($_POST['place_order_cancel_vis']))
{
	include "include/conxn.php";
	include "include/sessionfile.php"; 
	include "../include/funcxn.php";

		// $user_id = $_SESSION['id'];
		$order_id = $_POST['order_id'];
		
		$query_shop ="UPDATE place_order_vis SET mode = '0' WHERE id ='$order_id'";

		if(mysqli_query($link,$query_shop))
			 {
				echo '<span class="text-successful">Shop details saved</span>'; 
			 }
		else 
			{
				echo 'there was an error, reload the page please';
			}			
}

if(isset($_POST['overview']))
{
	include "include/conxn.php";
	include "include/sessionfile.php"; 
	include "../include/funcxn.php";
	
$shop_id = $_POST['shop_id'];
include "../include/b_overview.php"; 
}


if(isset($_POST['all_orders_list']))
{
	include "include/conxn.php";
	include "include/sessionfile.php"; 
	include "../include/funcxn.php";
	
$shop_id = $_POST['shop_id'];
echo '<h3 class="alert alert-info">User Orders</h3>';
//echo '<hr>';
echo order_list($shop_id);
echo '<h3 class="alert alert-info">Visitor Orders</h3>';
//echo '<hr>';
echo order_list_visitor($shop_id);
}


if(isset($_POST['place_order_info']))
{
	include "include/conxn.php";
	include "include/sessionfile.php"; 
	include "../include/funcxn.php";
		 $user_id = $_SESSION['id'];
		 $order_id = $_POST['order_id'];
		
		$query = " SELECT * FROM place_order where id = '$order_id' ";
				
		if($query1 = mysqli_query($link,$query))
			 {
			if($query_add = mysqli_num_rows($query1))
				{		
				while($details = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
					{
				     $user_id = $details['user_id'];
				     $order_code = $details['order_code'];
				 
				$order_id =  $details['id'];
				 $client_id =  $details['user_id'];
				 $mode =       $details['mode'];
				 $shop_id =       $details['shop_id'];
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
						$addressline2 = $details['addressline2'];
						$user_region = $details['region'];
						$user_country = $details['country'];
					
					if(!empty($pickup_date) && !empty($datetime))
						{
						echo '
						<div class="padding-10" style="background-color:#f8f8f8;" id="place_order_update'.$order_id.'">
						<div class="row padding-10 ">
						<div class="col-sm-5 ">
						<h4 class="padding-bottom-5 text-primary">Pick Up Order</h4>
						<p >An order has been made by '.ucwords($firstname).'.</p><p> Below are details of the order.</p>
						<p class="text-muted">Pick up Date: <span style="color:black">'.$pickup_date.'</span> </p><p class="text-muted"> Pick up Time: <span style="color:black">'.$datetime.'</span></p>
						<p class="text-muted">Transaction Code :<span style="color:black"> '.$order_code.'</span></p>
						<br>
						<p class="text-primary"> Buyer Details</p>
						<p class="text-muted">Full name :  <span style="color:black"> '.ucwords($firstname).' '.ucwords($lastname).' </span></p>
						<p class="text-muted">Telephone :  <span style="color:black"> '.$user_telephone.' </span></p>
						<p class="text-muted">Email :  <span style="color:black"> '.$user_email.'</span></p>
						<p class="text-muted">Address Line 1 :  <span style="color:black"> '.ucwords($addressline1).' </span></p>
						<p class="text-muted">Address Line 2:  <span style="color:black"> '.ucwords($addressline2).'</span> </p>
						<p class="text-muted">Country : <span style="color:black">'.ucwords($user_country).' </span>  Region : <span style="color:black">'.ucwords($user_region).'</span>  City : <span style="color:black">'.ucwords($user_city).' </span></p>
						</div >
						<div class="col-sm-7">
						
						 <p class="text-primary">Order Details</p>
						<table class="table" style="font-size:1.0em;" cell-padding="0" cell-spacing="0">
						<tr class="text-muted">
								<td >Product Name</td>
								<td >Type</td>
								<td >Price</td>
								<td>Qty.</td>
								<td> Total </td>
							</tr>
						',place_order_list_c($shop_id,$order_code),'
								<tr>
							<td class="text-muted">Total </td>
							<td> </td>
							<td class="hidden-xs hidden-sm"> </td>
							<td class="hidden-xs hidden-sm"> </td>
							<td >GHS ',total_cost_items_mails_order_list($shop_id,$order_code),'</td>		</tr>
						</table>
						</div></div >
						<div class="row " >
						<div class="  padding-10 pull-right" >
						  
							   <a type="submit"  style="cursor:pointer;" onClick="info_single('.$order_id .')" class="text-primary ">Minimize
							  </a> 
							
							
							  
						</div>
						</div>
						
						</div ><br>
						';
						}
						else{
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
						
						
					echo '
					<div class="padding-10 margin-10" style="background-color:#f8f8f8;" id="place_order_update'.$order_id.'">
						<div class="row padding-10">
						<div class="col-sm-5 ">
						<h4 class="padding-bottom-5 text-primary">Delivery Order</h4>
						<p>'.ucwords($firstname).' wants goods to be delivered to address.</p>
						<p class="text-muted">Transaction Code :<span style="color:black"> '.$order_code.'</span></p>
						<br>
						<p class="text-primary"> Buyer Details</p>
						<p class="text-muted">Full name :  <span style="color:black"> '.ucwords($firstname).' '.ucwords($lastname).' </span></p>
						<p class="text-muted">Telephone :  <span style="color:black"> '.$user_telephone.' </span></p>
						<p class="text-muted">Email :  <span style="color:black"> '.$user_email.'</span></p>
						<p class="text-muted">Address Line 1 :  <span style="color:black"> '.ucwords($addressline1).' </span></p>
						<p class="text-muted">Address Line 2:  <span style="color:black"> '.ucwords($addressline2).'</span> </p>
						<p class="text-muted">Country : <span style="color:black">'.ucwords($user_country).' </span>  Region : <span style="color:black">'.ucwords($user_region).'</span>  City : <span style="color:black">'.ucwords($user_city).' </span></p>
						</div>
						<div class="col-sm-7">
					        	<p class="text-primary">Order Details</p>
						<table class="table" style="font-size:1.0em;" cell-padding="0" cell-spacing="0">
						<tr>
								<td>Product Name</td>
								<td >Type</td>
								<td >Price</td>
								<td>Qty.</td>
								<td> Total </td>
							</tr>
					',place_order_list_c($shop_id,$order_code),'
								<tr>
							<td>Total </td>
							<td> </td>
							<td class="hidden-xs hidden-sm"> </td>
							<td class="hidden-xs hidden-sm"> </td>
								<td >GHS ',total_cost_items_mails_order_list($shop_id,$order_code),'</td>	</tr>
						</table>
						</div>
						</div>
						  <div class="row " >
							<div class=" padding-10 pull-right" >
						 
						 	  <a type="submit"  style="cursor:pointer;" onClick="info_single('.$order_id .')" class="text-primary ">Minimize
							  </a> 
							  

							</div>
						  </div>
						</div><br>
						
						';
						
						}
						}
						}
					}
			    }
			  } 
			  } 
			else 
				{
					echo 'there was an error, reload the page please';
				}						
       }
}

if(isset($_POST['place_order_info_vis']))
{
	include "include/conxn.php";
	include "include/sessionfile.php"; 
	include "../include/funcxn.php";
		// $user_id = $_SESSION['id'];
		 $order_id = $_POST['order_id'];
		
		$query = " SELECT * FROM place_order_vis where id = '$order_id' ";
				
		if($query1 = mysqli_query($link,$query))
			 {
			if($query_add = mysqli_num_rows($query1))
				{		
				while($details = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
					{
				     $user_id = $details['user_id_vis'];
				     $order_code = $details['order_code'];
				 
				$order_id =  $details['id'];
				 $client_id =  $details['user_id_vis'];
				 $mode =       $details['mode'];
				 $shop_id =       $details['shop_id'];
				$datetime =   $details['datetime'];
				$pickup_date =   $details['pickup_time_date'];
				//user
				$query = "SELECT * FROM billing_info_vis where user_id_vis = '$client_id'  ";
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
					
					if(!empty($pickup_date) && !empty($datetime))
						{
						echo '
						<div class="padding-10 margin-10" style="background-color:#f8f8f8;" id="place_order_update_vis'.$order_id.'">
						<div class="row padding-10">
						<div class="col-sm-5 ">
							<h4 class="padding-bottom-5 text-primary">Pick Up Order</h4>
						<p >An order has been made by '.ucwords($firstname).'.</p><p> Below are details of the order.</p>
						<p class="text-muted">Pick up Date: <span style="color:black">'.$pickup_date.'</span> </p><p class="text-muted"> Pick up Time: <span style="color:black">'.$datetime.'</span></p>
						<p class="text-muted">Transaction Code :<span style="color:black"> '.$order_code.'</span></p>
						<br>
						
						<p class="text-primary"> Buyer Details</p>
						<p class="text-muted">Full name :  <span style="color:black"> '.ucwords($firstname).' '.ucwords($lastname).' </span></p>
						<p class="text-muted">Telephone :  <span style="color:black"> '.$user_telephone.' </span></p>
						<p class="text-muted">Email :  <span style="color:black"> '.$user_email.'</span></p>
						<p class="text-muted">Address Line 1 :  <span style="color:black"> '.ucwords($addressline1).' </span></p>
						<p class="text-muted">Address Line 2:  <span style="color:black"> '.ucwords($addressline2).'</span> </p>
						<p class="text-muted">Country : <span style="color:black">'.ucwords($user_country).' </span>  Region : <span style="color:black">'.ucwords($user_region).'</span>  City : <span style="color:black">'.ucwords($user_city).' </span></p>
						</div >
						<div class="col-sm-7">
						    <p class="text-primary">Order Details</p>
						<table class="table" style="font-size:1.0em;" cell-padding="0" cell-spacing="0">
						<tr class="text-muted">
								<td >Product Name</td>
								<td >Type</td>
								<td >Price</td>
								<td>Qty.</td>
								<td> Total </td>
							</tr>
						',place_order_list_c_vis($shop_id,$order_code),'
								<tr>
							<td class="text-muted">Total </td>
							<td> </td>
							<td class="hidden-xs hidden-sm"> </td>
							<td class="hidden-xs hidden-sm"> </td>
							<td >GHS ',total_cost_items_mails_order_list_vis($shop_id,$order_code),'</td>		</tr>
						</table>
						</div></div >
						<div class="row " >
						<div class="  padding-10 pull-right" >
						  
						  <a type="submit"  style="cursor:pointer;" onClick="info_single_vis('.$order_id .')" class="text-primary">Minimize
							  </a> 
						</div>
						</div>
						</div><br>
						
				
						
						';
						}
						else
						{
				echo '
					<div class="padding-10 margin-10" style="background-color:#f8f8f8;" id="place_order_update_vis'.$order_id.'">
						<div class="row padding-10">
						<div class="col-sm-6 ">
						<h4 class="padding-bottom-5 text-primary">Delivery Order</h4>
						<p>'.ucwords($firstname).' wants goods to be delivered to address.</p>
						<p class="text-muted">Transaction Code :<span style="color:black"> '.$order_code.'</span></p>
						<br>
						<p class="text-primary"> Buyer Details</p>
						<p class="text-muted">Full name :  <span style="color:black"> '.ucwords($firstname).' '.ucwords($lastname).' </span></p>
						<p class="text-muted">Telephone :  <span style="color:black"> '.$user_telephone.' </span></p>
						<p class="text-muted">Email :  <span style="color:black"> '.$user_email.'</span></p>
						<p class="text-muted">Address Line 1 :  <span style="color:black"> '.ucwords($addressline1).' </span></p>
						<p class="text-muted">Address Line 2:  <span style="color:black"> '.ucwords($addressline2).'</span> </p>
						<p class="text-muted">Country : <span style="color:black">'.ucwords($user_country).' </span>  Region : <span style="color:black">'.ucwords($user_region).'</span>  City : <span style="color:black">'.ucwords($user_city).' </span></p>
						</div>
						<div class="col-sm-6">
						  <p class="text-primary">Order Details</p>
						<table class="table" style="font-size:1.0em;" cell-padding="0" cell-spacing="0">
						<tr>
								<td>Product Name</td>
								<td >Type</td>
								<td >Price</td>
								<td>Qty.</td>
								<td> Total </td>
							</tr>
					',place_order_list_c_vis
					($shop_id,$order_code),'
								<tr>
							<td>Total </td>
							<td> </td>
							<td class="hidden-xs hidden-sm"> </td>
							<td class="hidden-xs hidden-sm"> </td>
								<td >GHS ',total_cost_items_mails_order_list_vis($shop_id,$order_code),'</td>	</tr>
						</table>
						</div>
						</div>
						  <div class="row " >
							<div class=" padding-10 pull-right" >
						   <a type="submit"  style="cursor:pointer;" onClick="info_single_vis('.$order_id .')" class="text-primary ">Minimize
							  </a> 
							</div>
						</div>
						</div><br>
						
				
						
						';
						}
					}
			    }
			  } 
			  } 
			else 
				{
					echo 'there was an error, reload the page please';
				}						
       }
}

if(isset($_POST['place_order_single_info']))
{
	include "include/conxn.php";
	include "include/sessionfile.php"; 
	include "../include/funcxn.php";
		 $user_id = $_SESSION['id'];
		 $order_id = $_POST['order_id'];
		
			$query = " SELECT * FROM place_order where id = '$order_id' ";
				
		if($query1 = mysqli_query($link,$query))
			 {
			if($query_add = mysqli_num_rows($query1))
				{		
				while($details = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
					{
				     $user_id = $details['user_id'];
				     $order_code = $details['order_code'];
				 
				$order_id =  $details['id'];
				 $client_id =  $details['user_id'];
				 $mode =       $details['mode'];
				 $shop_id =       $details['shop_id'];
				$datetime =   $details['datetime'];
				$pickup_date =   $details['pickup_date'];
		
 //calling order lists that are confirmed - approved mode -1-

				if($mode=='1')
				{
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
						$addressline2 = $details['addressline2'];
						$user_region = $details['region'];
						$user_country = $details['country'];
					

if(!empty($pickup_date) && !empty($datetime))
{
echo '
		<blockquote style="background-color:#f8f8f8;">
<h4 class="text-Default"><img src="/img/site_img/approved.png" height="25"/> Pick-up Deal <span style="font-size:0.7em;" class="text-success">Approved.</span></h4>
<small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;" class="pull-right">View Information</a></small>
</blockquote>';
}
else{
					
						
				echo '
					<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;">
	 <h4 class="text-Default"><img src="/img/site_img/approved.png" height="25"/> Delivery Deal <span style="font-size:0.7em;" class="text-success">Approved.</span></h4>
	   <small>Date : <cite title="Source Title">'.$datetime.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
	</blockquote>';
						
						}
					
						}
						}
				else{echo "error";}
                //---------------
				}
				else if($mode=='0')
				{
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
						$addressline2 = $details['addressline2'];
						$user_region = $details['region'];
						$user_country = $details['country'];
					

					if(!empty($pickup_date) && !empty($datetime))
						{
						echo '
							<blockquote style="background-color:#f8f8f8;" >
 <h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25"/> Pick-up Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4>
  <small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
</blockquote>';
						}
						else{
					
						
				echo '
					<blockquote style="background-color:#f8f8f8;" >
<h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25"/> Delivery Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4>
<small>Date : <cite title="Source Title">'.$datetime.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
</blockquote>';
						
						}
					
						}
						}
				else{echo "error";}
                //---------------
				}
				
			
	}
	}
}	 	 			 
}

if(isset($_POST['place_order_single_info_vis']))
{
	include "include/conxn.php";
	include "include/sessionfile.php"; 
	include "../include/funcxn.php";
		 //$user_id = $_SESSION['id'];
		 $order_id = $_POST['order_id'];
		
			$query = " SELECT * FROM place_order_vis where id = '$order_id' ";
				
		if($query1 = mysqli_query($link,$query))
			 {
			if($query_add = mysqli_num_rows($query1))
				{		
				while($details = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
					{
				     $user_id = $details['user_id_vis'];
				     $order_code = $details['order_code'];
				 
				$order_id =  $details['id'];
				 $client_id =  $details['user_id_vis'];
				 $mode =       $details['mode'];
				 $shop_id =       $details['shop_id'];
				$datetime =   $details['datetime'];
				$pickup_date =   $details['pickup_time_date'];
		
 //calling order lists that are confirmed - approved mode -1-

				if($mode=='1')
				{
				//user
				$query = "SELECT * FROM billing_info_vis where user_id_vis = '$client_id'  ";
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
					

if(!empty($pickup_date) && !empty($datetime))
{
echo '
		<blockquote style="background-color:#f8f8f8;">
		 <h4 class="text-Default"><img src="/img/site_img/approved.png" height="25"/> Pick-up Deal <span style="font-size:0.7em;" class="text-success">Approved.</span></h4>
		  <small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info_vis('.$order_id.')" style="cursor:pointer;" class="pull-right">View Information</a></small>
		</blockquote>';
}
else{

	
echo '
<blockquote style="background-color:#f8f8f8;">
 <h4 class="text-Default"><img src="/img/site_img/approved.png" height="25"/> Delivery Deal <span style="font-size:0.7em;" class="text-success">Approved.</span></h4>
  <small>Date : <cite title="Source Title">'.$datetime.'</cite><a type="submit"  onClick="info_vis('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
</blockquote>';
			
						}
					
						}
						}
				else{echo "error";}
                //---------------
				}
				else if($mode=='0')
				{
				//user
				$query = "SELECT * FROM billing_info_vis where user_id_vis = '$client_id'  ";
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
					

if(!empty($pickup_date) && !empty($datetime))
{
echo '
<blockquote style="background-color:#f8f8f8;" >
 <h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25"/> Pick-up Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4>
  <small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info_vis('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
</blockquote>';
}
else{				
echo '
<blockquote style="background-color:#f8f8f8;" >
<h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25"/> Delivery Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4>
<small>Date : <cite title="Source Title">'.$datetime.'</cite><a type="submit"  onClick="info_vis('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
</blockquote>';
						
						}
					
						}
						}
				else{echo "error";}
                //---------------
				}
				
			
	}
	}
}	 	 			 
}