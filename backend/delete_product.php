<?php
// register shop processor file for logged in user
if(isset($_GET['product_id']))
{
include "../include/conxn.php";

$shopName = $_GET['shopName'];
$product_id = $_GET['product_id'];
$prdt_name = $_GET['prdt_name'];

$sql = "SELECT mode FROM product WHERE product_id ='$product_id'";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
$mode = $row["mode"];
}

if($mode >= 1)
{
$query = "UPDATE product SET  mode ='0' WHERE product_id ='$product_id'";
	if(mysqli_query($link, $query))
	{
	header('location:/my_products/'.$shopName.'/'.$product_id .'/'.$prdt_name.'');
    }
}
else if($mode == 0)
{
$query = "UPDATE product SET  mode ='1' WHERE product_id ='$product_id'";
	if(mysqli_query($link, $query))
	{
	header('location:/my_products/'.$shopName.'/'.$product_id .'/'.$prdt_name.'');
    }
}
}
?>