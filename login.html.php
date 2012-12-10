<?php if ($error != "") { ?>
	<p>Error: <?= $error ?></p>
<?php } ?>
<form action="login.php" method="post">
	<label for="loginEmail">Email or Username:</label>
		<input name="loginId" id="loginId" type="text" /> 
	<br />
	<label for="loginPassword">Pasword: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </label>
		<input name="loginPassword" id="loginPassword" type="password" />
	<br />
	<input type="submit" value="Login" />

</form>
<p><a href="newProfile.php">New User?</a></p>