 <?php
 
 require_once MODELS_DIR . '/users.php';
 
 class Subscribers {
    
	
      //retursn stdclass frm databs
	 public static function getSubscribe( $user_id,$shop_id )
	 { 
	 include "include/conxn.php";
	   $query2 = " SELECT user_id FROM subscribers WHERE shop_id = $user_id && user_id= $shop_id ";

	$query4profilepic1 = mysqli_query($link,$query2);	

   

	if(mysqli_num_rows($query4profilepic1)==1)

	{  
		  $query3 = "DELETE FROM subscribers WHERE shop_id = '$user_id' && user_id = '$shop_id'";
		 $query4user_info1 = mysqli_query($link,$query3);
	/*if( $query4user_info1 )	
     { 
	
	
	}*/	
	return null;
	
		
		
	}
	
else {
	   //---------------------------------------
if($query4user_info = mysqli_query($link,$query))
				{
				while($allpalls_info = mysqli_fetch_assoc($query4user_info))
					{
					$shopName = $allpalls_info['shopName'];
					$email_biz = safe_input($allpalls_info['email']);
				
					}
				}
	   
	   
	    $datetime =  date('Y\-m\-d\ H:i:s');
		   
		  $sql = "insert into subscribers values( '' , ' $shop_id',' $user_id','$datetime' )";
	      $query = mysqli_query($link,$sql);
		 
$mail_from = "support@mykanta.com";
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
$headers .= 'From: Mykanta Support <'.$mail_from.'>'. "\r\n";
$mail_to = $email_biz;
$subject = "Subscription Update";			
$message = '<html lang="en-us">
<head>
</head>
<body >		
<h4 style="color:#2b8ba6;"> '.$_SESSION['username'].' subscribed to your business.</h4>

<p style="color:#2b8ba6; font-size:9pt;" >Copyright 2015 HIPI,D705/5 AMERICAN HOUSE, TUDU-ACCRA, GHANA.
</p>
</body>
</html>';
//sends the mail
mail($mail_to,$subject,$message,$headers);
		 
		 if( $query )
		 {
		   // $insert_id = mysql_insert_id();
			
		    $std = new stdClass();
		   // $std->subscribe_id = $insert_id;
	
		    $std->user_id = (int)$user_id;
		    $std->shop_id = (int)$shop_id;
		    $std->datetime = $datetime;
			
			return $std;
		 }
		 //-----------------------------------
	     return null;
		}
		return null;
		}
	 public static function update( $data )
	 {
	 
	 }
	 public static function delete( $comment_id )
	 {
       //delete the comment from the databas of comment	   
	   
	 }
 
 }
 ?>