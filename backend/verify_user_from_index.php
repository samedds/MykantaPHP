<?php
// this process page is to check whether the searched shop is an active one or a visited one

include"include/conxn.php";
if(isset($_POST['qmail']))
{
include "include/conxn.php";
$mail =$_POST['qmail'];

 $query = "SELECT * FROM verify_user_auth WHERE email = '$mail' LIMIT 0 , 1";
		 
if($query4user_info = mysqli_query($link,$query))
	{
	while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
	 {
	 $auth_code_hash =  $allpalls_info['auth_code_hash'];
        $mail_from = "support@mykanta.com";
		$headers = 'MIME-Version: 1.0'. "\r\n";
		$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
		$headers .= 'From: Mykanta Support <support@mykanta.com>'. "\r\n";
		$mail_to = $mail;
		
		$subject = "Mykanta.com Verify your Account";
		 $message = '
		<html lang="en-us">
		<head>
		</head>
		<body >		
			<h4 style="color:#2b8ba6;">ACCOUNT VERIFICATION</h4>
			<h5 style="color:#5bc0de;" >	Hi</h5>
			<P >Kindly confirm your email address to complete your mykanta account registration.</P>
			<P>Please click the button below to confirm your email account.
				<div>
				<a href="https://www.mykanta.com/verify_user_auth.php?ref_auth='.$auth_code_hash.'" style="background-color:#5bc4e1;border:1px solid #251818;border-radius:15px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:38px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;mso-hide:all;">Verify</a>
				</div></P>
				<p style="color:#2b8ba6; font-size:9pt;">You recieved this email service announcement to update you about important information <br>about your mykasnta account, products or services. </p>
				<p style="color:#2b8ba6; font-size:9pt;" >Copyright 2015 HIPI,D705/5 AMERICAN HOUSE, TUDU-ACCRA, GHANA.
				</p>
		</body>
		</html>';

		//sends the mail
	mail($mail_to,$subject,$message,$headers);

echo 'success';
}	  
}
else{echo 'error';}
}else {echo 'error_end';}
?>