<?php //coming from: /js/live_edit_cart.js 
include "include/conxn.php";
if(isset($_POST['place_order']))
{
include "include/conxn.php";
include "include/sessionfile.php";  
include "../include/funcxn.php";
include "../include/check_out_process.php";

$user_id = $_SESSION['id'];

$shop_id = $_POST['shop_id'];$pickup_date = $_POST['pickup_date'];$time_date = $_POST['time_date'];
$shop_id_mail = $_POST['shop_id'];
$datetime = date('j F Y h:m:s a');
$order = md5($datetime);
$order_code = substr($order, 0, 6);
$cart_list = $_POST['cart_list'];
if(!empty($shop_id))
{
$new_Query = "INSERT INTO place_order (id, user_id, shop_id, mode, order_code, datetime, pickup_date) VALUES (NULL, '$user_id', '$shop_id', 'pending','$order_code', '$datetime', '$pickup_date')";
if($query = mysqli_query($link,$new_Query))
{
//user
$query = "SELECT * FROM billing_info where user_id = $user_id  ";
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
if(isset($time_date) && isset($pickup_date))
{
$pickup =  'Pick up Date: <span class="text-info">'.$_POST['pickup_date'].'</span> <br> Pick up Time: <span class="text-info">'.$_POST['time_date'].'</span> ';
}
else{
$pickup = 'User wants goods to be delivered to address.';
}
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
//send to mail
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
$headers .= 'From: mykanta.com<no-reply@mykanta.com>'. "\r\n";
$mail_to_user = $user_email;
$mail_to_business = $email;
$mail_to_mykanta = 'mykantaa1@gmail.com';
$mail_from = "no-reply@mykanta.com";
$subject = "Mykanta Product Order";
$message_user =  '"<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Connection Request</title>
<style>
*{margin:0;padding:0}*{font-family:"Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif}img{max-width:100%}.collapse{margin:0;padding:0}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100% !important;height:100%}a{color:#2ba6cb} .btn{display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;border: 1px solid transparent;border-radius: 4px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;color: #333;background-color: white;border-color: #CCC;} p.callout{padding:15px;background-color:#ecf8ff;margin-bottom:15px}.callout a{font-weight:bold;color:#2ba6cb}table.social{background-color:#ebebeb}.social .soc-btn{padding:3px 7px;border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px; font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:bold;display:block;text-align:center}a.fb{background-color:#3b5998 !important}a.tw{background-color:#1daced !important}a.gp{background-color:#db4a39 !important}a.ms{background-color:#000 !important}.sidebar .soc-btn{display:block;width:100%}table.head-wrap{width:100%}.header.container table td.logo{padding:15px}.header.container table td.label{padding:15px;padding-left:0}table.body-wrap{width:100%}table.footer-wrap{width:100%;clear:both !important}.footer-wrap .container td.content p{border-top:1px solid #d7d7d7;padding-top:15px}.footer-wrap .container td.content p{font-size:10px;font-weight:bold}h1,h2,h3,h4,h5,h6{font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:1.1;margin-bottom:15px;color:#000}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small{font-size:60%;color:#6f6f6f;line-height:0;text-transform:none}h1{font-weight:200;font-size:44px}h2{font-weight:200;font-size:37px}h3{font-weight:500;font-size:27px}h4{font-weight:500;font-size:23px}h5{font-weight:900;font-size:17px}h6{font-weight:900;font-size:14px;text-transform:uppercase;color:#444}.collapse{margin:0 !important}p,ul{margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6}p.lead{font-size:17px}p.last{margin-bottom:0}ul li{margin-left:5px;list-style-position:inside}ul.sidebar{background:#ebebeb;display:block;list-style-type:none}ul.sidebar li{display:block;margin:0}ul.sidebar li a{text-decoration:none;color:#666;padding:10px 16px;margin-right:10px;cursor:pointer;border-bottom:1px solid #777;border-top:1px solid #fff;display:block;margin:0}ul.sidebar li a.last{border-bottom-width:0}ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p{margin-bottom:0 !important}.container{display:block !important;max-width:600px !important;margin:0 auto !important;clear:both !important}.content{padding:15px;max-width:600px;margin:0 auto;display:block}.content table{width:100%}.column{width:300px;float:left}.column tr td{padding:15px}.column-wrap{padding:0 !important;margin:0 auto;max-width:600px !important}.column table{width:100%}.social .column{width:280px;min-width:279px;float:left}.clear{display:block;clear:both}@media only screen and (max-width:600px){a[class="btn"]{display:block !important;margin-bottom:10px !important;background-image:none !important;margin-right:0 !important}div[class="column"]{width:auto !important;float:none !important}table.social div[class="column"]{width:auto !important}}
</style>

</head>
<body class="padding-10">	
<h3>Product Order</h3>
<p><img src="http://www.mykanta.com/img/site_img/email_mk.png" /></p>		
<p>Hello '.$firstname.',</p>
<p>you ordered from '.$shopName.'. Below are details of the order and the business.</p>
'.$pickup.'
<p >Transaction Code :<span class="text-info"> '.$order_code.'</span></p>
<br>
<div class="row">
<div class="col-md-12">
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

</table><table style="color:black; font-size:9pt;">
<tr>
	<td align="center">
		<p style="color:black; font-size:9pt;">
			<a href="http://www.mykanta.com/TermandConditions">Terms</a> |
			<a href="http://www.mykanta.com/TermandConditions">Privacy</a> |
			<a href="http://www.mykanta.com/index_login.php">Login</a>
		</p>
		<p style="color:black; font-size:9pt;" >Copyright 2016 HIPI LLC,WEST AFRICA, GHANA.
       </p>
	</td>
</tr>
</table>
</body>
</html>"';
$message_business =  '"<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Connection Request</title>
<style>
*{margin:0;padding:0}*{font-family:"Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif}img{max-width:100%}.collapse{margin:0;padding:0}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100% !important;height:100%}a{color:#2ba6cb} .btn{display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;border: 1px solid transparent;border-radius: 4px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;color: #333;background-color: white;border-color: #CCC;} p.callout{padding:15px;background-color:#ecf8ff;margin-bottom:15px}.callout a{font-weight:bold;color:#2ba6cb}table.social{background-color:#ebebeb}.social .soc-btn{padding:3px 7px;border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px; font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:bold;display:block;text-align:center}a.fb{background-color:#3b5998 !important}a.tw{background-color:#1daced !important}a.gp{background-color:#db4a39 !important}a.ms{background-color:#000 !important}.sidebar .soc-btn{display:block;width:100%}table.head-wrap{width:100%}.header.container table td.logo{padding:15px}.header.container table td.label{padding:15px;padding-left:0}table.body-wrap{width:100%}table.footer-wrap{width:100%;clear:both !important}.footer-wrap .container td.content p{border-top:1px solid #d7d7d7;padding-top:15px}.footer-wrap .container td.content p{font-size:10px;font-weight:bold}h1,h2,h3,h4,h5,h6{font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:1.1;margin-bottom:15px;color:#000}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small{font-size:60%;color:#6f6f6f;line-height:0;text-transform:none}h1{font-weight:200;font-size:44px}h2{font-weight:200;font-size:37px}h3{font-weight:500;font-size:27px}h4{font-weight:500;font-size:23px}h5{font-weight:900;font-size:17px}h6{font-weight:900;font-size:14px;text-transform:uppercase;color:#444}.collapse{margin:0 !important}p,ul{margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6}p.lead{font-size:17px}p.last{margin-bottom:0}ul li{margin-left:5px;list-style-position:inside}ul.sidebar{background:#ebebeb;display:block;list-style-type:none}ul.sidebar li{display:block;margin:0}ul.sidebar li a{text-decoration:none;color:#666;padding:10px 16px;margin-right:10px;cursor:pointer;border-bottom:1px solid #777;border-top:1px solid #fff;display:block;margin:0}ul.sidebar li a.last{border-bottom-width:0}ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p{margin-bottom:0 !important}.container{display:block !important;max-width:600px !important;margin:0 auto !important;clear:both !important}.content{padding:15px;max-width:600px;margin:0 auto;display:block}.content table{width:100%}.column{width:300px;float:left}.column tr td{padding:15px}.column-wrap{padding:0 !important;margin:0 auto;max-width:600px !important}.column table{width:100%}.social .column{width:280px;min-width:279px;float:left}.clear{display:block;clear:both}@media only screen and (max-width:600px){a[class="btn"]{display:block !important;margin-bottom:10px !important;background-image:none !important;margin-right:0 !important}div[class="column"]{width:auto !important;float:none !important}table.social div[class="column"]{width:auto !important}}
</style>

</head>
<body class="padding-10">	
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
<table style="color:black; font-size:9pt;">
<tr>
	<td align="center">
		<p style="color:black; font-size:9pt;">
			<a href="http://www.mykanta.com/TermandConditions">Terms</a> |
			<a href="http://www.mykanta.com/TermandConditions">Privacy</a> |
			<a href="http://www.mykanta.com/index_login.php">Login</a>
		</p>
		<p style="color:black; font-size:9pt;" >Copyright 2016 HIPI LLC,WEST AFRICA, GHANA.
       </p>
	</td>
</tr>
</table>
</body>
</html>"';
$message_mykanta = '"<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Connection Request</title>
<style>
*{margin:0;padding:0}*{font-family:"Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif}img{max-width:100%}.collapse{margin:0;padding:0}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100% !important;height:100%}a{color:#2ba6cb} .btn{display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;border: 1px solid transparent;border-radius: 4px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;color: #333;background-color: white;border-color: #CCC;} p.callout{padding:15px;background-color:#ecf8ff;margin-bottom:15px}.callout a{font-weight:bold;color:#2ba6cb}table.social{background-color:#ebebeb}.social .soc-btn{padding:3px 7px;border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px; font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:bold;display:block;text-align:center}a.fb{background-color:#3b5998 !important}a.tw{background-color:#1daced !important}a.gp{background-color:#db4a39 !important}a.ms{background-color:#000 !important}.sidebar .soc-btn{display:block;width:100%}table.head-wrap{width:100%}.header.container table td.logo{padding:15px}.header.container table td.label{padding:15px;padding-left:0}table.body-wrap{width:100%}table.footer-wrap{width:100%;clear:both !important}.footer-wrap .container td.content p{border-top:1px solid #d7d7d7;padding-top:15px}.footer-wrap .container td.content p{font-size:10px;font-weight:bold}h1,h2,h3,h4,h5,h6{font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:1.1;margin-bottom:15px;color:#000}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small{font-size:60%;color:#6f6f6f;line-height:0;text-transform:none}h1{font-weight:200;font-size:44px}h2{font-weight:200;font-size:37px}h3{font-weight:500;font-size:27px}h4{font-weight:500;font-size:23px}h5{font-weight:900;font-size:17px}h6{font-weight:900;font-size:14px;text-transform:uppercase;color:#444}.collapse{margin:0 !important}p,ul{margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6}p.lead{font-size:17px}p.last{margin-bottom:0}ul li{margin-left:5px;list-style-position:inside}ul.sidebar{background:#ebebeb;display:block;list-style-type:none}ul.sidebar li{display:block;margin:0}ul.sidebar li a{text-decoration:none;color:#666;padding:10px 16px;margin-right:10px;cursor:pointer;border-bottom:1px solid #777;border-top:1px solid #fff;display:block;margin:0}ul.sidebar li a.last{border-bottom-width:0}ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p{margin-bottom:0 !important}.container{display:block !important;max-width:600px !important;margin:0 auto !important;clear:both !important}.content{padding:15px;max-width:600px;margin:0 auto;display:block}.content table{width:100%}.column{width:300px;float:left}.column tr td{padding:15px}.column-wrap{padding:0 !important;margin:0 auto;max-width:600px !important}.column table{width:100%}.social .column{width:280px;min-width:279px;float:left}.clear{display:block;clear:both}@media only screen and (max-width:600px){a[class="btn"]{display:block !important;margin-bottom:10px !important;background-image:none !important;margin-right:0 !important}div[class="column"]{width:auto !important;float:none !important}table.social div[class="column"]{width:auto !important}}
</style>

</head>
<body class="padding-10">	
<h3>Product Order</h3>
<p><img src="http://www.mykanta.com/img/site_img/email_mk.png" /></p>		
<p>Hello Mykanta,</p>
<p>An order has been made by '.$firstname.' from '.$shopName.'. Below are details of the order.</p>
'.$pickup.'
<p >Transaction Code :<span class="text-info"> '.$order_code.'</span></p>
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
<table style="color:black; font-size:9pt;">
<tr>
	<td align="center">
		<p style="color:black; font-size:9pt;">
			<a href="http://www.mykanta.com/TermandConditions">Terms</a> |
			<a href="http://www.mykanta.com/TermandConditions">Privacy</a> |
			<a href="http://www.mykanta.com/index_login.php">Login</a>
		</p>
		<p style="color:black; font-size:9pt;" >Copyright 2016 HIPI LLC,WEST AFRICA, GHANA.
       </p>
	</td>
</tr>
</table>
</body>
</html>"';

//sends the mail
mail($mail_to_user,$subject,$message_user,$headers);
mail($mail_to_business,$subject,$message_business,$headers);
mail($mail_to_mykanta,$subject,$message_mykanta,$headers);

}
}
}
}
}
}
else{echo "error";}
}
}
?>