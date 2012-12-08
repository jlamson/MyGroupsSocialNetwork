<!-- members.php -->
<?php
	$title = "Members";
	$include = "members.html.php";
	include "phpHelper.php";
	include "verifyLogin.php";
	$currentId = $_SESSION['userId'];
	$all_users = getAllUsers();

	if(isset($_REQUEST['addFriend'])){
		$friendId = $_REQUEST['friendId'];
		addFriend($friendId);
	}

	if(isset($_REQUEST['deleteFriend'])){
		$friendId= $_REQUEST['friendId'];
		deleteFriend($friendId);
	}

	foreach ($all_users as $cur_id) {
		if($cur_id != $_SESSION['userId']){
			$all_info[] = getUserInfo($cur_id);
		}
	}

	include "layout.php";
?>