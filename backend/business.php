<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, DELETE");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
include "./funcxn.php";  
include "../include/conxn.php";  

$person=array();
$person["data"]=array();

if(isset($_GET['search_name']))
{
	$search_name = $_GET['search_name'];
	 $param = "%{$search_name}%";
	$sql = "SELECT * FROM product WHERE name LIKE '$param'  LIMIT 10";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		 $id =  $row["product_id"];
		 $username =   $row["name"];
						 
						 $person_item=array(
						 "name" => $username,
						 "id" => $id
						  );
						  array_push($person["data"], $person_item);
					 }
                	 echo json_encode($person);
}

if(isset($_GET['getdaily_hits']))
{$hits_flow_bus=array();
	$hits_flow_bus["data"]=array();
	$shop_id = $_GET['getdaily_hits'];
    
	$query = "SELECT date,hits FROM hits WHERE shop_id = '$shop_id'  ORDER BY date DESC LIMIT 5 ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['date'];
		 $hits = $query_run_verify['hits'];
		 $datetime_str =  strtotime( $v_code);
		 $datetime_2 = date("D d M,y", $datetime_str);
		
    		$flow_item=array(
            'hits' => $hits,
            'datetime' => $datetime_2 );
			  array_push($hits_flow_bus["data"], $flow_item);
	   }
	   echo json_encode($hits_flow_bus);
	}
 		 
}

if(isset($_GET['activate']) AND isset($_GET['token_auth'])) 
{
	$activate = $_GET['activate'];
	$token_auth = $_GET['token_auth'];
    $sql = "SELECT * FROM registration WHERE token ='$token_auth'  LIMIT 1";
	$query = mysqli_query($link,$sql);
	 while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
	   {
		    $ida    =$row["id"];
      
		$sql2 = "SELECT * FROM shop WHERE user_id = '$ida' AND shop_id = '$activate' LIMIT 1";
	if($query2 = mysqli_query($link,$sql2))
	{
	while($row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC))
		 {
			 return 1;
		 }
		}
		else {return 0;}
	}	
}
	 
	 

if(isset($_GET['search']))
{
$search_term=array();
$search_term["data"]=array();

	$search_name = $_GET['search'];
	 $param = "%{$search_name}%";
	$sql = "SELECT * FROM shop WHERE shopName LIKE '$param'  LIMIT 10";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		 $id =  $row["shop_id"];
		 $shopName =   $row["shopName"];
		 $name = substr($shopName, 0, 27);
		$shopName_final = ucwords(strtolower($name));
		 $category_raw =   $row["category"];
		 $category = substr($category_raw, 0, 27);
						 
						 $person_item=array(
						 "name" => $shopName_final,
						 "id" => $id,
						 "picture"=> get_profile_pic($id),
						 "category" => $category,
						 "visitors" =>  get_shop_views_no($id)
						  );
						  array_push($search_term["data"], $person_item);
					 }
                	 echo json_encode($search_term);
}




// products array
$business=array();
//$business["data"]=array();

	 if(isset($_GET['token']) )
	 {
		 $token = $_GET['token'];
		 $sql = "SELECT * FROM registration WHERE token ='$token'  LIMIT 1";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		    $ida    =$row["id"];
		     
      
		$sql2 = "SELECT * FROM shop WHERE user_id = '$ida' LIMIT 5";
	$query2 = mysqli_query($link,$sql2);
	while($row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC))
		 {
		    $id =  $row2["shop_id"];
			$username =   $row2["shopName"];
			$shop_descrb =   $row2["shop_descrb"];
			
			 $business_item=array(
            "id" => $id,
            "name" => $username,
            "shop_descrb" => $shop_descrb,
           // "orders" => $username,
            "visitors" => get_shop_views_no($id),
            "hits" => hits_business($id),
			"picture"=> get_profile_pic($id),
			 "check_login"=> check_login($id)
             );
			  array_push($business, $business_item);
          }
		       }
		 
	 echo json_encode($business); 
	 }
	 

//$business["data"]=array();

	 if(isset($_GET['login_check']) )
	 {	 
	  
		 $token = $_GET['login_check'];
		 $sql = "SELECT * FROM registration WHERE token ='$token'  LIMIT 1";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		    $id    =$row["id"];
		    $username =   $row["username"];
     
			 $business_item=array(
            "id" => $id,
            "name" => $username,
             "picture"=> get_profile_pic($id),
			 "check_login"=> check_login($id)
             );
			  
         
		       }
		 
	 echo json_encode($business_item); 
	 }
	/* else
	 {
		 
		 
$sql = "SELECT * FROM shop ORDER BY shop_id ASC LIMIT 50";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		
			
			$id =  $row["shop_id"];
			$username =   $row["shopName"];
			
			 $business_item=array(
            "id" => $id,
            "name" => $username,
             // "orders" => $username,
          "visitors" => get_shop_views_no($id),
            "hits" => hits_business($id),
			"picture"=> get_profile_pic($id)
             );
			  array_push($business["data"], $business_item);
          }  
	 echo json_encode($business);	 
	 }
	
	 
function get_profile_pic($id)
{include "../include/conxn.php"; 
$query = "SELECT image_loc FROM banner_pic WHERE shop_id = '$id' ";
$query4profi  = mysqli_query($link,$query);	
if($query4profilepic = mysqli_num_rows($query4profi) > 0)
	{
while($profile_pic  = mysqli_fetch_assoc($query4profi))
{   $profile_image = $profile_pic['image_loc'];
 return $profile_image; 		 
}
}
else{ $profile_image = "img/banners/banner.png";
return $profile_image;}
}
 */

?>