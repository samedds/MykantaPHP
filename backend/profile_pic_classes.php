<?php

    if( isset($_POST['task']) && $_POST['task'] == 'accept_im')
	{
	     require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
	
	  $name = $_POST['name'];
	  $user_id = (int)$_POST['user_id'];
		$std = new stdClass();
	     $std ->name = null;
	     $std ->user_id = null;
	    
	     $std ->error = false;
		require_once MODELS_DIR . '/profile_pic_proc.php';
		
		 if(class_exists('profile_image'))
		  {   	  
		    $picInfo = profile_image::insert( $name,$user_id );
			if ( $picInfo != null )
			{
			     $std->error = true;
			}	 
				 
			$std ->name = $picInfo;
		
		   }
		   	echo json_encode( $std );
	   	}
	else  
	{
	
	   header('location: /');
	}


?>