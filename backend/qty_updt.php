<?php 
 include "../include/conxn.php";
if(isset($_POST['quantity_updt']))
{
include "../include/conxn.php";
include "../include/sessionfile.php";  
include "../include/funcxn.php";
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
echo $qty = $_POST['new_qty'];
echo $option_id = $_POST['option_id'];
echo $result1 = $_POST['result'];
echo $datetime = date('j F Y ');

if(!empty($qty))
{
$query2 = "UPDATE cart_vis SET stock = '$qty', option_total = '$result1' WHERE account_id = '$user_id' AND option_id = '$option_id'";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_assoc($query_data))
{
echo  "worked";
}
}
}else if(isset($_POST['task_red']))
{
include "../include/conxn.php";
include "../include/sessionfile.php";  
include "../include/funcxn.php";
//process for user
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
$user_id = $_SESSION['vis_id'];
}
echo $qty = safe_input($_POST['new_qty']);
echo $fig = $_POST['result'];
$result = $qty - 1;
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