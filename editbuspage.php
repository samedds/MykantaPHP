<?php 
ini_set('session.cookie_httponly',true);
include "include/sessionfile.php";
include "include/check_shop.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";
include "include/chat/chat.php";
$user_id = $_SESSION['id'];
$account_id = $_SESSION['id'];
$shopName2 = safe_input($_GET['shopName']);
$shopName = strip_text($shopName2);
$clean_name = formatUrl_rev($shopName); 
$shop_id = shop_id_from_name($clean_name);
if(empty($shop_id)){header("location:/home");} 
echo $shopName. " is loading...";
?>
<html lang="en-us">
<meta charset="utf-8">
<title>Edit <?php echo $shopName ; ?></title>
<link rel="icon" href="/img/mk.png" type="image/x-icon">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<head>
<link rel="stylesheet" type="text/css" href="/css/styles.css" />
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type= "text/javascript" src = "/js/settings_bus.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/script.js"></script>
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
</style>
	<!-- Basic Styles -->
	<link href="/include/croppic/assets/css/croppic.css" rel="stylesheet" type="text/css" /> 
<!-- For fancybox -->
<script type="text/javascript" src="/include/fancybox/source/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/include/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">
	<!-- Basic Styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media=  "screen" href="/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production-plugins.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
</head>
<body class="fixed-header">
<?php 
include "inc/user_header.php";?>
<?php nav($user_id);?>
<div id="main" role="main">
    <div id="content"  style="margin-top:-20px; ">
   		<div class="row no-padding"style="margin-left:-15px;">
       	<div class="col-md-12 col-lg-12 " >
          <div class="well well-sm no-margin no-padding">
             	<div class="row" style="padding-bottom:5px;">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="padding-left:16px;"> 
									<div id="shopname_change">
										<h1 style="margin:0; border:none;" class="pull-left padding-5 text-primary"><a href="/User/my_business/<?php echo $shopName;?>"><?php echo $shopName; ?></a><small> - Edit Business Information</small></h1>
										<button class="btn btn-primary btn-sm pull-right" style="margin:5px;" data-target="#productterms" data-toggle="modal" class="text-info">View Product Listing Policy</button>
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom:20px;">
								<?php include "include/bus_edit.php"; ?>
							<div class="overlay hide" id="editprdtover1">
                	<i class="fa fa-refresh fa-spin"></i>
              	</div></div>
					</div>
					
				</div>
				
			</div></div>
			<?php footer(); ?>
		</div>
		<!-- END MAIN CONTENT -->
			
	<?php 
	//include required scripts
	include("inc/scripts.php"); 
	//include footer
     include("inc/google-analytics.php"); 
?>	

<!-- Chat holder-->
<ul id="chat_container" class="list-inline">
</ul>

		<div class="modal fade" id="productterms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Mykanta Product Listing Policy</h4>
					</div>
					<div class="modal-body">
					   <div class="row">
					   	<div class="col-xs-12">
							 	<p class="text-danger" style="text-align:center;"><b>PLEASE READ CAREFULLY BEFORE POSTING YOUR TRADING ITEM(S) ON MYKANTA.COM</b></p>
							 	<ol style="line-height: 1.5;">
									<li>You may not submit, sell or buy any item that is restricted or prohibited by a federal, 
									state, local law /authority in any country or Jurisdiction on mykanta.com</li>
									<li>Mykanta does not permit any trading items that are illegal, infringe upon the intellectual 
									property rights of another business or person(s), or products that could easily be used for illegal activities or purposes.</li>
									<li>Mykanta reserve the right to remove any trading items that in any way or another violate this “Product Listing Policy” with or 
									without any further notice. Mykanta also reserve the right to disable the accounts of any member who continue to violate this Policy after been warned.</li>
									<li>It’s the sole responsibility of the Business administrators to ensure that the items or products posted are legal and permissible.</li>
									<li>This policy is guided by the terms and condition of mykanta.com, data and privacy policy and advertisement policy. We reserve the 
									right to change any content herein with or without notice at any given time period. Please contact mykanta support team at support@mykanta.com</li>
								</ol>

								<p><b>The following are Product list and types that are prohibited on mykanta:</b></p>
								<ul>
									<li><b>Governmental Discipline: </b></li>
										<ul>
											<li>Governmental uniforms including transit uniforms</li>
											<li>Governmental documents</li>
											<li>Government IDS and Licenses</li>
										</ul>


									<li><b>Adults and Nudity:</b></li>
										<ul>
											<li>Adults’ subscriptions services or conversation services</li>
											<li>Erotic, Pornographic and adult content including but not limited to audio, visual, magazines, DVD’s , VCD’s, toys, etc.</li>
											<li>Products or images showcasing nudity</li>
										</ul>

									<li><b>Finance:</b></li>
										<ul>
											<li>Credit cards, application for financial services or loans, credit repair services</li>
											<li>Any form of financial services, including but not limited to; money transfer, bank guarantees and letters of credit, loans etc.</li>
											<li>Request for donation or money or materials or products or substances, etc.</li>
											<li>Lottery, raffle, contest, award winning services etc.</li>
										</ul>

									<li><b>Drugs:</b></li>
										<ul>
											<li>Illegal drugs or drug paraphernalia</li>
											<li>Prescription drugs or devices, controlled substances, unapproved or illegal drugs and devices</li>
										</ul>

									<li><b>Fraud:</b></li>
										<ul>
											<li>Replica and name brand (unreal products)</li>
											<li>Counterfeit Currency and Stamps</li>
											<li>Stolen items or items that does not exist or trickery products with lower prices to get users attention</li>
										</ul>

									<li><b>Cyber:</b></li>
										<ul>
											<li>Unauthorized Software, copied software, etc.</li>
											<li>Spyware, spam, email advertisement or any commercial messaging services</li>
											<li>Mailing list and personal information</li>
										</ul>

									<li><b>Ticketing:</b></li>
										<ul>
											<li>Contracts and Tickets: unless approved and authorized by Mykanta Ghana</li>
											<li>Event ticket resale (example: movie, sporting, or general entertainment event tickets)</li>
										</ul>

									<li><b>Education and Occupation:</b></li>
										<ul>
											<li>Diplomas and Degrees</li>
											<li>Job Posting ( unless approved and authorized by mykanta)</li>
										</ul>

									<li><b>Anonymous Sales:</b></li>
										<ul>
											<li>Firearms, ammunition, stun guns, arms or high capacity magazines, military weapons</li>
											<li>Gold Dust, gold bullion and other unrefined precious minerals or metals (excluding Jewellery)</li>
											<li>Human body parts, fluids and remains</li>
											<li>Animal Products or wildlife (example; Skin, internal organ, pelts, teeth, claws, shells, bones, ivory, any part of an alive or dead animal)</li>
										</ul>

									<li><b>Racism and Religion:</b></li>
										<ul>
											<li>Post or items promoting hatred, racism, or religious persecution</li>
										</ul>
								</ul>
							</div>
					   </div>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->

	</div>

<!-- Chat holder-->
<ul id="chat_container" class="list-inline">
</ul>

<!--Chat 4 hidden inputs-->
<input type="hidden" id="settings_backp" value="" />
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" />  
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<script src="/js/plugin/summernote/summernote.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#prdt_desc').summernote({
				height : 150,
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
</body>
</html>