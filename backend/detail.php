<?php
include "./funcxn.php";  
include "../include/conxn.php"; 
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, DELETE");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
// products array
$business=array();
$business["data"]=array();

if(isset($_GET["token"]) && isset($_GET["user_id"])){
$token = $_GET['token'];
$id = $_GET['user_id'];
$sql = "SELECT * FROM registration WHERE token ='$token' LIMIT 1";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		  $id_of_token =  $row["id"];
		  $business_item=array(
             "check_friend"=> check_friend($id,$id_of_token),
             "user_id"=> $id_of_token ,
             "friend_id"=> $id 
             );
		    // console.log(check_friend($id,$id_of_token));
			//  array_push($business["data"], $business_item);
            echo json_encode($business_item); 
         } 
 }  

if(isset($_GET["return"])){
$id = $_GET['return'];
$sql = "SELECT * FROM registration WHERE id ='$id' LIMIT 1";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		     $id =  $row["id"];
		     $username =   $row["username"];
			 $business_item=array(
            "id" => $id,
            "name" => $username,
			"picture"=> get_profile_pic($id),
	        "followers"=>no_of_followers($id),
	        "friends"=>no_of_friends($id),
	        "following"=>no_of_following($id),
	        "noofpost"=>no_of_reevs($id)//,
			//"check_friend"=> check_friend($id,$Useremail)
             );
			  array_push($business["data"], $business_item);
          }  
	 echo json_encode($business); 
}
?> 