
<?php
// register shop processor file for logged in user
if(isset($_GET['shop_id']))
{
$shop_id = $_GET['shop_id'];

include "../include/conxn.php";

$query = "DELETE FROM `myshop`.`shop` WHERE `shop`.`shop_id` = $shop_id ";
	if(mysqli_query($link, $query))
	{
	header('location:../profile.php');
}
else {
echo 'there was an error.'.mysqli_error. '';
}
}
?>