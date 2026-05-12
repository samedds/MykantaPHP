<?php
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php";

if(isset($_POST['task']))
{
if(isset($_POST['shopName']) && isset($_POST['shop_descrb']) && isset($_POST['telephone']) && isset($_POST['city']))
	{
	include "../include/funcxn.php";
	$user_id = $_SESSION['id'];
	$shopName = safe_input($_POST['shopName']);
	$shop_descrb = safe_input($_POST['shop_descrb']);
	$address = safe_input($_POST['address']);
	$core_products = safe_input($_POST['core_products']);
	$business_url = safe_input($_POST['business_url']);
	$city = safe_input($_POST['city']);
	$telephone = safe_input($_POST['telephone']);
	$bus_type = $_POST['bus_type'];
	$bus_cat = $_POST['bus_cat'];
	
	$updateopquery = "UPDATE shop SET  address = '$address', shop_descrb = '$shop_descrb', telephone = '$telephone', city = '$city' , category = '$bus_cat' , bus_type = '$bus_type', core_products = '$core_products', business_url = '$business_url' WHERE user_id = '$user_id' AND shopName = '$shopName'";
	if($updateopqueryexec = mysqli_query($link, $updateopquery))
		{
			echo'Business Info updated';
		}
		else{
			echo'Unable to Update option. Please try again or Check internet connection';
		}
	}
}
else if(isset($_POST['task_dob']))
{
 include "../include/funcxn.php";
	$user_id = $_SESSION['id'];
	$do1 = $_POST['do1'];
	$do2 = $_POST['do2'];
	$do3 = $_POST['do3'];
	$shopName = $_POST['shopName'];
	$shop_id = shop_id_from_name($shopName);
	
	$updateopquery = "UPDATE delivery_option SET  option_1 = '$do1',option_2 = '$do2', option_3 = '$do3' WHERE  shop_id = '$shop_id'";
	if($updateopqueryexec = mysqli_query($link, $updateopquery))
		{
			echo'Delivery Option updated';
		}
		else{
			echo'Unable to Update Delivery Option. Please try again or Check internet connection';
		}
}
	?>