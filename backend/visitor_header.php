<header id="header" >

<div class="row no-padding" style="width:100%;">
	 <div class="col-xs-2 col-sm-3 col-md-3 col-lg-3 padding-10 margin-10 ">
			<span class="hidden-xs hidden-sm padding-10" id=""><a href="/User" title="Profile" class=""><img src="/img/mykanta_logo.png"title="mykanta logo" class="img "  height="35" width="100"/></a>
	</span>
	<span class="padding-10 hidden-md hidden-lg" id=""><a href="/User" class="" title="Profile"><img src="/img/site_img/mk.png" class="img"  height="30" width="30"/></a>
	</span>
	 </div>
	 <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6 padding-5" align="left" >
		<form name="form" method="post" action="/include/search_dir.php" autocomplete="off">
					<div class="col-md-12 input-group wall-comment-reply ">
					<div class="padding-5" style="height:auto; width:100%;"><input id="yourshop" style="border-style:solid;border-radius: 12px;width:100%; height:32px;" name="yourshop" class="" placeholder=" Quick find..." required type="text"/></div>
						<span class="input-group-btn">
							<div class=" ">
							<ul class="no-padding list-inline" style="margin-top:5px;">
			                        <li id="search_search_button_show" >	 
										<span class="btn btn-sm btn-default padding-5 " onClick="s_otr_buttons();" style="height:32px;width:auto;" title="Search"> 
											<p class="">
											<i class="fa fa-search" style="font-size:1.6em;"></i> Search </p>
											
										</span> 
									</li>
									
									 <li id="product_search_button_show"  style="display:none;">	 
										<button class="btn btn-sm btn-default padding-5 " name="search_product" id="search_product" style="height:32px;width:auto;" type="submit" title="Product search"> 
											<p class="">
											 Product </p>
											
										</button> 
									</li>
									
			                        <li class="no-padding" id="business_search_button_show"  style="display:none;">	 
										<button class="btn btn-sm btn-default  padding-5" name="search_shops" id="search_shops" style="height:32px;width:auto;" type="submit"title="Business search" >
											<p class="">
											 Business</p>
										
										</button>
									</li>
                                </ul>
							</div>
						</span>
						
						
					</div>
				</form>
				
	 </div>
	 <div class="no-padding col-xs-2 col-sm-3 col-md-3 col-lg-3 ">
		<ul class="list-inline header-dropdown-list dropdown-large">
			<?php
			
			if(isset($_SESSION['id']))
			{$user_id = $_SESSION['id'];
			echo '
				<li class="dropdown-large  hidden-xs hidden-sm"style="margin-top:-45px; cursor:default!important;">
					<p class="dropdown-toggle text-primary hidden-xs hidden-sm" data-toggle="dropdown" >', username_only($user_id),'<b class="caret"></b></p>
					<p class="dropdown-toggle hidden-md hidden-lg" style="" data-toggle="dropdown"
					><img class=" img-circle" width="25"  style="margin-top:-8px; " src="',get_profile_pic_only_name($user_id),'"/><b class="caret"></b></p>
					<ul class="dropdown-menu pull-right">
						<li class="">
							<a href="/User"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent" >Profile</span></a>
						</li>
						<hr>
						<li class="">
							<a href="/check_out.php"><i class="glyphicon glyphicon-shopping-cart"></i> <span class="menu-item-parent" >Cart</span></a>
						</li>
						<hr><li class="">
							<a href="/create_business.php"><i class="fa fa-lg fa-fw fa-legal"></i> <span class="menu-item-parent" >Create Business</span></a>
						</li>
						<hr>
						<li>
						<a href="/user_settings.php"><i class="fa fa-lg fa-fw fa-gears"></i> <span class="menu-item-parent" style="padding-left:0px;">Settings</small></span>
						</li>
						<hr>
						<li>
						<a href="/send_feedback.php"><i class="fa fa-lg fa-fw fa-envelope"></i> <span class="menu-item-parent" style="padding-left:0px;">Send feedback</small></span>
						</li>
						<hr>
						<li>
							<a onCLick="logout();"><i class="fa fa-lg fa-fw fa-sign-out"></i> <span class="">Logout</span></a>
						</li>
						
					</ul>
				</li>
		';
			 }
			 else {echo'<li class=" hidden-xs hidden-sm ">
			
						<span class="dropdown-toggle text-primary " data-toggle="dropdown" style="cursor:pointer;">Menu <i class="fa fa-angle-down"></i></span>
						<ul class="dropdown-menu pull-right list-inline">
							 <p class="text-muted padding-10"> Mykanta</p>
						
							 <li class="">
								<a href="/signin">
								<img src="/img/site_img/log_in.png" class="padding-5" style="height:30px;"/>  <br><center class="menu-item-parent" >Log In</center></a>
							</li>
							<li class="">
								<a href="/registration">
								<img src="/img/site_img/sign_up.png" class="padding-5" style="height:30px;"/> 
								<br><center >Sign Up</center></a>
							</li>
							<hr>	 
							<li class="">
								<a href="/home">
								<img src="/img/site_img/home.png" class="padding-5" style="height:50px;"/> <br><center class="menu-item-parent" >Home</center></a>
							</li>
							<li class="">
								<a href="/check_out_vis.php">
								<img src="/img/site_img/cart.png" class="padding-5" style="height:50px;"/> <br><center class="menu-item-parent" >Cart</center></a>
							</li>
						     <hr>
							<li class="">
								<a href="/frequently-asked-questions-and-answers">
								<img src="/img/site_img/faq.png" class="padding-5" style="height:50px;"/>  <br><center class="menu-item-parent" >FAQ</center></a>
							</li>
							<li class="">
								<a href="/TermandConditions">
								<img src="/img/site_img/terms.png" class="padding-5" style="height:50px;"/> <br><center class="menu-item-parent" >Terms</center></a>
							</li>
							
						</ul>
					</li>';}?>
		<span id="hide-menu" class="btn-header ">
				<span> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder" style="line-height:1.5;"></i></a> </span>
			</span>		</ul>
				
			
	 </div>
</div>
</header>