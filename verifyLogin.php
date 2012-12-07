<?php

	session_start();
	if (!isset($_SESSION['userId'])) {
		$_SESSION = array();
		header("Location: login.php");
	}

?>

