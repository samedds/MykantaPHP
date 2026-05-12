<?php 
include "../include/conxn.php";
?>
<?php
// register product processor file for logged in user
if(isset($_POST['task']))
{
include "../include/conxn.php";
include "../include/funcxn.php";
include "../include/sessionfile.php";

$product_id = safe_input($_POST['product_id']);
 $user_id = safe_input($_SESSION['id']);
 $account_id = safe_input($_SESSION['id']);
 
$query = "SELECT * FROM `product` WHERE `product_id` = '$product_id' LIMIT 0 , 5 ";

$query4user_info = mysqli_query($link,$query);
	 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
$productName = safe_input($allpalls_info['name']);
$product_descrb = safe_input($allpalls_info['descrb']);
$product_id2 = safe_input($allpalls_info['product_id']);
$price = safe_input($allpalls_info['price']);
$stock = "1";

$query = "INSERT INTO `wishlist`(`id` ,`product_id` ,`user_id` )
		  VALUES (
NULL , '$product_id2', '$account_id')";
        
		if(mysqli_query($link,$query))
		{	
		$query = " SELECT * FROM cart where account_id = $user_id LIMIT 1 ";
//query_confirm($query);
if($query_add = mysqli_query($link,$query))
	{	
while($products = mysqli_fetch_array($query_add,MYSQLI_ASSOC))		
		 {
	      $cart_id = safe_input($products['cart_id']);
		
		}}
		else
		{
		 echo '<p class="text-danger"> Error </p>';
		
        }


}

}


}
?>