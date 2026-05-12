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
$shopName = strip_text($shopName2);
$clean_name = formatUrl_rev($shopName); 
$shop_id = shop_id_from_name($clean_name);
if(empty($shop_id)){header("location:/home");} 
echo $shopName. " is loading...";
?>
<html lang="en-us">
<meta charset="utf-8">
<title><?php echo $shopName ; ?></title>
<link rel="icon" href="/img/mk.png" type="image/x-icon">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<head><link rel="stylesheet" type="text/css" href="/css/styles.css" />
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/js/ajaxupload_image.3.5.js" ></script>
<script type="text/javascript" src = "/js/comment_shop_admin.js"></script>
<script type="text/javascript" src = "/js/clear_cart.js"></script>
<script type="text/javascript" src="/js/add_friend.js"></script>
<script type="text/javascript" src="/js/change_pass.js"></script>
<script type="text/javascript" src = "/js/shop_create.js"></script>
<script type="text/javascript" src = "/js/settings_shop.js"></script>
<script type="text/javascript"src="/js/load_product_modal.js"></script>
<script type="text/javascript" src="js/upload_product_image_1.js" ></script>
<script type="text/javascript" src = "/js/countries.js"></script>
<script type="text/javascript" src="/js/add_product_image.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/shop_comment_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/reply_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript" src="/js/shop_uploader_image.js" ></script>
<script type="text/javascript" src="js/product_insert.js" ></script>
<script type="text/javascript" src="js/check_device_banner.js" ></script>
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
      <div class="row no-padding"style="margin-left:-15px;">
       	<div class="col-md-12 col-lg-12 " >
          <div class="well well-sm no-margin no-padding">
             	<div class="row" style="padding-bottom:5px;">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="padding-left:16px;"> 
									<div id="shopname_change">
										<h1 style="margin:0; border:none;" class="pull-left padding-5 text-primary"><a href="/User/my_business/<?php echo $shopName;?>"><?php echo $shopName; ?></a><small> - Edit Business Information</small></h1>
										<button class="btn btn-primary btn-sm pull-right" style="margin:5px;" data-target="#productterms" data-toggle="modal" class="text-info">View Product Listing Policy</button>
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:20px;">
								<?php include "include/bus_edit.php"; ?>
							<div class="overlay hide" id="editprdtover1">
                	<i class="fa fa-refresh fa-spin"></i>
              	</div></div>
					</div>
					
				</div>
				
			</div>	</div>
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
	

<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>
			<h4 class="modal-title" id="myModalLabel">Add Product</h4>
		</div>
		<div class="modal-body">
		
		
		

			<div class="row">
				
					<div class="col-md-12">
						<div class="" id="nameAlert" style="margin-bottom:2px;"></div>
						<input type="text" class="form-control" id="prdt_name"  name="prdt_name" placeholder="Name of the product" required />
					</div>
					</div>
					<br>
					<div class="row">
					<div class="col-md-12">
						<div class="" id="describeAlert" style="margin-bottom:2px;"></div>
						<label class="text-info">Product Description</label>
						<textarea class="form-control" id="prdt_desc" name="prdt_desc" placeholder="Describe your product" rows="5" required></textarea>
					</div>
				
			</div>
			<br>
			<div class="row">
				
				<div class="col-md-6">
					<div class="" id="priceAlert" style="margin-bottom:2px;"></div>
						<input type="number" class="form-control" id="price" name="price" placeholder="Price" required />
					
				</div>
			</div>
			<br clear="all" />
			<div class="row" style="margin-bottom:7px;">
				<div class="col-md-12">
					<div class="" id="imageAlert" style="margin-bottom:2px;"></div>
					<fieldset id="img1_field" style="border: 1px solid #CCC; padding:0 10px;"><legend style="padding:0px; margin:0px; font-size:inherit;">Main image</legend>
						<div class="btn btn-primary pull-right"id="upload_button1">Browse Images</div><div class="text-success upload_message"></div><br clear="all" />    
					    <center>
						    <div class="wrapper " align="center"><!-- Main Wrapper -->
							    <div id="vpb_uploads_error_displayer"></div><!-- Error Message Displayer -->
							    <div id="vpb_uploads_displayer"></div><!-- Success Message (Files) Displayer -->
							    <br clear="all" />
				    		</div>
			    		</center>
		    		</fieldset>
	    		</div>
    		</div>
    		<button class="btn btn-info" style="margin-top:5px;" id="morePix_btn">Add more Images</button>
    		<section id="morePix" style="display:none; margin-top:15px;">
	    		<strong class="text-info">You can add upto 6 more images</strong>
	    		<div class="row" style="margin-bottom:7px; margin-top:10px;">
					<div class="col-md-12">
						<fieldset style="border: 1px solid #CCC; padding:0 10px;"><legend style="padding:0px; margin:0px; font-size:inherit;">Second image</legend>
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
	    		<div class="row" style="margin-bottom:7px;">
					<div class="col-md-12">
						<fieldset style="border: 1px solid #CCC; padding:0 10px;"><legend style="padding:0px; margin:0px; font-size:inherit;">Third image</legend>
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
	    		<div class="row" style="margin-bottom:7px;">
					<div class="col-md-12">
						<fieldset style="border: 1px solid #CCC; padding:0 10px;"><legend style="padding:0px; margin:0px; font-size:inherit;">Forth image</legend>
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
	    		<div class="row">
					<div class="col-md-12">
						<fieldset style="border: 1px solid #CCC; padding:0 10px;"><legend style="padding:0px; margin:0px; font-size:inherit;">Fifth image</legend>
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
	    		<div class="row">
					<div class="col-md-12">
						<fieldset style="border: 1px solid #CCC; padding:0 10px;"><legend style="padding:0px; margin:0px; font-size:inherit;">Sixth image</legend>
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
	    		<div class="row">
					<div class="col-md-12">
						<fieldset style="border: 1px solid #CCC; padding:0 10px;"><legend style="padding:0px; margin:0px; font-size:inherit;">Seventh image</legend>
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
    		<div class="" id="feedBack" style="margin-top:4px;"></div>
    		<input type="hidden" id="myfile1" name="myfile1" value="" />
    		<input type="hidden" id="myfile2" name="myfile2" value="" />
    		<input type="hidden" id="myfile3" name="myfile3" value="" />
    		<input type="hidden" id="myfile4" name="myfile4" value="" />
    		<input type="hidden" id="myfile5" name="myfile5" value="" />
    		<input type="hidden" id="myfile6" name="myfile6" value="" />
    		<input type="hidden" id="myfile7" name="myfile7" value="" />			

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cancel
			</button>
			<input name="searchshopname" type="submit" class="btn btn-primary btn-md"  value='Add product' id="add_product_btn" />
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
<!--
</form>-->



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
<a href="/ajax/delete_shop.php?shopName=<?php echo $shopName; ?>">
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
<a href="/ajax/restore_shop.php?shopName=<?php echo $shopName; ?>">
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
 
	<script src="js/plugin/summernote/summernote.min.js"></script>
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
	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#prdt_desc').summernote({
				height : 180,
				focus : false,
				tabsize : 2,
				toolbar: [
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

	<script src="/include/croppic/croppic.min.js"></script>
    <script src="/include/croppic/assets/js/main.js"></script>

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
				//uploadUrl:'img_save_to_file.php',
				cropData:{
					"shop_id":shop_id,
					"shop_name":shop_name
				},
				cropUrl:'/banner_crop_to_file.php',
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

	<script type="text/javascript">
		$('#morePix_btn').click(function()
		{
			$('#morePix_btn').hide();
			$('#morePix').css('display' , 'block');
		});
	</script>
</body>
</html>