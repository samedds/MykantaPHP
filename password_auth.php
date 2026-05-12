<!DOCTYPE html>
<?php
//for Xss 
ini_set('session.cookie_httponly',true);
//include "include/funcxn.php";
include "include/conxn.php";

$ref_code = $_GET['ref_auth'];
  
?>
<html lang="en-us">
<head>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/password_reset_auth.js "></script>

 
		<meta charset="utf-8" />
		

		<title>Mykanta Reset Password</title>
		<meta name="description" content="">
		<meta name="author" content="">

		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">	
		<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">

	
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.css">	
		
		
		<link rel="stylesheet" type="text/css" media="screen" href="css/demo.css">
                <link rel="icon" href="img/site_img/logo.jpg" type="image/x-icon">
		
		<!-- GOOGLE FONT -->
		

	</head>
	<body id="login" class="animated fadeInDown fixed-header">
		
		<header  class="header" style="background-color:">
			<!--<span id="logo"></span>-->

			
		</header>

		<div id ="bo dy" id="main" class="" role="main" style="background-color:">

			<!-- MAIN CONTENT -->
			<div  id="content" class=" container">


	
			<div class="row" >
			<div class="col-md-3 col-lg-3"> </div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="well no-padding smart-form client-form" >
							
								<header>
								Password Reset
								</header>
								<fieldset>
									<section>
										<label class="label"> Enter New password</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" id="pass" required />
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter New password</b> </label>
										
									</section>
									<section>
										<label class="label">Retype password</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" id="re_pass" required />
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Retype password</b> </label>
										
									</section>
									<section>
										<span class="text-info pull-left">Please add at least one Upper case letter, one lower-case Letter, a number, and should be at least 8 characters.</span>
									</section>
								</fieldset>
								<footer>
								<div class="" id="reset_msg"> </div>
								
									<input type="submit" class="btn btn-primary" onClick="password_reset_auth()" value="Reset">
									
									</input>
								</footer>
							

						</div>
             </div>
			 <div class="col-md-3 col-lg-3"> </div>
				</div>
				
					

			
			</div>

		</div>
		

		<!--================================================== -->	

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script src="js/plugin/pace/pace.min.js"></script>

	   
		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->		
		<script src="js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="js/smartwidgets/jarvis.widget.min.js"></script>
		
		<!-- EASY PIE CHARTS -->
		<script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		
		<!-- SPARKLINES -->
		<script src="js/plugin/sparkline/jquery.sparkline.min.js"></script>
		
		<!-- JQUERY VALIDATE -->
		<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>
		
		<!-- JQUERY MASKED INPUT -->
		<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>
		
		<!-- JQUERY SELECT2 INPUT -->
		<script src="js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>
		
		<!-- browser msie issue fix -->
		<script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>
		
		<!-- FastClick: For mobile devices -->
		<script src="js/plugin/fastclick/fastclick.js"></script>
		

		
	

		<!-- MAIN APP JS FILE -->
		<script src="js/app.js"></script>
<script type= "text/javascript" src = "js/account_create.js"></script>
<script type="text/javascript" src="js/password_reset.js"></script>
		<script type="text/javascript">
			runAllForms();

			$(function() {
				// Validation
				$("#login-form").validate({
					// Rules for form validation
					rules : {
						email : {
							required : true,
							email : true
						},
						password : {
							required : true,
							minlength : 8,
							maxlength : 20
						}
					},

					// Messages for form validation
					messages : {
						email : {
							required : 'Please enter your email address',
							email : 'Please enter a VALID email address'
						},
						password : {
							required : 'Please enter your password'
						}
					},

					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
			});
		</script>
<input type="hidden" id="ref_code" value="<?php echo $ref_code ; ?>" /> 
		

	</body>


</html>