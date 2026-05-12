<?php

/********************************************************************************

* This script is brought to you by Vasplus Programming Blog

* Website: www.vasplus.info

* Email: info@vasplus.info

*********************************************************************************/





$uploaded_files_location = 'img/shop_comments_images/'; //This is the directory where uploaded files are saved on your server
$imageTag = $_POST['imageTag'];
$file_name = $_FILES['file_to_upload']['name'];
//$final_location = $uploaded_files_location . basename($_FILES['file_to_upload']['name']);

if($_FILES['file_to_upload']['size'] < 1048576) { //1 MB (size is also in bytes)
	// File within size restrictions
	//the if move uploaded file goes here
	if (move_uploaded_file($_FILES['file_to_upload']['tmp_name'], $uploaded_files_location.$imageTag."-".$file_name)) 
	{
		//Here you can save the uploaded file to your database if you wish before the success message below
		echo "file_uploaded_successfully"; 
	} 
	else 
	{
		echo "file_upload_was_unsuccessful";
	}
} else {
		// File too big
		echo "file_upload_was_unsuccessful";
}

?>