<?php
include "include/conxn.php";
//this function will help prevent SQL injections and other hacks
function safe_input($value)
{include "include/conxn.php";
//	$magic_quotes_active = get_magic_quotes_gpc();//boolean - true if the quotes thing is turned on
     $new_enough_php = function_exists("mysqli_real_escape_string");//boolean - true if the function exists (php 4.3 or higher)
   if($new_enough_php)
     {
       
       $value_new = mysqli_real_escape_string($link,$value);//if its a new version use the function to deal with characters
       $value = htmlspecialchars($value_new);//if its a new version use the function to deal with characters
		
        $value = mysqli_real_escape_string($link,$value);//if its a new version use the function to deal with characters
     }
    else
       {
         $value = addslashes($value);
        }
    return $value;
}
function formatUrl($value, $sep='-')
    {
            $res = strtolower($value);
          //  $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
            $res = preg_replace('/[[:space:]]+/', $sep, $res);
            return trim($res, $sep);
    }
	
	
	function strip_text($token)
    {
          $value =  preg_replace('/[^A-Za-z0-9\_\@\.\-\ ]/ ', '', $token);
            return $value;
    }
	function cat_reform($cat_id)
    {
	//1
	if($cat_id=='afb')
	{return "Agriculture, Food & Beverage";}
	else if($cat_id=='acg')
	{return "Art, Crafts & Gallery";}
	else if($cat_id=='at')
	{return "Auto & Transportation";}
	else if($cat_id=='ctjbs')
	{return "Clothing, Textiles, Jewelry, Bags & shoes";}
	else if($cat_id=='eect')
	{return "Electrical Equipment, Components, & Telecom";}
	else if($cat_id=='eea')
	{return "Electronics & Electrical Appliances";}
	else if($cat_id=='gt')
	{return "Gifts and Toys";}
	else if($cat_id=='hb')
	{return "Health & Beauty";}
	else if($cat_id=='hlc')
	{return "Home, Light & Construction";}
	else if($cat_id=='mht')
	{return "Machinery, Hardware & Tools";}
	else if($cat_id=='mcrp')
	{return "Metallurgy, Chemicals, Rubber & Plastics";}
	else if($cat_id=='pao')
	{return "Packaging, Advertising & Office";}
	else if($cat_id=='sca')
	{return "Software, Computers & Accessories";}
	else if($cat_id=='sa')
	{return "Sports & Accessories";}
	else if($cat_id=='sff')
	{return "Stationery, Furniture & Fittings";}
	else echo "category";
	 }
	 
	 function cat_name_trans($cat_id)
    {
	//1
	if($cat_id=='Agriculture, Food & Beverage')
	{return "afb";}
	else if($cat_id=='Art, Crafts & Gallery')
	{return "acg";}
	else if($cat_id=='Auto & Transportation')
	{return "at";}
	else if($cat_id=='Clothing, Textiles, Jewelry, Bags & shoes')
	{return "ctjbs";}
	else if($cat_id=='Electrical Equipment, Components, & Telecom')
	{return "eect";}
	else if($cat_id=='Electronics & Electrical Appliances')
	{return "eea";}
	else if($cat_id=='Gifts & Toys')
	{return "gt";}
	else if($cat_id=='Health & Beauty')
	{return "hb";}
	else if($cat_id=='Home, Light & Construction')
	{return "hlc";}
	else if($cat_id=='Machinery, Hardware & Tools')
	{return "mht";}
	else if($cat_id=='Metallurgy, Chemicals, Rubber & Plastics')
	{return "mcrp";}
	else if($cat_id=='Packaging, Advertising & Office')
	{return "pao";}
	else if($cat_id=='Software, Computers & Accessories')
	{return "sca";}
	else if($cat_id=='Sports & Accessories')
	{return "sa";}
	else if($cat_id=='sff')
	{return "Stationery, Furniture & Fittings";}
	else return "null";
	 }
	 
	 
	function formatUrl_rev($value, $sep=' ')
    {
            $res = strtolower($value);
           // $res = preg_replace('/[^[:alnum:]]/', '-', $res);
            $res = preg_replace('/-/', $sep, $res);
            return trim($res, $sep);
    }
		 
	function formatUrl_true($value, $sep='-')
    {
            $res = strtolower($value);
           // $res = preg_replace('/[^[:alnum:]]/', '-', $res);
            $res = preg_replace('/ /', $sep, $res);
            return trim($res, $sep);
    }
	
	function shorten_product_name($string)
    {// $string = "This is a test script";
$string = ucwords(strtolower($string));
  if (strlen($string) >= 30)
    return substr($string, 0, 30). '...'; // This is a test...
  else
   return($string); // This is a test script
    }

function redirect($url)
{
	if(!headers_sent())
	  {
		header('location:https://'.$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']).'/'.$url);  
		exit;
	  }
	  else
	  {
		die('could not redirect ; header already sent (output).');
	  }
}

function shop_id_from_name($shopName)
{include "include/conxn.php";
 $query2 = "SELECT shop_id FROM shop WHERE shopName = '$shopName'   && mode = 1   
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['shop_id'];
return safe_input($view_count);
}
}

function product_id_from_name($productName)
{include "include/conxn.php";
 $query2 = "SELECT product_id FROM product WHERE name = '$productName'  && mode = 1   LIMIT 1
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['product_id'];
return safe_input($view_count);
}
}

function shop_id_from_porduct_id($product_id)
{include "include/conxn.php";
 $query2 = "SELECT shop_id FROM product WHERE product_id = '$product_id'  && mode >='1' LIMIT 1
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['shop_id'];
return safe_input($view_count);
}
}

function description_from_porduct_id($product_id)
{include "include/conxn.php";
 $query2 = "SELECT descrb FROM product WHERE product_id = '$product_id'  && mode >='1' LIMIT 1
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$descrb = $query_count['descrb'];
$shakem =  preg_replace('/[^A-Za-z0-9\_\@\.\-\,\ ]/ ', ',', $descrb);
return safe_input($shakem);
}
}
function image_loc_from_porduct_id($product_id)
{include "include/conxn.php";
 $query2 = "SELECT image_loc FROM product WHERE product_id = '$product_id'  && mode >='1' LIMIT 1
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$image_loc = '/img/products_images/mini/'.$query_count['image_loc'];
return safe_input($image_loc);
}
}

function price_from_porduct_id($product_id)
{include "include/conxn.php";
 $query2 = "SELECT price FROM product WHERE product_id = '$product_id'  && mode >='1' LIMIT 1
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$price =  $query_count['price'];
return $price;
}
}

function tag_from_porduct_id($product_id)
{include "include/conxn.php";
 $query2 = "SELECT manufacturer FROM product WHERE product_id = '$product_id'  && mode >='1' LIMIT 1
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$manufacturer =  $query_count['manufacturer'];
return $manufacturer;
}
}/*
function con_from_porduct_id($product_id)
{include "include/conxn.php";
 $query2 = "SELECT condition FROM product WHERE product_id = '$product_id'  && mode >='1' LIMIT 1
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$condition =  $query_count['condition'];
return $condition;
}
}*/
function datetime_from_porduct_id($product_id)
{include "include/conxn.php";
 $query2 = "SELECT datetime FROM product WHERE product_id = '$product_id'  && mode >='1' LIMIT 1
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$datetime = $query_count['datetime'];
return safe_input($datetime);
}
}

function friend_id_from_name($username)
{include "include/conxn.php";
 $query2 = "SELECT id FROM registration WHERE username = '$username'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['id'];
return safe_input($view_count);
}
}

function tags_from_id($friend_id)
{include "include/conxn.php";
 $query2 = "SELECT tags FROM tag_interest WHERE user_id = '$friend_id'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['tags'];
return $view_count;
}
}

function title_desc_from_id($friend_id)
{include "include/conxn.php";
 $query2 = "SELECT title FROM account_comment WHERE id = '$friend_id'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['title'];
return $view_count;
}
}

function comment_desc_from_id($reev_id)
{include "include/conxn.php";
 $query2 = "SELECT comment FROM account_comment WHERE id = '$reev_id'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['comment'];
return $view_count;
}
}

function name_from_id($id)
{include "include/conxn.php";
 $query2 = "SELECT username FROM registration WHERE id = '$id'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['username'];
return safe_input($view_count);
}
}
//full shop name
function  shopdetail($shop_id)
{include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$firstname  = safe_input($_SESSION['firstName']);
$email  = safe_input($_SESSION['email']);

$query = "SELECT * FROM `shop`WHERE `user_id` = '$main_user_id.' &&`shop_id` = '$shop_id' LIMIT 0 , 5";
		 
$query4user_info = mysqli_query($link,$query);
		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
		  $shopName = safe_input($allpalls_info['shopName']);
		  $telephone = safe_input($allpalls_info['telephone']);
		  $category = safe_input($allpalls_info['category']);
		  $shop_descrb = safe_input($allpalls_info['shop_descrb']);
		  $address = safe_input($allpalls_info['address']);
		  $country = safe_input($allpalls_info['country']);
		  $city = safe_input($allpalls_info['city']);
		  $region = safe_input($allpalls_info['state']);
		  $user_id = safe_input($allpalls_info['user_id']);
		  
		    if($main_user_id ==  $user_id)

				  {
				  echo  ' <div class="text-info well padding-5  " style="margin-bottom:5px;"  >
       <div class="text-primary pull-right " >' .$category .'
       </div> '.$shop_descrb.'
       </div>
       <div class="nav-pull-right  ">
       <div class="col-md-10 no-padding no-margin">
       <ul class="list-unstyled">
       <li>
       <p class= "text-muted no-padding no-margin">
       <i class="glyphicon glyphicon-phone-alt"></i>&nbsp;&nbsp;
       +233'. $telephone.'
       </p>
       </li><li>
       <p class= "text-muted no-padding no-margin">
       <i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;
        '. $address.'
        </p>
       </li><li>
      <p class= "text-muted no-padding no-margin">
       <i class="glyphicon glyphicon-map-marker"></i>&nbsp;&nbsp;
      '. $city.' , '.$region .'
        </p>
      </li><li>
       <p class= "text-muted no-padding no-margin">
      <i class="glyphicon glyphicon-flag"></i>&nbsp;&nbsp;
       '. $country.'';
	   }
		 }
		 }

 function  shopdetail_product($shop_id)
{ include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$firstname  = safe_input($_SESSION['firstName']);
$email  = safe_input($_SESSION['email']);
$query = "SELECT * FROM `shop`WHERE `user_id` = '$main_user_id.' && `shop_id` = '$shop_id' LIMIT 0 , 5 ";
$query4user_info = mysqli_query($link,$query);

		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
		  $shopName = safe_input($allpalls_info['shopName']);
		  $telephone = safe_input($allpalls_info['telephone']);
		  $category = safe_input($allpalls_info['category']);
	      $shop_descrb = safe_input($allpalls_info['shop_descrb']);
		  $address = safe_input($allpalls_info['address']);
		  $country = safe_input($allpalls_info['country']);
		  $city = safe_input($allpalls_info['city']);
		  $region = safe_input($allpalls_info['state']);	  
		  $user_id = safe_input($allpalls_info['user_id']);
		 	  
		    if($main_user_id ==  $user_id)
				  {
				  echo  '	  				  
		  <div class="text-primary pull-right small no-margin no-padding"  >' .$category .'
		  </div>
		<small> <div class=" no-padding no-margin well"> 
	   <div class="  no-margin ">
	  <div class="row no-padding no-margin">
	    <ul class="list-unstyled no-padding no-margin">
		   <li>
			   <span class= "text-muted">
					<i class="glyphicon glyphicon-phone-alt"></i>&nbsp;&nbsp;
					    +233'. $telephone.'
			   </span>
			</li><li>
			   <span class= "text-muted">
					<i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;
					 '. $address.'
			   </span>
			</li><li>
			   <span class= "text-muted">
					<i class="glyphicon glyphicon-map-marker"></i>&nbsp;&nbsp;
					 '. $city.' , '.$region .'
			   </span>
			</li><li>
			   <span class= "text-muted">
					<i class="glyphicon glyphicon-flag"></i>&nbsp;&nbsp;
					  '. $country.'</span></li>
	</ul>
</div>
	</div>
	</div></small>';
				  }
		 }
		 }
function verification_status($shop_id)
{	include "include/conxn.php";
	$query = "SELECT type FROM verify WHERE shop_id = '$shop_id' LIMIT 30  ";
	if($query_runNew = mysqli_query($link,$query))
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['type'];
		 
		 if( $v_code == 1)
		 { echo $verify_type = '<span class="text-success" style="font-size:0.5em;">Verified <i class="glyphicon glyphicon-ok"> </i></span>';}
		 else if( $v_code == 2)
		 {echo  $verify_type = '<span class="text-success" style="font-size:0.5em;">Verified <i class="glyphicon glyphicon-ok"> </i></span>';}
		 else if( $v_code == 3)
		 {echo  $verify_type = '<span class="text-success" style="font-size:0.5em;">Verified <i class="glyphicon glyphicon-ok"> </i></span>';}
		 else if( $v_code == 0)
		 {echo  $verify_type = '';}
		}
	}
	else 
		 {echo  $verify_type = '';}
		 
		
}

 function  shopdetailnogetother($shop_id)
{include "include/conxn.php";
//$main_user_id   = safe_input($_SESSION['id']);
$query = "SELECT * FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 5 ";	 
$query4user_info = mysqli_query($link,$query);
		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
		  $user_id = safe_input($allpalls_info['user_id']);
		  $shopName = safe_input($allpalls_info['shopName']);
		  $telephone = safe_input($allpalls_info['telephone']);
		  $shop_descrb = safe_input($allpalls_info['shop_descrb']);
		  $address = safe_input($allpalls_info['address']);
		  $country = safe_input($allpalls_info['country']);
		  $city = safe_input($allpalls_info['city']);
		  $region = safe_input($allpalls_info['state']);
		  $category = $allpalls_info['category'];
		  
		 $query = "SELECT * FROM `registration` WHERE `id` = '$user_id' LIMIT 0 , 5 ";
$query4user_info = mysqli_query($link,$query);
		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 { 
		  $firstname  = safe_input($allpalls_info['firstName']);

		  if(!empty($user_id))
          {
		  echo  	 ' 
         
			<h1>',$shopName,' ',verification_status($shop_id).'
			<div class="" style="padding-top:10px;">
			 <ul id="sparks" class="pull-right no-padding">
			<li class="sparks-info no-padding">
				<h5> subscribers <span class="txt-color-black"><i class="fa fa-rss" data-rel="bootstrap-tooltip" title="Increased"></i> ', get_subscribers_no($shop_id),'</span></h5>
				<div class="sparkline txt-color-black hidden-mobile hidden-md hidden-sm"><canvas height="26" width="69" style="display: inline-block; width: 69px; height: 26px; vertical-align: top;"></canvas></div>
			</li>
			
		<li class="sparks-info ">
				<h5> visitors <span class="txt-color-black"><i class="fa fa-location"></i> ',get_shop_views_for_upadting($shop_id),'</span></h5>
				<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"><canvas height="26" width="69" style="display: inline-block; width: 69px; height: 26px; vertical-align: top;"></canvas></div>
			</li>
			
		
		</ul><span class=" text-primary " style="font-size:0.9em;" ><a href="/business-category/'.cat_name_trans($category).'">' .$category .' </a>
		  </span></div>					
			</h1>
';
				  }
		     }
		 }
	  }
	  
	  
	  function shopcategory($shop_id)
{
include "include/conxn.php";
//$main_user_id  = $_SESSION['id'];
$query1 = "SELECT * FROM shop WHERE shop_id  = '$shop_id' LIMIT 1"; 
$query4user_info1 = mysqli_query($link,$query1);
while($allpalls_info = mysqli_fetch_array($query4user_info1,MYSQLI_ASSOC))
{
$category = $allpalls_info['category'];
$user_id = safe_input($allpalls_info['user_id']);

echo  '<span class="text-default" style="font-size:1.0em; " ><a href="/business-category/'.cat_name_trans($category).'" style="color:black;">' .$category .' </a></span>';
}
}
function verification_icon($shop_id)
{	include "include/conxn.php";
	$query = "SELECT type FROM verify WHERE shop_id = '$shop_id' LIMIT 1  ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['type'];
		 
		 if( $v_code == 1)
		 { echo $verify_type = '<span> <img src="/img/site_img/approved.png" style="height:22px; margin-top:-5px;"  alt="approved" title="approved"/> </span>';}
		 else if( $v_code == 2)
		 {echo  $verify_type = '<span> <img src="/img/site_img/approved.png" style="height:20px; margin-top:-5px;"  alt="approved" title="approved"/>';}
		 else if( $v_code == 3)
		 {echo  $verify_type = '<span> <img src="/img/site_img/approved.png" style="height:20px; margin-top:-5px;"  alt="approved" title="approved"/>';}
		 else if( $v_code == 0)
		 {echo  $verify_type = '<span> <img src="/img/site_img/pending.png" style="height:20px; margin-top:-5px;"  alt="pending" title="pending"/>';}
		 else 
		 {
		 echo '<span> <img src="/img/site_img/cancelled.png" style="height:20px; margin-top:-5px;" alt="cancel" title="cancel"/>';
		 }
		}
	}
	else 
		 {
		  echo ' <span  data-target="#verify_modal" data-toggle="modal" class="text-danger" style="font-size:0.5em;"> not verified!</span>';
		 }
		 
}	  
	 function shopName($shop_id)
{include "include/conxn.php";
$query = "SELECT DISTINCT shopName FROM shop WHERE shop_id = '$shop_id'     
";
$query_data = mysqli_query($link,$query);
if($query_count = mysqli_fetch_assoc($query_data))
{
$view_count = $query_count['shopName'];
echo $view_count;
}
}
	 
	 function  shopdetail_info($shop_id)
{include "include/conxn.php";
//$main_user_id   = safe_input($_SESSION['id']);
$query = "SELECT * FROM `shop` WHERE `shop_id` = '$shop_id'  ";	 
$query4user_info = mysqli_query($link,$query);
		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
		  $shopName = formatUrl_true($allpalls_info['shopName']);
$countryCode = safe_input($allpalls_info['countryCode']);
$telephone = safe_input($allpalls_info['telephone']);
$email = safe_input($allpalls_info['email']);
$shop_descrb = safe_input($allpalls_info['shop_descrb']);
$address = safe_input($allpalls_info['address']);
$country = safe_input($allpalls_info['country']);
$city = safe_input($allpalls_info['city']);
$region = safe_input($allpalls_info['state']);
$user_id = safe_input($allpalls_info['user_id']);
$bus_type = safe_input($allpalls_info['bus_type']);
$category = safe_input($allpalls_info['category']);
$business_url = safe_input($allpalls_info['business_url']);
$core_products = safe_input($allpalls_info['core_products']);

		  
		 $query = "SELECT * FROM `registration` WHERE `id` = '$user_id' ";
$query4user_info = mysqli_query($link,$query);
		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 { 
		  $firstname  = safe_input($allpalls_info['firstName']);

		 if(isset($_SESSION['id']) )
{
		  echo   ' 
<h4>ABOUT <hr></h4>
<ul> 
<i class="glyphicon glyphicon-briefcase"></i>  Business Type
 <p class="text-muted">'.$bus_type.'</p>

<i class="glyphicon glyphicon-th-large"></i> Business Category
 <p class="text-muted">'.$category.'</p>

<i class="glyphicon glyphicon-book"></i> Description
 <p class="text-muted"> '.$shop_descrb.'</p>
</ul>

<h4>LOCATION <hr></h4>
<ul> 
<i class="glyphicon glyphicon-flag"></i> Country
 <p class="text-muted"> '.$country.'</p>

<i class="glyphicon glyphicon-map-marker"></i> Region or State
 <p class="text-muted"> '.$region.'</p>

<i class="glyphicon glyphicon-tower"></i> City
 <p class="text-muted"> '.$city.'</p>

<i class="glyphicon glyphicon-home"></i> Address
 <p class="text-muted"> '.$address.'</p>
</ul>

<h4>CONTACT INFO<hr ></h4>
<ul> 
<i class="glyphicon glyphicon-phone-alt"></i> Telephone Number
 <p class="text-muted"> '.$telephone.'</p>

<i class="glyphicon glyphicon-link"></i>  Mykanta URL 
 <p class="text-muted"><a href="/business/'.$shopName.'">mykanta.com/business/'.$shopName.'</a></p>

<i class="glyphicon glyphicon-globe"></i> URL
 <p class="text-muted"> '.$business_url.'</p>
</ul>

<h4>OTHERS<hr ></h4>
<ul> 
<i class="glyphicon glyphicon-th"></i> Core Products
 <p class="text-muted"> '.$core_products.'</p>

</ul>';
				  }
				  
				  if(!empty($user_id))
          {
		  echo   ' 
<h4>ABOUT <hr></h4>
<ul> 
<i class="glyphicon glyphicon-briefcase"></i>  Business Type
 <p class="text-muted">'.$bus_type.'</p>

<i class="glyphicon glyphicon-th-large"></i> Business Category
 <p class="text-muted">'.$category.'</p>

<i class="glyphicon glyphicon-book"></i> Description
 <p class="text-muted"> '.$shop_descrb.'</p>
</ul>

<h4>LOCATION <hr></h4>
<ul> 
<i class="glyphicon glyphicon-flag"></i> Country
 <p class="text-muted"> '.$country.'</p>

<i class="glyphicon glyphicon-map-marker"></i> Region or State
 <p class="text-muted"> '.$region.'</p>

<i class="glyphicon glyphicon-tower"></i> City
 <p class="text-muted"> '.$city.'</p>

<i class="glyphicon glyphicon-home"></i> Address
 <p class="text-muted"> '.$address.'</p>
</ul>

<h4>CONTACT INFO<hr ></h4>
<ul> 
<i class="glyphicon glyphicon-phone-alt"></i> Telephone Number
 <p class="text-muted"> Login to view Phone number</p>

<i class="glyphicon glyphicon-link"></i>  Mykanta URL 
 <p class="text-muted"><a href="/business/'.$shopName.'">www.mykanta.com/business/'.$shopName.'</a></p>

<i class="glyphicon glyphicon-globe"></i> URL
 <p class="text-muted"> '.$business_url.'</p>
</ul>

<h4>OTHERS<hr ></h4>
<ul> 
<i class="glyphicon glyphicon-th"></i> Core Products
 <p class="text-muted"> '.$core_products.'</p>

</ul>';
				  }
		     }
		 }
	  }
	  
function  shopdetailnogetother_product($shop_id)
{include "include/conxn.php";

$query = "SELECT * FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 5";
$query4user_info = mysqli_query($link,$query);
 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
		  $user_id = safe_input($allpalls_info['user_id']);
		  $shopName = safe_input($allpalls_info['shopName']);
		  $clean_name = formatUrl($shopName); 
		  $telephone = safe_input($allpalls_info['telephone']);
		  $shop_descrb = safe_input($allpalls_info['shop_descrb']);
		  $address = safe_input($allpalls_info['address']);
		  $country = safe_input($allpalls_info['country']);
		  $city = safe_input($allpalls_info['city']);
		  $region = safe_input($allpalls_info['state']);
		  $category = $allpalls_info['category'];
		  
		 $query = "SELECT * FROM `registration` WHERE `id` = '$user_id' LIMIT 0 , 5 ";	 
          $query4user_info = mysqli_query($link,$query);
          while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
          $firstname  = safe_input($allpalls_info['firstName']);

		    if(!empty( $user_id))
				  {
				  echo  	 ' 
 <div class="col-sm-12 col-md-12 col-lg-12 no-padding" >
	<h1><a href="/business/'.$clean_name.'">'.$shopName.'  </a>',verification_status($shop_id).'
		<div class="" style="padding-right:7px;"><span class=" small text-primary">',get_shop_views_for_upadting($shop_id),' Views 
			</span><small class="text-warning  " ><a href="/business-category/'.cat_name_trans($category).'">' .$category .' </a>
		  </small></div>					
			</h1>
	
<!--	<small> <div class=" no-padding no-margin well"> 
	 <div class="  no-margin ">
	 <div class="row no-padding no-margin">
	  <ul class="list-unstyled no-padding no-margin">
     <li>
     <span class= "text-muted">
	 <i class="glyphicon glyphicon-phone-alt"></i>&nbsp;&nbsp;
					    +233'. $telephone.'
			   </span>
			</li><li>
			   <span class= "text-muted">
					<i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;
					 '. $address.'
			   </span>
			</li><li>
			   <span class= "text-muted">
					<i class="glyphicon glyphicon-map-marker"></i>&nbsp;&nbsp;
					 '. $city.' , '.$region .'
			   </span>
			</li><li>
			   <span class= "text-muted">
					<i class="glyphicon glyphicon-flag"></i>&nbsp;&nbsp;
					  '. $country.'</span></li>
	</ul>
</div>
	</div>
	</div></small> -->
</div>
';
				  }

		     }

		 }

	  }



function like_button($shop_id)
	  { include "include/conxn.php";
	  /* $user_id = safe_input($_SESSION['id']);
       $shop_id = safe_input($_GET['shop_id']);

	  $query = " SELECT user_id FROM likes WHERE shop_id = '$user_id' && user_id = '$shop_id' ";

	$query4profilepic = mysqli_query($link,$query);	 */
    echo '
	   <div class="well btn btn-default pull-right padding-5 text-primary" style="margin-top:-40px; margin-right:10px;" id="unlike_btn" type="submit"><i class="glyphicon glyphicon-thumbs-up"></i> Unlike Shop</div>	';
		
	  }
	  /*
 function like_button_product($product_id)
 { include "include/conxn.php";

	   $user_id = safe_input($_SESSION['id']);
       $product_id = safe_input($_GET['product_id']);

	  $query = " SELECT product_id FROM likes_products WHERE user_id = '$product_id' && product_id = '$user_id' ";

	$query4profilepic = mysqli_query($link,$query);	

	if(mysqli_num_rows($query4profilepic)>=1)
	{	    echo '
	    <div id="like_product_cover" style="margin-right:10px; margin-bottom:-10px;"><button id="unlike_btn_product" type="button" class= "btn btn-primary btn-xs pull-right padding-right-10 " ><i class="glyphicon glyphicon-thumbs-up"></i> Unlike</button>	</div>';
	}	
else {
	   echo '
	   <div id="like_product_cover"style="margin-right:10px; margin-bottom:-10px;"><button id="like_btn_product" type="button" class= "btn btn-primary btn-xs pull-right padding-right-10 " ><i class="glyphicon glyphicon-thumbs-up"></i> Like</button></div>	';
	  }
	  }
	*/ 
function  get_shopnames($user_id)
{  include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT shopName,shop_id
        FROM `shop`
         WHERE `user_id` = '$main_user_id'
         LIMIT 0 , 10
         ";	 
$query4user_info = mysqli_query($link,$query);
$num_shop = mysqli_num_rows($query4user_info);
$_SESSION['num_shop'] = $num_shop;
////query_confirm($query4user_info);
		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
		  $shopNames = safe_input($allpalls_info['shopName']);
		     $shop_id  = safe_input($allpalls_info['shop_id']);	
     		    if($main_user_id ==  $user_id)
				  {
				   echo   '<li ><a href="shopaccount.php?shopName='.$shopNames.'">'.$shopNames.'</a></li>';
				  }
				  else{
                  echo "no shop created";
				  }
		 }
		 }
		 
function  get_shopname($shop_id)
{  include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT shopName FROM `shop`  WHERE `shop_id` = '$shop_id' LIMIT 0 , 1 "; 

$query4user_info = mysqli_query($link,$query);
$num_shop = mysqli_num_rows($query4user_info);

		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
		  $shopNames = safe_input($allpalls_info['shopName']);
		  if(!empty($shop_id))
				  {
				   echo   '<a href="shopaccount.php?shopName='.$shopNames.'">'.$shopNames.'  </a>';
				  }
				  else{
				  echo "no shop created";
				  }
		 }
		 }

 function  get_subscribe_names($shop_id)
{ include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT user_id FROM `subscribers` WHERE `shop_id` = '$shop_id' LIMIT  10 ";		 

if($query_add = mysqli_query($link,$query))
	{
	while($allpalls_info = mysqli_fetch_array($query_add,MYSQLI_ASSOC))
		 {
		  $sub_user_id = safe_input($allpalls_info['user_id']);  
		$query = "SELECT * FROM `registration` WHERE `id` = '$sub_user_id' ";
		
         $query4user_info = mysqli_query($link,$query);
         while($user_auth_info = mysqli_fetch_assoc($query4user_info))
		 {
		      $firstName = safe_input($user_auth_info['firstName']); 
	          $username =   safe_input($user_auth_info['username']); 
			  $friend_id =   safe_input($user_auth_info['id']); 
			  
		$query = "SELECT image_loc FROM profile_pic WHERE account_id =  $friend_id ";

	     $query4profilepic = mysqli_query($link,$query);	
        if(mysqli_num_rows($query4profilepic)==1)
        {
        while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
        {   
          $profile_image = safe_input($profile_pic['image_loc']);
          echo' <li class="well" style=" padding:5px; ">
		   <div class="col-md-2" >
              <img src="/'. $profile_image.'" class="img-rounded"  style="height:20px  ;width:20px;" title="'.$username.'" alt="'.$username.'" />
			  </div>
			   <div class="col-md-10 " style="  ">
                <a href="/connection-auth/'.$username.'" class="" >'.$firstName.' </a>
           </div>
      </li>
';  }
		 }
		   else{
				  echo "no subscribers";
				  }
		 }
		 }
		 }
		}

function  get_friendshopnames($friend_id)
{ include "include/conxn.php";
$main_user_id  =safe_input($_SESSION['id']);
$query = "SELECT * FROM `shop` WHERE `user_id` = '$friend_id' LIMIT 0 , 5 ";

$query4user_info = mysqli_query($link,$query);

		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
		  $shopNames = safe_input($allpalls_info['shopName']);
		  $shop_id  = safe_input($allpalls_info['shop_id']);
      if($main_user_id !=  $friend_id )
				  {
$query = " SELECT image_loc FROM banner_pic WHERE shop_id = $shop_id ";
	$querybannerpic = mysqli_query($link,$query);	

	if(mysqli_num_rows($querybannerpic)==1)
	{
			while($banner_pic  = mysqli_fetch_array($querybannerpic,MYSQLI_ASSOC))
			{   
				  $banner_image = safe_input($banner_pic['image_loc']);
				echo ' 
				<div class="item active " title="change" align="center"  >
				<img src="/'. $banner_image.'" title="change" alt="change"class="img img-thumbnail"style= "height:120px; width:100%">
	<div class="pull-left ">
	 <strong ><a style="padding-left:10px;" href="/shopaccountother.php?shopName='.$shopNames.'">'.$shopNames.'</a></strong>
	 </div>		
								</div>
					<br>
					<br>
';}}else{
	     $banner_image = "img/banners/banner-small.png";
	echo ' 
						<div class="item active " title="change" align="center">
								<img src="/'. $banner_image.'" title="Banner Pic" alt="Banner Pic"class="img img-thumbnail"style= "height:180px; width:100%">
							<div class="pull-left ">
                            <strong ><a style="padding-left:10px;" href="shopprocess.php?shopName='.$shopNames.'">'.$shopNames.'</a></strong>
                                         </div>		
								</div>
					<br>
					<br>
';
	}
				  }
				  else{
				  echo "no shop created";
				  }
		 }
		 }

 function  get_shop_no($user_id)
{ include "include/conxn.php"; 
$user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(shop_id) FROM shop WHERE user_id ='$user_id'";

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$shop_count = $query_count[0];

echo ' <span class="badge inbox-badge" >'.$shop_count.'</span></a>  ';
}

function time_on($user_id)
{
$datetime =  date('l jS \of F Y H:i:s A');
				echo	   $datetime;
}

 function  get_friendnames_no($user_id)
{ include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='1' OR friend_id='$user_id' AND value='1'";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

echo ' <span class="badge inbox-badge" >'.$friend_count.'</span></a>  ';
} 

function  get_friendnames_no_of_friends($friend_id)
{include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$friend_id' AND value='1' OR friend_id='$friend_id' AND value='1'";	 

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];
echo $friend_count;

}

function  get_friendnames($user_id)
{include "include/conxn.php";  

$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='1' OR friend_id='$user_id' AND value='1'";		 

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

if($friend_count < 1){
$friendsHTML = $user_id." has no friends yet";
	}
	else
	{ 
	include "include/conxn.php";  	
	    $max =10;
         $all_friends = array();
		 $sql = "SELECT account_id FROM friends WHERE friend_id='$user_id' AND value='1' ORDER BY id LIMIT $max";
		 $query = mysqli_query($link,$sql);

         while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
		 {
		 $new =  safe_input($row["account_id"]);
         array_push($all_friends,$new);
         }
		 $sql = "SELECT friend_id FROM friends WHERE account_id='$user_id' AND value='1' ORDER BY id LIMIT $max";
         $query = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		 {
		 $new = safe_input($row["friend_id"]);
         array_push($all_friends,$new );
         }

		 $friendArrayCount = count($all_friends);
         if($friendArrayCount > $max)
		 { 
         array_splice($all_friends, $max);
         }
		 if($friend_count > $max)
		 {
         $friends_view_all_link = '<a href="view_friends.php?user_id='.$user_id.'">view all</a>';
         }
         $orLogic = '';
         foreach($all_friends as $key => $user){
         $orLogic .= "id='$user' OR ";
         }
         $orLogic = chop($orLogic, "OR ");
         $sql = "SELECT * FROM registration WHERE $orLogic";
         $query = mysqli_query($link,$sql);
         while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
         $friend_username = safe_input($row["username"]);
         $firstname = safe_input($row["firstName"]);
         $friend_id = safe_input($row["id"]);
         $username = safe_input($row["username"]);

$query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";

	$query4profilepic = mysqli_query($link,$query2);	
    if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
     {   
      $friend_pic = safe_input($profile_pic['image_loc']);
echo '<a href="accountfriendpage.php?friend_id='.$friend_id.'&username='.$username.'"><img  src="/'.$friend_pic.'"alt="'.$friend_username.'" class="img-rounded" width="20px; height="20px;" title="'.$friend_username.'"> '.$firstname .' </a>';
}
else
{
$friend_pic = safe_input('images/piclist.jpg'); 
echo '<a href="accountfriendpage.php?friend_id='.$friend_id.'&username='.$username.'"><img  src="/'.$friend_pic.'"alt="'.$friend_username.'" title="'.$friend_username.'" width="20px;> '.$firstname .' </a>';
}
}		 
}
}

function  get_friendnames_of_friends($friend_id)
{include"include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$friend_id' AND value='1' OR friend_id='$friend_id' AND value='1'";	 

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

if($friend_count < 1){
$friendsHTML = $friend_id." has no friends yet";
	}
	else
	{  
	    $max = 10;
         $all_friends = array();
		 $sql = "SELECT account_id FROM friends WHERE friend_id='$friend_id' AND value='1' ORDER BY RAND() LIMIT $max";
		 $query = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
		 {
         array_push($all_friends, $row["account_id"]);
         }
		 $sql = "SELECT friend_id FROM friends WHERE account_id='$friend_id' AND value='1' ORDER BY RAND() LIMIT $max";
         $query = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
         array_push($all_friends, safe_input($row["friend_id"]));
         }
		 $friendArrayCount = count($all_friends);
         if($friendArrayCount > $max)
		 { 
         array_splice($all_friends, $max);
         }
		 if($friend_count > $max)
		 {
         $friends_view_all_link = '<a href="view_friends.php?friend_id='.$user_id.'">view all</a>';
         }
         $orLogic = '';
         foreach($all_friends as $key => $user){
         $orLogic .= "id='$user' OR ";
         }
         $orLogic = chop($orLogic, "OR ");
         $sql = "SELECT * FROM registration WHERE $orLogic";
         $query = mysqli_query($link,$sql);
         while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $friend_username = safe_input($row["username"]);
            $firstname = safe_input($row["firstName"]);
			$friend_id = safe_input($row["id"]);
			$username = safe_input($row["username"]);
			
			$query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id";

	$query4profilepic = mysqli_query($link,$query2);	

	if(mysqli_num_rows($query4profilepic)==1)
	{
			while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
			{   
		$friend_pic = safe_input($profile_pic['image_loc']);
echo '<a href="fp.php?friend_id='.$friend_id.'&username='.$username.'" class=""><p><img  src="/'.$friend_pic.'"alt="'.$friend_username.'" class="img-rounded" width="20px;" title="'.$friend_username.'"> '.$firstname .' </p> </a>';
}
}
else
{
$friend_pic = safe_input('images/piclist.jpg'); 
echo '<a href="fp.php?friend_id='.$friend_id.'&username='.$username.'"><img  src="/'.$friend_pic.'"alt="'.$friend_username.'" title="'.$friend_username.'"> '.$firstname .' </a>';
}
}		 
}
}	 

function  shop_updates($user_id)
{include "include/conxn.php";
$query = " SELECT shop_id FROM shop WHERE user_id= '$user_id' ";
 $queryinfou = mysqli_query($link,$query);
 if($queryresult = mysqli_num_rows($queryinfou))
 {
   while( $querydone = mysqli_fetch_array($queryinfo,MYSQLI_ASSOC))
   {
   $shop_id = safe_input($querydone['shop_id']);
   
$query = "SELECT * 
 (SELECT account_id FROM shop_comment WHERE shop_id= '$shop_id' AND account_id != '$user_id') AND
 (SELECT COUNT(id) FROM likes WHERE user_id = $shop_id)
 ORDER BY datetime";
 
 $queryinfo = mysqli_query($link,$query);
 if ($queryresult = mysqli_num_rows($queryinfo))
 {
   while( $querydone = mysqli_fetch_array($queryinfo,MYSQLI_ASSOC))
   {
   echo  $likes_no = $querydone[0];
 echo  $shop_commen_names = safe_input($querydone['account_id']);
   }
 }
 }
}
else
{
echo "didnt work";
}
}

function  get_friendrequestnames($user_id)
{include "include/conxn.php";
$user_id  = safe_input($_SESSION['id']);
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT account_id FROM `friends` WHERE `friend_id` = '$main_user_id' and value = 0 LIMIT 0 , 5";

$query4user_info = mysqli_query($link,$query);

		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
		   $friend_id  = safe_input($allpalls_info['account_id']);
		   $friends_able_id = safe_input($allpalls_i['id']);

	           $query1 = "SELECT * FROM `registration` WHERE `id` = '$friend_id' ";
               $query4user1 = mysqli_query($link,$query1);
               while($allpalls_i = mysqli_fetch_array($query4user1,MYSQLI_ASSOC))
		         {
		             $firstName  = safe_input($allpalls_i['firstName']);
					  
		     if($main_user_id ==  $user_id)
				  {
				echo   '<div class="" style="height:22px; background-color:white; border:1px #CCC solid; padding:5px">
				<a href="fp.php?friend_id='.$friend_id.'">'.$firstName.' </a>
						<div class="btn btn-xs pull-right style=" background-color:green;">
							<i class="fa fa-link"></i>
							Refuse
							</button>
							<a href="acceptprocess.php?activate_friend='.$friends_able_id.'" >		
							<i class="fa fa-check"></i>
							Accept		
							</a>
							</br></div>';
				  }
}				  
		}
		 }
		 
function user_status($friend_id)
{include "include/conxn.php";
               $query2 = "SELECT status_value FROM status where user_id = '$friend_id' and status_seen_by_others='1'";
			   $query4user = mysqli_query($link,$query2);
               if(mysqli_num_rows($query4user)>=1)
                {
                while($user_auth_info = mysqli_fetch_array($query4user,MYSQLI_ASSOC))
                  {
			             $value = safe_input($user_auth_info['status_value']);
						 if ($value == 1)
						 {
						  echo '<small><span class="text-success"> Online</span></small>';
						 }
						 if ($value == 2)
						 {
						  echo '<small><span class="text-warning"> Busy</span></small>';
						 }
                  }
                  }
				  else
				  {
				     echo ' <small><span class="text-danger"> Offline </span></small>';
				  }
}
function  frienddetailsnoget($friend_id)
{include "include/conxn.php";

$query = "SELECT * FROM `registration` WHERE `id` = '$friend_id' LIMIT 0 , 5 ";		 
$query4user_info = mysqli_query($link,$query);

while($user_auth_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$firstname = safe_input($user_auth_info['firstName']); 
$email = safe_input($user_auth_info['email']);
$telephone = safe_input($user_auth_info['telephone']); 
$user_name =   safe_input($user_auth_info['username']); 
$city =   safe_input($user_auth_info['city']); 
$country =   safe_input($user_auth_info['country']);
$countryCode = safe_input($user_auth_info['countryCode']); 
$friendid =   safe_input($user_auth_info['id']); 

if(!empty($friend_id))
{
echo  
'<h2>'.$user_name.'</h2>';
}
}
}
function  get_shopdescrb($user_id)
{
$shopdes  = safe_input($_SESSION['shop_id']);

$query = "SELECT * FROM `shopDes` WHERE `shop_id` = '$shopdes' LIMIT 0 , 5 ";	 
$query4user_info = mysqli_query($link,$query);

		 while($allpalls_info = mysqli_fetch_array($query4user_info))
		 {
		  $describeText = safe_input($allpalls_info['describeText']);
		   echo $describeText;	  
		 }
		} 

function  get_friendnames_no_badge($user_id)
{ include "include/conxn.php";
//$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='1' OR friend_id='$user_id' AND value='1'";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

echo $friend_count;
} 
function  get_friendnames_no_connected($user_id)
{ include "include/conxn.php";
//$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE friend_id ='$user_id' AND value='0'";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

echo $friend_count;
} 
function  get_friendnames_no_connectors($user_id)
{ include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='0'";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

echo $friend_count;
}
function no_of_reevs($id)
{ include "include/conxn.php";

	$query = "SELECT COUNT(id) FROM account_comment WHERE owner_id ='$id' AND account_id ='$id' AND image_loc !='NULL' ";
            $query4user_info = mysqli_query($link,$query);
            $query_count = mysqli_fetch_row($query4user_info);
        echo    $reev_number = $query_count[0];
}
function get_profile_pic($user )
{
include "include/conxn.php";
//$user_id = $_SESSION['id'];
$query = "SELECT image_loc,gif_as_pic FROM profile_pic WHERE account_id = '$user' ";
$query4profi  = mysqli_query($link,$query);	
if($query4profilepic = mysqli_num_rows($query4profi) > 0)
	{
while($profile_pic  = mysqli_fetch_assoc($query4profi))
{   
$profile_image = safe_input($profile_pic['image_loc']);
$gif_as_pic = safe_input($profile_pic['gif_as_pic']);

if($gif_as_pic =="" OR  $gif_as_pic == "NULL" )
{ 
echo'<img src="/img/avatars/'. $profile_image.'" class="img-thumbnail img-circle" style="max-height:120px;" />';
}
else{
echo'<img src="/img/comments_images/'. $gif_as_pic.'.gif" class="img-thumbnail img-circle" style="max-height:120px;" />';
}			 
}
}
else{
$profile_image = "/img/avatars/image1.jpg";

echo'<img src="/'. $profile_image.'" class="img-thumbnail" style="max-height:120px;"title="user" alt="user"/>';
}
}

function get_profile_pic_friend($friend_id)
{include "include/conxn.php";
$query = " SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";

$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);
echo'<img src="/img/avatars/'. $profile_image.'" class=" img-thumbnail img-circle" width="70px;" height="auto;"title="user" alt="user"/>';			 
}
}
else
{
  $profile_image = "/img/avatars/image1.jpg";
  echo'<img src="/'. $profile_image.'" class=" img-thumbnail  img-circle" width="70px;" height="auto;"title="user" alt="user"/>';
}
}
function pic_on_friend_page($user_id)
{include "include/conxn.php";
$query = " SELECT image_loc FROM profile_pic WHERE account_id = $user_id";
$query4profilepic = mysqli_query($link,$query);	
if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
  {   
    $profile_image = safe_input($profile_pic['image_loc']);
	 echo'<img src="/'. $profile_image.'" class="img-rounded" width="30px;" title="user" alt="user"/>';			 
  }
  else
  {
    $profile_image = "img/avatars/image1.jpg";
	echo'<img src="/'. $profile_image.'" class="img-rounded" width="30px;" title="user" alt="user"/>';
  }
}

function get_banner_pic($shop_id)
{include "include/conxn.php";
$query = " SELECT image_loc FROM banner_pic WHERE shop_id = '$shop_id' ";
$querybannerpic = mysqli_query($link,$query);	
	if($querybannc = mysqli_num_rows($querybannerpic) >0 )	
    {
	while($banner_pic  = mysqli_fetch_assoc($querybannerpic))
			{   
			$banner_image = safe_input($banner_pic['image_loc']);		
			  echo'<img src="/'. $banner_image.'" alt="Banner" class="img" style= "height:auto; width:100%">';	
	}
	}else{
	     $banner_image = "img/banners/banner.png";
	    echo'<img src="/'. $banner_image.'" title="Banner" alt="Banner" style= "height:auto; width:100%">';	
	}
}

function get_subscribers_no($shop_id)
{include "include/conxn.php";
$query = "SELECT COUNT(id) FROM subscribers WHERE shop_id = '$shop_id'";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];
echo $view_count;
}

function get_verify($shop_id)
{include "include/conxn.php";
$query = "SELECT type FROM verify WHERE shop_id = $shop_id";

	$queryver = mysqli_query($link,$query);	


	if(mysqli_num_rows($queryver) > 0)

	{
     while($verify_no  = mysqli_fetch_array($queryver,MYSQLI_ASSOC))
	{   
	  $verify_no = safe_input($verify_no['type']);
	  if( $verify_no == 1)
	  {
	     echo '<li>Premium </li><li> Account</li>';
	  }
	  if( $verify_no == 2)
	  {
	     echo '<a href="#"class="text-info">Verified Account</a>';
	  }

	  if( $verify_no == 0)

	  {
	     echo '<button id="disabled" class="btn btn-success btn-sm pull-right hidden-xs hidden-sm "  >Pending</button>';
	  }
	}
    }
	else
	{
          echo '<span  data-target="#verify" data-toggle="modal">
<button class="btn btn-success btn-sm pull-right hidden-xs hidden-sm "  ><i class="glyphicon glyphicon-ok"></i> Verify</button></span>';
  }
}

function  get_shop_showcase()
{ include "include/conxn.php";
$query = "SELECT shop_id FROM shop  WHERE mode >= '1' ORDER BY RAND() LIMIT 0 , 4";

$advert_query = mysqli_query($link,$query);

if($advert_query2  = mysqli_num_rows($advert_query))
{   echo '<ul class="padding-10 no-margin list-inline" style="list-style:none; font-size:0.8em;">
';
while($advert_query2  = mysqli_fetch_array($advert_query,MYSQLI_ASSOC))
{  
$shop_id = safe_input($advert_query2['shop_id']);

$queryA = "SELECT shopName,shop_descrb FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 4 ";
$query4user_info = mysqli_query($link,$queryA);
if($queryAi  = mysqli_num_rows($query4user_info))
{

while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{

$string = $allpalls_info['shopName'];
$shopName = substr($string, 0, 25). '.';
$shopName1 = formatUrl($string);
$string_descrb = $allpalls_info['shop_descrb']; 
$shop_descrb = substr($string_descrb, 0, 58). '...';

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

if($banner_image == "/img/banners/mini/banner.png")
{
echo'<li class="padding-5" style="width:190px; height:120px;">
<div class="padding-bottom-10 " title="'.$shopName.'"  style= "">
	<img src="'.$banner_image.'" class="img" style= "height:auto; width:160px;" title="'.$shopName.'" alt="'.$shopName.'"/>
		   
			<div class="thumbnail_legend" style="margin-top:10px;">
				<h3 class="desktop  hidden-xs hidden-md hidden-sm banner_text text-center "> '.ucwords($string).'</h3>
				<h3 class="laptop hidden-sm hidden-lg hidden-xs banner_text text-center "> '.ucwords($string).'</h3>
				<h3 class="tablet hidden-md hidden-lg hidden-xs banner_text text-center "> '.ucwords($string).'</h3>
				<h3 class="yam hidden-lg hidden-md hidden-sm banner_text text-center "> '.ucwords($string).'</h3>
			</div>	
		</div> 
		
<div class="row" style="height:30px; width:195px">
<div class="col-md-12" >
<strong> <a  href="/business/'.$shopName1.'" class=" no-padding text-warning">'.$shopName.'</a> </strong>
<span style="font-size:1.0em;"><p class="text-primary">',$shop_descrb,'</p></span>
</div> 
</div> 
</li>
';
}
else{
echo'<li class=" padding-5" style= "height:120px; width:190px;">
<div class="padding-bottom-10 " title="'.$shopName.'" style= " width:190px; ">
		  <img src="/'.$banner_image.'"  class="img " style= "height:auto; width:160;" title="'.$shopName.'" alt="'.$shopName.'">
		 </div> 
		
<div class="row" style="margin-top:-10px; width:195px; height:30px;">
<div class="col-md-12">
<strong> <a href="/business/'.$shopName1.'" class="no-padding text-warning">'.$shopName.'</a> </strong> 
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
echo '</ul>';
}
}

function get_products_no($shop_id)
{include "include/conxn.php";

$query = "SELECT COUNT(product_id) FROM product WHERE shop_id = '$shop_id' AND mode >= '1'";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];
echo $view_count;
}

function get_shop_likes($shop_id)
{include "include/conxn.php";
 $query = "SELECT COUNT(id) FROM likes WHERE user_id = $shop_id     
";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];
	echo $view_count;
}

function get_product_likes($product_id)
{include "include/conxn.php";
 $query = "SELECT COUNT(id) FROM likes_products WHERE user_id = $product_id     
";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];
	echo $view_count;
}

function get_shop_views($shop_id)
{include "include/conxn.php";

   
	 $query = "SELECT COUNT(viewer_id) FROM views WHERE shop_id = $shop_id";

$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];

echo $view_count;
}


function get_status_name($account_id)
{include "include/conxn.php";
$query = "SELECT * FROM registration where id = $account_id  LIMIT 1 ";

if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{
$firstName = safe_input($details['firstName']);
$friend_id = safe_input($details['id']);
$username = safe_input($details['username']);

echo '<a href="/connection-auth/'.$username.'"  class="text-muted" style="font-style:bold;color:grey;">',ucwords($username),'  </a>';
}
}
}

function get_raw_name($account_id)
{include "include/conxn.php";
$query = "SELECT * FROM registration where id = $account_id  LIMIT 1 ";

if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{
$firstName = safe_input($details['firstName']);
$friend_id = safe_input($details['id']);
$username = safe_input($details['username']);

return $username;
}
}
}

function review_name($account_id)
{$query = "SELECT * FROM registration where id = $account_id   LIMIT 10";

if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
                 $firstName = safe_input($details['firstName']);
                 $friend_id = safe_input($details['id']);
                 $username = safe_input($details['username']);

echo '<strong style="padding-left:-55px;" ><a href="fp.php?friend_id=',$friend_id,'&username=',$username,'"  class="text-primary">',$firstName,'  </a></strong>';
  }
  }
}
function get_status_pic_of_sender($user )
{
include "include/conxn.php";
 
$query = "SELECT image_loc,gif_as_pic FROM profile_pic WHERE account_id = '$user' ";
$query4profi  = mysqli_query($link,$query);	
if($query4profilepic = mysqli_num_rows($query4profi) > 0)
	{
while($profile_pic  = mysqli_fetch_assoc($query4profi))
{   
$profile_image = safe_input($profile_pic['image_loc']);
$gif_as_pic = safe_input($profile_pic['gif_as_pic']);

if($gif_as_pic == "" OR  $gif_as_pic == "NULL"  )
{ 
echo'<img src="/img/avatars/mini/'. $profile_image.'" class="img-thumbnail img-circle" style="max-width:40px;" title="user" alt="user"/>';
}
else{
echo'<img src="/img/comments_images/'. $gif_as_pic.'.gif" class="img-thumbnail img-circle" style="max-width:40px;" title="user" alt="user" />';
}			 
}
}
else{
$profile_image = "/img/avatars/image1.jpg";

echo'<img src="/'. $profile_image.'" class="img-thumbnail" style="max-width:40px;"/>';
}
}


function get_status_pic_of_review($account_id)
{$query = "SELECT image_loc FROM profile_pic WHERE account_id = $account_id ";

	$query4profilepic = mysqli_query($link,$query);	

	if(mysqli_affected_rows($query4profilepic)==1)
	{
			while($profile_pic  = mysqli_fetch_array($query4profilepic))
			{   
			$profile_image = safe_input($profile_pic['image_loc']);

		  echo'<img src="/', $profile_image,'" class="img-rounded"  style="height:50px;" title="user" alt="user" />';
		  }
		  }
		  else 
		  {
 echo'<img src=" img/avatars/image1.jpg "class="img-thumbnail" width="50px;" title="user" alt="user" />';
		  }
}

function get_status_comment_f($owner_id)
{include "include/conxn.php";


if (isset($_GET['reev_id'])) 
{
$reev_id = $_GET['reev_id'];

$query = "SELECT * FROM account_comment where id = '$reev_id' ORDER BY id DESC  LIMIT 1
";
$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
{
while($products = mysqli_fetch_assoc($query_add))
{
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$comment4 = $products['comment'];
$comment2 =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
$comment = stripslashes($comment2);
$myfile_total = $products['myfile_total'];
if(strlen($comment)<149)
	{ $comment_short = substr($comment, 0, 150); $comment1 = convertHashtags($comment_short);}
	else{$comment_short = substr($comment, 0, 180);$comment1 = convertHashtags($comment_short). ' <p class=""><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$reev_id.');" > Read more..</a><p>';  }
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$image_loc = $products['image_loc'];
$datetime2 = $products['commentDate'];
$datetime = date("D,d M Y", $datetime2);
$post_id = safe_input($products['id']);

			$querya = " SELECT product_id FROM product where name = '$title_n' LIMIT 1 ";
			$query_adda = mysqli_query($link,$querya);
			$productsa = mysqli_fetch_assoc($query_adda);
			$product_id = $productsa['product_id'];

echo '				
<div class="padding-10" id="mystatus">
<ul class="list-inline no-padding">
<li class="message no-padding">
';
//Check if image location is defined						 
if(($myfile_total != NULL && $myfile_total >= 1 ))
{
echo'<li class="no-padding">
	<p class="no-padding" id="gif_image_holder_'.$post_id.'" ><a class="fancybox" href="/uploads/'.$image_loc.'">
	<img class="img img-rounded pull-left padding-5" src="/uploads/'.$image_loc.'" width="100%" height="auto" title="'.ucwords($title).'" alt="'.ucwords($title).'"/></a><a href="/product/shop/'.$product_id.'/'.$title.'"><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p></a> '. $comment1.'<span class="text-muted pull-right font-xs">
	'.$datetime.'
	</span> 
	</p>	
</li>
<div class="no-padding">
<div class="text-default row padding-5"style="">

   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
    <ul class="list-inline">
	    <li>' , myfile_total($post_id),' </li>
	   <li>   ',smiles_reev_display_info($post_id),'
		  </li>
		 <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10 text-muted"> <img title="comment" alt="comment" class="text-muted font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:30px; margin-top:-18px;" /><span class="  text-muted "> ',get_reply_no($post_id),'</span>
						<span class="hidden-xs hidden-sm text-muted "> comment(s)</span>
						</span></a>
				  </li>
        <li class="pull-right" >			
			 <span>
				<ul style="list-style:none;">
					<li class="no-padding">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
					
						<ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
						
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
             	</li>
						</ul>
					</li>
				 </ul>
			</span>
		</li>				  
   </ul>
   </div>
   <div class=" padding-5" id="loading_reev'.$post_id.'"></div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
  </ul>	

 
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}
else echo '<li class=" ">
<div class="row padding-5 ">
<p class=""><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p>'. $comment1.'<span class="text-muted pull-right font-xs">'.$datetime.' </span></p>	

<div class="">
<div class="row no-padding">
</li>
<div class="no-padding">
<div class="text-muted row no-padding"style=" ">

   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
    <ul class="list-inline">
	     
	   <li>   ',smiles_reev_display_info($post_id),'
		  </li>
		 <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:30px; margin-top:-18px;" title="comment" alt="comment"/> <span class=" text-muted">',get_reply_no($post_id),'</span>
						<span class="hidden-xs hidden-sm text-muted">comment(s)</span>
						</span></a>
				  </li>
        <li class="pull-right" >			
			 <span>
				<ul style="list-style:none;">
					<li class="no-padding">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
					
						<ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
             	</li>
						</ul>
					</li>
				 </ul>
			</span>
		</li>				  
   </ul>
   </div>
   <div class=" padding-5" id="loading_reev'.$post_id.'"></div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
   
  </ul>	
</div><hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';  
}
}
else {echo "none yet";}
}

 
else
{
$query = "SELECT * FROM account_comment where owner_id = $owner_id AND account_id = $owner_id  ORDER BY id DESC  LIMIT 5
";
if($query_add = mysqli_query($link,$query))
{
if( mysqli_num_rows($query_add)>0)
{
while($products = mysqli_fetch_assoc($query_add))
{
$post_id = safe_input($products['id']);
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$comment4 = $products['comment'];
$comment2 =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
$comment = stripslashes($comment2);
$myfile_total = $products['myfile_total'];
$comment_twitter = substr($comment, 0, 113). '...';
if(strlen($comment)<149)
	{ $comment_short = substr($comment, 0, 150); $comment1 = convertHashtags($comment_short);}
	else{$comment_short = substr($comment, 0, 180);$comment1 = convertHashtags($comment_short). ' <p class=""><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a><p>';  }
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$image_loc = $products['image_loc'];
$datetime = strtotime($products['commentDate']);
$datetime = date("D,d M Y", $datetime);
$post_id = safe_input($products['id']);

echo '				
<div class="no-padding" id="mystatus">
<ul class="list-inline padding-10">
';
//Check if image location is defined						 
if(($myfile_total != NULL && $myfile_total >= 1 ))
{
echo'<li class="padding-10" style="margin-top:-10px;">
	<p class=""  id="gif_image_holder_'.$post_id.'"><a class="fancybox" href="/img/comments_images/'.$image_loc.'.gif">
	<img class="img img-rounded pull-left padding-5" src="/img/comments_images/mini/'.$image_loc.'.jpg" width="50%" height="auto" title="'.ucwords($title).'" alt="'.ucwords($title).'"/></a><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p><span id="load_reev_text_more'.$post_id.'">'. $comment1.'</span><span class="text-muted pull-right font-xs">
	'.$datetime.'
	</span>
	</p>	
</li>
<div class="">
<div class="text-default row "style="">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
				   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" title="comment" alt="comment" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>	
				
				  
				  <li class="pull-right" >			
			 <span>
				<ul style="list-style:none;">
					<li class="no-padding">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
					
						 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
						
							<li class="  " onClick="window.open(';
									echo"'http://twitter.com/share?url=http://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="http://twitter.com/share?url=http://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' ->   http://mykanta.com/reev_load/'.$post_id.'" data-action="share/whatsapp/share"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
					</li>
				 </ul>
			</span>
		</li>
	 </ul>
   </div>
   <div class=" padding-5" id="loading_reev'.$post_id.'"></div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
  </ul>	
  
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}
else echo '<li class="padding-10 "  style="margin-top:-30px;">
<div class="row  padding-10">
<div class="padding-10"  ><p class="" style="font-size:1.2em; color:black;">'.ucwords($title).'</p><span id="load_reev_text_more'.$post_id.'">'. $comment1.'</span><span class="text-muted pull-right font-xs">'.$datetime.' </span></div>	
</li>
<div class="row " style="margin-top:-20px;margin-left:5px;">
   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
       <ul class="list-inline">
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;"title="comment" alt="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>	
				  <li class="pull-right" >			
			 <span>
				<ul style="list-style:none;">
					<li class="no-padding">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
					
						<ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  ">
							  <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
             	            </li>
						</ul>
					</li>
				 </ul>
			</span>
		</li>
	 </ul>
   </div>
   <div class=" padding-5" id="loading_reev'.$post_id.'"></div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
  
  </ul>	
</div><hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';  
}
}
else {echo '<p class="headline padding-10 margin-10 " style="color:black; font-size:1.5em;"> No Reevs yet! </p>';}
}else {echo '<p class="headline  padding-10 margin-10  " style="color:black; font-size:1.5em;"> No Reevs yet! </p>';}

if(isset($post_id))
{
echo '
</ul> <center id="load_more_reev_box5" class=" padding-10 " align="center" style="height:100px; width:auto;"  ><button onclick="load_more_reevs_conect_pub('.$owner_id.','.$post_id.',5);"class="load_reev_button" id="load_reev_button">
          <i class="fa fa-sm fa-arrow-down"style=""></i>  Old Reevs </button> 
      </center>
	  <div id="load_more_reevs" class="no-padding" style="height:auto;"> </div>
	  <br>
	  <DIV>';  include "inc/footer.php"; echo '</DIV>';
	 
	 }

	 
	 }			 		 	 
	 }			 		 	 
 			 		 	 
 
function myfile_total($post_id)
{
include "include/conxn.php";

//selecting all of reev
$queryq = "SELECT * FROM account_comment WHERE id = '$post_id'";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser) >= 1)
	{
	while($flik_info = mysqli_fetch_assoc($queryuser))
		{
		$number_of_smiles =$flik_info['myfile_total'];
		$image_loc =$flik_info['image_loc'];
		$id =$flik_info['id'];
			$myfile_total = $flik_info['myfile_total'];
		if(($myfile_total == NULL && $myfile_total == 0 ))
		{
		 echo '';
		}else if($number_of_smiles >= '2' OR $number_of_smiles >= 2 )
		{
		 echo '<span class="" id="play_pause'.$id.'"><img  class="text-muted font-sm" src="/img/site_img/reev_icons/reev_p.png" onClick="image_loc('.$id.');" style="height:22px; margin-top:-13px;" title="pause" alt="pause"/></span><span class="">+'. $number_of_smiles.'</span><input type="hidden" id="image_loc_'.$id.'" value="'.$image_loc.'" />  ';
		}else
		{
		 echo '<span class="" id="play_pause'.$id.'"><img  class="text-muted font-sm" src="/img/site_img/reev_icons/reev_ca.png" style="height:22px; margin-top:-13px;"title="comment" alt="comment" /></span><span class=""> +1</span><input type="hidden" id="image_loc_'.$id.'" value="'.$image_loc.'" />  ';
		}
		}
	}
		
}
function get_status_comment_next($owner_id,$reev_id,$LIMIT_1)
{include "include/conxn.php";

if (!empty($owner_id) AND !empty($reev_id) AND!empty($LIMIT_1)  ) 
{
$query = "SELECT * FROM account_comment where owner_id = '$owner_id'  AND account_id = '$owner_id'  AND id <= $reev_id  ORDER BY id DESC  LIMIT $LIMIT_1, 5";
$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
{
while($products = mysqli_fetch_assoc($query_add))
{
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$comment4 = $products['comment'];
$comment2 =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
$comment = stripslashes($comment2);
$myfile_total = $products['myfile_total'];
$comment_twitter = substr($comment, 0, 113). '...';
$post_id =  $products['id'];
if(strlen($comment)<149)
	{ $comment_short = substr($comment, 0, 150); $comment1 = convertHashtags($comment_short);}
	else{$comment_short = substr($comment, 0, 180);$comment1 = convertHashtags($comment_short). ' <p class=""><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a><p>';  }
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$image_loc = $products['image_loc'];
$datetime = strtotime($products['commentDate']);
$datetime = date("D,d M Y", $datetime);


echo '				
<div class="no-padding" id="mystatus">
<ul class="list-inline padding-10">
';
//Check if image location is defined						 
if(($myfile_total != NULL && $myfile_total >= 1 ))
{
echo'<li class="padding-10" style="margin-top:-10px;">
	<p class=""  id="gif_image_holder_'.$post_id.'"><a class="fancybox" href="/img/comments_images/'.$image_loc.'.gif">
	<img class="img img-rounded pull-left padding-5" src="/img/comments_images/mini/'.$image_loc.'.jpg" width="50%" height="auto" title="'.ucwords($title).'" alt="'.ucwords($title).'"/></a><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p> '. $comment1.'<span class="text-muted pull-right font-xs">
	'.$datetime.'
	</span>
	</p>	
</li>
<div class="">
<div class="text-default row "style="">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
				   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:30px; margin-top:-18px;" title="comment" alt="comment"/> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>
                 
				  			  
				  <li class="pull-right" >			
			 <span>
				<ul style="list-style:none;">
					<li class="no-padding">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
					
						 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'http://twitter.com/share?url=http://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="http://twitter.com/share?url=http://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' ->   http://mykanta.com/reev_load/'.$post_id.'" data-action="share/whatsapp/share"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
					</li>
				 </ul>
			</span>
		</li>
	 </ul>
   </div>
   <div class=" padding-5" id="loading_reev'.$post_id.'"></div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
  </ul>	
  
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}
else echo '<li class="padding-10 "  style="margin-top:-30px;">
<div class="row  padding-10">
<div class="padding-10"  ><p class="" style="font-size:1.2em; color:black;">'.ucwords($title).'</p>'. $comment.'<span class="text-muted pull-right font-xs">'.$datetime.' </span></div>	
</li>
<div class="row " style="margin-top:-20px;margin-left:5px;">
   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
       <ul class="list-inline">
				   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:30px; margin-top:-18px;"title="comment" alt="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>	
				  <li class="pull-right" >			
			 <span>
				<ul style="list-style:none;">
					<li class="no-padding">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
					
						<ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  ">
							  <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
             	            </li>
						</ul>
					</li>
				 </ul>
			</span>
		</li>
	 </ul>
   </div>
   <div class=" padding-5" id="loading_reev'.$post_id.'"></div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
  
  </ul>	
</div><hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';  
}
}
else return;

if(isset($reev_id))
{
echo '
</ul> <center id="load_more_reev_box'.$LIMIT_1.'" class=" padding-10 " align="center" style="height:100px; width:auto;"  ><button onclick="load_more_reevs_conect_pub('.$owner_id.','.$reev_id.','.$LIMIT_1.');" class="load_reev_button" id="load_reev_button">
          <i class="fa fa-sm fa-arrow-down"style=""></i>  Old Reevs </button> 
      </center>
	  <div id="load_more_reevs" class="no-padding" style="height:auto;"> </div>';
	  }
}			 		 	 
 
}



function hashtag_next($tag_id_raw,$LIMIT)
{include "include/conxn.php";  	
 
$hashtag = safe_input($tag_id_raw);
 $new_str  = preg_replace('/[^A-Za-z0-9\ ]/ ', '', $hashtag);
  $tag = '#'.$new_str;
   $param = "%{$tag}%";
$all_friends = array();
 
$queryz = "SELECT * FROM account_comment WHERE comment like '$param' ORDER BY commentDate DESC LIMIT $LIMIT, 5";
$query_add = mysqli_query($link,$queryz);
 

if(mysqli_num_rows($query_add ) > 0){
while($products = mysqli_fetch_assoc($query_add))  //start
{
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$comment4 = $products['comment'];
$comment2 =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
$comment_raw = stripslashes($comment2);
$comment = htmlspecialchars($products['comment']);

	$myfile_total = $products['myfile_total'];
	//$comment1 = convertHashtags($comment);
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$image_loc = $products['image_loc'];
$datetime = strtotime($products['commentDate']);
$datetime = date("D,d M Y", $datetime);
$post_id = safe_input($products['id']);
$comment_twitter = substr($comment, 0, 113). '...';
	if(strlen($comment_raw)<149)
	{ $comment_short = substr($comment_raw, 0, 150); $comment1 = convertHashtags($comment_short);}
	else{$comment_short = substr($comment_raw, 0, 180);$comment1 = convertHashtags($comment_short). ' <p class=""><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a><p>';  }
echo '
<div class=" padding-10 ">
<ul style="list-style:none; margin-left:-60px;">
<li class="message ">
 <ul class="list-inline" style="margin-left:30px; margin-top:0px;"><li>', get_status_pic_of_sender($account_id), '</li><li class="no-padding" style="margin-top:-10px;"><span class="padding-5" style="list-style:none; margin-top:-10px;"><p style=" margin-bottom:2px;"> ', get_status_name($account_id), '</p><p  style=" margin-bottom:-30px;" class="text-muted font-xs">
	'.$datetime.'
	</p> </span></li> </ul>';
//Check if image location is defined						 
	if(($myfile_total != NULL && $myfile_total >= 1 ))
{
echo'<li style="padding-left:50px; margin-top:5px; margin-bottom:10px;">

<div class="row ">
<p class="no-padding " id="gif_image_holder_'.$post_id.'"><a class="fancybox" href="/img/comments_images/'.$image_loc.'.gif">
	<img class="img img-rounded pull-left padding-5" src="/img/comments_images/mini/'.$image_loc.'.jpg" width="50%" height="auto"  title="'.ucwords($title).'" alt="'.ucwords($title).'"/></a><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p> <span id="load_reev_text_more'.$post_id.'">'. $comment1.'</span>
	</p>	
</div>
</li>

<li class="message" style="margin-top:-15px; padding-left:55px;">

<ul class="list-inline  " >	
 
<div class="row padding-10" style=" ">
    <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" >
	</div>
	<div class=" col-xs-12 col-sm-12 col-md-12 padding-5"id="load_comments'.$post_id.'" >
       <ul class="list-inline" style="margin-left:-20px;">
	    <li>', myfile_total($post_id),'</li>
	   <li>',smiles_reev_display_info($post_id),'</li>
		 <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class=""> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;"  title="comment" alt="comment"/> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:1.0em;">comment(s)</span>
						</span></a>
				  </li>
				  <li class="pull-right"style="margin-right:10px;" >			
	     <span>
			<ul style="list-style:none;">
				<li class="no-padding">
					<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
				
					 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'http://twitter.com/share?url=http://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="http://twitter.com/share?url=http://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' ->   http://mykanta.com/reev_load/'.$post_id.'" data-action="share/whatsapp/share"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
						</ul>
				</li>
			 </ul>
		</span>
	</li>
		</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>


</ul>
	
</li>
</ul>
</div><hr class="no-margin" style="border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;">
';
}else  
{
echo'<li style="padding-left:50px;">

<div class="row " style="margin-left:-10px;">
<div class="padding-10"><p class="" ><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p><p class="no-margin" ><span id="load_reev_text_more'.$post_id.'">'. $comment1.'</span></p></p>	
</div>
</div>
</li>

<li class="message" style="margin-top:-15px; padding-left:55px;">

<ul class="list-inline  " >	
 
<div class="row padding-5" style="">
    <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" >
	</div>
	<div class=" col-xs-12 col-sm-12 col-md-12 no-padding " id="load_comments'.$post_id.'" >
    <ul class="list-inline">
				 <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  title="image" alt="image" class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm  text-muted" style="font-size:1.0em;">comment(s)</span>
						</span></a>
				  </li>	
				  	<li class="pull-right"style="margin-right:15px;" >			
	     <span>
			<ul style="list-style:none;">
				<li class="no-padding">
					<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
				
					<ul class="dropdown-menu no-padding pull-right " style="margin-top:-48px;" >
						<li class="pull-left">
 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>             	</li>
					</ul>
				</li>
			 </ul>
		</span>
	</li>
				 </ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>


</ul>
	
</li>
</ul>	

</div><hr class="no-margin" style="border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;">	
';
}
}

}else { echo '<p class="padding-10 text-muted" style="margin-left:10px;">No Reevs on this Tag.</p>'; }
//end
if(isset($post_id))
{
echo '
 <center id="load_more_reevs_tag'.$LIMIT.'" class=" padding-10 " align="center" style="height:100px; width:auto ;"  ><button onclick="load_more_reevs_tag_pub('.$LIMIT.','.$post_id.');"class="load_reev_button" id="load_reev_button"  value="'.$hashtag.'">
          <i class="fa fa-sm fa-arrow-down"style=""></i>  Old Reevs </button> 
      </center>
	  <div id="load_more_reevs" class="no-padding" style="height:auto;"> </div>';
	  }

 
 }

 
 
 
function get_status_comment($owner_id)
{include "include/conxn.php";			 		 	 
$query = "SELECT * FROM account_comment where owner_id = $owner_id AND account_id = $owner_id  ORDER BY id DESC  LIMIT 1
";
$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
	      $account_id = safe_input($products['account_id']);
		  $post_user_id = safe_input($products['account_id']);
	      $comment4 = safe_input($products['comment']);
		  $comment =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
		  $image_loc = safe_input($products['image_loc']);
	      $datetime = strtotime($products['commentDate']);
	      $datetime = date("D, d M Y, h:m a", $datetime);
		   $post_id = safe_input($products['id']);
$myfile_total = $products['myfile_total'];
	   echo '				
<div class="chat-body no-padding profile-message">
			<ul>
					<li class="message">
						', get_status_pic_of_sender($account_id), '
									 ', get_status_name($account_id), ' ';
//Check if image location is defined						 
		if(($myfile_total != NULL && $myfile_total >= 1 ))
			{
				 echo'<p style="padding-left:60px;">'. $comment.'
						         </p>';
			}
			else
			{
				echo'<li style="padding-left:85px; padding-top:5px; margin-bottom:10px;">
					<p><a class="fancybox" href="img/comments_images/'.$image_loc.'">
						<img class="img-thumbnail" src="img/comments_images/'.$image_loc.'" width="155"  title="image" alt="image"/></a></p>
						'. $comment.'';
			}
				 echo'
				 </li>
				<li class="message" style="margin-top:-15px; padding-left:55px;">
									<ul class="list-inline font-xs " >
						<li class="text-primary">
				'.$datetime.'
										</li>
										<li>
						<a href="javascript:void(0);" class="text-muted">Show All Comments (';
									echo		get_reply_no($post_id);
								echo	')</a>
										</li>
										<li>
										<a href="include/delete_comment.php?id='.$post_id.'"class="text-danger">Delete</a>
										</li>
								 </ul>	
							</li>
                            <div  id="reply-holder-ul " style=" padding-left:50px;  list-style:none;">	';
								    echo get_reply($post_id) .  ' 
								</div>
							</ul>		
           </div>
	    '; 
		}
 }
else
{
  echo '
					<span class="timeline-seperator text-center"> <span>Now</span>
							<div class="btn-group pull-right">
								<a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>
							</div> </span>	
<div class="chat-body no-padding profile-message ">
						<ul>
					<li class="message">
						<img src="/img/mykanta_logo.png"   title="image" alt="image"  class="img-thumbnail" width="50px;" >
									 <strong style="padding-left:60px;" ><a href="name link" style="margin-bottom:-140px;" class="text-primary">Flik </a></strong>
							  <p style="padding-left:60px;">Thank you for joining Mykanta
						         </p>
								 </li>
							</ul>		
           </div>
 '; 
 }
  }
  /*
function get_status_comment_all_friends($owner_id)
{include "include/conxn.php";  	

	    $all_friends = array();

		 $sql = "SELECT account_id FROM friends WHERE friend_id='$owner_id' AND value='1' ORDER BY id LIMIT 5";
		 $query = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
		 {
         array_push($all_friends, $row["account_id"]);
         }
		 $sql = "SELECT friend_id FROM friends WHERE account_id='$owner_id' AND value='1' ORDER BY id LIMIT 5";
         $query = mysqli_query($link,$sql);
         while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
		 {
         array_push($all_friends, $row["friend_id"]);
         }
		 $friendArrayCount = count($all_friends);
         if($friendArrayCount > 5)
		 { 
         array_splice($all_friends, 5);
         }
          if($friendArrayCount > 1)
		 {
        
         }
         $orLogic = '';
         $orLogic1 = '';
         foreach($all_friends as $key => $user)
		 {
         $orLogic .= "owner_id='$user' OR ";
         $orLogic1 .= "account_id='$user' OR ";
         }
          $orLogic = chop($orLogic, "OR ");
         $orLogic1 = chop($orLogic1, "OR ");
		 
		 		$query = "SELECT * FROM account_comment where $orLogic and $orLogic1  ORDER BY commentDate DESC LIMIT 10 ";
$query_add = mysqli_query($link,$query);
	while($products = mysqli_fetch_assoc($query_add))
		 {
	      $account_id = safe_input($products['account_id']);
		   $post_user_id = safe_input($products['account_id']);
	      $comment = safe_input($products['comment']);
		  $image_loc = safe_input($products['image_loc']);
	   $datetime = strtotime($products['commentDate']);
	   $datetime = date("D, d M Y, h:m a", $datetime);
		    $post_id = safe_input($products['id']);
	  echo '
<div class="chat-body no-padding profile-message ">
<ul>
<li class="message ">
', get_status_pic_of_sender($account_id), '
									 ', get_status_name($account_id), ' ';
//Check if image location is defined						 
			if(($image_loc == NULL) || ($image_loc == "NULL"))
			{
				 echo'<p style="padding-left:60px;">'. $comment.'
						         </p>';
			}
			else
			{
				echo'<li style="padding-left:85px; padding-top:5px; margin-bottom:10px;">
					<p><a class="fancybox" href="img/comments_images/'.$image_loc.'">
						<img class="img-thumbnail" src="img/comments_images/'.$image_loc.'" width="155" alt=""/></a></p>
						'. $comment.'';
			}
				 echo'
				 </li>
				<li class="message" style="margin-top:-15px; padding-left:55px;">
									<ul class="list-inline font-xs " >
						<li class="text-primary">
				'.$datetime.'
										</li>
										<li>
						<a href="javascript:void(0);" class="text-muted">Show All Comments (';
									echo		get_reply_no($post_id);
								echo	')</a>
										</li>
										<li>
										<a href="include/delete_comment.php?id='.$post_id.'"class="text-danger">Delete</a>
										</li>
								 </ul>	
							</li>
								<div  id="reply-holder-ul " style=" padding-left:50px;  list-style:none;">	';
								    echo get_reply($post_id) .  ' 
								</div>
							</ul>		
           </div>
	    '; 
		}
 
  }
  */
function get_status_commnt_all_friends($owner_id)
{include "include/conxn.php";	
$querlist = "SELECT friend_id FROM `friends` WHERE account_id = '$owner_id'  and value = 1 LIMIT 5 
";
$query_add = mysqli_query($link,$querlist);

if( mysqli_num_rows($query_add)>0)
	{
	while($list1 = mysqli_fetch_array($query_add,MYSQLI_ASSOC))
		 {  
		echo $list_id1 = $list1['friend_id'];	 
			$query = "SELECT * FROM account_comment where owner_id = $list_id1 and account_id = $list_id1  ORDER BY id DESC LIMIT 1 ";
//query_confirm($query);
$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
	      $account_id = $products['account_id'];
		   $post_user_id = $products['account_id'];
	      $comment4 = $products['comment'];
		  $comment =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
		  $image_loc = $products['image_loc'];
	   $datetime = strtotime($products['commentDate']);
	   $datetime = date("D, d M Y, h:m a", $datetime);
		    $post_id = $products['id'];$myfile_total = $products['myfile_total'];
	  echo '
<div class="chat-body no-padding profile-message">
<ul>
<li class="message">
', get_status_pic_of_sender($account_id), '
									 ', get_status_name($account_id), ' ';
//Check if image location is defined						 
			if(($myfile_total != NULL && $myfile_total >= 1 ))
			{
				 echo'<p style="padding-left:60px;">'. $comment.'
						         </p>';
			}
			else
			{
				echo'<li style="padding-left:85px; padding-top:5px; margin-bottom:10px;">
					<p><a class="fancybox" href="img/comments_images/'.$image_loc.'">
						<img class="img-thumbnail" src="img/comments_images/'.$image_loc.'" width="155"  title="image" alt="image" /></a></p>
						'. $comment.'';
			}
				 echo'
				 </li>
				<li class="message" style="margin-top:-15px; padding-left:55px;">
									<ul class="list-inline font-xs " >
						<li class="text-primary">
				'.$datetime.'
										</li>
										<li>
						<a href="javascript:void(0);" class="text-muted">Show All Comments (';
									echo		get_reply_no($post_id);
								echo	')</a>
										</li>
										<li>
										<a href="include/delete_comment.php?id='.$post_id.'"class="text-danger">Delete</a>
										</li>
								 </ul>	
							</li>
								<div  id="reply-holder-ul " style=" padding-left:50px;  list-style:none;">	';
								    echo get_reply($post_id) .  ' 
								</div>
							</ul>		
           </div>
	    '; 
		}
 }
	}}
	}

function get_shop_comment($shop_id)
{include "include/conxn.php"; 		 	 

$query = "SELECT * FROM shop_comment where shop_id = $shop_id  ORDER BY id DESC LIMIT 0 , 5
";
if($query_add = mysqli_query($link,$query))
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
	   $account_id = safe_input($products['account_id']);
	   $post_user_id = safe_input($products['account_id']);
       $this_shop = safe_input($products['shop_id']); 
	   $comment = safe_input($products['comment']);
	   $image_loc = safe_input($products['image_loc']);
	   $datetime = strtotime($products['datetime']);
	   $datetime = date("D, d M Y a", $datetime);
	   $post_id = safe_input($products['id']);

	 echo '<br>
<div class="chat-body no-padding profile-message">
 <ul>
   <li class="message">
       ', get_status_pic_of_sender($account_id), '
	   ', get_status_name($account_id), ' ';
	if(($image_loc == NULL) || ($image_loc == "NULL"))
						{								
							echo'<p style="padding-left:60px;">'. $comment.'
						         </p>';
						}
						else
						{
							echo'<li style="padding-left:10px; padding-top:5px; margin-bottom:10px;">
								<p><a class="fancybox" href="img/shop_comments_images/'.$image_loc.'">
									<img class="img-thumbnail" src="img/shop_comments_images/'.$image_loc.'" width="155" title="image" alt="image" /></a></p>
									'. $comment.'';
						}
								 echo'
								 </li>
								<li class="message" style="margin-top:-10px;  padding-left:60px;">
									<ul class="list-inline font-xs " >
									   <li class="text-primary">'.$datetime.'
											<!--<a href="comment_like.php?post_id='.$post_id.'"class="text-primary"><i class="fa fa-thumbs-up"></i> Like</a>-->
										</li>
										<li>
											<a href="javascript:void(0);" class="text-muted">All Comments (';
									echo		get_reply_no($post_id);
								echo	')</a>
										</li>
                                       <li>
										<a href="include/delete_shop_comment.php?id='.$post_id.'&shop_id='.$this_shop.'"class="text-danger">Delete</a>
										</li>
								 </ul>	
							</li>
                            <ul  id="reply-holder-ul " style="   list-style:none; padding-left:55px;">		';
								    echo get_reply_shop($post_id) .  ' 
								</ul>
							</ul>		
           </div> '; 
 }
 }
else
{
  echo '
					<span class="timeline-seperator text-center"> <span>Now</span>
							<div class="btn-group pull-right">
								<a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>
							</div> </span>	
<div class="chat-body no-padding profile-message ">
						<ul>
					<li class="message">
						<img src="/img/mykanta_logo.png" title="mykanta" alt="mykanta" class="img-thumbnail" width="50px;" >
									 <strong style="padding-left:60px;" ><a href="name link" style="margin-bottom:-140px;" class="text-primary">Flik </a></strong>
							  <p style="padding-left:60px;">Thank you for join Flik
						         </p>
								 </li>
							</ul>		
           </div>
	    '; 
}
  }

 function product_review($product_id)
{include "include/conxn.php";	 		 	 
$query = "SELECT * FROM product_review where product_id = $product_id  ORDER BY id DESC LIMIT 0 , 5
";

if($query_add = mysqli_query($link,$query))
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
	   $account_id = safe_input($products['account_id']);
       $post_user_id = safe_input($products['account_id']);
	   $review = safe_input($products['review']);
	   $datetime = strtotime($products['datetime']);
	   $datetime = date("D, d M Y a", $datetime);
	   $review_id = safe_input($products['id']);
	
$query = "SELECT * FROM registration where id = $account_id   LIMIT 10";

if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 { 

$query = "SELECT image_loc FROM profile_pic WHERE account_id = $account_id ";

	$query4profilepic = mysqli_query($link,$query);	

	if(mysqli_num_rows($query4profilepic)==1)
	{
			while($profile_pic  = mysqli_fetch_array($query4profilepic))
			{   
			$profile_image = safe_input($profile_pic['image_loc']);
            }

    }
    else 
	{
$profile_image =" img/avatars/image1.jpg ";
    }
    $firstName = safe_input($details['firstName']);
    $friend_id = safe_input($details['id']);
    $username = safe_input($details['username']);
 echo '
 <div class="row no-padding no-margin " >
<!--- <div class="col-md-2  pull-right no-padding no-margin" >
<img src="/', $profile_image,'"  title="',$username ,'" alt="',$username ,'" class="img-thumbnail"  style="height:50px; " ></div> -->
<div class="col-md-10  no-padding no-margin " >
<strong style="" ><p class="text-primary">',$username ,' </p></strong> 
<p >'. $review.'</p>
<ul class="list-inline font-xs " >
<li>
<a href="javascript:void(0);" class="text-info">'.$datetime.'</a>
</li>

</ul>
</div>
</div>
						 ';  
 }
 }
 }
 }
else
{
echo '
					<li class="message">
						<img src="/img/mykanta_logo.png" title="mykanta" alt="mykanta" class="img-thumbnail" width="50px;" >
									 <strong style="padding-left:60px;" ><a href="#" style="margin-bottom:-140px;" class="text-primary">Mykanta </a></strong>
                     <p style="padding-left:60px;">Be the first to make a review on this product.
						         </p>
								 </li>

	    '; 
 }
}

function get_shop_friend_comment($shop_id)
{include "include/conxn.php";
		 		 	 
$query = "SELECT * FROM shop_comment where shop_id = $shop_id  ORDER BY id DESC LIMIT 0 , 5
";
if($query_add = mysqli_query($link,$query))
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
	      $account_id = safe_input($products['account_id']);
		   $post_user_id = safe_input($products['account_id']);
	      $comment = safe_input($products['comment']);
	   $datetime = safe_input($products['datetime']);
	     $time = strtotime($datetime);	 
		    $post_id = safe_input($products['id']);
    echo '
     <div class="chat-body no-padding profile-message ">
<ul>
					<li class="message">
						<!--', get_status_pic_of_sender($account_id), '
									 -->', get_status_name($account_id), ' 	
							  <p style="">'. $comment.'
						         </p>
								 </li>
								<li class="message" style="margin-top:-10px;padding-left:60px;">
								<!--	<ul class="list-inline font-xs " >
										<li class="text-primary">
										<a href="javascript:void(0);" class="text-muted">'.humanTiming($time).' ago</a>
											'.$datetime.' 
										</li>
										
										';
							
										
										echo'
								 </ul>	-->
							</li>	';
				echo		get_reply_shop_f($post_id) .
                  '  	</ul>
							</ul>		
           </div><hr>
	    '; 
 }
 }
else
{
echo '<span class="text-info"> No Reviews yet, create an account or login to review </span>'; 
 }
  }

function chat_box()
{
echo '<div class="hidden jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" 
			data-widget-togglebutton="true" data-widget-fullscreenbutton="false" style="width:240px; position:fixed; bottom:-30px; right:20px; z-index:2;">
				<header>
					<span class="widget-icon" > <i class="fa fa-comments txt-color-white" style="line-height:2.5 !important;"></i> </span>
					<h2 id="chatTitle">Chat </h2>
					<div class="widget-toolbar">
						
						<a href="javascript:chatMinBtnFunc();"><span id="chatMinBtn" class="widget-icon padding-5"> <i id="chatMinBtnI" class="fa fa-plus txt-color-white"></i> </span></a>
					</div>
				</header>

				<div id="chatWrapper" style="display:none;">
					
					<div class="jarviswidget-editbox">
						<div>
							<label>Title:</label>
							<input type="text" />
						</div>
					</div>
					<div class="widget-body widget-hide-overflow no-padding">
					<div id="chat-container" class="open chat-container" style="height:240px;">
							<span class="chat-list-open-close"><i class="fa fa-user"></i><b>!</b></span>

							<div class="chat-list-body custom-scroll" style="height:240px;">
	<ul id="chat-users"style="width:240px;">names
	</ul>
							</div>
						</div>
<ul id="chat-body" class="padding-5 chat-body custom-scroll myChatBody" style="height:230px; list-style:none;">
								<li class="message" style="padding:5px; margin:10px 30px 0 0; background-color: #EAEAEA; border-left:4px solid #4C4F53;">
									<div class="font-xs message-text" style="margin:0;">
										Select a connection to chat with from the panel on the right.
									</div>
								</li>
						</ul>
						<div class="no-padding" style="background-color: #EAEAEA;">
							<form name="message" action="">
							 <div class="input-group chatbox" style="background-color: #EAEAEA;">
      <input type="text" style="width:190px;" class="form-control" placeholder="Type here"  name="usermsg" id="usermsg"></input><button type="submit" class="btn	btn-primary padding-5" style="height:32px; width:42px;" id="submitmsg" name="submitmsg">  Send</button>
    </div>
						</form>
						</div>
					</div>
				</div>
			</div>';
}

function header_up()
 {echo'<header id="header" >

<div class="row no-padding" style="width:100%;">
	 <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3 padding-10 margin-10 ">
			<span class="hidden-xs hidden-sm padding-10" id=""><a href="/User" title="Profile" class=""><img src="/img/mykanta_logo.png" class="img "title="Mykanta"  height="35" width="100"/></a>
	</span>
	<span class="padding-10 hidden-md hidden-lg" id=""><a href="/User" class="" ><img src="/img/site_img/mk.png" class="img" title="Profile" height="30" width="30"/></a>
	</span>
	 </div>
	 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-padding-right" align="left" >
		<form name="form" method="post" action="/include/search_dir.php">
			<div class="padding-10 input-group   no-padding-right">
			<input id="yourshop" name="yourshop" class="input form-control" placeholder="Search for" required type="text" >
				<span class="input-group-btn">
					<div class="btn-gr oup">
						<button class="btn btn-xs btn-default padding-5" name="search_product" id="search_product" style="height:32px;width:auto;" title="Product"type="submit"> 
						<p class="hidden-xs hidden-sm">Product</p>
						<img src="/img/site_img/product_icon.ico" class="img hidden-md hidden-lg" height="20" width="20"title="Product" />
						</button>
						<button class="btn btn-xs btn-default padding-5 " name="search_shops" id="search_shops" style="height:32px;width:auto;"title="Business" type="submit"> 
						<p class="hidden-xs hidden-sm">Business</p>
						<img src="/img/site_img/business_icon.png" class="img hidden-md hidden-lg" height="20" title="BUsiness" width="20" />
						</button>
						
					</div>
				</span>
			</div>
		</form>
	 </div>
	 <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 no-padding">
		<ul class="header-dropdown-list list-inline no-padding">
					<li class="">
						<span class="dropdown-toggle text-primary " data-toggle="dropdown">Hi <i class="fa fa-angle-down"></i></span>
						<ul class="dropdown-menu pull-right">
							<li class="">
								<a href="/check_out_vis.php"><i class="glyphicon glyphicon-shopping-cart"></i> <span class="menu-item-parent" >Cart</span></a>
							</li>
						<hr><li class="">
								<a href="/create_account_mobile"><i class="fa fa-lg fa-fw fa-legal"></i> <span class="menu-item-parent" >Sign Up</span></a>
							</li>
							<hr>
						</ul>
					</li>
					<li class="">
						<div id="hide-menu" class="" style="">
						<span class=""> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder btn  btn-default btn-sm" style="line-height:1.2; "></i></a> </span>
						</div>
					</li>
				</ul>
	 </div>
</div>
</header>';
  }

  function nav()
 {echo '<aside id="left-panel">
<nav>
   <ul >
   <li>
<div class="padding-10"><div class="padding-10 panel text-muted" style="90%;"><strong><a href="/home">Go to Home</a></strong><hr><p>SignUp to create a business </p><p>page for your business now!</p><center> <a href="/registration" style="color:grey;">SignUp</a> <a href="/signin" style="color:grey;">login</a></center></div>
</div>		
			
</li>
<!--
<li class="padding-10">
<a href="#;" class="no-padding" style="margin-top:-10px;"><span></span></a> 
',comment_hashtags_nav(),'
</li>-->
   <li>
<a href="#"><i class="fa fa-search" style="color:#cccccc;"></i>Browse Category
</a>

	 <div class="customs_croll" >
	    <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/sca">Software, Computers & Accessories</a></li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/afb">Agriculture, Food & Beverage</a></li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/acg"> Art, Crafts & Gallery </a></li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/at">Auto & Transportation</a></li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/ctjbs"> Clothing, Textiles, Jewelry, Bags & shoes</a>  </li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/eect">Electrical Equipment, Components, & Telecom</a>  </li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/eea">Electronics & Electrical Appliances</a></li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/gt">Gifts and Toys</a></li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/hb">Health & Beauty</a></li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/hlc">Home, Lights & construction</a></li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/mht">Machinery, Hardware & Tools</a></li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/mcrp">Metallurgy, Chemicals, Rubber & Plastics</a></li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/pao">Packaging, Advertising & Office</a></li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/sa">Sports & Accessories</a></li>
        <li><a style="font-size:0.9em; margin-left:20px;" href="/business-category/sff">Stationery, Furniture and Fittings</a></li>
</div>
			
</li>
     
</ul>
			</nav>
			
		</aside>';

  }
 



 function get_reply_no($post_id)
{include "include/conxn.php";

$query = "SELECT COUNT(id) FROM reply WHERE post_id = $post_id     
";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$comment_count = $query_count[0];
echo $comment_count;
}

 function get_reply_shop($post_id)
{include "include/conxn.php";

$shop_id = safe_input($_GET['shop_id']);
$shopName = safe_input($_GET['shopName']);
$query = "SELECT * FROM reply_shop where post_id = $post_id  ORDER BY datetime ASC LIMIT 5
";
if($query_add2 = mysqli_query($link,$query))
	{
	while($reply_proc = mysqli_fetch_assoc($query_add2))
		 {
	      $reply_user_id = safe_input($reply_proc['reply_user_id']);
	      $reply_id = safe_input($reply_proc['id']);
	      $reply = safe_input($reply_proc['reply']);
	      $timedate = safe_input($reply_proc['datetime']);
		  $time = strtotime($timedate);
          $query = "SELECT * FROM registration where id =   $reply_user_id   LIMIT 5 ";
if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
                 $username = safe_input($details['username']);
                 $friend_id = safe_input($details['id']);
                 $firstName = safe_input($details['firstName']);
		 $query = "SELECT image_locFROM profile_pic WHERE account_id =  $reply_user_id  ";
	$query4profilepic = mysqli_query($link,$query);	
	if(mysqli_num_rows($query4profilepic)==1)
	{
			while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
			{   
			$profile_image = safe_input($profile_pic['image_loc']);
                  echo '   
                           <li class="message panel" style="   list-style:none;">
									 <img src="/'. $profile_image.'" alt="'.$username.'" title="'.$username.'"  class="img-circle" width="50px">
									    	<a href="fp.php?friend_id='.$friend_id.'&username='.$username.'" class="username" style=" padding-left:55px;">'.$firstName.'</a><p style=" padding-left:55px; margin-top:0px;">'.$reply.'</p>
												 <ul class="list-inline font-xs" style=" padding-left:55px; margin-top:-5px;">
									          <li>
											     <a href="javascript:void(0);" class="text-primary"><i class="fa fa-thumbs-up"></i> Like</a>
										      </li>
										      <li>
										     	<a href="javascript:void(0);" class="text-muted">'.humanTiming($time).' ago</a>
										      </li>
									   </ul>
				                  </li>
								 '; 
  }
  }
 }
}
} echo '   <br> 
		  <li>					
		  <form action="reply_insert_shop.php?post_id='.$post_id.'&shop_id='.$shop_id.'&shopName='.$shopName.'" method="POST">	
            <div class="input-group wall-comment-reply">
		    	<input type="text" name="reply" class="form-control input-xs"         placeholder="Comment here..." required>
					<span class="input-group-btn">
						<button type="submit" class="btn btn-xs btn-primary" >
                            <i class="fa fa-reply"></i> Comment
			</button> 
          </span>
				</div>	
				</form>
				</li>							 
								 ';
}
}

 function get_reply_shop_f($post_id)
{ include "include/conxn.php";
//$shop_id = safe_input($_GET['shop_id']);
//$shopName = safe_input($_GET['shopName']);

  $query = "SELECT * FROM reply_shop where post_id = $post_id  ORDER BY datetime ASC LIMIT 5
";
if($query_add2 = mysqli_query($link,$query))
	{
	while($reply_proc = mysqli_fetch_assoc($query_add2))
		 {
	      $reply_user_id = safe_input($reply_proc['reply_user_id']);
	      $reply_id = safe_input($reply_proc['id']);
	      $reply = safe_input($reply_proc['reply']);
	      $timedate = safe_input($reply_proc['datetime']);
		  $time = strtotime($timedate);	  
		 $query = "SELECT * FROM registration where id =   $reply_user_id   LIMIT 5
";
if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
                 $username = safe_input($details['username']);
                 $friend_id = safe_input($details['id']);
                 $firstName = safe_input($details['firstName']);
		 $query = "
         SELECT image_loc FROM profile_pic WHERE account_id =  $reply_user_id ";
	$query4profilepic = mysqli_query($link,$query);	
	if(mysqli_num_rows($query4profilepic)==1)
	{
			while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
			{   
			$profile_image = safe_input($profile_pic['image_loc']);
                  echo '   
                           <li class="message" style=" padding-left:20px;  list-style:none;">
									
									    <p>	<span class="text-info" style=" padding-left:20px; width:100px;">'.$username .'</span> '.$reply.'</p>
				                  </li>
								 '; 
  }
  }
 }
}
}
}
} 

function get_reply_f($post_id)
{ include "include/conxn.php";

 @$friend_id = $_GET['friend_id'];              
 $query = "SELECT * FROM reply where post_id = $post_id  ORDER BY datetime ASC	 LIMIT 5
";
if($query_add2 = mysqli_query($link,$query))
	{
	while($reply_proc = mysqli_fetch_assoc($query_add2))
		 {
	      $reply_user_id = safe_input($reply_proc['reply_user_id']);
	      $reply_id = safe_input($reply_proc['id']);
	      $reply = safe_input($reply_proc['reply']);
	      $timedate = safe_input($reply_proc['datetime']);
		  $time = strtotime($timedate);
		 $query = "SELECT * FROM registration where id =   $reply_user_id   LIMIT 5
";
if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
               @$friend_id = safe_input($_GET['friend_id']);  
              @$username = safe_input($details['username']); 
			 	$firstName = safe_input($details['firstName']);
		 $query = " SELECT image_loc FROM profile_pic WHERE account_id =  $reply_user_id ";
	$query4profilepic = mysqli_query($link,$query);	
	if(mysqli_num_rows($query4profilepic)==1)
	{
			while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
			{   
			$profile_image = $profile_pic['image_loc'];
                  echo '   
                           <li class="message panel padding-top-10">
									 <img src="/'. $profile_image.'"alt="'.$username.'" title="'.$username.'" class="img-circle" width="50px">
									    	<a href="/connection-auth/'.@$username.'" class="username" style=" padding-left:55px;">'.$firstName.' </a><p style=" padding-left:55px; margin-top:0px;">'.$reply.'</p>
												 <ul class="list-inline font-xs" style=" padding-left:55px; margin-top:-20px;">
									          <li>
											     <a href="javascript:void(0);" class="text-primary"><i class="fa fa-thumbs-up"></i> Like</a>
										      </li>
										      <li>
										     	<a href="javascript:void(0);" class="text-muted">'.humanTiming($time).' ago</a>
										      </li>
									   </ul>
				                  </li>
								 '; 
  }
  }
 }
}
} echo '  <br> 
		  <li>					
		  <form action="reply_insert_f.php?post_id='.$post_id.'&friend_id='.@$friend_id.'&username='.@$username.'" method="POST">	
            <div class="input-group wall-comment-reply">
		    	<input type="text" name="reply" class="form-control input-xs"         placeholder="Comment here..." required>
					<span class="input-group-btn">
						<button type="submit" class="btn btn-xs btn-primary" >
                           <i class="fa fa-reply"></i> Comment
			</button> 
          </span>
				</div>	
				</form>
				</li>							 
								 ';
}
}

function get_reply($post_id)
{include "include/conxn.php";        
 @$friend_id = $_GET['friend_id'];  
 @$username = $_GET['username'];  
  $query = "SELECT * FROM reply where post_id = $post_id  ORDER BY datetime ASC LIMIT 5
";
if($query_add2 = mysqli_query($link,$query))
	{
	while($reply_proc = mysqli_fetch_assoc($query_add2))
		 {
	      $reply_user_id = safe_input($reply_proc['reply_user_id']);
	      $reply_id = safe_input($reply_proc['id']);
	      $reply = safe_input($reply_proc['reply']);
	      $timedate = safe_input($reply_proc['datetime']);
		  $time = strtotime($timedate);
		 $query = "SELECT * FROM registration where id =   $reply_user_id   LIMIT 5
";
if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
                 $username = safe_input($details['username']);
                 $friend_id = safe_input($details['id']);
                 $firstName = safe_input($details['firstName']);
		 $query = "SELECT image_loc FROM profile_pic WHERE account_id =  $reply_user_id 
		";
	$query4profilepic = mysqli_query($link,$query);	
    if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
			{   
			$profile_image = $profile_pic['image_loc'];
             echo '   
          <li class="message  " >
		<img src="/'. $profile_image.'"  alt="'.$username.'" title="'.$username.'" class="img-circle" width="50px">
			<a href="fp.php?friend_id='.$friend_id.'&username='.$username.'" class="username" style=" padding-left:55px;">'.$firstName.' </a><p style=" padding-left:55px; margin-top:0px;">'.$reply.'</p>
				 <ul class="list-inline font-xs" style=" padding-left:55px; margin-top:-20px;">
									          <li>
											     <a href="javascript:void(0);" class="text-primary"><i class="fa fa-thumbs-up"></i> Like</a>
										      </li>
										      <li>
										     	<a href="javascript:void(0);" class="text-muted">'.humanTiming($time).' ago</a>
										      </li>
									   </ul>
				                  </li>
								 '; 
								   }
 }
}
} 
echo '  <br> 
		  <div class="" >					
		  <form action="reply_insert.php?post_id='.$post_id.'&friend_id='.$friend_id.'&username='.$username.'" method="POST">	
            <div class="input-group wall-com ment-reply " style=" padding-bottom:10px; padding-left:20px; padding-right:20px;">
		    	<input type="text" name="reply" class="form-control input-xs"         placeholder="Comment here..." required>
					<span class="input-group-btn">
						<button type="submit" class="btn btn-xs btn-primary" >
                            <i class="fa fa-reply"></i> Comment
			</button> 
          </span>
				</div>	
				</form>
				</div>							 
								 ';
}
}

function humanTiming($time)
{
 $time = time() - $time; // to get the time since that moment
$tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }
}

function product_describtion($product_id)
{
 $product_id = safe_input($_GET['product_id']);
$query = " SELECT descrb FROM product where product_id = $product_id LIMIT 30 ";
if($query_add = mysqli_query($link,$query))
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
	      $prdt_desc = safe_input($products['descrb']);
	       echo '<span class=" padding-10">' .$prdt_desc.'</span> ' ;
}
}
}

function product_details($product_id)
{ include "include/conxn.php";
 $product_id = safe_input($_GET['product_id']);
$query = " SELECT * FROM product where product_id = $product_id LIMIT 30 ";
if($query_add = mysqli_query($link,$query))
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
		  $product_id = safe_input($products['product_id']);
          $prdt_name = safe_input($products['name']);
//the stock should be added to database in future to count number of product in stock
	      //$stock = safe_input($products['stock']);
	      $prdt_desc = safe_input($products['descrb']);
	      $shop_id = safe_input($products['shop_id']);
	      $price = safe_input($products['price']);
	      $image_loc = safe_input($products['image_loc']);

	   echo '<h4 class=" padding-10">'.$prdt_name.''.like_button_product($product_id).'</h4> 
<div class=" row padding-10  well"style="">
				<div class=" col-md-12 no-padding   " >
				<ul class="list-inline ">	
						<li>
					<h4 class="text-warning no-padding no-margin">GHS '.$price.' </h4>
						</li>
						</ul>
					</div>
					</div>             
			<div class=" padding-10 ">
				'.$prdt_desc.'
			</div>
					  ' ;
}
}
}


function shop_description($shop_id)
{
	include "include/conxn.php";
	$selshopdescr = "SELECT * FROM shop WHERE shop_id = '$shop_id' LIMIT 1";
	$queryshopdescr = mysqli_query($link,$selshopdescr);
	if(mysqli_num_rows($queryshopdescr) >= 1)
	{
		while($while_shopdescr = mysqli_fetch_assoc($queryshopdescr))
		{
			$shopdescr = safe_input($while_shopdescr['shop_descrb']);
			$shopdescr = strip_tags($shopdescr);
			return $shopdescr;
		}
	}
}

function shop_banner($shop_id)
{
	include "include/conxn.php";
	$selshopbanner = "SELECT image_loc_mini_index FROM banner_pic WHERE shop_id = '$shop_id' LIMIT 1";
	$queryshopbanner = mysqli_query($link,$selshopbanner);
	if(mysqli_num_rows($queryshopbanner) >= 1)
	{
		while($while_shopbanner = mysqli_fetch_assoc($queryshopbanner))
		{
			$shopbanner = safe_input($while_shopbanner['image_loc_mini_index']);
			return $shopbanner;
		}
	}
}

function price_figure($price)
{
$price_o = preg_replace('/[^0-9\.]/ ', '', $price);
return sprintf('%01.2f', $price_o);
}

function shop_tel_number_from_name($shop_id)
{include "include/conxn.php";
$query2 = "SELECT telephone FROM shop WHERE shop_id = '$shop_id' AND mode >= 1 LIMIT 1";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['telephone'];
return safe_input($view_count);
}
}

function product_details_friend($product_id)
{include "include/conxn.php";

$product_id = safe_input($_GET['product_id']);

$query = " SELECT * FROM product where product_id = '$product_id' AND mode >='1' LIMIT 1 ";
if($query_add = mysqli_query($link,$query))
{
while($products = mysqli_fetch_assoc($query_add))
{
$product_id = $products['product_id'];
$prdt_name = $products['name'];
$product_name = ucfirst($prdt_name);
//the stock should be added to database in future to count number of product in stock
//$stock = safe_input($products['stock']);

$prdt_desc = $products['descrb'];
$shop_id = safe_input($products['shop_id']);
$price = $products['price'];
$image_loc = safe_input($products['image_loc']);
$condition = safe_input($products['condition']);
$manufacturer = safe_input($products['manufacturer']);
$min_order = safe_input($products['min_order']);
$color = safe_input($products['color']);


//your products hits
    $date =  date('Y\-m\-d\ ');
	$query = "SELECT * FROM hits_items WHERE date = '$date'  AND shop_id = '$shop_id' AND product_id = '$product_id' LIMIT 1 ";
	$query_run = mysqli_query($link,$query);
	if ($query_count = mysqli_fetch_array($query_run,MYSQLI_ASSOC))
	{
     $new_hits = $query_count['hits'] ;
     $hits = $new_hits + 1;
     $datetime = $query_count['date'] ;
     $querysatus ="UPDATE hits_items SET hits = '$hits' WHERE date = '$datetime' AND shop_id = '$shop_id' AND product_id = '$product_id'";
    $user_auth_info = mysqli_query($link,$querysatus);
	}
	else
	{
	$hits = '1';
	$datetime =  date('Y\-m\-d\ ');
	$query1 = "INSERT INTO hits_items (id ,date,shop_id,product_id,hits)VALUES (NULL, '$datetime', '$shop_id',  '$product_id', '$hits')"; 
	$query_run = mysqli_query($link,$query1);
	}
//----------end

if($manufacturer == "Service")
{
 echo  '<header style="">
		<span class="" style="font-size:2.0em; "> '.$product_name.'</span><hr class="padding-10 no-margin">
		</header>
		Book an <label class="" style="font-weight:600;">Appointment</label>
									<br><label class="padding-top-10 text-muted font-sm" style=""></label><br>
									<div class="row margin-5 padding-5 id="app_hold"><textarea class="form-control padding-10" id="appoint_text" name="appoint_text" placeholder="Describe your situation and add your contact and address location." rows="3" required></textarea> <br>
									<input class="form-control padding-10" id="appoint_date" name="appoint_date" placeholder="DD/MM/YY" required></input> <br><button onClick="book_appointment('.$product_id.','.$shop_id.');" id="btn_app" class="btn btn-success btn-block">Book </button></div>
		                               <p id="app_text_holder"></p>
		<div>
		
				<!-- widget content -->
			<div class="no-padding">
				<div class="smart-accordion-default no-padding" id="accordion-f">
					<div class=" no-padding">
						<div class="panel-heading no-padding">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion-f" href="#collapseOne-1" class="" style="font-size: 1.2em; color:black;" >
									Service Description 
								</a>
							</h4>
						</div>
						<div id="collapseOne-1" class="">
							<div class="panel-body">
								'.$prdt_desc.'
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end widget content --></div>
		<hr class="no-padding no-margin">
	<div class="row" style="padding-left:5px;">		
				
				
		</div>		
		
' ;
}
else
{
echo '
		<div class="row margin-5 padding-5 " >',product_option_full($shop_id,$product_id),'</div>
			
		<hr class="no-padding no-margin">
		<p class="" style="font-size:1.5em; width:100%;">Details</p>
		   <p class=""> Condition : <span class="text-info">'.$condition.'
		</span></p> <p class=""> Manufacturer : <span class="text-info">'.$manufacturer.'
		</span></p> <p class=""> Min. Order : <span class="text-info">'.$min_order.'
		</span></p> <p class=""> Color : <span class="text-info">'.$color.'
		</span></p>
		
	
		<div>
		
				<!-- widget content -->
			<div class="no-padding">
				<div class="smart-accordion-default no-padding" id="accordion-f">
					<div class="no-padding">
						<div class="panel-heading no-padding">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion-f" href="#collapseOne-1" class="collapsed" style="font-size: 1.2em;" >
									Description & Specification <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
								</a>
							</h4>
						</div>
						<div id="collapseOne-1" class="panel-collapse collapse">
							<div class="panel-body " >
								'.$prdt_desc.'
								<strong><em class="text-muted font-xs">	Mykanta Product and Service Price Disclaimer!</em></strong>
<em class="text-muted font-sm">The price and availability of items on Mykanta are subject to change by the Business administrators themselves. </em>
<em class="text-muted font-sm"> Mykanta will make follow-ups on your behalf after completing the order. </em>
<em class="text-muted font-sm"></em>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end widget content --></div>
		<hr class="no-padding no-margin">
	<div class="row" style="padding-left:5px;">		
				<p class="padding-5" style="font-size: 1.4em;" id="cart_box">Delivery Options</p>',delivery_options_at_prdt_page($shop_id),'
				
		</div>		
		
' ;
}
}
}

}
function delivery_options_at_prdt_page($shop_id)
{include "include/conxn.php";
$queryA = " SELECT * FROM delivery_option where shop_id = '$shop_id'  LIMIT 1 ";

$query_Am = mysqli_query($link,$queryA);

if(mysqli_num_rows($query_Am) >= 1)
{
while($products = mysqli_fetch_assoc($query_Am))
{
  $option_1 = $products['option_1'];
  $option_2 = $products['option_2'];
  $option_3 = $products['option_3'];
  
   if ( $option_1 == '1')
  {
     echo '<p class="" style="padding-left:10px; font-size: 1.0em;" > <i class="text-success glyphicon glyphicon-ok"> </i> You can pick up from our store.</p>';
  }
  if ( $option_2 == '1')
  {
     echo '<p class="" style="padding-left:10px; font-size: 1.0em;" > <i class="text-success glyphicon glyphicon-ok"> </i> We can deliver to you.</p>';
  }
  if ( $option_3 == '1')
  {
     echo '<p class="" style="padding-left:10px; font-size: 1.0em;" > <i class="text-success glyphicon glyphicon-ok"> </i>  We allow other courier or delivery agencies</p>';
  }
}
}
else {echo  '<p class="text-danger " style="font-size: 11px;"> No Delivery option available </p>';}
}

function get_product_ur_shop($shop_id)
{
include "include/conxn.php";
	$ver_num = verification_status_decision($shop_id);
	if($ver_num >= 1)
	{
		$query = " SELECT * FROM product where shop_id = '$shop_id' AND mode >= '1' LIMIT 50 ";
	}
	else{
		$query = " SELECT * FROM product where shop_id = '$shop_id' AND mode >= '1' LIMIT 20 ";
	}

$query1 = " SELECT * FROM shop where shop_id = $shop_id ";
$query_add1 = mysqli_query($link,$query1);
while($thisShop = mysqli_fetch_assoc($query_add1))
{
$bus_type = $thisShop['bus_type'];
$thisShopName = ucfirst($thisShop['shopName']);
$shopNameformat= formatUrl($thisShopName); 
}

	
$querym = mysqli_query($link,$query);

if($query_add = mysqli_num_rows($querym))
{
while($products = mysqli_fetch_assoc($querym))
{
$product_id = safe_input($products['product_id']);
$prdt_name_non = safe_input($products['name']);
$prdt_name = safe_input($products['name']);
$prdt = formatUrl($products['name']);
$prduct_name_short = substr($prdt_name, 0, 16). '..';
$prdt_namel = strtolower($prduct_name_short);
$prdt_name_ok = ucwords($prdt_namel);
$prdt_desc = $products['descrb'];
$shop_id = safe_input($products['shop_id']);
$price1 = $products['price'];
$prdt_name_format = formatUrl($prdt_name_non);
$image_loc = $products['image_loc'];
$mode = safe_input($products['mode']);

// price comes from option table
if($price1 != 0)
{ $price = ' 
<p class="text-warning">GHS '.$price1.'</p> '; }
else
{ $price = '
<p class="text-danger">price N/A</p> ';}	    


$query1 = " SELECT * FROM shop where shop_id = $shop_id ";
$query_add1 = mysqli_query($link,$query1);
while($thisShop = mysqli_fetch_assoc($query_add1))
{
$thisShopName = ucfirst($thisShop['shopName']);
$shopNameformat= formatUrl($thisShopName); 
}
if($bus_type == "Service")
{
echo '<li  class=" margin-10 padding-10" style="width:100%; ">
	<div class="row"  style="">
	 <div class="col-sm-3">
			<img src="/img/products_images/mini/'.$image_loc.'"   alt="'.$prdt_name_ok.'" title="'.$prdt_name_ok.'"style="width:auto; height:auto; position:relative;"/>
	 </div>
     <div class="col-sm-9">
	 <h4><em class=""><a class=" " style="font-size:1.0em; color:black; " title="'.$prdt.'" href="/product/'.$shopNameformat.'/'. $product_id .'/'.$prdt.'">'.$prdt_name_ok.'</a></em></h4>
	 <p>'.$prdt_desc.'</p>
     </div>
  </div>
</li>
<hr style="color:black;">

';
}
else
{
echo '<li  class=" margin-10 padding-10" style="color:#5bc0de; width:170px; ">
<div  style="">
	<center style=" width:150px; ">
	<img src="/img/products_images/mini/'.$image_loc.'" onClick="Load_product_content_on_modal('. $product_id .');" style="width:auto; height:auto; position:relative;"  alt="'.$prdt_name_ok.'" title="'.$prdt_name_ok.'"/></center>
<a class=" " style="font-size:1.0em; color:black; " title="'.$prdt_name.'" href="/product/'.$shopNameformat.'/'. $product_id .'/'.$prdt.'">'.$prdt_name_ok.'</a>
<div class="row" style="">
<input type="hidden" id="product_id" value="'. $product_id .'" />
<div class=" col-xs-12 " align="">
',product_option($shop_id,$product_id),' <a class="text-info pull-right" href="/product/'.$shopNameformat.'/'. $product_id .'/'.$prdt.'">view page</a>
</div>
</div>
</div>

</li>
';
}
}
}
else 
{
 echo '<h3 class="text-info strong"> There are no products yet uploaded. </h3>';
}
}

function get_product_ur_shop_on_product_page($shop_id)
{
include "include/conxn.php";
$query = " SELECT * FROM product where shop_id = '$shop_id' AND mode >= '1' LIMIT 25 ";

$querym = mysqli_query($link,$query);

if($query_add = mysqli_num_rows($querym))
{
while($products = mysqli_fetch_assoc($querym))
{
$product_id = safe_input($products['product_id']);
$prdt_name1 = safe_input($products['name']);
$prdt_name = safe_input($products['name']);
$prdt = $products['name'];
$prduct_name_short = substr($prdt_name, 0, 15). '..';
$prdt_namel = strtolower($prduct_name_short);
$prdt_n  = formatUrl(strtolower($prdt));
$prdt_name_ok = ucwords($prdt_namel);
$prdt_desc = safe_input($products['descrb']);
$shop_id = safe_input($products['shop_id']);
$price1 = $products['price'];
$prdt_name_format = formatUrl($prdt_name1);
$image_loc = $products['image_loc'];

// price comes from option table
if($price1 != 0)
{ $price = ' 
<p class="text-warning">GHS '.$price1.'</p> '; }
else
{ $price = '
<p class="text-danger">price N/A</p> ';}	    


$query1 = " SELECT * FROM shop where shop_id = $shop_id ";
$query_add1 = mysqli_query($link,$query1);
while($thisShop = mysqli_fetch_assoc($query_add1))
{
$thisShopName = strtolower($thisShop['shopName']);
$shopNameformat= formatUrl($thisShopName); 
}

echo '
<li  class="no-margin" style="width:120px; ">
<div class="no-padding no-margin" style="">
	<span style=" width:100px; " class="no-padding no-margin">
	<img src="/img/products_images/mini/'.$image_loc.'" onClick="Load_product_content_on_modal('. $product_id .');"  style="max-width:100px; max-height:150px;  position:relative;" alt="'.$prdt_name1.'" title="'.$prdt_name1.'"/></span><p>
<a class=" " style="font-size:0.8em; color:black; " title="'.$prdt_name1.'" href="/product/'.$shopNameformat.'/'. $product_id .'/'.$prdt_n.'">'.$prdt_name_ok.'</a></p>
<div class="row" style="">
<input type="hidden" id="product_id" value="'. $product_id .'" />
</div>
</div>

</li>

';
}
}
else 
{
 echo '<h3 class="text-info strong"> There are no products yet uploaded. </h3>';
}
}


function get_product_pic($product_id)
{include "include/conxn.php";

$query = "SELECT * FROM product where product_id = $product_id LIMIT 30 ";
if($query_add = mysqli_query($link,$query))
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
		  $image_loc = safe_input($products['image_loc']); 
		  $name = safe_input($products['name']); 
		  echo
 		  '<img src="/img/products_images/'.$image_loc.'" alt="'.$name.'" title="'.$name.'" width="100%" class="img-rounded">';
		  }
		  }
		  }

function get_product_pic_class($product_id)
{include "include/conxn.php";
$query = "SELECT * FROM product where product_id = '$product_id' LIMIT 1
";
if($query_add = mysqli_query($link,$query))
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
		  $image_loc = $products['image_loc']; 
		  echo $image_loc ;
          }
		  }
		  }


function get_product_pic_of_4($product_id)
{include "include/conxn.php";
$query11 = " SELECT * FROM product where product_id = $product_id LIMIT 1 ";
if($query_add11 = mysqli_query($link,$query11))
{
while($products11 = mysqli_fetch_assoc($query_add11))
{
$image_loc11 = safe_input($products11['image_loc']);
$name = safe_input($products11['name']);
echo '<li class=" no-padding image4" ><img src="/img/products_images/mini/'.$image_loc11.'" alt="'.$name.'" title="'.$name.'" onclick="display_product(\'' . $image_loc11 . '\')" class="img" id="im" style="height:50px; width:50px;"/></li>';
}
}

$query = " SELECT * FROM product_image_4 where product_id = $product_id LIMIT 7 ";
if($query_add = mysqli_query($link,$query))
{
while($products = mysqli_fetch_assoc($query_add))
{
$image_loc = safe_input($products['image_loc']); 
$id = safe_input($products['id']); 
$name = safe_input($products11['name']);
echo

'<li class=" no-padding image4" ><img src="/img/products_images/mini/'.$image_loc.'" onclick="display_product(\'' . $image_loc . '\')"  alt="'.$name.'" title="'.$name.'" class="img" id="im" style="height:50px; width:50px;"/></li>';
}
}
else {
echo " no image";
}
}

function gallery_user($user_id)
{include "include/conxn.php";

$query = "SELECT * FROM `account_comment` WHERE `image_loc` != 'NULL' && `owner_id` =$user_id && `account_id` =$user_id  ORDER BY id DESC ";

if($query_add = mysqli_query($link,$query))
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
$image_loc = safe_input($products['image_loc']); 
$id = safe_input($products['id']); 
	  echo
'	 
<li class=" " style="height:70px; padding:2px;"><a class="fancybox" href="img/comments_images/'.$image_loc.'">
						<img class="img-thumbnail" src="img/comments_images/'.$image_loc.'"" style="height:70px;" alt="GIF" title="GIF"/></a></li>	';	 }
		  }
		  else {
		  echo " no image";
}
		  }

function gallery_user_friend($friend_id)
{include "include/conxn.php";
$query = "SELECT * FROM `account_comment` WHERE `image_loc` != 'NULL' && `owner_id` =$friend_id && `account_id` =$friend_id ORDER BY id DESC ";

if($query_add = mysqli_query($link,$query))
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
$image_loc = safe_input($products['image_loc']);
 $id = safe_input($products['id']); 
	  echo
'	 
<li class=" no-padding image4" style="height:70px; padding:1px;"><a class="fancybox" href="img/comments_images/'.$image_loc.'">
						<img class="img-thumbnail" src="img/comments_images/'.$image_loc.'" width="80" alt="GIF" title="GIF"/></a></li>	';	 }
		  }
		  else {
		  echo " no image";
		  }
		  }

function gallery_shop($shop_id)
{include "include/conxn.php";

$query = " SELECT * FROM `shop_comment` WHERE `image_loc` != 'NULL' && `shop_id` =$shop_id ORDER BY id ASC ";
if($query_add = mysqli_query($link,$query))
	{
	while($products = mysqli_fetch_assoc($query_add))
		 {
$image_loc = safe_input($products['image_loc']);
 $id = safe_input($products['id']); 
	  echo
'	 
<li class=" " style="height:70px; padding:2px;"><a class="fancybox" href="img/shop_comments_images/'.$image_loc.'">
						<img class="img-thumbnail" src="img/shop_comments_images/'.$image_loc.'" style="height:70px;" title="smile"/></a></li>	';	 }
		  }
		  else {
		  echo " no image";
		  }
		  }
		  
function product_option($shop_id,$product_id)
{
include "include/conxn.php";
$query_option = " SELECT * FROM product_option where product_id = '$product_id' LIMIT 2";

$query_o = mysqli_query($link,$query_option);

if($query_op = mysqli_num_rows($query_o))
{
while($products_o = mysqli_fetch_assoc($query_o))
{
	 $spec_name = $products_o['spec_option'];
	 $stock = $products_o['stock'];
	 $spec_option = substr($spec_name, 0, 11);
	 $price = price_figure($products_o['price']);
	 
	 //count of product options 
	 $query = "SELECT COUNT(id) FROM product_option WHERE product_id ='$product_id'";

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$opt_no = $query_count[0];
if($opt_no == 1){ $opt_no = '';}else if($opt_no == 2){$opt_no = '';}else if($opt_no == 3){$opt_no = '1 more';}else if($opt_no == 4){$opt_no = '2 more';}else if($opt_no == 5){$opt_no = '3 more';}

		 if(mysqli_num_rows($query_o) <=1)
		 {
		 echo '<div class="row "><div class="col-xs-12 "><p class="strong" style="font-size: 1.0em; color:grey;">GHS '.$price.'</p></div></div>' ;
		 }
	 else if(mysqli_num_rows($query_o) >=2)
	 {
	 echo '<div class="row no-bottom-padding" style=""><div class="col-xs-12 "><p class="text-muted " style="font-size: 0.8em;">'.$spec_option.'<span class="text-muted pull-right"  style="font-size:0.8em;"> GHS '.$price.'</span></p></div></div>' ;
	 } 
		 else 
		 {
		 echo '<p class="text-info " style="width:100%; font-size: 1.0em;">'.$spec_option.'</p>' ;
		 }
}
echo $opt_no.' ';
}
else
{
echo '<p class="text-danger" style="width:100%;font-size: 1.0em;">Call owner</p>' ;
}
}
function product_option_full($shop_id,$product_id)
{
include "include/conxn.php";
$query_option = " SELECT * FROM product_option where product_id = '$product_id' LIMIT 5";

$query_o = mysqli_query($link,$query_option);

if($query_op = mysqli_num_rows($query_o))
{
while($products_o = mysqli_fetch_assoc($query_o))
{
 $spec_name = $products_o['spec_option'];
  $spec_option = substr($spec_name, 0, 13).'.';
 $option_id = $products_o['id'];
 $price = $products_o['price'];
 $stock = $products_o['stock'];
 
 if(mysqli_num_rows($query_o) >=1)
 {
 echo '<div class="row padding-10" style="">
 <div class="col-xs-8 ">
  <p class="text-default" style=" font-size: 1.0em;"><span class="" style="font-size: 1.2em;">'.$spec_option.' </span><span class="text-warning  "> '.$stock.' <i class="glyphicon glyphicon-shopping-cart"></i> </span> <span class="pull-right" style=" font-size: 0.8em;">  GHS. </span><span class="pull-right " style=" font-size: 1.5em;"> '.$price.' </span> </p>
 </div>
 <div class="col col-md-4 col-sm-4 col-xs-4 no-padding" id="cart_box'.$option_id.'">',add_to_cart_verify_option($shop_id,$option_id);
echo'</div>
</div>'  ;
 }
 else 
{
 echo '<div class="row"   style="">
<div class="col col-md-12 col-sm-12 col-xs-12"></div></div>' ;
 }
}
}
else
{
echo '<div class="row"   style="">
<div class="col col-md-12 col-sm-12 col-xs-12"></div></div>' ;
}
}
function verification_status_decision($shop_id)
{	include "include/conxn.php";
	$query = "SELECT type FROM verify WHERE shop_id = '$shop_id' LIMIT 1  ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
		while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
		{
			$v_code = $query_run_verify['type'];

			if( $v_code == 1)
			{ return $verify_type ='1';}
			else if( $v_code == 2)
			{return  $verify_type = '2';}
			else if( $v_code == 3)
			{return  $verify_type = '3';}
			else if( $v_code == 0)
			{return  $verify_type = ' 0';}
			else
			{
				return '0';
			}
		}
	}
	else
	{
		return '0';
	}

}
function add_to_cart_verify_option($shop_id,$option_id)
{include "include/conxn.php";

if(isset($_SESSION['id']) )
{
$account_id = $_SESSION['id'];
}else{
$account_id = $_SESSION['vis_id'];
}

$queryp = " SELECT * FROM product_option where id = '$option_id'  ";
$query_Amo = mysqli_query($link,$queryp);
if(mysqli_num_rows($query_Amo))
{
while($kkk = mysqli_fetch_assoc($query_Amo))
{
  $price = $kkk['price'];
  $stock = $kkk['stock'];
  
$queryA = " SELECT * FROM verify where shop_id = '$shop_id' AND type ='1' LIMIT 1 ";
$query_Am = mysqli_query($link,$queryA);
if(mysqli_num_rows($query_Am))
{
while($products = mysqli_fetch_assoc($query_Am))
{
$product_id = $_GET['product_id'];

$query = " SELECT * FROM cart_vis WHERE account_id ='$account_id' AND option_id = '$option_id' AND order_code='0'  LIMIT 1 ";
$query_A = mysqli_query($link,$query);
if(mysqli_num_rows($query_A))
{
while($productsAm = mysqli_fetch_assoc($query_A))
{
 echo '<div class=" text-warning " style="margin-top:3px;"> <span class= " " >Added to cart</span></div> ';

}
}
else
{
$query_op = " SELECT min_order FROM product where product_id = '$product_id'";
if($query_op1 = mysqli_query($link,$query_op))
{
while($products_op = mysqli_fetch_assoc($query_op1))
{
$min_order = $products_op['min_order'];

echo '<label class=" ">Qty <input type="number" id="item_stock_'.$option_id.'" min="'.$min_order.'" max="'.$stock.'" class=""  style="width:35px;" value="'.$min_order.'"></input>
<button type="button" style="margin-right:5px;" onCLick="add_to_cart_function('.$product_id.','.$option_id.','.$price.')" class= "btn btn-default btn-md"  style="width:50px;"><i class="glyphicon glyphicon-shopping-cart"></i> </button><label>';
}
}
}
}
}}
}
}
function get_product_info_mpower($account_id)
{ $query = " SELECT * FROM cart where account_id = $account_id LIMIT 10 ";
if($query_add = mysqli_query($link,$query))
	{
      while($products = mysqli_fetch_assoc($query_add))
		 {
	      $product_id = safe_input($products['product_id']);
	      $prdt_name = safe_input($products['name']);
          $price = safe_input($products['price']);
          $quantity = int(1);
	      $invoice = new MPower_Checkout_Invoice();

		 echo ''.  $invoice->addItem($prdt_name,1,$price,$price).'';  
  }
 }
 else 
 {
  echo "no items in your cart";
 }
}

function get_cart($user_id)
{include "include/conxn.php";
$query = " SELECT * FROM cart where account_id = $user_id ORDER BY cart_id DESC LIMIT 10  ";
$query1 = mysqli_query($link,$query);
if($query_add = mysqli_num_rows($query1))
	{		
while($products = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
		 {
	      $product_id = safe_input($products['product_id']);
	      $cart_id = safe_input($products['cart_id']);
	      $prdt_name = safe_input($products['name']);
          $price = safe_input($products['price']);
          $account_id_ofusercart = safe_input($products['account_id']);
          $stock = safe_input($products['stock']); 		  
	   echo '   
       <li><small>
        <table border="0" style="background-color:white; " width="100%" cellpadding="0" cellspacing="0">
		 <tr>
		  <td height="25" width="120">
		     <span class="text-muted">'.$prdt_name.'</span>
		  </td>
		  <td>
	        <span class="text-primary"  width="40">GHS '.$price.'</span>
		</td>
		<td align="center">
	        <span class="text-primary"  width="50"> '.$stock.'</span>
		</td>
		 <td width="20" align="center">
	        <a href="/include/delete_prdt_cart.php?id='.$cart_id.'">x</a>
		</td>
         </tr>
	   </table>
	   </small>
	  </li>
	    '; 
  }
			echo '</div>
     <div id="check_out"><a href="check_out.php">  <button class="btn btn-primary btn-xs" >Check out</button></a>
	 <a href="/include/clear_cart.php?id='.$account_id_ofusercart.'">  <button class="btn btn-primary btn-xs" > Clear Cart</button></a></div>
  '; 
 }
}

function get_cart_list($account_id)
{
//Check the databse products_added's table and sum up the total of all added items to cart
					$cart_itemsTotal = mysqli_query($link,"select sum(price) as `items_total` from `cart` where `account_id` = '".$account_id."'");		
					//Get all these items
					$vpb_get_itemsTotal = mysqli_fetch_array($cart_itemsTotal);
					$groundtotal = ($vpb_get_itemsTotal["items_total"]); //Get total of all added items		
$_SESSION['total'] =$groundtotal;

$query = " SELECT * FROM cart where account_id = $account_id LIMIT 10 ";

if($query_add = mysqli_query($link,$query))
	{
	echo'
	<small>
        <table border="0" class="panel-body" width="100%" cellpadding="0" cellspacing="0">
		 <tr>
		  <td height="25" width="370">
		     <span class="text-muted">Product names</span>
		  </td>
		  <td>
	        <span class="text-muted"  width="50">Amount</span>
		</td> <td>
	        <span class="text-muted"  width="40">Qty</span>
		</td>
		 <td width="20">
		</td>
         </tr>
	   </table>
	   </small>
';
    while($products = mysqli_fetch_assoc($query_add))
		 {
	      $product_id = safe_input($products['product_id']);
	      $prdt_name = safe_input($products['name']);
          $price = safe_input($products['price']);
          $quantity = 1;
 echo '
<small>
        <table border="0" style="background-color:white; " width="100%" cellpadding="2" cellspacing="2">
		 <tr>
		  <td height="25" width="350">
		     <span class="text-muted">'.$prdt_name.'</span>
		  </td>
		  <td>
	        <span class="text-primary"  width="50">GHS '.$price.'</span>
		</td>
		<td align="center">
	        <span class="text-primary"  width="40"> '.$quantity.'</span>
		</td>
		 <td width="20" align="center">
	        <div class="fa fa-times"></div>
		</td>
         </tr>
	   </table>
	   </small>
'; 
  }
      echo '
	   <small>
        <table border="0" style="background-color:white; " width="100%" cellpadding="2" cellspacing="2">
		 <tr>
		  <td height="25" width="350">
		    <h5 class="text-primary">  Total </h5>
		  </td>
		  <td>
	        <h4 class="text-warning"  width="50">GHS '.$groundtotal.'</h4>
		</td>
		<td align="center"> 
		</td>
		 <td width="20" align="center">
		</td>
         </tr>
	   </table>
	   </small>
	    '; 
}
session_write_close();
}
function footer_vis()
{
echo'<hr>
<footer class="row padding-10  hidden-sm  hidden-xs">
	 <center class ="text-default " style="">
		 <ul class="list-inline ">
		  <li class="" style="font-size:0.9em; text-align:left; vertical-align:top;">
		    <ul class=""  style="list-style:none;">
				 <li >About</li>
				 <li><a href="/about_us" >Mykanta</a>  </li>
				 <li><a href="/who_we_are" >Who we are</a>  </li>
				 <li><a href="/news_press" >News and Press</a>  </li>
				 <li><a href="/contact_us" >Contact us</a>  </li>
			</ul>
		  </li>
		  <li class="" style="font-size:0.9em; text-align:left; vertical-align:top;">
		    <ul class="" style="list-style:none;">
					<li>Help</li>
					<li><a href="/faq" >FAQ </a></li>
					<li><a href="/safe_tr_guide" >Safe Trading Guide</a> </li>
					<li><a href="/support" >Support</a>  </li>
					<li><a href="#" class="" data-target="#myModal" data-toggle="modal" >Sign Up</a>  </li>
			</ul>
		  </li>
		  <li class="" style="font-size:0.9em; text-align:left; vertical-align:top;" >
		    <ul class="" style="list-style:none;">
				 <li>Legal</li>
				 <li><a href="/TermandConditions" >Terms and Conditions </a></li>
				 <li><a href="/data_policy" >Data and Privacy Policy</a></li>
				 	<li><a href="/intellectual_property_rights" >Intellectual Property Right</a></li>
			</ul>
		  </li>
		  <li class="" style="font-size:0.9em; text-align:left; vertical-align:top;">
		    <ul class="" style="list-style:none;">
				 <li>Follow Us</li>
				  <li> <a href="https://www.facebook.com/pages/mykantacom/919705858060926" target="blank">Facebook </a></li>
				  <li> <a href="https://twitter.com/My_kanta" target="blank"> Twitter </a></li>
			
			</ul>
		  </li>
		  <li class="" style="font-size:0.9em; text-align:left;vertical-align:top;">
		    <ul class="" style="list-style:none;">
				 <li style="margin-left:50px;"><span id="siteseal"><script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=wc3Y8SYyHgJki8bOZDPtYJVd6n2Hdlv8hZWAPHUhTtuY5gDjTHzvV91l48QC"></script></span> </li> 
			</ul>
		  </li>
		</ul>
	</center>
		<center class ="text-default" style="font-size:9pt;">
		 <p style="font-size:0.8em; text-muted; "> Copyright © 2016 Hipi LLC. All Rights Reserved.</p>
		</center>
</footer>
<footer class="row padding-10 hidden-sm hidden-md hidden-lg">
	 <center class ="" style="">
		  <p class ="text-default pull-left" style="margin-bottom:-1px; font-size:9pt;">
				 <ul class="list-inline center">
				   <li><a href="/TermandConditions.php" >Terms and Conditions </a></li>
				 </ul>
				</p>			
	</center>
	<center class ="text-default" style="font-size:9pt;">
		<p style="font-size:0.8em; text-muted; "> Copyright © 2018 Mykanta Inc. All Rights Reserved.</p>
	</center>
</footer>'; 
}
function smiles_reev($post_id)
{
include "include/conxn.php";

//selecting all of reev
$queryq = "SELECT number_of_smiles FROM smiles_reev
WHERE reev_id = '$post_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser)>=1)
	{
	while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
		{
		 $number_of_smiles =$flik_info['number_of_smiles'];
	
			 echo '<span id="smile_box'.$post_id.'"><img  class="text-muted font-sm" src="/img/site_img/smiles/smile_3.png" style="height:30px; margin-top:-18px;" title="smile"/>'. $number_of_smiles.'</span>';
		}
	}
}
function smiles_reev_display_info($post_id)
{
include "include/conxn.php";

//selecting all of reev
$queryq = "SELECT number_of_smiles FROM smiles_reev
WHERE reev_id = '$post_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser)>=1)
	{
	while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
		{
		 $number_of_smiles =$flik_info['number_of_smiles'];
		 echo '<span id="smile_box'.$post_id.'"  style="font-size:1.0em;" class="text-muted"><img  class="" src="/img/site_img/smiles/smile_3.png" style="height:22px; margin-top:-13px;"/ title="Smile" alt="Smile" > '. $number_of_smiles.' <span class="hidden-xs hidden-sm text-muted " style=" "> smile(s)</span></span>';
		}
	}
	else
		{
			echo '<span id="smile_box'.$post_id.'" style="font-size:1.0em;" class="text-muted"><img  class="" src="/img/site_img/smiles/smile_3.png" style="height:22px; margin-top:-13px;"  title="Smile" alt="Smile" /> 0 <span class="hidden-xs hidden-sm text-muted" style=" "> smile(s)</span></span>';
		}
}

function get_shop_views_for_upadting($shop_id)
{
include "include/conxn.php";
$ip = get_client_ip();

//defined id for visitors use 100
$account_id = '100';

$query = "SELECT COUNT(viewer_id) FROM views WHERE shop_id = '$shop_id'";

$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];

$query = "SELECT * FROM views WHERE viewer_id = '$account_id' && shop_id ='$shop_id' && client_ip ='$ip' LIMIT 1 ";
$query_run = mysqli_query($link,$query);

if ($query_count = mysqli_fetch_row($query_run))
{

}
else
{

$datetime =  date('Y\-m\-d\ H:i:s');
$query1 = "INSERT INTO views (id ,viewer_id,shop_id,datetime,client_ip)VALUES (NULL, '$account_id', '$shop_id', '$datetime', '$ip')"; 

if($query_run = mysqli_query($link,$query1))
{

}
}
//your hits
    $date =  date('Y\-m\-d\ ');
	$query = "SELECT * FROM hits WHERE date = '$date'  AND shop_id = '$shop_id' LIMIT 1 ";
	$query_run = mysqli_query($link,$query);
	if ($query_count = mysqli_fetch_array($query_run,MYSQLI_ASSOC))
	{
     $new_hits = $query_count['hits'] ;
     $hits = $new_hits + 1;
     $datetime = $query_count['date'] ;
     $querysatus =" UPDATE hits SET hits = '$hits' WHERE date = '$datetime' AND shop_id = '$shop_id'";
    $user_auth_info = mysqli_query($link,$querysatus);
	}
	else
	{
	$hits = '1';
	$datetime =  date('Y\-m\-d\ ');
	$query1 = "INSERT INTO hits (id ,date,shop_id,hits)VALUES (NULL, '$datetime', '$shop_id', '$hits')"; 
	$query_run = mysqli_query($link,$query1);
	
	}
//----------end
echo $view_count;
}
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function friend_id_from_reev($reev_id)
{include "include/conxn.php";
$query2 = "SELECT owner_id FROM account_comment WHERE id = '$reev_id'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$owner_id = $query_count['owner_id'];

return safe_input($owner_id);
}
}
function friend_image_from_reev($reev_id)
{include "include/conxn.php";
$query2 = "SELECT image_loc FROM account_comment WHERE id = '$reev_id'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$owner_id = $query_count['image_loc'];

return safe_input($owner_id);
}
}
function username_only($user_id)
{include "include/conxn.php";

$query = "SELECT username FROM registration where id = $user_id   LIMIT 1
";
if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{

$username = safe_input($details['username']);
echo   $username = ' <i class="fa fa-user"></i> '.ucwords(strtolower($username)).' ';

}
}
}
function get_profile_pic_only_name($user_id)
{include "include/conxn.php";

$query = " SELECT image_loc FROM profile_pic WHERE account_id = $user_id ";
$query4profilepic = mysqli_query($link,$query);	
if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   

echo '/img/avatars/mini/'.$profile_pic['image_loc'];

}

}
function hastag_text()
{include "include/conxn.php";  	
//$userThis_id = $_SESSION['id'];
 $tag_raw = $_GET['tag_id'];
 $new_str  = preg_replace('/[^A-Za-z0-9\_\ ]/ ', '', $tag_raw);
$hashtag = safe_input($new_str);
 $tag = '#'.$hashtag;

   $param = "%{$tag}%";
$all_friends = array();
 
$queryz = "SELECT * FROM account_comment  where owner_id = account_id AND comment like '$param' ORDER BY commentDate DESC LIMIT 5";
$query_add = mysqli_query($link,$queryz);
echo '';

if(mysqli_num_rows($query_add ) > 0){
while($products = mysqli_fetch_assoc($query_add))  //start
{
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$comment4 = $products['comment'];
$comment_raw =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
$comment = htmlspecialchars($products['comment']);
	//$comment1 = convertHashtags($comment);
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$image_loc = $products['image_loc'];
$datetime = strtotime($products['commentDate']);
$myfile_total = $products['myfile_total'];
$datetime = date("D,d M Y", $datetime);
$post_id = safe_input($products['id']);
$comment_twitter = substr($comment, 0, 113). '...';
	if(strlen($comment_raw)<149)
	{ $comment_short = substr($comment_raw, 0, 150); $comment1 = convertHashtags($comment_short);}
	else{$comment_short = substr($comment_raw, 0, 180);$comment1 = convertHashtags($comment_short). ' <p class=""><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a><p>';  }
echo '
<div class=" padding-10 ">
<ul style="list-style:none; margin-left:-60px;">
<li class="message ">
 <ul class="list-inline" style="margin-left:30px; margin-top:0px;"><li>', get_status_pic_of_sender($account_id), '</li><li class="no-padding" style="margin-top:-10px;"><span class="padding-5" style="list-style:none; margin-top:-10px;"><p style=" margin-bottom:2px;"> ', get_status_name($account_id), '</p><p  style=" margin-bottom:-30px;" class="text-muted font-xs">
	'.$datetime.'
	</p> </span></li> </ul>';
//Check if image location is defined						 
if(($myfile_total != NULL && $myfile_total >= 1 ))
{
echo'<li style="padding-left:50px; margin-top:5px; margin-bottom:10px;">

<div class="row ">
<p class="no-padding " id="gif_image_holder_'.$post_id.'"><a class="fancybox" href="/img/comments_images/'.$image_loc.'.gif">
	<img class="img img-rounded pull-left padding-5" src="/img/comments_images/mini/'.$image_loc.'.jpg" width="50%" height="auto" title="'.ucwords($title).'"/></a><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p> <span id="load_reev_text_more'.$post_id.'">'. $comment1.'</span>
	</p>	
</div>
</li>

<li class="message" style="margin-top:-15px; padding-left:55px;">

<ul class="list-inline  " >	
 
<div class="row padding-10" style=" ">
    <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" >
	</div>
	<div class=" col-xs-12 col-sm-12 col-md-12 padding-5"id="load_comments'.$post_id.'" >
       <ul class="list-inline" style="margin-left:-20px;">
	    <li>', myfile_total($post_id),'</li>
	   <li>',smiles_reev_display_info($post_id),'</li>
		 <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class=""> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;"title="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>
				 	<li class="pull-right"style="margin-right:10px;" >			
	     <span>
			<ul style="list-style:none;">
				<li class="no-padding">
					<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
				
					 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'http://twitter.com/share?url=http://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="http://twitter.com/share?url=http://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' ->   http://mykanta.com/reev_load/'.$post_id.'" data-action="share/whatsapp/share"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
						</ul>
				</li>
			 </ul>
		</span>
	</li>
		</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>


</ul>
	
</li>
</ul>
</div><hr class="no-margin" style="border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;">
';
}else 
{
echo'<li style="padding-left:50px;">

<div class="row " style="margin-left:-10px;">
<div class="padding-10"><p class="" ><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p><p class="no-margin" ><span id="load_reev_text_more'.$post_id.'">'. $comment1.'</span></p></p>	
</div>
</div>
</li>

<li class="message" style="margin-top:-15px; padding-left:60px;">

<ul class="list-inline  " >	
 
<div class="row padding-5" style="">
    <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" >
	</div>
	<div class=" col-xs-12 col-sm-12 col-md-12 no-padding " id="load_comments'.$post_id.'" >
    <ul class="list-inline">
				 
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;" title="comment"/> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm  text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>	
				  	<li class="pull-right"style="margin-right:15px;" >			
	     <span>
			<ul style="list-style:none;">
				<li class="no-padding">
					<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
				
					<ul class="dropdown-menu no-padding pull-right " style="margin-top:-48px;" >
						<li class="pull-left">
 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>             	</li>
					</ul>
				</li>
			 </ul>
		</span>
	</li>
				 </ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>


</ul>
	
</li>
</ul>	

</div><hr class="no-margin" style="border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;">	
';
}
}

}else { echo '<p class="padding-10 text-muted" style="margin-left:10px;">No Reevs on this Tag.</p>'; }
//end
if(isset($post_id))
{
echo '
 <center id="load_more_reevs_tag5" class=" padding-10 " align="center" style="height:100px; width:auto;"  ><button onclick="load_more_reevs_tag_pub(5,'.$post_id.');"class="load_reev_button" id="load_reev_button" value="'.$hashtag.'">
          <i class="fa fa-sm fa-arrow-down"style=""></i>  Old Reevs </button> 
      </center>
	  <div id="load_more_reevs" class="no-padding" style="height:auto;"> </div>';
	 echo  '<br> <DIV>';  include "inc/footer.php"; echo '</DIV>';}

 
 }

 function convertHashtags($str){
 // $new_str  = preg_replace('/[^A-Za-z0-9\_\ ]/ ', '', $str);
	$regex = "/#+([a-zA-Z0-9_]+)/";
	$str = preg_replace($regex, '<a href="/hashtags/$1" style="color:orange;">$0</a>', $str);
	return $str;
}
function  get_shop_suggested()
{ include "include/conxn.php";
$query = "SELECT shop_id FROM `shop`  WHERE mode = '1' ORDER BY RAND() LIMIT 0 , 5 ";

$advert_query = mysqli_query($link,$query);

if($advert_query2  = mysqli_num_rows($advert_query))
{   echo '<ul class="list-inline padding-10 margin-10" >
';
while($advert_query2  = mysqli_fetch_array($advert_query,MYSQLI_ASSOC))
{  
$shop_id = safe_input($advert_query2['shop_id']);

$queryA = "SELECT shopName,shop_descrb FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 5 ";
$query4user_info = mysqli_query($link,$queryA);
if($queryAi  = mysqli_num_rows($query4user_info))
{

while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{

$string = $allpalls_info['shopName'];
$shopName = substr($string, 0, 25).'...';
$shopName1 = formatUrl($string);
$string_descrb = $allpalls_info['shop_descrb']; 
$shop_descrb = substr($string_descrb, 0, 35). '...';

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

if($banner_image == "/img/banners/mini/banner.png")
{
echo'<li class="no-padding" style="h width:100%; ">

<div class="padding-bottom-10 "  align="center" style= " width:100%;">
		 <a  href="/business/'.$shopName1.'" class=" no-padding " ><img src="/'. $banner_image.'" title="'.$shopName.'"alt="change" class="img" style= " height:auto; width:100%;"></a>
		</div> 
		
<div class="row  well-light " style="padding-top:10px; background-color:; height:60px;">
<div class=" panel well-light col-md-12 padding-10">
<strong style="color:black;"> <a  href="/business-link/'.$shopName1.'" class=" no-padding " >'.$shopName.'</a> </strong>
<p class="text-muted"style="font-size:0.7em;">'.$shop_descrb.'</p> 
</div> 

</div> 
</li>
';
}
else{
echo'<li class="no-padding" style= "width:100%;">
 
		 <strong  > <a href="/business-link/'.$shopName1.'" class="no-padding "style="color:#000000; font-size:0.8em;">  <a  href="/business/'.$shopName1.'" class=" no-padding " ><img src="/'. $banner_image.'" alt="change" class="img " title="'.$shopName.'" style= "height:auto; width:100%;"></a>
 	
 
'.$shopName.'</a> </strong>
<p class="text-muted"style=" font-size:0.7em;">'.$shop_descrb.'</p>
 
</li>
';
}


} 
}
}
}
}
echo '</ul>';
}
else{
echo  '<p class="text-info"></p>';
}
}
function conn_suggest_desktop()
{
//collecting suggested friends by mykanta for first login 
 include "include/conxn.php";	 
 //include "./funcxn.php";

 //$all_friends = connection_ids_only();
 //echo $all_friends_new = implode(',',$all_friends);
 //$range =  implode(',',$all_friends) ;
 //$range1 = explode(',',$all_friends);
$query1 = "SELECT * FROM registration  ORDER BY RAND() LIMIT 5";
 
if ($query4user1 = mysqli_query($link,$query1))
{  
 while($mysfrn = mysqli_fetch_array($query4user1,MYSQLI_ASSOC))
	 {
	     $firstName  = $mysfrn['firstName'];
		 $username1  = $mysfrn['username'];
		 $username = substr($username1, 0, 20);
		 $friends_able_id  = $mysfrn['id'];
		 $username = substr($username1, 0, 8). '';
		 
		 
		   $querystmt2 = $link->prepare("SELECT con_req FROM user_pref WHERE user_id = ? ");
           $querystmt2->bind_param('i',$current_id);
           $querystmt2->execute() ;
           $querystmt2->store_result();
           $querystmt2->bind_result( $con_req);
            if($querystmt2->fetch())
              {
          	  $row = array('con_req'=> $con_req);
               $con_req = $row['con_req'];  
                if( $con_req >= 1) {$one =  1;} else { $one =0;}
                  }else $one =  1;
		 
		 if ( $one >=1 && get_friend_no_of_reev_proc($friends_able_id) >= 1)
		 {
		  echo   '
				  	<ul class="list-inline no-padding">
						   <li style="width:60px;"> ',get_profile_pic_friend($friends_able_id),'</li>
						   <li style="width:90px;"><a class="" style="font-size:1.0em; color:black;" href="/connection-auth/'.$username1.'" title="'.$username1.'"> '.ucwords($username).'</a></li>
						 <li id ="accept_friend_box'.$friends_able_id.'" class="padding-5">
						 
						 <div class="text-muted no-padding" style="font-size:0.8em;">
							',get_friend_no_of_reev($friends_able_id) ,'</span><span class="padding-5  text-default">  <span style=""> Reevs </span>
						 </div>
						 
					  </li>
					 </ul>
					';
			 
		   }	
        
		   } 	  
	  }
	
	}
function  get_friend_no_of_reev_proc($user_id)
{ include "include/conxn.php";
 
$query = "SELECT COUNT(id) FROM account_comment WHERE owner_id ='$user_id' AND image_loc != 'NULL' ";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

return $friend_count;
} 
//used for calling the tags of a user
	function tags_of_user($user_id)
	{include "include/conxn.php";  	
	    $querystmt2 = $link->prepare("SELECT tags FROM tag_interest WHERE user_id = ? ");
        $querystmt2->bind_param('i',$user_id);
        $querystmt2->execute() ;
        $querystmt2->store_result();
        $querystmt2->bind_result( $con_req);
         if($querystmt2->fetch())
           {
           $row = array('con_req'=> $con_req);
          echo  $con_req = $row['con_req'];  
	       }
	}
function  get_friend_no_of_reev($user_id)
{ include "include/conxn.php";

$query = "SELECT COUNT(id) FROM account_comment WHERE owner_id ='$user_id' AND image_loc !='NULL' ";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

echo $friend_count;
}


function imncoming_hashtags()
{
  include "include/conxn.php";
  $param = "%#%";
 $query = $link->prepare("  SELECT comment FROM account_comment  WHERE comment like ?  ORDER BY commentDate DESC LIMIT 5;");
 $query->bind_param('s',$param );  
  if(  $query->execute( ) )
	 {
	   $query->store_result();
       $query->bind_result($comment);
	   while( $query->fetch() )
	      {  
		  $query_row1 = array( 'comment'=> $comment );
		   $comment = $query_row1['comment'];
		   $new_string = array();
		   $new_string2 = array();
		 
		   $called_tags2 = reveal_hashtags_raw($comment);
		   array_push($new_string, $called_tags2);

		   $countries = array_unique($new_string);
		   $count =count($countries[0]);
		   for ($x = 0;$x < $count ;$x++)
			{
			 echo $new_string[$x].'<br>';
			}  
        }	
    } 	
 }   



function comment_hashtags_nav()
{
  include "include/conxn.php";
  $param = 2;
 $query = $link->prepare("  SELECT tag,amount FROM hashtag  WHERE amount >= ? ORDER BY RAND() LIMIT 5;");
 $query->bind_param('s',$param );  
  if(  $query->execute( ) )
	 {
	   $query->store_result();
       $query->bind_result($tag,$amount);
	   while( $query->fetch() )
	      {  
		  $query_row1 = array( 'tag'=> $tag, 'amount'=> $amount );
	    $tag = $query_row1['tag'];
        $amount = $query_row1['amount'];
		 //  $new_string = array();
		 
 '<div class=" "><a  class="padding-5" href="/hashtags/'.$tag.'" style="color:orange; margin-left:20px;">#'.strtolower($tag).' <span class="text-muted" style="font-size:0.8em;">('.$amount.')</span></a></div>';
		 // $uniqueArray = array_unique($query_row1, SORT_REGULAR);
         //  $called_tags2 = reveal_hashtags_raw($comment);
		//  echo $called_tags = reveal_hashtags($called_tags2);
	     

			 }     
     }   
}

function comment_hashtags()
{
  include "include/conxn.php";
  $param = 2;
 $query = $link->prepare("  SELECT tag,amount FROM hashtag  WHERE amount >= ? ORDER BY RAND() LIMIT 5;");
 $query->bind_param('s',$param );  
  if(  $query->execute( ) )
	 {
	   $query->store_result();
       $query->bind_result($tag,$amount);
	   while( $query->fetch() )
	      {  
		  $query_row1 = array( 'tag'=> $tag, 'amount'=> $amount );
	    $tag = $query_row1['tag'];
        $amount = $query_row1['amount'];
		 //  $new_string = array();
		 
echo '<p class="panel padding-5 no-margin"><a href="/hashtags/'.$tag.'" style="color:orange;">#'.strtolower($tag).' <span class="text-muted" style="font-size:0.8em;">('.$amount.')</span></a><p>';
		 // $uniqueArray = array_unique($query_row1, SORT_REGULAR);
         //  $called_tags2 = reveal_hashtags_raw($comment);
		//  echo $called_tags = reveal_hashtags($called_tags2);
	     

			 }     
     }   
}

function reveal_hashtags($string)
{
  $matches = array();
 
	if (preg_match_all('/#([^\s]+)/', $string, $matches)) 
	 {  $count =count($matches[0]);
	//  print_r($matches[1][1]);
	   for ($x = 0;$x < $count ;$x++)
        {
         return '<p class="panel padding-5 no-margin">'.convertHashtags( $matches[0][$x]).'<p>';
		 //  $rt[$x][$z] = $m[$z][$x];
        }  // echo 'meeeeee ';
	 }
}

function reveal_hashtags_raw($string)
{
  $matches = array();
 
	if (preg_match_all('/#([^\s]+)/', $string, $matches)) 
	 {  $count =count($matches[0]);
	//  print_r($matches[1][1]);
	   for ($x = 0;$x < $count ;$x++)
        {
         return $matches[0][$x];
		 //  $rt[$x][$z] = $m[$z][$x];
        }  // echo 'meeeeee ';
	 }
}

function seen_re_count($post_id)
{
include "include/conxn.php";
@session_start();
$user_id = $_SESSION['id'];
$queryq = "SELECT number_of_seen FROM seen_reev
WHERE reev_id = '$post_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser)>=1)
{
   while($query_q = mysqli_fetch_assoc($queryuser))
   {$number_of_seen = $query_q['number_of_seen'] ;
  echo ' <li  id="seen_box'.$post_id.'"><a href="javascript:void(0);"   style="color:grey;"  >  <img  class=" font-sm" src="/img/site_img/reev_icons/reev_sh1.png" ;" style="height:22px; margin-top:-13px;" title="re-post"  /> '.$number_of_seen.'
					 <span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; "> </span>
				 </li>';
				 }
} else{
     echo ' <li  id="seen_box'.$post_id.'"><a href="javascript:void(0);"     style="color:grey;"  >  <img  class=" font-sm" src="/img/site_img/reev_icons/reev_sh1.png" ;" style="height:22px; margin-top:-13px;" title="re-post"/> '.$number_of_seen.'
					 <span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; "> </span>
				 </li>';
}

}


?>













