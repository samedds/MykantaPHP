<?php
session_start();

if(@$_SESSION['id'] !="")
{
include "include/conxn.php";
 
$datetime =  date('Y\-m\-d\ H:i:s');
$user_id =  $_SESSION['id'];
  $query = mysqli_query($link,"UPDATE registration SET token = ''
  WHERE id = '$user_id'");
$querysatus =" UPDATE `status` SET `status_value`=0,`status_seen_by_others`=0,`last_datetime`='$datetime' WHERE user_id = '$user_id' ";
if($q_status = mysqli_query($link,$querysatus))
     {
	   $expire = time() - 300;
setcookie("_email", '', $expire);
setcookie("_password", '', $expire);
setcookie("remb_me", '', $expire);
	   session_unset();
       session_destroy();
      // header('Location:/home');
	   
       exit();
	 }

}
else{
//header('Location:/home');
exit();
}


?>