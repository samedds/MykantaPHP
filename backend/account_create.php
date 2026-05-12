<?php
include "include/conxn.php";
if(isset($_POST['task']))
{
include "include/conxn.php";
//include "include/sessionfile.php";
@session_start();
include "../include/funcxn.php";
$username_raw = safe_input($_POST['username']);
 $username = preg_replace('/[^A-Za-z0-9\_]/ ', '', $username_raw);
$u_1 = strlen($username_raw);
$u_2 = strlen($username);

$email_raw = safe_input($_POST['email']);
$email = preg_replace('/[^A-Za-z0-9\@\.\_]/ ', '', $email_raw);
 $e_1 = strlen($email_raw);
 $e_2 = strlen($email);

$password_safe = $_POST['password'];
$password = hash("sha256",$password_safe);

$firstname_raw = safe_input($_POST['firstname']);
$firstname = preg_replace('/[^A-Za-z\.\ ]/ ', '', $firstname_raw);
$f_1 = strlen($firstname_raw);
$f_2 = strlen($firstname);
$datetime = safe_input($_POST['datetime']);
 // for birthday validation
 $dob = $_POST['dob'];
 $datetime1 =  date('j F Y ');
 $datetime2 =  $_POST['dob'];
 $telephone =  safe_input($_POST['telephone']);
 $newdate1 = strtotime($datetime1);
 $newdate2 = strtotime($datetime2);
 $dob1 =  date('Y ',$newdate1 );
 $dob2=  date('Y ',$newdate2 );
 $result = $dob1 - $dob2.' years';  
	
if ($f_1 != $f_2) 
{
 echo $nameErr = "Only letters allowed for Full Name, no symbols e.g. %, &. ";

}
else if($result <= 12 )
{
echo 'Sorry you are below 13 years.';
}
else if($u_2 >= $u_1) 
{
	$query = $link->prepare("SELECT username FROM registration where username = ? ");
	 $query->bind_param('s', $username);
	 $query->execute();
	 $query->store_result();
   $query->bind_result( $username);
 
   if( $query->fetch()){
				  echo "Username already used.";
				}	
				else 	
				
					 if (!filter_var($email_raw, FILTER_VALIDATE_EMAIL) OR  $e_2 != $e_1)
					 {
					 echo  $emailErr = "Invalid email format";
					 }
						else 
						
							if($query_mail = $link->prepare("SELECT email FROM registration where email = ? "))
							{
							//$query_mail->bind_param('s', $email);
                             $query_mail->bind_param('s', $email);
                             $query_mail->execute();
                             $query_mail->store_result();
                             $query_mail->bind_result( $email);
                             if( $query_mail->fetch()){
							  echo "Email already used."; 
							}	
							else 	
							{ 
						   
							
							$country =  get_client_ip() ;
							$city = NULL;
							$countryCode = NULL;
							$id = NULL;
							// $ip = '197.251.240.113';
                             $ip = $_SERVER['REMOTE_ADDR'];
                             $details = json_decode(file_get_contents("https://ipinfo.io/"));
                             //echo $details->country;
							$query_ = "INSERT INTO registration (firstName,dob,email,telephone,username,password,country,city,countryCode,id,datetime)VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
							 if( $query_reg = $link->prepare($query_))
								{ 
								$query_reg->bind_param("sssssssssis", $firstname,$dob,$email_raw,$telephone,$username_raw,$password,$country,$city,$countryCode,$id,$datetime);
                                 if($query_reg->execute())
							      {
								include "include/conxn.php";
								  if($query_mail = $link->prepare("SELECT id FROM registration where email = ? "))
							        {
									
							        //$query_mail->bind_param('s', $email);
                                     $query_mail->bind_param('s', $email_raw);
                                     $query_mail->execute();
                                     $query_mail->store_result();
                                     $query_mail->bind_result( $idx);
                                     if( $query_mail->fetch()){
									        $row = array( 'id'=> $idx );
								          $account_id =  $row['id'];
									     	$id = NULL;	
									        $image_loc = "img/avatars/image1.jpg";	
										    $query12 = "INSERT INTO profile_pic (profile_pic_id ,account_id ,image_loc )VALUES (?, ?, ?)";
											 $query_reg = $link->prepare($query12);
											$query_reg->bind_param("iss",$id, $account_id, $image_loc);
											if($query_reg->execute())
											{
											$value ="0";
											$auth_email = $email_raw.'authentication';
											$sec_email = hash("sha256",$auth_email);
												
											$query_flag="INSERT INTO verify_user_auth (id ,email,value,auth_code_hash)VALUES (?,?,?,?)";
											 $query_reg = $link->prepare($query_flag);
											$query_reg->bind_param("isss", $id, $email_raw,$value,$sec_email);
												if($query_reg->execute())
												{
												// Always set content-type when sending HTML email
												$username_raw0 = safe_input($_POST['username']);
                                               // $username = preg_replace('/[^A-Za-z0-9\@\.\_]/ ', '', $username_raw);
                                                
                                                $email_raw0 = safe_input($_POST['email']);
                                                //$email = preg_replace('/[^A-Za-z0-9\@\.\_]/ ', '', $email_raw);
                                                
                                                $password_safe = $_POST['password'];
                                                $password = hash("sha256",$password_safe);
												
												//to login stragiht from account creation
											            if ( preg_replace('/[^A-Za-z0-9\@\.\_]/ ', '', $email_raw0) && !empty($password_safe))
                                                          {
                                                         // include "include/conxn.php";
                                                          
                                                          $email_safe = preg_replace('/[^A-Za-z0-9\@\.\_]/ ', '', $email_raw0);
                                                          $stmt = $link->prepare("SELECT id,email,username FROM registration WHERE email = ? and password = ?  LIMIT 1");
                                                          $stmt2 = $link->prepare("SELECT id,email,username FROM registration WHERE username = ? and password = ?  LIMIT 1");
                                                          
                                                             $stmt->bind_param('ss', $email_safe,$password);
                                                             $stmt->execute() ;
                                                             $stmt->store_result();
                                                             $stmt->bind_result( $id,$email_new,$username);
                                                             $stmt2->bind_param('ss', $email_safe,$password);
                                                             $stmt2->execute() ;
                                                             $stmt2->store_result();
                                                             $stmt2->bind_result( $id,$email_new,$username);
                                                             $row = array(); 
                                                          
                                                          if( $stmt->fetch() OR $stmt2->fetch())
                                                          	{ 
                                                          	   $row = array( 'id'=> $id, 'email'=> $email_new, 'username'=> $username );
                                                                 $_email_text = $row['email'];  
                                                                 $zero = 0;  
                                                            $_SESSION['email'] = $row['email'];         
                                                          	   $_SESSION['id'] = $row['id'];
                                                          	   $user_id = $row['id'];
                                                          	   $_SESSION['username']=  $row['username']; 
                                                        
                                                          }
                                                          else
                                                          {
                                                         
                                                        // echo '<a href="/User">Logout2</a>'; 
                                                        
                                                          }
                                                          }
														//  else{ echo '<a href="/User">Logout3</a>'; 
														}
											
												//$mail_hipi = "hipicompany@gmail.com";
												$mail_mykanta = "mykantaa1@gmail.com";
												$mail_from = "no-reply@mykanta.com";
												$headers = 'MIME-Version: 1.0'. "\r\n";
												$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
												$headers .= 'From: Mykanta Support <'.$mail_from.'>'. "\r\n";
												$mail_to = $email_raw0;
												
												$subject = "Mykanta.com Welcomes you!";
											 	  $message = '
												<html lang="en-us">
												<head>
												</head>
												<body class="" style="width:500px; ">	
												<img src="https://mykanta.com/img/site_img/email_mk.png"  style="width:100%;"/>
													<p >	Hi '.$username_raw0.',</p>
													<P >Just one more step...</P>
													<P>Click the button below to activate your account, if it does not work copy the link below the button and paste it in your address bar and enter. 
														<div>
														<a href="https://mykanta.com/verify_user_auth.php?ref_auth='.$sec_email.'" style="background-color:#5bc4e1;border:1px solid #251818;border-radius:15px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:38px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;mso-hide:all;">CONFIRM</a>
														</div></P>
														<p> Copy the link below and paste it in the address bar if the button does not work : https://mykanta.com/verify_user_auth.php?ref_auth='.$sec_email.' 
													
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
                                                $message_myk = '
												<html lang="en-us">
												<head>
												</head>
												<body class="" style="width:500px; border:5px solid #443b3e">	
												<img src="https://mykanta.com/img/site_img/email_mk.png"  style="width:100%;"/>
													<p> '.$username_raw0.' has created an account.</p>
													<P >Kindly confirm your email address to complete your mykanta account registration.</P>
													<P>Please click the button below to confirm your email account.</P>
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
														</center></body>
												</html>';

												//sends the mail
									    	mail($mail_to,$subject,$message,$headers);
										   // mail($mail_mykanta,$subject,$message_myk,$headers);

												// end of verify link code-----------------------------------------------------------------------------
												echo "created";		
												}
												else
												{
												echo '<p class="text-primary">did not work</p>';
												}
											}
											else
											{
											echo '<p class="text-primary">Sorry, did not process</p>';	
											}		
										}
										}
										else
									{ 
									 var_dump($link->error); echo '<p class="text-primary">Sorry, registration did not complete. Please reload the page.</p>';	
									}
									}  
									
								}
								}
							
						}
				else
				{
				echo "Username not allowed. Only letters and or Underscore '_'. No symbols e.g. %, @, &. etc ";
				}
   
				}
				else
				{
				echo "<div class='info'>Sorry, no data was passed. Please try again or contact the site admin if this problem persist. Thanks...</div>";
				}
				
?>