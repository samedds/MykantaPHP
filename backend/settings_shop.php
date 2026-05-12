<?php 
include "include/conxn.php";
?>
<?php
// register shop processor file for logged in user
if(isset($_POST['task']))
{
include "include/conxn.php";
include "../include/funcxn.php";
include "include/sessionfile.php";


$shopName_setings = safe_input($_POST['shopName_setings']);
$telephone_setings = safe_input($_POST['telephone_setings']);
$city_setings = safe_input($_POST['city_setings']);
$shop_descrb_setings = safe_input($_POST['shop_descrb_setings']);
$address_setings = safe_input($_POST['address_setings']);
$shop_id = safe_input($_POST['shop_id']);
 $user_id = safe_input($_SESSION['id']);
 $account_id = safe_input($_SESSION['id']);
 
$query = "SELECT * FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 5 ";

$query4user_info = mysqli_query($link,$query);

	 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))

		 {
$user_id = safe_input($allpalls_info['user_id']);
$shopName = safe_input($allpalls_info['shopName']);
$telephone = safe_input($allpalls_info['telephone']);
$shop_descrb = safe_input($allpalls_info['shop_descrb']);
$address = safe_input($allpalls_info['address']);
$city = safe_input($allpalls_info['city']);

//checking if empty 		
		 if(empty($shopName_setings) && empty($telephone_setings)&& empty($shop_descrb_setings)&& empty($address_setings) && empty($city_setings))
		 {
		   echo '<span class="text-danger">no entry</span>';
		 }
else 
{
//checking 1stname if empty 	
		 if(empty($shopName_setings))
		 {
		  $shopName_setings = $shopName ;
		 }//checking 1stname if empty 	
		 if(empty($shop_descrb_setings))
		 {
		  $shop_descrb_setings = $shop_descrb ;
		 }//checking 1stname if empty 	
		 if(empty($address_setings))
		 {
		  $address_setings = $address ;
		 }//checking 1stname if empty 	
		 if(empty($telephone_setings))
		 {
		  $telephone_setings = $telephone ;
		 }//checking 1stname if empty 	
		 if(empty($city_setings))
		 {
		  $city_setings = $city ;
		 }

$query_shop ="UPDATE `myshop`.`shop` SET `shopName` = '$shopName_setings',`shop_descrb` = '$shop_descrb_setings',`telephone` = '$telephone_setings',`address` = '$address_setings',`city` = '$city_setings' WHERE `shop`.`shop_id` =$shop_id";
 

if(mysqli_query($link,$query_shop))
 {
	 	echo '<span class="text-successful">Shop details saved</span>'; 
 }
else {
echo 'there was an error, reload the page please';
}

}


}
}
if(isset($_POST['security_key_task']))
{
include "include/conxn.php";
include "../include/funcxn.php";
include "include/sessionfile.php";


$security_key = $_POST['security_key'];
$shop_id = $_POST['shop_id'];
$user_id = $_SESSION['id'];
$datetime = date("Y-m-d H:i:s");  
 
$query = "INSERT INTO verify (verify_id, shop_id, user_id, type, datetime) VALUES (NULL,'$shop_id','$user_id', '0','$datetime')";
if($query4user_info = mysqli_query($link,$query))
  {
	$selshopdescr = "SELECT * FROM shop WHERE shop_id = '$shop_id' LIMIT 1";
	if($queryshopdescr = mysqli_query($link,$selshopdescr))
	{
		while($while_shopdescr = mysqli_fetch_assoc($queryshopdescr))
		{
		$email = $while_shopdescr['email'];
		$shopName = $while_shopdescr['shopName'];
		$telephone = $while_shopdescr['telephone'];
		$headers = 'MIME-Version: 1.0'. "\r\n";
		$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
		$headers .= 'From: mykanta.com<support@mykanta.com>'. "\r\n";
		$mail_to_mykanta = 'hipicompany@gmail.com';
		$mail_from = "support@mykanta.com";
		$subject = "Business Verification";
$message_user =  '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>BUSINESS VERFICATION</title>
<style>
*{margin:0;padding:0}*{font-family:"Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif}img{max-width:100%}.collapse{margin:0;padding:0}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100% !important;height:100%}a{color:#2ba6cb} .btn{display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;border: 1px solid transparent;border-radius: 4px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;color: #333;background-color: white;border-color: #CCC;} p.callout{padding:15px;background-color:#ecf8ff;margin-bottom:15px}.callout a{font-weight:bold;color:#2ba6cb}table.social{background-color:#ebebeb}.social .soc-btn{padding:3px 7px;border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px; font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:bold;display:block;text-align:center}a.fb{background-color:#3b5998 !important}a.tw{background-color:#1daced !important}a.gp{background-color:#db4a39 !important}a.ms{background-color:#000 !important}.sidebar .soc-btn{display:block;width:100%}table.head-wrap{width:100%}.header.container table td.logo{padding:15px}.header.container table td.label{padding:15px;padding-left:0}table.body-wrap{width:100%}table.footer-wrap{width:100%;clear:both !important}.footer-wrap .container td.content p{border-top:1px solid #d7d7d7;padding-top:15px}.footer-wrap .container td.content p{font-size:10px;font-weight:bold}h1,h2,h3,h4,h5,h6{font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:1.1;margin-bottom:15px;color:#000}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small{font-size:60%;color:#6f6f6f;line-height:0;text-transform:none}h1{font-weight:200;font-size:44px}h2{font-weight:200;font-size:37px}h3{font-weight:500;font-size:27px}h4{font-weight:500;font-size:23px}h5{font-weight:900;font-size:17px}h6{font-weight:900;font-size:14px;text-transform:uppercase;color:#444}.collapse{margin:0 !important}p,ul{margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6}p.lead{font-size:17px}p.last{margin-bottom:0}ul li{margin-left:5px;list-style-position:inside}ul.sidebar{background:#ebebeb;display:block;list-style-type:none}ul.sidebar li{display:block;margin:0}ul.sidebar li a{text-decoration:none;color:#666;padding:10px 16px;margin-right:10px;cursor:pointer;border-bottom:1px solid #777;border-top:1px solid #fff;display:block;margin:0}ul.sidebar li a.last{border-bottom-width:0}ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p{margin-bottom:0 !important}.container{display:block !important;max-width:600px !important;margin:0 auto !important;clear:both !important}.content{padding:15px;max-width:600px;margin:0 auto;display:block}.content table{width:100%}.column{width:300px;float:left}.column tr td{padding:15px}.column-wrap{padding:0 !important;margin:0 auto;max-width:600px !important}.column table{width:100%}.social .column{width:280px;min-width:279px;float:left}.clear{display:block;clear:both}@media only screen and (max-width:600px){a[class="btn"]{display:block !important;margin-bottom:10px !important;background-image:none !important;margin-right:0 !important}div[class="column"]{width:auto !important;float:none !important}table.social div[class="column"]{width:auto !important}}
</style>

</head>
<body class="padding-10">	
<h3>BUSINESS VERIFICATION</h3>
<p><img src="http://www.mykanta.com/img/site_img/email_mk.png" /></p>		
<p> '.$shopName.' requested for a business verification .</p>
<p> security key  : '.$security_key.' </p>
<p> Email         : '.$email.' </p>
<p> telephone     :  +233 '.$telephone.' </p>
<p> Date          : '.$datetime.' </p>

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
</html>';
		//sends the mail
	//	mail($email,$subject,$message_user,$headers);
		mail($mail_to_mykanta,$subject,$message_user,$headers);
		}
	}
  }
   else echo 'did not insert';
}
?>