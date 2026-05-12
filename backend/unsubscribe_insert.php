<?php
 include "include/conxn.php";
    if( isset($_POST['user_id']) && isset($_POST['shop_id']))
	{
	 require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
	
	  $user_id = (int)$_POST['user_id'];
	    $shop_id = (int)$_POST['shop_id'];
	   
		$std = new stdClass();
	     $std ->user = null;
	     $std ->subscribe = null;
	    
	     $std ->error = false;
		require_once MODELS_DIR . '/unscribesubscribe.php';
		
		 if(class_exists('Subscribers') && class_exists('Users'))
		  {   
		      $userInfo = Users::getUsers($user_id);
			  
			  if( $userInfo == null)
			  {
			       $std->error = true;
			  }
			  
		    $subInfo = Subscribers::getSubscribe( $shop_id, $user_id );
			if ( $subInfo != null )
			{
			     $std->error = true;
			}	

		   
		    $std ->user = $userInfo;
			$std ->subscribe = $subInfo;
		
		   }
		   	echo json_encode( $std );
	   	}
	else  
	{
	
	   header('location: /');
	}


?>