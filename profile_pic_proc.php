<?php
	include "include/sessionfile.php";
?>
<?php 
include "include/conxn.php";
include "include/funcxn.php"; 

if ($_POST['task'])

{include "include/conxn.php";
$account_id = safe_input($_SESSION['id']);


 //get files att

$name =addslashes( str_replace( "\n" , "<br>" , $_FILES['myfile']['name']));
$tmp_name = $_FILES['myfile']['tmp_name'];


 //$querycheck = "SELECT *  FROM `profile_pic` WHERE `account_id` = $account_id LIMIT 1 ";
 
 $qyery = mysqli_query($link, "SELECT *  FROM `profile_pic` WHERE `account_id` = $account_id LIMIT 1 ");
 
if  (mysqli_num_rows($qyery)>0)
 {  echo "update";
     $location = "/img/avatars/$name";
	 
move_uploaded_file($tmp_name,$location);


   $query = mysqli_query($link,"UPDATE profile_pic 
   SET 
image_loc = '$location'

WHERE account_id ='$account_id'");
 
 header('location:/User');
}
else
{
 echo "insert";
$location = "/img/avatars/$name";
move_uploaded_file($tmp_name,$location);

 $query = mysqli_query($link,"INSERT INTO `myshop`.`profile_pic` (
`profile_pic_id` ,
`account_id` ,
`image_loc`
)
VALUES (
NULL , '$account_id', '$location'
)");

 header('location:/User');
}



}
?>