<?php
$uploaded_files_location = 'img/products_images/'; 
$uploaded_files_location_mini = 'img/products_images/mini/';//This is the directory where uploaded files are saved on your server
$imageTag = $_POST['imageTag'];
$file_name = $_FILES['file_to_upload']['name'];
//$final_location = $uploaded_files_location . basename($_FILES['file_to_upload']['name']);

if($_FILES['file_to_upload']['size'] < 4048576) 
{ //1 MB (size is also in bytes)
    // File within size restrictions
    if (move_uploaded_file($_FILES['file_to_upload']['tmp_name'], $uploaded_files_location.$imageTag."-".$file_name)) 
	{
		//Here you can save the uploaded file to your database if you wish before the success message below
			$location1 = $uploaded_files_location_mini.$imageTag."-".$file_name;
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
	else 
	{
		echo "file_upload_was_unsuccessful";
	}
} else {
    // File too big
    echo "file_upload_was_unsuccessful";
}

?>  
