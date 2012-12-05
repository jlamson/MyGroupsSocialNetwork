<?php



function setLayout(){
	echo "<div id = \"titleBar\"> 
			<h1> My Groups <h1>
			<p><a href=\"logOut.php\">Log Out</a></p>
		</div>";
	
	echo "<div id=\"sideBar\">
		<ul>
			<li><a href=\"home.php\">Home</a></li>
			<li><a href =\"myGroups.php\">My Groups</a></li>
			<li><a href =\"profilePage.php\">My Profile</a></li>
			<li><a href =\"searchGroups.php\">Search Groups</a></li>
		</ul>
		</div>";

}

function validateLogin($email, $password){
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	@ $db = new mysqli('localhost', 'root', '', 'team01_mon_amis');
		if(mysqli_connect_errno()){
			echo 'Error...Idiot';
			echo mysqli_connect_error();
			exit;
		}
		$pwMd5 = md5($password);
	$query = "select `password` from users where `email` = '".$email."';";
	$result = $db->query($query);

	$num_results = $result->num_rows;
	echo $num_results;
	if($num_results== 0){
		echo "<script type=\"text/javascript\">
			window.alert(\"Your email or password is incorrect!\")
		</script>";
	}else {
		$row = $result->fetch_assoc();
		$correct_password = $row['password'];
		if($pwMd5 != $correct_password){
			echo "<script type=\"text/javascript\">
			window.alert(\"Your email or password is incorrect!\")
		</script>";
		}
	}
	echo $query;
}


?>