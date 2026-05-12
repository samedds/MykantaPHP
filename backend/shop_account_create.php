<?php
include "include/conxn.php";
if(isset($_POST['task']))
{
include "include/conxn.php";
include "../include/funcxn.php";
$username1 = $_POST['username'];
$username = preg_replace('/[[:space:]]+/','', $username1);
$email = $_POST['email'];
$password_safe = safe_input($_POST['password']);
$password = hash("sha256",$password_safe);
$firstname = safe_input($_POST['firstname']);
$datetime = safe_input($_POST['datetime']);
 // for birthday validation
	 $dob = $_POST['dob'];
	 $datetime1 =  date('j F Y ');
	 $datetime2 =  $_POST['dob'];
	 
	 $newdate1 = strtotime($datetime1);
	 $newdate2 = strtotime($datetime2);
	 
	 $dob1 =  date('Y ',$newdate1 );
	 $dob2=  date('Y ',$newdate2 );
	 
	 $result = $dob1 - $dob2.' years';  

if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) 
{
echo $nameErr = "Only letters";
}
else if($result <= 17 )
{
echo 'Sorry you are below 18 years.';
}
else if (!empty($username)) 
{
$query = "SELECT username FROM registration where username = '$username' ";
$query_add = mysqli_query($link,$query);
if($query1 = mysqli_num_rows($query_add)>=1)
{
echo "Username already used.";
}	
else 	
{
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
echo  $emailErr = "Invalid email format";
}
else 
{
$query = "SELECT email FROM registration where email = '$email' ";
$query_add = mysqli_query($link,$query);
if($query1 = mysqli_num_rows($query_add)>=1)
{
echo "Email already used.";
}	
else 	
{ 
$query = "INSERT INTO `myshop`.`registration` ( `firstName` ,`dob` ,`email` ,`telephone` ,`username` ,`password` ,`country` ,`city` ,`countryCode` ,`id`,`datetime`)VALUES ('$firstname', '$dob', '$email','', '$username', '$password','', '', '', NULL,'$datetime' )";
if($query1 = mysqli_query($link,$query))
{
include "include/conxn.php";
$query4_auth = "SELECT id FROM registration WHERE email = '$email' LIMIT 1 ";
$authenticate = mysqli_query($link,$query4_auth);	
while($user_auth_info = mysqli_fetch_array($authenticate,MYSQLI_ASSOC))
{
$account_id =  safe_input($user_auth_info['id']);
$image_loc = "img/avatars/image1.jpg";	
$query12 = "INSERT INTO `myshop`.`profile_pic` (`profile_pic_id` ,`account_id` ,`image_loc` )VALUES (NULL, '$account_id', '$image_loc')";

if($query_done  = mysqli_query($link,$query12))
{
//to get the link to verify in your email---------------------------------------------------------------
$value ="0";
$auth_email = $email.'authentication';
$sec_email = hash("sha256",$auth_email);

$query_flag="INSERT INTO `myshop`.`verify_user_auth` (`id` ,`email`,`value`,`auth_code_hash`)VALUES (NULL, '$email','$value','$sec_email' )";
if($query_done2  = mysqli_query($link,$query_flag))
{
$mail_from = "support@mykanta.com";
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
$headers .= 'From: Mykanta Support <'.$mail_from.'>'. "\r\n";
$mail_to = $email;

$mail_hipi = "hipicompany@gmail.com";
$subject = "Mykanta.com Verify your Account and Business Page.";
 $message = '
	<html lang="en-us">
		<head>
		</head>
		<body >		
		<h4 style="color:#2b8ba6;">ACCOUNT VERIFICATION</h4>
		<h5 style="color:#5bc0de;" >	Hi '.$username.',</h5>
		<P >Kindly confirm your email address to complete your mykanta account registration.</P>
		<P>Please click the button below to confirm your email account.
		<div>
		<a href="https://www.mykanta.com/verify_user_auth.php?ref_auth='.$sec_email.'" style="background-color:#5bc4e1;border:1px solid #251818;border-radius:15px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:38px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;mso-hide:all;">Verify</a>
														</div></P>
														<p style="color:#2b8ba6; font-size:9pt;">You recieved this email service announcement to update you about important information <br>about your mykasnta account, products or services. </p>
														<p style="color:#2b8ba6; font-size:9pt;" >Copyright 2015 HIPI,D705/5 AMERICAN HOUSE, TUDU-ACCRA, GHANA.
														</p>
												</body>
												</html>'; 
$message_hipi = '<html lang="en-us">
		<head>
	</head>
	<body >		
	<h4 style="color:#2b8ba6;">ACCOUNT VERIFICATION</h4>
	<h5 style="color:#5bc0de;"  '.$username.',</h5>
	<P >A user has created a business at the index page</P>
	<p style="color:#2b8ba6; font-size:9pt;">You recieved this email service announcement to update you about important information <br>about your mykasnta account, products or services. </p>
														<p style="color:#2b8ba6; font-size:9pt;" >Copyright 2015 HIPI,D705/5 AMERICAN HOUSE, TUDU-ACCRA, GHANA.
														</p>
												</body>
												</html>';

//sends the mail
mail($mail_to,$subject,$message,$headers);
mail($mail_hipi,$subject,$message_hipi,$headers);
// end of verify link code-----------------------------------------------------------------------------

//inserting into shop table						
//shop insert with default inputs.
$res = safe_input($_POST['shopName']);
$shopName = preg_replace('/[^[:alnum:]]/', ' ', $res);
$shop_telephone =$_POST['shop_telephone'];
$emailsh= $_POST['shop_email'];
$bus_type= safe_input($_POST['bus_type']);
//$core_products = safe_input($_POST['core_products']);
$category= safe_input($_POST['bus_cat']);
$datetime = safe_input($_POST['datetime']);
$country = safe_input($_POST['country']);
$code = safe_input($_POST['code']);
$city = safe_input($_POST['city']);

$do1 = '0';
$do2 = '0';
$do3 ='0'
;
$state = $_POST['state'];
$business_url = 'https://www.mykanta.com/business/'.$shopName.'';


if (empty($category)) 
{
echo $categor = '<p class="text-danger">Category Needed</p>';
} else
if (empty($shopName)) 
{
echo $nameErr = '<p class="text-danger">Shopname Needed</p>';
} else
if (empty($shop_telephone)) 
{
echo $shop_telephone = '<p class="text-danger">Telephone Needed</p>';
}  else
if (empty($city))
{
echo $nameErr = '<p class="text-danger">Type Needed</p>';
} else 
if (empty($bus_type))
{
echo $nameErr = '<p class="text-danger">City Needed</p>';
} else
if (empty($state))
{
echo $nameErr = '<p class="text-danger">State needed</p>';
}
else
if (empty($emailsh))
{
echo $nameErr = '<p class="text-danger">Shop email needed</p>';
}

else
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
echo  $emailErr = '<p class="text-danger">Invalid email format</p>';
}
else 
{
$query2 = "SELECT shopName FROM shop WHERE shopName = '$shopName'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
echo  $shopname_error = '<p class="text-danger">Shop name already used, please use a different name</p>';
}
else
{
$queryshop = "INSERT INTO shop(shop_id, user_id, shopName,telephone, state, country, city, countryCode,email, category,bus_type,mode,datetime,business_url)
 VALUES (NULL, '$account_id', '$shopName','$shop_telephone', '$state', '$country', '$city', '$code','$emailsh', '$category','$bus_type','1','$datetime','$business_url')";

if($queryshop1 = mysqli_query($link,$queryshop))
{
$queryna = "SELECT * FROM shop WHERE shopName = '$shopName' LIMIT 0 , 1 ";	

if($query4user_info = mysqli_query($link,$queryna))
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
echo "created";		                 
}
else echo"noaaa";
}


}	  
} 		 		 		 			 
}
else
{
echo 'Sorry, did not process.Please reload page and try again . If it persists please report this to the support@mykanta.com';
}
}
}							
}
else
{
echo '<p class="text-primary">did not work</p>';
}
}    
}
}
else
{
echo "<div class='info'>Sorry, please reload and try again or contact support@mykanta.com if this problem persist. Thanks...</div>";
}
}
}
/*	else
{
echo "Username empty. Please type in a username.";	
} */
}
/*	else
{
echo "<div class='info'>Sorry, no data was passed. Please try again or contact the site admin if this problem persist. Thanks...</div>";
} */

}
}	
?>