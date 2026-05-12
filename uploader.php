<?php

if(isset($_POST['task111']))
{
	
 //This is the directory where uploaded files are saved on your server
$uploaded_files_location = 'uploads/videos/temp/';
$uploaded_gif_location = 'uploads/videos/gif/';
$uploaded_imges_location = 'img/temp/';
ini_set('post_max_size', '128M');
ini_set('upload_max_filesize', '128M');
$file_types = array('video/mp4', 'video/flv', 'video/mpeg','video/webm', 'video/avi', 'video/m4v');
$image_types = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
$video_name = $_FILES['file_to_upload']['name'];
$video_type = $_FILES['file_to_upload']['type'];
$tmp_name   = $_FILES['file_to_upload']['tmp_name'];
$video_size = $_FILES['file_to_upload']['size'];
//$video_length = $_FILES['file_to_upload']['duration'];
//$playtime_string = $_FILES['file_to_upload']['playtime_string'];
//$resolution_x = $_FILES['file_to_upload']['resolution_x'];
//$resolution_y = $_FILES['file_to_upload']['resolution_y'];
$imageTag = $_POST['imageTag'];
$res = $_FILES['file_to_upload']['name'];

$file_name = preg_replace('/[[:space:]]+/', '', $res);
$data = $_FILES['file_to_upload']['size'];
 $width = $data[0];
$height = $data[1];
$final_location = $uploaded_files_location.basename($_FILES['file_to_upload']['name']);
  
	if(in_array($video_type, $file_types ) && $_FILES['file_to_upload']['size'] <= 350048576){
	  if (move_uploaded_file($_FILES['file_to_upload']['tmp_name'], $uploaded_files_location.$imageTag."".$file_name)) 
		{
			echo "video_uploaded_successfully";
			$location = $uploaded_gif_location.$imageTag."".$file_name;
	       
			//Resize the image
		//include("include/resize-class.php"); 
		//$resizeObj -> saveImage($location, 75);
			// *** 1) Initialise / load image
		    ///$resizeObj = new resize($location);
		    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
		    //$resizeObj -> resizeImage(900, 900,'auto');
		   // $resizeObj -> resizeImage($height, $width,'auto');
		    // *** 3) Save image
		    //$resizeObj -> saveImage($location, 75);
			//echo "video_to_gif_successfully"; 
		} 
		else
		{
			echo "video_not_copied_unsuccessful";
		}
	// echo $video_name.' ---  '.$video_type .' ---  '.$video_size.' ---  '.$tmp_name ; 
	//echo $video_name = $_FILES['video']['name'];
	}
	else if(in_array($video_type, $image_types) && $_FILES['file_to_upload']['size'] <= 20048576){ //4 MB (size is also in bytes)
		// File within size restrictions
		//the if move uploaded file goes here
		
$file_name222 = preg_replace('/[[:space:]]+/', '', $res);

		if (move_uploaded_file($_FILES['file_to_upload']['tmp_name'], $uploaded_imges_location.$imageTag."".$res)) 
		{
			$location = $uploaded_imges_location.$imageTag."".$file_name;
			//Resize the image
			include("include/resize-class.php");
			// *** 1) Initialise / load image
		    $resizeObj = new resize($location);
		    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
		    $resizeObj -> resizeImage(900, 900,'auto', 'crop');
		   // $resizeObj -> resizeImage($height, $width,'auto');
		    // *** 3) Save image
		    $resizeObj -> saveImage($location, 75);
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
}

if(isset($_POST['task222']))
{   
	include("include/gifcreator/GifCreator.php");
	$AllGifImg = $_POST['AllGifImg'];
	  $rane = $_POST['rane'];
	$imageTag = $_POST['imageTag'];
	$GifImages = explode(',', $AllGifImg);
	//$frames = array("images/1.jpg", "images/2.jpg", "images/3.jpg", "images/4.jpg");
	$frames = [];
	$durations = [];
	$location = "img/temp/";
	foreach($GifImages as $key => $element)
	{
		array_push($frames, $location.$element);
		array_push($durations,$rane);
	}
	//$durations = array(40,	40,40,40);
	$gc = new GifCreator();
	$gc->create($frames, $durations, 0);
	$gifBinary = $gc->getGif();
	file_put_contents("img/comments_images/".$imageTag.".gif", $gifBinary);
	//move_uploaded_file("img/comments_images/mini/".$frames[0].".jpeg");
	foreach($GifImages as $key => $element)
	{
		rename('img/temp/'.$GifImages[0].'','img/comments_images/mini/'.$imageTag.'.jpg');
		rename('img/temp/'.$element.'','img/trash/'.$element.'');
	}
	//echo'<img src="img/pic.gif" width="100" />';
}

if(isset($_POST['gif_product']))
{
  $uploadDir = 'uploads/';
    $file = $_FILES['file'];
include "include/conxn.php";
include "include/funcxn.php";

$url = $_SERVER['REQUEST_URI'];
$title = $_POST['title'];

 console.log($title);
 $new_string = array(); 
$datetime =  date('Y\-m\-d\ H:i:s');  
$user_id = $_SESSION['id'];
//$filename = $_POST['name'];

    // Generate a unique filename
 $filename = uniqid() . '.gif';

    // Move the uploaded file to the specified directory
    $targetPath = $uploadDir . $filename;
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        // File uploaded successfully
        echo 'File saved successfully!';
		
						
				$date_now = date('Y\-m\-d\ H:i:s');
				$datet = strtotime($date_now);
				$image_loc_1 = hash("sha256",$datet);
				$nopw = substr($image_loc_1, 4,8); 
				$nopw2 = substr($image_loc_1,2, 4); 
				$ready = $nopw.$user_id.$nopw2;
			   $comment =  product_describtxn($product_id);
				$id = 'NULL';
			
				$myfile_total = $_POST['myfile_total'];
				
				//$datetime = $_POST['datetime'];
				$id = 'NULL';
				//collecting the owner of the reev
				 $query_reg = "INSERT INTO account_comment (id, myfile_total, comment, title, image_loc, owner_id, account_id, commentDate) VALUES (?,?,?,?,?,?,?,?) ";	
				 
				 if( $querysa = $link->prepare($query_reg))
					{
					   $querysa->bind_param('iisssiis',$id, $myfile_total,$comment,$title,$file,$user_id,$user_id,$datetime);
						$querysa->execute();
					
					// return get_status_commentol($user_id);
					}
					
	
	
						
		
    } else {
        // Failed to move the uploaded file
        echo 'Failed to save the file.';
    }
}  

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadDir = 'uploads/';
    $file = $_FILES['file'];
    $fileww = "yy";
include "include/sessionfile.php"; 
include "include/conxn.php";
include "include/funcxn.php";

$url = $_SERVER['REQUEST_URI'];
$title = $_POST['title'];

$prdt_name = $_POST['product_name'];

$product_name = str_replace("-", " ", $prdt_name);
//console.log($title);
 $new_string = array(); 
$date_time =  date('Y\-m\-d\ H:i:s');  
$user_id = $_SESSION['id'];
//$filename = $_POST['name'];
$datetime = strtotime($date_time); 
$dateString = 'now - 24 hours';
$timestamp = strtotime($dateString);
//$new_time =  time() - $friend_datetime ;
  
//$product_id = $_POST['product_id'];
		
$query = " SELECT owner_id FROM account_comment where title = '$product_name' AND commentDate > '$timestamp' LIMIT 1 ";
$query_add = mysqli_query($link,$query);
if($quer = mysqli_num_rows($query_add)>0)
{
	//  echo 'Post already exist!';
	$response = array();
	$response['message'] = 'Post already exist!';
	echo json_encode($response);
 http_response_code(400);
}else{
		 echo 'Post is new!';				
		    // Generate a unique filename
 $filename = uniqid() . '.gif';
 //Move the uploaded file to the specified directory
 $targetPath = $uploadDir . $filename;
 if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        // File uploaded successfully
        echo 'File saved successfully!';
} else {
        // Failed to move the uploaded file
        echo 'Failed to save the file.';
    }	

		$date_now = date('Y\-m\-d\ H:i:s');
				$datet = strtotime($date_now);
				$image_loc_1 = hash("sha256",$datet);
				$nopw = substr($image_loc_1, 4,8); 
				$nopw2 = substr($image_loc_1,2, 4); 
				$ready = $nopw.$user_id.$nopw2;
			  
				$id = 'NULL';
			    
				$myfile_total = $_POST['myfile_total'];
				
				$id = 'NULL';
				
			$querya = " SELECT product_id,descrb FROM product where name = '$product_name' LIMIT 1 ";
			$query_adda = mysqli_query($link,$querya);
			$productsa = mysqli_fetch_assoc($query_adda);
			$comment = $productsa['descrb'];
			$product_id = $productsa['product_id'];

//
//$comment = get_product_name($product_id);
//$comment = "yooooooo";
				
				//collecting the owner of the reev
				 $query_reg = "INSERT INTO account_comment (id, myfile_total, comment, title, image_loc, owner_id, account_id, commentDate) VALUES (?,?,?,?,?,?,?,?) ";	
				 
				 if( $querysa = $link->prepare($query_reg))
					{
					   $querysa->bind_param('iisssiis',$id, $myfile_total,$comment,$product_name,$filename,$product_id,$user_id,$datetime);
						$querysa->execute();
					
					// return get_status_commentol($user_id);
					}
					
	}
	
	
						
		
    
} else {
    // Invalid request or no file uploaded
    echo 'Invalid request.';
}
?>