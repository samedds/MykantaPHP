<?php
ini_set('session.cookie_httponly',true);
include"include/sessionfile.php";
include "include/funcxn.php";

include "include/searchperson.php";
include "include/searchproduct.php";

 $user_id = $_SESSION['id'];
 $account_id = $_SESSION['id'];

$search_text = $_POST['yourshop'];
echo "Searching for ".$search_text."...";

?>
<html lang="en-us">
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type= "text/javascript" src = "/js/countries.js"></script>
<head>
<meta charset="utf-8">
<title>Mykanta| Search </title>
<link rel="icon" href="img/mk.png" type="image/x-icon">
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
<?php nav($user_id);?>
<!-- END NAVIGATION -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<div>
        <div class="row no-padding">
            <div class="col-sm-10">
                <div class="row">
                     <div class="col-sm-12 col-md-12 col-lg-12" style="">
                         <h4 class=" text-primary padding-5">Your search Result for "<?php echo $search_text; ?>"</h4>	
                         <div class="row">
                            <div class="col-sm-12 col-md-12 " >
                                <div class="padding-10">
                                    <ul class="nav nav-tabs tabs-pull-left">
	                                  <li class="active">
		                                 <a href="#a4" id="a5" data-toggle="tab"><h4>Shops</h4></a>
	                                  </li>
	                                  <li>
		                                 <a href="#a1" data-toggle="tab"><h4>Products</h4></a>
	                                  </li>
	                                  <li>
		                                 <a href="#a2" id="a3" data-toggle="tab"><h4>People</h4></a>
	                                  </li>
                                    </ul>
                                    <div class="tab-content padding-top-10">
	                                    <div class="tab-content padding-top-10">
		                                    <div class="tab-pane fade" id="a1">
		                                        <div class="row">													
	                                                <div class="col-md-6">
                                                    <?php //searchproduct($search_text); ?>
	                                                </div>
	                                                <div class="col-md-6">
                                                    <?php // include "include/searchproduct.php"; ?>
                                                    </div>															
		                                        </div>
	                                        </div>
                                            <div class="tab-pane fade" id="a2" style="margin-top:-10px;">
	                                            <div class="col-md-6">
                                                    <?php //searchperson($search_text); ?>
	                                            </div>
	                                            <div class="col-md-6">
                                                <?php// include "include/searchperson.php"; ?>
                                                </div>
											</div><!-- end tab -->
                                            <div class="tab-pane fade in active" id="a4"> 
											    <div class="row">
	                                                <div class="col-md-6">
	                                                   <?php  include "include/searchshop.php"; ?>
	                                                </div>
	                                                <div class="col-md-6">
		                                               <?php //include "include/searchshop.php"; ?>
                                                    </div>												
                                               </div>
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
        </div>
	</div>
		
			<?php 
	//include required scripts
	include("inc/scripts.php"); 
	//include footer
	include("inc/google-analytics.php"); 
?>	
	


</body>
</html>