<?php 
//for Xss 
ini_set('session.cookie_httponly',true);
include "include/funcxn_vis.php";
$cat_id=$_GET['cat_id'];
$category = cat_reform($cat_id);
$description = 'Here, you will find all items and accessories related to '.$category.'. ';
$image_loc = 'http://wwww.mykanta.com/img/site_img/mykanta_wallpaper.jpg ';
?>
<html lang="en-us">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<title>Mykanta | <?php echo $category;?> - Order Now for Free !</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="canonical" href="http://wwww.mykanta.com/business-category/<?php echo $cat_id; ?>"/>
<meta property="og:locale" content="en_US"/>
<link rel="icon" href="<?php echo 'http://www.mykanta.com'.$image_loc; ?>" type="image/x-icon" />
<meta property="og:image" content="<?php echo 'http://www.mykanta.com'.$image_loc; ?>"/>
<meta property="og:type" content="Website">
<meta property="article:author" content="<?php echo ucwords($category);?>"/>
<meta name="author" content="<?php echo ucwords($category);?>"/>
<meta property="article:tag" content="Online Free Orders from Verified Genuine Business <?php echo ucwords($category);?> "/>
<meta property="article:section" content="Business"/>
<meta property="og:site_name" content="Mykanta.com">
<meta property="og:url" content="http://wwww.mykanta.com/business-category/<?php echo $cat_id; ?>">
<meta property="og:title" content="Mykanta Online Shopping | <?php echo $category;?> - Order Now for Free !">
<meta property="og:description" content="<?php echo $description; ?>">
<!--<meta name="article:published_time" content=""> UTC seconds -->
<!--<meta name="article:modified_time"  content="1431556620"> UTC seconds -->
<meta name="twitter:card" content="<?php echo $image_loc; ?>">
<meta name="twitter:site" content="@Mykanta_">
<meta name="twitter:title" content="Mykanta Online Shopping | <?php echo $category;?> - Order Now for Free !">
<meta name="twitter:description" content="<?php echo $description; ?>">
<meta name="twitter:image:<?php echo 'http://www.mykanta.com'.$image_loc; ?>">
<meta name="description" content="<?php echo $description; ?>">
<link rel="icon" href="<?php echo $image_loc; ?>" type="image/x-icon" />
<noscript>
<meta http-equiv="refresh" content="0;URL=www.mykanta.com">
</noscript>
<script type="text/javascript" src = "/js/countries.js"></script>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/js/ajaxupload_image.3.5.js" ></script> 
<script type= "text/javascript" src="/js/load_product_modal_vis.js"></script>
<head>
	<!-- styles and scripts needed by jScrollPane -->
	<link type="text/css" href="/include/jscrollpane/jquery.jscrollpane.css" rel="stylesheet" media="all" />
	<script type="text/javascript" src="/include/jscrollpane/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="/include/jscrollpane/jquery.jscrollpane.js"></script>
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
		$('.smyscroll').jScrollPane();
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
<script type="text/javascript" src="/include/chat/chat.js" ></script>
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
@media screen and (max-width: 450px) 	{
	.nav-tabs li{
	
		font-size: 10px;
	}
}
@media screen and (max-width: 390px) 	{
	.nav-tabs li{
		font-size: 9px;
	}
	.nav li a{
		padding:5px !important;
	}
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

</style>
<!-- For cropper -->
<link href="/include/croppic/assets/css/croppicprofile.css" rel="stylesheet" />
		
<!-- Basic Styles -->
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css"><link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>

</head>
<body class="fixed-header smart-skin-2">
<!-- HEADER -->
<?php include 'inc/visitor_header.php';?>
<!-- END HEADER -->
<!-- BEGIN NAVIGATION -->
<?php 
nav();
?>
	<div id="main" role="main">

			

			<!-- MAIN CONTENT -->
			<div id="content" style=" ">
<h4 class ="text-primary"><?php echo $category;?></h4>
<ul class="list-inline">
 <?php include "include/product_category_vis.php";?>
</ul>
 <?php  include "inc/footer.php"; ?>
</div>
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

</body>
</html>