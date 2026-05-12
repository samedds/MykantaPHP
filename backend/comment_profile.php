<?php
include "include/conxn.php";

 if(isset($_POST['task1']))
 {
include "include/conxn.php";
include "../sessionfile.php";
include "../include/funcxn.php";

 $datetime =  date('Y\-m\-d\ H:i:s');
   
 $user_id = $_SESSION['id'];
 $post_id = $_POST['post_id'];

//collecting the owner of the reev
$sql = "SELECT owner_id FROM account_comment where id='$post_id' LIMIT 1 ";
		
		if($query_add = mysqli_query($link,$sql))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {   
            $owner_id = safe_input($details['owner_id']);
		

 $profile_comment_text = safe_input($_POST['profile_comment_text']);

if( !empty($profile_comment_text))
{

//$query1 = "INSERT INTO reply(`id`, `reply`, `post_id`, `post_user_id`, `reply_user_id`, `datetime`) VALUES ( '' ,'$profile_comment_text','$post_id','$owner_id','$user_id','$datetime')";

$query1 = "INSERT INTO reply (id, reply, post_id, post_user_id, reply_user_id, datetime) VALUES (NULL,'$profile_comment_text','$post_id','$owner_id','$user_id','$datetime');";

if($query2 = mysqli_query($link,$query1))
{
 $sql = "SELECT firstName,id,username FROM registration where id = '$user_id'  ";
		
		if($query_add = mysqli_query($link,$sql))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {   
                   $username = safe_input($details['username']);
                 $friend_id = safe_input($details['id']);
                 $firstName = safe_input($details['firstName']);
               //  $secName = safe_input($details['secName']);
		 $query = "SELECT image_loc FROM profile_pic WHERE account_id =  '$friend_id' LIMIT 1 
		";
	$query4profilepic = mysqli_query($link,$query);	
    if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
			{   
			$profile_image = $profile_pic['image_loc'];
             echo '<li class="message  " >
		<img src="/img/avatars/mini/'. $profile_image.'" class="img-circle" width="20px">
			<a href="/connection_auth/'.$username.'" class="username" style=" padding-left:10px;">'.$username.'</a><p style=" padding-left:35px; margin-top:0px;">'.$profile_comment_text.' <a href="javascript:void(0);" class="text-muted">Just now</a></p>
			</li>
		 '; 
  }
 }
}
}
 else
{
echo "error";
}
}
else
{
echo "Please type a comment";
}

}
	}
}
	
	?>
	