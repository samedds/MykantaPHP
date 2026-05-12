 <?php
 
 
 class Shops {
    
	public static function getShops( $owner_id )
	{
         include "include/conxn.php";
         $sql = "SELECT  shopName FROM shop WHERE shop_id = $owner_id";
		  $query = mysqli_query($link, $sql);
		  
		  if( $query )
		  {
		  
		    if( mysqli_num_rows($query) == 1)
			{
			    return mysqli_fetch_object( $query );
			}
		  
		    }
		  return null;
	}
 
 
 }
 ?>