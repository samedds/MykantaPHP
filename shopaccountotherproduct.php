<?php
ini_set('session.cookie_httponly',true);
include"include/sessionfile.php";
include "include/check_product_other.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";
include "include/chat/chat.php";
$user_id = $_SESSION['id'];
$account_id = $_SESSION['id'];
$product_id = safe_input($_GET['product_id']);
$shopName1 = safe_input($_GET['shopName']);
echo $shopName = strip_text($shopName1); 
$clean_name = formatUrl_rev($shopName); 
$shop_id = shop_id_from_name($clean_name);
$owner_id = $shop_id ;
$prdt_name1 = safe_input($_GET['prdt_name']);
$prdt_name = strip_text($prdt_name1);
echo $prdt_name." is loading...";


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
<script type= "text/javascript" src = "/js/countries.js"></script>
<script type= "text/javascript" src = "/js/add_to_wishlist.js"></script>
<script type= "text/javascript" src = "/js/add_to_cart_vis.js"></script>
<script type="text/javascript" src="/js/change_pass.js"></script>
<script type= "text/javascript" src = "/js/settings_user.js"></script>
<script type="text/javascript" src="/js/shop_create.js"></script>
<script type= "text/javascript" src = "/js/clear_cart.js"></script>
<script type="text/javascript" src="/js/add_friend.js"></script>

<script type= "text/javascript" src = "/js/image_4_loader.js"></script>
<script type= "text/javascript" src="/js/load_product_modal.js"></script>

<script type="text/javascript" src="/js/subscribe_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/products_like.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>

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
				//$('#app_text_holder').html('<label class="text-success" style="font-weight:600;">Booked. You will contacted shortly.</label>');
			
			});
		}
	
}
</script>

<style type="text/css"> 
.pic{
height:auto;
width:100%;
 } 
 
.hover .image4 {
/* set it at the bottom of .carousel-inner */
      

width:110px; 
color:#ccc;

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

.shelve{
background-image:url(img/shelve.jpg);

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
.bigbox, #divMiniIcons{
	left:10px !important;
}
</style> 
	<!-- Basic Styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media=  "screen" href="/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css"><link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css">


</head>
<body class="fixed-header">
	
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

<div id="content" style="margin-top:-20px;">

<div class="row no-padding"style="margin-left:-15px;">
<div class="col-sm-10 " >
<div class="">
<div class="row ">
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="no-margin no-padding">
	<div class="row">
		 <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left:15px;">
		
		<?php echo shopdetailnogetother_product($shop_id,$product_id) ;?>
		<span class=""> <div class="" id="wishlist_box"><?php echo wishlist_check($product_id); ?>
				</div></span></ul>
</div> 
</div>

<hr><div class="row">
      <div class="col-sm-12 padding-5 ">
	<div class="" style="padding-top:0px; padding-left:20px;" id="a1">
			<ul class="list-inline"><?php
get_product_pic_of_4($product_id); ?></ul> 	
			<?php verification_gif($shop_id); ?>
							<input id="gif_array_all" value="<?php get_product_array_4($product_id); ?>" class="hidden"/>				
				</div>
				<center class=" padding-10  " id="product_image">
							<?php
get_product_pic($product_id); ?></center>


										</div>

</div>
<!-- end tab -->

		
                </div>

				</div>
				<div class="col-sm-12 col-md-6 col-lg-6   ">
					<!-- Widget ID (each widget will need unique ID jarviswidget-color-blueLight)-->
					<div class="jarvis widget " id="wid-id-1">
							 <span>
				 <li class="btn-group" style="">
				  <a class="text-primary"style="font-size:0.9em; cursor:pointer;"href="javascript:void(0);" data-toggle="dropdown" class=" dropdown-toggle"><i class="fa fa-primary fa-share fa-1x"  ></i> share</a> 
				
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
						<?php product_details_friend($product_id); ?>
				</div>
					<!-- end widget -->
			<div class="row no-padding">
			   <div class="col-sm-12 col-md-12 col-lg-12 no-padding ">
				<hr> 
				<p class="" style="font-size: 1.4em; padding:20px;"> Reviews made by visitors</p>
			  </div>
			<div class=" col-sm-12 col-md-12 col-lg-12 " style="margin-top:10px;">
			     <div class="comment-holder-ul">
				<?php  product_review_other($product_id);  ?>
				</div>
			</div> 
			<div class="row " style="padding:30px;">
		    <hr>
		    <hr>
			<p style="font-size: 1.2em; padding:10px;" class="text-default"> Add your review about this product.</p>
			  <div class=" padding-10">
				    <textarea rows="1" id="product_review_text" class="form-control" placeholder="your review" required></textarea><br>
				    <button type="button" id="product_review_btn"  onClick="comment_post_btn_click(<?php echo $product_id;?>)" class="btn  btn-primary">Add Review</button>
					</div>	
			    </div>
			  </div>
			</div>

		</div>


</div>
 
</div>
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 padding-10">
<ul class="hidden-xs hidden-sm no-padding no-margin myscroll" style="decoration:none; height:auto;">
<hr class="no-padding no-margin">
<p class="" style="font-size:1.5em;">Other Products</p><?php
get_product_ur_shop_on_product_page($shop_id); ?>
</ul><ul class="padding-10 list-inline hidden-md hidden-lg myscroll" style="decoration:none; height:450px;">
<hr class="no-padding no-margin">
<p class="" style="font-size:1.5em;">Other Products</p><?php
get_product_ur_shop_on_product_page($shop_id); ?>
</ul>
</div>
<!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<div class="row"><h4 class="padding-10">Other Business</h4><?php get_shop_showcase(); ?> </div>
	
		</div>
		<?php footer(); ?>
		<!-- END MAIN CONTENT -->
	<?php chat_box($user_id); ?>
	</div>
		<?php 
	//include required scripts
	include("inc/scripts.php"); 
	//include footer
	include("inc/google-analytics.php"); 
?>	
<!-- Chat holder-->
<ul id="chat_container" class="list-inline">
</ul>

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


<input type="hidden" id="user_id" value="<?php echo $user_id ; ?>" /> 
<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" /> 
<input type="hidden" id="owner_id" value="<?php echo $owner_id ; ?>" /> 
<input type="hidden" id="product_id" value="<?php echo $product_id ; ?>" /> 
<input type="hidden" id="shop_id" value="<?php echo $shop_id ; ?>" />
<input type="hidden" id="productnum" value="<?php echo $product_id ; ?>" />
<input type="hidden" id="shopName" value="<?php echo $shopName ; ?>" />
<input type="hidden" id="prdt_name1" value="<?php echo $prdt_name1 ; ?>" /> 

<!--Chat 4 hidden inputs-->
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" /> 

<script type="text/javascript" src="/js/review_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/reply_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/product_view.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/script.js"></script>
	<input type="hidden" id="gif_useaspost" value="" />
	<input type="hidden" id="gifpicimageslength" value="" />
<input type="hidden" id="prdtname" value="<?php echo ucwords(formatUrl_rev($prdt_name)) ; ?>" />
	 <input type="hidden" id="shoname" value="<?php echo ucwords(formatUrl_rev($shopName)) ; ?>" />
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