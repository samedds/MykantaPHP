<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, DELETE");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include "./funcxn.php";  
include "../include/conxn.php"; 

$business=array();
$business["data"]=array();
$search_term=array();
$search_term["data"]=array();
if(isset($_GET['search']))
{
$search = $_GET['search'];
	$search_name = $_GET['search'];
	 $param = "%{$search_name}%";
	$sql = "SELECT * FROM registration WHERE username LIKE '$param'  LIMIT 10";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		 $id =  $row["id"];
		 $username =   $row["username"];
		 $fullname =   $row["firstName"];
						 
						 $person_item=array(
						 "name" => $username,
						 "id" => $id,
						 "picture"=> get_profile_pic($id),
						 "fullname" => $fullname
						  );
						  array_push($search_term["data"], $person_item);
					 }
                	 echo json_encode($search_term);
}
if(isset($_GET['insertdp']))
{
	$insertdp = $_GET['insertdp'];
	$token = $_GET['token'];
	$sql = "SELECT * FROM registration WHERE token ='$token' LIMIT 1";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	 $id_of_token =  $row["id"];
	if($token == null || $token == "")
	{
			echo json_encode(array( "token" => false));
	}
else
{
	echo json_encode(array( "token" => true));
	$qyery1 = mysqli_query($link, "SELECT *  FROM `profile_pic` WHERE `account_id` = $id_of_token LIMIT 1 ");
			if  (mysqli_num_rows($qyery1)>0)
				{
while($row = mysqli_fetch_array($qyery1,MYSQLI_ASSOC))
		 {				  $image_loc    =$row["image_loc"];	
						$newfile = "../api/upload/$insertdp"; 
						$oldfile = "../img/avatars/$image_loc"; 
						$location = "$insertdp"; 
						$destiny  = "../img/avatars/$insertdp"; 
						$trash  = "../img/trash/$insertdp"; 
						rename($newfile,$destiny);
						rename($oldfile,$trash);
						 mysqli_query($link,"UPDATE profile_pic 
						   SET 
						image_loc = '$location'
						WHERE account_id ='$id_of_token'");
						}
						}
					else
						{
						// echo "insert";
						  mysqli_query($link,"INSERT INTO `myshop`.`profile_pic` (
						`profile_pic_id` ,
						`account_id` ,
						`image_loc`
						)
						VALUES (
						NULL , '$account_id', '$location'
						)");
                     
						$newfile = "../api/upload/$insertdp"; 
						$location = "$insertdp"; 
						$destiny  = "../img/avatars/$insertdp"; 
						rename($newfile,$destiny);
						}
}
}
}

if(isset($_GET['token_auth']))
{
	$token = $_GET['token_auth'];
if($token == null || $token == "")
	{
		 echo json_encode(array( "token" => false));
	}
else
{
	$sql = "SELECT id FROM registration WHERE token ='$token'  LIMIT 1";
	$query = mysqli_query($link,$sql);
	if( mysqli_fetch_row($query) > 0)
	{  
        echo json_encode(array( "token" => true));
	} else
	{
	   echo json_encode(array( "token" => false));
	}	
}
}

if(isset($_GET['get_token']))
{
	$token = $_GET['get_token'];
	$sql = "SELECT * FROM registration WHERE token ='$token'  LIMIT 1";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		    $id    =$row["id"];
		    $token    =$row["token"];
			$username =$row["username"];
			$email    =$row["email"];
			$fullName    =$row["firstName"];
			
			 $business_item=array(
            "token" => $token,
            "name" => $username
             );
          
		  
	 echo json_encode(array(
    "token" => $token,
    "username" => $username,
    "email" => $email,
	"fullname"=> $fullName,
	"picture"=> get_profile_pic($id),
	"followers"=>no_of_followers($id),
	"friends"=>no_of_friends($id),
	"following"=>no_of_following($id),
	"noofpost"=>no_of_reevs($id)
  ));
	 }
}
?>