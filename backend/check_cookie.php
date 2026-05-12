<?php
//include "./include/funcxn.php";
function return_page()
{
header("Location:/User");
}
include "include/conxn.php";
if (isset($_COOKIE['remb_me'])) 
{
$email = $_COOKIE['_email'] ;
$password = $_COOKIE['_password'] ;
$email_safe = preg_replace('/[^A-Za-z0-9\@\.\_]/ ', '', $email);
if(!empty($email_safe) && !empty($password))
 {

	if (!empty($email_safe) && !empty($password))
	{
	//include "include/conxn.php";
	//include "include/sessionfile.php";

//$email_safe = preg_replace('/[^A-Za-z0-9\@\.\_]/ ', '', $email);
$stmt = $link->prepare("SELECT id,email,username FROM registration WHERE email = ? OR username = ? AND password = ?  LIMIT 1");


   $stmt->bind_param('sss', $email_safe,$email_safe,$password);
   $stmt->execute() ;
   $stmt->store_result();
   $stmt->bind_result( $id,$email_new,$username);
  
   $row = array(); 

if( $stmt->fetch())
	{ 
	   $row = array( 'id'=> $id, 'email'=> $email_new, 'username'=> $username );
       $_email_text = $row['email'];  
	   $_SESSION['email'] = $row['email'];         
	   $_SESSION['id'] = $row['id'];
	   $user_id = $row['id'];
	   $_SESSION['username']=  $row['username']; 
	 
	   return_page();
	   
		}
	/*	else
		{
		header("Location:/home");
		 session_write_close();
		} */
     }
  }   
}		
?>