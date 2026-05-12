<?php 
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php"; 
include "include/status_ins.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";

$user_id = $_SESSION['id'];
$username = $_SESSION['username'];
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
<title>Profile</title>
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
 

<script type="text/javascript">  

$(document).ready(function()
{
	$('#input_value2').click(function(){
	$("#warning1").html("Please wait..."); 
	 $("#gif_image_holder").html(' Loading...');
	  var convert = $('#input_value').val();
	  var current_time_vid = $('#current_time_vid').val();
	  var rane = $('#time_value').val();
	  var video_rex =  $("#video_rex").val();
	 if(convert != "")
	{  
		$.post( "ajax_convert.php " ,
			   {
				   convert : convert,
				   current_time_vid : current_time_vid,
				   rane : rane,
				   video_rex : video_rex,
				   cache: false
			   })
			  .error(
				   function( )
				   {
					$("#warning1").html("Please wait..."); 
				   })
			  .success(
			   function( data )
			   {
				   
				   var num = Math.random();
				  $("#warning1").html(" "); 
				  $("#output2").show();  
				  $('#myfile').val(data);
				  $('#myfile_total').val(25);
				  $("#gif_value").val(data);  
				 setTimeout(function(){ $("#gif_image_holder").html(' <img src="img/comments_images/'+data+'.gif?v='+num+'" style="width:300px;"/><p>'+data+'</p>');},3000);
			});
}
});
});
</script>
<script type="text/javascript">

    $(document).ready(function(){

           $(window).scroll(function() {
    if($(document).height() - 400 <= $(window).height() + $(window).scrollTop()){
           // ajax call get data from server and append to the div
		    // - $(window).height()
			//alert('good');
			//$("#load_reev_button").click();
		 	document.getElementById("load_reev_button").click();
			//$(document).on("click", "#load_reev_button", function(){
			//do something
				
          //  console.log($(window).scrollTop()+' + '+$(window).height()+' = '+$(document).height()); 
    } 
	/*else {	alert($(window).scrollTop()+'  ---   '+$("body").scrollTop()+'  ---   '+$(document).height()+'  ----  '+$(window).height());
	}*/
	
	if($(window).scrollTop() > 120   ){  $("#gif_mb_btn").fadeOut('slow'); }
	
	if($(window).scrollTop() <= 120   ){  $("#gif_mb_btn").fadeIn('slow');}
	
	
	if($(window).scrollTop() >= 125   ){  $("#the-sticky-div").addClass('sticky');}
	if($(window).scrollTop() <= 124   ){  $("#the-sticky-div").removeClass('sticky');}
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
	function freemee()
{
			 $("#freemee").fadeIn('slow');
		//var tag =  $("#Food_input").val();
	 
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
				 console.log('responds : '+data);
			   });
		}
		return false;
	}	
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
 function use_as_profile(use_gif,post_id)
{ 
     	if(use_gif != ""){
			// alert(use_gif);
			
			  $.post("/ajax/collection_load_each.php",  
					{
						use_gif_1 : "task_use_gif_1",
					  use_gif : use_gif,
					  post_id : post_id,
					   
					 	cache: false,
					})
					
			.error(function(response)
			   {
			   console.log(response );
				 $("#pic").css('border' , '1px solid red');
				// $("#pic").html(data);
		        //$("#pic_header").css('border' , '1px solid red');
			   })
		  	.success(function( response )
			   { //console.log(response );
			   $("#pic").html('<img class="img-thumbnail img-circle" style="max-height:120px;"src="/img/comments_images/'+use_gif+'.gif"/><div class="hover-toggle " align="left"><div class=" btn-default" id="changeprofilepicbtn" data-target="#changeprofilepic" data-toggle="modal" style="opacity:0.5;  "><i class="fa fa-camera"></i> Change</div></div>');
		      $("#pic_header").html('<img class=" img-circle  img-thumbnail" width="55"  style="margin-top:-30px; " src="/img/comments_images/'+use_gif+'.gif"/> <b class="caret"> </b> ');
			   }); 
		}
		 
	}	
	  
	   
	</script>	
	<script type="text/javascript">
 function download_file(image_loc,post_id)
{ 
     	if(image_loc != ""){
			// alert(use_gif);
			
			  $.post("/ajax/collection_load_each.php",  
					{
						download_file : "download_file",
					  image_loc : image_loc,
					  post_id : post_id,
					   
					 	cache: false,
					})
					
			.error(function(response)
			   {
			   //console.log(response );
				 $("#pic").css('border' , '1px solid red');
				// $("#pic").html(data);
		        //$("#pic_header").css('border' , '1px solid red');
			   })
		  	.success(function( response )
			   { 
  			    alert(response);
			   }); 
		}
		 
	}	
	  
function collexn_tab_btn()
{ 

       $('#collexn_tab_btn').html('<center><div class=" "><img src="/img/site_img/image.gif"/></div></center>');
	  // document.getElementById('load_more_reev_box'+num+'').innerHTML = ' <div class="btn btn-default"><img src="/img/site_img/image.gif"/></div>'; 
       $.post("/ajax/collection_load_each.php",  
					{
						collexn_tab_btn : "collexn_tab_btn",
					 	cache: false,
					})
					
			.error(function(response)
			   {
			   $('#collexn_tab_btn').html('<p class="padding-10"> There was a problem!</p>');
			   //console.log(response );
				// $("#pic").css('border' , '1px solid red');
				// $("#pic").html(data);
		        //$("#pic_header").css('border' , '1px solid red');
			   })
		     	.success(function( response )
			   {  $('#slmss').html('<a href="#a3"  data-toggle="tab"><span class=" hidden-xs hidden-sm"> <i class="fa fa-th-large"></i> Collections</span><center class="hidden-md hidden-lg"> <i class="fa fa-th-large  fa-2x "></i>  </center></a>');
			     $('#collexn_tab_btn').html(response);
			    
			   }); 
	
		 
	}	

function connecxn_tab_btn()
{ 

       $('#connecxn_tab_btn').html('<center><div class=" "><img src="/img/site_img/image.gif"/></div></center>');
	  // document.getElementById('load_more_reev_box'+num+'').innerHTML = ' <div class="btn btn-default"><img src="/img/site_img/image.gif"/></div>'; 
       $.post("/ajax/collection_load_each.php",  
					{
						connecxn_tab_btn : "connecxn_tab_btn",
					 	cache: false,
					})
					
			.error(function(response)
			   {
			   $('#connecxn_tab_btn').html('<p class="padding-10"> There was a problem!</p>');
			   //console.log(response );
				// $("#pic").css('border' , '1px solid red');
				// $("#pic").html(data);
		        //$("#pic_header").css('border' , '1px solid red');
			   })
		     	.success(function( response )
			   { 
			     $('#connecxn_tab_btn').html(response);
				  $('#connecxn_tab_btn_holder').html('<a href="#a2" data-toggle="tab"  "><span class=" hidden-xs hidden-sm"><i class="fa fa-group   "></i> Connections</span><center class="hidden-lg hidden-md"><i class="fa fa-group fa-2x "></i> </center></a>');
			   }); 
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
<?php 
nav($user_id);
?>
<!-- END NAVIGATION -->
<!-- MAIN PANEL -->
<div id="main" role="main">
<!-- MAIN CONTENT -->

<div class="row ">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ubuntu_all" style="margin-top:0px;">
<div class="row">
<div class="col-md-12">
<div class="row" style="margin-bottom:-15px;">
	<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4  profile-pic"  align="left" id="newpic">
		<div class="hover pic padding-5" id="pic"   align="left" > <?php  get_profile_pic($user_id); ?>
			<div class="hover-toggle " align="left">
				<div class=" btn-default" id="changeprofilepicbtn" data-target="#changeprofilepic" data-toggle="modal" style="opacity:0.5;  "><i class="fa fa-camera"></i> Change</div>
			</div>
		</div>
		
	</div>
	<div class="col-sm-8 col-xs-8 col-md-9 col-lg-9 padding-10" style="">
		<div class="row padding-5  "style=" position:relative; bottom:0px;">
		 
		     <span class="headline" style="font-size:1.6em; color:black;"><?php echo ucwords($_SESSION['username']);?></span>	
<ul id="sparks" style="text-align: left; background-color:white; margin-top:-5px; margin-left:-15px;"class="hidden-xs padding-10 ">
	<?php 
 profile_info($user_id);
?>
</ul>			
 <ul id="sparks" class="hidden-sm hidden-md hidden-lg" style="text-align: left; background-color:white; margin-top:-10px;">
	<?php 
 profile_info_small($user_id);
?>
</ul>
 
		  <p class=" " title="Product posts loads from your favourite categories" style="font-size:0.9em; cursor:pointer; color:grey; margin-top:-15px;"onCLick="tag_interest_button();">
      			  <i class="fa fa-tag" ></i> Billboard Categories</p>									 </div> 
    </div>
</div>

<div class="row" style="color:black;">
<?php 
 get_myshopnames_profile($user_id);
?>
</div>
  
<hr class="no-margin" style="border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> 	 

<div class="row ubuntu_all " id="the-sticky-div" >
	<div class="col-md-12 ">
		<ul class="nav nav-tabs tabs-pull-left">
			<li class="active" style="width:105%;">
				<a href="#a1"  data-toggle="tab"><span class=" hidden-xs hidden-sm" style="" ><i class="fa fa-calendar-o  "></i> Billboard - <em style="font-size:0.7em; color:black;"> GIF Products from businesses </em></span><span class="hidden-md hidden-lg"> <i class="fa fa-solid fa-calendar-o"> Billboard</i> </span></a>
			</li><!--
		<li>
		<a href="#a2" data-toggle="tab">Activity</a>
		</li> -->
			<!--	<li style="width:24%;" id="slmss">
				<a href="#a3"  data-toggle="tab" onClick="collexn_tab_btn()"><span class=" hidden-xs hidden-sm"> <i class="fa fa-th-large"></i> Gallery</span><center class="hidden-md hidden-lg"> <i class="fa fa-th-large  fa-2x "></i>  </center></a>
			</li>
			<li class="" style="width:24%;">
				<a href="#a4"  data-toggle="tab"><span class=" hidden-xs hidden-sm">Business Updates</span><center class="hidden-md hidden-lg"><i class="fa fa-bell-o fa-2x hidden-lg hidden-md"></i> </center></a>
			</li>
			<li style="width:28%;" id="connecxn_tab_btn_holder">
	<a href="#a2" data-toggle="tab"  onClick="connecxn_tab_btn();"><span class=" hidden-xs hidden-sm"><i class="fa fa-group   "></i> Connections</span><center class="hidden-lg hidden-md"><i class="fa fa-group fa-2x "></i> </center></a>
				</li>-->
		</ul>
	</div>
</div>
<div class="tab-content no-padding" style="font-size:0.9em;" >
	<div class="tab-content no-padding">
		<div class="tab-pane fade in active no-padding" id="a1">								
			<div class="col-sm-12 no-padding">
				<div class="comment-holder-ul list-inline no-padding" >
				
					<div class="hidden" id="my_gif_holder"><?php //get_status_comment_old($owner_id); ?> </div>
						
						 <div id="load_new_reevs" class="" style="margin-top:-10px;margin-right:-5px;" ></div>
						 <div class="" id="load_new_items"><?php	get_status_comment_all_friends($owner_id); ?> 
						</div>
				</div>	
			</div> 
		</div>
	  <div class="tab-pane fade " id="a2">
	<div class="row padding-10" style="margin-left:10px;" id="connecxn_tab_btn">
	<div class="superbox col-sm-12 padding-10 margin-10" id="reev_collection_holder">
	<?php// get_status_comment_f($owner_id); ?>
	<?php //gallery_user_friend($friend_id); ?>
	<div class="superbox-float"></div>
	</div>
	<div id="posid_box"><input type="hidden" id="posid" value=""/></div>
	<input type="hidden" id="posid" value=""/>
	</div>
	</div>
		<div class="tab-pane fade padding-10 no-margin" id="a3" style=" margin:0 0 0 13px">
		<ul class="list-inline" id="collexn_tab_btn" >
			<?php //gallery_user($user_id); ?></ul>
		</div>
		<div class="tab-pane fade  " id="a4">
<ul class="list-inline" style="list-style:none; ;background:#f8f8f8; box-shadow:inset 2px 2px 2px 2px #e1e1e1;">
<?php //get_subscribed_shop_notify_tab(); ?>
</ul>
</div><!-- end tab -->
	</div>
	<!-- end tab -->
</div>
<!-- end row -->
</div>
</div>

</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hidden-xs  " style="background:#f8f8f8; margin-top:-20px;  z-index:2;">
<div  class="row  " style="background:#f8f8f8; box-shadow:inset 1px 0px 1px 0px #e1e1e1; height:100vh; position:fixed; font-size:0.9em;"  >
 <div class="col-sm-12 col-md-8 col-lg-8 no-padding" style="margin-top:30px; "> <strong class=" padding-10" style="color:grey;"><i class="fa fa-globe fa-2x"></i> Activities</strong>
	 <div class="   customs_croll padding-top-5" style="height:90vh; list-style:none;">
	 <?php get_subscribed_shop_notify_tab(); ?>
	</div>	
 </div>
 <div class="col-sm-12 col-md-4 col-lg-4  padding-10" style="margin-top:0px; background:#fff; ">
<?php include "inc/sideright.php";?>
 </div>
</div>									
</div>
</div>

<DIV> 
<?php footer(); ?>	</DIV>
</div>
<div id="gif_mb_btn" ><div class="padding-10 margin-10 hidden hidden-lg hidden-md" onClick="only_text_reev();"  style="width:40px;height:40px; position:fixed; bottom:30px; right:85px; background-color:#ff6c00; border-radius:50px; cursor:pointer;"><center><i class="fa fa-pencil " style="color:white; margin-top:5px;"></i></center></div>
<a  href="javascript:void(0);" data-target="#upload_modal" data-toggle="modal" ><div class="padding-10 margin-10 hidden hidden-lg hidden-md" id="upload_modal_btn" style="width:70px;height:70px; position:fixed; bottom:30px; right:15px; background-color:#ff6c00; border-radius:50px;"><center><i class="fa fa-camera fa-2x" style="color:white; margin-top:10px;"></i></center></div></a></div>
		<?php //chat_box($user_id); ?>

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
					<h4 class="modal-title" id="myModalLabel">Snap pictures from your Camera or from Gallery.</h4>
				</div>
				<div class="modal-body">
				 <!-- <div id="croppic_gif" style="background-color:#F5F5F5;"></div>
				    <div id="croppic_gif_2" style="background-color:#F5F5F5;"></div>
				<span class="btn" id="crop_gif_images_gif">Upload Picture</span>
-->            <p class="padding-5"><badge class="badge badge-primary"><i class="fa fa-info"></i></badge> <span class="text-muted" style="font-size:0.9em;" >Select pictures that have the same height and width for a perfect GIF.</span> 
</p>
<div class="row">
<ul class="bootstrapWizard form-wizard" style="width:100%;">
	<li class="active" data-target="#step1" style="width:33%;">
		<a href="#tab1" data-toggle="tab"> <span class="step">1</span> <div class="upload " style="margin-top:20px; margin-left:30%;">
                        <input type="file"  id="upload_button" name="upload"/>
                      </div>  </a>
		 
	</li>
    <li class="active" data-target="#step2" style="width:34%;">
		<a href="#tab1" data-toggle="tab"> <span class="step">2</span> </a><br>
			<div class="" style=""id=" " style=""><img src="/img/site_img/clock.png" onClick=" freemee();" style="height:60px;margin-top:15px;"/></div>
			 
	</li>
	<li class="active pull-right" data-target="#step3" style="width:33%;">
		<a href="#tab1" data-toggle="tab"> <span class="step">3</span> </a><br>
			<div class="" style=""id="saveGifBtn" style=""><img src="/img/site_img/gif_logo.png" style="height:60px;margin-top:15px;"/></div>
	</li> 
</ul>



 </div> <center  class="smart-form" >
 <p class=""><em class="">GIF Seconds</em></p>
	 <center class="btn-group"id="freemee" style="display:none; margin-left:-30px;">
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="100"  name="rane"id="rane01" type="radio" style="">  <i></i>1</label></span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="200"  name="rane"id="rane02" type="radio" style=" "> <i></i>2</label> </span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="300"  name="rane"id="rane03" type="radio" style=" "> <i></i>3</label> </span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="400"  name="rane"id="rane04" type="radio" style=" "> <i></i>4</label> </span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="500"  name="rane"id="rane05" type="radio" style=" "> <i></i>5</label> </span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="600"  name="rane"id="rane06" type="radio" style=" "> <i></i>6</label> </span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="700"  name="rane"id="rane07" type="radio" style=" "> <i></i>7</label> </span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="800"  name="rane"id="rane08" type="radio" style=" "> <i></i>8</label> </span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="900"  name="rane"id="rane09" type="radio" style=" "> <i></i>9</label> </span>
   <span class="btn btn-xs btn-default " style="width:58px;"> <label class="radio">  <input value="1000"  name="rane"id="rane10" type="radio" style=" "> <i></i>10 </label> </span>
	    </center>
	</center> 
      <div class="hidden" id="convert_button" style="display:none;"> 
	   <div class="row padding-10"> <h2>Convert a Video to GIF</h2>
	   <div class="col-md-6 ">
	  
	  <em> 1. Pause video as your Start point.</em><br>
	  <em> 2. Choose duration from 1 - 10 seconds.</em><br>
	  <em> 3. Click Convert to process GIF.</em>
	
	   	</div>
	   <div class="col-md-6 ">
	  <b>Seconds</b>
		 <span id="ex2CurrentSliderValLabel">: <span id="ex2SliderVal">3</span></span> 
		 <span id="ex8CurrentSliderValLabel">: <span id="ex8SliderVal">3</span></span><br>
		<!-- <input id="ex8" data-slider-id='ex1Slider' type="hidden" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="0"/>-->
		 <b>Gif length in seconds</b>
		 <select id="time_value" name="time_value"  style="border-radius:6px; height:22px; border:1px solid grey;   ">
                    <option value="10">10</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
              </select>
		
		  <input type="hidden" id="input_value" name="convert" /><input type="hidden" id="video_rex" name="video_rex" /><input type="hidden" id="current_time_vid" name="current_time_vid" /><button  class="btn btn-default" id="input_value2" >Convert to GIF</button>
		
	</div>	</div>
	
	 </div> 
      <video id="video" #video width="100%" class="hidden" height="100%"   autoplay></video>

<div class="text-success upload_message"></div> 
					<br clear="all" />
				<div class="wrapper " >
							<div id="gifImgHolder" class="row padding-10"></div>
						</div>
					
				 
						<div class="wrapper ">
						 <div id="warning1"></div>
						      <div id="output2" style="display:none;">
							     <span class="glyphicon glyphicon-ok" style="font-size:1.8em; color:green;"></span>Successfully Converted to GIF.<br/>
								 <input type="hidden" id="gif_value" value="" />
                                   <div class="row padding-10"><div class="col-xs-7 padding-10" id="gif_image_holder"> <img src="" style="width:300px;"/></div><div class="col-xs-5 padding-10"><button class="btn btn-success" id="use_gif">Use GIF as your post.</button><br><br><button class="btn btn-sm btn-default ">Download </button> GIF to local gallery.<br><br><button class="btn btn-sm btn-danger ">Reset </button> </div></div>
					     	</div>
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
	
	
	<div class="modal fade" id="interest_tag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="uploadModalCloseBtn">
					&times;
					</button>
					<h4 class="modal-title" style="color:black;" id="myModalLabel">Welcome <?php echo $_SESSION['username']; ?></h4>
				</div>
				<div class="modal-body">
				<h4 class="text-default" style="color:black;">
				 Thank you for join us,</h4> 
				    <p class="padding-10"> <span class="text-default" style="font-size:1em;" > We are thrilled to welcome you to Mykanta.com, your ultimate destination for creating shop pages and crafting stunning GIFs from your product reviews to showcase your favorite products and share your insights with the world..</span> 
				  </p> 
				  <p class="padding-5"> <span class="text-default" style="font-size:1em;" >
				  <b style="font-size:1.1em;">
				  Mykanta Online Mall - Getting Started</b> <hr>
<p>
<b>Create Your Shop Page: </b>Start by creating your unique shop page. Add product details, images, and links to make your shop page truly stand out.
</p>
<p>
<b>Add Products:</b> Simply provide product details, images, and minimum orer and delivery details.
</p>
<p>
<b>Review Products:</b> You can write detailed reviews on products and shop pages. Sharing your thoughts and insights is a great way to help others make informed purchasing decisions.
</p>
<p>
<b>GIF Creation:</b> The icing on the cake is our GIF creation tool. You can turn your product reviews into eye-catching GIFs that grab attention and convey your enthusiasm effectively.
</p>
<p><br>
				  <b style="font-size:1.1em;">Using the GIF Creation Tool:</b><hr>
</p>
<p>
<b>Access the GIF Tool:</b> To create a GIF, go to the product review you want to transform. You'll find an option to "Create GIF" within the product page.
</p>
<p>
<b>Publish and Share:</b> Once satisfied, publish your GIF and share it with public BIllboard Timeline on MyKanta.com or other social platforms.</p>
</span> </p> 
<hr>

<p class="padding-5"><i class="fa fa-tags fa-2x"></i> <span class="text-default" style="font-size:0.9em;" > Select any of these Tags you like so we suggest Busniesses to you to subscribe.</span> 
				  </p>
 <div class="wrapper " >
<div id="tags_holder" class="row padding-10">
	 <ul class="list-inline">
		<li class="padding-5 " id="News"         ><button class="btn btn-default" type="submit"  value="News"          onclick="tag_interest('News');"           style="color:red;"          >News            </button></li>
		<li class="padding-5 " id="Sports"       ><button class="btn btn-default" type="submit"  value="Sports"        onclick="tag_interest('Sports');"         style="color:#63ba00;"       >Sports          </button></li>
		<li class="padding-5 " id="Music"        ><button class="btn btn-default" type="submit"  value="Music"         onclick="tag_interest('Music');"          style="color:purple;"        >Music           </button></li>
		<li class="padding-5 " id="Health"       ><button class="btn btn-default" type="submit"  value="Health"        onclick="tag_interest('Health');"         style="color:#ffbd55;"      >Health          </button></li>
		<li class="padding-5 " id="Entertainment"><button class="btn btn-default "type="submit"  value="Entertainment" onclick="tag_interest('Entertainment');"  style="color:blue;">  Entertainment   </button></li>
		<li class="padding-5 " id="Food"         ><button class="btn btn-default" type="submit"  value="Food"          onclick="tag_interest('Food');"           style="color:#f615af;"    >Food            </button></li>	
		<li class="padding-5 " id="Movies"       ><button class="btn btn-default" type="submit"  value="Movies"        onclick="tag_interest('Movies');"         style="color:#f615af;"    >Movies          </button></li>
		<li class="padding-5 " id="Events"       ><button class="btn btn-default" type="submit"  value="Events"        onclick="tag_interest('Events');"         style="color:red;"      >Events          </button></li>
		<li class="padding-5 " id="Books"        ><button class="btn btn-default" type="submit"  value="Books"         onclick="tag_interest('Books');"          style="color:#0aa1ff;"        >Books           </button></li>
		<li class="padding-5 " id="History"      ><button class="btn btn-default" type="submit"  value="History"       onclick="tag_interest('History');"        style="color:#63ba00;"        >History         </button></li>
		<li class="padding-5 " id="Automobile"       ><button class="btn btn-default" type="submit"  value="Automobile"        onclick="tag_interest('Automobile');"         style="color:#ff6666;"       >Automobile          </button></li>
		<li class="padding-5 " id="Electricals"         ><button class="btn btn-default" type="submit"  value="Electricals"          onclick="tag_interest('Electricals');"           style="color:#00aa1ff;"       >Electricals            </button></li>
		<li class="padding-5 " id="Internet"     ><button class="btn btn-default" type="submit"  value="Internet"      onclick="tag_interest('Internet');"       style="color:#ff3300;"        >Internet        </button></li>
		<li class="padding-5 " id="Business"     ><button class="btn btn-default" type="submit"  value="Business"      onclick="tag_interest('Business');"       style="color:black;"        >Business        </button></li>
		<li class="padding-5 " id="Animals"      ><button class="btn btn-default" type="submit"  value="Animals"       onclick="tag_interest('Animals');"        style="color:#288a23;"        >Animals         </button></li>
		<li class="padding-5 " id="Education"    ><button class="btn btn-default" type="submit"  value="Education"     onclick="tag_interest('Education');"      style="color:#f615af;"         >Education  </button></li>
		<li class="padding-5 " id="Photography"  ><button class="btn btn-default" type="submit"  value="Photography"   onclick="tag_interest('Photography');"    style="color:red;"      >Photography          </button></li>
		<li class="padding-5 " id="Buildings"    ><button class="btn btn-default" type="submit"  value="Buildings"     onclick="tag_interest('Buildings');"      style="color:#ffbd55;"    >Buildings         </button></li>
		<li class="padding-5 " id="Celebrities"  ><button class="btn btn-default" type="submit"  value="Celebrities"   onclick="tag_interest('Celebrities');"    style="color:indigo;"    >Celebrities     </button></li>
		<li class="padding-5 " id="Cars"         ><button class="btn btn-default" type="submit"  value="Cars"          onclick="tag_interest('Cars');"           style="color:#5bc0de;"    >Cars            </button></li>
		<li class="padding-5 " id="Technology"   ><button class="btn btn-default" type="submit"  value="Technology"    onclick="tag_interest('Technology');"     style="color:blue;"      >Technology      </button></li>
		<li class="padding-5 " id="Gadgets"      ><button class="btn btn-default" type="submit"  value="Gadgets"       onclick="tag_interest('Gadgets');"        style="color:purple;"   >Gadgets         </button></li>
		<li class="padding-5 " id="Fashion"      ><button class="btn btn-default" type="submit"  value="Fashion"       onclick="tag_interest('Fashion');"        style="color:#007d88;"     >Fashion         </button></li>
		<li class="padding-5 " id="Art"          ><button class="btn btn-default" type="submit"  value="Art"           onclick="tag_interest('Art');"            style="color:#0aa1ff;"          >Art      </button></li>
		<li class="padding-5 " id="Games"        ><button class="btn btn-default" type="submit"  value="Games"         onclick="tag_interest('Games');"          style="color:indigo;"   >Games           </button></li>
		<li class="padding-5 " id="Science"      ><button class="btn btn-default" type="submit"  value="Science"       onclick="tag_interest('Science');"        style="color:green;"     >Science         </button></li>
		<li class="padding-5 " id="Politics"     ><button class="btn btn-default" type="submit"  value="Politics"      onclick="tag_interest('Politics');"       style="color:#ff6666;"    >Politics        </button></li>
		<li class="padding-5 " id="Travel"     ><button class="btn btn-default" type="submit"  value="Travel"      onclick="tag_interest('Travel');"       style="color:#ff6666;"    >Travel        </button></li>
		<li class="padding-5 " id="Lifestyle"     ><button class="btn btn-default" type="submit"  value="Lifestyle"      onclick="tag_interest('Lifestyle');"       style="color:#brown;"    >Lifestyle        </button></li>
	</ul>  <p class="padding-5 pull-right"> <span class="text-muted" style="font-size:0.9em;" >Click Continue after selecting the Tags.</span> 
</div></div>
					
				</div>
				<div class="modal-footer" id="button_continue">
					<button type="button" onClick="tag_continue();" class="btn btn-default">
				Continue
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
				  <button type="button" onClick="tag_search();" class="btn btn-lg btn-primary-lg-o">
					<i class="fa fa-search"></i> Search for people in your tags</button>
                 <div class="wrapper " >
			   	<div class="row padding-10"></div>
				<p class="text-muted"><i class="fa fa-tag"></i> These are your Tags</p>
					 <ul class="list-inline" id="ur_tags_holder" >
						
						</ul>
				</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" onClick="retag();" class="btn btn-default" id="retag_btn">
					ReTag</button>	
					
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