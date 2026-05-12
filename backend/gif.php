<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include "../include/conxn.php";  
// products array
$gif=array();
$gif["data"]=array();
$id = $_GET['return'];
$sql = "SELECT * FROM account_comment WHERE id ='$id' LIMIT 1";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		$id2 =  $row["account_id"];
		$image_loc =   $row["image_loc"];
		$title =   $row["title"];
		$comment =   $row["comment"];
	$sql2 = "SELECT * FROM registration WHERE id ='$id2'  LIMIT 1";
	$query2 = mysqli_query($link,$sql2);
	while($row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC))
		 {
		 	 $id = $row2['id']; 
		 	 $username = $row2['username']; 
		 
		 }
		 
	
		
		
		
		
		
		$gif_item=array(
            "id" => $id,
            "username" => $username,
            "title" => $title,
			 "picture"=> get_profile_pic($id),
            "url" => $image_loc,
            "comment" => $comment
             );
	 array_push($gif["data"], $gif_item);
  }		  
   echo json_encode($gif);
   
 function get_profile_pic($id)
{ include "../include/conxn.php"; 
	$query = "SELECT image_loc,gif_as_pic FROM profile_pic WHERE account_id = '$id' ";
	$query4profi  = mysqli_query($link,$query);	
	if($query4profilepic = mysqli_num_rows($query4profi) > 0)
		{
		while($profile_pic  = mysqli_fetch_assoc($query4profi))
		{   $profile_image = $profile_pic['image_loc'];
			$gif_as_pic = $profile_pic['gif_as_pic'];
			
		if($gif_as_pic =="" OR  $gif_as_pic == "NULL" )
		{   return $profile_image; }
		else{  return $gif_as_pic; }			 
		}
	 }
	else{ $profile_image = "image1.jpg";
	return $profile_image;}
}
?>