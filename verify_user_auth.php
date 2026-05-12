<!DOCTYPE html>
<?php
//include "include/funcxn.php";
include "include/conxn.php";
?>
<?php if  (isset($_GET['ref_auth']))
{
  $ref_code = $_GET['ref_auth'];  
 
    $update = "UPDATE verify_user_auth SET value = '1' WHERE auth_code_hash = '$ref_code' ";
             	$updatesql = mysqli_query($link, $update);
             	if($updatesql)
             	{
				 Echo '<span class="text=success">Successfully Verified</span>,Click <a href="/"> Mykanta.com </a> and login in with your email and password</span>';  
				}
				} 
else{ Echo '<span class="text=success">Click <a href="/www.mykanta.com"> Mykanta.com</a> You have already verified </span>';  }				
?>
