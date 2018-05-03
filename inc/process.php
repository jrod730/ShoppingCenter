<?php
	require_once('mysqliDB.php');
	$userID = $_GET['userID'];
	
	if($_GET['pID'] == 1){
		$q = "SELECT * FROM `cart` WHERE `user_id` = ".$userID." && `status_id` = 3"; // select all cart items
		$result = $mysqli->query($q); // query
		while($row = $result->fetch_object()) {
			$qP = "UPDATE `cart` SET `status_id` = 1 WHERE `id`=".$row->id;
			$mysqli->query($qP);
			header("Location: ../cart.php");
		}
	}
	else if ($_GET['pID'] == 2) {
		$q = "DELETE FROM `cart` WHERE `user_id` = ".$userID." && `status_id` = 3";
		$mysqli->query($q);
		header("Location: ../cart.php");
	} 

