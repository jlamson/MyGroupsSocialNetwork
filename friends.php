<!-- friends.php -->
<?php 
	include "verifyLogin.php";
	$title = "Friends";
	$include = "friends.html.php";
	include "phpHelper.php";

	$currentId = $_SESSION['userId'];
	

	include "layout.php";
?>