 <?php
 
 require_once MODELS_DIR . '/users.php';
 require_once MODELS_DIR . '/pictures.php';

 
 class Comments {
    
	public static function getComments(  )
	{
	
	}
      //retursn stdclass frm databs
	 public static function insert( $comment_txt , $myfile, $user_id , $owner_id )
	 { include "include/conxn.php";
	 		include "include/sessionfile.php";
	 		$myID = $_SESSION['id'];
	     //insert data 
	       $datetime =  date('Y\-m\-d\ H:i:s');
		   
		   $comment_txt = $comment_txt;

		if($user_id == $owner_id)
		{   
		   // $select = "select * from account_comment where owner_id = '$myID' and account_id = '$myID'";
//		    $selectquery = mysqli_query($link, $select);
//		    $count = mysqli_num_rows($selectquery);
//		    if($count > 0)
		 //  {
			//  $sql = "update account_comment set comment = '$comment_txt', image_loc = '$myfile', owner_id = '$owner_id', account_id = '$user_id', commentDate = '$datetime'
			//   where owner_id = '$myID' and account_id = '$myID' "; 
			   
			   $sql = "insert into account_comment values('','$comment_txt', '$myfile','$owner_id','$user_id','$datetime') ";
			   
		      $query = mysqli_query($link,$sql);
			  
			   if( $query )
			 {
			   // $insert_id = mysqli_insert_id($query);
				
			    $std = new stdClass($query);
			    //$std->comment_id = $insert_id;
			    $std->comment = $comment_txt;
				$std->image_loc = $myfile;
			    $std->user_id = (int)$user_id;
			    $std->owner_id = (int)$owner_id;
		        $datetime =  strtotime($datetime);
				$std->datetime = date("D, d M Y, h:ia", $datetime);

				return $std;
			 } 
		    }
		   // else
		//    {
		   // 	$sql = "insert into account_comment values( '' , '$comment_txt', '$myfile', $owner_id, $user_id, '$datetime' )";
		//       $query = mysqli_query($link,$sql);
		///    }
			 
		//	 if( $query )
			// {
			   // $insert_id = mysqli_insert_id($query);
				
		//	    $std = new stdClass($query);
			    //$std->comment_id = $insert_id;
		//	    $std->comment = $comment_txt;
		//		$std->image_loc = $myfile;
		//	    $std->user_id = (int)$user_id;
			//    $std->owner_id = (int)$owner_id;
		 //       $datetime =  strtotime($datetime);
		//		$std->datetime = date("D, d M Y, h:m a", $datetime);

		//		return $std;
		//	 } */
	//}
		/*else if($user_id != $owner_id)
		{
			$sql = "insert into account_comment values( '' , '$comment_txt', '$myfile', $owner_id, $user_id, '$datetime' )";
		    $query = mysqli_query($link,$sql);
			 
			 
			 if( $query )
			 {
			   // $insert_id = mysqli_insert_id($query);
				
			    $std = new stdClass($query);
			    //$std->comment_id = $insert_id;
			    $std->comment = $comment_txt;
				$std->image_loc = $myfile;
			    $std->user_id = (int)$user_id;
			    $std->owner_id = (int)$owner_id;
		        $datetime =  strtotime($datetime);
				$std->datetime = date("D, d M Y, h:m a", $datetime);

				return $std;
			 }
		}	 
		 /*
		 else
		 {
		 	$sql2 = "insert into account_comment values( '' , '$comment_txt', '$myfile', $owner_id, $user_id, '$datetime' )";
	        $query2 = mysqli_query($link,$sql2);

	        $std = new stdClass($query2);
		    //$std->comment_id = $insert_id;
		    $std->comment = $comment_txt;
			$std->image_loc = $myfile;
		    $std->user_id = (int)$user_id;
		    $std->owner_id = (int)$owner_id;
	        $datetime =  strtotime($datetime);
			$std->datetime = date("D, d M Y, h:m a", $datetime);

			return $std;
		 }
		 */
		return null;
		}
	 public static function update( $data )
	 {
	 
	 }
	 public static function delete( $comment_id )
	 {
       //delete the comment from the databas of comment	   
	   
	 }
 
 }
 ?>