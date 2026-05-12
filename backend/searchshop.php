<?php
include "include/conxn.php";

function search_shop($search_text)
{ 
 $search_text = $_GET['search_text'];
include "include/conxn.php";
$shopname = safe_input($_GET['search_text']);

   if(!empty($shopname ))
	 { 
$query1 = "SELECT *
         FROM `shop`  WHERE mode >= '1' AND `shopName` LIKE '%".$shopname."%' 
         ORDER BY RAND() LIMIT 0 , 20  ";
	$query_run1 = mysqli_query($link,$query1);
if($num = mysqli_num_rows($query_run1))
	{
		echo '<input type="hidden" id="shopNum" value="'.$num.'" />
		<script> var shopNom = $("#shopNum").val();
		document.getElementById("shopNo").innerHTML = shopNom; 
		</script>';
		
	while ($query_row1 = mysqli_fetch_assoc($query_run1))
	{ 
	$shopName = $query_row1['shopName'];
	$shopNameformat  = formatUrl($shopName); 
	  $state = $query_row1['state'];
	  $shop_id =$query_row1['shop_id'];
	 $id =$query_row1['user_id'];
	 $mode =$query_row1['mode'];
	  $telephone =$query_row1['telephone'];
    $city =$query_row1['city'];
  $country =$query_row1['country'];
  $countryCode =$query_row1['countryCode'];
	if($mode >= '1')
	{
	$queryi = " SELECT image_loc FROM banner_pic WHERE shop_id = $shop_id ";
	 $querybannerpic = mysqli_query($link,$queryi);
	if( mysqli_num_rows($querybannerpic))
   {
  while($banner_pic  = mysqli_fetch_array($querybannerpic,MYSQLI_ASSOC))
			{  
		 $banner_image = $banner_pic['image_loc'];
		 }
	 }
			$query = "SELECT * FROM `registration` WHERE id = '$id'LIMIT 30 ";
	if($query_runNew = mysqli_query($link,$query))
	{
	  while ($query_run = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
	$friend_id = $query_run['id'];
    $firstName =$query_run['firstName'];
    $ny_friendemail =$query_run['email'];
	$verify_type = '';
   $query = "SELECT type FROM verify WHERE shop_id = '$shop_id' LIMIT 30  ";
	if($query_runNew = mysqli_query($link,$query))
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['type'];
		 if( $v_code == 1)
		 { $verify_type = '<p class="text-success">Verified <i class="glyphicon glyphicon-ok" alt="'.$shopName.' is a verified business"> </i></p>';}
		 else if( $v_code == 2)
		 { $verify_type = '<p c+lass="text-success">Verified <i class="glyphicon glyphicon-ok" alt="'.$shopName.' is a verified business"> </i></p>';}
		 else if( $v_code == 0)
		 { $verify_type = '';}
		}
	}
	else 
		 { $verify_type = '';}
	echo '
	<div  class="col-md-6" style="padding:2px" >
		<table border="0" width="400" cellpadding="0" cellspacing="0">
			<tr>
				<a href="/business-link/'.$shopNameformat.'"><img src="'. $banner_image.'" alt="'.$shopName.'"class="img img-thumbnail"style= "height:80px; width:400px;" "></a>
					<td class="panel" bgcolor="" width="200" >
		            <h4><a href="/business-link/'.$shopNameformat.'">'.$shopName.'</a></h4>		
					'.$countryCode.' '.$telephone.'
					   '.$verify_type.'</td>
					<td width="200" class="panel" bgcolor="grey">
					<p>'.$country.'</br> '.$state.'</br>'.$city.'
					</td>
			</tr>
	 </table><br></div>
	';
	}
	}
			
   }
 /*  else{
  echo  "hidden shop";
   } */
}
}
else{
  echo  '<div class="well well-light"><p class="text-danger ">Sorry! Searched item not found.</style>.</p><p class="text-info "> Try a different word or phrase.</style>.</p></div>';
   }

}
 else{
  echo  '<p class="text-info"> Type a business name to search</p>';
   }
}
?>