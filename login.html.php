<?php if ($error != "") { ?>
	<p>There is an error</p>
	<p>Error: <?= $error ?></p>
<?php } ?>
<form action="login.php" method="post">
	<label for="loginEmail">Email:</label>
		<input name="loginEmail" id="loginEmail" type="email" /> 
	<br />
	<label for="loginPassword">Pasword</label>
		<input name="loginPassword" id="loginPassword" type="password" />
	<br />
	<input type="submit" value="Login" />

</form>
<p><a href="newProfile.php">New User?</a></p>