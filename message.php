<?php
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php";
include "include/funcxn.php";
include "include/chat/chat.php";
 $user_id = $_SESSION['id'];


$shop_id = 39;

//include "include/check_shop_other.php";
?>
<html lang="en-us">
<meta charset="utf-8">
	
		<title>Message</title>
		<link rel="icon" href="/img/mk.png" type="image/x-icon">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src = "/js/countries.js"></script>
<head>
<!--<script type="text/javascript" src="/include/chat/chat.js" ></script>
<script type="text/javascript" src="/include/chat/chat_message_bus.js" ></script> -->

<script type= "text/javascript" src = "/js/clear_cart.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/shop_comment_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/subscribe_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/reply_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript" src="/include/chat/chat.js" ></script>
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
	});
</script>
<style type="text/css"> 
.pic{
height:auto;
width:100%;
 } 
 
.hover .hover-toggle {
  position: inherit;      
  top: 0px;
  
}
.shelve{
background-image:url(img/shelve.jpg);

}
.loader
{
background-image:url(img/ajax-loader.gif);
background-repeat:no-repeat;
background-position:center;
height:100px;
}
.myscroll{
 	overflow: auto !important;
 }
 .bigbox, #divMiniIcons{
	left:10px !important;
}

 </style> 
		
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
		

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
		
        <!-- END NAVIGATION -->
		<!-- MAIN PANEL -->
		<div id="main" role="main">

			

			<!-- MAIN CONTENT -->
			<div id="content" style="margin-top:10px; ">


<div class="row">
   <div  class=" col-xs-12  col-sm-12 col-md-4 col-lg-4">
		<h2 class=""><i class="padding-5 fa fa-envelope"style=" height:3px;"></i>  Messages </h2>
		<hr>
		<div  class=""  >
		  <div  class="customs_croll" style="max-height:320px;" >
		   <?php get_message($user_id); ?>
		  </div>
		</div>
		<!--<h3 class=""> Business Meassages </h3>
		<hr>
		<div  class=""  >
		  <div  class="customs_croll" style="max-height:320px;" >
		   <?php //get_message_business($user_id); ?>
		  </div>
		</div> -->
	</div>
	<div  class=" col-xs-12 col-sm-12 col-md-8 col-lg-8 padding-10">
							
	<div class="  jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" 
			data-widget-togglebutton="true" data-widget-fullscreenbutton="true" style="width:90%;  top:-20px;  left:20px;">
			
					<h2 id="chatTitle"></h2>
				
				<div id="chatWrapper" style="display:none; ">
					
					<div class="jarviswidget-editbox">
						<div>
							<label>Title:</label>
							<input type="text" />
						</div>
					</div>
					<div class="widget-body widget-hide-overflow no-padding">
					<div id="chat-container" class=" open chat-container" >
							<span class="chat-list-open-close"><i class="fa fa-envelope"></i><b>!</b></span>

							<div class="chat-list-body customs_croll" style="height:240px;">
	<ul id="chat-users"style="width:240px;"><?php get_message($user_id); ?>
	</ul>
							</div>
						</div>
<ul id="chat-body" class="padding-5 chat-body custom-scroll myChatBody" style="height:300px; list-style:none;">
								<li class="message" style="padding:5px; margin:10px 30px 0 0; background-color: #EAEAEA; border-left:4px solid #4C4F53;">
									<div class="font-xs message-text" style="margin:0;">
										Select a connection to chat with from the panel on the right.
									</div>
								</li>
						</ul>
					<div class="padding-5" style="background-color: #EAEAEA;">
							
				           <div class="input-group input-group-lg">
								<span class="input-group-addon"><i class="fa fa-comments"></i></span>
								<div class="icon-addon addon-lg">
									<input placeholder="Chat here..." class="form-control" id="usermsg" name="usermsg" type="input"/>
								</div>
								<span class="input-group-btn" id="">
									<button class="btn btn-default"  id="submitchat" name="submitchat" type="submit">Send</button>
								</span>
							</div>
						
						</div>
					</div>
				</div>
			</div>

	</div>
</div>


</div>
<?php footer(); ?>

			</div>
			<!-- END MAIN CONTENT -->

		
		</div>
	
<?php 
	//include required scripts
	include("inc/scripts.php"); 
	//include footer
	include("inc/google-analytics.php"); 
?>	


<div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div id="modal-body-prd" class="modal-body-prd padding-10 ">
			
			</div>
		</div>
	</div>
</div>


<input type="hidden" id="user_id" value="<?php echo $_SESSION['id'] ; ?>" /> 
<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" /> 

<!--Chat 4 hidden inputs-->
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" />
</div>
</div>
</body>


</html>