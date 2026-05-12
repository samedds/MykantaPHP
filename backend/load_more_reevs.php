<?php
include "include/conxn.php";
//load more reevs
if(isset($_POST['image_loc']))
{
include "../include/funcxn.php";
if($link)
	{
	echo '1';
	}

	else{
	echo '0';
	}
}


if(isset($_POST['load_more_reevs']))
{include "../include/funcxn.php";
$_id_of_user = $_POST['_id_of_user'];
$reev_id = $_POST['reev_id'];
$reev_id2 = $reev_id - 5;
$LIMIT_1 = $_POST['num'];
$LIMIT_2 = $LIMIT_1  + 5;
echo get_status_comment_all_friends_next($_id_of_user,$reev_id,$LIMIT_2);
}

if(isset($_POST['load_new_items']))
{
include "include/sessionfile.php";
$user_id = $_SESSION['id'];
$lastOut =  date('Y\-m\-d\ H:i:s');
setcookie("lastOut", $lastOut, time()  + (3600 * 1) ,"/");
include "../include/funcxn.php";
echo get_status_comment_all_friends($user_id);
}

//load more reevs
if(isset($_POST['load_more_reevs_conect']))
{include "../include/funcxn.php";
$_id_of_user = $_POST['_id_of_user'];
$reev_id = $_POST['reev_id'];
$reev_id2 = $reev_id - 5;
$LIMIT_1 = $_POST['num'];
$LIMIT_2 = $LIMIT_1  + 5;
echo get_status_comment_next($_id_of_user,$reev_id,$LIMIT_2);
}

//load new reevs
if(isset($_POST['load_new_reevs']))
{include "../include/funcxn.php";

//$reev_id = $_POST['reev_id'];

echo  load_new_reevs();
}

//load more reevs
if(isset($_POST['load_more_reevs_tag']))
{include "../include/funcxn.php";
//$_id_of_user = $_POST['_id_of_user'];
//$tag = $_GET['tag'];
  $tag = $_POST['hashtag'];
$LIMIT_1 = $_POST['num'];
$LIMIT_2 = $LIMIT_1  + 5;
echo hashtag_next($tag,$LIMIT_2);
}
//load more reevs
if(isset($_POST['load_more_reevs_conect_pub']))
{include "../include/funcxn_vis.php";
$_id_of_user = $_POST['_id_of_user'];
$reev_id = $_POST['reev_id'];
$reev_id2 = $reev_id - 5;
$LIMIT_1 = $_POST['num'];
$LIMIT_2 = $LIMIT_1  + 5;
echo get_status_comment_next($_id_of_user,$reev_id,$LIMIT_2);
}

//load more reevs
if(isset($_POST['load_more_reevs_tag_pub']))
{include "../include/funcxn_vis.php";
//$_id_of_user = $_POST['_id_of_user'];
//$tag = $_GET['tag'];
  $tag = $_POST['hashtag'];
$LIMIT_1 = $_POST['num'];
$LIMIT_2 = $LIMIT_1  + 5;
echo hashtag_next($tag,$LIMIT_2);
}

//smiles
if(isset($_POST['smile']))
{include "../include/funcxn.php";
include "include/sessionfile.php";
$user_id = $_SESSION['id'];
$datetime =  date('Y\-m\-d\ H:i:s');
$post_id = $_POST['post_id'];


$queryq = "SELECT number_of_smiles FROM smiles_reev
WHERE reev_id = '$post_id' AND user_id = '$user_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser)>=1)
{
while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
	{
	 $number_of_smiles =$flik_info['number_of_smiles'];
	echo $_newnumber_of_smiles = $number_of_smiles ;
	}   
}
else
{
		
$queryq = "SELECT number_of_smiles FROM smiles_reev WHERE reev_id = '$post_id'  ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser)>=1)
{
while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
	{
	 $number_of_smiles =$flik_info['number_of_smiles'];
	 $_newnumber_of_smiles = $number_of_smiles + 1;
  
		$query = "	INSERT INTO `smiles_reev`(`id`, `user_id`,`reev_id`,`number_of_smiles`,`datetime`) VALUES (NULL,'$user_id','$post_id','$_newnumber_of_smiles','$datetime') ";

		if($q_status = mysqli_query($link,$query))
		{
		$post_id = $_POST['post_id'];
		echo  $_newnumber_of_smiles;
		}
	else  echo 'none';   
	}   
}
else{
	// if jnot in database
	$querya = "INSERT INTO smiles_reev(id,user_id,reev_id,number_of_smiles,datetime) VALUES (NULL,'$user_id','$post_id','1','$datetime') ";

	if($q_status = mysqli_query($link,$querya))
	{
	echo '1';
	}
	else  echo 'no';
	}
}
}
//seen
if(isset($_POST['seen']))
{include "../include/funcxn.php";
include "include/sessionfile.php";
$user_id = $_SESSION['id'];
$datetime =  date('Y\-m\-d\ H:i:s');
$seen_id = $_POST['seen_id'];


$queryq = "SELECT number_of_seen FROM seen_reev
WHERE reev_id = '$seen_id' AND user_id = '$user_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);


if($query_q = mysqli_num_rows($queryuser)>=1)
{
echo  $number_of_seen;

while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
	{
	 $number_of_seen_raw =$flik_info['number_of_seen'];
	}  
}
else
{

	 

$queryq = "SELECT number_of_seen FROM seen_reev
WHERE reev_id = '$seen_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);

$query_q = mysqli_num_rows($queryuser) ;

$flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC);

	 $number_of_seen_raw =$flik_info['number_of_seen'];
 

  
$number_of_seen = $number_of_seen_raw + 1;

		$query = "	INSERT INTO `seen_reev`(`id`, `user_id`,`reev_id`,`number_of_seen`,`datetime`) VALUES (NULL,'$user_id','$seen_id','$number_of_seen','$datetime') ";

		if($q_status = mysqli_query($link,$query))
		{
		$seen_id = $_POST['seen_id'];
		echo  $number_of_seen;
		}	

	
$queryz = "SELECT * FROM account_comment where id =  '$seen_id' LIMIT 1";
$query_add = mysqli_query($link,$queryz);
echo '<ul class=" no-padding" style="height:auto;">';
while($products = mysqli_fetch_assoc($query_add))
{
	$account_id = safe_input($products['owner_id']);
	$seen_user_id = safe_input($products['account_id']);
	$comment = $products['comment'];
	$image_loc = $products['image_loc'];
	$datetime =  date('Y\-m\-d\ H:i:s');
	//$datetime = $products['commentDate'];
	$post_id = safe_input($products['id']);
	$datetime =  date('Y\-m\-d\ H:i:s');
	
    $myfile_total = $products['myfile_total'];
    $title_reev = safe_input($products['title']);
    //$datetime = $_POST['datetime'];

    //collecting the owner of the reev
    $sql = "INSERT INTO account_comment (id, myfile_total, comment, title, image_loc, owner_id, account_id, commentDate) VALUES (NULL,'$myfile_total','$comment','$title_reev', '$image_loc','$user_id','$seen_user_id','$datetime') ";		
    $queryuser = mysqli_query($link,$sql);
}

}
}


if(isset($_POST['seen_remove']))
{include "../include/funcxn.php";
include "include/sessionfile.php";
$user_id = $_SESSION['id'];
$datetime =  date('Y\-m\-d\ H:i:s');
$seen_id = $_POST['seen_id'];

$queryq = "SELECT number_of_seen FROM seen_reev
WHERE reev_id = '$seen_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);

$query_q = mysqli_num_rows($queryuser) ;

$flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC);

	 $number_of_seen_raw =$flik_info['number_of_seen'];
 
$queryz = "SELECT image_loc,account_id FROM account_comment where id =  '$seen_id' LIMIT 1";
$query_add = mysqli_query($link,$queryz);
while($products = mysqli_fetch_assoc($query_add))
{
$image_loc = $products['image_loc'];
$user_id2 = $products['account_id'];
}
$query = "UPDATE account_comment SET owner_id ='400' , account_id = '400' WHERE account_id = '$user_id2' AND owner_id = '$user_id' AND image_loc = '$image_loc' LIMIT 1";
$doquery = mysqli_query($link, $query);

   $queryq = "SELECT number_of_seen FROM seen_reev
   WHERE reev_id = '$seen_id' ORDER BY id DESC LIMIT 1";
   $queryuser = mysqli_query($link,$queryq);
   
   $query_q = mysqli_num_rows($queryuser) ;
   
   $flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC);

	 $number_of_seen_raw =$flik_info['number_of_seen'];
	$newq = $number_of_seen_raw - 1;
 

  
$query = "UPDATE seen_reev SET user_id ='400' WHERE user_id = '$user_id' AND reev_id = '$seen_id' ";
$doquery = mysqli_query($link, $query);
  
$query = "UPDATE seen_reev SET number_of_seen ='$newq' WHERE  reev_id = '$seen_id'";

if($doquery = mysqli_query($link, $query))
{
echo $newq;
}



}
?>