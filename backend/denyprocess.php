<?php
include "include/conxn.php";

 if(isset($_POST['task2']))
 {
	include "include/conxn.php";
	include "include/sessionfile.php";
	include "include/funcxn.php";

	$user_id = $_SESSION['id'];
	$deny_friend = $_POST['deny_friend'];
	  
	$del = "UPDATE friends SET value = -1 WHERE id = '$deny_friend' LIMIT 1";
	//$del = "DELETE from friends WHERE id = '$deny_friend'";
		  
	if(mysqli_query($link,$del));
	{
		echo '<input type="submit" value="hidden" class="btn-default" disabled/>';
	}	

}
else
{
	echo "not work";
}	
	?>
	