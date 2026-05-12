<?php
//session_start();
$hostname_conn = "localhost";
$database_conn = "";
$username_conn = "";
$password_conn = "";
$link = mysqli_connect("localhost","","","");
if (!$link)
{
die('error connecting'.mysqli_error());
} 
?>
