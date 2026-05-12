<?php
require_once "include/conxn.php";

$shopname1 = safe_input($_GET['search_text']);
$shopname = preg_replace('/[^A-Za-z0-9\ ]/ ', ' ', $shopname1);
//$clean_name = formatUrl_rev($shopname); 

   if(isset($shopname ))
	 { 
$query1 = "SELECT shop_id,shopName,user_id,state,mode
         FROM shop  WHERE mode >= '1' AND shopName LIKE '%".$shopname."%' 
         LIMIT 0 , 15 ";
	$query_run1 = mysqli_query($link,$query1);
if($sqlar = mysqli_num_rows($query_run1))
	{ echo '<h5 class="text-info no-padding"> '.$sqlar.' business(es) found</h5> ';
	//$query_num1 = mysqli_num_rows($query_run1);
	while ($query_row1 = mysqli_fetch_assoc($query_run1))
	{ 
	$shop = $query_row1['shopName'];
	$shopName = formatUrl($shop); 
	  $state = $query_row1['state'];
	  $shop_id =$query_row1['shop_id'];
	 $id =$query_row1['user_id'];
	 $mode =$query_row1['mode'];
	if($mode >= 1)
	{
	$queryi = " SELECT image_loc FROM banner_pic WHERE shop_id = $shop_id ";
	 $querybannerpic = mysqli_query($link,$queryi);
	if( mysqli_num_rows($querybannerpic))
   {
   

 //echo  $count_no = count($querybannerpic);

     while($banner_pic  = mysqli_fetch_array($querybannerpic,MYSQLI_ASSOC))
			{  
		 $banner_image = $banner_pic['image_loc'];
			
			
			
			
			$query = "SELECT *
         FROM registration
          WHERE id = '$id'
         LIMIT 30
         ";
	
	if($query_runNew = mysqli_query($link,$query))
	{
	  while ($query_run = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {

	// $secName = $query_run['secName'];
	$friend_id = $query_run['id'];
    $firstName =$query_run['firstName'];

    $telephone =$query_run['telephone'];
    $city =$query_run['city'];
  $country =$query_run['country'];
  $countryCode =$query_run['countryCode'];
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
	 <div  class=" col-md-6" style="padding:2px" >
		<table border="0" width="400" cellpadding="0" cellspacing="0">
		<tr>
			<a href="/business/'.$shopName.'"><img src="'. $banner_image.'" alt="change"class="img img-thumbnail"style= "height:80px; width:400px;" alt="'.$shopName.'"title="'.$shopName.'"/></a>
	     <td class="panel" bgcolor="" width="200" >
		<h4><a href="/business/'.$shopName.'">'.$shop.'</a></h4>
		<span class="text-primary">Tel:</span> Login to view
		    '.$verify_type.'</td>
			<td width="200" class="panel" bgcolor="grey">
	         <p>'.$country.'</br> '.$city.'</br>'.$state.'
		 </td>
		</tr>
	 </table><br></div>
	
							
	';
	 
	
	}
	
	}
			
			
			
			 }
			 }
   }
 /*  else{
  echo  "hidden shop";
   } */
}
}
else{
  echo  '<div class="well well-light"><p class="text-danger "> No business name match found.</p><p class="text-info "> Try a another business name.</p></div>';
   }

}
 else{
  echo  '<p class="text-info"> Type a business name to search</p>';
   }

?>