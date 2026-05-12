<?php 
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";
include "include/chat/chat.php";
$user_id = $_SESSION['id'];
$account_id = $_SESSION['id'];
echo $_GET['shopName']. " is loading...";

$shopName = $_GET['shopName'];
$clean_name = formatUrl_rev($shopName); 
$shop_id = shop_id_from_name($clean_name);
 echo'<style>.'.$_SESSION['username'].'{margin:10px 10px 0 30px !important; background-color: #CDE0C4 !important; 
 		border-right:4px solid #8AC38B !important; border-left:none !important;}</style>';
include "include/check_shop.php";

?>
<html lang="en-us">
<meta charset="utf-8">
<title>Add Service page</title>
<link rel="icon" href="/img/mk.png" type="image/x-icon">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="/css/styles.css" />
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/js/ajaxupload_image.3.5.js" ></script>
<script type= "text/javascript" src = "/js/comment_shop_admin.js"></script>
<script type= "text/javascript" src = "/js/clear_cart.js"></script>
<script type="text/javascript" src="/js/add_friend.js"></script>
<script type="text/javascript" src="/js/change_pass.js"></script>
<script type= "text/javascript" src = "/js/settings_user.js"></script>
<script type= "text/javascript" src = "/js/shop_create.js"></script>
<script type= "text/javascript" src = "/js/settings_shop.js"></script>
<script type="text/javascript" src="/js/upload_product_image_1.js" ></script>
<script type= "text/javascript" src = "/js/countries.js"></script>
<script type= "text/javascript" src="/js/add_product_image.js"></script>
<head>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript" src="/js/shop_uploader_image.js" ></script>
<script type="text/javascript" src="/js/product_insert.js" ></script>
<script type="text/javascript" src="/include/chat/chat.js" ></script>
<style type="text/css"> 
.pic{
height:auto;
width:100%;
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
	.shrink li, .shrink a, .shrink span{
		font-size: 9px;
	}
}
.bigbox, #divMiniIcons{
	left:10px !important;
}
.row .overlay, .overlay-wrapper .overlay {
    z-index: 1;
    background: rgba(255, 255, 255, 0.7) none repeat scroll 0% 0%;
    border-radius: 3px;
}
.row > .overlay, .overlay-wrapper > .overlay, .row > .loading-img, .overlay-wrapper > .loading-img {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
}
.row .overlay > .fa, .overlay-wrapper .overlay > .fa {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -15px;
    margin-top: -15px;
    color: #000;
    font-size: 30px;
}
</style>
	<!-- Basic Styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media=  "screen" href="/css/font-awesome.min.css">

	
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production-plugins.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
</head>
<body class="fixed-header fixed-navigation">
<?php   header_up($user_id) ; ?>
<?php nav($user_id);?>
<div id="main" role="main">
    <div id="content"  style="margin-top:-20px; ">
   		<div class="row no-padding"style="margin-left:-15px;">
       	<div class="col-md-10 col-lg-10 " >
          <div class=" padding-10">
             	<div class="row" style="padding-bottom:5px;">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="padding-left:16px;"> 
									<div id="shopname_change">
										<h1 style="margin:0; border:none;" class="pull-left padding-5 text-primary"><?php echo shopName($shop_id); ?><small> - Add Service</small></h1>
										<a class=" pull-right" style="margin:5px;" data-target="#productterms" data-toggle="modal" class="text-info">Listing Policy</a>
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:20px;">
                <div class="col-sm-12 col-md-12 col-lg-7">
                  <div class="padding-10" style="margin-left:10px; ">
                    <div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="row">
								<div class="col-md-6">
									<label class="" style="font-weight:600;">Enter full Service Name</label>
									<input type="text" class="form-control" id="prdt_name"  name="prdt_name" placeholder="Service" required />
									<label class="padding-top-10 text-muted font-sm" style="">Kofi and Sons Mechanic Services</label>
									<div class="" id="nameAlert" style="margin-bottom:2px;"></div>
								</div>
								<div class="col-md-6">
										<label class="" style="font-weight:600;">Business Type</label>
										<input type="text" class="form-control" id="prdt_man" value="Service" name="prdt_option" placeholder="Type" disabled="disabled" />
									<div class="" id="optionAlert" style="margin-bottom:2px;"></div>
								</div>
								</div>
								<div class="col-md-6 hidden-xs hidden-sm hidden-md hidden-lg ">
									<label class="" style="font-weight:600;">Product Manufacturer</label>
									<input type="text" class="form-control" id="prdt_option"  name="prdt_man" value="00" placeholder="Manufacturer" required />
									<label class="padding-top-10 text-muted font-sm" style="">Eg: Samsung.</label>
									<div class="" id="manAlert" style="margin-bottom:2px;"></div>
								</div>
								
							
							<div class="row  hidden-xs hidden-sm hidden-md hidden-lg ">
							 <div class="col-md-6">
										<label class="" style="font-weight:600;">Product Price</label>
										<input type="number" class="form-control" id="price" value="00" name="price" placeholder="00.00" required />
										<label class="padding-top-10 text-muted font-sm" style="">Eg: 10.99, 100.50, 1500.45</label>
									<div class="" id="priceAlert" style="margin-bottom:2px;"></div>
								</div>
							</div>
								
								<br>
								<div class="row  hidden-xs hidden-sm hidden-md hidden-lg ">
								<div class="col-md-6">
										<label class="" style="font-weight:600;">Stock Quantity</label>
										<input type="number" class="form-control" id="prdt_stock" name="prdt_stock" placeholder="00"value="00"  required />
										<label class="padding-top-10 text-muted font-sm" style="">Total number of the same product.</label>
									<div class="" id="stockAlert" style="margin-bottom:2px;"></div>
								</div>
								<div class="col-md-6">
										<label class="" style="font-weight:600;">Minimum order</label>
										<input type="number"value="00"  class="form-control" id="min_order" name="min_order" placeholder="00" required />
										<label class="padding-top-10 text-muted font-sm" style="">Least quantity a customer can order or place.</label>
									<div class="" id="min_orderAlert" style="margin-bottom:2px;"></div>
								</div>
							</div>
								<br>
							<div class="row">
								<div class="col-md-12">
									<label class="" style="font-weight:600;">Product Description</label>
									<label class="padding-top-10 text-muted font-sm" style="">Describe your product.</label><br>
									<textarea class="block" id="prdt_desc" name="prdt_desc" placeholder="Describe your product" rows="3" style="width:100%;" required></textarea>
									<div class="" id="describeAlert" style="margin-bottom:2px;"></div>
								</div>
							</div>
								<br>
							<div class="row  hidden-xs hidden-sm hidden-md hidden-lg ">
								<div class="col-md-6">
										<label class="" style="font-weight:600;">Product Colors</label>
										<input type="text" value="00" class="form-control" id="prdt_color" name="prdt_color" placeholder="Color" required />
										<label class="padding-top-10 text-muted font-sm" style="">For different colors that come with the product, use "and" to mix colors for one product and use "," to differentiate colors.</label>
									<div class="" id="colorAlert" style="margin-bottom:2px;"></div>
								</div>
								<div class="col-md-6">
										<label class="" style="font-weight:600;">Product Condition</label>
										<input type="text" value="00" class="form-control" id="prdt_cond" name="prdt_cond" placeholder="Condition" required />
										<label class="padding-top-10 text-muted font-sm" style="">Eg: New, Used, Refurbished etc.</label>
									<div class="" id="condAlert" style="margin-bottom:2px;"></div>
								</div>
							</div>
								<br clear="all" />
						</div>
					</div>
				</div>
			</div>

								<div class="col-sm-12 col-md-12 col-lg-5">
									<div class="" style="margin-right: 10px;">
										<div class="row">
											<div class="col-md-12">
												<div class="" id="imageAlert" style="margin-bottom:2px;"></div>
												<label class="" style="font-weight:600;">Product main Image</label>
											<br>
													<div class="btn btn-primary "id="upload_button1">Browse Image</div>
													
													<div class="text-success upload_message"></div>
													<br clear="all" /><label class=" text-muted font-sm" style="">Uploaded images with a jpg or jpeg format. </label>    
												    <center>
													    <div class="wrapper " align="center"><!-- Main Wrapper -->
														    <div id="vpb_uploads_error_displayer"></div><!-- Error Message Displayer -->
														    <div id="vpb_uploads_displayer"></div><!-- Success Message (Files) Displayer -->
														    <br clear="all" />
											    		</div>
										    		</center>
									    	</div>
							    	</div>
									<label class="" style="font-weight:600;">Additional images</label>
						    		<br><button class="btn btn-primary" style="" id="morePix_btn">Add Images</button>
								<section id="morePix" style="display:none; margin-top:15px;">
							    		<strong class="text-info">You can add upto 6 more images</strong>
							    		<div class="row no-margin no-padding" style="margin-bottom:7px; margin-top:10px;">
											<div class="col-md-12">
												<fieldset style="border: 1px solid #CCC; padding:0 10px;"><legend class="text-info" style="padding:0px; margin:0px; font-size:inherit;">Second image</legend>
													<div class="btn btn-primary pull-right"id="upload_button2">Browse Images</div><div class="text-success upload_message"></div><br clear="all" />    
												    <center>
													    <div class="wrapper " align="center"><!-- Main Wrapper -->
														    <div id="vpb_uploads_error_displayer2"></div><!-- Error Message Displayer -->
														    <div id="vpb_uploads_displayer2"></div><!-- Success Message (Files) Displayer -->
														    <br clear="all" />
											    		</div>
										    		</center>
									    		</fieldset>
								    		</div>
							    		</div>
							    		<div class="row no-margin no-padding" style="margin-bottom:7px;">
											<div class="col-md-12">
												<fieldset style="border: 1px solid #CCC; padding:0 10px;"><legend class="text-info" style="padding:0px; margin:0px; font-size:inherit;">Third image</legend>
													<div class="btn btn-primary pull-right"id="upload_button3">Browse Images</div><div class="text-success upload_message"></div><br clear="all" />    
												    <center>
													    <div class="wrapper " align="center"><!-- Main Wrapper -->
														    <div id="vpb_uploads_error_displayer3"></div><!-- Error Message Displayer -->
														    <div id="vpb_uploads_displayer3"></div><!-- Success Message (Files) Displayer -->
														    <br clear="all" />
											    		</div>
										    		</center>
									    		</fieldset>
								    		</div>
							    		</div>
							    		<div class="row no-margin no-padding" style="margin-bottom:7px;">
											<div class="col-md-12">
												<fieldset style="border: 1px solid #CCC; padding:0 10px;"><legend class="text-info" style="padding:0px; margin:0px; font-size:inherit;">Forth image</legend>
													<div class="btn btn-primary pull-right"id="upload_button4">Browse Images</div><div class="text-success upload_message"></div><br clear="all" />    
												    <center>
													    <div class="wrapper " align="center"><!-- Main Wrapper -->
														    <div id="vpb_uploads_error_displayer4"></div><!-- Error Message Displayer -->
														    <div id="vpb_uploads_displayer4"></div><!-- Success Message (Files) Displayer -->
														    <br clear="all" />
											    		</div>
										    		</center>
										    	</fieldset>
								    		</div>
							    		</div>
							    		<div class="row no-margin no-padding">
											<div class="col-md-12">
												<fieldset style="border: 1px solid #CCC; padding:0 10px;"><legend class="text-info" style="padding:0px; margin:0px; font-size:inherit;">Fifth image</legend>
													<div class="btn btn-primary pull-right"id="upload_button5">Browse Images</div><div class="text-success upload_message"></div><br clear="all" />    
												    <center>
													    <div class="wrapper " align="center"><!-- Main Wrapper -->
														    <div id="vpb_uploads_error_displayer5"></div><!-- Error Message Displayer -->
														    <div id="vpb_uploads_displayer5"></div><!-- Success Message (Files) Displayer -->
														    <br clear="all" />
											    		</div>
										    		</center>
										    	</fieldset>
								    		</div>
							    		</div>
							    		<div class="row no-margin no-padding">
											<div class="col-md-12">
												<fieldset style="border: 1px solid #CCC; padding:0 10px;"><legend class="text-info" style="padding:0px; margin:0px; font-size:inherit;">Sixth image</legend>
													<div class="btn btn-primary pull-right"id="upload_button6">Browse Images</div><div class="text-success upload_message"></div><br clear="all" />    
												    <center>
													    <div class="wrapper " align="center"><!-- Main Wrapper -->
														    <div id="vpb_uploads_error_displayer6"></div><!-- Error Message Displayer -->
														    <div id="vpb_uploads_displayer6"></div><!-- Success Message (Files) Displayer -->
														    <br clear="all" />
											    		</div>
										    		</center>
										    	</fieldset>
								    		</div>
							    		</div>
							    		<div class="row no-margin no-padding">
											<div class="col-md-12">
												<fieldset style="border: 1px solid #CCC; padding:0 10px;"><legend class="text-info" style="padding:0px; margin:0px; font-size:inherit;">Seventh image</legend>
													<div class="btn btn-primary pull-right"id="upload_button7">Browse Images</div><div class="text-success upload_message"></div><br clear="all" />    
												    <center>
													    <div class="wrapper " align="center"><!-- Main Wrapper -->
														    <div id="vpb_uploads_error_displayer7"></div><!-- Error Message Displayer -->
														    <div id="vpb_uploads_displayer7"></div><!-- Success Message (Files) Displayer -->
														    <br clear="all" />
											    		</div>
										    		</center>
										    	</fieldset>
								    		</div>
							    		</div>
						    		</section>
						    		<div class="" id="feedBack" style="margin:5px 0 0 12px;"></div>
						    		<input type="hidden" id="myfile1" name="myfile1" value="" />
						    		<input type="hidden" id="myfile2" name="myfile2" value="" />
						    		<input type="hidden" id="myfile3" name="myfile3" value="" />
						    		<input type="hidden" id="myfile4" name="myfile4" value="" />
						    		<input type="hidden" id="myfile5" name="myfile5" value="" />
						    		<input type="hidden" id="myfile6" name="myfile6" value="" />
						    		<input type="hidden" id="myfile7" name="myfile7" value="" />
										<a id="upload_button" href="javascript:void(0);" class="hide btn btn-link profile-link-btn" rel="tooltip"  title="Add Photo"><i class="fa fa-camera"></i></a>
									</div><hr>
									
									<button name="saveproduct" type="submit" class="btn btn-success pull-right" style="" id="add_product_btn"> Save product</button>
									
								</div>
								<div class="overlay hide" id="addprdtover1">
                	<i class="fa fa-refresh fa-spin"></i>
              	</div>
							</div>
					</div>
				</div>
				<div class="col-md-2">
				  <div class="well well-xs">
						<div class="row">
					   </div>
				  </div>
				</div>
			</div></div>
			<?php footer(); ?>
		</div>
		<!-- END MAIN CONTENT -->

		<!-- new CHAT widget -->
		<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" 
		data-widget-togglebutton="true" data-widget-fullscreenbutton="false" style="width:300px; position:fixed; bottom:-30px; right:20px; z-index:2;">
			<header>
				<span class="widget-icon" > <i class="fa fa-comments txt-color-white" style="line-height:2.5 !important;"></i> </span>
				<h2 id="chatTitle"> MyKanta Chat </h2>
				<div class="widget-toolbar">
					
					<a href="javascript:chatMinBtnFunc();"><span id="chatMinBtn" class="widget-icon padding-5"> <i id="chatMinBtnI" class="fa fa-plus txt-color-white"></i> </span></a>
				</div>
			</header>

			<!-- widget div-->
			<div id="chatWrapper" style="display:none;">
				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<div>
						<label>Title:</label>
						<input type="text" />
					</div>
				</div>
				<!-- end widget edit box -->

				<div class="widget-body widget-hide-overflow no-padding">
					<!-- content goes here -->

					<!-- CHAT CONTAINER -->
					<div id="chat-container" class="open chat-container" style="height:230px;">
						<span class="chat-list-open-close"><i class="fa fa-user"></i><b>!</b></span>

						<div class="chat-list-body custom-scroll" style="height:230px;">
							<ul id="chat-users">
								<?php get_onlinefriendnames($user_id); ?>
							</ul>
						</div>
					</div>

					<!-- CHAT BODY -->
					<ul id="chat-body" class="chat-body custom-scroll myChatBody" style="height:230px;">
							<li class="message" style="padding:10px; margin:10px 30px 0 0; background-color: #EAEAEA; border-left:4px solid #4C4F53;">
								<div class="message-text" style="margin:0;">
									Select a friend to chat with from the panel on the right 
								</div>
							</li>
					</ul>

					<!-- CHAT FOOTER -->
					<div class="chat-footer">
						<form name="message" action="">
							<!-- CHAT TEXTAREA -->
							<div class="textarea-div">
								<div class="typearea">
									<!--<textarea placeholder="Write a message..." id="textarea-expand" name="textarea-expand" class="custom-scroll" style="min-height:40px;"></textarea>-->
									<input type="text" name="usermsg" id="usermsg" class="custom-scroll" style="width:100%; border:none;" placeholder="Write a message..." />
								</div>
							</div>
							<!-- CHAT REPLY/SEND -->
							<span class="textarea-controls">
								<input type="submit" class="btn btn-sm btn-primary pull-right" id="submitmsg" name="submitmsg" value="Send" />
							</span>
						</form>
					</div>
					<!-- end content -->
				</div>
			</div>
			<!-- end widget div -->
		</div>
		<!-- end widget -->

		<div class="modal fade" id="productterms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Mykanta Product Listing Policy</h4>
					</div>
					<div class="modal-body">
					   <div class="row">
					   	<div class="col-xs-12">
							 	<p class="text-danger" style="text-align:center;"><b>PLEASE READ CAREFULLY BEFORE POSTING YOUR TRADING ITEM(S) ON MYKANTA.COM</b></p>
							 	<ol style="line-height: 1.5;">
									<li>You may not submit, sell or buy any item that is restricted or prohibited by a federal, 
									state, local law /authority in any country or Jurisdiction on mykanta.com</li>
									<li>Mykanta does not permit any trading items that are illegal, infringe upon the intellectual 
									property rights of another business or person(s), or products that could easily be used for illegal activities or purposes.</li>
									<li>Mykanta reserve the right to remove any trading items that in any way or another violate this “Product Listing Policy” with or 
									without any further notice. Mykanta also reserve the right to disable the accounts of any member who continue to violate this Policy after been warned.</li>
									<li>It’s the sole responsibility of the Business administrators to ensure that the items or products posted are legal and permissible.</li>
									<li>This policy is guided by the terms and condition of mykanta.com, data and privacy policy and advertisement policy. We reserve the 
									right to change any content herein with or without notice at any given time period. Please contact mykanta support team at support@mykanta.com</li>
								</ol>

								<p><b>The following are Product list and types that are prohibited on mykanta:</b></p>
								<ul>
									<li><b>Governmental Discipline: </b></li>
										<ul>
											<li>Governmental uniforms including transit uniforms</li>
											<li>Governmental documents</li>
											<li>Government IDS and Licenses</li>
										</ul>


									<li><b>Adults and Nudity:</b></li>
										<ul>
											<li>Adults’ subscriptions services or conversation services</li>
											<li>Erotic, Pornographic and adult content including but not limited to audio, visual, magazines, DVD’s , VCD’s, toys, etc.</li>
											<li>Products or images showcasing nudity</li>
										</ul>

									<li><b>Finance:</b></li>
										<ul>
											<li>Credit cards, application for financial services or loans, credit repair services</li>
											<li>Any form of financial services, including but not limited to; money transfer, bank guarantees and letters of credit, loans etc.</li>
											<li>Request for donation or money or materials or products or substances, etc.</li>
											<li>Lottery, raffle, contest, award winning services etc.</li>
										</ul>

									<li><b>Drugs:</b></li>
										<ul>
											<li>Illegal drugs or drug paraphernalia</li>
											<li>Prescription drugs or devices, controlled substances, unapproved or illegal drugs and devices</li>
										</ul>

									<li><b>Fraud:</b></li>
										<ul>
											<li>Replica and name brand (unreal products)</li>
											<li>Counterfeit Currency and Stamps</li>
											<li>Stolen items or items that does not exist or trickery products with lower prices to get users attention</li>
										</ul>

									<li><b>Cyber:</b></li>
										<ul>
											<li>Unauthorized Software, copied software, etc.</li>
											<li>Spyware, spam, email advertisement or any commercial messaging services</li>
											<li>Mailing list and personal information</li>
										</ul>

									<li><b>Ticketing:</b></li>
										<ul>
											<li>Contracts and Tickets: unless approved and authorized by Mykanta Ghana</li>
											<li>Event ticket resale (example: movie, sporting, or general entertainment event tickets)</li>
										</ul>

									<li><b>Education and Occupation:</b></li>
										<ul>
											<li>Diplomas and Degrees</li>
											<li>Job Posting ( unless approved and authorized by mykanta)</li>
										</ul>

									<li><b>Anonymous Sales:</b></li>
										<ul>
											<li>Firearms, ammunition, stun guns, arms or high capacity magazines, military weapons</li>
											<li>Gold Dust, gold bullion and other unrefined precious minerals or metals (excluding Jewellery)</li>
											<li>Human body parts, fluids and remains</li>
											<li>Animal Products or wildlife (example; Skin, internal organ, pelts, teeth, claws, shells, bones, ivory, any part of an alive or dead animal)</li>
										</ul>

									<li><b>Racism and Religion:</b></li>
										<ul>
											<li>Post or items promoting hatred, racism, or religious persecution</li>
										</ul>
								</ul>
							</div>
					   </div>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->

	</div>
	<!-- End main -->

	<!-- BOOTSTRAP JS -->
	<script src="/js/load_product_modal.js"></script>

		<?php 
	//include required scripts
	include("inc/scripts.php"); 
	//include footer
 
?>
<input type="hidden" id="user_id" value="<?php echo $user_id ; ?>" /> 
<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" /> 
<input type="hidden" id="owner_id" value="<?php echo $shop_id ; ?>" /> 
<input type="hidden" id="shop_id" value="<?php echo $shop_id ; ?>" />
<input type="hidden" id="shopName" value="<?php echo $shopName ; ?>" />
<input type="hidden" id="product_id" value="" />
<input type="hidden" id="product_nameformat" value="" />
<input type="hidden" id="page" value="edit_service" />
<!--Chat 4 hidden inputs-->
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" />  
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<script src="/js/plugin/summernote/summernote.min.js"></script>
   <!-- 	<script type="text/javascript">
		$(document).ready(function() {
			$('#prdt_desc').summernote({
				height : 130,
				focus : false,
				tabsize : 2,
				toolbar:[
			    	['style', ['style']],
			    	['font', ['bold', 'italic', 'underline', 'clear']],
			    	['para', ['ul', 'ol']],
			    	['height', ['height']],
			   		['insert', ['hr']],
			    	['help', ['help']]
			  	]
			});
		})
	</script>

 Start Chat -->
	<!-- End Chat -->
    <!--<script type="text/javascript">
    	function meClick(){
    		croppic.reset();
    	}
    </script>-->
	<script type="text/javascript">
		$('#morePix_btn').click(function()
		{
			$('#morePix_btn').hide();
			$('#morePix').css('display' , 'block');
		});
	</script>
</body>
</html>