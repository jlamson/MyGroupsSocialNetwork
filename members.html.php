<!-- members.html.php -->
<h1>MEMBERS!!</h1>
<?php
	$arr_size = sizeof($all_users);
	foreach ($all_users as $cur_id) {
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
		echo "<button type=\"button\">Add as friend</button>";
		echo "<hr>";

	} 

?>
