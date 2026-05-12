<?php
include "include/conxn.php";
include "include/check_connection.php";

if(isset($_GET['username']))
{
include "include/conxn.php";
include "include/funcxn.php";
include "include/sessionfile.php";
$username1 = safe_input($_GET['username']);
$username =  preg_replace('/[^A-Za-z0-9\_\@\.\-\ ]/ ', '', $username1);
$friend_id = friend_id_from_name($username);
$account_id = safe_input($_SESSION['id']);

 if($friend_id==$account_id)
{
header('location:/user');
}
else if(!isset($account_id) OR empty($account_id))
{

header('location:/account/'.$username);
}
else{
//-------------------------- checking if friend_id is a friend which account_id sent a request to friend_id
$query = "SELECT friend_id FROM `friends`  WHERE account_id = $account_id and friend_id = $friend_id and value = 1  LIMIT 1";
	$query_r = mysqli_query($link,$query);
	$query_n = mysqli_num_rows($query_r);
	if($query_n>=1)
	{
	$query = "SELECT *
         FROM `registration`
         WHERE id = $friend_id
         LIMIT 1
         ";
		if($queryuser = mysqli_query($link,$query))
		{
			 while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
			 {
			   $friendsecName   =safe_input($flik_info['secName']);
			   $friendfirstName =safe_input($flik_info['firstName']);
			   $username =safe_input($flik_info['username']);
			   $email    =safe_input($flik_info['email']);
			   $telephone =safe_input($flik_info['telephone']);
			   $country       =safe_input($flik_info['country']);
			   $city     =safe_input($flik_info['city']);
			   $friend_id      =safe_input($flik_info['id']);

			  header('location:/connection/'.$username.'');
			}
		}
   }
// -----------------------------------checking if account_id is a friend which friend_id sent a request to session_id
// the other friend who sends you the request becomes the account id and u the user becomes the friend_id
  else
  {
  $query = "SELECT account_id
         FROM `friends`
         WHERE friend_id = $account_id and account_id = $friend_id and value = 1
         LIMIT 1 ";
	$query_r = mysqli_query($link,$query);
	$query_n = mysqli_num_rows($query_r);
	if($query_n>=1)
	{
	 $query = "SELECT *
         FROM `registration`
         WHERE id = $friend_id
         LIMIT 1
         ";
	if($queryuser = mysqli_query($link,$query))
	{
		 while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
		 {
		 $friendsecName   =safe_input($flik_info['secName']);
	 $friendfirstName =safe_input($flik_info['firstName']);
	 $username =safe_input($flik_info['username']);
	 $email    =safe_input($flik_info['email']);
	 $telephone =safe_input($flik_info['telephone']);
	 $country       =safe_input($flik_info['country']);
	 $city     =safe_input($flik_info['city']);
         $friend_id      =safe_input($flik_info['id']);

	}

		header('location:/connection/'.$username.'');
    }
  }
   else
  {
	  // checking if user is the same as active account
	   $username = $_GET['username'];
       $friend_id = friend_id_from_name($username);
	   $_account_id = safe_input($_SESSION['id']);

	 if($friend_id == $_account_id)
	 {
	 while($friend_id == $_account_id)
	 {
	 header('location:/User');
	}
	 }

   else
   {
 //-------------you sent the request but friend has not accepted

   $account_id = safe_input($_SESSION['id']);

   $query = "SELECT account_id
         FROM `friends`
         WHERE friend_id = $account_id and account_id = $friend_id and value = 0
         LIMIT 1
         ";
	$query_r = mysqli_query($link,$query);
	$query_n = mysqli_num_rows($query_r);
	if($query_n>=1)
	{
  $query = "SELECT *
         FROM `registration`
         WHERE id = $friend_id
         LIMIT 1
         ";
	if($query_run = mysqli_query($link,$query))
	{
	 while($flik_info = mysqli_fetch_array($query_run,MYSQLI_ASSOC))
	{
 $friendsecName   =safe_input($flik_info['secName']);
	 $friendfirstName =safe_input($flik_info['firstName']);
	 $username =safe_input($flik_info['username']);
	 $email    =safe_input($flik_info['email']);
	 $telephone =safe_input($flik_info['telephone']);
	 $country       =safe_input($flik_info['country']);
	 $city     =safe_input($flik_info['city']);
         $friend_id      =safe_input($flik_info['id']);



	header('location:/connection/'.$username.'');



	}


    }
    }


   else
{
	header('location:/connection-req/'.$username.'');
}
   }

}
}
}
}
?>
