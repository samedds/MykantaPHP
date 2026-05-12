<?php 
include "../include/conxn.php";
?>
<?php
// register product processor file for logged in user
if(isset($_POST['task']))
{
include "../include/conxn.php";
include "../include/funcxn.php";
include "../include/sessionfile.php";

$cart_id = $_POST['product_id'];

$query = "DELETE FROM `cart` WHERE cart_id = '$cart_id' ";

if($query4user_info = mysqli_query($link,$query))
 
 { 
	  echo '<p class="text-danger">Deleted </p>';
 }
 else echo "error";
}

if(isset($_POST['task_vis_del']))
{
include "../include/conxn.php";
include "../include/funcxn.php";

$cart_id = $_POST['product_id'];

$query = "DELETE FROM `cart_vis` WHERE cart_id = '$cart_id' ";

if($query4user_info = mysqli_query($link,$query))
 
 { 
	  echo '<p class="text-danger">Deleted </p>';
 }
 else echo "error";
}
?>