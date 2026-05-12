<?php 
 if(isset($_POST['badge_notifier']))
 {
 include "sessionfile.php";
include "conxn.php";
$thisUser = $_SESSION['id'];
$array1[] = array(1,1,1,1,1,1,1,1,1,1);
$array2[] = array(1,1,1,1,1,1,1,1,1,1);
$array3[] = array(1,1,1,1,1,1,1,1,1,1);
$array4[] = array(1,1,1,1,1,1,1,1,1,1);
$array5[] = array(1,1,1,1,1,1,1,1,1,1);

//find last logut time
$logout = "SELECT last_datetime from status where user_id = '$thisUser' ";
$querylogout = mysqli_query($link, $logout);
while($whilelogout = mysqli_fetch_assoc($querylogout))
{
$lastOut = $whilelogout['last_datetime'];
}

$max =105;	
$all_friends = array();
$sql = "SELECT account_id FROM friends WHERE friend_id='$thisUser' AND value='1'";
$query = mysqli_query($link,$sql);

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
$new =  $row["account_id"];
array_push($all_friends,$new);
}
$sql = "SELECT friend_id FROM friends WHERE account_id='$thisUser' AND value='1'";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
$new = $row["friend_id"];
array_push($all_friends,$new );
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
$orLogic = '';
foreach($all_friends as $key => $user){
$orLogic .= "id='$user' OR ";
}
$orLogic = chop($orLogic, "OR ");
$sql = "SELECT id FROM registration WHERE $orLogic";
$query = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
{
$myFrnds[] = $row['id'];
}
//convert array to string
$range = '(' . implode(",",$myFrnds) . ')';

//select friend subscribed to shop
$sql4 = "SELECT count(id) FROM subscribers WHERE user_id IN $range AND datetime > '$lastOut'";  
$query4 = mysqli_query($link,$sql4);
$query_count = mysqli_fetch_row($query4);
  $shop_count = $query_count[0].' -';

//friend count at friend col......
$sql5 = "SELECT count(id)
FROM friends WHERE friend_id IN $range AND account_id NOT IN $range AND value = '1' AND datetime > '$lastOut'";  
$query4user_info = mysqli_query($link,$sql5);
$query_count1 = mysqli_fetch_row($query4user_info);
  $friend_count = $query_count1[0].' -';

//friend count at user col......
$sql51 = "SELECT count(id)
FROM friends WHERE friend_id IN $range AND  value = '0' AND datetime > '$lastOut'";  
$query4user_info1 = mysqli_query($link,$sql51);
$query_count11 = mysqli_fetch_row($query4user_info1);
  $friend_count1 = $query_count11[0].'- '; 

//friend count at both cols......
$sql0= "SELECT count(id)
FROM friends WHERE account_id IN $range  AND  friend_id IN $range AND  value = '1' AND datetime > '$lastOut'";  
$query4user_info0 = mysqli_query($link,$sql0);
$query_count0 = mysqli_fetch_row($query4user_info0);
  $friend_count0 = $query_count0[0].'- '; 
  
  
//friend count comments at you......
$sql1= "SELECT count(id) FROM reply WHERE post_user_id = '$thisUser'  AND datetime > '$lastOut'";  
$query4user_info6 = mysqli_query($link,$sql1);
$query_count6 = mysqli_fetch_row($query4user_info6);
  $friend_count6 = $query_count6[0].'- '; 

$new_result = $shop_count + $friend_count + $friend_count0 +  $friend_count1 +  $friend_count6 ;
echo $new_result;
}
}
?>