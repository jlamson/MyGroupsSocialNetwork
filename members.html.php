<!-- members.html.php -->
<h1>MEMBERS!!</h1>
<?php


	if(isset($_REQUEST['addFriend'])){

		$friendId = $_REQUEST['friendId'];
		echo "In If statement ".$friendId;
		addFriend($friendId);

	}

	if(isset($_REQUEST['deleteFriend'])){
		$friendId= $_REQUEST['friendId'];
		deleteFriend($friendId);
	}


	$arr_size = sizeof($all_users);
	foreach ($all_users as $cur_id) {
		if($cur_id != $_SESSION['userId']){
			$info = getUserInfo($cur_id);
			$userName = $info["username"];
			$about = $info["about"];
			$month = $info["month"];
			$day = $info["day"];
			$year = $info["year"];
			echo "<h1>".$userName."</h1>";
			echo "<h2>About Me<h2>";
			echo "<p>".$about."</p>";
			echo "<h2>Birthday</h2>";
			echo "<p>".$month."/".$day."/".$year."</p>";
			echo "<form action=\"\" method=\"post\">";

			echo "<input type=\"hidden\" name=\"friendId\" id =\"friendId\" value=\"$cur_id\" />";
			//checks to see if already a freind, then gives option to delete.
			if((getFriendIds()!=false)&&(in_array($cur_id, getFriendIds()))){
				echo "<input class=\"submit\" name=\"deleteFriend\" type=\"submit\" value=\"Delete Friend\" />";
			}else{
				echo "<input class=\"submit\" name=\"addFriend\" type=\"submit\" value=\"Add as Friend\" />";
			}
			echo "</form>";
			echo "<hr>";
		}

	}
	


?>
