<?php 
include "include/conxn.php";
?>
<?php
// register product processor file for logged in user
if(isset($_POST['task']))
{
include "include/conxn.php";
include "../include/funcxn.php";
include "include/sessionfile.php";


$productName_setings = safe_input($_POST['productName_setings']);
$price_setings = safe_input($_POST['price_setings']);
//$product_descrb_setings = str_replace( "\r\n" , "<br>" , $_POST['product_descrb_setings'] );
//$product_descrb_setings = addslashes( str_replace( "\n" , "<br>" , $product_descrb_setings ));
$product_descrb_setings = safe_input($_POST['product_descrb_setings']);
$product_id = safe_input($_POST['product_id']);
 $user_id = safe_input($_SESSION['id']);
 $account_id = safe_input($_SESSION['id']);
 
$query = "SELECT * FROM `product` WHERE `product_id` = '$product_id' LIMIT 0 , 5 ";

$query4user_info = mysqli_query($link,$query);

	 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
$user_id = safe_input($allpalls_info['account_id']);
$productName = safe_input($allpalls_info['name']);
$product_descrb = safe_input($allpalls_info['descrb']);
$price = safe_input($allpalls_info['price']);

//checking if empty 		
		 if(empty($productName_setings) && empty($product_descrb_setings) && empty($price_setings))
		 {
		   echo '<span class="text-danger">no entry</span>';
		 }
else 
{
//checking 1stname if empty 	
		 if(empty($productName_setings))
		 {
		  $productName_setings = $productName ;
		 }
		 
		 //checking 1stname if empty 	
		 if(empty($product_descrb_setings))
		 {
		  $product_descrb_setings = $product_descrb ;
		 }//checking 1stname if empty 	
		 
		 //checking 1stname if empty 	
		 if(empty($price_setings))
		 {
		  $price_setings = $price ;
		 }

$query_product ="UPDATE `myshop`.`product` SET `name` = '$productName_setings',`descrb` = '$product_descrb_setings',`price` = '$price_setings' WHERE `product`.`product_id` =$product_id";
 

if(mysqli_query($link,$query_product))
 {
	 	echo '<span class="text-success">successful</span>'; 
 }
else {
echo 'there was an error, reload the page please';
}

}


}
}
?>