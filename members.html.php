<!-- members.html.php -->
<h1>MEMBERS!!</h1>
<?php
	foreach ($member_id as $all_users) {
		$info = getUserInfo($member_id);
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
		echo "<hr>";

	} 

?>
