<?php
session_start();
if(isset($_POST['owner_id'])){
    include "/conxn.php";
    $myId = $_SESSION['id'];
    $sel_chatnotify = "SELECT * FROM chat_notify WHERE receiver_id = '$myId' AND status='1' order by id desc LIMIT 0, 1";
    $query_sel_chatnotify = mysqli_query($link, $sel_chatnotify);
    if(mysqli_num_rows($query_sel_chatnotify)>0)
    {
        while($while_notify = mysqli_fetch_assoc($query_sel_chatnotify)){
            $current_id = $while_notify['id'];
            $friend_id = $while_notify['sender_id'];
            $text = $while_notify['message'];
            $sel_friendname = "SELECT * FROM registration WHERE id = $friend_id ";
            $query_sel_friendname = mysqli_query($link, $sel_friendname);
            while($while_friendname = mysqli_fetch_assoc($query_sel_friendname)){
                $friend_name = $while_friendname['firstName'];
            }
            $sel_chatfile = "SELECT chat_file FROM friends WHERE account_id = $myId AND friend_id = $friend_id OR account_id = $friend_id AND friend_id = $myId LIMIT 1 ";
            $query_sel_chatfile = mysqli_query($link, $sel_chatfile);
            while($while_chatfile = mysqli_fetch_assoc($query_sel_chatfile)){
                $chat_file = $while_chatfile['chat_file'];
          

		  echo  $friend_name.'+-'.$friend_id.'+-'.$text.'+-'.$chat_file;}
           // $del_notify = "DELETE FROM chat_notify WHERE id = $current_id";
          //  $query_del_notify = mysqli_query($link, $del_notify);
        }
	   //echo $friend_name.'+-'.$friend_id.'+-'.$text.'+-'.$chat_file;
	   
	}
    else{
	echo "unsuccessful";
	}
}

if(isset($_POST['owner_id_business_admin'])){
    include "/conxn.php";
   // include "../funcxn.php";
    $myId = $_SESSION['id'];
    //$owner_id_business = $_POST['owner_id_business'];
    $shop_id = $_POST['shop_id'];
	
	
    $sel_chatnotify = "SELECT * FROM chat_notify_business WHERE shop_id = '$shop_id' ORDER BY id DESC LIMIT 1";
    $query_sel_chatnotify = mysqli_query($link, $sel_chatnotify);
    if(mysqli_num_rows($query_sel_chatnotify)>0)
    {
        while($while_notify = mysqli_fetch_assoc($query_sel_chatnotify)){
     	//	$chat_file = $_POST['shop_id'].'.'.$myId;
            $current_id = $while_notify['id'];
            $friend_id = $while_notify['sender_id'];
            $text = $while_notify['message'];
            $token = $while_notify['token'];
		
            $sel_friendname = "SELECT * FROM registration WHERE id = '$friend_id' ";
            $query_sel_friendname = mysqli_query($link, $sel_friendname);
            while($while_friendname = mysqli_fetch_assoc($query_sel_friendname)){
                $friend_name = $while_friendname['username'];
            }
          
			    echo $friend_id.'+-'.$shop_id.'+-'.$token.'+-'.$friend_name;
					
        }	
	  
	}
    else{echo "unsuccessful";}
}
if(isset($_POST['owner_id_business'])){
    include "/conxn.php";
   // include "../funcxn.php";
    $myId = $_SESSION['id'];
    $owner_id_business = $_POST['owner_id_business'];
    $shop_id = $_POST['shop_id'];
	
	$query2 = "SELECT shopName FROM shop WHERE shop_id = '$shop_id'    
	";
	$query_data = mysqli_query($link,$query2);
	if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
	{
	$new_name = $query_count['shopName'];
	}

    $sel_chatnotify = "SELECT * FROM chat_notify_business WHERE shop_id = '$shop_id' AND sender_id = '$myId' ORDER BY id DESC LIMIT 1";
    $query_sel_chatnotify = mysqli_query($link, $sel_chatnotify);
    if(mysqli_num_rows($query_sel_chatnotify)>0)
    {
        while($while_notify = mysqli_fetch_assoc($query_sel_chatnotify)){
     		$chat_file = $_POST['shop_id'].'.'.$myId;
            $current_id = $while_notify['id'];
            $friend_id = $while_notify['sender_id'];
            $text = $while_notify['message'];
            $token = $while_notify['token'];
		
            $sel_friendname = "SELECT * FROM registration WHERE id = '$friend_id' ";
            $query_sel_friendname = mysqli_query($link, $sel_friendname);
            while($while_friendname = mysqli_fetch_assoc($query_sel_friendname)){
                $friend_name = $while_friendname['firstName'];
            }
          
			    echo $new_name.'+-'.$friend_id.'+-'.$shop_id.'+-'.$chat_file.'+-'.$token.'+-'.$friend_name;
					
        }	
	  
	}
    else{echo "unsuccessful";}
}

if(isset($_POST['reload_cus_list_chat_of_admin'])){
   // include "../conxn.php";
    include "/chat.php";
  
    $myId = $_SESSION['id'];
    $shop_id = $_POST['reload_cus_list_chat_of_admin'];
    //$shop_id = $_POST['shop_id'];
	
	echo customer_care_chat_relaod($shop_id);
}
?>