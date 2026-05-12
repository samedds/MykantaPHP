<?php
include "../include/conxn.php";
if(isset($_GET['id']))
{
	include "../include/conxn.php";
	include "../include/funcxn.php";
	$id = $_GET['id'];

	 $sqlimageloc = "SELECT product_id FROM `product_review` WHERE id = $id LIMIT 1";
	$queryimageloc = mysqli_query($link, $sqlimageloc);
	while ($thisImage = mysqli_fetch_assoc($queryimageloc))
	{
			$product_id = $thisImage['product_id'];
			
			$select = "SELECT * from `product` WHERE product_id = $product_id LIMIT 1 ";
	$select_sql = mysqli_query($link, $select);
	if($select_sql)
	{
		while($shops = mysqli_fetch_assoc($select_sql))
		{
		    $shop_id = $shops['shop_id'];
		    $name = formatUrl($shops['name']);
		    
			$select = "SELECT shopName from `shop` WHERE shop_id = $shop_id LIMIT 1 ";
	$select_sql = mysqli_query($link, $select);
	if($select_sql)
	{
		while($shop = mysqli_fetch_assoc($select_sql))
		{
			$shopName = $shop['shopName'];
		   
		    $query = "DELETE FROM `product_review` WHERE id = $id LIMIT 1";
		$doquery = mysqli_query($link, $query);
		
		if($doquery)
		{
			header("location:../my_products/$shopName/$product_id/$name");
		}
		else {
			echo 'there was an error.'.mysqli_error. '';
		}
		
		}
		}
	}
	}		
	}
	
}
?>