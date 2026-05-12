<?php 
ini_set('session.cookie_httponly',true);

//include"include/searchshop_vis.php";
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
$_SESSION['vis_id'] = safe_input($prduct_name_short);
}
$search_text= safe_input($_GET['search_text']);
?>
<html lang="en-us">
<meta charset="utf-8" />
<head>
  <title> Business Search | <?php echo ucwords($search_text);?></title>
  	<link rel="canonical" href=""/>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" href="/img/mk.png" type="image/x-icon"/>
	<meta property="og:locale" content="en_US"/>
	    <meta property="og:type" content="article"/>
	    <meta property="og:title" content="<?php echo $search_text; ?>"/>
	    <meta property="og:description" content=""/>
	    <meta property="og:url" content=""/>
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
		 <div class="col-sm-12 col-md-12 col-lg-12" style="">
					<h4 class="strong text-primary no-padding">Business search Results for "<?php echo $search_text; ?>"</h4>
					<hr>
					<div class="row">
							<div class="col-sm-12 col-md-12 " >
								<?php include"include/searchshop_vis.php";?>
							</div>
						</div>	
						<div class="row">
							<div class="col-sm-12 col-md-12 " >
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