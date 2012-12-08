<!-- logOut.php -->
<?php
	$title = "Mon Amis - Log Out";
	$include = "logOut.html.php";

	session_start();
	$_SESSION = array(); 
	session_destroy();

	include "layout.php";
?>