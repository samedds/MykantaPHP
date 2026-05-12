
<?php
include "include/conxn.php";

if(isset($_POST['task']))
{
include "include/conxn.php";
include "include/funcxn.php";
include "include/sessionfile.php";


 $user_id = safe_input($_POST['user_id']);
 $account_id = safe_input($_SESSION['id']);
 
$query = "DELETE FROM `myshop`.`cart` WHERE `cart`.`account_id` = $user_id ";
if(mysqli_query($link, $query))
	{
	echo '<p class="text-info well well-light" width="100%"> Wish List cleared</p>';
}
else {
echo 'there was an error';
}}
?>