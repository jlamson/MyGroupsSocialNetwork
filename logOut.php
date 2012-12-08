<!-- logOut.php -->
<?php
	$title = "Mon Amis - Log Out";

	session_start();
	$_SESSION = array(); 
	session_destroy();

	header("Location: login.php");
?>