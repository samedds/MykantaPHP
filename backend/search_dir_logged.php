<?php


if(isset($_POST['yourshop']))
{
$product_name = $_POST['yourshop'];
/*$search_people = $_POST['search_people'];
$search_product=$_POST['search_product'];
$search_shops = $_POST['search_shops'];
$search_services = $_POST['search_services'];

if(isset($search_people))
{
 header("location:../accountpeoplesearchpage.php?search_text=$product_name");
 
}

if(isset($search_product))
{
 header("location:../accountproductsearchpage.php?search_text=$product_name");
 
}
*/
if(isset($product_name))
{
 header("location:../accountshopsearchpage.php?search_text=$product_name");
 
}
/*
if(isset($search_services))
{
 header('location:../accountservicesearchpage.php?search_text=');
 
}


*/
}
else
{
 echo ' Product not found!';
}
?>