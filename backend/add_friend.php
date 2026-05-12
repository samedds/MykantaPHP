<?php
include "include/conxn.php";

if(isset($_POST['task_sug']))
{
include "include/conxn.php";
include "include/sessionfile.php";
include "../include/funcxn.php";

$user_id = $_SESSION['id'];
$user_name = $_SESSION['username'];
$friend_id = $_POST['friend_id'];
$datetime =  date('Y\-m\-d\ H:i:s');
$chatfilename = $user_id.'.'.$friend_id;
  		  

//check if user has sent u a req so instead of insert , accept rather. stops data redundancy
 $query2 ="SELECT * FROM friends WHERE friend_id = '$friend_id' and account_id = '$user_id' and value = 0 LIMIT 1  ";
 $query_w = mysqli_query($link,$query2);
 $query_q = mysqli_num_rows($query_w);

		 if($query_q==1)
	{
	   $sql = "UPDATE friends SET value ='1', chat_file = '$chatfilename' WHERE friend_id = '$friend_id' and account_id = '$user_id' LIMIT 1";
			  
		if(mysqli_query($link,$sql));
		{
			copy('../include/chat/log.html','../include/chat/logs/'.$chatfilename.'.html');
		$query = "SELECT *
				 FROM registration
				 WHERE id = '$friend_id'
				 LIMIT 1
				 ";
			if($queryuser = mysqli_query($link,$query))
			{
				 while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
				 {
			 $username =$flik_info['username'];
			 $friend_id      =$flik_info['id'];
			 $friend_email      =$flik_info['email'];
			}  
				echo '<p class="text-success">Already sent you a request.</p><p> Now a Connection, click username to enter profile <a href="/connection/'.$username.'"> '.$username.' </a></p>';
			}
		}
	}
else   if($query_q!=1)
{
//check if u have sent other user a req so instead of insert , accept rather. stops data redundancy
 $query2u ="SELECT * FROM friends WHERE friend_id = '$user_id'  and account_id = '$friend_id' and value = 0 LIMIT 1  ";
 $query_w = mysqli_query($link,$query2u);
 $query_q3 = mysqli_num_rows($query_w);

	 if($query_q3 >=1)
	{
	 echo '<button class=" btn-default"><i class="fa fa-check"></i>Already Connected</button><br><p>  <a href="/connection/'.$username.'">View '.$username.' Profile </a></p>';
	}

else  
	{
//insert into db as request to the other user.
	$query ="INSERT INTO `friends`(`id`, `account_id`, `friend_id`, `value`, `datetime`) VALUES (NULL, '$friend_id', '$user_id',0,'$datetime')";
		
	$query_add = mysqli_query($link,$query);

	if($query_add )
		{       
			echo '<span class="text-success">Connected </span>';

			
	$query = "SELECT * FROM `registration` WHERE id = '$friend_id' ";
			if($queryuser = mysqli_query($link,$query))
			{
				 while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
				 {
					 $username =$flik_info['username'];
					 $friend_id_2     =$flik_info['id'];
					 $friend_email      =$flik_info['email'];
				}  
				
			}		
			
			$query = "SELECT COUNT(id) FROM account_comment WHERE owner_id ='$user_id' AND image_loc !='NULL' ";
            $query4user_info = mysqli_query($link,$query);
            $query_count = mysqli_fetch_row($query4user_info);
            $reev_number = $query_count[0];
			
			
$mail_from = "no-reply@mykanta.com";
$mail_mykanta = "mykantaa1@gmail.com";
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
$headers .= 'From: Mykanta Info <'.$mail_from.'>'. "\r\n";
$mail_to = $friend_email;
//$mail_hipi = 'hipicompany@gmail.com';
$subject = "Following and Connection Request";			
   $message = '
<html xmlns="https://w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Connection Request</title>


</head>

<body class="" style="width:500px; border:5px solid #443b3e">	
	<img src="https://mykanta.com/img/site_img/email_mk.png"  style="width:100%;"/>
		
		<h4>Hi '.ucwords($username).',</h4>
		<p class=""><em class="text-default">'.ucwords($user_name).'</em> is now following you and can access your reevs.</p>
		<p class="">'.ucwords($user_name).' has '.$reev_number.' GIFs. To see '.ucwords($user_name).' reevs, kindly visit 
		<a href="https://mykanta.com/connection_auth/'.$user_name.'" class="">'.ucwords($user_name).' Profile page.</a>
		</p>						
						


 <center>
	<table align="center" style="color:black; font-size:9pt;">
		<tr>
			<td align="center">
				<p style="color:black; font-size:9pt;">
					<a href="https://mykanta.com/TermandConditions">Terms</a> |
					<a href="https://mykanta.com/Privacy-policy">Privacy</a> |
					<a href="https://mykanta.com/index_login.php">Login</a>
				</p>
				<p style="color:black; font-size:9pt;" >Copyright 2022 HIPI LLC,WEST AFRICA, GHANA.
			   </p>
			</td>
		</tr>
	</table>
</center>

</body>
</html>';
//sends the mail
mail($mail_to,$subject,$message,$headers);
//mail($mail_mykanta,$subject,$message,$headers);

		}
	else
		{
		echo "<div class='info'>Please Refresh the page</div>";
		}
	}
	}
}


if(isset($_POST['task']))
{
include "include/conxn.php";
include "include/sessionfile.php";
include "../include/funcxn.php";

$user_id = $_SESSION['id'];
$user_name = $_SESSION['username'];
$friend_id = $_POST['friend_id'];
$datetime =  date('Y\-m\-d\ H:i:s');
$chatfilename = $user_id.'.'.$friend_id;
  		  

//check if user has sent u a req so instead of insert , accept rather. stops data redundancy
 $query2 ="SELECT * FROM friends WHERE friend_id = '$friend_id' and account_id = '$user_id' and value = 0 LIMIT 1  ";
 $query_w = mysqli_query($link,$query2);
 $query_q = mysqli_num_rows($query_w);

		 if($query_q==1)
	{
	   $sql = "UPDATE friends SET value ='1', chat_file = '$chatfilename' WHERE friend_id = '$friend_id' and account_id = '$user_id' LIMIT 1";
			  
		if(mysqli_query($link,$sql));
		{
			copy('../include/chat/log.html','../include/chat/logs/'.$chatfilename.'.html');
		$query = "SELECT *
				 FROM registration
				 WHERE id = '$friend_id'
				 LIMIT 1
				 ";
			if($queryuser = mysqli_query($link,$query))
			{
			 while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
				 {
			 $username =$flik_info['username'];
			 $friend_id      =$flik_info['id'];
			 $friend_email      =$flik_info['email'];
			}  
				echo '<p class="text-success">Already sent you a request.</p><p> Now a Connection, click username to enter profile <a href="/connection/'.$username.'"> '.$username.' </a></p>';
			}
		}
	}
else   if($query_q!=1)
{

//check if u have sent other user a req so instead of insert , accept rather. stops data redundancy
 $query2u ="SELECT * FROM friends WHERE friend_id = '$user_id'  and account_id = '$friend_id' and value = 0 LIMIT 1  ";
 $query_w = mysqli_query($link,$query2u);
 $query_q3 = mysqli_num_rows($query_w);

	 if($query_q3 >=1)
	{
	 echo '<button class=" btn-default"><i class="fa fa-check"></i>Already Connected</button><br><p>  <a href="/connection/'.$username.'">View '.$username.' Profile </a></p>';
	}

else  
	{
//insert into db as request to the other user.
	$query ="INSERT INTO `friends`(`id`, `account_id`, `friend_id`, `value`, `datetime`) VALUES (NULL, '$friend_id', '$user_id',0,'$datetime')";
		
	$query_add = mysqli_query($link,$query);

	if($query_add )
		{       
			

			
	$query = "SELECT * FROM `registration` WHERE id = '$friend_id' ";
			if($queryuser = mysqli_query($link,$query))
			{
				 while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
				 {
					 $username =$flik_info['username'];
					 $friend_id_2     =$flik_info['id'];
					 $friend_email      =$flik_info['email'];
					 
					 
					 echo '<p class="text-success">Connected </p><p> Click <a href="/connection/'.$username.'"> '.$username.' </a> to view Profile.</p>';
				}  
				
			}		
			
			$query = "SELECT COUNT(id) FROM account_comment WHERE owner_id ='$user_id' AND image_loc !='NULL' ";
            $query4user_info = mysqli_query($link,$query);
            $query_count = mysqli_fetch_row($query4user_info);
            $reev_number = $query_count[0];
			
			
$mail_from = "no-reply@mykanta.com";
$mail_mykanta = "mykantaa1@gmail.com";
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
$headers .= 'From: Mykanta Info <'.$mail_from.'>'. "\r\n";
$mail_to = $friend_email;
//$mail_hipi = 'hipicompany@gmail.com';
$subject = "Following and Connection Request";			
   $message = '<html xmlns="https://w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Connection Request</title>


</head>

<body class="" style="width:500px;">	
	<img src="https://mykanta.com/img/site_img/email_mk.png"  style="width:100%;"/>
		
		<h4>Hi '.ucwords($username).',</h4>
		<p class=""><em class="text-default">'.ucwords($user_name).'</em> is now following you and can access your reevs.</p>
		<p class="">'.ucwords($user_name).' has '.$reev_number.' GIFs. To see '.ucwords($user_name).' reevs, kindly visit 
		<a href="https://mykanta.com/connection_auth/'.$user_name.'" class="">'.ucwords($user_name).' Profile page.</a>
		</p>						
						


 <center>
	<table align="center" style="color:black; font-size:9pt;">
		<tr>
			<td align="center">
				<p style="color:black; font-size:9pt;">
					<a href="https://mykanta.com/TermandConditions">Terms</a> |
					<a href="https://mykanta.com/Privacy-policy">Privacy</a> |
					<a href="https://mykanta.com/index_login.php">Login</a>
				</p>
				<p style="color:black; font-size:9pt;" >Copyright 2022 HIPI LLC,WEST AFRICA, GHANA.
			   </p>
			</td>
		</tr>
	</table>
</center>

</body>
</html>';
//sends the mail
mail($mail_to,$subject,$message,$headers);
mail($mail_mykanta,$subject,$message,$headers);

		}
	else
		{
		echo "<div class='info'>Please Refresh the page</div>";
		}
	}
	}
}




?>

