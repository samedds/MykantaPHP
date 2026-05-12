<?php 
include "include/conxn.php";
include "include/funcxn.php";
include "include/sessionfile.php";
include "include/resize-class.php";

 

 $account_id = safe_input($_SESSION['id']);
 $owner_id = safe_input($_GET['shop_id']);
$shop_id = safe_input($_GET['shop_id']);
$shopName = safe_input($_GET['shopName']);
?>
<?php 

if (!empty($_SESSION['id']))
{
include "include/conxn.php";
 //get files att
$datetime1 =  date('Y\-m\-d\ H:i:s');
$datetime =  strtotime($datetime1);
$name =addslashes( str_replace( "\n" , "<br>" , $_FILES['myfile']['name']));
$name = $datetime."-".$name;
$photoTemp = $_FILES['myfile']['tmp_name'];
$tmp_name = $_FILES['myfile']['tmp_name'];


 $querycheck = "SELECT *  FROM `banner_pic` WHERE shop_id = $shop_id LIMIT 1 ";
 
 $newquerycheck = mysqli_query($link,$querycheck);
 
if  (mysqli_num_rows($newquerycheck)>0)
 { 
     $location = "img/banners/$name";
     $location_mini = "img/banners/mini/$name";
	 
if(move_uploaded_file($tmp_name,$location))
{

// *** 1) Initialise / load image
    $resizeObj = new resize($location);

    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(320,80, 'exact');

    // *** 3) Save image
    $resizeObj -> saveImage($location_mini);
	
$query = "UPDATE banner_pic SET image_loc = '$location', image_loc_mini_index = '$location_mini' WHERE shop_id ='$shop_id' LIMIT 1";
if  (  $queryup = mysqli_query($link,$query))
 { 
 
  header('location:/User/my_business/'.$shopName.'');
}
else
{ 
  header('location:/User/my_business/'.$shopName.'');
}
}
else
{ 
  header('location:/User/my_business/'.$shopName.'');
}
}
else
{ 
$location = "img/banners/$name";
  $location_mini = "img/banners/mini/$name";
  
move_uploaded_file($tmp_name,$location);

 $query = mysqli_query("INSERT INTO `myshop`.`banner_pic` (
`banner_id` ,
`shop_id` ,
`image_loc`,
`image_loc_mini_index`
)
VALUES (
NULL , '$shop_id', '$location', '$location_mini'
)");

   header('location:/User/my_business/'.$shopName.'');
}
}
?>