
<?php
// register shop processor file for logged in user

if(isset($_GET['shopName']))
{include "../include/funcxn.php";
$shopname = $_GET['shopName'];
$shopName = formatUrl_rev($shopname);
include "../include/conxn.php";

$query = "UPDATE `shop` SET `mode`='1' WHERE `shopName`='$shopName'";
	if(mysqli_query($link, $query))
	{
	Echo '<span class="text=success">Successfully Restored</span>,Click Shop name to reload page <a href="../shopaccount.php?shopName='.$shopname.'">'.$shopName.'</a>';
}
else {
echo 'there was an error.'.mysqli_error. '';
}
}
?>