<?php 
//include "include/funcxn.php";
include "conxn.php";
$thisUser = $_SESSION['id'];
$array1[] = array(1,1,1,1,1,1,1,1,1,1);
$array2[] = array(1,1,1,1,1,1,1,1,1,1);
$array3[] = array(1,1,1,1,1,1,1,1,1,1);
$array4[] = array(1,1,1,1,1,1,1,1,1,1);
$array5[] = array(1,1,1,1,1,1,1,1,1,1);
$array6[] = array(1,1,1,1,1,1,1,1,1,1);
$array7[] = array(1,1,1,1,1,1,1,1,1,1);
$array8[] = array(1,1,1,1,1,1,1,1,1,1);
$array9[] = array(1,1,1,1,1,1,1,1,1,1);
 
//find last logut time
$logout = "SELECT last_datetime from status where user_id = '$thisUser' ";
$querylogout = mysqli_query($link, $logout);
while($whilelogout = mysqli_fetch_assoc($querylogout))
{
$lastOut = $whilelogout['last_datetime'];
$datetime_lastOut = strtotime($lastOut);

}
///////////////////////////////////		

/*updating the last date of a user so that user will not see previous updates as new but old
  $last_datetime =  date('Y\-m\-d\ H:i:s');		 
	$querysatus =" UPDATE status SET last_datetime='$last_datetime' WHERE user_id = '$thisUser' ";
    $user_auth_info = mysqli_query($link,$querysatus);
	*/
$max =50;	
$all_friends = array();
$all_friends_0 = array();
$sql = "SELECT account_id FROM friends WHERE friend_id='$thisUser' AND value='1' ORDER BY id";
$query = mysqli_query($link,$sql);

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
$new =  $row["account_id"];
array_push($all_friends,$new);
}
//sql for user u connected an or have connection
$sql = "SELECT friend_id FROM friends WHERE account_id='$thisUser' AND value='1' ORDER BY id ";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
$new = $row["friend_id"];
array_push($all_friends,$new );
}
//sql for users who connected to u only
$sql_0 = "SELECT friend_id FROM friends WHERE account_id='$thisUser' AND value='0' ORDER BY id ";
$query_0 = mysqli_query($link,$sql_0);
if($query_ = mysqli_num_rows($query_0) >0){
while ($row2 = mysqli_fetch_array($query_0, MYSQLI_ASSOC))
{
  $new2 = $row2["friend_id"];
array_push($all_friends_0,$new2 );
}
}
else{
array_push($all_friends_0,'400' );
}

$friendArrayCount = count($all_friends);
if($friendArrayCount > $max)
{ 
array_splice($all_friends, $max);
}
if($friendArrayCount > $max)
{
$friends_view_all_link = '<a href="/view_friends.php?user_id='.$thisUser.'">view more</a>';
} 
if($friendArrayCount > 0)
{
// for connection
	$orLogic = '';
	foreach($all_friends as $key => $user)
		{
		$orLogic .= "id='$user' OR ";
		}
	
	$orLogic = chop($orLogic, "OR ");
	$sql = "SELECT id FROM registration WHERE $orLogic";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		{
		$myFrnds[] = $row['id'];
		}
		
//for connected
$orLogicnew = '';
	foreach($all_friends_0 as $key2 => $user2)
		{
		$orLogicnew .= "id='$user2' OR ";
		}
	
	$orLogicnew = chop($orLogicnew, "OR ");
	$sql8 = "SELECT * FROM registration WHERE $orLogicnew";
	$queryr = mysqli_query($link,$sql8);
	while($row2 = mysqli_fetch_assoc($queryr))
		{
		$myFrnds_0[] = $row2['id'];
		}

//convert array to string
$range = '(' . implode(",",$myFrnds) . ')';
$range_0 = '(' . implode(",",$myFrnds_0) . ')';
//echo $range;

//select friend status
$sql9 = "SELECT id, comment, image_loc, owner_id, account_id, 'EMPTY' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, 'EMPTY' AS friend_id, commentDate 
FROM account_comment WHERE owner_id = account_id AND owner_id IN $range /*AND datetime > '$lastOut'*/ order by commentDate desc LIMIT 5";
$query = mysqli_query($link,$sql9);
if(mysqli_num_rows($query) > 0)
{
$check1 = "true";
while($row = mysqli_fetch_assoc($query))
{
$array1[] = array($row['id'], $row['comment'], $row['image_loc'], $row['owner_id'], $row['account_id'], $row['shop_id'], 
	$row['user_id'], $row['product_id'], $row['friend_id'], $row['commentDate']);
}
}
else{$check1 = "false";}

//select users that connected to a user 
$sql2 = "SELECT id, 'newconnect' AS comment, 'EMPTY' AS image_loc, post_user_id AS owner_id, reply_user_id AS account_id,reply_user_id, 'EMPTY' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, post_id AS friend_id, datetime FROM reply WHERE  post_user_id !='$thisUser' AND reply_user_id = '$thisUser' order by datetime desc LIMIT 7";  
$query2 = mysqli_query($link,$sql2);
if(mysqli_num_rows($query2) > 0)
{
$check2 = "true";
while($row2 = mysqli_fetch_assoc($query2))
{
$array2[] = array($row2['id'], $row2['comment'], $row2['image_loc'], $row2['owner_id'], $row2['account_id'], 
	$row2['shop_id'], $row2['user_id'], $row2['product_id'], $row2['friend_id'], $row2['datetime']);
}
}
else{$check2 = "false";}

//select users that connected to you 
$sql3 = "SELECT id, 'newconnecttoyou' AS comment, 'EMPTY' AS image_loc, 'EMPTY' AS owner_id, account_id, 'EMPTY' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, friend_id, datetime
FROM friends WHERE value = '0'AND account_id='$thisUser' AND friend_id IN $range_0  /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 0,  7";  
$query3 = mysqli_query($link,$sql3);
if(mysqli_num_rows($query3))
{
$check3 = "true";
while($row3 = mysqli_fetch_assoc($query3))
{
$array3[] = array($row3['id'], $row3['comment'], $row3['image_loc'], $row3['owner_id'], $row3['account_id'], 
	$row3['shop_id'], $row3['user_id'], $row3['product_id'], $row3['friend_id'], $row3['datetime']);
}
}
else{$check3 = "false";}

//select friend subscribed to shop
$sql4 = "SELECT id, 'subscribed' AS comment, 'EMPTY' AS image_loc, 'EMPTY' AS owner_id, 'EMPTY' AS account_id, shop_id, user_id, 'EMPTY' AS product_id, 'EMPTY' AS friend_id, datetime
FROM subscribers WHERE user_id IN $range /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
$query4 = mysqli_query($link,$sql4);
if(mysqli_num_rows($query4) > 0)
{
$check4 = "true";
while($row4 = mysqli_fetch_assoc($query4))
{
$array4[] = array($row4['id'], $row4['comment'], $row4['image_loc'], $row4['owner_id'], $row4['account_id'], 
	$row4['shop_id'], $row4['user_id'], $row4['product_id'], $row4['friend_id'], $row4['datetime']);
}
}
else{$check4 = "false";}

//select friend is now friends with......
$sql5 = "SELECT id, 'newfriend' AS comment, 'EMPTY' AS image_loc, 'EMPTY' AS owner_id, account_id, 'EMPTY' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, friend_id, datetime
FROM friends WHERE value = '1' AND friend_id IN $range  OR account_id IN $range  AND  value = '1' /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 7";  
$query5 = mysqli_query($link,$sql5);
if(mysqli_num_rows($query5) > 0)
{
$check5 = "true";
while($row5 = mysqli_fetch_assoc($query5))
{
$array5[] = array($row5['id'], $row5['comment'], $row5['image_loc'], $row5['owner_id'], $row5['account_id'], 
	$row5['shop_id'], $row5['user_id'], $row5['product_id'], $row5['friend_id'], $row5['datetime']);
}
}
else{$check5 = "false";}
$thisUser = $_SESSION['id'];
//to display the user that commented on your reev...
$sql6 = "SELECT id, 'newcomment' AS comment, 'EMPTY' AS image_loc, post_user_id AS owner_id, reply_user_id AS account_id,reply_user_id, 'EMPTY' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, post_id AS friend_id, datetime
FROM reply WHERE  post_user_id ='$thisUser' AND reply_user_id !='$thisUser' order by datetime desc LIMIT 7";   
$query6 = mysqli_query($link,$sql6);
if(mysqli_num_rows($query5) > 0)
{
$check6 = "true";
while($row6 = mysqli_fetch_assoc($query6))
{
$array6[] = array($row6['id'], $row6['comment'], $row6['image_loc'], $row6['owner_id'], $row6['account_id'],
	$row6['shop_id'], $row6['user_id'], $row6['product_id'], $row6['friend_id'], $row6['datetime']);
}
}
else{$check6 = "false";}



if($check1 == "false" AND $check2 == "false" AND $check3 == "false" AND $check4 == "false" AND $check5 == "false" AND $check6 == "false")
{
echo '<center style="" >
<p class="headline " style="color:black; font-size:1.5em;"> No Connection yet.</p>
 <a class="btn btn-default " onclick="tag_interest_button();"> <i class="fa fa-group"></i> Search for Connections </a>
</center>';
}

else
{
//merge the arrays
$result = array_merge($array1, $array2, $array3, $array4, $array5,$array6);

//sort the merged array according to date which is record [2] of each inner array
function compare_datetime($a, $b) 
{ 
return strcmp($a['9'], $b['9']); 
} 
// sort 
usort($result, 'compare_datetime');

//reverse the sorted array to descending order
$reversed = array_reverse($result);
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
$datetime0 = strtotime($reversed[$i][9]);
$datetime = date("M d a ", $datetime0);
$datetimearray = explode(' ', $datetime);
$datetimemonth = $datetimearray[0];
$datetimeday = $datetimearray[1];

//call other required data ; username and business name
$query = "SELECT * FROM registration where id = $user_id  LIMIT 10 ";
if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
		 $firstName = $details['firstName'];
		 $friend_id = $details['id'];
		 $username = $details['username'];
         }
  }
  
//shopnames fror businesses
$query = "SELECT shopName,category FROM `shop`  WHERE `shop_id` = '$shop_id' LIMIT 0 , 1 "; 
$query4user_info = mysqli_query($link,$query);
$num_shop = mysqli_num_rows($query4user_info);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
	$shopNames = $allpalls_info['shopName'];
	$category = $allpalls_info['category'];
	$category_ico = cat_name_ico_stable($category);
	//$shopNameformat  = formatUrl($shopNames); 
	if(!empty($shop_id))
	{
	$shopname = '<a href="/business-link/'.$shopNames.'" style="color:grey; font-size:0.9em;" > '.$shopNames.' </a>';
	}
}

//now there data to show
if($comment == 'newconnect')
{
$friend_id_new = get_last_reever($friend_id) ;
$owner_id_new = get_last_reev_owner($friend_id) ;

  if($thisUser  !=  $friend_id_new AND  $friend_id_new != "NULL" AND  $friend_id_new != '0'AND  $friend_id_new != '1'){ 
  if( $datetime_lastOut - $datetime0 < 6000){
   
  echo '<li class="  row no-padding" style="margin:7px; background-color:rgb(221, 221, 221); border-radius:10px;">
				<div class="col-xs-12 col-md-12 padding-5 ">
					 <img src="',get_profile_pic_only_name($friend_id_new),'"class=" img-circle" width="25px;" height="auto;"  title="',get_status_name_only($friend_id_new),'" />
				 		<span ><strong class="text-muted" style="color:grey; font-size:0.9em;">',get_status_name($friend_id_new),' </strong>	<span class="text-muted" style="font-size:0.9em; bottom:0px;"> commented on <strong class="text-muted" > <a href="/reev_view/',get_status_name_only($owner_id_new),'/'.$friend_id.'"style="color:grey; font-size:0.9em;">',get_title_post($friend_id),'</a></strong>  you commented 	</span>	 </span>
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
			 	</div>
			 </li> 
			';
  }else{  
   echo '<li class="  row no-padding" style="margin:7px;">
				<div class="col-xs-12 col-md-12 padding-5 ">
					 <img src="',get_profile_pic_only_name($friend_id_new),'"class=" img-circle" width="25px;" height="auto;"  title="',get_status_name_only($friend_id_new),'" />
				 	<span ><strong class="text-muted" style="color:grey; font-size:0.9em;">',get_status_name($friend_id_new),' </strong>	<span class="text-muted" style="font-size:0.9em; bottom:0px;"> commented on <strong class="text-muted" > <a href="/reev_view/',get_status_name_only($owner_id_new),'/'.$friend_id.'"style="color:grey; font-size:0.9em;">',get_title_post($friend_id),'</a></strong> you commented 	</span> </span>
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
			 	</div>
			 </li><hr class="no-margin">
			';
  }
  }


}


  if($comment == 'newconnecttoyou')
{
	  if( $datetime_lastOut - $datetime0 < 6000){ 
	  echo '<li class="  row  no-padding" style="margin:7px;  background-color:rgb(221, 221, 221); border-radius:10px;">
				<div class="col-xs-12 col-md-12 padding-5 ">
					 <img src="',get_profile_pic_only_name($friend_id),'"class=" img-circle" width="25px;" height="auto;"  title="',get_status_name_only($friend_id),'" />
				 		<span><strong class="text-muted" style="color:grey; font-size:0.9em;">',get_status_name($friend_id),' </strong>	<span class="text-muted" style="font-size:0.9em; bottom:0px;"> connected to you.</span>	</span>
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
			 	</div>
			 </li> 
			';
			}
			else{ 
		  echo '<li class="  row padding-5" style="margin:7px;">
				<div class="col-xs-12 col-md-12 no-padding ">
						 <img src="',get_profile_pic_only_name($friend_id),'"class=" img-circle" width="25px;" height="auto;"  title="',get_status_name_only($friend_id),'" />
				 	<span><strong class="text-muted" style="color:grey; font-size:0.9em;">',get_status_name($friend_id),' </strong>	<span class="text-muted" style="font-size:0.9em; bottom:0px;"> connected to 	 you.</span></span>	
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
			 	</div>
			 </li><hr class="no-margin">
			';

		}
}

else if($comment == 'subscribed')
{
if( $datetime_lastOut - $datetime0 < 6000){
 
echo '<li class="  row no-padding" style="margin:7px;  background-color:rgb(221, 221, 221); border-radius:10px;">
				<div class="col-xs-12 col-md-12 padding-5 ">
						 <img src="',get_profile_pic_only_name($friend_id),'"class=" img-circle" width="25px;" height="auto;"  title="',get_status_name_only($friend_id),'" />
				 	<span><strong class="text-muted" ><a href="/connection/'.$username.'"style="color:grey; font-size:0.9em;"  class="text-primary">'.$username.'</a></strong><span class="text-muted" style="font-size:0.9em; bottom:0px;"> subscribed to </span><strong> '.$category_ico.' '.$shopname.'</strong></span>
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
			 	</div>
			 </li> 
			';
}
else{
   echo '<li class="  row no-padding" style="margin:7px;">
				<div class="col-xs-12 col-md-12 padding-5 ">
						 <img src="',get_profile_pic_only_name($friend_id),'"class=" img-circle" width="25px;" height="auto;"  title="',get_status_name_only($friend_id),'" />
				 	<span><strong class="text-muted" ><a href="/connection/'.$username.'"style="color:grey; font-size:0.9em;"  class="text-primary">'.$username.'</a></strong><span class="text-muted" style="font-size:0.9em; bottom:0px;"> subscribed to </span><strong> '.$category_ico.' '.$shopname.'</strong></span>
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
			 	</div>
			 </li><hr class="no-margin">
			';
}
}


else if($comment == 'newfriend')
{
	  if( $datetime_lastOut - $datetime0 < 6000){ 
	  echo '<li class="  row no-padding" style="margin:7px;  background-color:rgb(221, 221, 221); border-radius:10px;">
				<div class="col-xs-12 col-md-12 padding-5">
							 <img src="',get_profile_pic_only_name($friend_id),'"class=" img-circle" width="25px;" height="auto;"  title="',get_status_name_only($friend_id),'" />
				 <span><strong class="text-muted" style="color:grey; font-size:0.9em;">',get_status_name($friend_id),' </strong>	<span class="text-muted" style="font-size:0.9em; bottom:0px;">  is now in connection with </span><strong class="text-muted" style="color:grey; font-size:0.9em;"> <span class="" style="width:30px;"> <img src="',get_profile_pic_only_name($account_id),'"class=" img-circle" width="30px;" height="auto;" title="',get_status_name_only($account_id),'" /> </span>',get_status_name($account_id),' </strong></span>
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
			 	</div>
			 </li> 
';
}else{
   echo '<li class="  row no-padding" style="margin:7px;">
				<div class="col-xs-12 col-md-12 padding-5">
							 <img src="',get_profile_pic_only_name($friend_id),'"class=" img-circle" width="25px;" height="auto;"  title="',get_status_name_only($friend_id),'" />
				 <span><strong class="text-muted" style="color:grey; font-size:0.9em;">',get_status_name($friend_id),' </strong>	<span class="text-muted" style="font-size:0.9em; bottom:0px;">  is now in connection with </span><strong class="text-muted" style="color:grey; font-size:0.9em;"> <span class="" style="width:25px;"> <img src="',get_profile_pic_only_name($account_id),'"class=" img-circle" width="25px;" height="auto;"  title="',get_status_name_only($account_id),'" /> </span>',get_status_name($account_id),' </strong></span>
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
			 	</div>
			 </li><hr class="no-margin">
';
}
}

else if($comment == 'newcomment')
{
  $owner_id_new = get_last_reev_owner($friend_id) ;

  if($owner_id_new != '0' ){
     if( $datetime_lastOut - $datetime0 < 6000){ 
	echo '<li class="row padding-5" style="margin:7px; background-color:rgb(221, 221, 221); border-radius:10px;">
				<div class="col-xs-12 col-md-12 no-padding ">
						 <img src="',get_profile_pic_only_name($account_id),'"class=" img-circle" width="25px;" height="auto;"  title="',get_status_name_only($account_id),'" />
				 
					<span><strong class="text-muted" style="color:grey; font-size:0.9em;">',get_status_name($account_id),' </strong><span class="text-muted" style="font-size:0.9em; bottom:0px;">   commented on </span> 
					 	<strong class="text-muted" > <a href="/reev/'.$friend_id.'"style="color:grey; font-size:0.9em;">',get_title_post($friend_id),'</a></strong> 
					</span> 
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
				</div>
			</li> 
			';
			}
			else{
				echo '<li class="row padding-5" style="margin:7px;">
				<div class="col-xs-12 col-md-12 no-padding ">
						 <img src="',get_profile_pic_only_name($account_id),'"class=" img-circle" width="25px;" height="auto;"  title="',get_status_name_only($account_id),'" />
				 
					<span><strong class="text-muted" style="color:grey; font-size:0.9em;">',get_status_name($account_id),' </strong><span class="text-muted" style="font-size:0.9em; bottom:0px;">   commented on </span> 
					 	<strong class="text-muted" > <a href="/reev/'.$friend_id.'"style="color:grey; font-size:0.9em;">',get_title_post($friend_id),'</a></strong> 
					</span> 
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
				</div>
			</li><hr class="no-margin">
			';
			}
			}
}
}
}
/*}
else echo '<strong class="text-primary" style="margin-left:20px;">You have NO Friends Yet</strong>'; */
}
else echo '<center style="" >
<p class="padding-10" style="color:grey;"> No Connection yet.</p>
 <a class="btn btn-default " onclick="tag_interest_button();"> <i class="fa fa-group"></i> Search </a>
</center>';

?>