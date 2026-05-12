 <?php
 
 require_once MODELS_DIR . 'users.php';
 require_once MODELS_DIR . 'pictures.php';
 
 class Replies {
    
	public static function getReplys(  )
	{
	
	}
      //retursn stdclass frm databs
	 public static function insert( $reply , $user_id , $comment_id )
	 {
	     //insert data 
	      $datetime =  date('Y\-m\-d\ H:i:s');
		   $reply = $reply;
	/*	   
	    $query = "INSERT INTO `myshop`.`reply` (
`id` ,
`reply` ,
`post_id` ,
`post_user_id` ,
`reply_user_id` ,
`datetime`)
		  VALUES (
NULL , '$reply','$post_id', '$post_user_id', '$post_user_id', '$account_id', '$datetime' 
)";
	*/	
		
		
		
		  $sql = "insert into reply values( '' , '$reply',$comment_id, '', $user_id, '$datetime' )";
	      $query = mysql_query($sql);
		 
		 
		 if( $query )
		 {
		    $insert_id = mysql_insert_id();
			
		    $std = new stdClass();
		    $std->comment_id = (int)$insert_id;
		    $std->reply = $reply;
		    $std->user_id = (int)$user_id;
		    $std->datetime = $datetime;
			
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