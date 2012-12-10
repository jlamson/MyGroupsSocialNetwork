<h1>New User Created!</h1>

<?php if ($error != "") { ?>
	<p><?= $error ?></p>
<?php } else if ($userConfirm) { ?>
	<p>A new user with the email <?= $email ?> has been created. Click the logo 
	above to return the the home screen and login!</p>
<?php } else { ?>
	<p>An email has been sent to <?= $email ?>. Please click the link in the
	email to confirm the new user creation. </p>
<?php } ?>