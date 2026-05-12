<?php 
ini_set('session.cookie_httponly',true);

require_once $_SERVER['DOCUMENT_ROOT'].'/defines.php';
include "include/funcxn_vis.php";

echo "Welcome, Marketing Portal are Loading...";
?>
<html lang="en-us">
<meta charset="utf-8">
<title>Marketing Portals</title>
<link rel="icon" href="img/mk.png" type="image/x-icon"/>
<meta name="description" content="">
<meta name="author" content="">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link rel="canonical" href="www.mykanta.com"/>
<noscript>
<meta http-equiv="refresh" content="0;URL=www.mykanta.com">
</noscript>

<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<head>
<script type= "text/javascript" src = "/js/mail_send.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/script.js"></script>
<style type="text/css"> 
.pic{
height:auto;
width: auto;
}
.wallpaper
{
background-image:url(img/demo/asd.jpg);
align:center;
height:100%;
width:100%;
position:relative;
}
.text{
width:auto; 
height:30px; 
background:none;
opacity:0;
} 
.hover:hover  .hover-toggle {
display: block;
}
.hover .hover-toggle {
/* set it at the bottom of .carousel-inner */
position: absolute;      
top: 0;
display: none;
}
.pic:hover .text {
opacity:0.6; 
color:#000000;
font-size:12px;
font-weight:500; 
font-family:"Times New Roman", Times, serif; 
} 
.myscroll{
overflow: auto !important;
}

</style>
<!-- Basic Styles -->
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
</head>
<body class="fixed-header ">
<!-- HEADER -->
<?php     header_up() ; ?>


<div id="main" style="margin-left:30px;">
<div class="">
<input type="submit" onClick="suggestions_to_all_users()" value="submit" class="btn ">
</input>
<div id="response">
</div>
<ul class="list-inline"><br>
<?php include "include/bus_list.php";?>
</ul>		
</div>
</div>


<?php
	//include required scripts
	include("inc/scripts.php"); 
	//include footer
	include("inc/google-analytics.php"); 
?>	
<script> if (!window.jQuery.ui) { document.write('<script src="/js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>			

<div class="modal fade" id="mail_send" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	 <div class="well no-padding smart-form client-form">
	<header> <span class="text-primary">
        Send Email to business
     </span>		
	 </header>
	 <fieldset>
		<section>
			<p> Type in your email. you will receive a link to reset your password in your email. Thank you. </p>
		</section>
		<section>
			<label class="input"> <i class="icon-append fa fa-exclamation"></i>
				<input type="text" id="subject" placeholder="Subject"   />
				<b class="tooltip tooltip-top-right">Subject</b> </label>
		</section>
		<section>
				<label class="input">
				<textarea class="form-control" type="text" id="message" placeholder=" Message"  ></textarea>
				</label>
		</section>
	</fieldset>
	<footer>
	<div id="reset_error" class="pull-left">
								
	</div>
		<div class="pull-right" id="fgt_btn"><div class="pull-right" id="acc_btn"><input type="submit" class="btn btn-primary" onClick="mail_send_to_all()" value="Send">
			</input></div> </div>
	</footer>
	
	 </div>
   </div>
</div>



<div class="modal fade" id="mail_send_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	 <div class="well no-padding smart-form client-form">
	<header> <span class="text-primary">
        Send Email to Users
     </span>		
	 </header>
	 <fieldset>
		<section>
			<p> Type in your email. you will receive a link to reset your password in your email. Thank you. </p>
		</section>
		<section>
			<label class="input"> <i class="icon-append fa fa-exclamation"></i>
				<input type="text" id="subject1" placeholder="Subject"   />
				<b class="tooltip tooltip-top-right">Subject</b> </label>
		</section>
		<section>
				<label class="input">
				<textarea class="form-control" type="text" id="message1" placeholder=" Message"  ></textarea>
				</label>
		</section>
	</fieldset>
	<footer>
	<div id="reset_error1" class="pull-left">
								
	</div>
		<div class="pull-right" id="fgt_btn1"><div class="pull-right" id="acc_btn"><input type="submit" class="btn btn-primary" onClick="mail_send_user_all()" value="Send">
			</input></div> </div>
	</footer>
	
	 </div>
   </div>
</div>




<div class="modal fade" id="mail_send_individual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	 <div class="well no-padding smart-form client-form">
	<header> <span class="text-primary">
        Send Email to business
     </span>		
	 </header>
	 <fieldset>
		<section>
			<p> Type in your email. you will receive a link to reset your password in your email. Thank you. </p>
		</section>
		<section>
			<label class="input"> <i class="icon-append fa fa-mail"></i>
				<input type="email" id="email_in" placeholder="Recipient email"   />
				<b class="tooltip tooltip-top-right">Email</b> </label>
		</section>
		<section>
			<label class="input"> <i class="icon-append fa fa-exclamation"></i>
				<input type="text" id="subject_in" placeholder="Subject"   />
				<b class="tooltip tooltip-top-right">Subject</b> </label>
		</section>
		<section>
				<label class="input">
				<textarea class="form-control" type="text" id="message_in" placeholder=" Message"  ></textarea>
				</label>
		</section>
	</fieldset>
	<footer>
	<div id="reset_error_in" class="pull-left">
								
	</div>
		<div class="pull-right" id="fgt_btn_in"><div class="pull-right" id="acc_btn_in"><input type="submit" class="btn btn-primary" onClick="mail_send_ind()" value="Send">
			</input></div> </div>
	</footer>
	
	 </div>
   </div>
</div>
<script src="/js/demo.js"></script>
<!-- MAIN APP JS FILE -->
<script src="/js/app.js"></script>
</body>
</html>