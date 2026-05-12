<?php 
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php";
include "include/check_shop.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";
include "include/chat/chat.php";
$user_id = $_SESSION['id'];
$account_id = $_SESSION['id'];
$shopName2 = safe_input($_GET['shopName']);
 $shopName = preg_replace('/[^A-Za-z0-9\ ]/ ', ' ',$shopName2);
 $clean_name = formatUrl_rev($shopName); 
 $clean_name2 = formatUrl($shopName); 
$shop_id = shop_id_from_name($clean_name);
if(empty($shop_id)){header("location:/home");} 
echo $shopName. " is loading...";
?>
<html lang="en-us">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<title><?php echo $shopName ; ?></title>
<link rel="icon" href="/img/mk.png" type="image/x-icon">
<meta name="description" content="">
<meta name="author" content="<?php echo $shopName ; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="/css/styles.css" />
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/js/ajaxupload_image.3.5.js" ></script>
<script type="text/javascript" src="/include/croppic/croppic.js"></script>
<script type="text/javascript" src = "/js/comment_shop_admin.js"></script>
<script type="text/javascript" src = "/js/settings_shop.js"></script>
<script type="text/javascript" src= "/js/load_product_modal.js"></script>
<script type="text/javascript" src="/js/shop_comment_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/reply_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript" src="/js/shop_uploader_image.js" ></script>
<!--<script type="text/javascript" src="/include/chat/chat.js" ></script> --->

<style type="text/css"> 
.pic{
height:auto;
width:100%;
} 
.shelve{
background-image:url(/img/shelve.jpg);

}

.get_product_pic_class{
background-image:url(<?php get_product_pic_class($product_id); ?>);
background-repeat:no-repeat;
background-position:center;
background-size:100% 100%;
height:520px;
width:520px;

} 
 
 .thumbnail_legend {
    background: none repeat scroll 0 0 #FFFFFF;
    opacity: 0.5;
    top:0;
    left:0;
    position: absolute;
}

.thumbnail {
    position:relative;
}

.text{
width:110px; 
height:20px; 
background:#FFF;
opacity:0;
} 

.pic:hover .text {
opacity:0.6; 
color:#000000;
font-size:12px;
font-weight:500; 
font-family:"Times New Roman", Times, serif; 
}

.hover .hover-toggle {
/* set it at the bottom of .carousel-inner */
position: absolute;      
top: 0;
display: none;
}

.hover:hover  .hover-toggle {
display: block;
}

.loader
{
background-image:url(/img/ajax-loader.gif);
background-repeat:no-repeat;
background-position:center;
height:100px;
}
.loading
{
background-image:url(/img/loading.gif);
background-repeat:no-repeat;
background-position:center;
height:100px;
}

.desktop{
	    font-size: 60px;
	    font-family: Arial, Helvetica, sans-serif;
	    color: #ccc;
}
.laptop{
	    font-size: 48px;
	    font-family: Arial, Helvetica, sans-serif;
	    color: #ccc;
}
.tablet{
	    font-size: 50px;
	    font-family: Arial, Helvetica, sans-serif;
	    color: #ccc;
}
.yam{
	    font-size: 35px;
	    font-family: Arial, Helvetica, sans-serif;
	    color: #ccc;
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
		wid/th: 97px;
		font-size: 10px;
	}
}
@media screen and (max-width: 400px) 	{
	.nav-tabs li{
		font-size: 9px;
	}
	.nav li a{
		padding:5px !important;
	}
	.ul li a{
		font-size: 9px;
	}
	.shrink li, .shrink a, .shrink p, .shrink span{
		font-size: 9px;
	}
}

@media screen and (max-width: 400px) 	{
	.biz_name{
		font-size: 1.2em;
	}
	.shrink li, .shrink a, .shrink p, .shrink span{
		font-size: 10px;
	}
}
.bigbox, #divMiniIcons{
	left:10px !important;
}
.graph{
width:50px;
height:50px;
border:1px solid #aeaeae;
background-color:1px solid #aeaeae;
}
.bar{
height :8px;
margin:1px;
display:inline-block;
position:relative;
background-color:#aeaeae;
vertical-align:baseline;
}
</style>
<!-- For cropper -->
<link href="/include/croppic/assets/css/croppic.css" rel="stylesheet" type="text/css" /> 
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
<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">
	<!-- Basic Styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media=  "screen" href="/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production-plugins.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
</head>
<body class="fixed-header">

<?php 
include "inc/user_header.php";?>
<?php nav($user_id);?>
<div id="main" role="main">
    <div id="" class="" style="margin-top:-20px; ">
         <div class="row "style="">
             <div class="col-md-12 col-lg-12 " >
                 <div class="row no-padding">
                        <div id="" class="col-sm-12 col-md-12 col-lg-12">
                           <div class=" hover ">
	                            <div class="padding-10" title="<?php shopName($shop_id);?>" align="center">
		                            <?php get_banner_pic($shop_id); ?>
		                            
			                        <div class="hover-toggle padding-10">
			                            <button class="  btn-default btn-sm pull-left" style="opacity:0.5;" data-target="#changebanner" data-toggle="modal">Change Banner</button>
			                        </div>
			                        </div>
	                        </div>
                        </div>
                     </div>
					<div class="row">
                        <div class="col-sm-12 col-md-8 col-lg-8">
                            <div class="row  no-margin"style="margin-top:-100px;">
		                            <div class="col-sm-6 col-md-6 col-lg-6 padding-5 no-margin " > 
							         <h4 class="padding-5" style="font-size:1.8em;" > <?php shopName($shop_id); verification_icon($shop_id); ?>
									<span class="">
									<li class="btn-group  padding-bottom-10" style="">
											<a href="javascript:void(0);" data-toggle="dropdown" class=" dropdown-toggle"><i class="fa fa-lg fa-fw fa-pencil" style="color:black; font-size:0.8em;"></i></a>
											<ul class="dropdown-menu">
											<li>
											 <a href="/edit_business/<?php shopName($shop_id); ?>" class="text-danger">Edit Business Info.</a>
											</li>
											<li>
											  <?php  out_of_business_button($shop_id); ?>
											</li>
											</ul>
										</li> 
										</span></h4>
									  <h5 class="padding-5" style="font-size:1.0em; margin-top:-14px;"><?php shopcategory($shop_id); ?>
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
									<div  class="col-sm-6 col-md-6 col-lg-6" style="align:right;">
											  <?php //out_of_business_check($shop_id); ?>
											 <ul id="sparks" class="">
													<li class="sparks-info padding-5">
														<h5> subscribers <span class="txt-color-black"><i class="fa fa-rss" data-rel="bootstrap-tooltip" title="Increased"></i> <?php get_subscribers_no($shop_id);?></span></h5>
														<div class="sparkline txt-color-black hidden-mobile hidden-md hidden-sm"></div>
													</li>
													<li class="sparks-info padding-5">
														<h5> orders <span class="txt-color-black"> <i class="fa fa-shopping-cart"></i> <?php product_orders_update($shop_id);?></span></h5>
														<div class="sparkline txt-color-black hidden-mobile hidden-md hidden-sm"></div>
													</li>
												    <li class="sparks-info padding-5">
														<h5> visitors <span class="txt-color-black"><i class="fa fa-globe"></i>  <?php get_shop_views_no($shop_id);?></span></h5>
														<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"></div>
												   </li>
										  	</ul>
		                                
									</div>			
                            </div>
                       
<!-- business ans service definition -->
<?php include "inc/biz_serv_def.php";?>

			</div>
				<div class=" col-sm-12 col-md-4 col-lg-4 padding-10" style="background:#f8f8f8; box-shadow:inset 2px 2px 2px 2px #e1e1e1; height:auto; margin-top:-10px;">
					<div class="padding-10" style="margin-right:20px;"> 
					   <textarea rows="2" id="shop_comment-post-text" class="form-control" placeholder="Your latest News!" required></textarea>
						<a id="upload_button" href="javascript:void(0);" class="btn btn-link profile-link-btn hidden" rel="tooltip"  title="Add Photo"><i class="fa fa-camera"></i></a>
						<div class="padding-10 pull-right"><div onClick="shop_comment_post_btn_click();"   class="btn btn-sm btn-primary">Post
						</div></div>	
						<div class="" id="add_image2" style="margin-bottom:-10px;"></div>
							<br clear="all" />
							<center>
								<div class="wrapper " align="center"><!-- Main Wrapper -->
									<div id="vpb_uploads_error_displayer10"></div><!-- Error Message Displayer -->
									<div id="vpb_uploads_displayer10"></div><!-- Success Message (Files) Displayer --> 
								</div>
							</center>
				
					<hr class="no-margin">
					<div class="padding-10" style=""> 
						<p class="text-info"> Reviews </p>
						<div class="padding-10 comment-holder-ul">
						 <?php  get_shop_comment($shop_id);  ?>
					   </div>
					</div>
				  </div>
				</div>
			</div>




</div>
 
</div><?php footer(); ?>
		</div>
		<!-- END MAIN CONTENT -->

	</div>
	<!-- BOOTSTRAP JS -->
		<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" 
			data-widget-togglebutton="true" data-widget-fullscreenbutton="false" style="width:350px; position:fixed; bottom:-30px; right:20px; z-index:2;">
				<header id="chat_header" style="cursor:pointer;" onClick="chatMinBtnFunc();">
					<span class="widget-icon" > <i class="fa fa-comments txt-color-white" style="line-height:2.0 !important;"></i> </span>
					<h2 id="chatTitle">Customer Care! </h2>
					<div class="widget-toolbar">
						
						<a href="javascript:"><span id="chatMinBtn" class="widget-icon padding-5"> <i id="chatMinBtnI" class="fa fa-plus txt-color-white"></i> </span></a>
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
					<div id="chat-container" class="open chat-container" style="height:240px;">
							<span class="chat-list-open-close"><i class="fa fa-user"></i><b>!</b></span>

							<div class="chat-list-body custom-scroll" style="height:240px;">
	<ul id="chat-users"style="width:300px;"> <?Php customer_care_chat($shop_id); ?>
	</ul>
							</div>
						</div>
                        <ul id="chat-body" class="padding-5 chat-body custom-scroll myChatBody" style="height:230px; list-style:none;">
							<li class="message" style="padding:5px; margin:10px 30px 0 0; background-color: #EAEAEA; border-left:4px solid #4C4F53;">
								<div class="font-xs message-text" style="margin:0;"> Manage Your clients with chat.
								</div>
							</li>
						</ul>
						<div class="padding-5">
						
							   <div class="input-group input-group-lg">
									<span class="input-group-addon"><i class="fa fa-comments"></i></span>
									<div class="icon-addon addon-lg">
										<input placeholder="Chat here..." class="form-control" id="usermsg" name="usermsg" type="text">
									</div>
									<span class="input-group-btn">
										<button class="btn btn-default"  id="submitmsg_business" name="submitmsg_business" type="button">Send</button>
									</span>
								</div>
							
						</div>
				   </div>
		    </div>
		</div>

	<?php 
	//include required scripts
	include("inc/scripts.php"); 
	//include footer
     include("inc/google-analytics.php"); 
?>	

<div class="modal fade" id="changebanner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:860px;">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>
			<h4 class="modal-title" id="myModalLabel">Change your Banner picture</h4>
		</div>
		<div class="modal-body">
		   <div class="row">
			 <p class="padding-10"> The width and height of your banner should be approximately 1000px X 238px.</p>
			 <p class="padding-10"> Upload JPEG or JPG images only. Convert or rename your image extensions to JPEG.</p>
				<div id="croppic" style="background-color:#F5F5F5;"></div>
				<span class="btn" id="cropContainerHeaderButton">Upload Picture</span>
		   </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cancel
			</button>
</div>
				
			</div>

		</div>
		
	</div><!-- /.modal-content -->
	

<div class="modal fade" id="verify_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div id="verify_body" class="padding-10 modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>
			<h4 class="modal-title" id="myModalLabel">Verify your Business Page</h4>
		</div>
		<div class="modal-body">
		<br>
			<div class="row">
				<div class="col-sm-12">
			 <p class="text-info"> To ensure that customers make business with genuine and registered businesses safely, Mykanta verifies all business pages created.</p> 
		   <h4>Benefits</h4> 
		   <ul class=" padding-10 ">
	       <li>Unlimited subscribers. </li>
		   <li>Products Advertisement. </li>
		   <li>Product Limit Increased. </li>
		   <li>Local and Global orders. </li>
		   <li>Verification symbol/ stamp. </li><hr>
		 <p>A four(4) character code with letters and numbers. <br><input type="input" id="verify_input" class="input" required/> eg: 12A6 </p>
		   </ul>
						
				</div>
				
			</div>
			

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cancel
			</button>
		<button type="button" id="verify_button" onclick="verify_function(<?php echo $shop_id; ?>)" class="btn btn-sm btn-success">Apply </button>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="settings_shop_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">Your business Info</h4>
</div>
<div class="modal-body">
<div class="row ">
<div class="col-md-1" style="width:10px;">
</div>
<?php echo settings_shop($shop_id); ?>

</div>
</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="delete_shop_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title red" id="myModalLabel">Confirm business out of Business</h4>
</div>
<div class="modal-body">
<div class="row padding-10 ">
<p class="text-info"> Are you sure you want your business to be out of Business?</p>
<p class="text-danger"> This business and its products will not be seen by anybody and will be removed after 30 days, you can restore it during this period.</p>
<button  type="button"  data-dismiss="modal" aria-hidden="true"class="btn btn-default">NO</button>
<a href="/ajax/delete_shop.php?shopName=<?php echo $clean_name2; ?>">
<button id="delete_yes" class="btn btn-warning" >YES</button></a>

</div>
</div>
<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cancel
			</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="restore_shop_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title red" id="myModalLabel">Confirm Business Restore</h4>
</div>
<div class="modal-body">
<div class="row ">
<p class="text-info"> Are you sure you want your business to be Restored?</p>
<p class="text-warning"> This business and its products will  be seen by users </p>
<button  type="button"  data-dismiss="modal" aria-hidden="true"class="btn btn-default">NO</button>
<a href="/ajax/restore_shop.php?shopName=<?php echo $clean_name2; ?>">
<button id="delete_yes" class="btn btn-warning" >YES</button></a>

</div>
</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div id="modal-body-prd" class="modal-body-prd padding-10 ">
			
			</div>
		</div>
	</div>
</div>


<input type="hidden" id="user_id" value="<?php echo $user_id ; ?>" /> 
<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" /> 
<input type="hidden" id="owner_id" value="<?php echo $shop_id ; ?>" /> 
<input type="hidden" id="shop_id" value="<?php echo $shop_id ; ?>" />
<input type="hidden" id="shopName" value="<?php echo $shopName ; ?>" />
<!--Chat 4 hidden inputs-->
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenShopId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" />  
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<script type="text/javascript">
	    function all_orders_list(shop_id)
		{
		 	 $.post("/ajax/place_order_update.php",  
				{
					all_orders_list : "all_orders_list",
					shop_id : shop_id,
					cache: false,
				})
			.error(function( )
		     {
		 
		 
		      })
				.success(function(response)
				{
		          document.getElementById('all_orders_list').innerHTML = response; 
				})
				
		}
		     function all_orders_list_serv(shop_id)
		{
		 	 $.post("/ajax/place_order_update.php",  
				{
					all_orders_list_serv : "all_orders_list_serv",
					shop_id : shop_id,
					cache: false,
				})
			.error(function( )
		     {
		 
		 
		      })
				.success(function(response)
				{
		          document.getElementById('all_orders_list_serv').innerHTML = response; 
				})
				
		}
		 
		 function bus_overview(shop_id)
		{
		 	 $.post("/ajax/place_order_update.php",  
				{
					overview : "overview",
					shop_id : shop_id,
					cache: false,
				})
			.error(function( )
		     {
		 
		 
		      })
				.success(function(response)
				{
		          document.getElementById('bus_overview').innerHTML = response; 
				})
				
		}
		
		function minized(order_id)
		{
		 	   document.getElementById('place_order_update'+order_id).innerHTML = '<blockquote ><h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25"/> Pick-up Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4><small>Date : <cite title="Source Title"></cite><input type="submit"  onClick="info('+order_id+')"value="View Information" class="btn-default pull-right"></small></blockquote>'; 
				
		}
		
        function approved(order_id)
		{
		 	$.post("/ajax/place_order_update.php",  
				{
					place_order_update : "place_order_update",
					order_id : order_id,
					cache: false,
				})
			.error(function( )
		     {
		 
		 
		      })
				.success(function(response)
				{
		          document.getElementById('place_order_update'+order_id).innerHTML = '<h4 class="text-success strong" > Successfully Confirmed </h4><div class="row " ><div class="  padding-10 pull-right" > <input type="submit"  onClick="info_single('+order_id+');" value=" Info " class="btn-default"></input> </div></div> '; 
				})
		}	
        
		function cancelled(order_id)
		{
		 	$.post("/ajax/place_order_update.php",  
				{
					place_order_cancel : "place_order_cancel",
					order_id : order_id,
					cache: false,
				})
			.error(function( )
		     {
		 
		 
		      })
				.success(function(response)
				{
		          document.getElementById('place_order_update'+order_id).innerHTML = '<h4 class="text-danger strong" > Cancelled </h4><div class="row " ><div class="  padding-10 pull-right" > <input type="submit"  onClick="info_single('+order_id+');" value=" Info " class="btn-default"></input> </div></div> '; 
				})
		}	

		function info(order_id)
		{
		 	$.post("/ajax/place_order_update.php",  
				{
					place_order_info : "place_order_info",
					order_id : order_id,
					cache: false,
				})
			.error(function( )
		     {
		 
		 
		      })
				.success(function(response)
				{
		          document.getElementById('place_order_update'+order_id).innerHTML = response; 
				})
		}
		
		function info_single(order_id)
		{
		 document.getElementById('place_order_update'+order_id).innerHTML = ""; 
		 	$.post("/ajax/place_order_update.php",  
				{
					place_order_single_info : "place_order_single_info",
					order_id : order_id,
					cache: false,
				})
			.error(function( )
		     {
		 
		 
		      })
				.success(function(response)
				{
		          document.getElementById('place_order_update'+order_id).innerHTML = response; 
				})
		} 
		
		function approved_vis(order_id)
		{
		 	$.post("/ajax/place_order_update.php",  
				{
					place_order_update_vis : "place_order_update_vis",
					order_id : order_id,
					cache: false,
				})
			.error(function( )
		     {
		 
		 
		      })
				.success(function(response)
				{
		          document.getElementById('place_order_update_vis'+order_id).innerHTML = '<h4 class="text-success strong" > Confirmed </h4><div class="row " ><div class="  padding-10 pull-right" > <input type="submit"  onClick="info_vis('+order_id+');" value=" Info " class="btn-default"></input> </div></div> '; 
				})
		}	
        
		function cancelled_vis(order_id)
		{
		 	$.post("/ajax/place_order_update.php",  
				{
					place_order_cancel_vis : "place_order_cancel_vis",
					order_id : order_id,
					cache: false,
				})
			.error(function( )
		     {
		 
		 
		      })
				.success(function(response)
				{
		          document.getElementById('place_order_update_vis'+order_id).innerHTML = '<h4 class="text-danger strong" > Successfully Cancelled </h4><div class="row " ><div class="  padding-10 pull-right" > <input type="submit"  onClick="info_vis('+order_id+');" value=" Info " class="btn-default"></input> </div></div> '; 
				})
		}	

		function info_vis(order_id)
		{
		 	$.post("/ajax/place_order_update.php",  
				{
					place_order_info_vis : "place_order_info_vis",
					order_id : order_id,
					cache: false,
				})
			.error(function( )
		     {
		 
		 
		      })
				.success(function(response)
				{
		          document.getElementById('place_order_update_vis'+order_id).innerHTML = response; 
				})
		}
		
		function info_single_vis(order_id)
		{
		 document.getElementById('place_order_update_vis'+order_id).innerHTML = ""; 
		 	$.post("/ajax/place_order_update.php",  
				{
					place_order_single_info_vis : "place_order_single_info_vis",
					order_id : order_id,
					cache: false,
				})
			.error(function( )
		     {
		 
		 
		      })
				.success(function(response)
				{
 // $('#place_order_update_vis'+order_id).delay(3200).fadeIn('slow').html(response);
	document.getElementById('place_order_update_vis'+order_id).innerHTML = response; 
				})
		}
		function show_biz_share()
{
// document.getElementById('share_'+post_id+'').show(); 
$('#show_biz_share').fadeIn('slow');
}
	</script>

	

    <!--<script type="text/javascript">
    	function meClick(){
    		croppic.reset();
    	}
    </script>-->
    <input type="hidden" id="shop_name" value="<?php echo $shopName ; ?>" />
    <script>
    	var shop_id = $( '#shop_id' ).val();
    	var shop_name = $('#shop_name').val();
		var croppicHeaderOptions = {
				cropData:{
					"shop_id":shop_id,
					"shop_name":shop_name
				},
				cropUrl:"/api/banner_crop.php",
				customUploadButtonId:'cropContainerHeaderButton',
				modal:false,
				processInline:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){location.reload() },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}	
		var croppic = new Croppic('croppic', croppicHeaderOptions);
	</script>

	<script type="text/javascript">
		$('#morePix_btn').click(function()
		{
			$('#morePix_btn').hide();
			$('#morePix').css('display' , 'block');
		});
	</script>
</body>
</html>