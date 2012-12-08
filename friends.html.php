<!-- friends.html.php -->
<h1>FRIENDS!!</h1>
<?php
foreach($all_info as $cur_mem){
?>
	<h1><?php echo $cur_mem["username"]; ?></h1>
	<h2>About Me<h2>
	<p><?php echo $cur_mem["about"] ?></p>
	<h2>Birthday</h2>
	<p><?php echo $cur_mem["month"]."/".$cur_mem["day"]."/".$cur_mem["year"] ?></p>
	<form action="" method="post">

	<input type="hidden" name="friendId" id ="friendId" value=<?php echo $cur_mem["id"]; ?> />
	<!-- 	//checks to see if already a freind, then gives option to delete. -->
	<?php 
	if((getFriendIds()!=false)&&(in_array($cur_mem["id"], getFriendIds()))){
	?>
		<input class="submit" name="deleteFriend" type="submit" value="Delete Friend" />
	<?php }else{ ?>
		<input class="submit" name="addFriend" type="submit" value="Add as Friend" />
	<?php } ?>
	</form>
	<hr>
<?php	} ?>