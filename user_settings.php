<?php 
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";
include "include/chat/chat.php";
$user_id = $_SESSION['id'];
$account_id = $_SESSION['id'];
$owner_id = $_SESSION['id'];
echo "Welcome your Profile is Loading...";		  
?>
<html lang="en-us">
<meta charset="utf-8" />
<title>User Settings</title>
<link rel="icon" href="/img/mk.png" type="image/x-icon"/>
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="canonical" href="www.mykanta.com"/>
<noscript>
<meta http-equiv="refresh" content="0;URL=www.mykanta.com">
</noscript>
<script type="text/javascript" src = "/js/countries.js"></script>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/js/ajaxupload_image.3.5.js" ></script> 
<head>
	<!-- styles and scripts needed by jScrollPane -->
	<link type="text/css" href="/include/jscrollpane/jquery.jscrollpane.css" rel="stylesheet" media="all" />
	<script type="text/javascript" src="/include/jscrollpane/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="/include/jscrollpane/jquery.jscrollpane.js"></script>
<!-- For fancybox -->
<script type="text/javascript" src="/include/fancybox/source/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/include/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />

<script type= "text/javascript" src = "/js/clear_cart.js"></script>
<script type= "text/javascript" src = "/js/settings_user.js"></script>
<script type="text/javascript" src="/js/add_friend.js"></script>
<script type="text/javascript" src="/js/change_pass.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript" src="/include/chat/chat.js" ></script>
<style type="text/css"> 
.pic{

height:auto;
width: auto;


}
.loading_gif
{
background:url(/img/loading.gif) no-repeat 50% 50%;
}

.wallpaper
{
background-image:url(/img/demo/asd.jpg);
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
#cropContainerHeaderButton{
	color: #FFF;
	margin: 10px 0 10px 20px;
	padding: 5px 5px;
	width: 150px;
	display: block;
	text-align: center;
	font-weight: 400;
	background: #3276B1;
	border-radius: 2px;
	box-shadow: 4px 4px 0px rgba(0,0,0,0.1);
	font-size: 20px;	
}
#cropContainerHeaderButton:hover {
	background: #296191;
}
@media screen and (max-width: 450px) 	{
	.nav-tabs li{
		wi/dth: 100px;
		font-size: 10px;
	}
}
@media screen and (max-width: 390px) 	{
	.nav-tabs li{
		font-size: 9px;
	}
	.nav li a{
		padding:5px !important;
	}
}

.bigbox, #divMiniIcons{
	left:10px !important;
}
.bigbox, #divMiniIcons{
	left:10px !important;
}
</style>
<!-- For cropper -->
<link href="/include/croppic/assets/css/croppicprofile.css" rel="stylesheet" />
		
<!-- Basic Styles -->
<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> 
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css">
<!--<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css">-->
</head>
<body class="fixed-header smart-skin-2 fixed-navigation">
<!-- HEADER -->
<?php   include "inc/user_header.php"; ?>
<!-- END HEADER -->
<!-- BEGIN NAVIGATION -->
<?php 
nav($user_id);
?>
<!-- END NAVIGATION -->
<!-- MAIN PANEL -->
<div id="main" role="main">
<!-- MAIN CONTENT -->
<div id=" " style="">
<div class="row padding-10" >

<div class="col-sm-6 col-md-6 col-lg-6 ">
<h3 style="color:black;">Personal Information</h3>
<div class="smart-form " >
<?php $query = "SELECT * FROM registration WHERE id = '$user_id'   LIMIT 1
";
if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{
$firstName = safe_input($details['firstName']);

$user_id = safe_input($details['id']);
$email = safe_input($details['email']);
$username = safe_input($details['username']);
$telephone = $details['telephone'];
echo '
 <div class="row">
  <section class="col col-sm-3">
	 <span style="color:black; font-size:1.0em;">Full Name:
	</span>
</section>
<section class="col col-sm-9 ">
	 <label class="input"><i class="icon-append fa fa-user"></i>
		<input type="text"  id="firstName_setings_edt" name="firstName_setings"  value="'.$firstName.'"  placeholder="Full Name"   />
		<b class="tooltip tooltip-top-right">Your full name</b> 
	 </label>
</section>
</div>
 <div class="row">
<section class="col col-sm-3">
	 <label>User name:
	</label>
</section>
<section class="col col-sm-9 ">
	 <label class="input"><i class="icon-append fa fa-user"></i>
		<input type="text"  id="username_setings_edt" name="username_setings" value="'.$username.'"
		placeholder="User name"   />
		<b class="tooltip tooltip-top-right">Your unique user name</b> 
	 </label>
</section>
</div>
 <div class="row">
<section class="col col-sm-3">
	 <label>Telephone:
	</label>
</section>
<section class="col col-sm-9 ">
	 <label class="input"><i class="icon-append fa fa-phone"></i>
		<input type="text"  id="edt_telephone" name="edt_telephone" value="'.$telephone.'"
		placeholder="Telephone"   />
		<b class="tooltip tooltip-top-right">type your phone number without country code</b> 
	 </label>
</section>
</div>
 <div class="row">
<section class="col col-sm-3">
	 <label>Email:
	</label>
</section>
<section class="col col-sm-9 ">
	 <label class="input">
		'.$email.'  ',email_verification($email),'
	 </label>
</section>
<section class="col pull-right">
<span    onClick="settings_user_id('.$user_id .')" style="cursor:pointer;" class=" btn btn-default font-sm" value="Confirm">Save
</span></section></div>
';

}
}?>
<span id="set1" class="pull-right">
</span>
</div>
</div>
</div>
<div class="row" >

<div class="col-sm-6 col-md-6 col-lg-6">
<div class="padding-10 smart-form " >
<h3 style="color:black;">Security Information</h3><br>
 <div class="row"> <section class="col col-sm-3">
	 <label>Old Password:
	</label>
</section>
<section class="col col-sm-9 ">
	 <label class="input"><i class="icon-append fa fa-lock"></i>
		<input type="password" id="old_pass" value=""  placeholder="******"   />
		<b class="tooltip tooltip-top-right">Your old password</b> 
	 </label>
</section>
 </div>
 <div class="row">
  <section class="col col-sm-3">
	 <label  >New Password:
	</label>
</section>
<section class="col col-sm-9 ">
	 <label class="input"><i class="icon-append fa fa-lock"></i>
		<input  type="password" id="rep_new_pass" value=""   placeholder="******"   />
		<b class="tooltip tooltip-top-right">Your new password</b> 
	 </label>
</section>
<section class="col pull-right">
<span   onClick="change_password(<?php $user_id; ?>)"  style="cursor:pointer;" class="btn btn-default font-sm" value="Confirm">Save
</span></section>
</div>
 <div class="row padding-10">
 
<div id="set2" class="text-success"></div>
 </div> 
</div>							
</div>
<div class="col-sm-12">
          
              <section id="widget-grid" class="">
				<div class="row">
			         <div class="padding-10">  <h3 style="color:black;">Privacy Settings</h3>
				                  <form class="smart-form">
										<?php  user_preference(); ?>
										</form>
				
								</div>
								<!-- end widget div -->
				
					</div>
				
				
				
					<!-- END ROW-->
				
				</section>    </div>
</div>

</div><?php footer(); ?>	
</div>

	<?php chat_box($user_id); ?>
		<!-- end widget -->


<?php 
//include required scripts
include("inc/scripts.php"); 
//include footer
include("inc/google-analytics.php"); 
?>
<script src="/js/smart-chat-ui/smart.chat.ui.min.js"></script>
<script src="/js/smart-chat-ui/smart.chat.manager.min.js"></script>
	<!-- End Chat -->
<input type="hidden" id="user_id" value="<?php echo $user_id ; ?>" /> 

<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" /> 
<input type="hidden" id="owner_id" value="<?php echo $owner_id ; ?>" /> 
<input type="hidden" id="get_profile_pic" value="<?php echo get_profile_pic_only_name($user_id); ?>" />
<!--Chat 4 hidden inputs-->
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" />

<input type="hidden" id="hiddenGifImg" value="" />
<input type="hidden" id="myfile" value="" />

<!-- Cropper stuff -->
<script src="include/croppic/croppic.min.js"></script>
<script src="include/croppic/assets/js/main.js"></script>


</body>
</html>