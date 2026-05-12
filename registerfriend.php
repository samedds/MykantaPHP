<?php
include "include/conxn.php";

//checking if the posts are set
if(isset($_POST["username"]))
{
include "include/conxn.php";
include "include/funcxn.php";
//include "include/sessionfile.php";


// declaring the variables to be used
$firstName = safe_input($_POST['firstname']);
$secName = safe_input($_POST['secname']);
$email = safe_input($_POST['email']);
$user = safe_input($_POST['username']);
$password_safe = safe_input($_POST['password']);
$password = hash("sha256",$password_safe);
$country = safe_input($_POST['country']);
$telephone = safe_input($_POST['telephone']);
$city = safe_input($_POST['state']);

 //inserting into database
$query = "INSERT INTO `myshop`.`registration` (
`firstName` ,
`secName` ,
`email` ,
`telephone` ,
`username` ,
`password` ,
`country` ,
`city` ,
`id`
)
VALUES (
'$firstName', '$secName', '$email','$telephone', '$user', '$password','$country', '$city', NULL
)";

		

    if($query1 = mysqli_query($link,$query))
	{  include "include/conxn.php";
	    
	//if everything is correct move to account page 
	  $query4_auth = "
		               SELECT *
					   FROM registration
					   WHERE username = '$user' 
					   LIMIT 1
		               ";
		$authenticate = mysqli_query($link,$query4_auth);	
        
		 while($user_auth_info = mysqli_fetch_array($authenticate,MYSQLI_ASSOC))
		 {include "include/sessionfile.php";
		
		   $_SESSION['id'] = $user_auth_info['id']; 
		     $user_id =  $_SESSION['id'];
		     $account_id =  $_SESSION['id'];
		    $_SESSION['firstName'] = $user_auth_info['firstName']; 
	          $_SESSION['secName'] = $user_auth_info['secName']; 
	          $_SESSION['country'] = $user_auth_info['country']; 
			   $_SESSION['telephone'] = $user_auth_info['telephone']; 
			  $_SESSION['email'] =   $user_auth_info['email']; 
			  $_SESSION['username'] =   $user_auth_info['username']; 
			  $_SESSION['city'] =   $user_auth_info['city']; 
			  
			  
		$image_loc = "img/avatars/image1.jpg";	
		
			  $query12 = mysqli_query($link,"INSERT INTO `myshop`.`profile_pic` (
`profile_pic_id` ,
`account_id` ,
`image_loc` 
)
VALUES (
NULL, '$account_id', '$image_loc'
)");

    if ( $query12 )
	{ 
			  header('location:profile.php');
			}  

}
  }
  else
  
  {
  echo "not ";
  }
 }
else
{
	echo '<div class="info">Sorry, some thing went wrong and your submission was unsuccessful. Please try again or contact the site admin to report this error should the problem persist. Thanks...</div>';
}
?>