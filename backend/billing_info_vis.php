<?php 

if(isset($_POST['task']))
{
include "include/conxn.php";
ob_start();
session_start();

 $user_id = $_SESSION['vis_id'];
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $telephone = $_POST['telephone'];
 $postalcode1 = $_POST['postalcode'];
 if(  $postalcode1 = 'NULL')
 {
   $postalcode = '0';
 }
 else{
    $postalcode = $_POST['postalcode'];
 }
 $bill_email = $_POST['bill_email'];
 $addressline1 = $_POST['addressline1'];
 $addressline2 = $_POST['addressline2'];
 $city = $_POST['city'];
 $region = $_POST['region'];
 $country = $_POST['country'];
 $datetime = date('j F Y ');

$query = "SELECT user_id_vis FROM billing_info_vis WHERE user_id_vis = '$user_id' LIMIT 1";
	$new_q = mysqli_query($link,$query);
		if ($new_fetch = mysqli_num_rows($new_q)>=1)
			{echo '2';
			//$new_user_id = $new_fetch['user_id'];
				
			$query2 = "UPDATE billing_info_vis SET firstname = '$firstname',lastname = '$lastname',telephone = '$telephone',bill_email = '$bill_email',postalcode = '$postalcode',addressline1 = '$addressline1',addressline2 = '$addressline2',city = '$city',region = '$region',country = '$country' WHERE user_id_vis = '$user_id'";
			if($new_q = mysqli_query($link,$query2))
				{echo '3';
				echo  "updated";
				}
			}
			else
			{
				$new_Query = mysqli_query($link,"INSERT INTO billing_info_vis (id, user_id_vis, firstname,lastname, telephone, bill_email, postalcode, addressline1, addressline2, city, region, country) VALUES (NULL, '$user_id','$firstname', '$lastname', '$telephone','$bill_email', '0', '$addressline1', '$addressline2', '$city', '$region', '$country');");
				
			if($new_Query  )
				{
			
				echo  "Saved";
				}
				else
				{ echo 'did not save';
				}
			}

}
?>