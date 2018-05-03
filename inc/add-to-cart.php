<?php

if( isset($_GET['userID']) && $_GET['itemID'])
{
	require_once('../inc/mysqliDB.php'); 

	$userID = $_GET['userID'];
	$itemID = $_GET['itemID'];

	$result = $mysqli->query("SELECT * FROM `cart` WHERE `user_id` = ".$userID." && `product_id` = ".$itemID." && status_id = 3");

	if($result->num_rows!=0) // already added
	{
		header('Location: ../index.php?msg=1&itemID='.$itemID.'');
	} else {
		$date = date('Y-m-d H:i:s');
		$q = "INSERT INTO `cart` (`product_id`, `user_id`, `purchased_at`, `status_id`)
										VALUES ('".$itemID."', '".$userID."', '".$date."', '3')";
		$mysqli->query($q);
		header('Location: ../index.php?msg=2&itemID='.$itemID.'');
	}
} 

// header('Location: ../index.php?msg=0');