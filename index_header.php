
<header  class="" style="">
	<div  class="container">
		<div class="row padding-5">
			<div class="col-xs-2 col-sm-3 col-md-3 padding-10">
				<span class="hidden-xs hidden-sm"><a href="/User" class="" title="Profile"><img src="/img/mykanta_logo.png" class="img " alt="mykanta E-commerce" style="width:120px; height:auto;" /></a>
				</span>
				<span class="hidden-md hidden-lg padding-10 " id=""><a href="/User" class="" title="Profile"><img src="/img/site_img/mk.png" class="img "   alt="mykanta E-commerce" height="30" width="30"  style="margin-top:5px;"/></a>
				</span>
			</div>
			<div class="col-xs-8 col-md-6 col-sm-9 padding-10" align="center">
				<form name="form" method="post" action="include/search_dir.php" autocomplete="on">
					<div class="col-md-12 input-group wall-comment-reply ">
					<div class="padding-5" style="height:auto; width:100%;"><input id="yourshop" style="border-size:2px; border-style:solid; border-color:#cccccc; border-radius: 12px; -webkit-border-radius: 12px; -moz-border-radius: 12px; width:100%; height:32px;" name="yourshop" class="padding-5" placeholder="Quick find..." required type="text"/></div>
						<span class="input-group-btn">
							<div class=" ">
								<ul class="no-padding list-inline" style="margin-top:5px;">
			                        <li id="search_search_button_show" >	 
										<span class="hidden-xs hidden-sm btn btn-sm btn-default padding-5 " onClick="s_otr_buttons();" style="height:32px;width:auto;" title="Search"> 
											<p class="">
											<i class="fa fa-search" style="font-size:1.6em;"></i> <span>Search </span></p>
										</span> 
										<span class="hidden-md hidden-lg padding-5  btn   " > 
											 
											<i class="fa fa-search"  title="Search" onClick="s_otr_buttons();"style=" width:auto; font-size:1.6em;"></i>  
										</span> 
									</li>
									
									 <li id="product_search_button_show"  style="display:none;">	 
										<button class="btn btn-sm btn-default padding-5 " name="search_product" id="search_product" style="height:32px;width:auto;" type="submit" title="Product search"> 
											<p class="">
											 Products </p>
											
										</button> 
									</li>
									
			                        <li class="" id="business_search_button_show"  style="display:none;">	 
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
			<div class="col-xs-2 col-md-3 padding-10   ">
			<ul class=" pull-right padding-10 list-inline header-dropdown-list dropdown-large">
			<?php
			@$sessionid = $_SESSION['id'];
			if(isset($sessionid))
			{$user_id = $sessionid;
		//include "./funcxn.php ";
			echo '
				<li class="dropdown-large"style="margin-top:-10px; cursor:default!important;">
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
						<a href="/send_feedback.php"><i class="fa fa-lg fa-fw fa-envelope"></i> <span class="menu-item-parent" style="padding-left:0px;">Suggestion</small></span>
						</li>
						<hr>
						<li>
							<a onCLick="logout();"><i class="fa fa-lg fa-fw fa-sign-out"></i> <span class="">Logout</span></a>
						</li>
						
					</ul>
				</li>
		';
			 }
			 else {echo'<li  class="no-padding"><a href="/signin" style="" class="text-info "  >LOGIN</a></li>
			 <li><a href="/registration" style=" " class="text-info   hidden-xs hidden-sm"  >SIGN UP</a></li>';}?>
			</ul>
			
				
		     </div>
			</div>
		</div>
</header>