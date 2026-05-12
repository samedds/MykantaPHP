<?php
include "include/conxn.php";
	if(isset($_POST['task']))
	{
	include "include/conxn.php";
	include "../include/funcxn.php";

	$email_reset = $_POST['ref_code'];
	$pass = $_POST['pass'];
	$re_pass = $_POST['re_pass'];
	 $new_password = hash("sha256",$re_pass);


	if ($re_pass != $pass)
 {
 echo "Password did not match.";
 }
  else 
  {
	$query = "SELECT email,value,auth_code_hash FROM pass_reset_flag where auth_code_hash = '$email_reset' ";
	$query_add = mysqli_query($link,$query);
     if($query1 = mysqli_num_rows($query_add) >=0 )
	{
	  while($details = mysqli_fetch_assoc($query_add))
		 {
            $email = safe_input($details['email']);
            $value = safe_input($details['value']);
            $auth_code_hash = safe_input($details['auth_code_hash']);
			
			if($email_reset == $auth_code_hash )
			{
             	$update = "UPDATE registration SET password = '$new_password' WHERE email = '$email' ";
             	$updatesql = mysqli_query($link, $update);
             	if($updatesql)
             	{
				    $Delete_sql = "DELETE FROM `pass_reset_flag` WHERE email = '$email'";
					$query_del= mysqli_query($link,$Delete_sql);
					if($query_del)
					{
					 echo '<br>Password Changed, please go to the login page to login. <br> <a href="/index_login.php"> Login Page </a>';

					}
				}  	
            }
             else
            {
             echo "<br>Wrong Password Entered";
            }

         }
	}	
	  else 	
		 { 
		  echo "You are not permitted to view this page.";
		 }
		 }
}
	else
	{
		echo "<div class='info'>Sorry, no data was passed. Please try again or contact the site admin if this problem persist. Thank you</div>";
	}
	
?>