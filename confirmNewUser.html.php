<h1>New User Created!</h1>

<?php if ($error != "") { ?>
	<p><?= $error ?></p>
<?php } else { ?>
	<p>A new user with the email <?= $email ?> has been created. Click the logo 
	above to return the the home screen and login!</p>
<?php } ?>