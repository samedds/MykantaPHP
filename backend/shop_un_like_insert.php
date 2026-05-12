<?php
include "include/conxn.php";
    if( isset($_POST['user_id']) && isset($_POST['shop_id']))
	{ 
	     require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
	
	  
	    $user_id = (int)$_POST['user_id'];
	    $shop_id = (int)$_POST['shop_id'];
	   
		$std = new stdClass();
	 
	     $std ->like = null;
	     $std ->update = null;
	    
	     $std ->error = false;
		require_once MODELS_DIR . 'unlike.php';
		
		 if(class_exists('Likers'))
		  {   
			  
		    $likeInfo = Likers::getLike( $shop_id, $user_id );
			if ( $likeInfo != null )
			{
			     $std->error = true;
			}

			
            $upInfo = Likers::update( $shop_id );
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