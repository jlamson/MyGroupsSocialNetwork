<?php
	include 'phpHelper.php';
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	
	$title = "Login -- Mon Amis";
	$include = "login.html.php";
	
	if(isset($_POST['loginEmail']) and isset($_POST['loginPassword'])) {
		$db = initDB();
		$email = $_POST['loginEmail'];
		$password = $_POST['loginPassword'];
		if (validateLogin($email, $password)) {
			header('Location: home.php');
		} else {
			header('Location: login.php');
		}
		exit();
	}

	include "layout.php";
?>