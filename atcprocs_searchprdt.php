
<?php
include"include/conxn.php";
include"include/sessionfile.php";
include "include/funcxn.php";

if(isset($_GET['prdct_id']) && isset($_GET['price']) && isset($_GET['name']))
{ 

$prdct_id = safe_input($_GET['prdct_id'] );
$price = safe_input($_GET['price'] );
$name = safe_input($_GET['name'] );
$account_id = safe_input($_SESSION['id']);




$query = "INSERT INTO `myshop`.`cart` (
`cart_id` ,
`product_id` ,
`account_id` ,
`name` ,
`price`)
		  VALUES (
NULL , '$prdct_id', '$account_id', '$name', '$price'
)";
        
		if(mysqli_query($link,$query))
		{
		
		header('location:accountproductsearchpage.php');
		}
		else
		{
		echo "errors";
		
        }
}

else
{
header('location:accountproductsearchpage.php');
}

?>