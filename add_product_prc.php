<?php
// this process page is to add a new product into database
include"include/conxn.php";
include "include/funcxn.php";
include "include/sessionfile.php";
if(isset($_POST['task']))
{
	$account_id = $_SESSION['id'];
	$shop_id = safe_input($_POST['shop_id']);
	$shopName = safe_input($_POST['shopName']);

	if(isset($_POST['prdt_name']) && isset($_POST['prdt_desc']))
	{
		$datetime =  date('Y\-m\-d\ H:i:s');
		//$datetime =  strtotime($datetime);
		$prdt_name1 = safe_input($_POST['prdt_name']);
	    $prdt_name = strip_text($prdt_name1);
	    $prdt_man1 = safe_input($_POST['prdt_man']);
	    $prdt_man = strip_text($prdt_man1);
	    $prdt_option = safe_input($_POST['prdt_option']);
	    $prdt_color = safe_input($_POST['prdt_color']);
	    $prdt_stock = safe_input($_POST['prdt_stock']);
	    $prdt_cond = safe_input($_POST['prdt_cond']);
	    $min_order = safe_input($_POST['min_order']);
		$prdt_desc = safe_input($_POST['prdt_desc']);
		$price = price_figure($_POST['price']) ;
		$myfile1 = safe_input($_POST['myfile1']);
		$myfile2 = safe_input($_POST['myfile2']);
		$myfile3 = safe_input($_POST['myfile3']);
		$myfile4 = safe_input($_POST['myfile4']);
		$myfile5 = safe_input($_POST['myfile5']);
		$myfile6 = safe_input($_POST['myfile6']);
		$myfile7 = safe_input($_POST['myfile7']);

		//Array to determine how many times to insert secondary images
		$allpics = array();
		if($myfile2 != "")
		{
			array_push($allpics, "$myfile2");
		}
		if($myfile3 != "")
		{
			array_push($allpics, "$myfile3");
		}
		if($myfile4 != "")
		{
			array_push($allpics, "$myfile4");
		}
		if($myfile5 != "")
		{
			array_push($allpics, "$myfile5");
		}
		if($myfile6 != "")
		{
			array_push($allpics, "$myfile6");
		}
		if($myfile7 != "")
		{
			array_push($allpics, "$myfile7");
		}

		$location1 = "img/products_images/$myfile1";
		/*$location2 = "img/products_images/$myfile2";
		$location3 = "img/products_images/$myfile3";
		$location4 = "img/products_images/$myfile4";
		$location5 = "img/products_images/$myfile5";
		$location6 = "img/products_images/$myfile6";
		$location7 = "img/products_images/$myfile7";*/
		//$location_dir = "public_html_work_on/img/products_images/$name";
		$account_id = safe_input($_SESSION['id']);

		$query = "INSERT INTO `product` (`product_id` ,	`account_id` ,`shop_id` ,	`name` ,	`descrb` ,`price` ,	`manufacturer`, `color`, `condition`, `min_order`,	`image_loc`, `datetime`,	`mode`)  VALUES (	NULL , '$account_id', '$shop_id', '$prdt_name', '$prdt_desc', '$price', '$prdt_man', '$prdt_color', '$prdt_cond', '$min_order', '$myfile1', '$datetime', '1')";
	        
		if(mysqli_query($link,$query))
		{
			$selprdt = "SELECT * FROM product WHERE account_id = '$account_id' && shop_id = '$shop_id' && name = '$prdt_name' ORDER BY product_id DESC LIMIT 1";
			$queryprdt = mysqli_query($link,$selprdt);
			while($whileprdt = mysqli_fetch_assoc($queryprdt))
			{
				$prdtid = $whileprdt['product_id'];
				$thisProductName = $whileprdt['name'];
				$thisProductNameformat = formatUrl($thisProductName);
				$insquery = "INSERT INTO product_option(product_id, price, stock, spec_option) VALUES('$prdtid', '$price', '$prdt_stock', '$prdt_option')";	
				$insqueryexec = mysqli_query($link, $insquery);
			}
			$arraySize = count($allpics);
			if($arraySize > 0)
			{  $current = 1;
					include"include/conxn.php";
					foreach( $allpics as $key => $value )
				    {
				    	$location = "img/products_images/$value";
				        $sql = "INSERT into product_image_4 (shop_id,product_id, image_loc, datetime)  values('$shop_id',' $prdtid','$value','$datetime' )";
				        mysqli_query($link,$sql);
				        if($current == $arraySize)
				        {
				        	echo'Product Added with more pictures';
				        }
				        else{
				        	$current++;
				        }
				    }					
					/*$insertquery1 = "INSERT into product_image_4 values( '' ,'$shop_id',' $thisProductId','$location2','$datetime' )";
			      	$insertqueryconfirm1 = mysqli_query($link,$insertquery1);
			      	$insertquery2 = "INSERT into product_image_4 values( '' ,'$shop_id',' $thisProductId','$location3','$datetime' )";
			      	$insertqueryconfirm2 = mysqli_query($link,$insertquery2);
			      	$insertquery3 = "INSERT into product_image_4 values( '' ,'$shop_id',' $thisProductId','$location4','$datetime' )";
			      	$insertqueryconfirm3 = mysqli_query($link,$insertquery3);
			      	$insertquery4 = "INSERT into product_image_4 values( '' ,'$shop_id',' $thisProductId','$location5','$datetime' )";
			      	$insertqueryconfirm4 = mysqli_query($link,$insertquery4);
			      	$insertquery5 = "INSERT into product_image_4 values( '' ,'$shop_id',' $thisProductId','$location6','$datetime' )";
			      	$insertqueryconfirm5 = mysqli_query($link,$insertquery5);
			      	$insertquery6 = "INSERT into product_image_4 values( '' ,'$shop_id',' $thisProductId','$location7','$datetime' )";*/
			      	//$insertqueryconfirm6 = mysqli_query($link,$insertquery6);				   	
				 
			}
			else{
				echo'Product Added with only one picture';
			}
			
			
	//send mail business and mykanta
		
$mail_from = "no-reply@mykanta.com";
$mail_mykanta = "mykantaa1@gmail.com";
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
$headers .= 'From: Mykanta Support <'.$mail_from.'>'. "\r\n";
$mail_to = email_from_shop_id($shop_id);
$subject = "MYKANTA PRODUCT/SERVICE UPLOAD";
  $message = '
	<html lang="en-us">
		<head>
		<style>
*{margin:0;padding:0}*{font-family:"Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif}img{max-width:100%}.collapse{margin:0;padding:0}body{-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100% !important;height:100%}a{color:#2ba6cb} .btn{display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.428571429;text-align: center;white-space: nowrap;vertical-align: middle;cursor: pointer;border: 1px solid transparent;border-radius: 4px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;color: #333;background-color: white;border-color: #CCC;} p.callout{padding:15px;background-color:#ecf8ff;margin-bottom:15px}.callout a{font-weight:bold;color:#2ba6cb}table.social{background-color:#ebebeb}.social .soc-btn{padding:3px 7px;border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px; font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:bold;display:block;text-align:center}a.fb{background-color:#3b5998 !important}a.tw{background-color:#1daced !important}a.gp{background-color:#db4a39 !important}a.ms{background-color:#000 !important}.sidebar .soc-btn{display:block;width:100%}table.head-wrap{width:100%}.header.container table td.logo{padding:15px}.header.container table td.label{padding:15px;padding-left:0}table.body-wrap{width:100%}table.footer-wrap{width:100%;clear:both !important}.footer-wrap .container td.content p{border-top:1px solid #d7d7d7;padding-top:15px}.footer-wrap .container td.content p{font-size:10px;font-weight:bold}h1,h2,h3,h4,h5,h6{font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:1.1;margin-bottom:15px;color:#000}h1 small,h2 small,h3 small,h4 small,h5 small,h6 small{font-size:60%;color:#6f6f6f;line-height:0;text-transform:none}h1{font-weight:200;font-size:44px}h2{font-weight:200;font-size:37px}h3{font-weight:500;font-size:27px}h4{font-weight:500;font-size:23px}h5{font-weight:900;font-size:17px}h6{font-weight:900;font-size:14px;text-transform:uppercase;color:#444}.collapse{margin:0 !important}p,ul{margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6}p.lead{font-size:17px}p.last{margin-bottom:0}ul li{margin-left:5px;list-style-position:inside}ul.sidebar{background:#ebebeb;display:block;list-style-type:none}ul.sidebar li{display:block;margin:0}ul.sidebar li a{text-decoration:none;color:#666;padding:10px 16px;margin-right:10px;cursor:pointer;border-bottom:1px solid #777;border-top:1px solid #fff;display:block;margin:0}ul.sidebar li a.last{border-bottom-width:0}ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p{margin-bottom:0 !important}.container{display:block !important;max-width:600px !important;margin:0 auto !important;clear:both !important}.content{padding:15px;max-width:600px;margin:0 auto;display:block}.content table{width:100%}.column{width:300px;float:left}.column tr td{padding:15px}.column-wrap{padding:0 !important;margin:0 auto;max-width:600px !important}.column table{width:100%}.social .column{width:280px;min-width:279px;float:left}.clear{display:block;clear:both}@media only screen and (max-width:600px){a[class="btn"]{display:block !important;margin-bottom:10px !important;background-image:none !important;margin-right:0 !important}div[class="column"]{width:auto !important;float:none !important}table.social div[class="column"]{width:auto !important}}
</style>
		</head>
		<body >		
		<h3>PRODUCT/SERVICE UPLOAD</h3>
		<p><img src="http://www.mykanta.com/img/site_img/email_mk.png" /></p>
		<P>Welcome,</P>
		<P>Your business page on Mykanta uploaded a new item : '.	$thisProductName.'.</P>
		
		<table style="color:black; font-size:9pt;">
<tr>
	<td align="center">
		<p style="color:black; font-size:9pt;">
			<a href="http://www.mykanta.com/TermandConditions">Terms</a> |
			<a href="http://www.mykanta.com/TermandConditions">Privacy</a> |
			<a href="http://www.mykanta.com/index_login.php">Login</a>
		</p>
		<p style="color:black; font-size:9pt;" >Copyright 2016 HIPI LLC, WEST AFRICA, GHANA.
       </p>
	</td>
</tr>
</table> 
		</body>
		</html>'; 
			
					

//sends the mail
mail($mail_to,$subject,$message,$headers);
mail($mail_mykanta,$subject,$message,$headers);
// end of verify link code-----------------------------------------------------------------------------
	
		}
		else
		{
			echo "Report this error";
		}
	}
	else
	{
		echo"Invalid Input";
		//header('location:shopaccount.php?shop_id='.$shop_id.'&shopName='.$shopName.'');
	}
}

else if(isset($_POST['task1']))
{
	if(isset($_POST['product_id']) && isset($_POST['prdt_option1']) && isset($_POST['prdt_stock1']) && isset($_POST['price1']))
	{
		$product_id = safe_input($_POST['product_id']);
		$prdt_option1 = safe_input($_POST['prdt_option1']);
		$prdt_stock1 = safe_input($_POST['prdt_stock1']);
		$price1 = price_figure($_POST['price1']) ;
		$insopquery = "INSERT INTO product_option(product_id, price, stock, spec_option) VALUES('$product_id', '$price1', '$prdt_stock1', '$prdt_option1')";
		if($insopqueryexec = mysqli_query($link, $insopquery))
		{
			echo'Product option added!';
		}
		else{
			echo'Unable to Add option. Please try again or Check internet connection';
		}
	}
}

else if(isset($_POST['task2']))
{
	$product_id = safe_input($_POST['product_id']);
	$prdt_name1 = safe_input($_POST['prdt_name']);
	$prdt_name = strip_text($prdt_name1);
	$prdt_man1 = safe_input($_POST['prdt_man']);
	$prdt_man = strip_text($prdt_man1);
	$prdt_color = safe_input($_POST['prdt_color']);
	$prdt_cond = safe_input($_POST['prdt_cond']);
	$min_order = safe_input($_POST['min_order']);
	$prdt_desc = safe_input($_POST['prdt_desc']);
  
	//$prdt_desc = strip_text($prdt_desc1);
	$updateprdt = "UPDATE product SET name = '$prdt_name', manufacturer = '$prdt_man', color = '$prdt_color',  
	min_order = '$min_order', descrb = '$prdt_desc', `condition` = '$prdt_cond' WHERE product_id = '$product_id' ";
	if($updateprdtexec = mysqli_query($link, $updateprdt))
	{
		echo'Product updated';
	}
	else{
		echo'Unable to update Product. Please try again or Check internet connection';
	}
}

else if(isset($_POST['task3']))
{
	if(isset($_POST['option_id']) && isset($_POST['edit_prdt_option']) && isset($_POST['edit_prdt_stock']) && isset($_POST['edit_prdt_price']))
	{
		$option_id = safe_input($_POST['option_id']);
		$edit_prdt_option = safe_input($_POST['edit_prdt_option']);
		$edit_prdt_stock = safe_input($_POST['edit_prdt_stock']);
		$edit_prdt_price = price_figure($_POST['edit_prdt_price']) ;
		$updateopquery = "UPDATE product_option SET spec_option =  '$edit_prdt_option', price = '$edit_prdt_price', stock = '$edit_prdt_stock' WHERE id = '$option_id' ";
		if($updateopqueryexec = mysqli_query($link, $updateopquery))
		{
			echo'Product option updated';
		}
		else{
			echo'Unable to Update option. Please try again or Check internet connection';
		}
	}
}

else
	{
		echo "<div class='info'>Sorry, no data was passed. Please try again or contact the site admin if this problem persist. Thanks...</div>";
	}

?>