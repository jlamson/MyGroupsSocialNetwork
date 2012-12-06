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
		<h1><a href="index.php"> Mon Amis </a></h1>
	</div>
	
	<div id="sideBar">
		<ul>
			<li><a href="home.php">Chez Moi</a></li>
			<li><a href ="myGroups.php">Mon Amis</a></li>
			<li><a href ="profilePage.php">Mon Profile</a></li>
			<li><a href="logOut.php">Log Out</a></li>
		</ul>		
	</div>

	<div id="pageContent">
		<?php if ($include != "") { include $include; } ?>
	</div>

</body>
</html>