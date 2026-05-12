<?php
include "include/conxn.php";
//this function will help prevent SQL injections and other hacks
function safe_input($value)
{include "include/conxn.php";
$magic_quotes_active = get_magic_quotes_gpc();//boolean - true if the quotes thing is turned on
$new_enough_php = function_exists("mysqli_real_escape_string");//boolean - true if the function exists (php 4.3 or higher)
if($new_enough_php)
{
if($magic_quotes_active)
{
$value = stripslashes($value);//if its a new version of php but has the quotes thing running, then strip the slashes it puts in
}
$value = mysqli_real_escape_string($link,$value);//if its a new version use the function to deal with characters
}
else
if(!$magic_quotes_active)//If its an old version, and the magic quotes are off use the addslashes function
{
$value = addslashes($value);
}
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
{return "Gifts & Toys";}
else if($cat_id=='hb')
{return "Health & Beauty";}
else if($cat_id=='hlc')
{return "Home, Light & construction";}
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
function neat_text($string) {
$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
} 
function cleans_text($string) {
$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
} 
function name_text($account_id)
{include "include/conxn.php";
$query = "SELECT * FROM registration where id = $account_id  LIMIT 1 ";

if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
                 $firstName = safe_input($details['firstName']);
                 $secName = safe_input($details['secName']);
                 $friend_id = safe_input($details['id']);
                 $username = safe_input($details['username']);

echo '<strong style="" ><a href="/fp.php?friend_id=',$friend_id,'&username=',$username,'"  class="text-primary">',$firstName,'</a></strong>';
  }
  }
}
function formatUrl($res, $sep='-')
{
//   $res = strtolower($value);
//  $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
$res = preg_replace('/[[:space:]]+/', $sep, $res);
return trim($res, $sep);
}

function formatUrl_rev($res, $sep=' ')
{
// $res = strtolower($value);
// $res = preg_replace('/[^[:alnum:]]/', '-', $res);
$res = preg_replace('/-/', $sep, $res);
return trim($res, $sep);
}

function shorten_product_name($string)
{// $string = "This is a test script";
$string = ucwords(strtolower($string));
if (strlen($string) >= 16)
return substr($string, 0, 15). '...'; // This is a test...
else
return($string); // This is a test script
}

function product_avail($product_id)
{
include "include/conxn.php";
$query = " SELECT mode FROM product where product_id = $product_id LIMIT 1 ";
if($query_add = mysqli_query($link,$query))
{
while($products = mysqli_fetch_assoc($query_add))
{
$mode = $products['mode'];
if($mode == 0)
{
echo '<small><span class="badge" style="background-color:#b94a48;" >This product is hidden</span></small> ';
}

}
}
}
function redirect($url)
{
if(!headers_sent())
{
header('location:http://'.$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']).'/'.$url);  
exit;
}
else
{
die('could not redirect ; header already sent (output).');
}
}

//full shop name
function  shopdetail($shop_id)
{include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$email  = safe_input($_SESSION['email']);

$query = "SELECT * FROM `shop`WHERE `user_id` = '$main_user_id.' &&`shop_id` = '$shop_id' LIMIT 0 , 5";

$query4user_info = mysqli_query($link,$query);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{

$countryCode = safe_input($allpalls_info['countryCode']);
$telephone = safe_input($allpalls_info['telephone']);
$shop_descrb = safe_input($allpalls_info['shop_descrb']);
$address = safe_input($allpalls_info['address']);
$country = safe_input($allpalls_info['country']);
$city = safe_input($allpalls_info['city']);
$region = safe_input($allpalls_info['state']);
$user_id = safe_input($allpalls_info['user_id']);

if($main_user_id ==  $user_id)

{
echo  ' <div class="text-info well padding-5  " style="margin-bottom:5px;"  >
'.$shop_descrb.'
</div>
<div class="nav-pull-right  ">
<div class="col-md-10 no-padding no-margin">
<ul class="list-unstyled">
<li>
<p class= "text-muted no-padding no-margin">
<i class="glyphicon glyphicon-phone-alt"></i>&nbsp;&nbsp;
'.$countryCode.' '. $telephone.'
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
'. $country.'
</div>
</div>';
}
}
}

function shop_id_from_name($shopName)
{include "include/conxn.php";
$query2 = "SELECT shop_id FROM shop WHERE shopName = '$shopName'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['shop_id'];
return safe_input($view_count);
}
}
function name_from_shop_id($shop_id)
{include "include/conxn.php";
$query2 = "SELECT shopName FROM shop WHERE shop_id = '$shop_id'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['shopName'];
return safe_input($view_count);
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
function  shopdetail_product($shop_id)
{ include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$email  = safe_input($_SESSION['email']);
$query = "SELECT * FROM `shop`WHERE `user_id` = '$main_user_id.' && `shop_id` = '$shop_id' LIMIT 0 , 5 ";
$query4user_info = mysqli_query($link,$query);

while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$shopName = safe_input($allpalls_info['shopName']);

$countryCode = safe_input($allpalls_info['countryCode']);
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
'.$countryCode.' '. $telephone.'
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


function  shopdetailnogetother($shop_id)
{include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT * FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 5 ";	 
$query4user_info = mysqli_query($link,$query);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$user_id = safe_input($allpalls_info['user_id']);
$shopName = safe_input($allpalls_info['shopName']);
$shopNameformat  = formatUrl($shopName); 
$telephone = safe_input($allpalls_info['telephone']);
$shop_descrb = safe_input($allpalls_info['shop_descrb']);
$address = safe_input($allpalls_info['address']);
$country = safe_input($allpalls_info['country']);
$city = safe_input($allpalls_info['city']);
$region = safe_input($allpalls_info['state']);
$category = safe_input($allpalls_info['category']);

$query = "SELECT * FROM `registration` WHERE `id` = '$user_id' LIMIT 0 , 5 ";
$query4user_info = mysqli_query($link,$query);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{ 
$firstname  = safe_input($allpalls_info['firstName']);
$secname    = safe_input($allpalls_info['secName']);
$username    = safe_input($allpalls_info['username']);

if($main_user_id !=  $user_id)
{
echo  	 ' 
<div class="text-primary well padding-5" style="margin-bottom:5px;"  > 
				'.$shop_descrb.'
			</div>
			<div class="col-md-10 no-padding no-margin">
			    <ul class="list-unstyled no-padding no-margin">
				   	<li>
					   <p class= "text-muted no-padding no-margin">
							<i class="glyphicon glyphicon-phone-alt"></i>&nbsp;&nbsp;
							    +233 '.$telephone.'
					   </p>
					</li><li>			   <p class= "text-muted no-padding no-margin">
							<i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;
							   '.$address.'
					   </p>
					</li><li>
					   <p class= "text-muted no-padding no-margin">
							<i class="glyphicon glyphicon-map-marker"></i>&nbsp;&nbsp;
							   '.$city.' , '.$region.'
					   </p>
					</li><li>
					   <p class= "text-muted no-padding no-margin">
							<i class="glyphicon glyphicon-flag"></i>&nbsp;&nbsp;
							  '.$country.' 
							</br></br>
					   </p>
					</li>
				</ul>
			</div>';
}
}
}
}

function  shopdetailnogetotherjustname($shop_id)
{include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
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
		  $category = safe_input($allpalls_info['category']);
		  
		 $query = "SELECT * FROM `registration` WHERE `id` = '$user_id' LIMIT 0 , 5 ";
$query4user_info = mysqli_query($link,$query);
		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 { 
		  $firstname  = safe_input($allpalls_info['firstName']);
          $secname    = safe_input($allpalls_info['secName']);

		  if($main_user_id !=  $user_id)
          {
		  echo  	 ' 
           	<div class="shopname_change">
				<h1>',$shopName,' <span class="small"><a href="fp.php?friend_id='.$user_id.'">', $firstname ,' ', $secname,'</a></span></h1>
				<div class="text-info well padding-5 " style="margin:5px 0 10px 0;"  >
					<small class="text-warning" >' .$category .'</small>
				</div>
			</div>';
		  }
		}
		}
}

function  shopdetailnogetother_product($shop_id)
{include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT * FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 5";
$query4user_info = mysqli_query($link,$query);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$user_id = $allpalls_info['user_id'];
$shopName = $allpalls_info['shopName'];
$shopNameformat  = formatUrl($shopName); 
$telephone = $allpalls_info['telephone'];
$shop_descrb = $allpalls_info['shop_descrb'];
$address = $allpalls_info['address'];
$country = $allpalls_info['country'];
$city = $allpalls_info['city'];
$region = $allpalls_info['state'];
$category = $allpalls_info['category'];

$query = "SELECT * FROM `registration` WHERE `id` = '$user_id' LIMIT 0 , 5 ";	 
$query4user_info = mysqli_query($link,$query);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$firstname  = safe_input($allpalls_info['firstName']);
$secname  = safe_input($allpalls_info['secName']);
$username    = safe_input($allpalls_info['username']);

if($main_user_id !=  $user_id)
{
echo  	 ' 
<div class="col-sm-12 col-md-12 col-lg-12 no-padding" style="">
<div>
<h4 style="padding:5px 10px"><a href="/Friends/Shops/'. $shopNameformat.'" class="text-primary" >',$shopName,'</a>
<span class="small"><a href="/Friend_Ver/'.$username.'">', $firstname ,'</a></span>
</h4>
</div>
</div>
';
}

}

}

}

function out_of_business_button($shop_id)
{include "include/conxn.php";
$user_id = safe_input($_SESSION['id']);
// $shop_id = safe_input($_GET['shop_id']);
$query = " SELECT mode FROM shop WHERE shop_id = $shop_id && user_id= $user_id  ";

$out_of_b = mysqli_query($link,$query);	
if(mysqli_num_rows($out_of_b)==1)
{
while($allpalls_out_of_b= mysqli_fetch_array($out_of_b,MYSQLI_ASSOC))
{
$mode = $allpalls_out_of_b['mode'];
if( $mode == 1)
{
echo ' <a data-target="#delete_shop_modal" data-toggle="modal" class="text-danger">Out of Business</a>';
}
else
{
echo ' <a data-target="#restore_shop_modal" data-toggle="modal" class="text-danger">Restore Business</a>';
}

}
}

}

function product_unavailble($product_id)
{include "include/conxn.php";
$user_id = safe_input($_SESSION['id']);
$product_id = safe_input($_GET['product_id']);
$query = " SELECT mode FROM product WHERE product_id = $product_id && account_id= $user_id  ";

$out_of_b = mysqli_query($link,$query);	
if(mysqli_num_rows($out_of_b)==1)
{
while($allpalls_out_of_b= mysqli_fetch_array($out_of_b,MYSQLI_ASSOC))
{
$mode = $allpalls_out_of_b['mode'];
if( $mode == 1)
{
echo ' <a data-target="#del_product_modal" data-toggle="modal" class="text-danger">Product Unavailable</a>';
}
else
{
echo ' <a data-target="#restore_product_modal" data-toggle="modal" class="text-danger">Restore Product </a>';
}

}
}

}

function subscribe_button($shop_id)
{include "include/conxn.php";
$user_id = safe_input($_SESSION['id']);
//$shop_id = safe_input($_GET['shop_id']);
$query = " SELECT user_id FROM subscribers WHERE shop_id = $shop_id && user_id= $user_id ";

$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)==1)
{
echo '
<div class="well btn btn-default pull-right padding-5 text-primary" style="margin-top:-40px; margin-right:10px; border-radius:4px;"  id="unsubscribe_btn" >
<i class="glyphicon glyphicon-minus"></i> Unsubscribe</div>';
}
else {
echo '
<div class="well btn btn-default pull-right padding-5 text-primary" id="subscribe_btn"style="margin-top:-40px; margin-right:10px; border-radius:4px;">
<i class="glyphicon glyphicon-plus"></i> Subscribe</div>';
}
} 

function like_button($shop_id)
{ include "include/conxn.php";
$user_id = safe_input($_SESSION['id']);
$shop_id = safe_input($_GET['shop_id']);

$query = " SELECT user_id FROM likes WHERE shop_id = '$user_id' && user_id = '$shop_id' ";

$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)>=1)
{	    echo '
<div class="well btn btn-default pull-right padding-5 text-primary" style="margin-top:-40px; margin-right:10px;" id="unlike_btn" type="submit"><i class="glyphicon glyphicon-thumbs-up"></i> Unlike Shop</div>	';
}	

else {
echo '
<div class="well btn btn-default pull-right padding-5 text-primary" style="margin-top:-40px; margin-right:10px;" id="like_btn" ><i class="glyphicon glyphicon-thumbs-up"></i> like Shop</div>	';
}
}

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

function  get_shopnames($user_id)
{  include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT shopName,shop_id
FROM `shop`
WHERE `user_id` = '$main_user_id'
LIMIT 0 , 2
";	 
$query4user_info = mysqli_query($link,$query);
$num_shop = mysqli_num_rows($query4user_info);
$_SESSION['num_shop'] = $num_shop;
////query_confirm($query4user_info);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$shopNames = $allpalls_info['shopName'];
$shopNameformat  = formatUrl($shopNames); 
$shopNameformat = ucwords(strtolower($shopNameformat));
$clean_name = formatUrl_rev($shopNameformat); 
$shop_id = shop_id_from_name($clean_name);

/*  $shop_id  = safe_input($allpalls_info['shop_id']);	*/
if($main_user_id ==  $user_id)
{
//  before which had a problem displaying  the contents properly echo   '<li ><a href="/User/MyShops/'.$shopNameformat.'">'.$shopNames.'</a></li>'; 
echo   '<li ><a href="/User/MyShops/'.$shopNameformat.'">'.$shopNames.'</a></li>';
}
else{
echo "no shop created";
}
}
}

function  get_shop_subscribed($user_id)
{  include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT shop_id
FROM `subscribers`
WHERE `user_id` = '$main_user_id'
LIMIT 0 , 15
";	 
$query4user_info = mysqli_query($link,$query);
$num_shop = mysqli_num_rows($query4user_info);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$shop_id = $allpalls_info['shop_id'];


$query_sub = "SELECT shopName FROM `shop`  WHERE `shop_id` = '$shop_id' "; 

$query4user_sub = mysqli_query($link,$query_sub);
$num_shop = mysqli_num_rows($query4user_sub);

while($mykanta_sub = mysqli_fetch_array($query4user_sub,MYSQLI_ASSOC))
{
$shopNames = $mykanta_sub['shopName'];
$shopNameformat  = formatUrl($shopNames); 
$clean_name = formatUrl_rev($shopNameformat); 
$shop_id = shop_id_from_name($clean_name);

/*  $shop_id  = safe_input($allpalls_info['shop_id']);	*/
if($main_user_id ==  $user_id)
{
echo   '<li ><a href="/Friends/Shops/'.$shopNameformat.'">'.$shopNames.'</a></li>';
}
else{
echo "no shop created";
}
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
$shopNameformat  = formatUrl($shopNames); 
if(!empty($shop_id))
{
echo   '<a href="/shopprocess.php?shopName='.$shopNameformat.'">'.$shopNames.'  </a>';
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
$secName = safe_input($user_auth_info['secName']); 
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
<div class="col-md-3" style="margin:2% 0;">
<img src="'. $profile_image.'" class="img-rounded" style="height:25px; width:25px;">
</div>
<div class="col-md-9 " style="">
<a href="/Friend_Ver/'.$username.'" class="" >'.$firstName.' '.$secName.'</a>
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
$shopNameformat  = formatUrl($shopNames); 
$shop_id  = safe_input($allpalls_info['shop_id']);
$mode  = safe_input($allpalls_info['mode']);
if($main_user_id !=  $friend_id  )
{
if( $mode == 1 )
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
<img src="'. $banner_image.'" alt="change"class="img img-thumbnail"style= "height:120px; width:100%">
<div class="pull-left ">
<strong ><a style="padding-left:10px;" href="/Friends/Shops/'.$shopNameformat.'">'.$shopNames.'</a></strong>
</div>		
		</div>
<br>
<br>
';}}else{
$banner_image = "/img/banners/banner-small.png";
echo ' 
<div class="item active " title="change" align="center">
		<img src="'. $banner_image.'" alt="Banner Pic"class="img img-thumbnail"style= "height:auto; width:100%">
				<div class="pull-left ">
				 <strong ><a style="padding-left:10px;" href="/shopprocess.php?shopName='.$shopNameformat.'">'.$shopNames.'</a></strong>
				 </div>		
		</div>
<br>
<br>
';
}
}	  }
else{
echo "no business created";
}
}
}

function  get_shop_suggested()
{ include "include/conxn.php";
$query = "SELECT shop_id FROM `shop`  WHERE mode = '1' ORDER BY RAND() LIMIT 0 , 6 ";

$advert_query = mysqli_query($link,$query);

if($advert_query2  = mysqli_num_rows($advert_query))
{   echo '<ul class="list-inline" style="">
<div class="padding-bottom-10"><h4>Business Suggestions</h4></div>';
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
$shopName = substr($string, 0, 24). '..';
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
echo'<li class="well well-light padding-top-10 " style= " height:auto; width:280px; ">

<div class=" item active  padding-bottom-10 " title="'.$shopName.'" align="center" style= " width:100%;">
		  <img src="'. $banner_image.'" alt="change" class="img " style= " height:60px; width:100%;" />
		   
			<div class="thumbnail_legend" style="margin-top:-75px;">
				<h3 class="desktop  hidden-xs hidden-md hidden-sm banner_text text-center "> '.ucwords($string).'</h3>
				<h3 class="laptop hidden-sm hidden-lg hidden-xs banner_text text-center "> '.ucwords($string).'</h3>
				<h3 class="tablet hidden-md hidden-lg hidden-xs banner_text text-center "> '.ucwords($string).'</h3>
				<h3 class="yam hidden-lg hidden-md hidden-sm banner_text text-center "> '.ucwords($string).'</h3>
			</div>	
		</div> 
		
<div class="row  well-light " style="padding-top:10px; background-color:; height:70px;">
<div class="col-md-12 padding-10">
<strong> <a  href="/shopprocess.php?shopName='.$shopName1.'" class=" no-padding text-warning">'.$shopName.'</a> </strong>
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
echo'<li class="well well-light padding-5" style= "height:auto; width:280px;">
<div class=" item active  padding-bottom-10 " title="'.$shopName.'" align="center" style= " width:100%;">
		  <img src="'. $banner_image.'" alt="change" class="img " style= "height:70px; width:100%;">
		 </div> 
		
<div class="row  well-light " style="background-color:; width:280px; height:50px;">
<div class="col-md-12" style="margin-top:-10px;">
<strong> <a href="/shopprocess.php?shopName='.$shopName1.'" class="no-padding text-warning">'.$shopName.'</a> </strong>
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
echo '</ul>';
}
else{
echo  '<p class="text-info"></p>';
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
function  get_sub_no($user_id)
{ include "include/conxn.php"; 
$user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(shop_id) FROM subscribers WHERE user_id ='$user_id'";

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
echo ' <span class="badge inbox-badge" >'.$friend_count.'</span></a>  ';


}
function  get_no_of_friends($friend_id)
{include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$friend_id' AND value='0' ";

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];
echo $friend_count;
}

function  get_friendnames($user_id)
{include "../include/conxn.php";  

$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='1' OR friend_id='$user_id' AND value='1'";		 

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

if($friend_count < 1){
$friendsHTML = $user_id." has no Connections yet";
}
else
{ 
include "include/conxn.php";  	
$max =50;
$all_friends = array();
$sql = "SELECT account_id FROM friends WHERE friend_id='$user_id' AND value='1' ORDER BY id";
$query = mysqli_query($link,$sql);

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
$new =  safe_input($row["account_id"]);
array_push($all_friends,$new);
}
$sql = "SELECT friend_id FROM friends WHERE account_id='$user_id' AND value='1' ORDER BY id";
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
$friends_view_all_link = '<a href="/view_friends.php?user_id='.$user_id.'">view all</a>';
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
$firstname = ucwords(strtolower($firstname));


$friend_id = safe_input($row["id"]);
$username = safe_input($row["username"]);

$query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";

$query4profilepic = mysqli_query($link,$query2);	
if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$friend_pic = safe_input($profile_pic['image_loc']);
echo '<a href="/Friend/'.$username.'"><img  src="/'.$friend_pic.'"alt="'.$friend_username.'" class="img-rounded" width="20px; height="20px;" title="'.$friend_username.'"> <small>'.$firstname .'</small></a>';
}
else
{
$friend_pic = safe_input('images/piclist.jpg'); 
echo '<a href="/Friend/'.$username.'"><img  src="'.$friend_pic.'"alt="'.$friend_username.'" title="'.$friend_username.'" width="20px;> '.$firstname .'</a>';
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
$friendsHTML = $friend_id." has no Connections yet";
}
else
{  
$max = 50;
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
echo '<ul class="list-inline myscroll" style="max-height:380px; border:1px solid #F5F5F5; margin:0; padding:0px;">';
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$friend_username = safe_input($row["username"]);
$firstname = safe_input($row["firstName"]);
$secname = safe_input($row["secName"]);
$friend_id = safe_input($row["id"]);
$username = safe_input($row["username"]);

$query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id";

$query4profilepic = mysqli_query($link,$query2);	

if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$friend_pic = safe_input($profile_pic['image_loc']);
echo '<li class="well" style="padding:5px; margin:0 2px 5px;"><a href="/Friend_Ver/'.$username.'" class=""><img  src="'.$friend_pic.'"alt="'.$friend_username.'" class="img-rounded" width="40" title="'.$friend_username.'"> '.$firstname .' </a></li>';
}
}
else
{
$friend_pic = safe_input('images/piclist.jpg'); 
echo '<li class="well" style="padding:5px; margin:0 2px 5px;"><a href="/Friend_Ver/'.$username.'"><img  src="'.$friend_pic.'"alt="'.$friend_username.'" title="'.$friend_username.'"> '.$firstname .'</a></li>';
}
}
echo '</ul> ';		 
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
$firstName = ucwords(strtolower($firstName));
$username  = safe_input($allpalls_i['username']);

if($main_user_id ==  $user_id)
{
echo   '
<a href="/Friend_Ver/'.$username.'">'.$firstName.'</a>
<button class="btn btn-xs pull-right style=" background-color:green;">
	<i class="fa fa-link"></i>
	Refuse
	</button>
	
	
	<input type="submit"  onClick="add_friend('.$friend_id .')" value="Accept Connection"class="btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-check"></i>
</input>';
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
$username = safe_input($_GET['username']);

$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT * FROM `registration` WHERE `id` = '$friend_id' LIMIT 0 , 5 ";		 
$query4user_info = mysqli_query($link,$query);

while($user_auth_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$firstname = safe_input($user_auth_info['firstName']); 
$secname = safe_input($user_auth_info['secName']); 
$email = safe_input($user_auth_info['email']);
$telephone = safe_input($user_auth_info['telephone']); 
$user_name =   safe_input($user_auth_info['username']); 
$city =   safe_input($user_auth_info['city']); 
$country =   safe_input($user_auth_info['country']);
$countryCode = safe_input($user_auth_info['countryCode']); 
$friendid =   safe_input($user_auth_info['id']); 

if($friend_id !=  $main_user_id)
{
echo  
'<div class="col-sm-8 col-xs-8" style=" margin-left:-25px;">
					<h2>'.$firstname.' <span class="semi-bold">'. $secname.'</span>',user_status($friend_id),'						
</h2>
<ul class="list-unstyled">
<li>
<p class="text-muted">
<i class="fa fa-phone"></i><span>&nbsp;&nbsp;'.$countryCode.' '. $telephone.'</span>
</p>
</li>
<li>
<p class="text-muted"> 
<i class="fa fa-envelope"></i><span>&nbsp;&nbsp;'.$email.'</span>
</p>
</li>
<li>
<p class="text-muted">
<i class="fa fa-map-marker"></i><span>&nbsp;&nbsp;'. $city.'</span>
</p>
</li>
<li>
<p class="text-muted">
<i class="fa fa-flag-o"></i><span >&nbsp;&nbsp;'. $country.'</span>
</p>
</li>
</ul>
				</div>
';
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

function get_profile_pic($user_id)
{include "include/conxn.php";

$query = " SELECT image_loc FROM profile_pic WHERE account_id = $user_id ";
$query4profilepic = mysqli_query($link,$query);	
if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);

echo'<img src="'. $profile_image.'" class="img-thumbnail" width="500" height="500"/>';			 
}
else{
$profile_image = "/img/avatars/image1.jpg";

echo'<img src="'. $profile_image.'" class="img-thumbnail" width="500px;" height="300px;"/>';
}
}
function get_profile_pic_only_name($user_id)
{include "include/conxn.php";

$query = " SELECT image_loc FROM profile_pic WHERE account_id = $user_id ";
$query4profilepic = mysqli_query($link,$query);	
if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   

echo $profile_image = safe_input($profile_pic['image_loc']);

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
echo'<img src="'. $profile_image.'" class="img-thumbnail" width="500px;" height="500px;"/>';			 
}
}
else
{
$profile_image = "/img/avatars/image1.jpg";
echo'<img src="'. $profile_image.'" class="img-thumbnail" width="500px;" height="300px;"/>';
}
}

function pic_on_friend_page($user_id)
{include "include/conxn.php";
$query = " SELECT image_loc FROM profile_pic WHERE account_id = $user_id";
$query4profilepic = mysqli_query($link,$query);	
if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);
echo'<img src="'. $profile_image.'" class="img-rounded" width="30px;"/>';			 
}
else
{
$profile_image = "/img/avatars/image1.jpg";
echo'<img src="'. $profile_image.'" class="img-rounded" width="30px;"/>';
}
}

function get_banner_pic($shop_id,$clean_name)
{include "include/conxn.php";
$query = " SELECT image_loc FROM banner_pic WHERE shop_id = $shop_id ";

$querybannerpic = mysqli_query($link,$query);	

if($banner_pic  = mysqli_fetch_array($querybannerpic,MYSQLI_ASSOC))
{   
$banner_image = safe_input($banner_pic['image_loc']);		
echo'<img src="/'. $banner_image.'" alt="Banner" class="img img-thumbnail" style= "height:auto; width:100%">';	
}else{
$banner_image = "/img/banners/banner.png";
echo'<img src="'. $banner_image.'" alt="Banner" style= "height:auto; width:100%">';	
}
}

function get_subscribers_no($shop_id)
{include "include/conxn.php";
$query = "SELECT COUNT(id) FROM subscribers WHERE shop_id = $shop_id";
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

function get_products_no($shop_id)
{include "include/conxn.php";

$query = "SELECT COUNT(product_id) FROM product WHERE shop_id = $shop_id AND mode = 1";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];
echo $view_count;
}

function get_products_no_your_shop($shop_id)
{include "include/conxn.php";

$query = "SELECT COUNT(product_id) FROM product WHERE shop_id = $shop_id";
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
function shopName($shop_id)
{include "include/conxn.php";
$query = "SELECT shopName FROM shop WHERE shop_id = $shop_id     
";
$query_data = mysqli_query($link,$query);
if($query_count = mysqli_fetch_array($query_data,MYSQL_ASSOC))
{
$view_count = $query_count['shopName'];
echo $view_count;
}
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

$account_id = safe_input($_SESSION['id']);
$query = "SELECT COUNT(viewer_id) FROM views WHERE shop_id = $shop_id";

$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];

$query = "SELECT shop_id,viewer_id FROM `views` WHERE viewer_id = $account_id && shop_id =$shop_id LIMIT 1 ";
$query_run = mysqli_query($link,$query);

if ($query_count = mysqli_fetch_row($query_run))
{
}
else
{
$datetime =  date('Y\-m\-d\ H:i:s');
$query1 = mysqli_query($link,"INSERT INTO `myshop`.`views` (`id` ,`viewer_id` ,`shop_id` ,`datetime` )VALUES (NULL, '$account_id', '$shop_id', '$datetime')"); 

if($query_run = mysqli_query($link,$query1))
{

}
}
echo $view_count;
}

function get_status_name($account_id)
{include "include/conxn.php";
$query = "SELECT * FROM registration where id = $account_id  LIMIT 10 ";

if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{
$firstName = safe_input($details['firstName']);
$friend_id = safe_input($details['id']);
$username = safe_input($details['username']);

echo '<strong style="padding-left:55px;" ><a href="/Friend_Ver/',$username,'"  class="text-primary">',$firstName,'  </a></strong>';
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
$secName = safe_input($details['secName']);
$friend_id = safe_input($details['id']);
$username = safe_input($details['username']);

echo '<strong style="padding-left:-55px;" ><a href="/Friend_Ver/',$username,'"  class="text-primary">',$firstName,' ',$secName ,' </a></strong>';
}
}
}

function get_status_pic_of_sender($account_id)
{include "include/conxn.php";	  
$query = "SELECT image_loc FROM profile_pic WHERE account_id = $account_id ";

$query4profilepic = mysqli_query($link,$query);	

if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);

echo'<img src="'. $profile_image.'" class="img-thumbnail" width="50px;" >';
}		  
else 
{
echo'<img src="/img/avatars/image1.jpg "class="img-thumbnail" width="50px;" >';
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

echo'<img src="', $profile_image,'" class="img-rounded"  style="height:50px; " >';
}
}
else 
{
echo'<img src="/img/avatars/image1.jpg "class="img-thumbnail" width="50px;" >';
}
}

function get_status_comment_f($owner_id)
{include "include/conxn.php";
$me = safe_input($_SESSION['id']);
$query = "SELECT * FROM account_comment where owner_id = $owner_id  ORDER BY id DESC LIMIT 0 , 5 ";

$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
{
while($products = mysqli_fetch_assoc($query_add))
{
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$friend_id = safe_input($products['owner_id']);
$image_loc = safe_input($products['image_loc']);
$comment = $products['comment'];
$datetime = strtotime($products['commentDate']);
$datetime = date("D, d M Y, h:m a", $datetime);
$post_id = safe_input($products['id']);

echo '				
<div class="chat-body no-padding profile-message" id="mystatus">
<ul>
<li class="message">

';
//Check if image location is defined						 
if(($image_loc == NULL) || ($image_loc == "NULL"))
{
echo'<p style="padding-left:10px;">'. $comment.'
		 </p>';
}
else
{
echo'<li style="padding-left:10px; padding-top:5px; margin-bottom:10px;">
<div class="row"><div class="col-md-5"><a class="fancybox" href="/img/comments_images/'.$image_loc.'">
<img class="img-thumbnail" src="/img/comments_images/'.$image_loc.'" width="100%" alt=""/></a></div>
<div class="col-md-7 well-light"style="background-color:#d3d3d3"><span style="margin-top:-30px;" >'. $comment.'</span></div></div>';
}
echo'
</li>
<li class="message" style="margin-top:-15px; ">
			<ul class="list-inline font-xs " >
<li class="text-primary">
'.$datetime.'
				</li>
				<li>
<a href="javascript:void(0);" class="text-muted">Show All Comments (';
			echo		get_reply_no($post_id);
		echo	')</a>
				</li>
				
		 </ul>	
	</li>
	<div  id="reply-holder-ul " style=" padding-left:10px;  list-style:none;">	';
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
<img src="/img/demo/logo.jpg" class="img-thumbnail" width="50px;" >
			 <strong style="padding-left:60px;" ><a href="name link" style="margin-bottom:-140px;" class="text-primary">Mykanta</a></strong>
	  <p style="padding-left:60px;">Thank you for joining Mykanta. Take any picture and review it.
		 </p>
		 </li>
	</ul>		
</div>

'; 
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
$comment = $products['comment'];
$image_loc = safe_input($products['image_loc']);
$datetime = strtotime($products['commentDate']);
//$datetime = new DateTime("@".$datetime);
//$datetime->setTimezone(new DateTimeZone("Africa/Accra"));
$datetime = date("D,d M Y", $datetime);
$post_id = safe_input($products['id']);

echo '				
<div class="chat-body no-padding profile-message" id="mystatus">
<ul>
<li class="message">
';
//Check if image location is defined						 
if(($image_loc == NULL) || ($image_loc == "NULL"))
{
echo'<p style="padding-left:10px;">'. $comment.'
</p>
</li>
<li class="message" style="margin-top:-15px; ">
<ul class="list-inline font-xs " >
<li class="text-primary">
'.$datetime.'
</li>

<li>
<a href="/include/delete_comment.php?id='.$post_id.'"class="text-danger">Delete</a>
</li>
</ul>	
</li>
<div  id="reply-holder-ul " style=" padding:10px;  list-style:none;">	';
echo get_reply($post_id) .  ' 
</div>
</ul>		
</div>';
}
else
{
echo'<li style="padding-left:0px; padding-top:5px; margin-bottom:0px;">
<div class="row "><div class="col-md-4 col-sm-6 col-xs-6"><a class="fancybox" href="/img/comments_images/'.$image_loc.'">
<img class="img-thumbnail" src="/img/comments_images/'.$image_loc.'" width="100%" height="300" alt=""/></a></div>
<div class="col-md-8 col-sm-6 col-xs-6 ">
<div class="row no-padding">
<div class="col-md-12 no-padding ">
<ul class="nav nav-tabs tabs-pull-left">
<li class="active">
<a href="#a8" data-toggle="tab">Review</a>
</li>
<li>
<a href="#a9" data-toggle="tab">Comments</a>
</li>
</ul>
</div>
<div class="tab-content ">
<div class="tab-content no-padding">
<div class="tab-pane fade in active no-padding" id="a8">
<p class="padding-10 font-sm padding-top-10" >'. $comment.'</p><p class="text-primary font-sm">
'.$datetime.'
<a href="/include/delete_comment.php?id='.$post_id.'"class="text-danger"> Delete</a></p> 	
</div>
<div class="tab-pane fade in  " id="a9">	<ul  id="reply-holder-ul " class=" "  list-style:none;">	', get_reply($post_id) ,  ' 
</ul></div></div></div>
</li>
</ul>		
</div>';
}  
}
}
else
{
echo '
<strong style="" ><a href="name link" style="" class="text-primary">Thank you for joining Mykanta</a></strong>
<p style="">Take a picture of something worth reviewing for others to know.
</p>
'; 
}
}
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
if($friendArrayCount > 0)
{
$orLogic = '';
// $orLogic1 = '';
foreach($all_friends as $key => $user)
{
$orLogic .= "account_id='$user' OR ";
//    $orLogic1 .= "account_id='$user' OR ";
}
$orLogic = chop($orLogic, "OR ");
//  $orLogic1 = chop($orLogic1, "OR ");

$query = "SELECT * FROM account_comment where $orLogic  ORDER BY commentDate DESC LIMIT 10 ";
$query_add = mysqli_query($link,$query);
echo '<ul class="myscroll" style="height:600px; border:1px solid #F5F5F5; margin-top:10px; padding:0px;">';
while($products = mysqli_fetch_assoc($query_add))
{
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$comment = $products['comment'];
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
<p><a class="fancybox" href="/img/comments_images/'.$image_loc.'">
<img class="img-thumbnail" src="/img/comments_images/'.$image_loc.'" width="155" alt=""/></a><span class="padding-10" style="margin-top:-30px;">'. $comment.'</span></p>
';
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
				
		 </ul>	
	</li>
		<div  id="reply-holder-ul " style=" padding-left:50px;  list-style:none;">	';
			echo get_reply($post_id) .  ' 
		</div>
	</ul>		
</div>
'; 
}
echo '</ul>'; 
}}

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
$comment = $products['comment'];
$image_loc = $products['image_loc'];
$datetime = strtotime($products['commentDate']);
$datetime = date("D, d M Y, h:m a", $datetime);
$post_id = $products['id'];
echo '
<div class="chat-body no-padding profile-message">
<ul>
<li class="message">
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
<p><a class="fancybox" href="/img/comments_images/'.$image_loc.'">
<img class="img-thumbnail" src="/img/comments_images/'.$image_loc.'" width="155" alt=""/></a></p>
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
				<a href="/include/delete_comment.php?id='.$post_id.'"class="text-danger">Delete</a>
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

echo '<hr>
<div class="chat-body no-padding profile-message">
<ul>
<li class="message">
';/*, get_status_pic_of_sender($account_id), '
', get_status_name($account_id), ' '*/;  
if(($image_loc == NULL) || ($image_loc == "NULL"))
{								
	echo  get_status_pic_of_sender($account_id), '
', get_status_name($account_id),'<p style="padding-left:60px;">'. $comment.'
		 </p>';
}
else
{
	echo'<li style="margin-top:-10px;">
		<div class="row"><div class="col-md-5"><a class="fancybox" href="/img/shop_comments_images/'.$image_loc.'">
<img class="img-thumbnail" src="/img/shop_comments_images/'.$image_loc.'" width="100%" alt=""/></a></div>
<div class="col-md-7 well-light"style="background-color:#d3d3d3"><span style="margin-top:-30px;" >'. $comment.'</span></div></div>';
}
		 echo'
		 </li>
		<li class="message" style="margin-top:-10px;  padding-left:60px;">
			<ul class="list-inline font-xs " >
			   <li class="text-primary">'.$datetime.'
				
				</li>
				 <li>
				<a href="/include/delete_shop_comment.php?id='.$post_id.'&shop_id='.$this_shop.'"class="text-danger">Delete</a>
				</li>
		 </ul>	
	</li>

	</ul>	  <ul   >		';
			echo get_reply_shop($post_id) .  ' 
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
<img src="/img/demo/flik.png" class="img-thumbnail" width="50px;" >
			 <strong style="padding-left:60px;" ><a href="name link" style="margin-bottom:-140px;" class="text-primary">Mykanta </a></strong>
	  <p style="padding-left:60px;">Thank you for join Mykanta
		 </p>
		 </li>
	</ul>		
</div>
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
$this_shop = safe_input($products['shop_id']); 
$comment = safe_input($products['comment']);
$image_loc = safe_input($products['image_loc']);
$datetime = strtotime($products['datetime']);
$datetime = date("D, d M Y a", $datetime);
$post_id = safe_input($products['id']);

echo '<hr>
<div class="chat-body no-padding profile-message">
<ul>
<li class="message">
';/*, get_status_pic_of_sender($account_id), '
', get_status_name($account_id), ' '*/;  
if(($image_loc == NULL) || ($image_loc == "NULL"))
{								
	echo  get_status_pic_of_sender($account_id), '
', get_status_name($account_id),'<p style="padding-left:60px;">'. $comment.'
		 </p>';
}
else
{
	echo'<li style="margin-top:-10px;">
		<div class="row"><div class="col-md-5"><a class="fancybox" href="/img/shop_comments_images/'.$image_loc.'">
<img class="img-thumbnail" src="/img/shop_comments_images/'.$image_loc.'" width="100%" alt=""/></a></div>
<div class="col-md-7 well-light"style="background-color:#d3d3d3"><span style="margin-top:-30px;" >'. $comment.'</span></div></div>';
}
		 echo'
		 </li>
		<li class="message" style="margin-top:-10px;  padding-left:60px;">
			<ul class="list-inline font-xs " >
			   <li class="text-primary">'.$datetime.'
				
				</li>
				
		 </ul>	
	</li>

	</ul>	  <ul   >		';
			echo get_reply_shop_other($post_id) .  ' 
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
<img src="/img/demo/flik.png" class="img-thumbnail" width="50px;" >
			 <strong style="padding-left:60px;" ><a href="name link" style="margin-bottom:-140px;" class="text-primary">Mykanta </a></strong>
	  <p style="padding-left:60px;">Thank you for join Mykanta
		 </p>
		 </li>
	</ul>		
</div>
'; 
}
}
function product_review($product_id)
{include "include/conxn.php";	 		 	 
$query = "SELECT * FROM product_review where product_id = $product_id  ORDER BY id DESC LIMIT 0,10
";

if($query_add = mysqli_query($link,$query))
{
echo'   <div class="myscroll" style="height:450px; padding-10; ">';

while($products = mysqli_fetch_assoc($query_add))
{
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$review = safe_input($products['review']);
$datetime = strtotime($products['datetime']);
$datetime = date("D, d M Y a", $datetime);
$review_id = safe_input($products['id']);



$query2 = "SELECT * FROM registration where id = $account_id   LIMIT 10";

if($query_add2 = mysqli_query($link,$query2))
{
while($details = mysqli_fetch_assoc($query_add2))
{ 

$query3 = "SELECT image_loc FROM profile_pic WHERE account_id = $account_id ";

$query4profilepic = mysqli_query($link,$query3);	

if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic))
{   
$profile_i = safe_input($profile_pic['image_loc']);
$profile_image = '/'.$profile_i;
}

}
else 
{
$profile_image ="/img/avatars/image1.jpg ";
}
$firstName = safe_input($details['firstName']);
$secName = safe_input($details['secName']);
$friend_id = safe_input($details['id']);
$username = safe_input($details['username']);
echo '
<div class="row no-padding no-margin " >
<div class="col-md-2  pull-left no-padding no-margin" >
<img src="', $profile_image,'" class="img-thumbnail"  style="height:50px; " ></div>
<div class="col-md-10 pull-right no-padding no-margin " >
<strong style="" ><a href="/Friend_Ver/',$username,'"  class="text-primary">',$firstName,' ',$secName ,' </a></strong> 
<p >'. $review.'</p>
<ul class="list-inline font-xs " >
<!--<li>
<a href="comment_like.php?post_id='.$review_id.'"class="text-primary"><i class="fa fa-thumbs-up"></i> Like</a>
</li>-->
<li>
<a href="javascript:void(0);" class="text-muted">'.$datetime.'</a>
</li>
<li>
<a href="/include/delete_product_comment.php?id='.$review_id.'"class="text-danger">Delete</a>
</li>
</ul>
</div>
</div>
 ';  
}
}

}
echo '</div> ';
}


}
function product_review_other($product_id)
{include "include/conxn.php";	 		 	 
$query = "SELECT * FROM product_review where product_id = $product_id  ORDER BY id DESC LIMIT 0,10
";

if($query_add = mysqli_query($link,$query))
{
echo'   <div class="myscroll" style="height:auto;  ">';

while($products = mysqli_fetch_assoc($query_add))
{
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$review = safe_input($products['review']);
$datetime = strtotime($products['datetime']);
$datetime = date("D, d M Y a", $datetime);
$review_id = safe_input($products['id']);



$query2 = "SELECT * FROM registration where id = $account_id   LIMIT 10";

if($query_add2 = mysqli_query($link,$query2))
{
while($details = mysqli_fetch_assoc($query_add2))
{ 

$query3 = "SELECT image_loc FROM profile_pic WHERE account_id = $account_id ";

$query4profilepic = mysqli_query($link,$query3);	

if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic))
{   
$profile_i = safe_input($profile_pic['image_loc']);
$profile_image = '/'.$profile_i;
}

}
else 
{
$profile_image ="/img/avatars/image1.jpg ";
}
$firstName = safe_input($details['firstName']);
$secName = safe_input($details['secName']);
$friend_id = safe_input($details['id']);
$username = safe_input($details['username']);
echo '
<div class="row no-padding no-margin " >
<div class="col-md-2  pull-left no-padding no-margin" >
<img src="', $profile_image,'" class="img-thumbnail"  style="height:50px; " ></div>
<div class="col-md-10 pull-right no-padding no-margin " >
<strong style="" ><a href="/Friend_Ver/',$username,'"  class="text-primary">',$username ,' </a></strong> 
<p >'. $review.'</p>
<ul class="list-inline font-xs " >
<!--<li>
<a href="comment_like.php?post_id='.$review_id.'"class="text-primary"><i class="fa fa-thumbs-up"></i> Like</a>
</li>-->
<li>
<a href="javascript:void(0);" class="text-muted pull-right">'.$datetime.'</a>
</li>
</ul>
</div>
</div>
 ';  
}
}

}
echo '</div> ';
}
else
{
echo '
<li class="message">
<img src="/img/demo/flik.png" class="img-thumbnail" width="50px;" >
			 <strong style="padding-left:60px;" ><a href="name link" style="margin-bottom:-140px;" class="text-primary">Flik </a></strong>
<p style="padding-left:60px;">Be the first to make a review on this product.
		 </p>
		 </li>

'; 
}
}

function header_up($user_id)
{echo ' <header id="header"> <div id="logo-group"> <span id="logo"><a href="/index.php" title="Profile"><img src="/img/mykanta_logo.png" class="img "  height="30" width="100"/></a></span>
<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> ';
 echo get_no_of_friends($user_id); echo ' </b> </span>
<div class="ajax-dropdown">
<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
<div class="btn-group btn-group-justified" data-toggle="buttons">
<label class="btn btn-default">
	<input type="radio" name="activity" id="/ajax/notify/shop.php">
	Shop </label>
<label class="btn btn-default">
	<input type="radio" name="activity" id="/ajax/notify/cart.php">
	Wish-list </label>
<label class="btn btn-default">
	<input type="radio" name="activity" id="/ajax/notify/friend_req_list.php">
	Friend <span class="badge inbox-badge" >'; echo get_no_of_friends($user_id); echo '</span> </label>
</div>
<!-- notification content -->
<div class="ajax-notifications custom-scroll">

<div class="alert alert-transparent">
	<h4>Click a button to show messages here</h4>
	This blank page message helps protect your privacy, or you can show the first message here automatically.
</div>

<i class="fa fa-lock fa-4x fa-border"></i>

</div>
<!-- end notification content -->

</div>
<!-- END AJAX-DROPDOWN -->
</div>



<!-- pulled right: nav area -->
<div class="pull-left">


<!-- search mobile button (this is hidden till mobile view port) -->
<div id="search-mobile" class="btn-header transparent pull-right">
<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
</div>
<!-- end search mobile button -->

<!-- input: search field -->
<form action="/include/search_dir_logged.php" class="header-search pull-left" method="post" name="form1">
<input type="text"  placeholder="Search " name="yourshop" required>
<button type="submit">
<i class="fa fa-search"></i>
</button>
<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
</form>
<!-- end input: search field -->


</div>
<!-- end pulled right: nav area -->

<!-- pulled right: nav area -->
<div class="pull-right">

<!-- collapse menu button -->
<div id="hide-menu" class="btn-header pull-right">
<span> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
</div>
<!-- end collapse menu -->

<!-- logout button -->
<div id="logout" class="btn-header transparent pull-right">
<span> <a href="/Logout" title="Sign Out" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
</div>
<!-- end logout button -->
<!-- fullscreen button -->
<div id="fullscreen" class="btn-header transparent pull-right">
<span> <a href="javascript:void(0);" onclick="launchFullscreen(document.documentElement);" title="Full Screen"><i class="fa fa-fullscreen"></i></a> </span>
</div>
<!-- end fullscreen button -->

</div>
<!-- end pulled right: nav area -->

</header>';
}

function nav($user_id)
{echo '<aside id="left-panel">
<nav>
<ul>
<li>
'; echo user_fullname($user_id);
echo ' </li>
<li>
<a href="#">&nbsp;<i class="glyphicon glyphicon-home"></i> <span class="menu-item-parent" style="padding-right:10px;">My Shops</span>';
echo get_shop_no($user_id); 
echo '</a>
<ul>
<div class="" style="max-height:300px;
overflow-y:auto;  ">';
echo  get_shopnames($user_id);
echo '</div> 
</ul>		
</li>   
<li>
<a href="#"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent" style="padding-right:10px;">Subscribed Shops</span>';
echo get_sub_no($user_id); 
echo '</a>
<ul>
<div class="" style="max-height:300px;
overflow-y:auto;  ">';
echo  get_shop_subscribed($user_id);
echo '</div> 
</ul>		
</li> 
<li>
<a href="#"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent" style="padding-right:10px;">Connections</span>
'; 
echo get_friendnames_no($user_id); 
echo '</a>
<ul><div class="" style="max-height:300px;
overflow-y:auto;  ">';
echo	 get_friendnames($user_id);
echo '		</div>				</ul>
</li>
<li>';
echo get_create_shop($user_id); 
echo'  </li>
<li>
<a href="#"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent" style="padding-right:10px;">Categories</span>
</a>
<div class="" style="max-height:300px;
overflow-y:auto;  "><ul class="">
<a href="/catlog.php?cat_id=afb">Agriculture, Food & Beverage</a>
<a href="/catlog.php?cat_id=acg">Art, Crafts & Gallery </a>
<a href="/catlog.php?cat_id=at">Auto & Transportation</a>
<a href="/catlog.php?cat_id=ctjbs">Clothing, Textiles, Jewelry, Bags & shoes</a>
<a href="/catlog.php?cat_id=eect">Electrical Equipment, Components, & Telecom</a>
<a href="/catlog.php?cat_id=eea">Electronics & Electrical Appliances</a>
<a href="/catlog.php?cat_id=gt">Gifts & Toys</a>
<a href="/catlog.php?cat_id=hb">Health & Beauty</a>
<a href="/catlog.php?cat_id=hlc">Home, Light & construction</a>
<a href="/catlog.php?cat_id=mht">Machinery, Hardware & Tools</a>
<a href="/catlog.php?cat_id=mcrp">Metallurgy, Chemicals, Rubber & Plastics</a>
<a href="/catlog.php?cat_id=pao">Packaging, Advertising & Office</a>
<a href="/catlog.php?cat_id=sca">Software, Computers & Accessories</a>
<a href="/catlog.php?cat_id=sa">Sports & Accessories</a>
<a href="/catlog.php?cat_id=sff">Stationery, Furniture & Fittings</a>
</ul>
</div>				
</li>
<li>
<a href="#"><i class="fa fa-lg fa-fw fa-gears"></i> <span class="menu-item-parent" data-target="#settings" data-toggle="modal" style="padding-right:10px;">Settings</span></a>
</li>
<br>
<br>
<br>
<br>
<li>';
echo        '<div style="max-height:100px;
overflow-y:auto;  " >
<div id="cart_list" > </div>
';
echo ' 
</li>
</ul>
</nav>
<span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>
</aside>';
echo '		<article class="col-sm-12 col-md-12 col-lg-6">
<div class="modal fade"  id="myMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">Messages</h4>
</div>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
</article>
<!-- /.modal -->
';
echo '			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">Create your Shop</h4>
</div>
<div class="modal-body">																					
<div class="row">
<div class="col-md-12">


<div class="row">
<div class="col-md-6">
<input type="text"id="shopname"  class="form-control" placeholder="Shop Name"  />
</div>
<div class="col-md-6">
<input type="email" id="email"  class="form-control" placeholder="Email" required />

</div>
</div>
<br>


<div class="row">
<div class="col-md-12">
<textarea class=" form-control" placeholder="Shop Description"  id="shop_descrb" rows="2" required>
</textarea>
</div>
</div>

<br>

<div class="row">
<div class="col-md-12">
<textarea class=" form-control" placeholder="Shop Address "  id="address" rows="2" required></textarea>
</div>
</div>

<br>

<div class="row">
<div class=" col-md-7">
<div class="input-group ">
<span class="input-group-addon"><i class="fa fa-flag fa-sm fa-fw"></i></span>
<select id="country" id ="country"  class="form-control input-sm"  required /></select>
</div>
</div>
<div class="col-md-5">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-thumb-tack fa-sm fa-fw"></i></span>
<select  id ="state" class="form-control input-sm" required /></select>
</div>
</div>
</div>
<br>

<div class="row">
<div class="col-md-4">
<input type="text" id="city"  class="form-control" placeholder="City" required />
</div>
<div class="col-md-8">
<ul class="list-inline">
<li>
<div class="input-group ">
<span class="input-group-addon"><i class="fa fa-map-marker fa-sm fa-fw"></i></span>
<select id="code" class="form-control input-sm" required disabled/></select>
</div></li>
<li>
<input type="number" id="telephone"  class="form-control" placeholder="Shop Telephone" required />
</li>
</ul>
</div>
</div>
<script language="javascript">
populateCountries("country", "state", "code");
</script>


<div class="row">

<div class=" col-md-6">
				<div class="input-group">
					   <span class="input-group-addon"><i class="fa fa-suitcase fa-sm fa-fw"></i></span>
					 <select id="bus_type"  placeholder="Full name" class="form-control input-sm"    />
					 <option>Business type</option>
					 <option>Manufacturing</option>
					 <option>wholesaler/distributor</option>
					 <option>Association</option> 
					 <option>Agent</option>
					 <option>Business service</option>
					 <option>Government Agencies</option>
					</select>
				</div>
				</div>

<div class="col-md-6">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-tag fa-sm fa-fw"></i></span>
<select class=" form-control"  id="category" >
<option>Choose Category</option>
<option>Agriculture, Food & Beverage</option>
<option>Art, Crafts & Gallery </option>
<option>Auto & Transportation</option>
<option>Clothing, Textiles, Jewelry, Bags & shoes</option>
<option>Electrical Equipment, Components, & Telecom</option>
<option>Electronics & Electrical Appliances</option>
<option>Gifts & Toys</option>
<option>Health & Beauty</option>
<option>Home, Lights & Construction</option>
<option>Machinery, Hardware & Tools</option>
<option>Metallurgy, Chemicals, Rubber & Plastics</option>
<option>Packaging, Advertising & Office</option>
<option>Software, Computers & Accessories</option>
<option>Sports & Accessories</option>
<option>Stationery, Furniture & Fittings</option>

</select> 
</div>
</div>

</div>
<br>
<div class="row">
<div class="col-md-12">
<input type="text" id="core_products"  class="form-control" placeholder="Core Products" required />
</div>
</div>	

<br>
<div class="row">

<div id = "shop_create_response" class="col-md-12 padding-10">
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<input type="submit" value="Cancel"  class="btn btn-default" data-dismiss="modal">
</input>
<input type="submit" value="Add Shop" onClick="shop_create()"class=" btn btn-primary">
</input>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
';




echo '			<div class="modal fade" id="myService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">Create your Service</h4>
</div>
<form name="fomr_service" action="include/create_service.php" method="post">
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-md-6">
<input type="text"name="serviceename" class="form-control" placeholder="Service Name" required ></input>
</div>
<div class="col-md-6 ">
<input type="text" name="telephone" class="form-control" placeholder="Service Telephone" required ></input>
</div>
</div>
<br>
<div class="row">
<div class="col-md-12">
<textarea class=" form-control" placeholder="Service Description" name="service_descrb" rows="2" required></textarea>
</div>
</div>
<br>
<div class="row">
<div class="col-md-12">
<textarea class=" form-control" placeholder="Location" name="location" rows="2" required></textarea>
</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<input type="text" name="email" class="form-control" placeholder="Email" required /></input>
</div>
<div class="col-md-6">
<input type="text" name="city" class="form-control" placeholder="City" required /></input>
</div>
</div>	
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">
Cancel
</button>
<input type="submit" value="Add Shop" name="createshop" class="btn btn-primary">
</input>
</div>
</div><!-- /.modal-content -->
</form>
</div><!-- /.modal-dialog -->
</div><!-- /.modal-dialog -->
';
//modal for setting
echo '<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">Your Personal Info.</h4>
</div>
<div class="modal-body">
<div class="row ">
<div class="col-md-1" style="width:10px;">
</div>';
echo settings_user($user_id);
echo '
<div class="col-md-1" style="width:10px;">
</div>
<div class="col-md-5 well " >
<label class="text-info">Old Password</label>
<input class="form-control" type="password" id="old_pass" value="" /><br>
<label class="text-info">New Password</label>
<input class="form-control" type="password" id="new_pass" value=""  /><br>
<label class="text-info">Repeat password</label>
<input class="form-control" type="password" id="rep_new_pass" value="" />
<br>
<input type="submit" value="Save Password" onClick="change_password('.$user_id .')" name="savepassword" class="btn btn-primary" id="change_pass_btn">
</input>

<div id="set2"></div>
</div>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">
Done
</button>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">Search </h4>
</div>
<div class="modal-body">
<div class="row" style="">				
<form name="form" method="post" action="accountproductsearchpage.php">
<div class="col-sm-9">
<span class="text-info"><strong><h5>Search for a Product</h5></strong></span>
<input name="product_search" type="text" id="product_search" class=" input form-control input-md"   placeholder="Enter Product name" required />
</div>
<div class="col-sm-3"style="padding-top:38px">
<button name="searchproduct" type="submit" class="btn btn-primary btn-md" id="searchproduct">Search
</button>
</div>
</form>
</div>
<div class="row" style="">
<form name="form" method="post" action="accountshopsearchpage.php">
<div class="col-sm-9">
<span class="text-info"><strong><h5>Search for a Shop</h5></strong></span>
<input name="yourshop" type="text" id="yourshop" class=" input form-control input-md"   placeholder="Enter Shop" required />
</div>
<div class="col-sm-3"style="padding-top:38px">
<button name="searchshopname" type="submit" class="btn btn-primary btn-md" id="searchshopname">Search
</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div><!-- /.modal-content -->
';
}
function  get_create_shop($user_id)
{ include "include/conxn.php"; 
$user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(shop_id) FROM shop WHERE user_id ='$user_id'";

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$shop_count = $query_count[0];
if($shop_count == 1 || 0)
{echo ' <a href="#"><i class="fa fa-lg fa-fw fa-legal"></i> <span class="menu-item-parent" data-target="#myModal" data-toggle="modal">Create Shop</span></a>  ';}

}
function user_fullname($user_id)
{include "include/conxn.php";

$query = "SELECT firstName FROM registration where id = $user_id   LIMIT 10
";
if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{
$firstName = safe_input($details['firstName']);
$firstname = ucwords(strtolower($firstname));

echo ' <a href="/User" title="Profile"> <span class="menu-item-parent ">  '.$firstName.'</span></a>';

}
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
echo   $username = ucwords(strtolower($username));

}
}
}
function user_details_profile($user_id)
{include "include/conxn.php";

$query = "SELECT email,city,country,countryCode,telephone,username FROM registration where id = $user_id   LIMIT 10
";
if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{
$email = $details['email'];
$city = $details['city'];
$country = $details['country'];
$countryCode = $details['countryCode'];
$telephone = $details['telephone'];
$username = $details['username'];
echo '
<h1>'.$username.'<span class="semi-bold"></span>
<br>
</h1>

<!--	 <ul class="list-unstyled">
						<li>
							<p class="text-muted">
								<i class="glyphicon glyphicon-phone"></i>&nbsp;&nbsp;'.$countryCode.' '.$telephone.'
							</p>
						</li>
						<li>
							<p class="text-muted">
								<i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;'.$email.'
							</p>
						</li>
						<li>
							<p class="text-muted">
								<i class="glyphicon glyphicon-map-marker"></i>&nbsp;&nbsp;'.$city.'<span class="txt-color-darken"></span>
							</p>
						</li><li>
							<p class="text-muted">
								<i class="glyphicon glyphicon-flag"></i>&nbsp;&nbsp;'.$country.'<span class="txt-color-darken"></span>
							</p>
						</li>
					
					</ul>-->';

}
}
}

function settings_user($user_id)
{include "include/conxn.php";

$query = "SELECT * FROM registration where id = $user_id   LIMIT 10
";
if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{
$firstName = safe_input($details['firstName']);

$user_id = safe_input($details['id']);
$username = safe_input($details['username']);
$telephone = safe_input($details['telephone']);
echo '<div class="col-md-5 well" >
<label class="text-info">Full Name</label>
<input class="form-control"  type="text" id="firstName_setings"  value="'.$firstName.'" /><br>
<label class="text-info">Username</label>
<input class="form-control" type="text" id="username_setings" value="'.$username.'" /><br>
<label class="text-info">Telephone</label>
<input class="form-control" type="text" id="telephone_setings" value="'.$telephone.'" />
<br>
<input type="submit"  onClick="settings_user_id('.$user_id .')" class="btn btn-primary" value="Confirm">
</input>
<div id="set1" class="pull-right">
</div>
</div>';

}
}
}

function settings_shop($shop_id)
{include "include/conxn.php";
$query = "SELECT * FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 5 ";
$query4user_info = mysqli_query($link,$query);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$user_id = safe_input($allpalls_info['user_id']);
$shopName = safe_input($allpalls_info['shopName']);
$shopNameformat  = formatUrl($shopName); 
$telephone = safe_input($allpalls_info['telephone']);
$shop_descrb = safe_input($allpalls_info['shop_descrb']);
$address = safe_input($allpalls_info['address']);
$city = safe_input($allpalls_info['city']);

echo '<div class="col-md-12 margin-no padding-no" >
<div class="col-md-6" >	
<label class="text-info">Shop Name</label>			 
<input class="form-control"  type="text" id="shopName_setings"  value="'.$shopName.'" /><br>
</div>
<div class="col-md-6 " >
<label class="text-info">City</label>
<input class="form-control" type="text" id="city_setings"  value="'.$city.'" />
</div>
</div>
<br>
<div class="col-md-12 pull-right" >
<label class="text-info">Shop Description</label>
<textarea class="form-control" type="text" id="shop_descrb_setings" >'.$shop_descrb.'</textarea><br>
<label class="text-info">Shop Address</label>
<textarea class="form-control" type="text" id="address_setings" >'.$address.'</textarea><br>
<label class="text-info">Telephone</label>
<input class="form-control" type="number" id="telephone_setings1" value="'.$telephone.'" /><br>
<input type="submit"  onClick="settings_shop_id('.$shop_id .')" class="btn btn-primary pull-right" value="Confirm">
</input>
<button type="button" class="btn btn-default pull-right" data-dismiss="modal">
Cancel
</button>
<div id="setshop" class="pull-left">
</div>
</div>';

}
}

function settings_product($product_id)
{include "include/conxn.php";
$query = "SELECT * FROM `product` WHERE `product_id` = '$product_id' LIMIT 0 , 5 ";
$query4user_info = mysqli_query($link,$query);
//query_confirm($query4user_info);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$productName = safe_input($allpalls_info['name']);
$descrb = $allpalls_info['descrb'];
$price = safe_input($allpalls_info['price']);

echo '<div class="col-md-12 margin-no padding-no" >
<div class="col-md-6" >	
<label class="text-info">Product Name</label>			 
<input class="form-control"  type="text" id="productName_setings"  value="'.$productName.'" /><br>
</div>
<div class="col-md-6 " >
<label class="text-info">Price</label>
<input class="form-control" type="number" id="price_setings"  value="'.$price.'" />
</div>
</div>
<br>
<div class="col-md-12 pull-right" >
<label class="text-info">Product Description</label>
<textarea class="form-control" id="product_descrb_setings" rows="5">'.$descrb.'</textarea><br>
<input type="submit"  onClick="settings_product_id('.$product_id .')" class="btn btn-primary pull-right" value="Confirm">
</input>
<button type="button" class="btn btn-default pull-right" data-dismiss="modal">
Cancel
</button>
<div id="setproduct" class="pull-left">
</div>
</div>';

}
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
{
include "include/conxn.php";


$shopName = safe_input($_GET['shopName']);
$shopNameformat  = formatUrl($shopName); 
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
$secName = safe_input($details['secName']);
$query = "SELECT image_loc FROM profile_pic WHERE account_id =  $reply_user_id  ";
$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);
echo '   
   <li class="message panel" style="   list-style:none;">
			 <img src="'. $profile_image.'" class="img-circle" width="50px">
					<a href="#" class="username" style=" padding-left:55px;">Shop Admin</a><p style=" padding-left:55px; margin-top:0px;">'.$reply.'</p>	
			<p class="list-inline font-xs text-info" style=" ">'.humanTiming($time).' ago	</p>
						
		  </li>
		 '; 
}
}
}
}
} echo ' <div id ="reply-holder-ul'.$post_id.'"</div>
<li>					
<div class="input-group wall-comment-reply padding-10 "style="margin-left:15px; margin-top:-10px;">
<input id="shop_comment_text'.$post_id.'" type="text" name="yourshop" class="input form-control pull-right input-xs" placeholder="Comment here..." required />
<span class="input-group-btn">
<div class="btn-group ">

<button type="submit"  onClick="comment_shop_admin('.$post_id.')" class="btn  btn-primary btn-xs">Comment
</button></div></div>
</li>							 
		 ';
}
}

function get_reply_shop_other($post_id)
{include "include/conxn.php";
//$shop_id = safe_input($_GET['shop_id']);
$shopName = safe_input($_GET['shopName']);
$shopName  = formatUrl($shopName); 
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
$secName = safe_input($details['secName']);
$query = "SELECT image_loc FROM profile_pic WHERE account_id =  $reply_user_id  ";
$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);
echo '   
   <li class="message panel" style="   list-style:none;">
			 <img src="'. $profile_image.'" class="img-circle" width="50px">
					<a href="/Friend_Ver/'.$username.'" class="username" style=" padding-left:55px;">'.$firstName.' '.$secName .'</a><p style=" padding-left:55px; margin-top:0px;">'.$reply.'</p>	
			<p class="list-inline font-xs text-info" style=" ">'.humanTiming($time).' ago	</p>
						
		  </li>
		 '; 
}
}
}
}
} echo ' <div id ="reply-holder-ul'.$post_id.'"</div>
		 
		 ';
}
}
function get_reply_shop_f($post_id)
{ include "include/conxn.php";
$shop_id = safe_input($_GET['shop_id']);

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
$secName = safe_input($details['secName']);
$query = "
SELECT image_loc FROM profile_pic WHERE account_id =  $reply_user_id ";
$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);
echo '   
   <li class="message" style=" padding-left:55px;  list-style:none;">
			 <img src="'. $profile_image.'" class="img-circle" width="50px">
					<a href="/Friend_Ver/'.$username.'" class="username" style=" padding-left:55px;">'.$firstName.' '.$secName .'</a><p style=" padding-left:55px; margin-top:0px;">'.$reply.'</p>
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
<form action="reply_insert_friend_shop.php?post_id='.$post_id.'&shop_id='.$shop_id.'&shopName=/*.$shopName.*/" method="POST">	
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
$secName = safe_input($details['secName']);
$query = " SELECT image_loc FROM profile_pic WHERE account_id =  $reply_user_id ";
$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = $profile_pic['image_loc'];
echo '   
   <li class="message panel padding-top-10">
			 <img src="'. $profile_image.'" class="img-circle" width="50px">
					<a href="/Friend_Ver/'.@$username.'" class="username" style=" padding-left:55px;">'.$firstName.' '.$secName .'</a><p style=" padding-left:55px; margin-top:0px;">'.$reply.'</p>
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
$secName = safe_input($details['secName']);
$query = "SELECT image_loc FROM profile_pic WHERE account_id =  $reply_user_id 
";
$query4profilepic = mysqli_query($link,$query);	
if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = $profile_pic['image_loc'];
echo '   
<li class="message  " >
<img src="'. $profile_image.'" class="img-circle" width="50px">
<a href="/Friend_Ver/'.$username.'" class="username" style=" padding-left:55px;">'.$firstName.' '.$secName .'</a><p style=" padding-left:55px; margin-top:0px;">'.$reply.'</p>
<ul class="list-inline font-xs" style=" padding-left:55px; margin-top:-20px;">
					  
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
<div id="profile-holder-ul'.$post_id.'" >	</div>					
<div class="input-group wall-com ment-reply " style=" padding-bottom:10px; padding-left:10px; padding-right:20px;">
<input id="profile_comment_text'.$post_id.'"  type="text" name="reply" class="form-control input-xs"         placeholder="Comment here..." required>
<span class="input-group-btn">
<button type="submit"  onClick="comment_profile('.$post_id.')" class="btn  btn-primary btn-xs">Comment
</button>
</span>
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
$prdt_desc = $products['descrb'];
$shop_id = safe_input($products['shop_id']);
$price = safe_input($products['price']);
$image_loc = safe_input($products['image_loc']);

echo '<header>
				<span class="widget-icon"> <i class="fa fa-money" style="line-height: 2.3;"></i> </span>
				<h2>GHS '.$price.'</h2>
			</header>
			<!-- widget div-->
			<div>
				<!-- widget content -->
				<div class="widget-body no-padding" style="min-height:0px;">
					<div class="panel-group smart-accordion-default" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1" class="collapsed">
										<i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Product Description
									</a>
								</h4>
							</div>
							<div id="collapseOne-1" class="panel-collapse collapse">
								<div class="panel-body">
									'.$prdt_desc.'
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end widget content -->
			</div>
			<!-- end widget div -->
' ;
}
}
}

function product_details_friend($product_id)
{include "include/conxn.php";

$product_id = safe_input($_GET['product_id']);

$query = " SELECT * FROM product where product_id = $product_id LIMIT 30 ";
if($query_add = mysqli_query($link,$query))
{
while($products = mysqli_fetch_assoc($query_add))
{
$product_id = safe_input($products['product_id']);
$prdt_name = safe_input($products['name']);
//the stock skould be added to database in future to count number of product in stock
//$stock = safe_input($products['stock']);
$prdt_desc = $products['descrb'];
$shop_id = safe_input($products['shop_id']);
$price = safe_input($products['price']);
$image_loc = safe_input($products['image_loc']);

//  echo '<h4 class=" padding-10">'.$prdt_name.''.like_button_product($product_id).'</h4> ';
echo '<header style="line-height: 33px;">
			<ul class="list-inline no-padding no-margin ">	
				<li>
				<span class="widget-icon"> <i class="fa fa-money"></i> </span><h2>GHS '.$price.'</h2>
				</li>';
				//	echo '<li class="pull-right">
				//	<button id="" type="button " class= "btn btn-success btn-xs   ><i class="glyphicon glyphicon-plus"></i> Buy Now</button>
				//	</li>';
				echo '<li class="pull-right">
				<a href="#" onCLick="add_to_cart_function('.$product_id.')">Add to Wish list</a>
				</li>
			</ul>
		</header>
		<!-- widget div-->
		<div>
			<!-- widget content -->
			<div class="widget-body no-padding" style="min-height:0px;">
				<div class="panel-group smart-accordion-default" id="accordion-f">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion-f" href="#collapseOne-1" class="collapsed">
									<i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Product Description
								</a>
							</h4>
						</div>
						<div id="collapseOne-1" class="panel-collapse collapse">
							<div class="panel-body">
								'.$prdt_desc.'
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end widget content -->
		</div>
		<!-- end widget div -->
' ;
}
}
}

function get_product_ur_friend_shop($shop_id)
{
include "include/conxn.php";
$query = " SELECT * FROM product where shop_id = $shop_id ";

if($query_add = mysqli_query($link,$query))
{
while($products = mysqli_fetch_assoc($query_add))
{
$product_id = safe_input($products['product_id']);
$prdt_name1 = safe_input($products['name']);
$prdt_name_format = formatUrl($prdt_name1);
$prdt_name = shorten_product_name($prdt_name1);
$prdt_desc = safe_input($products['descrb']);
$shop_id = safe_input($products['shop_id']);
$price1 = safe_input($products['price']);
$price1 = $products['price'];


if($price1 != 0)
{ $price = '<div class="panel pull-right no-padding" style="padding:6px ; color:white; background-color:#5bc0de; width:auto ;">
<p class=""><strong> GHS '.$price1.'</strong></p> '; }
else
{ $price = "Deals In";}
$image_loc = safe_input($products['image_loc']);
$mode = safe_input($products['mode']);

include "include/conxn.php";
$queryshop = " SELECT shopName FROM shop where shop_id = $shop_id LIMIT 15 ";

if($query_add11 = mysqli_query($link,$queryshop))
{
while($shopnamess = mysqli_fetch_assoc($query_add11))
{
$shopName = safe_input($shopnamess['shopName']);


if(  $mode == 1)
{
echo '<li  class=" " style="color:white; margin-top:10px;">
<center> <div class=" panel " style="margin-bottom:0px; color:white; background-color:#FFA500; width:168px ;height:50px; "> 
<a style=" color:#FFF !important; margin-top:140px;" href="/productprocess.php?shopName='.$shopName.'&shop_id='.$shop_id.'&product_id='. $product_id .'&prdt_name='.$prdt_name_format.'">
<h3 class="" style="display: block;
font-size: 19px;
font-weight: 400;
margin-top: 5px;
line-height: normal;" >'.$prdt_name.'</h3></a>
</div></center>
<div class="well no-margin padding-10" style="height:150px; width:150px; ">

<input type="hidden" id="product_id" value="'. $product_id .'" /> 

<img src="'.$image_loc.'" class="edit-record img-rounded"  onClick="Load_Contents_From_DB_by_Vasplus_Blog('.$product_id .');"style="height:100%; width:100%;">
<div class=" pull-right" style="padding:6px ; color:black; width:auto ; margin-right:-22px;">
<p class="">'.$price.'</p>

</div> 

</div>
</li>
'; 	 }
}
}
}
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
echo
'<img src="/'.$image_loc.'" width="100%" class="img-rounded padding-10">';
}
}
}

function get_product_pic_class($product_id)
{include "include/conxn.php";
$query = "SELECT * FROM product where product_id = $product_id LIMIT 1
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
echo '<li class=" padding-10 image4" ><img src="/'.$image_loc11.'" onclick="display_product(\'' . $image_loc11 . '\')" class="img img-thumbnail" id="im" style="height:70px; width:80px;"/></li>';
}
}

$query = " SELECT * FROM product_image_4 where product_id = $product_id LIMIT 6 ";
if($query_add = mysqli_query($link,$query))
{
while($products = mysqli_fetch_assoc($query_add))
{
$image_loc = safe_input($products['image_loc']); 
$id = safe_input($products['id']); 
echo

'<li class=" padding-10 image4" ><img src="/'.$image_loc.'" onclick="display_product(\'' . $image_loc . '\')" class="img img-thumbnail" id="im" style="height:70px; width:80px;"/></li>';
}
}
else {
echo " no image";
}
}

function gallery_user($user_id)
{
include "include/conxn.php";

$query = "SELECT * FROM `account_comment` WHERE `image_loc` != 'NULL' && `account_id` =$user_id  ORDER BY id DESC ";

if($query_add = mysqli_query($link,$query))
{
$query_galleryUser = mysqli_num_rows($query_add);
echo '<input type="hidden" id="userNum" value="'.$query_galleryUser.'" />
<script> var userNom = $("#userNum").val();
document.getElementById("galleryUser").innerHTML = userNom; 
</script>';

while($products = mysqli_fetch_assoc($query_add))
{
$image_loc = safe_input($products['image_loc']); 
$id = safe_input($products['id']);
$comm1 = safe_input($products['comment']); 
echo
'	 
<li class=" " style="height:70px; padding:2px;"><a class="fancybox" href="/img/comments_images/'.$image_loc.'" rel="group1" title="'.$comm1.'">
	<img class="img-thumbnail" src="/img/comments_images/'.$image_loc.'"" style="height:70px;" alt=""/></a></li>	';	 }
}
else {
echo " no images yet";
}
}

function gallery_user_friend($friend_id)
{include "include/conxn.php";
$query = "SELECT * FROM `account_comment` WHERE `image_loc` != 'NULL' && `account_id` =$friend_id ORDER BY id DESC ";

if($query_add = mysqli_query($link,$query))
{
$query_galleryFriend = mysqli_num_rows($query_add);
echo '<input type="hidden" id="friendNum" value="'.$query_galleryFriend.'" />
<script> var friendNom = $("#friendNum").val();
document.getElementById("galleryFriend").innerHTML = friendNom; 
</script>';

while($products = mysqli_fetch_assoc($query_add))
{
$image_loc = safe_input($products['image_loc']);
$id = safe_input($products['id']);
$comm3 = safe_input($products['comment']); 
echo
'	 
<li class=" no-padding image4" style="height:70px; padding:1px;"><a class="fancybox" href="/img/comments_images/'.$image_loc.'" rel="group3" title="'.$comm3.'">
<img class="img-thumbnail" src="/img/comments_images/'.$image_loc.'" width="80" alt=""/></a></li>	';	 }
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
$query_galleryShop = mysqli_num_rows($query_add);
echo '<input type="hidden" id="shopNum" value="'.$query_galleryShop.'" />
<script> var shopNom = $("#shopNum").val();
document.getElementById("galleryShop").innerHTML = shopNom; 
</script>';

while($products = mysqli_fetch_assoc($query_add))
{
$image_loc = safe_input($products['image_loc']);
$id = safe_input($products['id']);
$comm2 = safe_input($products['comment']); 
echo
'	 
<li class=" " style="height:70px; padding:2px;"><a class="fancybox" href="/img/shop_comments_images/'.$image_loc.'" rel="group2" title="'.$comm2.'">
<img class="img-thumbnail" src="/img/shop_comments_images/'.$image_loc.'" style="height:70px;" alt=""/></a></li>	';	 }
}
else {
echo " no image";
}
}

function get_product_ur_shop($shop_id)
{include "include/conxn.php";
$query = " SELECT * FROM product where shop_id = $shop_id LIMIT 50 ";
if($query_add = mysqli_query($link,$query))
{
while($products = mysqli_fetch_assoc($query_add))
{
$product_id = safe_input($products['product_id']);
$prdt_name1 = safe_input($products['name']);
$prdt_name = shorten_product_name($prdt_name1);
$prdt_desc = safe_input($products['descrb']);
$shop_id = safe_input($products['shop_id']);
$price1 = $products['price'];
$prdt_name_format = formatUrl($prdt_name1);

if($price1 != 0)
{ $price = ' 
<p class="text-warning">GHS '.$price1.'</p> '; }
else
{ $price = '
<p class="text-danger">price N/A</p> ';}	    

$image_loc = safe_input($products['image_loc']);

$query1 = " SELECT * FROM shop where shop_id = $shop_id ";
$query_add1 = mysqli_query($link,$query1);
while($thisShop = mysqli_fetch_assoc($query_add1))
{
$thisShopName = ucfirst($thisShop['shopName']);
$shopNameformat= formatUrl($thisShopName); 
}

echo '<li  class=" " style="color:#5bc0de; margin-top:10px;">
<center>
<input type="hidden" id="product_id" value="'. $product_id .'" />
<img src="'.$image_loc.'" class="edit-record img-rounded "  onClick="Load_Contents_From_DB_by_Vasplus_Blog('.$product_id .');"style="max-width:120px; height:100px;"/>
<a style=" color:#5bc0de; !important; margin-top:140px;" href="/productprocess.php?shopName='.$thisShopName.'&product_id='. $product_id .'&prdt_name='.$prdt_name_format.'">
<p class="" style="display: block;
font-size: 12px;
font-weight: 300;
margin-top: 5px;
line-height: normal;" >'.$prdt_name.'</p></a>
<strong>'.$price.'</strong>
</center>
</li>
';
}
}
}

function get_product_name($product_id)
{
include "include/conxn.php";
$query1 = " SELECT * FROM product where product_id = $product_id LIMIT 30 ";
$query_add1 = mysqli_query($link,$query1);
while($thisProduct = mysqli_fetch_assoc($query_add1))
{
$thisProductName = safe_input($thisProduct['name']);
echo $thisProductName;
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
<div id="check_out"><a href="/check_out.php">  <button class="btn btn-primary btn-xs" >Check out</button></a>
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

function get_friend_nam()
{
$a=array("red","green","blue","yellow","brown");
$random_keys=array_rand($a,3);
echo $a[$random_keys[0]]."<br>";
echo $a[$random_keys[1]]."<br>";
echo $a[$random_keys[2]];
}

function get_friend_profile_notify()
{
include "include/conxn.php";
$thisUser = $_SESSION['id'];
$array1[] = array(1,1,1,1,1,1,1,1,1,1);
$array2[] = array(1,1,1,1,1,1,1,1,1,1);
$array3[] = array(1,1,1,1,1,1,1,1,1,1);
$array4[] = array(1,1,1,1,1,1,1,1,1,1);
$array5[] = array(1,1,1,1,1,1,1,1,1,1);

//find last logut time
$logout = "SELECT last_datetime from status where user_id = '$thisUser' ";
$querylogout = mysqli_query($link, $logout);
while($whilelogout = mysqli_fetch_assoc($querylogout))
{
$lastOut = $whilelogout['last_datetime'];
}
///////////////////////////////////		


$max =3;	
$all_friends = array();
$sql = "SELECT account_id FROM friends WHERE friend_id='$thisUser' AND value='1' ORDER BY id LIMIT $max";
$query = mysqli_query($link,$sql);

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
$new =  safe_input($row["account_id"]);
array_push($all_friends,$new);
}
$sql = "SELECT friend_id FROM friends WHERE account_id='$thisUser' AND value='1' ORDER BY id LIMIT $max";
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
if($friendArrayCount > $max)
{
$friends_view_all_link = '<a href="/view_friends.php?user_id='.$thisUser.'">view more</a>';
} 
if($friendArrayCount > 0)
{
$orLogic = '';
foreach($all_friends as $key => $user){
$orLogic .= "id='$user' OR ";
}
$orLogic = chop($orLogic, "OR ");
$sql = "SELECT id FROM registration WHERE $orLogic";
$query = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
{
$myFrnds[] = safe_input($row['id']);
}

////////////////////////////
//find friends
/*
$frnds = "SELECT friend_id from friends where account_id = '$thisUser' AND value = 1";


$queryfrnds = mysqli_query($link, $frnds);
$totalfrnds = mysqli_num_rows($queryfrnds);
if($totalfrnds >= 1)
{
while($whilefrnds = mysqli_fetch_assoc($queryfrnds))
{
$myFrnds[] = $whilefrnds['friend_id'];
} //////////
*/
////////////////////////////////////////	


//convert array to string
$range = '(' . implode(",",$myFrnds) . ')';
//echo $range;

//select friend status
$sql = "SELECT id, comment, image_loc, owner_id, account_id, 'COMM' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, 'EMPTY' AS friend_id, commentDate 
FROM account_comment WHERE owner_id = account_id AND owner_id IN $range /*AND datetime > '$lastOut'*/ order by commentDate desc LIMIT 5";
$query = mysqli_query($link,$sql);
if(mysqli_num_rows($query) > 0)
{
$check1 = "true";
while($row = mysqli_fetch_assoc($query))
{
$array1[] = array($row['id'], $row['comment'], $row['image_loc'], $row['owner_id'], $row['account_id'], $row['shop_id'], 
	$row['user_id'], $row['product_id'], $row['friend_id'], $row['commentDate']);
}
}
else{$check1 = "false";}

//select friend shop likes
$sql2 = "SELECT id, 'shoplike' AS comment, 'EMPTY' AS image_loc, 'EMPTY' AS owner_id, 'EMPTY' AS account_id, shop_id, user_id, 'EMPTY' AS product_id, 'EMPTY' AS friend_id, datetime
FROM likes WHERE shop_id IN $range /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
$query2 = mysqli_query($link,$sql2);
if(mysqli_num_rows($query2) > 0)
{
$check2 = "true";
while($row2 = mysqli_fetch_assoc($query2))
{
$array2[] = array($row2['id'], $row2['comment'], $row2['image_loc'], $row2['owner_id'], $row2['account_id'], 
	$row2['shop_id'], $row2['user_id'], $row2['product_id'], $row2['friend_id'], $row2['datetime']);
}
}
else{$check2 = "false";}

//select friend product likes
$sql3 = "SELECT id, 'productlike' AS comment, 'EMPTY' AS image_loc, 'EMPTY' AS owner_id, 'EMPTY' AS account_id, 'EMPTY' AS shop_id, user_id, product_id, 'EMPTY' AS friend_id, datetime
FROM likes_products WHERE product_id IN $range /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
$query3 = mysqli_query($link,$sql3);
if(mysqli_num_rows($query3) > 0)
{
$check3 = "true";
while($row3 = mysqli_fetch_assoc($query3))
{
$array3[] = array($row3['id'], $row3['comment'], $row3['image_loc'], $row3['owner_id'], $row3['account_id'], 
	$row3['shop_id'], $row3['user_id'], $row3['product_id'], $row3['friend_id'], $row3['datetime']);
}
}
else{$check3 = "false";}

//select friend subscribed to shop
$sql4 = "SELECT id, 'subscribed' AS comment, 'EMPTY' AS image_loc, 'EMPTY' AS owner_id, 'EMPTY' AS account_id, shop_id, user_id, 'EMPTY' AS product_id, 'EMPTY' AS friend_id, datetime
FROM subscribers WHERE user_id IN $range /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
$query4 = mysqli_query($link,$sql4);
if(mysqli_num_rows($query4) > 0)
{
$check4 = "true";
while($row4 = mysqli_fetch_assoc($query4))
{
$array4[] = array($row4['id'], $row4['comment'], $row4['image_loc'], $row4['owner_id'], $row4['account_id'], 
	$row4['shop_id'], $row4['user_id'], $row4['product_id'], $row4['friend_id'], $row4['datetime']);
}
}
else{$check4 = "false";}

//select friend is now friends with......
$sql5 = "SELECT id, 'newfriend' AS comment, 'EMPTY' AS image_loc, 'EMPTY' AS owner_id, account_id, 'EMPTY' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, friend_id, datetime
FROM friends WHERE value = 1 AND friend_id IN $range /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
$query5 = mysqli_query($link,$sql5);
if(mysqli_num_rows($query5) > 0)
{
$check5 = "true";
while($row5 = mysqli_fetch_assoc($query5))
{
$array5[] = array($row5['id'], $row5['comment'], $row5['image_loc'], $row5['owner_id'], $row5['account_id'], 
	$row5['shop_id'], $row5['user_id'], $row5['product_id'], $row5['friend_id'], $row5['datetime']);
}
}
else{$check5 = "false";}

if($check1 == "false" AND $check2 == "false" AND $check3 == "false" AND $check4 == "false" AND $check5 == "false")
{
echo '<strong class="text-primary" style="margin-left:20px;">No new Activity from Connections</strong>';
}

else
{
//merge the arrays
$result = array_merge($array1, $array2, $array3, $array4, $array5);

//sort the merged array according to date which is record [2] of each inner array
function compare_datetime($a, $b) 
{ 
return strcmp($a['9'], $b['9']); 
} 
// sort 
usort($result, 'compare_datetime');

//reverse the sorted array to descending order
$reversed = array_reverse($result);
echo '<div class="chat-body profile-message " style="">
<ul class="myscroll" style="height:600px; background-color:#FFF; border:1px solid #F5F5F5;">';
$arraysize = count($reversed);
for($i=0; $i < $arraysize; $i++)
{
$post_id = $reversed[$i][0];
$comment = $reversed[$i][1];
$image_loc = $reversed[$i][2];
$owner_id = $reversed[$i][3];
$account_id = $reversed[$i][4];
$shop_id = $reversed[$i][5];
$user_id = $reversed[$i][6];
$product_id = $reversed[$i][7];
$friend_id = $reversed[$i][8];
$datetime = strtotime($reversed[$i][9]);
$datetime = date("D, d M Y, h:m a", $datetime);
//echo $post_id.'-'.$comment.'-'.$image_loc.'-'.$shop_id.'-'.$account_id.'-'.$product_id.'-'.$friend_id.'-'.$user_id.'-'.$owner_id.'-'.$datetime.'<br>';

if($shop_id == 'COMM')
{
	echo '
			<ul>
				<li class="list-inline font-xs" style="margin-bottom:-10px; padding-left:0px; margin-left:-34px;">
					', get_status_name($owner_id),' changed his/her Profile Status
				</li>
				<li class="message">
					', get_status_pic_of_sender($owner_id), '
					', get_status_name($owner_id), ' 
					<p style="padding-left:55px;">'. $comment.'
					</p>
				</li>
				<li class="message" style="margin-top:-17px;margin-bottom:10px;padding-left:50px;">
					<ul class="list-inline font-xs " >
						<li class="text-primary">
							'.$datetime.'
						</li>
					</ul>	
				</li>	
			</ul>
			<span class="timeline-seperator text-center"></span>					
		';

}

else if($comment == 'shoplike')
{
	echo '
			<ul>
				<li class="message">
					', get_status_pic_of_sender($shop_id), '
					', get_status_name($shop_id),'
					liked
					', get_shopname($user_id),'
				</li>
				<li class="message" style="margin-top:-10px;margin-bottom:30px;padding-left:50px;">
					<ul class="list-inline font-xs " >
						<li class="text-primary">
							'.$datetime.'
						</li>
					</ul>	
				</li>
			</ul>
			<span class="timeline-seperator text-center"></span>
		';
}

else if($comment == 'productlike')
{
	$theProd = "SELECT * from product where product_id = '$user_id' ";
	$qrytheProd = mysqli_query($link, $theProd);
	while($theName = mysqli_fetch_assoc($qrytheProd))
	{
		$name = $theName['name'];
		$prdt_name_format = formatUrl($name);
		$price = $theName['price'];
		$image_loc = $theName['image_loc'];
		$shop_id = $theName['shop_id'];
	}
	echo '
			<ul>
				<li class="message">
					', get_status_pic_of_sender($product_id), '
					', get_status_name($product_id),'
					liked
					<li class="" style="height:50px; padding-bottom:0px; padding-left:220px; margin-top:-20px; list-style:none;"  >
						<div class="well no-margin" style="height:47px; width:250px; padding:5px;">
							<table border="0" width="100%" cellpadding="0" cellspacing="0" align="right">
								<tr>
									<td height="25" width="55">
										<img src="'. $image_loc.'" class="edit-record img-rounded"  
										onClick="Load_Contents_From_DB_by_Vasplus_Blog('.$product_id .');"style="height:35px; width:35px;">
									</td>
									<td align="left">
										<input type="hidden" id="product_id" value="'. $product_id .'" /> 
										<small class="text-muted"><a href="/productprocess.php?shop_id='.$shop_id.'
										&product_id='. $product_id .'&prdt_name='.$prdt_name_format.'">'.$name.'</a></small><br>
										<small class="text-warning">GHS '.$price.'</small>
									</td>
								</tr>
							</table>
						</div>
					</li>
				</li>
				<li class="message" style="margin-top:-10px;margin-bottom:-5px;padding-left:50px;">
					<ul class="list-inline font-xs " >
						<li class="text-primary">
							'.$datetime.'
						</li>
					</ul>	
				</li>
			</ul>
			<span class="timeline-seperator text-center"></span>
		';
}

else if($comment == 'subscribed')
{
	echo '
			<ul>
				<li class="message">
					', get_status_pic_of_sender($user_id), '
					', get_status_name($user_id),'
					subscribed to
					', get_shopname($shop_id),'
				</li>
				<li class="message" style="margin-top:-10px;margin-bottom:30px;padding-left:50px;">
					<ul class="list-inline font-xs " >
						<li class="text-primary">
							'.$datetime.'
						</li>
					</ul>	
				</li>
			</ul>
			<span class="timeline-seperator text-center"></span>
		';
}

else if($comment == 'newfriend')
{
	echo '
			<ul style="margin-bottom:40px;">
				<li class="message">
					', get_status_pic_of_sender($account_id), '
					', get_status_name($account_id),'
					is now in connection with
					', get_status_pic_of_sender($friend_id), '
					', get_status_name($friend_id),'
				</li>
				<li class="message" style="margin-top:-10px;margin-bottom:5px;padding-left:50px;">
					<ul class="list-inline font-xs " >
						<li class="text-primary">
							'.$datetime.'
						</li>
					</ul>	
				</li>
			</ul>
			<span class="timeline-seperator text-center"></span>
		';
}
}
echo '</ul></div>';
}
/*}
else echo '<strong class="text-primary" style="margin-left:20px;">You have NO Friends Yet</strong>'; */
}
else echo '<strong class="text-primary" style="margin-left:20px;">You have no friend activity Yet</strong>';
}


function get_subscribed_shop_notify()
{
include "include/conxn.php";
//include "include/sessionfile.php";
//include "include/funcxn.php";
$thisUser = $_SESSION['id'];
$array1[] = array(1,1,1,1,1,1,1,1,1,1);
$array2[] = array(1,1,1,1,1,1,1,1,1,1);

//find last logut time
$logout = "SELECT last_datetime from status where user_id = '$thisUser' ";
$querylogout = mysqli_query($link, $logout);
while($whilelogout = mysqli_fetch_assoc($querylogout))
{
$lastOut = $whilelogout['last_datetime'];
}

//find subscribed shops
$subs = "SELECT shop_id from subscribers where user_id = '$thisUser' ";
$querysubs = mysqli_query($link, $subs);
$totalSubs = mysqli_num_rows($querysubs);
if($totalSubs >= 1)
{
while($whilesubs = mysqli_fetch_assoc($querysubs))
{
$mySubs[] = $whilesubs['shop_id'];
}
//convert array to string
$range = '(' . implode(",",$mySubs) . ')';

//select subscribed shop comments
$sql = "SELECT id, 'EMPTY' AS product_id, 'EMPTY' AS name, 'EMPTY' AS descrb, 'EMPTY' AS price, comment, image_loc, shop_id, 
account_id, datetime FROM shop_comment WHERE shop_id IN $range /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";
$query = mysqli_query($link,$sql);
if(mysqli_num_rows($query) > 0)
{
$checker1 = "true";
while($row = mysqli_fetch_assoc($query))
{
$array1[] = array($row['id'], $row['comment'], $row['image_loc'], $row['shop_id'], $row['account_id'], 
$row['product_id'], $row['name'], $row['descrb'], $row['price'], $row['datetime']);
}
}
else{ $checker1 = "false"; }

//select subscribed shop products
$sql2 = "SELECT 'EMPTY' AS id, 'EMPTY' AS comment, product_id, account_id, shop_id, name, descrb, price, 
image_loc, datetime FROM product WHERE shop_id IN $range /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
$query2 = mysqli_query($link,$sql2);
if(mysqli_num_rows($query2) > 0)
{
$checker2 = "true";
while($row2 = mysqli_fetch_assoc($query2))
{
$array2[] = array($row2['id'], $row2['comment'], $row2['image_loc'], $row2['shop_id'], $row2['account_id'], 
$row2['product_id'], $row2['name'], $row2['descrb'], $row2['price'], $row2['datetime']);
}
}
else{ $checker2 = "false"; }

if($checker1 == "false" AND $checker2 == "false")
{
echo '<strong class="text-primary" style="">No new Activity from Subscribed Shops</strong>';
}

else
{
//merge the two arrays
$result = array_merge($array1, $array2);

//sort the merged array according to date which is record [2] of each inner array
function compare_datetime2($a, $b) 
{ 
return strcmp($a['9'], $b['9']); 
} 
// sort 
usort($result, 'compare_datetime2');

//reverse the sorted array to descending order
$reversed = array_reverse($result);
echo '
<div class="chat-body profile-message padding-no" style=" ">

<ul class="myscroll padding-no margin-no " style="height:500px;  ">';
$arraysize = count($reversed);
for($i=0; $i < $arraysize; $i++)
{
$post_id = $reversed[$i][0];
$comment = $reversed[$i][1];
$image_loc = $reversed[$i][2];
$shop_id = $reversed[$i][3];
$account_id = $reversed[$i][4];
$product_id = $reversed[$i][5];
$name = $reversed[$i][6];
$descrb = $reversed[$i][7];
$price = $reversed[$i][8];
$datetime = strtotime($reversed[$i][9]);
$datetime = date("D, d M Y", $datetime);
//echo $post_id.'-'.$comment.'-'.$image_loc.'-'.$shop_id.'-'.$account_id.'-'.$product_id.'-'.$name.'-'.$descrb.'-'.$price.'-'.$datetime.'<br>';

if($comment == 'EMPTY')
{
$theShop = "SELECT shopName from shop where shop_id = '$shop_id' ";
$qrytheShop = mysqli_query($link, $theShop);
while($theName = mysqli_fetch_assoc($qrytheShop))
{
$theShopName = $theName['shopName'];
}
echo '
		<li class="padding-no message ">
			<a href="/shopprocess.php?shopName='.$theShopName.'" class="text-primary"><strong>'.$theShopName.'</strong></a>
			added
			
		</li>


<li class=" " style="height:70px; padding-bottom:10px; padding-left:0px;"  >

<div class="well no-margin" style="height:67px; width:300px; padding:5px;">
<table border="0" width="100%" cellpadding="0" cellspacing="0" align="right">
<tr>
<td height="55" width="55">
<img src="'. $image_loc.'" class="edit-record img-rounded"  
onClick="Load_Contents_From_DB_by_Vasplus_Blog('.$product_id .');"style="height:50px; width:50px;">
</td>
<td align="left">
<input type="hidden" id="product_id" value="'. $product_id .'" /> 
<small class="text-muted"><a href="/productprocess.php?shopName='.$theShopName.'
&product_id='. $product_id .'&prdt_name='.$name.'">'.$name.'</a></small>
</td>
</tr>
</table>
</div>

<strong class="list-inline font-xs text-primary">'.$datetime.'</strong>	
</li>
	
';
}

else if($product_id == 'EMPTY')
{
$theShop = "SELECT * from shop where shop_id = '$shop_id' ";
$qrytheShop = mysqli_query($link, $theShop);
while($theName = mysqli_fetch_assoc($qrytheShop))
{
$theShopName = $theName['shopName'];
}
echo '
	<div class="padding-5">
		<li class="list-inline font-sm padding-no" style="margin-bottom:-10px; ">
		 <a href="/shopprocess.php?shopName='.$theShopName.'" class="text-primary"><strong>'.$theShopName.'</strong></a>page comment by ', name_text($account_id),' <p style="">'. $comment.' <span class="text-primary">'.$datetime.'
			</span></p>
		</li>
		</div>	
		
	<span class="timeline-seperator text-center"></span>					
';
}
}
}
echo '</ul></div>';
}
else echo '<strong class="text-primary" style="margin-left:20px;">You are not subscribed to any shops yet</strong><hr>';
echo get_shop_suggested(); 
}
function subscribe_number($shop_id)
{include "include/conxn.php";
//$user_id = safe_input($_SESSION['id']);
//$shop_id = safe_input($_GET['shop_id']);
$no_query = " SELECT * FROM subscribers WHERE shop_id = $shop_id ";

$query4subscribeno = mysqli_query($link,$no_query);
$no_of_subscribers = mysqli_num_rows($query4subscribeno);	
if($no_of_subscribers >= 1)
{
echo '
<div class="well pull-left padding-5" style="margin-top:-40px; background:none; border:none; box-shadow:none;" >
<span class="badge" ><span class="badge" style="background-color:#000;">'.$no_of_subscribers.'</span></span></div>';
}
else {
echo '
<div class="well pull-left padding-5" style="margin-top:-40px; background:none; border:none; box-shadow:none;">
<span class="badge" >No Subscribers</span></div>';
}
}

function out_of_business_check($shop_id)
{include "include/conxn.php";
//$user_id = safe_input($_SESSION['id']);
//$shop_id = safe_input($_GET['shop_id']);
$queryout = " SELECT mode FROM shop WHERE shop_id = $shop_id  ";

$out_bus = mysqli_query($link,$queryout);	
if(mysqli_num_rows($out_bus)==1)
{
while($allpalls_out_bus= mysqli_fetch_array($out_bus,MYSQLI_ASSOC))
{
$mode = $allpalls_out_bus['mode'];
if( $mode == 1)
{
echo '';
}
else
{
echo '<span class="badge" style="background-color:#b94a48;" >Out of business</span>';
} 
}
}
}

function shopcategory($shop_id)
{
include "include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$email  = safe_input($_SESSION['email']);
$query1 = "SELECT * FROM `shop`WHERE `user_id` = '$main_user_id.' &&`shop_id` = '$shop_id' LIMIT 0 , 5"; 
$query4user_info1 = mysqli_query($link,$query1);
while($allpalls_info = mysqli_fetch_array($query4user_info1,MYSQLI_ASSOC))
{
$category = safe_input($allpalls_info['category']);
$user_id = safe_input($allpalls_info['user_id']);

if($main_user_id ==  $user_id)
{
echo  '<small class="text-warning" >' .$category .'</small>';
}
}
}
?>