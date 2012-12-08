<!-- friends.php -->
<?php 
	include "verifyLogin.php";
	$title = "Friends";
	$include = "friends.html.php";
	include "phpHelper.php";

	$currentId = $_SESSION['userId'];
	$all_friends = getFriendIds();
	
	if(isset($_REQUEST['deleteFriend'])){
		$friendId= $_REQUEST['friendId'];
		deleteFriend($friendId);
	}

	if($all_friends == false){
		foreach ($all_friends as $cur_id) {
			if($cur_id != $_SESSION['userId']){
				$all_info[] = getUserInfo($cur_id);
			}
		}
	}

	include "layout.php";
?>