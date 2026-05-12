<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, DELETE");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

  
if(isset($_GET['product_id']))
{
	include "../include/conxn.php";
	$prdtsearch=array();
    $prdtsearch["data"]=array();
	$product_id = $_GET['product_id'];
	$sql = "SELECT * FROM product WHERE product_id ='$product_id'  LIMIT 1";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		    $product_id = $row['product_id'];
					     
				          $name = $row['name'];
					      $prdt_namel = ucwords(strtolower($name));
					      $account_id =$row['account_id'];
					      $color =$row['color'];
					      $condition =$row['condition'];
					      $price1 =$row['price'];
					      $stock =$row['min_order'];
					      $specification =$row['descrb'];
					      $price2 ="0.00";
                          //$descrb =$row['descrb'];
                          $manufacturer =$row['manufacturer'];
					      $image_loc =$row['image_loc'];
					      $mode =$row['mode'];
					      if($price1 != 0)
				          { $price = $price1; }
				          else
				          { $price = $price2;}
					  
					    $prdtsearch_item=array(
						"id" => ''.$product_id.'',
						"name" => $prdt_namel,
						"price" => $price,
						"color" => $color,
						"stock" => $stock,
						"condition" => $condition,
						"specification" => $specification,
						"mode" => $mode,
						"manufacturer" => $manufacturer,
						//"business" => null,
						"picture" => $image_loc
						);
		     array_push($prdtsearch["data"], $prdtsearch_item);
	 	 }
	 echo json_encode($prdtsearch);
}	
	
    
  
  
  
  

if(isset($_GET['product_of_business']))
{
include "../include/conxn.php";
$shop_id2 = $_GET['product_of_business'];
$ix = 0;
$prdtsearch=array();
    $prdtsearch["data"]=array();
  if($query_sub =  $link->prepare("SELECT product_id,shop_id,name,account_id,price,manufacturer,descrb,image_loc,mode FROM product WHERE mode >= ? AND shop_id = ? ORDER BY shop_id limit 30 "))
    {  $query_sub->bind_param('ii', $ix,$shop_id2 );
		 if(  $query_sub->execute( ) )
		   {   
	       $query_sub->store_result();
		   $query_sub->bind_result( $product_id,$shop_id,$name,$account_id,$price1,$manufacturer,$descrb,$image_loc,$mode);
	           while( $query_sub->fetch() )
					{
					 $row = array( 'product_id'=> $product_id, 'shop_id'=> $shop_id, 'name'=> $name , 'account_id'=> $account_id , 'price'=> $price1 , 'descrb'=> $descrb ,'manufacturer'=> $manufacturer , 'image_loc'=> $image_loc, 'mode'=> $mode );
					   
						 $product_id = $row['product_id'];
					      $shop_id = $row['shop_id'];
				          $name = $row['name'];
					      $prduct_name_short = substr($name, 0, 19);
					      $prdt_namel = ucwords(strtolower($prduct_name_short));
						  $prdt_name_full = ucwords(strtolower($name));
					      $account_id =$row['account_id'];
					      $price1 =$row['price'];
					      $price2 ="0.00";
                          $descrb =$row['descrb'];
                          $manufacturer =$row['manufacturer'];
					      $image_loc =$row['image_loc'];
					      $mode =$row['mode'];
					      if($price1 != 0)
				          { $price = $price1; }
				          else
				          { $price = $price2;}
					  
					    $prdtsearch_item=array(
						"id" => ''.$product_id.'',
						"name" => $prdt_namel,
						"name_full" => $prdt_name_full,
						"price" => $price,
						"manufacturer" => $manufacturer,
						//"business" => null,
						"picture" => $image_loc
						);
					   array_push($prdtsearch["data"], $prdtsearch_item);
					} 
		   }  echo json_encode($prdtsearch); 
	}	

}


if(isset($_GET['search']))
{
include "../include/conxn.php";
$search_text = $_GET['search'];
$product_name0 = safe_input($search_text);
$product_name = preg_replace('/[^A-Za-z0-9\ ]/ ', ' ', $product_name0);
$new_arr  = explode(' ', $product_name);
$total = count($new_arr);
	 
	 if( $total == 0)
		{
		return false;
		}
		else if( $total == 1){	
			 $res = array($new_arr[0]);
			}
			else if( $total == 2) {
			$param0 = $new_arr[0];
			$param1 = $new_arr[1];
			$res0 = $param0.' '.$param1;
			$res = array($res0,$param0,$param1);
			}
			else if( $total == 3){
			  $param2 = $new_arr[2];
			  $param0 = $new_arr[0];
			  $param1 = $new_arr[1];
			  $res0 = $param0.' '.$param1;
			  $res1 = $param0.' '.$param1.' '.$param2;
			  $res = array($res1,$res0,$param0,$param1,$param2);
			}
			yeah($res);
		 } 
function yeah($array)
{
	$prdtsearch=array();
    $prdtsearch["data"]=array();
	include "../include/conxn.php";
	$ix = "1";
	
for ($i = 0; $i < count($array); $i++) {
	$param = "%{$array[$i]}%";
     if($query_sub =  $link->prepare("SELECT product_id,shop_id,name,account_id,price,manufacturer,descrb,image_loc,mode FROM product WHERE mode >= ? AND name like ? ORDER BY rand() limit 10 "))
    {  $query_sub->bind_param('is', $ix,$param );
		 if(  $query_sub->execute( ) )
		   {   
	       $query_sub->store_result();
		   $query_sub->bind_result( $product_id,$shop_id,$name,$account_id,$price1,$manufacturer,$descrb,$image_loc,$mode);
	           while( $query_sub->fetch() )
					{
					 $row = array( 'product_id'=> $product_id, 'shop_id'=> $shop_id, 'name'=> $name , 'account_id'=> $account_id , 'price'=> $price1 , 'descrb'=> $descrb ,'manufacturer'=> $manufacturer , 'image_loc'=> $image_loc, 'mode'=> $mode );
					   
						 $product_id = $row['product_id'];
					      $shop_id = $row['shop_id'];
				          $name = $row['name'];
					      $prduct_name_short = substr($name, 0, 19);
					      $prdt_namel = ucwords(strtolower($prduct_name_short));
					      $account_id =$row['account_id'];
					      $price1 =$row['price'];
					      $price2 ="0.00";
                          $descrb =$row['descrb'];
                          $manufacturer =$row['manufacturer'];
					      $image_loc =$row['image_loc'];
					      $mode =$row['mode'];
					      if($price1 != 0)
				          { $price = $price1; }
				          else
				          { $price = $price2;}
						  
							 if($mode >= 1)
								 {
									$query_beter = $link->prepare("SELECT shopName,shop_id FROM shop WHERE shop_id = ? AND mode >= ? LIMIT 1");
										{   $query_beter->bind_param('ii', $shop_id,$ix );
                                         if(  $query_beter->execute( ) )
                                             {   
											  $query_beter->store_result();
											   $query_beter->bind_result( $shopName,$shop_id);
                                        	     while( $query_beter->fetch() )
												 {
												$row = array('shopName'=>$shopName,'shop_id'=>$shop_id);
												$prduct_name_new = $row['shopName'];
												$shopName_short = substr($prduct_name_new, 0, 19);
												$shopName3 = ucwords(strtolower($prduct_name_new));
												
												$prdtsearch_item=array(
												"id" => ''.$product_id.'',
												"name" => $prdt_namel,
												"price" => $price,
												"manufacturer" => $manufacturer,
												"business" => $shopName3,
												"picture" => $image_loc
												);
											  
											  array_push($prdtsearch["data"], $prdtsearch_item);
												 }
											 }
										} 
									 }	
					         }
 							 
						}
		else return false;
		}
    } echo json_encode($prdtsearch); 
}
		
function safe_input($value)
{include "../include/conxn.php";
$magic_quotes_active = get_magic_quotes_gpc();//boolean - true if the quotes thing is turned on
$new_enough_php = function_exists("mysqli_real_escape_string");//boolean - true if the function exists (php 4.3 or higher)
if($new_enough_php)
{
if($magic_quotes_active)
{
$value = stripslashes($value);//if its a new version of php but has the quotes thing running, then strip the slashes it puts in
}
$value_new = mysqli_real_escape_string($link,$value);//if its a new version use the function to deal with characters
$value = htmlspecialchars($value_new);//if its a new version use the function to deal with characters
}
else
if(!$magic_quotes_active)//If its an old version, and the magic quotes are off use the addslashes function
{
$value = addslashes($value);
}
return $value;
}
?>