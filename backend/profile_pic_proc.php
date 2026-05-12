<?php 
include "include/conxn.php";
 
 if( isset($_POST['task']) && $_POST['task'] == 'accept_im')
{include "include/conxn.php";
include "include/sessionfile.php";
include "../include/funcxn.php";
$account_id = safe_input($_SESSION['id']);
$name = safe_input($_POST['name']);

  $datetime1 =  date('Y\-m\-d\ H:i:s');
     $datetime =  strtotime($datetime1);
//$querycheck = "SELECT *  FROM `profile_pic` WHERE `account_id` = $account_id LIMIT 1 ";
 
 $qyery = mysqli_query($link, "SELECT *  FROM `profile_pic` WHERE `account_id` = $account_id LIMIT 1 ");
 
if  (mysqli_num_rows($qyery)>0)
 {  
   
	 
$location = 'img/avatars/'.$name.'';
   $query = mysqli_query($link,"UPDATE profile_pic 
   SET image_loc = '$location'WHERE account_id ='$account_id'");
}
else
{
$location = 'img/avatars/'.$name.'';
 $query = mysqli_query($link,"INSERT INTO `myshop`.`profile_pic` (
`profile_pic_id` ,
`account_id` ,
`image_loc`
)
VALUES (
NULL , '$account_id', '$location'
)");

}
}
else
{
echo "not isset";}
?>