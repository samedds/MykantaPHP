<?php 
ini_set('session.cookie_httponly',true);
ob_start();
session_start();
include "include/funcxn_vis.php";

if(isset($_SESSION['vis_id']))
{
 $_SESSION['vis_id'];
}
else if(!isset($_SESSION['vis_id']))
{
$datetime = date('j F Y h:m:s a');
$hash_time = hash("sha256",$datetime);
$prduct_name_short = substr($hash_time, 0, 10);
$_SESSION['vis_id'] = $prduct_name_short;
}
$shopName2 = safe_input($_GET['shopName']);
$shopName = strip_text($shopName2);
$clean_name = formatUrl_rev($shopName); 
$clean_name2 = formatUrl_true($shopName); 
$shop_id = shop_id_from_name($clean_name);
if(empty($shop_id)){
	//header("location:/home");
	} 
 $owner_id = $shop_id;
 $shop_description = substr(shop_description($shop_id), 0, 120).'...';
 $shop_banner = "http://www.mykanta.com/".shop_banner($shop_id);
?>
<html lang="en-us">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <title><?php echo ucwords($clean_name);?> - Genuine Business Online - Order for Free!</title>
  	<link rel="canonical" href="http://www.mykanta.com/business/<?php echo $shopName; ?>"/>
<link rel="icon" href="<?php echo $shop_banner; ?>" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	    <meta property="og:locale" content="en_US"/>
	    <meta property="og:type" content="Business"/>
	    <meta property="og:title" content="<?php echo ucwords($clean_name);?> - Genuine Business Online - Order for Free!"/>
	    <meta property="og:description" content="<?php echo $shop_description; ?>"/>
	    <meta property="og:url" content="http://www.mykanta.com/business/<?php echo $clean_name2; ?>"/>
	    <meta property="og:site_name" content="http://www.mykanta.com/business/<?php echo $clean_name2; ?>"/>
	    <meta property="article:author" content="<?php echo ucwords($clean_name);?>"/>
	    <meta  content="<?php echo $clean_name; ?> Online shopping Genuine Verified Assessed Businesses Products Services Wholesalers Retailers manufacturers Free Orders" property="article:tag"/>
        <meta content="<?php echo $clean_name; ?> Online shopping Genuine Verified Assessed Businesses Products Services Wholesalers Retailers manufacturers Free Orders" name="keywords"/>
	    <meta property="article:section" content="Business"/>
	    <meta property="article:published_time" content=""/>
	    <meta property="og:image" content="<?php echo $shop_banner; ?>"/>
		<meta name="description" content="<?php echo $shop_description; ?>"/>
		<meta name="author" content="<?php echo ucwords($clean_name);?>"/>
		<meta content="/img/mk.png" name="twitter:card"/>
        <meta content="@Mykanta_" name="twitter:site"/>
        <meta content="<?php echo ucwords($clean_name);?>" name="twitter:title"/>
        <meta content="<?php echo $shop_description; ?>"/>
        <meta name="twitter:image:<?php echo $shop_banner; ?>"/>
	<noscript>
	   <meta http-equiv="refresh" content="0;URL=www.mykanta.com"/>
	</noscript>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7459961549223331"
     crossorigin="anonymous"></script>
	<script type= "text/javascript" src="/js/load_product_modal_vis.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
</head>
<body class="fixed-header ">
	<?php include "inc/visitor_header.php";?>
	<?php nav();?>
	
<div id="main" role="main">
	<div id="" style="">
	
        <div class="row  no-padding"style="">
  <div class="col-sm-12">
   <div id="" class=" no-padding col-sm-12 col-md-12 col-lg-12">
	 <div class="padding-5" title="<?php echo $shopName; ?>" align="center" >
		<?php get_banner_pic($shop_id); ?>
    </div>
   </div>
   <div class=" no-padding col-sm-12 col-md-8 col-lg-8">
	 <div class=" padding-5">
		 <div class="row  no-margin"style="margin-top:-100px;">
		                            <div class="col-sm-6 col-md-6 col-lg-6 no-padding no-margin " > 
							         <h1 class="padding-5" style="font-size:1.8em;" > <?php shopName($shop_id); verification_icon($shop_id); ?>
									</h1>
									  <h3 class="padding-5" style="font-size:1.0em; margin-top:-10px;"><?php  shopcategory($shop_id); ?>
									  
									   <span>
										 <li class="btn-group" style="">
										  <a class="text-primary"style="font-size:0.9em; cursor:pointer;"href="javascript:void(0);" data-toggle="dropdown" class=" dropdown-toggle"> share</a> 
									   
											<ul class="dropdown-menu " id="show_biz_share" style="  ">
											  <li class=" no-padding"style="" >
												<a class="ttip hidden-md hidden-lg" href="whatsapp://send?text=http://mykanta.com/business/<?php echo $clean_name2; ?>" data-action="share/whatsapp/share"><img src="/img/site_img/whatsapp.png" height="20" alt="Whatsapp" title="Whatsapp"/>whatsapp</a>
											</li>
											<li><a class="ttip" title="facebook" onClick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://mykanta.com/business/<?php echo $clean_name2; ?>',
												'facebook share','width=500,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''
											); return false;" 
													href="https://www.facebook.com/sharer/sharer.php?u=http://mykanta.com/business/<?php echo $clean_name2; ?>&amp;text=<?php echo shopName($shop_id); ?>">
													<i class="fa fa-facebook fa-1x" style="color:#3B5998" ></i> Facebook</a>
												</li>	
												<li><a class="ttip" title="twitter" onClick="window.open('http://twitter.com/share?url=http://mykanta.com/business/<?php echo $clean_name2; ?>&amp;text=<?php echo shopName($shop_id); ?>',
												'Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''
											); return false;" 
													href="http://twitter.com/share?url=http://mykanta.com/business/<?php echo $clean_name2; ?>&amp;text=<?php echo shopName($shop_id); ?>">
													<i class="fa fa-twitter fa-1x" style="color:#55ACEE;"></i>Twitter</a>
												</li>
											</ul>
										   </li>
										</span>
									
											
									 </h3> 
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
	</div>
<div class="row">									
<?php include "inc/biz_serv_def_vis.php"; ?>		
</div>			
<div class="padding-10" > 
<h5 class="padding-10" style="font-size:1.2em;"> Other Genuine Business Pages</h5>
<hr class="no-padding no-margin">
<?php get_shop_showcase(); ?>
   
</div>
<div class="padding-10" > 

<hr class="no-padding no-margin">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- block A -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7459961549223331"
     data-ad-slot="7234045544"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
   
</div>
</div>		
<div class="col-sm-12 col-md-4 col-lg-4 no-margin no-padding">
	 <h4 class="padding-top-10" style="font-size:1.8em;" >Reviews</h4>
			<hr><div class="comment-holder-ul">
				<?php  get_shop_friend_comment($shop_id);  ?>	
				</div>	
<br>
<div class="">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- adone -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7054754236502863"
     data-ad-slot="6127741237"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>				
	</div>

</div>		
</div>
	</div><?php  include "inc/footer.php"; ?>
</div> 


<?php chat_box(); ?>
<?php 
include("inc/scripts_vis.php"); 
include("inc/google-analytics.php"); 
?>

<input type="hidden" id="shopName" value="<?php echo $clean_name ; ?>" />
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