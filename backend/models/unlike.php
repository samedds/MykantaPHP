 <?php
 
 class Likers {
    
	
      //retursn stdclass frm databs
	 public static function getLike( $user_id,$shop_id )
	 {include "include/conxn.php";
	  
	   $query = "
         SELECT user_id
		 FROM likes
		 WHERE shop_id = '$user_id' && user_id = '$shop_id'
		";
	$querybannerpic = mysqli_query($link,$query);	
	
	if(	$querybannerpic )
	{  
	     $query = "
        DELETE FROM `myshop`.`likes` WHERE `likes`.`shop_id` = $shop_id && user_id = $user_id";
		 $query4user_info = mysqli_query($link,$query);
	if( $query4user_info )	
     { 
	
	
	}	
	return null;
	
	
	
	}
return null;
	
	}
	
	
	
	
	 public static function update( $shop_id )
	 { include "include/conxn.php";
	   
	  $query = "SELECT COUNT(id) FROM likes WHERE user_id = $shop_id     
	
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