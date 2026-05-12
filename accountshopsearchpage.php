<?php 
ini_set('session.cookie_httponly',true);	
include"include/sessionfile.php";
include "include/searchshop.php";
include "include/searchperson.php";
include "include/searchproduct.php";
include "include/funcxn.php";
include "include/chat/chat.php";
 $user_id = safe_input($_SESSION['id']);
 $account_id = safe_input($_SESSION['id']);
$search_text= safe_input($_GET['search_text']);
echo "Searching for ".$search_text."...";  
?>
<html lang="en-us">
<meta charset="utf-8" />
<title>Search <?php echo $search_text;?> </title>
<link rel="icon" href="/img/mk.png" type="image/x-icon"/>
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="canonical" href="www.mykanta.com"/>
<noscript>
<meta http-equiv="refresh" content="0;URL=www.mykanta.com">
</noscript>
<script type="text/javascript" src = "/js/countries.js"></script>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/js/ajaxupload_image.3.5.js" ></script> 
<script type= "text/javascript" src="/js/load_product_modal_friend.js"></script>
<head>
	<!-- styles and scripts needed by jScrollPane -->
	<link type="text/css" href="/include/jscrollpane/jquery.jscrollpane.css" rel="stylesheet" media="all" />
	<script type="text/javascript" src="/include/jscrollpane/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="/include/jscrollpane/jquery.jscrollpane.js"></script>
<!-- For fancybox -->
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
<script type="text/javascript">
function show_share(post_id)
{
 // document.getElementById('share_'+post_id+'').show(); 
   $('#share_'+post_id+'').fadeIn('slow');
}
</script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/script.js"></script>

<script type="text/javascript" src="/include/chat/chat.js" ></script>
<style type="text/css"> 
.pic{

height:auto;
width: auto;


}
.loading_gif
{
background:url(/img/loading.gif) no-repeat 50% 50%;
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
top: 0;
display: none;
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
@media screen and (max-width: 450px) 	{
	.nav-tabs li{
	
		font-size: 10px;
	}
}
@media screen and (max-width: 390px) 	{
	.nav-tabs li{
		font-size: 9px;
	}
	.nav li a{
		padding:5px !important;
	}
}

.bigbox, #divMiniIcons{
	left:10px !important;
}
.bigbox, #divMiniIcons{
	left:10px !important;
}

</style>
<!-- For cropper -->
<link href="/include/croppic/assets/css/croppicprofile.css" rel="stylesheet" />
		
<!-- Basic Styles -->
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css"><link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>

</head>
<body class="fixed-header smart-skin-2">
<!-- HEADER -->
<?php 
include "inc/user_header.php";?>
<!-- END HEADER -->
<!-- BEGIN NAVIGATION -->
<?php 
nav($user_id);
?>
<div id="main" role="main" >
        <div id="container" class="row">
            <div class="col-sm-10">
                <div class="row">
                     <div class="col-sm-12 col-md-12 col-lg-12" style="">
                         <h4 class=" text-primary padding-5">Your search Result for "<?php echo $search_text; ?>"</h4>	
                         
                                <div class="padding-10">
                                    <ul class="nav nav-tabs tabs-pull-left">
	                                  <li class="active">
		                                 <a href="#a4" data-toggle="tab"><h4>Businesses<span class="badge inbox-badge" id="shopNo" style="background-color:#000;">0</span></h4></a>
	                                  </li>
	                                  <li>
		                                 <a href="#a1" data-toggle="tab"><h4>Products<span class="badge inbox-badge" id="productNo" style="background-color:#000;">0</span></h4></a>
	                                  </li>
	                               <!--   <li>
		                                 <a href="#a2" data-toggle="tab"><h4>People<span class="badge inbox-badge" id="peopleNo" style="background-color:#000;">0</span></h4></a>
	                                  </li>-->
                                    </ul>
                                    <div class="tab-content padding-top-10">
	                                    <div class="tab-content padding-top-10">
		                                    <div class="tab-pane fade" id="a1">
		                                        <div class="row">	<div class="col-md-12">
                                                    <?php searchproduct($search_text); ?>
	                                                </div>
	                                             </div>
	                                        </div>
                                            <div class="tab-pane fade" id="a2" style="margin-top:-10px;">
	                                            <div class="col-md-8">
                                                    <?php //searchperson($search_text); ?>
	                                            </div>
	                                         </div><!-- end tab -->
                                            <div class="tab-pane fade in active" id="a4"> 
											    <div class="row padding-10 margin-10">
	                                              <?php search_shop($search_text); ?>
	                                                </div>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                               
                        </div>					
                    </div>
                </div>
                
            
			<div class="col-sm-2">
		
                </div>	
	</div>
		<?php footer(); ?> 
      	 </div>
		<?php chat_box($user_id); ?>

<?php 
//include required scripts
include("inc/scripts.php"); 
//include footer
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

<input type="hidden" id="username" value="<?php username_only($user_id) ; ?>" /> 
<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" /> 
<!--Chat 4 hidden inputs-->
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" />

<input type="hidden" id="hiddenGifImg" value="" />
<input type="hidden" id="myfile" value="" />

</body>
</html>