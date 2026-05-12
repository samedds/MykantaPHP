<?php
include "include/conxn.php";
function Destroy_user()
{
  header("location:/User");
}

if(!empty($_GET['username']))
{ $account_id = $_SESSION['id'];
 $username1 = safe_input1($_GET['username']);
$username = strip_text1($username1);
$query = "SELECT id FROM registration WHERE username = '$username'
";
$query_data = mysqli_query($link,$query);
 if(mysqli_num_rows($query_data) != 1) 
  {
     Destroy_user();
  }
} 
else
{
 Destroy();
}
function safe_input1($value)
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
          $value =  preg_replace('/[^A-Za-z0-9\_\.\-\ ]/ ', '', $token);
            return $value;
    }
?>