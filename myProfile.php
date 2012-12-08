<?php 
	include 'verifyLogin.php';
	include 'phpHelper.php';	
	$title = "My Profile";
	$include = "myProfile.html.php";
	$error = "";

	if (isset($_REQUEST['useredit'])) {
		if (updateLoggedInUser( $_REQUEST ) == 0) {
			$error = "An error occured while updating your information. Please try again. ";
		}	
	}

	$userInfo = getUserInfo($_SESSION['userId']);
	
	if ($userInfo['day'] == 0) {
		$userInfo['day'] = "DD";
	}
	if ($userInfo['month'] == 0) {
		$userInfo['month'] = "MM";
	}
	if ($userInfo['year'] == 0) {
		$userInfo['year'] = "YYYY";
	} 

	if (isset($_REQUEST['passedit'])) {
		if ($_REQUEST['newPassword'] == $_REQUEST['confPassword']) {
			if (md5($_REQUEST['oldPassword']) == $userInfo['password']) {
				if (updateUserPassword(md5($_REQUEST['newPassword'])) == 0) {
					$error = "An error occured while updating your password. Please try again. ";
				} 
			} else {
				$error = "Your current password was incorrect.";
			}
		} else {
			$error = "The \"New Password\" and \"Confirm Password\" fields did not match";
		}
	}

	include 'layout.php';
?>