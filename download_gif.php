<?php	
if( headers_sent() )
    die('Headers Sent');
 include "include/conxn.php";

 // Must be fresh start
 $file = safe_input1($_GET['file']);
 $post_id = safe_input1($_GET['idref']);
 
   if($query_mail = $link->prepare("SELECT image_loc FROM account_comment where id = ? "))
	 {
		//$query_mail->bind_param('s', $email);
		 $query_mail->bind_param('i', $post_id);
		 $query_mail->execute();
		 $query_mail->store_result();
		 $query_mail->bind_result( $image_loc);
		 if( $query_mail->fetch()){
				$row = array( 'image_loc'=> $image_loc );
		  $image_loc =  $row['image_loc'];
		
		if($image_loc == $file ){
		
		$fullPath = 'img/comments_images/'.$image_loc.'.gif';
		//download_file($full_path);
		
	

  // Required for some browsers
  if(ini_get('zlib.output_compression'))
    ini_set('zlib.output_compression', 'Off');

  // File Exists?
  if( file_exists($fullPath) ){

    // Parse Info / Get Extension
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);

    // Determine Content Type
    switch ($ext) {
   /*   case "pdf": $ctype="application/pdf"; break;
      case "exe": $ctype="application/octet-stream"; break;
      case "zip": $ctype="application/zip"; break;
      case "doc": $ctype="application/msword"; break;
      case "xls": $ctype="application/vnd.ms-excel"; break;
      case "ppt": $ctype="application/vnd.ms-powerpoint"; break;*/
      case "gif": $ctype="image/gif"; break;
      case "png": $ctype="image/png"; break;
      case "jpeg":
      case "jpg": $ctype="image/jpg"; break;
      default: $ctype="application/force-download";
    }
      if( !headers_sent() ){
    header("Pragma: public"); // required
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); // required for certain browsers
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$fsize);
    ob_clean();
    flush();
    readfile( $fullPath );
}
  } else
    die('File Not Found');
	
	
		
		
		
		
		}
		
		else{
		}
	 }
}
 
 
 

	function safe_input1($value)
{include "include/conxn.php";
$magic_quotes_active = get_magic_quotes_gpc();//boolean - true if the quotes thing is turned on
$new_enough_php = function_exists("mysqli_real_escape_string");//boolean - true if the function exists (php 4.3 or higher)
if($new_enough_php)
{
if($magic_quotes_active)
{
$value = stripslashes($value);//if its a new version of php but has the quotes thing running, then strip the slashes it puts in
}
$value_new = mysqli_real_escape_string($link,$value);//if its a new version use the function to deal with characters
$value = htmlspecialchars($value_new);//if its a new version use the function to deal with characters
}
else
if(!$magic_quotes_active)//If its an old version, and the magic quotes are off use the addslashes function
{
$value = addslashes($value);
}
return $value;
}
	?>
