<?php
	include 'phpHelper.php';
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	
	$title = "Login -- Mon Amis";
	$include = "login.html.php";

	session_start();
	if (isset($_SESSION['userId'])) {
		header('Location: home.php');
		exit();
	}

	$error = "";

	if(isset($_POST['loginEmail']) and isset($_POST['loginPassword'])) {
		$db = initDB();
		$email = $_POST['loginEmail'];
		$password = $_POST['loginPassword'];
		if (validateLogin($email, $password)) {
			
			$user_id = getUserIdFromEmail($email);
			if($user_id != false){
				$_SESSION['userId'] = $user_id;	
				header('Location: home.php');
				exit();
			} else {
				$error = "An error occured while logging you in";
			}
		} else {
			$error = "Incorrect login information";
		}
	}

	include "layout.php";
?>