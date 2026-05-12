<?php

    if( isset($_POST['task']) && $_POST['task'] == 'reply_insert')
	{
	     require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
	
	  
	    $user_id = (int)$_POST['_user_id'];
	    $comment_id = (int)$_POST['_comment_id'];
	    $reply = addslashes( str_replace( "\n" , "<br>" , $_POST['reply'] ));
		$std = new stdClass();
	     $std ->user = null;
	     $std ->reply = null;
	     $std ->pictures = null;
	     $std ->error = false;
		require_once MODELS_DIR . 'replys.php';
		
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
				 
				 
			 $replyInfo = Replies::insert( $reply , $user_id , $comment_id);
			if ( $replyInfo != null )
			{
			     $std->error = true;
			}
		    $std ->user = $userInfo;
			$std ->reply = $replyInfo;
			$std ->pictures = $picInfo;
		
		   }
		   	echo json_encode( $std );
	   	}
	else  
	{
	
	   header('location: /');
	}


?>