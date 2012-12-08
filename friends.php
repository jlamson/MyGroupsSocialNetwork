<!-- friends.php -->
<?php 
	$title = "Friends";
	$include = "friends.html.php";
	include "phpHelper.php";

	session_start();
	$currentId = $_SESSION['user_id'];
	

	include "layout.php";
?>