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

	if(isset($_POST['loginId']) and isset($_POST['loginId'])) {
		$db = initDB();
		$log_id = $_POST['loginId'];
		$password = $_POST['loginPassword'];
		if (validateLogin($log_id, $password)) {
			
			$user_id = getUserIdFromEmail($log_id);
			if($user_id == false){
				$user_id = getUserIdFromUserName($log_id);	
			}
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