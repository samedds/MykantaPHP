<?php 
ini_set('session.cookie_httponly',true);
include "include/funcxn_vis.php";
ob_start();
session_start();
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
$prdt_name = $_GET['prdt_name'];
$clean_name = formatUrl_rev($prdt_name); 
$product_id = $_GET['product_id'];
//echo '   '.$clean_name. " product is loading...";
$shop_id = shop_id_from_porduct_id($product_id);
?>
<html lang="en-us">
<meta charset="utf-8" />
<head>
  <title><?php echo ucwords($clean_name);?></title>
  	<link rel="canonical" href=""/>
<link rel="icon" href="/img/mk.png" type="image/x-icon"/>
	<meta property="og:locale" content="en_US"/>
	    <meta property="og:type" content="article"/>
	    <meta property="og:title" content="<?php echo $clean_name; ?>"/>
	    <meta property="og:description" content=""/>
	    <meta property="og:url" content="/>
	    <meta property="og:site_name" content="MyKanta"/>
	    <meta property="article:author" content="MyKanta"/>
	    <meta property="article:tag" content="image"/>
	    <meta property="article:section" content="Business"/>
	    <meta property="article:published_time" content=""/>
	    <meta property="og:image" content=""/>
		<meta name="description" content="">
		<meta name="author" content="">
	<noscript>
	   <meta http-equiv="refresh" content="0;URL=www.mykanta.com">
	</noscript>
	<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
	<script type= "text/javascript" src = "/js/add_to_cart_vis.js"></script>
	<style type="text/css"> 
	.loading_gif
	{
	background:url(/img/loading.gif) no-repeat 50% 50%;
	}
	.myscroll{
overflow: auto !important;
}
	</style>

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
    <div class="row no-padding"style="">
<div class="col-sm-12 col-xs-12 col-md-10 col-lg-10" >
<div class="">
<div class="col-sm-12 col-md-7 col-lg-7">
<div class=" no-margin no-padding">
	<div class="row ">
		 <div class="col-sm-12 col-md-12 col-lg-12" style="">
		 <h4 class="padding-5" style="font-size:1.8em;" ><a href="/business/<?php shopName($shop_id);?>" style="color:black;"> <?php shopName($shop_id);?></a><?php verification_icon($shop_id); ?>
									</h4>
									  <h5 class="padding-5" style="font-size:1.0em; margin-top:-10px;"><?php  shopcategory($shop_id); ?>
									  </h5>
		<?php //echo shopdetailnogetother_product($shop_id) ;?>
		
</div>
</div>
<div class="row no-padding">
      <div class="col-sm-12 no-padding ">
	<hr class=" no-margin no-padding">
<div class="" style="padding-top:8px; padding-left:10px;" id="a1">
			<ul class="list-inline"><?php
get_product_pic_of_4($product_id); ?></ul> 	
</div>
<center class=" padding-10  " id="product_image"><?php
get_product_pic($product_id); ?></center>

										</div>

</div>
<!-- end tab -->

		
                </div>

				</div>
				<div class="col-sm-12 col-md-5 col-lg-5   ">
				<div class="jarv iswidget " id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" 
					data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
					<?php product_details_friend($product_id); ?>
					</div>
			<div class="row padding-no">
	
			<div  class="text-primary padding-10">Reviews</div>
			<div class=" col-sm-12 col-md-12 col-lg-12 ">
			<div class="comment-holder-ul">
				<?php  product_review($product_id);  ?>
				</div>
			</div>
			</div>
			</div>

		</div>


</div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 padding-10">
<ul class="hidden-xs hidden-sm no-padding no-margin myscroll" style="decoration:none; height:450px;"><hr class="no-padding no-margin">
<p class="" style="font-size:1.5em;">Other Products</p>
<?php
get_product_ur_shop_on_product_page($shop_id); ?>
</ul><ul class="padding-10 list-inline hidden-md hidden-lg myscroll" style="decoration:none; height:450px;">
<hr class="no-padding no-margin">
<p class="" style="font-size:1.5em;">Other Products</p><?php
get_product_ur_shop_on_product_page($shop_id); ?>
</ul>
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