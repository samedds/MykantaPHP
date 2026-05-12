 <?php
 
 class Likers {
    
	
      //retursn stdclass frm databs
	 public static function getLike( $user_id,$product_id )
	 {include "include/conxn.php";
	 
	 
	   $query = "
         SELECT product_id FROM likes_products WHERE product_id = '$user_id' && user_id = '$product_id'";

	$querybannerpic = mysqli_query($link,$query);	
   
	if(mysqli_num_rows($querybannerpic))
	{  
	   
 $query = "
        DELETE FROM `myshop`.`likes_products` WHERE `likes_products`.`product_id` = '$user_id' && `user_id` = '$product_id'";
		 $query4user_info = mysqli_query($link,$query);
	if( $query4user_info )	
     { 
	
	
	}	
	return null;
	 
	}
	
else {
	   //---------------------------------------
	   
	    $datetime =  date('Y\-m\-d\ H:i:s');
		   
		  $sql = "insert into likes_products values( '' , ' $product_id',' $user_id','$datetime' )";
	      $query = mysqli_query($link,$sql);
		 
		 
		 if( $query )
		 {
		  //  $insert_id = mysqli_insert_id();
			
		    $std = new stdClass();
		  //  $std->like_id = $insert_id;
	
		    $std->user_id = (int)$user_id;
		    $std->product_id = (int)$product_id;
		    $std->datetime = $datetime;
			
			return $std;
		 }
		 //-----------------------------------
	return null;
		}
		return null;
		}
	 public static function update( $product_id )
	 { include "include/conxn.php";
	   
	  $query = "SELECT COUNT(id) FROM likes_products WHERE user_id = $product_id     
	
";
$query_data = mysqli_query($link,$query);


$query_count = mysqli_fetch_row($query_data);

    if( $query_count )
		 { 
		 $view_count = $query_count[0];
		 
		  $std = new stdClass();
		
		    $std->like_no = (int)$view_count;
		   
			
			return $std;
		 }
	return null;
	

	 }
	 public static function delete( $comment_id )
	 {
       //delete the comment from the databas of comment	   
	   
	 }
 
 }
 ?>