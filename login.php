<?php
	include 'phpHelper.php';
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	
	$title = "Login -- Mon Amis";
	$include = "login.html.php";

	session_start();

	$error = "";

	if(isset($_POST['loginEmail']) and isset($_POST['loginPassword'])) {
		$db = initDB();
		$email = $_POST['loginEmail'];
		$password = $_POST['loginPassword'];
		if (validateLogin($email, $password)) {

			$user_id = getUserIdFromEmail($email);
			if($user_id != false){
				$_SESSION['userEmail']=$email;
				$_SESSION['userId'] = $user_id;
			} else {
				echo "<script type=\"text/javascript\">
					window.alert(\"That user doesn't exist\")
				</script>";
			}
			header('Location: home.php');
		} else {
			$error = "Incorrect login information";
		}
		exit();
	}

	include "layout.php";
?>