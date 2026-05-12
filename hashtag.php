<?php 
ini_set('session.cookie_httponly',true);
//include "include/sessionfile.php";
ob_start();
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";

$user_id = $_SESSION['id'];
$owner_id = $_SESSION['id'];
 $new_str  = preg_replace('/[^A-Za-z0-9\_\ ]/ ', '', $_GET['tag_id']);
$hashtag = safe_input($new_str);
if(!isset($_SESSION['id']))
{
  header("location:/hashtags_o/$hashtag");
}

?>
<html lang="en-us">
<meta charset="utf-8" />
<head>
<title>#<?php echo $hashtag; ?></title>
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
 	
	function report_abuse(id)
{
		
		//var tag =  $("#Food_input").val();
		
		if(id != ""){
			$.post("include/delete_comment.php", {report_abuse: id})
			.error(function()
			   {
				
			   })
		  	.success(function( data )
			   {
			   	 $("#report_abuse").html('Reported');
				 console.log('responds : '+data);
			   });
		}
		return false;
	}	
 
		</script>
	
	<script type="text/javascript">
 
	   
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

 

.myscroll{
overflow: auto !important;
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

   
 
.verticalLine {
    border-left: 2px solid #f2f2f2;
}
.verticalLine_sm {
    border-left: 1px solid #f2f2f2;
}
.left-image{
    position: absolute;
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
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class=" ">
<div class="row ">
<div class="col-md-12">
<div class="row">
	<div class="col-md-12 ">
		<ul class="nav nav-tabs  ">
			<li class="active" style="width:110%;">
				<a href="#a1"  data-toggle="tab"><span class="" style="" > Reevs | #<?php echo $hashtag; ?></span>
				</a>
			</li> 
		</ul>
	</div>
</div>
<div class="tab-content no-padding"style="font-size:0.9em;" >
	<div class="tab-content no-padding">
		<div class="tab-pane fade in active no-padding" id="a1">								
			<div class="col-sm-12 no-padding">
				<div class="comment-holder-ul list-inline no-padding" >
					<?php	hastag_text($new_str);
					//get_friend_profile_notify(); ?>
				</div>	
			</div>
		</div>
		
	</div>
	<!-- end tab -->
</div>
<!-- end row -->
</div>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hidden-xs  " style="background:#f8f8f8; ">
<div  class="row  " style="background:#f8f8f8; box-shadow:inset 1px 0px 1px 0px #e1e1e1; height:100vh; position:fixed;">
 <div class="col-sm-12 col-md-8 col-lg-8 no-padding" style=" ">
 <div class="row">
	<div class="col-md-12 ">
		<ul class="nav nav-tabs  ">
			<li class="active" style="width:100%;">
				<a href="#a1"  data-toggle="tab"><span class="" style="" ><i class="fa fa-tag text-muted"></i> Incoming Tags</span></a>
			</li> 
		</ul>
	</div>
</div>
	 <div class=" verticalLine customs_croll padding-5" style="height:90vh; list-style:none;">
	 <?php  comment_hashtags();?><?php // imncoming_hashtags();?>
	 <?php echo ' <div class="no-padding">
	<div class="col-md-12 no-padding">
		<ul class="nav nav-tabs  ">
			<li class="active" style="width:100%;">
				<a href="#a1"  data-toggle="tab"><span class="" style="" ><i class="fa fa-group text-muted"></i> People you may know</span></a>
			</li> 
		</ul>
	</div>
</div>'; conn_suggest_desktop();?>
	</div>	
 </div>
 <div class="col-sm-12 col-md-4 col-lg-4  padding-10" style="margin-top:0px; background:#fff; ">
  
	 <div class=" padding-10 " style="margin-left:-20px;">
       <strong class="padding-10 margin-10 text-muted" style="margin-top:10px;">Suggested</strong><hr class="no-margin no-padding"/>
         <div class=" customs_croll  no-margin"   style="height:50vh; list-style:none;">
           <?php get_shop_suggested(); ?>
		 </div>
	</div> 
    
	 
 </div>

</div>

									
</div>

</div>


</div><DIV> <?php footer(); ?>	</DIV>
</div>

		<?php chat_box($user_id); ?>

<?php 
//include required scripts
include("inc/scripts.php"); 
//include footer
include("inc/google-analytics.php"); 
?>
 
	<div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="uploadModalCloseBtn">
					&times;
					</button>
					<h4 class="modal-title" id="myModalLabel">Camera or Images</h4>
				</div>
				<div class="modal-body">
				 <!-- <div id="croppic_gif" style="background-color:#F5F5F5;"></div>
				    <div id="croppic_gif_2" style="background-color:#F5F5F5;"></div>
				<span class="btn" id="crop_gif_images_gif">Upload Picture</span>
-->            <p class="padding-5"><badge class="badge badge-primary"><i class="fa fa-info"></i></badge> <span class="text-muted" style="font-size:0.9em;" >Kindly take pictures from your camera or select images that are almost the same height and width for a perfect GIF.</span> 
</p>
<div class="row">
<ul class="bootstrapWizard form-wizard" style="width:100%;">
	<li class="active" data-target="#step1" style="width:50%;">
		<a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Capture</span> </a>
		  <div class="upload " style="margin-top:20px; margin-left:70px;">
                        <input type="file"  id="upload_button" name="upload"/>
                      </div> 
	</li>
	<li class="active pull-right" data-target="#step2" style="width:50%;">
		<a href="#tab1" data-toggle="tab"> <span class="step">2</span> <span class="title">Create</span> </a><br>
			<div class="" style=""id="saveGifBtn"><img src="/img/site_img/gif_logo.png" style="height:60px;"/></div>
	</li> 
</ul></div>
<div class="text-success upload_message"></div>
					<br clear="all" />
				<div class="wrapper " >
							<div id="gifImgHolder" class="row padding-10"></div>
						</div>
					
				 
						<div class="wrapper ">
							<div id="vpb_uploads_error_displayer"></div>
							<div id="vpb_uploads_displayer"></div>
							<div id="vpb_uploads_pop"></div>
							<br clear="all" />
						</div>
				 
				
					<div class="padding-5">
						<button class="btn-default" id="empty_gif" type="" > <i class="fa fa-trash-o"></i> Clear All</button>
						<button class="btn-default" id="vpb_uploads_number" type="" > 0 </button>
						<button class="btn-default" id="img_del" type="" ><i class="fa fa-reply"></i> Undo </button>
					</div>
					
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
				Close
			</button>
				</div>
				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>	
	

	<div class="modal fade" id="ur_interest_tag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="uploadModalCloseBtn">
					&times;
					</button>
					<h4 class="modal-title" id="myModalLabel">Your Interesting Tags</h4>
				</div>
				<div class="modal-body">
				    <p class="padding-5"><badge class="badge badge-primary"><i class="fa fa-info"></i></badge> <span class="text-muted" style="font-size:0.9em;" >People will find you through your tags. </span> 
				  </p>
                 <div class="wrapper " >
			   	<div class="row padding-10"></div>
					 <ul class="list-inline" id="ur_tags_holder" >
						
						</ul>
				</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" onClick="retag();" class="btn btn-default" id="retag_btn">
					ReTag</button>	
					<button type="button" onClick="tag_search();" class="btn btn-default">
					Search for people in your tags</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">
				Close
			</button>
				</div>
				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<!-- Start Chat -->
		<!-- SmartChat UI : plugin
		<script src="/js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="/js/smart-chat-ui/smart.chat.manager.min.js"></script> -->
	<!-- End Chat -->
<input type="hidden" id="no_code_an" value="<?php echo substr( md5($user_id), 5); ?>" /> 
<input type="hidden" id="user_id" value="<?php echo $user_id; ?>" /> 
<input type="hidden" id="text_reev_hold_val" value="" /> 
<input type="hidden" id="username" value="<?php username_only($user_id) ; ?>" /> 
<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" /> 
 
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