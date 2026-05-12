<?php
include "include/conxn.php";
//include "include/conxn.php";
function Destroy_product()
{
  header("location:/User");
}

if(/*empty($_GET['shop_id']) &&*/ !empty($_GET['prdt_nameformat']))
{
  $id = $_SESSION['id'];
  //$shop_id = $_GET['shop_id'];
  $product_id1 = safe_input($_GET['product_id']);
$product_id = strip_text($product_id1);
 $prdt_nameformat1 = $_GET['prdt_nameformat'];
$prdt_name = formatUrl($prdt_nameformat1);
  $clean_product = formatUrl_rev($prdt_nameformat1); 
  $shopName1 = safe_input($_GET['shopName']);
$shopName = strip_text($shopName1);
$clean_name = formatUrl_rev($shopName); 
 // $shop_id = shop_id_from_name($clean_name);

  $query = "SELECT * FROM product WHERE product_id = '$product_id' AND account_id = '$id' AND name = '$clean_product'";
  $query_q = mysqli_query($link, $query);
    if(mysqli_num_rows($query_q) != 1) 
  {
     Destroy_product();
  }
 }
else
{
 Destroy();
 }

?>