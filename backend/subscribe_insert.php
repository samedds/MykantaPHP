<?php
 include "include/conxn.php";
 include "include/sessionfile.php";
    if(  isset($_POST['shop_id']))
	{
	   $user_id = ($_SESSION['id']);
	   $shop_id = ($_POST['shop_id']);
	   $query2 = " SELECT user_id FROM subscribers WHERE shop_id = '$shop_id' && user_id= '$user_id' ";
       $query4profilepic1 = mysqli_query($link,$query2);	

	   if(mysqli_num_rows($query4profilepic1)==1)

		{  
		  $query3 = "DELETE FROM subscribers WHERE shop_id = '$shop_id' && user_id = '$user_id'";
		  $query4user_info1 = mysqli_query($link,$query3);
		   return;
		}
		else {
		if(mysqli_num_rows($query4profilepic1)<1)
			{
			$datetime =  date('Y\-m\-d\ H:i:s');
			$sql = "INSERT INTO subscribers (id, user_id, shop_id, datetime) VALUES (NULL,' $user_id',' $shop_id','$datetime' )";
			$query = mysqli_query($link,$sql);
				 
			 if( $query )
			 {    $querylast = " SELECT shopName,email FROM shop WHERE shop_id = '$shop_id' LIMIT 1";
			     if($queryquerylast = mysqli_query($link,$querylast))
			    	{
			    	while($allquerylast = mysqli_fetch_assoc($queryquerylast))
			    		{
			    		$shopName = $allquerylast['shopName'];
			    		$email_biz = $allquerylast['email'];
			      	  
					 
				 $mail_from = "business@mykanta.com";
				 $headers = 'MIME-Version: 1.0'. "\r\n";
				 $headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
				 $headers .= 'From: Mykanta Support <'.$mail_from.'>'. "\r\n";
				 $mail_to = $email_biz;
				 $subject = "Subscription NOtice";			
				 $message = '<html lang="en-us">
				 <head>
				 </head>
				 <body >	
				<p><img src="http://www.mykanta.com/img/site_img/email_mk.png" /></p>	
				 <h4 style="color:#2b8ba6;"> '.$_SESSION['username'].' subscribed to your business.</h4>
				 
				<table>
<tr>
	<td align="center">
	
		<p>
			<a href="http://www.mykanta.com/TermandConditions">Terms</a> |
			<a href="http://www.mykanta.com/TermandConditions">Privacy</a> |
			<a href="http://www.mykanta.com/index_login.php">Login</a>
		</p>
		<p style="color:#2b8ba6; font-size:9pt;" >Copyright 2016 HIPI LLC.	</td>
</tr>
</table>
				 </html>';
		   //sends the mail
		   mail($mail_to,$subject,$message,$headers);
			          }
				   }
			   }
		   }
	   }
	}
?>