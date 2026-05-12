<?php
ini_set('session.cookie_httponly',true);
include"include/sessionfile.php";
include "include/funcxn.php";
 $user_id = $_SESSION['id'];
 $account_id = $_SESSION['id'];
  $search_text = $_GET['search_text'];
echo "Searching for ".$_GET['search_text']."...";
?>

<html lang="en-us">
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type= "text/javascript" src = "/js/add_to_cart.js"></script>
<script type= "text/javascript" src = "/js/countries.js"></script>

<head> 
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

			<title>Mykanta Search </title>
		<link rel="icon" href="/img/demo/hipi_logo.png" type="image/x-icon">
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
		<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">

		
		<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">

	

	

	</head>
	<body class="fixed-header fixed-navigation">
	
	    <?php     header_up($user_id) ; ?>
		<!-- END HEADER -->

		 <!-- BEGIN NAVIGATION -->
		<?php 
		nav($user_id);
		?>
		
        <!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			

			<!-- MAIN CONTENT -->
			<div>

<div class="row">


</div>


<div class="row no-padding">
<div class="col-sm-12">
<div class="">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-6" style="margin-left:10px;">
<div class="">
<div class="row">
<div class="col-sm-12">
<div class="row">
<div class="col-sm-3 profile-pic">

 
										</div>
										<div class="col-sm-12">
									<h3 class="strong text-primary"><i class="glyphicon glyphicon-search"></i>Your search Results</h3>
										
										</div>
										</div>
</div></div>

							<div class="row">

								<div class="col-sm-12" >
<?php include "include/searchproduct.php";?>

								</div>

							</div>
							<!-- end row -->

						</div>

					</div>
				<!--	<div class="col-sm-12 col-md-12 col-lg-6" style="margin-left:-15px;">

						<div class="">

							<div class="row">

								
								<div class="col-sm-12">

									<div class="row">

										<div class="col-sm-3 profile-pic">
										
											 
										</div>
										<div class="col-sm-12">
									<h3 class="strong text-primary"> Other products near you</h3>
										
										</div>
										</div>
</div></div>

							<div class="row">

								<div class="col-sm-12" >
<?php// include "include/searchproduct.php";?>

								</div>

							</div>
							<!-- end row 

						</div>

					</div>-->
				</div>

			</div>


	</div>

</div>

<!-- end row -->

</section>
<!-- end widget grid -->
</div>
			<!-- END MAIN CONTENT -->

		</div>
	

			<?php 
	//include required scripts
	include("inc/scripts.php"); 
	//include footer
	include("inc/google-analytics.php"); 
?>	
	

	<!-- Demo purpose only -->
		<script src="/js/demo.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="/js/app.js"></script>

	</body>

</html>