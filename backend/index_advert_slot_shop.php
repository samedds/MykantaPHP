<?php 
include "include/conxn.php";
include "include/funcxn.php";

$query = "SELECT shop_id FROM `advert_slot` WHERE `mode` = '1' AND `type` = 'index_slot' ORDER BY RAND() LIMIT 0 , 4 ";

 $advert_query = mysqli_query($link,$query);

if($advert_query2  = mysqli_num_rows($advert_query))
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
$shopName = substr($string, 0, 14). '..';
$shopName1 = formatUrl($string);
$string_descrb = safe_input($allpalls_info['shop_descrb']); 
$shop_descrb = substr($string_descrb, 0, 60). '...';
	   
	   $queryB = " SELECT image_loc_mini_index FROM banner_pic WHERE shop_id = $shop_id ";
	   if($querybannerpic = mysqli_query($link,$queryB))	
       {
	  //the number of views of a shop
	 $query_view = "SELECT COUNT(viewer_id) FROM views WHERE shop_id = $shop_id";

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
	 
		 echo'<div class="col-xs-6  col-sm-3  col-md-3 col-lg-3 well well-light padding-5 " >
  <img src="'. $banner_image.'" class="img " width="100%" height="auto"/>
 <div class="row well-light " style="padding-top:5px; background-color:; height:80px;">
 <div class="col-md-12">
 <strong> <a href="/business/'.$shopName1.'" class=" no-padding text-warning">'.$shopName.'</a> </strong>
  <span class="badge inbox-badge pull-right hidden-mobile"  style="background-color:white; margin-top:-15px;"><span class="badge  inbox-badge" style="background-color:#5BC0DE;">'.$shop_count.'</span> <span class="glyphicon glyphicon-plus text-success" style="color:orange;"></span>
 </span>
 <span class="badge inbox-badge pull-right hidden-mobile"  style="background-color:white; margin-top:-15px;"><span class="badge  inbox-badge" style="background-color:#5BC0DE;">'.$view_count.'</span> <span class="glyphicon glyphicon-eye-open text-success"style="color:orange;"></span>
 </span> 
 <p class="text-primary"style="">'.$shop_descrb.'</p>
 <u class="text-info" style=""><a href="/business/'.$shopName1.'" class="view_page link" STYLE="" >view page</a></u>
</div> 

</div> 
 </div>
';	} 
	}
	}
	}
}
}
?>