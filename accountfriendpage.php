<?php
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php";
include "include/check_connection.php";	
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";
include "include/chat/chat.php";
 $user_id = $_SESSION['id'];
 $account_id = $_SESSION['id'];
 $username1 = safe_input($_GET['username']);
$username = strip_text($username1);
$friend_id = friend_id_from_name($username);
 
$owner_id = $friend_id ;	
echo $username ." is Loading...";
				
?>
<html lang="en-us">
<meta charset="utf-8">
<title> <?php echo $username; ?></title>
<link rel="icon" href="/img/mk.png" type="image/x-icon">
<meta name="description" content="">
<meta name="author" content="">
	
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="canonical" href="www.mykanta.com"/>
<noscript>
<meta http-equiv="refresh" content="0;URL=www.mykanta.com">
</noscript>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<head>
<script type= "text/javascript" src = "/js/countries.js"></script>
<script type="text/javascript" src="/include/chat/chat.js" ></script>
<script type= "text/javascript" src = "/js/comment_profile.js"></script>
<script type= "text/javascript" src = "/js/clear_cart.js"></script>
<script type= "text/javascript" src = "/js/settings_user.js"></script>
<script type="text/javascript" src="/js/add_friend.js"></script>
<script type="text/javascript" src="/js/shop_create.js"></script>
<script type="text/javascript" src="/js/change_pass.js"></script>
<script type= "text/javascript" src = "/js/collection_load_each.js"></script>
<script type="text/javascript" src="/js/load_reev_comments.js"></script>
<script type="text/javascript" src="/js/load_more_reevs.js"></script>

<script type="text/javascript" src="/js/like.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/comment_insert_friend.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/reply_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript">
function show_share(post_id)
{
// document.getElementById('share_'+post_id+'').show(); 
$('#share_'+post_id+'').fadeIn('slow');
}
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
				
        //    console.log($(window).scrollTop()+' + '+$(window).height()+' = '+$(document).height()); 
    } 
	/*else {	alert($(window).scrollTop()+'  ---   '+$("body").scrollTop()+'  ---   '+$(document).height()+'  ----  '+$(window).height());
	}*/
});
            
        });
    </script>
<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
	<link type="text/css" href="/include/jscrollpane/jquery.jscrollpane.css" rel="stylesheet" media="all" />
	<script type="text/javascript" src="/include/jscrollpane/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="/include/jscrollpane/jquery.jscrollpane.js"></script>
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
<style type="text/css"> 
.pic{
width: auto;
height:auto;
padding:10px;
}
.myscroll{
 	overflow: auto !important;
 }
 @media screen and (max-width: 450px) 	{
	.nav-tabs li{
		
		font-size: 10px;
	}
}
@media screen and (max-width: 390px) 	{
	.nav-tabs li{
		font-size: 10px;
	}
	.nav li a{
		padding:5px !important;
	}
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
 <link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css">

	</head>
	<body class="fixed-header">
	<!-- HEADER -->
	    <?php 
include "inc/user_header.php";?>
		<!-- END HEADER -->

		 <!-- BEGIN NAVIGATION -->
		<?php 
		nav($user_id);
		?>
<div id="main" role="main">
<div id="content" style="margin-top:-30px;">
<div class="row ">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 padding-5">
<div class="row ">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 " id="newpic">
		<div class="padding-5" id="pic" align="left" > <?php  get_profile_pic($friend_id); ?>
		</div>
	</div>
	<div class="col-sm-8 col-xs-8 col-md-8 col-lg-9  padding-10" style="margin-left:-20px;">
		<div class="row padding-5 ">
		 
		     <span class="padding-5" style="font-size:1.6em; color:black;"><?php echo ucwords($username);?></span>	
		    <div class="row hidden-md hidden-lg padding-5 items_user " style="margin-bottom:-10px;">
			  <div class=" col-xs-2" style="width:auto;" > 
			   <table class="text-muted" border="0"> 
			      <tr style=""> 
					  <td style=""align="left" class=""> 
						 <ul style="list-style:none; font-size:0.6em;" class="no-padding no-margin" >
						   <li>
							<?php echo no_of_reevs($friend_id); ?>
						   </li>
						   <li>
							REEVS
						   </li>
						 </ul>
					  </td>
			      </tr>
			   </table>
			 </div>  
			  <div class=" col-xs-4 verticalLine_sm" style="width:auto;" align="left"> 	   
			   <table class="text-muted" border="0"> 
			      <tr> 
					
					  <td style=""align="left" class="5"> 
						 <ul style="list-style:none;  font-size:0.6em" class="no-padding no-margin" >
						   <li>
							<?php echo get_friendnames_no_badge($friend_id); ?>
						   </li>
						   <li>
							<span>CONNECTIONS</span>
						   </li>
						 </ul>
					  </td>
			      </tr>
			   </table>
			  </div> 
			 <div class=" verticalLine_sm col-xs-3 hidden" style="width:auto;">   	   
			   <table class="text-muted" border="0"> 
			      <tr> 
					 
					  <td style=""align="left" class=""> 
						 <ul style="list-style:none;  font-size:0.6em" class="no-padding no-margin" >
						   <li>
							<?php echo get_friendnames_no_connected($friend_id); ?>
						   </li>
						   <li>
							FOOLOWING
						   </li>
						 </ul>
					  </td>
			      </tr>
			   </table>
			 </div>  
			 <div class="  col-xs-3 verticalLine_sm hidden-xs hidden" style="width:auto;">   
			   <table class="text-muted" border="0"> 
			      <tr> 
					 
					  <td style=""align="left" class=""> 
						 <ul style="list-style:none;  font-size:0.6em" class="no-padding no-margin" >
						   <li>
							<?php echo get_friendnames_no_connectors($friend_id); ?>
						   </li>
						   <li>
							FOLLOWERS
						   </li>
						 </ul>
					  </td>
			      </tr>
			   </table>
		      </div>
			</div>
			<div class=" hidden-sm hidden-xs row padding-5 items_user " style="margin-bottom:-10px;">
			  <div class="padding-10 col-xs-2" style="width:auto;" > 
			   <table class="text-muted" border="0"> 
			      <tr style=""> 
					  <td style=""align="left" class="padding-5"> 
						 <ul style="list-style:none; font-size:0.7em;" class="no-padding no-margin" >
						   <li>
							<?php echo no_of_reevs($friend_id); ?>
						   </li>
						   <li>
							REEVS
						   </li>
						 </ul>
					  </td>
			      </tr>
			   </table>
			 </div>  
			  <div class="padding-10 col-xs-4 verticalLine_sm" style="width:auto;" align="left"> 	   
			   <table class="text-muted" border="0"> 
			      <tr> 
					
					  <td style=""align="left" class="padding-5"> 
						 <ul style="list-style:none;  font-size:0.7em" class="no-padding no-margin" >
						   <li>
							<?php echo get_friendnames_no_badge($friend_id); ?>
						   </li>
						   <li>
							<span>CONNECTIONS</span>
						   </li>
						 </ul>
					  </td>
			      </tr>
			   </table>
			  </div> 
			 <div class="padding-10 verticalLine_sm col-xs-3 hidden" style="width:auto;">   	   
			   <table class="text-muted" border="0"> 
			      <tr> 
					 
					  <td style=""align="left" class="padding-5"> 
						 <ul style="list-style:none;  font-size:0.7em" class="no-padding no-margin" >
						   <li>
							<?php echo get_friendnames_no_connected($friend_id); ?>
						   </li>
						   <li>
							FOLLOWERS
						   </li>
						 </ul>
					  </td>
			      </tr>
			   </table>
			 </div>  
			 <div class="padding-10  col-xs-3 verticalLine_sm hidden" style="width:auto;">   
			   <table class="text-muted" border="0"> 
			      <tr> 
					 
					  <td style=""align="left" class="padding-5"> 
						 <ul style="list-style:none;  font-size:0.7em" class="no-padding no-margin" >
						   <li>
							<?php echo get_friendnames_no_connectors($friend_id); ?>
						   </li>
						   <li>
							FOLLOWING
						   </li>
						 </ul>
					  </td>
			      </tr>
			   </table>
		      </div>
			</div>
				<div class="row padding-10 ">
				   <?php get_friendname($friend_id); ?> <span id="sent_message"></span>
			    </div>	
	  </div>	
</div>
</div>				
<div class=" row " style="margin-top:-10px; ">

	<h2 id="chatTitle"></h2>
	
<div id="chatWrapper" style="display:none;">

	<div class="jarviswidget-editbox">
		<div>
		<label>Title:</label>
		<input type="text" />
	</div>
</div>
<div class="padding-10">
<div id="chat-container" class="open chat-container" style="height:0px;">
		
	</div>
			<ul id="chat-body" class="hidden padding-5 chat-body custom-scroll myChatBody" style="height:0px; list-style:none;">
			
	</ul>
	<div class="row"><div class="padding-10" style="background-color: #EAEAEA;">
			<div class="input-group input-group-lg">
			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
			<div class="icon-addon addon-lg">
				<input placeholder="Message here..." class="form-control" id="usermsg" name="usermsg" type="input"/>
			</div>
			<span class="input-group-btn" id="">
				<button class="btn btn-default"  id="submitmsg_friend" name="submitmsg_friend" type="submit">Send</button>
			</span>
		</div>
	</div>
</div>
</div>
</div>
</div>	

 
<div class="row no-padding"><hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> 	
	<div class="col-sm-12 no-padding">
		<div class="no-padding">
			<ul class="nav nav-tabs tabs-pull-left">
			<li  class="active"style="width:24%;">
				<a href="#a5"  data-toggle="tab"><span class=" hidden-xs hidden-sm" style="" ><i class="fa fa-list-ul  "></i>  Reevs </span><center class="hidden-md hidden-lg"> <i class="fa fa-list-ul  fa-2x "></i> </center></a>
			</li> 
				<li style="width:24%;">
				<a href="#a3"  data-toggle="tab"><span class=" hidden-xs hidden-sm"> <i class="fa fa-th-large   "></i> Gallery </span><center class="hidden-md hidden-lg"> <i class="fa fa-th-large  fa-2x "></i>  </center></a>
			</li>
				<li class="hidden-md hidden-lg " style="width:18%;">
	<a href="#a1" data-toggle="tab"><span class=" hidden-xs hidden-sm"><i class="fa fa-th-list "></i>Activities</span><center class="hidden-md hidden-lg"><i class="fa fa-th-list fa-2x hidden-lg hidden-md"></i> </center></a>
				</li>
				<li style="width:34%;">
	<a href="#a2" data-toggle="tab"><span class=" hidden-xs hidden-sm"><i class="fa fa-group  "></i> Connections</span><center class="hidden-lg hidden-md"><i class="fa fa-group fa-2x "></i> </center></a>
				</li>		
			</ul>
	<div class="tab-content padding-10" style="font-size:0.9em;">
	<div class="tab-pane fade in active" id="a5">
	<div class="list-inline no-padding" style="">
	<?php get_status_comment_f($friend_id); ?>
	<?php	//get_status_comment_all_friends($friend_id);?>
	 </div>	

	</div>
	<div class="no-padding tab-pane fade" id="a2">
	<?php get_friendnames_of_friends($friend_id); ?>

				</div><!-- end tab -->	
				<div class="no-padding tab-pane fade" id="a1">
	<?php get_friend_profile_notify_friend_req($friend_id); ?>
				</div><!-- end tab -->
	<div class="tab-pane fade " id="a3">
	<div class="row">

	<div class="superbox col-sm-12 " id="reev_collection_holder">
	<?php// get_status_comment_f($owner_id); ?>
	<?php gallery_user_friend($friend_id); ?>
	<div class="superbox-float"></div>
	</div>
	<div id="posid_box"><input type="hidden" id="posid" value=""/></div>
	<input type="hidden" id="posid" value=""/>
	</div>
	</div>
	</div>
		</div>
	</div>
</div>						
</div>
<div class="hidden-xs hidden-sm col-xs-12 col-sm-12 col-md-6 col-lg-6 no-padding" style="margin-top:-10px; font-size:0.825em;">
<div  class="row  " style="background:#f8f8f8; box-shadow:inset 1px 0px 1px 0px #e1e1e1; height:100vh; position:fixed;">
<div class="col-sm-12 col-md-8 col-lg-8 no-padding" style="margin-top:0px;">
<div class="padding-top-10" style="width:100%;  background:#f8f8f8; box-shadow:inset 2px 1px 1px 2px #e1e1e1; height:100vh; ">
	 <strong class=" padding-10" style="color:grey;"><i class="fa fa-globe fa-2x"></i> Activities</strong>
	
		<div class="padding-10"> 
		<?php get_friend_profile_notify_friend($friend_id); ?>
			   <?php  //get_friendshopnames($friend_id);?>
			
		</div>
</div>

</div> <div class="col-sm-12 col-md-4 col-lg-4  padding-10" style="margin-top:0px; background:#fff; ">
<?php 
include "inc/sideright.php";?>
 </div>

</div>
</div>
</div>
			
<?php footer(); ?>		
</div>
		</div>
			

		<?php 
	//include required scripts
	include("inc/scripts.php"); 
	//include footer
	include("inc/google-analytics.php"); 
?>	


<div class="modal fade" id="changeimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">Change your profile picture</h4>
			</div>
			<div class="modal-body">
                <div class="row">
	                
					 <form action="profile_pic_proc.php" method="POST" enctype='multipart/form-data' >
					 <div class="col-sm-9">
					<span class="text-info"><strong><h5>Upload your Picture</h5></strong></span>
                     
					
					  <input type='file' name='myfile' class="form-control "> 
					 </div>
					 <div class="col-sm-3"style="padding-top:40px">
	              <input class=" btn btn-primary form-control" type='submit' name='pro_pic' value='Upload'>
		            </div> 
					
					</form>
					
					</div>
					</div>
				</div>

			</div>
			
		</div><!-- /.modal-content -->	
		
		
		
		
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	
	
<!--Chat 4 hidden inputs-->
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" /> 


	
	</body>

</html>