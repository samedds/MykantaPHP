<?php

    if( isset($_POST['task']) && $_POST['task'] == 'comment_insert')
	{
	     require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
	
	  
	    $user_id = (int)$_POST['_user_id'];
	    $product_id = (int)$_POST['_product_id'];
	    $review = addslashes( str_replace( "\n" , "<br>" , $_POST['review'] ));
		$std = new stdClass();
	     $std ->user = null;
	     $std ->comment = null;
	     $std ->pictures = null;
	     $std ->error = false;
		require_once MODELS_DIR . 'reviews.php';
		
		 if(class_exists('Comments') && class_exists('Users') && class_exists('Pictures'))
		  {   
		      $userInfo = Users::getUsers($user_id);
			  
			  if( $userInfo == null)
			  {
			       $std->error = true;
			  }
			  
		    $picInfo = Pictures::getPictures( $user_id );
			if ( $picInfo != null )
			{
			     $std->error = true;
			}	 
				 
				 
			 $commentInfo = Comments::insert( $review , $user_id , $product_id);
			if ( $commentInfo != null )
			{
			     $std->error = true;
			}
		    $std ->user = $userInfo;
			$std ->comment = $commentInfo;
			$std ->pictures = $picInfo;
		
		   }
		   	echo json_encode( $std );
	   	}
	else  
	{
	
	   header('location: /');
	}


?>