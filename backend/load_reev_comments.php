<?php
include "include/conxn.php";

 if(isset($_POST['task1']))
 {
include "include/conxn.php";
///include "../sessionfile.php";
include "../include/funcxn.php";

$datetime =  date('Y\-m\-d\ H:i:s');
//$user_id = $_SESSION['id'];
$post_id = $_POST['post_id'];

if( !empty($post_id))
{
$querymain = "SELECT reply_user_id,reply,datetime FROM reply where post_id = '$post_id'";
$query2 = mysqli_query($link,$querymain);
if($querysqp = mysqli_num_rows($query2))
{
while($details2 = mysqli_fetch_assoc($query2))
		 {
                 $user_id2 = $details2['reply_user_id'];
				 $profile_comment_text = convertHashtags($details2['reply']);
				 $timedate = $details2['datetime'];
				$time = strtotime($timedate);

 $sql = "SELECT firstName,id,username FROM registration where id = $user_id2  ";
		  
		if($query_add = mysqli_query($link,$sql))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
                 $username = safe_input($details['username']);
                 $friend_id = safe_input($details['id']);
                 $firstName = safe_input($details['firstName']);
		 $query = "SELECT image_loc,gif_as_pic FROM profile_pic WHERE account_id =  $friend_id 
		";
	$query4profilepic = mysqli_query($link,$query);	
    if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
			{   
			$profile_image = $profile_pic['image_loc'];
			$gif_as_pic = $profile_pic['gif_as_pic'];
			 echo '   
    <li class="message  padding-10" >';
			if($gif_as_pic == "" OR  $gif_as_pic == "NULL" )
{ 
echo'<img src="/img/avatars/mini/'. $profile_image.'" class="img-thumbnail img-circle" style="max-height:40px;max-width:40px;" />';
}
else{
echo'<img src="/img/comments_images/mini/'. $gif_as_pic.'.jpg" class="img-thumbnail img-circle" style="max-height:40px;max-width:40px;" />';
}
   echo'         
	 
	<a href="/connection-auth/'.$username.'" class="username" style=" padding-left:5px;">'.$username.'</a><p style=" padding-left:30px;">'.$profile_comment_text.'<a href="javascript:void(0);" class="text-muted">. '.humanTiming($time).' ago</a></p>
   </li>
  '; 
}
}
}
}
echo ' 
<div id="profile_holder_ul'.$post_id.'" >	</div>					
<div class="input-group wall-com ment-reply " style=" padding-bottom:10px; padding-left:-10px; ">
<input id="profile_comment_text'.$post_id.'"  type="text" name="reply" class="form-control input-xs"         placeholder="Comment here...">
<span class="input-group-btn"id="btn_'.$post_id.'">
<button type="submit"  onClick="comment_profile('.$post_id.')" class="btn  btn-primary btn-xs">Comment
</button>
</span>
</div><a href="javascript:void(0);" class=" padding-5 "style="height:30px; width:auto;" onclick="hide_reev_comments('.$post_id.')" alt="hide comment"><i class="fa fa-arrow-up">  </i>  Hide comments </a>	';


}
else
{
echo '
<div class="padding-10" id="profile_holder_ul'.$post_id.'" > No comments yet.
 </div>					
<div class="input-group wall-comment-reply padding-10" style="">
<input id="profile_comment_text'.$post_id.'"  type="text" name="reply" class="form-control input-xs"         placeholder="Comment here...">
	<span class="input-group-btn"id="btn_'.$post_id.'" >
	<button type="submit"  onClick="comment_profile('.$post_id.')" class="btn  btn-primary btn-xs">Comment
	</button>
	 </span>
</div><a href="javascript:void(0);" class=" padding-5 "style="height:30px; width:auto;" onclick="hide_reev_comments('.$post_id.')" alt="hide comment"><i class="fa fa-arrow-up">  </i>  Hide comments </a>	';
}
}
else
{
echo '<div > bccgg </div>';
}
} 

else if(isset($_POST['load_reev_text_more']))
 {
include "include/conxn.php";
///include "../sessionfile.php";
include "../include/funcxn.php";

$datetime =  date('Y\-m\-d\ H:i:s');
//$user_id = $_SESSION['id'];
$post_id = $_POST['post_id'];

if( !empty($post_id))
{
$querymain = "SELECT comment FROM account_comment where id = '$post_id'";
$query2 = mysqli_query($link,$querymain);
if($querysqp = mysqli_num_rows($query2))
{
while($details2 = mysqli_fetch_assoc($query2))
		 {
          $comment1 = $details2['comment'];
		  $comment4 = convertHashtags($comment1);
		  $comment =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
        echo  $user_id2 = stripslashes($comment);
}
 

}
else
{
echo '
<div class="padding-10" id="profile_holder_ul'.$post_id.'" > No comments yet.
 </div>					
<div class="input-group wall-comment-reply padding-10" style="">
<input id="profile_comment_text'.$post_id.'"  type="text" name="reply" class="form-control input-xs"         placeholder="Comment here...">
	<span class="input-group-btn"id="btn_'.$post_id.'" >
	<button type="submit"  onClick="comment_profile('.$post_id.')" class="btn  btn-primary btn-xs">Comment
	</button>
	 </span>
</div><a href="javascript:void(0);" class=" padding-5 "style="height:30px; width:auto;" onclick="hide_reev_comments('.$post_id.')" alt="hide comment"><i class="fa fa-arrow-up">  </i>  Hide comments </a>	';
}
}
else
{
echo '<div > bccgg </div>';
}
} 

else if(isset($_POST['task_collection']))
 {
include "include/conxn.php";
include "../sessionfile.php";
include "../include/funcxn.php";

$datetime =  date('Y\-m\-d\ H:i:s');
$user_id = $_SESSION['id'];
$post_id = $_POST['post_id'];

if( !empty($post_id))
{
$querymain = "SELECT reply_user_id,reply,datetime FROM reply where post_id = '$post_id'";
$query2 = mysqli_query($link,$querymain);
if($querysqp = mysqli_num_rows($query2))
{
while($details2 = mysqli_fetch_assoc($query2))
		 {
                 $user_id2 = $details2['reply_user_id'];
				 $profile_comment_text = convertHashtags($details2['reply']);
				 $timedate = $details2['datetime'];
				$time = strtotime($timedate);

 $sql = "SELECT firstName,id,username FROM registration where id = $user_id2  ";
		  
		if($query_add = mysqli_query($link,$sql))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
                 $username = safe_input($details['username']);
                 $friend_id = safe_input($details['id']);
                 $firstName = safe_input($details['firstName']);
		 $query = "SELECT image_loc FROM profile_pic WHERE account_id =  $friend_id 
		";
	$query4profilepic = mysqli_query($link,$query);	
    if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
			{   
			$query1 = "update reply  set post_user_id = '1' WHERE post_id = '$post_id'";
             mysqli_query($link,$query1);
			$profile_image = $profile_pic['image_loc'];
             echo '   
    <li class="message  padding-10" >
	<img src="/img/avatars/mini/'. $profile_image.'" class="img-circle" width="20px">
	<a href="/connection-auth/'.$username.'" class="username" style=" padding-left:5px;">'.$username.'</a><p style=" padding-left:30px;">'.$profile_comment_text.'<a href="javascript:void(0);" class="text-muted">. '.humanTiming($time).' ago</a></p>
   </li>
  '; 
}
}
}
}
echo ' 
<div id="profile_holder_ul'.$post_id.'" >	</div>					
<div class="input-group wall-com ment-reply " style=" padding-bottom:10px; padding-left:-10px; ">
<input id="profile_comment_text'.$post_id.'"  type="text" name="reply" class="form-control input-xs"         placeholder="Comment here...">
<span class="input-group-btn"id="btn_'.$post_id.'">
<button type="submit"  onClick="comment_profile('.$post_id.')" class="btn  btn-primary btn-xs">Comment
</button>
</span>	
</div> 	';


}
else
{
echo '<p> No comments yet. </p> <br> 
 
<div id="profile_holder_ul'.$post_id.'" >	</div>					
<div class="input-group wall-com ment-reply " style=" padding-bottom:10px; padding-left:-10px; ">
<input id="profile_comment_text'.$post_id.'"  type="text" name="reply" class="form-control input-xs"         placeholder="Comment here...">
<span class="input-group-btn"id="btn_'.$post_id.'" >
<button type="submit"  onClick="comment_profile('.$post_id.')" class="btn  btn-primary btn-xs">Comment
</button>
</span>
</div> 	';
}
}
else
{
echo '<div > bccgg </div>';
}
}

else if(isset($_POST['task_collection_friend']))
 {
include "include/conxn.php";
include "../sessionfile.php";
include "../include/funcxn.php";

$datetime =  date('Y\-m\-d\ H:i:s');
$user_id = $_SESSION['id'];
$post_id = $_POST['post_id'];

if( !empty($post_id))
{
$querymain = "SELECT reply_user_id,reply,datetime FROM reply where post_id = '$post_id'";
$query2 = mysqli_query($link,$querymain);
if($querysqp = mysqli_num_rows($query2))
{
while($details2 = mysqli_fetch_assoc($query2))
		 {
                 $user_id2 = $details2['reply_user_id'];
				 $profile_comment_text = convertHashtags($details2['reply']);
				 $timedate = $details2['datetime'];
				$time = strtotime($timedate);

 $sql = "SELECT firstName,id,username FROM registration where id = $user_id2  ";
		  
		if($query_add = mysqli_query($link,$sql))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
                 $username = safe_input($details['username']);
                 $friend_id = safe_input($details['id']);
                 $firstName = safe_input($details['firstName']);
		 $query = "SELECT image_loc FROM profile_pic WHERE account_id =  $friend_id 
		";
	$query4profilepic = mysqli_query($link,$query);	
    if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
			{   
			//$query1 = "update reply  set post_user_id = '1' WHERE post_id = '$post_id'";
           //  mysqli_query($link,$query1);
			$profile_image = $profile_pic['image_loc'];
             echo '   
    <li class="message  padding-10" >
	<img src="/img/avatars/mini/'. $profile_image.'" class="img-circle" width="20px">
	<a href="/connection-auth/'.$username.'" class="username" style=" padding-left:5px;">'.$username.'</a><p style=" padding-left:30px;">'.$profile_comment_text.'<a href="javascript:void(0);" class="text-muted">. '.humanTiming($time).' ago</a></p>
   </li>
  '; 
}
}
}
}
echo ' 
<div id="profile_holder_ul'.$post_id.'" >	</div>					
<div class="input-group wall-com ment-reply " style=" padding-bottom:10px; padding-left:-10px; ">
<input id="profile_comment_text'.$post_id.'"  type="text" name="reply" class="form-control input-xs"         placeholder="Comment here...">
<span class="input-group-btn"id="btn_'.$post_id.'">
<button type="submit"  onClick="comment_profile('.$post_id.')" class="btn  btn-primary btn-xs">Comment
</button>
</span>
</div>';


}
else
{
echo '<p> No comments yet. </p> <br> 
 
<div id="profile_holder_ul'.$post_id.'" >	</div>					
<div class="input-group wall-com ment-reply " style=" padding-bottom:10px; padding-left:-10px; ">
<input id="profile_comment_text'.$post_id.'"  type="text" name="reply" class="form-control input-xs"         placeholder="Comment here...">
<span class="input-group-btn"id="btn_'.$post_id.'" >
<button type="submit"  onClick="comment_profile('.$post_id.')" class="btn  btn-primary btn-xs">Comment
</button>
</span>
</div>';
}
}
else
{
echo '<div > bccgg </div>';
}
}	
	?>
	