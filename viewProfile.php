<!-- viewProfile.php -->
<?php
	include "verifyLogin.php";
	include "phpHelper.php";
	$title = "View Profile";
	$include = "viewProfile.html.php";

	//TODO: 
	// $cur_profile = $_GET['id'];
	$cur_profile = 1;
	
	include "layout.php";

?>