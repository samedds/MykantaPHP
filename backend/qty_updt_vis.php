<?php 
include "include/conxn.php";
if(isset($_POST['task']))
{
include "include/conxn.php";
ob_start();
session_start(); 
include "../include/funcxn_vis.php";

$qty = safe_input($_POST['new_qty']);

$user_id = $_SESSION['vis_id'];
$option_id = $_POST['option_id'];
$result1 = $_POST['result'];
$datetime = date('j F Y ');

if(!empty($qty))
{
$query2 = "UPDATE cart_vis SET stock = '$qty', option_total = '$result1' WHERE account_id = '$user_id' AND option_id = '$option_id'";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_assoc($query_data))
{
echo  "worked";
}
}
}
else if(isset($_POST['task_red']))
{
include "include/conxn.php";
ob_start();
session_start(); 
include "../include/funcxn_vis.php";

$qty = safe_input($_POST['new_qty']);
$fig = $_POST['result'];
$result = $qty ;
$user_id = $_SESSION['vis_id'];
$option_id = $_POST['option_id'];
$datetime = date('j F Y ');

if(!empty($qty))
{
$query2 = "UPDATE cart_vis SET stock = '$result', option_total = '$fig' WHERE account_id = '$user_id' AND option_id = '$option_id'";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_assoc($query_data))
{
echo  'worked';
}


}
}
?>