<?php 
ini_set('session.cookie_httponly',true);
ob_start();
@session_start();
include "include/funcxn_vis.php";
if(isset($_SESSION['id']) )
{
$user_id = $_SESSION['id'];
}else{
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
}

$prdt_name = $_GET['prdt_name'];
$clean_name = formatUrl_rev($prdt_name); 
$clean_name2 = formatUrl_true($prdt_name); 
$product_id = $_GET['product_id'];
$shopname = formatUrl_true($_GET['shopname']);
 $shopname_raw = formatUrl_rev($_GET['shopname']);

//echo '   '.$clean_name. " product is loading...";
$shop_id = shop_id_from_porduct_id($product_id);

$description = substr(description_from_porduct_id($product_id), 0, 120).'...';
 //$description = substr(shop_description($shop_id), 0, 120).'...';
$image_loc = image_loc_from_porduct_id($product_id);
$price = price_from_porduct_id($product_id);
$tag = tag_from_porduct_id($product_id);
//$condition = con_from_porduct_id($product_id);
$datetime = strtotime(datetime_from_porduct_id($product_id));
/*
function getAddress() 
{$protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'https';return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];}

 echo  $getAddress = getAddress(); */
$url = 'https://www.mykanta.com/product/'.$shopname.'/'.$product_id.'/'.$clean_name2;
?><html lang="en-us">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<title><?php echo ucwords($clean_name);?> - Order Now!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="canonical" href="<?php echo $url; ?>"/>
<meta property="og:locale" content="en_US"/>
<link rel="icon" href="<?php echo 'https://www.mykanta.com'.$image_loc; ?>" type="image/x-icon" />
<meta property="og:image" content="<?php echo 'https://www.mykanta.com'.$image_loc; ?>"/>
<meta property="og:type" content="<?php echo ucwords($clean_name);?>">
<meta property="article:author" content="<?php echo ucwords($shopname_raw);?>"/>
<meta name="author" content="<?php echo ucwords($shopname_raw);?>"/>
<meta property="article:tag" content="Online Free Orders from Verified Genuine Business <?php echo ucwords($clean_name);?> "/>
<meta property="article:section" content="Business"/>
<meta property="og:site_name" content="Mykanta.com">
<meta property="og:url" content="<?php echo $url; ?>">
<meta property="og:title" content="<?php echo ucwords($clean_name);?> - Order Now for Free !">
<meta property="og:description" content="<?php echo $description; ?>">
<meta name="article:published_time" content="<?php echo $datetime; ?>"><!-- UTC seconds -->
<!--<meta name="article:modified_time"  content="1431556620"> UTC seconds -->
<meta name="twitter:card" content="<?php echo $image_loc; ?>">
<meta name="twitter:site" content="@Mykanta_">
<meta name="twitter:title" content="<?php echo ucwords($clean_name);?> - Order Now!">
<meta name="twitter:description" content="<?php echo $description; ?>">
<meta name="twitter:image:<?php echo 'https://www.mykanta.com'.$image_loc; ?>">
<meta name="description" content="<?php echo $description; ?>">
<link rel="icon" href="<?php echo $image_loc; ?>" type="image/x-icon" />
<noscript>
 <meta http-equiv="refresh" content="0;URL=www.mykanta.com">
</noscript>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7459961549223331"
     crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type= "text/javascript" src = "/js/image_4_loader.js"></script>
	<style type="text/css"> 
	.loading_gif
	{background:url(/img/loading.gif) no-repeat 50% 50%;}
	.myscroll{overflow: auto !important;}
	</style>
	<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css"/>
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css"/>
	<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css"/>
	<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
	<script type="text/javascript"  src="/js/add_to_cart_vis.js"></script>
	<script type="text/javascript"  >
function book_appointment(product_id,shop_id)
{
var appoint_text = $( '#appoint_text').val();

var appoint_date = $( '#appoint_date').val();
//$('#app_text_holder').html('<div class=""><img src="/img/loading.gif"/></div>'); 

		
		if( appoint_text.length < 1 )
		{
	      alert("Type in your description");
		}
		else
		{
			$.post("/ajax/add_to_cart.php",  
		{
		 task1 : "task1",
		 appoint_text : appoint_text,
		 appoint_date : appoint_date,
		 product_id : product_id,
		 shop_id : shop_id,

	   cache: false,
			})
			.error(
		  
			   function( )
			   {
				 
			   })
			.success(function(response)
			{
			   document.getElementById("app_text_holder").innerHTML ='<label class="text-success" style="font-weight:600;">Booked. You will be contacted shortly.</label>';
                $( '#appoint_text').hide();
                $( '#appoint_date').hide();
                $( '#btn_app').hide();
				console.log(response);
				//$('#app_text_holder').html('<label class="text-success" style="font-weight:600;">Booked. You will contacted shortly.</label>');
			
			});
		}
	
}
</script>
</head>
<body class="fixed-header">

	<?php include "inc/visitor_header.php";?>
	<?php nav();?>
	
<div id="main" role="main">
	<div id="" style="">
    <div class="row no-padding"style="">
	<div class="col-sm-12 col-xs-12 col-md-10 col-lg-10" >
	<div class="">
	<div class="col-sm-12 col-md-7 col-lg-7">
<?php 
if($shop_id == null)
{
 echo '<h2 class="padding-5" style="font-size:1.8em;" >'.ucwords($clean_name).' <br><span style="font-size: 0.7em; color: #dc4444;">out of stock.</span></h2>';
 include"include/searchproduct_vis-res.php";
//shopdetailnogetother_product($shop_id) 
}
else
{
echo '<div class=" no-margin no-padding">
	  <div class="row ">
		 <div class="col-sm-12 col-md-12 col-lg-12" style="">
		 <h2 class="padding-5" style="font-size:1.8em;" ><a href="/business/'.$shopname.'" style="color:black;"> ',shopName($shop_id),'</a>',verification_icon($shop_id),'
         </h2>
		  <h3 class="padding-5" style="font-size:1.0em; margin-top:-10px;">', shopcategory($shop_id),'</h3>
		
         </div>
       </div>
		<div class="row no-padding">
		   <div class="col-sm-12 no-padding ">
			<hr class=" no-margin no-padding">
		       <div class="" style="padding-top:8px; padding-left:10px;" id="a1">
					<ul class="list-inline">',
		            get_product_pic_of_4($product_id),'
					</ul> 	
		       </div>
		       <center class=" padding-10  " id="product_image">', get_product_pic($product_id),' 	</center>
               </div>
        </div>
      <!-- end tab -->
     </div>';	
} 
?>
	
    </div>
	<div class="col-sm-12 col-md-5 col-lg-5   ">
	   <div class="jarv iswidget " id="wid-id-1" >
		
		<header style="">
		<h1 class="" style="font-size:1.7em; "> <?php echo  ucwords($clean_name);?>   </h1>
		 <span>
										 <li class="btn-group" style="">
										  <a class="text-primary"style="font-size:0.9em; cursor:pointer;"href="javascript:void(0);" data-toggle="dropdown" class=" dropdown-toggle"><i class="fa fa-primary fa-share fa-1x"  ></i> share</a> 
									   
											<ul class="dropdown-menu " id="show_biz_share" style="  ">
											  <li class=" no-padding"style="" >
												<a class="ttip hidden-md hidden-lg" href="whatsapp://send?text=https://mykanta.com/product/<?php echo $shopname;?>/<?php echo $product_id;?>/<?php echo $clean_name2;?>" data-action="share/whatsapp/share"><img src="/img/site_img/whatsapp.png" height="20"  alt="Whatsapp" title="Whatsapp"/>whatsapp</a>
											</li>
											<li><a class="ttip" title="facebook" onClick="window.open('https://www.facebook.com/sharer/sharer.php?u=https://mykanta.com/product/<?php  echo $shopname;?>/<?php echo  $product_id;?>/<?php  echo $clean_name2;?>',
												'facebook share','width=500,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''
											); return false;" 
													href="https://www.facebook.com/sharer/sharer.php?u=https://mykanta.com/product/<?php echo  $shopname;?>/<?php  echo $product_id;?>/<?php  echo $clean_name2;?>">
													<i class="fa fa-facebook fa-1x" style="color:#3B5998" ></i> Facebook</a>
												</li>	
												<li><a class="ttip" title="twitter" onClick="window.open('https://twitter.com/share?url=https://mykanta.com/product/<?php  echo $shopname;?>/<?php echo  $product_id;?>/<?php echo  $clean_name2;?>',
												'Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''
											); return false;" 
													href="https://twitter.com/share?url=https://mykanta.com/product/<?php  echo $shopname;?>/<?php  echo $product_id;?>/<?php  echo $clean_name2;?>">
													<i class="fa fa-twitter fa-1x" style="color:#55ACEE;"></i>Twitter</a>
												</li>
											</ul>
										   </li>
										</span>
		<p class="hidden"><i class="fa fa-phone" style="color:green"></i> <?php echo shop_tel_number_from_name($shop_id);?><em class="text-muted font-xs">Call Now</em></p>
		<hr class="no-margin padding-10">
		</header>
										
		<?php product_details_friend($product_id); ?>
	    </div>
		<div class="row padding-no">
		<div  class="text-primary padding-10">Reviews</div>
			<div class=" col-sm-12 col-md-12 col-lg-12 ">
			  <div class="comment-holder-ul">
				<?php  product_review($product_id);  ?>
				</div>
	<!-- google ads		<div class="">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-7054754236502863"
     data-ad-slot="7271240433"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div> -->	
			</div>
		 </div>
       </div>
    </div>
</div>
<?php 
if($shop_id != null)
{
 echo '
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 padding-10">
<ul class="hidden-xs hidden-sm no-padding no-margin myscroll" style="decoration:none; height:450px;">
<p class="" style="font-size:1.5em;">Other Products</p>
<hr class="no-padding ">',
get_product_ur_shop_on_product_page($shop_id),'
</ul>
<ul class="padding-10 list-inline hidden-md hidden-lg myscroll" style="decoration:none; height:450px;">
<p class="" style="font-size:1.5em;">Other Products</p>
<hr class="no-padding no-margin">
',
get_product_ur_shop_on_product_page($shop_id),'
</ul>
</div>';
}
?>
</div>
<div class="row padding-10" > 
<h3 class="padding-10" style="font-size:1.5em;">Verified Businesses near you.</h3>
<hr class="no-padding no-margin">
<?php get_shop_showcase(); ?>
<br>

</div>
<div class="row padding-10" > 
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
<hr>
<?php  include "inc/footer.php"; ?>
</div> 
<?php chat_box(); ?>
<?php 
include("inc/scripts_vis.php"); 


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