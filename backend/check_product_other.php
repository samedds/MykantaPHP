<?php
function Destroy_product()
{
  header("location:/User");
}
include "include/conxn.php";
$product_id =safe_input_here2($_GET['product_id']);

if(!empty($_GET['prdt_name']) && !empty($product_id))
{
  $prdt_name1 = safe_input_here2($_GET['prdt_name']);
  $prdt_name = strip_text1($prdt_name1);
$clean_name = formatUrl_rev_here($prdt_name1);  
  $query = "SELECT name FROM product WHERE product_id = '$product_id' AND name = '$clean_name' ";
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
function formatUrl_rev_here($res, $sep=' ')
{
// $res = strtolower($value);
// $res = preg_replace('/[^[:alnum:]]/', '-', $res);
$res = preg_replace('/-/', $sep, $res);
return trim($res, $sep);
}

function safe_input_here2($value)
{include "include/conxn.php";
$magic_quotes_active = get_magic_quotes_gpc();//boolean - true if the quotes thing is turned on
$new_enough_php = function_exists("mysqli_real_escape_string");//boolean - true if the function exists (php 4.3 or higher)
if($new_enough_php)
{
if($magic_quotes_active)
{
$value = stripslashes($value);//if its a new version of php but has the quotes thing running, then strip the slashes it puts in
}
$value_new = mysqli_real_escape_string($link,$value);//if its a new version use the function to deal with characters
$value = htmlspecialchars($value_new);//if its a new version use the function to deal with characters
}
else
if(!$magic_quotes_active)//If its an old version, and the magic quotes are off use the addslashes function
{
$value = addslashes($value);
}
return $value;
}
function strip_text1($token)
    {
          $value =  preg_replace('/[^A-Za-z0-9\ ]/ ', ' ', $token);
            return $value;
    }
	
function strip_num1($token)
    {
          $value =  preg_replace('/[^0-9\ ]/ ', '', $token);
            return $value;
    }
	
?>