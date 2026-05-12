<?php 

?>
<?php
// register shop processor file for logged in user
if(isset($_GET['id']))
{
include "../include/conxn.php";
$id = $_GET['id'];
$owner_id = $_GET['friend_id'];
$account_id = $_GET['account_id'];

	$grab = "SELECT * from registration WHERE id = '$account_id' ";
	$grab_sql = mysqli_query($link, $grab);
	if($grab_sql)
	{
		while($people = mysqli_fetch_assoc($grab_sql))
		{
		    $username = $people['username'];
		}
	}

$query = "DELETE FROM `myshop`.`account_comment` WHERE `account_comment`.`id` = $id ";
	if(mysqli_query($link, $query))
	{
	header("location:../accountfriendpage.php?friend_id=$owner_id&username=$username");
}
else {
echo 'there was an error.'.mysqli_error. '';
}
}
?>