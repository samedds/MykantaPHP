<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
//
if(empty($_POST['convert'])){
	echo 'Error.';
	die();
}
$file = $_POST['convert'];
$current_video_location = $file;
$gif_name = pathinfo($current_video_location);
$file_name = $gif_name['filename'];
$video_gif = 'gif/'.$file_name.'.gif';
//FFMPEG
$command = "ffmpeg -i -framerate 5 $current_video_location -s 320x240 $video_gif";
exec($command);
if(!file_exists($current_video_location)){
	echo 'Error recognizing .'.$current_video_location;
	die();
}
if(!file_exists($video_gif)){
	echo 'Error converting to gif.'.$current_video_location;
	die();
}
echo 'Successfully Converted to GIF.<br/>
<img src="'.$video_gif.'"/>';
}
else {
	header('location:index.php');
}
?>