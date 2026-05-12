<?php
include "include/conxn.php";
include "../include/sessionfile.php";
include "../include/funcxn.php";

$user_id = $_SESSION['id'];
$activate_friend = $_GET['activate_friend'];
$chatfilename = $user_id.'.'.$activate_friend;
  
$sql = "UPDATE friends SET value ='1', chat_file = '$chatfilename' WHERE friend_id = '$activate_friend' and account_id = '$user_id' LIMIT 1";
	  
if(mysqli_query($link,$sql));
{
	copy('../include/chat/log.html','../include/chat/logs/'.$chatfilename.'.html');
$query = "SELECT *
         FROM `registration`
         WHERE id = $activate_friend
         LIMIT 1
         ";
	if($queryuser = mysqli_query($link,$query))
	{
		 while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
		 {
	 $username =$flik_info['username'];
     $friend_id      =safe_input($flik_info['id']);
	}  
		header('location:../connection/'.$username.'');
    }
} /*
else 
{
 $sql = "UPDATE friends SET value =1 WHERE account_id = '$activate_friend' and friend_id = '$user_id' LIMIT 1";
	  
if(mysqli_query($link,$sql));
{
$query = "SELECT *
         FROM `registration`
         WHERE id = $activate_friend
         LIMIT 1
         ";
	if($queryuser = mysqli_query($link,$query))
	{
		 while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
		 {
	 $username =safe_input($flik_info['username']);
     $friend_id      =safe_input($flik_info['id']);
	}  
		header('location:../accountfriendpage.php?friend_id='.$friend_id.'&username='.$username.'');
    }
}
}*/
	?>
