<!DOCTYPE html>
<?php
ini_set('session.cookie_httponly',true);
include "include/conxn.php";

ob_start();
@session_start();
include "include/funcxn_vis.php";
?>
<html lang="en-us">
	
<head>
<title>Mykanta | Contact Us</title>
<meta charset="utf-8" />
<meta name="description" content="Contact Mykanta Team"/>
<meta name="author" content="Mykanta Team"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="icon" href="img/mk.png" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css"/>	
<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css"/>	
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
<script type= "text/javascript" src = "/js/countries.js"></script>
<script type= "text/javascript" src = "/js/mail_send.js"></script>
<script type="text/javascript">
_atrk_opts = { atrk_acct:"IYQQn1QolK10mh", domain:"mykanta.com",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=IYQQn1QolK10mh" style="display:none" height="1" width="1" title="" /></noscript>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<noscript> Your browser does not support JavaScript. </noscript>
</head>
	<body id="login" class="animated fadeInDown">
<?php include 'inc/index_header.php';?>
		<!-- MAIN PANEL -->
		<div id="main" role="main">
			<div  class=" "style="width:100%;padding-right:-200px; background-color:#5bc0de;">
		   <div class="container">
				<h3 class="" style="color:white; margin-left:20px;"  > Welcome to Mykanta (About) </h3>
				<p class="" style="color:white; margin-left:20px;" >All you need to know about mykanta in one place</p>
		   </div>
	</div>
			<div class="col-sm-12 well well-sm">


<div class="row">
	
	<section id="contact" class="home-section text-center">
			<div class="heading-contact marginbot-50">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
						
						<div class="section-heading">
							<ul class="list-unstyled text-center">
									<li><i class="fa fa-envelope-o fa-4x"></i> <b class="h2"> Get in touch</b> </li>
									</ul>
							
								<p>
									<h2>Go ahead and send Us a message, We will respond in no time.</h2>
								</p>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="container">

				<div class="row">
					<div class="col-lg-8 col-md-offset-2">
					<div class="price-features">
						<div class="boxed-grey">
						 
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="email"> Email Address</label>
											<div class="input-group">
												<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span> </span>
												<input type="email" class="form-control" id="email_in" placeholder="Enter email" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="subject"> Subject</label>
											<select id="subject_in" name="subject" class="form-control" required="required">
												<option value="">Choose One:</option>
												<option value="General Customer Service">General Customer Service</option>
												<option value="Advertise">Advertise</option>
												<option value="suggestions">Suggestions</option>
												<option value="Product Support">Product Support</option>
												<option value="Investors Relations">Investors Relations</option>
											</select>
										</div>
										<div id="reset_error_in" ></div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="name"> Message</label>
											<textarea name="message" id="message_in" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="col-md-12"  id="fgt_btn_in">
										<button  onClick="mail_send_contact()" class="btn btn-primary pull-right" id="btnContactUs">
											Send Message
										</button>
									</div>
								</div>
							 
						</div>
					</div>
					<br>
						<div class="widget-contact row">
							<div class="col-lg-6 text-align-left">
								<address>
									<!--<strong>HIPI LLC.</strong>
									<br>
									5th Floor, American House, Tudu
									<br>
									Kojo Thompson Road, Ghana-Accra 
									<br>-->
									<strong>Phone</strong> (+233)-200-369-302
								</address>
							</div>

							<div class="col-lg-6 text-align-left">
								<address>
									<strong>Email</strong>
									<a href="mailto:#">support@mykanta.com</a>
									<a href="mailto:#">mykantaa1@gmail.com</a>
								</address>

							</div>
						</div>
				</div>

			</div>
		
			
			</div></section>
			<div  class="hidden-xs hidden-sm col-md-1 col-lg-1 "style="">
			</div>
	<div  class="no-padding row well well-sm"  >
		<div class="bottom-content">
			<div class="container custom-container text-center">
				<h2>Here to make a Difference</h2>
				<p>
					Thank you for choosing Mykanta :)
				</p>
				<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
				<a href="http://mykanta.com/registration" class="btn btn-default btn-lg purchase">Signup Now</a><br></br>
			</div>
		</div>
	</div>

</div>

<!-- end row -->

</section>


			
			</div>
			<!-- END MAIN CONTENT -->

		</div>
	
<?php include 'inc/footer.php';?>	
	<?php 
//include required scripts
include("inc/scripts.php"); 
//include footer
include("inc/google-analytics.php"); 
?>
		
	</body>


</html>