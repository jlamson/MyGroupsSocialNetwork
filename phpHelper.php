<?php

function getUserIdFromEmail($email){
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	$db = initDB();
	
	$query ="SELECT `id` FROM users WHERE `email` = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();	
	$num_results = $result->num_rows;
	if($num_results == 0){
		return false;	
	}else {
		$row = $result->fetch_assoc();
		$user_id = $row['id'];
		return $user_id;	
	}
		
}

function getUserInfo($userId){
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	$db = initDB();
	
	$query ="SELECT * FROM users WHERE `id` = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $userId);
	$stmt->execute();
	$result = $stmt->get_result();	
	$num_results = $result->num_rows;
	if($num_results == 0){
		return false;
	} else {
		$row = $result->fetch_assoc();
		return $row; 
	}
}

function getAllUsers(){
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	$db = initDB();
	
	$query ="SELECT `id` FROM users WHERE 1;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();	
	$num_results = $result->num_rows;
	$all_users = array();
	if($num_results != 0){
		for($i=0; $i<$num_results; $i++){
			$row = $result->fetch_assoc();
			$user_id = $row['id'];
			$all_users[$i] = $user_id;
		}
		return $all_users;
	} else {
		return false;
	}
		
}

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
	if($num_results== 0){
		return false;
	} else {
		$row = $result->fetch_assoc();
		$correct_password = $row['password'];
			return true;
	}

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