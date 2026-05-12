<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
include("include/gifcreator/GifCreator.php");
if(empty($_POST['convert'])){
	echo 'Error. heere is the errorpoint';
	die();
}
$file = $_POST['convert'];
$rane = $_POST['rane'];
$video_rex = $_POST['video_rex'];
$current_time_vid = $_POST['current_time_vid'];
$current_video_location = $file;
$gif_name = pathinfo($current_video_location);
$file_name = $gif_name['filename'];
$video_gif = 'img/comments_images/'.$file_name.'.gif';
$video_gif_trash = 'img/trash/'.$file_name.'.gif';
$jpg_gif_trash = 'img/trash/'.$file_name.'.jpg';
$thumbnail = 'img/site_img/watermark.png';
$video_jpg = 'img/comments_images/mini/'.$file_name.'.jpg'; 
if(file_exists($video_gif))
{
	rename($video_gif.'',$video_gif_trash.'');
}
if(file_exists($video_jpg))
{
	rename($video_jpg.'',$jpg_gif_trash.'');
}


//FFMPEG 
$command = "ffmpeg  -t $rane -ss $current_time_vid -i $current_video_location -i $thumbnail -filter_complex overlay=W-w-10:H-h-10 -codec:a copy -s $video_rex -r 5 $video_gif";
//$command = "ffmpeg -ss $current_time_vid -i $current_video_location -to $rane -i img/site_img/watermark.png -filter_complex overlay=W-w-10:H-h-10 -codec:a copy -s $video_rex $video_gif";

//$command = "ffmpeg -i $current_video_location -s 320x240 $video_gif";
exec($command);
if(!file_exists($current_video_location)){
	echo 'File was not uploaded. Upload the video once more! .';
	die();
}
if(file_exists($current_video_location)){
$command2 = "ffmpeg -ss $current_time_vid -i $current_video_location -s $video_rex $video_jpg";
	exec($command2);
	echo  $file_name;
}else{	echo 'Error converting to gif.'.$video_gif;}
    

}
else {
	header('location:home');
}
?>