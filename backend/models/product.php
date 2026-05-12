 <?php
 
 require_once MODELS_DIR . 'users.php';
 
 class Products {
    
	
      //retursn stdclass frm databs
	 public static function getProduct( $shop_id,$product_id , $user_id )
	 {$query = "SELECT product_id FROM product_view
		 WHERE shop_id = $shop_id && user_id = $user_id
		";
	$queryb = mysql_query($query);	
   
	if(mysql_affected_rows()==1)
	{  
	    
	}
	
else {
	   //---------------------------------------
	   
	    $datetime =  date('Y\-m\-d\ H:i:s');
		   
		  $sql = "insert into product_view values( '' , ' $product_id','$user_id',' $shop_id','$datetime' )";
	      $query = mysql_query($sql);
		 
		 
		 if( $query )
		 {
		    $insert_id = mysql_insert_id();
			
		    $std = new stdClass();
		    $std->product_view_id = $insert_id;
	
		    $std->product_id = (int)$product_id;
		    $std->user_id = (int)$user_id;
		    $std->shop_id = (int)$shop_id;
		    $std->datetime = $datetime;
			
			return $std;
		 }
		 //-----------------------------------
	return null;
		}
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