<?php
	include "../include/conxn.php";
	include "../include/funcxn.php";

	if(isset($_POST['task']))
	{
		$filename = safe_input($_POST['filename']);
		rename('../img/products_images/'.$filename.'','../img/trash/'.$filename.'');
	}

	else if(isset($_POST['task1']))
	{
		$filename = safe_input($_POST['filename']);
		rename('../img/products_images/'.$filename.'','../img/trash/'.$filename.'');
	}

	else if(isset($_POST['task2']))
	{
		$img_id = safe_input($_POST['img_id']);
		$selimg = "SELECT image_loc FROM product_image_4 WHERE id = '$img_id' ";
		$queryselimg = mysqli_query($link, $selimg);
		while($row = mysqli_fetch_assoc($queryselimg))
		{
			$imgloc = $row['image_loc'];
			$imgloc1 = str_replace('img/products_images/', '', $imgloc);
			$delimg = "DELETE FROM product_image_4 WHERE id = '$img_id' ";
			if($querydelimg = mysqli_query($link, $delimg))
			{	
				rename('../'.$imgloc.'','../img/trash/'.$imgloc1.'');
				echo'Image deleted';
			}
			else{
				echo'Unable to delete image. Please try again or check internet connection';
			}
		}
	}
?>