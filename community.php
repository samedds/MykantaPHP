<!DOCTYPE html>
<?php
ini_set('session.cookie_httponly',true);
include "include/conxn.php";

ob_start();
@session_start();
include "include/funcxn_vis.php";
?>
<html lang="en-us">	
<head>
<title>Mykanta Community</title>
<meta charset="utf-8" />
<meta name="description" content="Mykanta community Page"/>
<meta name="author" content="Mykanta Team"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="icon" href="img/mk.png" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css"/>	
<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css"/>	
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
<script type= "text/javascript" src = "/js/countries.js"></script>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<noscript> Your browser does not support JavaScript. </noscript>
</head>
	<body id="login" class="animated fadeInDown">
		
	<?php include 'inc/index_header.php';?>
	
		<!-- MAIN PANEL -->
		<div id="main" role="main">
			<div  class="hidden-xs hidden-sm row  "style="width:100%; background-color:#5bc0de;">
		   <div class="container">
				<h3 class="" style="color:white; margin-left:20px;"  > Mykanta Community </h3>
		   </div>
		</div>
	
		
		<div class="row">
	<div class="col-sm-2">
		
	</div>
				<div class="col-sm-8">
					<div class="" style="">
						<div class="row">
							<div class="col-md-12" style="padding:20px;">	
							</br>
							</br>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		
<div class="col-sm-12 ">
			<div class="row">
	
				<div class="col-sm-12 ">
					<div class="" style="">
						<div class="row ">
						<div class="col-sm-2">
		
	</div>
							<div class="col-sm-7  ">
								<div class="" style="">
									<div class="row padding-10 margin-10">
										<img src="img/blog/images/ecommmerceingh.jpg" title="Electronic Commerce In Ghana" width="100%" />
										<h2><a href="/blog/e-commerce-and-ghana">Electronic Commerce In Ghana</a> <p class="pull-right font-sm">20th October,2017</p></h2>
										 </div>
								</div>
							</div>
							<div class="col-sm-1">
		
	</div>
							<div class="col-sm-3 ">
								<div class="" style="">
									<div class="row padding-10 margin-10">
										 
									</div>
								</div>
							</div>
					    </div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<!-- END MAIN CONTENT -->
<?php include 'inc/footer.php';?>	
	<?php 
//include required scripts
include("inc/scripts.php"); 
//include footer
include("inc/google-analytics.php"); 
?>
	
</html>