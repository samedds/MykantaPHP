<?php
// this process page is to check whether the searched shop is an active one or a visited one
include"include/conxn.php";
include"include/funcxn.php";

if(isset($_GET['shopName']))
{
include "include/sessionfile.php";

$account_id = safe_input($_SESSION['id']);
$shopName_url = safe_input($_GET['shopName']);
$shopName_stripped = strip_text($shopName_url);
$clean_name = formatUrl_rev($shopName_stripped); 
  if(!isset($account_id) OR empty($account_id))
{	

header('location:/business/'.$clean_name);
}

else{
$query = "SELECT *
         FROM `shop`
         WHERE `shopName` = '$clean_name' 
         LIMIT 0 , 5
         ";
		 
if($query4user_info = mysqli_query($link,$query))
	{
		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
$shop_id = safe_input($allpalls_info['shop_id']);
$user_id    = safe_input($allpalls_info['user_id']);
$shopName = safe_input($allpalls_info['shopName']);	 
$clean_name = formatUrl_rev($shopName); 
$shop_id = shop_id_from_name($clean_name);
	 		 
 if($account_id ==  $user_id)
 {
     header('location:/user/my-business/'.$shopName_url.''); 
 }
else
 {
     header('location:/business-link2/'.$shopName_url.''); 
 }
 }	  
 }
 }
 }
?>