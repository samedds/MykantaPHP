<?php

/********************************************************************************

* This script is brought to you by Vasplus Programming Blog

* Website: www.vasplus.info

* Email: info@vasplus.info

*********************************************************************************/

include "include/conxn.php";
include "include/funcxn.php";
if(isset($_POST['task4']))
{
	$uploaded_files_location = 'img/products_images/'; 
	$uploaded_files_location_mini = 'img/products_images/mini/';//This is the directory where uploaded files are saved on your server
	$imageTag = $_POST['imageTag'];
	$product_id = $_POST['product_id'];
	//$shop_id = $_POST['shop_id'];
	//$datetime =  date('Y\-m\-d\ H:i:s');
	$file_name = $_FILES['file_to_upload']['name'];
	$location_img = $imageTag."-".$file_name;
	$location = $uploaded_files_location.$imageTag."-".$file_name;
	$location1 = $uploaded_files_location_mini.$imageTag."-".$file_name;
	//$final_location = $uploaded_files_location . basename($_FILES['file_to_upload']['name']);
	if($_FILES['file_to_upload']['size'] < 1048576) { //1 MB (size is also in bytes)
	    // File within size restrictions
	    if (move_uploaded_file($_FILES['file_to_upload']['tmp_name'], $uploaded_files_location.$imageTag."-".$file_name)) 
		{
			//Here you can save the uploaded file to your database if you wish before the success message below
			$sql1 = "UPDATE product SET image_loc = '$location_img' WHERE product_id = '$product_id' ";
			if($query1 = mysqli_query($link, $sql1))
			{
				$location = $uploaded_files_location.$imageTag."-".$file_name;
				//Resize the image
				include("include/resize-class.php");
				// *** 1) Initialise / load image
		    $resizeObj = new resize($location);
		    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
		    $resizeObj -> resizeImage(150, 150, 'auto');
		    // *** 3) Save image
		    $resizeObj -> saveImage($location1, 1000);
				echo "file_uploaded_successfully";
			}
		} 
		else 
		{
			echo "file_upload_was_unsuccessful";
		}
	} else {
	    // File too big
	    echo "file_upload_was_unsuccessful";
	}
}

else if(isset($_POST['task5']))
{
	$uploaded_files_location = 'img/products_images/';
$uploaded_files_location_mini = 'img/products_images/mini/';	//This is the directory where uploaded files are saved on your server
	$imageTag = $_POST['imageTag'];
	$product_id = $_POST['product_id'];
	$shop_id = $_POST['shop_id'];
	$datetime =  date('Y\-m\-d\ H:i:s');
	$file_name = $_FILES['file_to_upload']['name'];
	$location_file = $imageTag."-".$file_name;
	$location = $uploaded_files_location.$imageTag."-".$file_name;
	$location1 = $uploaded_files_location_mini.$imageTag."-".$file_name;
	
	//$final_location = $uploaded_files_location . basename($_FILES['file_to_upload']['name']);
	$selimg = "SELECT * FROM product_image_4 WHERE product_id = '$product_id' ";
	$queryimg = mysqli_query($link, $selimg);
	$totalimg = mysqli_num_rows($queryimg);
	if($totalimg <6){
		if($_FILES['file_to_upload']['size'] < 1048576) { //1 MB (size is also in bytes)
		    // File within size restrictions
		    if (move_uploaded_file($_FILES['file_to_upload']['tmp_name'], $uploaded_files_location.$imageTag."-".$file_name)) 
			{
				//Here you can save the uploaded file to your database if you wish before the success message below
				$sql = "INSERT into product_image_4(shop_id, product_id, image_loc, datetime) values('$shop_id','$product_id','$location_file','$datetime')";
				if($query = mysqli_query($link, $sql))
				{
					//$location = $uploaded_files_location.$imageTag."-".$file_name;
					//Resize the image
					include("include/resize-class.php");
					// *** 1) Initialise / load image
			    $resizeObj = new resize($location);
			    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			    $resizeObj -> resizeImage(150, 150, 'auto');
			    // *** 3) Save image
			    $resizeObj -> saveImage($location1, 1000);
					echo "file_uploaded_successfully";
				}
			} 
			else 
			{
				echo "file_upload_was_unsuccessful";
			}
		} else {
		    // File too big
		    echo "file_upload_was_unsuccessful";
		}
	}
	else{
		echo'You have 6 images';
	}
}

?>