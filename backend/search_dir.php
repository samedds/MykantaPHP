<?php

if(isset($_POST['yourshop']))
{
//include "conxn.php";
//include "funcxn_vis.php";

//$search_people = safe_input($_POST['search_people']);
//$search_product=safe_input($_POST['search_product']);
//$search_shops = safe_input($_POST['search_shops']);
//$search_services = safe_input($_POST['search_services']);
$search_product=$_POST['search_product'];
$search_shops = $_POST['search_shops'];
 
$product_name1 = $_POST['yourshop'];
//$search_people = $_POST['search_people'];
$product_name =preg_replace('/[^A-Za-z0-9\ ]/ ', ' ', $product_name1);
//$search_services = $_POST['search_services'];

if(isset($search_product))
{
 header('location:../vis_accountproductsearchpage.php?search_text='.$product_name);
 
}

if(isset($search_shops))
{
 header("location:../vis_accountshopsearchpage.php?search_text=$product_name");
 
}




}
else
{
 echo ' Product not found!';
}
?>