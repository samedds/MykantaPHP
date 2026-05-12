<?php 
ini_set('session.cookie_httponly',true);
ob_start();
@session_start();
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
$cat_id=$_GET['cat_id'];
$category = cat_reform($cat_id);
$description = 'Here, you will find all items and accessories related to '.$category.'. ';
$image_loc = 'https://wwww.mykanta.com/img/site_img/mykanta_wallpaper.jpg ';
?>
<html lang="en-us">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<title>Mykanta Online Shopping | <?php echo $category;?> - Order Now for Free !</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="canonical" href="https://wwww.mykanta.com/business-category/<?php echo $cat_id; ?>"/>
<meta property="og:locale" content="en_US"/>
<link rel="icon" href="/<?php echo $image_loc; ?>" type="image/x-icon" />
<meta property="og:image" content="<?php echo $image_loc; ?>"/>
<meta property="og:type" content="Website">
<meta property="article:author" content="<?php echo ucwords($category);?>"/>
<meta name="author" content="<?php echo ucwords($category);?>"/>
<meta property="article:tag" content="Online Free Orders from Verified Genuine Business <?php echo ucwords($category);?> "/>
<meta property="article:section" content="Business"/>
<meta property="og:site_name" content="Mykanta.com">
<meta property="og:url" content="https://wwww.mykanta.com/business-category/<?php echo $cat_id; ?>">
<meta property="og:title" content="Mykanta Online Shopping | <?php echo $category;?> - Order Now for Free !">
<meta property="og:description" content="<?php echo $description; ?>">
<!--<meta name="article:published_time" content=""> UTC seconds -->
<!--<meta name="article:modified_time"  content="1431556620"> UTC seconds -->
<meta name="twitter:card" content="<?php echo $image_loc; ?>">
<meta name="twitter:site" content="@Mykanta_">
<meta name="twitter:title" content="Mykanta Online Shopping | <?php echo $category;?> - Order Now for Free !">
<meta name="twitter:description" content="<?php echo $description; ?>">
<meta name="twitter:image:<?php echo $image_loc; ?>">
<meta name="description" content="<?php echo $description; ?>">
<link rel="icon" href="<?php echo $image_loc; ?>" type="image/x-icon" />
<noscript>
<meta http-equiv="refresh" content="0;URL=www.mykanta.com">
</noscript>
	<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
	<script type= "text/javascript" src="/js/load_product_modal_vis.js"></script>
	<style type="text/css"> 
	.loading_gif
	{
	background:url(/img/loading.gif) no-repeat 50% 50%;
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
	<div id="content" style="">
        <div class="row padding-10"style="">
		  <div class="padding-10 col-sm-12">
		     <h4 class ="text-defualt" style="font-size:1.5em; color:black;"><?php echo $category;?></h4>
				<ul class="list-inline">
				 <?php include "include/product_category_vis.php";?>
				</ul>
		  </div>		
		</div>
		<div class="row padding-10"style="">
		  <div class="padding-10 col-sm-12">
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
	</div>
	<?php  include "inc/footer.php"; ?>
</div> 


<?php chat_box(); ?>
<?php 
include("inc/scripts_vis.php"); 
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