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
<script type= "text/javascript" src = "/js/countries.js"></script>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
 
<noscript> Your browser does not support JavaScript. </noscript>
		<meta charset="utf-8" />
		<title>Create Account</title>
		<meta name="description" content="Mykanta is a social commerce site that allows users and businesses to interact, promote and transact business. It gives users the opportunity to share their product and business experiences with connected friends and businesses."/>
<meta name="author" content="Mykanta Create account" content=""/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <link rel="icon" href="img/mk.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css"/>	
		<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css"/>
		<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css"/>	
		<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
</head>
<body id="login" class="animated fadeInDown ">
<?php include 'inc/index_header.php';?>

<div  class="row bg" >
<div  class="row padding-10" >
<div  class="container"  >
<div class="  col-md-2 col-lg-2">
</div>
    <div  class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
<div class=" smart-form " id="form_holder" >	
<center><h2 class="headline" align="left" style="color:white; font-size:2.2em;">Create Account <span class="" style="font-size:0.7em;"> it's free...</span></h2></center>


<center class="row">

	<label class="input padding-5"style="width:300px;"> 
		<input type="text"  id="firstname" placeholder="Full name"  autocomplete="off" style=" "/>
		<b class="tooltip tooltip-top-right">Enable friends to easily find you.</b> 
	</label>

<label style="width:300px;"class="input padding-5">  
<input type="text" id="username" placeholder="User name"  autocomplete="off" style=" "/>
<b class="tooltip tooltip-top-right">Your mykanta unique ID</b> </label>
</label>

</center>
<center class="row ">

	<ul class="list-inline hidden"  align="left"  style="background-color:#fff; width:300px;  ">
	  <li class="pull-left padding-5" style="margin-top:-2px; margin-left:5px;"> <span  style="color:#989898; font-size:0.9em; "> Date of Birth</span>
	  </li>
	  <li> 
	     <select id="year" name="yr" autocomplete="year" class="input-xs no-padding form-control" style="width:100%;" >
							<option  style="font-color:#989898; " value="">Year</option>
							<option value="2003">2003</option>
							<option value="2002">2002</option>
							<option value="2001">2001</option>
							<option value="2000">2000</option>
							<option value="1999">1999</option>
							<option value="1998">1998</option>
							<option value="1997">1997</option>
							<option value="1996">1996</option>
							<option value="1995">1995</option>
							<option value="1994">1994</option>
							<option value="1993">1993</option>
							<option value="1992">1992</option>
							<option value="1991">1991</option>
							<option value="1990">1990</option>
							<option value="1989">1989</option>
							<option value="1988">1988</option>
							<option value="1987">1987</option>
							<option value="1986">1986</option>
							<option value="1985">1985</option>
							<option value="1984">1984</option>
							<option value="1983">1983</option>
							<option value="1982">1982</option>
							<option value="1981">1981</option>
							<option value="1980">1980</option>
							<option value="1979">1979</option>
							<option value="1978">1978</option>
							<option value="1977">1977</option>
							<option value="1976">1976</option>
							<option value="1975">1975</option>
							<option value="1974">1974</option>
							<option value="1973">1973</option>
							<option value="1972">1972</option>
							<option value="1971">1971</option>
							<option value="1970">1970</option>
							<option value="1969">1969</option>
							<option value="1968">1968</option>
							<option value="1967">1967</option>
							<option value="1966">1966</option>
							<option value="1965">1965</option>
							<option value="1964">1964</option>
							<option value="1963">1963</option>
							<option value="1962">1962</option>
							<option value="1961">1961</option>
							<option value="1960">1960</option>
							<option value="1959">1959</option>
							<option value="1958">1958</option>
							<option value="1957">1957</option>
							<option value="1956">1956</option>
							<option value="1955">1955</option>
							<option value="1954">1954</option>
							<option value="1953">1953</option>
							<option value="1952">1952</option>
							<option value="1951">1951</option>
							<option value="1950">1950</option>
							<option value="1949">1949</option>
							<option value="1948">1948</option>
							<option value="1947">1947</option>
							<option value="1946">1946</option>
							<option value="1945">1945</option>
						</select>	
		</li>
        <li>		
			<select id="month" name="month" autocomplete="Month" class="input-xs form-control no-padding " style="width:100%;">
							<option value="">Month</option>
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
			</select>	
		</li>
		<li>		
			<select id="day" name="day" autocomplete="Day" class="input-xs form-control no-padding" style="width:100%;">
							<option value="">Day</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
			</select>	
		</li>
	</ul>

<label class="input padding-5" style="width:300px;"> 
	<input type="email" id="email" placeholder="Email address"  autocomplete="off" style=" "/>
	<b class="tooltip tooltip-top-right">To verify your mykanta account</b> </label>
<!--	
<label class="input padding-5" style="width:300px;">  
	<input  id="telephone" placeholder="Telephone with country code"  autocomplete="off" style=" "/>
	<b class="tooltip tooltip-top-right">Your telephone</b> </label>
-->
</center>
<center class="row">

<label class="input padding-5"style="width:300px;">  
	<input type="password"  placeholder="Password" id="password"  autocomplete="off" style=" " />
	<b class="tooltip tooltip-top-right">At least 8 characters in number with Capital and small letters,numbers,and symbols.</b> </label>

<label class="input padding-5"style="width:300px;" >  
	<input type="password" id="passwordConfirm" placeholder="Confirm password"  autocomplete="off" style=" "/>
	<b class="tooltip tooltip-top-right">Retype the exact password</b> </label>

</center>

	<div class="row">

	<?php include "include/captcha.php"; ?>
	<center>	
	
	<div id="reg"></div>
	<div class=" row padding-10" style="color:black; font-size:0.9em;">
				 I agree with the <a href="/TermandConditions.php"  style="color:white;">Terms and Conditions </a><br>  <!--and  <a href="#"> Data Policy  </a> --> by clicking on Create Account.
		</div>
	<div class=" padding-no" id="acc_btn"><input type="submit" class="btn btn-primary-lg-o btn-block"  style="width:300px; border-radius:15px;" onClick="account_create()" value="Create Account">
	</input></div>
	
	<p class="padding-10"style="color:black; font-size:0.9em;">Already have an Account? <a href="/index_login.php"  style="font-size:1.7em; color:white;">Login  </a></p>
</center>

	</div>
</div>


</div><!-- /.modal -->


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
 <script type= "text/javascript" src = "/js/account_create.js"></script>
<script type="text/javascript" src="/js/password_reset.js"></script>
<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" />
<img src="img/loading.gif" style="display:none"/>
<img src="img/gcheck.png" style="display:none"/>
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
function toggler(user_login_form) {
    $("#" + user_login_form).toggle();
}</script>
		<script type="text/javascript">
			    $("#username").bind("keyup", function(event) {
			        var regex = /^[a-zA-Z0-9\_]+$/;
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