<!-- confirm new user -->
<?php
	include 'phpHelper.php';
	$db = initDB();
	$error = "";

	if (!isset($_REQUEST['confirmUser'])) {
		$userName = $_POST['uname'];
		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$email = $_POST['email'];
		$email_confirm = $_POST['emailConfirm'];
		$password = $_POST['password'];
		$passwordConfirm = $_POST['passwordConfirm'];
		$gender = $_POST['gender'];
		$month = $_POST['month'];
		$day = $_POST['day'];
		$year = $_POST['year'];
		
		$pwHash = md5($password);
		
		if($email != $email_confirm) {
			$error = "The email and confirm email did not match!";
		} else if ($password != $passwordConfirm) {
			$error = "The password and confirm password did not match!";
		}  

		if($error ==  "") {
			$error = isUniqueUser($userName, $email);
		}

		if($error == "") { 
			$insert = "INSERT INTO users (email, username, first_name, last_name, password, gender, month, day, year, isActive) 
				VALUES (?,?,?,?,?,?,?,?,?)";
			
			$stmt = $db->prepare($insert);
			$stmt->bind_param("ssssssiiii", $email, $userName, $firstName, $lastName, $pwHash, $gender, $month, $day, $year, 0);	
			$stmt->execute();
				
		    if($stmt->affected_rows == 1) {
				$title = "Confirmation Email Sent";
				$include = "confirmNewUser.html.php";
		    	include 'layout.php';
		    
		    	sendConfirmationEmail($email);
		    } else {
		    	$error = "Query Failed (" . $stmt->errno . ") " . $stmt->error;
		    }
		} else {
			$title = "Error";
			$include = "confirmNewUser.html.php";
		    include 'layout.php';
		}

	} else if () {
		//TODO activate user

		$db=initDB();

		$query = "UPDATE users SET
			isActive = 1
			WHERE id = ?";
			
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $_REQUEST['id']);	
		
		if(!($stmt->execute())) {
			$error = "user couldn't be confirmed";
		}


		$title = "Welcome!";
		$include = "confirmNewUser.html.php";
    	include 'layout.php';
	} 
?>