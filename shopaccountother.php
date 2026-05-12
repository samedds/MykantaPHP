<?php
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php";
include "include/check_shop_other.php";
include "include/funcxn.php";
include "include/chat/chat.php";
 $account_id = $_SESSION['id'];
 $user_id = $_SESSION['id'];
$shopName2 = safe_input($_GET['shopName']);
$clean_name = formatUrl_rev($shopName2); 
$shopName = strip_text($clean_name);

$shop_id = shop_id_from_name($clean_name);
if(empty($shop_id)){header("location:/home");} 
echo $shopName. " is loading...";
$owner_id = $shop_id;

?>
<html lang="en-us">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<title><?php echo $shopName; ?></title>
		<link rel="icon" href="/img/mk.png" type="image/x-icon">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
<script src="/js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="/js/smart-chat-ui/smart.chat.manager.min.js"></script>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src = "/js/countries.js"></script>
<script type= "text/javascript" src = "/js/add_to_wishlist.js"></script>

<script type="text/javascript" src="/js/change_pass.js"></script>
<script type= "text/javascript" src = "/js/settings_user.js"></script>
<script type="text/javascript" src="/js/shop_create.js"></script>
<script type= "text/javascript" src = "/js/clear_cart.js"></script>
<script type="text/javascript" src="/js/add_friend.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/shop_comment_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/subscribe_insert.js?t=<?php echo time(); ?>"></script>
<script type= "text/javascript" src="/js/load_product_modal_friend.js"></script>
<script type="text/javascript" src="/js/product _view.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/reply_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/script.js"></script>

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
			<div id="content" style="margin-top:-20px; ">


<div class="row no-padding"style="margin-left:-15px;">
  <div class="col-md-12">
    <div class="">
         <div class="row">
<div  class=" col-sm-12 col-md-12 col-lg-12">
						
<?php get_banner_pic_on_shoppageother($shop_id); ?>

</div>
<div class="col-sm-12 col-md-8 col-lg-8">
	 <div class="no-margin no-padding">
		
		 		<?php //shopdetailnogetotherjustname($shop_id) ;?>
				

		 <div class="row  no-margin"style="margin-top:-100px;">
		                            <div class="col-sm-6 col-md-6 col-lg-6 no-padding no-margin " > 
							         <h4 class="padding-5" style="font-size:1.8em;" > <?php shopName($shop_id); verification_icon_other($shop_id); ?>
									</h4>
									  <h5 class="padding-5" style="font-size:1.0em; margin-top:-10px;"><?php  shopcategory($shop_id); ?>
									  
									  <span class="" id="subscribe_box">
												<?php subscribe_button($shop_id);?>
											</span>
									 <span>
										 <li class="btn-group" style="">
										  <a class="text-primary"style="font-size:0.9em; cursor:pointer;"href="javascript:void(0);" data-toggle="dropdown" class=" dropdown-toggle"> share</a> 
									   
											<ul class="dropdown-menu " id="show_biz_share" style="  ">
											  <li class=" no-padding"style="" >
												<a class="ttip hidden-md hidden-lg" href="whatsapp://send?text=http://mykanta.com/business/<?php echo $shopName2; ?>" data-action="share/whatsapp/share"><img src="/img/site_img/whatsapp.png" height="20"/>whatsapp</a>
											</li>
											<li><a class="ttip" title="facebook" onClick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://mykanta.com/business/<?php echo $shopName2; ?>',
												'facebook share','width=500,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''
											); return false;" 
													href="https://www.facebook.com/sharer/sharer.php?u=http://mykanta.com/business/<?php echo $shopName2; ?>&amp;text=<?php echo shopName($shop_id); ?>">
													<i class="fa fa-facebook fa-1x" style="color:#3B5998" ></i> Facebook</a>
												</li>	
												<li><a class="ttip" title="twitter" onClick="window.open('http://twitter.com/share?url=http://mykanta.com/business/<?php echo $shopName2; ?>&amp;text=<?php echo shopName($shop_id); ?>',
												'Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''
											); return false;" 
													href="http://twitter.com/share?url=http://mykanta.com/business/<?php echo $shopName2; ?>&amp;text=<?php echo shopName($shop_id); ?>">
													<i class="fa fa-twitter fa-1x" style="color:#55ACEE;"></i>Twitter</a>
												</li>
											</ul>
										   </li>
										</span>
									
											
									 </h5> 
									</div>
									<div  class="col-sm-6 col-md-6 col-lg-6 " style="align:right;">
											  <?php //out_of_business_check($shop_id); ?>
											 <ul id="sparks" class="">
													<li class="sparks-info padding-5">
														<h5> subscribers <span class="txt-color-black"><i class="fa fa-rss" data-rel="bootstrap-tooltip" title="Increased"></i> <?php get_subscribers_no($shop_id);?></span></h5>
														<div class="sparkline txt-color-black hidden-mobile hidden-md hidden-sm"></div>
													</li>
													<li class="sparks-info padding-5">
														<h5> visitors <span class="txt-color-black"><i class="fa fa-globe"></i>  <?php get_shop_views_for_upadting($shop_id);?></span></h5>
														<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"></div>
												   </li>
										  	</ul>
		                                
									</div>			
                            </div>
              
<!-- business ans service definition -->
<?php include "inc/biz_serv_def_other.php";?>
							<!-- end row -->

						</div>

			  </div>
				<div class="col-sm-12 col-md-4 col-lg-4"style="background:#f8f8f8; box-shadow:inset 2px 2px 2px 2px #e1e1e1; height:auto; margin-top:-10px;">
					<div class="padding-10"> 
					  <p class="text-muted">Comments made by Visitors.</p>
						   <div class="padding-10" style="margin-top:10px;"> 
                      <textarea rows="2" id="shop_comment-post-text" class="form-control" placeholder="Share your experience" required></textarea>
					   <div class="padding-10"><div onClick="shop_comment_post_btn_click(<?php echo $shop_id;?>)"  class="btn btn-sm btn-primary pull-right">Share</div>
					   </div>
					</div> 
					<div class="comment-holder-ul">
						   <hr class="margin-5"> 
					<?php  get_shop_friend_comment($shop_id);  ?>
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
	<div class="  jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" 
			data-widget-togglebutton="true" data-widget-fullscreenbutton="false" style="width:400px; position:fixed; bottom:-30px; right:10px; z-index:2;">
				<header id="chat_header" onClick="chatbusinessClick(<?php echo $shop_id.'.'.$user_id.','.$shop_id; ?>)" style="cursor:pointer;">
					<span class="widget-icon"  > <i class="fa fa-comments txt-color-white" style="line-height:2.5 !important;"></i> </span>
					<h2 id="chatTitle"><em>Chat with </em><?php echo $clean_name; ?></h2>
					<div class="widget-toolbar">
						
						<a href="javascript:chatMinBtnFunc();"><span id="chatMinBtn" class="widget-icon padding-5"> <i id="chatMinBtnI" class="fa fa-plus txt-color-white"></i> </span></a>
					</div>
				</header>

				<div id="chatWrapper" style="display:none;">
					
					<div class="jarviswidget-editbox">
						<div>
							<label>Title:</label>
							<input type="text" />
						</div>
					</div>
					<div class="widget-body widget-hide-overflow no-padding">
					
<ul id="chat-body" class="padding-5 chat-body custom-scroll myChatBody" style="height:230px; list-style:none;">
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
								<span class="input-group-btn">
									<button class="btn btn-default"  id="submitmsg_business" name="submitmsg_business" type="submit">Send</button>
								</span>
							</div>
						
						</div>
					</div>
				</div>
			</div>
<?php 
	//include required scripts
	include("inc/scripts_other_nusiness.php"); 
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



<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" /> 
<input type="hidden" id="owner_id" value="<?php echo $owner_id ; ?>" /> 
<input type="hidden" id="shop_id" value="<?php echo $shop_id; ?>" />
<input type="hidden" id="shopName" value="<?php echo $shopName; ?>" />
<!--Chat 4 hidden inputs-->
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" />
<input type="hidden" id="user_id" value="<?php echo $_SESSION['id'] ; ?>" /> 
</div>
</div>
</body>


</html>