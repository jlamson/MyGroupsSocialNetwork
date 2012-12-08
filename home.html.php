<h1>Home</h1>
<form action="" method="post">
	<input class="status" name="status" type="text" />
	<input class="submit_status" name="newStatus" type="submit" value="Update Status" />
</form>

<?php foreach ($posts as $post) { ?>
	<p>
		<span class="status_header"><?= $post['username'] ?>: </span>
		<span class="status_content"><?= $post['status'] ?> </span>
	</p>
	<hr />
<?php } ?>

