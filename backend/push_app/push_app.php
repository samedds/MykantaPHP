<?php 
 $token = $_POST['Token'];   
 

 if(isset($_POST['Token']) OR isset($_POST['token']))
 {
 include "include/conxn.php";
 //include "../include/sessionfile.php";
   //$token = $_POST['Token'];
   $token = $_POST['Token'];
  $datetime =  date('Y\-m\-d\ ');

   //$user_id = $_SESSION['id'];
   //$query_token = " INSERT INTO fcm(Token,client_token_id) VALUES ('$token') ON DUPLICATE KEY UPDATE Token = '$token'"; 
    $ip = get_client_ip();
  $query4_auth = "SELECT token FROM fcm WHERE token = '$token' LIMIT 1 ";
  $authenticate = mysqli_query($link,$query4_auth);
  if($authenticate2 = mysqli_num_rows($authenticate)>0)	
   {
   while($user_auth_info = mysqli_fetch_array($authenticate,MYSQLI_ASSOC))
	 {
	 echo $Token_new =  $user_auth_info['token'];
	 } 
   }	
   else
   {
   $query_token = " INSERT INTO fcm (id,token,date,ip) VALUES (NULL, '$token','$datetime ','$ip')";
   mysqli_query($link,$query_token);
   mysqli_close($link);
   echo $token;
   }
}
 else
 {
  include "include/conxn.php";
   $datetime =  date('Y\-m\-d\ ');
      $ip = get_client_ip();
 $token = 'noinset';
 $query_token = " INSERT INTO fcm (id,token,date,ip) VALUES (NULL, '$token','$datetime ','$ip')";
   mysqli_query($link,$query_token);
   mysqli_close($link);
 } 

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
?>