<?php 
include "conxn.php";

$query = "SELECT shop_id FROM `shop`  LIMIT 0 , 100 ";
echo '<div class="widget-body no-padding">
						
						<div class="alert alert-info no-margin fade in">
							<button class="close" data-dismiss="alert">
								×
							</button>
							<i class="fa-fw fa fa-info"></i>
							',counts(),'
						</div>
						<div class="table-responsive">
								
							<table class="table table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Business Name</th>
										<th>Email <a href="#" data-target="#mail_send" data-toggle="modal"><button class="" >send mail to all <i class="fa-envelope fa "></i></button></a></th>
										<th>  <a href="#" data-target="#mail_send_user" data-toggle="modal"><button class="" >send mail to all Users <i class="fa-envelope fa "></i></button></a></th>
										<th>Views</th>
										<th>Sub.</th>
										<th>Orders</th>
										<th>Product No (Options)</th>
										<th>Date Created</th>
										<th>Verification</th>
										<th>Visibility</th>
										<th>Package</th>
										<th>Banner</th>
									</tr>
								</thead>
								<tbody>';
$advert_query = mysqli_query($link,$query);
 
if( $advert_query2  = mysqli_num_rows($advert_query))
{
while($advert_query2  = mysqli_fetch_array($advert_query,MYSQLI_ASSOC))
{  
  $shop_id = safe_input($advert_query2['shop_id']);
  
  $queryA = "SELECT shopName,shop_descrb,mode,email,datetime FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 4 ";
  $query4user_info = mysqli_query($link,$queryA);
  if($queryAi  = mysqli_num_rows($query4user_info))
{
  while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
	{
 $shopName = safe_input($allpalls_info['shopName']);
 $datetime = $allpalls_info['datetime'];
 $email = $allpalls_info['email'];
 $modeo = $allpalls_info['mode'];
 if($modeo == 1)
 {$mode = '<p class="text-success"> on</p>';}else{$mode = '<p class="text-danger"> hidden </p>';}
 
$shopName1 = formatUrl($shopName);
$string_descrb = safe_input($allpalls_info['shop_descrb']); 
 $shop_descrb = substr($string_descrb, 0, 47). '...';
	
	
$queryB = " SELECT image_loc_mini_index FROM banner_pic WHERE shop_id = '$shop_id' ";
	   if($querybannerpic = mysqli_query($link,$queryB))	
       {
	  //the number of views of a shop
	 $query_view = "SELECT COUNT(viewer_id) FROM views WHERE shop_id = '$shop_id'";

$query_data = mysqli_query($link,$query_view);
$query_count = mysqli_fetch_row($query_data);
 $view_count = $query_count[0];

//number of subcribers a shop has
$query_sub = "SELECT COUNT(user_id) FROM subscribers WHERE shop_id ='$shop_id'";

$query4user_info = mysqli_query($link,$query_sub);
$query_count = mysqli_fetch_row($query4user_info);
 $shop_count = $query_count[0];

//number of shop_product_no
$query_sub = "SELECT COUNT(product_id) FROM product WHERE shop_id ='$shop_id'";

$query4user_info = mysqli_query($link,$query_sub);
$query_count = mysqli_fetch_row($query4user_info);
 $shop_product_no = $query_count[0];
 $shop_product_no_result = $shop_product_no * 5;
 


//number of orders
$query_sub = "SELECT COUNT(DISTINCT order_code) FROM place_order WHERE shop_id ='$shop_id'";

$query4user_info = mysqli_query($link,$query_sub);
$query_count = mysqli_fetch_row($query4user_info);
 $shop_order = $query_count[0];


	 while($banner_pic  = mysqli_fetch_array($querybannerpic,MYSQLI_ASSOC))
		{   
		 $banner_image = safe_input($banner_pic['image_loc_mini_index']);		
	
	 echo'
	  <tr>
			<td>#</td>
			<td>,<a href="/business_link2/'.$shopName1.'">'.$shopName.'</a></td>
			<td>'.$email.'<a href="#" data-target="#mail_send_individual" data-toggle="modal"><button class="btn btn-default pull-right" ><i class="fa-envelope fa "></i></button></a>
			</td>
			<td>'.$view_count.'</td>
			<td>'.$shop_count.'</td>
			<td>'.$shop_order.'</td>
			<td>'.$shop_product_no.'('.$shop_product_no_result.')</td>
			<td>'.$datetime.'</td>
			<th>',type($shop_id),'</th>
			<th>'.$mode.'</th>
			<th>',package($shop_id),'</th>
			<td> <img src="'. $banner_image.'" alt="change" class="img" style="height:50px; width:auto;"></td>
		</tr>';
									 
} 
	}
	
	}

	}
}
}
else
{ 
echo'<div class=" well well-light col-md-6" > No Businesses yet</div>
>';




}
	echo '</tbody>
							</table>
							
						</div>
					</div>';
					
function counts()
{
include "conxn.php";
 //the number of views of a shop
	 $query_view = "SELECT COUNT(shop_id) FROM shop";

$query_data = mysqli_query($link,$query_view);
$query_count = mysqli_fetch_row($query_data);
 $view_count = $query_count[0];
 
 echo '<p class="" style="">No of Businesses : <span class="text-primary" style="font-size:2.4em"> '.$view_count.'</span></p>';	 
 
  //hidden / active ration
 $query_view1 = "SELECT COUNT(shop_id) FROM shop where mode = '1'";

$query_data1 = mysqli_query($link,$query_view1);
$query_count1 = mysqli_fetch_row($query_data1);
 $view_count1 = $query_count1[0];
 
 echo '<p class="" style="">Active / Hidden Ratio <span class="text-primary" style="font-size:2.4em"> '.$view_count.'/'.$view_count1.'</span></p>'; 
  //verified
 $query_view1v = "SELECT COUNT(shop_id) FROM verify where type = '1' OR type = '2' OR type = '3'  ";

$query_data1v = mysqli_query($link,$query_view1v);
$query_count1v = mysqli_fetch_row($query_data1v);
 $view_count1v = $query_count1v[0];
 
 echo '<p class="" style="">Verified <span class="text-primary" style="font-size:2.4em">'.$view_count1v.'</span></p>'; 

 //visible
 $query_view12 = "SELECT COUNT(shop_id) FROM shop where mode = '1'";

$query_data12 = mysqli_query($link,$query_view12);
$query_count12 = mysqli_fetch_row($query_data12);
 $view_count12= $query_count12[0];
 
  $total =  $view_count12 /  $view_count * 100 ;
 echo '<p class="" style="">No of Active Businesses:<span class="text-primary" style="font-size:2.4em"> '.$view_count12.'</span></p>';
 echo '<span class="text-success" style="font-size:2.4em">  %'.$total.'of businesses are active</span>';
}
function type($shop_id)
{ 
include "conxn.php";
 $queryA = "SELECT * FROM verify WHERE shop_id = '$shop_id' ";
  $query4user_info = mysqli_query($link,$queryA);
  if($queryAi  = mysqli_num_rows($query4user_info))
{
  while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
	{
 $datetime = $allpalls_info['datetime'];
 $type = $allpalls_info['type'];
 if($type == 1)
 {
 $type = '<p class="text-success"> verified</p><p class="text-info" style="font-size:0.7em;"> '.$datetime.'</p>';}
  else  if($type == 2)
 {
 $type = '<p class="text-success"> verified</p><p class="text-info" style="font-size:0.7em;"> '.$datetime.'</p>';}
 else
 {
 $type = '<p class="text-danger"> non-verified</p>';}
}
echo $type;
}
else
 {
echo $type = '<p class="text-danger"> x </p>';}
}

function package($shop_id)
{ 
include "conxn.php";
 $queryA = "SELECT * FROM verify WHERE shop_id = '$shop_id'";
  $query4user_info = mysqli_query($link,$queryA);
  if($queryAi  = mysqli_num_rows($query4user_info))
{
  while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
	{
 $datetime = $allpalls_info['datetime'];
 $type = $allpalls_info['type'];
 if($type == 1)
 {
 $type = '<p class="text-warning"> Upfront Business</p><p class="text-info" style="font-size:0.7em;"> '.$datetime.'</p>';}
 else  if($type == 2)
 {
 $type = '<p class="text-success">General Verification</p><p class="text-info" style="font-size:0.7em;"> '.$datetime.'</p>';}
 else  if($type == 3)
 {
 $type = '<p class="text-success">Premium</p><p class="text-info" style="font-size:0.7em;"> '.$datetime.'</p>';} 
 else  if($type == 0)
 {
 $type = '<p class="text-danger">trial period</p><p class="text-info" style="font-size:0.7em;"> '.$datetime.'</p>';}
}
echo $type;
}
else
 {
echo $type = '<p class="text-danger"> x </p>';}
}

function orders($shop_id)
{ 
include "conxn.php";
 $queryA = "SELECT COUNT(order_code) FROM place_order WHERE shop_id = '$shop_id'";
  $query4user_info = mysqli_query($link,$queryA);
  if($queryAi  = mysqli_num_rows($query4user_info))
{
  while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
	{
$query_data1 = mysqli_query($link,$query_view1);
$query_count1 = mysqli_fetch_row($query_data1);
 $view_count1 = $query_count1[0];
 
}
echo $type;
}
else
 {
echo $type = '<p class="text-danger"> x </p>';}
}

?>