<?php
/* required headers*/
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, DELETE");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

if(isset($_POST['contact_form']))
{
include "../include/conxn.php";  
 $message = $_POST['message'];
 $subject = $_POST['subject'];
 $name = $_POST['name'];
 $email = $_POST['email'];

$emailsam      = "hipicompany@gmail.com";
$emailcps      = "stephanie.birikorang@yahoo.com";
$emailact      = "info@cpssecuritygh.com";
$mail_co = 'info@cpssecuritygh.com';
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
$headers .= 'From: Corporate Protection cpsecurity Website- Contact form <'.$mail_co.'>'. "\r\n";
$message_user ='<html lang="en-us">
<head>
</head>
<body class="padding-10">	
<h1>Contact Form</h1>
<label>Sent by</label> '.$name.'<br>
	'.$email.'</h4>
<p>	'.$message.'</p>
<table style="color:black; font-size:9pt;">
<tr>
	<td align="center">
	<p style="color:black; font-size:9pt;" >Copyright 2018 Corporate Protection cpsecurity ,WEST AFRICA, GHANA.
       </p>
	</td>
</tr>
</table>
</body>	';
		
	//mail($email,$subject,$message_user,$headers);
	mail($emailcps,$subject,$message_user,$headers);
	if(mail($emailsam,$subject,$message_user,$headers))
	{
		return true;
	}
	else{return false;}
	//	mail($mail_co,$subject,$message,$headers);
	

} 

?>