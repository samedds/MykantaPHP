 <?php
 
 require_once MODELS_DIR . 'users.php';
 require_once MODELS_DIR . 'pictures.php';

 
 class Comments {
    
	public static function getComments(  )
	{
	
	}
      //retursn stdclass frm databs
	 public static function insert( $review , $user_id , $product_id )
	 {
	 	 include "include/conxn.php";
	     //insert data 
	       $datetime =  date('Y\-m\-d\ H:i:s');
		   
		   $review = $review;
		   
	    
		  $sql = "insert into product_review values( '' , '$review',$product_id, $user_id, '$datetime' )";
	      $query = mysqli_query($link, $sql);
		 
		 
		 if( $query )
		 {
		    //$insert_id = mysqli_insert_id();
			
		    $std = new stdClass();
		    //$std->comment_id = $insert_id;
		    $std->comment = $review;
		    $std->user_id = (int)$user_id;
		    $std->product_id = (int)$product_id;
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