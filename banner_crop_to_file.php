<?php
	/* required headers*/
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, DELETE");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

	include "include/conxn.php";
	//include "include/funcxn.php";
	//$shop_id = safe_input($_GET['shop_id']);
	//$shopName = safe_input($_GET['shopName']);
/*
*	!!! THIS IS JUST AN EXAMPLE !!!, PLEASE USE ImageMagick or some other quality image processing libraries
*/

$imgUrl = $_POST['imgUrl'];
// original sizes
$imgInitW = $_POST['imgInitW'];
$imgInitH = $_POST['imgInitH'];
// resized sizes
$imgW = $_POST['imgW'];
$imgH = $_POST['imgH'];
// offsets
$imgY1 = $_POST['imgY1'];
$imgX1 = $_POST['imgX1'];
// crop box
$cropW = $_POST['cropW'];
$cropH = $_POST['cropH'];
// rotation angle
$angle = $_POST['rotation'];
$shop_id = $_POST['shop_id'];
$shop_name = $_POST['shop_name'];

$jpeg_quality = 100;

$just_name = "bannerImg".$shop_name."".rand();
$just_filename = preg_replace('/[^A-Za-z0-9]/ ', '', $just_name);
$output_filename = "img/banners/".$just_filename;

// uncomment line below to save the cropped image in the same location as the original image.
$output_filename2 = dirname($imgUrl).$just_filename;

$what = getimagesize($imgUrl);

switch(strtolower($what['mime']))
{
    case 'image/png':
        $source_image = imagecreatefrompng($imgUrl);
		$type = '.jpeg';
        break;
		
    case 'image/jpeg':
		$source_image = imagecreatefromjpeg($imgUrl);
		$type = '.jpeg';
        break;
		
		case 'image/jpg':
		$source_image = imagecreatefromjpeg($imgUrl);
	    $type = '.jpeg';
        break;
		
    case 'image/gif':
		$source_image = imagecreatefromgif($imgUrl);
		$type = '.jpeg';
        break;
    default: die('image type not supported');
}


//Check write Access to Directory

if(!is_writable(dirname($output_filename))){
	$response = Array(
	    "status" => 'error',
	    "message" => 'Can`t write cropped File'
    );	
}else{

    // resize the original image to size of editor
    $resizedImage = imagecreatetruecolor($imgW, $imgH); // Prepare canvas
	imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
    // rotate the rezized image
    $rotated_image = imagerotate($resizedImage, -$angle, 0);
    // find new width & height of rotated image
    $rotated_width = imagesx($rotated_image);
    $rotated_height = imagesy($rotated_image);
    // diff between rotated & original sizes
    $dx = $rotated_width - $imgW;
    $dy = $rotated_height - $imgH;
    // crop rotated image to fit into original rezized rectangle
	$cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
	imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
	imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
	// crop image into selected area !!!!!this is what i need!!!!!
	$final_image = imagecreatetruecolor($cropW, $cropH);
	imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
	imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
	// sharpen the image
	$matrix = array(
    array(-1, -1, -1),
    array(-1, 16, -1),
    array(-1, -1, -1),
	);
	$divisor = array_sum(array_map('array_sum', $matrix));
	$offset = 0; 
	imageconvolution($final_image, $matrix, $divisor, $offset);
	    	//return $image;
	// finally output png image
	//imagepng($final_image, $output_filename.$type, $png_quality);
	imagejpeg($final_image, $output_filename.$type, $jpeg_quality);
	$response = Array(
	    "status" => 'success',
	    "url" => $output_filename.$type
    );

    $location2 = $output_filename2.$type;
	$location = $output_filename.$type;

	$location_mini = "img/banners/mini/".$just_filename.$type;
	include("include/resize-class.php");
	// *** 1) Initialise / load image
    $resizeObj = new resize($location2);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(320, 80, 'exact');
    // *** 3) Save image
    $resizeObj -> saveImage($location_mini, 1000);

	$querycheck = "SELECT * FROM banner_pic WHERE shop_id = $shop_id LIMIT 1 ";
 	$newquerycheck = mysqli_query($link,$querycheck);
	while($whileImage = mysqli_fetch_assoc($newquerycheck))
	{
		$actualimage = $whileImage['image_loc'];
		if($actualimage != "img/banners/banner.png")
		{
			$justName = str_replace("img/banners/","","$actualimage");
			rename(''.$actualimage.'','img/trash/'.$justName.'');
			rename('img/banners/mini/'.$justName.'','img/trash/'.$justName.'');
		}
	}

$query = "UPDATE banner_pic SET image_loc = '$location', image_loc_mini_index = '$location_mini' WHERE shop_id ='$shop_id' LIMIT 1";	$queryup = mysqli_query($link,$query);

}
print json_encode($response);