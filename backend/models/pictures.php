 <?php
 
 
 class Pictures {
    
	public static function getPictures( $user_id )
	{
	include "include/conxn.php";
          $sql = " SELECT image_loc FROM profile_pic WHERE account_id = $user_id";
		  
		  $query = mysqli_query($link, $sql );
	
		   if( mysqli_num_rows($query) == 1)
			{
			    return mysqli_fetch_object( $query );
			}
		  
		  return null;
	}
 
 
 }
 ?>