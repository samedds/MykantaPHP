<?php 
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php";
include "include/check_product.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/defines.php'; 
include "include/funcxn.php";
include "include/chat/chat.php";
$user_id = $_SESSION['id'];
$account_id = $_SESSION['id'];
 
//$product_id = strip_num($product_id1);
$shopName1 = safe_input($_GET['shopName']);
$shopName = strip_text($shopName1); 
$clean_name = formatUrl_rev($shopName); 
$shop_id = shop_id_from_name($clean_name);
$owner_id = $shop_id;
$prdt_name1 = safe_input($_GET['prdt_name']);
$prdt_name = strip_text($prdt_name1);
$product_id = $_GET['product_id'];
echo $prdt_name. " ".$product_id. " Loading...";
?>
<html lang="en-us">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<title><?php echo $prdt_name; ?></title>
 <link rel="icon" href="/img/mk.png" type="image/x-icon"/>
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type= "text/javascript" src = "/js/clear_cart.js"></script>
<script type= "text/javascript" src = "/js/settings_user.js"></script>
<script type="text/javascript" src="/js/add_friend.js"></script>
<script type="text/javascript" src="/js/shop_create.js"></script>
<script type="text/javascript" src="/js/change_pass.js"></script>
<script type= "text/javascript" src = "/js/settings_product.js"></script>
<link rel="stylesheet" type="text/css" href="/css/styles.css" />
<script type= "text/javascript" src = "/js/countries.js"></script>
<script type= "text/javascript" src = "/js/image_4_loader.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/review_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/reply_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/product_view.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript" src="js/check_device_banner.js" ></script>
<script type="text/javascript" src= "/js/load_product_modal.js"></script>

<style type="text/css">
.grow
{
		transition:all 1.0s ease;
        -webkit-transform: scale(1.3);
        -ms-transform: scale(1.3);
        transform: scale(1.3);
}
.rotategif
{
	transition:all 5.0s ease;
        -webkit-transform: rotateZ(-360deg);
        -ms-transform: rotateZ(-360deg);
        transform: rotateZ(-360deg);
}
.rotategif:hover
{height:30px;
        -webkit-transform: rotateZ(-30deg);
        -ms-transform: rotateZ(-30deg);
        transform: rotateZ(-30deg);
}
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
background-image:url(img/ajax-loader.gif);
background-repeat:no-repeat;
background-position:center;
height:100px;
}
.loading
{
background-image:url(img/loading.gif);
background-repeat:no-repeat;
background-position:center;
height:100px;
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
.bigbox, #divMiniIcons{
	left:10px !important;
}
</style>
<!-- For cropper -->
<link href="/include/croppic/assets/css/croppic.css" rel="stylesheet">	

	<!-- Basic Styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media=  "screen" href="/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production-plugins.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
	<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">


</head>
<body class="fixed-header fixed-navigation">
	
	<!-- HEADER -->
	
<?php 
include "inc/user_header.php";?>
<!-- END HEADER -->

 <!-- BEGIN NAVIGATION -->
	<?php 
	nav($user_id);
	?>
	
	<!-- END NAVIGATION -->
	<!-- MAIN PANEL -->
	<div id="main" role="main">

		

		<!-- MAIN CONTENT -->
		<div id="content" style="margin-top:-20px;">



<div class="row "style="margin-left:-10px;">
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10  " >
<div class="">
<div class="row ">
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="row">
<div class="col-md-12">
	<ul class="padding-5 " style="margin:0; list-style:none;"  >
		<!--<a href="javascript:void(0);" class="btn btn-default btn-xs"><i class="fa fa-lg fa-fw fa-reply"></i>Go back</a> --><li  id ="productname_change" class="pull-left" style="margin-bottom:0px;">
		<a href="/User/my-business/<?php echo $shopName; ?>"><span style=" font-size:1.9em; color:black; "><i class="fa fa-home"></i>  
		<?php echo ucwords(formatUrl_rev($shopName)); ?></span></a> </li>
		
	</ul> 
 </div>
   </div><hr class="padding-10 no-margin">
	<div class="row">
         <div class="  col-sm-12 padding-5  "> 
           <div class="" style="padding-top:0px; padding-left:20px;" id="a1">
			<ul class="list-inline"><?php
get_product_pic_of_4($product_id); ?></ul> 	
							<?php verification_gif($shop_id); ?>
							<input id="gif_array_all" value="<?php get_product_array_4($product_id); ?>" class="hidden"/>
						</div>
					<center class="padding-5" id="product_image">
				<?php get_product_pic($product_id); ?>
			</center>
		</div>
	</div>
</div>
		<div class="col-sm-12 col-md-6 col-lg-6"	style="padding:25px;">
			 <span>
				 <li class="btn-group" style="">
				  <a class="text-primary"style="font-size:1.3em; cursor:pointer;"href="javascript:void(0);" data-toggle="dropdown" class=" dropdown-toggle"><i class="fa fa-primary fa-share fa-1x"  ></i> share</a> 
				
					<ul class="dropdown-menu " id="show_biz_share" style="  ">
					  <li class=" no-padding"style="" >
						<a class="ttip hidden-md hidden-lg" href="whatsapp://send?text=http://mykanta.com/product/<?php echo $shopName1;?>/<?php echo $product_id;?>/<?php echo $prdt_name;?>" data-action="share/whatsapp/share"><img src="/img/site_img/whatsapp.png" height="20"/>whatsapp</a>
					</li>
					<li><a class="ttip" title="facebook" onClick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://mykanta.com/product/<?php  echo $shopName1;?>/<?php echo  $product_id;?>/<?php  echo $prdt_name;?>',
						'facebook share','width=500,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''
					); return false;" 
							href="https://www.facebook.com/sharer/sharer.php?u=http://mykanta.com/product/<?php echo  $shopName1;?>/<?php  echo $product_id;?>/<?php  echo $prdt_name;?>">
							<i class="fa fa-facebook fa-1x" style="color:#3B5998" ></i> Facebook</a>
						</li>	
						<li><a class="ttip" title="twitter" onClick="window.open('http://twitter.com/share?url=http://mykanta.com/product/<?php  echo $shopName1;?>/<?php echo  $product_id;?>/<?php echo  $prdt_name;?>',
						'Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''
					); return false;" 
							href="http://twitter.com/share?url=http://mykanta.com/product/<?php  echo $shopName1;?>/<?php  echo $product_id;?>/<?php  echo $prdt_name;?>">
							<i class="fa fa-twitter fa-1x" style="color:#55ACEE;"></i>Twitter</a>
						</li>
					</ul>
				   </li>
				</span>
			
			<?php product_info($product_id); ?>
		
		<hr class="no-padding no-margin">
		<!-- end widget -->
			<div class="row padding-10">
				
				
			<p class="" style="font-size:1.5em; width:100%;">Reviews</p>
		   <div class="col-sm-9 no-padding"> 
				   <textarea rows="1" id="product_review_text" class="form-control" placeholder="Share with your clients" required></textarea></div>
				   
				   <div class="col-sm-3 " style="padding:10px;">
				   <button onCLick="comment_post_btn_click();"   class="  btn-primary " >
								Post
							</button></div>
				  
						
						
			</div>
			<div class="row padding-10">
			<div class="comment-holder-ul padding-10">
				<?php  product_review($product_id);  ?>
				</div>
			</div>
			
			</div>

		</div>


</div>
 
</div>
<ul class="hidden-xs hidden-sm no-padding no-margin myscroll" style="decoration:none; height:450px;">
<hr class="no-padding no-margin">
<p class="" style="font-size:1.5em;">Other Products</p><?php
get_product_ur_shop_on_product_page($shop_id); ?>
</ul> 


		</div><?php footer(); ?>
		<!-- END MAIN CONTENT -->

		<?php chat_box($user_id); ?>
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
			  <!--
			   <form action="banner_pic_proc.php?shop_id=<?php echo $shop_id; ?>&shopName=<?php echo $shopName; ?>" method="POST" enctype='multipart/form-data' >
					 <div class="col-sm-9">
					<span class="text-info"><strong><h5>Upload your Banner</h5></strong></span>
					<p class="text-warning">Image should be or Lesser than 800 X 175</p>
					  <input class="input	" type='file' name='myfile' required />					
					 </div>
					 <div class="col-sm-3"style="padding-top:40px">
				  <input class=" btn btn-primary" type='submit' name='pro_pic' value='Upload'/>
					</div> 
				</form>
				-->
				<div id="croppic" style="background-color:#F5F5F5;"></div>
				<span class="btn btn-primary" id="cropContainerHeaderButton">Upload Picture</span>
				<!--<input type="button" id="resetButton" value="Reset" onclick="meClick()" />-->	
		   </div>
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
		
		
		
		  <form  action="add_product_prc.php?shop_id=<?php echo $shop_id; ?>&shopName=<?php echo $shopName; ?>"  method="POST"enctype='multipart/form-data' >
			<div class="row">
				
					<div class="col-md-12">
						<input type="text" class="form-control" id="prdt_name"  name="prdt_name" placeholder="Name of the product" required />
					</div>
					</div>
					<br>
					<div class="row">
					<div class="col-md-12">
						<textarea class="form-control" id="prdt_desc" name="prdt_desc" placeholder="Describe your product" rows="5" required></textarea>
					</div>
				
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					
						
						<input type="file" name='myfile' required />
						
				</div>
				<div class="col-md-6">
					
					
						<input type="text" class="form-control" id="price" name="price" placeholder="Price" required />
					
				</div>
			</div>
			

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cancel
			</button>
			<input name="searchshopname" type="submit" class="btn btn-primary btn-md"  value='Add product'>
				 </input>
		</div>
	</div><!-- /.modal-content -->
</div>
</div>
</form>



<div class="modal fade" id="verify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>
			<h4 class="modal-title" id="myModalLabel">Verify your Shop</h4>
		</div>
		<div class="modal-body">
		
		
		
		  <form  action="add_verify.php?shop_id=<?php echo $shop_id; ?>&shopName=<?php echo $shopName; ?>"  method="POST"enctype='multipart/form-data' >
			<div class="row">
				
					<div class="col-md-12">
						<p class="text-primary">Verifying your shop will grant you the following features!</p>
						<ul>
						  <li>Recieve payments through mobile money or credit card</li>
						  <li>Delivery services</li>
						  <li>Create sub-categories in your shop</li>
						  <li>Appear as a verified shop to other users and customers to attain their trust</li>
						  <li>Shop name appears in the verified shop list in every shop search made with similar categories</li>
						  <li>Product names will appear randomly in every product search made with the same category</li>
						  <li>An add to cart link is added to all product to customers to click to buy</li>
						</ul>
						<p class="text-primary">These are all available to you if your shop exists and registered</p>
					</div>
					</div>             
					
					
			<br>
			<div class="row">
				<div class="col-md-8">
					
						
						We will contact you immediately to proceed with this number 
						
				</div>
				<div class="col-md-4">
					
					
						<input type="text" class="form-control" id="verify_no" name="verify_no" placeholder="Phone number" required />
					
				</div>
			</div>
			

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Cancel
			</button>
			<input name="verify_btn" type="submit" class="btn btn-primary btn-md"  value='Confirm'>
				 </input>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
</form>



<!-- /.modal-dialog for add product images -->
<div class="modal fade" id="addproductimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>
			<h4 class="modal-title" id="myModalLabel">Add up to 7 pictures of your product</h4>
		</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
						
						<div class="col-md-6">
						

</div>	
									 
						
					</div>
					</div>             
				
 <div class="btn btn-primary"id="upload_button">Browse Images</div><div class="text-success upload_message"></div><br clear="all" />
    
    
    <center>
    <div class="wrapper " align="center"><!-- Main Wrapper -->
    <div id="vpb_uploads_error_displayer"></div><!-- Error Message Displayer -->
    <div id="vpb_uploads_displayer"></div><!-- Success Message (Files) Displayer -->
    
    
    
    
    <br clear="all" />
    </div>
    </center>
        

		</div>
		
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>



<div class="modal fade" id="settings_product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">Your Product Info</h4>
</div>
<div class="modal-body">
<div class="row ">
<div class="col-md-1" style="width:10px;">
</div>
<?php echo settings_product($product_id); ?>

</div>
</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="del_product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title red" id="myModalLabel">Confirm Product Unavailable</h4>
</div>
<div class="modal-body">
<div class="row padding-10">
<p class="text-info"> Do you want your product to be hidden from your customers or clients?</p>
<p class="text-danger"> This  product will not be seen by anybody and will be removed after 30 days, you can restore it during this period.</p>
<button  type="button"  data-dismiss="modal" aria-hidden="true"class="btn btn-default">NO</button>
<a href="/hide_product/<?php echo $shopName; ?>/<?php echo $product_id; ?>/<?php echo $prdt_name; ?>">
<button id="delete_yes" class="btn btn-warning" >YES</button></a>
<small><p>You will be redirected to the Shop page</p>
</div>
</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="restore_product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">Restore Product</h4>
</div>
<div class="modal-body">
<div class="row padding-10">
<p class="text-info"> Do you want your product to be hidden from your customers or clients?</p>
<p class="text-danger"> This  product will not be seen by anybody and will be removed after 30 days, you can restore it during this period.</p>
<a href="/hide_product/<?php echo $shopName; ?>/<?php echo $product_id; ?>/<?php echo $prdt_name; ?>">
<button id="delete_yes" class="btn btn-warning" >YES</button></a>
<small><p>You will be redirected to the product page</p>
</div>
</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="gifbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<center id="modal-body-prd" class="modal-body-prd padding-10 ">
			<h2>Create your Product GIF.</h2>
			<h4>Tab on GIF to create.</h4><br>
			<div id="gifall"><div class="" onClick="gifcreate();" id="gifbtn" style=" border-radius: 100px; border: 5px dashed; height: 120px; width: 120px;"><p style="    margin-top: 45px;
    font-size: 1.7em;">GIF</p></div></div>
			<center class="" id="gif_holder" class="row"></center>
			<h3 id="errorgif" class="text-danger"></h3>
			</center>
		</div>
	</div>
</div>

<div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div id="modal-body-prd" class="modal-body-prd padding-10 ">
			
			</div>
		</div>
	</div>
</div>


<!-- Chat holder-->
<ul id="chat_container" class="list-inline">
</ul>
	<!-- Start Chat -->
		<!-- SmartChat UI : plugin -->
		<script src="/js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="/js/smart-chat-ui/smart.chat.manager.min.js"></script>
	<!-- End Chat -->
<input type="hidden" id="user_id" value="<?php echo $user_id ; ?>" /> 
<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" /> 
<input type="hidden" id="owner_id" value="<?php echo $owner_id ; ?>" /> 
<input type="hidden" id="product_id" value="<?php echo $product_id ; ?>" /> 
<input type="hidden" id="prdt_name1" value="<?php echo $prdt_name1 ; ?>" /> 
<input type="hidden" id="shop_id" value="<?php echo $shop_id ; ?>" /> 
<input type="hidden" id="shopName" value="<?php echo $shopName ; ?>" />
<!--Chat 4 hidden inputs-->
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" />
	<!-- <input type="hidden" id="myfile" value="'+new_up_name_of_product+'" /> -->

</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<script src="js/plugin/summernote/summernote.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#product_descrb_setings').summernote({
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
    <input type="hidden" id="shoname" value="<?php echo ucwords(formatUrl_rev($shopName)) ; ?>" />
	<input type="hidden" id="gif_useaspost" value="" />
	<input type="hidden" id="gifpicimageslength" value="" />
	
	<input type="hidden" id="prdtname" value="<?php echo ucwords(formatUrl_rev($prdt_name)) ; ?>" />
    <script>
    	var shop_id = $( '#shop_id' ).val();
    	var shop_name = $('#shoname').val();
	//	console.log(shop_name);
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
function gifcreate()
{
document.getElementById('gifbtn').innerHTML ='<div class="" id="gifbtn" style="    border-radius: 40px;border: 30px solid; color: red;margin-top: 20px;height: 70px; width: 70px;"></div>';	
	var clbtn = document.getElementById("gifbtn");
	 $(clbtn).addClass('rotategif');
var prdtname = $('#prdtname').val();
var price = $('#price').val();
var textshop_nameprice = prdtname+' - ₵'+price;
//var textshop_nameprice = 'Ghs'+price;
//var gifrec = document.querySelector('#gif_array_all') as HTMLInputElement;
//var shop_name = $('#gif_array_all').val();
//var gifimage7 = $('#gifimage7').src;

	 
var gifimage00 = $('#gifimage0').val();	
var gifimage0 = '/img/products_images/'+gifimage00;	
	 
var gifimage01 = $('#gifimage1').val();	
var gifimage1 = '/img/products_images/'+gifimage01;	

var gifimage02 = $('#gifimage2').val();	
var gifimage2 = '/img/products_images/'+gifimage02;	

	
var gifimage03 = $('#gifimage3').val();	
var gifimage3 = '/img/products_images/'+gifimage03;	

	
var gifimage04 = $('#gifimage4').val();	
var gifimage4 = '/img/products_images/'+gifimage04;	

	
var gifimage05 = $('#gifimage5').val();	
var gifimage5 = '/img/products_images/'+gifimage05;	


var gifimage07 = $('#gifimage7').val();	
var gifimage7 = '/img/products_images/'+gifimage07;		 
	 

if(gifimage07 == null){
	var gifimage7 = '/img/products_images/'+gifimage07;	
	document.getElementById('errorgif').innerHTML ='Please upload a picture of your product.';
}else{
	console.log("full7");
		if(gifimage00 == null){
		var gifimage0 = '/img/products_images/'+gifimage00;	
		document.getElementById('errorgif').innerHTML ='Please upload more pictures of your product.';
		}else{
				if(gifimage01 == null){
					var gifimage1 = '/img/products_images/'+gifimage01;	
				document.getElementById('errorgif').innerHTML ='Please upload 5 more pictures of your product.';
				}else{
						if(gifimage02 == null){
							var gifimage2 = '/img/products_images/'+gifimage02;	
								var images = [
											gifimage7,
											gifimage0, 
											gifimage1
											];
						}else{
								if(gifimage03 == null){
									var gifimage3 = '/img/products_images/'+gifimage03;	
									 var images = [
													 gifimage7,
													 gifimage0, 
													 gifimage1,
													 gifimage2
													];
								}else{
										if(gifimage04 == null){
											var gifimage4 = '/img/products_images/'+gifimage04;	
											 var images = [
															 gifimage7,
															 gifimage0, 
															 gifimage1,
															 gifimage2,
															 gifimage3
															];
										}else{
												if(gifimage05 == null){
													var gifimage5 = '/img/products_images/'+gifimage05;	
													console.log("full5");
												}else{
													 var images = [
																	gifimage7,
																	gifimage0, 
																	gifimage1,
																	gifimage2,
																	gifimage3,
																	gifimage4,
																	gifimage5
																	];
													 }
											     }
										    }
									 }
							 }
					 }
			 }
var images0 = [
 gifimage07,
 gifimage00, 
 gifimage01,
 gifimage02,
 gifimage03,
 0,
 null
];
 //text: textshop_nameprice,
getSelectedOptions = function () {
        return {
			 interval: Number(0.1),
			 numFrames: images.length,
			 text: textshop_nameprice,
			 textYCoordinate: Number(90),
			 textXCoordinate: Number(20),
			 resizeFont: true,
			 background:'white',
			 fontSize: 15,
			 fontFamily: 'impact',
			 fontColor: 'black'
		}
	} 

     
	  
	//console.log(images0.length);
	//console.log(images.length);
	gifshot.createGIF(
  { 'images':images, 
  interval: Number(1.15), 
  'numFrames': images.length,
             text: textshop_nameprice,
			 textYCoordinate: Number(50),
			 textXCoordinate: Number(250),
			 background:'white',
			 resizeFont: true,
			 fontSize: 37,
			 gifHeight: 500, 
			 gifWidth: 500,
			 fontFamily: 'sans-serif',
			 fontColor: '#000000' }, 
  function(obj) {
    if (!obj.error) {
		
	 
	 var image = obj.image,
	 gifpic = $('#gif_useaspost').val(image);
	 gifpicimageslength = $('#gifpicimageslength').val(images.length);
       
	

    
	
	    console.log(image);
		document.getElementById('gif_holder').innerHTML ='<img src="'+image+'"  style="height:500px; width:auto;" class="" /> <button onClick="gif_useaspost()" class="  btn-lg btn-success" style=""> Publish to Product Timeline</button>';
		document.getElementById('gifall').innerHTML ='';
		
	
	  
/*	 base64ImageToFile(obj.image, '.', 'animation.gif'  function(err) {
          if (err) {
            alert(err);
          } else {
            alert('Should be all good');
          }
        } 
      );   */                         
    }else alert('wrong');
  }
);
}
function base64ImageToFile(base64Image, filename) {
  var arr = base64Image.split(',');
  var mime = arr[0].match(/:(.*?);/)[1];
  var bstr = atob(arr[1]);
  var n = bstr.length;
  var u8arr = new Uint8Array(n);

  while (n--) {
    u8arr[n] = bstr.charCodeAt(n);
  }

  return new File([u8arr], filename, { type: mime });
}

function gif_useaspost()
{  
 var myDate = Math.round(new Date().getTime()/10);
      var user_id = $( '#username' ).val();
      var product_id = $( '#product_id' ).val();
      var imageTag = user_id+""+myDate;
      var filename = imageTag+".gif";
	
	  var gif_useaspost = $( '#gif_useaspost' ).val();
	  var myfile_total = $( '#gifpicimageslength' ).val();
	  var product_name = $( '#prdt_name1' ).val();
	  var file = base64ImageToFile(gif_useaspost, filename);
    
console.log(product_id);
	var additionalData = {
  product_id: product_id,
  title: imageTag,
  product_name:product_name,
  myfile_total: myfile_total
};
	var formData = new FormData();
      formData.append('file', file);
	  
	  // Append the additional data to the FormData
for (var key in additionalData) {
  if (additionalData.hasOwnProperty(key)) {
    formData.append(key, additionalData[key]);
  }
}
	/*   	$.post( "uploader.php " ,
			   {
				   gif_product : "gif_product",
				   name: imageTag,
					product_id: product_id,
					myfile_total: myfile_total,
					file: file,
					 cache: false,
			   })
			  .error(
				   function( )
				   {
					console.error('An error occurred:', error);
				   })
			  .success(
			   function( data )
			   { 
			   
			 console.log('File saved successfully!');
			    
			  });
	*/
	  // Send a POST request to the server endpoint to save the file
		fetch('/uploader.php', {
		 method: 'POST',
			  body: formData,
			 
			})
      .then(response => {
        if (response.ok) {
      //    console.log('File saved successfully!');
		    document.getElementById('gif_holder').innerHTML ='<img src="/img/gcheck.png"  style="height:300px; width:auto;" class="" /><p> <a  href="/user" class=" btn-lg btn-success" style=""> Go to Product Timeline</a></p>';
		document.getElementById('gifall').innerHTML ='';
		//  console.log(response.message);
        } else {
      // Process the error response
      //console.error('Failed to save the file.');
      response.json().then(data => {
       // console.error('Error message:', data.message);
        // Handle the error message as needed
		 document.getElementById('gif_holder').innerHTML ='<img src="/img/site_img/cancelled.png"  style="height:300px; width:auto;" class="" /><p> <a  href="/user" class=" btn-lg btn-success" style=""> Try again in Tomorrow!</a></p>';
      });
    }
      })
      .catch(error => {
        console.error('An error occurred:', error);
      }); 
	
}
</script>


<script type="text/javascript" src= "/js/gifshot.js"></script>
<script type="text/javascript" src= "/js/gif_scripts.js"></script>
</body>
</html>