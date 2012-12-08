<?php
	include "verifyLogin.php";
	include "phpHelper.php";
	$title = "Mon Amis";
	$include = "home.html.php";
	$error = "";

	if (isset($_REQUEST['newStatus'])) {
		$status = $_REQUEST['status'];
		
		$db = initDB();
		$query = "INSERT INTO `user_statuses` (`user_id`, `status`) 
			VALUES (?,?)";
		$stmt = $db->prepare($query);
		if (!($stmt = $db->prepare($query))) {
			echo "Prepare failed: (" . $db->errno . ") " . $db->error;
		}

		$stmt->bind_param("is", $_SESSION['userId'], $status);
		
		if (!$stmt->execute()) {
			$error = "There was an error in updated your status";
		}
	}

	$ids = getFriendIds();
	$posts = getFriendsStatuses($ids);

	include "layout.php";
?>