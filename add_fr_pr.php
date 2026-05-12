<?php

include "include/conxn.php";

 if(isset($_GET['add_friend']))
	   {
	  
	 
	 $user_id = $_SESSION['id'];
	 $add_friend = $_GET['add_friend'];
	 
	 
	 $query = mysql_query("INSERT INTO `myshop`.`friends` (
`id` ,
`account_id` ,
`friend_id` ,
`value`
)
VALUES (
NULL, '$user_id', '$add_friend', 0
)"); 

 if ( mysql_affected_rows())
	{
	header('location:fp.php?friend_id='. $add_friend.'');
    }
	 
	 
	 /* inserting into database request  friends  
	  
	  $sql = "UPDATE `myshop`.`friends` SET `value` ='1' WHERE `friends`.`id` = $add_friend";
	  
	if(mysql_query($sql))
{
 $query1 = "SELECT account_id
                FROM `friends`
                 WHERE `id` = '$add_friend' ";
		 
$query4user1 = mysql_query($query1);
while($friend_id_sql = mysql_fetch_array($query4user1))
		         {

 $_SESSION['friend_id']= $friend_id_sql['account_id'];
$friend_id = $_SESSION['friend_id'];

header('location:profile.php');

}
}	
*/
}
	
	?>
	