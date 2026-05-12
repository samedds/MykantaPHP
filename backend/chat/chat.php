<?php
	function  get_onlinefriendnames($user_id)
	{include "include/conxn.php";  

	 $main_user_id  = $_SESSION['id'];

	$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$main_user_id' AND value='1' OR friend_id='$main_user_id' AND value='1'";		 
	$query4user_info = mysqli_query($link,$query);
	$query_count = mysqli_fetch_row($query4user_info);
	$friend_count = $query_count[0];

	if($friend_count < 1){
		echo $friendsHTML = " No friends yet";
	}
	else
	{ 
		include "include/conxn.php";  	
	     $max =300;
         $all_friends = array();
		 $sql = "SELECT account_id FROM friends WHERE friend_id='$main_user_id' AND value='1' ORDER BY id LIMIT $max";
		 $query2 = mysqli_query($link,$sql);

         while ($row = mysqli_fetch_array($query2, MYSQLI_ASSOC)) 
		 {
		 $new =  safe_input($row["account_id"]);
         array_push($all_friends,$new);
         }
		 $sql = "SELECT friend_id FROM friends WHERE account_id='$main_user_id' AND value='1' ORDER BY id LIMIT $max";
         $query = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		 {
		 $new = safe_input($row["friend_id"]);
         array_push($all_friends,$new );
         }

		 $friendArrayCount = count($all_friends);
         if($friendArrayCount > $max)
		 { 
         array_splice($all_friends, $max);
         }
		 if($friend_count > $max)
		 {
         $friends_view_all_link = '<a href="view_friends.php?user_id='.$main_user_id.'">view all</a>';
         }
       
	$orLogic = '';
	foreach($all_friends as $key => $user)
		{
		$orLogic .= "id='$user' OR ";
		}
	$orLogic = chop($orLogic, "OR ");


	$sql = "SELECT * FROM registration WHERE $orLogic ORDER BY username ASC";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
         $friend_username = safe_input($row["username"]);
         $firstname = safe_input($row["firstName"]);
         //$secname = safe_input($row["secName"]);
         $friend_id = safe_input($row["id"]);
         $username = safe_input($row["username"]);
         $friendfullname1 = $firstname;
         $friendfullname = substr($friendfullname1, 0,15)."...";
         $chatFile = $main_user_id.".".$friend_id;

         $query3 = "SELECT chat_file FROM friends WHERE account_id ='$main_user_id' AND friend_id='$friend_id' AND value='1' OR friend_id='$main_user_id' AND account_id='$friend_id' AND value='1'";
			$query4chatfile = mysqli_query($link,$query3);	
		    if($fetch_chatfile  = mysqli_fetch_array($query4chatfile,MYSQLI_ASSOC))
	     	{   
		      	$chat_file = safe_input($fetch_chatfile['chat_file']);
		      	if($chat_file != NULL)
		      	{
		      		$sel_friendstatus = "SELECT status_value FROM status WHERE user_id = $friend_id ";
		      		$query_sel_friendstatus = mysqli_query($link, $sel_friendstatus);
					while($while_sel_friendstatus = mysqli_fetch_assoc($query_sel_friendstatus))
		      		{
		      			$friendstatus = $while_sel_friendstatus['status_value'];
		      			echo'<input type="hidden" id="hdfrndname'.$friend_id.'" value="'.$friendfullname1.'" />';
		      			if($friendstatus == 1)
		      			{
							$query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";

							$query4profilepic = mysqli_query($link,$query2);	
						    if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
					     	{   
						      	$friend_pic = safe_input($profile_pic['image_loc']);
						echo '<li>
							<a href="javascript:chatFriendClick('.$chat_file.','.$friend_id.');" rel="tooltip" data-placement="bottom" data-original-title="'.$friend_username.'">
							<span class="state">',status_def_right($friend_id),'</span><img src="/img/avatars/mini/'.$friend_pic.'"class="img-rounded" width="20px; height="20px;" title="'.$friend_username.'">	'.$friend_username.'<span class="badge badge-inverse"></span>
											
										</a>
									  </li>';
							}
							else
							{
							$friend_pic = safe_input('/img/avatars/mini/userimg.png'); 
							echo '<li>
									<a href="javascript:chatFriendClick('.$chat_file.','.$friend_id.');"  rel="tooltip" data-placement="bottom" data-original-title="'.$friend_username.'">
										<img src="'.$friend_pic.'" title="'.$friend_username.'" width="20px;>
										'.$friend_username.'<span class="badge badge-inverse"></span>
										<span class="state">',status_def_right($friend_id),'></span>
									</a>
								  </li>';
							}
						}
						else
						{
							$query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";

							$query4profilepic = mysqli_query($link,$query2);	
						    if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
					     	{   
						      	$friend_pic = safe_input($profile_pic['image_loc']);
								echo '<li>
										<a href="javascript:chatFriendClick('.$chat_file.','.$friend_id.');" rel="tooltip" data-placement="bottom" data-original-title="'.$friend_username.'">
											<img src="/img/avatars/mini/'.$friend_pic.'"class="img-rounded" width="20px; height="20px;" title="'.$friend_username.'">
											'.$friendfullname.'<span class="badge badge-inverse"></span>
											<span class="state">',status_def_right($friend_id),'</span>
										</a>
									  </li>';
							}
							else
							{
							$friend_pic = safe_input('/img/avatars/mini/userimg.png'); 
							echo '<li>
									<a href="javascript:chatFriendClick('.$chat_file.','.$friend_id.');"  rel="tooltip" data-placement="bottom" data-original-title="'.$friend_username.'">
										<img src="'.$friend_pic.'"title="'.$friend_username.'" width="20px;>
										'.$friendfullname.'<span class="badge badge-inverse"></span>
										<span class="state">',status_def_right($friend_id),'</span>
									</a>
								  </li>';
							}
						}
					}
				}
			}
		}		 
	}
}

function  get_friendname($friend_id)
{
include "include/conxn.php";

$user_id = $_SESSION['id'];
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
			
				
				  <button class="btn btn-default btn-md" onClick="chatFriendClick_page('.$chat_file.','.$friend_id.')" rel="tooltip" data-placement="bottom" data-original-title="'.$username.'"> Send Message <i class="fa fa-comment  " style=""></i>  </button>
	
			
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

function  get_message_recent0($user_id)
	{include "include/conxn.php";  

	 $main_user_id  = $_SESSION['id'];

	$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$main_user_id' AND value='1' OR friend_id='$main_user_id' AND value='1' ORDER BY datetime ASC";		 
	$query4user_info = mysqli_query($link,$query);
	$query_count = mysqli_fetch_row($query4user_info);
	$friend_count = $query_count[0];

	if($friend_count < 1){
		echo $friendsHTML = " No friends yet";
	}
	else
	{ 
		include "include/conxn.php";  	
	     $max =300;
         $all_friends = array();
		 $sql = "SELECT receiver_id FROM chat_notify WHERE sender_id='$main_user_id' AND message !='' ORDER BY date LIMIT $max";
		 $query2 = mysqli_query($link,$sql);

         while ($row = mysqli_fetch_array($query2, MYSQLI_ASSOC)) 
		 {
		 $new =  safe_input($row["receiver_id"]);
         array_push($all_friends,$new);
         }
		 
		 
		 
		 
		 $sql = "SELECT sender_id FROM chat_notify WHERE receiver_id='$main_user_id' AND message !='' ORDER BY date LIMIT $max";
         $query = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		 {
		 $new = safe_input($row["sender_id"]);
         array_push($all_friends,$new );
         }

		 $friendArrayCount = count($all_friends);
         if($friendArrayCount > $max)
		 { 
         array_splice($all_friends, $max);
         }
		 if($friend_count > $max)
		 {
         $friends_view_all_link = '<a href="view_friends.php?user_id='.$main_user_id.'">view all</a>';
         }
       
	$orLogic = '';
	foreach($all_friends as $key => $user)
		{
		$orLogic .= "id='$user' OR ";
		}
	$orLogic = chop($orLogic, "OR ");


	$sql = "SELECT * FROM registration WHERE $orLogic  ";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
         $friend_username = safe_input($row["username"]);
         $firstname = safe_input($row["firstName"]);
         //$secname = safe_input($row["secName"]);
         $friend_id = safe_input($row["id"]);
         $username = safe_input($row["username"]);
         $friendfullname1 = $firstname;
         $friendfullname = substr($friendfullname1, 0,15)."...";
         $chatFile = $main_user_id.".".$friend_id;

         $query3 = "SELECT chat_file FROM friends WHERE account_id ='$main_user_id' AND friend_id='$friend_id' AND value='1' OR friend_id='$main_user_id' AND account_id='$friend_id' AND value='1'";
			$query4chatfile = mysqli_query($link,$query3);	
		    if($fetch_chatfile  = mysqli_fetch_array($query4chatfile,MYSQLI_ASSOC))
	     	{   
		      	$chat_file = safe_input($fetch_chatfile['chat_file']);
		      	if($chat_file != NULL)
		      	{
		      		
							$query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";

							$query4profilepic = mysqli_query($link,$query2);	
						    if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
					     	{   
						      	$friend_pic = safe_input($profile_pic['image_loc']);
						echo '<li>
							<a href="javascript:chatFriendClick('.$chat_file.','.$friend_id.');" rel="tooltip" data-placement="bottom" data-original-title="'.$friend_username.'">
							<span class="state">',status_def_right($friend_id),'</span><img src="/img/avatars/mini/'.$friend_pic.'"class="img-rounded" width="20px; height="20px;" title="'.$friend_username.'">	'.$friend_username.'<span class="badge badge-inverse"></span>
											
										</a>
									  </li>';
							}
							else
							{
							$friend_pic = safe_input('/img/avatars/mini/userimg.png'); 
							echo '<li>
									<a href="javascript:chatFriendClick('.$chat_file.','.$friend_id.');"  rel="tooltip" data-placement="bottom" data-original-title="'.$friend_username.'">
										<img src="'.$friend_pic.'" title="'.$friend_username.'" width="20px;>
										'.$friend_username.'<span class="badge badge-inverse"></span>
										<span class="state">',status_def_right($friend_id),'></span>
									</a>
								  </li>';
							}
						}
			}
		}		 
	}
}

function get_message_recent()
{
include "include/conxn.php";
$thisUser = $_SESSION['id'];
$array1[] = array(1,1,1,1,1,1,1,1,1,1);
$array9[] = array(1,1,1,1,1,1,1,1,1,1);

//select friend status
$sql = "SELECT DISTINCT id, 'message' AS comment, message AS image_loc, receiver_id AS owner_id, 'EMPTY' AS account_id, 'EMPTY' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, sender_id AS friend_id, datetime
FROM chat_notify WHERE message !='' AND receiver_id ='$thisUser' order by datetime desc LIMIT 7";
$query = mysqli_query($link,$sql);
if(mysqli_num_rows($query) > 0)
{
$check1 = "true";
while($row = mysqli_fetch_assoc($query))
{
$array1[] = array($row['id'] , $row['comment'], $row['image_loc'], $row['owner_id'], $row['account_id'], $row['shop_id'], 
	$row['user_id'], $row['product_id'], $row['friend_id'], $row['datetime']);
}
}
else{$check1 = "false";}

//to display the user that commented on your reev...
$sql6 = "SELECT DISTINCT id, 'newcomment' AS comment, message AS image_loc, sender_id AS owner_id, 'EMPTY' AS account_id, 'EMPTY' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, receiver_id AS friend_id, datetime
FROM chat_notify WHERE message !='' AND sender_id ='$thisUser' order by datetime desc LIMIT 7";   
$query6 = mysqli_query($link,$sql6);
if(mysqli_num_rows($query6) > 0)
{
$check6 = "true";
while($row6 = mysqli_fetch_assoc($query6))
{
$array6[] = array($row6['id'], $row6['comment'], $row6['image_loc'], $row6['owner_id'], $row6['account_id'],
	$row6['shop_id'], $row6['user_id'], $row6['product_id'], $row6['friend_id'], $row6['datetime']);
}
}
else{$check6 = "false";}

if($check1 == "false" AND $check6 == "false")
{
echo '<strong class="text-primary" style="margin-left:20px;">No new Activity from Connections</strong>';
}

else
{
//merge the arrays
$result = array_merge($array1,$array6);

//sort the merged array according to date which is record [2] of each inner array
function compare_datetime($a, $b) 
{ 
return strcmp($a['9'], $b['9']); 
} 
// sort 
usort($result, 'compare_datetime_not');

//reverse the sorted array to descending order
$reversed = array_reverse($result);
echo '<div class="no-padding" style="">
<ul class="no-padding no-margin" style="background:#f8f8f8; ">';
$arraysize = count($reversed);
for($i=0; $i < $arraysize; $i++)
{
$post_id = $reversed[$i][0];
$comment = $reversed[$i][1];
$image_loc = $reversed[$i][2];
$owner_id = $reversed[$i][3];
$account_id = $reversed[$i][4];
$shop_id = $reversed[$i][5];
$user_id = $reversed[$i][6];
$product_id = $reversed[$i][7];
$friend_id = $reversed[$i][8];
$datetime = strtotime($reversed[$i][9]);
$datetime = date("M d H:s a ", $datetime);
$datetimearray = explode(' ', $datetime);
$datetimemonth = $datetimearray[0];
$datetimeday = $datetimearray[1];

//call other required data ; username and business name
$query = "SELECT DISTINCT * FROM registration where id = $user_id  LIMIT 10 ";
if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
                 $firstName = safe_input($details['firstName']);
               
                 $friend_id = safe_input($details['id']);
                 $username = safe_input($details['username']);
  }
  }
  
$query = "SELECT shopName FROM `shop`  WHERE `shop_id` = '$shop_id' LIMIT 0 , 1 "; 

$query4user_info = mysqli_query($link,$query);
$num_shop = mysqli_num_rows($query4user_info);

while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$shopNames = safe_input($allpalls_info['shopName']);
$shopNameformat  = formatUrl($shopNames); 
if(!empty($shop_id))
{
$shopname = '<a href="/business_link/'.$shopNameformat.'"> '.$shopNames.' </a>';
}
}
//Chat file called here
         $query3 = "SELECT chat_file FROM friends WHERE account_id ='$thisUser' AND friend_id='$friend_id' AND value='1' OR friend_id='$thisUser' AND account_id='$friend_id' AND value='1'";
			$query4chatfile = mysqli_query($link,$query3);	
		    if($fetch_chatfile  = mysqli_fetch_array($query4chatfile,MYSQLI_ASSOC))
	     	{   
		      	$chat_file = safe_input($fetch_chatfile['chat_file']);
			}
					
//now there data to show
if($comment == 'message')
{
	echo '<div class="well well-light  row padding-5" onClick="chatFriendClick('.$chat_file.','.$friend_id.');" style="margin:7px;">
				<div class="col-xs-2 col-md-2 no-padding ">
						<i class="fa fa-plus"></i> 
				</div>
				<div class="col-xs-10 col-md-10 no-padding ">
					<span>',get_status_name($friend_id),' 
					<p> '.$image_loc.' </p>
					</span> 
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetime.'</small>
				</div>
			</div>
			';
}
else if($comment == 'newcomment')
{
	echo '<div class="well well-light  row padding-5" onClick="chatFriendClick('.$chat_file.','.$friend_id.');" style="margin:7px;">
				<div class="col-xs-2 col-md-2 no-padding ">
						<i class="fa fa-comment"></i> 
				</div>
				<div class="col-xs-10 col-md-10 no-padding ">
					<span>',get_status_name($friend_id),' 
					<p> '.$image_loc.' </p>
					</span> 
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetime.'</small>
				</div>
			</div>
			';
}
}
echo '</ul></div>';
}
/*}
else echo '<strong class="text-primary" style="margin-left:20px;">You have NO Friends Yet</strong>'; */
}
function get_message()
{
include "./include/conxn.php";
$thisUser = $_SESSION['id'];

	
	//select sender 
$sql = "SELECT DISTINCT sender_id FROM chat_notify WHERE message !='' AND receiver_id ='$thisUser' LIMIT 0, 20 ";
if($query = mysqli_query($link,$sql))
	{
	while($row = mysqli_fetch_assoc($query))
		{
		///$id = $row['id'];
		$sender_id = $row['sender_id'];
		get_message_from_id($sender_id);
        //select friend status
    
	}
	}
	else echo "no messages";
}

function get_message_from_id($receiver_id)
{
include "include/conxn.php";
$thisUser = $_SESSION['id'];

$sql = "SELECT `receiver_id`, `sender_id`, `message`, `datetime` FROM chat_notify WHERE message !='' AND receiver_id ='$thisUser' AND sender_id ='$receiver_id' order by id desc LIMIT 0, 1";
$query = mysqli_query($link,$sql);
if(mysqli_num_rows($query) > 0)
	{
	while($row = mysqli_fetch_assoc($query))
		{
		
		///$id = $row['id'];
		$receiver_id = $row['receiver_id'];
		$sender_id = $row['sender_id'];
		$message = $row['message'];
		$datetime = $row['datetime'];
		$datetime2 = strtotime($datetime);
		$datetime_new = date("M d", $datetime2);
		
		   $query3 = "SELECT chat_file FROM friends WHERE account_id ='$thisUser' AND friend_id='$sender_id' AND value='1' OR account_id='$sender_id' AND friend_id='$thisUser' AND value='1'";
			$query4chatfile = mysqli_query($link,$query3);	
			if(mysqli_num_rows($query4chatfile) > 0)
	{
		    if($fetch_chatfile  = mysqli_fetch_array($query4chatfile,MYSQLI_ASSOC))
	     	{   
		      	$chat_file = safe_input($fetch_chatfile['chat_file']);
			}
			}
			else 
			{
					   $query3 = "SELECT chat_file FROM friends WHERE account_id ='$thisUser' AND friend_id='$receiver_id' AND value='1' OR account_id='$receiver_id' AND friend_id='$thisUser' AND value='1'";
			$query4chatfile = mysqli_query($link,$query3);	
			if(mysqli_num_rows($query4chatfile) > 0)
	{
		    if($fetch_chatfile  = mysqli_fetch_array($query4chatfile,MYSQLI_ASSOC))
	     	{   
		      	$chat_file = safe_input($fetch_chatfile['chat_file']);
			}
			}
			}
	          
			if($sender_id == $thisUser)
			{	echo'<input type="hidden" id="hdfrndname'.$receiver_id.'" value="sa" />';
			echo '
					<div class="well well-light  row padding-5" onClick="chatFriendClick('.$chat_file.','.$receiver_id.');" style="margin:7px;">
					<div class="col-xs-2 col-md-2 padding-5 ">
						',get_profile_pic($receiver_id),'
					</div>
					<div class="col-xs-10 col-md-10 padding-5 ">
						<span>',get_status_name($receiver_id),' 
						<p> '.$message.' </p>
						 <span id="not_'.$receiver_id.'"></span>
						</span> 
						<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetime_new.'</small>
					</div>
				</div>';
			}
			else{	echo'<input type="hidden" id="hdfrndname'.$sender_id.'" value="',get_status_name_only($sender_id),'" />';
				echo '<div class="well well-light  row padding-5" onClick="chatFriendClick('.$chat_file.','.$sender_id.');" style="margin:7px;">
					<div class="col-xs-2 col-md-2  padding-5 ">
								',get_profile_pic($sender_id),'
					</div>
					<div class="col-xs-10 col-md-10  padding-5">
						<span>',get_status_name($sender_id),' 
						<p> '.$message.' </p>
						 <span id="not_'.$sender_id.'"></span>
						</span> 
						<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetime_new.'</small>
					</div>
				</div>
				';		
			}
		
		}
	}	
	
	
	
}
 
function get_message_business()
{
include "include/conxn.php";
$thisUser = $_SESSION['id'];
$shop_id = shop_id_from_user_id($thisUser);
//select friend status
$sql = "SELECT DISTINCT `sender_id`, `shop_id`, `message`, `datetime`
FROM chat_notify_business WHERE message !='' AND shop_id ='$shop_id' OR sender_id ='$shop_id' order by datetime desc LIMIT 0, 10";
$query = mysqli_query($link,$sql);
if(mysqli_num_rows($query) > 0)
	{
	while($row = mysqli_fetch_assoc($query))
		{
		
		///$id = $row['id'];
		//$shop_id = $row['shop_id'];
		$sender_id = $row['sender_id'];
		$message = $row['message'];
		$datetime = $row['datetime'];
	  
			
		if($sender_id == $thisUser)
			{ $chat_file = $shop_id.'.'.$sender_id;
			echo '
					<div class="well well-light  row padding-5" onClick="chatbusinessClick'.$chat_file.','.$Shop_id.','.$sender_id.');" style="margin:7px;">
					<div class="col-xs-2 col-md-2 padding-5 ">
						',get_profile_pic($sender_id),'
					</div>
					<div class="col-xs-10 col-md-10 padding-5 ">
						<span>',get_status_name($sender_id),' 
						<p> '.$message.' </p>
						</span> 
						<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetime.'</small>
					</div>
				</div>';
			}
			else{ 
		     	$chat_file = $shop_id.'.'.$sender_id;
				echo '<div class="well well-light  row padding-5" onClick="chatbusinessClick('.$chat_file.','.$Shop_id.','.$sender_id.');" style="margin:7px;">
					<div class="col-xs-2 col-md-2  padding-5 ">
							',get_profile_pic($sender_id),'
					</div>
					<div class="col-xs-10 col-md-10  padding-5">
						<span>',get_status_name($sender_id),' 
						<p> '.$message.' </p>
						</span> 
						<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetime.'</small>
					</div>
				</div>
				';		
			}
		
		}
	}					
}
  
function customer_care_chat($shop_id)
{
include "include/conxn.php";
$thisUser = $_SESSION['id'];
//$shop_id = shop_id_from_user_id($thisUser);
//select friend status
//$sql = "SELECT DISTINCT `sender_id` FROM chat_notify_business WHERE shop_id ='$shop_id' AND token = '2' order by id desc LIMIT 0, 1000";
echo ' <button type="" style="left:10px;" class="btn btn-default btn-xs" onClick="reload_cus_list_chat_of_admin('.$shop_id.')"> Reload </button>';
$sql = "SELECT DISTINCT `sender_id` FROM `chat_notify_business` WHERE shop_id ='$shop_id' AND `sender_id` != '.$thisUser.' ORDER BY id DESC LIMIT 10";
$query = mysqli_query($link,$sql);
if(mysqli_num_rows($query) > 0)
	{
	while($row = mysqli_fetch_assoc($query))
		{
		
		///$id = $row['id'];
		//$shop_id = $row['shop_id'];
		$sender_id = $row['sender_id'];
		//$message = $row['message'];
		//$datetime = $row['datetime'];
		//$datetime1 = strtotime($datetime);
      //  $datetime2 = date("M d a ", $datetime1);
		//$datetime_new = date('d/-m/-y/- ',$datetime);
	  
			
		if($sender_id != $thisUser)
			{ 
			$chat_file = $shop_id.'.'.$sender_id;
			echo '<div class="well well-light  row padding-5" onClick="chatbusinessClick('.$chat_file.','.$shop_id.','.$sender_id.');" style="margin:7px;">
					<div class="col-xs-12 col-md-12  padding-5">
						 <i class="fa fa-comments " style="line-height:2.5 !important;"></i> <span> ',get_status_name($sender_id),' 
						<p class="hidden"> Message </p>
						</span> 
						<small class="hidden text-muted" style="font-size:0.8em; " > date</small>
					</div>
				</div>
				';		
			}
		
		
		}
	}					
}
   
function customer_care_chat_relaod($shop_id)
{
include "./conxn.php";
 //include "../funcxn.php";
$thisUser = $_SESSION['id'];
//$shop_id = shop_id_from_user_id($thisUser);
//select friend status
//$sql = "SELECT DISTINCT `sender_id` FROM chat_notify_business WHERE shop_id ='$shop_id' AND token = '2' order by id desc LIMIT 0, 1000";
echo ' <button type="" style="left:10px;" class="btn btn-default btn-xs" onClick="reload_cus_list_chat_of_admin('.$shop_id.')"> Reload </button>';
$sql =  mysqli_query($link,"SELECT DISTINCT sender_id FROM chat_notify_business WHERE shop_id ='$shop_id' AND sender_id != '.$thisUser.' ORDER BY id DESC LIMIT 10");
//$query = mysqli_query($link,$sql);
if(mysqli_num_rows($sql) > 0)
	{
	while($row = mysqli_fetch_assoc($sql))
		{
		
		///$id = $row['id'];
		//$shop_id = $row['shop_id'];
		$sender_id = $row['sender_id'];
		//$message = $row['message'];
		//$datetime = $row['datetime'];
	$query = "SELECT * FROM registration where id = '$sender_id'";

if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{
$firstName = $details['firstName'];
$friend_id = $details['id'];
$username = $details['username'];

}
}
			
		if($sender_id != $thisUser)
			{ 
			$chat_file = $shop_id.'.'.$sender_id;
			echo '<div class="well well-light  row padding-5" onClick="chatbusinessClick('.$chat_file.','.$shop_id.','.$sender_id.');" style="margin:7px;">
					<div class="col-xs-12 col-md-12  padding-5">
						 <i class="fa fa-comments " style="line-height:2.5 !important;"></i> <span> <a href="/connection_auth/'.$username.'"  class="" style="font-style:none;">',ucwords($username),'  </a> 
						<p class="hidden"> Message </p>
						</span> 
						<small class="hidden text-muted" style="font-size:0.8em; " > date</small>
					</div>
				</div>
				';		
			}
		
		
		}
	}					
}
 

?>