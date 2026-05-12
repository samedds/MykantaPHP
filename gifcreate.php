<?php 
ini_set('session.cookie_httponly',true);
 
include "include/funcxn.php";

$user_id = '124';
$username = 'sam';
$user_id = '124';
$account_id = '124';
$owner_id = '124';
//echo "Welcome your Profile is Loading...";	
$current = strtotime('2016-03-26 12:37:17');  
$ded = strtotime('2016-03-26 11:37:17');  
 'time def : '.$result = $current - $ded;


?>
<html lang="en-us">
<meta charset="utf-8" />
<head>
<title>Profile</title>
<link rel="icon" href="/img/mk.png" type="image/x-icon"/>
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="canonical" href="www.mykanta.com"/>
<noscript>
<meta http-equiv="refresh" content="0;URL=www.mykanta.com">
</noscript>
<script type="text/javascript" src ="/js/countries.js"></script>
<script type="text/javascript" src ="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src ="/js/fcmtokenpush.js"></script>
<script type="text/javascript" src ="/js/ajaxupload_image.3.5.js" ></script> 
<script type="text/javascript" src ="/js/scripts.js"></script>
<script type="text/javascript" src ="/js/gifshot.js"></script>

<!-- styles and scripts needed by jScrollPane -->
<link type="text/css" href="/include/jscrollpane/jquery.jscrollpane.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="/include/jscrollpane/jquery.mousewheel.js"></script>
<script type="text/javascript" src="/include/jscrollpane/jquery.jscrollpane.js"></script>
 
<script type="text/javascript" src="/include/fancybox/source/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/include/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
  <script src="js/video.min.js"></script>
  <script src="js/videojs-markers.min.js"></script>
  <script src="js/plugin/noUiSlider/jquery.nouislider.min.js"></script>
  <script src="js/plugin/ion-slider/ion.rangeSlider.min.js"></script>
 <style type="text/css"> 
  .sticky {
     position:fixed;
     top: 48;
     width:110%;
	 z-index:1;
	 background-color:white;
  }
.pic{

height:auto;
width: auto;


}
.loading_gif
{
background:url(/img/loading.gif) no-repeat 50% 50%;
}
.img-gif
{
background:url(/img/loading.gif) no-repeat 100% 100%;
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
top: 12px;
display: none;
width:100%;
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

   
div.upload {
    width: 70px;
    height: 68px;
    background: url(/img/site_img/upload.png);
	background-repeat:no-repeat;
    overflow: hidden;
}   
.upload:hover {
    width: 72px;
    height: 68px;
    background: url(/img/site_img/upload.png);
    overflow: hidden;
	background-repeat:none;
}

div.upload input {
    display: block !important;
    width: 70px !important;
    height: 68px !important;
    opacity: 0 !important;
    overflow: hidden !important;
}
.verticalLine {
    border-left: 2px solid #f2f2f2;
}
.verticalLine_sm {
    border-left: 1px solid #f2f2f2;
}
.left-image{
    position: absolute;
	width:100%;
	height:auto;
}
.right-image{
    right: 20%;
    left: 40%;


}.right-image-last{
    position: absolute;
    margin-top:200px;
}
</style>

<script type="text/javascript">  

$(document).ready(function()
{
	$('#input_value2').click(function(){
	$("#warning1").html("Please wait..."); 
	 $("#gif_image_holder").html(' Loading...');
	  var convert = $('#input_value').val();
	  var current_time_vid = $('#current_time_vid').val();
	  var rane = $('#time_value').val();
	  var video_rex =  $("#video_rex").val();
	 if(convert != "")
	{  
		$.post( "ajax_convert.php " ,
			   {
				   convert : convert,
				   current_time_vid : current_time_vid,
				   rane : rane,
				   video_rex : video_rex,
				   cache: false
			   })
			  .error(
				   function( )
				   {
					$("#warning1").html("Please wait..."); 
				   })
			  .success(
			   function( data )
			   {
				   
				   var num = Math.random();
				  $("#warning1").html(" "); 
				  $("#output2").show();  
				  $('#myfile').val(data);
				  $('#myfile_total').val(25);
				  $("#gif_value").val(data);  
				 setTimeout(function(){ $("#gif_image_holder").html(' <img src="img/comments_images/'+data+'.gif?v='+num+'" style="width:300px;"/><p>'+data+'</p>');},3000);
			});
}
});
});

	  </script>


	
	<script type="text/javascript">
 function download_file(image_loc,post_id)
{ 
     	if(image_loc != ""){
			// alert(use_gif);
			
			  $.post("/ajax/collection_load_each.php",  
					{
						download_file : "download_file",
					  image_loc : image_loc,
					  post_id : post_id,
					   
					 	cache: false,
					})
					
			.error(function(response)
			   {
			   //console.log(response );
				 $("#pic").css('border' , '1px solid red');
				// $("#pic").html(data);
		        //$("#pic_header").css('border' , '1px solid red');
			   })
		  	.success(function( response )
			   { 
  			    alert(response);
			   }); 
		}
		 
	}	

 </script>
<script type= "text/javascript" src = "/js/comment_profile.js"></script>
<script type="text/javascript" src="/js/comment_insert.js?t=<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript" src="/js/uploader_image_home.js" ></script>
	
<!-- Basic Styles -->
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>

</head>
<body class="ubuntu_all">
<div id="main" role="main">
<div class="row ">
<div class="content">
				<div class="header">
					<h4 class="title" id="">Snap pictures from your Camera or from Gallery.</h4>
				</div>
				<div class="">
			     <p class="padding-5"><badge class="badge badge-primary"><i class="fa fa-info"></i></badge> <span class="text-muted" style="font-size:0.9em;" >Select pictures that have the same height and width for a perfect GIF.</span> 
</p>
<div class="row">
<ul class="bootstrapWizard form-wizard" style="width:500px;">
	<li class="active" data-target="#step1" style="width:33%;">
		<a href="#tab1" data-toggle="tab"> <span class="step">1</span> <div class="upload " style="margin-top:20px; margin-left:30%;">
                        <input type="file"  id="upload_button" name="upload"/>
                      </div>  </a>
		 
	</li>
    <li class="active" data-target="#step2" style="width:34%;">
		<a href="#tab1" data-toggle="tab"> <span class="step">2</span> </a><br>
			<div class="" style=""id=" " style=""><img src="/img/site_img/clock.png" onClick=" freemee();" style="height:60px;margin-top:15px;"/></div>
			 
	</li>
	<li class="active pull-right" data-target="#step3" style="width:33%;">
		<a href="#tab1" data-toggle="tab"> <span class="step">3</span> </a><br>
			<div class="" style=""id="saveGifBtn" style=""><img src="/img/site_img/gif_logo.png" style="height:60px;margin-top:15px;"/></div>
	</li> 
</ul>



 </div>
 <div class="btn-group"id="freemee" style="display:none; margin-left:10px;"><p class=""><em class="">GIF Seconds</em></p>
	<span class="btn btn-xs btn-default " style="width:65px;"> <label class="radio"> <input value="50"  name="rane"id="rane005" type="radio" style="">  <i></i>0.5</label></span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="100"  name="rane"id="rane01" type="radio" style="">  <i></i>1</label></span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="200"  name="rane"id="rane02" type="radio" style=" "> <i></i>2</label> </span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="300"  name="rane"id="rane03" type="radio" style=" "> <i></i>3</label> </span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="400"  name="rane"id="rane04" type="radio" style=" "> <i></i>4</label> </span>
	<span class="hidden btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="500"  name="rane"id="rane05" type="radio" style=" "> <i></i>5</label> </span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="600"  name="rane"id="rane06" type="radio" style=" "> <i></i>6</label> </span>
	<span class="hidden btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="700"  name="rane"id="rane07" type="radio" style=" "> <i></i>7</label> </span>
	<span class="btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="800"  name="rane"id="rane08" type="radio" style=" "> <i></i>8</label> </span>
	<span class="hidden btn btn-xs btn-default " style="width:55px;"> <label class="radio"> <input value="900"  name="rane"id="rane09" type="radio" style=" "> <i></i>9</label> </span>
   <span class="btn btn-xs btn-default " style="width:68px;"> <label class="radio">  <input value="1000"  name="rane"id="rane10" type="radio" style=" "> <i></i>10 </label> </span>
	    </div>
	
      <div class="" id="convert_button" style="display:none;"> 
	   <div class="row padding-10"> <h2>Convert a Video to GIF</h2>
	   <div class="col-md-6 ">
	  
	  <em> 1. Pause video as your Start point.</em><br>
	  <em> 2. Choose duration from 1 - 10 seconds.</em><br>
	  <em> 3. Click Convert to process GIF.</em>
	
	   	</div>
	   <div class="col-md-6 ">
	  <b>Seconds</b>
		 <span id="ex2CurrentSliderValLabel">: <span id="ex2SliderVal">3</span></span> 
		 <span id="ex8CurrentSliderValLabel">: <span id="ex8SliderVal">3</span></span><br>
		<!-- <input id="ex8" data-slider-id='ex1Slider' type="hidden" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="0"/>-->
		 <b>Gif length in seconds</b>
		 <select id="time_value" name="time_value"  style="border-radius:6px; height:22px; border:1px solid grey;   ">
                    <option value="10">10</option>
                    <option value="1">1</option>
					<option value="0.5">0.5</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
              </select>
		
		  <input type="hidden" id="input_value" name="convert" /><input type="hidden" id="video_rex" name="video_rex" /><input type="hidden" id="current_time_vid" name="current_time_vid" /><button  class="btn btn-default" id="input_value2" >Convert to GIF</button>
		
	</div>	</div>
	
	 </div> 
	 <span class="" id="add_image" style="width:500px;"  align="left"> </span>
      <video id="video" #video width="100%" height="auto" class="hidden" autoplay></video>

<div class="text-success upload_message"></div> 
					<br clear="all" />
				<div class="wrapper " >
							<div id="gifImgHolder"  class="row padding-10" style="width:500px;"></div>
						</div>
					
				 
						<div class="wrapper ">
						 <div id="warning1"></div>
						      <div id="output2" style="display:none;">
							     <span class="glyphicon glyphicon-ok" style="font-size:1.8em; color:green;"></span>Successfully Converted to GIF.<br/>
								 <input type="hidden" id="gif_value" value="" />
                                   <div class="row padding-10"><div class="col-xs-7 padding-10" id="gif_image_holder"> <img src="" style="width:300px;"/></div><div class="col-xs-5 padding-10"><button class="btn btn-success" id="use_gif">Use GIF as your post.</button><br><br><button class="btn btn-sm btn-default ">Download </button> GIF to local gallery.<br><br><button class="btn btn-sm btn-danger ">Reset </button> </div></div>
					     	</div>
							<div id="vpb_uploads_error_displayer"></div>
							<div id="vpb_uploads_displayer"></div>
							<div id="vpb_uploads_pop"></div>
							<br clear="all" />
						</div>
				 
				
					<div class="padding-5">
						<button class="btn-default" id="empty_gif" type="" > <i class="fa fa-trash-o"></i> Clear All</button>
						<button class="btn-default" id="vpb_uploads_number" type="" > 0 </button>
						<button class="btn-default" id="img_del" type="" ><i class="fa fa-reply"></i> Undo </button>
					</div>
					
				</div>
				<div class="modal-footer">
				 <button type="button" class="hidden btn btn-default">
				Download
			</button>
				</div>
				
			</div><!-- /.modal-content -->
		
</div>
</div>

<?php include 'inc/footer.php';?>
 
	
<?php 
//include required scripts
include("inc/scripts.php"); 
//include footer
include("inc/google-analytics.php"); 
?>


<input type="hidden" id="no_code_an" value="<?php echo substr( md5(124), 5); ?>" /> 
<input type="hidden" id="user_id" value="124" /> 
<input type="hidden" id="text_reev_hold_val" value="" /> 
<input type="hidden" id="username" value="sam" /> 
<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" /> 
<input type="hidden" id="owner_id" value="124" /> 
<input type="hidden" id="get_profile_pic" value="sam" />
<!--Chat 4 hidden inputs-->
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" />

<input type="hidden" id="hiddenGifImg" value="" />
<input type="hidden" id="myfile" value="" />
<input type="hidden" id="myfile_total" value="" />

</body>
</html>