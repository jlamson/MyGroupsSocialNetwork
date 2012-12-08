<!-- To display a page, this page is called with a $title variable, and a $include variable -->
<DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<link rel="stylesheet" href="layout.css" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

	<div id="titleBar"> 
		<h1><a href="home.php"> Mon Amis </a></h1>
	</div>
	
	<div id="sideBar">
		<a href="home.php">Chez Moi</a><br />
		<a href="profilePage.php">Mon Profile</a><br />
		<a href="friends.php">My Friends</a><br />
		<a href="members.php">Members</a><br />
		<a href="logOut.php">Log Out</a><br />
	</div>

	<div id="pageContent">
		<?php if ($include != "") { include $include; } ?>
	</div>

</body>
</html>