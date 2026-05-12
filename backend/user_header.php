<header id="header"> 
	<div id="logo-group"> 
		<span class="hidden-xs hidden-sm" id="logo"><a href="/User" title="Profile" class=""><img src="/img/mykanta_logo.png" class="img "  height="25" width="90"/></a>
		</span>
		<span class="padding-10 hidden-md hidden-lg" id=""><a href="/User" class="" title="Profile"><img src="/img/site_img/mk.png" class="img"  height="30" width="30"/></a>
		</span>
	</div>
	<div class=" no-padding">
		<form action="/include/search_dir_logged.php" class="hidden-xs hidden-sm header-search pull-left" method="post" name="form1" autocomplete="off">
			<input type="text" style="border-radius:15px;" placeholder="Find businesses, products and people" name="yourshop" required/>
			<button type="submit">
			<i class="fa fa-search"></i>
			</button>
		</form>
		<div id="search-mobile" class="btn-header transparent  no-padding" style="margin-left:-70px;"> 
			<span> <a href="javascript:void(0)" title="Search"><i style="line-height:2.0;" class="fa fa-search"></i></a>
			</span>
		</div>
	</div>				
<div class="pull-right no-padding" >	
	<div class="col-xs-10 col-sm-10 col-md-10 no-padding"   style="padding-bottom:10px;">					
		<div class="dropdown-lg ">
		  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" >			
			<div id="logo-group"> 			  
			  <span id="activity" onClick="notifier_update();" class="activity-dropdown"title="Updates"> <i class="fa fa-globe" style="line-height:1.2; color:black;"></i> <span  id="badge_notifier"><b class="badge">!</b></span>
			 </span>
           </div>		   
		 </a>		
		  <ul class="dropdown-menu  notifications pull-right no-padding" role="menu" aria-labelledby="dLabel">
				 <div class="notification-heading padding-10"><h4 class="  text-muted">Notification</h4>
				 </div>
				 <li class="divider"></li>
			
				 <p class=" padding-10" style="color:black; width:250px;">How to use Mykanta</p>
				  <button type="button" onClick="tag_search();" class="padding-10 btn-sm btn-primary-lg-o"style="margin-left:10px;"><i class="fa fa-arrow-right"></i> Read more</button>
				 <li class="divider"></li>
				 <div class="notification-footer">
				     <h4 class="menu-title"></h4>
				 </div>
		 </ul>
	    </div>
				             
			<ul class="header-dropdown-list dropdown-large">
					<li class="dropdown-large padding-10"style="margin-top:-48px; cursor:default!important;">
						<p class="dropdown-toggle text-primary hidden-xs padding-10" data-toggle="dropdown" > <span class="padding-10" style="margin-left:-32px; " id="pic_header" >  <img class=" img-circle  img-thumbnail" width="55"  style="margin-top:-30px; " src="<?php get_profile_pic_only_name($user_id); ?> "/> <b class="caret"> </b> </span></p>
						<p class="dropdown-toggle hidden-md hidden-lg hidden-sm padding-10" style="" data-toggle="dropdown"
						><span class="padding-10" style="margin-left:-10px; " ><img class=" img-circle img-thumbnail" width="42"  style="margin-top:-35px; " src="<?php get_profile_pic_only_name($user_id);?>"/></span></p>
						<ul class="dropdown-menu pull-right list-inline">
							<li class="padding-10">
								<a href="/User"> <span class="menu-item-parent" >Profile</span></a>
								<a href="/user_settings.php"> <span class="menu-item-parent" style="padding-left:0px;">Edit Profile</small></span>
								<a href="/send_feedback.php"> <span class="menu-item-parent" style="padding-left:0px;">Send us a suggestion</small></span>
								<a href="/create_business.php"><span class="menu-item-parent" style="padding-left:0px;">Create Business Page</span></a>
							</li>
							<hr class="no-margin">
							<li class="">
								<a href="/check_out.php">
								<img src="/img/site_img/cart.png" class="padding-5" style="height:30px;"/>Cart</a>
						        <a href="/frequently_aq">
								<img src="/img/site_img/faq.png" class="padding-5" style="height:30px;"/> Q & A</a>
							   <!-- <a href="/TermandConditions">
								<img src="/img/site_img/terms.png" class="padding-5" style="height:30px;"/> Terms</a> </li>
							 -->
							<hr class="no-margin">
							<li class=" padding-5">	<a href="/invite_bus.php">  Invite a business</a> 
								<a onClick="logout();"> <span class="text-muted font-xs ">Logout</span></a>
							</li>
							
						</ul>
					</li>
				</ul>			
			</div>
	
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 no-padding" style="margin-left:-25px;">
			<div id="hide-menu" class="btn-header ">
				<span> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder" style="line-height:1.5;"></i></a> </span>
			</div>
		</div>
	<form action="/include/search_dir_logged.php" class=" hidden-md hidden-lg hidden-sm  header-search pull-left"  method="post" name="form1" >
			<input type="text"  placeholder="Search " name="yourshop" required/>
			<button type="submit"style="margin-left:-300px;">
			<i class="fa fa-search"></i>
			</button>
			<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"  style="line-height:1.5;"></i></a>
		</form>	
	</div>
</header>