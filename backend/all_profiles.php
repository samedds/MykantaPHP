<?php 
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";

$user_id = $_SESSION['id'];
$account_id = $_SESSION['id'];
$owner_id = $_SESSION['id'];
//echo "Welcome your Profile is Loading...";	
$current = strtotime('2016-03-26 12:37:17');  
$ded = strtotime('2016-03-26 11:37:17');  
 'time def : '.$result = $current - $ded;
 include "include/status_ins.php";
// include "include/chat/chat.php";	
?>
<html lang="en-us">
<meta charset="utf-8" />
<head>
<title>User Pics</title>
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

<!-- styles and scripts needed by jScrollPane -->
<link type="text/css" href="/include/jscrollpane/jquery.jscrollpane.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="/include/jscrollpane/jquery.mousewheel.js"></script>
<script type="text/javascript" src="/include/jscrollpane/jquery.jscrollpane.js"></script>
 
<script type="text/javascript" src="/include/fancybox/source/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/include/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript">
        $(document).ready(function(){
           $(window).scroll(function() {
    if($(document).height() - 70 <= $(window).height() + $(window).scrollTop()){
           // ajax call get data from server and append to the div
		    // - $(window).height()
			//alert('good');
			//$("#load_reev_button").click();
			document.getElementById("load_reev_button").click();
			//$(document).on("click", "#load_reev_button", function(){
			//do something
				
            console.log($(window).scrollTop()+' + '+$(window).height()+' = '+$(document).height()); 
    } 
	/*else {	alert($(window).scrollTop()+'  ---   '+$("body").scrollTop()+'  ---   '+$(document).height()+'  ----  '+$(window).height());
	}*/
});
            
        });
    </script>
<script type="text/javascript">
	function tag_interest(tag)
{
		
		//var tag =  $("#Food_input").val();
		
		if(tag != ""){
			$.post("include/tag_interest.php", {tag: tag})
			.error(function()
			   {
				
			   })
		  	.success(function( data )
			   {
			   	 $("#"+data).html('<button class="btn btn-success" type="submit" style="color:white;" value="'+data+'">'+data+'</button>');
				
			   });
		}
		return false;
	}	
	  
	   
	</script>
	
	<script type="text/javascript">
	function de_c(id)
{
		
		//var tag =  $("#Food_input").val();
		
		if(id != ""){
			$.post("include/delete_comment.php", {id: id})
			.error(function()
			   {
				
			   })
		  	.success(function( data )
			   {
			   	 $("#my_gif_holder").html(data);
				//console.log('responds : '+data);
			   });
		}
		return false;
	}	
	  	function de_c_collection(id)
{
		
		//var tag =  $("#Food_input").val();
		
		if(id != ""){
			$.post("include/delete_comment.php", {id_con: id})
			.error(function()
			   {
				
			   })
		  	.success(function( data )
			   {
			   	 //$("#my_gif_holder").html(data);
				// $('#superbox_list'+id+'').fadeOut('slow');
				 $('#posidid'+id+'').fadeOut('slow');
				 $('#collxn_box'+id+'').fadeOut('slow');
				//console.log('responds : '+data);
			   });
		}
		return false;
	}	
	  
	   
	</script>
	
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
		
		  $("#tag_interest_Sports").click(function(){	
		tag = $("#tag_interest_Sports").val();
	  	alert('tag');
	  	//alert(tag);
		//tag_interest(tag);
		 });
		
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
<script type="text/javascript" src="/js/tag_interest.js" ></script>
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

   
div.upload {
    width: 90px;
    height: 68px;
    background: url(/img/site_img/upload.png);
	background-repeat:no-repeat;
    overflow: hidden;
}   
.upload:hover {
    width: 90px;
    height: 78px;
    background: url(/img/site_img/upload.png);
    overflow: hidden;
	background-repeat:none;
}

div.upload input {
    display: block !important;
    width: 90px !important;
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
<body class="fixed-header ">
<!-- HEADER -->
<?php 
include "inc/user_header.php";?>
<?php//     header_up($user_id) ; ?>
<!-- END HEADER -->
<!-- BEGIN NAVIGATION -->
<?php 
nav($user_id);
?>
<!-- END NAVIGATION -->
<!-- MAIN PANEL -->
<div id="main" role="main">
<!-- MAIN CONTENT -->
<div id="" style="">

<div class="row">
<div class="col-md-12">
 <ul class="list-inline" style="">
			<?php get_friendnames_all(); ?></ul>
<!-- end row -->
</div>
</div>
</div><DIV> <?php footer(); ?>	</DIV>
</div>

<?php chat_box($user_id);
function  get_friendnames_all()
{
include"include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query_sub = "SELECT COUNT(username) FROM registration";
$query4user_info = mysqli_query($link,$query_sub);
$query_count = mysqli_fetch_row($query4user_info);

/*
$query_reev = "SELECT DISTINCT owner_id  FROM account_comment";
if($query4user_info_reev = mysqli_query($link,$query_reev)){
while($query_count_reev = mysqli_fetch_array($query4user_info_reev)){
 $array_new = $query_count_reev['owner_id'];
 $new_tags = explode('', $array_new);
echo $new_tags;
}} */
$query_email = "SELECT COUNT(email) FROM verify_user_auth WHERE value = '1'";
$query4user_infoemail = mysqli_query($link,$query_email);
$query_count_email = mysqli_fetch_row($query4user_infoemail);
$variance = $query_count[0] - $query_count_email[0];

echo '<h3 class="alert alert-info"> '.$query_count[0].' Users   '.$query_count_email[0].' Verified emails.  Non-Verified '.$variance.'   </h3>';
 

$sql = "SELECT * FROM registration ORDER BY id DESC ";
$query = mysqli_query($link,$sql);
echo '<ul class="padding-10 list-inline" style="">';
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$friend_username = safe_input($row["username"]);
$firstname = safe_input($row["firstName"]);
$username = safe_input($row["username"]);

$firstname23 = safe_input($row["firstName"]);
 $firstname2356 = substr($username, 0, 13).'';
$friend_id = safe_input($row["id"]);

$query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id";

$query4profilepic = mysqli_query($link,$query2);	

if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$friend_pic = safe_input($profile_pic['image_loc']);
echo '<li class="" style="padding:0px; margin:0 2px 5px;width:140px;"><a href="/connection_auth/'.$username.'" class=""><img  src="/img/avatars/mini/'.$friend_pic.'"title="'.$friend_username.'" class="img-circle" height="35" title="'.$friend_username.'"> '.$firstname2356 .' </a></li>';
}
}
else
{
$friend_pic = safe_input('images/piclist.jpg'); 
echo '<li class="" style="padding:5px; margin:0 2px 5px; width:130px;"><a href="/connection_auth/'.$username.'"><img  src="'.$friend_pic.'"title="'.$friend_username.'"height="35" title="'.$friend_username.'"> '.$firstname2356 .'</a></li>';
}
}
echo '</ul>';		 

}	 
?>	

<?php 
//include required scripts
include("inc/scripts.php"); 
//include footer
include("inc/google-analytics.php"); 
?>


	<!-- Start Chat -->
		<!-- SmartChat UI : plugin
		<script src="/js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="/js/smart-chat-ui/smart.chat.manager.min.js"></script> -->
	<!-- End Chat -->
<input type="hidden" id="no_code_an" value="<?php echo md5($user_id); ?>" /> 
<input type="hidden" id="user_id" value="<?php echo $user_id; ?>" /> 
<input type="hidden" id="text_reev_hold_val" value="" /> 
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
			onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
			onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
			onImgDrag: function(){ console.log('onImgDrag') },
			onImgZoom: function(){ console.log('onImgZoom') },
			onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
			onAfterImgCrop:function(){ console.log(response)}, //location.reload()
			onError:function(errormessage){ console.log('onError:'+errormessage) }
	}	
	var croppic = new Croppic('croppic', croppicHeaderOptions);
</script>
</body>
</html>