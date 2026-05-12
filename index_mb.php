<?php
ini_set('session.cookie_httponly',true);
include "inc/check_cookie.php";	
//include "include/sessionfile.php";

include "include/conxn.php";
include "include/funcxn_vis.php";
?>
<html lang="en-us">
<head>
<meta charset="utf-8"/>
<title>Mykanta Login or Sign up</title>
<meta name="description" content="Mykanta is a social commerce site that allows users and businesses to interact, promote and transact business. It gives users the opportunity to share their product and business experiences with connected friends and businesses."/>
<meta name="author" content="Mykanta Login or Sign up" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="icon" href="/img/mk.png" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css"/>	
<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css"/>	
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
<script type= "text/javascript" src = "/js/countries.js"></script>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<noscript> Your browser does not support JavaScript. </noscript>
<script>
function verify_user_from_index(){
//$('#haa').html( '<div class="btn btn-success"><img src="/img/loading.gif"/></div>');  
var qmail = $('#mail_ver').val();
$.post("/ajax/verify_user_from_index.php",  
		{
		task : "task",
		qmail : qmail,
		cache: false,
		
	})
//	$('#haa').html('<div class="btn btn-success">Reload Page please, there was no connection.</div>');  
 .error( function( )
	{
	console.log(response);
    })
.success(function(response)
{
$('#haa').html('<div  class="btn "id="vrfy_btn" style="background-color:green;border:1px solid #251818;border-radius:15px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:38px;text-align:center;text-decoration:none;width:100%;-webkit-text-size-adjust:none;mso-hide:all;">Sent Successful</div></div>');

console.log(response);
});}
</script>
</head>
<body id="login" class="animated fadeInDown ">
<?php include 'inc/index_header.php';?>


<div  class="row bg" >
<div  class=" container"  >		
<div class=" col-md- col-lg-4"></div>
<div  class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ">
	<p class="headline hidden-xs hidden-sm" style="color:white; font-size:2.8em;">Login </p>
	<p class="headline  hidden-md hidden-lg" style="color:white; font-size:1.8em;">Login </p>
		<form action="login.php"  method="post" class="form col-md-12  no-padding">
		<div class="form-group no-padding">
		<input type="text" class="form-control input-md"style="border-radius:15px;" placeholder="Username / Email" name="email" required />
		</div>
		<div class="form-group no-padding">
		<input type="password" class="form-control input-md" placeholder="Password"  name="pass"required />
		<p class=" " style="color:black; padding:3px;"><input id="remb_me" name="remb_me"  type="checkbox"> Remember me</p>
		<a class=" " href="#" style="color:black; padding:3px;"  data-target="#forgotpassword" data-toggle="modal" ><i class="fa fa-refresh"></i> Reset password</a>
	</div>
		<div class="form-group no-padding">
		<button class="btn-primary-lg-o btn-block">Sign In</button>
		
		<span id="haa" class="text-danger "><?php include "login.php";?></span> 
		</div>
		<div class=" row padding-10">
		<p class="text-default padding-5"style="font-size:1.3em;"> Don't have an account? <span class="padding-10"><a href="/registration" style="color: white; font-size:1.4em; left:50px;" class="no-padding no-margin"> Sign Up</a></span></p>
		
        </div>
		<br>
		 </form>
</div>
</div>
</div>

<?php include 'inc/footer.php';?>

	<?php 
//include required scripts
include("inc/scripts.php"); 
//include footer
include("inc/google-analytics.php"); 
?>
<script> if (!window.jQuery.ui) { document.write('<script src="/js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>			
		
<div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	 <div class="well no-padding smart-form client-form">
	<header> <span class="text-primary">
        Reset your Password
     </span>		
	 </header>
	 <fieldset>
		<section>
			<p> Type in your email. you will receive a link to reset your password in your email. Thank you. </p>
		</section>
		<section>
			<label class="input"> <i class="icon-append fa fa-user"></i>
				<input type="email" id="reset_password" placeholder="Email"   />
				<b class="tooltip tooltip-top-right">Type your Email</b> </label>
		</section>
	</fieldset>
	<footer>
	<div id="reset_error" class="pull-left">
								
	</div>
		<div class="pull-right" id="fgt_btn"><div class="pull-right" id="acc_btn"><input type="submit" class="btn btn-primary" onClick="password_reset()" value="Send">
			</input></div> </div>
	</footer>
	
	 </div>
   </div><!-- /.modal -->
</div><!-- /.modal-dialog -->	
	
	
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="well no-padding smart-form client-form" id="form_holder">	<header>
<span class="text-success">Create Account</span>
</header>

<fieldset>
<div class="row">
<section class="col col-6">
	<label class="input"><i class="icon-append fa fa-user"></i>
		<input type="text" id="firstname" placeholder="Full name"   />
		<b class="tooltip tooltip-top-right">Enable friends to easily find you.</b> 
	</label>
</section>
<section class="col col-6">
<label class="input"> <i class="icon-append fa fa-user"></i>
<input type="text" id="username" placeholder="User name"   />
<b class="tooltip tooltip-top-right">Your mykanta unique ID</b> </label>
</label>
</section>
</div>
<div class="row">
<section class="col col-6">
	<label class="input"> <i class="icon-append fa fa-calendar"></i>
		<input type="text" id="dob" name="request" placeholder=" Dd-Mm-Year eg:01-06-90 (Birthday)!" class="datepicker"  data-dateformat='dd-mm-yy'>
	</label>
</section>



<section class="col col-6">
<label class="input"> <i class="icon-append fa fa-envelope"></i>
	<input type="email" id="email" placeholder="Email address"   />
	<b class="tooltip tooltip-top-right">To verify your mykanta account</b> </label>
</section>
</div>
<div class="row">
<section class="col col-6">
<label class="input"> <i class="icon-append fa fa-lock"></i>
	<input type="password"  placeholder="Password" id="password"   />
	<b class="tooltip tooltip-top-right">At least 8 characters in number with Capital and small letters,numbers,and symbols.</b> </label>
</section>

<section class="col col-6">
<label class="input"> <i class="icon-append fa fa-lock"></i>
	<input type="password" id="passwordConfirm" placeholder="Confirm password"   />
	<b class="tooltip tooltip-top-right">Retype the exact password</b> </label>
</section>
</div>
<div class="row">


<section class="col col-6">
	
</section>
</div>
<div class="row">

<!-- end row -->
 <section>
<section class="col col-md-6 padding-10">
<center class="text-success">Proove you are a human being.</center>
<?php include "include/captcha.php"; ?>
	</section>
 
	<section id="reg" class="col col-md-6 padding-10 ">

	</section>
									</section>
</fieldset>

</div>
</div>
</div>
</div>

<script type= "text/javascript" src = "/js/account_create.js"></script>
<script type="text/javascript" src="/js/password_reset.js"></script>
<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" />
<img src="/img/loading.gif" style="display:none"/>
<img src="/img/gcheck.png" style="display:none"/>

<script type="text/javascript">
    $('.dropdown-menu input, .dropdown-menu label').click(function(e) {
        e.stopPropagation();
    });
</script>
<script type="text/javascript">
			runAllForms();

			$(function() {
				// Validation
				$("#login-form").validate({
					// Rules for form validation
					rules : {
						email : {
							required : true,
							email : false
						},
						password : {
							required : true,
							minlength : 3,
							maxlength : 20
						}
					},

					// Messages for form validation
					messages : {
						email : {
							required : 'Please enter your email address/username',
							email : 'Please enter a VALID email address/username'
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
		
		<script type="text/javascript">
			    function remove_business()
				{
				    $( '#shopName' ).val(""); 
				}
		</script>

	</body>


</html>