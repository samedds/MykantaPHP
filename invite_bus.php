<?php 
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/conxn.php";
include "include/funcxn.php";
$user_id = $_SESSION['id'];
 $username = $_SESSION['username'];
 $email = $_SESSION['email'];
?>
<html lang="en-us">
	
<head>
		
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
<script type= "text/javascript" src = "js/countries.js"></script>
		<title>Feedback</title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type= "text/javascript" src = "/js/mail_send.js"></script>
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.css">

		
		<link rel="stylesheet" type="text/css" media="screen" href="css/demo.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>

		<!-- FAVICONS -->
		<link rel="icon" href="img/mk.png" type="image/x-icon">

	<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
	

	</head>
<body id="" class="">
		<?php include "inc/user_header.php";?>
		<!-- MAIN PANEL -->
 <div id="main" role="main">
	<div class="container">
      <div class="row">
         
          <div class="col-sm-8">
           <div class="row">
             <div class="col-md-12 padding-10">
		       <div class="padding-10" style="padding-left:50px; padding-right:50px; color:grey;">
				<p class="" style="font-size:1.2em; text-align:center;"><i class="fa fa-comment fa-2x"></i> Go ahead and invite a business you would want to see on Mykanta. </p>
					<div class="well no-padding smart-form ">
					<fieldset>
					<section>
					<label class="input"> 
			               <input type="input" name="email" id="email_invite"   placeholder="Business Email">
					</input>
						</label>
					</section>
					<section>
						<label class="input">
						<textarea class="form-control" type="text" id="message_invite" placeholder="Business name, address and or telephone"  ></textarea>
						</label>
					</section>
					</fieldset>
					<footer>
					<div id="reset_error_in" class="pull-left">
										
					</div>
					<div class="pull-right" id="fgt_btn_in"><div class="pull-right" id="acc_btn_in"><input type="submit" class="btn btn-info" onClick="bus_invite()" value="Send">
					</input></div> </div>
					</footer>
					</div>

			</div>
			</div>
			
		</div> 
				 
				 
	</div>

		

</div>

<!-- end row -->

</section>


			
			</div>
			<!-- END MAIN CONTENT -->

<?php footer();?>

		</div>
		

		<?php 
//include required scripts
include("inc/scripts.php"); 
//include footer
include("inc/google-analytics.php"); 
?>
		<!-- MAIN APP JS FILE -->
		<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" />
		<input type="hidden" id="username" value="<?php echo  $username;?>" />
		<script type="text/javascript">
			    $("#username").bind("keyup", function(event) {
			        var regex = /^[a-zA-Z\_]+$/;
			        if (regex.test($("#username").val())) {
			        	//$("#reg").removeClass("text-danger").addClass( "text-success" );
			            document.getElementById("reg").innerHTML = "";
			        } else {
			        	$("#reg").removeClass("text-success").addClass( "text-danger" );
			            document.getElementById("reg").innerHTML = "Invalid username: No spaces. Only letters and Underscore Allowed. Eg: <strong class='text-success'>dan_cool</strong>";
			        }
			    });
		</script>

	</body>


</html>