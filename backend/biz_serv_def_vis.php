<?php
include "include/conxn.php";
$query1 = "SELECT bus_type FROM shop WHERE shop_id = '$shop_id' "; 
$query4user_info1 = mysqli_query($link,$query1);
while($allpalls_info = mysqli_fetch_array($query4user_info1,MYSQLI_ASSOC))
{
$bus_type = safe_input($allpalls_info['bus_type']);

if($bus_type ==  'Service')
{
echo  ' 

<div class="col-sm-12">
<div class="padding-0">
<ul class="nav nav-tabs tabs-pull-left">
<li class="active">
<a href="#a1" data-toggle="tab">Service (',get_products_no($shop_id),')</a>
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
<div class="shel ve  padding-5 no-margin " id="shelv e-load">
<ul class="list-inline  no-margin">
',get_product_ur_shop($shop_id),'
</ul></div>
</div>
<div class="tab-pane fade in" id="a3">
<ul class=" list-inline padding-10" style="">
', gallery_shop($shop_id),'
</ul>
</div>
<div class="tab-pane fade in" id="a4">
<ul class=" list-inline padding-10" style="">
',shopdetail_info($shop_id),'
</ul>
</div>
</div>

</div>
</div>
</div>
	';
}
else
{

echo  ' 

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
<div class="shel ve  padding-5 no-margin " id="shelv e-load">
<ul class="list-inline  no-margin">
',get_product_ur_shop($shop_id),'
</ul></div>
</div>
<div class="tab-pane fade in" id="a3">
<ul class=" list-inline padding-10" style="">
', gallery_shop($shop_id),'
</ul>
</div>
<div class="tab-pane fade in" id="a4">
<ul class=" list-inline padding-10" style="">
',shopdetail_info($shop_id),'
</ul>
</div>
</div>

</div>
</div>
</div>
';
}
}
?>