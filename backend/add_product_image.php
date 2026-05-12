<?php
include "/include/funcxn.php";
include "include/conxn.php";
include "include/sessionfile.php";
if(isset($_POST['product_id']) && !empty($_POST['product_id']) && isset($_POST['shop_id']) && !empty($_POST['shop_id']) && isset($_POST['myfile']) && !empty($_POST['myfile']))
{
 $product_id =$_POST['product_id'];
 $user_id = $_SESSION['id'];
$shop_id = $_POST['shop_id'];
 $myfile = $_POST['myfile'];
$query = "SELECT COUNT(id) FROM product_image_4 WHERE product_id = $product_id && shop_id = $shop_id ";
	$query_data = mysqli_query($link,$query);	
   $query_count = mysqli_fetch_row($query_data);
$image_count = $query_count[0];
	if($image_count==6)
	{  	   
	echo 'you have 7 product images';
    }
else 
{
$product_id = $_POST['product_id'];
$shop_id = $_POST['shop_id'];
$myfile = $_POST['myfile'];
$datetime =  date('Y\-m\-d\ H:i:s');
	$image_count_new = $image_count + 2;
$tmp_name = $_POST['myfile'];
	 $location ="img/products_images/$myfile";
	  move_uploaded_file($tmp_name,$location);
		  $sql = "insert into product_image_4 values( '','$shop_id','$product_id','$myfile','$datetime' )";
	      $query = mysqli_query($link,$sql);
		 if( $query )
		 {
		  move_uploaded_file($tmp_name,$location);
		   echo 'you have used '.$image_count_new.'/7' ;
		 }
	}
}
else
{
echo "something not set";
} 
?>

