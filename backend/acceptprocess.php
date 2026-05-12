<?php
include "include/conxn.php";

 if(isset($_POST['task1']))
 {
	include "conxn.php";
	include "include/sessionfile.php";
	//include "include/funcxn.php";

	$user_id = $_SESSION['id'];
	$activate_friend = $_POST['activate_friend'];
	
	$sel_friend = "SELECT id,friend_id,value,chat_file FROM `friends` WHERE `id` = '$activate_friend' ";
	$query_sel_friend = mysqli_query($link,$sel_friend);
	while($while_sel_friend = mysqli_fetch_assoc($query_sel_friend))
	{
		$myfriendid = $while_sel_friend['friend_id'];
		$chat_file = $while_sel_friend['chat_file'];
		$value = $while_sel_friend['value'];
		$id = $while_sel_friend['id'];
		$chatfilename = $user_id.'.'.$myfriendid;
	}

	//$sql = "UPDATE friends SET value =1 WHERE id = '$activate_friend' LIMIT 1";
	$accept = "UPDATE friends SET value = '1', chat_file = '$chatfilename' WHERE id = '$activate_friend'";
		  
	if(mysqli_query($link,$accept));
	{
		$query1 = "SELECT account_id FROM `friends` WHERE `id` = '$activate_friend' ";		 
		$query4user1 = mysqli_query($link,$query1);
		while($friend_id_sql = mysqli_fetch_array($query4user1,MYSQLI_ASSOC))
		{
			copy('../include/chat/log.html','../include/chat/logs/'.$chatfilename.'.html');
			echo '<input type="submit"  value="Connected" class="btn-success" disabled/>';
		}
	}	
}
else
{
	echo "Connection Error. Please Check internet connectivity";
}	
	?>
	