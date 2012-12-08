<!-- members.php -->
<?php
	$title = "Members";
	$include = "members.html.php";
	include "phpHelper.php";

	session_start();
	$currentId = $_SESSION['userId'];
	$all_users = getAllUsers();


	include "layout.php";
?>