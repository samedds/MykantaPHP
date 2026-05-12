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
   
	if(mysqli_num_rows($querybannerpic)==1)
	{  
	    
	}
	
else {
	   //---------------------------------------
	   
	    $datetime =  date('Y\-m\-d\ H:i:s');
		   
		  $sql = "insert into likes values( '' , ' $shop_id',' $user_id','$datetime' )";
	      $query = mysqli_query($link,$sql);
		 
		 
		 if( $query )
		 {
		  //  $insert_id = mysqli_insert_id();
			
		    $std = new stdClass();
		  //  $std->like_id = $insert_id;
	
		    $std->user_id = (int)$user_id;
		    $std->shop_id = (int)$shop_id;
		    $std->datetime = $datetime;
			
			return $std;
		 }
		 //-----------------------------------
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