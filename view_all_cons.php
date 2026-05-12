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
$current = strtotime('2016-03-26 12:37:17');  
$ded = strtotime('2016-03-26 11:37:17');  
 'time def : '.$result = $current - $ded;
include "include/status_ins.php";		  
?>
<html lang="en-us">
<meta charset="utf-8" />
<title>Connections</title>
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
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
			helpers:  {
				title : {
					type : 'inside'
				},
				overlay : {
					showEarly : false
				}
			}
		});
		$('.smyscroll').jScrollPane();
	});
</script>
<script type="text/javascript">
function show_share(post_id)
{
 // document.getElementById('share_'+post_id+'').show(); 
   $('#share_'+post_id+'').fadeIn('slow');
}
</script>
<script type= "text/javascript" src = "/js/comment_profile.js"></script>
<script type= "text/javascript" src = "/js/clear_cart.js"></script>
<script type= "text/javascript" src = "/js/settings_user.js"></script>
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
@media screen and (max-width: 450px) 	{
	.nav-tabs li{
	
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

.load_reev_button {
border-top-color: #CDC7FF;border-right-color: #7379CA;border-bottom-color: #5F83CA;border-left-color: #7379CA;border-width: 0px 1px 1px 1px;border-style: solid; -webkit-border-radius: 17px; -moz-border-radius: 17px;border-radius: 17px;font-size:11px;font-family:lucida sans unicode, lucida grande, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3); color: #FFFFFF;
 background-color: #49c0f0; background-image: -webkit-gradient(linear, left top, left bottom, from(#49c0f0), to(#2CAFE3));
 background-image: -webkit-linear-gradient(top, #49c0f0, #2CAFE3);
 background-image: -moz-linear-gradient(top, #49c0f0, #2CAFE3);
 background-image: -ms-linear-gradient(top, #49c0f0, #2CAFE3);
 background-image: -o-linear-gradient(top, #49c0f0, #2CAFE3);
 background-image: linear-gradient(to bottom, #49c0f0, #2CAFE3);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#49c0f0, endColorstr=#2CAFE3);
   }
.load_reev_button:hover {
   
 border-top-color: #D4D4D4;border-right-color: #D4D4D4;border-bottom-color: #D4D4D4;border-left-color: #D4D4D4;border-width: 0px 1px 1px 1px;border-style: solid;
 background-color: #1ab0ec; background-image: -webkit-gradient(linear, left top, left bottom, from(#1ab0ec), to(#1a92c2));
 background-image: -webkit-linear-gradient(top, #1ab0ec, #1a92c2);
 background-image: -moz-linear-gradient(top, #1ab0ec, #1a92c2);
 background-image: -ms-linear-gradient(top, #1ab0ec, #1a92c2);
 background-image: -o-linear-gradient(top, #1ab0ec, #1a92c2);
 background-image: linear-gradient(to bottom, #1ab0ec, #1a92c2);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#1ab0ec, endColorstr=#1a92c2);
   }

</style>
<!-- For cropper -->
<link href="/include/croppic/assets/css/croppicprofile.css" rel="stylesheet" />
		
<!-- Basic Styles -->
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css"><link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>

</head>
<body class="fixed-header ubuntu_all">
<!-- HEADER -->
<?php 
include "inc/user_header.php";?>
<!-- END HEADER -->
<!-- BEGIN NAVIGATION -->
<!-- END NAVIGATION -->
<!-- MAIN PANEL -->
<div id="main" role="main">
<!-- MAIN CONTENT -->
<div id="content" style="margin-top:0px;">
<div class="row wall paper img img-rounded" style=" margin-top:-10px;">
<div class="" >
<h1 style="color:black; margin-left:40px;">
My Friends
</h1>
<ul style="margin-right:40px;">
  <?php
  $main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='1' OR friend_id='$user_id' AND value='1'";		 

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

if($friend_count < 1){
$friendsHTML = $user_id." has no Connections yet";
}
else
{ 
include "include/conxn.php";  	
$max =50;
$all_friends = array();
$sql = "SELECT account_id FROM friends WHERE friend_id='$user_id' AND value='1' ORDER BY id";
$query = mysqli_query($link,$sql);

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
$new =  safe_input($row["account_id"]);
array_push($all_friends,$new);
}
$sql = "SELECT friend_id FROM friends WHERE account_id='$user_id' AND value='1' ORDER BY id";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
$new = safe_input($row["friend_id"]);
array_push($all_friends,$new );
}

$friendArrayCount = count($all_friends);
if($friendArrayCount > $max)
{ 
array_splice($all_friends, $max);
}
$orLogic = '';
foreach($all_friends as $key => $user){
$orLogic .= "id='$user' OR ";
}
$orLogic = chop($orLogic, "OR ");
$sql = "SELECT * FROM registration WHERE $orLogic ORDER BY firstName ASC";
$query = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
$friend_username = safe_input($row["username"]);
$firstname = safe_input($row["firstName"]);
$firstname = ucwords(strtolower($firstname));

$friend_id = safe_input($row["id"]);
$username = safe_input($row["username"]);

$query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";

$query4profilepic = mysqli_query($link,$query2);	
if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$friend_pic = safe_input($profile_pic['image_loc']);
echo'
<li class-"padding-10 margin-10" style="margin:10px;">
<a href="/connection/'.$username.'"style=""><img  src="/img/avatars/mini/'.$friend_pic.'" title="'.$friend_username.'" width="20px" class="img"><span > '.$username.'</span></a> <a class=" hidden pull-right">Un-connect</a></li>';
}
else
{
$friend_pic = safe_input('images/piclist.jpg'); 
echo '<li class-"padding-10" ><a href="/connection/'.$username.'"style=""> '.$username .' </a> <button class="btn btn-default btn-sm pull-right">Un-connect</button></li>';
}
}
		 
}
  ?>
</ul>
</div>
<div class="col-sm-8"></div>

</div>
<div> <?php footer(); ?>	
</div>
</div>
</div>

		<?php chat_box($user_id); ?>

<?php 
//include required scripts
include("inc/scripts.php"); 
//include footer
include("inc/google-analytics.php"); 
?>
<div class="modal fade" id="changeprofilepic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:360px;">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>
			<h4 class="modal-title" id="myModalLabel">Change your Profile picture</h4>
		</div>
		<div class="modal-body">
		   <div class="row">
				<div id="croppic" style="background-color:#F5F5F5;"></div>
				<span class="btn" id="cropContainerHeaderButton">Upload Picture</span>
		   </div>
		</div>	
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		</div>		
	</div>
</div>		
</div><!-- /.modal-content -->

<!--
<div class="modal fade" id="addimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">Add up to 5 pictures of your product</h4>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<div class="col-md-6">
</div>	
</div>
</div>             
<div class="btn btn-primary"id="upload_button">Browse Images</div>
<div class="text-success upload_message"></div><br clear="all" />
<center>
<div class="wrapper " align="center">
<div id="vpb_uploads_error_displayer"></div>
<div id="vpb_uploads_displayer"></div>
<br clear="all" />
</div>
</center>
</div>
</div>
</div>
</div>
-->
	<div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="uploadModalCloseBtn">
					&times;
					</button>
					<h4 class="modal-title" id="myModalLabel">Upload Images to create Reev Gif</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-6">
							</div>	
						</div>
					</div>             
					<div class="btn btn-primary"id="upload_button">Browse Images</div>
				   <!-- <div id="croppic_gif" style="background-color:#F5F5F5;"></div>
				    <div id="croppic_gif_2" style="background-color:#F5F5F5;"></div>
				<span class="btn" id="crop_gif_images_gif">Upload Picture</span>
-->            <p class="padding-10">The height and width of the first image uploaded will  be used.</p>
 <p class="padding-10">All the images should be approximately the same height and width.</p>

					<div class="text-success upload_message"></div>
					<br clear="all" />
					<center>
						<div class="wrapper " align="center">
							<div id="vpb_uploads_error_displayer"></div>
							<div id="vpb_uploads_displayer"></div>
							<br clear="all" />
						</div>
					</center> 
					<br clear="all" />
					<center>
						<div class="wrapper " align="center">
							<div id="gifImgHolder" class="row"></div>
						</div>
					</center>
				</div>
				<div class="modal-footer">
					<div class="btn btn-primary" id="saveGifBtn">Save</div><button type="button" class="btn btn-default" data-dismiss="modal">
				Cancel
			</button>
				</div>
				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<!-- Start Chat -->
		<!-- SmartChat UI : plugin -->
		<script src="/js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="/js/smart-chat-ui/smart.chat.manager.min.js"></script>
	<!-- End Chat -->
<input type="hidden" id="no_code_an" value="<?php echo md5($user_id); ?>" /> 
<input type="hidden" id="user_id" value="<?php echo $user_id; ?>" /> 
<input type="hidden" id="username" value="<?php username_only($user_id) ; ?>" /> 
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
<script src="include/croppic/croppic.min_gif.js"></script>
<script src="include/croppic/assets/js/main.js"></script>

<script>
	var user_id = $( '#user_id' ).val();
	//var userName = $('#user').val();
	var croppicHeaderOptions = {
			//uploadUrl:'img_save_to_file.php',
			cropData:{
				"user_id":user_id
				//"shop_name":shop_name
			},
			cropUrl:'user_pic_crop_to_file.php',
			customUploadButtonId:'cropContainerHeaderButton',
			modal:false,
			processInline:true,
			loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
			onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
			onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
			onImgDrag: function(){ console.log('onImgDrag') },
			onImgZoom: function(){ console.log('onImgZoom') },
			onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
			onAfterImgCrop:function(){ /*console.log('onAfterImgCrop')*/location.reload() },
			onError:function(errormessage){ console.log('onError:'+errormessage) }
	}	
	var croppic = new Croppic('croppic', croppicHeaderOptions);
</script>
 <script>
	var user_id = $( '#user_id' ).val();
	//var userName = $('#user').val();
	var croppiccrop_gif_images = {
			//uploadUrl:'img_save_to_file.php',
			cropData:{
				"user_id":user_id
				//"shop_name":shop_name
			},
			cropUrl:'user_pic_crop_gif_images.php',
			customUploadButtonId:'crop_gif_images_gif',
			modal:false,
			processInline:true,
			loaderHtml:'<div class="loader bubblingG_gif"><span id="bubblingG_4"></span><span id="bubblingG_5"></span><span id="bubblingG_6"></span></div> ',
			//onBeforeImgUpload_gif: function(){ console.log('onBeforeImgUpload_gif') },
		//	onAfterImgUpload_gif: function(){ console.log('onAfterImgUpload_gif') },
		//	onImgDrag: function(){ console.log('onImgDrag') },
		//	onImgZoom: function(){ console.log('onImgZoom') },
		//	onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
		//onAfterImgCrop:function(){console.log('onAfterImgCrop') },
		//	onError:function(errormessage){ console.log('onError:'+errormessage) }
	}	
	var Croppic_gif = new Croppic_gif('croppic_gif', croppiccrop_gif_images).append;
	 
</script> 

</body>
</html>