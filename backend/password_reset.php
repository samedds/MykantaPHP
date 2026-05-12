<?php
include "include/conxn.php";
	if(isset($_POST['task']))
	{
	include "include/conxn.php";
	include "../include/funcxn.php";

	$email_reset = safe_input($_POST['email']);
	$email = trim(preg_replace('/[\r\n]+/', '', $email_reset));

	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
 {
 echo  $emailErr = "Invalid email format";
 }
  else 
  {
	$query = "SELECT email FROM registration where email = '$email' ";
	$query_add = mysqli_query($link,$query);
     if($query1 = mysqli_num_rows($query_add)==1)
	{
	$flag ="0";

$auth_email = $email.'authentication';
$sec_email = hash("sha256",$auth_email);
	
$query_flag = "INSERT INTO pass_reset_flag (id ,email,value,auth_code_hash)VALUES (NULL, '$email','$flag','$sec_email' )";
    if($query_done  = mysqli_query($link,$query_flag))
{

$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
$headers .= 'From: mykanta.com<support@mykanta.com>'. "\r\n";
$mail_to = $email;
$mail_from = "support@mykanta.com";
$subject = "Mykanta.com Password Reset";

 
 $message = '
<html lang="en-us">
<head>
</head>
<body >		
<h3 >Password Reset</h3>
<p><img src="http://www.mykanta.com/img/site_img/email_mk.png" /></p>

<P>you have requested for a password reset.
<div>
<a href="www.mykanta.com/password_auth.php?ref_auth='.$sec_email.'" style="background-color:#5bc4e1;border:1px solid #251818;border-radius:15px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:38px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;mso-hide:all;">change password</a>
</div></P>
<p> Copy the link below and paste it in the address bar if the button does not work :</p><p> http://www.mykanta.com/password_auth.php?ref_auth='.$sec_email.' 

</p>
<table>
<tr>
<td align="center">

<p>
<a href="http://www.mykanta.com/TermandConditions">Terms</a> |
<a href="http://www.mykanta.com/TermandConditions">Privacy</a> |
<a href="http://www.mykanta.com/index_login.php">Login</a>
</p>
<p style="color:black; font-size:9pt;" >Copyright 2016 HIPI LLC,WEST AFRICA, GHANA.
</p>
</td>
</tr>
</table>
</body>
</html>';
 $message_to_mykanta = '"<html lang="en-us">
<head>		
</head>
<body class="padding-10">		
	you have requested for a password reset.
 <a href="/www.mykanta.com/password_auth.php?ref_auth='.$sec_email.'">Click here to change password </a>
 </body>
 </html>"';

 echo '<p class="text-success"> An Email has been sent to '.$email.'</p>';

//sends the mail
mail($mail_to,$subject,$message,$headers);
//mail($mail_from,$subject,$message_to_mykanta,$headers);

}
	}	
	  else 	
		 { 
		  echo "Email not used, you can use this email to create an account";
		 }
		 }
}
	else
	{
		echo "<div class='info'>Sorry, no data was passed. Please try again or contact the site admin if this problem persist. Thank you</div>";
	}
	
?>