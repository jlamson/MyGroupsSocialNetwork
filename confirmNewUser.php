<!-- confirm new user -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	$userName = $_POST['uname'];
	$firstName = $_POST['fname'];
	$lastName = $_POST['lname'];
	$email = $_POST['email'];
	$email = $_POST['emailConfirm'];
	$passWord = $_POST['password'];
	$passWordConfirm = $_POST['passwordConfirm'];
	$gender = $_POST['gender'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$year = $_POST['year'];

?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Confirm New User</title>
	<link rel="stylesheet" href="index.css" type="text/css" />
	<?php
		@ $db = new mysqli('localhost', 'root', '', 'team01_mon_amis');
		if(mysqli_connect_errno()){
			echo 'Error...Idiot';
			echo mysqli_connect_error();
			exit;
		}
	?>
	</head>
	<body>
	<?php
		echo "<p>".$userName."</p>";
		echo "<p>".$firstName."</p>";
		echo "<p>".$lastName."</p>";
		echo "<p>".$email."</p>";
		echo "<p>".$passWord."</p>";
		echo "<p>".$passWordConfirm."</p>";
		echo "<p>".$gender."</p>";
		echo "<p>".$month."</p>";
		echo "<p>".$day."</p>";
		echo "<p>".$year."</p>";

		$pwHash = md5($passWord);

		$insert = "Insert into users (email, username, first_name, last_name, password, gender, month, day, year) values (?,?,?,?,?,?,?,?,?)";
		$stmt = $db->prepare($insert);
		$stmt->bind_param("ssssssiii", $email, $userName, $firstName, $lastName, $pwHash, $gender, $month, $day, $year);

		$stmt->execute();

	    echo $stmt->affected_rows." number of rows affected";

	?>
	</body>