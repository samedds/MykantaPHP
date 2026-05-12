<?php 
if(isset($_POST['delivery_update']))
{include "include/conxn.php";
include "include/sessionfile.php";  
include "../include/funcxn.php";

$user_id = $_SESSION['id'];
$shop_id = $_POST['shop_id'];
$datetime = date('j F Y ');

if(!empty($user_id))
	{
	$query2 = "UPDATE delivery_choice SET mode = '1' WHERE user_id = '$user_id' AND shop_id = '$shop_id'";
	if($new_q = mysqli_query($link,$query2))
		{
		//echo  "updated";
		}
		else
		{
		$new_Query = "INSERT INTO delivery_choice (dc_id, user_id, shop_id, mode) VALUES (NULL, '$user_id', '$shop_id', '1');";
		if($query = mysqli_query($link,$new_Query))
			{
			//echo  "inserted";
			}
		}
	}
}
?>