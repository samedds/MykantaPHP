<?php 
if(isset($_POST['task']))
{include "include/conxn.php";
include "include/sessionfile.php";  
include "../include/funcxn.php";

$user_id = $_SESSION['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$telephone = $_POST['telephone'];
$postalcode = $_POST['postalcode'];
$bill_email = $_POST['bill_email'];
$addressline1 = $_POST['addressline1'];
$addressline2 = $_POST['addressline2'];
$city = $_POST['city'];
$region = $_POST['region'];
$country = $_POST['country'];
$datetime = date('j F Y ');

$query = "SELECT user_id FROM billing_info WHERE user_id = '$user_id' LIMIT 1";
	$new_q = mysqli_query($link,$query);
		if ($new_fetch = mysqli_num_rows($new_q)>=1)
			{
			//$new_user_id = $new_fetch['user_id'];
				
			$query2 = "UPDATE billing_info SET firstname = '$firstname',lastname = '$lastname',telephone = '$telephone',bill_email = '$bill_email',postalcode = '$postalcode',addressline1 = '$addressline1',addressline2 = '$addressline2',city = '$city',region = '$region',country = '$country' WHERE user_id = '$user_id'";
			if($new_q = mysqli_query($link,$query2))
				{
				echo  "updated";
				}
			}
			else
			{
			$new_Query = "INSERT INTO billing_info (id, user_id, firstname, lastname, telephone,bill_email, postalcode, addressline1, addressline2, city, region, country) VALUES (NULL,  '$user_id','$firstname', '$lastname', '$telephone','$bill_email', '$postalcode', '$addressline1', '$addressline2', '$city', '$region', '$country')";
			if($query = mysqli_query($link,$new_Query))
				{
				echo  "inserted";
				}
			}

}
?>