<?php
//session_start();
$hostname_conn = "localhost";
$database_conn = "mykasjeu_myshop";
$username_conn = "mykasjeu_mykanta";
$password_conn = "X(D8$50#P^mT";
$link = mysqli_connect("localhost","mykasjeu_mykanta","X(D8$50#P^mT","mykasjeu_myshop");
if (!$link)
{
die('error connecting'.mysqli_error());
}
 
/*

$hostname_conn = "localhost";
$database_conn = "myshop";
$username_conn = "hipi1admincpofff";
$password_conn = "123456789";
$link = mysqli_connect("localhost","hipi1admincpofff","123456789","myshop");
if (!$link)
{
die('error connecting'.mysqli_error());
} 
if(!mysqli_select_db('hipiadmi_2014'))
{
die('error connecting'.mysqli_error());
} */
?>
