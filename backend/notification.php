<?php
include "../include/sessionfile.php";
include "../include/conxn.php";
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyC6zLNKFVDJt5QKLgR_ErJjC3QJUJ-YdYM' );
//new post ------/
//smile  --------/
//repost --------/
//comment on a post -----/
//connection req  ------/
//shop subscribe
//shop review
//product review
//chatting  ----------/
//product order
//appoointment


//$registrationIds = array( $_POST['id'] );
$me_id = $_SESSION['id'];

if(isset($_SESSION['id']))
{
$sql = "SELECT username FROM registration WHERE id='$me_id' LIMIT 1";
$query = mysqli_query($link,$sql);
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
        {
          $me_username =  ucfirst($row["username"]);
        }
		
		$sqlimgae = "SELECT image_loc FROM profile_pic WHERE account_id='$me_id' LIMIT 1";
		$queryimage = mysqli_query($link,$sqlimgae);
			while ($rowim = mysqli_fetch_array($queryimage, MYSQLI_ASSOC)) 
        {
          $me_image =  "/img/avatars/mini/".$rowim["image_loc"];
        }
}

// friend Token_IDs
if(isset($_POST['commentuser']))
{
//$username = $_POST['username'];
$post_id = $_POST['post_id'];
$friend_token = array();
$sql = "SELECT account_id FROM account_comment WHERE id='$post_id' LIMIT 1";
$query = mysqli_query($link,$sql);
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
        {
            $user_id = $row['account_id'];
            $sql2 = "SELECT token FROM fcm WHERE user_id='$user_id'";
            $query2 = mysqli_query($link,$sql2);
                while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) 
                    {
                        $new =  $row2["token"];
                        array_push($friend_token,$new);
                    }
        }
      $registrationIds = $friend_token;
       echo $body =  $me_username.' commented on your post.';
	//	$url = "/reev_load/".$post_id;
		$url = "/reev/".$post_id;
}
// friend Token_IDs
if(isset($_POST['friend_req']))
{
//$username = $_POST['username'];
$friend_id = $_POST['friend_id'];
$friend_token = array();

$sql2 = "SELECT token FROM fcm WHERE user_id='$friend_id'";
$query2 = mysqli_query($link,$sql2);
	while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) 
		{
			$new =  $row2["token"];
			array_push($friend_token,$new);
		}

      $registrationIds = $friend_token;
        $body =  $me_username.' follows you now.';
		$url = "/connection-auth/".$me_username;
}
// friend chatting
if(isset($_POST['friend_chat']))
{
//$username = $_POST['username'];
$friend_id = $_POST['friend_id'];
$friend_token = array();

$sql2 = "SELECT token FROM fcm WHERE user_id='$friend_id'";
$query2 = mysqli_query($link,$sql2);
	while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) 
		{
			$new =  $row2["token"];
			array_push($friend_token,$new);
		}

      $registrationIds = $friend_token;
        $body =  $me_username.' sent you a message.';
		$url = "/message";
}

// friend Token_IDs
if(isset($_POST['smile']))
{
$post_id = $_POST['post_id'];
$friend_token = array();
$sql = "SELECT account_id FROM account_comment WHERE id='$post_id' LIMIT 1";
$query = mysqli_query($link,$sql);
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
        {
            $user_id = $row['account_id'];
            $sql2 = "SELECT token FROM fcm WHERE user_id='$user_id' LIMIT 1";
            $query2 = mysqli_query($link,$sql2);
                while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) 
                    {
                        $new =  $row2["token"];
                        array_push($friend_token,$new);
                    }
        }
       $registrationIds = $friend_token ;
        $body =  $me_username.' smiles at your post.';
		$url = "/reev/".$post_id;
}
// repost
if(isset($_POST['repost']))
{
$post_id = $_POST['post_id'];
$friend_token = array();
$sql = "SELECT account_id FROM account_comment WHERE id='$post_id' LIMIT 1";
$query = mysqli_query($link,$sql);
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
        {
            $user_id = $row['account_id'];
            $sql2 = "SELECT token FROM fcm WHERE user_id='$user_id' LIMIT 1";
            $query2 = mysqli_query($link,$sql2);
                while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) 
                    {
                        $new =  $row2["token"];
                        array_push($friend_token,$new);
                    }
        }
       $registrationIds = $friend_token ;
        $body =  $me_username.' shared your Post.';
		$url = "/reev/".$post_id;
}
// shop Token_IDs
if(isset($_POST['shopname']))
{
$shopname = $_POST['shopname'];
$shop_token = array();
$sql = "SELECT user_id FROM shop WHERE shopName='$shopname' LIMIT 1";
$query = mysqli_query($link,$sql);
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
        {
            $user_id = $row['user_id'];
            $sql2 = "SELECT token FROM fcm WHERE user_id='$user_id'";
            $query2 = mysqli_query($link,$sql2);
                while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) 
                    {
                        $new_shop =  $row2["token"];
                        array_push($shop_token,$new_shop);
                    }
        }
     $registrationIds = $shop_token;
    $body =  $me_username.' bought a product in '.ucwords($shopname);
	  $url = "/business/".$shopname;
}

//all friends Token_IDs . friends and followers
if(isset($_POST['postnew']))
{
$all_friends_token = array();
$sql = "SELECT account_id FROM friends WHERE friend_id='$me_id' AND value='1' ORDER BY id";
$query = mysqli_query($link,$sql);
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
        {
            $user_id = $row['account_id'];
            $sql2 = "SELECT token FROM fcm WHERE user_id='$user_id'";
            $query2 = mysqli_query($link,$sql2);
                while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) 
                    {
                        $new =  $row2["token"];
                        array_push($all_friends_token,$new);
                    }
        }

//sql for user u connected an or have connection
$sql = "SELECT friend_id FROM friends WHERE account_id='$me_id' AND value='1' ORDER BY id";
$query = mysqli_query($link,$sql);
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) 
        {
            $user_id = $row['friend_id'];
            $sql2 = "SELECT token FROM fcm WHERE user_id='$user_id'";
            $query2 = mysqli_query($link,$sql2);
                while ($row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) 
                    {
                        $new =  $row2["token"];
                        array_push($all_friends_token,$new);
                    }
        }
        $registrationIds = $all_friends_token ;
            $body =  $me_username.' created a new post.';
	  $url = "/user";
}


// prep the bundle
$data=array();
$data["data"]=array();
$msg = array
(
	    "message"=> $body,
        "title"=> "Mykanta",
        "icon"=>"https://www.mykanta.com".$me_image,
		"click_action"=>"https://www.mykanta.com".$url,
		 "sound"=> "default",
		"color"=> "#5bc0de"
);
 array_push($data["data"], $msg);

	//'registration_ids' 	=> $registrationIds,
	//'notification'			=> $msg	
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
echo $result = curl_exec($ch );
curl_close( $ch );
json_encode( $fields );


$result = json_decode($result);
$canonical_ids_count = $result->canonical_ids;
if($canonical_ids_count){
   echo 'true';
} else { echo "false";}


/*
$data2 = array
( 
	"name"=>"Sam",
	"imageUrl"=>"https://firebasestorage.googleapis.com/v0/b/friendlychat-4f61d.appspot.com/o/r9zxFDU7dVWKBDQ13i59vvLhNIC2%2F-KpB1LR7Bg-Jx-y-696_%2F20170630_114541.jpg?alt=media&token=825fcf30-594e-4487-93dd-68b070158682",
    "text" => "you notification text is here!!",
    "photoUrl"  => "https://lh3.googleusercontent.com/-ZGDLyCfeoow/AAAAAAAAAAI/AAAAAAAAAIA/_ZRwvxUXZGs/photo.jpg"
);
    $url = "https://friendlychat-4f61d.firebaseio.com/messages.json";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);                               
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data2));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
    $jsonResponse = curl_exec($ch);
    if(curl_errno($ch))
    {
        echo 'Curl error: ' . curl_error($ch);
    }else {echo   $jsonResponse;}
    curl_close($ch);
*/

//----------------------------------------------------------------------------------------------------------
