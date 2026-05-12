<?php 
include "include/conxn.php";
$cat_id =$_GET['cat_id']; 
$new_cat_id = cat_reform($cat_id);
$query = "SELECT shop_id FROM `shop` WHERE category = '$new_cat_id' AND mode = '1'   LIMIT 0 , 30 ";

$advert_query = mysqli_query($link,$query);
 
if( $advert_query2  = mysqli_num_rows($advert_query))
{
while($advert_query2  = mysqli_fetch_array($advert_query,MYSQLI_ASSOC))
{  
  $shop_id = safe_input($advert_query2['shop_id']);
  
  $queryA = "SELECT shopName,shop_descrb FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 4 ";
  $query4user_info = mysqli_query($link,$queryA);
  if($queryAi  = mysqli_num_rows($query4user_info))
{
  
   while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
	{
	    
 $string = safe_input($allpalls_info['shopName']);
$shopName = substr($string, 0, 18). '..';
$shopName1 = formatUrl($string);
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


	 while($banner_pic  = mysqli_fetch_array($querybannerpic,MYSQLI_ASSOC))
		{   
		 $banner_image = safe_input($banner_pic['image_loc_mini_index']);		
	 
	 if($banner_image == "img/banners/mini/banner.png")
	 {
	  echo'<li class="well well-light padding-5 " style= " height:auto; width:320px;">
 
  <div class=" item active  padding-bottom-10 " title="'.$shopName.'" align="center" style= " width:100%;">
		                          <img src="'. $banner_image.'" alt="change" class="img " style= " height:100px; width:100%;">

<div class="thumbnail_legend" style="margin-top:-85px;">
<h3 class="desktop  hidden-xs hidden-md hidden-sm banner_text text-center "> '.ucwords($shopName).'</h3>
<h3 class="laptop hidden-sm hidden-lg hidden-xs banner_text text-center "> '.ucwords($shopName).'</h3>
<h3 class="tablet hidden-md hidden-lg hidden-xs banner_text text-center "> '.ucwords($shopName).'</h3>
<h3 class="yam hidden-lg hidden-md hidden-sm banner_text text-center "> '.ucwords($shopName).'</h3>
</div>	
</div> 
								
 <div class="row  well-light " style="padding-top:10px; background-color:; height:80px;">
 <div class="col-md-12 padding-10">
 <strong> <a href="/business_link2/'.$shopName1.'" class=" no-padding text-warning">'.$shopName.'</a> </strong>
  <span class="badge inbox-badge pull-right hidden-mobile"  style="background-color:white; margin-top:-15px;"><span class="badge  inbox-badge" style="background-color:#5BC0DE;">'.$shop_count.'</span> <span class="glyphicon glyphicon-plus text-success" style="color:orange;"></span>
 </span>
 <span class="badge inbox-badge pull-right hidden-mobile"  style="background-color:white; margin-top:-15px;"><span class="badge  inbox-badge" style="background-color:#5BC0DE;">'.$view_count.'</span> <span class="glyphicon glyphicon-eye-open text-success"style="color:orange;"></span>
 </span> 
 <p class="text-primary"style="">'.$shop_descrb.'</p>
</div> 

</div> 
 </li>
';
	 }
	 else{
	  echo'<li class="well well-light padding-5" style= " height:auto; width:320px;">
 
  <div class=" item active   " title="'.$shopName.'" align="center" style= " width:100%;">
		                          <img src="'. $banner_image.'" alt="change" class="img " style= "height:100px; width:100%;">
		                         </div> 
								
 <div class="row  well-light " style="padding-top:5px; background-color:; width:320px; height:60px;">
 <div class="col-md-12" style="margin-top:-3px;">
 <strong> <a href="/business_link2/'.$shopName1.'" class=" no-padding text-warning">'.$shopName.'</a> </strong>
  <span class="badge inbox-badge pull-right hidden-mobile"  style="background-color:white; margin-top:-15px;"><span class="badge  inbox-badge" style="background-color:#5BC0DE;">'.$shop_count.'</span> <span class="glyphicon glyphicon-plus text-success" style="color:orange;"></span>
 </span>
 <span class="badge inbox-badge pull-right hidden-mobile"  style="background-color:white; margin-top:-15px;"><span class="badge  inbox-badge" style="background-color:#5BC0DE;">'.$view_count.'</span> <span class="glyphicon glyphicon-eye-open text-success"style="color:orange;"></span>
 </span> 
 <span><p class="text-primary"style="">'.$shop_descrb.'</p></span>
</div> 

</div> 
 </li>
';
	 }
	 
	 
			} 
	}
	}
	}
}
}
else
{ 
echo'<div class=" well well-light col-md-6" > No Businesses yet</div>';
}
?>