<?php
	include "include/conxn.php";

	if(isset($_POST['task']))

	{
	include "../include/funcxn.php";
	include "include/conxn.php";
	include "include/sessionfile.php";

	$user_id = safe_input($_SESSION['id']);
	$old_pass = safe_input($_POST['old_pass']);
	$old_password = hash("sha256",$old_pass);
	
	$new_pass = safe_input($_POST['new_pass']);
    $new_password = hash("sha256",$new_pass);
	
	$query = "SELECT password FROM registration where id = $user_id ";
	$query_add = mysqli_query($link,$query);
	if($query_add)
	{
		while($details = mysqli_fetch_assoc($query_add))
		 {
             $db_old_pass = safe_input($details['password']);
             if($old_password == $db_old_pass)
             {
             	$update = "UPDATE registration SET password = '$new_password' WHERE id = '$user_id' ";
             	$updatesql = mysqli_query($link, $update);
             	if($updatesql)
             	{
             		echo "<br>Password Changed";
             	}  	
             }
             else
             {
             	echo "<br>Old Password did not match!";
             }
		
	      }

							
		}
	}
	else
	{
		echo "<div class='info'>Sorry, no data was passed. Please try again or contact the site admin if this problem persist. Thanks...</div>";
	}
	
?>