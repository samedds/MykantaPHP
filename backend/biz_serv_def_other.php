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
echo  ' 
<div class="row">
 <div class="col-sm-12">
  <div class="padding-0">
    <ul class="nav nav-tabs tabs-pull-left">
      <li class="active">
        <a href="#a1" data-toggle="tab">Services (',get_products_no($shop_id),')</a>
	  </li>
      <li>
        <a  href="#a3" data-toggle="tab">Gallery<span class="badge" id="galleryShop" style="background-color:#000;"></span></a>
	  </li>
	  <li>
	    <a href="#a4"  data-toggle="tab">Business Info</a>
	  </li>
  </ul>																		
<div class="tab-content ">
	<div class="tab-content ">
		<div class="tab-pane fade in active " id="a1">
           <div class="shel ve  padding-5 " id="shelve-load">
		      <ul class="list-inline padding-5 margin-10">
				 ',	get_product_ur_friend_shop($shop_id),'
			  </ul>
			 </div>
          </div>
		<div class="tab-pane fade in" id="a3">
			<ul class=" list-inline padding-10" style="">
				',gallery_shop($shop_id),'	
			</ul>
		</div>
			<div class="tab-pane fade in" id="a4">
				<ul class=" list-inline padding-10" style="">
					',shopdetail_for_all($shop_id),'
					<?php //shopdetailnogetother($shop_id); ?>
				</ul>
			</div>								
		</div>
		<div class="row no-padding" > 
		<p class="padding-10" style="font-size:1.2em;"> Recommended Pages</p>
		<hr class="no-padding no-margin">
		', get_shop_showcase(),'
		</div>	
	</div>
  </div>
 </div>
</div>';
}
else
{

echo  ' 
<div class="row">
 <div class="col-sm-12">
  <div class="padding-0">
    <ul class="nav nav-tabs tabs-pull-left">
      <li class="active">
        <a href="#a1" data-toggle="tab">Products (',get_products_no($shop_id),')</a>
	  </li>
      <li>
        <a  href="#a3" data-toggle="tab">Gallery<span class="badge" id="galleryShop" style="background-color:#000;"></span></a>
	  </li>
	  <li>
	    <a href="#a4"  data-toggle="tab">Business Info</a>
	  </li>
  </ul>																		
<div class="tab-content ">
	<div class="tab-content ">
		<div class="tab-pane fade in active " id="a1">
           <div class="shel ve  padding-5 " id="shelve-load">
		      <ul class="list-inline padding-5 margin-10">
				 ',	get_product_ur_friend_shop($shop_id),'
			  </ul>
			 </div>
          </div>
		<div class="tab-pane fade in" id="a3">
			<ul class=" list-inline padding-10" style="">
				',gallery_shop($shop_id),'	
			</ul>
		</div>
			<div class="tab-pane fade in" id="a4">
				<ul class=" list-inline padding-10" style="">
					',shopdetail_for_all($shop_id),'
					<?php //shopdetailnogetother($shop_id); ?>
				</ul>
			</div>								
		</div>
		<div class="row no-padding" > 
		<p class="padding-10" style="font-size:1.2em;"> Recommended Pages</p>
		<hr class="no-padding no-margin">
		', get_shop_showcase(),'
		</div>	
	</div>
  </div>
 </div>
</div>';
}
}
?>