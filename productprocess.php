<?php
// this process page is to check whether the searched shop is an active one or a visited one
include "include/sessionfile.php";
include"include/conxn.php";
include "include/funcxn.php";

$product_id = $_GET['product_id'];
$prdt_name = $_GET['prdt_name'];
$shopName = $_GET['shopName'];
 $clean_product = formatUrl_rev1($prdt_name); 
 $neat_product = Url_rev1($prdt_name); 
$id = $_SESSION['id'];
if(isset($_SESSION['id']))
{
	$query = "SELECT * FROM product WHERE product_id = '$product_id' AND account_id = '$id' AND name = '$clean_product'";
	$query_q = mysqli_query($link, $query);
    if(mysqli_num_rows($query_q) >= 1) 
  {
      header('location:/my-products/'.$shopName.'/'.$product_id.'/'.$neat_product.''); 
  }
  else{
   header('location:/products/'.$shopName.'/'.$product_id.'/'.$neat_product.''); 
  }
 
}
else
{
 header('location:/product/'.$shopName.'/'.$product_id.'/'.$neat_product.''); 
}

function formatUrl_rev1($res, $sep=' ')
{
// $res = strtolower($value);
// $res = preg_replace('/[^[:alnum:]]/', '-', $res);
$res = preg_replace('/-/', $sep, $res);
return trim($res, $sep);
}
function Url_rev1($res, $sep='-')
{
// $res = strtolower($value);
// $res = preg_replace('/[^[:alnum:]]/', '-', $res);
$res = preg_replace('/ /', $sep, $res);
return trim($res, $sep);
}

?>