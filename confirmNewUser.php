<!-- confirm new user -->
<?php
	include 'phpHelper.php';
	$db = initDB();
	$error = "";

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
		$insert = "INSERT INTO users (email, username, first_name, last_name, password, gender, month, day, year) 
			VALUES (?,?,?,?,?,?,?,?,?)";
		
		$stmt = $db->prepare($insert);
		$stmt->bind_param("ssssssiii", $email, $userName, $firstName, $lastName, $pwHash, $gender, $month, $day, $year);	
		$stmt->execute();
			
	    if($stmt->affected_rows == 1) {
			$title = "Welcome $firstName";
			$include = "confirmNewUser.html.php";
	    	include 'layout.php';
	    } else {
	    	$error = "Query Failed (" . $stmt->errno . ") " . $stmt->error;
	    }
	} else {
		$title = "Error";
		$include = "confirmNewUser.html.php";
	    include 'layout.php';
	}
?>