<?php

function validateLogin($email, $password){
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	$db = initDB();

	$pwHash = md5($password);

	$query = "SELECT `password` FROM users WHERE `email` = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $email);	
	$stmt->execute();
	$result = $stmt->get_result();

	$num_results = $result->num_rows;
	echo $num_results;
	if($num_results== 0){
		echo "<script type=\"text/javascript\">
			window.alert(\"That user doesn't exist\")
		</script>";
		return false;
	} else {
		$row = $result->fetch_assoc();
		$correct_password = $row['password'];
		if($pwHash != $correct_password){
			echo "<script type=\"text/javascript\">
			window.alert(\"Your email or password is incorrect!\")
		</script>";
		}
		return false;
	}

	//TODO: set session and stuff
	return true;
}

function initDB() {
	@ $db = new mysqli('localhost', 'root', '', 'team01_mon_amis');
	if(mysqli_connect_errno()){
		echo 'Error...Idiot';
		echo mysqli_connect_error();
		return -1;
	} else {
		return $db;
	}
}

?>