<h1>My Profile</h1>
<?php if($error != "") echo "<h2 class=\"alert\">$error</h2>"; ?>
<form action="" method="post">
	Username: <?= $userInfo['username']?> <br />
	Email: <?= $userInfo['email']?> <br />

	<label for="fname">First Name:</label>
		<input type="text" name="fname" id="fname" value="<?= $userInfo['first_name']?>"/> <br />
	<label for="lname">Last Name:</label>
		<input type="text" name="lname" id="lname" value="<?= $userInfo['last_name']?>"/> <br />
	<label for="gender">Gender:</label>
		<select name="gender">
			<option value ="b" <?php if($userInfo['gender'] == "b") echo "selected=\"selected\"" ?>></option>
			<option value ="m" <?php if($userInfo['gender'] == "m") echo "selected=\"selected\"" ?>>Male</option>
			<option value ="f" <?php if($userInfo['gender'] == "f") echo "selected=\"selected\"" ?>>Female</option>
			<option value ="o" <?php if($userInfo['gender'] == "o") echo "selected=\"selected\"" ?>>Other</option>
		</select> <br />
	<label for="Bday">Birthday:</label>
		<input type="text" name="month" id="month" size="1" maxlength="2" value="<?= $userInfo['month']?>"/>/
		<input type="text" name="day" id="day" size="1" maxlength="2" value="<?= $userInfo['day']?>"/>/
		<input type="text" name="year" id="year" size="1" maxlength="4" value="<?= $userInfo['year']?>"/> <br />
	<label for="about">About Me:</label><br />
		<textarea rows=4 cols=60 name="about" id="about"><?= $userInfo['about'] ?></textarea>  
	<input type="submit" name="useredit" value="Edit My Information" /> <br /> <br />
	<p>* indicates required field </p>
</form>

<form action="" method="post">
	<label for="newPassword">New Password:</label>
		<input type="password" name="newPassword" id="newPassword" /> <br />
	<label for="confPassword">Confirm New Password:</label>
		<input type="password" name="confPassword" id="confPassword" /> <br />
	<label for="oldPassword">Old Password:</label>
		<input type="password" name="oldPassword" id="oldPassword" /> <br />
	<input type="submit" name="passedit" value="Change My Password" />
</form>