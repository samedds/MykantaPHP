<?php 
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";
include "include/check_edit_product.php";
include "include/chat/chat.php";
$user_id = $_SESSION['id'];
$account_id = $_SESSION['id'];

$shopName1 = safe_input($_GET['shopName']);
$shopName = strip_text($shopName1);
$clean_name = formatUrl_rev($shopName); 
$shop_id = shop_id_from_name($clean_name);
$product_id1 = safe_input($_GET['product_id']);
$product_id = strip_text($product_id1);
$prdt_nameformat1 = safe_input($_GET['prdt_nameformat']);
$prdt_nameformat = strip_text($prdt_nameformat1);

echo $shopName." is loading...";
?>
<html lang="en-us">
<meta charset="utf-8">
<title>Edit <?php echo $prdt_nameformat ; ?></title>
<link rel="icon" href="/img/mk.png" type="image/x-icon">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="/css/styles.css" />
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/js/ajaxupload_image.3.5.js" ></script>
<script type= "text/javascript" src = "/js/shop_create.js"></script>
<script type= "text/javascript" src = "/js/settings_shop.js"></script>
<script type="text/javascript" src="/js/upload_product_image_2.js" ></script>
<head>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript" src="/js/product_insert.js" ></script>
<script type="text/javascript" src="/include/chat/chat.js" ></script>
<style type="text/css"> 
.pic{
height:auto;
width:100%;
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
	.shrink li, .shrink a, .shrink span{
		font-size: 9px;
	}
}
.bigbox, #divMiniIcons{
	left:10px !important;
}
.custom-i-hover:hover {
	color:#5547DE !important;
}
.row .overlay, .overlay-wrapper .overlay {
    z-index: 1;
    background: rgba(255, 255, 255, 0.7) none repeat scroll 0% 0%;
    border-radius: 3px;
}
.row > .overlay, .overlay-wrapper > .overlay, .row > .loading-img, .overlay-wrapper > .loading-img {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
}
.row .overlay > .fa, .overlay-wrapper .overlay > .fa {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -15px;
    margin-top: -15px;
    color: #000;
    font-size: 30px;
}
</style>
	<!-- Basic Styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media=  "screen" href="/css/font-awesome.min.css">

	
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production-plugins.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css"><link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
</head>
<body class="fixed-header ">
<?php 
include "inc/user_header.php";?>
<?php nav($user_id);?>
<div id="main" role="main">
   <div id="container"  style="margin-top:-10px; ">
   	    <h1 style="margin:0; border:none;" class="pull-left padding-5 text-primary"><a href="/User/my-business/<?php echo $shopName;?>"><?php echo $shopName; ?></a><small> - Edit Product Information</small></h1><div class="row no-padding"style="margin-left:-15px;">
       	<div class="col-md-10 col-lg-10 " >
      <div class="no-margin no-padding">
           
					<div class="row" style="padding-bottom:20px;">
					<?php edit_product($product_id); ?>
					<div class="overlay hide" id="editprdtover1">
						<i class="fa fa-refresh fa-spin"></i>
					</div>
					</div>
				</div>
			</div>
			<div class="col-md-2">
			  <div class="">
					<div class="row">
				   </div>
			  </div>
			</div>
		</div>
    </div>
			<?php footer(); ?>
		</div>
		<!-- END MAIN CONTENT -->

		<!-- new CHAT widget -->
		<div class="hidden jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" 
		data-widget-togglebutton="true" data-widget-fullscreenbutton="false" style="width:300px; position:fixed; bottom:-30px; right:20px; z-index:2;">
			<header>
				<span class="widget-icon" > <i class="fa fa-comments txt-color-white" style="line-height:2.5 !important;"></i> </span>
				<h2 id="chatTitle"> MyKanta Chat </h2>
				<div class="widget-toolbar">
					
					<a href="javascript:chatMinBtnFunc();"><span id="chatMinBtn" class="widget-icon padding-5"> <i id="chatMinBtnI" class="fa fa-plus txt-color-white"></i> </span></a>
				</div>
			</header>

			<!-- widget div-->
			<div id="chatWrapper" style="display:none;">
				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<div>
						<label>Title:</label>
						<input type="text" />
					</div>
				</div>
				<!-- end widget edit box -->

				<div class="widget-body widget-hide-overflow no-padding">
					<!-- content goes here -->

					<!-- CHAT CONTAINER -->
					<div id="chat-container" class="open chat-container" style="height:230px;">
						<span class="chat-list-open-close"><i class="fa fa-user"></i><b>!</b></span>

						<div class="chat-list-body custom-scroll" style="height:230px;">
							<ul id="chat-users">
								<?php //get_onlinefriendnames($user_id); ?>
							</ul>
						</div>
					</div>

					<!-- CHAT BODY -->
					<ul id="chat-body" class="chat-body custom-scroll myChatBody" style="height:230px;">
							<li class="message" style="padding:10px; margin:10px 30px 0 0; background-color: #EAEAEA; border-left:4px solid #4C4F53;">
								<div class="message-text" style="margin:0;">
									Select a friend to chat with from the panel on the right 
								</div>
							</li>
					</ul>

					<!-- CHAT FOOTER -->
					<div class="chat-footer">
						<form name="message" action="">
							<!-- CHAT TEXTAREA -->
							<div class="textarea-div">
								<div class="typearea">
									<!--<textarea placeholder="Write a message..." id="textarea-expand" name="textarea-expand" class="custom-scroll" style="min-height:40px;"></textarea>-->
									<input type="text" name="usermsg" id="usermsg" class="custom-scroll" style="width:100%; border:none;" placeholder="Write a message..." />
								</div>
							</div>
							<!-- CHAT REPLY/SEND -->
							<span class="textarea-controls">
								<input type="submit" class="btn btn-sm btn-primary pull-right" id="submitmsg" name="submitmsg" value="Send" />
							</span>
						</form>
					</div>
					<!-- end content -->
				</div>
			</div>
			<!-- end widget div -->
		</div>
		<!-- end widget -->

		<div class="modal fade" id="add_option_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="width:300px;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Add Product option</h4>
					</div>
					<div class="modal-body">
					  <div class="row">
					   	<div class="col-xs-12">
									<label class="text-info" style="font-weight:600;">Option Spec.</label>
									<input type="text" class="form-control" id="prdt_option1" name="prdt_option1" placeholder="Eg:50watts or 5kg" required />
							</div>
							<div class="col-xs-12">
									<label class="text-info" style="font-weight:600;">Option Price</label>
									<input type="number" class="form-control" id="price1" name="price1" placeholder="" required />
							</div>
							<div class="col-xs-12">
									<label class="text-info" style="font-weight:600;">Quantity Available</label>
									<input type="number" class="form-control" id="prdt_stock1" name="prdt_stock1" placeholder="" required />
								<div class="" id="optionAlert" style="margin:2px;"></div>
							</div>
							<div class="col-xs-12">
								<input name="saveoption" type="submit" class="btn btn-success btn-md pull-right" style="margin-top:5px;" value='Save option' id="saveoptionbtn" />
							</div>
							<div class="overlay hide" id="addoptionover1">
              	<i class="fa fa-refresh fa-spin"></i>
            	</div>
					  </div>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->

		<a data-target="#edit_option_modal" data-toggle="modal" class="no-padding pull-right">
		<button class="btn btn-primary btn-sm hide" id="showeditoptionmodalbtn"><i class="glyphicon glyphicon-plus"></i>Click me</button></a>

		<div class="modal fade" id="edit_option_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="width:300px;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Edit Product option</h4>
					</div>
					<div class="modal-body">
					  <div class="row">
					   	<div class="col-xs-12">
									<label class="text-info" style="font-weight:600;">Product option</label>
									<input type="text" class="form-control" id="edit_prdt_option" name="edit_prdt_option" placeholder="Eg:50watts or 5kg" required />
									<input type="hidden" class="form-control" id="edit_option_id" name="edit_option_id" />
							</div>
							<div class="col-xs-12">
									<label class="text-info" style="font-weight:600;">Product Price</label>
									<input type="number" class="form-control" id="edit_prdt_price" name="edit_price" placeholder="" required />
							</div>
							<div class="col-xs-12">
									<label class="text-info" style="font-weight:600;">Stock Quantity</label>
									<input type="number" class="form-control" id="edit_prdt_stock" name="edit_prdt_stock" placeholder="" required />
								<div class="" id="editoptionAlert" style="margin:2px;"></div>
							</div>
							<div class="col-xs-12">
								<input name="saveeditoptionbtn" type="submit" class="btn btn-success btn-md pull-right" style="margin-top:5px;" value='Save' id="saveeditoptionbtn" />
							</div>
							<div class="overlay hide" id="editoptionover1">
              	<i class="fa fa-refresh fa-spin"></i>
            	</div>
					  </div>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->

	</div>
	<!-- End main -->

	<!-- BOOTSTRAP JS -->
	<script src="/js/load_product_modal.js"></script>

		<?php 
	//include required scripts
	include("inc/scripts_nonice.php"); 
	//include footer

 
?>

<input type="hidden" id="user_id" value="<?php echo $user_id ; ?>" /> 
<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" /> 
<input type="hidden" id="owner_id" value="<?php echo $shop_id ; ?>" /> 
<input type="hidden" id="shop_id" value="<?php echo $shop_id ; ?>" />
<input type="hidden" id="shopName" value="<?php echo $shopName ; ?>" />
<input type="hidden" id="product_id" value="<?php echo $product_id ; ?>" />
<input type="hidden" id="product_nameformat" value="<?php echo $prdt_nameformat ; ?>" />
<!--Chat 4 hidden inputs-->
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" />  
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="/js/plugin/summernote/summernote.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#prd t_desc').summernote({
				height : 130,
				focus : false,
				tabsize : 2,
				toolbar:[
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

    <!-- Start Chat -->
	<!-- End Chat -->
    <!--<script type="text/javascript">
    	function meClick(){
    		croppic.reset();
    	}
    </script>-->
	<script type="text/javascript">
		$('#morePix_btn').click(function()
		{
			$('#morePix_btn').hide();
			$('#morePix').css('display' , 'block');
		});

		function editpageload1(product_id)
		{
		  var thisShopName = $('#shopName').val();
		  var product_id = $('#product_id').val();
		  var product_nameformat = $('#product_nameformat').val();
		  window.location.href = "/edit-product/"+thisShopName+"/"+product_id+"/"+product_nameformat;
		}

		function editoptionfxn(option_id, check_num)
		{
			var opt_option = $('#hdprdt_option_'+check_num).val();
			var opt_price = $('#hdprdt_price_'+check_num).val();
			var opt_stock = $('#hdprdt_stock_'+check_num).val();
			$('#edit_option_id').val(option_id);
			$('#edit_prdt_option').val(opt_option);
			$('#edit_prdt_price').val(opt_price);
			$('#edit_prdt_stock').val(opt_stock);
			$('#showeditoptionmodalbtn').click();
			//alert(opt_option+" "+opt_price+" "+opt_stock);
		}

		function deloptionfxn(option_id)
    {
      console.log(option_id);
      $.SmartMessageBox({
          title : "Delete Option",
          content : "Are you sure you want to delete this Option?",
          buttons : '[No][Yes]'
        }, function(ButtonPressed) {
          if (ButtonPressed === "Yes") {
          	$('#editprdtover1').removeClass('hide');
            $.post("/ajax/del_option.php",  
            {
              task : "task",
              option_id : option_id,
              cache: false,
            })
              .error(function()
                 {
                  console.log( "Error: " );
                  $('#editprdtover1').addClass('hide');
                 })
              .success(function(response)
              {
              	$('#editprdtover1').addClass('hide');
                 if(response == "Option deleted"){
                   $.smallBox({
                    title : "Success!",
                    content : "Option deleted!",
                    color : "#739E73",
                    iconSmall : "fa fa-cloud",
                    timeout : 1500
                   });
                   setTimeout(editpageload1,1500);
                 }
                 else{
                   $.smallBox({
                      title : "Alert",
                      content : "<i class='fa fa-clock-o'></i> <i>Operation Failed "+response+"</i>",
                      color : "#C46A69",
                      iconSmall : "fa fa-times fa-2x fadeInRight animated",
                      timeout : 4000
                   });
                 }
              });
          }
          if (ButtonPressed === "No") {
            $.smallBox({
              title : "Alert",
              content : "<i class='fa fa-clock-o'></i> <i>Operation Cancelled</i>",
              color : "#C46A69",
              iconSmall : "fa fa-times fa-2x fadeInRight animated",
              timeout : 4000
            });
          }
    
        });
    }

    function delotherimgfxn(img_id)
    {
      console.log(img_id);
      $.SmartMessageBox({
          title : "Delete Image",
          content : "Are you sure you want to delete this Image?",
          buttons : '[No][Yes]'
        }, function(ButtonPressed) {
          if (ButtonPressed === "Yes") {
          	$('#editprdtover1').removeClass('hide');
            $.post("/ajax/product_img_del.php",  
            {
              task2 : "task2",
              img_id : img_id,
              cache: false,
            })
              .error(function()
                 {
                  console.log( "Error: " );
                  $('#editprdtover1').addClass('hide');
                 })
              .success(function(response)
              {
              	$('#editprdtover1').addClass('hide');
                 if(response == "Image deleted"){
                   $.smallBox({
                    title : "Success!",
                    content : "Image deleted!",
                    color : "#739E73",
                    iconSmall : "fa fa-cloud",
                    timeout : 1500
                   });
                   setTimeout(editpageload1,1500);
                 }
                 else{
                   $.smallBox({
                      title : "Alert",
                      content : "<i class='fa fa-clock-o'></i> <i>Operation Failed "+response+"</i>",
                      color : "#C46A69",
                      iconSmall : "fa fa-times fa-2x fadeInRight animated",
                      timeout : 4000
                   });
                 }
              });
          }
          if (ButtonPressed === "No") {
            $.smallBox({
              title : "Alert",
              content : "<i class='fa fa-clock-o'></i> <i>Operation Cancelled</i>",
              color : "#C46A69",
              iconSmall : "fa fa-times fa-2x fadeInRight animated",
              timeout : 4000
            });
          }
    
        });
    }
	</script>
</body>
</html>