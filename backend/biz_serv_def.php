<?php
include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$email  = safe_input($_SESSION['email']);
$query1 = "SELECT bus_type FROM shop WHERE shop_id = '$shop_id' "; 
$query4user_info1 = mysqli_query($link,$query1);
while($allpalls_info = mysqli_fetch_array($query4user_info1,MYSQLI_ASSOC))
{
$bus_type = safe_input($allpalls_info['bus_type']);

if($bus_type ==  'Service')
{
echo  ' <div class="row">
             <div class="col-sm-12">
				<div class="padding-5">
				 <ul class="nav nav-tabs tabs-pull-left">
					<li class="active">
						<a href="#a5"  data-toggle="tab" onClick="bus_overview('.$shop_id.');" >Overview</a>
					</li>
					<li class="">
						<a href="#a1" data-toggle="tab">Services</a>
					</li>
					<li>
						<a href="#a2" data-toggle="tab">Subscribers <span class="badge" style="background-color:#000;"></span></a>
					</li>
					<li>
						<a href="#a3"  data-toggle="tab"> Gallery</a>
					</li>
					<li>
						<a href="#a4"  data-toggle="tab">Info</a>
					</li>
						<li>
						<a href="#a6"  data-toggle="tab" onClick="all_orders_list_serv('.$shop_id.');">Appointments</a>
					</li>
				</ul>
											
	  <div class="tab-content ">
			<div class="tab-content ">
				<div class="tab-pane fade in " id="a1">
				 <div class="shel ve padding-5 no-margin " id="shelv e-load">
					<ul class="list-inline   no-margin">',
				get_product_ur_shop($shop_id),'
					</ul>
				</div>
			 </div>
			<div class="tab-pane fade" id="a2" >
			   <ul class="list-inline  padding-5 no-margin">
				',get_subscribe_names($shop_id),'
			   </ul>
			</div><!-- end tab -->
			<div class="tab-pane fade in" id="a3">
				<ul class=" list-inline padding-10" style="">
					',gallery_shop($shop_id),'
				</ul>
			</div>
			<div class="padding-10 tab-pane fade active in" id="a5">
				<ul class=" list-inline padding-10" style="" id="bus_overview">	
					'; include 'include/b_overview.php'; echo '						
				</ul>
			</div>
			<div class="tab-pane fade in" id="a4">
				<ul class=" list-inline padding-10" style="">	
					', shopdetail($shop_id),'						
				</ul>
			</div>
			<div class="tab-pane fade in" id="a6">
				<ul class=" list-inline padding-10" style="" id="all_orders_list_serv">	
					Loading...						
				</ul>
			</div>
		 </div>
      </div>
</div>
</div>
</div>';
}
else
{

echo  ' <div class="row">
             <div class="col-sm-12">
				<div class="padding-5">
				 <ul class="nav nav-tabs tabs-pull-left">
					<li class="active">
						<a href="#a5"  data-toggle="tab" onClick="bus_overview('.$shop_id.');" >Overview</a>
					</li>
					<li >
						<a href="#a1" data-toggle="tab">Products</a>
					</li>
					<li>
						<a href="#a2" data-toggle="tab">Subscribers </a>
					</li>
					<li>
						<a href="#a3"  data-toggle="tab">Gallery</a>
					</li>
					<li>
						<a href="#a4"  data-toggle="tab">Info</a>
					</li>
					<li>
						<a href="#a6"  data-toggle="tab" onClick="all_orders_list('.$shop_id.');">Orders</a>
					</li>
				</ul>
											
	  <div class="tab-content ">
			<div class="tab-content ">
				<div class="tab-pane fade in " id="a1">
				 <div class="shel ve padding-5 no-margin " id="shelv e-load">
					<ul class="list-inline   no-margin">',
				get_product_ur_shop($shop_id),'
					</ul>
				</div>
			 </div>
			<div class="tab-pane fade" id="a2" >
			   <ul class="list-inline  padding-5 no-margin">
				',get_subscribe_names($shop_id),'
			   </ul>
			</div><!-- end tab -->
			<div class="tab-pane fade in" id="a3">
				<ul class=" list-inline padding-10" style="">
					',gallery_shop($shop_id),'
				</ul>
			</div>
			<div class="tab-pane fade in" id="a4">
				<ul class=" list-inline padding-10" style="">	
					', shopdetail($shop_id),'						
				</ul>
			</div>
			<div class="padding-10 tab-pane fade active in" id="a5">
				<ul class=" list-inline padding-10" style="" id="bus_overview">	
					'; include 'include/b_overview.php'; echo '						
				</ul>
			</div>
			<div class="tab-pane fade in" id="a6">
				<ul class=" list-inline padding-10" style="" id="all_orders_list">	
					Loading...						
				</ul>
			</div>
		 </div>
      </div>
</div>
</div>
</div>';
}
}
?>