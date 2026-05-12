<?php
include "conxn.php";
$user_id = $_SESSION['id'];

$query = "SELECT status_id,datetime FROM status WHERE user_id = '$user_id'";
$q_status= mysqli_query($link,$query);	    
 while($user_auth_info = mysqli_fetch_assoc($q_status))
  {
  $lastOut = $user_auth_info['datetime'];
  $status_id = $user_auth_info['status_id'];
  $last_datetime = strtotime($lastOut);

	$datetime =  date('Y\-m\-d\ H:i:s');		 
	$querysatus =" UPDATE status SET status_value=1,status_seen_by_others=1,datetime='$datetime' ,last_datetime='$lastOut' WHERE user_id = '$user_id' AND status_id = '$status_id' LIMIT 1";

if($user_auth_info = mysqli_query($link,$querysatus))
	{ 
		setcookie("lastOut", $lastOut, time()  + (3600 * 1) ,"/");
	}
	else
	{
	   'status not updated';
	}
  }

	
	?>
