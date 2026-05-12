<?php
//ob_start();
//session_start();
 include "/conxn.php";
function Destroy()
{
  unset($_SESSION['id']);
  unset($_SESSION['email']);
   $expire = time() - 300;
setcookie("_email", '', $expire);
setcookie("_password", '', $expire);
setcookie("remb_me", '', $expire);
header("location:/Home");
//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}
/*
If(isset($_SESSION['last_ip']) === false)
{
  $_SESSION['last_ip']  =   $_SERVER['REMOTE_ADDR'];
}

If ($_SESSION['last_ip']  !== $_SERVER['REMOTE_ADDR'])
{
   //Session_unset();
Destroy();
}
*/
  $sn = session_name();
        if (isset($_COOKIE[$sn])) {
            $sessid = $_COOKIE[$sn];
        }  else {
            session_start();
			 check_on();
            return false;
        }

       if (!preg_match('/^[a-zA-Z0-9,\-]{22,40}$/', $sessid)) {
            return false;
        }
        @session_start();
        check_on();
       return true;

function check_on(){
if(isset($_SESSION['id']) /* && isset($_SESSION['email']) */)
{
 
  $id = $_SESSION['id'];
  $email = $_SESSION['email'];
  $qry = "SELECT id FROM registration WHERE id = '$id' AND email = '$email' OR password ='$email'";
  $query = mysqli_query($link, $qry);
  if(mysqli_num_rows($query) != 1)
  { 
   Destroy();
  }
}
else 
if(!isset($_SESSION['id']))
{
 Destroy();
 }
 }
?>