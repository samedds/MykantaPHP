<?php
include "include/conxn.php";

 if(isset($_POST['task1']))
 {
 
 
include "include/conxn.php";
include "../include/sessionfile.php";
include "../include/funcxn.php";

$datetime =  date('Y\-m\-d\ H:i:s');
   
$user_id = $_SESSION['id'];
$post_id = $_POST['post_id'];
$shop_comment_text = $_POST['shop_comment_text'];

if( !empty($shop_comment_text))
{

$query1 = "insert into reply_shop values( '' , '$shop_comment_text',$post_id, '', $user_id, '$datetime' )";
if(mysqli_query($link,$query1));
{
echo '
                            <li class="message panel" style="   list-style:none;">
									<strong	 class="text-primary" style=" 	">shop Admin</strong><p style=" ">'.$shop_comment_text.'</p>	
									<p class="list-inline font-xs text-info" style=" "> Just now</p>
												
				                  </li>'	;
}
	

}
else
{
echo " not 	worrrrrks";
}
}
else
{
echo "not work";
}	
	?>
	