<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, DELETE");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
// created by Kofi Samuel Edwards-Akhurst 18/06/17
include "./funcxn.php";  
include "../include/conxn.php"; 
// products array

 
if(isset($_GET['search']))
{$gallery=array();
$gallery["data"]=array();
	$search = $_GET['search'];
	 $param = "%{$search}%";
		 $query = "SELECT DISTINCT id,image_loc FROM account_comment WHERE title LIKE '$param'  ORDER BY id DESC ";

         $query_add = mysqli_query($link,$query);
         if($query_galleryUser = mysqli_num_rows($query_add)> 0)
           {
             while($products = mysqli_fetch_assoc($query_add))
            {
                $image_loc = $products['image_loc']; 
                $id = $products['id']; 
					    $gallery_item=array(
						 "url" => $image_loc,
						 "id" => $id
						  );
		     array_push($gallery["data"], $gallery_item);
	 	   }	
	    }	 echo json_encode($gallery);
    
  }
  
  
if(isset($_GET['id_gallery']))
{$gallery=array();
$gallery["data"]=array();
	$id = $_GET['id_gallery'];
	 $query = "SELECT * FROM account_comment WHERE owner_id = '$id' AND  account_id = '$id'  ORDER BY id DESC ";

         $query_add = mysqli_query($link,$query);
         if($query_galleryUser = mysqli_num_rows($query_add)> 0)
           {
             while($products = mysqli_fetch_assoc($query_add))
            {
                $image_loc = $products['image_loc']; 
                $id = $products['id']; 
					    $gallery_item=array(
						 "url" => $image_loc,
						 "id" => $id
						  );
		     array_push($gallery["data"], $gallery_item);
	 	   }	
	    }	 echo json_encode($gallery);
    
  }
  
    
if(isset($_GET['token']))
{$gallery=array();
$gallery["data"]=array();
	 $id = ''; 
	$token = $_GET['token'];
	$sql = "SELECT * FROM registration WHERE token ='$token' LIMIT 1";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		 {
		 	 $id = $row['id']; 
		 }
		  
		 $query2 = "SELECT * FROM account_comment WHERE owner_id = '$id' AND  account_id = '$id'  ORDER BY id DESC ";

         $query_add = mysqli_query($link,$query2);
         if($query_galleryUser = mysqli_num_rows($query_add)> 0)
           {
             while($products = mysqli_fetch_assoc($query_add))
            {
                $image_loc = $products['image_loc']; 
                $id = $products['id']; 
					    $gallery_item=array(
						 "url" => $image_loc,
						 "id" => $id
						  );
		     array_push($gallery["data"], $gallery_item);
	 	   }	
	    }	 echo json_encode($gallery);
    
  }
  
  
  
  
  
  
  if(isset($_GET['username_main']))
{$gallery=array();

	//this fetches the profile timeline
	$username = $_GET['username_main']; 
	$sqlw = "SELECT id FROM registration where username ='$username' LIMIT 1";
	$queryq = mysqli_query($link,$sqlw);
	while($rowz = mysqli_fetch_assoc($queryq))
		 {
		  $id = $rowz['id']; 
		  
		 $all_friendsq2 = connection_ids_distinct($id);
		  $range =  implode(',',$all_friendsq2) ;
		  
		 $queryi = "SELECT DISTINCT image_loc FROM account_comment where  account_id NOT IN ($range) AND owner_id  IN ($range) AND owner_id != $id AND account_id != $id OR account_id = owner_id AND owner_id IN ($range) AND owner_id != $id AND account_id != $id OR  account_id =$id AND owner_id = $id group BY id DESC LIMIT 10";

          if($query_add2 = mysqli_query($link,$queryi))
           {
             while($products2 = mysqli_fetch_assoc($query_add2))
            {
			$image_loc1 = $products2['image_loc']; 
		  
		 $query = "SELECT * FROM account_comment where image_loc = '$image_loc1' ORDER BY id desc LIMIT 1";
 if($query_add = mysqli_query($link,$query))
           {
             while($products = mysqli_fetch_assoc($query_add))
            {
				$image_loc = $products['image_loc']; 
				$id2 = $products['owner_id']; 
				$account_id = $products['account_id']; 
				$post_id = $products['id']; 
                $comment =  str_replace(['\r\n', '\r', '\n'], " ",$products['comment']); 
                $title =  ucwords(str_replace(['\r\n', '\r', '\n'], " ",$products['title'])); 
                $myfile_total = $products['myfile_total']; 
                $datetime = strtotime($products['commentDate']);
				$date = date("D,d M Y", $datetime);
				
				 $sql2 = "SELECT * FROM registration where id =$account_id LIMIT 1";
	    $query3 = mysqli_query($link,$sql2);
	       while($row2 = mysqli_fetch_array($query3,MYSQLI_ASSOC))
		       {
		       $username =  $row2["username"];	 
		       $idd =  $row2["id"];	 
		       }
				 
				
              if($account_id == $id2 )
			  {
				 $gallery_item=array(
				"post_id" => $post_id, 
				"id" => $idd, 
				"username" => $username,
				"url" => $image_loc,
				"comment" => $comment,
				"title" => $title,
				"date" => $date,
				"smiles_user"=>smiles_user($id,$post_id),
				"play_icon" => seen_re_count($myfile_total),
				 "nofsmiles" => smiles_reev($image_loc,$post_id),
				"picture"=> get_profile_pic($id2),
				"myfile_total" => $myfile_total
				);
		        array_push($gallery, $gallery_item);
	 	    
			  } else  if($account_id != $id2 ){
				  $sql2 = "SELECT * FROM registration where id =$id2 LIMIT 1";
	    $query2 = mysqli_query($link,$sql2);
	       while($row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC))
		       {
		       $username2 =  $row2["username"];	 
		       $idacc =  $row2["id"];	 
		      
					    $gallery_item=array(
						 "post_id" => $post_id, 
						 "id" => $idd, 
						 "idacc" => $idacc, 
						 "username" => $username,
						 "username_repost" => 'Reposted by: '.$username2,
						 "url" => $image_loc,
						 "comment" => $comment,
						 "title" => $title,
						 "date" => $date,
						 "smiles_user"=>smiles_user($id,$post_id),
						 "play_icon" => seen_re_count($myfile_total),
						 "nofsmiles" => smiles_reev($image_loc,$post_id),
						 "picture"=> get_profile_pic($account_id),
						 "myfile_total" => $myfile_total
						  );
		        array_push($gallery, $gallery_item);
	 	      }
			  }
		  
			
		   }	
	    }	
		  }
		   } echo json_encode($gallery);
		   
      } 
  }
    
  
  
  
  
  if(isset($_GET['username']) && $_GET['limit'])
{$gallery=array();

	//this fetches the profile timeline
	$username = $_GET['username']; 
	$limit = $_GET['limit']; 
	$sqlw = "SELECT id FROM registration where username ='$username' LIMIT 1";
	$queryq = mysqli_query($link,$sqlw);
	  
	while($rowz = mysqli_fetch_assoc($queryq))
		 {
		  $id = $rowz['id']; 
		  
		 $all_friendsq2 = connection_ids_distinct($id);
		  $range =  implode(',',$all_friendsq2) ;
		  
		 $queryi = "SELECT DISTINCT image_loc FROM account_comment where  account_id NOT IN ($range) AND owner_id  IN ($range) AND owner_id != $id AND account_id != $id OR account_id = owner_id AND owner_id IN ($range) AND owner_id != $id AND account_id != $id OR  account_id =$id AND owner_id = $id group BY id DESC LIMIT $limit,10";

          if($query_add2 = mysqli_query($link,$queryi))
           {
             while($products2 = mysqli_fetch_assoc($query_add2))
            {
			$image_loc1 = $products2['image_loc']; 
		  
		 $query = "SELECT * FROM account_comment where image_loc = '$image_loc1' ORDER BY id desc LIMIT 1";
 if($query_add = mysqli_query($link,$query))
           {
             while($products = mysqli_fetch_assoc($query_add))
            {
				$image_loc = $products['image_loc']; 
				$id2 = $products['owner_id']; 
				$account_id = $products['account_id']; 
				$post_id = $products['id']; 
                 $comment =  str_replace(['\r\n', '\r', '\n'], " ",$products['comment']); 
                $title =  ucwords(str_replace(['\r\n', '\r', '\n'], " ",$products['title'])); 
                $myfile_total = $products['myfile_total']; 
                $datetime = strtotime($products['commentDate']);
				$date = date("D,d M Y", $datetime);
				 $sql2 = "SELECT * FROM registration where id =$account_id LIMIT 1";
	    $query3 = mysqli_query($link,$sql2);
	       while($row2 = mysqli_fetch_array($query3,MYSQLI_ASSOC))
		       {
		       $username =  $row2["username"];	 
		       $idd =  $row2["id"];	 
		       }
				 
				
              if($account_id == $id2 )
			  {
				 $gallery_item=array(
				"post_id" => $post_id, 
				"id" => $idd, 
				"username" => $username,
				"url" => $image_loc,
				"comment" => $comment,
				"title" => $title,
				"date" => $date,
				"smiles_user"=>smiles_user($id,$post_id),
				"play_icon" => seen_re_count($myfile_total),
				 "nofsmiles" => smiles_reev($image_loc,$post_id),
				"picture"=> get_profile_pic($id2),
				"myfile_total" => $myfile_total
				);
		        array_push($gallery, $gallery_item);
	 	    
			  } else  if($account_id != $id2 ){
				  $sql2 = "SELECT * FROM registration where id =$id2 LIMIT 1";
	    $query2 = mysqli_query($link,$sql2);
	       while($row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC))
		       {
		       $username2 =  $row2["username"];	 
		       $idacc =  $row2["id"];	 
		      
					    $gallery_item=array(
						 "post_id" => $post_id, 
						 "id" => $idd, 
						 "idacc" => $idacc, 
						 "username" => $username,
						 "username_repost" => 'Reposted by: '.$username2,
						 "url" => $image_loc,
						 "comment" => $comment,
						 "title" => $title,
						 "date" => $date,
						 "smiles_user"=>smiles_user($id,$post_id),
						 "play_icon" => seen_re_count($myfile_total),
						 "nofsmiles" => smiles_reev($image_loc,$post_id),
						 "picture"=> get_profile_pic($account_id),
						 "myfile_total" => $myfile_total
						  );
		        array_push($gallery, $gallery_item);
	 	      }
			  }
		  
			
		   }	
	    }	
		  }
		   } echo json_encode($gallery);
		   
      } 
  }

function seen_re_count($myfile_total)
{

if($myfile_total>=1)
{
   return $myfile_total;
 }
 else{
        return null;
      }
}
  
function connection_ids_distinct($id)
{
include "../include/conxn.php";  
$all_friends = array();
$sql = "SELECT DISTINCT account_id FROM friends WHERE friend_id ='$id'  AND value <= '1' ";
$query = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
{
array_push($all_friends, $row["account_id"]);
}
$sql2 = "SELECT DISTINCT friend_id FROM friends WHERE account_id ='$id' AND value >= '1'";
$queryq2 = mysqli_query($link,$sql2);
while ($row = mysqli_fetch_array($queryq2, MYSQLI_ASSOC))
{
 array_push($all_friends, $row["friend_id"]);
 
}
 return $all_friends;
 }

?>