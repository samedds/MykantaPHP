<?php
if(isset($_GET['id']))
{
	include "../include/conxn.php";
	$id = $_GET['id'];
	$shop_id = $_GET['shop_id'];

	$select = "SELECT * from shop WHERE shop_id = '$shop_id' ";
	$select_sql = mysqli_query($link, $select);
	if($select_sql)
	{
		while($shops = mysqli_fetch_assoc($select_sql))
		{
		    $shopName = $shops['shopName'];
		}
	}

	$sqlimageloc = "SELECT * FROM shop_comment WHERE id = $id ";
	$queryimageloc = mysqli_query($link, $sqlimageloc);
	while ($thisImage = mysqli_fetch_assoc($queryimageloc))
	{
		include "../include/conxn.php";
		$actualimage = $thisImage['image_loc'];

		$query = "DELETE FROM shop_comment WHERE id = $id ";
		$doquery = mysqli_query($link, $query);

		if(($actualimage != NULL) AND ($actualimage != "NULL"))
		{
			rename('../img/shop_comments_images/'.$actualimage.'','../img/trash/'.$actualimage.'');
			//echo'<script>alert("yes");</script>';
		}
		if($doquery)
		{
			header("location:../shopaccount.php?shop_id=$shop_id&shopName=$shopName");
		}
		else {
			echo 'there was an error.'.mysqli_error. '';
		}
	}	
}
?>