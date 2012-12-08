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

function isUniqueUser($un, $email, $isNewUser) {
	$db = initDB();
	$error = "";
	
	$query ="SELECT * FROM users WHERE `username` = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $un);
	$stmt->execute();
	$result = $stmt->get_result();	
	$num_results = $result->num_rows;
	if($num_results != 0 ){
		$error .= "A user with this username exists.";
	} 

	$query ="SELECT * FROM users WHERE `email` = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();	
	$num_results = $result->num_rows;
	if($num_results != 0 ){
		$error .= "A user with this email exists.";
	}

	return true;

}

function updateLoggedInUser($user) {
	
	$db = initDB();

	$query = "UPDATE users SET
		first_name = ?,
		last_name = ?,
		about = ?,
		gender = ?,
		month = ?,
		day = ?,
		year = ?	
		WHERE id = ?";
	
	$stmt = $db->prepare($query);
	$stmt->bind_param("ssssiiii", $user['fname'], $user['lname'], $user['about'], 
		$user['gender'], $user['month'], $user['day'], $user['year'],
		$_SESSION['userId']);
	$stmt->execute();
	
	return $db->affected_rows;

}

function updateUserPassword($passHash) {
	
	$db = initDB();

	$query = "UPDATE users SET
		password = ?
		WHERE id = ?";
	
	$stmt = $db->prepare($query);
	$stmt->bind_param("ss",	$passHash, $_SESSION['userId']);
	$stmt->execute();
	
	return $db->affected_rows;

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
	if($num_results == 0){
		return false;
	} else {
		$row = $result->fetch_assoc();
		$correct_password = $row['password'];
		return $correct_password == $pwHash;
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


function getFriendIds(){
	$db = initDB();
	$query ="SELECT `friend_id` FROM `friend_list` WHERE `user_id`=?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("i", $_SESSION['userId']);
	$stmt->execute();
	
	$result = $stmt->get_result();	
	$num_results = $result->num_rows;
	$ids = array();

	if($num_results != 0){
		for($i=0; $i<$num_results; $i++){
			$row = $result->fetch_assoc();
			$ids[] = $row['friend_id'];
		}
		return $ids;
	} else {
		return false;
	}
		
}

function getFriendsStatuses($ids) {
	$ids = getFriendIds();

	$db = initDB();

	$query = "SELECT users.username, users.first_name, users.last_name, user_statuses.id, user_statuses.user_id, user_statuses.status 
		FROM user_statuses INNER JOIN users ON users.id=user_statuses.user_id
  		WHERE (FALSE";
  	foreach ($ids as $id) {
  		$query .= " OR user_statuses.user_id=" . $id;
  	}
  	$query .= ") ORDER BY user_statuses.id DESC LIMIT 0, 20;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	
	$result = $stmt->get_result();	
	$num_results = $result->num_rows;
	$statuses = array();

	if($num_results != 0){
		for($i=0; $i<$num_results; $i++){
			$statuses[$i] = $result->fetch_assoc();
			$statuses[$i]['comments'] = getComments($statuses[$i]['id']);
		}
		return $statuses;
	} else {
		return false;
	}

}

function addComment($post_id, $comment) {
	$db = initDB();

	$query = "INSERT INTO status_comments (status_id, user_id, comment) VALUES 
		(?, ?, ?)";
	$stmt = $db->prepare($query);
	$stmt->bind_param("iis", $post_id, $_SESSION['userId'], $comment);
	$stmt->execute();
	
	return $db->affected_rows;
}

function getComments($status_id) {
	$db = initDB();

	$query = "SELECT users.username, status_comments.comment 
		FROM status_comments INNER JOIN users ON
			status_comments.user_id=users.id WHERE status_comments.status_id=? 
		ORDER BY status_comments.id DESC";
	$stmt = $db->prepare($query);
	$stmt->bind_param("i", $status_id);
	$stmt->execute();

	$result = $stmt->get_result();	
	$num_results = $result->num_rows;
	$comments = array();

	if($num_results != 0){
		for($i=0; $i<$num_results; $i++){
			$comments[$i] = $result->fetch_assoc();
		}
		return $comments;
	} else {
		return false;
	}
	
}

function addFriend($friendId){
	$db = initDB();
	$query="INSERT INTO `friend_list` (`user_id`, `friend_id`) VALUES (?,?)";
	$stmt = $db->prepare($query);
	$stmt->bind_param("ii", $_SESSION['userId'], $friendId);
	echo "You added a friend".$friendId;
	return($stmt->execute());

}

function deleteFriend($friendId){
	$db = initDB();
	$query="DELETE FROM `friend_list` WHERE (`user_id` = ? AND `friend_id` = ?);";
	$stmt = $db->prepare($query);
	$stmt->bind_param("ii", $_SESSION['userId'], $friendId);
	return($stmt->execute());

}

?>