<?php
if(isset($_POST['task_set']))
{
include "include/conxn.php";
include "../include/funcxn.php";
include "include/sessionfile.php";
$user_id = $_SESSION['id'];
$firstName_setings1 = safe_input($_POST['firstName_setings']);
 $firstName_setings = preg_replace('/[^A-Za-z0-9\.]/ ', ' ', $firstName_setings1);
$username_setings1 = safe_input($_POST['username_setings']);
 $username_setings = preg_replace('/[^A-Za-z0-9\_]/ ', '', $username_setings1);
$telephone_user1 = safe_input($_POST['telephone_user']);
 $telephone_user = preg_replace('/[^0-9 ]/ ', '', $telephone_user1);
 
$query = $link->prepare("SELECT id,firstName,username,telephone FROM registration WHERE id = ? LIMIT 1");
$query->bind_param('i',$user_id ); 
if(empty($firstName_setings) OR empty($user_id) OR empty($username_setings) OR empty($telephone_user))
{echo 'Please fill all';
return;}
else  if(  $query->execute( ) )
	   {
	    $query->store_result();
         $query->bind_result($id,$firstName,$username,$telephone);
	      while( $query->fetch() )
	        { 
	             $details = array( 'id'=> $id, 'firstName'=> $firstName, 'username'=> $username, 'telephone'=> $telephone );
		 $firstName = $details['firstName'];
		 $username = $details['username'];
		 $telephone = $details['telephone'];
		 $id= $details['id'];
	    //checking if empty 		
		 if(empty($firstName_setings) && empty($username_setings)&& empty($telephone_user))
		 {
		   echo '<span class="text-danger">no entry</span>';
		 }
		 else  
		 {
         //checking 1stname if empty 	
		 if(empty($firstName_setings))
		 {
		  $firstName_setings = $firstName ;
		 }
		 else
		 {
		 $firstName_setings = $firstName_setings;
		 }
		 //checking username if empty 		
		 if(empty($username_setings))
		 {
		  $username_setings = $username ;
		 }
		 else
		 {
		 $username_setings = $username_setings;
		 }
		 //checking telephone if empty 		
		 if(empty($telephone_user))
		 {
		  $telephone_user = $telephone ;
		 }
		 else
		 {
		 $telephone_user = $telephone_user;
		 }

 if(!empty($firstName_setings) || !empty($username_setings) || !empty($telephone_user) && $user_id == $id)    
  	 {
  $query1 ="UPDATE registration SET firstName = '$firstName_setings',username = '$username_setings',telephone = '$telephone_user' WHERE id ='$user_id' ";   

if($querym = mysqli_query($link,$query1))
{ 
	echo '<span class="text-success"> Successful, Reload page to see changes.</span>';
} 
	else echo 'Something went wrong, reload page and try again.';
}
}	
}
}
else
{
echo "<div class='info'>Sorry, no data was passed. Please try again or contact the site admin if this problem persist. Thanks...</div>";
}
}
else if(isset($_POST['task_pub_vis']))
{
 include "include/conxn.php";
include "../include/funcxn.php";
include "include/sessionfile.php";
$user_id = $_SESSION['id'];

$querystmt2 = $link->prepare("SELECT pub_vis FROM user_pref WHERE user_id = ? ");
  $querystmt2->bind_param('i',$user_id);
  $querystmt2->execute() ;
  $querystmt2->store_result();
  $querystmt2->bind_result( $pub_vis);
   if($querystmt2->fetch())
     {
	  $row = array('pub_vis'=> $pub_vis);
      $pub_vis = $row['pub_vis'];  
      if( $pub_vis >= 1) {$one =  0;} else { $one = 1;}
	  
	  $datetime =  date('Y\-m\-d\ H:i:s');		 
	  $querysatus4 =  "UPDATE user_pref SET pub_vis = ?, datetime = ? WHERE user_id = ? LIMIT 1";
	$querysatus = $link->prepare( $querysatus4);
		$querysatus->bind_param('isi', $one, $datetime, $user_id );
		if( $querysatus->execute())
			{  
			  echo 'updated';
			}
     }
     else
	 {
		$user_id = $_SESSION['id']; $one =  1;  $zero =  0;
         $datetime =  date('Y\-m\-d\ H:i:s');		
        $query_regq = "INSERT INTO user_pref(user_id, pub_vis, con_req, sn_mails, datetime) VALUES (  ?, ?, ?, ?, ?)";
		$query_reg = $link->prepare( $query_regq);
        $query_reg->bind_param('iiiis',$user_id,$one,$zero,$zero,$datetime);
	     if( $query_reg->execute())
	        {
	    	echo 'inserted';
	    	}
	    	else echo "naaaaaaaaaa";
	    	}
}

else if(isset($_POST['task_con_req']))
{
    include "include/conxn.php";
include "../include/funcxn.php";
include "include/sessionfile.php";
$user_id = $_SESSION['id'];

$querystmt2 = $link->prepare("SELECT con_req FROM user_pref WHERE user_id = ? ");
  $querystmt2->bind_param('i',$user_id);
  $querystmt2->execute() ;
  $querystmt2->store_result();
  $querystmt2->bind_result( $con_req);
   if($querystmt2->fetch())
     {
	  $row = array('con_req'=> $con_req);
      $con_req = $row['con_req'];  
      if( $con_req >= 1) {$one =  0;} else { $one = 1;}
	  
				$datetime =  date('Y\-m\-d\ H:i:s');		 
				 $querysatus4 =  "UPDATE user_pref SET con_req = ?, datetime = ? WHERE user_id = ? LIMIT 1";
			 $querysatus = $link->prepare( $querysatus4);

			   $querysatus->bind_param('isi', $one, $datetime, $user_id );
				 if( $querysatus->execute())
				   {  
					echo 'updated';
				}
		 }
     else
		{ $user_id = $_SESSION['id']; $one =  1;  $zero =  0;
         $datetime =  date('Y\-m\-d\ H:i:s');		
        $query_regq = "INSERT INTO user_pref(user_id, pub_vis, con_req, sn_mails, datetime) VALUES (  ?, ?, ?, ?, ?)";
		$query_reg = $link->prepare( $query_regq);
     $query_reg->bind_param('iiiis',$user_id,$zero,$one,$zero,$datetime);
	 if( $query_reg->execute())
	    {
		echo 'inserted';
		}
		else echo "naaaaaaaaaa";
		}
}
else if(isset($_POST['task_sn_mails']))
{
       include "include/conxn.php";
include "../include/funcxn.php";
include "include/sessionfile.php";
$user_id = $_SESSION['id'];

$querystmt2 = $link->prepare("SELECT sn_mails FROM user_pref WHERE user_id = ? ");
  $querystmt2->bind_param('i',$user_id);
  $querystmt2->execute() ;
  $querystmt2->store_result();
  $querystmt2->bind_result( $sn_mails);
   if($querystmt2->fetch())
     {
	  $row = array('sn_mails'=> $sn_mails);
      $sn_mails = $row['sn_mails'];  
      if( $sn_mails >= 1) {$one =  0;} else { $one = 1;}	
				$datetime =  date('Y\-m\-d\ H:i:s');		 
				 $querysatus4 =  "UPDATE user_pref SET sn_mails = ?, datetime = ? WHERE user_id = ? LIMIT 1";
			 $querysatus = $link->prepare( $querysatus4);

			   $querysatus->bind_param('isi', $one, $datetime, $user_id );
				 if( $querysatus->execute())
				   {  
					echo 'updated';
				}
		 }
     else
		{ $user_id = $_SESSION['id']; $one =  1;  $zero =  0;
         $datetime =  date('Y\-m\-d\ H:i:s');		
        $query_regq = "INSERT INTO user_pref(user_id, pub_vis, con_req, sn_mails, datetime) VALUES (  ?, ?, ?, ?, ?)";
		$query_reg = $link->prepare( $query_regq);
     $query_reg->bind_param('iiiis',$user_id,$zero,$zero,$one,$datetime);
	 if( $query_reg->execute())
	    {
		echo 'inserted';
		}
		else echo "naaaaaaaaaa";
		}
}

?>

