<?php

	if (session_start()) {
		if (!isset($_SESSION['userId'])) {
			header("Location: login.php");
		}
	}
?>

