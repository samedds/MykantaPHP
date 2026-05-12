<?php
  include "include/conxn.php";
  include "include/funcxn.php";
    if( isset($_POST['user_id']) && isset($_POST['product_id']))
	{ 
	 require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
	
	   $user_id = safe_input($_POST['user_id']);
	    $product_id = safe_input($_POST['product_id']);
	   
		$std = new stdClass();
	 
	     $std ->like = null;
	     $std ->update = null;
	    
	     $std ->error = false;
		require_once MODELS_DIR . '/unlike_products.php';
		
		 if(class_exists('Likers'))
		  {   
			  
		    $likeInfo = Likers::getLike( $product_id, $user_id );
			if ( $likeInfo != null )
			{
			     $std->error = true;
			}

			
            $upInfo = Likers::update( $product_id );
			 if ( $upInfo != null )
			{
			     $std->error = true;
			}	

		   
	
			$std ->like = $likeInfo;
			$std ->update = $upInfo;
				
		   }
		   	echo json_encode( $std );
	   	}
	else  
	{
	header('location: /');
	}


?>