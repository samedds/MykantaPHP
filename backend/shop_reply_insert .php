<?php

    if( isset($_POST['task']) && $_POST['task'] == 'shop_reply_insert')
	{
	     require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
	
	  
	    $user_id = (int)$_POST['_user_id'];
	    $comment_id = (int)$_POST['_comment_id'];
	    $shop_reply = addslashes( str_replace( "\n" , "<br>" , $_POST['shop_reply'] ));
		$std = new stdClass();
	     $std ->user = null;
	     $std ->shop_reply = null;
	     $std ->pictures = null;
	     $std ->error = false;
		require_once MODELS_DIR . 'shop_replys.php';
		
		 if(class_exists('Replies') && class_exists('Users') && class_exists('Pictures'))
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
				 
				 
			 $replyInfo = Replies::insert( $shop_reply , $user_id , $comment_id);
			if ( $replyInfo != null )
			{
			     $std->error = true;
			}
		    $std ->user = $userInfo;
			$std ->shop_reply = $replyInfo;
			$std ->pictures = $picInfo;
		
		   }
		   	echo json_encode( $std );
	   	}
	else  
	{
	
	   header('location: /');
	}


?>