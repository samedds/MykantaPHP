<?php 
include "include/conxn.php";
if(isset($_POST['task']))
{
include "include/conxn.php";
include "include/sessionfile.php";  

include "../include/funcxn.php";

$res = safe_input($_POST['shopname']);
$shopName = preg_replace('/[^[:alnum:]]/', ' ', $res);
$telephone = safe_input($_POST['telephone']);
$country = safe_input($_POST['country']);
$city = safe_input($_POST['city']);
$core_products= safe_input($_POST['core_products']);
$bus_type= safe_input($_POST['bus_type']);
$code = safe_input($_POST['code']);
$state = safe_input($_POST['state']);
$shop_descrb = safe_input($_POST['shop_descrb']);
$address = safe_input($_POST['address']);
$email= safe_input($_POST['email']);
$category= safe_input($_POST['bus_cat']);
$url= safe_input($_POST['business_url']);
$user_id = $_SESSION['id'];
$datetime = date('j F Y ');
$do1 = $_POST['do1'];
$do2 = $_POST['do2'];
$do3 = $_POST['do3'];

if (empty($shopName)) 
{
 echo $nameErr = '<p class="text-danger">Business name needed</p>';
} else
if (empty($telephone)) 
{
 echo $telephon = '<p class="text-danger">Telephone Needed</p>';
}  else
if (empty($shop_descrb)) 
{
 echo $shop_descr = '<p class="text-danger">Business description needed</p>';
} else
if (empty($city))
{
 echo $nameErr = '<p class="text-danger">City Needed</p>';
} else
if (empty($core_products))
{
 echo $nameErr = '<p class="text-danger">Core products needed</p>';
}

else
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
 {
 echo  $emailErr = '<p class="text-danger">Invalid email format</p>';
}
else
if(!empty($shopName))
{
$query2 = "SELECT shopName FROM shop WHERE shopName = '$shopName'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
echo  $shopname_error = '<p class="text-danger">Business name already used, please use a different name</p>';
}
else 
{
$queryqa = "SELECT COUNT(user_id) FROM shop WHERE user_id ='$user_id'
";
$query_data = mysqli_query($link,$queryqa);
$query_count = mysqli_fetch_row($query_data);
$shop_count = $query_count[0];

if ( $shop_count <= 1)
{
$queryshop = "INSERT INTO shop(shop_id, user_id, shopName, shop_descrb, telephone, state, country, city, countryCode, address, email, category, 	bus_type, core_products, mode, datetime, business_url) VALUES (NULL, '$user_id', '$shopName', '$shop_descrb','$telephone', '$state', '$country', '$city', '$code', '$address', '$email', '$category','$bus_type','$core_products','1','$datetime','$url')";

	if($queryshop1 = mysqli_query($link,$queryshop))
	{
	 $queryqs = "SELECT * FROM shop WHERE `shopName` = '$shopName' LIMIT 0 , 1 ";

		if($query4user_info = mysqli_query($link,$queryqs))
			{
				 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
				 {
				$shop_id = $allpalls_info['shop_id'];
				$user_id    = $allpalls_info['user_id'];
				$shopName = $allpalls_info['shopName'];
				$image_loc = "img/banners/banner.png";
                $image_loc_mini = "img/banners/mini/banner.png";

$queryim = "INSERT INTO `myshop`.`banner_pic` (
`banner_id` ,
`shop_id` ,
`image_loc`,
`image_loc_mini_index`
)
VALUES (
NULL , '$shop_id', '$image_loc', '$image_loc_mini'
)";
					
					if($sqi = mysqli_query($link,$queryim))
					{
					
					$query_do = " INSERT INTO `delivery_option` (`id`, `shop_id`, `option_1`, `option_2`, `option_3`) VALUES (NULL, '$shop_id', '$do1', '$do2', '$do3')";
if($sqi = mysqli_query($link,$query_do))
{											
 echo ' <a href="/user/my_business/'.$shopName.'"><p class="text-success"><strong>Successful, click to enter your Business page</strong></p></a>';	


$mail_from = "no-reply@mykanta.com";
$mail_mykanta = "mykantaa1@gmail.com";
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
$headers .= 'From: Mykanta Support <'.$mail_from.'>'. "\r\n";
$mail_to = $email;
$subject = "MYKANTA BUSINESS PAGE";
  $message = '
	<html lang="en-us">
		<head>
		<style>
*{margin:0;padding:0}*{font-family:"Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif}img{max-width:100%}.collapse{margin:0;padding:0}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100% !important;height:100%}a{color:#2ba6cb} .btn{display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;border: 1px solid transparent;border-radius: 4px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;color: #333;background-color: white;border-color: #CCC;} p.callout{padding:15px;background-color:#ecf8ff;margin-bottom:15px}.callout a{font-weight:bold;color:#2ba6cb}table.social{background-color:#ebebeb}.social .soc-btn{padding:3px 7px;border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px; font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:bold;display:block;text-align:center}a.fb{background-color:#3b5998 !important}a.tw{background-color:#1daced !important}a.gp{background-color:#db4a39 !important}a.ms{background-color:#000 !important}.sidebar .soc-btn{display:block;width:100%}table.head-wrap{width:100%}.header.container table td.logo{padding:15px}.header.container table td.label{padding:15px;padding-left:0}table.body-wrap{width:100%}table.footer-wrap{width:100%;clear:both !important}.footer-wrap .container td.content p{border-top:1px solid #d7d7d7;padding-top:15px}.footer-wrap .container td.content p{font-size:10px;font-weight:bold}h1,h2,h3,h4,h5,h6{font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:1.1;margin-bottom:15px;color:#000}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small{font-size:60%;color:#6f6f6f;line-height:0;text-transform:none}h1{font-weight:200;font-size:44px}h2{font-weight:200;font-size:37px}h3{font-weight:500;font-size:27px}h4{font-weight:500;font-size:23px}h5{font-weight:900;font-size:17px}h6{font-weight:900;font-size:14px;text-transform:uppercase;color:#444}.collapse{margin:0 !important}p,ul{margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6}p.lead{font-size:17px}p.last{margin-bottom:0}ul li{margin-left:5px;list-style-position:inside}ul.sidebar{background:#ebebeb;display:block;list-style-type:none}ul.sidebar li{display:block;margin:0}ul.sidebar li a{text-decoration:none;color:#666;padding:10px 16px;margin-right:10px;cursor:pointer;border-bottom:1px solid #777;border-top:1px solid #fff;display:block;margin:0}ul.sidebar li a.last{border-bottom-width:0}ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p{margin-bottom:0 !important}.container{display:block !important;max-width:600px !important;margin:0 auto !important;clear:both !important}.content{padding:15px;max-width:600px;margin:0 auto;display:block}.content table{width:100%}.column{width:300px;float:left}.column tr td{padding:15px}.column-wrap{padding:0 !important;margin:0 auto;max-width:600px !important}.column table{width:100%}.social .column{width:280px;min-width:279px;float:left}.clear{display:block;clear:both}@media only screen and (max-width:600px){a[class="btn"]{display:block !important;margin-bottom:10px !important;background-image:none !important;margin-right:0 !important}div[class="column"]{width:auto !important;float:none !important}table.social div[class="column"]{width:auto !important}}
</style>
		</head>
		<body >		
		<h3>BUSINESS CREATION</h3>
		<p><img src="http://www.mykanta.com/img/site_img/email_mk.png" /></p>
		<P>Welcome,</P>
		<P>Do more with your Business page!!</P>
		<P>Upload and manage your products anywhere in the world. Receive orders from both local and foreign customers after verification.</P>
		<form method="get" action="www.mykanta.com/download/Executive_summary.pdf">
		<p> CLick to download Executive summary to find out more about mykanta business page.<button>Executive Summary</button></P></form>
		<P>Your unique business page link is provided below.</p> 
		<a href="http://www.mykanta.com/business/'.$shopName.'"> http://www.mykanta.com/business/'.$shopName.' </a>
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
		$message_mykanta = '
	<html lang="en-us">
		<head>
		<style>
*{margin:0;padding:0}*{font-family:"Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif}img{max-width:100%}.collapse{margin:0;padding:0}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100% !important;height:100%}a{color:#2ba6cb} .btn{display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;border: 1px solid transparent;border-radius: 4px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;color: #333;background-color: white;border-color: #CCC;} p.callout{padding:15px;background-color:#ecf8ff;margin-bottom:15px}.callout a{font-weight:bold;color:#2ba6cb}table.social{background-color:#ebebeb}.social .soc-btn{padding:3px 7px;border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px; font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:bold;display:block;text-align:center}a.fb{background-color:#3b5998 !important}a.tw{background-color:#1daced !important}a.gp{background-color:#db4a39 !important}a.ms{background-color:#000 !important}.sidebar .soc-btn{display:block;width:100%}table.head-wrap{width:100%}.header.container table td.logo{padding:15px}.header.container table td.label{padding:15px;padding-left:0}table.body-wrap{width:100%}table.footer-wrap{width:100%;clear:both !important}.footer-wrap .container td.content p{border-top:1px solid #d7d7d7;padding-top:15px}.footer-wrap .container td.content p{font-size:10px;font-weight:bold}h1,h2,h3,h4,h5,h6{font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:1.1;margin-bottom:15px;color:#000}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small{font-size:60%;color:#6f6f6f;line-height:0;text-transform:none}h1{font-weight:200;font-size:44px}h2{font-weight:200;font-size:37px}h3{font-weight:500;font-size:27px}h4{font-weight:500;font-size:23px}h5{font-weight:900;font-size:17px}h6{font-weight:900;font-size:14px;text-transform:uppercase;color:#444}.collapse{margin:0 !important}p,ul{margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6}p.lead{font-size:17px}p.last{margin-bottom:0}ul li{margin-left:5px;list-style-position:inside}ul.sidebar{background:#ebebeb;display:block;list-style-type:none}ul.sidebar li{display:block;margin:0}ul.sidebar li a{text-decoration:none;color:#666;padding:10px 16px;margin-right:10px;cursor:pointer;border-bottom:1px solid #777;border-top:1px solid #fff;display:block;margin:0}ul.sidebar li a.last{border-bottom-width:0}ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p{margin-bottom:0 !important}.container{display:block !important;max-width:600px !important;margin:0 auto !important;clear:both !important}.content{padding:15px;max-width:600px;margin:0 auto;display:block}.content table{width:100%}.column{width:300px;float:left}.column tr td{padding:15px}.column-wrap{padding:0 !important;margin:0 auto;max-width:600px !important}.column table{width:100%}.social .column{width:280px;min-width:279px;float:left}.clear{display:block;clear:both}@media only screen and (max-width:600px){a[class="btn"]{display:block !important;margin-bottom:10px !important;background-image:none !important;margin-right:0 !important}div[class="column"]{width:auto !important;float:none !important}table.social div[class="column"]{width:auto !important}}
</style>
		</head>
		<body >		
		<h3>BUSINESS CREATION</h3>
		<p><img src="http://www.mykanta.com/img/site_img/email_mk.png" /></p>	
		<P>Welcome '.$shopName.',</P>
		
		<P>The unique business page link is provided below.</p> 
		<a href="http://www.mykanta.com/business/'.$shopName.'"> http://www.mykanta.com/business/'.$shopName.' </a>
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
mail($mail_to,$subject,$message,$headers);
mail($mail_mykanta,$subject,$message_mykanta,$headers);
// end of verify link code-----------------------------------------------------------------------------
 
}
else echo"Error";
					             
					}
				}	  
		   } 		 		 		 			 
    }
	else 
	{
	echo 'Please report this to the Admin';
	}
}
else {
      echo '<p class="text-danger"><strong>Sorry, you can create only one Business accounts</p>
           <p class="text-warning"><strong>Send us an email to support@mykanta.com to request for additional Business page</p>';
     }
}

}
}
else if(isset($_POST['service_task']))
{
include "include/conxn.php";
include "include/sessionfile.php";  

include "../include/funcxn.php";

$res = safe_input($_POST['shopname']);
$shopName = preg_replace('/[^[:alnum:]]/', ' ', $res);
$telephone = safe_input($_POST['telephone']);
$country = safe_input($_POST['country']);
$city = safe_input($_POST['city']);
$core_products= safe_input($_POST['core_products']);
$bus_type= 'Service';
$code = safe_input($_POST['code']);
$state = safe_input($_POST['state']);
$shop_descrb = safe_input($_POST['shop_descrb']);
$address = safe_input($_POST['address']);
$email= safe_input($_POST['email']);
$category= safe_input($_POST['bus_cat']);
$url= safe_input($_POST['business_url']);
$user_id = $_SESSION['id'];
$datetime = date('j F Y ');


if (empty($shopName)) 
{
 echo $nameErr = '<p class="text-danger">Business Service name needed</p>';
} else
if (empty($telephone)) 
{
 echo $telephon = '<p class="text-danger">Telephone Needed</p>';
}  else
if (empty($shop_descrb)) 
{
 echo $shop_descr = '<p class="text-danger">Service description needed</p>';
} else
if (empty($city))
{
 echo $nameErr = '<p class="text-danger">City Needed</p>';
} else
if (empty($core_products))
{
 echo $nameErr = '<p class="text-danger">Core Services performed.</p>';
}
else
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
 {
 echo  $emailErr = '<p class="text-danger">Invalid email format</p>';
}
else
if(!empty($shopName))
{
$query2 = "SELECT shopName FROM shop WHERE shopName = '$shopName'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
echo  $shopname_error = '<p class="text-danger">Business Service name already used, please use a different name</p>';
}
else 
{
$queryqa = "SELECT COUNT(user_id) FROM shop WHERE user_id ='$user_id'
";
$query_data = mysqli_query($link,$queryqa);
$query_count = mysqli_fetch_row($query_data);
$shop_count = $query_count[0];

if ( $shop_count <= 1)
{
$queryshop = "INSERT INTO shop(shop_id, user_id, shopName, shop_descrb, telephone, state, country, city, countryCode, address, email, category, 	bus_type, core_products, mode, datetime, business_url) VALUES (NULL, '$user_id', '$shopName', '$shop_descrb','$telephone', '$state', '$country', '$city', '$code', '$address', '$email', '$category','$bus_type','$core_products','1','$datetime','$url')";

	if($queryshop1 = mysqli_query($link,$queryshop))
	{
	 $queryqs = "SELECT * FROM shop WHERE `shopName` = '$shopName' LIMIT 0 , 1 ";

		if($query4user_info = mysqli_query($link,$queryqs))
			{
				 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
				 {
				$shop_id = $allpalls_info['shop_id'];
				$user_id    = $allpalls_info['user_id'];
				$shopName = $allpalls_info['shopName'];
				$image_loc = "img/banners/banner.png";
                $image_loc_mini = "img/banners/mini/banner.png";

$queryim = "INSERT INTO `myshop`.`banner_pic` (
`banner_id` ,
`shop_id` ,
`image_loc`,
`image_loc_mini_index`
)
VALUES (
NULL , '$shop_id', '$image_loc', '$image_loc_mini'
)";
					
if($sqi = mysqli_query($link,$queryim))	
{											
 echo ' <a href="/user/my_business/'.$shopName.'"><p class="text-success"><strong>Successful, click to enter your Business page</strong></p></a>';	


$mail_from = "no-reply@mykanta.com";
$mail_mykanta = "mykantaa1@gmail.com";
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
$headers .= 'From: Mykanta Support <'.$mail_from.'>'. "\r\n";
$mail_to = $email;
$subject = "MYKANTA SERVICE PAGE";
 $message = '
	<html lang="en-us">
		<head>
		<style>
*{margin:0;padding:0}*{font-family:"Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif}img{max-width:100%}.collapse{margin:0;padding:0}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100% !important;height:100%}a{color:#2ba6cb} .btn{display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;border: 1px solid transparent;border-radius: 4px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;color: #333;background-color: white;border-color: #CCC;} p.callout{padding:15px;background-color:#ecf8ff;margin-bottom:15px}.callout a{font-weight:bold;color:#2ba6cb}table.social{background-color:#ebebeb}.social .soc-btn{padding:3px 7px;border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px; font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:bold;display:block;text-align:center}a.fb{background-color:#3b5998 !important}a.tw{background-color:#1daced !important}a.gp{background-color:#db4a39 !important}a.ms{background-color:#000 !important}.sidebar .soc-btn{display:block;width:100%}table.head-wrap{width:100%}.header.container table td.logo{padding:15px}.header.container table td.label{padding:15px;padding-left:0}table.body-wrap{width:100%}table.footer-wrap{width:100%;clear:both !important}.footer-wrap .container td.content p{border-top:1px solid #d7d7d7;padding-top:15px}.footer-wrap .container td.content p{font-size:10px;font-weight:bold}h1,h2,h3,h4,h5,h6{font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:1.1;margin-bottom:15px;color:#000}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small{font-size:60%;color:#6f6f6f;line-height:0;text-transform:none}h1{font-weight:200;font-size:44px}h2{font-weight:200;font-size:37px}h3{font-weight:500;font-size:27px}h4{font-weight:500;font-size:23px}h5{font-weight:900;font-size:17px}h6{font-weight:900;font-size:14px;text-transform:uppercase;color:#444}.collapse{margin:0 !important}p,ul{margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6}p.lead{font-size:17px}p.last{margin-bottom:0}ul li{margin-left:5px;list-style-position:inside}ul.sidebar{background:#ebebeb;display:block;list-style-type:none}ul.sidebar li{display:block;margin:0}ul.sidebar li a{text-decoration:none;color:#666;padding:10px 16px;margin-right:10px;cursor:pointer;border-bottom:1px solid #777;border-top:1px solid #fff;display:block;margin:0}ul.sidebar li a.last{border-bottom-width:0}ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p{margin-bottom:0 !important}.container{display:block !important;max-width:600px !important;margin:0 auto !important;clear:both !important}.content{padding:15px;max-width:600px;margin:0 auto;display:block}.content table{width:100%}.column{width:300px;float:left}.column tr td{padding:15px}.column-wrap{padding:0 !important;margin:0 auto;max-width:600px !important}.column table{width:100%}.social .column{width:280px;min-width:279px;float:left}.clear{display:block;clear:both}@media only screen and (max-width:600px){a[class="btn"]{display:block !important;margin-bottom:10px !important;background-image:none !important;margin-right:0 !important}div[class="column"]{width:auto !important;float:none !important}table.social div[class="column"]{width:auto !important}}
</style>
		</head>
		<body >		
<h3>SERVICE CREATION</h3>
		<p><img src="http://www.mykanta.com/img/site_img/email_mk.png" /></p>		<P>Welcome,</P>
		<P>Do more with your Service page!!</P>
		<P>>Upload and manage your services anywhere in the world. Receive orders from both local and foreign clients after verification.</P>
		<form method="get" action="www.mykanta.com/download/Executive_summary.pdf">
		<p> CLick to download Executive summary to find out more about mykanta service page.<button>Executive Summary</button></P></form>
		<P>Your unique service page link is provided below.</p> 
		<a href="http://www.mykanta.com/business/'.$shopName.'"> http://www.mykanta.com/business/'.$shopName.' </a>
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
		$message_mykanta = '
	<html lang="en-us">
		<head>
		<style>
*{margin:0;padding:0}*{font-family:"Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif}img{max-width:100%}.collapse{margin:0;padding:0}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100% !important;height:100%}a{color:#2ba6cb} .btn{display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;border: 1px solid transparent;border-radius: 4px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;color: #333;background-color: white;border-color: #CCC;} p.callout{padding:15px;background-color:#ecf8ff;margin-bottom:15px}.callout a{font-weight:bold;color:#2ba6cb}table.social{background-color:#ebebeb}.social .soc-btn{padding:3px 7px;border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px; font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:bold;display:block;text-align:center}a.fb{background-color:#3b5998 !important}a.tw{background-color:#1daced !important}a.gp{background-color:#db4a39 !important}a.ms{background-color:#000 !important}.sidebar .soc-btn{display:block;width:100%}table.head-wrap{width:100%}.header.container table td.logo{padding:15px}.header.container table td.label{padding:15px;padding-left:0}table.body-wrap{width:100%}table.footer-wrap{width:100%;clear:both !important}.footer-wrap .container td.content p{border-top:1px solid #d7d7d7;padding-top:15px}.footer-wrap .container td.content p{font-size:10px;font-weight:bold}h1,h2,h3,h4,h5,h6{font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:1.1;margin-bottom:15px;color:#000}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small{font-size:60%;color:#6f6f6f;line-height:0;text-transform:none}h1{font-weight:200;font-size:44px}h2{font-weight:200;font-size:37px}h3{font-weight:500;font-size:27px}h4{font-weight:500;font-size:23px}h5{font-weight:900;font-size:17px}h6{font-weight:900;font-size:14px;text-transform:uppercase;color:#444}.collapse{margin:0 !important}p,ul{margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6}p.lead{font-size:17px}p.last{margin-bottom:0}ul li{margin-left:5px;list-style-position:inside}ul.sidebar{background:#ebebeb;display:block;list-style-type:none}ul.sidebar li{display:block;margin:0}ul.sidebar li a{text-decoration:none;color:#666;padding:10px 16px;margin-right:10px;cursor:pointer;border-bottom:1px solid #777;border-top:1px solid #fff;display:block;margin:0}ul.sidebar li a.last{border-bottom-width:0}ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p{margin-bottom:0 !important}.container{display:block !important;max-width:600px !important;margin:0 auto !important;clear:both !important}.content{padding:15px;max-width:600px;margin:0 auto;display:block}.content table{width:100%}.column{width:300px;float:left}.column tr td{padding:15px}.column-wrap{padding:0 !important;margin:0 auto;max-width:600px !important}.column table{width:100%}.social .column{width:280px;min-width:279px;float:left}.clear{display:block;clear:both}@media only screen and (max-width:600px){a[class="btn"]{display:block !important;margin-bottom:10px !important;background-image:none !important;margin-right:0 !important}div[class="column"]{width:auto !important;float:none !important}table.social div[class="column"]{width:auto !important}}
</style>
		</head>
		<body >		
<h3>SERVICE CREATION</h3>
		<p><img src="http://www.mykanta.com/img/site_img/email_mk.png" /></p>	
		<P>Welcome '.$shopName.',</P>
		
		<P>The unique service page link is provided below.</p> 
		<a href="http://www.mykanta.com/business/'.$shopName.'"> http://www.mykanta.com/business/'.$shopName.' </a>
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
mail($mail_to,$subject,$message,$headers);
mail($mail_mykanta,$subject,$message_mykanta,$headers);
// end of verify link code-----------------------------------------------------------------------------
					             
					}
				}	  
		   } 		 		 		 			 
    }
	else 
	{
	echo 'Please report this to the Admin';
	}
}
else {
      echo '<p class="text-danger"><strong>Sorry, you can create only one Business accounts</p>
           <p class="text-warning"><strong>Send us an email to support@mykanta.com to request for additional Business page</p>';
     }
}

}
}
?>