 <?php
 

	$thisUser = $_SESSION['id'];

	//find last logut time
	$logout = "SELECT * from status where user_id = '$thisUser' ";
	$querylogout = mysqli_query($link, $logout);
	while($whilelogout = mysqli_fetch_assoc($querylogout))
	{
		$lastOut = $whilelogout['last_datetime'];
	}

	//find subscribed shops
	$subs = "SELECT * from subscribers where user_id = '$thisUser' ";
	$querysubs = mysqli_query($link, $subs);
	$totalSubs = mysqli_num_rows($querysubs);
	while($whilesubs = mysqli_fetch_assoc($querysubs))
	{
		$mySubs[] = $whilesubs['shop_id'];
	}
	//convert array to string
	$range = '(' . implode(",",$mySubs) . ')';

	//select subscribed shop comments
	$sql = "SELECT 'EMPTY' AS product_id, 'EMPTY' AS name, 'EMPTY' AS descrb, 'EMPTY' AS price, comment, image_loc, shop_id, 
	account_id, datetime FROM shop_comment WHERE shop_id IN $range /*AND datetime > $lastOut*/ order by datetime desc";
	$query = mysqli_query($link,$sql);
	while($row = mysqli_fetch_assoc($query))
	{
		$userid[] = array($row['comment'], $row['image_loc'], $row['shop_id'], $row['account_id'], 
			$row['product_id'], $row['name'], $row['descrb'], $row['price'], $row['datetime']);
	}
/*	print "<pre>";
	print_r($userid);
	print "<pre>"; */

	$sql2 = "SELECT 'EMPTY' AS comment, product_id, account_id,shop_id,name, descrb,price, image_loc, 'EMPTY' AS datetime FROM product WHERE shop_id IN $range order by product_id desc";  
	$query2 = mysqli_query($link,$sql2);
	while($row2 = mysqli_fetch_assoc($query2))
	{
		$userid2[] = array($row2['comment'], $row2['image_loc'], $row2['shop_id'], $row2['account_id'], 
			$row2['product_id'], $row2['name'], $row2['descrb'], $row2['price'], $row2['datetime']);
	}
	/*print "<pre>";
	print_r($userid2);
	print "<pre>";*/

	//merge the two arrays
	$result = array_merge($userid, $userid2);

	//sort the merged array according to date which is record [2] of each inner array
	function compare_datetime($a, $b) 
	{ 
		return strcmp($a['8'], $b['8']); 
	} 
	// sort 
	usort($result, 'compare_datetime');

	//reverse the sorted array to descending order
	$reversed = array_reverse($result);

	 $arraysize = count($reversed);
	for($i=0; $i < $arraysize; $i++)
	{
	echo	 $theid = $reversed[$i][1];
/*	echo 	*/ $theid.'<br>';
	}
/*
	print "<pre>";
print_r($reversed);
	print "<pre>";
	*/
	        

 $reversed;
	$niew2 = $reversed['1'];

 ?>