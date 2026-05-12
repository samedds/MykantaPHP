<?php 
include "include/conxn.php";
if(isset($_POST['task']))
{
include "include/conxn.php";
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
$category= safe_input($_POST['category']);
$user_id = safe_input($_POST['user_id']);
$datetime = safe_input($_POST['datetime']);

if (empty($shopName)) 
{
 echo $nameErr = '<p class="text-danger">Shopname Needed</p>';
} else
if (empty($category)) 
{
 echo $categor = '<p class="text-danger">Category Needed</p>';
} else
if (empty($telephone)) 
{
 echo $telephon = '<p class="text-danger">Telephone Needed</p>';
}  else
if (empty($shop_descrb)) 
{
 echo $shop_descr = '<p class="text-danger">Shopname Needed</p>';
} else
if (empty($city))
{
 echo $nameErr = '<p class="text-danger">City Needed</p>';
} else
if (empty($bus_type))
{
 echo $nameErr = '<p class="text-danger">City Needed</p>';
}else
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
echo  $shopname_error = '<p class="text-danger">Shop name already used, please use a different name</p>';
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
$queryshop = "INSERT INTO `myshop`.`shop` (`shop_id`, `user_id`, `shopName`, `shop_descrb`, `telephone`, `state`, `country`, `city`, `countryCode` , `address`, `email`, `category`, `bus_type`,`core_products`, `mode`, `datetime`) VALUES (NULL, '$user_id', '$shopName', '$shop_descrb','$telephone', '$state', '$country', '$city', '$code', '$address', '$email', '$category','$bus_type','$core_products','1','$datetime')";

	if($queryshop1 = mysqli_query($link,$queryshop))
	{
	 $queryqs = "SELECT * FROM `shop` WHERE `shopName` = '$shopName' LIMIT 0 , 1 ";

		if($query4user_info = mysqli_query($link,$queryqs))
			{
				 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
				 {
				$shop_id = $allpalls_info['shop_id'];
				$user_id    = $allpalls_info['user_id'];
				$shopName = $allpalls_info['shopName'];
				$image_loc = "img/banners/banner.png";

					$queryim = "INSERT INTO `myshop`.`banner_pic` (`banner_id`,`shop_id`,`image_loc`) VALUES (NULL, '$shop_id', '$image_loc')";
					
					if($sqi = mysqli_query($link,$queryim))
					{
					 echo ' <a href="shopaccount.php?shopName='.$shopName.'"><p class="text-success"><strong>Successful, click to enter your Shop</strong></p></a>';	                 
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
      echo '<p class="text-danger"><strong>Sorry, you can create only two shop accounts</p>
           <p class="text-warning"><strong>Send a mail to support@mykanta.com to request for additional shops</p>';
     }
}

}
}
?>