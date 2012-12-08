<!-- friends.php -->
<?php 
	include "verifyLogin.php";
	$title = "Friends";
	$include = "friends.html.php";
	include "phpHelper.php";

	$currentId = $_SESSION['userId'];
	
	
	if(isset($_REQUEST['deleteFriend'])){
		$friendId= $_REQUEST['friendId'];
		deleteFriend($friendId);
	}

	$all_friends = getFriendIds();
	if($all_friends != false){
		foreach ($all_friends as $cur_id) {
			if($cur_id != $_SESSION['userId']){
				$all_info[] = getUserInfo($cur_id);
			}
		}
	}else{
		$all_info = array();
	}
	include "layout.php";
?>