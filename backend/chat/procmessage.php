<?php
session_start();
// echo include "./conxn.php";
if(isset($_POST['text'])){
    include "/conxn.php";
    include "../funcxn.php";
    $text = stripslashes(htmlspecialchars($_POST['text']));
    $fileid = $_POST['fileid'];
    $friend_id = $_POST['friend_id'];
    $me = $_SESSION['username'];
    $myId = $_SESSION['id'];
    $datetime = date('D, h:m a');
	$datetime_sql =  date('Y\-m\-d\ H:i:s');
    if($fp = fopen("logs/".$fileid.".html", 'a')){
	
	if($myId > $friend_id )
	{
	    fwrite($fp, "<li class='padding-5 panel' style='padding:10px; margin:10px; background-color: #eeeeee; border-right:4px solid #4C4F53;'><div class='message-text font-sm' style='margin:0;'>
	    	<a href='javascript:void(0);' class='username font-sm'>".$me."</a><time  class='pull-right font-xs' style=''>".$datetime."</time><p class='font-sm'>".$text."</p></div></li>");
	    fclose($fp);
	}
	else if($myId < $friend_id ){
	
	}
	
	    fwrite($fp, "<li class='padding-5 panel ".$me."' style='padding:10px; margin:10px 30px 0 0; background-color: white; border-left:4px solid #4C4F53;'><div class='message-text font-sm' style='margin:0;'>
	    	<a href='javascript:void(0);' class='username font-sm'>".$me."</a><time  class='pull-right font-xs' style=''>".$datetime."</time><p class='font-xs'>".$text."</p></div></li>");
	    fclose($fp);
      
	}
    $chatinsert = "INSERT INTO chat_notify(sender_id, receiver_id, message, datetime, status) VALUES('$myId', '$friend_id', '$text', '$datetime_sql','1') ";
        $query_chatinsert = mysqli_query($link, $chatinsert);
	
	
	//send mail to users  when chat is send
		$mail_from = "no-reply@mykanta.com";
		$headers = 'MIME-Version: 1.0'. "\r\n";
		$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
		$headers .= 'From: Mykanta Chat <'.$mail_from.'>'. "\r\n";
		$mail_to = email_frm_id($friend_id);
		
		 $subject = "Friend Message Recieved";
		  $message = '
		<html lang="en-us">
		<head>
		</head>
		<body class="" style="width:500px; ">	
		<img src="https://mykanta.com/img/site_img/email_mk.png"  style="width:100%;"/>
			<p >Hi,</p>
			<P >You recieved a message from <a href="https://mykanta.com/connection/'.$me.'">'.$me.'</a>.</P>
			
				<p> Click here to visit chat to reply : https://mykanta.com/message </p>
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
    $text;

		
  // else{echo "Connectivity Issue. Please Try Again";}
}

if(isset($_POST['update_status'])){
    include "/conxn.php";
   // include "../funcxn.php";
   // $text = stripslashes(htmlspecialchars($_POST['text']));
   // $fileid = $_POST['fileid'];
    $friend_id = $_POST['update_status'];
   // $me = $_SESSION['username'];
    $myId = $_SESSION['id'];
 //   $datetime = date('D, h:m a');
//	$datetime_sql =  date('Y\-m\-d\ H:i:s');
   /* if($fp = fopen("logs/".$fileid.".html", 'a')){
	    fwrite($fp, "<li class='padding-5 panel ".$me."' style='padding:10px; margin:10px 30px 0 0; background-color: white; border-left:4px solid #4C4F53;'><div class='message-text font-sm' style='margin:0;'>
	    	<a href='javascript:void(0);' class='username font-sm'>".$me."</a><time  class='pull-right font-xs' style=''>".$datetime."</time><p class='font-xs'>".$text."</p></div></li>");
	    fclose($fp);
      
	}*/
	$update = mysqli_query($link,"UPDATE chat_notify SET status = '0' WHERE receiver_id = '$myId' AND sender_id = '$friend_id' AND status = '1'");
    //$chatinsert = "INSERT INTO chat_notify(sender_id, receiver_id, message, datetime, status) VALUES('$myId', '$friend_id', '$text', '$datetime_sql','1') ";
       //$query_chatinsert =  $chatinsert
	   // echo $text;

  // else{echo "Connectivity Issue. Please Try Again";}
}

if(isset($_POST['text_business_admin'])){
    include "/conxn.php";
    include "../funcxn.php";
    $text = stripslashes(htmlspecialchars($_POST['text_business_admin']));
    $fileid = $_POST['fileid'];
    $friend_id = $_POST['friend_id'];
    $shop_id = $_POST['shop_id'];
    $me = $_SESSION['username'];
    $bus_owner_id = user_id_from_shop_id($shop_id);
    $myId = $_SESSION['id'];
    $datetime = date('D, h:m a');
	$datetime_sql =  date('Y\-m\-d\ H:i:s');
    if($fp = fopen("logs_bus/".$fileid.".html", 'a')){
	 fwrite($fp, "<li class='padding-5 panel' style='padding:10px; margin:10px; background-color: white; border-left:4px solid #4C4F53;'><div class='message-text font-sm' style='margin:0;'>
	    	<a href='javascript:void(0);' class='username font-sm'>".$me."</a><time  class='pull-right font-xs' style=''>".$datetime."</time><p class='font-sm'>".$text."</p></div></li>");
	    fclose($fp);
	}
	else
	{
	  copy('/log.html','../include/chat/logs_bus/'.$chatfilename.'.html');
	}
    $chatinsert0 = "INSERT INTO chat_notify_business(sender_id, shop_id, message, datetime,token) VALUES('$friend_id', '$shop_id', '$text', '$datetime_sql','1') ";
        $query_chatinsert = mysqli_query($link, $chatinsert0);
	    echo $text;

  // else{echo "Connectivity Issue. Please Try Again";}
}
if(isset($_POST['text_business'])){
    include "./conxn.php";
    include "./funcxn.php";
    $text = stripslashes(htmlspecialchars($_POST['text_business']));
    $fileid = $_POST['fileid'];
    $friend_id = $_POST['friend_id'];
    $shop_id = $_POST['shop_id'];
    $me = $_SESSION['username'];
    $bus_owner_id = user_id_from_shop_id($shop_id);
    $myId = $_SESSION['id'];
    $datetime = date('D, h:m a');
	$datetime_sql =  date('Y\-m\-d\ H:i:s');
    if($fp = fopen("logs_bus/".$fileid.".html", 'a')){
	
	    fwrite($fp, "<li class='padding-5 panel' style='padding:10px; margin:10px; background-color: #eeeeee; border-right:4px solid #4C4F53;'><div class='message-text font-sm' style='margin:0;'>
	    	<a href='javascript:void(0);' class='username font-sm'>".$me."</a><time  class='pull-right font-xs' style=''>".$datetime."</time><p class='font-sm'>".$text."</p></div></li>");
	    fclose($fp);
	}
	else
	{
	  copy('/log.html','../include/chat/logs_bus/'.$chatfilename.'.html');
	}
    $chatinsert0 = "INSERT INTO chat_notify_business(sender_id, shop_id, message, datetime, token) VALUES('$myId', '$friend_id', '$text', '$datetime_sql','2') ";
        $query_chatinsert = mysqli_query($link, $chatinsert0);
	    echo $text;

  // else{echo "Connectivity Issue. Please Try Again";}
}
?>