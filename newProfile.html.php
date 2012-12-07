<h1>MyGroup - New User</h1>
<form action="confirmNewUser.php" method="post">
	<label for="uname">User Name*:</label>
		<input type="text" name="uname" id="uname" /><br />
	<label for="fname">First Name:</label>
		<input type="text" name="fname" id="fname" /> <br />
	<label for="lname">Last Name:</label>
		<input type="text" name="lname" id="lname" /> <br />
	<label for="email">Email*:</label>
		<input type="text" name="email" id="email" /> <br />
	<label for="emailConfirm">Re-enter email*:</label>
		<input type="text" name="emailConfirm" id="emailConfirm" /> <br />
	<label for="password">Password*:</label>
		<input type="text" name="password" id="password" /> <br />
	<label for="passwordConfim">Re-enter password*:</label>
		<input type="text" name="passwordConfirm" id="passwordConfirm" /> <br />
	<label for="gender">Gender:</label>
		<select name="gender">
			<option value ="b"></option>
			<option value ="m">Male</option>
			<option value ="f">Female</option>
			<option value ="o">Other</option>
		</select> <br />
	<label for="Bday">Birthday:</label>
		<input type="text" name="month" id="month" size="1" maxlength="2" value="MM"/>
	<label>/</label>
		<input type="text" name="day" id="day" size="1" maxlength="2" value="DD"/>
	<label>/</label>
		<input type="text" name="year" id="year" size="1" maxlength="4" value="YYYY"/> <br />
	<input type="submit" value="Submit" /> <br /> <br />
	<p>* indicates required field </p>
</form>