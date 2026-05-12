<?php
require_once "include/conxn.php";

$search_text = safe_input($_GET['search_text']);
$product_name = preg_replace('/[^A-Za-z0-9\ ]/ ', '', $search_text);
if(isset($_GET['search_text']))
{
//$product_name = $_GET['search_text'];

if(empty($product_name)) 
{
 echo '<label class="padding-10 label label-lg label-danger">You failed to make an entry. Please type a Product to search for.</label>';
}
else if(strlen($product_name)>=2)
	 { 
			// $param = "%{$product_name}%";
			  // $param = "%{$shoe}%";
  	
   $shoe = "hp wireless mouse";
   $new_arr  = explode(' ', $product_name);
     $total = count($new_arr);
	 
     //  for($i = 0; $i < $total; $i++)
      //  {
		
		if( $total == 0)
		{
		 echo '<label class="padding-10 label label-lg label-danger">You failed to make an entry. Please type a Product to search for.</label>';
		}else
		if( $total == 1)
		{	
		echo '    <ul class="list-inline">';

		 $param = "%{$new_arr[0]}%";
		 $paramk = "{$new_arr[0]}";
		 
		 yeah($param,$paramk);	
		 echo '  </ul>';
		}
		else if( $total == 2){
		 $param1 =  $new_arr[0];
		 
		 $param2 =  $new_arr[1];
		// $param3 =  $new_arr[2];
		 $nyame = $param1.' '.$param2;
		 echo '   <ul class="list-inline">';
		
		 yeah($nyame,$nyame);
		 $paramz = "%{$new_arr[0]}%";
		 $paramr = "{$new_arr[0]}";
		 yeah($paramz,$paramr);
		 
		 
		 $param = "%{$new_arr[1]}%";
		 $paramz = "{$new_arr[1]}";
		  yeah($param,$paramz);
		 	 echo '  </ul>'; 
		  
		}
		else if( $total == 3){
		 $param1 =  $new_arr[0];
		 $param2 =  $new_arr[1];
		 $param3 =  $new_arr[2];
		 $nyame = $param1.' '.$param2.' '.$param3;
		 echo ' <ul class="list-inline">';
		 yeah($nyame,$nyame);
		 
		  $param1 = "%{$new_arr[0]}%";
		  $paramh = "{$new_arr[0]}";
		 yeah($param1,$paramh);
		   $param = "%{$new_arr[1]}%";
		   $paramd = "{$new_arr[1]}";
		  yeah($param,$paramd);  
		  $param2 = "%{$new_arr[2]}%";
		  $parama = "{$new_arr[2]}";
		  yeah($param2,$parama);
		// $param = "%{$nyame}%";
		 echo '  </ul>';
		}
		// $new_arr[$i].' ---- ';
		// $param = "%{$new_arr[$i]}%";
	
		
		
	//else echo'good morning3';
	 
	}
	 else
	 {
	 echo '<div class="well well-light"><p class="text-danger "> No product was found.</p><p class="text-info "> Try a shorter product name.</p></div>';
	 
	 }
	

	 }
else
{
 echo '<label class="padding-10 label label-lg label-danger">You failed to make an entry. Please type a Product to search for.</label>';
}


function yeah($param_old,$paramk)
	{include "include/conxn.php"; $ix = "1";
	  $param = "%{$param_old}%";
	  $param1 = $param_old;
 if($query_sub =  $link->prepare("SELECT product_id,shop_id,name,account_id,price,descrb,image_loc,mode FROM product WHERE mode >= ? AND name like ? ORDER BY RAND()limit 40 "))
{
	 $query_sub->bind_param('is', $ix,$param ) ;
 if( $query_sub->execute( ))
   {    $query_sub->store_result();
  // $total = count($query_sub);
     if($query_sub->num_rows >= 1)
	 {
		 
	 }
   else{
	 echo '<a href="/vis_accountshopsearchpage.php?search_text='.$paramk.'"><label class="padding-10 label label-lg label-info">Search for Bussinesses with the name "'.ucwords($paramk).'" </label></a>';
   }

		
		   $query_sub->bind_result( $product_id,$shop_id,$name,$account_id,$price1,$descrb,$image_loc,$mode);
			 while( $query_sub->fetch() )
					{
						  $row = array( 'product_id'=> $product_id, 'shop_id'=> $shop_id, 'name'=> $name , 'account_id'=> $account_id , 'price'=> $price1 , 'descrb'=> $descrb , 'image_loc'=> $image_loc, 'mode'=> $mode );
					     
						  $shopNames1 = $row['name'];
						  $product_id = $row['product_id'];
					      $shop_id = $row['shop_id'];
				          $name = formatUrl_true($row['name']);
					      $prduct_name_short = substr($name, 0, 19). '..';
					      $prdt_namel = strtolower($prduct_name_short);
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
												            $shopName = formatUrl_true($prduct_name_new);
														
														 echo '<li  class=" margin-10 padding-10" style="color:#5bc0de; width:170px; ">
														 <div  style="">
														 <center style=" width:150px; ">
															<img src="/img/products_images/mini/'.$image_loc.'"  style="width:auto; height:auto; position:relative;" onClick="Load_product_content_on_modal_search('. $product_id .');" alt="'.$prdt_name_ok.'"title="'.$prdt_name_ok.'"/></center>
														  <a class=" " style="font-size:1.0em; color:black; " title="'.$name.'" href="/product/'.$shopName.'/'. $product_id .'/'.$name.'">'.$prdt_name_ok.'</a>
														 <i class="fa fa-fw fa-home txt-color-blue"></i><a class="text-info" style="font-size:0.8em; " title="'.$prduct_name_new.'" href="/business/'.$shopName.'">'.$shopName_short.'</a>
														 <div class="row" style="">
														 <input type="hidden" id="product_id" value="'. $product_id .'" />
														 <input type="hidden" id="shopName_search" value="'. $prduct_name_new .'" /><input type="hidden" id="shop_id_search" value="'. $shop_id .'" />
														 <div class=" col-xs-12 " align="">
														 ',product_option($shop_id,$product_id),' <a class="text-info pull-right" href="/product/'.$shopName.'/'. $product_id .'/'.$name.'">view page</a>
														 </div>
														 </div>
														 </div>
														 
														 </li>
														 ';
													 }
													 }
													
												} 
												
											 
									 }	
					
					}
					
					
						
   }else  echo '<label class="padding-10 label label-lg label-danger">Try Again!</label>';
		}else  echo '<label class="padding-10 label label-lg label-info">Search for BUsiness</label>';
		
	
		}
?>