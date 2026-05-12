<?php
include "include/conxn.php";

function Destroy_shop()
{
  header("location:/User");
}

if(/*empty($_GET['shop_id']) &&*/ !empty($_GET['shopName']))
{
  $id = $_SESSION['id'];
  //$shop_id = $_GET['shop_id'];
$shopName2 = safe_input_here($_GET['shopName']);
$shopName =  preg_replace('/[^A-Za-z0-9\ ]/ ', ' ',$shopName2);
$clean_name = formatUrl_rev_here($shopName); 

  $query = "SELECT shopName FROM shop WHERE user_id = '$id'  AND shopName = '$clean_name'";
  $query_q = mysqli_query($link, $query);
    if(mysqli_num_rows($query_q) != 1) 
  {
     Destroy_shop();
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

function safe_input_here($value)
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
?>