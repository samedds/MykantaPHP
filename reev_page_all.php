<?php
ini_set('session.cookie_httponly',true);
ob_start();
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn_vis.php";
//include "include/chat/chat.php";
//include "include/check_connection.php";		
 //$user_id = $_SESSION['id'];
 //$account_id = $_SESSION['id'];
                                                               
//$friend_id = friend_id_from_name($username);
//$owner_id = $friend_id ;	
echo "reev is Loading...";
				
?>
<html lang="en-us">
<meta charset="utf-8">
<title> <?php echo $reev_nu; ?></title>
<link rel="icon" href="/img/mk.png" type="image/x-icon">
<meta name="description" content="">
<meta name="author" content="">
	
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="canonical" href="www.mykanta.com"/>
<meta property="og:image" content="http://www.mykanta.com/img/comments_images/<?php echo  $friend_image; ?>" />
<meta property="og:description" content="Coaches share their secrets to success so you can rock 2015. Join us for this inspiring, rejuvenating, motivating look at what secret sauce these coaches use to succeed in their business. This is for coaches of any level that are committed to changing the world. You will be elevated both in your life and your coaching business. Check out the topics below, there is something for everyone." />

<meta property="og:url"content="http://www.coachesneedsocial.com/coacheswisdomtelesummit/" />

<meta property="og:title" content="Coaches Wisdom Telesummit" />

<noscript>
<meta http-equiv="refresh" content="0;URL=www.mykanta.com">
</noscript>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<head>
<script type= "text/javascript" src = "/js/countries.js"></script>

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
 </style> 

	
		
		<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">

	</head>
	<body class="fixed-header">
	<!-- HEADER -->
	    <?php include 'inc/visitor_header.php';?>
		<!-- END HEADER -->

		 <!-- BEGIN NAVIGATION -->
		<?php 
		nav();
		?>
<div id="main" role="main">
<div id="content" style="margin-top:-30px;">
<div class="row padding-10">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no-padding">
	<ul class="list-inline ">
	<li class=" padding-10">
	<?php  get_profile_pic_friend($friend_id);  ?>
    </li>	
	<li class=" ">
	<?php frienddetailsnoget($friend_id) ;?>
	</li>	
	</ul>	
	<em style="padding-right:20px;"> Click image to play.</em>
	<?php get_status_comment_f($friend_id); ?>

					
</div>
</div>
			
<?php include("inc/footer.php");  ?>		
</div>
		</div>	

		<?php 
	//include required scripts
	include("inc/scripts.php"); 
	//include footer
	include("inc/google-analytics.php"); 
?>	

		
		
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	
	</body>

</html>