<?php
include "include/conxn.php";

if(isset($_POST['task_load_user']))
{
include "include/funcxn.php";
include "include/conxn.php";
include "include/sessionfile.php";

$user_id = $_SESSION['id'];
$friend_id = $_POST['user_id'];
$query = "SELECT firstName, username FROM registration WHERE id = '$friend_id'";	 
$query_add = mysqli_query($link,$query);
	{
	while($user_info = mysqli_fetch_array($query_add,MYSQLI_ASSOC))
	  {
	  $firstName =  $user_info['firstName'];
	  $username =  $user_info['username'];
		//to call image of user
		$query = " SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";
		$query4profilepic = mysqli_query($link,$query);	
		if(mysqli_num_rows($query4profilepic)==1)
		{
		while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
			{   $profile_image = $profile_pic['image_loc'];
				
				
         $query3 = "SELECT chat_file FROM friends WHERE account_id ='$user_id' AND friend_id='$friend_id' AND value='1' OR friend_id='$user_id' AND account_id='$friend_id' AND value='1'";
			$query4chatfile = mysqli_query($link,$query3);	
		    if($fetch_chatfile  = mysqli_fetch_array($query4chatfile,MYSQLI_ASSOC))
	     	{   
		      	$chat_file = safe_input($fetch_chatfile['chat_file']);
		      	if($chat_file != NULL)
		      	{
				echo'	
				<div class="col-xs-4 col-md-2 no-padding">
					<img src="/img/avatars/'. $profile_image.'" class="padding-10" width="112px" height="auto;"/> 
				</div>
				<div class="col-xs-8 col-md-10 padding-10">
				   <p class="font-lg"> '.ucfirst($firstName).' </p>
				   <p class="font-md"> '.ucfirst($username).' <a href="/connection_auth/'. $username.'" class="font-xs">View profile</a></p>
				   
				  <button class="btn btn-default btn-md" onClick="chatFriendClick('.$chat_file.','.$friend_id.')" rel="tooltip" data-placement="bottom" data-original-title="'.$username.'"> Chat <i class="fa fa-comment  " style=""></i>  </button>
	<button type="button" class="btn btn-default pull-right"  data-dismiss="modal">Close
					</button>
				</div>
				';	
			}
			}
			}
		}
		else
		{
			$profile_image1 = "/img/avatars/image1.jpg";
			echo'<img src="/'. $profile_image1.'" class="padding-10" width="100px;" height="auto;"/> '.$firstName.'';
		}
	  }
	}
}


if(isset($_POST['task_chat_launch']))
{
include "../include/funcxn.php";
include "include/conxn.php";
include "include/sessionfile.php";

$user_id = $_SESSION['id'];
$friend_id = $_POST['user_id'];
$query = "SELECT firstName, username FROM registration WHERE id = '$friend_id'";	 
$query_add = mysqli_query($link,$query);
	{
	while($user_info = mysqli_fetch_array($query_add,MYSQLI_ASSOC))
	  {
	  $firstName =  $user_info['firstName'];
	  $username =  $user_info['username'];
		//to call image of user
		$query = " SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";
		$query4profilepic = mysqli_query($link,$query);	
		if(mysqli_num_rows($query4profilepic)==1)
		{
		while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
			{   $profile_image = $profile_pic['image_loc'];
				echo'	
	
    <div class="title" id="title_user1'.$friend_id.'">
	 <span onClick="chat_open('.$friend_id.')"> ',status_def($friend_id),' <img  src="/img/avatars/mini/'.$profile_image.'" title="'.$username.'" height="20px" class="img">
	'.ucfirst($username).' </span>
	
	<i class="fa fa-times  pull-right" onClick="chat_times('.$friend_id.')" style=" height:5px;">
	</i> 
	<i class="fa fa-minus pull-right" onClick="chat_minus('.$friend_id.')"  style=" height:5px;">
	</i>
	</div>
    
	<div class="text_chat myscroll" id="chat_body'.$friend_id.'" style="height:200px">
    
	<div class="panel padding-5 " style="margin:2px;  background-color:green; height:auto; width:auto;">sup with you '. $username.'?</div>
	
	<div class="panel padding-5 " style="margin:2px;  background-color:red; height:auto; width:auto;">cool U get '.$friend_id.' cedis?</div>
	
	<div class="panel padding-5  " style="margin:2px;  background-color:green; height:auto; width:auto;"> chilling mehn</div>
	
	<div class="panel padding-5  " style="margin:2px;  background-color:green; height:auto; width:auto;">your own good o </div>
	
	<div class="panel padding-5 " style="margin:2px; background-color:red; height:auto; width:auto;">siaa who then who?</div>
	
	<div class="panel padding-5 " style="margin:2px;  background-color:green; height:auto; width:auto;">sup with you?</div>
	
	<div class="panel padding-5 " style="margin:2px;  background-color:red; height:auto; width:auto;">cool U?</div>
	
	<div class="panel padding-5  " style="margin:2px;  background-color:green; height:auto; width:auto;"> chilling mehn</div>
	
	<div class="panel padding-5  " style="margin:2px;  background-color:green; height:auto; width:auto;">your own good o </div>
	
	<div class="panel padding-5 " style="margin:2px; background-color:red; height:auto; width:auto;">siaa who then who?</div>
	
   </div>
    <div class="input-group chatbox" id="chat_body_input'.$friend_id.'" >
      <input type="text" style="width:135px;" class="form-control" placeholder="Type here"></input><button type="submit" class="btn	btn-default padding-10" style="height:32px; width:42px;"> <i class=" fa fa-arrow-up"></i></button>
    </div>
  
				';	
			}
		}
		else
		{
			$profile_image1 = "/img/avatars/image1.jpg";
			echo'<img src="/'. $profile_image1.'" class="padding-10" width="100px;" height="auto;"/> '.$firstName.'';
		}
	  }
	}
}
?>