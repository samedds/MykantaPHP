 <?php
 
 
 class Users {
    
	public static function getUsers( $user_id )
	{ include "include/conxn.php";
          $sql = "SELECT firstName,secName,id,username FROM registration where id = $user_id  ";
		  
		  $query = mysqli_query($link, $sql );
		  
		 if( mysqli_num_rows($query) == 1)
			{
			    return mysqli_fetch_object( $query );
			}
		  
		 
		  return null;
	}
 
 
 }
 ?>