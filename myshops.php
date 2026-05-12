<?php 
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php"; 
include "include/status_ins.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";

$user_id = $_SESSION['id'];
$username = $_SESSION['username'];
$user_id = $_SESSION['id'];
$account_id = $_SESSION['id'];
$owner_id = $_SESSION['id'];
//echo "Welcome your Profile is Loading...";	
$current = strtotime('2016-03-26 12:37:17');  
$ded = strtotime('2016-03-26 11:37:17');  
 'time def : '.$result = $current - $ded;


?>
<html lang="en-us">
<meta charset="utf-8" />
<head>
<title>My Shops</title>
<link rel="icon" href="/img/mk.png" type="image/x-icon"/>
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="canonical" href="www.mykanta.com"/>
<noscript>
<meta http-equiv="refresh" content="0;URL=www.mykanta.com">
</noscript>
<script type="text/javascript" src ="/js/countries.js"></script>
<script type="text/javascript" src ="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src ="/js/fcmtokenpush.js"></script>
<script type="text/javascript" src ="/js/ajaxupload_image.3.5.js" ></script> 
<script type="text/javascript" src ="/js/scripts.js"></script>
<script type="text/javascript" src ="/js/gifshot.js"></script>

<!-- styles and scripts needed by jScrollPane -->
<link type="text/css" href="/include/jscrollpane/jquery.jscrollpane.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="/include/jscrollpane/jquery.mousewheel.js"></script>
<script type="text/javascript" src="/include/jscrollpane/jquery.jscrollpane.js"></script>
 
<script type="text/javascript" src="/include/fancybox/source/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/include/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
  <script src="js/video.min.js"></script>
  <script src="js/videojs-markers.min.js"></script>
  <script src="js/plugin/noUiSlider/jquery.nouislider.min.js"></script>
  <script src="js/plugin/ion-slider/ion.rangeSlider.min.js"></script>


 
<script type= "text/javascript" src = "/js/comment_profile.js"></script>
<script type= "text/javascript" src = "/js/clear_cart.js"></script>
<script type= "text/javascript" src = "/js/settings_user.js"></script>
<script type= "text/javascript" src = "/js/tags_interest.js"></script>
<script type= "text/javascript" src = "/js/collection_load_each.js"></script>
<script type="text/javascript" src="/js/add_friend.js"></script>
<script type="text/javascript" src="/js/shop_create.js"></script>
<script type="text/javascript" src="/js/load_more_reevs.js"></script>
<script type="text/javascript" src="/js/load_reev_comments.js"></script>
<script type="text/javascript" src="/js/change_pass.js"></script>
<script type="text/javascript" src="/js/like.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/comment_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript" src="/js/uploader_image.js" ></script>
<script type="text/javascript" src="/js/tags_interest.js" ></script>
<style type="text/css"> 
  .sticky {
     position:fixed;
     top: 48;
     width:110%;
	 z-index:1;
	 background-color:white;
  }
.pic{

height:auto;
width: auto;


}
.loading_gif
{
background:url(/img/loading.gif) no-repeat 50% 50%;
}
.img-gif
{
background:url(/img/loading.gif) no-repeat 100% 100%;
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
top: 12px;
display: none;
width:100%;
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
#crop_gif_images_gif{
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
#crop_gif_images_gif:hover {
	background: #296191;
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

.bigbox, #divMiniIcons{
	left:10px !important;
}
.bigbox, #divMiniIcons{
	left:10px !important;
}


   
div.upload {
    width: 70px;
    height: 68px;
    background: url(/img/site_img/upload.png);
	background-repeat:no-repeat;
    overflow: hidden;
}   
.upload:hover {
    width: 72px;
    height: 68px;
    background: url(/img/site_img/upload.png);
    overflow: hidden;
	background-repeat:none;
}

div.upload input {
    display: block !important;
    width: 70px !important;
    height: 68px !important;
    opacity: 0 !important;
    overflow: hidden !important;
}
.verticalLine {
    border-left: 2px solid #f2f2f2;
}
.verticalLine_sm {
    border-left: 1px solid #f2f2f2;
}
.left-image{
    position: absolute;
	width:100%;
	height:auto;
}
.right-image{
    right: 20%;
    left: 40%;


}.right-image-last{
    position: absolute;
    margin-top:200px;
}
</style>
<!-- For cropper -->
<link href="/include/croppic/assets/css/croppicprofile.css" rel="stylesheet" />
		
<!-- Basic Styles -->
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>

</head>
<body class="fixed-header ubuntu_all">
<!-- HEADER -->
<?php 
include "inc/user_header.php";?>

<!-- BEGIN NAVIGATION -->
<div class="row">
<div class="padding-10 margin-10" style="margin:10px;padding:10px;">
<?php 
 get_myshopnames($user_id);
?>
</div>
</div>
<!-- END NAVIGATION -->
<!-- MAIN PANEL -->
<div id="main" role="main">
<!-- MAIN CONTENT -->

<DIV> 
<?php footer(); ?>	</DIV>
</div>

		<?php //chat_box($user_id); ?>

<?php 
//include required scripts
include("inc/scripts.php"); 
//include footer
include("inc/google-analytics.php"); 
?>


<input type="hidden" id="no_code_an" value="<?php echo substr( md5($user_id), 5); ?>" /> 
<input type="hidden" id="user_id" value="<?php echo $user_id; ?>" /> 
<input type="hidden" id="text_reev_hold_val" value="" /> 
<input type="hidden" id="username" value="<?php echo safe_input($_SESSION['username']) ; ?>" /> 
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
<input type="hidden" id="myfile_total" value="" />

<!-- Cropper stuff -->
<script src="include/croppic/croppic.min.js"></script>

<script src="include/croppic/assets/js/main.js"></script>

<script>
	var user_id = $( '#user_id' ).val();
	//var userName = $('#user').val();
	var croppicHeaderOptions = {
			//uploadUrl:'uploader_user_pic.php',
			cropData:{
				"user_id":user_id
				//"shop_name":shop_name
			},
			cropUrl:'user_pic_crop_to_file.php',
			customUploadButtonId:'cropContainerHeaderButton',
			modal:false,
			processInline:true,
			loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
		//	onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
			//onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
			//onImgDrag: function(){ console.log('onImgDrag') },
			//onImgZoom: function(){ console.log('onImgZoom') },
			//onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') } ,
			onAfterImgCrop:function(){location.reload() }
			//onError:function(errormessage){ 	} 
	}	
	var croppic = new Croppic('croppic', croppicHeaderOptions);
</script>
</body>
</html>