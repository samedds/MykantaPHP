 <?php
 
 require_once MODELS_DIR . '/users.php';
 require_once MODELS_DIR . '/shops.php';
 require_once MODELS_DIR . '/pictures.php';
 
 class Comments {
  
      //retursn stdclass frm databs
	 public static function insert( $comment_txt , $myfile, $user_id , $owner_id )
	 {
             include "include/conxn.php";
	     //insert data 
	       $datetime =  date('Y\-m\-d\ H:i:s');
		   $comment_txt = $comment_txt;
		   
	    
		  $sql = "insert into shop_comment values( '' , '$comment_txt', '$myfile', $owner_id, $user_id, '$datetime' )";
	      $query = mysqli_query($link,$sql);
		 
		 
		 if( $query )
		 {
		    //$insert_id = mysqli_insert_id($query);
			
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