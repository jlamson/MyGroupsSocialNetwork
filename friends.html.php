<!-- friends.html.php -->
<h1>FRIENDS!!</h1>
<form action="" method="post" >
	<input class="term" name="search_term" type="text" />
	<input class="submit_term" name="search" type="submit" value="Search" />
	<p>* Search by email, user name, first name, or last name</p>
</form>
<?php if ($all_info == array()) { ?>
	<p>You have no friends that matched your search</p>
<?php } else { ?>
	<?php foreach ($all_info as $user) { ?>
		<?php include "userView.html.php"; ?>
	<?php } ?>
<?php } ?>
