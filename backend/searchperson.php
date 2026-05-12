<?php

include "include/conxn.php";


 function searchperson($search_text)
{
include "include/conxn.php";
$username_raw = safe_input($search_text);
$username = preg_replace('/[^A-Za-z0-9\_\ ]/ ', '', $username_raw);
  $param_username = "%{$username}%";
   if(strlen($username)>=3)
	 { //for shop
        $query_sub = $link->prepare("SELECT id,username FROM registration WHERE username LIKE ?  ");
	 $query_sub->bind_param('s',$param_username );  
	
	if(  $query_sub->execute( ) )
	{
	$query_sub->store_result();
    $query_sub->bind_result($id,$username);
	 while( $query_sub->fetch() )
	   { 
	  
	   $query_row1 = array( 'id'=> $id,'username'=> $username );
	   $id = $query_row1['id'];
	   $username = $query_row1['username'];
	  
	   echo '<input type="hidden" id="peopleNum" value="'.$query_sub->num_rows.' +" />
		<script> var peopleNom = $("#peopleNum").val();
		document.getElementById("peopleNo").innerHTML = peopleNom; 
		</script>';
 
      $query = $link->prepare("  SELECT image_loc  FROM profile_pic  WHERE account_id = ? ");
	 $query->bind_param('i',$id );  
	  if(  $query->execute( ) )
	   {
	    $query->store_result();
         $query->bind_result($image_loc);
	      while( $query->fetch() )
	        { 
	             $query_row1 = array( 'image_loc'=> $image_loc );
						 $banner_image = $query_row1['image_loc'];
					       echo '<div  class="no-padding" style="" > <table>   <tr>
						   <td class=" padding-10" bgcolor="" >
							  <img src="/img/avatars/mini/'. $banner_image.'" alt="img"class="img img-thumbnail"style= "height:auto;  width:50px;">
						      </td> 
						       <td class="font-sm" bgcolor="" width="" cellspacing="5" >
						      <p><a href="/connection-auth/'.$username.'">'.$username.'</a></p>
						    </td>
						   </tr>
					     </table></div> ';
					   }
				   }
            }
   }
else{
  echo  '<div class="well well-light"><p class="text-danger "> Name not found.</p><p class="text-info "> Try a different name.</p></div>';
   }

}else echo  'gaa';
}

?>