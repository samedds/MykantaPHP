<?php
// created by Kofi Samuel Edwards-Akhurst 18/06/17
include "./funcxn.php";  
include "../include/conxn.php"; 
// required headers 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, DELETE");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

$username = $_GET['username'];
$password_safe = $_GET['password'];
$password = hash("sha256",$password_safe);
$token = bin2hex(openssl_random_pseudo_bytes(64));
$sql = "SELECT * FROM registration WHERE username ='$username' AND  password ='$password'  LIMIT 1";
	$query = mysqli_query($link,$sql);
	   if($query4profilepic = mysqli_num_rows($query) > 0)
	     {
		    while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
			 {
				$id    =$row["id"];
				$error =  '1';
				$username =   $row["username"];
				$email =   $row["email"];
				$fullName    =$row["firstName"];
				 $db_lastlogin = $row['lastlogin'];  
				  $time_now = date('Y\-m\-d\ H:i:s');
				 $query1 = mysqli_query($link,"UPDATE registration SET token = '$token', lastlogin = '$time_now' , datetime = '$db_lastlogin' WHERE id = '$id'");
				 
			     // $_SESSION['email'] = $email;    
				// setcookie("Userem", $email, time()+13600);
				// setcookie("_Userem1", $email, time()+13600, "http://localhost/mykanta");
			 }
			  echo json_encode(array(
				"error" => $error,
				"token" => $token,
				"id" => $id,
				"username" => $username,
				"email" => $email,
				"fullname"=> $fullName,
				"picture"=> get_profile_pic($id),
				 "followers"=>no_of_followers($id),
				"friends"=>no_of_friends($id),
				"following"=>no_of_following($id),
				"noofpost"=>no_of_reevs($id)
			  ));
			  $email_new = preg_replace('/[^A-Za-z0-9\@\.\_]/ ', '', $email);
			// setcookie("Useremailmk", $email_new, time()  + (86400 * 30) ,"/");
			 
		 }
		 else{
			  echo json_encode(array(
				"error       " => "0"
			  ));
		 }

?>