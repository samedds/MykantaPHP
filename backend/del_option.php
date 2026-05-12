<?php
	if(isset($_POST['task']))
	{
		include"../include/conxn.php";
		include "../include/funcxn.php";
		include "../include/sessionfile.php";

		$option_id = safe_input($_POST['option_id']);

		$delpost = "DELETE FROM product_option WHERE id = '$option_id' LIMIT 1";
		if($delpostquery = mysqli_query($link,$delpost))
		{
	    	echo "Option deleted";
	    }
	    else
	    {
	    	echo "Unable to delete option. Please try again or check internet connection";
	    }
	}
	else
	{
		echo "<div class='info'>Sorry, no data was passed. Please try again. Thanks...</div>";
	}
	
?>