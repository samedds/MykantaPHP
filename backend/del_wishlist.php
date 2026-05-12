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

$wishlist_id = safe_input($_POST['product_id']);

$query = "DELETE FROM wishlist WHERE id = '$wishlist_id' ";

$query4user_info = mysqli_query($link,$query);
	 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
		 
		 }


}
?>