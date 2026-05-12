<?php

    if( isset($_POST['user_id']) && isset($_POST['shop_id']) && isset($_POST['product_id']))
	{
	     require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
	
	  
	    $product_id = (int)$_POST['product_id'];
	    $user_id = (int)$_POST['user_id'];
	    $shop_id = (int)$_POST['shop_id'];
	   
		$std = new stdClass();
	     $std ->user = null;
	     $std ->product = null;
	    
	     $std ->error = false;
		require_once MODELS_DIR . 'product.php';
		
		 if(class_exists('Products') && class_exists('Users'))
		  {   
		      $userInfo = Users::getUsers($user_id);
			  
			  if( $userInfo == null)
			  {
			       $std->error = true;
			  }
			  
		    $proInfo = Products::getProduct( $shop_id, $product_id , $user_id );
			if ( $proInfo != null )
			{
			     $std->error = true;
			}	

		   
		    $std ->user = $userInfo;
			$std ->product = $proInfo;
		
		   }
		   	echo json_encode( $std );
	   	}
	else  
	{
	
	   header('location: /');
	}


?>