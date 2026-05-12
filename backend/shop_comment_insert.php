<?php

    if( isset($_POST['task']) && $_POST['task'] == 'shop_comment_insert')
	{
	     require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
	
	  
	    $user_id = (int)$_POST['_user_id'];
	    $owner_id = (int)$_POST['_owner_id'];
	    $comment_txt = addslashes( str_replace( "\n" , "<br>" , $_POST['comment'] ));
		$myfile = $_POST['myfile'];
		$std = new stdClass();
	     $std ->user = null;
	     $std ->shop = null;
	     $std ->comment = null;
	     $std ->pictures = null;
	     $std ->error = false;
		require_once MODELS_DIR . '/shop_comment.php';
		
		 if(class_exists('Comments') && class_exists('Users') && class_exists('Pictures')&& class_exists('Shops'))
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

			$shopInfo = Shops::getShops( $owner_id );
			if ( $shopInfo != null )
			{
			     $std->error = true;
			}	 
				 
				 
			 $commentInfo = Comments::insert( $comment_txt, $myfile, $user_id , $owner_id);
			if ( $commentInfo != null )
			{
			     $std->error = true;
			}
		    $std ->shop = $shopInfo;
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