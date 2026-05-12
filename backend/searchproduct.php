<?php

include "include/conxn.php";

 function searchproduct($search_text)
{
include "include/conxn.php";
$product_name0 = safe_input($search_text);
$product_name = preg_replace('/[^A-Za-z0-9\ ]/ ', '', $product_name0);

 $new_arr  = explode(' ', $product_name);
     $total = count($new_arr);
	 
     //  for($i = 0; $i < $total; $i++)
      //  {
		
		if( $total == 0)
		{
		echo '<h5 class="text-info ">   Products  not found</h5> ';
		}else
		if( $total == 1)
		{	
		echo '    <ul class="list-inline">';

		 $param = "%{$new_arr[0]}%";
		 
		 yeah($param);	
		 echo '  </ul>';
		}
		else if( $total == 2){
		 $param1 =  $new_arr[0];
		 $param2 =  $new_arr[1];
		// $param3 =  $new_arr[2];
		 $nyame = $param1.' '.$param2;
		 echo '   <ul class="list-inline">';
		yeah($nyame);
		 $param1 = "%{$new_arr[0]}%";
		 yeah($param1);
		 
		 
		 $param = "%{$new_arr[1]}%";
		  yeah($param);
		 	 echo '  </ul>'; 
		  
		}
		else if( $total == 3){
		 $param1 =  $new_arr[0];
		 $param2 =  $new_arr[1];
		 $param3 =  $new_arr[2];
		 $nyame = $param1.' '.$param2.' '.$param3;
		 echo ' <ul class="list-inline">';
		 yeah($nyame);
		  $param1 = "%{$new_arr[0]}%";
		 yeah($param1);
		   $param = "%{$new_arr[1]}%";
		  yeah($param);  
		  $param2 = "%{$new_arr[2]}%";
		  yeah($param2);
		// $param = "%{$nyame}%";
		 echo '  </ul>';
		}
	 } 
function yeah($param_old)
	{include "include/conxn.php"; $ix = "1";
	  $param = "%{$param_old}%";
 if($query_sub =  $link->prepare("SELECT product_id,shop_id,name,account_id,price,descrb,image_loc,mode FROM product WHERE mode >= ? AND name like ? ORDER BY RAND() limit 40 "))
{   $query_sub->bind_param('is', $ix,$param );
 if(  $query_sub->execute( ) )
   {    $query_sub->store_result();
  // $total = count($query_sub);
		   $query_sub->bind_result( $product_id,$shop_id,$name,$account_id,$price1,$descrb,$image_loc,$mode);
	
							 while( $query_sub->fetch() )
					{
						  $row = array( 'product_id'=> $product_id, 'shop_id'=> $shop_id, 'name'=> $name , 'account_id'=> $account_id , 'price'=> $price1 , 'descrb'=> $descrb , 'image_loc'=> $image_loc, 'mode'=> $mode );
					    
						echo '<input type="hidden" id="productNum" value="'.$query_sub->num_rows.' +" />
	<script> var productNom = $("#productNum").val();
	document.getElementById("productNo").innerHTML = productNom; 
	</script>';
						  $shopNames1 = $row['name'];
						  $product_id = $row['product_id'];
					      $shop_id = $row['shop_id'];
				          $name = $row['name'];
					      $prduct_name_short = substr($name, 0, 19). '..';
					      $prdt_namel = strtolower($prduct_name_short);
					      $prdt_nad = strtolower($name);
	                      $prdtnaame  = formatUrl($prdt_nad); 
					      $prdt_name_ok = ucwords($prdt_namel);
					      //$prdt_name_format = formatUrl($prduct_name);
					      $account_id =$row['account_id'];
					      $price1 =$row['price'];
                          $descrb =$row['descrb'];
					      $image_loc =$row['image_loc'];
					      $mode =$row['mode'];
					      if($price1 != 0)
				          { $price = ' 
				          <p class="text-warning">GHS '.$price1.'</p> '; }
				          else
				          { $price = '
				          <p class="text-danger">price N/A</p> ';}
						  
							 if($mode >= 1)
									  {
										$query_beter = $link->prepare("SELECT shopName,shop_id FROM shop WHERE shop_id = ? AND mode >= ? LIMIT 1");
								
										{   $query_beter->bind_param('ii', $shop_id,$ix );
                                         if(  $query_beter->execute( ) )
                                           {    $query_beter->store_result();
                                          // $total = count($query_sub);
                                        		   $query_beter->bind_result( $shopName,$shop_id);
                                        	        
                                        			       while( $query_beter->fetch() )
                                        					 {
                                        					   $row = array( 'shopName'=> $shopName, 'shop_id'=> $shop_id  );
					     
												            $prduct_name_new = $row['shopName'];
												            $shopName_short = substr($prduct_name_new, 0, 19). '..';
												            $shopName3 = strtolower($prduct_name_new);
												            $shopName = formatUrl($shopName3);
														
														 echo '<li  class=" margin-10 padding-10" style="color:#5bc0de; width:170px; ">
														 <div  style="">
														 <center style=" width:150px; ">
															<img src="/img/products_images/mini/'.$image_loc.'"  style="width:auto; height:auto; position:relative;" onClick="Load_product_content_on_modal_search('. $product_id .');" /></center>
														  <a class=" " style="font-size:1.0em; color:black; " title="'.$prdtnaame.'" href="/product-link/'.$shopName.'/'. $product_id .'/'.$prdtnaame.'">'.$prdt_name_ok.'</a>
														 <i class="fa fa-fw fa-home txt-color-blue"></i><a class="text-info" style="font-size:0.8em; " title="'.$shopName.'" href="/business-link/'.$shopName.'">'.$shopName_short.'</a>
														 <div class="row" style="">
														 <input type="hidden" id="product_id" value="'. $product_id .'" />
														 <input type="hidden" id="shopName_search" value="'. $shopName .'" /><input type="hidden" id="shop_id_search" value="'. $shop_id .'" />
														 <div class=" col-xs-12 " align="">
														 ',product_option($shop_id,$product_id),' <a class="text-info pull-right" title="'.$prdtnaame.'" href="/product-link/'.$shopName.'/'. $product_id .'/'.$prdtnaame.'">view page</a>
														 </div>
														 </div>
														 </div>
														 
														 </li>
														 ';
													 }
													 }
													
												} 
												
											 
									 }	
					 
					} //echo '</ul>';
						
						}
		else echo'good morning2';
		}
		}

?>