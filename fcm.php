<?php 
include "include/conxn.php";

 echo  'ID -------- Token -----------------------------Date ----------------------IP <br>';
  $query4_auth = "SELECT * FROM fcm WHERE 1 ";
  $authenticate = mysqli_query($link,$query4_auth);
  if($authenticate2 = mysqli_num_rows($authenticate)>0)	
   {
   while($user_auth_info = mysqli_fetch_array($authenticate,MYSQLI_ASSOC))
	 {
	 echo  $user_auth_info['id'].' ---------- '.$user_auth_info['token'].' ------- '.$user_auth_info['date'].' --------------'.$user_auth_info['ip'].'<br>';
	 } 
   }
?>