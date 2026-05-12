<?php
include "include/conxn.php";
if(isset($_GET['username']))
{ include "include/conxn.php";

 $username1 = safe_input($_GET['username']);
$username = strip_text($username1);
$friend_id = friend_id_from_name($username);
$account_id = safe_input($_SESSION['id']);

   $query1 = "SELECT * FROM `friends` WHERE friend_id = $account_id and account_id = $friend_id and value = 0 LIMIT 1 ";  
   $query_r = mysqli_query($link,$query1); 
   $query_n = mysqli_num_rows($query_r); 
   
if($query_n==1)
	{
	    echo '<input type="submit" value="Connected"class="btn  btn-success btn-sm"></input>';
	
	}
	
	else
{
   $query2 ="SELECT * FROM `friends` WHERE friend_id = $friend_id and account_id = $account_id and value = 0 LIMIT 1  ";
		 $query_w = mysqli_query($link,$query2);
	     $query_q = mysqli_num_rows($query_w);
		 
		 
	
	if($query_q==1)
	{
	    echo '<a href="/ajax/acceptprocess_link.php?activate_friend='.$friend_id.'" style="color:green;"><i class="fa fa-check"></i> Accept Connection?</a>';
	
	}
else
{
 echo '<span id="ad_frin" onClick="add_friend('. $friend_id.')" value="Connect"class="text-pri mary" style="color:#5bc0de; cursor:pointer;">Connect</span>';
/*
//1....-------------you sent the request but friend has not accepted 
    $friend_id = safe_input($_GET['friend_id']);
   $account_id = safe_input($_SESSION['id']);

  $query = "SELECT * FROM `friends` WHERE account_id = $account_id and friend_id = $friend_id and value = 0 LIMIT 1  ";
	$query_r = mysqli_query($link,$query);
	$query_n = mysqli_num_rows($query_r);
	if($query_n>=1)
	{
  $querya = "SELECT *
         FROM `registration`
         WHERE id = $friend_id
         LIMIT 1
         ";
		 
	$query_run = mysqli_query($link,$querya);
	
	 while($query_num2 = mysqli_fetch_array($query_run,MYSQLI_ASSOC))
	{
 echo '<button class="btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-check"></i>Request Sent</button>';
	}
    }
	else
	{
	//2....-------------------friend sent the request but you have not accepted 
    
   $friend_id = safe_input($_GET['friend_id']);
   $account_id = safe_input($_SESSION['id']);
   
  $query = "SELECT *
         FROM `friends`
         WHERE friend_id = $account_id and account_id = $friend_id and value = 0
         LIMIT 1
         ";
	if($query_r= mysqli_query($link,$query))
	{
	 while($query_num2 = mysqli_fetch_array($query_r,MYSQLI_ASSOC))
	{
	$friends_able_id  =safe_input($query_num2['id']);
	   $friend_id = safe_input($_GET['friend_id']);
   

  $query2 = "SELECT *
         FROM `registration`
         WHERE id = $friend_id
         LIMIT 1
         ";
	$query_run2 = mysqli_query($link,$query2);
	
	 while($query_num2 = mysqli_fetch_array($query_run2,MYSQLI_ASSOC))
	{ 
 echo'<a href="acceptprocess.php?activate_friend='.$friends_able_id.'" class="btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-check"></i> Accept Friend</a>';
   }
   
 }
 }
 } */
}

}	 
}	 
?>
