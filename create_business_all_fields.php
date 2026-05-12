 
<?php 
ini_set('session.cookie_httponly',true);
ob_start();
@session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";
$user_id = $_SESSION['id'];
$account_id = $_SESSION['id'];
$owner_id = $_SESSION['id'];
 //include "include/chat/chat.php";	
?>
<html lang="en-us">
<meta charset="utf-8" />
<title>Create Business</title>
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
<script type= "text/javascript" src = "/js/shop_create.js"></script>
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
    width: 157px;
    height: 57px;
    background: url(/img/site_img/upload.png);
    overflow: hidden;
}

div.upload input {
    display: block !important;
    width: 157px !important;
    height: 57px !important;
    opacity: 0 !important;
    overflow: hidden !important;
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
<?php     include "inc/user_header.php"; ?>
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

 	<div id="content">
		<div class="row wall paper no-padding" >
		<ul class="nav nav-tabs tabs-pull-left col-md-6">
<li class="active">
<a href="#a1"  data-toggle="tab">	<h4 class="text-primary">Product Oriented Business
</h4></a>
</li>
<li>
<a href="#a2" data-toggle="tab"><h4 class="text-primary">Service Oriented Business</h4></a>
</li> 
</ul>
<div class="tab-content padding-10">
		<div class="tab-pane fade in active" id="a1">								
			<div class="col-sm-6 padding-10" style=" margin-left:1px;">
				
				
               <form>
				<div class="  smart-form " id="form_holder">
				<div class="row">
				
				<p class="padding-10" style="color:black; font-size:1.8em;">About</p>
					<section class="col col-6">
					  <span style="color:black; font-size:1.2em;">Business Name</span>
						<label class="input"><i class="icon-append fa fa-home"></i>
							<input type="text" id="bizname" placeholder="Business name"   />
							<b class="tooltip tooltip-top-right">Your unique business name. contact support@mykanta.com if your business name is taken</b> 
						</label>
					</section>
					
				  <section class="col col-3">
				    <span style="color:black; font-size:1.2em;">Business Type</span>
				    	<div class="input-group">
						   <span class="input-group-addon"><i class="fa fa-suitcase fa-sm fa-fw"></i></span>
						  <select id="biz_type"  placeholder="Full name" class="form-control input-sm">
						 <option>Agent</option>
						 <option>Retailer</option>
						 <option>Association</option> 
						 <option>Manufacturing</option>
						 <option>buying business</option>
						 <option>Business service</option>
						 <option>Trading business</option>
						 <option>wholesaler/distributor</option>
						</select>
					  </div>
					</section>
					<section class="col col-3">
					<span style="color:black; font-size:1.2em;">Business Category</span>
					<div class="input-group">
						   <span class="input-group-addon"><i class="fa fa-tag fa-sm fa-fw"></i></span>
						 <select class=" form-control"  id="biz_cat" >
				<option>Gifts & Toys</option>
				<option>Health & Beauty</option>
				<option>Sports & Accessories</option>
				<option>Auto & Transportation</option>
				<option>Art, Crafts & Gallery </option>
				<option>Home, Lights & Construction</option>
				<option>Machinery, Hardware & Tools</option>
				<option>Agriculture, Food & Beverage</option>
				<option>Packaging, Advertising & Office</option>
				<option>Stationery, Furniture & Fittings</option>
				<option>Software, Computers & Accessories</option>
				<option>Electronics & Electrical Appliances</option>
				<option>Metallurgy, Chemicals, Rubber & Plastics</option>
				<option>Clothing, Textiles, Jewelry, Bags & shoes</option>
				<option>Electrical Equipment, Components, & Telecom</option>

				</select> 
					</div>
					</section>
					<div class="row padding-10">
					<section class="col padding-no col-sm-12 " style="margin-bottom:5px;  padding-left:20px; padding-right:20px;">
					<span style="color:black; font-size:1.2em;">Business Description</span>
						<label class="textarea"> 										
							<textarea rows="3" class="custom-scroll" id="shopdescrb" placeholder="Business Description"></textarea> 
						</label>
					</section>
					</div>
					
					<div class="row padding-10">
					<p class="padding-10" style="color:black; font-size:1.8em;">Location</p>
					<section class="col col-4">
					<span style="color:black; font-size:1.2em;">Country</span>
					<div class="input-group">
						   <span class="input-group-addon"><i class="fa fa-flag fa-sm fa-fw"></i></span>
						 <select id="biz_country" disabled="disabled"  class="form-control input-sm"    /><option>Ghana</option>
				</select>
					</div>
					</section>
					<section class="col col-4">
					<span style="color:black; font-size:1.2em;">Region/State </span>
						 <div class="input-group">
						   <span class="input-group-addon"><i class="fa fa-map-marker fa-sm fa-fw"></i></span>
							 <select id ="region" class="form-control input-sm" ><option>Ashanti</option><option>Brong-Ahafo</option><option>Central</option><option>Eastern</option><option>Greater Accra</option><option>Northern</option><option>Upper East</option><option>Upper West</option><option>Volta</option><option>Western</option></select></div>
						
					</section>
						<section class="col col-4">
						<span style="color:black; font-size:1.2em;">City </span>
					<label class="input"> <i class="icon-append fa fa-thumb-tack"></i>
						<input type="text" id="biz_city" placeholder="City"   />
						<b class="tooltip tooltip-top-right">City where business is.</b> </label>
				</section>
					<section class="col padding-no col-sm-12 " style="margin-bottom:5px;  padding-left:20px; padding-right:20px;">
					<span style="color:black; font-size:1.2em;">Business Address</span>
						<label class="textarea"> 										
							<textarea rows="3" class="custom-scroll" id="biz_address" placeholder="Business Address, where customers can locate your business"></textarea> 
						</label>
					</section>
					
					</div>
					
					<div class="row padding-10">
					<p class="padding-10" style="color:black; font-size:1.8em;">Contact Info</p>
					<section class="col col-4">
					<span style="color:black; font-size:1.2em;">Business Email</span>
					<label class="input"> <i class="icon-append fa fa-envelope"></i>
						<input type="email" id="biz_email" placeholder="Business email address"   />
						<b class="tooltip tooltip-top-right">Your business email which your clients may contact you</b> </label>
				  </section>
					

					<section class="col col-1" style="width:90px;">
					<span style="color:black; font-size:1.2em;">Code</span>
						 <div class="input-group">
						   <select id="biz_code" class="form-control input-sm"   disabled="disabled" ><option>+233</option></select></div>
					</section > 
					<section class="col col-2"  style="width:190px;">
					<span style="color:black; font-size:1.2em;"> Telephone</span>
						<label class="input" style="width:100%;"><i class="icon-append fa fa-phone"></i>
				<input type="tel" id="shop_telephone" placeholder="Telephone No" data-mask="(999)-999-999"  /> 
				<b class="tooltip tooltip-top-right"><span class="text-danger">Warning</span><br>Without country Code Eg: 277100100 </b> 
						</label>
						
					</section>
					 <section class="col col-4">
					 <span style="color:black; font-size:1.2em;">Business Website</span> <span class="text-info" style=" font-size:0.7em;"> If any!</span>
						<label class="input"><i class="icon-append fa fa-globe"></i>
							<input type="text" id="business_url" placeholder="Business website, optional"   />
							<b class="tooltip tooltip-top-right">Your business website link. eg:www.mykanta.com </b> 
						</label>
					</section>
					</div>
					
					
					<div class="row padding-no" style=" padding-left:20px; padding-right:15px;">
					<p class="padding-10" style="color:black; font-size:1.8em;">Others</p>
				<section class="col col-6">
				<span style="color:black; font-size:1.2em;">Business Delivery options your business offer.</span>
				<label class="checkbox">
				<input id="do1" checked="checked" type="checkbox">
				<i></i>Pickup from Store.</label>
				<label class="checkbox">
				<input id="do2" type="checkbox">
				<i></i>Self Delivery.</label>
				<label class="checkbox">
				<input id="do3" type="checkbox">
				<i></i>Other Delivery Agents.</label>
				</section>
					
					</div>
					
<div class="row padding-10">
					<section class="col padding-no col-sm-12 " style="margin-bottom:5px;  padding-left:20px; padding-right:20px;">
					<span style="color:black; font-size:1.2em;">Business Main Products</span>
						<label class="input"> <i class="icon-append fa fa-shopping-cart"></i>
							<input type="text" id="biz_core_products" placeholder="Core products eg: laptops, office chairs, wrist watch, soccer boots etc."/>
							<b class="tooltip tooltip-top-right">Your main products you deal in. </b> 
						</label>
					</section>
					</div><div id="report_btn"></div> 
						<div id="biz_btn"><button class="pull-right  btn-success btn-md" onclick="create_business()"> Create</button></div>
					</div>
				

					</div>
					</form>
				</div>	
			</div>
		
		<div class="tab-pane fade in " id="a2">								
			<div class="col-sm-6 padding-10" style=" margin-left:1px;">
				<div class="comment-holder-ul list-inline padding-10" > 	
						<form>
						  <div class=" smart-form client-form" id="form_holder2">
						
						<div class="row">
						<div class="col-12 no-padding">
						<div class="no-padding">
						<div class="row">
						<p class="padding-10" style="color:black; font-size:1.8em;">About</p>
								  <section class="col col-6">
								  <span style="color:black; font-size:1.2em;">Business Name</span>
								<label class="input"><i class="icon-append fa fa-home"></i>
									<input type="text" id="serv_name" placeholder="Business service name"   />
									<b class="tooltip tooltip-top-right">Your unique business name. contact support@mykanta.com if your business name is taken</b> 
								</label>
							</section>
							
							<section class="col col-6">
							<span style="color:black; font-size:1.2em;">Category</span>
							<div class="input-group">
								   <span class="input-group-addon"><i class="fa fa-tag fa-sm fa-fw"></i></span>
									<select class=" form-control"  id="serv_cat" >
										<option>Advertisement & Marketing Firms</option>
										<option>Media & Entertainment</option>
										<option>Online service</option>
										<option>Education</option>
										<option>Service Institutions</option>
										<option>Public Services</option>
										<option>Travel & Tourism</option>
										<option>Other</option>
										<option>People</option>
									 </select> 
							</div>
							</section>
							<div class="row padding-10">
							<section class="col padding-no col-sm-12 " style="margin-bottom:5px;  padding-left:20px; padding-right:20px;">
							<span style="color:black; font-size:1.2em;">Business Description</span>
								<label class="textarea"> 										
									<textarea rows="3" class="custom-scroll" id="serv_descrb" placeholder="Business Description"></textarea> 
								</label>
							</section>
							</div>
							<div class="row padding-10">
							<p class="padding-10" style="color:black; font-size:1.8em;">Location</p>
							<section class="col col-4">
							<span style="color:black; font-size:1.2em;">Country</span>
							<div class="input-group">
								   <span class="input-group-addon"><i class="fa fa-flag fa-sm fa-fw"></i></span>
								 <select id="serv_country" disabled="disabled"  class="form-control input-sm"    /><option>Ghana</option>
						</select>
							</div>
							</section>
							<section class="col col-4">
							<span style="color:black; font-size:1.2em;">Region/State </span>
								 <div class="input-group">
								   <span class="input-group-addon"><i class="fa fa-map-marker fa-sm fa-fw"></i></span>
									 <select id ="serv_region" class="form-control input-sm" ><option>Ashanti</option><option>Brong-Ahafo</option><option>Central</option><option>Eastern</option><option>Greater Accra</option><option>Northern</option><option>Upper East</option><option>Upper West</option><option>Volta</option><option>Western</option></select></div>
								
							</section>
								<section class="col col-4">
								<span style="color:black; font-size:1.2em;">City </span>
							<label class="input"> <i class="icon-append fa fa-thumb-tack"></i>
								<input type="text" id="serv_city" placeholder="City"   />
								<b class="tooltip tooltip-top-right">City where business is.</b> </label>
						</section>
							<section class="col padding-no col-sm-12 " style="margin-bottom:5px;  padding-left:20px; padding-right:20px;">
							<span style="color:black; font-size:1.2em;">Business Address</span>
								<label class="textarea"> 										
									<textarea rows="3" class="custom-scroll" id="serv_address" placeholder="Business Address, where customers can locate your business"></textarea> 
								</label>
							</section>
							</div>
					
							<div class="row padding-10">
							
									<p class="padding-10" style="color:black; font-size:1.8em;">Contact Info</p>
							
                         <section class="col col-4">
							<span style="color:black; font-size:1.2em;">Email</span>
							<label class="input"> <i class="icon-append fa fa-envelope"></i>
								<input type="email" id="serv_email" placeholder="Business email address"   />
								<b class="tooltip tooltip-top-right">Your business email which your clients may contact you</b> </label>
						</section>
							<section class="col col-1" style="width:85px;">
							<span style="color:black; font-size:1.2em;">Code</span>
								 <div class="input-group">
								   <select id="serv_code" class="form-control input-sm"   disabled="disabled" ><option>+233</option></select></div>
							</section>
								<section class="col col-2"  style="width:190px;">
							<span style="color:black; font-size:1.2em;"> Telephone</span>
								<label class="input" style="width:100%;"><i class="icon-append fa fa-phone"></i>
						<input type="tel" id="serv_telephone" placeholder="Telephone No" data-mask="(999)-999-999"  /> 
						<b class="tooltip tooltip-top-right"><span class="text-danger">Warning</span><br>Without country Code Eg: 277100100 </b> 
								</label>
								
							</section>
							 <section class="col col-4">
							 <span style="color:black; font-size:1.2em;"> Website</span> <span class="text-info" style=" font-size:0.7em;"> If any!</span>
								<label class="input"><i class="icon-append fa fa-globe"></i>
									<input type="text" id="serv_url" placeholder="Business website, optional"   />
									<b class="tooltip tooltip-top-right">Your website link. eg:www.mykanta.com </b> 
								</label>
							</section>
							</div>
					      <div class="row padding-10">
                            <section class="col padding-no col-sm-12 " style="">
							<span style="color:black; font-size:1.2em;"> Main Services Performed</span>
								<label class="input"> <i class="icon-append fa fa-shopping-cart"></i>
									<input type="text" id="serv_core_products" placeholder="Core products eg: laptops, office chairs, wrist watch, soccer boots etc."/>
									<b class="tooltip tooltip-top-right">The main services you do. </b> 
								</label>
							</section>
						  </div> 
						 </div> 
						</div>

								</div>
								</div>
							 <div id="serv_report_btn"></div> 
								<div  class="row" id="serv_btn"><button class="btn btn-success btn-md pull-right" onclick="create_service()"> Create </button></div>

							</div></div>
							</form>
				</div>	
			</div>		
		</div>		
	</div>		
</div>	
</div>
<DIV> 
<?php footer(); ?>
</DIV>
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
					<div class="upload">
                          <input type="file"  id="upload_button" name="upload"/>
                     </div>	
					<button class="btn-default" id="empty_gif" type="" > Empty Uploaded </button>
					<button class="btn-default" id="vpb_uploads_number" type="" > 0 </button>
					
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