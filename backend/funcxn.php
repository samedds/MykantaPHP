<?php
include "conxn.php";
//this function will help prevent SQL injections and other hacks
function safe_input($value)
{include "conxn.php";
//$magic_quotes_active = get_magic_quotes_gpc();//boolean - true if the quotes thing is turned on
$new_enough_php = function_exists("mysqli_real_escape_string");//boolean - true if the function exists (php 4.3 or higher)
if($new_enough_php)
{

$value = stripslashes($value);//if its a new version of php but has the quotes thing running, then strip the slashes it puts in

$value = mysqli_real_escape_string($link,$value);//if its a new version use the function to deal with characters
//$value = htmlspecialchars($value_new);//if its a new version use the function to deal with characters
}
else
{
$value = addslashes($value);
}
$value_final =  preg_replace('/[^A-Za-z0-9\_\@\.\-\/\#\(\)\,\!\$\%\^\&\*\+\ ]/ ', '', $value);
 return $value_final;
}
function convertHashtags($str){
 // $new_str  = preg_replace('/[^A-Za-z0-9\_\ ]/ ', '', $str);
	$regex = "/#+([a-zA-Z0-9_]+)/";
	$str = preg_replace($regex, '<a href="/hashtags/$1" style="color:orange;">$0</a>', $str);
	return($str);
}
function strip_text($token)
    {
          $value =  preg_replace('/[^A-Za-z0-9\_\@\.\-\ ]/ ', '', $token);
            return $value;
    }
	
function strip_num($token)
    {
          $value =  preg_replace('/[^0-9\ ]/ ', '', $token);
            return $value;
    }
function safe_input_no_chars($value)
{include "conxn.php";
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

function price_figure($price)
{
$price_o = preg_replace('/[^0-9\.]/', '', $price);
return sprintf('%01.2f', $price_o);
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
else return "";
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
	 
	 function cat_name_ico($cat_id)
    {
	//1
	if($cat_id=='Media & Entertainment')
	{return '<i class="fa fa-cutlery pull-right"></i>';}
		
	else if($cat_id=='Agriculture, Food & Beverage')
	{return '<i class="fa fa-cutlery pull-right"></i>';}
	
	else if($cat_id=='Art, Crafts & Gallery')
	{return '<i class="fa fa-paint-brush pull-right"></i>';}
	
	else if($cat_id=='Auto & Transportation')
	{return '<i class="fa fa-car pull-right"></i>';}
	
	else if($cat_id=='Clothing, Textiles, Jewelry, Bags & shoes')
	{return '<i class="fa fa-shopping-bag  pull-right" aria-hidden="true"></i>';}
	
	else if($cat_id=='Electrical Equipment, Components, & Telecom')
	{return '<i class="fa fa-flash pull-right"></i>';}
	
	else if($cat_id=='Electronics & Electrical Appliances')
	{return '<i class="fa fa-television pull-right"></i>';}
	
	else if($cat_id=='Gifts & Toys')
	{return '<i class="fa fa-gift pull-right"></i>';}
	
	else if($cat_id=='Health & Beauty')
	{return '<i class="fa fa-female pull-right"></i>';}
	
	else if($cat_id=='Home, Light & Construction')
	{return '<i class="fa fa-lightbulb-o  pull-right"></i>';}
	
	else if($cat_id=='Machinery, Hardware & Tools')
	{return '<i class="fa fa-wrench pull-right"></i>';}
	
	else if($cat_id=='Metallurgy, Chemicals, Rubber & Plastics')
	{return '<i class="fa fa-tint pull-right"></i>';}
	
	else if($cat_id=='Packaging, Advertising & Office')
	{return '<i class="fa fa-newspaper-o pull-right"></i>';}
	
	else if($cat_id=='Software, Computers & Accessories')
	{return '<i class="fa fa-laptop pull-right"></i>';}
	
	else if($cat_id=='Sports & Accessories')
	{return '<i class="fa fa-trophy pull-right"></i>';}
	
	else if($cat_id=='Stationery, Furniture & Fittings')
	{return '<i class="fa fa-book pull-right"></i>';}
	
	else return "null";
	 } 
	 function cat_name_ico_stable($cat_id)
    {
	//1
	if($cat_id=='Agriculture, Food & Beverage')
	{return '<i class="fa fa-cutlery "></i>';}
	
	else if($cat_id=='Art, Crafts & Gallery')
	{return '<i class="fa fa-paint-brush "></i>';}
	
	else if($cat_id=='Auto & Transportation')
	{return '<i class="fa fa-car "></i>';}
	
	else if($cat_id=='Clothing, Textiles, Jewelry, Bags & shoes')
	{return '<i class="fa fa-shopping-bag " aria-hidden="true"></i>';}
	
	else if($cat_id=='Electrical Equipment, Components, & Telecom')
	{return '<i class="fa fa-flash "></i>';}
	
	else if($cat_id=='Electronics & Electrical Appliances')
	{return '<i class="fa fa-television "></i>';}
	
	else if($cat_id=='Gifts & Toys')
	{return '<i class="fa fa-gift "></i>';}
	
	else if($cat_id=='Health & Beauty')
	{return '<i class="fa fa-female "></i>';}
	
	else if($cat_id=='Home, Light & Construction')
	{return '<i class="fa fa-lightbulb-o  "></i>';}
	
	else if($cat_id=='Machinery, Hardware & Tools')
	{return '<i class="fa fa-wrench "></i>';}
	
	else if($cat_id=='Metallurgy, Chemicals, Rubber & Plastics')
	{return '<i class="fa fa-tint "></i>';}
	
	else if($cat_id=='Packaging, Advertising & Office')
	{return '<i class="fa fa-newspaper-o "></i>';}
	
	else if($cat_id=='Software, Computers & Accessories')
	{return '<i class="fa fa-laptop "></i>';}
	
	else if($cat_id=='Sports & Accessories')
	{return '<i class="fa fa-trophy "></i>';}
	
	else if($cat_id=='Stationery, Furniture & Fittings')
	{return '<i class="fa fa-book "></i>';}
	
	else return "null";
	 }
	 
function neat_text($string) {
return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
} 
function cleans_text($string) {
$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
} 
function full_name($account_id)
{include "conxn.php";
$query = "SELECT * FROM registration where id = $account_id  LIMIT 1 ";

if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
                 $firstName = safe_input($details['firstName']);
                 $friend_id = safe_input($details['id']);
                 $username = safe_input($details['username']);

echo ucwords($firstName);
  }
  }
}
function name_text($account_id)
{include "conxn.php";
$query = "SELECT * FROM registration where id = $account_id  LIMIT 1 ";

if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
                 $firstName = safe_input($details['firstName']);
                 $friend_id = safe_input($details['id']);
                 $username = safe_input($details['username']);

echo '<strong style="" class="text-info"> '.ucwords($username).'</strong>';
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
include "conxn.php";
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
function  shop_name_only($product_id)
{include "conxn.php";

$query = "SELECT shop_id FROM `product` WHERE `product_id` = '$product_id.' LIMIT 0 , 1";

$query4user_info = mysqli_query($link,$query);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$shop_id = $allpalls_info['shop_id'];

$query1 = "SELECT shopName FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 1";

$query4user_info1 = mysqli_query($link,$query1);
while($allpalls_info1 = mysqli_fetch_array($query4user_info1,MYSQLI_ASSOC))
{
	
echo $shopName = $allpalls_info1['shopName'];
 
}
}
}
//full shop name
function  shopdetail($shop_id)
{include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$email  = safe_input($_SESSION['email']);

$query = "SELECT * FROM `shop`WHERE `user_id` = '$main_user_id.' &&`shop_id` = '$shop_id' LIMIT 0 , 5";

$query4user_info = mysqli_query($link,$query);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$shopName = $allpalls_info['shopName'];
$countryCode = $allpalls_info['countryCode'];
$telephone = $allpalls_info['telephone'];
$email = $allpalls_info['email'];
$shop_descrb =$allpalls_info['shop_descrb'];
$address = $allpalls_info['address'];
$country = $allpalls_info['country'];
$city = $allpalls_info['city'];
$region = $allpalls_info['state'];
$user_id = $allpalls_info['user_id'];
$bus_type = $allpalls_info['bus_type'];
$category = $allpalls_info['category'];
$business_url ='<i class="glyphicon glyphicon-globe"></i> URL
 <p class="text-muted"> '.$allpalls_info['business_url'].'</p>';
$core_products = $allpalls_info['core_products'];

if($main_user_id ==  $user_id)

{
echo  ' 
<h4>ABOUT  <span class="pull-right">', verification_status($shop_id),'</span><hr></h4>
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

<i class="glyphicon glyphicon-envelope"></i> Email
 <p class="text-muted"> '.$email.'</p>

<i class="glyphicon glyphicon-link"></i>  Mykanta URL 
 <p class="text-muted"><a href="/business/'.$shopName.'">www.mykanta.com/business/'.$shopName.'</a></p>

'.$business_url.'
</ul>

<h4>OTHERS<hr ></h4>
<ul> 
<i class="glyphicon glyphicon-th"></i> Core Products
 <p class="text-muted"> '.$core_products.'</p>

</ul>
';
}
}
}//full shop name
function  shopdetail_for_all($shop_id)
{include "conxn.php";

$email  = safe_input($_SESSION['email']);

$query = "SELECT * FROM `shop`WHERE `shop_id` = '$shop_id' LIMIT 0 , 5";

$query4user_info = mysqli_query($link,$query);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{

$shopName = safe_input($allpalls_info['shopName']);
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

if(!empty($user_id))
{
echo  ' 
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

<i class="glyphicon glyphicon-envelope"></i> Email
 <p class="text-muted"> '.$email.'</p>

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

function shop_id_from_name($shopName)
{include "conxn.php";
$query2 = "SELECT shop_id FROM shop WHERE shopName = '$shopName'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['shop_id'];
return safe_input($view_count);
}
}

function post_id_from_gif($image_loc)
{include "conxn.php";
$query2 = "SELECT id FROM account_comment WHERE image_loc = '$image_loc'  ORDER BY id ASC LIMIT 1";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['id'];
return safe_input($view_count);
}
}

function id_from_reev($reev_id)
{include "conxn.php";
$query2 = "SELECT account_id FROM account_comment WHERE id = '$reev_id'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['account_id'];
return safe_input($view_count);
}
}

function shop_tel_number_from_name($shop_id)
{include "conxn.php";
$query2 = "SELECT telephone FROM shop WHERE shop_id = '$shop_id' AND mode >= 1 LIMIT 1";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['telephone'];
return safe_input($view_count);
}
}

function user_id_from_shop_id($shop_id)
{include "conxn.php";
$query2 = "SELECT user_id FROM shop WHERE shop_id = '$shop_id'";
$query_data = mysqli_query($link,$query2);
	if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
	{
	$view_count = $query_count['user_id'];
	return $view_count;
	}
}

function shop_id_from_user_id($user_id)
{include "conxn.php";
$thisUser = $_SESSION['id'];
$query2 = "SELECT shop_id FROM shop WHERE user_id = '$user_id' LIMIT 2";
$query_data = mysqli_query($link,$query2);
	if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
	{
	$view_count = $query_count['shop_id'];
	return safe_input($view_count);
	}
}

function email_frm_id($user_id)
{include "conxn.php";
$query2 = "SELECT email FROM registration WHERE id = '$user_id'";
$query_data = mysqli_query($link,$query2);
	if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
	{
	$view_count = $query_count['email'];
	return safe_input($view_count);
	}
}
function name_from_shop_id($shop_id)
{include "conxn.php";
$query2 = "SELECT shopName FROM shop WHERE shop_id = '$shop_id'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['shopName'];
return safe_input($view_count);
}
}
function email_from_shop_id($shop_id)
{include "conxn.php";
$query2 = "SELECT email FROM shop WHERE shop_id = '$shop_id'    
";
$query_data = mysqli_query($link,$query2);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['email'];
return safe_input($view_count);
}
}

function friend_id_from_name($username)
{include "conxn.php";
$query2 = "SELECT id FROM registration WHERE username = '$username'    
";
$query_data = mysqli_query($link,$query2);
while($query_count = mysqli_fetch_assoc($query_data))
{
$view_count = $query_count['id'];
return safe_input($view_count);
}
}
function  shopdetail_product($shop_id)
{ include "conxn.php";
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
{include "conxn.php";
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
{include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT * FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 1 ";	 
$query4user_info = mysqli_query($link,$query);
		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
		  $user_id = safe_input($allpalls_info['user_id']);
		  $shopName = safe_input($allpalls_info['shopName']);
		  $shopNameformat = formatUrl($shopName);
		  $telephone = safe_input($allpalls_info['telephone']);
		  $shop_descrb = safe_input($allpalls_info['shop_descrb']);
		  $clean_name = formatUrl($shopName); 
		  $address = safe_input($allpalls_info['address']);
		  $country = safe_input($allpalls_info['country']);
		  $city = safe_input($allpalls_info['city']);
		  $region = safe_input($allpalls_info['state']);
		  $category = safe_input($allpalls_info['category']);
		  
		 $query = "SELECT * FROM `registration` WHERE `id` = '$user_id' LIMIT 1 ";
$query4user_info = mysqli_query($link,$query);
		 while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 { 
		  $firstname  = safe_input($allpalls_info['firstName']);
          $username    = safe_input($allpalls_info['username']);

		  if($main_user_id !=  $user_id)
          {
		  echo 
		  ' 
		   	 <div class="col-sm-12 col-md-12 col-lg-12 no-padding" >
	<h1>'.$shopName.' ',verification_status_business_owner($shop_id).'
			 <ul id="sparks" class="pull-right">

			<li class="sparks-info ">
				<h5> subscribers <span class="txt-color-black"><i class="fa fa-rss" data-rel="bootstrap-tooltip" title="Increased"></i> ', get_subscribers_no($shop_id),'</span></h5>
				<div class="sparkline txt-color-black hidden-mobile hidden-md hidden-sm"><canvas height="26" width="69" style="display: inline-block; width: 69px; height: 26px; vertical-align: top;"></canvas></div>
			</li>
			
		<li class="sparks-info ">
				<h5> visitors <span class="txt-color-black"><i class="fa fa-location"></i> ',get_shop_views_for_upadting($shop_id),'</span></h5>
				<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"><canvas height="26" width="69" style="display: inline-block; width: 69px; height: 26px; vertical-align: top;"></canvas></div>
			</li>
			
		
		</ul>
								
			<div class="" style="padding-right:7px;"><p class="text-warning  " ><a href="/product-category/'.cat_name_trans($category).'">' .$category .' </a>
		  </p></div>					
			</h1></div>';
		  }
		}
		}
}

function  shopdetailnogetother_product($shop_id,$product_id)
{include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT * FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 5";
$query4user_info = mysqli_query($link,$query);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$user_id = $allpalls_info['user_id'];
$shopName = $allpalls_info['shopName'];
$clean_name = strtolower(formatUrl($shopName)); 
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
$username    = safe_input($allpalls_info['username']);

if($main_user_id !=  $user_id)
{
echo  	 ' 
 <div class="col-sm-12 col-md-12 col-lg-12 no-padding" >
	<h1><a href="/business-link/'.$clean_name.'"><span style=" font-size:1.2em; color:black; "><i class="fa fa-home"></i>   '.$shopName.'</span></a>
			<div class="" style="padding-right:7px;"><span class=" small text-primary">',get_shop_views($shop_id,$product_id),' Views 
			</span><small class="text-warning  " ><a href="/product-category/'.cat_name_trans($category).'">' .$category .' </a>
		  </small></div>					
			</h1></div>
';
}

}

}

}

function out_of_business_button($shop_id)
{include "conxn.php";
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
{include "conxn.php";
$user_id = safe_input($_SESSION['id']);
$product_id = safe_input($_GET['product_id']);
$query = " SELECT mode FROM product WHERE product_id = $product_id && account_id= $user_id  ";

$out_of_b = mysqli_query($link,$query);	
if(mysqli_num_rows($out_of_b)==1)
{
while($allpalls_out_of_b= mysqli_fetch_array($out_of_b,MYSQLI_ASSOC))
{
$mode = $allpalls_out_of_b['mode'];
if( $mode >= 1)
{
echo ' <a data-target="#del_product_modal" data-toggle="modal" class="text-danger"> Unavailable</a>';
}
else
{
echo ' <a data-target="#restore_product_modal" data-toggle="modal" class="text-danger">Restore</a>';
}

}
}

}

function subscribe_button($shop_id)
{include "conxn.php";
$user_id = safe_input($_SESSION['id']);
//$shop_id = safe_input($_GET['shop_id']);
$query = " SELECT user_id FROM subscribers WHERE shop_id = $shop_id && user_id= $user_id ";

$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)==1)
{
echo '
<a href="javascript:void(0);" class=" text-primary" style=""  id="unsubscribe_btn" >
Unsubscribe</a>';
}
else {
echo '
<a href="javascript:void(0);" class="text-primary" id="subscribe_btn" style=" ">
Subscribe</a>';
}
} 

function like_button($shop_id)
{ include "conxn.php";
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
{ include "conxn.php";

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
function  profile_info_small($user_id)
{
include "conxn.php";
$main_user_id  = $_SESSION['id'];
$posts = array();
$post = array();
$view = 0;
$results = 0;
$subsribers = 0;
	 //count of product options 
$query = "SELECT COUNT(account_id) FROM product_review WHERE account_id = '$main_user_id'";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$res_no = $query_count[0];

$query2 = "SELECT COUNT(account_id) FROM shop_comment WHERE account_id = '$main_user_id'";
$query4user_info2 = mysqli_query($link,$query2);
$query_count2 = mysqli_fetch_row($query4user_info2);
$res_no2 = $query_count2[0];
		
//new methid	
$querya = "SELECT id FROM account_comment WHERE account_id = '$main_user_id'";
if($query_adda = mysqli_query($link,$querya))
{
	while($productsa = mysqli_fetch_assoc($query_adda))
		{	
			$product_id = $productsa['id'];
         
		$queryz = "SELECT number_of_smiles FROM smiles_reev WHERE reev_id = '$product_id'";
		if($query_addz = mysqli_query($link,$queryz))
		{
			while($productsz = mysqli_fetch_assoc($query_addz))
				{	
					$number_of_smiles = $productsz['number_of_smiles'];
				}
		}
		array_push($posts,$number_of_smiles);
		$news = array_sum($posts);
		 $view =  json_encode($news);
	 }
}

//new methid	
$querya = "SELECT shop_id FROM shop WHERE user_id = '$main_user_id'";
if($query_adda = mysqli_query($link,$querya))
{
	while($productsa = mysqli_fetch_assoc($query_adda))
		{	
			$shop_id = $productsa['shop_id'];
         
		$queryz = "SELECT COUNT(id) FROM subscribers WHERE shop_id = '$shop_id'";
		if($query_data = mysqli_query($link,$queryz))
		{
			$query_count = mysqli_fetch_row($query_data);
			$view_count = $query_count[0];
		}
		array_push($post,$view_count);
		$subs = array_sum($post);
		 $subsribers =  json_encode($subs);
	 }
}




		$results = $res_no + $res_no2;
		echo '<li class="sparks-info padding-5" style="width:50px; min-width:50px;">
		<h5 title="Reviews made on products and Shops"> Reviews <span class="txt-color-black"><i class="fa fa-comments" data-rel="bootstrap-tooltip" title="Reviews made on products and Shops"></i> '.$results.'</span></h5>
		<div class="sparkline txt-color-black hidden-mobile hidden-md hidden-sm"></div>
	</li>
	  <li class="sparks-info padding-5" style="width:30px; min-width:65px;">
		<h5 title="Total subscribers on shop"> Stars <span class="txt-color-black"><i class="fa fa-star" title="Total stars on posts"></i> '.$view.'</span></h5>
		<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"></div>
	 </li>
	  <li class="sparks-info padding-5" style="width:65px; min-width:65px;">
		<h5 title="Total subscribers on shop"> Subscribers <span class="txt-color-black"><i class="fa fa-rss" title="Total subscribers on shop"></i> '.$subsribers.'</span></h5>
		<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"></div>
	 </li>';

}

function  profile_info($user_id)
{
include "conxn.php";
$main_user_id  = $_SESSION['id'];
$posts = array();
$post = array();
$view = 0;
$results = 0;
$subsribers = 0;
	 //count of product options 
$query = "SELECT COUNT(account_id) FROM product_review WHERE account_id = '$main_user_id'";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$res_no = $query_count[0];

$query2 = "SELECT COUNT(account_id) FROM shop_comment WHERE account_id = '$main_user_id'";
$query4user_info2 = mysqli_query($link,$query2);
$query_count2 = mysqli_fetch_row($query4user_info2);
$res_no2 = $query_count2[0];
		
//new methid	
$querya = "SELECT id FROM account_comment WHERE account_id = '$main_user_id'";
if($query_adda = mysqli_query($link,$querya))
{
	while($productsa = mysqli_fetch_assoc($query_adda))
		{	
			$product_id = $productsa['id'];
         
		$queryz = "SELECT number_of_smiles FROM smiles_reev WHERE reev_id = '$product_id'";
		if($query_addz = mysqli_query($link,$queryz))
		{
			while($productsz = mysqli_fetch_assoc($query_addz))
				{	
					$number_of_smiles = $productsz['number_of_smiles'];
				}
		}
		array_push($posts,$number_of_smiles);
		$news = array_sum($posts);
		 $view =  json_encode($news);
	 }
}

//new methid	
$querya = "SELECT shop_id FROM shop WHERE user_id = '$main_user_id'";
if($query_adda = mysqli_query($link,$querya))
{
	while($productsa = mysqli_fetch_assoc($query_adda))
		{	
			$shop_id = $productsa['shop_id'];
         
		$queryz = "SELECT COUNT(id) FROM subscribers WHERE shop_id = '$shop_id'";
		if($query_data = mysqli_query($link,$queryz))
		{
			$query_count = mysqli_fetch_row($query_data);
			$view_count = $query_count[0];
		}
		array_push($post,$view_count);
		$subs = array_sum($post);
		 $subsribers =  json_encode($subs);
	 }
}




		$results = $res_no + $res_no2;
echo '<li class="sparks-info padding-5" style="width:40px; min-width:50px;">
		<h5 title="Reviews made on products and Shops"> Reviews <span class="txt-color-black"><i class="fa fa-comments" data-rel="bootstrap-tooltip" title="Reviews made on products and Shops"></i> '.$results.'</span></h5>
		<div class="sparkline txt-color-black hidden-mobile hidden-md hidden-sm"></div>
	</li>
	  <li class="sparks-info padding-5" style="width:30px; min-width:50px;">
		<h5 title="Total stars on posts"> Stars <span class="txt-color-black"><i class="fa fa-rss" title="Total subscribers on shop"></i> '.$view.'</span></h5>
		<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"></div>
	 </li>
	 <li class="sparks-info padding-5" style="width:65px; min-width:65px;">
		<h5 title="Total subscribers on shop"> Subscribers <span class="txt-color-black"><i class="fa fa-rss" title="Total subscribers on shop"></i> '.$subsribers.'</span></h5>
		<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"></div>
	 </li>';

}


function  get_myshopnames($user_id)
{  include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT shopName,shop_id,category FROM `shop`
WHERE `user_id` = '$main_user_id' LIMIT 0 , 5
";	 
$query4user_info = mysqli_query($link,$query);
if($num_shop = mysqli_num_rows($query4user_info)>0)
{
$_SESSION['num_shop'] = $num_shop;
////query_confirm($query4user_info);

while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$shopNames = $allpalls_info['shopName'];
$category = $allpalls_info['category'];
$category_new = cat_name_ico($category);
$shopNameformat1  = strtolower(formatUrl($shopNames)); 
$shopNameformat = ucwords(strtolower($shopNameformat1));
$clean_name = formatUrl_rev($shopNameformat); 
$shop_id = shop_id_from_name($clean_name);

/*  $shop_id  = safe_input($allpalls_info['shop_id']);	*/
if($main_user_id ==  $user_id)
{
	//---------
$query = " SELECT image_loc FROM banner_pic WHERE shop_id = $shop_id ";
$querybannerpic = mysqli_query($link,$query);	

if(mysqli_num_rows($querybannerpic)==1)
{
while($banner_pic  = mysqli_fetch_array($querybannerpic,MYSQLI_ASSOC))
{   
$banner_image = safe_input($banner_pic['image_loc']);
echo ' 
<div class="item active" title="change" align="center" >
<a style="" href="/User/my-business/'.$shopNameformat1.'"><img src="/'. $banner_image.'" alt="change"class="img img-thumbnail"style= "height:120px; width:100%; color:black;"  title="'.$shopNames.'"  /></a>
<div class="pull-left ">
<h3><a style="padding-left:10px; padding:10px; color:black;" href="/User/my-business/'.$shopNameformat1.'">'.$shopNames.'</a> ',verification_icon($shop_id),'</h3>
</div>		
  </div> 
		<ul id="sparks" class="">
			<li class="spark s-info padding-5">
				<h5> Followers <span class="txt-color-black"><i class="fa fa-rss" data-rel="bootstrap-tooltip" title="Increased"></i>', get_subscribers_no($shop_id),'</span></h5>
				<div class="sparkline txt-color-black hidden-mobile hidden-md hidden-sm"></div>
			</li>
			<li class="spa rks-info padding-5">
				<h5> orders <span class="txt-color-black"> <i class="fa fa-shopping-cart"></i> ',product_orders_update($shop_id),'</span></h5>
				<div class="sparkline txt-color-black hidden-mobile hidden-md hidden-sm"></div>
			</li>
			<li class="spa rks-info padding-5">
				<h5> visitors <span class="txt-color-black"><i class="fa fa-globe"></i> ',get_shop_views_no($shop_id),'</span></h5>
				<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"></div>
		   </li>
	</ul>
<br>
';}
}else{ $banner_image = "/img/banners/banner-small.png";
echo ' 
<div class="item active " title="change" align="center">
		<a style="" href="/User/my-business/'.$shopNameformat1.'"><img src="/'. $banner_image.'"  title="'.$shopNames.'" class="img img-thumbnail"style= "height:auto; width:100%;  color:black;"/></a>
				<div class="">
				 <strong><a style="padding-top:10px;  color:black;" href="/User/my-business/'.$shopNameformat1.'">'.$shopNames.'</a></strong>
				 </div>		
		</div>                                
<br>
<br>
';
}
}

echo ' ';
}
}else{
	echo '<a class="nav" style="" href="/create_business/"><center class="btn btn-default" style="border-radius:2px; width:100%; height:30px;"> Create a Shop page</center></a>';
}
}
function  get_myshopnames_profile($user_id)
{  include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT shopName,shop_id,category FROM `shop`
WHERE `user_id` = '$main_user_id' LIMIT 0 , 5
";	 
$query4user_info = mysqli_query($link,$query);
if($num_shop = mysqli_num_rows($query4user_info)>0)
{
$_SESSION['num_shop'] = $num_shop;
////query_confirm($query4user_info);

while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$shopNames = $allpalls_info['shopName'];
$category = $allpalls_info['category'];
$category_new = cat_name_ico($category);
$shopNameformat1  = strtolower(formatUrl($shopNames)); 
$shopNameformat = ucwords(strtolower($shopNameformat1));
$clean_name = formatUrl_rev($shopNameformat); 
$shop_id = shop_id_from_name($clean_name);

/*  $shop_id  = safe_input($allpalls_info['shop_id']);	*/
if($main_user_id ==  $user_id)
{
	//---------
$query = " SELECT image_loc FROM banner_pic WHERE shop_id = $shop_id ";
$querybannerpic = mysqli_query($link,$query);	

if(mysqli_num_rows($querybannerpic)==1)
{
while($banner_pic  = mysqli_fetch_array($querybannerpic,MYSQLI_ASSOC))
{   
$banner_image = safe_input($banner_pic['image_loc']);
echo ' 
<div class="item padding-5" title="change" style="height:110px;" >
<a href="/User/my-business/'.$shopNameformat1.'"><img src="/'. $banner_image.'" alt="change" class="img img-thumbnail" style="margin-top:-10px; margin-left:5px; height:80px; width:100%; color:black;"  title="'.$shopNames.'"  /></a>
<div style="height:30px;">
<h3  ><a style="  color:black; padding:30px;" href="/User/my-business/'.$shopNameformat1.'"  class="padding-10" > '.$shopNames.'</a> ',verification_icon_on_profile($shop_id),'</h3>
</div>		
  </div>
		<div class="padding-10"><ul id="sparks" class="padding-10 " style="height:70px; ">
			<li class="sparks-info padding-5">
				<h5> Followers <span class="txt-color-black"><i class="fa fa-rss" data-rel="bootstrap-tooltip" title="Increased"></i> ', get_subscribers_no($shop_id),'</span></h5>
				<div class="sparkline txt-color-black hidden-mobile hidden-md hidden-sm"></div>
			</li>
			<li class="sparks-info padding-5">
				<h5> orders <span class="txt-color-black"> <i class="fa fa-shopping-cart"></i> ',product_orders_update($shop_id),'</span></h5>
				<div class="sparkline txt-color-black hidden-mobile hidden-md hidden-sm"></div>
			</li>
			<li class="sparks-info padding-5">
				<h5> visitors <span class="txt-color-black"><i class="fa fa-globe"></i> ',get_shop_views_no($shop_id),'</span></h5>
				<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm"></div>
		   </li>
	</ul> </div> 

';}
}else{ $banner_image = "/img/banners/banner-small.png";
echo ' 
<div class="item active " title="change" align="center">
<a style="" href="/User/my-business/'.$shopNameformat1.'"><img src="/'.$banner_image.'"  title="'.$shopNames.'" class="img img-thumbnail"style= "height:auto; width:100%; color:black; margin-left:10px;"/></a>
				<div class="">
				 <strong><a style="padding-top:10px;  color:black;" href="/User/my-business/'.$shopNameformat1.'">'.$shopNames.'</a></strong>
				 </div>		
		</div>                                
<br>
<br>
';
}
}

echo ' ';
}
}else{
	echo '<div style="margin-top:-30px;"><a class=" padding-5"  href="/create_business/"><center class="btn btn-primary" style="border-radius:2px; width:100%; height:30px;"> Create a Shop page</center></a></div>';
}
}
function  get_shopnames($user_id)
{  include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT shopName,shop_id,category
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
$category = $allpalls_info['category'];
$category_new = cat_name_ico($category);
$shopNameformat1  = strtolower(formatUrl($shopNames)); 
$shopNameformat = ucwords(strtolower($shopNameformat1));
$clean_name = formatUrl_rev($shopNameformat); 
$shop_id = shop_id_from_name($clean_name);

/*  $shop_id  = safe_input($allpalls_info['shop_id']);	*/
if($main_user_id ==  $user_id)
{
//  before which had a problem displaying  the contents properly echo   '<li ><a href="/Usermy_business/'.$shopNameformat.'">'.$shopNames.'</a></li>'; 
echo   '<li class="no-padding" style="  margin-left:10px;" > <a href="/User/my-business/'.$shopNameformat1.'"  style="  font-size:1.1em;" class="padding-5"><i class="fa fa-home pull-left" style="color:#5bc0de;"></i> '.$shopNames.' '.$category_new.'</a> </li>';
}

echo ' ';


}
}

function  get_shop_subscribed_list($user_id)
{  include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT shop_id
FROM subscribers WHERE user_id = '$main_user_id'";	 
$query4user_info = mysqli_query($link,$query);
$num_shop = mysqli_num_rows($query4user_info);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$shop_id = $allpalls_info['shop_id'];


$query_sub = "SELECT shopName,category FROM shop  WHERE shop_id = '$shop_id' AND mode >= '1' ORDER BY shopName ASC"; 

$query4user_sub = mysqli_query($link,$query_sub);
$num_shop = mysqli_num_rows($query4user_sub);

while($mykanta_sub = mysqli_fetch_array($query4user_sub,MYSQLI_ASSOC))
{
$shopNames = $mykanta_sub['shopName'];
$category = $mykanta_sub['category'];

$category_ico = cat_name_ico($category);
$shopNameformat  = formatUrl($shopNames);
$shopNameformat1  = strtolower(formatUrl($shopNames));  
$shopNames_new = substr($shopNames, 0, 23). '';
$clean_name = formatUrl_rev($shopNameformat); 
$shop_id = shop_id_from_name($clean_name);

/*  $shop_id  = safe_input($allpalls_info['shop_id']);	*/
/*  $shop_id  = safe_input($allpalls_info['shop_id']);	*/
if($main_user_id ==  $user_id)
{
	//---------
$query = " SELECT image_loc FROM banner_pic WHERE shop_id = $shop_id ";
$querybannerpic = mysqli_query($link,$query);	

if(mysqli_num_rows($querybannerpic)==1)
{
while($banner_pic  = mysqli_fetch_array($querybannerpic,MYSQLI_ASSOC))
{   
$banner_image = safe_input($banner_pic['image_loc']);
echo ' 
<div class="item active " title="change" align="center"  >
<a style="" href="/User/my-business/'.$shopNameformat1.'"><img src="/'. $banner_image.'" alt="change"class="img img-thumbnail"style= "height:120px; width:100%"  title="'.$shopNames.'"  /></a>
<div class="pull-left ">
<strong ><a style="padding-left:10px;" href="/User/my-business/'.$shopNameformat1.'">'.$shopNames.'</a></strong>
</div>		
		</div>
<br>
<br>
';}
}else{ $banner_image = "/img/banners/banner-small.png";
echo ' 
<div class="item active " title="change" align="center">
		<a style="" href="/User/my-business/'.$shopNameformat1.'"><img src="/'. $banner_image.'"  title="'.$shopNames.'" class="img img-thumbnail"style= "height:120px; width:100%"/></a>
				<div class="">
				 <strong><a style="padding-top:10px;" href="/User/my-business/'.$shopNameformat1.'">'.$shopNames.'</a></strong>
				 </div>		
		</div>
<br>
<br>
';
}
}
else{
echo "no shop subscribed";
}
}
}
}
function  get_shop_subscribed($user_id)
{  include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT shop_id
FROM subscribers WHERE user_id = '$main_user_id'";	 
$query4user_info = mysqli_query($link,$query);
$num_shop = mysqli_num_rows($query4user_info);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$shop_id = $allpalls_info['shop_id'];


$query_sub = "SELECT shopName,category FROM shop  WHERE shop_id = '$shop_id' AND mode >= '1' ORDER BY shopName ASC"; 

$query4user_sub = mysqli_query($link,$query_sub);
$num_shop = mysqli_num_rows($query4user_sub);

while($mykanta_sub = mysqli_fetch_array($query4user_sub,MYSQLI_ASSOC))
{
$shopNames = $mykanta_sub['shopName'];
$category = $mykanta_sub['category'];

$category_ico = cat_name_ico($category);
$shopNameformat  = formatUrl($shopNames);
$shopNameformat1  = strtolower(formatUrl($shopNames));  
$shopNames_new = substr($shopNames, 0, 23). '';
$clean_name = formatUrl_rev($shopNameformat); 
$shop_id = shop_id_from_name($clean_name);

/*  $shop_id  = safe_input($allpalls_info['shop_id']);	*/
if($main_user_id ==  $user_id)
{
echo   '<li class="no-padding" style="  margin-left:29px;" >  <a href="/subsbribed-business/'.$shopNameformat1.'"  style="  font-size:1.0em;" class="padding-5">  '.$shopNames_new.' '.$category_ico.'</a> </li>';
}
else{
echo "no shop created";
}
}
}
}

function  get_shopname($shop_id)
{  include "conxn.php";
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
echo   '<a href="/business-link/'.$shopNameformat.'" style="color:grey;">'.$shopNames.'  </a>';
}
else{
echo "no shop created";
}
}
}

function  get_subscribe_names($shop_id)
{ include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT user_id FROM `subscribers` WHERE `shop_id` = '$shop_id' LIMIT  20 ";		 

$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
{
while($allpalls_info = mysqli_fetch_array($query_add,MYSQLI_ASSOC))
{
$sub_user_id = safe_input($allpalls_info['user_id']);  
$query = "SELECT * FROM `registration` WHERE `id` = '$sub_user_id' ";

$query4user_info = mysqli_query($link,$query);
while($user_auth_info = mysqli_fetch_assoc($query4user_info))
{
$firstName = safe_input($user_auth_info['firstName']); 

$firstname23 = safe_input($user_auth_info["firstName"]);
 $firstname2356 = substr($firstname23, 0, 18).'..';
$username =   safe_input($user_auth_info['username']); 
$friend_id =   safe_input($user_auth_info['id']); 

$query = "SELECT image_loc FROM profile_pic WHERE account_id =  $friend_id ";

$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);

echo '<li class="" style="padding:5px; margin:0 2px 5px;width:200px;"><a href="/connection-auth/'.$username.'" class=""><img  src="/img/avatars/mini/'.$profile_image.'"alt="'.$firstName.'" class="img-rounded" height="40" title="'.$firstName.'"> '.$firstname2356 .' </a></li>';
  }
}
else{
echo "no subscribers";
}
}
}
}
else echo '<center style="" >
<p class="headline " style="color:black; font-size:1.5em;">View all your subscribers Here!.</p>
</center>';
}

function  get_friendshopnames($friend_id)
{ include "./conxn.php";
$main_user_id  =safe_input($_SESSION['id']);
$query = "SELECT shopName,shop_id,mode FROM shop WHERE user_id = '$friend_id' LIMIT 0 , 5 ";

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
<img src="/'. $banner_image.'" alt="change"class="img img-thumbnail"style= "height:120px; width:100%"  title="'.$shopNames.'"  />
<div class="pull-left ">
<strong ><a style="padding-left:10px;" href="/subsbribed_business/'.$shopNameformat.'">'.$shopNames.'</a></strong>
</div>		
		</div>
<br>
<br>
';}
}else{ $banner_image = "/img/banners/banner-small.png";
echo ' 
<div class="item active " title="change" align="center">
		<img src="/'. $banner_image.'"  title="'.$shopNames.'" class="img img-thumbnail"style= "height:auto; width:100%">
				<div class="pull-left ">
				 <strong ><a style="padding-left:10px;" href="/business-link/'.$shopNameformat.'">'.$shopNames.'</a></strong>
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

function  get_shop_showcase()
{ include "conxn.php";
$query = "SELECT shop_id FROM shop  WHERE mode > '0' ORDER BY RAND() LIMIT 0 , 4 ";

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
$shopName1 = strtolower(formatUrl($string));
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
<div class="row" style="height:30px; width:195px">

<strong>
 <a  href="/business-link/'.$shopName1.'" class="no-padding text-warning">

	<img src="/'.$banner_image.'" class="img" style=  title="'.$shopName.'"  alt="'.$shopName.'" "height:auto; width:150px;" />
		   
			<div class="thumbnail_legend" style="margin-top:10px;">
				<h3 class="desktop  hidden-xs hidden-md hidden-sm banner_text text-center "> '.ucwords($string).'</h3>
				<h3 class="laptop hidden-sm hidden-lg hidden-xs banner_text text-center "> '.ucwords($string).'</h3>
				<h3 class="tablet hidden-md hidden-lg hidden-xs banner_text text-center "> '.ucwords($string).'</h3>
				<h3 class="yam hidden-lg hidden-md hidden-sm banner_text text-center "> '.ucwords($string).'</h3>
			</div>	
		
'.$shopName.'</a> </strong>
<span style="font-size:1.0em;"><p class="text-primary">',$shop_descrb,'</p></span>

</div> 
</li>
';
}
else{
echo'<li class=" padding-5" style= "height:120px; width:190px;">
<strong> <a href="/business-link/'.$shopName1.'" class="no-padding text-warning">
<div class="padding-bottom-10 "style= " width:190px; ">
		  <img src="/'.$banner_image.'"  class="img " style= "height:auto; width:150;"  title="'.$shopName.'" />
		 </div> 
		

'.$shopName.'</a> </strong> 
<span><p class="text-primary"style="">'.$shop_descrb.'</p></span>

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

function  get_shop_no($user_id)
{ include "conxn.php"; 
$user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(shop_id) FROM shop WHERE user_id ='$user_id'";

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$shop_count = $query_count[0];

echo ' <span class="badge inbox-badge" >'.$shop_count.'</span></a>  ';
}
function  get_sub_no($user_id)
{ include "conxn.php"; 
$user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(shop_id) FROM subscribers WHERE user_id ='$user_id' ";

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
{ include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='1' OR friend_id='$user_id' AND value='1'";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

echo ' <span class="badge inbox-badge" >'.$friend_count.'</span>  ';
}
function  get_friend_no_of_reev($user_id)
{ include "conxn.php";

$query = "SELECT COUNT(id) FROM account_comment WHERE owner_id ='$user_id' AND image_loc !='NULL' ";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

echo $friend_count;
}
 function  get_friend_no_of_reev_proc($user_id)
{ include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM account_comment WHERE owner_id ='$user_id' AND image_loc != 'NULL' ";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

return $friend_count;
} 

function  get_friendnames_no_badge($user_id)
{ include "conxn.php";

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='1' OR friend_id='$user_id' AND value='1'";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

echo $friend_count;
} 

function  get_friendnames_no_connectors($user_id)
{ include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='0'";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

echo $friend_count;
} 
function  get_friendnames_no_connected($user_id)
{ include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE friend_id ='$user_id' AND value='0'";
$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

echo $friend_count;
} 

function  get_friendnames_no_of_friends($friend_id)
{include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$friend_id' AND value='1' OR friend_id='$friend_id' AND value='1'";

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];
echo ' <span class="badge inbox-badge" >'.$friend_count.'</span></a>  ';


}
function  get_no_of_friends($friend_id)
{include "conxn.php";
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$friend_id' AND value='0' ";

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];
if( $friend_count > 0){
   echo $friend_count;
}else{
echo '0';
}
}
function  get_no_of_notifs($user_id)
{include "conxn.php";
$user_id  = $_SESSION['id'];

$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$friend_id' AND value='0' ";

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];
echo $friend_count;
}

function  get_friendnames($user_id)
{include "conxn.php";  
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='1' OR friend_id='$user_id' AND value='1' ";		 

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

if($friend_count < 1){
$friendsHTML = $user_id." has no Connections yet";
}
else
	{ 
	include "conxn.php";  	
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

	$orLogic = '';
	foreach($all_friends as $key => $user)
		{
		$orLogic .= "id='$user' OR ";
		}
	$orLogic = chop($orLogic, "OR ");


	$sql = "SELECT * FROM registration WHERE $orLogic ORDER BY username ASC";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		$friend_username = safe_input($row["username"]);
		$firstname = safe_input($row["firstName"]);
		$firstname = ucwords(strtolower($firstname));
		$friend_id = safe_input($row["id"]);
		$username = safe_input($row["username"]);
		$status_def_no = status_def_no($friend_id);
	    $query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";
	

	if($status_def_no == '1')
			{
			$query4profilepic = mysqli_query($link,$query2);	
			if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
				{   
				$friend_pic = safe_input($profile_pic['image_loc']);
				echo'
				<a onclick="user_info_mini('.$friend_id.');" style="font-size:0.9em; margin-left:10px;"class="padding-5 "> <i class="padding-5 fa fa-circle  pull-left" style="color:green; height:3px; "></i> <img  src="/img/avatars/mini/'.$friend_pic.'" title="'.$friend_username.'" height="20px" class="img"> <span > '.$username.'</span></a>';
				}
				else
				{
				$friend_pic = safe_input('images/piclist.jpg'); 
				echo '<a href="/connection/'.$username.'"><i class="fa fa-times  pull-left" onClick="chat_open();" style=" height:5px;">
					</i> '.$username .'  </a>';
				}
			}

			if($status_def_no == '2')
				{
				$query4profilepic = mysqli_query($link,$query2);	
				if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
					{   
					$friend_pic = safe_input($profile_pic['image_loc']);
					echo'
					<a onclick="user_info_mini('.$friend_id.');" style="font-size:0.9em; margin-left:10px;"class="padding-5"> <i class="padding-5 fa fa-circle  pull-left" style="color:orange; height:3px; "></i> <img  src="/img/avatars/mini/'.$friend_pic.'" title="'.$friend_username.'" height="20px" class="img"> <span > '.$username.'</span></a>';
					}
					else
					{
					$friend_pic = safe_input('images/piclist.jpg'); 
					echo '<a href="/connection/'.$username.'"><i class="fa fa-times  pull-left" onClick="chat_open();" style=" height:5px;">
						</i> '.$username .'  </a>';
					}
				}
						
			if($status_def_no == '3')
				{
				$query4profilepic = mysqli_query($link,$query2);	
				if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
					{   
					$friend_pic = safe_input($profile_pic['image_loc']);
					echo'
					<a onclick="user_info_mini('.$friend_id.');" style="font-size:0.9em;   margin-left:10px;"class="padding-5 "> <i class="padding-5 fa fa-circle  pull-left" style="color:grey; height:3px; "></i> <img  src="/img/avatars/mini/'.$friend_pic.'" title="'.$friend_username.'" height="20px" class="img"> <span > '.$username.'</span></a>';
					}
					else
					{
					$friend_pic = safe_input('images/piclist.jpg'); 
					echo '<a href="/connection/'.$username.'"><i class="fa fa-times  pull-left" onClick="chat_open();" style=" height:5px;">
						</i> '.$username .'  </a>';
					}
				}
		}
		if($friend_count > 5)
		{
		 echo '<a href="/view_all_cons.php">view all friends</a>';
		}		 
	}
}
function  get_friendnames_1($user_id)
{include "conxn.php";  
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='1' OR friend_id='$user_id' AND value='1' ";		 

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

if($friend_count < 1){
$friendsHTML = $user_id." has no Connections yet";
}
else
	{ 
	include "conxn.php";  	
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

	$orLogic = '';
	foreach($all_friends as $key => $user)
		{
		$orLogic .= "id='$user' OR ";
		}
	$orLogic = chop($orLogic, "OR ");


	$sql = "SELECT * FROM registration WHERE $orLogic ORDER BY username ASC";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		$friend_username = safe_input($row["username"]);
		$firstname = safe_input($row["firstName"]);
		$firstname = ucwords(strtolower($firstname));
		$friend_id = safe_input($row["id"]);
		$username = safe_input($row["username"]);
		$status_def_no = status_def_no($friend_id);
	    $query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";
	

	if($status_def_no == '1')
			{
			$query4profilepic = mysqli_query($link,$query2);	
			if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
				{   
				$friend_pic = safe_input($profile_pic['image_loc']);
				echo'
				<a onclick="user_info_mini('.$friend_id.');" style="font-size:0.9em; margin-left:10px;"class="padding-5 "> <i class="padding-5 fa fa-circle  pull-left" style="color:green; height:3px; "></i> <img  src="/img/avatars/mini/'.$friend_pic.'" title="'.$friend_username.'" height="20px" class="img img-circle"> <span > '.$username.'</span></a>';
				}
				else
				{
				$friend_pic = safe_input('images/piclist.jpg'); 
				echo '<a href="/connection/'.$username.'"><i class="fa fa-times  pull-left" onClick="chat_open();" style=" height:5px;">
					</i> '.$username .'  </a>';
				}
			}
	
/*
			if($status_def_no == '2')
				{
				$query4profilepic = mysqli_query($link,$query2);	
				if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
					{   
					$friend_pic = safe_input($profile_pic['image_loc']);
					echo'
					<a onclick="user_info_mini('.$friend_id.');" style="font-size:0.9em; margin-left:10px;"class="padding-5"> <i class="padding-5 fa fa-circle  pull-left" style="color:orange; height:3px; "></i> <img  src="/img/avatars/mini/'.$friend_pic.'" title="'.$friend_username.'" height="20px" class="img"> <span > '.$username.'</span></a>';
					}
					else
					{
					$friend_pic = safe_input('images/piclist.jpg'); 
					echo '<a href="/connection/'.$username.'"><i class="fa fa-times  pull-left" onClick="chat_open();" style=" height:5px;">
						</i> '.$username .'  </a>';
					}
				}
		
			if($status_def_no == '3')
			{
				$query4profilepic = mysqli_query($link,$query2);	
				if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
					{   
					$friend_pic = safe_input($profile_pic['image_loc']);
					echo'
					<a onclick="user_info_mini('.$friend_id.');" style="font-size:0.9em;   margin-left:10px;"class="padding-5 "> <i class="padding-5 fa fa-circle  pull-left" style="color:grey; height:3px; "></i> <img  src="/img/avatars/mini/'.$friend_pic.'" title="'.$friend_username.'" height="20px" class="img"> <span > '.$username.'</span></a>';
					}
					else
					{
					$friend_pic = safe_input('images/piclist.jpg'); 
					echo '<a href="/connection/'.$username.'"><i class="fa fa-times  pull-left" onClick="chat_open();" style=" height:5px;">
						</i> '.$username .'  </a>';
					}
				}*/
		}	 
	}
}
function  get_friendnames_2($user_id)
{include "conxn.php";  
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='1' OR friend_id='$user_id' AND value='1' ";		 

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

if($friend_count < 1){
$friendsHTML = $user_id." has no Connections yet";
}
else
	{ 
	include "conxn.php";  	
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

	$orLogic = '';
	foreach($all_friends as $key => $user)
		{
		$orLogic .= "id='$user' OR ";
		}
	$orLogic = chop($orLogic, "OR ");


	$sql = "SELECT * FROM registration WHERE $orLogic ORDER BY username ASC";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		$friend_username = safe_input($row["username"]);
		$firstname = safe_input($row["firstName"]);
		$firstname = ucwords(strtolower($firstname));
		$friend_id = safe_input($row["id"]);
		$username = safe_input($row["username"]);
		$status_def_no = status_def_no($friend_id);
	    $query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";
	

	
			if($status_def_no == '2')
				{
				$query4profilepic = mysqli_query($link,$query2);	
				if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
					{   
					$friend_pic = safe_input($profile_pic['image_loc']);
					echo'
					<a onclick="user_info_mini('.$friend_id.');" style="font-size:0.9em; margin-left:10px;"class="padding-5"> <i class="padding-5 fa fa-circle  pull-left" style="color:orange; height:3px; "></i> <img  src="/img/avatars/mini/'.$friend_pic.'" title="'.$friend_username.'" height="20px" class="img  img-circle"> <span > '.$username.'</span></a>';
					}
					else
					{
					$friend_pic = safe_input('images/piclist.jpg'); 
					echo '<a href="/connection/'.$username.'"><i class="fa fa-times  pull-left" onClick="chat_open();" style=" height:5px;">
						</i> '.$username .'  </a>';
					}
				}
				
		} 
	}
}
function  get_friendnames_3($user_id)
{include "conxn.php";  
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$user_id' AND value='1' OR friend_id='$user_id' AND value='1' ";		 

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

if($friend_count < 1){
$friendsHTML = $user_id." has no Connections yet";
}
else
	{ 
	include "conxn.php";  	
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

	$orLogic = '';
	foreach($all_friends as $key => $user)
		{
		$orLogic .= "id='$user' OR ";
		}
	$orLogic = chop($orLogic, "OR ");


	$sql = "SELECT * FROM registration WHERE $orLogic ORDER BY username ASC";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		$friend_username = safe_input($row["username"]);
		$firstname = safe_input($row["firstName"]);
		$firstname = ucwords(strtolower($firstname));
		$friend_id = safe_input($row["id"]);
		$username = safe_input($row["username"]);
		$status_def_no = status_def_no($friend_id);
	    $query2 = "SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";
			
			if($status_def_no == '3')
				{
				$query4profilepic = mysqli_query($link,$query2);	
				if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
					{   
					$friend_pic = safe_input($profile_pic['image_loc']);
					echo'
					<a onclick="user_info_mini('.$friend_id.');" style="font-size:0.9em;   margin-left:10px;"class="padding-5 "> <i class="padding-5 fa fa-circle  pull-left" style="color:grey; height:3px; "></i> <img  src="/img/avatars/mini/'.$friend_pic.'" title="'.$friend_username.'" height="20px" class="img img-circle"> <span > '.$username.'</span></a>';
					}
					else
					{
					$friend_pic = safe_input('images/piclist.jpg'); 
					echo '<a href="/connection/'.$username.'"><i class="fa fa-times  pull-left" onClick="chat_open();" style=" height:5px;">
						</i> '.$username .'  </a>';
					}
				}
		}
		if($friend_count > 5)
		{
		 echo '<a href="/view_all_cons.php">view all friends</a>';
		}		 
	}
}

function  get_friendnames_of_friends($friend_id)
{
include"include/conxn.php";
$main_user_id  = safe_input($_SESSION['id']);
$query = "SELECT COUNT(id) FROM friends WHERE account_id ='$friend_id' AND value='1' OR friend_id='$friend_id' AND value='1'";	 

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$friend_count = $query_count[0];

if($friend_count < 1){
$friendsHTML = $friend_id; 
echo '<center style="" >
<p class="headline " style="color:black; font-size:1.5em;"> No Connection yet.</p>
 <a class="btn btn-default " onclick="tag_interest_button();"> <i class="fa fa-group"></i> Search for Connections </a>
</center> ' ;
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

$orLogic = '';
foreach($all_friends as $key => $user){
$orLogic .= "id='$user' OR ";
}
$orLogic = chop($orLogic, "OR ");
$sql = "SELECT * FROM registration WHERE $orLogic ORDER BY firstName ASC ";
$query = mysqli_query($link,$sql);
echo '<ul class="no-padding list-inline" style="">';
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$friend_username = safe_input($row["username"]);
$firstname = safe_input($row["firstName"]);
$username = safe_input($row["username"]);

$firstname23 = safe_input($row["firstName"]);
 $firstname2356 = substr($username, 0, 13).'';
$friend_id = safe_input($row["id"]);

$query2 = "SELECT  image_loc,gif_as_pic  FROM profile_pic WHERE account_id = $friend_id";

$query4profilepic = mysqli_query($link,$query2);	

if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);
$gif_as_pic = safe_input($profile_pic['gif_as_pic']);


if( $gif_as_pic == "" OR  $gif_as_pic == "NULL"   )
{
echo '<li class="" style="padding:0px; margin:0 2px 5px;width:140px;"><a href="/connection-auth/'.$username.'" class=""><img  src="/img/avatars/mini/'.$profile_image.'" alt="'.$friend_username.'" class="img-circle" height="35" title="'.$friend_username.'"> '.$firstname2356 .' </a></li>';

}
else{
echo '<li class="" style="padding:0px; margin:0 2px 5px;width:140px;"><a href="/connection-auth/'.$username.'" class=""><img  src="/img/comments_images/mini/'.$gif_as_pic.'.jpg "alt="'.$friend_username.'" class="img-circle" height="35" title="'.$friend_username.'"> '.$firstname2356 .' </a></li>';

}
}
}
else
{
echo '<li class="" style="padding:5px; margin:0 2px 5px; width:130px;"><a href="/connection-auth/'.$username.'"><img  src="/img/avatars/mini/image1.jpg" alt="'.$friend_username.'"height="35" title="'.$friend_username.'"> '.$firstname2356 .'</a></li>';
}
}
echo '</ul> ';		 
}
}	 

function  shop_updates($user_id)
{include "conxn.php";
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
{include "conxn.php";
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
<a href="/connection-auth/'.$username.'">'.$firstName.'</a>
<button class="btn btn-xs pull-right style=" background-color:green;">
	<i class="fa fa-link"></i>
	Refuse
	</button>
	
	
	<input type="submit"  onClick="add_friend('.$friend_id .');" value="Accept Connection"class="btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-check"></i>
</input>';
}
}				  
}
}

function user_status($friend_id)
{include "conxn.php";
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
{include "conxn.php";
$username = safe_input($_GET['username']);

$main_user_id  = safe_input($_SESSION['id']);

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

if($friend_id !=  $main_user_id)
{
echo  
'<div class="col-sm-8 col-xs-8" style=" margin-left:-25px;">
					<h2>'.$user_name.'</h2>
<ul class="list-unstyled"><!--
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
</li>-->
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

function  shopdescrb($shop_id)
{
include "conxn.php";

$query = "SELECT shop_descrb FROM shop WHERE shop_id = '$shop_id' LIMIT 1";	 
$query4user_info = mysqli_query($link,$query);

while($allpalls_info = mysqli_fetch_array($query4user_info))
{
$describeText = $allpalls_info['shop_descrb'];
echo $describeText;	  
}
} 

function get_profile_pic($user )
{
include "conxn.php";
$user_id = $_SESSION['id'];
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
echo'<img src="/img/avatars/'. $profile_image.'" class="img-thumbnail img-circle" style="max-height:120px;" title="Avatar"/>';
}
else{
echo'<img src="/img/comments_images/'. $gif_as_pic.'.gif" class="img-thumbnail img-circle" style="max-height:120px;" title="Avatar"/>';
}			 
}
}
else{
$profile_image = "/img/avatars/image1.jpg";

echo'<img src="/'. $profile_image.'" class="img-thumbnail" style="max-height:120px;" title="Avatar"/>';
}
}

function get_status_pic_of_sender($user )
{
include "conxn.php";

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
echo'<img src="/img/avatars/mini/'. $profile_image.'" class="img-thumbnail img-circle" style="max-width:40px;" title="Avatar"/>';
}
else{
echo'<img src="/img/comments_images/'. $gif_as_pic.'.gif" class="img-thumbnail img-circle" style="max-width:40px;" title="Avatar"/>';
}			 
}
}
else{
$profile_image = "/img/avatars/image1.jpg";

echo'<img src="/'. $profile_image.'" class="img-thumbnail" style="max-width:40px;" title="Avatar"/>';
}
}


function get_profile_pic_only_name($user )
{
include "conxn.php";
$user_id = $_SESSION['id'];
$query = "SELECT image_loc,gif_as_pic FROM profile_pic WHERE account_id = '$user' ";
$query4profi  = mysqli_query($link,$query);	
if($query4profilepic = mysqli_num_rows($query4profi) > 0)
	{
while($profile_pic  = mysqli_fetch_assoc($query4profi))
{   
$profile_image = safe_input($profile_pic['image_loc']);
$gif_as_pic = safe_input($profile_pic['gif_as_pic']);

if( $gif_as_pic == "" OR  $gif_as_pic == "NULL"   )
{ 
echo '/img/avatars/mini/'.$profile_image;

//echo '/img/avatars/mini/'.$profile_image;
}
else{
echo '/img/comments_images/mini/'.$gif_as_pic.'.jpg';
}			 
}
}
else{
echo "/img/avatars/image1.jpg";

}
}

function get_title_post($post_id)
{include "conxn.php";

$query = "SELECT title FROM account_comment WHERE id = '$post_id' ";
$query4profi  = mysqli_query($link,$query);	
if($query4profilepic = mysqli_num_rows($query4profi) > 0)	{
while($profile_pic  = mysqli_fetch_assoc($query4profi))
{   

$reev_title = $profile_pic['title'];
if($reev_title != '' OR NULL)
{
return $profile_pic['title'];
}else{
echo 'your Reev';
}
}
}
}

function get_last_reever($post_id)
{include "conxn.php";
 $user_id = $_SESSION['id'];
$query = "SELECT reply_user_id FROM reply WHERE post_id = '$post_id' ORDER BY id DESC LIMIT 1";
$query4profi  = mysqli_query($link,$query);	
if($query4profilepic = mysqli_num_rows($query4profi) > 0)	{
while($profile_pic  = mysqli_fetch_assoc($query4profi))
{   

return $reev_title = $profile_pic['reply_user_id'];

}
}
else{
return $reev_title = '0';
}
}

function get_last_reev_owner($post_id)
{include "conxn.php";
 $user_id = $_SESSION['id'];
$query = "SELECT owner_id FROM account_comment WHERE id = '$post_id' AND owner_id != '400' ORDER BY id DESC LIMIT 1";
$query4profi  = mysqli_query($link,$query);	
if($query4profilepic = mysqli_num_rows($query4profi) > 0)	{
while($profile_pic  = mysqli_fetch_assoc($query4profi))
{   

return $reev_title = $profile_pic['owner_id'];

}
}
else{
return $reev_title = '0';
}
}

function get_profile_pic_friend($friend_id)
{include "conxn.php";
$query = " SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";

$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);
echo'<img src="/img/avatars/'. $profile_image.'" class=" img-thumbnail img-circle" width="auto;"title="Avatar" height="auto;"/>';			 
}
}
else
{
$profile_image = "/img/avatars/image1.jpg";
echo'<img src="'. $profile_image.'" class="img-thumbnail img-circle" width="400px;" height="auto;"title="Avatar"/>';
}
}
function get_raw_profile_pic_friend($friend_id)
{include "conxn.php";
$query = " SELECT image_loc FROM profile_pic WHERE account_id = $friend_id ";

$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);
echo $profile_image;			 
//echo'<img src="/img/avatars/'. $profile_image.'" class=" img-thumbnail img-circle" width="auto;"title="Avatar" height="auto;"/>';			 
}
}
else
{
$profile_image = "/img/avatars/image1.jpg";
echo $profile_image;
}
}

function pic_on_friend_page($user_id)
{include "conxn.php";
$query = " SELECT image_loc FROM profile_pic WHERE account_id = $user_id";
$query4profilepic = mysqli_query($link,$query);	
if($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);
echo'<img src="/'. $profile_image.'" class="img-rounded" width="30px;" alt="Banner" title="Banner" />';			 
}
else
{
$profile_image = "/img/avatars/image1.jpg";
echo'<img src="/'. $profile_image.'" class="img-rounded" width="30px;" alt="Banner" title="Banner" />';
}
}

function get_banner_pic($shop_id)
{include "conxn.php";
$query = " SELECT image_loc FROM banner_pic WHERE shop_id = $shop_id ";

$querybannerpic = mysqli_query($link,$query);	

if($banner_pic  = mysqli_fetch_array($querybannerpic,MYSQLI_ASSOC))
{   
$banner_image = safe_input($banner_pic['image_loc']);		
echo'<img src="/'. $banner_image.'" alt="Banner" title="Banner" class="" style= "height:auto; width:100%">';	
}else{
$banner_image = "img/banners/banner.png";
echo'<img src="/'. $banner_image.'" alt="Banner" title="Banner" style= "height:auto; width:100%"/>';	
}
}
function get_banner_pic_on_shoppage($shop_id,$clean_name) 
{

 include "conxn.php"; 
 $query = " SELECT image_loc FROM banner_pic WHERE shop_id
= $shop_id ";

	$querybannerpic = mysqli_query($link,$query);	
	if($banner_pic  = mysqli_fetch_array($querybannerpic,MYSQLI_ASSOC))
			{   
			$banner_image = safe_input($banner_pic['image_loc']);	
			 $banner_image_def = "img/banners/banner.png";

			if ($banner_image != $banner_image_def )
			{
				 echo' <div class="item active  padding-bottom-10 " title="Shop Banner" align="center">
		                          <img src="/'. $banner_image.'" alt="change" class="img img-thumbnail" style= "height:180px; width:100%"  title="Banner" alt="Banner"/>
		                            
			                         <div class="hover-toggle">
			                            <button class="btn  btn-primary btn-sm pull-right" id="checkChangeBannerBtn">Change Banner Pic</button>
			   							<button class="btn  btn-primary btn-sm pull-right" id="changeBannerBtn" data-target="#changebanner" data-toggle="modal" style="display:none;"></button>
			                        </div>
									 <div class="well pull-left padding-5" style="margin-top:-40px; margin-left:10px; background:none; border:none; box-shadow:none;" >
							  			 <span class="badge" >
							  			 	<span class="badge" style="background-color:#000;"><span class="fa fa-eye"></span>'; echo get_shop_views($shop_id); echo '</span> View(s)
							  			 </span>
							  		</div>
                                </div>
                                	';	
			} 
           else
	       {
	     $banner_image_def_new = "/img/banners/banner.png";
	    echo'  <div class=" item active  padding-bottom-10 " align="center">
		                          <img src="/'. $banner_image_def_new.'" alt="'.$clean_name.'" class="img " style= "width:100%;"  title="'.$clean_name.'"  />
		                             <div class="hover-toggle">
			                            <button class="btn  btn-primary btn-sm pull-right" id="checkChangeBannerBtn">Change Banner</button>
			   							<button class="btn  btn-primary btn-sm pull-right" id="changeBannerBtn" data-target="#changebanner" data-toggle="modal" style="display:none;"></button>
			                        </div>
			                       	
									<div class="well pull-left padding-5" style="margin-top:-40px; margin-left:10px; background:none; border:none; box-shadow:none;" >
							  			 <span class="badge" >
							  			 	<span class="badge" style="background-color:#000;"><span class="fa fa-eye"></span>'; echo get_shop_views($shop_id); echo '</span> View(s)
							  			 </span>
							  		</div> 
                                </div> 
                               ';

	       }
	      
}
}
function get_banner_pic_on_shoppageother($shop_id) 
{
 include "conxn.php";
 $query = " SELECT image_loc FROM banner_pic WHERE shop_id
= '$shop_id' LIMIT 1";

	$querybannerpic = mysqli_query($link,$query);	

	if($banner_pic  = mysqli_fetch_array($querybannerpic))
			{   
			$banner_image = safe_input($banner_pic['image_loc']);	
			 $banner_image_def = "img/banners/banner.png";

			if ($banner_image != $banner_image_def )
			{
				 echo' <div class="item active  padding-bottom-10 "  align="center">
		                      <img src="/'. $banner_image.'" alt="change" class="" style= "height:auto; width:100%"alt="Banner" title="Shop Banner" />
		                       </div>
							';	
			} 
           else
	       {
	         $banner_image_def_new = "img/banners/banner.png";
	           echo' <div class="item active  padding-bottom-10 " title="Shop Banner" align="center">
		              <img src="/'. $banner_image.'" title="Banner"  alt="Banner" class="" style= "height:auto; width:100%"/>
		             </div>
                  ';
            }
	      
}
ELSE ECHO 'Cant find banner. kindly inform business admin to upload a banner.';
}

function product_orders_update($shop_id)
{
include "conxn.php";

$query = "SELECT COUNT(id) FROM place_order WHERE shop_id = $shop_id";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];


$query2 = "SELECT COUNT(id) FROM place_order_vis WHERE shop_id = $shop_id";
$query_data2 = mysqli_query($link,$query2);
$query_count2 = mysqli_fetch_row($query_data2);
$view_count2 = $query_count2[0];

$query23 = "SELECT COUNT(id) FROM place_order_vis WHERE shop_id = '$shop_id' AND mode='pending' ";
$query_data23 = mysqli_query($link,$query23);
$query_count23 = mysqli_fetch_row($query_data23);
$view_count23 = '<i class="fa fa-arrow-circle-up "></i> '.$query_count23[0];

$result = $view_count + $view_count2;
echo ''.$result.' <em style="font-size:0.5em; color:green;"> '.$view_count23.'</em>';
}

function product_orders($shop_id)
{
include "conxn.php";

$query = "SELECT COUNT(id) FROM place_order WHERE shop_id = $shop_id";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];


$query2 = "SELECT COUNT(id) FROM place_order_vis WHERE shop_id = $shop_id";
$query_data2 = mysqli_query($link,$query2);
$query_count2 = mysqli_fetch_row($query_data2);
$view_count2 = $query_count2[0];

$result = $view_count + $view_count2;
echo $result;
}

function get_subscribers_no($shop_id)
{include "conxn.php";
$query = "SELECT COUNT(id) FROM subscribers WHERE shop_id = $shop_id";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];
echo $view_count;
}

function get_verify($shop_id)
{include "conxn.php";
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

function get_products_no_your_shop($shop_id)
{
include "conxn.php";

$query = "SELECT COUNT(product_id) FROM product WHERE shop_id = $shop_id AND mode >= 1";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];
echo $view_count;
}

function get_shop_likes($shop_id)
{include "conxn.php";
$query = "SELECT COUNT(id) FROM likes WHERE user_id = $shop_id     
";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];
echo $view_count;
}
function shopName($shop_id)
{include "conxn.php";
$query = "SELECT shopName FROM shop WHERE shop_id = '$shop_id'    
 LIMIT 1";
$query_data = mysqli_query($link,$query);
if($query_count = mysqli_fetch_array($query_data,MYSQLI_ASSOC))
{
$view_count = $query_count['shopName'];
echo $view_count;
}
}

function get_product_likes($product_id) 
{include "conxn.php";
$query = "SELECT COUNT(id) FROM likes_products WHERE user_id = $product_id     
";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];
echo $view_count;
}

function get_shop_views_for_upadting($shop_id)
{
include "conxn.php";

$ip = get_client_ip();

if(!empty($_SESSION['id']))
{
$account_id = $_SESSION['id'];
}
else
{
$account_id = $_SESSION['vis_id'];
}

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

function hits_business($shop_id)
{

include "conxn.php";
$query_op = " SELECT sum(hits)as total FROM hits where shop_id = '$shop_id'";
$query_data = mysqli_query($link,$query_op);
$query_count = mysqli_fetch_array($query_data);
$view_count = $query_count['total'];

echo $view_count;
}

function hits_products($shop_id)
{

include "conxn.php";
$query_op = " SELECT sum(hits) as total FROM hits_items where shop_id = '$shop_id'";
$query_data = mysqli_query($link,$query_op);
$query_count = mysqli_fetch_array($query_data);
$view_count = $query_count['total'];

echo $view_count;
}

function get_shop_views_no($shop_id)
{include "conxn.php";

//$account_id = $_SESSION['id'];
$query = "SELECT COUNT(viewer_id) FROM views WHERE shop_id = '$shop_id'";

$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];

echo $view_count;

}

function get_shop_views($shop_id,$product_id)
{include "conxn.php";

//$account_id = $_SESSION['id'];
$query = "SELECT COUNT(viewer_id) FROM views WHERE shop_id = '$shop_id'";

$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];

echo $view_count;

//your hits
    $date =  date('Y\-m\-d\ ');
	$query = "SELECT * FROM hits_items WHERE date = '$date'  AND shop_id = '$shop_id' AND product_id = '$product_id' LIMIT 1 ";
	$query_run = mysqli_query($link,$query);
	if ($query_count = mysqli_fetch_array($query_run,MYSQLI_ASSOC))
	{
     $new_hits = $query_count['hits'] ;
     $hits = $new_hits + 1;
     $datetime = $query_count['date'] ;
     $querysatus =" UPDATE hits_items SET hits = '$hits' WHERE date = '$datetime' AND shop_id = '$shop_id' AND product_id = '$product_id'";
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
}

function get_shop_views_myknata($shop_id)
{include "conxn.php";

//$account_id = $_SESSION['id'];
$query = "SELECT COUNT(viewer_id) FROM views WHERE shop_id = '$shop_id' AND viewer_id > 400";

$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];

echo $view_count;
}

function get_shop_views_public($shop_id)
{include "conxn.php";

//$account_id = $_SESSION['id'];
$query = "SELECT COUNT(viewer_id) FROM views WHERE shop_id = '$shop_id' AND viewer_id <= 100";

$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];

echo $view_count;
}

function get_hits_business($shop_id)
{
include "conxn.php";
$query = "SELECT hits FROM hits WHERE shop_id = '$shop_id'";
if($query_add = mysqli_query($link,$query))
	{
	while($reevq = mysqli_fetch_array($query_add,MYSQLI_ASSOC))
		{
         $view_count = $reevq['hits'];
         echo $view_count;
        }
    }
}

function reev_title($post_id)
{include "conxn.php";
 echo $title = "reev";
$query = "SELECT * FROM account_comment WHERE id = $post_id LIMIT 1";
if($query_add = mysqli_query($link,$query))
	{
	while($reevq = mysqli_fetch_array($query_add,MYSQLI_ASSOC))
		{
		$title = $reevq['title'];
		if($title != NULL OR $title !="" )
			{
			echo $title = $reevq['title'];
			}
			else
				{
				 echo $title = "reev";
				}
		
		}
	}else
				{
				 echo $title = "reev";
				}
}

function get_status_name($account_id)
{include "conxn.php";
$query = "SELECT * FROM registration where id = $account_id  LIMIT 10 ";

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

function get_status_name_only($account_id)
{include "conxn.php";
$query = "SELECT * FROM registration where id = $account_id  LIMIT 10 ";

if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{
$firstName = safe_input($details['firstName']);
$friend_id = safe_input($details['id']);
$username = safe_input($details['username']);

echo ucwords($username);
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

echo '<strong style="padding-left:-55px;" ><a href="/connection-auth/',$username,'"  class="text-primary">',$username ,' </a></strong>';
}
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

echo'<img src="/', $profile_image,'" class="img-rounded"  style="height:50px; " title="Avatar" alt="Avatar"/>';
}
}
else 
{
echo'<img src="/img/avatars/image1.jpg "class="img-thumbnail" width="50px;"  title="Avatar" alt="Avatar"/>';
}
}

function get_status_comment_f($owner_id)
{include "conxn.php";

if (isset($_GET['reev_id'])) 
{
$reev_id = $_GET['reev_id'];

$query = "SELECT * FROM account_comment where owner_id = $owner_id AND account_id = $owner_id AND id = '$reev_id' ORDER BY id DESC  LIMIT 1
";
$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
{
while($products = mysqli_fetch_assoc($query_add))
{
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$myfile_total = safe_input($products['myfile_total']);
$comment4 = $products['comment'];
$comment =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
if(strlen($comment)<149)
	{ $comment_short = substr($comment, 0, 150); $comment1 = convertHashtags($comment_short);}
	else{$comment_short = substr($comment, 0, 180);$comment1 = convertHashtags($comment_short). ' <p class=""><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a><p>';  }
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = convertHashtags($products['title']);
}
$image_loc = $products['image_loc'];
$datetime2 = $products['commentDate'];
$datetime = date("D, d M Y", $datetime2);
$post_id = safe_input($products['id']);

echo '				
<div class="padding-10" id="mystatus">
<ul class="list-inline no-padding">
<li class="message no-padding">
';
//Check if image location is defined						 
if(($myfile_total != NULL && $myfile_total >= 1 ))
{
echo'<li class="no-padding">
	<p class="no-padding" id="gif_image_holder_'.$post_id.'" ><a class="fancybox" href="/img/comments_images/'.$image_loc.'.gif">
	<img class="img img-rounded pull-left padding-5" src="/img/comments_images/mini/'.$image_loc.'.jpg" width="50%" height="auto"  title="'.ucwords($title).'" alt="'.ucwords($title).'"/></a><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p> '. $comment1.'<span class="text-muted pull-right font-xs">
	'.$datetime.'
	</span> 
	</p>	
</li>
<div class="no-padding">
<div class="text-default row padding-5"style="">

   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
    <ul class="list-inline">
	    	   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	'
                   ,seen_re_post($post_id),'
				 
					<li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>

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
		 <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;" /> <span class=" text-muted">',get_reply_no($post_id),'</span>
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
$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
{
while($products = mysqli_fetch_assoc($query_add))
{
$post_id = safe_input($products['id']);
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$myfile_total = safe_input($products['myfile_total']);
$comment4 = $products['comment'];
$comment =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
$comment_twitter = substr($comment4, 0, 113). '...';
if(strlen($comment)<149)
	{ $comment1 = substr($comment, 0, 150); $comment_short = convertHashtags($comment1);}
	else{$comment1 = substr($comment, 0, 180);$comment_short = convertHashtags($comment1). '<a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a>';  }
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$image_loc = $products['image_loc'];
$datetime2 = $products['commentDate'];
$datetime = date("D, d M Y", $datetime2);
$post_id = safe_input($products['id']);

echo '				
<div class="no-padding" id="mystatus">
<ul class="message list-inline no-padding">
';
//Check if image location is defined						 
if(($myfile_total != NULL && $myfile_total >= 2 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="row" id="pauser'.$post_id.'">
						<div class=" right-image right-image-last" id="gif_image_holder_'.$post_id.'">
							<img class="hidden-md hidden-lg" style="width:70px;margin-top:-120px;" src="/img/loader.png" onClick="image_loc('.$post_id.');">
							<img class="hidden-xs hidden-sm" style="width:70px;margin-top:-70px;" src="/img/loader.png" onClick="image_loc('.$post_id.');">
					   </div>
					</div>
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"   onClick="image_loc_pause('.$post_id.');" src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;"  title="'.ucwords($title).'" alt="'.ucwords($title).'"/>
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
			<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
		 
		   <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
		 
		  <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
		</div>		
			
<div class="padding-10">
  <div class="text-default row "style="margin-left:0px;">
    <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
        <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;"  title="comment" alt="comment"/> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a></li>',seen_re_post($post_id),'<li class="pull-right"style="" > <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
								<li class="  " onClick="window.open(';
										echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."','Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
										echo'); return false;" href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
									 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
									</li>
									<li class=" hidden-sm hidden-md hidden-lg ">
									 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
									</li>
									<li class="  ">
									 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
									</li>
							</ul>
           </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
        </div>
      <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
    </ul>	
  </div>

<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}

else if(($myfile_total != NULL && $myfile_total == 1 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"  src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;"  title="'.ucwords($title).'" alt="'.ucwords($title).'"/>
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;">'. $comment_short.'</p>
	 
	 <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:0px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	'
                 ,seen_re_post($post_id),'
				 
					<li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
</ul>	
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}
else 
{
	echo '<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
	 
	 <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
<div class="row" style="margin-left:0px;margin-top:0px;margin-left:15px;">
   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
       <ul class="list-inline">
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;"  title="comment" alt="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>	

				  <li class="pull-right"  style="margin-top:-10px;margin-right:20px;">			
			     <span>
				<ul style="list-style:none;">
					<li class="padding-10">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey"></i></a>
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
}
else {echo '<p class="headline " style="color:black; font-size:1.5em;">No Reevs yet! </p>';}


if(isset($post_id))
{
echo '
</ul> <center id="load_more_reev_box5" class=" padding-10 " align="center" style="height:100px; width:auto;"  ><button onclick="load_more_reevs_conect('.$owner_id.','.$post_id.',5);"class="load_reev_button" id="load_reev_button">
          <i class="fa fa-sm fa-arrow-down"style=""></i>  Old Reevs </button> 
      </center>
	  <div id="load_more_reevs" class="no-padding" style="height:auto;"> </div>';
	  }
}			 		 	 
 

 }

function get_status_comment_next($owner_id,$reev_id,$LIMIT_1)
{include "conxn.php";

if (!empty($owner_id) AND !empty($reev_id) AND!empty($LIMIT_1)  ) 
{
$query = "SELECT * FROM account_comment where owner_id = '$owner_id'  AND account_id = '$owner_id' ORDER BY id DESC  LIMIT $LIMIT_1, 5";
$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
{
while($products = mysqli_fetch_assoc($query_add))
{
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$comment4 = $products['comment'];
$comment =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
$myfile_total = $products['myfile_total'];
$comment_twitter = substr($comment4, 0, 113). '...';
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$image_loc = $products['image_loc'];
$datetime2 = $products['commentDate'];
$datetime = date("D, d M Y", $datetime2);
$post_id = safe_input($products['id']);
	if(strlen($comment)<149)
	{ $comment_short = substr($comment, 0, 150); $comment1 = convertHashtags($comment_short);}
	else{$comment_short = substr($comment, 0, 180);$comment1 = convertHashtags($comment_short). ' <p class="padding-10"><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a><p>';  }
 echo '				
<div class="no-padding" id="mystatus">
<ul class="list-inline padding-10">
';
if(($myfile_total != NULL && $myfile_total >= 2 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="row" id="pauser'.$post_id.'">
						<div class=" right-image right-image-last" id="gif_image_holder_'.$post_id.'">
							<img class="hidden-md hidden-lg" style="width:70px;margin-top:-120px;" src="/img/loader.png" onClick="image_loc('.$post_id.');" title="loading" alt="loading"/>
							<img class="hidden-xs hidden-sm" style="width:70px;margin-top:-70px;" src="/img/loader.png" onClick="image_loc('.$post_id.');"  title="loading" alt="loading"/>
					   </div>
					</div>
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"   onClick="image_loc_pause('.$post_id.');" src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;"  title="'.ucwords($title).'" alt="'.ucwords($title).'"/>
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
	 
	 <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:0px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;"  title="comment" alt="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	'
                 ,seen_re_post($post_id),'
				 
					<li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
</ul>	
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}

//Check if image location is defined						 
else if(($myfile_total != NULL && $myfile_total == 1 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"  src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;" title="'.ucwords($title).'" alt="'.ucwords($title).'" />
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;">'. $comment_short.'</p>
	 
	 <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:0px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;"  title="comment" alt="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	'
                 ,seen_re_post($post_id),'
				 
					<li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
</ul>	
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}
else echo '<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
	 
	 <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
<div class="row" style="margin-left:0px;margin-top:0px;margin-left:15px;">
   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
       <ul class="list-inline">
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;"  title="comment" alt="comment"/> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>	

				  <li class="pull-right"  style="margin-top:-10px;margin-right:20px;">			
			     <span>
				<ul style="list-style:none;">
					<li class="padding-10">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey"></i></a>
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
</ul> <center id="load_more_reev_box'.$LIMIT_1.'" class=" padding-10 " align="center" style="height:100px; width:auto;"  ><button onclick="load_more_reevs_conect('.$owner_id.','.$reev_id.','.$LIMIT_1.');" class="load_reev_button" id="load_reev_button">
          <i class="fa fa-sm fa-arrow-down"style=""></i>  Old Reevs </button> 
      </center>
	  <div id="load_more_reevs" class="no-padding" style="height:auto;"> </div>';
	  }
}			 		 	 
 
}


function get_status_comment($owner_id)
{include "conxn.php";
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
$myfile_total = $products['myfile_total'];
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}

$comment_twitter = substr($comment, 0, 113). '...';
$image_loc = $products['image_loc'];
$datetime2 = $products['commentDate'];
$datetime = date("D, d M Y", $datetime2);
$post_id = safe_input($products['id']);

echo '				
<div class="no-padding" id="mystatus">
<ul class="list-inline no-padding">
<li class="message no-padding">
';
//Check if image location is defined						 
if(($image_loc != NULL) || ($image_loc != "") || (!empty($image_loc)))
{
echo'
<li class="no-padding">
	<p class="no-padding" id="gif_image_holder_'.$post_id.'"><a class="fancybox" href="/img/comments_images/'.$image_loc.'.gif">
	<img class="img img-rounded pull-left padding-5" src="/img/comments_images/mini/'.$image_loc.'.jpg" width="50%" height="auto"  title="'.ucwords($title).'" alt="'.ucwords($title).'"/></a><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p> '. $comment.'<span class="text-muted pull-right font-xs">
	'.$datetime.'
	</span> 
	</p>	
</li>
<div class="no-padding">
<div class="text-muted row padding-5"style="border-bottom-color:#e1e1e1;  border-bottom-width:2px; border-bottom-style:solid; ">

   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10 "id="load_comments'.$post_id.'" >
   <ul class="list-inline"> 
   <li>' , myfile_total($post_id),' </li>
   <li>   ',smiles_reev_display_info($post_id),' smile(s) </li>
	<li><span class="padding-10"> <i class="glyphicon glyphicon-comment" style=""></i> ',get_reply_no($post_id),'
	<a href="javascript:void(0);" onclick="load_reev_comments('.$post_id.');">comment(s)</a>
    </span></li>	
	
	
	
	<li> <i class="glyphicon glyphicon-re-post" style=""></i>
	<a href="javascript:void(0);" onclick="show_share('.$post_id.');"> Share </li>
	<li>
     <span class="">
			 <ul class="no-padding post-re-post-box-social-networks social-icons"id="share_'.$post_id.'" style="margin-right:0px !important;display:none;">
					
							<li class="twitter"><a class="ttip" title="twitter" onClick="window.open(';
						echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
							'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
						echo'); return false;" 
								href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
								<i class="fa fa-twitter"></i></a>
							</li>
							
							<li class="google"style="margin-top:-44px;" >
								<a class="ttip hidden-md hidden-lg" href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"><img src="/img/site_img/whatsapp.png" height="35"/></a>
							</li>	
					</ul>
		 </span>
        </li>
		<li class="pull-right" >			
	     <span>
			<ul style="list-style:none;">
				<li class="no-padding">
					<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
				
					<ul class="dropdown-menu no-padding pull-right " style="margin-top:-48px;" >
						<li class="pull-left">
							<a href="/include/delete_comment.php?id='.$post_id.'"> <span class="text-danger" style="font-size:0.8em;" >Delete</span></a>
						</li>
					</ul>
				</li>
			 </ul>
		</span>
	</li>
</ul>
	</a>
   
    
   </div>
   <div class=" padding-5" id="loading_reev'.$post_id.'"></div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
  </ul>	
</div>
';
}
else echo '<li class=" padding-10 ">
<div class="row padding-5 ">
<p class="" ><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p>'. $comment.'<span class="text-muted pull-right font-xs">'.$datetime.' </span></p>
<div class="">
<div class="row no-padding">
</li>
<div class="no-padding">
<div class="text-muted row no-padding"style="border-bottom-color:#e1e1e1;  border-bottom-width:2px; border-bottom-style:solid; ">

   <div class=" col-xs-12 col-sm-12 col-md-12 padding-5"id="load_comments'.$post_id.'" >
      ',smiles_reev_display_info($post_id),' smile(s)
	<span class="padding-10"> <i class="glyphicon glyphicon-comment" style=""></i> ',get_reply_no($post_id),'
	<a href="javascript:void(0);" onclick="load_reev_comments('.$post_id.');">comment(s)</a>
    </span>
     <span>
	<ul class="pull-right" style="list-style:none;">
		<li class="no-padding">
			<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey"></i></a>
		
			<ul class="dropdown-menu no-padding pull-right " style="margin-top:-48px;" >
				<li class="pull-left">
					<a href="/include/delete_comment.php?id='.$post_id.'"> <span class="text-danger" style="font-size:0.8em;" >Delete</span></a>
				</li>
			</ul>
		</li>
	 </ul>
    </span>
   </div>
   <div class=" padding-5" id="loading_reev'.$post_id.'"></div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
  </ul>	
</div>';  
}
}
else
{echo '<center style="" >
<p class="headline " style="color:black; font-size:1.8em;">Get REEVS from Friends and Connections Here.</p>
<p style="">
Start by connecting with friends on mykanta </p>
Or
<p style="">Post a REEV to get comments and smiles.</p>
</p>
</center>'; }
}

function get_status_comment_old($owner_id)
{
if(isset($_GET['reev_id'])) 
{
include "conxn.php";	
$owner_id = $_SESSION['id'];
$reev_id = $_GET['reev_id'];
//this is done when user views profile from  a shared link
$queryreev = "SELECT * FROM account_comment WHERE owner_id ='$owner_id' AND account_id ='$owner_id' AND id ='$reev_id' LIMIT 1 ";
if($query_eev = mysqli_query($link,$queryreev))
 //mysqli_num_rows($query_add))
	{
	while($products = mysqli_fetch_assoc($query_eev))
	{
	$account_id = safe_input($products['account_id']);
	$post_user_id = safe_input($products['account_id']);
	$comment_ln = $products['comment'];
	$comment2 =   str_replace(["\r\n", "\r", '\n'], "<br/>", $comment_ln);
    $comment = stripslashes($comment2);
	//$comment = convertHashtags($comment1);
	$myfile_total = $products['myfile_total'];
	$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
	if( $title_null != "" OR $title_null != NULL)
{
$title = stripslashes(convertHashtags($title_null));
}
else{  $title = '';}

	$comment_twitter = substr($comment_ln, 0, 113). '...';
	 
	
	$image_loc = $products['image_loc'];
	$datetime2 = $products['commentDate'];
$datetime = date("D, d M Y", $datetime2);
	$post_id = safe_input($products['id']);
		if(strlen($comment)<149)
	{ $comment_short = substr($comment, 0, 150);  $comment1 = convertHashtags($comment_short);}
	else{$comment_short = substr($comment, 0, 180); $comment1 = convertHashtags($comment_short). ' <p class=""><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a><p>';  }
	echo '				
	<div class="no-padding" id="mystatus">
	<ul class="list-inline padding-10" style=" margin-left:5px; ">
	<li class="message">
	';
	//Check if image location is defined		
	//if(($image_loc != NULL && $image_loc != "" && $image_loc != 'NULL')) 
	if(($myfile_total != NULL && $myfile_total >= 1 ))
	{
	echo'
<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="row" id="pauser'.$post_id.'">
						<div class=" right-image right-image-last" id="gif_image_holder_'.$post_id.'">
							<img class="hidden-md hidden-lg" style="width:70px;margin-top:-120px;" src="/img/loader.png" onClick="image_loc('.$post_id.');">
							<img class="hidden-xs hidden-sm" style="width:70px;margin-top:-70px;" src="/img/loader.png" onClick="image_loc('.$post_id.');">
					   </div>
					</div>
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"   onClick="image_loc_pause('.$post_id.');" src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;" title="'.ucwords($title).'" alt="'.ucwords($title).'"/>
					</div>
				</div>
	</li>
	<p class="no-margin padding-left-10" style="font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-10" style="margin-left:-5px;">'. $comment1.'</p>
	 
	 <span class="text-muted pull-right font-xs">'.$datetime.'</span> 
				
			<div class="padding-5" style="margin-left:10px;  ">
			  <div class="text-default row "style=" ">

	   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10 "id="load_comments'.$post_id.'" >
	   <ul class="list-inline">
				   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;" title="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	
                 
				<li class="pull-right"style=" " >			
					     <a href="#"data-toggle="dropdown"style="color:grey; margin-left:-20px;"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							  <ul class="dropdown-menu no-padding pull-right " style="margin-top:-48px;" >
							  	</li>
									<li class="">
									 <a href="/download_gif.php?file='.$image_loc.'&idref='.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Download GIF</span></a> 
 								    		</li>
								
							</li>
							  <li class="" onClick="window.open(';
									echo"'https://www.facebook.com/sharer/sharer.php?u=https://mykanta.com/reev_load/".$post_id."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://www.facebook.com/sharer/sharer.php?u=https://mykanta.com/reev_load/'.$post_id.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Facebook</span></a>
							</li>
							<li class="" onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a></li>
							<li class=""> <a onClick="de_c_collection('.$post_id.');"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Delete</span></a>
							
							</li>
				
				
			 </ul>
			</span>
		</li>
	</ul>
		</a>
	   
		
	   </div>
	   <div class=" padding-5" id="loading_reev'.$post_id.'"></div>
	   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
	  </ul>	
	</div> <hr class="no-margin" style="border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;">
	';
	}
	else echo '<li class=" padding-10 ">
	<div class="row padding-10 ">
<p class="" ><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).' <span class="text-muted pull-right font-xs">'.$datetime.' </span></p><p id="load_reev_text_more'.$post_id.'"class="padding-5" style="margin-left:-5px;">'.$comment1.'</p></p>	
	

	<div class="">
	<div class="row no-padding">
	</li>
	<div class="no-padding">
	<div class="text-default row padding-10"style=" ">

	   <div class=" col-xs-12 col-sm-12 col-md-12 padding-5"id="load_comments'.$post_id.'" >
		 <ul class="list-inline">
				   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;" title="comment"/> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>	
	
	
	<li class="pull-right" style="margin-right:10px;" >	
     <span>
	<ul class="pull-right" style="list-style:none;">
		<li class="no-padding">
			<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
		
			<ul class="dropdown-menu no-padding pull-right " style="margin-top:-48px;" >
				<li class="pull-left">
				  <a onClick="de_c_collection('.$post_id.');"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Delete</span></a>
             	</li>
			</ul>
		</li>
	 </ul>
    </span>
	</li>
</ul>
	   </div>
	   <div class=" padding-10" id="loading_reev'.$post_id.'"></div>
	   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
	  </ul>	
	</div><hr class="no-margin" style="border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;">';  
	}
	}
else
{
echo '<center style="" >
<p class="headline " style="color:black; font-size:1.8em;">Sorry did not work!</p>
</center>'; }
}
if (!isset($_GET['reev_id']))
{ 
include "conxn.php";
$query_sub = $link->prepare("SELECT id,account_id,comment,title,myfile_total,image_loc,commentDate FROM account_comment where owner_id = ? AND account_id = ? ORDER BY id DESC LIMIT 1;");
 $query_sub->bind_param('ii',$owner_id ,$owner_id );
if( $query_sub->execute( ))
{
  $query_sub->store_result();
  $query_sub->bind_result($id, $account_id,$comment,$title,$myfile_total,$image_loc,$commentDate);
while($query_sub->fetch())
{
 $products = array('id'=> $id,'account_id'=> $account_id,'title'=> $title,'comment'=> $comment,'myfile_total'=> $myfile_total,'image_loc'=> $image_loc,'commentDate'=> $commentDate,);
$account_id = $products['account_id'];
$post_user_id = $products['account_id'];
$comment_ln = $products['comment'];
$comment2 =   str_replace(["\r\n", "\r", '\n'], "<br/>", $comment_ln);
$comment = stripslashes($comment2);
$nio_hash =   str_replace(['#'], "", $comment_ln);


$myfile_total = $products['myfile_total'];
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$comment_twitter = substr($nio_hash, 0, 113). '...';
$image_loc = $products['image_loc'];
$datetime2 = $products['commentDate'];
$datetime = date("D, d M Y", $datetime2);
$post_id = $products['id'];
	if(strlen($comment_ln)<149)
	{ $comment_short = substr($comment, 0, 150); $comment1 = convertHashtags($comment_short);}
	else{$comment_short = substr($comment, 0, 180);$comment1 = convertHashtags($comment_short). ' <p class=""><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a><p>';  }
	
echo '				
<div class="no-padding" id="mystatus">
  <ul class="list-inline no-padding"  style=" margin-left:10px;">
     <li class="message no-padding">
      ';
       //Check if image location is defined						 
       if(($myfile_total != NULL && $myfile_total >= 2 ))
		   {
			echo'
			<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="row" id="pauser'.$post_id.'">
						<div class=" right-image right-image-last" id="gif_image_holder_'.$post_id.'">
							<img class="hidden-md hidden-lg" style="width:70px;margin-top:-120px;" src="/img/loader.png" title="loader" onClick="image_loc('.$post_id.');">
							<img class="hidden-xs hidden-sm" style="width:70px;margin-top:-70px;" src="/img/loader.png" title="loader" onClick="image_loc('.$post_id.');">
					   </div>
					</div>
					<div class="" id="backer'.$id.'">
						<img id="image_'.$id.'"   onClick="image_loc_puse('.$id.');" src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;"  title="'.ucwords($title).'" alt="'.ucwords($title).'"/>
					</div>
				</div>
	</li>
	<p class="no-margin padding-left-10" style="font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-10" style="margin-left:-5px;">'. $comment1.'</p>
	 
	 <span class="text-muted pull-right font-xs">'.$datetime.'</span> 
				
			<div class="padding-5" style="margin-left:10px;  ">
			  <div class="text-default row "style=" ">
                 <div class=" col-xs-12 col-sm-12 col-md-12 padding-10 "id="load_comments'.$post_id.'" >
				   <ul class="list-inline">
				   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;"  title="comment" alt="comment"/> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	
					<li class="pull-right"style=" " >			
					     <a href="#"data-toggle="dropdown"style="color:grey; margin-left:-20px;"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							  <ul class="dropdown-menu no-padding pull-right " style="margin-top:-48px;" >
							  	</li>
									<li class="">
									 <a href="/download_gif.php?file='.$image_loc.'&idref='.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Download GIF</span></a> 
 								    		</li>
								
							</li>
							  <li class="" onClick="window.open(';
									echo"'https://www.facebook.com/sharer/sharer.php?u=https://mykanta.com/reev_load/".$post_id."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://www.facebook.com/sharer/sharer.php?u=https://mykanta.com/reev_load/'.$post_id.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Facebook</span></a>
							</li>
							<li class="" onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a></li>
							<li class=""> <a onClick="de_c_collection('.$post_id.');"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Delete</span></a>
							
							</li>
				
				
			 </ul>
	</li>
</ul>
	</a>
   
    
   </div>
   <div class=" padding-5" id="loading_reev'.$post_id.'"></div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
  </ul>
</div>
<hr class="no-margin" style="margin-top:-30px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;">
';
}

else if(($myfile_total != NULL && $myfile_total == 1 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				<div class="row" >
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;"  title="'.ucwords($title).'" alt="'.ucwords($title).'" />
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;">'. $comment_short.'</p>
	 
	 <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:0px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;"  title="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	'
                 ,seen_re_post($post_id),'
				 
					<li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
</ul>	
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}
else {echo '<li class=" padding-10 ">
<div class="row padding-10 ">
<p class="text-muted"> Recent Reev</p>
<p class="" ><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).' </p></p>	<span id="load_reev_text_more'.$post_id.'" class="font-">'.$comment1.' </span><span class="text-muted font-xs">'.$datetime.' </span>

<div class="">
<div class="row no-padding">
</li>
<div class="no-padding">
<div class="text-default row padding-5"style="">

   <div class=" col-xs-12 col-sm-12 col-md-12 no-padding" id="load_comments'.$post_id.'" >
     <ul class="list-inline" style="margin-left:5px;">
				  
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;"  title="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="0.8em;">comment(s)</span>
						</span></a>
				  </li>	
	
	
	<li class="pull-right" style="margin-right:20px;">	
     <span>
	<ul class="pull-right" style="list-style:none;">
		<li class="no-padding">
			<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey" ></i></a>
		
			<ul class="dropdown-menu no-padding pull-right " style="margin-top:-48px;" >
				<li class=" ">
              <a onClick="de_c_collection('.$post_id.');"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Delete</span></a>
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
<hr class="no-margin" style="margin-top:-30px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;">';  
}
}
}
else
{echo '<div class="row margin-10 padding-10"><center style="padding-10" ><p class="headline " style="color:black; font-size:1.6em;"> Welcome to mykanta</p><p class="font-sm" style="color:grey; font-size:1.0em;">Mykanta social is all about Sharing Experiences in Motion Pictures we call "Reev" with people around the world.</p> <a id="upload_modal_btn" href="javascript:void(0);" data-target="#upload_modal" data-toggle="modal" class="btn btn-default " rel="tooltip"  title="Create from images"> <i class="fa fa-camera"></i> Create your First Reev </a>  </center></div>

';
}
}
}
function get_status_comment_unfriend_one($owner_id)
{include "conxn.php";			 		 	 
$query = "SELECT * FROM account_comment where owner_id = $owner_id AND account_id = $owner_id  ORDER BY id DESC  LIMIT 1
";
$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
{
while($products = mysqli_fetch_assoc($query_add))
{
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$comment1 = htmlspecialchars($products['comment']);
	$comment = convertHashtags($comment1);
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$image_loc = $products['image_loc'];
$datetime2 = $products['commentDate'];
$datetime = date("D, d M Y", $datetime2);
$post_id = safe_input($products['id']);

echo '				
<div class="padding-10 margin-10 " id="mystatus">
<ul class="list-inline">
<li class="message">
';
//Check if image location is defined						 
if(($image_loc != NULL) || ($image_loc != "") || (!empty($image_loc)))
{
echo'<li>
<div class="row ">
<div class=""><p class=" font-xs" id="gif_image_holder_'.$post_id.'"><a class="fancybox" href="/img/comments_images/'.$image_loc.'.gif">
<img class="img img-rounded pull-left padding-10" src="/img/comments_images/mini/'.$image_loc.'.jpg" width="50%" height="auto"  title="'.ucwords($title).'" alt="'.ucwords($title).'"/></a><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p> '. $comment.'<span class="text-muted pull-right font-xs">
	'.$datetime.'
	</span> </p>	
</div>
<div class="">
<div class="row no-padding">


</li>
<div class=" padding-5" id="loading_reev'.$post_id.'"></div>

<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" >
   </div>
   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'">
       <div class="well btn well-light padding-5" align="" style="height:30px;" onclick="load_reev_comments('.$post_id.');" >
          <i class="fa fa-arrow-down"></i> comment(s) 
             <span class="badge inbox-badge">',get_reply_no($post_id),'</span>
      </div>' , myfile_total($post_id),'  ',smiles_reev($post_id),'
   </div>
</div>
</ul>		
</div>';
}
else echo '<li class="row padding-5 ">
<div class="row no-padding ">
<div class="no-padding" ><p class="" ><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p>'. $comment.'<span class="text-muted pull-right font-xs">'.$datetime.' </span></p>	

</div>
<div class="">
<div class="row no-padding">


</li>
<div class=" no-padding" id="loading_reev'.$post_id.'"></div>

<li class="row no-padding">
   <div class="col-xs-12 col-sm-12 col-md-12 no-padding" id="hide_reev_box'.$post_id.'" >
   </div>
   <div class=" col-xs-12 col-sm-12 col-md-12 no-padding "id="load_comments'.$post_id.'">
       <div class="well btn well-light padding-5" align="" style="height:30px;" onclick="load_reev_comments('.$post_id.');" >
          <i class="fa fa-arrow-down"></i> comment(s) 
             <span class="badge inbox-badge">',get_reply_no($post_id),'</span>
      </div> ',smiles_reev($post_id),'
   </div>
</li>
</ul>		
</div>';  
}
}
else
{
echo '
<p class="text-primary padding-10" style=""> No Reevs yet!
</p>
'; 
}
}

function get_status_comment_all_friends($userThis_id)
{
include "conxn.php";  	
 $userThis_id = $_SESSION['id'];
 $non = "400";
			
    $all_friendsq2 = connection_ids_distinct();
      
  $range =  implode(',',$all_friendsq2) ;

    $queryz = "SELECT image_loc FROM account_comment WHERE owner_id != $non ORDER BY id DESC LIMIT 10"; 
	//  GROUP BY commentDate DESC
    if($query_add = mysqli_query($link,$queryz))
	{
		echo '<ul class=" no-padding" style="height:auto;">';
		while($products2 = mysqli_fetch_assoc($query_add))
			{
			   $image_loc = $products2['image_loc'];
			  $queryz1 = "SELECT  *  FROM account_comment where image_loc = '$image_loc' AND account_id != '$non' ORDER BY id ASC LIMIT 1";
			  $query_add1 = mysqli_query($link,$queryz1);
			  
			  while($products = mysqli_fetch_assoc($query_add1))
				{
					$account_id = safe_input($products['account_id']);
					$owner_id = safe_input($products['owner_id']);
					$comment4 = $products['comment'];
					$comment2 =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
					$nio_hash =   str_replace(['#'], "", $comment4);
					$comment1 = stripslashes($comment2);
						$comment = convertHashtags($comment1);
						$myfile_total = $products['myfile_total'];
					$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
					if( $title_null != "" OR $title_null != 'NULL')
						{
						$title = stripslashes(convertHashtags($title_null));
						}
							$image_loc = $products['image_loc'];
							$datetime2 = $products['commentDate'];
							$datetime = date("D, d M Y", $datetime2);
						
							$post_id1 = safe_input($products['id']);
							$post_id =  post_id_from_gif($image_loc);
										
						status_comment_new($post_id,$image_loc,$comment,$nio_hash,$account_id,$owner_id,$datetime,$title,$myfile_total);
				
			}
			}
	}
	if(isset($post_id))
	{
	 echo '</ul> <center id="load_more_reev_box5" class=" padding-10 " align="center" style="height:100px; width:auto;"  ><button onclick="load_more_reevs('.$userThis_id.','.$post_id1.',5);"class="load_reev_button" id="load_reev_button">  <i class="fa fa-sm fa-arrow-down"style=""></i>  Old Reevs </button></center>  <div id="load_more_reevs" class="no-padding" style="height:auto;"> </div>';
     }
}
 
 
function status_comment_new($post_id,$image_loc,$comment,$comment1,$account_id,$owner_id,$datetime,$title,$myfile_total)
	{
	include "conxn.php";  	
	$userThis_id  = $_SESSION['id'];
	$all_friendsq = array();				
    $all_friendsq2 = connection_ids_distinct();
      
    $range =  implode(',',$all_friendsq2) ;


  //check if owner of reev is your friend , if yes do not show
  $queryq = "SELECT id FROM account_comment WHERE id = '$post_id' ORDER BY id DESC LIMIT 1";
    $queryuser = mysqli_query($link,$queryq);
		 
$querya = " SELECT product_id,shop_id FROM product where name = '$title' LIMIT 1 ";
			$query_adda = mysqli_query($link,$querya);
			$productsa = mysqli_fetch_assoc($query_adda);
			$product_id = $productsa['product_id'];
			$shop_id = $productsa['shop_id'];
	 
	 
  if($query_q2 = mysqli_num_rows($queryuser) <=1 )
    {
		
$query1 = "SELECT shopName FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 1";
$query4user_info1 = mysqli_query($link,$query1);
$allpalls_info1 = mysqli_fetch_array($query4user_info1,MYSQLI_ASSOC);
		
	$shopName = $allpalls_info1['shopName'];
	 $comment_twitter = substr($comment1, 0, 113). '...';
	 if(strlen($comment)<149)
	   { $comment_short = substr($comment, 0, 150). '...';}
	    else{
	      $comment_short = substr($comment, 0, 180). ' <p class=""><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a><p>';}
				echo '
				<div class="">
				<ul style="list-style:none; margin-left:-60px;">
				<li class="message ">';
			/*	
				if(($owner_id == $account_id ))
				{
				echo '<ul class="list-inline" style="margin-left:30px; margin-top:0px;"><li>', get_status_pic_of_sender($account_id), '</li><li class="no-padding" style="margin-top:-10px;"><span class="padding-5" style="list-style:none; margin-top:-10px;"><p style=" margin-bottom:2px;"> ', get_status_name($account_id), '</p><p  style=" margin-bottom:-30px;" class="text-muted font-xs">'.$datetime.'</p> </span></li> </ul>';
				}
				else {
					echo '<ul class="list-inline" style="margin-left:30px; margin-top:0px;"><li>', get_status_pic_of_sender($account_id), '</li><li class="no-padding" style="margin-top:-10px;"><span class="padding-5" style="list-style:none; margin-top:-10px;"><p style=" margin-bottom:2px;"> ', get_status_name($account_id), '  -- <img  class="img img-circle" src="/img/site_img/reev_icons/reev_sh.png" title="reposted" style="height:18px; margin-top:-10px;"/> by ', get_status_name($owner_id), '</p><p  style=" margin-bottom:-30px;" class="text-muted font-xs">'.$datetime.'</p> </span></li> </ul>';
				}
				*/
				//Check if image location is defined						 
				if(($myfile_total != NULL && $myfile_total >= 2 ))
{
echo'<li class="padding-10" style=" width:100%; height:auto;" >
				
				<center class="row" >
					 
					<center class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"    src="/uploads/'.$image_loc.'" style=" width:100%; height:auto; z-index:-1; margin-left:10px; "  title="'.ucwords($title).'" alt="'.ucwords($title).'"/>
					</center>
				</center>
	</li>
		<div class="row padding-10" style=" margin-left:20px;">
		<a href="/product-link/'.cleans_text($shopName).'/'.$product_id.'/'.cleans_text($title).'"><p class="margin-10" style="font-size:1.2em; color:black;">'.ucwords($title).'</p></a> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-10" style="margin-left:20px;margin-right:20px;">'. $comment_short.'</p>
	 
	 <span class="hidden text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:5px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;"  title="comment" alt="comment"/> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	 
				 
					<li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
</ul>	
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}

else if(($myfile_total != NULL && $myfile_total == 1 ))
{
				echo'<li class="padding-10" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"  src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;"  title="'.ucwords($title).'" alt="'.ucwords($title).'">
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	<a href="/product-link/'.cleans_text($shopName).'/'.$product_id.'/'.cleans_text($title).'">'.ucwords($title).'</p></a>
	 
	 <span class="hidden text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:0px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;"  title="comment" alt="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	 <li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
</ul>	
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
			}
			else
			{
			echo'<li style="padding-left:50px;">

			<div class="row " style="margin-left:-10px;">
			<div class="padding-10"><p class="" ><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p><p class="no-margin" ><span id="load_reev_text_more'.$post_id.'">'. $comment_short.'</span></p></p>	
			</div>
			</div>
			</li>

			<li class="message" style="margin-top:-15px; padding-left:55px;">

			<ul class="list-inline  " >	
			 
			<div class="row padding-5" style="">
				<div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" >
				</div>
				<div class=" col-xs-12 col-sm-12 col-md-12 padding-5" id="load_comments'.$post_id.'" >
				<ul class="list-inline">
						<li>   ',smiles_reev_display_info($post_id),' </li>
							   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;"  title="comment" alt="comment"/> ',get_reply_no($post_id),'
									<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
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
   
 } 
 
function get_status_comment_all_friends_next($owner_id,$reev_id,$LIMIT_1)
{
include "conxn.php";  	
include "include/sessionfile.php";  	
$userThis_id = $_SESSION['id'];

$all_friendsq = connection_ids_distinct();
$range =  implode(',',$all_friendsq) ;
//  $orLogic1 = chop($orLogic1, "OR ");
	$limit_new = $LIMIT_1 - 5 ;

$queryz = "SELECT DISTINCT `image_loc` FROM `account_comment` GROUP BY `id` DESC LIMIT $LIMIT_1, 5"; //  GROUP BY commentDate DESC
$query_add = mysqli_query($link,$queryz);

    echo '<ul class=" no-padding" style="height:auto;">';
    while($products2 = mysqli_fetch_assoc($query_add))
		{
		  $image_loc = $products2['image_loc'];
		  $queryz1 = "SELECT  *  FROM account_comment where image_loc = '$image_loc' ORDER BY id DESC LIMIT 1";
		  $query_add1 = mysqli_query($link,$queryz1);
          
		  while($products = mysqli_fetch_assoc($query_add1))
			{
				$account_id = safe_input($products['account_id']);
				$owner_id = safe_input($products['owner_id']);
				$comment4 = $products['comment'];
				$comment2 =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
				 $nio_hash =   str_replace(['#'], "", $comment4);
				$comment1 = stripslashes($comment2);
					$comment = convertHashtags($comment1);
					$myfile_total = $products['myfile_total'];
				$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
				if( $title_null != "" OR $title_null != 'NULL')
					{
					$title = stripslashes(convertHashtags($title_null));
					}
						$image_loc = $products['image_loc'];
						$datetime2 = $products['commentDate'];
$datetime = date("D, d M Y", $datetime2);
						//$datetime3 = date("D,d M Y", $datetime);
						$post_id1 = safe_input($products['id']);
						$post_id =  post_id_from_gif($image_loc);
						
					status_comment_new_next($post_id,$image_loc,$comment,$nio_hash,$account_id,$owner_id,$datetime,$title,$myfile_total);
				
			}
		}	
		 echo '</ul> <div id="load_more_reev_box'.$LIMIT_1.'" class=" padding-10" align="center" style="height:100px;"  > <button class="load_reev_button" id="load_reev_button" onclick="load_more_reevs('.$owner_id.','.$reev_id.','.$LIMIT_1.');">   <i class="fa fa-sm fa-arrow-down"style=""></i>  Old Reevs </button></div>  <div id="load_more_reevs" class="no-padding" style="height:auto;"> </div>';
}

function status_comment_new_next($post_id,$image_loc,$comment,$comment1,$account_id,$owner_id,$datetime,$title,$myfile_total)
	{
	include "conxn.php";  	
	$userThis_id  = $_SESSION['id'];
	$all_friendsq = array();				
    $all_friendsq = connection_ids_distinct();
      
    $range =  implode(',',$all_friendsq) ;
	
	$querya = " SELECT product_id,shop_id FROM product where name = '$title' LIMIT 1 ";
			$query_adda = mysqli_query($link,$querya);
			$productsa = mysqli_fetch_assoc($query_adda);
			$product_id = $productsa['product_id'];
			$shop_id = $productsa['shop_id'];
			
			
    $queryq = "SELECT id FROM account_comment WHERE id = '$post_id' AND account_id != '$userThis_id' ORDER BY id DESC LIMIT 1";
    $queryuser = mysqli_query($link,$queryq);
    if($query_q2 = mysqli_num_rows($queryuser) <=1 )
    {
      $query1 = "SELECT shopName FROM `shop` WHERE `shop_id` = '$shop_id' LIMIT 0 , 1";
      $query4user_info1 = mysqli_query($link,$query1);
      $allpalls_info1 = mysqli_fetch_array($query4user_info1,MYSQLI_ASSOC);
	  $shopName = $allpalls_info1['shopName'];
	  
     $comment_twitter = substr($comment1, 0, 113). '...';
	if(strlen($comment)<149)
	{ $comment_short = substr($comment, 0, 150). '...';}
	else{
	     $comment_short = substr($comment, 0, 180). ' <p class=""><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a><p>';}
				echo '
				<div class=" ">
				<ul style="list-style:none; margin-left:-60px;">
				<li class="message ">';
			/*	
				if(($owner_id == $account_id ))
				{
				echo '<ul class="list-inline" style="margin-left:30px; margin-top:0px;"><li>', get_status_pic_of_sender($account_id), '</li><li class="no-padding" style="margin-top:-10px;"><span class="padding-5" style="list-style:none; margin-top:-10px;"><p style=" margin-bottom:2px;"> ', get_status_name($account_id), '</p><p  style=" margin-bottom:-30px;" class="text-muted font-xs">'.$datetime.'</p> </span></li> </ul>';
				}
				else echo '<ul class="list-inline" style="margin-left:30px; margin-top:0px;"><li>', get_status_pic_of_sender($account_id), '</li><li class="no-padding" style="margin-top:-10px;"><span class="padding-5" style="list-style:none; margin-top:-10px;"><p style=" margin-bottom:2px;"> ', get_status_name($account_id), '   -- <img  class="img img-circle" src="/img/site_img/reev_icons/reev_sh.png" title="reposted" style="height:18px; margin-top:-10px;"/> by ', get_status_name($owner_id), '</p><p  style=" margin-bottom:-30px;" class="text-muted font-xs">'.$datetime.'</p> </span></li> </ul>';
				*/
				
				//Check if image location is defined						 
			if(($myfile_total != NULL && $myfile_total >= 2 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="row" id="pauser'.$post_id.'">
						<div class=" right-image right-image-last" id="gif_image_holder_'.$post_id.'">
							<img class="hidden-md hidden-lg" style="width:70px;margin-top:-120px;" src="/img/loader.png" onClick="image_loc('.$post_id.');" title="loading" alt="loading"/>
							<img class="hidden-xs hidden-sm" style="width:70px;margin-top:-70px;" src="/img/loader.png" onClick="image_loc('.$post_id.');" title="loading" alt="loading"/>
					   </div>
					</div>
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"   onClick="image_loc_puse('.$post_id.');" src="/uploads/'.$image_loc.'" style=" width:100%; height:auto; z-index:-1;" title="comment" alt="comment"/>
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
		<a href="/product-link/'.cleans_text($shopName).'/'.$product_id.'/'.cleans_text($title).'"><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p></a>
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
	 
	 <span class="hidden text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:0px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;" title="comment" alt="comment"/> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	 
                 
				 
					<li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
</ul>	
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}

else if(($myfile_total != NULL && $myfile_total == 1 ))
{
			echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'" src="/uploads/'.$image_loc.'" style=" width:100%; height:auto; z-index:-1;" title="image" alt="image"/>
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
		<a href="/product-link/'.cleans_text($shopName).'/'.$product_id.'/'.cleans_text($title).'"><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p></a>
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;">'. $comment_short.'</p>
	 
	 <span class="hidden text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:0px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" title="comment" alt="comment" style="height:22px; margin-top:-12px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li> 
					<li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
</ul>	
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}
else echo '<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
	 
	 <span class=" hidden text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
<div class="row" style="margin-left:0px;margin-top:0px;margin-left:20px;">
   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
       <ul class="list-inline">
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;" title="comment" alt="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>	

				  <li class="pull-right"  style="margin-top:-10px;margin-right:20px;">			
			     <span>
				<ul style="list-style:none;">
					<li class="padding-10">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey"></i></a>
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

function hastag_text()
{
include "conxn.php";  	
$userThis_id = $_SESSION['id'];
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
$comment_raw = $products['comment'];
$comment4 = htmlspecialchars($products['comment']);
$comment2 =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
	 $nio_hash =   str_replace(['#'], "", $comment_raw);
$comment = stripslashes($comment2);
	//$comment1 = convertHashtags($comment);
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
	$myfile_total = $products['myfile_total'];
$image_loc = $products['image_loc'];
$datetime2 = $products['commentDate'];
$datetime = date("D, d M Y", $datetime2);
$post_id = safe_input($products['id']);
$comment_twitter = substr($nio_hash, 0, 113). '...';
	if(strlen($comment_raw)<149)
	{ $comment_short = substr($comment, 0, 150); $comment1 = convertHashtags($comment_short);}
	else{$comment_short = substr($comment, 0, 180);$comment1 = convertHashtags($comment_short). ' <p class=""><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a><p>';  }
echo '
<div class="">
<ul style="list-style:none; margin-left:-60px;">
<li class="message ">
 <ul class="list-inline" style="margin-left:30px; margin-top:0px;"><li>', get_status_pic_of_sender($account_id), '</li><li class="no-padding" style="margin-top:-10px;"><span class="padding-5" style="list-style:none; margin-top:-10px;"><p style=" margin-bottom:2px;"> ', get_status_name($account_id), '</p><p  style=" margin-bottom:-30px;" class="hidden text-muted font-xs">
	'.$datetime.'
	</p> </span></li> </ul>';
//Check if image location is defined						 
if(($myfile_total != NULL && $myfile_total >= 2 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="row" id="pauser'.$post_id.'">
						<div class=" right-image right-image-last" id="gif_image_holder_'.$post_id.'">
							<img class="hidden-md hidden-lg" style="width:70px;margin-top:-120px;" src="/img/loader.png" onClick="image_loc('.$post_id.');" title="loading" alt="loading">
							<img class="hidden-xs hidden-sm" style="width:70px;margin-top:-70px;" src="/img/loader.png" onClick="image_loc('.$post_id.');" title="loading" alt="loading"/>
					   </div>
					</div>
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"   onClick="image_loc_pause('.$post_id.');" src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;" title="comment" alt="comment"/>
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
			<a href="/product-link/'.cleans_text($shopName).'/'.$product_id.'/'.cleans_text($title).'"><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p></a> 
		 
		   <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
		 
		  <span class="hidden text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
		</div>		
			
<div class="padding-10">
  <div class="text-default row "style="margin-left:0px;">
    <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
        <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;" title="comment" alt="comment"/> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a></li> <li class="pull-right"style="" > <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
								<li class="  " onClick="window.open(';
										echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."','Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
										echo'); return false;" href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
									 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
									</li>
									<li class=" hidden-sm hidden-md hidden-lg ">
									 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
									</li>
									<li class="  ">
									 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
									</li>
							</ul>
           </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
        </div>
      <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
    </ul>	
  </div>

<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}

else if(($myfile_total != NULL && $myfile_total == 1 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"  src="/uploads/'.$image_loc.'" style=" width:100%; height:auto; z-index:-1;"  title="'.ucwords($title).'" alt="'.ucwords($title).'" />
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
		<a href="/product-link/'.cleans_text($shopName).'/'.$product_id.'/'.cleans_text($title).'"><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p></a>
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;">'. $comment_short.'</p>
	 
	 <span class="hidden text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:0px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;"  title="comment" alt="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	 
				 
					<li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
</ul>	
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}
else 
{
	echo '<div class="row padding-10" style=" ">
	<a href="/product-link/'.cleans_text($shopName).'/'.$product_id.'/'.cleans_text($title).'"><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p></a>
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
	 
	 <span class="hidden text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
<div class="row" style="margin-left:0px;margin-top:0px;margin-left:15px;">
   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
       <ul class="list-inline">
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;"  title="comment" alt="comment"/> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>	

				  <li class="pull-right"  style="margin-top:-10px;margin-right:20px;">			
			     <span>
				<ul style="list-style:none;">
					<li class="padding-10">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey"></i></a>
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

}else { echo '<p class="padding-10 text-muted" style="margin-left:10px;">No Reevs on this Tag.</p>'; }
//end
if(isset($post_id))
{
echo '
 <center id="load_more_reevs_tag5" class=" padding-10 " align="center" style="height:100px; width:auto;"  ><button onclick="load_more_reevs_tag(5,'.$post_id.');"class="load_reev_button" id="load_reev_button" value="'.$hashtag.'">
          <i class="fa fa-sm fa-arrow-down"style=""></i>  Old Reevs </button> 
      </center>
	  <div id="load_more_reevs" class="no-padding" style="height:auto;"> </div>';
	  }

 
 }

function hashtag_next($tag_id_raw,$LIMIT)
{include "conxn.php";  	

 
$hashtag = safe_input($tag_id_raw);
 $new_str  = preg_replace('/[^A-Za-z0-9\ ]/ ', '', $hashtag);
  $tag = '#'.$new_str;
   $param = "%{$tag}%";
$all_friends = array();
 
$queryz = "SELECT * FROM account_comment WHERE owner_id = account_id  AND comment like  '$param' ORDER BY commentDate DESC LIMIT $LIMIT, 5";
$query_add = mysqli_query($link,$queryz);
 

if(mysqli_num_rows($query_add ) > 0){
while($products = mysqli_fetch_assoc($query_add))  //start
{
$account_id = safe_input($products['account_id']);
$post_user_id = safe_input($products['account_id']);
$myfile_total = safe_input($products['myfile_total']);
$comment_raw = $products['comment'];
$comment = htmlspecialchars($products['comment']);
$comment2 =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment_raw);
	 $nio_hash =   str_replace(['#'], "", $comment_raw);
$comment5 = stripslashes($comment2);
	//$comment1 = convertHashtags($comment);
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$image_loc = $products['image_loc'];
$datetime2 = $products['commentDate'];
$datetime = date("D, d M Y", $datetime2);
$post_id = safe_input($products['id']);
$comment_twitter = substr($nio_hash, 0, 113). '...';
	if(strlen($comment_raw)<149)
	{ $comment_short = substr($comment5, 0, 150); $comment1 = convertHashtags($comment_short);}
	else{$comment_short = substr($comment5, 0, 180);$comment1 = convertHashtags($comment_short). ' <p class=""><a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a><p>';  }
echo '
<div class=" padding-10 ">
<ul style="list-style:none; margin-left:-60px;">
<li class="message ">
 <ul class="list-inline" style="margin-left:30px; margin-top:0px;"><li>', get_status_pic_of_sender($account_id), '</li><li class="no-padding" style="margin-top:-10px;"><span class="padding-5" style="list-style:none; margin-top:-10px;"><p style=" margin-bottom:2px;"> ', get_status_name($account_id), '</p><p  style=" margin-bottom:-30px;" class="hidden text-muted font-xs">
	'.$datetime.'
	</p> </span></li> </ul>';
//Check if image location is defined						 
if(($myfile_total != NULL && $myfile_total >= 2 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="row" id="pauser'.$post_id.'">
						<div class=" right-image right-image-last" id="gif_image_holder_'.$post_id.'">
							<img class="hidden-md hidden-lg" style="width:70px;margin-top:-120px;" src="/img/loader.png"  title="loading" alt="loading" onClick="image_loc('.$post_id.');">
							<img class="hidden-xs hidden-sm" style="width:70px;margin-top:-70px;" src="/img/loader.png" onClick="image_loc('.$post_id.');"  title="loading" alt="loading"/>
					   </div>
					</div>
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"   onClick="image_loc_pause('.$post_id.');" src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;" title="pause" alt="pause"/>
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
			<a href="/product-link/'.cleans_text($shopName).'/'.$product_id.'/'.cleans_text($title).'"><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p></a>
		 
		   <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
		 
		  <span class="hidden text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
		</div>		
			
<div class="padding-10">
  <div class="text-default row "style="margin-left:0px;">
    <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
        <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;" title="comment" alt="comment"/> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a></li> <li class="pull-right"style="" > <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
								<li class="  " onClick="window.open(';
										echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."','Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
										echo'); return false;" href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
									 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
									</li>
									<li class=" hidden-sm hidden-md hidden-lg ">
									 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
									</li>
									<li class="  ">
									 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
									</li>
							</ul>
           </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
        </div>
      <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
    </ul>	
  </div>

<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}

else if(($myfile_total != NULL && $myfile_total == 1 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"  src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;" title="'.ucwords($title).'" alt="'.ucwords($title).'" />
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
		<a href="/product-link/'.cleans_text($shopName).'/'.$product_id.'/'.cleans_text($title).'"><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p></a> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;">'. $comment_short.'</p>
	 
	 <span class="hidden text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:0px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" title="comment" alt="comment"style="height:22px; margin-top:-12px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	 
				 
					<li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/re-post?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/re-post?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="re-post/whatsapp/re-post"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
</ul>	
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}
else 
{
	echo '<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
	 
	 <span class="hidden text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
<div class="row" style="margin-left:0px;margin-top:0px;margin-left:15px;">
   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
       <ul class="list-inline">
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;" title="comment" alt="comment" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>	

				  <li class="pull-right"  style="margin-top:-10px;margin-right:20px;">			
			     <span>
				<ul style="list-style:none;">
					<li class="padding-10">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey"></i></a>
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

}else { echo '<p class="padding-10 text-muted" style="margin-left:10px;">No Reevs on this Tag.</p>'; }
//end
if(isset($post_id))
{
echo '
 <center id="load_more_reevs_tag'.$LIMIT.'" class=" padding-10 " align="center" style="height:100px; width:auto ;"  ><button onclick="load_more_reevs_tag('.$LIMIT.','.$post_id.');"class="load_reev_button" id="load_reev_button"  value="'.$hashtag.'">
          <i class="fa fa-sm fa-arrow-down"style=""></i>  Old Reevs </button> 
      </center>
	  <div id="load_more_reevs" class="no-padding" style="height:auto;"> </div>';
	  }

 
 }
 
 function get_status_commnt_all_friends($owner_id)
{include "conxn.php";	
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
$datetime2 = $products['commentDate'];
$datetime = date("D, d M Y", $datetime2);
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
<img class="img-thumbnail" src="/img/comments_images/'.$image_loc.'" width="155" title="image" alt="image"/></a></p>
'. $comment.'';
}
echo'
</li>
<li class="message" style="margin-top:-15px; padding-left:55px;">
			<ul class="list-inline font-xs " >
<li class="hidden text-primary">
'.$datetime.'
				</li>
				<li>
<a href="javascript:void(0);" class="text-muted">Show All Comments (';
			echo		get_reply_no($post_id);
		echo	')</a>
				</li>
				<li class="padding-10">
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
{include "conxn.php"; 		 	 

$query = "SELECT * FROM shop_comment where shop_id = $shop_id  ORDER BY id DESC LIMIT 0 , 10
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
$datetime = date("D, d M Y", $datetime);
$post_id = safe_input($products['id']);

echo '<hr>
<div class=" padding-no  ">
<ul class="list-inline padding-no margin-no">
<li class="">
';/*, get_status_pic_of_sender($account_id), '
', get_status_name($account_id), ' '*/;  
if(($image_loc == NULL) || ($image_loc == "NULL"))
{								
	echo'<p style="">
', get_status_name_only($account_id),'</p><p style="font-size:9pt;">'. ucwords($comment).'
		<span class="text-primary"> '.$datetime.'
				<a href="/include/delete_shop_comment.php?id='.$post_id.'&shop_id='.$this_shop.'"class="text-danger">Delete</a> </span></p>';
}
else
{
	echo'<li style="margin-top:-10px;">
		<div class="row padding-no "><div class="col-md-12 padding-no"><a class="fancybox" href="/img/shop_comments_images/'.$image_loc.'">
<img class="img-thumbnail" src="/img/shop_comments_images/'.$image_loc.'" width="100%"  "title="image" alt="image" /></a></div>
<div class="col-md-12 well-light padding-no"style="background-color:"><span style="margin-top:-30px;" >'. $comment.'</span><p class="text-primary">'.$datetime.'
				<a href="/include/delete_shop_comment.php?id='.$post_id.'&shop_id='.$this_shop.'"class="text-danger">Delete</a>
				</p></div></div>';
}
		 echo'
		 </li>
		

	</ul>	  <ul class="list-inline ">';
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
<img src="/img/mykanta_logo.png" "title="profile" alt="profile" class="img-thumbnail" width="50px;" >
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
{include "conxn.php"; 		 	 

$query = "SELECT * FROM shop_comment where shop_id = $shop_id  ORDER BY id DESC LIMIT 0 , 10
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
$datetime = date("D, d M Y", $datetime);
$post_id = safe_input($products['id']);

echo '
<div class=" ">
<ul class="list-inline ">
';/*, get_status_pic_of_sender($account_id), '
', get_status_name($account_id), ' '*/;  
if($post_id)
{								
	echo  '<li class="padding-10">
<span class=" padding-10">
<strong style="" ><a class="text-primary">Review'.rand().'.</a></strong>  <span class="text-muted pull-right" style="font-size:0.8em;"> '.$datetime.'
				</span></span><p style="padding-left:10px;">'. $comment.'</p></li><hr class="no-margin">
		';
}

echo' 
	   </ul>
	     <ul>		';
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
<img src="/img/mykanta_logo.png" "title="profile" alt="profile" class="img-thumbnail" width="50px;" >
			 <strong style="padding-left:60px;" ><a href="#" style="margin-bottom:-140px;" class="text-primary">Comments </a></strong>
	  <p style="padding-left:60px;">Be the first to make a comment to this business. 
		 </p>
		 </li>
	</ul>		
</div>
'; 
}
}
function product_review($product_id)
{include "conxn.php";
$query = "SELECT * FROM product_review where product_id = $product_id  ORDER BY id DESC LIMIT 0,10
";
if($query_add = mysqli_query($link,$query))
{
echo'   <div class="customs_croll" style="height:450px; padding-10; ">';

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
$friend_id = safe_input($details['id']);
$username = safe_input($details['username']);
echo '
<div class="row no-padding no-margin " >
<div class="col-md-10 pull-left padding-10 margin-10" >
<strong style=""><a class="text-primary">Reviewer</a></strong> 
<p >'. $review.'</p>
<ul class="list-inline font-xs">
<li>
<a href="javascript:void(0);" class="text-muted">'.$datetime.'</a>
</li>
<li>
<a href="/include/delete_product_comment.php?id='.$review_id.'"class="text-danger hidden">Delete</a>
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
{include "conxn.php";	 		 	 
$query = "SELECT * FROM product_review where product_id = '$product_id'  ORDER BY id DESC LIMIT 0,10
";

if($query_add = mysqli_query($link,$query))
{
echo'   <div class="" style="height:auto;">';

while($products = mysqli_fetch_assoc($query_add))
{
$account_id = $products['account_id'];
$post_user_id = $products['account_id'];
$review = safe_input($products['review']);
$datetime = strtotime($products['datetime']);
$datetime = date("D, d M Y", $datetime);
$review_id = $products['id'];

$query2 = "SELECT * FROM registration where id = $account_id   LIMIT 1";

if($query_add2 = mysqli_query($link,$query2))
{
while($details = mysqli_fetch_assoc($query_add2))
{ 

$firstName = safe_input($details['firstName']);
$friend_id =$details['id'];
$username = safe_input($details['username']);
echo '
<div class="row  " style="padding-left:20px;">
<strong style="" ><a class="text-primary">Review'.rand().'.</a></strong> 
<p >'. $review.'</p>
<ul class="list-inline font-xs " >
<li>
<a href="javascript:void(0);" class="text-muted pull-right">'.$datetime.'</a>
</li>
</ul>
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
<div class="row margin-10 padding-10"><center style="padding-10" ><p class="headline " style="color:black; font-size:1.4em;"> Welcome to mykanta</p><p class="font-sm" style="color:grey; font-size:1.0em;">Be the first to make a review here!.</p></center></div>

'; 
}
}

function header_up($user_id)
{echo ' <header id="header"> 
<div id="logo-group"> 
	<span class="hidden-xs hidden-sm" id="logo"><a href="/User" title="Profile" class=""><img src="/img/mykanta_logo.png" "title="profile" alt="profile" class="img   height="25" width="90"/></a>
	</span>
	<span class="padding-10 hidden-md hidden-lg" id=""><a href="/User" class="" title="Profile"><img src="/img/site_img/mk.png" class="img"  height="30" width="30" title="profile" alt="profile"/></a>
	</span>';
	/*<span id="" class="activity-dropdown"title="Updates"> <i class="fa fa-globe" style="line-height:1.4;"></i> <b class="badge"> '; no_of_total_notifs_n_req($user_id);
  echo '</b>
	 </span>
<div class="ajax-dropdown">
	<div class="btn-group btn-group-justified" data-toggle="buttons">
			<label class="btn btn-default">   
				<input type="radio" name="activity" id="/ajax/notify/notifier.php">
				Updates <span class="badge inbox-badge" >',no_notifs($user_id), '</span> 
			</label>
			<label class="btn btn-default">   
				<input type="radio" name="activity" id="/ajax/notify/cart.php">
				Wish-list 
			</label>
			<label class="btn btn-default">
				<input type="radio" name="activity" id="/ajax/notify/friend_req_list.php">
				Requests <span class="badge inbox-badge" >',get_no_of_friends($user_id), '</span> 
			</label>
	</div>
	<div class="ajax-notifications custom-scroll">'; //notification1();
echo'</div>
</div>*/
echo ' </div>

<div class="">
	
	<form action="/include/search_dir_logged.php" class=" hidden-xs hidden-sm header-search pull-left" method="post" name="form1">
	<input type="text" style="border-radius:15px;" placeholder="Find businesses, products and people" name="yourshop" required/>
	<button type="submit">
	<i class="fa fa-search"></i>
	</button>
	</form>
	<div id="search-mobile" class="btn-header transparent" style="margin-left:-70px;"> 
		<span> <a href="javascript:void(0)" title="Search"><i style="line-height:2.0;" class="fa fa-search"></i></a>
		</span>
	</div>
</div>	
	
	
		
	
	
	
<div class="pull-right" >

	
	<div class="col-xs-10 col-sm-10 col-md-10"   style="padding-bottom:10px;">
	<div class="dropdown-lg ">
		  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
			
			<div id="logo-group"> 
			  
			  <span id="activity" onClick="notifier_update();" class="activity-dropdown"title="Updates"> <i class="fa fa-globe" style="line-height:1.4;"></i> <span  id="badge_notifier"><b class="badge">',no_notifs($user_id),'</b></span>
			</span>
		
           </div>
		   
		 </a>
		
		  <ul class="dropdown-menu  notifications pull-right  " role="menu" aria-labelledby="dLabel">
				uyyu <div class=" ">utuyy<h4 class="  text-muted">Activity Updates</h4>
				 </div>
				 <li class="divider"></li>
				 <div id="notification1" class="customs_croll notifications-wrapper no-padding" style="width:250px;">
					 ';//,notification1();
			echo'	 </div>
				 <li class="divider"></li>
				 <div class="notification-footer">
				     <h4 class="  text-muted">Activity Updates</h4>
				 </div>
			 </ul>
	    </div>
		
	<div class="dropdown-lg  " style="">
			 <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
				
				<div id="logo-group" class=""> 
			  
				  <span id="activity" class="activity-dropdown " title="Requests"> <i class="fa fa-group" style="line-height:1.4;"></i> <b class="badge"> ',get_no_of_friends($user_id), '</b>
			   	  </span>
			
			   </div>
		   
			 </a>
             <ul class="dropdown-menu notifications pull-right  "  role="menu" aria-labelledby="dLabel">
				 <div class="notification-heading"><h4 class="  text-muted"> Requests</h4>
				 </div>
				 <li class="divider"></li>
				 <div class="notifications-wrapper no-padding" style="width:250px;">
                  
				  ',friend_req(),'
			    </div>
				 <li class="divider"></li>
				 <div class="notification-footer">
				     <h4 class="menu-title"></h4>
				 </div>
			 </ul>
        </div>
		
              
		<ul class="header-dropdown-list dropdown-large">
				<li class="dropdown-large"style="margin-top:-45px; cursor:default!important;">
					<p class="dropdown-toggle text-primary hidden-xs hidden-sm" data-toggle="dropdown" >', username_only($user_id),'<b class="caret"></b></p>
					<p class="dropdown-toggle hidden-md hidden-lg" style="" data-toggle="dropdown"
					><img class=" img-circle" width="25"  style="margin-top:-8px; "  alt="', username_only($user_id),'" title="', username_only($user_id),'" src="',get_profile_pic_only_name($user_id),'"/><b class="caret"></b></p>
					<ul class="dropdown-menu pull-right">
						<li class="">
							<a href="/User"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent" >Profile</span></a>
						</li>
						<hr>
						<li class="">
							<a href="/check_out.php"><i class="glyphicon glyphicon-shopping-cart"></i> <span class="menu-item-parent" >Cart</span></a>
						</li>
						<hr><li class="">
							<a href="/create_business.php"><i class="fa fa-lg fa-fw fa-legal"></i> <span class="menu-item-parent" >Create Business</span></a>
						</li>
						<hr>
						<li>
						<a href="/user_settings.php"><i class="fa fa-lg fa-fw fa-gears"></i> <span class="menu-item-parent" style="padding-left:0px;">Settings</small></span>
						</li>
						<hr>
						<li>
						<a href="/send_feedback.php"><i class="fa fa-lg fa-fw fa-envelope"></i> <span class="menu-item-parent" style="padding-left:0px;">Send feedback</small></span>
						</li>
						<hr>
						<li>
							<a href="/Logout"><i class="fa fa-lg fa-fw fa-sign-out"></i> <span class="">Logout</span></a>
						</li>
						
					</ul>
				</li>
		</ul>
		
		
</div>
	
<div class="col-xs-2 col-sm-2 col-md-2 no-padding" style="margin-left:-10px;">
<div id="hide-menu" class="btn-header ">
<span> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder" style="line-height:1.5;"></i></a> </span>
</div>
</div>
<form action="/include/search_dir_logged.php" class=" hidden-md hidden-lg header-search pull-left"  method="post" name="form1" >
	<input type="text"  placeholder="Search " name="yourshop" required/>
	<button type="submit"style="margin-left:-300px;">
	<i class="fa fa-search"></i>
	</button>
	<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"  style="line-height:1.5;"></i></a>
	</form>
	
</div>
</header>';
}

 function nav_2()
{
	echo '<aside id="left-panel">
<nav style="font-size:1.1em;">
<ul>
<li>
<a href="#"><i class="fa fa-lg fa-fw fa-group"></i> <small class="menu-item-parent" style="padding-left:0px;">Connections</small>
20</a>
<div class="well-light myscroll" style="max-height:300px;
 ">sangg</div>
</li>
<li>
<div class="myscroll" style="max-height:300px;   "><small class="menu-item-parent" style="padding-left:0px;">saht</small></div> 	
</li>   
<li>
<a href="#"><i class="fa fa-lg fa-fw fa-plus"></i><small class="menu-item-parent" style="padding-left:0px;">Subscribed Businesses</small>23</a>
<ul>
<div class="myscroll" style="max-height:300px;
 ">asses</div> 
</ul>		
</li> 
<li>
<a href="#"><i class="fa fa-lg fa-fw fa-briefcase"></i> <small class="menu-item-parent" style="padding-left:0px;">Product Categories</small>
</a>
<div class="myscroll" style="max-height:300px;
 "><ul class="">
<a href="/product-category/sca">Software, Computers & Accessories</a>
<a href="/product-category/afb">Agriculture, Food & Beverage</a>
<a href="/product-category/acg">Art, Crafts & Gallery </a>
<a href="/product-category/at">Auto & Transportation</a>
<a href="/product-category/ctjbs">Clothing, Textiles, Jewelry, Bags & shoes</a>
<a href="/product-category/eect">Electrical Equipment, Components, & Telecom</a>
<a href="/product-category/eea">Electronics & Electrical Appliances</a>
<a href="/product-category/gt">Gifts & Toys</a>
<a href="/product-category/hb">Health & Beauty</a>
<a href="/product-category/hlc">Home, Light & construction</a>
<a href="/product-category/mht">Machinery, Hardware & Tools</a>
<a href="/product-category/mcrp">Metallurgy, Chemicals, Rubber & Plastics</a>
<a href="/product-category/pao">Packaging, Advertising & Office</a>
<a href="/product-category/sa">Sports & Accessories</a>
<a href="/product-category/sff">Stationery, Furniture & Fittings</a>
</ul>
</div>				
</li>
<br>
<br>
<br>
<li>
';
echo        '<div class="customs_croll" style="max-height:100px;  " >
<div id="cart_list" > </div>
';
echo ' 
</li>
</ul>
</nav>
<span class="minifyme"> <i class="fa fa-arrow-circle-left hit" style="line-height:1.5;"></i> </span>
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
</div>
</div>
</div>
</article>

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
<input type="submit" value="Add Shop" onClick="shop_create();"class=" btn btn-primary">
</input>
</div>
</div>
</div>
</div>
';
//the modal box for user mini info when name clicked at the navigation.
echo '
<div class="modal fade" id="user_info_mini" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="row modal-body-user padding-10">
			
			</div>
		</div>
	</div>
</div>

';
//modal box for  user setting. no more used and should be erased.
echo '
<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
					Done
					</button>
				</div>
			</div>
		</div>
	</div>
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
</div>
';
}

  
function nav($user_id)
{
echo '<aside id="left-panel">
<nav style="font-size:1.1em;">
<ul>
<li class="padding-10">
<a href="/User" class="no-padding" style="margin-bottom:-10px;"> <i class="padding-5 fa fa-circle"style="color:#00d800; height:3px;"></i> <span> ',full_name($user_id),'</span></a>

</li>
 
<li class="">
<div class="padding-left-10" style="  margin-left:45px;  margin-top:-10px;">
',  get_shopnames($user_id),' </div>
 		
</li>
<li>
<a href="#"><i class="fa fa-search" style="color:#cccccc;"></i><small><i class="fa fa-plus fa-xs pull-right"></i></small> Browse Category
</a>

	 <ul class="customs_croll" >
	 <li><a href="/product-category/sca"style="font-size:1.0em;">Software, Computers & Accessories</a></li>
	 <li><a href="/product-category/afb"style="font-size:1.0em;">Agriculture, Food & Beverage</a></li>
	 <li><a href="/product-category/acg"style="font-size:1.0em;">Art, Crafts & Gallery </a></li>
	 <li><a href="/product-category/at" style="font-size:1.0em;">Auto & Transportation</a></li>
	 <li><a href="/product-category/ctjbs"style="font-size:1.0em;">Clothing, Textiles, Jewelry, Bags & shoes</a></li>
	 <li><a href="/product-category/eect" style="font-size:1.0em;">Electrical Equipment, Components, & Telecom</a></li>
	 <li><a href="/product-category/eea" style="font-size:1.0em;">Electronics & Electrical Appliances</a></li>
	 <li><a href="/product-category/gt"style="font-size:1.0em;">Gifts & Toys</a></li>
	 <li><a href="/product-category/hb"style="font-size:1.0em;">Health & Beauty</a></li>
	 <li><a href="/product-category/hlc"style="font-size:1.0em;">Home, Light & construction</a></li>
	 <li><a href="/product-category/mht"style="font-size:1.0em;">Machinery, Hardware & Tools</a></li>
	 <li><a href="/product-category/mcrp"style="font-size:1.0em;">Metallurgy, Chemicals, Rubber & Plastics</a></li>
	 <li><a href="/product-category/pao"style="font-size:1.0em;">Packaging, Advertising & Office</a></li>
	 <li><a href="/product-category/sa" style="font-size:1.0em;">Sports & Accessories</a></li>
	 <li><a href="/product-category/sff" style="font-size:1.0em;">Stationery, Furniture & Fittings</a></li>
</ul>
			
</li>
 
<li class="">
<a href="#" class=""><i class="fa fa-rss" style="color:orange;"></i>  Subscriptions </a>
 
<div class="padding-left-10" style="  margin-left:50px;  margin-top:-10px;">',  get_shop_subscribed($user_id),'</div> 
 		
</li>

</ul>
</nav>
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
</div>
</div>
</div>
</article>
';
//the modal box for user mini info when name clicked at the navigation.
echo '
<div class="modal fade" id="user_info_mini" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="row modal-body-user padding-10">
			
			</div>
		</div>
	</div>
</div>

';
}

function  get_create_shop($user_id)
{ include "conxn.php"; 
$user_id  = safe_input($_SESSION['id']);

$query = "SELECT COUNT(shop_id) FROM shop WHERE user_id ='$user_id'";

$query4user_info = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query4user_info);
$shop_count = $query_count[0];
if($shop_count == 1 || 0)
{echo ' <a href="#"><i class="fa fa-lg fa-fw fa-legal"></i> <span class="menu-item-parent" data-target="#myModal" data-toggle="modal">Create Shop</span></a>  ';}

}
function user_fullname($user_id)
{include "conxn.php";

$query = "SELECT firstName FROM registration where id = $user_id   LIMIT 10
";
if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{
$firstName = safe_input($details['firstName']);
$firstname = ucwords(strtolower($firstName));

echo ' <a href="/User" title="Menu"> <span class="menu-item-parent ">  '.$firstName.'</span></a>';

}
}
}
function fullname_only($user_id)
{include "conxn.php";

$query = "SELECT firstName FROM registration where id = $user_id   LIMIT 10
";
if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{
$firstName = safe_input($details['firstName']);
$firstname = ucwords(strtolower($firstName));

echo $firstName;

}
}
}
function username_only($user_id)
{include "conxn.php";

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
function user_details_profile($user_id)
{include "conxn.php";

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
<h1>'.$username.'
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
{include "conxn.php";
$query = "SELECT * FROM registration where id = '$user_id'   LIMIT 10
";
if($query_add = mysqli_query($link,$query))
{
while($details = mysqli_fetch_assoc($query_add))
{
$firstName = safe_input($details['firstName']);

$user_id = safe_input($details['id']);
$username = safe_input($details['username']);
$telephone = safe_input($details['telephone']);
echo '
<label class="text-info">Full Name</label>
<input class="form-control"  type="text" id="firstName_setings"  value="'.$firstName.'" /><br>
<label class="text-info">Username</label>
<input class="form-control" type="text" id="username_setings" value="'.$username.'" /><br>
<label class="text-info">Telephone</label>
<input class="form-control" type="number" id="telephone_user" value="'.$telephone.'" />
<br>
<input type="submit"  onClick="settings_user_id('.$user_id .');" class="btn btn-primary" value="Confirm">
</input> 
';

}
}
}

function settings_shop($shop_id)
{include "/include/conxn.php";
$query = "SELECT * FROM shop WHERE shop_id = '$shop_id' LIMIT 0 , 5 ";
$query4user_info = mysqli_query($link,$query);
while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$user_id = safe_input($allpalls_info['user_id']);
$shopName = safe_input($allpalls_info['shopName']);
$shopNameformat  = formatUrl($shopName); 
$telephone =$allpalls_info['telephone'];
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
<input type="submit"  onClick="settings_shop_id('.$shop_id .');" class="btn btn-primary pull-right" value="Confirm">
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
{include "conxn.php";
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
<input type="submit"  onClick="settings_product_id('.$product_id .');" class="btn btn-primary pull-right" value="Confirm">
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
{include "conxn.php";

$query = "SELECT COUNT(id) FROM reply WHERE post_id = $post_id     
";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$comment_count = $query_count[0];
echo '<span class="text-muted">'.$comment_count.'</span>';
}

function get_reply_shop($post_id)
{
include "conxn.php";

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
$query = "SELECT image_loc FROM profile_pic WHERE account_id =  $reply_user_id  ";
$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);
echo '   
   <div class="" style="padding-left:20px; ">
		<p class="text-info">Replied by Admin. <p >'.$reply.' <p class="font-xs text-info">'.humanTiming($time).' ago	</p></p>	</p>
   </div>
		 '; 
}
}
}
}
} echo ' <div id ="reply-holder-ul'.$post_id.'"</div>
<li>					
<div class="input-group wall-comment-reply no-padding "style="margin-top:-10px;">
<input id="shop_comment_text'.$post_id.'" type="text" name="yourshop" class="input form-control pull-right input-xs" placeholder="Comment here..." required />
<span class="input-group-btn">
<div class="btn-group ">

<button type="submit"  onClick="comment_shop_admin('.$post_id.');" class="btn  btn-primary btn-xs">Comment
</button></div></div>
</li>							 
		 ';
}
}

function get_reply_shop_other($post_id)
{include "conxn.php";
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

$query = "SELECT image_loc FROM profile_pic WHERE account_id =  $reply_user_id  ";
$query4profilepic = mysqli_query($link,$query);	
if(mysqli_num_rows($query4profilepic)==1)
{
while($profile_pic  = mysqli_fetch_array($query4profilepic,MYSQLI_ASSOC))
{   
$profile_image = safe_input($profile_pic['image_loc']);
echo '   
   <div class="" style="padding-left:20px; background-color:#ffffff;">
		<p class="text-info">Replied by Admin.<p>'.$reply.' <p class="font-xs text-info">'.humanTiming($time).' ago	</p></p>	</p>
   </div><hr class="no-margin">
		 '; 
}
}
}
}
} echo ' <div id ="reply-holder-ul'.$post_id.'"</div> ';
}
}
function get_reply_shop_f($post_id)
{ include "conxn.php";
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
			 <img src="/'. $profile_image.'" class="img-circle" width="50px"   alt="'.$username.'" title="'.$username.'"/>
					<a href="/connection-auth/'.$username.'" class="username" style=" padding-left:55px;">'.$firstName.'</a><p style=" padding-left:55px; margin-top:0px;">'.$reply.'</p>
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
{ include "conxn.php";

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
			 <img src="/'. $profile_image.'" class="img-circle" width="50px"   alt="'.@$username.'" title="'.@$username.'">
					<a href="/connection-auth/'.@$username.'" class="username" style=" padding-left:55px;">'.$firstName.'</a><p style=" padding-left:55px; margin-top:0px;">'.$reply.'</p>
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
{include "conxn.php";         
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
<img src="/img/avatars/mini/'. $profile_image.'"  alt="'.$username.'" title="'.$username.'" class="img-circle" width="50px">
<a href="/connection-auth/'.$username.'" class="username" style=" padding-left:55px;">'.$firstName.'</a><p style=" padding-left:55px; margin-top:0px;">'.$reply.'</p>
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
<button type="submit"  onClick="comment_profile('.$post_id.');" class="btn  btn-primary btn-xs">Comment
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
$prdt_desc = $products['descrb'];
echo '<span class=" padding-10">' .$prdt_desc.'</span> ' ;
}
}
}

function product_describtxn($product_id)
{
include "conxn.php";
$query = " SELECT descrb FROM product where product_id = $product_id LIMIT 1 ";
if($query_add = mysqli_query($link,$query))
{
$products = mysqli_fetch_assoc($query_add);
$prdt_desc = $products['descrb'];
return $prdt_desc ;
}
}


function product_details($product_id)
{ include "conxn.php";
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
$product_name = safe_input($products['name']);
$product_name_format = formatUrl($product_name);

echo '<header>
				<span class="widget-icon"> <i class="fa fa-money" style="line-height: 2.3;"></i> </span>
				<h2>GHS '.$price.'</h2>
			</header>
			<div>
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
					<div style="padding: 10px 15px;">
						<ul class="post-re-post-box-social-networks social-icons" style="margin-right:5px !important;">
							<li style="padding: 0 10px 20px 0; vertical-align:middle; text-align:center;">Share:</li>
	                       
	                            <li class="twitter"><a class="ttip" title="twitter" onClick="window.open(';
	                        echo"'https://twitter.com/re-post?url=https://mykanta.com/product_vis.php?product_id=".$product_id."&prdt_name=".$product_name_format."&amp;text=".$product_name."',
	                            'Twitter re-post','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
	                        echo'); return false;" 
	                                href="https://twitter.com/re-post?url=https://mykanta.com/product_vis.php?product_id='.$product_id.'&prdt_name='.$product_name_format.'&amp;text='.$product_name.'">
	                                <i class="fa fa-twitter"></i></a>
	                            </li>
	                           
								<li class="google"style="margin-top:-44px;" >
								<a class="ttip hidden-md hidden-lg" href="whatsapp://send?text=https://mykanta.com/product_vis.php?product_id='.$product_id.'&prdt_name='.$product_name_format.'"" data-action="re-post/whatsapp/re-post"><img src="/img/site_img/whatsapp.png" height="35" alt="whatsapp"/></a>
							</li>	
	                    </ul>
					</div>
				</div>
			</div>
			
' ;
}
}
}
function product_details_friend($product_id)
{include "conxn.php";

$product_id = safe_input($_GET['product_id']);

$query = " SELECT * FROM product where product_id = $product_id AND mode >= '1' LIMIT 1 ";
if($query_add = mysqli_query($link,$query))
{
while($products = mysqli_fetch_assoc($query_add))
{
$product_id = safe_input($products['product_id']);
$product_name1 = strtolower($products['name']);
$product_name = ucfirst($product_name1);
$shop_id = safe_input($products['shop_id']);
$prdt_desc = $products['descrb'];
//$newq = REPLACE(field, '. ', '.\r\n');

$condition = safe_input($products['condition']);
$manufacturer = safe_input($products['manufacturer']);
$min_order = safe_input($products['min_order']);
$color = safe_input($products['color']);

$queryA = " SELECT * FROM product_option where product_id = '$product_id' LIMIT 1 ";
$query_addA = mysqli_query($link,$queryA);
if( $new = mysqli_num_rows($query_addA)>= 1)
{
while($productsA = mysqli_fetch_assoc($query_addA))
{
$option_id = $productsA['id'];

if($manufacturer == "Service")
{
 echo '<header style="">
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
						<div class="panel-heading ">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion-f" href="#collapseOne-1" class="" style="font-size: 1.2em;" >
									Service Description 
								</a>
							</h4>
						</div>
						<div id="collapseOne-1" class="padding-10">
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
echo '<header style="">
		<span class="" style="font-size:2.0em; "> '.$product_name.'</span>
		<p class="hidden"><i class="fa fa-phone" style="color:green"></i> ',shop_tel_number_from_name($shop_id),' <em class="text-muted font-xs">Call Now</em></p><hr class="no-padding no-margin">
		</header>
		
		<div class="row margin-5 padding-5 " >',product_option_full($shop_id,$product_id),'</div>
			
		<hr class="no-padding no-margin">
		<p class="" style="font-size:1.5em; width:100%;">Details </p>
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
							<div class="panel-body">
							'.$prdt_desc.'
							<strong><em class="text-muted font-xs">	Mykanta Product and Service Price Disclaimer!</em></strong><br>
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
else
{
echo '<header style="line-height: 33px;">
			<ul class="list-inline no-padding no-margin ">	
			<span class="text-info" style="font-size:2.2em; padding-left:10px;"> '.$product_name.'</span>
				';
				/*echo '<li class="pull-right" id="cart_box">';echo add_to_cart_verify_check($shop_id,$option_id); echo'</li> */
				
				echo '
				
			</ul>
		</header>
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
							<div class="text ">
								'.$prdt_desc.'
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>' ;
}
}
}
}



function get_product_ur_friend_shop($shop_id)
{
include "conxn.php";
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
$bus_type = ucfirst($thisShop['bus_type']);
$thisShopName = ucfirst($thisShop['shopName']);
$shopNameformat= formatUrl($thisShopName); 
}

$querym = mysqli_query($link,$query);

if($query_add = mysqli_num_rows($querym))
{
while($products = mysqli_fetch_assoc($querym))
{
$product_id = safe_input($products['product_id']);
$prdt_name1 = strtolower($products['name']);
$prdt_name = safe_input($products['name']);
$prduct_name_short = substr($prdt_name, 0, 16). '..';
$prdt_namel = strtolower($prduct_name_short);
$prdt_name_ok = ucwords($prdt_namel);
$prdt_desc = $products['descrb'];
$shop_id = safe_input($products['shop_id']);
$price1 = $products['price'];
$prdt_name_format = formatUrl($prdt_name1);
$image_loc = $products['image_loc'];
$prdt = $products['name'];

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
if($bus_type == "Service")
{
 echo '
<li  class=" margin-10 padding-10" style="width:100%; ">
	<div class="row"  style="">
	 <div class="col-sm-3">
			<img src="/img/products_images/mini/'.$image_loc.'"  alt="'.$prdt_name1.'" title="'.$prdt_name1.'" style="width:auto; height:auto; position:relative;" />
	 </div>
     <div class="col-sm-9">
	 <h4><em class=""><a class=" " style="font-size:1.0em; color:black; " title="'.$prdt_name1.'" href="/product-link/'.$shopNameformat.'/'. $product_id .'/'.$prdt_name_format.'">'.$prdt_name_ok.'</a></em></h4>
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
	<img src="/img/products_images/mini/'.$image_loc.'"  style="width:auto; height:auto; position:relative;" onClick="Load_product_content_on_modal('. $product_id .');" alt="'.$prdt_name1.'" title="'.$prdt_name1.'" /></center>
<a class=" " style="font-size:1.0em; color:black; " title="'.$prdt_name1.'" href="/product-link/'.$shopNameformat.'/'. $product_id .'/'.$prdt_name_format.'">'.$prdt_name_ok.'</a>
<div class="row" style="">
<input type="hidden" id="product_id" value="'. $product_id .'" />
<div class=" col-xs-12 " align="">
',product_option($shop_id,$product_id),' <a class="text-info pull-right" href="/product-link/'.$shopNameformat.'/'. $product_id .'/'.$prdt_name_format.'">view page</a>
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


function get_product_pic($product_id)
{include "conxn.php";

$query = "SELECT * FROM product where product_id = $product_id LIMIT 30 ";
if($query_add = mysqli_query($link,$query))
{
while($products = mysqli_fetch_assoc($query_add))
{
$image_loc = safe_input($products['image_loc']); 
echo
'<img src="/img/products_images/'.$image_loc.'" width="100%" alt="'.$image_loc.'" title="'.$image_loc.'"  class="img-rounded padding-10">';
}
}
}

function get_product_pic_class($product_id)
{include "conxn.php";
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
{include "conxn.php";
$query11 = " SELECT * FROM product where product_id = $product_id LIMIT 1 ";
if($query_add11 = mysqli_query($link,$query11))
{
while($products11 = mysqli_fetch_assoc($query_add11))
{
$image_loc11 = safe_input($products11['image_loc']);
echo '<li class=" no-padding image7" ><img src="/img/products_images/mini/'.$image_loc11.'"  onclick="display_product(\'' . $image_loc11 . '\');" class="img" id="im" alt="'.$image_loc11.'" title="'.$image_loc11.'"  style="height:50px; width:50px;"/><input id="gifimage7" value="'.$image_loc11.'" class="hidden"/></li>';
}
}

$query = " SELECT * FROM product_image_4 where product_id = $product_id LIMIT 7 ";
if($query_add = mysqli_query($link,$query))
{
$query_num = mysqli_num_rows($query_add);

for( $i = 0; $i < $query_num; $i++)
{
while($products = mysqli_fetch_assoc($query_add))
{
$image_loc = safe_input($products['image_loc']); 
$id = safe_input($products['id']); 

echo '<li class="no-padding image" ><img src="/img/products_images/mini/'.$image_loc.'"  onclick="display_product(\'' . $image_loc . '\');" class="img" id="im" style="height:50px; width:50px;" alt="'.$image_loc.'" title="'.$image_loc.'" /><input id="gifimage'.$i++.'" value="'.$image_loc.'" class="hidden"/></li>';
}}
}
else {
echo " no image";
}
}

function get_product_array_4($product_id)
{include "conxn.php";
$itemb=array();
$query11 = " SELECT * FROM product where product_id = $product_id LIMIT 1 ";
if($query_add = mysqli_query($link,$query11))
{
while($products = mysqli_fetch_assoc($query_add))
{
$image_loc = $products['image_loc']; 

  //$item=array( $image_loc );
		    // console.log(check_friend($id,$id_of_token));
		 array_push($itemb, $image_loc);
        
}   // echo json_encode($itemb); 
}

$query = " SELECT * FROM product_image_4 where product_id = $product_id LIMIT 7 ";
if($query_add = mysqli_query($link,$query))
{
while($products = mysqli_fetch_assoc($query_add))
{
$image_loc = $products['image_loc']; 

  //$item=array( $image_loc );
		    // console.log(check_friend($id,$id_of_token));
		 array_push($itemb, $image_loc);
        
}    echo json_encode($itemb); 
}
else {
echo " no image";
}
}

function gallery_user($user_id)
{
include "conxn.php";

$query = "SELECT * FROM account_comment WHERE owner_id = '$user_id' AND  account_id = '$user_id'  ORDER BY id DESC ";

$query_add = mysqli_query($link,$query);
if($query_galleryUser = mysqli_num_rows($query_add)> 0)
{
echo '<input type="hidden" id="userNum" value="'.$query_galleryUser.'" />
<script> var userNom = $("#userNum").val();
document.getElementById("galleryUser").innerHTML = userNom; 
</script>';

while($products = mysqli_fetch_assoc($query_add))
{
$image_loc = safe_input($products['image_loc']); 
$id = safe_input($products['id']);
$comm1 = $products['comment']; 
$myfile_total = $products['myfile_total']; 
 $comment_box_reev = substr($comm1, 0, 65).'...';
$query = "SELECT COUNT(id) FROM reply WHERE post_id = '$id'  AND post_user_id = '0'    
";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$comment_count = $query_count[0];

if( $comment_count == 0 )
{ $com_count = '';
}
else
{ $com_count = '<b class="btn btn-xs btn-danger " style="border-radius:14px; margin-bottom:-10px; margin-right:-15px; position:absolute;">'.$comment_count.'</b>';
}
if(( $myfile_total >= 1 ))
{ echo
'<div class="superbox-list" id="superbox_list'.$id.'" style="width:auto;">
             <small id="collxn'.$id.'"> '. $com_count.'</small>
			<img src="/img/comments_images/mini/'.$image_loc.'.jpg"   onclick="post_colloxn_each('.$id.');"  alt="'.$image_loc.'" title="'.$image_loc.'"  class="img img-rounded"  id="posidid'.$id.'" value="'.$id.'"  style="  height:100px; width:auto;"/><input type="hidden" value="" id="spbox'.$id.'"></input>
		</div>
		<div class="superbox-show no-padding" id="super_box'.$id.'" style="height:auto; color:white; display: none"><div id="collxn_box'.$id.'" style=""></div>	</div>
';
}
else
{ 
echo
'<div class="superbox-list well well-light" id="superbox_list'.$id.' " style="vertical-align:top; height:110px; width:100px;" onclick="post_colloxn_each('.$id.');" ><small id="collxn'.$id.'"> '. $com_count.'</small>
            <span  class=" font-xs"  id="posidid'.$id.'"  style=""> '.$comment_box_reev.'</span>
			<input type="hidden" value="" id="spbox'.$id.'"></input>
		</div>
		<div class="superbox-show no-padding" id="super_box'.$id.'" style="height:auto; color:white; display: none"><div id="collxn_box'.$id.'" style=""></div></div>
';
}
 }
}
else echo '<center style="" >
<p class="headline " style="color:black; font-size:1.5em;"> No Reev yet.
</p>
 <a id="upload_modal_btn" href="javascript:void(0);" data-target="#upload_modal" data-toggle="modal" class="btn btn-default " rel="tooltip"  title="Create from images"> <i class="fa fa-camera"></i> Create your First Reev </a>
</center>';

}

function gallery_user_friend($friend_id)
{include "conxn.php";
$query = "SELECT * FROM account_comment WHERE owner_id ='$friend_id' AND  account_id = '$friend_id'  ORDER BY id DESC ";

$query_add = mysqli_query($link,$query);
if($query_galleryFriend = mysqli_num_rows($query_add))
{
	echo '<input type="hidden" id="friendNum" value="'.$query_galleryFriend.'" />
	<script> var friendNom = $("#friendNum").val();
	document.getElementById("galleryFriend").innerHTML = friendNom; 
	</script>';

	while($products = mysqli_fetch_assoc($query_add))
		{
		$image_loc = safe_input($products['image_loc']);
		$id = safe_input($products['id']);
		$comm3 = $products['comment']; 
			$myfile_total = $products['myfile_total'];
		 $comment_box_reev = substr($comm3, 0, 55).'...';
		$query = "SELECT COUNT(id) FROM reply WHERE post_id = '$id'";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$comment_count = $query_count[0];

if( $comment_count == 0 )
{ $com_count = '';
}
else
{ $com_count = '<b class="btn btn-xs btn-default pull-right" style="border-radius:14px; margin-bottom:-10px; margin-right:-5px; position:absolute;">'.$comment_count.'</b>';
}

if(( $myfile_total >= 1 )){ echo
'<div class="superbox-list" id="superbox-list'.$id.'" style=" width:auto;">
          
			<img src="/img/comments_images/mini/'.$image_loc.'.jpg"   onclick="post_colloxn_each_friend('.$id.');"  alt="'.$image_loc.'" title="'.$image_loc.'" class="img img-rounded"  id="posidid'.$id.'" value="'.$id.'"  style="  height:100px; width:auto;"/><input type="hidden" value="" id="spbox'.$id.'"></input>
		</div>
		<div class="superbox-show no-padding" id="super_box'.$id.'" style="height:auto; color:white; display: none"><div id="collxn_box'.$id.'" style=""></div>	</div>
';
}
else 
{ 
echo
'<div class="superbox-list well well-light no-padding" id="superbox-list'.$id.' " style="vertical-align:top; height:100px; width:100px;" onclick="post_colloxn_each_friend('.$id.');" >
            <span  class=" font-xs"  id="posidid'.$id.'"  style="">'.$comment_box_reev.'</span>
			<input type="hidden" value="" id="spbox'.$id.'"></input>
		</div>
		<div class="superbox-show no-padding" id="super_box'.$id.'" style="height:auto; color:white; display: none"><div id="collxn_box'.$id.'" style=""></div></div>
';
}
		 }
	
}
else 
	{
	echo '<center style="" >
<p class="headline " style="color:black; font-size:1.5em;"> No Reev yet.
</p>

</center>';
	}
}

function gallery_shop($shop_id)
{include "conxn.php";

$query = " SELECT * FROM `shop_comment` WHERE `image_loc` != 'NULL' && `shop_id` =$shop_id ORDER BY id ASC ";
$query_add = mysqli_query($link,$query);

if($query_galleryShop = mysqli_num_rows($query_add)>0)
{
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
<img class="img-thumbnail" src="/img/shop_comments_images/'.$image_loc.'"  alt="image" title="image" style="height:70px;" alt=""/></a></li>	';	 }
}
else {
echo '<center style="" >
<p class="headline " style="color:black; font-size:1.5em;">View all your images associated with your latest news here.</p>

</center>';
}
}

function get_product_ur_shop($shop_id)
{
include "conxn.php";
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
$bus_type = ucfirst($thisShop['bus_type']);
$thisShopName = $thisShop['shopName'];
$shopNameformat= strtolower(formatUrl($thisShopName)); 

$queryp = "SELECT COUNT(product_id) FROM product WHERE shop_id = '$shop_id' AND mode >= 1";
$query_data = mysqli_query($link,$queryp);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];

if($bus_type == "Service")
{
//to display add new product
echo '
<h3 class="alert alert-info">'.$view_count.' Services <a class="" title="Add" href="/user/add-service/'.$shopNameformat.'" style="font-size:0.7em;"> Add a New Service </a></h3>
';
}
else
{
//to display add new product
echo '

<h3 class="alert alert-info">'.$view_count.' Products <a class="" title="Add" href="/user/add-product/'.$shopNameformat.'" style="font-size:0.7em;"> Add a New Product</a></h3>
';
}

$querym = mysqli_query($link,$query);
if($query_add = mysqli_num_rows($querym))
{
while($products = mysqli_fetch_assoc($querym))
{
	$product_id = safe_input($products['product_id']);
	$prdt_name1 = strtolower($products['name']);
	$prdt_name = safe_input($products['name']);
	$prdt = $products['name'];
	$prduct_name_short = substr($prdt_name, 0, 16). '..';
	$prdt_namel = strtolower($prduct_name_short);
	$prdt_name_ok = ucwords($prdt_namel);
	$prdt_desc = $products['descrb'];
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






if($bus_type == "Service")
{
echo '
<li  class=" margin-10 padding-10" style="width:100%; ">
	<div class="row"  style="">
	 <div class="col-sm-3">
			<img src="/img/products_images/mini/'.$image_loc.'"   alt="'.$prdt_name1.'" title="'.$prdt_name1.'" style="width:auto; height:auto; position:relative;"/>
	 </div>
     <div class="col-sm-9">
	 <h4><em class=""><a class=" " style="font-size:1.0em; color:black; " title="'.$prdt_name1.'" href="/product-link/'.$shopNameformat.'/'. $product_id .'/'.$prdt_name_format.'">'.$prdt_name_ok.'</a></em></h4>
	 <p>'.$prdt_desc.'</p>
     </div>
  </div>
</li>
<hr style="color:black;">

';
}
else
{
echo '
<li  class=" margin-10 padding-10" style="color:#5bc0de; width:170px; ">
<div  style="">
	<center style=" width:150px; ">
	<img src="/img/products_images/mini/'.$image_loc.'" onClick="Load_product_content_on_modal('. $product_id .');"  style="width:auto; height:auto; position:relative;"  alt="'.$prdt_name1.'" title="'.$prdt_name1.'"/></center>
<a class=" " style="font-size:1.0em; color:black; " title="'.$prdt_name1.'" href="/product-link/'.$shopNameformat.'/'. $product_id .'/'.$prdt_name_format.'">'.$prdt_name_ok.'</a>
<div class="row" style="">
<input type="hidden" id="product_id" value="'. $product_id .'" />
<div class=" col-xs-12 " align="">
',product_option($shop_id,$product_id),' <a class="text-info pull-right" href="/product-link/'.$shopNameformat.'/'. $product_id .'/'.$prdt_name_format.'">view page</a>
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
 echo '<center style="" >
<p class="headline " style="color:black; font-size:1.8em;">Welcome to mykanta business page.</p>
<p style="">
Start by adding products or services to your page. </p>
Or
<p style="">Post your latest news.</p>
</p>
</center>';
}
}
}
function get_product_ur_shop_on_product_page($shop_id)
{
include "conxn.php";
	$ver_num = verification_status_decision($shop_id);
	if($ver_num >= 1)
	{
		$query = " SELECT * FROM product where shop_id = '$shop_id' AND mode >= '1' LIMIT 50 ";
	}
	else{
		$query = " SELECT * FROM product where shop_id = '$shop_id' AND mode >= '1' LIMIT 20 ";
	}

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
$prdt_namel = strtolower($prdt);
$prdt_name_ok = ucwords($prdt_namel);
$prdt_desc = $products['descrb'];
$shop_id = safe_input($products['shop_id']);
$price1 = $products['price'];
$prdt_name_format = formatUrl($prdt_namel);
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
<li  class=" no-margin" style="width:120px; ">
<div class="no-padding no-margin" style="">
	<span style=" width:100px; " class="no-padding no-margin">
	<img src="/img/products_images/mini/'.$image_loc.'"  style="max-width:100px; max-height:150px; position:relative;" onClick="Load_product_content_on_modal('. $product_id .');" alt="'.$prdt_name1.'" title="'.$prdt_name1.'"/></span><p>
<a class=" " style="font-size:0.8em; color:black; " title="'.$prdt_name1.'" href="/product-link/'.$shopNameformat.'/'. $product_id .'/'.$prdt_name_format.'">'.$prdt_name_ok.'</a></p>
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

function get_product_name($product_id)
{
include "conxn.php";
$query1 = " SELECT * FROM product where product_id = $product_id LIMIT 30 ";
$query_add1 = mysqli_query($link,$query1);
while($thisProduct = mysqli_fetch_assoc($query_add1))
{
$thisProductName = safe_input($thisProduct['name']);
echo $thisProductName;
}
}
function product_info($product_id)
{
include "conxn.php";
$product_id = safe_input($_GET['product_id']);
$query = " SELECT * FROM product where product_id = '$product_id' LIMIT 1 ";
if($query_add = mysqli_query($link,$query))
{
while($products = mysqli_fetch_assoc($query_add))
{
$product_id = safe_input($products['product_id']);
$product_name1 = strtolower($products['name']);
$product_formatUrl = formatUrl($products['name']);
$product_name = ucfirst($product_name1);
$shop_id = safe_input($products['shop_id']);
$condition = safe_input($products['condition']);
$manufacturer = safe_input($products['manufacturer']);
$min_order = safe_input($products['min_order']);
$prdt_desc = $products['descrb'];
$color = safe_input($products['color']);
$queryA = " SELECT * FROM product_option where product_id = '$product_id' LIMIT 1 ";
$query_addA = mysqli_query($link,$queryA);


if( $new = mysqli_num_rows($query_addA)>= 1)
{
while($productsA = mysqli_fetch_assoc($query_addA))
{
$option_id = $productsA['id'];
if($manufacturer == "Service")
{

echo '<header style="">
			<li class="btn-group" style="margin-top:-15px;">
			<a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><i class="fa fa-lg fa-fw fa-gear"></i>Settings</a>
			<ul class="dropdown-menu text-left">
			
			<li>
			<a href="/edit-service/'. $_GET['shopName'].'/'. $product_id.'/'. formatUrl($product_name).'" class="text-danger">Edit Service Info</a>
			</li><li>', product_unavailble($product_id),'
			</li>
			</ul>
		</li><span class="" style="padding-bottom:-20px;font-size:1.8em;"> '.$product_name.'</span>
		</header>
	    <div>
		<hr class="no-padding no-margin">
		<div class="no-padding">
				<div class="smart-accordion-default no-padding" id="accordion-f">
					<div class="no-padding">
						<div class="panel-heading no-padding">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion-f" href="#collapseOne-1" class="" style="font-size: 1.2em;" >
									Service Description 
								</a>
							</h4>
						</div>
						<div id="collapseOne-1" class=" ">
							<div class="panel-body">
								'.$prdt_desc.'
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			
			<hr class="no-padding no-margin">
	<div class="row" style="padding-left:5px;">		
				<p class="padding-5" style="font-size: 1.4em;" id="cart_box">Delivery Options</p>',delivery_options_at_prdt_page($shop_id),'
				
		</div>	
		
' ;
}
else
{
echo '<header style="">
		
				<li class="btn-group" style="margin-top:-15px;">
			<a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><i class="fa fa-lg fa-fw fa-gear"></i>Settings</a>
			<ul class="dropdown-menu text-left">
			
			<li>
			<a href="/edit-product/'.$_GET['shopName'].'/'. $product_id.'/'. formatUrl($product_name).'" class="text-danger">Edit Product Info</a>
			</li><li>', product_unavailble($product_id),'
			</li>
			</ul>
		</li><span class="text-default " style="font-size:2.0em;"> '.$product_name.'</span>
		</header>
	<hr class="no-padding no-margin">
						<div class="row padding-10">',product_option_info($shop_id,$product_id),'</div>
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
				<p class="padding-5" style="font-size: 1.4em;" id="cart_box">Delivery Options</p>',delivery_options_at_prdt_page($shop_id),'
				
		</div>	
		
' ;
}
}
}
else
{
echo '<header style="line-height: 33px;">
			<ul class="list-inline no-padding no-margin ">	
			<span class="text-info" style="font-size:2.2em; padding-left:10px;"> '.$product_name.'</span>
				';
				/*echo '<li class="pull-right" id="cart_box">';echo add_to_cart_verify_check($shop_id,$option_id); echo'</li> */
				
				echo '
				
			</ul>
		</header>
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
			<!-- end widget content --></div>
			
' ;
}
}
}
}

function get_product_info_mpower($account_id)
{ $query = " SELECT * FROM cart_vis where account_id = $account_id LIMIT 10 ";
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
function wishlist_check($product_id)
{include "conxn.php";
 $user_id = $_SESSION['id'];
$queryA = " SELECT id FROM wishlist where user_id = '$user_id' AND product_id = '$product_id' LIMIT 1 ";

$query_Am = mysqli_query($link,$queryA);

if(mysqli_num_rows($query_Am) >= 1)
{
while($products = mysqli_fetch_assoc($query_Am))
{
  echo   '<p class="text-success "> Added to wishlist </p>';

}
}
else {echo  '<span> <a href="javascript:void(0);" onCLick="add_to_wishlist_function('.$product_id.');"class="text-warning ">Add to Wishlist</a></span>';}
}
function get_cart($user_id)
{include "conxn.php";
$query = " SELECT * FROM cart_vis where account_id = $user_id ORDER BY cart_id DESC LIMIT 10  ";
$query1 = mysqli_query($link,$query);
if($query_add = mysqli_num_rows($query1))
{	echo '<ul class="list-inline">';	
while($products = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
{
$product_id = safe_input($products['product_id']);
$cart_id = safe_input($products['cart_id']);
$prdt_name = safe_input($products['name']);
$prduct_name_short = substr($prdt_name, 0, 20). '..';

$price = safe_input($products['price']);
$account_id_ofusercart = safe_input($products['account_id']);
$stock = safe_input($products['stock']); 		  
echo '   
<li><small>
<table border="0" style="background-color:white; " width="100%" cellpadding="0" cellspacing="0">
<tr>
<td height="25" width="100%">
<span class="text-muted">'.$prduct_name_short.'</span>
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
echo '</ul>
<div id="check_out">
<a href="/include/clear_cart.php?id='.$account_id_ofusercart.'">  <button class="btn btn-primary btn-xs" > Clear Cart</button></a></div>
'; 
}
}

function get_cart_list($account_id)
{
//Check the databse products_added's table and sum up the total of all added items to cart
$cart_itemsTotal = mysqli_query($link,"select sum(price) as `items_total` from `cart_vis
` where `account_id` = '".$account_id."'");		
//Get all these items
$vpb_get_itemsTotal = mysqli_fetch_array($cart_itemsTotal);
$groundtotal = ($vpb_get_itemsTotal["items_total"]); //Get total of all added items		
$_SESSION['total'] =$groundtotal;

$query = " SELECT * FROM cart_vis where account_id = $account_id LIMIT 10 ";

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
include "conxn.php";
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


$max =50;	
$all_friends = array();
$sql = "SELECT account_id FROM friends WHERE friend_id='$thisUser' AND value='1' ORDER BY id";
$query = mysqli_query($link,$sql);

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
$new =  safe_input($row["account_id"]);
array_push($all_friends,$new);
}
$sql = "SELECT friend_id FROM friends WHERE account_id='$thisUser' AND value='1' ORDER BY id ";
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
FROM friends WHERE value = 1 AND friend_id IN $range  OR account_id IN $range /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 7";  
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
echo '<div class="padding-10" style="">
<ul class="no-padding no-margin" style="">';
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
$datetime = date("M d", $datetime);
$datetimearray = explode(' ', $datetime);
$datetimemonth = $datetimearray[0];
$datetimeday = $datetimearray[1];
//echo $post_id.'-'.$comment.'-'.$image_loc.'-'.$shop_id.'-'.$account_id.'-'.$product_id.'-'.$friend_id.'-'.$user_id.'-'.$owner_id.'-'.$datetime.'<br>';
/*
if($shop_id == 'COMM')
{
	echo '
			<ul>
				<li class="list-inline font-xs" style="margin-bottom:-10px; padding-left:0px; margin-left:-34px;">changed his/her Profile Status
				</li>
				<li class="message">
					<!--', get_status_pic_of_sender($owner_id), '-->
					', get_status_name($owner_id), ' 
					<p style="padding-left:10px;">'. $comment.'
					</p>
				</li>
				<li class="message" style="margin-top:-17px;margin-bottom:10px;padding-left:10px;">
					<ul class="list-inline font-xs " >
						<li class="text-primary">
							'.$datetime.'
						</li>
					</ul>	
				</li>	
			</ul>
			<span class="timeline-seperator text-center"></span>					
		';

} */

if($comment == 'shoplike')
{
	echo '<div class="row no-margin">
			<div class="col-xs-2 col-sm-1">
				<time datetime="2014-09-20" class="icon">
					<strong>'.$datetimemonth.'</strong>
					<span>'.$datetimeday.'</span>
				</time>
			</div>
			<div class="col-xs-10 col-sm-11">
				<p class="" style="margin:15px 0;">', get_status_name($shop_id),'<small> liked </small>', get_shopname($user_id),'</p>
				<p></p>
			</div>
			<div class="col-sm-12"><hr style="margin:12px 0"></div>
			<div>';
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
					<!--', get_status_pic_of_sender($product_id), ' -->
					', get_status_name($product_id),'
					liked
					<li class="" style="height:50px; padding-bottom:0px; padding-left:220px; margin-top:-20px; list-style:none;"  >
						<div class="well no-margin" style="height:47px; width:250px; padding:5px;">
							<table border="0" width="100%" cellpadding="0" cellspacing="0" align="right">
								<tr>
									<td height="25" width="55">
										<img src="/'. $image_loc.'" class="edit-record img-rounded"  
										onClick="Load_Contents_From_DB_by_Vasplus_Blog('.$product_id .');"style="height:35px; width:35px;" alt="'.$name.'" title="'.$name.'"/>
									</td>
									<td align="left">
										<input type="hidden" id="product_id" value="'. $product_id .'" /> 
										<small class="text-muted"><a href="/product-link/'.$shopName.'/'. $product_id .'/'.$prdt_name_format.'">'.$name.'</a></small><br>
										<small class="text-warning">GHS '.$price.'</small>
									</td>
								</tr>
							</table>
						</div>
					</li>
				</li>
				<li class="message" style="margin-top:-10px;margin-bottom:-5px;padding-left:10px;">
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
	echo '<div class="row no-margin">
			<div class="col-xs-12 col-sm-12">
				<p class="" style="">', get_status_name($user_id),'<small> subscribed to </small>', get_shopname($shop_id),' <small class="pull-right text-info"> '.$datetimemonth.'
					 '.$datetimeday.'</small></p>
				<p></p>
			</div>
			<div class="col-sm-12"><hr style="margin:12px;"></div>
			</div>';
}

else if($comment == 'newfriend')
{
	echo '<div class="row no-margin">
			
			<div class="col-xs-12 col-sm-12">
				<p class="" style="">', get_status_name($account_id),'<small> is now in connection with </small>', get_status_name($friend_id),'  <small class="pull-right text-info"> '.$datetimemonth.'
					 '.$datetimeday.'</small></p>
				<p></p>
			</div>
			<div class="col-sm-12"><hr style="margin:12px;"></div>
			</div>';
}
}
echo '</ul></div>';
}
/*}
else echo '<strong class="text-primary" style="margin-left:20px;">You have NO Friends Yet</strong>'; */
}
else echo '<strong class="text-primary" style="margin-left:20px;">You have no friend activity Yet</strong>';
}

function get_friend_profile_notify_friend($friend_id)
{

include "conxn.php";
$thisUser = $friend_id;
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
$datetime_user = $whilelogout['last_datetime'];

if( $datetime_user < 1 )
{
	echo  $lastOut = "2022-01-01 08:11:55";
}else{
echo 	 $lastOut = $datetime_user ;
}


$max =3;	
$all_friends = array();
$friendArrayCount = '1';
if($friendArrayCount > 0)
{

//select friend status
$sql = "SELECT id, comment, image_loc, owner_id, account_id, 'COMM' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, 'EMPTY' AS friend_id, commentDate 
FROM account_comment WHERE owner_id = account_id AND owner_id = '$thisUser' /*AND datetime > '$lastOut'*/ order by commentDate desc LIMIT 5";
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
FROM likes WHERE shop_id = $thisUser /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
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
FROM likes_products WHERE product_id = $thisUser /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
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
FROM subscribers WHERE user_id = $thisUser /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
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
FROM friends WHERE value = '1' AND friend_id = '$thisUser' OR account_id = '$thisUser' AND  value = '1' /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
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
echo '<strong class="text-primary" style="margin-left:10px;">No new Activity from Connections</strong>';
}

else
{
//merge the arrays
$result = array_merge($array1, $array2, $array3, $array4, $array5);
//sort the merged array according to date which is record [2] of each inner array
function compare_datetime_t($a, $b) 
{ 
return strcmp($a['9'], $b['9']); 
} 
// sort 
usort($result, 'compare_datetime_t');

//reverse the sorted array to descending order
$reversed = array_reverse($result);
echo '<div class="no-padding  no-margin" style="margin-right:-50px;">
<ul class="no-padding no-margin" style="">';
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
$datetime = date("M d", $datetime);
$datetimearray = explode(' ', $datetime);
$datetimemonth = $datetimearray[0];
$datetimeday = $datetimearray[1];

if($comment == 'shoplike')
{
	echo '<div class="row no-margin no-padding">
			<div class="col-xs-12 col-sm-12">
				<p class="" style="margin:15px 0;">', get_status_name($shop_id),'<small> liked </small>', get_shopname($user_id),'</p>
				<p></p>
			</div>
			<div class="col-sm-12"><hr style="margin:12px;"></div>
			<div>';
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
					<!--', get_status_pic_of_sender($product_id), ' -->
					', get_status_name($product_id),'
					liked
					<li class="" style="height:50px; padding-bottom:0px; padding-left:220px; margin-top:-20px; list-style:none;"  >
						<div class="well no-margin" style="height:47px; width:250px; padding:5px;">
							<table border="0" width="100%" cellpadding="0" cellspacing="0" align="right">
								<tr>
									<td height="25" width="55">
										<img src="/'. $image_loc.'" class="edit-record img-rounded"  
										onClick="Load_Contents_From_DB_by_Vasplus_Blog('.$product_id .');"style="height:35px; width:35px;" alt="'.$name.'" title="'.$name.'"/>
									</td>
									<td align="left">
										<input type="hidden" id="product_id" value="'. $product_id .'" /> 
										<small class="text-muted"><a href="/product-link/'.$shopName.'/'. $product_id .'/'.$prdt_name_format.'">'.$name.'</a></small><br>
										<small class="text-warning">GHS '.$price.'</small>
									</td>
								</tr>
							</table>
						</div>
					</li>
				</li>
				<li class="message" style="margin-top:-10px;margin-bottom:-5px;padding-left:10px;">
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
	echo '<div class="row no-padding no-margin">
			<div class="col-xs-12 col-sm-12">
				<p class="" style=""><strong >', get_status_name($user_id),'</strong><span class="font-sm text-muted"> subscribed to </span><strong >', get_shopname($shop_id),'</strong > <small class="pull-right text-muted"> '.$datetimemonth.'
					 '.$datetimeday.'</small></p>
				<p></p>
			</div>
			<div class="col-sm-12"><hr style="margin:12px;"></div>
			</div>';
}
else if($comment == 'newfriend')
{
	echo '<div class="row no-padding no-margin">
			
			<div class="col-xs-12 col-sm-12">
				<p class="" style=""><strong >', get_status_name($account_id),'</strong> <span class="font-sm text-muted"> is in connection with </span><strong >', get_status_name($friend_id),'</strong>  <small class="pull-right text-muted"> '.$datetimemonth.'
					 '.$datetimeday.'</small></p>
				<p></p>
			</div>
			<div class="col-sm-12"><hr style="margin:12px;"></div>
			</div>';
}
}
echo '</ul></div>';
}
/*}
else echo '<strong class="text-primary" style="margin-left:20px;">You have NO Friends Yet</strong>'; */
}
else echo '<strong class="text-primary" style="margin-left:20px;">You have no friend activity Yet</strong>';
}
}
function get_friend_profile_notify_friend_req($friend_id)
{

include "conxn.php";
$thisUser = $friend_id;
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

$max =3;	
$all_friends = array();
$friendArrayCount = '1';
if($friendArrayCount > 0)
{

//select friend status
$sql = "SELECT id, comment, image_loc, owner_id, account_id, 'COMM' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, 'EMPTY' AS friend_id, commentDate 
FROM account_comment WHERE owner_id = account_id AND owner_id = '$thisUser' /*AND datetime > '$lastOut'*/ order by commentDate desc LIMIT 5";
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
FROM likes WHERE shop_id = $thisUser /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
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
FROM likes_products WHERE product_id = $thisUser /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
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
FROM subscribers WHERE user_id = $thisUser /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
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
FROM friends WHERE value = '1' AND friend_id = '$thisUser' OR account_id = '$thisUser' AND  value = '1' /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
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
echo '<strong class="text-primary" style="margin-left:10px;">No new Activity from Connections</strong>';
}

else
{
//merge the arrays
$result = array_merge($array1, $array2, $array3, $array4, $array5);
//sort the merged array according to date which is record [2] of each inner array
function compare_datetime_t1($a, $b) 
{ 
return strcmp($a['9'], $b['9']); 
} 
// sort 
usort($result, 'compare_datetime_t1');

//reverse the sorted array to descending order
$reversed = array_reverse($result);
echo '<div class="no-padding  no-margin" style="margin-right:-50px;">
<ul class="no-padding no-margin" style="">';
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
$datetime = date("M d", $datetime);
$datetimearray = explode(' ', $datetime);
$datetimemonth = $datetimearray[0];
$datetimeday = $datetimearray[1];

if($comment == 'shoplike')
{
	echo '<div class="row no-margin no-padding">
			<div class="col-xs-12 col-sm-12">
				<p class="" style="margin:15px 0;">', get_status_name($shop_id),'<small> liked </small>', get_shopname($user_id),'</p>
				<p></p>
			</div>
			<div class="col-sm-12"><hr style="margin:12px;"></div>
			<div>';
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
					<!--', get_status_pic_of_sender($product_id), ' -->
					', get_status_name($product_id),'
					liked
					<li class="" style="height:50px; padding-bottom:0px; padding-left:220px; margin-top:-20px; list-style:none;"  >
						<div class="well no-margin" style="height:47px; width:250px; padding:5px;">
							<table border="0" width="100%" cellpadding="0" cellspacing="0" align="right">
								<tr>
									<td height="25" width="55">
										<img src="/'. $image_loc.'" class="edit-record img-rounded"  
										onClick="Load_Contents_From_DB_by_Vasplus_Blog('.$product_id .');"style="height:35px; width:35px;" alt="'.$name.'" title="'.$name.'"/>
									</td>
									<td align="left">
										<input type="hidden" id="product_id" value="'. $product_id .'" /> 
										<small class="text-muted"><a href="/product-link/'.$shopName.'/'. $product_id .'/'.$prdt_name_format.'">'.$name.'</a></small><br>
										<small class="text-warning">GHS '.$price.'</small>
									</td>
								</tr>
							</table>
						</div>
					</li>
				</li>
				<li class="message" style="margin-top:-10px;margin-bottom:-5px;padding-left:10px;">
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
	echo '<div class="row no-padding no-margin">
			<div class="col-xs-12 col-sm-12">
				<p class="" style="">', get_status_name($user_id),'<small> subscribed to </small>', get_shopname($shop_id),' <small class="pull-right text-info"> '.$datetimemonth.'
					 '.$datetimeday.'</small></p>
				<p></p>
			</div>
			<div class="col-sm-12"><hr style="margin:12px;"></div>
			</div>';
}
else if($comment == 'newfriend')
{
	echo '<div class="row no-padding no-margin">
			
			<div class="col-xs-12 col-sm-12">
				<p class="" style="">', get_status_name($account_id),'<small> is now in connection with </small>', get_status_name($friend_id),'  <small class="pull-right text-info"> '.$datetimemonth.'
					 '.$datetimeday.'</small></p>
				<p></p>
			</div>
			<div class="col-sm-12"><hr style="margin:12px;"></div>
			</div>';
}
}
echo '</ul></div>';
}
/*}
else echo '<strong class="text-primary" style="margin-left:20px;">You have NO Friends Yet</strong>'; */
}
else echo '<strong class="text-primary" style="margin-left:20px;">You have no friend activity Yet</strong>';
}

function get_friend_profile_notify_friend_tab($friend_id)
{
include "conxn.php";
$thisUser = $friend_id;
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

$max =3;	
$all_friends = array();
$friendArrayCount = '1';
if($friendArrayCount > 0)
{

//select friend status
$sql = "SELECT id, comment, image_loc, owner_id, account_id, 'COMM' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, 'EMPTY' AS friend_id, commentDate 
FROM account_comment WHERE owner_id = account_id AND owner_id = '$thisUser' /*AND datetime > '$lastOut'*/ order by commentDate desc LIMIT 5";
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
FROM likes WHERE shop_id = $thisUser /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
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
FROM likes_products WHERE product_id = $thisUser /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
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
FROM subscribers WHERE user_id = $thisUser /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 5";  
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
FROM friends WHERE value = 1 AND friend_id = '$thisUser' OR account_id = '$thisUser'  /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 7";  
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
echo '<strong class="text-primary" style="margin-left:10px;">No new Activity from Connections</strong>';
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
echo '<div class="no-padding" style="">
<ul class="no-padding no-margin" style="">';
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
$datetime = date("M d", $datetime);
$datetimearray = explode(' ', $datetime);
$datetimemonth = $datetimearray[0];
$datetimeday = $datetimearray[1];

if($comment == 'shoplike')
{
	echo '<div class="row no-margin">
			<div class="col-xs-12 col-sm-12">
				<p class="" style="margin:15px 0;">', get_status_name($shop_id),'<small> liked </small>', get_shopname($user_id),'</p>
				<p></p>
			</div>
			<div class="col-sm-12"><hr style="margin:12px;"></div>
			<div>';
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
					<!--', get_status_pic_of_sender($product_id), ' -->
					', get_status_name($product_id),'
					liked
					<li class="" style="height:50px; padding-bottom:0px; padding-left:220px; margin-top:-20px; list-style:none;"  >
						<div class="well no-margin" style="height:47px; width:250px; padding:5px;">
							<table border="0" width="100%" cellpadding="0" cellspacing="0" align="right">
								<tr>
									<td height="25" width="55">
										<img src="/'. $image_loc.'" class="edit-record img-rounded"  
										onClick="Load_Contents_From_DB_by_Vasplus_Blog('.$product_id .');"style="height:35px; width:35px;" alt="'.$name.'" title="'.$name.'" />
									</td>
									<td align="left">
										<input type="hidden" id="product_id" value="'. $product_id .'" /> 
										<small class="text-muted"><a href="/product-link/'.$shopName.'/'. $product_id .'/'.$prdt_name_format.'">'.$name.'</a></small><br>
										<small class="text-warning">GHS '.$price.'</small>
									</td>
								</tr>
							</table>
						</div>
					</li>
				</li>
				<li class="message" style="margin-top:-10px;margin-bottom:-5px;padding-left:10px;">
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
	echo '<div class="row no-padding">
			<div class="col-xs-12 col-sm-12">
				<p class="" style="">', get_status_name($user_id),'<small> subscribed to </small>', get_shopname($shop_id),' <small class="pull-right text-muted"> '.$datetimemonth.'
					 '.$datetimeday.'</small></p>
				<p></p>
			</div>
			<div class="col-sm-12"><hr style="margin:12px;"></div>
			</div>';
}
else if($comment == 'newfriend')
{
	echo '<div class="row no-padding">
			
			<div class="col-xs-12 col-sm-12">
				<p class="" style="">', get_status_name($account_id),'<small> is now in connection with </small>', get_status_name($friend_id),'  <small class="pull-right text-muted"> '.$datetimemonth.'
					 '.$datetimeday.'</small></p>
				<p></p>
			</div>
			<div class="col-sm-12"><hr style="margin:12px;"></div>
			</div>';
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
include "conxn.php";
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
account_id, datetime FROM shop_comment WHERE shop_id IN $range /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 7";
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
image_loc, datetime FROM product WHERE shop_id IN $range /*AND datetime > '$lastOut'*/  AND mode >= '1' order by datetime desc LIMIT 7";  
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
get_shop_suggested(); 
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
$prduct_name_short = substr($name, 0, 14). '..';


$descrb = $reversed[$i][7];
$price = $reversed[$i][8];
$datetime = strtotime($reversed[$i][9]);
$datetime = date("M d", $datetime);
$datetimearray = explode(' ', $datetime);
$datetimemonth = $datetimearray[0];
$datetimeday = $datetimearray[1];
//echo $post_id.'-'.$comment.'-'.$image_loc.'-'.$shop_id.'-'.$account_id.'-'.$product_id.'-'.$name.'-'.$descrb.'-'.$price.'-'.$datetime.'<br>';

if($comment == 'EMPTY')
{
$theShop = "SELECT shopName from shop where shop_id = '$shop_id' AND mode >= '1'";
$qrytheShop = mysqli_query($link, $theShop);
if(mysqli_num_rows($qrytheShop) > 0)
{
while($theName = mysqli_fetch_assoc($qrytheShop))
{
$theShopName = $theName['shopName'];
$theShopN = substr($theShopName, 0, 10). '..';
}
echo '
   <section class="  padding-5 " style="">

		<img src="/img/products_images/mini/'. $image_loc.'" class="img" style="height:auto; width:30px; max-height:55px; margin-left:-5px; " alt="'.$name.'" title="'.$name.'"/>
	
		<a href="/product-link/'.$theShopName.'/'. $product_id .'/'.$name.'"class="text-default font-xs" style="color:black; "> '.ucwords($prduct_name_short).'</a><br>
		 <span><i class="fa fa-home text-muted"></i> <a href="/business-link/'.$theShopName.'" class="text-muted font-xs">'.ucwords($theShopN).'</a></span><br>
		 <a href="/product-link/'.$theShopName.'/'. $product_id .'/'.$name.'" class="text-primary  "  style="  font-size:0.9em;">View product</a>
	<em class=" text-muted" style="margin-top:20px; font-size:0.9em;"> '.$datetimemonth.' '.$datetimeday.'</em>   	<hr class="no-margin no-padding" style="color:"black;"/>

  </section>
';
}
}

else if($product_id == 'EMPTY')
{
$theShop = "SELECT * from shop where shop_id = '$shop_id' AND mode >= '1'";
$qrytheShop = mysqli_query($link, $theShop);
if(mysqli_num_rows($qrytheShop) > 0)
{
while($theName = mysqli_fetch_assoc($qrytheShop))
{
$theShopName = $theName['shopName'];
}
echo '   <section class="row  padding-5 " style="margin-left:10px;width:70%;" >  <small class="text-muted"> Comment at </small><br> <Strong><i class="fa fa-home text-muted"></i> <a href="/business-link/'.$theShopName.'" class="text-muted font-xs">'.ucwords($theShopName).'</a></strong>
		<br><em class=" text-muted " style="font-size:0.9em;"> '.$datetimemonth.'
		 '.$datetimeday.'</em> 
	  <hr class="no-margin no-padding"/>			
	</section> 
';
}
//<p>', name_text($account_id),'
//		'. $comment.' 
}
}
}
}
else echo '<center style="" >
<p class="padding-10">
Subscribe to Businesses and <br> get live Updates... 
</p>
</center>';
}
function get_subscribed_shop_notify_tab()
{
include "conxn.php";
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
account_id, datetime FROM shop_comment WHERE shop_id IN $range /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 8";
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
image_loc, datetime FROM product WHERE shop_id IN $range /*AND datetime > '$lastOut'*/ AND mode >= '1' order by datetime desc LIMIT 5";  
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
function compare_datetime2_tab($a, $b) 
{ 
return strcmp($a['9'], $b['9']); 
} 
// sort 
usort($result, 'compare_datetime2_tab');

//reverse the sorted array to descending order
$reversed = array_reverse($result);
//echo '<div class=" profile-message padding-5" style=""><ul class="no-padding no-margin " style="height:auto; margin-bottom:-10px;">';
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
$prduct_name_short = substr($name, 0, 22). '..';

$descrb = $reversed[$i][7];
$price = $reversed[$i][8];
$datetime = strtotime($reversed[$i][9]);
$datetime = date("M d", $datetime);
$datetimearray = explode(' ', $datetime);
$datetimemonth = $datetimearray[0];
$datetimeday = $datetimearray[1];
//echo $post_id.'-'.$comment.'-'.$image_loc.'-'.$shop_id.'-'.$account_id.'-'.$product_id.'-'.$name.'-'.$descrb.'-'.$price.'-'.$datetime.'<br>';

if($comment == 'EMPTY')
{
$theShop = "SELECT shopName from shop where shop_id = '$shop_id' AND mode >= '1'";
$qrytheShop = mysqli_query($link, $theShop);
if(mysqli_num_rows($qrytheShop) > 0)
{
while($theName = mysqli_fetch_assoc($qrytheShop))
{
$theShopName = $theName['shopName'];
}
echo '
<div class="row padding-10 margin-10 " style="height:auto;">
	<div class="col-xs-2" style="">
		<img src="/img/products_images/mini/'. $image_loc.'" class="img img-thumbnail" style="height:60px; width:auto; border:2px; " alt="'.$name.'" title="'.$name.'"/>
	</div>
	<div class="col-xs-10" style="">
		<a href="/product-link/'.$theShopName.'/'. $product_id .'/'.$name.'"class="text-default" style="color:black;"> '.$prduct_name_short.'</a>
		<br><i class="fa fa-home text-muted"></i> <a href="/business-link/'.$theShopName.'" class="text-muted">'.$theShopName.'</a>
		<br><a href="/product-link/'.$theShopName.'/'. $product_id .'/'.$name.'" class="text-primary">View product</a>
		<small class="pull-right text-info" style=""> '.$datetimemonth.' '.$datetimeday.'</small>
	</div>
</div>  <hr class="no-margin no-padding"/>
';
}
}

else if($product_id == 'EMPTY')
	{
	$theShop = "SELECT * from shop where shop_id = '$shop_id' AND mode >= '1'";
	$qrytheShop = mysqli_query($link, $theShop);
	if(mysqli_num_rows($qrytheShop) > 0)
		{
		while($theName = mysqli_fetch_assoc($qrytheShop))
		{
		$theShopName = $theName['shopName'];
		}

		echo '<div class="padding-10 ">
				<em class="text-muted">', name_text($account_id),' commented on </em> <i class="fa fa-home  text-info"  style=" "></i> <a href="/business-link/'.$theShopName.'" class="text-primary"> '.ucwords($theShopName).'</a>
				<p> <i class="fa fa-comment-o text-info" style=" "></i> '.$comment.'<small class="pull-right text-info"> '.$datetimemonth.'
				 '.$datetimeday.'</small></p>
			</div>  <hr class="no-margin no-padding"/>
		';
		}
	}
}
}
//echo '</ul></div>';
}
else echo '<center style="" >
<p class="padding-10">
Subscribe to Businesses and <br> get live Updates... 
</p>
</center>';
}


function subscribe_number($shop_id)
{include "conxn.php";
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
function add_to_cart_verify_check($shop_id,$option_id)
{include "conxn.php";

$account_id = $_SESSION['id'];
$queryA = " SELECT * FROM verify where shop_id = '$shop_id' AND type ='1' LIMIT 1 ";
$query_Am = mysqli_query($link,$queryA);
if(mysqli_num_rows($query_Am))
{
while($products = mysqli_fetch_assoc($query_Am))
{
$product_id = $_GET['product_id'];

$query = " SELECT * FROM cart_vis WHERE account_id ='$account_id' AND option_id = '$option_id' LIMIT 1 ";
$query_A = mysqli_query($link,$query);
if(mysqli_num_rows($query_A))
{
while($productsAm = mysqli_fetch_assoc($query_A))
{
  echo ' <button  type="" style="margin-right:5px;" class= "btn btn-success btn-xs" ><i class="fa fa-check"></i> Added to cart </button> <a href="/check_out.php" > Check Out</a>';

}
}
else
{
echo '<div class="row " style="line-height:2.5;"><button id="" type="button" style="margin-right:5px;" onCLick="add_to_cart_function('.$product_id.','.$option_id.')" class= "btn btn-success btn-xs no-padding no-margin"><i class="glyphicon glyphicon-plus"></i> Add to cart </button><button id="" type="button" style="margin-right:5px;" class= "btn btn-warning btn-xs" ><i class="glyphicon glyphicon-plus"></i> Buy Now </button></div>';
}
}
}
}

function delivery_options_at_prdt_page($shop_id)
{include "conxn.php";
 $user_id = $_SESSION['id'];
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
else {echo  '<p class="" style="padding-left:10px; font-size: 1.0em;" > No Delivery option available </p>';}
}

function add_to_cart_verify_option($shop_id,$option_id)
{include "conxn.php";

$account_id = $_SESSION['id'];

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
function product_option_info($shop_id,$product_id)
{
include "conxn.php";
$query_option = " SELECT * FROM product_option where product_id = '$product_id' LIMIT 5";

$query_o = mysqli_query($link,$query_option);

if($query_op = mysqli_num_rows($query_o))
{
while($products_o = mysqli_fetch_assoc($query_o))
	{
	 $spec_name = $products_o['spec_option'];
	 $stock = $products_o['stock'];
	 $spec_option = substr($spec_name, 0, 15).'.';
	 $price = price_figure($products_o['price']);
	 
	 if(mysqli_num_rows($query_o) <=1)
	 {
	 echo '<p class=""> <span style="font-size: 1.9em;">'.$price.'</span> GHS. <span class=" text-warning"> '.$stock.' remaining </span></p><input type="hidden" id="price" value="'.$price.'" />' ;
	 }
	 else if(mysqli_num_rows($query_o) >=2)
	 {
	 echo '<p class="text-default" style=" font-size: 1.0em;"><span class="" style="font-size: 1.2em;">'.$spec_option.' </span><span class="text-warning  "> '.$stock.' in stock </span> <span class="pull-right" style=" font-size: 0.8em;">  GHS. </span><span class="pull-right " style=" font-size: 1.5em;"> '.$price.' </span> </p>' ;
	 } 
	 else 
	 {
	 echo '<p class="text-info " style="width:100%; font-size: 1.0em;">'.$spec_option.'<span class="text-danger " > '.$stock.'</span> in stock</p>' ;
	 }
	}
}
else
{
echo '<p class="text-danger" style="width:100%;font-size: 12px;">Call owner</p>' ;
}
}
function product_option($shop_id,$product_id)
{
include "conxn.php";
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
include "conxn.php";
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
 echo '
<div class="row padding-10" style="">
 <div class="col-xs-8 ">
  <p class="text-default" style=" font-size: 1.0em;"><span class="" style="font-size: 1.2em;">'.$spec_option.' </span><span class="text-warning  "> '.$stock.' <i class="glyphicon glyphicon-shopping-cart"></i></span> <span class="pull-right" style=" font-size: 0.8em;">  GHS. </span><span class="pull-right " style=" font-size: 1.5em;"> '.$price.' </span> </p><input type="hidden" id="price" value="'.$price.'" />
 </div>
 <div class="col col-md-4 col-sm-4 col-xs-4 no-padding" id="cart_box'.$option_id.'">',add_to_cart_verify_option($shop_id,$option_id);
echo'</div>
</div>' ;
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

function comment_hashtags()
{
  include "conxn.php";
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

function  get_shop_suggested()
{ include "conxn.php";
$query = "SELECT shop_id FROM `shop`  WHERE mode = '1' ORDER BY RAND() LIMIT 0 , 1 ";

$advert_query = mysqli_query($link,$query);

if($advert_query2  = mysqli_num_rows($advert_query))
{   echo '<ul class="list-inline padding-10 margin-10" >
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
echo'<li class="no-padding" style=" width:100%; ">

<div class="padding-bottom-10 " title="'.$shopName.'" align="center" style= " width:100%;">
		 <a  href="/business-link/'.$shopName1.'" class=" no-padding " ><img src="/'. $banner_image.'" class="img" style= " height:auto; width:100%;" alt="'.$shopName1.'" title="'.$shopName.'"/></a>
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
 
		  <a  href="/business-link/'.$shopName1.'" class=" no-padding " ><img src="/'. $banner_image.'" alt="'.$shopName1.'" title="'.$shopName.'" class="img "  style= "height:auto; width:100%;"></a>
 	
 
 <strong  > <a href="/business-link/'.$shopName1.'" class="no-padding "style="color:#000000; font-size:0.8em;">'.$shopName.'</a> </strong>
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
function out_of_business_check($shop_id)
{include "conxn.php";
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
echo '<span class="text-danger" style="font-size:0.9em;">Out of business</span>';
} 
}
}
}

function shopcategory($shop_id)
{
include "conxn.php";
$main_user_id  = $_SESSION['id'];
$query1 = "SELECT * FROM shop WHERE shop_id  = '$shop_id' LIMIT 1"; 
$query4user_info1 = mysqli_query($link,$query1);
while($allpalls_info = mysqli_fetch_array($query4user_info1,MYSQLI_ASSOC))
{
$category = $allpalls_info['category'];
$user_id = safe_input($allpalls_info['user_id']);

echo  '<span class="text-default" style="font-size:1.0em;" ><a href="/product-category/'.cat_name_trans($category).'" style="color:black;">' .$category .' </a></span>';
}
}
function footer()
{
echo'
<hr>
<footer class="" style="margin-bottom:70px;">
	 <p class ="text-default pull-left" style="margin-bottom:-1px; font-size:9pt;">
				 <ul class="list-inline center">
				   <li><a class="text-muted" href="/about-us" >About Us</a></li>
				   <li><a class="text-muted" href="/contact-us" >Contact Us</a></li>
				<li><a class="text-muted" href="/frequently-asked-questions-and-answers" >Q&A</a></li>
				 <li><a  class="text-muted" href="/TermandConditions" >Terms </a></li>
				 <li><a href="/pricay-policy"class ="text-muted "  >Privacy Policy</a></li>
                 <li><a class="text-muted" href="/safe-trading-guide-on-ecommerce" >Safe Trading Guide</a> </li>
				 </ul>
				</p>
				<p class ="text-default pull-left" style="font-size:9pt;">
				 <p class="text-muted">Copyright © 2023 Mykanta Inc. All Rights Reserved. </p>
				  </ul>
				</p>
		</footer>'; 
}


function edit_product($product_id)
{
	include "conxn.php";
	$selprdt = "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1";
	$queryprdt = mysqli_query($link,$selprdt);
	if(mysqli_num_rows($queryprdt) >= 1)
	{
		while($while_prdt = mysqli_fetch_assoc($queryprdt))
		{
			$prdt_name = $while_prdt['name'];
			$prdt_man = $while_prdt['manufacturer'];
			$prdt_descrb = $while_prdt['descrb'];
			$prdt_color = $while_prdt['color'];
			$prdt_cond = $while_prdt['condition'];
			$min_order = $while_prdt['min_order'];
			$image_loc1 = $while_prdt['image_loc'];
echo '<div class="col-sm-12 col-md-12 col-lg-7">
<div class="padding-10" style="margin-left: 10px;  ">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="row">

<div class="col-xs-6">
	<label class="" style="font-weight:600;">Enter full Product Name</label>
	<input type="text" class="form-control" id="prdt_name"  name="prdt_name" value="'.$prdt_name.'" required /> 
</div>

<div class="col-xs-6">
	<label class="" style="font-weight:600;">Product Manufacturer</label>
	<input type="text" class="form-control" id="prdt_man"  name="prdt_man" value="'.$prdt_man.'" required />
</div>
</div>
<br>

<div class="row">
<div class="col-md-12">
	<label class="" style="font-weight:600;">Product Description</label>
	<textarea class="form-control" id="prdt_desc" name="prdt_desc" required>'.$prdt_descrb.'</textarea>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-4 col-xs-6">
		<label class="" style="font-weight:600;">Product Colors</label>
		<input type="text" class="form-control" id="prdt_color" name="prdt_color" value="'.$prdt_color.'" required />
</div>
<div class="col-sm-4 col-xs-6">
		<label class="" style="font-weight:600;">Product Condition</label>
		<input type="text" class="form-control" id="prdt_cond" name="prdt_cond" value="'.$prdt_cond.'" required />
</div>
<div class="col-sm-4 col-xs-6">
		<label class="" style="font-weight:600;">Minimum order</label>
		<input type="number" class="form-control" id="min_order" name="min_order" value="'.$min_order.'" required />
</div>
<div class="col-xs-12" id="updateprdtAlert" style="margin-top:10px;"></div>
</div>
<input name="update_product_btn" type="submit" class="btn btn-success btn-md pull-right" style="margin-top:5px;" value="Save" id="update_product_btn" />
</div>
</div>
</div>
<div class="well well-sm" style="margin-left: 5px; border: medium none; box-shadow: 0px 0px 1px 1px #BDBDBD;">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">';
$selprdtoption = "SELECT * FROM product_option WHERE product_id = '$product_id' ORDER BY id ASC";
$queryprdtoption = mysqli_query($link,$selprdtoption);
$totaloptions = mysqli_num_rows($queryprdtoption);
if($totaloptions >= 1)
{
echo'
<div>
<h6 class="">Available Product Options';
if($totaloptions <= 5){
echo'<a data-target="#add_option_modal" data-toggle="modal" class="padding-bottom-10 pull-right">
<button class="btn btn-primary btn-sm "><i class="glyphicon glyphicon-plus"></i> Add new option</button></a>';
	}
	else{
		echo'<a class="no-padding pull-right">
	<button class="btn btn-primary btn-sm disabled"><i class="glyphicon glyphicon-plus"></i> You can have only 5options</button></a>';
	}											
echo'</h6></div>
<div style="margin-top:5px;">
<table style="width:100%; border:1px solid #EEE;">
<tr>
	<th class="text-info" style="padding:5px; border:1px solid #EEE;"><small>Option</small></th>
	<th class="text-info" style="text-align:center; border:1px solid #EEE;"><small>Price</small></th>
	<th class="text-info" style="text-align:center; border:1px solid #EEE;"><small>Stock Qty.</small></th>
	<th class="text-info" style="text-align:center; border:1px solid #EEE;"><small>Action</small></th>
</tr>';
$checkoptionnum = 1;
while($while_prdtoption = mysqli_fetch_assoc($queryprdtoption))
{
	$prdt_optionid = $while_prdtoption['id'];
	$prdt_option = $while_prdtoption['spec_option'];
	$prdt_price = $while_prdtoption['price'];
	$prdt_stock = $while_prdtoption['stock'];
	echo'
		<input type="hidden" id="hdprdt_option_'.$checkoptionnum.'" value="'.$prdt_option.'" />
		<input type="hidden" id="hdprdt_price_'.$checkoptionnum.'" value="'.$prdt_price.'" />
		<input type="hidden" id="hdprdt_stock_'.$checkoptionnum.'" value="'.$prdt_stock.'" />
		<tr style="">
			<td style="padding:5px; border:1px solid #EEE;">'.$prdt_option.'</td>
			<td style="text-align:center; border:1px solid #EEE;">'.$prdt_price.'</td>
			<td style="text-align:center; border:1px solid #EEE;">'.$prdt_stock.'</td>
			<td style="text-align:center; border:1px solid #EEE;">
				<a href="javascript:editoptionfxn('.$prdt_optionid.','.$checkoptionnum.');" title="Edit"><i class="fa fa-edit text-red custom-i-hover"></i></a>';
				if($checkoptionnum != 1){
					echo'<a href="javascript:deloptionfxn('.$prdt_optionid.');" title="Delete"><i class="fa fa-trash-o text-danger custom-i-hover"  style="margin-left:15px;"></i></a>';
				}
			echo'</td>
		</tr>';
	$checkoptionnum +=1;
}
echo'</table></div>';
}
echo'
<br>
</div>
</div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-5">
<div class="padding-10" style="">
<label class="" style="font-weight:600;">Main Product Image</label>
<div class="row">

<div class="col-xs-6" id="vpb_uploads_displayer1" style="text-align:center;">
<img style="" src="/img/products_images/mini/'.$image_loc1.'" title="'.$prdt_name.'" alt="'.$prdt_name.'"width="100" />
</div>

<div class="btn btn-primary"id="upload_button1">Change</div>

<br clear="all" />    
<center>
	<div class="wrapper " align="center"><!-- Main Wrapper -->
		<div id="vpb_uploads_error_displayer1"></div><!-- Error Message Displayer -->
	</div>
</center>
';
$selotherimages = "SELECT * FROM product_image_4 WHERE product_id = '$product_id' ORDER BY id ASC";
$queryotherimages = mysqli_query($link,$selotherimages);
$totalimages = mysqli_num_rows($queryotherimages);
if($totalimages < 6){
echo'<div class="col-md-12 padding-10">
		<div class="btn btn-primary"id="upload_button2"><i class="glyphicon glyphicon-plus"></i> Add image</div>
		<input type="hidden" id="myfile1" name="myfile1" value="" />
		<br clear="all" />    
	<center>
		<div class="wrapper " align="center"><!-- Main Wrapper -->
			<div id="vpb_uploads_error_displayer2"></div><!-- Error Message Displayer -->
			<div id="vpb_uploads_displayer2"></div><!-- Success Message (Files) Displayer -->
		</div>
	</center>
	</div>';
}
else{
echo'<div class="col-md-12">
		<div class="btn btn-primary disabled" id=""><i class="glyphicon glyphicon-plus"></i> You can have only 7 images in all</div>
	</div>';
}
if($totalimages >= 1)
{
echo'<div class="col-md-12" style="margin-top:10px;">
		<fieldset id="img2_field" style="; padding:0 10px 5px;"><legend class="text-info" style="border:none;padding:0px; margin:0 0 5px; font-size:inherit;">Other images</legend>
		<div class="row">';
		while($while_otherimages = mysqli_fetch_assoc($queryotherimages))
		{
			$otherimg_id = $while_otherimages['id'];
			$image_loc2 = $while_otherimages['image_loc'];
			echo'<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6" style="text-align:center; margin-bottom:5px;">
						<div style="padding:5px; border-radius:2px; box-shadow: 0px 0px 1px 1px #BDBDBD;"><img src="/img/products_images/mini/'.$image_loc2.'" title="'.$prdt_name.'" alt="'.$prdt_name.'" width="100" />
							<a href="javascript:delotherimgfxn('.$otherimg_id.');"><button class="btn btn-sm btn-danger pull-right" style="">
<i class="fa fa-trash-o text-default custom-i-hover"></i></button></a>
						</div>
					</div>';
		}
		echo'</div>
	</fieldset>
</div>';
}
echo'
</div>
</div>
</div>';
		}
	}
}

function edit_service($product_id)
{
	include "conxn.php";
	$selprdt = "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1";
	$queryprdt = mysqli_query($link,$selprdt);
	if(mysqli_num_rows($queryprdt) >= 1)
	{
		while($while_prdt = mysqli_fetch_assoc($queryprdt))
		{
			$prdt_name = $while_prdt['name'];
			$prdt_man = $while_prdt['manufacturer'];
			$prdt_descrb = $while_prdt['descrb'];
			$prdt_color = $while_prdt['color'];
			$prdt_cond = $while_prdt['condition'];
			$min_order = $while_prdt['min_order'];
			$image_loc1 = $while_prdt['image_loc'];
echo '<div class="col-sm-12 col-md-12 col-lg-7">
<div class="padding-10" style="margin-left: 10px;  ">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="row">

<div class="col-xs-6">
	<label class="" style="font-weight:600;">Enter Service Name</label>
	<input type="text" class="form-control" id="prdt_name"  name="prdt_name" value="'.$prdt_name.'" required /> 
</div>

<div class="col-xs-6 hidden">
	<label class="" style="font-weight:600;">Product Manufacturer</label>
	<input type="text" class="form-control" id="prdt_man"  name="prdt_man" value="'.$prdt_man.'" required />
</div>
</div>
<br>
<div class="row">
<div class="col-md-12">
	<label class="" style="font-weight:600;">Service Description</label>
	<textarea class="form-control" id="prdt_desc" name="prdt_desc" rows="3"  required>'.$prdt_descrb.'</textarea>
</div>
</div>
<br>
<div class="row hidden">
<div class="col-sm-4 col-xs-6">
		<label class="" style="font-weight:600;">Product Colors</label>
		<input type="text" class="form-control" id="prdt_color" name="prdt_color" value="'.$prdt_color.'" required />
</div>
<div class="col-sm-4 col-xs-6">
		<label class="" style="font-weight:600;">Product Condition</label>
		<input type="text" class="form-control" id="prdt_cond" name="prdt_cond" value="'.$prdt_cond.'" required />
</div>
<div class="col-sm-4 col-xs-6">
		<label class="" style="font-weight:600;">Minimum order</label>
		<input type="number" class="form-control" id="min_order" name="min_order" value="'.$min_order.'" required />
</div>
<div class="col-xs-12" id="updateprdtAlert" style="margin-top:10px;"></div>
</div>
<input name="update_product_btn" type="submit" class="btn btn-success btn-md pull-right" style="margin-top:5px;" value="Save" id="update_product_btn" />
</div>
</div>
</div>
<div class="well well-sm hidden" style="margin-left: 5px; border: medium none; box-shadow: 0px 0px 1px 1px #BDBDBD;">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">';
$selprdtoption = "SELECT * FROM product_option WHERE product_id = '$product_id' ORDER BY id ASC";
$queryprdtoption = mysqli_query($link,$selprdtoption);
$totaloptions = mysqli_num_rows($queryprdtoption);
if($totaloptions >= 1)
{
echo'
<div class="hidden">
<h6 class="">Available Product Options';
if($totaloptions <= 5){
echo'<a data-target="#add_option_modal" data-toggle="modal" class="padding-bottom-10 pull-right">
<button class="btn btn-primary btn-sm "><i class="glyphicon glyphicon-plus"></i> Add new option</button></a>';
	}
	else{
		echo'<a class="no-padding pull-right">
	<button class="btn btn-primary btn-sm disabled"><i class="glyphicon glyphicon-plus"></i> You can have only 5options</button></a>';
	}
$checkoptionnum = 1;
while($while_prdtoption = mysqli_fetch_assoc($queryprdtoption))
{
	$prdt_optionid = $while_prdtoption['id'];
	$prdt_option = $while_prdtoption['spec_option'];
	$prdt_price = $while_prdtoption['price'];
	$prdt_stock = $while_prdtoption['stock'];
	echo'
		<input type="hidden" id="hdprdt_option_'.$checkoptionnum.'" value="'.$prdt_option.'" />
		<input type="hidden" id="hdprdt_price_'.$checkoptionnum.'" value="'.$prdt_price.'" />
		<input type="hidden" id="hdprdt_stock_'.$checkoptionnum.'" value="'.$prdt_stock.'" />
		<tr style="">
			<td style="padding:5px; border:1px solid #EEE;">'.$prdt_option.'</td>
			<td style="text-align:center; border:1px solid #EEE;">'.$prdt_price.'</td>
			<td style="text-align:center; border:1px solid #EEE;">'.$prdt_stock.'</td>
			<td style="text-align:center; border:1px solid #EEE;">
				<a href="javascript:editoptionfxn('.$prdt_optionid.','.$checkoptionnum.');" title="Edit"><i class="fa fa-edit text-red custom-i-hover"></i></a>';
				if($checkoptionnum != 1){
					echo'<a href="javascript:deloptionfxn('.$prdt_optionid.');" title="Delete"><i class="fa fa-trash-o text-danger custom-i-hover"  style="margin-left:15px;"></i></a>';
				}
			echo'</td>
		</tr>';
	$checkoptionnum +=1;
}
echo'</table></div>';
}
echo'
<br>
</div>
</div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-5">
<div class="padding-10" style="">
<label class="" style="font-weight:600;">Main Service Image</label>
<div class="row">

<div class="col-xs-6" id="vpb_uploads_displayer1" style="text-align:center;">
<img style="" src="/img/products_images/mini/'.$image_loc1.'" title="'.$prdt_name.'" alt="'.$prdt_name.'" width="100" />
</div>

<div class="btn btn-primary"id="upload_button1">Change</div>

<br clear="all" />    
<center>
	<div class="wrapper " align="center"><!-- Main Wrapper -->
		<div id="vpb_uploads_error_displayer1"></div><!-- Error Message Displayer -->
	</div>
</center>
';
$selotherimages = "SELECT * FROM product_image_4 WHERE product_id = '$product_id' ORDER BY id ASC";
$queryotherimages = mysqli_query($link,$selotherimages);
$totalimages = mysqli_num_rows($queryotherimages);
if($totalimages < 6){
echo'<div class="col-md-12 padding-10">
		<div class="btn btn-primary"id="upload_button2"><i class="glyphicon glyphicon-plus"></i> Add image</div>
		<input type="hidden" id="myfile1" name="myfile1" value="" />
		<br clear="all" />    
	<center>
		<div class="wrapper " align="center"><!-- Main Wrapper -->
			<div id="vpb_uploads_error_displayer2"></div><!-- Error Message Displayer -->
			<div id="vpb_uploads_displayer2"></div><!-- Success Message (Files) Displayer -->
		</div>
	</center>
	</div>';
}
else{
echo'<div class="col-md-12">
		<div class="btn btn-primary disabled" id=""><i class="glyphicon glyphicon-plus"></i> You can have only 7 images in all</div>
	</div>';
}
if($totalimages >= 1)
{
echo'<div class="col-md-12" style="margin-top:10px;">
		<fieldset id="img2_field" style="; padding:0 10px 5px;"><legend class="text-info" style="border:none;padding:0px; margin:0 0 5px; font-size:inherit;">Other images</legend>
		<div class="row">';
		while($while_otherimages = mysqli_fetch_assoc($queryotherimages))
		{
			$otherimg_id = $while_otherimages['id'];
			$image_loc2 = $while_otherimages['image_loc'];
			echo'<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6" style="text-align:center; margin-bottom:5px;">
						<div style="padding:5px; border-radius:2px; box-shadow: 0px 0px 1px 1px #BDBDBD;"><img src="/img/products_images/mini/'.$image_loc2.'" title="'.$prdt_name.'" alt="'.$prdt_name.'" width="100" />
							<a href="javascript:delotherimgfxn('.$otherimg_id.');"><button class="btn btn-sm btn-danger pull-right" style="">
<i class="fa fa-trash-o text-default custom-i-hover"></i></button></a>
						</div>
					</div>';
		}
		echo'</div>
	</fieldset>
</div>';
}
echo'
</div>
</div>
</div>';
		}
	}
}

function shop_description($shop_id)
{
	include "conxn.php";
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
	include "conxn.php";
	$selshopbanner = "SELECT * FROM banner_pic WHERE shop_id = '$shop_id' LIMIT 1";
	$queryshopbanner = mysqli_query($link,$selshopbanner);
	if(mysqli_num_rows($queryshopbanner) >= 1)
	{
		while($while_shopbanner = mysqli_fetch_assoc($queryshopbanner))
		{
			$shopbanner = safe_input($while_shopbanner['image_loc']);
			return $shopbanner;
		}
	}
}

function product_descrb($product_id)
{
	include "conxn.php";
	$selproductdescrb = "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1";
	$queryproductdescrb = mysqli_query($link,$selproductdescrb);
	if(mysqli_num_rows($queryproductdescrb) >= 1)
	{
		while($while_productdescrb = mysqli_fetch_assoc($queryproductdescrb))
		{
			$productdescrb = safe_input($while_productdescrb['descrb']);
			$productdescrb = strip_tags($productdescrb);
			return $productdescrb;
		}
	}
}

function product_img1($product_id)
{
	include "conxn.php";
	$selproductimg1 = "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1";
	$queryproductimg1 = mysqli_query($link,$selproductimg1);
	if(mysqli_num_rows($queryproductimg1) >= 1)
	{
		while($while_productimg1 = mysqli_fetch_assoc($queryproductimg1))
		{
			$productimg1 = safe_input($while_productimg1['image_loc']);
			$productimg1 = strip_tags($productimg1);
			return $productimg1;
		}
	}
}
function verification_status_business_owner($shop_id)
{	include "conxn.php";
	$query = "SELECT type FROM verify WHERE shop_id = '$shop_id' LIMIT 1  ";
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
function verification_status_decision($shop_id)
{	include "conxn.php";
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

function email_verification($email)
{	include "conxn.php";
	$query = "SELECT value FROM verify_user_auth WHERE email = '$email' LIMIT 1  ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['value'];
		 
		 if( $v_code == 0)
		 { echo $verify_type = '<span class="text-danger" style="font-size:1.0em;"> Please verify your email <i class="fa fa-times"> </i></span>';}
		 else  
		 {echo  $verify_type = '<span class="text-success" style="font-size:1.0em;">Verified <i class="glyphicon glyphicon-ok"> </i></span>';}
		}
	}
	else 
		 {
		 echo ' <span  data-target="#verify_modal" data-toggle="modal" class="btn btn-xs btn-success" style="font-size:0.5em;"> verify page</span>';
		 }
		 
}
function verification_status($shop_id)
{	include "conxn.php";
	$query = "SELECT type FROM verify WHERE shop_id = '$shop_id' LIMIT 1  ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['type'];
		 
		 if( $v_code == 1)
		 { echo $verify_type = '<span class="text-success" title="Verified Business"style="font-size:1.0em;">Verified <i class="glyphicon glyphicon-ok"> </i></span>';}
		 else if( $v_code == 2)
		 {echo  $verify_type = '<span class="text-success"title="Verified Business" style="font-size:0.5em;">Verified <i class="glyphicon glyphicon-ok"> </i></span>';}
		 else if( $v_code == 3)
		 {echo  $verify_type = '<span class="text-success"title="Verified Business" style="font-size:0.5em;">Verified <i class="glyphicon glyphicon-ok"> </i></span>';}
		 else if( $v_code == 0)
		 {echo  $verify_type = ' <span class="text-warning" title="Pending Verified"style="">Verification Pending</span>';}
		 else 
		 {
		 echo ' <span  class="btn btn-xs btn-danger" style="font-size:0.5em;">not verified</span>';
		 }
		}
	}
	else 
		 {
		 echo ' <span  data-target="#verify_modal" data-toggle="modal" class="btn btn-xs btn-success" style="font-size:0.5em;"> verify page</span>';
		 }
		 
}

function verification_icon_on_profile($shop_id)
{	
	include "conxn.php";
	$query = "SELECT type FROM verify WHERE shop_id = '$shop_id' LIMIT 1  ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['type'];
		 
		 if( $v_code == 1)
		 { echo $verify_type = '<span> <img src="/img/site_img/approved.png" title="Verified Business" style="height:22px; margin-top:-5px;"> </span>';}
		 else if( $v_code == 2)
		 {echo  $verify_type = '<span> <img src="/img/site_img/approved.png" title="Verified Business"style="height:20px; margin-top:-5px;">';}
		 else if( $v_code == 3)
		 {echo  $verify_type = '<span> <img src="/img/site_img/approved.png"title="Verified Business" style="height:20px; margin-top:-5px;">';}
		 else if( $v_code == 0)
		 {echo  $verify_type = '<span data-target="#pending_verify_modal" data-toggle="modal"> <img src="/img/site_img/pending.png" title="Pending Verification" style="height:20px; margin-top:-5px;">';}
		 else 
		 {
		 echo '<span> <img src="/img/site_img/cancelled.png" title="Not Verified" style="height:20px; margin-top:-5px;">';
		 }
		}
	}
			 
}
function verification_icon($shop_id)
{	
	include "conxn.php";
	$query = "SELECT type FROM verify WHERE shop_id = '$shop_id' LIMIT 1  ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['type'];
		 
		 if( $v_code == 1)
		 { echo $verify_type = '<span> <img src="/img/site_img/approved.png" title="Verified Business" style="height:22px; margin-top:-5px;"> </span>';}
		 else if( $v_code == 2)
		 {echo  $verify_type = '<span> <img src="/img/site_img/approved.png" title="Verified Business"style="height:20px; margin-top:-5px;">';}
		 else if( $v_code == 3)
		 {echo  $verify_type = '<span> <img src="/img/site_img/approved.png"title="Verified Business" style="height:20px; margin-top:-5px;">';}
		 else if( $v_code == 0)
		 {echo  $verify_type = '<span data-target="#pending_verify_modal" data-toggle="modal"> <img src="/img/site_img/pending.png" title="Pending Verification" style="height:20px; margin-top:-5px;">';}
		 else 
		 {
		 echo '<span> <img src="/img/site_img/cancelled.png" title="Not Verified" style="height:20px; margin-top:-5px;">';
		 }
		}
	}
	else 
		 {
		 echo ' <span  data-target="#verify_modal" data-toggle="modal" class="  btn-xs btn-success" style="font-size:0.5em;"> verify </span>';
		 }		 
}

function verification_icon_other($shop_id)
{	include "conxn.php";
	$query = "SELECT type FROM verify WHERE shop_id = '$shop_id' LIMIT 1  ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['type'];
		 
		 if( $v_code == 1)
		 { echo $verify_type = '<span> <img src="/img/site_img/approved.png" title="Verified Business" style="height:22px; margin-top:-5px;"> </span>';}
		 else if( $v_code == 2)
		 {echo  $verify_type = '<span> <img src="/img/site_img/approved.png"title="Verified Business"  style="height:20px; margin-top:-5px;">';}
		 else if( $v_code == 3)                                             
		 {echo  $verify_type = '<span> <img src="/img/site_img/approved.png"title="Verified Business"  style="height:20px; margin-top:-5px;">';}
		 else if( $v_code == 0)                                            
		 {echo  $verify_type = '<span> <img src="/img/site_img/pending.png" title="Pending Verification" style="height:20px; margin-top:-5px;">';}
		 else 
		 {
		 echo '<span> <img src="/img/site_img/cancelled.png" alt="not Verified" title="not Verified" style="height:20px; margin-top:-5px;">';
		 }
		}
	}
	else 
		 {
		 echo ' <span  data-target="#verify_modal" data-toggle="modal" class="text-danger" style="font-size:0.5em;"> not verified!</span>';
		 }
		 
}

function verification_gif($shop_id)
{	include "conxn.php";
	$query = "SELECT type FROM verify WHERE shop_id = '$shop_id' LIMIT 1  ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['type'];
		 
		 if( $v_code == 1)
		 { echo $verify_type = '<button class="btn btn-default btn-lg" data-target="#gifbox" data-toggle="modal">GIF Product</button>';}
		 else if( $v_code == 2)
		 {echo  $verify_type = '<button class="btn btn-default btn-lg" data-target="#gifbox" data-toggle="modal">GIF Product</button>';}
		 else if( $v_code == 3)                                             
		 {echo  $verify_type = '<button class="btn btn-default btn-lg" data-target="#gifbox" data-toggle="modal">GIF Product</button>';}
		 else if( $v_code == 0)                                            
		 {echo  $verify_type = '<span  data-target="#verify_modal" data-toggle="modal" class="text-danger" style="font-size:1em;">Verify your Shop to create a product GIF</span>';}
		 else 
		 {
		 echo '<span  data-target="#verify_modal" data-toggle="modal" class="text-danger" style="font-size:1em;">Verify your Shop to create a product GIF</span>';
		 }
		}
	}
	else 
		 {
		 echo ' <span  data-target="#verify_modal" data-toggle="modal" class="text-danger" style="font-size:1em;">Verify your Shop to create a product GIF</span>';
		 }
		 
}
function smiles_reev_coll($post_id)
{
include "conxn.php";

$thisUser = $_SESSION['id'];
//selecting all of reev
$queryq = "SELECT number_of_smiles FROM smiles_reev
WHERE reev_id = '$post_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser)>=1)
	{
	while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
		{
		 $number_of_smiles =$flik_info['number_of_smiles'];
		 
		//checking if user smiled at reev
		$queryc = "SELECT id FROM smiles_reev
		WHERE user_id = '$thisUser' AND reev_id = '$post_id'";
		$queryuser1 = mysqli_query($link,$queryc);
		if($query_c = mysqli_num_rows($queryuser1)>=1)
			{
			 echo '<span id="smile_box'.$post_id.'"><img  class="" src="/img/site_img/smiles/smile_3.png" style="height:30px; margin-top:-18px;" title="smile" alt="smile"/> '. $number_of_smiles.' <span class="hidden-xs hidden-sm "> smile(s)</span></span>';
			}
			else
			{
			echo '<span id="smile_box'.$post_id.'"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:30px; margin-top:-18px;"onClick="smile_ico('.$post_id.');" title="smile" alt="smile"/> '. $number_of_smiles.' <span class="hidden-xs hidden-sm "> smile(s)</span></span>';
			}
		}
	}
	else
			{
			echo '<span id="smile_box'.$post_id.'"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:30px; margin-top:-18px;"onClick="smile_ico('.$post_id.');" title="smile" alt="smile" /> 0<span class="hidden-xs hidden-sm "> smile(s)</span></span>';
			}
}
function smiles_reev($post_id)
{
include "conxn.php";

$thisUser = $_SESSION['id'];
//selecting all of reev
$queryq = "SELECT number_of_smiles FROM smiles_reev
WHERE reev_id = '$post_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser)>=1)
	{
	while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
		{
		 $number_of_smiles =$flik_info['number_of_smiles'];
		 
		//checking if user smiled at reev
		$queryc = "SELECT id FROM smiles_reev
		WHERE user_id = '$thisUser' AND reev_id = '$post_id'";
		$queryuser1 = mysqli_query($link,$queryc);
		if($query_c = mysqli_num_rows($queryuser1)>=1)
			{
			 echo '<span id="smile_box'.$post_id.'"><img  class="" src="/img/site_img/smiles/smile_3.png" style="height:30px; margin-top:-23px;" title="smile" alt="smile"/> '. $number_of_smiles.' <span class="hidden-xs hidden-sm "> smile(s)</span></span>';
			}
			else
			{
			echo '<span id="smile_box'.$post_id.'"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:30px; margin-top:-23px;"onClick="smile_ico('.$post_id.');" title="smile" alt="smile"/> '. $number_of_smiles.' <span class="hidden-xs hidden-sm "> smile(s)</span></span>';
			}
		}
	}
	else
			{
			echo '<span id="smile_box'.$post_id.'"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:30px; margin-top:-23px;" onClick="smile_ico('.$post_id.');" title="smile" alt="smile" /> 0<span class="hidden-xs hidden-sm "> smile(s)</span></span>';
			}
}
function myfile_total($post_id)
{
include "conxn.php";

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
		
		if($image_loc == NULL OR $image_loc == '' OR $image_loc == 'NULL' OR $image_loc == "" )
		{
		 echo '';
		}else if($number_of_smiles >= '2' OR $number_of_smiles >= 2 )
		{
		 echo '<span class="" id="play_pause'.$id.'"><img onClick="image_loc('.$post_id.');"  class="" src="/img/site_img/smiles/photo.jpg" style="height:20px; margin-top:-12px;" title="smile" alt="smile" /></span><span class="text-muted">+'. $number_of_smiles.'</span><input type="hidden" id="image_loc_'.$id.'" value="'.$image_loc.'" />  ';
		}else
		{
		 echo '<span class=""><img  class="" src="/img/site_img/smiles/photo.jpg" style="height:20px; margin-top:-12px;" title="smile" alt="smile" /></span><span class="text-muted">+1</span> ';
		}
		}
	}
		
}
function myfile_total_conn($post_id)
{
include "conxn.php";

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
		
		if($image_loc == NULL OR $image_loc == '' OR $image_loc == 'NULL' OR $image_loc == "" )
		{
		 echo '';
		}else if($number_of_smiles >= '2' OR $number_of_smiles >= 2 )
		{
		 echo '<span class="" id="play_pause_conn'.$id.'"><i class="fa fa-2x fa-play"onClick="image_loc_conn('.$post_id.');" ></i></span><span class="text-muted">+'. $number_of_smiles.'</span><input type="hidden" id="image_loc_conn'.$id.'" value="'.$image_loc.'" />  ';
		}else
		{
		 echo '<span class=""><i class="fa fa-2x fa-camera" ></i></span><span class="text-muted">+1</span> ';
		}
		}
	}
		
}

function seen_re_count($post_id)
{
include "conxn.php";
@session_start();
$user_id = $_SESSION['id'];
$queryq = "SELECT number_of_seen FROM seen_reev
WHERE reev_id = '$post_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser)>=1)
{
   while($query_q = mysqli_fetch_assoc($queryuser))
   {$number_of_seen = $query_q['number_of_seen'] ;
   echo $number_of_seen ;
				 }
} else{
    echo ' ';
}

}

function seen_re_post($post_id)
{
include "conxn.php";
@session_start();
$user_id = $_SESSION['id'];
$queryq = "SELECT id FROM seen_reev
WHERE reev_id = '$post_id' AND user_id = '$user_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser)>=1)
{
   echo ' <li  id="seen_box'.$post_id.'"><a href="javascript:void(0);" onclick="seen_remove('.$post_id.');"  title="re-post"  style="color:grey;"  >  <img  class=" font-sm" src="/img/site_img/reev_icons/reev_sh1.png" style="height:22px; margin-top:-13px;" title="re-post" alt="re-post"/> ',seen_re_count($post_id),'
					 <span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; "> </span>
				 </li>';
} else{

$queryq = "SELECT * FROM account_comment WHERE id = '$post_id'  AND owner_id = '$user_id'";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser) < 1)
	{
    echo ' <li  id="seen_box'.$post_id.'"><a href="javascript:void(0);"  title="re-post"  onclick="seen_ico('.$post_id.');"     style="color:grey;"  >  <img  class=" font-sm" src="/img/site_img/reev_icons/reev_sh.png" style="height:22px; margin-top:-13px;" title="re-post" alt="re-post" />   ',seen_re_count($post_id),'
					 <span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; "> </span>
				 </li>';
				 
}
}

}
function smiles_reev_display_info($post_id)
{
include "conxn.php";
@session_start();
$thisUser = $_SESSION['id'];
$eii = id_from_reev($post_id);
	//checking if user smiled at reev
		$queryc = "SELECT id FROM smiles_reev WHERE user_id = '$thisUser' AND reev_id = '$post_id'";
		
		$queryuser1 = mysqli_query($link,$queryc);
		if($query_c = mysqli_num_rows($queryuser1)>=1)
			{
				
				//selecting all of reev
				$queryq = "SELECT number_of_smiles FROM smiles_reev
				WHERE reev_id = '$post_id' ORDER BY id DESC LIMIT 1";
				$queryuser = mysqli_query($link,$queryq);
				if($query_q = mysqli_num_rows($queryuser)==1)
					{
					while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
						{
						 $number_of_smiles =$flik_info['number_of_smiles'];
						 
						 	 echo '<span id="smile_box'.$post_id.'"  style="font-size:1.0em;" class="text-muted"><img  class="" src="/img/site_img/smiles/smile_3.png" style="height:20px; margin-top:-12px;" title="smile" alt="smile" /> '. $number_of_smiles.' <span class="hidden-xs hidden-sm text-muted " style=" "> smile(s)</span></span>';
						}
					}
					else
						{
						echo '<span id="smile_box'.$post_id.'" style="font-size:1.0em;" class="text-muted"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:20px; margin-top:-10px;"onClick="smile_ico('.$post_id.');" title="smile" alt="smile" /> 0<span class="hidden-xs hidden-sm text-muted" style=" "> smile(s)</span></span>';
						}
				}
			else
			{
			
			
			$queryq = "SELECT number_of_smiles FROM smiles_reev
				WHERE reev_id = '$post_id' ORDER BY id DESC LIMIT 1";
				$queryuser = mysqli_query($link,$queryq);
				if($query_q = mysqli_num_rows($queryuser)==1)
					{
					while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
						{
						 $number_of_smiles =$flik_info['number_of_smiles'];
						 
						 	 echo '<span id="smile_box'.$post_id.'"  style="font-size:1.0em;" class="text-muted"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:20px; margin-top:-12px;" onClick="smile_ico('.$post_id.');" title="smile" alt="smile" /> '. $number_of_smiles.' <span class="hidden-xs hidden-sm text-muted " style=" "> smile(s)</span></span>';
						}
					}
			        else
						{
						echo '<span id="smile_box'.$post_id.'" style="font-size:1.0em;" class="text-muted"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:20px; margin-top:-10px;"onClick="smile_ico('.$post_id.');" title="smile" alt="smile" /> 0<span class="hidden-xs hidden-sm text-muted" style=" "> smile(s)</span></span>';
						}
			
			}



		
}


function smiles_reev_display_info_old($post_id)
{
include "conxn.php";

//$thisUser = $_SESSION['id'];
$eii = id_from_reev($post_id);
//selecting all of reev
$queryq = "SELECT number_of_smiles FROM smiles_reev
WHERE reev_id = '$post_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser)==1)
	{
	while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
		{
		 $number_of_smiles =$flik_info['number_of_smiles'];
		 
		//checking if user smiled at reev
		$queryc = "SELECT id FROM smiles_reev WHERE user_id = '$eii' AND reev_id = '$post_id' ORDER BY id DESC LIMIT 1";
		
		$queryuser1 = mysqli_query($link,$queryc);
		if($query_c = mysqli_num_rows($queryuser1)>=1)
			{
			 echo '<span id="smile_box'.$post_id.'"  style="font-size:1.0em;" class="text-muted"><img  class="" src="/img/site_img/smiles/smile_3.png" style="height:25px; margin-top:-18px;" title="smile" alt="smile" /> '. $number_of_smiles.' <span class="hidden-xs hidden-sm text-muted " style=" "> smile(s)</span></span>';
			}
			else
			{
			
			
			echo '<span id="smile_box'.$post_id.'" style="font-size:1.0em;" class="text-muted"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:25px; margin-top:-18px;"onClick="smile_ico('.$post_id.');" title="smile" alt="smile"  /> '. $number_of_smiles.' <span class="hidden-xs hidden-sm text-muted" style=" "> smile(s)</span></span>';
			
			
			}
		}
	}
	else
			{
			echo '<span id="smile_box'.$post_id.'" style="font-size:1.0em;" class="text-muted"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:25px; margin-top:-18px;"onClick="smile_ico('.$post_id.');" title="smile" alt="smile" /> 0<span class="hidden-xs hidden-sm text-muted" style=" "> smile(s)</span></span>';
			}
}
function smiles_reev_display_info_conn($post_id)
{
include "conxn.php";

$thisUser = $_SESSION['id'];
$eii = id_from_reev($post_id);
//selecting all of reev
$queryq = "SELECT number_of_smiles FROM smiles_reev
WHERE reev_id = '$post_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser)>=1)
	{
	while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
		{
		 $number_of_smiles =$flik_info['number_of_smiles'];
		 
		//checking if user smiled at reev
		$queryc = "SELECT id FROM smiles_reev
		WHERE user_id = '$thisUser' AND reev_id = '$post_id'";
		$queryuser1 = mysqli_query($link,$queryc);
		if($query_c = mysqli_num_rows($queryuser1)>=1)
			{
			 echo '<span id="smile_box_con'.$post_id.'"  style="font-size:1.0em;" class="text-muted"><img  class="" src="/img/site_img/smiles/smile_3.png" style="height:20px; margin-top:-18px;" title="smile" alt="smile" /> '. $number_of_smiles.' <span class="hidden-xs hidden-sm text-muted " style=" "> smile(s)</span></span>';
			}
			else
			{
			
			
			echo '<span id="smile_box_con'.$post_id.'" style="font-size:1.0em;" class="text-muted"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:20px; margin-top:-18px;"onClick="smile_ico_conn('.$post_id.');" title="smile" alt="smile" /> '. $number_of_smiles.' <span class="hidden-xs hidden-sm text-muted" style=" "> smile(s)</span></span>';
			
			
			}
		}
	}
	else
			{
			echo '<span id="smile_box_con'.$post_id.'" style="font-size:1.0em;" class="text-muted"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:20px; margin-top:-18px;"onClick="smile_ico_conn('.$post_id.');" title="smile" alt="smile"  /> 0<span class="hidden-xs hidden-sm text-muted" style=" "> smile(s)</span></span>';
			}
}


function notification1()
{
include "conxn.php";
$thisUser = $_SESSION['id'];
$array1[] = array(1,1,1,1,1,1,1,1,1,1);
$array2[] = array(1,1,1,1,1,1,1,1,1,1);
$array3[] = array(1,1,1,1,1,1,1,1,1,1);
$array4[] = array(1,1,1,1,1,1,1,1,1,1);
$array5[] = array(1,1,1,1,1,1,1,1,1,1);
$array6[] = array(1,1,1,1,1,1,1,1,1,1);
$array7[] = array(1,1,1,1,1,1,1,1,1,1);
$array8[] = array(1,1,1,1,1,1,1,1,1,1);
$array9[] = array(1,1,1,1,1,1,1,1,1,1);


  
//find last logut time
$logout = "SELECT last_datetime from status where user_id = '$thisUser' ";
$querylogout = mysqli_query($link, $logout);
while($whilelogout = mysqli_fetch_assoc($querylogout))
{
$lastOut = $whilelogout['last_datetime'];
}
///////////////////////////////////		

/*updating the last date of a user so that user will not see previous updates as new but old
  $last_datetime =  date('Y\-m\-d\ H:i:s');		 
	$querysatus =" UPDATE status SET last_datetime='$last_datetime' WHERE user_id = '$thisUser' ";
    $user_auth_info = mysqli_query($link,$querysatus);
	*/
$max =50;	
$all_friends = array();
$all_friends_0 = array();
$sql = "SELECT account_id FROM friends WHERE friend_id='$thisUser' AND value='1' ORDER BY id";
$query = mysqli_query($link,$sql);

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
$new =  $row["account_id"];
array_push($all_friends,$new);
}
//sql for user u connected an or have connection
$sql = "SELECT friend_id FROM friends WHERE account_id='$thisUser' AND value='1' ORDER BY id ";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
$new = $row["friend_id"];
array_push($all_friends,$new );
}
//sql for users who connected to u only
$sql_0 = "SELECT friend_id FROM friends WHERE account_id='$thisUser' AND value='0' ORDER BY id ";
$query_0 = mysqli_query($link,$sql_0);
while ($row2 = mysqli_fetch_array($query_0, MYSQLI_ASSOC))
{
$new2 = $row2["friend_id"];
array_push($all_friends_0,$new2 );
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
// for connection
	$orLogic = '';
	foreach($all_friends as $key => $user)
		{
		$orLogic .= "id='$user' OR ";
		}
	
	$orLogic = chop($orLogic, "OR ");
	$sql = "SELECT id FROM registration WHERE $orLogic";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		{
		$myFrnds[] = $row['id'];
		}
		
//for connected
$orLogicnew = '';
	foreach($all_friends_0 as $key2 => $user2)
		{
		$orLogicnew .= "id='$user2' OR ";
		}
	
	$orLogicnew = chop($orLogicnew, "OR ");
	$sql = "SELECT id FROM registration WHERE '$orLogicnew'";
	$queryr = mysqli_query($link,$sql);
	while($row2 = mysqli_fetch_array($queryr,MYSQLI_ASSOC))
		{
		$myFrnds_0[] = $row2['id'];
		}

//convert array to string
$range = '(' . implode(",",$myFrnds) . ')';
@$range_0 = '(' . implode(",",$myFrnds_0) . ')';
//echo $range;

//select friend status
$sql = "SELECT id, comment, image_loc, owner_id, account_id, 'EMPTY' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, 'EMPTY' AS friend_id, commentDate 
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

//select users that connected to a user 
$sql2 = "SELECT id, 'newconnect' AS comment, 'EMPTY' AS image_loc, 'EMPTY' AS owner_id, account_id, 'EMPTY' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, friend_id, datetime
FROM friends WHERE value = '0' AND friend_id IN $range  /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 7";  
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

//select users that connected to you 
$sql3 = "SELECT id, 'newconnecttoyou' AS comment, 'EMPTY' AS image_loc, 'EMPTY' AS owner_id, account_id, 'EMPTY' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, friend_id, datetime
FROM friends WHERE value = '0' AND friend_id IN $range_0 AND account_id ='$thisUser' /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 7"; 
$query3 = mysqli_query($link,$sql3);
if(@mysqli_num_rows($query3))
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
FROM friends WHERE value = '1' AND friend_id IN $range  OR account_id IN $range  AND  value = '1' /*AND datetime > '$lastOut'*/ order by datetime desc LIMIT 7";  
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

//to display the user that commented on your reev...
$sql6 = "SELECT id, 'newcomment' AS comment, 'EMPTY' AS image_loc, post_user_id AS owner_id, reply_user_id AS account_id,reply_user_id, 'EMPTY' AS shop_id, 'EMPTY' AS user_id, 'EMPTY' AS product_id, post_id AS friend_id, datetime
FROM reply WHERE reply_user_id IN $range AND post_user_id ='$thisUser' order by datetime desc LIMIT 7";   
$query6 = mysqli_query($link,$sql6);
if(mysqli_num_rows($query5) > 0)
{
$check6 = "true";
while($row6 = mysqli_fetch_assoc($query6))
{
$array6[] = array($row6['id'], $row6['comment'], $row6['image_loc'], $row6['owner_id'], $row6['account_id'],
	$row6['shop_id'], $row6['user_id'], $row6['product_id'], $row6['friend_id'], $row6['datetime']);
}
}
else{$check6 = "false";}



if($check1 == "false" AND $check2 == "false" AND $check3 == "false" AND $check4 == "false" AND $check5 == "false" AND $check6 == "false")
{
echo '<strong class="text-primary" style="margin-left:20px;">No new Activity from Connections</strong>';
}

else
{
//merge the arrays
$result = array_merge($array1, $array2, $array3, $array4, $array5,$array6);

//sort the merged array according to date which is record [2] of each inner array
function compare_datetime_not($a, $b) 
{ 
return strcmp($a['9'], $b['9']); 
} 
// sort 
usort($result, 'compare_datetime_not');

//reverse the sorted array to descending order
$reversed = array_reverse($result);
echo '<div class="no-padding" style="">
<ul class="no-padding no-margin" style="background:#f8f8f8; ">';
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
$datetime = date("M d a ", $datetime);
$datetimearray = explode(' ', $datetime);
$datetimemonth = $datetimearray[0];
$datetimeday = $datetimearray[1];
//echo $post_id.'-'.$comment.'-'.$image_loc.'-'.$shop_id.'-'.$account_id.'-'.$product_id.'-'.$friend_id.'-'.$user_id.'-'.$owner_id.'-'.$datetime.'<br>';
/*
if($shop_id == 'COMM')
{
	echo '
			<ul>
				<li class="list-inline font-xs" style="margin-bottom:-10px; padding-left:0px; margin-left:-34px;">changed his/her Profile Status
				</li>
				<li class="message">
					<!--', get_status_pic_of_sender($owner_id), '-->
					', get_status_name($owner_id), ' 
					<p style="padding-left:10px;">'. $comment.'
					</p>
				</li>
				<li class="message" style="margin-top:-17px;margin-bottom:10px;padding-left:10px;">
					<ul class="list-inline font-xs " >
						<li class="text-primary">
							'.$datetime.'
						</li>
					</ul>	
				</li>	
			</ul>
			<span class="timeline-seperator text-center"></span>					
		';

} */

//call other required data ; username and business name
$query = "SELECT * FROM registration where id = $user_id  LIMIT 10 ";
if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		 {
                 $firstName = safe_input($details['firstName']);
               
                 $friend_id = safe_input($details['id']);
                 $username = safe_input($details['username']);
  }
  }
  
  
$query = "SELECT shopName FROM `shop`  WHERE `shop_id` = '$shop_id' LIMIT 0 , 1 "; 

$query4user_info = mysqli_query($link,$query);
$num_shop = mysqli_num_rows($query4user_info);

while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
{
$shopNames = safe_input($allpalls_info['shopName']);
$shopNameformat  = formatUrl($shopNames); 
if(!empty($shop_id))
{
$shopname = '<a href="/business-link/'.$shopNameformat.'"> '.$shopNames.' </a>';
}
}
/*updating the last date of a user so that user will not see previous updates as new but old
  $datetime =  date('Y\-m\-d\ H:i:s');		 
	$querysatus =" UPDATE status SET status_value=1,status_seen_by_others=1,datetime='$datetime' WHERE user_id = '$user_id' ";
    $user_auth_info = mysqli_query($link,$querysatus);
	*/
//now there data to show
if($comment == 'newconnect')
{
	echo '<div class="well well-light  row padding-5" style="margin:7px;">
				<div class="col-xs-1 col-md-1 no-padding ">
						<i class="fa fa-link"></i> 
				</div>
			 <div class="col-xs-11 col-md-11 no-padding ">
						<span>',get_status_name($friend_id),' connected to ',get_status_name($account_id),'.</span>
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
			 	</div>
			 </div>
			';
}

else if($comment == 'newconnecttoyou')
{
	echo '<div class="well well-light  row padding-5" style="margin:7px;">
				<div class="col-xs-1 col-md-1 no-padding ">
						<i class="fa fa-link"></i> 
				</div>
			     <div class="col-xs-11 col-md-11 no-padding ">
						<span><a href="/connection/'.$username.'"  class="text-primary">',get_status_name($friend_id),' </a>connected to you.</span>
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
			 	</div>
			 </div>
			';
}

else if($comment == 'subscribed')
{
echo '<div class="well well-light  row padding-5" style="margin:7px;">
				<div class="col-xs-1 col-md-1 no-padding ">
						<i class="fa fa-home"></i> 
				</div>
				<div class="col-xs-11 col-md-11 no-padding ">
						<span><a href="/connection/'.$username.'"  class="text-primary">'.$username.'</a> subscribed to '.$shopname.'.</span>
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
			 	</div>
			 </div>
			';
}

else if($comment == 'newfriend')
{
	echo '<div class="well well-light  row padding-5" style="margin:7px;">
				<div class="col-xs-1 col-md-1 no-padding ">
						<i class="fa fa-link"></i> 
				</div>
		       <div class="col-xs-11 col-md-11 no-padding ">
						<span>',get_status_name($account_id),' is now in connection with ',get_status_name($friend_id),'.</span>
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
			 	</div>
			 </div>
';
}

else if($comment == 'newcomment')
{
	echo '<div class="well well-light  row padding-5" style="margin:7px;">
				<div class="col-xs-1 col-md-1 no-padding ">
						<i class="fa fa-comment"></i> 
				</div>
				<div class="col-xs-11 col-md-11 no-padding ">
					<span>',get_status_name($account_id),' commented on your 
					 <a href="/reev/'.$friend_id.'"> reev.</a> 
					</span> 
					<small class="pull-right text-muted" style="font-size:0.8em; bottom:0px;" > '.$datetimemonth.' '.$datetimeday.'</small>
				</div>
			</div>
			';
}
}
echo '</ul></div>';
}
/*}
else echo '<strong class="text-primary" style="margin-left:20px;">You have NO Friends Yet</strong>'; */
}
else echo '<strong class="text-primary" style="margin-left:20px;">You have no friend activity Yet</strong>';}
function status_def($friend_id)
{
include "conxn.php";
$user_id  = $_SESSION['id'];

$query = "SELECT status_seen_by_others,datetime FROM status WHERE user_id = '$friend_id'";
$q_status= mysqli_query($link,$query);	    
 if($user_auth_info = mysqli_num_rows($q_status))
  {
  while($row =  mysqli_fetch_array($q_status,MYSQLI_ASSOC))
  {
  $friend_datetime = strtotime($row["datetime"]);
  $status_seen_by_others = $row["status_seen_by_others"];

  $new_time =  time() - $friend_datetime ;
  
  
  if($status_seen_by_others < 1)
  {
  return '<i class="padding-5 fa fa-circle pull-left" style="color:grey; height:1px; "></i>';
  }
  else
  if($new_time > 600)
  {
	  if($new_time  > 600  AND $new_time  < 3600)
	  {return '<i class="padding-5 fa fa-circle  pull-left" style="color:orange; height:3px; "></i>';}
	  else if($new_time  > 3600)
	  {return '<i class="padding-5 fa fa-circle pull-left" style="color:grey; height:1px; "></i>';}
  }
  else  if($new_time < 600)
  { return '<i class="padding-5 fa fa-circle  pull-left" style="color:green; height:3px; "></i>';
  } 
  } 
  }
}

function status_def_no($friend_id)
{
include "conxn.php";
$user_id  = $_SESSION['id'];

$query = "SELECT status_seen_by_others,datetime FROM status WHERE user_id = '$friend_id'";
$q_status= mysqli_query($link,$query);	    
 if($user_auth_info = mysqli_num_rows($q_status))
  {
  while($row =  mysqli_fetch_array($q_status,MYSQLI_ASSOC))
  {
  $friend_datetime = strtotime($row["datetime"]);

  $new_time =  time() - $friend_datetime ;
   $status_seen_by_others = $row["status_seen_by_others"];
 
 if($status_seen_by_others < 1)
  {
  return '<i class="padding-5 fa fa-circle pull-left" style="color:grey; height:1px; "></i>';
  }
  else
  if($new_time > 600)
  {
	  if($new_time  > 600  AND $new_time  < 10800)
	  {
	   return '2';}
	    else if($new_time  > 10800)
	   {
	    return '3';}
  }
  else  if($new_time < 600)
  {
    return '1';
  } 
  } 
  }
}
function status_def_right($friend_id)
{
include "conxn.php";
$user_id  = $_SESSION['id'];

$query = "SELECT status_seen_by_others,datetime FROM status WHERE user_id = '$friend_id'";
$q_status= mysqli_query($link,$query);	    
 if($user_auth_info = mysqli_num_rows($q_status))
  {
  while($row =  mysqli_fetch_array($q_status,MYSQLI_ASSOC))
  {
  $friend_datetime = strtotime($row["datetime"]); 
  $new_time =  time() - $friend_datetime ;
  $status_seen_by_others = $row["status_seen_by_others"];
  if($status_seen_by_others < 1)
  {
  return '<i class="padding-5 fa fa-circle pull-left" style="color:grey; height:1px; "></i>';
  }
  else
  if($new_time > 600)
  {
	  if($new_time  > 600  AND $new_time  < 3600)
	  {return '<i class="padding-5 fa fa-circle  pull-right" style="color:orange; height:3px; "></i>';}
	  else if($new_time  > 3600)
	  {return '<i class="padding-5 fa fa-circle pull-right" style="color:grey; height:1px; "></i>';}
  }
  else  if($new_time < 600)
  { return '<i class="padding-5 fa fa-circle pull-right" style="color:green; height:3px; "></i>';
  } 
  } 
  }
}
function no_notifs($thisUser)
{
include "conxn.php";
$User = $_SESSION['id'];
$array1[] = array(1,1,1,1,1,1,1,1,1,1);
$array2[] = array(1,1,1,1,1,1,1,1,1,1);
$array3[] = array(1,1,1,1,1,1,1,1,1,1);
$array4[] = array(1,1,1,1,1,1,1,1,1,1);
$array5[] = array(1,1,1,1,1,1,1,1,1,1);

//find last logut time
$logout = "SELECT last_datetime from status where user_id = '$User' ";
$querylogout = mysqli_query($link, $logout);
while($whilelogout = mysqli_fetch_assoc($querylogout))
{
$lastOut = $whilelogout['last_datetime'];
}

$max =105;	
$all_friends = array();
$sql = "SELECT account_id FROM friends WHERE friend_id='$thisUser' AND value='1'";
$query = mysqli_query($link,$sql);

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
$new =  $row["account_id"];
array_push($all_friends,$new);
}
$sql = "SELECT friend_id FROM friends WHERE account_id='$thisUser' AND value='1'";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
$new = $row["friend_id"];
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
$myFrnds[] = $row['id'];
}
//convert array to string
$range = '(' . implode(",",$myFrnds) . ')';

//select friend subscribed to shop
$sql4 = "SELECT count(id) FROM subscribers WHERE user_id IN $range AND datetime > '$lastOut'";  
$query4 = mysqli_query($link,$sql4);
$query_count = mysqli_fetch_row($query4);
  $shop_count = $query_count[0].' -';

//friend count at friend col......
$sql5 = "SELECT count(id)
FROM friends WHERE friend_id IN $range AND account_id NOT IN $range AND value = '1' AND datetime > '$lastOut'";  
$query4user_info = mysqli_query($link,$sql5);
$query_count1 = mysqli_fetch_row($query4user_info);
  $friend_count = $query_count1[0].' -';

//friend count at user col......
$sql51 = "SELECT count(id)
FROM friends WHERE friend_id IN $range AND  value = '0' AND datetime > '$lastOut'";  
$query4user_info1 = mysqli_query($link,$sql51);
$query_count11 = mysqli_fetch_row($query4user_info1);
  $friend_count1 = $query_count11[0].'- '; 

//friend count at both cols......
$sql0= "SELECT count(id)
FROM friends WHERE account_id IN $range  AND  friend_id IN $range AND  value = '1' AND datetime > '$lastOut'";  
$query4user_info0 = mysqli_query($link,$sql0);
$query_count0 = mysqli_fetch_row($query4user_info0);
  $friend_count0 = $query_count0[0].'- '; 
  
  
//friend count comments at you......
$sql1= "SELECT count(id) FROM reply WHERE post_user_id = '$thisUser'  AND datetime > '$lastOut'";  
$query4user_info6 = mysqli_query($link,$sql1);
$query_count6 = mysqli_fetch_row($query4user_info6);
  $friend_count6 = $query_count6[0].'- '; 

$new_result = $shop_count + $friend_count + $friend_count0 +  $friend_count1 +  $friend_count6 ;
echo $new_result;
}
else{
echo '0';
}
}

function no_of_total_notifs_n_req($user_id)
{

$one_no = no_notifs($user_id);
$one_wo = get_no_of_friends($user_id);

$new_result = $one_no + $one_wo;
if($new_result >= 1)
{
 echo '1+';

}
else
{
ECHO '0';
}
}
function chat_box($user_id)
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
	<ul id="chat-users"style="width:240px;"> // get_onlinefriendnames($user_id)
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

function all_reevs_0ld()
{
include "include/conxn.php";

$query = "SELECT * FROM account_comment ORDER BY RAND() LIMIT 15";

$query_add = mysqli_query($link,$query);
if($query_galleryUser = mysqli_num_rows($query_add)>=1)
{
echo '<input type="hidden" id="userNum" value="'.$query_galleryUser.'" />
<script> var userNom = $("#userNum").val();
document.getElementById("galleryUser").innerHTML = userNom; 
</script>';

while($products = mysqli_fetch_assoc($query_add))
{
$image_loc = safe_input($products['image_loc']); 
$id = safe_input($products['id']);
$comm1 = $products['comment']; 
 $comment_box_reev = substr($comm1, 0, 65).'...';
$query = "SELECT COUNT(id) FROM reply WHERE post_id = '$id'  AND post_user_id = '0'    
";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$comment_count = $query_count[0];

if( $comment_count == 0 )
{ $com_count = '';
}
else
{ $com_count = '<b class="btn btn-xs btn-danger " style="border-radius:14px; margin-bottom:-10px; margin-right:-15px; position:absolute;">'.$comment_count.'</b>';
}
if( $image_loc != '')
{ echo
'<div class="superbox-list" id="superbox_list'.$id.'" style="width:auto;">
           
			<img src="/img/comments_images/'.$image_loc.'.gif"  title="'.$id.'" class="img img-rounded favicon"  id="posidid'.$id.'" value="'.$id.'"  style="  height:100px; width:auto;"/></input>
			<p><a href="/reev_load/'.$id.'">view GIF</a></p>
		</div>
		</div>
';
}
else if($image_loc =='')
{ 
echo
'<div class="superbox-list well well-light" id="superbox_list'.$id.' " style="vertical-align:top; height:110px; width:100px;" ><small id="collxn'.$id.'"> '. $com_count.'</small>
            <span  class=" font-xs"  id="posidid'.$id.'"  style=""> '.$comment_box_reev.'</span>
			<input type="hidden" value="" id="spbox'.$id.'"></input>
		</div>
	</div>
';
}
else {
echo '<center style="" >
<p class="headline " style="color:black; font-size:1.8em;">Get Updates From Businesses Here.
</p>
<p style="">
Start by subscribing to a business below.  
</p>Or<p style="">
Search for a business you know.
</p>
</center>';
}
 }
}
else echo '<center style="" >
<p class="headline " style="color:black; font-size:1.5em;"> No Reev yet.
</p>
 <a id="upload_modal_btn" href="javascript:void(0);" data-target="#upload_modal" data-toggle="modal" class="btn btn-default " rel="tooltip"  title="Create from images"> <i class="fa fa-camera"></i> Create your First Reev </a>
</center>';

}
function mail_sug_to_all_0ld($user_id)
{
//collecting suggested friends by mykanta for first login 
 include "conxn.php";	 

$max =505;	
$all_friends = array();
$sql = "SELECT account_id FROM friends WHERE friend_id='$user_id'";
$query = mysqli_query($link,$sql);

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
$new =  $row["account_id"];
array_push($all_friends,$new);
$nulluser = "400";
array_push($all_friends,$nulluser);
array_push($all_friends,$user_id);
}

$sql = "SELECT friend_id FROM friends WHERE account_id='$user_id'";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
$new = $row["friend_id"];
array_push($all_friends,$new );
}

$friendArrayCount = count($all_friends);
if($friendArrayCount > $max)
{ 
array_splice($all_friends, $max);
}

if($friendArrayCount > $max)
{
$friends_view_all_link = '<a href="/view_friends.php?user_id='.$user_id.'">view more</a>';
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
$myFrnds[] = $row['id'];
}
//convert array to string
$range = '(' . implode(",",$myFrnds) . ')';



 // $query1 = "SELECT * FROM registration WHERE country ='Ghana' ORDER BY RAND() LIMIT 0, 20";
  $query1 = "SELECT firstName,username,id FROM registration WHERE id NOT IN $range ORDER BY RAND() LIMIT 10";  
               $query4user1 = mysqli_query($link,$query1);

 while($mysfrn = mysqli_fetch_array($query4user1,MYSQLI_ASSOC))
	 {
	  if($query4 = mysqli_num_rows($query4user1) > 0)
       { 
		 $firstName  = safe_input($mysfrn['firstName']);
		 $username1  = $mysfrn['username'];
		 $friends_able_id  = $mysfrn['id'];
		 $username = substr($username1, 0, 8). '..';
		// if (get_friend_no_of_reev_proc($friends_able_id) >= 1)
		// {
  echo   '
  
	
	<span ><img src="/img/avatars/',get_raw_profile_pic_friend($friends_able_id),'" class=" img-thumbnail img-circle" width="auto;"title="Avatar" style="margin-top:6px; position:absolute; height:40px;"/> </span>
	
	<span style="margin-left:60px; margin-top:50px;"><a class="" href="/connection-auth/'.$username1.'" title="'.$username1.'"> '.ucwords($username1).'</a></span>
		  
	 <span id ="accept_friend_box'.$friends_able_id.'" class="marging-10 padding-10" style="margin-left:10px;  display: inline-block;
    padding-right: 15px;
    padding-left: 6px;">
		 <button type="" class="btn-success btn-disabled" style="">
		 <div class=" no-padding" style="">
			   <span class="  text-default"title="Connections"> <i class="fa fa-group " ></i> ',get_friendnames_no_badge($friends_able_id),'</span>
			   <span class="padding-5  text-default"title="Connected">  <span style="font-style:bold;"> GIF </span>',get_friend_no_of_reev($friends_able_id) ,' </span>
		 </div>
		  </button>
		 <span style="margin-left:10px; margin-top:50px;"><a class="" href="/connection-auth/'.$username1.'" title="'.$username1.'"> Add Friend</a></span>
		</span><br>
	
	';
	//}
	
	}				  
else 
{

  echo ' <h5 class="padding-10 text-primary" >No Suggestions!</h5>';

}
}

		
}
}
function mail_sug($id)
{
//collecting suggested friends by mykanta for first login 
 include "conxn.php";	 
  $user_id  = safe_input($_SESSION['id']);
$main_user_id  = safe_input($_SESSION['id']);
$max =505;	
$all_friends = array();
$sql = "SELECT account_id FROM friends WHERE friend_id='$user_id'";
$query = mysqli_query($link,$sql);

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
$new =  $row["account_id"];
array_push($all_friends,$new);
$nulluser = "400";
array_push($all_friends,$nulluser);
array_push($all_friends,$user_id);
}

$sql = "SELECT friend_id FROM friends WHERE account_id='$user_id'";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
$new = $row["friend_id"];
array_push($all_friends,$new );
}

$friendArrayCount = count($all_friends);
if($friendArrayCount > $max)
{ 
array_splice($all_friends, $max);
}

if($friendArrayCount > $max)
{
$friends_view_all_link = '<a href="/view_friends.php?user_id='.$user_id.'">view more</a>';
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
$myFrnds[] = $row['id'];
}
//convert array to string
$range = '(' . implode(",",$myFrnds) . ')';



 // $query1 = "SELECT * FROM registration WHERE country ='Ghana' ORDER BY RAND() LIMIT 0, 20";
  $query1 = "SELECT firstName,username,id FROM registration WHERE id NOT IN $range ORDER BY RAND() LIMIT 5";  
               $query4user1 = mysqli_query($link,$query1);

 while($mysfrn = mysqli_fetch_array($query4user1,MYSQLI_ASSOC))
	 {
	  if($query4 = mysqli_num_rows($query4user1) > 0)
       { 
		 $firstName  = safe_input($mysfrn['firstName']);
		 $username1  = $mysfrn['username'];
		 $friends_able_id  = $mysfrn['id'];
		 $username = substr($username1, 0, 8). '..';
		// if (get_friend_no_of_reev_proc($friends_able_id) >= 1)
		// {
  echo   '
   <li class="padding-5" style="width:auto;">
	<ul class="list-inline " style="">
	  <li class="" style="width:50px;">
	
		  <span ><img src="/img/avatars/',get_raw_profile_pic_friend($friends_able_id),'" class=" img-thumbnail img-circle" width="auto;"title="Avatar" height="40px;" style="margin-top:6px; position:absolute; height:48px;"/> </span><span style="margin-left:60px; margin-top:50px;"><a class="" href="/connection-auth/'.$username1.'" title="'.$username1.'"> '.ucwords($username1).'</a></span>
		  
		
		
	  </li>
	  <li id ="accept_friend_box'.$friends_able_id.'" class="marging-10 padding-10" style="margin-left:55px;     display: inline-block;
    padding-right: 15px;
    padding-left: 6px;">
		 <button type="" class="btn-default btn-disabled" style="">
		 <div class=" no-padding" style="">
			   <span class="  text-default"title="Connections"> <i class="fa fa-group " ></i> ',get_friendnames_no_badge($friends_able_id),'</span>
			   <span class="padding-5  text-default"title="Connected">  <span style="font-style:bold;"> GIF </span>',get_friend_no_of_reev($friends_able_id) ,' </span>
		 </div>
		  </button>
		  <input type="submit"  onClick="add_friend_sug('.$friends_able_id .');" value="Add" class="btn-success">
		</input>
	  </li>
	 </ul>
</li>
	';
	//}
	
	}				  
else 
{

  echo ' <h5 class="padding-10 text-primary" >No Suggestions!</h5>';

}
}

		
}
}

function friend_sug()
{
//collecting suggested friends by mykanta for first login 
 include "conxn.php";	 
  $user_id  = safe_input($_SESSION['id']);
$main_user_id  = safe_input($_SESSION['id']);
$max =505;	
$all_friends = array();
$sql = "SELECT account_id FROM friends WHERE friend_id='$user_id'";
$query = mysqli_query($link,$sql);

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
$new =  $row["account_id"];
array_push($all_friends,$new);
$nulluser = "400";
array_push($all_friends,$nulluser);
array_push($all_friends,$user_id);
}

$sql = "SELECT friend_id FROM friends WHERE account_id='$user_id'";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
$new = $row["friend_id"];
array_push($all_friends,$new );
}

$friendArrayCount = count($all_friends);
if($friendArrayCount > $max)
{ 
array_splice($all_friends, $max);
}

if($friendArrayCount > $max)
{
$friends_view_all_link = '<a href="/view_friends.php?user_id='.$user_id.'">view more</a>';
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
$myFrnds[] = $row['id'];
}
//convert array to string
$range = '(' . implode(",",$myFrnds) . ')';



 // $query1 = "SELECT * FROM registration WHERE country ='Ghana' ORDER BY RAND() LIMIT 0, 20";
  $query1 = "SELECT firstName,username,id FROM registration WHERE id NOT IN $range ORDER BY RAND() LIMIT 5";  
               $query4user1 = mysqli_query($link,$query1);

 while($mysfrn = mysqli_fetch_array($query4user1,MYSQLI_ASSOC))
	 {
	  if($query4 = mysqli_num_rows($query4user1) > 0)
       { 
		 $firstName  = safe_input($mysfrn['firstName']);
		 $username1  = $mysfrn['username'];
		 $friends_able_id  = $mysfrn['id'];
		 $username = substr($username1, 0, 8). '..';
		// if (get_friend_no_of_reev_proc($friends_able_id) >= 1)
		// {
  echo   '
   <li class="padding-5" style="width:auto;">
	<ul class="list-inline " style="">
	  <li class="" style="width:50px;">
	
		  <span ><img src="/img/avatars/',get_raw_profile_pic_friend($friends_able_id),'" class=" img-thumbnail img-circle" width="auto;"title="Avatar" height="40px;" style="margin-top:6px; position:absolute; height:48px;"/> </span><span style="margin-left:60px; margin-top:50px;"><a class="" href="/connection-auth/'.$username1.'" title="'.$username1.'"> '.ucwords($username1).'</a></span>
		  
		
		
	  </li>
	  <li id ="accept_friend_box'.$friends_able_id.'" class="marging-10 padding-10" style="margin-left:55px;     display: inline-block;
    padding-right: 15px;
    padding-left: 6px;">
		 <button type="" class="btn-default btn-disabled" style="">
		 <div class=" no-padding" style="">
			   <span class="  text-default"title="Connections"> <i class="fa fa-group " ></i> ',get_friendnames_no_badge($friends_able_id),'</span>
			   <span class="padding-5  text-default"title="Connected">  <span style="font-style:bold;"> GIF </span>',get_friend_no_of_reev($friends_able_id) ,' </span>
		 </div>
		  </button>
		  <input type="submit"  onClick="add_friend_sug('.$friends_able_id .');" value="Add" class="btn-success">
		</input>
	  </li>
	 </ul>
</li>
	';
	//}
	
	}				  
else 
{

  echo ' <h5 class="padding-10 text-primary" >No Suggestions!</h5>';

}
}

		
}
}

function friend_req()
{
//collecting friends that sent you a connection request by 
 include "conxn.php";	 
 
 $user_id  = safe_input($_SESSION['id']);
$main_user_id  = safe_input($_SESSION['id']);

$query = "SELECT id,friend_id FROM friends WHERE account_id = '$main_user_id' and value = '0' LIMIT  0 , 20";

$query4user_info = mysqli_query($link,$query);
if($query4 = mysqli_num_rows($query4user_info))
{ 
while($mysfrn = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
		 {
		   $friend_id  = safe_input($mysfrn['friend_id']);
		   $friends_able_id = safe_input($mysfrn['id']);

	           $query1 = "SELECT * FROM `registration` WHERE `id` = '$friend_id' LIMIT 1";
               $query4user1 = mysqli_query($link,$query1);
               while($mysfrn = mysqli_fetch_array($query4user1,MYSQLI_ASSOC))
		         {
		             $firstName  = safe_input($mysfrn['firstName']);
		             $username1  = $mysfrn['username'];
     		         $username = substr($username1, 0, 8). '';
     		  echo   '
				<ul class="list-inline no-padding " style="list-style:inline; bg-color:white;">
				  <li class="padding-10">
				    <img class=" img-circle" width="25"  style="margin-top:-8px; " src="',get_profile_pic_only_name($friend_id),'"  title="'.$username.'" alt="'.$username.'" /> <a href="/connection-auth/'.$username1.'" title="'.$username.'" class="text-muted">'.$username.'</a>
				  </li>
				  <li id ="accept_friend_box'.$friends_able_id.'" style="margin-right:10px; cursor:pointer;" class="  padding-10">
					 <em  onClick="rfus_friend('.$friends_able_id .')"style="cursor:pointer;" value="hide"class="text-muted">
                     hide </em>
					 <a  onClick="accept_friend('.$friends_able_id .')"style="cursor:pointer;" value="Accept "class="text-success">
                    Accept</a>
				  </li>
		    	</ul>';
                }				  
		 }
}
else echo ' <h6 class="padding-10 text-muted" >No requests!</h6>';
		
	
}
function get_products_no($shop_id)
{
include "conxn.php";

$query = "SELECT COUNT(product_id) FROM product WHERE shop_id = '$shop_id' AND mode >= 1";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];
echo $view_count;
}

function place_order_list_c($shop_id,$order_code)
{
include "conxn.php";
$query = " SELECT * FROM cart_vis WHERE shop_id = '$shop_id' AND order_code = '$order_code' ";

if($query1 = mysqli_query($link,$query))
{
	while($products = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
			{
	 $cart_id = safe_input($products['cart_id']);
	 $option_id = safe_input($products['option_id']);
	 $cart_qty_stock = safe_input($products['stock']);
	 $query_op = " SELECT * FROM product_option where id = '$option_id'";
				$query_sq = mysqli_query($link,$query_op);
					if(mysqli_num_rows($query_sq))
					  {		
					   while($op = mysqli_fetch_array($query_sq,MYSQLI_ASSOC))		
						{ 		
						$product_id = $products['product_id'];
						$price = $op['price'];
						$option_id2 = safe_input($op['id']);
						// stock and quantity
						$maximum_order = safe_input($op['stock']); 
						//$stock = safe_input($op['stock']); 
						$stock = $cart_qty_stock;
						$spec_option = $op['spec_option']; 
						 
						$query_name = " SELECT * FROM product where product_id = '$product_id'";
						$query_sql = mysqli_query($link,$query_name);
						if(mysqli_num_rows($query_sql))
						  {	

											  
							while($products = mysqli_fetch_array($query_sql,MYSQLI_ASSOC))		
							{	
							 $product_id2 = $products['product_id'];
							 $prdt_name = safe_input($products['name']);
							 $prdt_name_format= formatUrl($prdt_name);
							 $prduct_name_short = substr($prdt_name, 0, 26). '..';
							 $prduct_name_1 = strtolower($prduct_name_short);
							 $prduct_name_ok = ucwords($prdt_name_format);

								echo '
								<tr>
								<td class="">'.$prduct_name_ok.' </td>
								<td class=""><span class="text-muted"> '.$spec_option.'</span></td>
								<td class="text-default" id="price_cell'.$product_id2.'">GHS '.price_figure($price).'</td>
								<td class="text-muted">'.$cart_qty_stock.'</td>
								<td class="text-default">GHS '.price_figure($price * $stock).'</td>
								</tr>
								'; 
								}
										  

							}
						}
					}
			}
}

else {echo "No item added to cart.";}
}

function place_order_list_c_vis($shop_id,$order_code)
{
include "conxn.php";
$query = " SELECT * FROM cart_vis WHERE shop_id = '$shop_id' AND order_code = '$order_code' ";

if($query1 = mysqli_query($link,$query))
{
	while($products = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
			{
	 $cart_id = safe_input($products['cart_id']);
	 $option_id = safe_input($products['option_id']);
	 $cart_qty_stock = safe_input($products['stock']);
	 $query_op = " SELECT * FROM product_option where id = '$option_id'";
				$query_sq = mysqli_query($link,$query_op);
					if(mysqli_num_rows($query_sq))
					  {		
					   while($op = mysqli_fetch_array($query_sq,MYSQLI_ASSOC))		
						{ 		
						$product_id = $products['product_id'];
						$price = $op['price'];
						$option_id2 = safe_input($op['id']);
						// stock and quantity
						$maximum_order = safe_input($op['stock']); 
						//$stock = safe_input($op['stock']); 
						$stock = $cart_qty_stock;
						$spec_option = $op['spec_option']; 
						 
						$query_name = " SELECT * FROM product where product_id = '$product_id'";
						$query_sql = mysqli_query($link,$query_name);
						if(mysqli_num_rows($query_sql))
						  {	

											  
							while($products = mysqli_fetch_array($query_sql,MYSQLI_ASSOC))		
							{	
							 $product_id2 = $products['product_id'];
							 $prdt_name = safe_input($products['name']);
							 $prdt_name_format= formatUrl($prdt_name);
							 $prduct_name_short = substr($prdt_name, 0, 26). '..';
							 $prduct_name_1 = strtolower($prduct_name_short);
							 $prduct_name_ok = ucwords($prdt_name_format);

								echo '
								<tr>
								<td class="">'.$prduct_name_ok.' </td>
								<td class=""><span class="text-muted"> '.$spec_option.'</span></td>
								<td class="text-default" id="price_cell'.$product_id2.'">GHS '.price_figure($price).'</td>
								<td class="text-muted">'.$cart_qty_stock.'</td>
								<td class="text-default">GHS '.price_figure($price * $stock).'</td>
								</tr>
								'; 
								}
										  

							}
						}
					}
			}
}

else {echo "No item added to cart.";}
} 
function place_order_list($shop_id)
{
include "conxn.php";
include "include/sessionfile.php"; 

$user_id = $_SESSION['id'];
$query = " SELECT * FROM cart_vis where account_id = '$user_id' AND shop_id = '$shop_id' AND order_code = '0' ";
$query1 = mysqli_query($link,$query);

if($query_add = mysqli_num_rows($query1))
	{		
			while($products = mysqli_fetch_array($query1,MYSQLI_ASSOC))		
			{
	 $cart_id = safe_input($products['cart_id']);
	 $option_id = safe_input($products['option_id']);
	 $cart_qty_stock = safe_input($products['stock']);
	$query_op = " SELECT * FROM product_option where id = '$option_id'";
				$query_sq = mysqli_query($link,$query_op);
					if(mysqli_num_rows($query_sq))
					  {		
					   while($op = mysqli_fetch_array($query_sq,MYSQLI_ASSOC))		
						{ 		
						$product_id = $products['product_id'];
						$price = $op['price'];
						$option_id2 = safe_input($op['id']);
						// stock and quantity
						$maximum_order = safe_input($op['stock']); 
						//$stock = safe_input($op['stock']); 
						$stock = $cart_qty_stock;
						$spec_option = $op['spec_option']; 
						 
						$query_name = " SELECT * FROM product where product_id = '$product_id'";
						$query_sql = mysqli_query($link,$query_name);
						if(mysqli_num_rows($query_sql))
						  {	

											  
							while($products = mysqli_fetch_array($query_sql,MYSQLI_ASSOC))		
							{	
							 $product_id2 = $products['product_id'];
							 $prdt_name = safe_input($products['name']);
							 $prdt_name_format= formatUrl($prdt_name);
							 $prduct_name_short = substr($prdt_name, 0, 26). '..';
							 $prduct_name_1 = strtolower($prduct_name_short);
							 $prduct_name_ok = ucwords($prdt_name_format);

								echo '
								style="font-size:0.8em;">
								<td class="">'.$prduct_name_ok.' </td>
								<td class=""><span class="text-info"> '.$spec_option.'</span></td>
								<td class="text-warning" id="price_cell'.$product_id2.'">GHS '.price_figure($price).'</td>
								<td>'.$cart_qty_stock.'</td>
								<td class="text-warning">GHS '.price_figure($price * $stock).'</td>
								
								'; 
								}
										  

							}
						}
					}
			}

	}
	else {echo "No item added to cart.";}
} 
function appointment_list($shop_id)
{
include "conxn.php";
 $user_id = $_SESSION['id'];
 
 //calling order lists that are not yet worked on - Pending mode
		$new_Query = "SELECT * FROM serv_appointments where shop_id  = '$shop_id' AND mode ='1'  ";
		if($query_add0 = mysqli_query($link,$new_Query))
			{
				if($query_add = mysqli_num_rows($query_add0))
				{
			while($details = mysqli_fetch_assoc($query_add0))
				{
				$order_id =  $details['id'];
				 $client_id =  $details['user_id'];
				$order_code = $details['app_code'];
				 $mode =       $details['mode'];
				$appoint_text =   $details['appoint_text'];
				$pickup_date =   $details['app_date'];
				
					
                     //this is when the person wants to pick up goods so both data_time and pickup_date are all not empty!
					if(!empty($pickup_date) && !empty($appoint_text))
						{
						echo '
						<div class="padding-10" style="background-color:#f8f8f8;" id="place_order_update'.$order_id.'">
						<div class="row padding-10 ">
						<div class="col-sm-4 ">
						<h4 class="padding-bottom-5 text-primary">Appointment</h4>
						
						<p class="text-muted">Date for appointment: <span style="color:black">'.$pickup_date.'</span> </p>
						<p class="text-muted">Appointment Code :<span style="color:black"> '.$order_code.'</span></p>
						<br>
					</div >
						<div class="col-sm-8">
						<p class="text-primary"> Details</p>
						<p class=""> <span style="color:black"> '.ucwords($appoint_text).'</span></p>
						</div></div >
						</div ><br>
						
						';
						}
                    //this is when the person wants goods to be delivered so only date_time was filled!		
					
						

				}
				} else{echo '<label class="padding-10 text-danger">No Pending Request</label>';} 
			}
			
			 
			 
 //calling order lists that are confirmed - approved mode -1-
$new_Query = "SELECT * FROM serv_appointments where shop_id  = '$shop_id' AND mode ='2'  ";
if($query_add0 = mysqli_query($link,$new_Query))
	{
	while($details = mysqli_fetch_assoc($query_add0))
		{
		$order_id =  $details['id'];
		 $client_id =  $details['user_id'];
		$order_code = $details['app_code'];
		 $mode =       $details['mode'];
		$appoint_text =   $details['appoint_text'];
		$pickup_date =   $details['app_date'];
					

if(!empty($pickup_date) && !empty($appoint_text))
	{
	echo '
			<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;">
			 <h4 class="text-Default"><img src="/img/site_img/approved.png" height="25"  title="approved" alt="approved" /> Pick-up Deal <span style="font-size:0.7em;" class="text-success">Approved.</span></h4>
			    <small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;" class="pull-right">View Information</a></small>
			</blockquote></div>';
}
else
	{									
	echo '
	<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;">
	 <h4 class="text-Default"><img src="/img/site_img/approved.png"  title="approved" alt="approved" height="25"/> Delivery Deal <span style="font-size:0.7em;" class="text-success">Approved.</span></h4>
	   <small>Date : <cite title="Source Title">'.$datetime.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
	</blockquote></div>';
	  }

				}
			}
		
			 
			 
	//calling order lists that are not confirmed or deleted -0-
		$new_Query = "SELECT * FROM serv_appointments where shop_id  = '$shop_id' AND mode ='0'  ";
		if($query_add0 = mysqli_query($link,$new_Query))
			{
			while($details = mysqli_fetch_assoc($query_add0))
				{
				$order_id =  $details['id'];
				 $client_id =  $details['user_id'];
				$order_code = $details['app_code'];
				 $mode =       $details['mode'];
				$appoint_text =   $details['appoint_text'];
				$pickup_date =   $details['app_date'];
				//user
			

if(!empty($pickup_date) && !empty($appoint_text))
{
echo '
<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;" >
 <h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25"  title="cancelled" alt="cancelled"/> Pick-up Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4>
  <small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
</blockquote></div>';
}
else{


echo '
<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;" >
<h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25"  title="cancelled" alt="cancelled"/> Delivery Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4>
<small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
</blockquote></div>';


}
					

				}
			}
			
}
function appointment_list_visitor($shop_id)
{
include "conxn.php";
//calling order lists that are not yet worked on - Pending mode
		$new_Query = "SELECT * FROM serv_appointments_vis where shop_id  = '$shop_id' AND mode ='1'  ";
		if($query_add0 = mysqli_query($link,$new_Query))
			{
				if($query_add = mysqli_num_rows($query_add0))
				{	
			while($details = mysqli_fetch_assoc($query_add0))
				{
				$order_id =  $details['id'];
				 $client_id =  $details['user_id'];
				$order_code = $details['app_code'];
				 $mode =       $details['mode'];
				$appoint_text =   $details['appointment_text'];
				$pickup_date =   $details['app_date'];
				
					
                     //this is when the person wants to pick up goods so both data_time and pickup_date are all not empty!
					if(!empty($pickup_date) && !empty($appoint_text))
						{
						echo '
						<div class="padding-10" style="background-color:#f8f8f8;" id="place_order_update'.$order_id.'">
						<div class="row padding-10 ">
						<div class="col-sm-4 ">
						<h4 class="padding-bottom-5 text-primary">Appointment</h4>
						
						<p class="text-muted">Date for appointment: <span style="color:black">'.$pickup_date.'</span> </p>
						<p class="text-muted">Appointment Code :<span style="color:black"> '.$order_code.'</span></p>
						<br>
					</div >
						<div class="col-sm-8">
						<p class="text-primary"> Details</p>
						<p class=""> <span style="color:black"> '.ucwords($appoint_text).'</span></p>
						</div></div >
						</div ><br>
						
						';
						}
                    //this is when the person wants goods to be delivered so only date_time was filled!		
					
						

				}
				} else{echo '<label class="padding-10 text-danger">No Pending Request</label>';} 
			}
		  
			 
			 
 //calling order lists that are confirmed - approved mode -1-
$new_Query = "SELECT * FROM serv_appointments_vis where shop_id  = '$shop_id' AND mode ='2'  ";
if($query_add0 = mysqli_query($link,$new_Query))
	{
	while($details = mysqli_fetch_assoc($query_add0))
		{
		$order_id =  $details['id'];
		 $client_id =  $details['user_id'];
		$order_code = $details['app_code'];
		 $mode =       $details['mode'];
		$appoint_text =   $details['appoint_text'];
		$pickup_date =   $details['app_date'];
					

if(!empty($pickup_date) && !empty($appoint_text))
	{
	echo '
			<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;">
			 <h4 class="text-Default"><img src="/img/site_img/approved.png" height="25"  title="approved" alt="approved"/> Pick-up Deal <span style="font-size:0.7em;" class="text-success">Approved.</span></h4>
			    <small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;" class="pull-right">View Information</a></small>
			</blockquote></div>';
}
else
	{									
	echo '
	<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;">
	 <h4 class="text-Default"><img src="/img/site_img/approved.png" height="25"  title="approved" alt="approved"/> Delivery Deal <span style="font-size:0.7em;" class="text-success">Approved.</span></h4>
	   <small>Date : <cite title="Source Title">'.$datetime.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
	</blockquote></div>';
	  }

				}
			}
			
			 
			 
	//calling order lists that are not confirmed or deleted -0-
		$new_Query = "SELECT * FROM serv_appointments_vis where shop_id  = '$shop_id' AND mode ='0'  ";
		if($query_add0 = mysqli_query($link,$new_Query))
			{
			while($details = mysqli_fetch_assoc($query_add0))
				{
				$order_id =  $details['id'];
				 $client_id =  $details['user_id'];
				$order_code = $details['app_code'];
				 $mode =       $details['mode'];
				$appoint_text =   $details['appoint_text'];
				$pickup_date =   $details['app_date'];
				//user
			

if(!empty($pickup_date) && !empty($appoint_text))
{
echo '
<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;" >
 <h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25"  title="cancelled" alt="cancelled"/> Pick-up Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4>
  <small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
</blockquote></div>';
}
else{


echo '
<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;" >
<h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25" title="cancelled" alt="cancelled"/> Delivery Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4>
<small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
</blockquote></div>';


}
					

				}
			}
			 
}

function order_list($shop_id)
{
include "conxn.php";
 $user_id = $_SESSION['id'];
 
 //calling order lists that are not yet worked on - Pending mode
		$new_Query = "SELECT * FROM place_order where shop_id  = '$shop_id' AND mode ='pending'  ";
		if($query_add0 = mysqli_query($link,$new_Query))
			{
			while($details = mysqli_fetch_assoc($query_add0))
				{
				$order_id =  $details['id'];
				 $client_id =  $details['user_id'];
				$order_code = $details['order_code'];
				 $mode =       $details['mode'];
				$datetime =   $details['datetime'];
				$pickup_date =   $details['pickup_date'];
				//user
				$query = "SELECT * FROM billing_info where user_id = '$client_id'  ";
				if($query_add = mysqli_query($link,$query))
					{
					while($details = mysqli_fetch_assoc($query_add))
						{
						$firstname = $details['firstname'];
						$lastname = $details['lastname'];
						$user_email = $details['bill_email'];
						$user_city = $details['city'];
						$user_telephone = $details['telephone'];
						$addressline1 = $details['addressline1'];
						$addressline2 = $details['addressline2'];
						$user_region = $details['region'];
						$user_country = $details['country'];
					
                     //this is when the person wants to pick up goods so both data_time and pickup_date are all not empty!
					if(!empty($pickup_date) && !empty($datetime))
						{
						echo '
						<div class="padding-10" style="background-color:#f8f8f8;" id="place_order_update'.$order_id.'">
						<div class="row padding-10 ">
						<div class="col-sm-5 ">
						<h4 class="padding-bottom-5 text-primary">Pick Up Order</h4>
						<p >An order has been made by '.ucwords($firstname).'.</p><p> Below are details of the order.</p>
						<p class="text-muted">Pick up Date: <span style="color:black">'.$pickup_date.'</span> </p><p class="text-muted"> Pick up Time: <span style="color:black">'.$datetime.'</span></p>
						<p class="text-muted">Transaction Code :<span style="color:black"> '.$order_code.'</span></p>
						<br>
						<p class="text-primary"> Buyer Details</p>
						<p class="text-muted">Full name :  <span style="color:black"> '.ucwords($firstname).' '.ucwords($lastname).' </span></p>
						<p class="text-muted">Telephone :  <span style="color:black"> '.$user_telephone.' </span></p>
						<p class="text-muted">Email :  <span style="color:black"> '.$user_email.'</span></p>
						<p class="text-muted">Address Line 1 :  <span style="color:black"> '.ucwords($addressline1).' </span></p>
						<p class="text-muted">Address Line 2:  <span style="color:black"> '.ucwords($addressline2).'</span> </p>
						<p class="text-muted">Country : <span style="color:black">'.ucwords($user_country).' </span>  Region : <span style="color:black">'.ucwords($user_region).'</span>  City : <span style="color:black">'.ucwords($user_city).' </span></p>
						</div >
						<div class="col-sm-7">
						
						 <p class="text-primary">Order Details</p>
						<table class="table" style="font-size:1.0em;" cell-padding="0" cell-spacing="0">
						<tr class="text-muted">
								<td >Product Name</td>
								<td >Type</td>
								<td >Price</td>
								<td>Qty.</td>
								<td> Total </td>
							</tr>
						',place_order_list_c($shop_id,$order_code),'
								<tr>
							<td class="text-muted">Total </td>
							<td> </td>
							<td class="hidden-xs hidden-sm"> </td>
							<td class="hidden-xs hidden-sm"> </td>
							<td >GHS ',total_cost_items_mails_order_list($shop_id,$order_code),'</td>		</tr>
						</table>
						</div></div >
						<div class="row " >
						<div class="  padding-10 pull-right" >
						  
							<input type="submit"  onClick="cancelled('.$order_id .')" value="Cancel Order"class="btn-default ">
							  </input> 
							  
							  <input type="submit"  onClick="approved('.$order_id.')" value="Approve Order" class="btn-primary">
							</input> 
							
							
							  
						</div>
						</div>
						
						</div ><br>
						
						';
					
						}
                    //this is when the person wants goods to be delivered so only date_time was filled!		
					else{
						$query = "SELECT * FROM shop WHERE shop_id = '$shop_id'";
						if($query4user_info = mysqli_query($link,$query))
						{
						while($allpalls_info = mysqli_fetch_assoc($query4user_info))
						{
						$shopName = $allpalls_info['shopName'];
						$countryCode = safe_input($allpalls_info['countryCode']);
						$telephone = safe_input($allpalls_info['telephone']);
						$category = safe_input($allpalls_info['category']);
						$shop_descrb = safe_input($allpalls_info['shop_descrb']);
						$address = safe_input($allpalls_info['address']);
						$country = safe_input($allpalls_info['country']);
						$city = safe_input($allpalls_info['city']);
						$email = safe_input($allpalls_info['email']);
						$shop_id = safe_input($allpalls_info['shop_id']);
						$region = safe_input($allpalls_info['state']);	  
						
						
					echo '
					<div class="padding-10 margin-10" style="background-color:#f8f8f8;" id="place_order_update'.$order_id.'">
						<div class="row padding-10">
						<div class="col-sm-5 ">
						<h4 class="padding-bottom-5 text-primary">Delivery Order</h4>
						<p>'.ucwords($firstname).' wants goods to be delivered to address.</p>
						<p class="text-muted">Transaction Code :<span style="color:black"> '.$order_code.'</span></p>
						<br>
						<p class="text-primary"> Buyer Details</p>
						<p class="text-muted">Full name :  <span style="color:black"> '.ucwords($firstname).' '.ucwords($lastname).' </span></p>
						<p class="text-muted">Telephone :  <span style="color:black"> '.$user_telephone.' </span></p>
						<p class="text-muted">Email :  <span style="color:black"> '.$user_email.'</span></p>
						<p class="text-muted">Address Line 1 :  <span style="color:black"> '.ucwords($addressline1).' </span></p>
						<p class="text-muted">Address Line 2:  <span style="color:black"> '.ucwords($addressline2).'</span> </p>
						<p class="text-muted">Country : <span style="color:black">'.ucwords($user_country).' </span>  Region : <span style="color:black">'.ucwords($user_region).'</span>  City : <span style="color:black">'.ucwords($user_city).' </span></p>
						</div>
						<div class="col-sm-7">
					        	<p class="text-primary">Order Details</p>
						<table class="table" style="font-size:1.0em;" cell-padding="0" cell-spacing="0">
						<tr>
								<td>Product Name</td>
								<td >Type</td>
								<td >Price</td>
								<td>Qty.</td>
								<td> Total </td>
							</tr>
					',place_order_list_c($shop_id,$order_code),'
								<tr>
							<td>Total </td>
							<td> </td>
							<td class="hidden-xs hidden-sm"> </td>
							<td class="hidden-xs hidden-sm"> </td>
								<td >GHS ',total_cost_items_mails_order_list($shop_id,$order_code),'</td>	</tr>
						</table>
						</div>
						</div>
						  <div class="row " >
							<div class=" padding-10 pull-right" >
						 
						 	  <input type="submit"  onClick="cancelled('.$order_id .')" value="Cancel Order"class="btn-default ">
							  </input> 
							   <input type="submit"  onClick="approved('.$order_id .')" value = "Approve Order" class = "btn-primary" >
							  </input> 

							</div>
						  </div>
						</div><br>
						
						';
						
						}
						}
						}
					
						}
						}
				else{echo "error";}

				}
			}
			 else{echo "1error";} 
			 
			 
 //calling order lists that are confirmed - approved mode -1-
$new_Query = "SELECT * FROM place_order where shop_id  = '$shop_id' AND mode ='1'  ";
if($query_add0 = mysqli_query($link,$new_Query))
	{
	while($details = mysqli_fetch_assoc($query_add0))
		{
		$order_id =  $details['id'];
		 $client_id =  $details['user_id'];
		$order_code = $details['order_code'];
		 $mode =       $details['mode'];
		$datetime =   $details['datetime'];
		$pickup_date =   $details['pickup_date'];
		//user
		$query = "SELECT * FROM billing_info where user_id = '$client_id'  ";
if($query_add = mysqli_query($link,$query))
	{
	while($details = mysqli_fetch_assoc($query_add))
		{
		$firstname = $details['firstname'];
		$lastname = $details['lastname'];
		$user_email = $details['bill_email'];
		$user_city = $details['city'];
		$user_telephone = $details['telephone'];
		$addressline1 = $details['addressline1'];
		$addressline2 = $details['addressline2'];
		$user_region = $details['region'];
		$user_country = $details['country'];
					

if(!empty($pickup_date) && !empty($datetime))
	{
	echo '
			<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;">
			 <h4 class="text-Default"><img src="/img/site_img/approved.png" height="25" title="approved" alt="approved"/> Pick-up Deal <span style="font-size:0.7em;" class="text-success">Approved.</span></h4>
			    <small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;" class="pull-right">View Information</a></small>
			</blockquote></div>';
}
else
	{									
	echo '
	<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;">
	 <h4 class="text-Default"><img src="/img/site_img/approved.png" height="25" title="approved" alt="approved"/> Delivery Deal <span style="font-size:0.7em;" class="text-success">Approved.</span></h4>
	   <small>Date : <cite title="Source Title">'.$datetime.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
	</blockquote></div>';
	  }
}
						}
				else{echo "error";}

				}
			}
			 else{echo "1error";} 
			 
			 
	//calling order lists that are not confirmed or deleted -0-
		$new_Query = "SELECT * FROM place_order where shop_id  = '$shop_id' AND mode ='0'  ";
		if($query_add0 = mysqli_query($link,$new_Query))
			{
			while($details = mysqli_fetch_assoc($query_add0))
				{
				$order_id =  $details['id'];
				 $client_id =  $details['user_id'];
				$order_code = $details['order_code'];
				 $mode =       $details['mode'];
				$datetime =   $details['datetime'];
				$pickup_date =   $details['datetime'];
				//user
				$query = "SELECT * FROM billing_info where user_id = '$client_id'  ";
				if($query_add = mysqli_query($link,$query))
					{
					while($details = mysqli_fetch_assoc($query_add))
						{
						$firstname = $details['firstname'];
						$lastname = $details['lastname'];
						$user_email = $details['bill_email'];
						$user_city = $details['city'];
						$user_telephone = $details['telephone'];
						$addressline1 = $details['addressline1'];
						$addressline2 = $details['addressline2'];
						$user_region = $details['region'];
						$user_country = $details['country'];
					

if(!empty($pickup_date) && !empty($datetime))
{
echo '
<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;" >
 <h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25" title="cancel" alt="cancel"/> Pick-up Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4>
  <small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
</blockquote></div>';
}
else{


echo '
<div style="" id="place_order_update'.$order_id.'"><blockquote style="background-color:#f8f8f8;" >
<h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25" title="cancel" alt="cancel"/> Delivery Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4>
<small>Date : <cite title="Source Title">'.$datetime.'</cite><a type="submit"  onClick="info('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
</blockquote></div>';


}
						
						}
						}
				else{echo "error";}

				}
			}
			 else{echo "1error";}
}

function order_list_visitor($shop_id)
{
include "conxn.php";
 //$user_id = $_SESSION['id'];
 
 //calling order lists that are not yet worked on - Pending mode
		$new_Query = "SELECT * FROM place_order_vis where shop_id  = '$shop_id' AND mode ='pending'  ";
		if($query_add0 = mysqli_query($link,$new_Query))
			{
			while($details = mysqli_fetch_assoc($query_add0))
				{
				$order_id =  $details['id'];
				 $client_id =  $details['user_id_vis'];
				$order_code = $details['order_code'];
				 $mode =       $details['mode'];
				$datetime =   $details['datetime'];
				$pickup_date =   $details['pickup_time_date'];
				//user
				$query = "SELECT * FROM billing_info_vis where user_id_vis = '$client_id'  ";
				if($query_add = mysqli_query($link,$query))
					{
					while($details = mysqli_fetch_assoc($query_add))
						{
						$firstname = $details['firstname'];
						$lastname = $details['lastname'];
						$user_email = $details['bill_email'];
						$user_city = $details['city'];
						$user_telephone = $details['telephone'];
						$addressline1 = $details['addressline1'];
						$addressline2 = $details['addressline2'];
						$user_region = $details['region'];
						$user_country = $details['country'];
					
                     //this is when the person wants to pick up goods so both data_time and pickup_date are all not empty!
					if(!empty($pickup_date) && !empty($datetime))
						{
						echo '
						<div class="padding-10 margin-10" style="background-color:#f8f8f8;" id="place_order_update_vis'.$order_id.'">
						<div class="row padding-10">
						<div class="col-sm-5 ">
							<h4 class="padding-bottom-5 text-primary">Pick Up Order</h4>
						<p >An order has been made by '.ucwords($firstname).'.</p><p> Below are details of the order.</p>
						<p class="text-muted">Pick up Date: <span style="color:black">'.$pickup_date.'</span> </p><p class="text-muted"> Pick up Time: <span style="color:black">'.$datetime.'</span></p>
						<p class="text-muted">Transaction Code :<span style="color:black"> '.$order_code.'</span></p>
						<br>
						
						<p class="text-primary"> Buyer Details</p>
						<p class="text-muted">Full name :  <span style="color:black"> '.ucwords($firstname).' '.ucwords($lastname).' </span></p>
						<p class="text-muted">Telephone :  <span style="color:black"> '.$user_telephone.' </span></p>
						<p class="text-muted">Email :  <span style="color:black"> '.$user_email.'</span></p>
						<p class="text-muted">Address Line 1 :  <span style="color:black"> '.ucwords($addressline1).' </span></p>
						<p class="text-muted">Address Line 2:  <span style="color:black"> '.ucwords($addressline2).'</span> </p>
						<p class="text-muted">Country : <span style="color:black">'.ucwords($user_country).' </span>  Region : <span style="color:black">'.ucwords($user_region).'</span>  City : <span style="color:black">'.ucwords($user_city).' </span></p>
						</div >
						<div class="col-sm-7">
						    <p class="text-primary">Order Details</p>
						<table class="table" style="font-size:1.0em;" cell-padding="0" cell-spacing="0">
						<tr class="text-muted">
								<td >Product Name</td>
								<td >Type</td>
								<td >Price</td>
								<td>Qty.</td>
								<td> Total </td>
							</tr>
						',place_order_list_c_vis($shop_id,$order_code),'
								<tr>
							<td class="text-muted">Total </td>
							<td> </td>
							<td class="hidden-xs hidden-sm"> </td>
							<td class="hidden-xs hidden-sm"> </td>
							<td >GHS ',total_cost_items_mails_order_list_vis($shop_id,$order_code),'</td>		</tr>
						</table>
						</div></div >
						<div class="row " >
						<div class="  padding-10 pull-right" >
						  
							<input type="submit"  onClick="cancelled_vis('.$order_id .')" value="Cancel Order"class="btn-default ">
							  </input> 
							  
							  <input type="submit"  onClick="approved_vis('.$order_id.')" value="Approve Order" class="btn-primary">
							</input> 
							
							
							  
						</div>
						</div>
						
						</div ><br>
						
						';
					
						}
                    //this is when the person wants goods to be delivered so only date_time was filled!		
					else{
						$query = "SELECT * FROM shop WHERE shop_id = '$shop_id'";
						if($query4user_info = mysqli_query($link,$query))
						{
						while($allpalls_info = mysqli_fetch_assoc($query4user_info))
						{
						$shopName = $allpalls_info['shopName'];
						$countryCode = safe_input($allpalls_info['countryCode']);
						$telephone = safe_input($allpalls_info['telephone']);
						$category = safe_input($allpalls_info['category']);
						$shop_descrb = safe_input($allpalls_info['shop_descrb']);
						$address = safe_input($allpalls_info['address']);
						$country = safe_input($allpalls_info['country']);
						$city = safe_input($allpalls_info['city']);
						$email = safe_input($allpalls_info['email']);
						$shop_id = safe_input($allpalls_info['shop_id']);
						$region = safe_input($allpalls_info['state']);	  
						
						
					echo '
					<div class="padding-10 margin-10" style="background-color:#f8f8f8;" id="place_order_update_vis'.$order_id.'">
						<div class="row padding-10">
						<div class="col-sm-6 ">
						<h4 class="padding-bottom-5 text-primary">Delivery Order</h4>
						<p>'.ucwords($firstname).' wants goods to be delivered to address.</p>
						<p class="text-muted">Transaction Code :<span style="color:black"> '.$order_code.'</span></p>
						<br>
						<p class="text-primary"> Buyer Details</p>
						<p class="text-muted">Full name :  <span style="color:black"> '.ucwords($firstname).' '.ucwords($lastname).' </span></p>
						<p class="text-muted">Telephone :  <span style="color:black"> '.$user_telephone.' </span></p>
						<p class="text-muted">Email :  <span style="color:black"> '.$user_email.'</span></p>
						<p class="text-muted">Address Line 1 :  <span style="color:black"> '.ucwords($addressline1).' </span></p>
						<p class="text-muted">Address Line 2:  <span style="color:black"> '.ucwords($addressline2).'</span> </p>
						<p class="text-muted">Country : <span style="color:black">'.ucwords($user_country).' </span>  Region : <span style="color:black">'.ucwords($user_region).'</span>  City : <span style="color:black">'.ucwords($user_city).' </span></p>
						</div>
						<div class="col-sm-6">
						  <p class="text-primary">Order Details</p>
						<table class="table" style="font-size:1.0em;" cell-padding="0" cell-spacing="0">
						<tr>
								<td>Product Name</td>
								<td >Type</td>
								<td >Price</td>
								<td>Qty.</td>
								<td> Total </td>
							</tr>
					',place_order_list_c_vis
					($shop_id,$order_code),'
								<tr>
							<td>Total </td>
							<td> </td>
							<td class="hidden-xs hidden-sm"> </td>
							<td class="hidden-xs hidden-sm"> </td>
								<td >GHS ',total_cost_items_mails_order_list_vis($shop_id,$order_code),'</td>	</tr>
						</table>
						</div>
						</div>
						  <div class="row " >
							<div class=" padding-10 pull-right" >
						 
						 	  <input type="submit"  onClick="cancelled_vis('.$order_id .')" value="Cancel Order"class="btn-default ">
							  </input> 
							   <input type="submit"  onClick="approved_vis('.$order_id .')" value = "Approve Order" class = "btn-primary" >
							  </input> 

							</div>
						  </div>
						</div><br>
						
						';
						
						}
						}
						}
					
						}
						}
				else{echo "error";}

				}
			}
			 else{echo "1error";} 
			 
			 
 //calling order lists that are confirmed - approved mode -1-
		$new_Query = "SELECT * FROM place_order_vis where shop_id  = '$shop_id' AND mode ='1'  ";
		if($query_add0 = mysqli_query($link,$new_Query))
			{
			while($details = mysqli_fetch_assoc($query_add0))
				{
				$order_id =  $details['id'];
				 $client_id =  $details['user_id_vis'];
				$order_code = $details['order_code'];
				 $mode =       $details['mode'];
				$datetime =   $details['datetime'];
				$pickup_date =   $details['pickup_time_date'];
				//user
				$query = "SELECT * FROM billing_info_vis where user_id_vis = '$client_id'  ";
				if($query_add = mysqli_query($link,$query))
					{
					while($details = mysqli_fetch_assoc($query_add))
						{
						$firstname = $details['firstname'];
						$lastname = $details['lastname'];
						$user_email = $details['bill_email'];
						$user_city = $details['city'];
						$user_telephone = $details['telephone'];
						$addressline1 = $details['addressline1'];
						$addressline2 = $details['addressline2'];
						$user_region = $details['region'];
						$user_country = $details['country'];
					

					if(!empty($pickup_date) && !empty($datetime))
						{
						echo '
								<div style="" id="place_order_update_vis'.$order_id.'"><blockquote style="background-color:#f8f8f8;">
								 <h4 class="text-Default"><img src="/img/site_img/approved.png" height="25" title="approved" alt="approved"/> Pick-up Deal <span style="font-size:0.7em;" class="text-success">Approved.</span></h4>
								  <small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info_vis('.$order_id.')" style="cursor:pointer;" class="pull-right">View Information</a></small>
								</blockquote></div>';
						}
						else{
					
						
				echo '
					<div style="" id="place_order_update_vis'.$order_id.'"><blockquote style="background-color:#f8f8f8;">
								 <h4 class="text-Default"><img src="/img/site_img/approved.png" height="25" title="approved" alt="approved"/> Delivery Deal <span style="font-size:0.7em;" class="text-success">Approved.</span></h4>
								  <small>Date : <cite title="Source Title">'.$datetime.'</cite><a type="submit"  onClick="info_vis('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
								</blockquote></div>';
						
						}
					
						}
						}
				else{echo "error no client in billing";}

				}
			}
			 else{echo "no shop in [place_order";} 
			 
			 
	//calling order lists that are not confirmed or deleted -0-
		$new_Query = "SELECT * FROM place_order_vis where shop_id  = '$shop_id' AND mode ='0'  ";
		if($query_add0 = mysqli_query($link,$new_Query))
			{
			while($details = mysqli_fetch_assoc($query_add0))
				{
				$order_id =  $details['id'];
				 $client_id =  $details['user_id_vis'];
				$order_code = $details['order_code'];
				 $mode =       $details['mode'];
				$datetime =   $details['datetime'];
				$pickup_date =   $details['pickup_time_date'];
				//user
				$query = "SELECT * FROM billing_info_vis where user_id_vis = '$client_id'  ";
				if($query_add = mysqli_query($link,$query))
					{
					while($details = mysqli_fetch_assoc($query_add))
						{
						$firstname = $details['firstname'];
						$lastname = $details['lastname'];
						$user_email = $details['bill_email'];
						$user_city = $details['city'];
						$user_telephone = $details['telephone'];
						$addressline1 = $details['addressline1'];
						$addressline2 = $details['addressline2'];
						$user_region = $details['region'];
						$user_country = $details['country'];
					

					if(!empty($pickup_date) && !empty($datetime))
						{
						echo '
								<div style="" id="place_order_update_vis'.$order_id.'"><blockquote style="background-color:#f8f8f8;" >
								 <h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25" title="cancel" alt="cancel"/> Pick-up Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4>
								  <small>Date : <cite title="Source Title">'.$pickup_date.'</cite><a type="submit"  onClick="info_vis('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
								</blockquote></div>';
						}
						else{
					
						
echo '
<div style="" id="place_order_update_vis'.$order_id.'"><blockquote style="background-color:#f8f8f8;" >
<h4 class="text-Default"><img src="/img/site_img/cancelled.png" height="25" title="cancel" alt="cancel"/> Delivery Deal <span style="font-size:0.7em;" class="text-danger">Cancelled.</span></h4>
<small>Date : <cite title="Source Title">'.$datetime.'</cite><a type="submit"  onClick="info_vis('.$order_id.')" style="cursor:pointer;"  class="pull-right">View Information</a></small>
</blockquote></div>';

}
						
						}
						}
				else{echo "error";}

				}
			}
			 else{echo "1error";}
}

function total_cost_items_mails_order_list($shop_id_mail,$order_code)
{
include "conxn.php";
$user_id = $_SESSION['id'];
//$option = total_cost_items_b_mails($shop_id_mail);  
$query_op = " SELECT sum(option_total)as total FROM cart_vis where order_code = '$order_code'";
if( $query_add = mysqli_query($link,$query_op))
  {		
   while($op = mysqli_fetch_assoc($query_add))		
	{     
	 $price = $op['total'];
	}return price_figure($price);
  }
  else echo "no item added to cart";
}
function total_cost_items_mails_order_list_vis($shop_id_mail,$order_code)
{
include "conxn.php";
$user_id = $_SESSION['id'];
//$option = total_cost_items_b_mails($shop_id_mail);  
$query_op = " SELECT sum(option_total)as total FROM cart_vis where order_code = '$order_code'";
if( $query_add = mysqli_query($link,$query_op))
  {		
   while($op = mysqli_fetch_assoc($query_add))		
	{     
	 $price = $op['total'];
	}return price_figure($price);
  }
  else echo "no item added to cart";
}

function no_of_reevs($id)
{ include "conxn.php";

	$query = "SELECT COUNT(id) FROM account_comment WHERE owner_id ='$id' AND image_loc !='NULL' ";
            $query4user_info = mysqli_query($link,$query);
            $query_count = mysqli_fetch_row($query4user_info);
        echo    $reev_number = $query_count[0];
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
//to selct all friend id of 0
function connection_ids_only()
{include "conxn.php";  	
$userThis_id = $_SESSION['id'];
$all_friends = array();

$sql = "SELECT DISTINCT account_id FROM friends WHERE friend_id ='$userThis_id'  AND value >= '0' ";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
array_push($all_friends, $row["account_id"]);
}
$sql2 = "SELECT DISTINCT friend_id FROM friends WHERE account_id ='$userThis_id' AND value >= '0'";
$queryq2 = mysqli_query($link,$sql2);
while ($row = mysqli_fetch_array($queryq2, MYSQLI_ASSOC))
{
 array_push($all_friends, $row["friend_id"]);
 
}
 return $all_friends;
 }
 

 //to selct all friend id of 1
 function connection_ids_distinct()
{include "conxn.php";  	
$userThis_id = $_SESSION['id'];
$all_friends = array();

$sql = "SELECT DISTINCT account_id FROM friends WHERE friend_id ='$userThis_id'  AND value <= '1' ";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
 array_push($all_friends, $row["account_id"]);
}
$sql2 = "SELECT DISTINCT friend_id FROM friends WHERE account_id ='$userThis_id' AND value >= '1'";
$queryq2 = mysqli_query($link,$sql2);
while ($row = mysqli_fetch_array($queryq2, MYSQLI_ASSOC))
{
  array_push($all_friends, $row["friend_id"]);
 
}
 return $all_friends;
 }
function conn_suggest_desktop()
{
//collecting suggested friends by mykanta for first login 
 include "conxn.php";	 
 //include "./funcxn.php";

$user_id  = $_SESSION['id'];
$main_user_id  = $_SESSION['id'];
 $all_friends = connection_ids_only();
 //echo $all_friends_new = implode(',',$all_friends);
 $range =  implode(',',$all_friends) ;
 //$range1 = explode(',',$all_friends);
$query1 = "SELECT * FROM registration WHERE id != '$main_user_id' AND id >420 ORDER BY RAND() LIMIT 10";
 
if ($query4user1 = mysqli_query($link,$query1))
{ 
 while($mysfrn = mysqli_fetch_array($query4user1,MYSQLI_ASSOC))
	 {
	     $firstName  = $mysfrn['firstName'];
		 $username1  = $mysfrn['username'];
		// $username = substr($username1, 0, 20);
		 $friends_able_id  = $mysfrn['id'];
		 $username = substr($username1, 0, 12). '';
		 
		 
		   $querystmt2 = $link->prepare("SELECT con_req FROM user_pref WHERE user_id = ? ");
           $querystmt2->bind_param('i',$friends_able_id);
           $querystmt2->execute() ;
           $querystmt2->store_result();
           $querystmt2->bind_result( $con_req);
            if($querystmt2->fetch())
              {
          	  $row = array('con_req'=> $con_req);
               $con_req = $row['con_req'];  
                if( $con_req >= 1) {$one =  1;} else { $one = 0;}
			  }
			  else $one =  1;
				if ( $one >=1 && get_friend_no_of_reev_proc($friends_able_id) >= 1 && !in_array( $friends_able_id, $all_friends)  )
				{
				echo '
				  	<ul class="list-inline no-padding">
						   <li style="width:50px;"> ',get_profile_pic_friend($friends_able_id),'</li>
						   <li style="width:90px;" class="no-padding"><a class="" style="font-size:0.9em; color:black;" href="/connection-auth/'.$username1.'" title="'.$username1.'"> '.ucwords($username).'</a>
						   <div class="text-muted no-padding" style="font-size:0.8em;">
						   ',get_friend_no_of_reev($friends_able_id) ,'</span><span class="padding-5  text-default">  <span style=""> Reevs</span>
						 </div>
					   </li>
					 </ul>
			';
			 
		   }	
          
		   }		  
	  }
	}
	
		function tags_of_user($user_id)
	{include "conxn.php";  	
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
function user_preference()
{
 include "conxn.php";
// include "include/sessionfile.php";
  $user_id  = $_SESSION['id'];
  $querystmt2 = $link->prepare("SELECT pub_vis, con_req, sn_mails, datetime FROM user_pref WHERE user_id = ?  ");
  $querystmt2->bind_param('i',$user_id);
  $querystmt2->execute() ;
  $querystmt2->store_result();
  $querystmt2->bind_result( $pub_vis,$con_req,$sn_mails,$datetime);
   if($querystmt2->fetch())
     {
	    $row = array( 'pub_vis'=> $pub_vis, 'con_req'=> $con_req, 'sn_mails'=> $sn_mails );
       $pub_vis = $row['pub_vis'];  
	   $con_req = $row['con_req'];         
	   $sn_mails = $row['sn_mails'];
	   
	   if(  $pub_vis >= 1)
	   { echo '<label class="toggle"><input name="checkbox-toggle" checked="checked"  onClick="pub_vis();" type="checkbox">
				 <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Public Visibility </label>
				 <div class="note"><strong>Note: </strong>  When "ON" Visitors will be able to view your profile page without logging in but when "OFF" your page will be hidden and can be accessible only when they log into Mykanta.</div> <br>';} 
	else{ echo '<label class="toggle">
				<input name="checkbox-toggle" type="checkbox" onClick="pub_vis();">
				<i data-swchon-text="ON" data-swchoff-text="OFF"></i>Public Visibility </label>
				<div class="note"><strong>Note: </strong> When "ON" Visitors will be able to view your profile page without logging in but when "OFF" your page will be hidden and can be accessible only when they log into Mykanta.</div><br>'; }
	   
	    if(  $con_req >= 1)
	   { echo '  <label class="toggle"><input name="checkbox-toggle" checked="checked"  onClick="con_req();" type="checkbox">
				 <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Connection Request </label>
				 <div class="note"><strong>Note: </strong> When "ON" You will be found in search results and in suggestions but when "OFF" you will not be found in search results or in suggestions but you will be seen when you comment.
													</div> <br>';} 
	else{ echo ' <label class="toggle"><input name="checkbox-toggle"   onClick="con_req();" type="checkbox">
				 <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Connection Request </label>
				 <div class="note"><strong>Note: </strong> When "ON" You will be found in search results and in suggestions but when "OFF" you will not be found in search results or in suggestions but you will be seen when you comment.
													</div> <br>'; }
	   
	    if(  $sn_mails >= 1)
	   { echo '<label class="toggle"> <input name="checkbox-toggle"checked="checked"  onClick="sn_mails();" type="checkbox">
				<i data-swchon-text="ON" data-swchoff-text="OFF"></i>Send me emails</label>
				<div class="note"><strong>Note: </strong> When "ON", you will receive mails associated or generated for your account.
				</div>';} else{ echo '<label class="toggle"> <input name="checkbox-toggle"  onClick="sn_mails();" type="checkbox">
				<i data-swchon-text="ON" data-swchoff-text="OFF"></i>Send me emails</label>
				<div class="note"><strong>Note: </strong> When "ON", you will receive mails associated or generated for your account.
				</div>'; }
	   
	   
	   
	   
	   
	 }
	 else
	 echo '<label class="toggle">
				<input name="checkbox-toggle" type="checkbox" onClick="pub_vis();"><i data-swchon-text="ON" data-swchoff-text="OFF"></i>Public Visibility </label><div class="note"><strong>Note: </strong> When "ON" Visitors will be able to view your profile page without logging in but when "OFF" your page will be hidden and can be accessible only when they log into Mykanta.</div><br>
				
				 <label class="toggle"><input name="checkbox-toggle" checked="checked"  onClick="con_req();" type="checkbox">
				 <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Connection Request </label>
				 <div class="note"><strong>Note: </strong> When "ON" You will be found in search results and in suggestions but when "OFF" you will not be found in search results or in suggestions but you will be seen when you comment.
													</div> <br>
				<label class="toggle"> <input name="checkbox-toggle"checked="checked"  onClick="sn_mails();" type="checkbox">
				<i data-swchon-text="ON" data-swchoff-text="OFF"></i>Send me emails</label>
				<div class="note"><strong>Note: </strong> When "ON", you will receive mails associated or generated for your account.
				</div>';
}

 
function inc_hashtags()
{
  include "conxn.php";
  
  $param = 1;
 $query = $link->prepare("  SELECT tag,amount FROM hashtag  WHERE amount >= ? ORDER BY RAND() LIMIT 20;");
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
		 
echo '<span  class="padding-10" style=" "><a href="/hashtags/'.$tag.'" style="color: orange;   margin: 10px; padding:10px;"> #'.strtolower($tag).' <span class="" style="font-size:0.9em;">('.$amount.')</span></a><span>';
		 // $uniqueArray = array_unique($query_row1, SORT_REGULAR);
         //  $called_tags2 = reveal_hashtags_raw($comment);
		//  echo $called_tags = reveal_hashtags($called_tags2);
	     

			 }     
     }  

echo '</div>';	 
} 
function comment_hashtags_nav()
{
  include "conxn.php";
  
  echo '<div class="padding-10">';
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
		 
echo '<a class="padding-5" href="/hashtags/'.$tag.'" style="color:orange;">#'.strtolower($tag).' <span class="text-muted" style="font-size:0.8em;">('.$amount.')</span></a>';
		 // $uniqueArray = array_unique($query_row1, SORT_REGULAR);
         //  $called_tags2 = reveal_hashtags_raw($comment);
		//  echo $called_tags = reveal_hashtags($called_tags2);
	     

			 }     
     }  

echo '</div>';	 
}



function load_new_reevs()
{
  include "conxn.php";
  include "include/sessionfile.php";
    $all_friendsq2 = connection_ids_distinct();
    $range =  implode(',',$all_friendsq2) ;
	$lastOut = $_COOKIE['lastOut'];
	$query = "SELECT COUNT(id) FROM account_comment WHERE owner_id IN ($range) AND commentDate > '$lastOut'  ";
            $query4user_info = mysqli_query($link,$query);
            $query_count = mysqli_fetch_row($query4user_info);
            echo $reev_number = $query_count[0];
}
?>
