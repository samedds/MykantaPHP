<?php
	if(isset($_POST['task']))
	{
		include "../include/conxn.php";
		include "../include/funcxn.php";
		$filename = safe_input($_POST['filename']);
		rename('../img/comments_images/'.$filename.'','../img/trash/'.$filename.'');
	}
?>