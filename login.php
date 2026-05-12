<?php
ini_set('session.cookie_httponly',true);
ob_start();
@session_start();
include "include/getfunction.php";
include "include/conxn.php";
if(isset($_POST['email']) && isset($_POST['pass']) )
{
$password_safe =  $_POST['pass'];
$token = bin2hex(openssl_random_pseudo_bytes(64)); //encryption
$email_raw = $_POST['email'];
$email = preg_replace('/[^A-Za-z0-9\@\.\_]/ ', '', $email_raw);
 $e_1 = strlen($email_raw);
 $e_2 = strlen($email);
//$email = preg_replace('/[^A-Za-z0-9\@\.\_]/ ', '', $email_raw);

$password = hash("sha256",$password_safe);
$loginFormAction = $_SERVER['PHP_SELF'];
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
	
if (isset($_GET['accesscheck'])) 
	{
	$_SESSION['PrevUrl'] = $_GET['accesscheck'];
	}
if ( $e_2 == $e_1 && !empty($password))
{


 $email_safe = preg_replace('/[^A-Za-z0-9\@\.\_]/ ', '', $email_raw);
$username_safe = preg_replace('/[^A-Za-z0-9\.\_]/ ', '', $email_raw);
$stmt = $link->prepare("SELECT id,email,username,token,lastlogin FROM registration WHERE email = ? AND password = ? OR username = ? AND password = ?  LIMIT 1");
 
   $stmt->bind_param('ssss', $email_safe,$password, $username_safe,$password);
   $stmt->execute() ;
   $stmt->store_result();
   $stmt->bind_result( $id,$email_new,$username,$token_raw,$lastlogin);
   
   $row = array(); 

if( $stmt->fetch() )
	{ 
	   $row = array( 'id'=> $id, 'email'=> $email_new, 'username'=> $username , 'token'=> $token_raw , 'lastlogin'=> $lastlogin );
       $_email_text = $row['email'];  
       $token_1 = $row['token'];  
       $db_lastlogin = $row['lastlogin'];  
       $time_now = date('Y\-m\-d\ H:i:s');
	   $_SESSION['email'] = $row['email'];         
	   $_SESSION['id'] = $row['id'];
	   $user_id = $row['id'];
	   $_SESSION['username']=  $row['username']; 
       $zero = 0;  
       
		//process for cart user update

			if(isset($_SESSION['vis_id']) )
			{
				$account_id = $_SESSION['vis_id'];
				$queryza = mysqli_query($link,"UPDATE cart_vis SET account_id = '$user_id' WHERE account_id = '$account_id'");
			}

	  $query = mysqli_query($link,"UPDATE registration SET token = '$ip_add', lastlogin = '$time_now' , datetime = '$db_lastlogin' WHERE id = '$user_id'");
 
 ie("_password", $password, time()  + (86400 * 1),"/");
				} */
	//validate email 
  $querystmt2 = $link->prepare("SELECT email FROM verify_user_auth WHERE email = ? AND value >= ?   ");
  $querystmt2->bind_param('si', $_email_text,$zero);
  $querystmt2->execute() ;
  $querystmt2->store_result();
  $querystmt2->bind_result( $_email_text);
 if( $querystmt2->fetch())
     	{
//insert status
 $querher = $link->prepare("SELECT status_id FROM status WHERE user_id = ?  LIMIT 1");
  $querher->bind_param('i', $user_id);
  $querher->execute() ;
  $querher->store_result();
  $querher->bind_result( $user_id);
 if( $querher->fetch())
     	{ 
	     $one =  1;	
		$datetime =  date('Y\-m\-d\ H:i:s');		 
		 $querysatus = $link->prepare("UPDATE status SET status_value=?,status_seen_by_others=?,datetime=? WHERE user_id = ? LIMIT 1");
         $querysatus->bind_param('iisi', $one, $one, $user_id, $datetime);
        if( $querysatus->execute() )
		{ 
			echo $token;
		}
		else
		{  unset($_SESSION['id']);
            unset($_SESSION['email']);
		 //  header("Location:/home" );
		   echo "false";
		}
	 
	}
			
	else {
	  $datetime =  date('Y\-m\-d\ H:i:s');
	 $last_datetime = strtotime( $datetime );
	   $one =  '1';
       $id = 'NULL';	
       $user_id = $row['id'];	   
      $query_reg = "INSERT INTO status (status_id, status_value, status_seen_by_others, user_id, datetime, last_datetime) VALUES ( ?, ?, ?, ?, ?, ?)";
	  if( $querysa = $link->prepare($query_reg)){
           $querysa->bind_param('iiiiss',$id, $one, $one, $user_id, $datetime, $datetime);
     
	  if($querysa->execute()) 
		{ 
			echo $token;
		}
		else
		{   unset($_SESSION['id']);
            unset($_SESSION['email']);
         
		    echo "false";
		}
		}
		else
		{  unset($_SESSION['id']);
            unset($_SESSION['email']);
		  echo "false";
		}
}		  
//ession_write_close();
//$user_id =  $_SESSION['id'];
		 
//header("Location:/Usegggr");
}
else
{
 unset($_SESSION['id']);
  unset($_SESSION['email']);

session_write_close();
echo "false";
}	
}
else
{
 unset($_SESSION['id']);
 unset($_SESSION['email']);

session_write_close();
echo "false";
//header("Location:/User");

}
	
}
else{
echo "false";
}
}

function safe_input2($value)
{include "include/conxn.php";
$magic_quotes_active = get_magic_quotes_gpc();//boolean - true if the quotes thing is turned on
$new_enough_php = function_exists("mysqli_real_escape_string");
if($new_enough_php)
{
if($magic_quotes_active)
{
$value = stripslashes($value); 
$value_new = mysqli_real_escape_string($link,$value);//if its a new version use the function to deal with characters
$value = htmlspecialchars($value_new);/
}
else
if(!$magic_quotes_active)// 
{
$value = addslashes($value);
}
return $value;
}

?>