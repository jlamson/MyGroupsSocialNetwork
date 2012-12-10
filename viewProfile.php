<!-- viewProfile.php -->
<?php
	include "verifyLogin.php";
	include "phpHelper.php";
	$title = "View Profile";
	$include = "viewProfile.html.php";

	//TODO: 
	// $cur_profile = $_GET['id'];
	$cur_profile = 1;
	

	if (isset($_REQUEST['comment'])) {
		if (addComment($_REQUEST['post_id'], $_REQUEST['status_comment']) > 0) {
			$error = "There was an error in posting your comment";
		}
	}

	if(getUserStatuses($cur_profile)!=false){
		$posts = getUserStatuses($cur_profile);
	} else {
		$posts = array();
	}

	include "layout.php";

?>