 <?php
 
 
 class Users {
    
	public static function getUsers( $product_id )
	{
          $sql = "SELECT name,descrb,price,image_loc,account_id FROM product where product_id = $product_id  ";
		  
		  $query = mysql_query( $sql );
		  
		  if( $query )
		  {
		  
		    if( mysql_num_rows($query) == 1)
			{
			    return mysql_fetch_object( $query );
			}
		  
		  }
		  return null;
	}
 
 
 }
 ?>