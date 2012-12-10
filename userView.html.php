<h1><a href="viewprofile.php?id=<?=$user['id']?>"><?= $user["username"] ?></a></h1>
<p class="userView_block">
	<span class="userView_title">About Me</span>
	<span class="userView_content"><?= $user["about"] ?></span>
</p>
<p class="userView_block">
	<span class="userView_title">Other Stuff</span>
	<span class="userView_content">
		<?= $user['first_name'] ?> <?= $user['last_name'] ?> <br />
		&nbsp;&nbsp;&nbsp;&nbsp;
		<?php if ($user['gender']!='b') echo strtoupper($user['gender']) . ","; ?> 
		<?php if ($user['month'] != 0 and $user['day'] != 0 ) { 
			echo $user["month"]."/".$user["day"]; 
		} if ($user['year'] != 0) echo "/".$user["year"]; ?><br />
	</span>
</p>
<form action="" method="post">
	<input type="hidden" name="friendId" id ="friendId" value=<?php echo $user["id"]; ?> />
<!-- checks to see if already a freind, then gives option to delete. -->
	<?php if ((getFriendIds()!=false) && (in_array($user["id"], getFriendIds()))){ ?>
		<input class="submit" name="deleteFriend" type="submit" value="Delete Friend" />
	<?php } else { ?>
		<input class="submit" name="addFriend" type="submit" value="Add as Friend" />
	<?php } ?>
</form>
<hr>