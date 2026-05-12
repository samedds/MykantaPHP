<?php
ob_start();
session_start();

//Add a product to cart either a registered user or a visitor.
if(isset($_POST['task']))
{
include "include/conxn.php";
include "../include/funcxn_vis.php";

if(isset($_SESSION['vis_id']))
	{
	$product_id = safe_input($_POST['product_id']);
	$option_id = safe_input($_POST['option_id']);
	$price_o = safe_input($_POST['price']);
	$user_id = safe_input($_SESSION['vis_id']);
	$account_id = safe_input($_SESSION['vis_id']);
	$item_stock = $_POST['item_stock'];
	$price_total = $price_o * $item_stock;
	
	$query = "SELECT spec_option,price FROM product_option WHERE `product_id` = '$product_id' LIMIT 1 ";
	if($query4user_info = mysqli_query($link,$query))
		{
		while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
			 {
				$price = safe_input($allpalls_info['price']);
				$productName = safe_input($allpalls_info['spec_option']);
				
				
				
				$query = "SELECT shop_id,product_id FROM `product` WHERE `product_id` = '$product_id' LIMIT 1 ";
	if($query4user_info = mysqli_query($link,$query))
		{
		while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
			 {
				
				$shop_id = safe_input($allpalls_info['shop_id']);
				$product_id2 = safe_input($allpalls_info['product_id']);
				//$price = safe_input($allpalls_info['price']);
				$stock = "1";
				$order_code = "0";
				
				//insert to cart
				$query = "INSERT INTO `cart_vis`(`cart_id` ,`product_id` ,`account_id` ,`option_id` ,`shop_id` ,`name`,`order_code`,`stock`,`option_total` )
				VALUES (NULL , '$product_id2', '$account_id' , '$option_id' , '$shop_id', '$productName', '$order_code', '$item_stock', '$price_total')";
			
				if(mysqli_query($link,$query))
				{	
				echo '<div class="col col-md-6 col-sm-6 col-xs-6 no-padding" ><a href="/check_out_vis.php" class="pull-right text-primary"> Check Out</a></div>';
				}
				else echo "no insert";
			}
		}
		}
		}	
	}
	else if(!isset($_SESSION['id']) && isset($_SESSION['vis_id']) )
	{
	
	$product_id = safe_input($_POST['product_id']);
	$option_id = safe_input($_POST['option_id']);
	$user_id = $_SESSION['vis_id'];
	$account_id = $_SESSION['vis_id'];
 
	$query = "SELECT name,shop_id,product_id,price FROM `product` WHERE `product_id` = '$product_id' LIMIT 1 ";
	if($query4user_info = mysqli_query($link,$query))
		{
		while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
			 {
				$productName = safe_input($allpalls_info['name']);
				$shop_id = safe_input($allpalls_info['shop_id']);
				$product_id2 = safe_input($allpalls_info['product_id']);
				$price = safe_input($allpalls_info['price']);
				$stock = "1";
				$order_code = "0";
				$query = "INSERT INTO `cart_vis`(`cart_id` ,`product_id` ,`account_id` ,`option_id` ,`shop_id` ,`name`,`order_code`,`stock`,`option_total` )
				VALUES (NULL , '$product_id2', '534' , '$option_id' , '$shop_id', '$productName', '$order_code', '$stock', '$price')";
			
				if(mysqli_query($link,$query))
				{	
				echo '<a href="/check_out_vis.php" class="pull-right text-primary"> Check Out</a>';
				}
			}
		}
	}
}
?>