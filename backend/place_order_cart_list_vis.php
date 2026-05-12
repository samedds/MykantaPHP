<?php
include "include/conxn.php";
if(isset($_POST['place_order']))
{
include "include/conxn.php";
ob_start();
session_start(); 
include "../include/funcxn_vis.php";

$user_id = $_SESSION['vis_id'];
$shop_id = $_POST['shop_id'];
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
								<tr style="font-size:0.8em;">
								<td class="">'.$prduct_name_ok.' </td>
								<td class=""><span class="text-info"> '.$spec_option.'</span></td>
								<td class="text-warning" id="price_cell'.$product_id2.'">GHS '.price_figure($price).'</td>
								<td>'.$cart_qty_stock.'</td>
								<td class="text-warning">GHS '.price_figure($price * $stock).'</td>
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
?>