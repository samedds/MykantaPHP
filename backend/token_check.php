<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

if(isset($_POST['token']))
{
$token = $_POST['token'];
if ( !empty($token) )
{
include "./conxn.php";
session_start();

$stmt = $link->prepare("SELECT id,email,username FROM registration WHERE token = ?  LIMIT 1");

   $stmt->bind_param('s', $token);
   $stmt->execute() ;
   $stmt->store_result();
   $stmt->bind_result( $id,$email_new,$username);
   
   $row = array(); 

if( $stmt->fetch() )
	{ 
	  $row = array( 'id'=> $id, 'email'=> $email_new, 'username'=> $username );
       
	   $_SESSION['email'] = $row['email'];         
	   $_SESSION['id'] = $row['id'];
	   $_SESSION['username']=  $row['username']; 
	   echo 2;
     }
else
{
echo 1;

}
}
else
{
echo 0;

}	
}

if(isset($_POST['fcmToken']))
{
include "../include/conxn.php";
 include "../include/sessionfile.php";
$token = $_POST['fcmToken'];
 $user_id = $_SESSION['id'];
 $time_now = date('Y\-m\-d\ H:i:s');
 $id = 'NULL';
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ip_add = get_client_ip();
if ( !empty($token) )
  {
  //check
  $stmt = $link->prepare("SELECT ip FROM fcm WHERE ip = ?  LIMIT 1");
    $stmt->bind_param('s', $ip_add);
    $stmt->execute() ;
    $stmt->store_result();
    $stmt->bind_result( $ip);
    $row = array(); 
  if( $stmt->fetch() )
    {
		//  echo $email = "ok ";  
 //check
  $stmt = $link->prepare("SELECT id,email FROM registration WHERE token = ?  LIMIT 1");
    $stmt->bind_param('s', $ip_add);
    $stmt->execute() ;
    $stmt->store_result();
    $stmt->bind_result( $id,$email);
    $row = array(); 
  if( $stmt->fetch() )
    { 
		$row = array( 'email'=> $email,'id'=> $id );
        $email = $row['email'];  
        $id = $row['id'];  
		$response = array('value' => $email);
		
	 $query_reg =  "UPDATE fcm SET user_id=?,token=?,datetime=?,email=? WHERE ip = ?";
      if( $querysatus = $link->prepare($query_reg)){
    $querysatus->bind_param('issss',$id, $token, $time_now, $email, $ip_add);
    $querysatus->execute();
      }
	// Send the response as JSON
        return json_encode($response);
	}
    }
  else
    {
    $new_Query = "INSERT INTO `fcm` (`id`, `user_id`, `token`, `datetime`, `ip`) VALUES (NULL, '$user_id', '$token', '$time_now','$ip_add');
    ";
    $q = mysqli_query($link,$new_Query);
   // echo '2';
    }
  }	
}
?>