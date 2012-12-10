<!-- viewProfile.html.php -->
<?php $user = getUserInfo($cur_profile); ?>
<?php include "userView.html.php"; 
	if ($posts == array()){
		echo "You have no posts";
	} else {
		foreach ($posts as $post) { ?>
		<p>
			<span class="status_header"><?= $post['username'] ?>: </span>
			<span class="status_content"><?= $post['status'] ?> </span>
		</p>
		<?php if ($post['comments']) { ?>
			<p class="comment_block">
				<?php foreach ($post['comments'] as $comment) { ?>
					<span class="comment_header"><?= $comment['username'] ?>: </span>
					<span class="comment_content"><?= $comment['comment'] ?> </span>
					<br />
				<?php } ?>
			</p>
		<?php } ?>
		<form action="" method="post">
			<input class="status_comment" name="status_comment" type="text" />
			<input type="hidden" name="post_id" value="<?= $post['id'] ?>" />
			<input class="submit_status_comment" name="comment" type="submit" value="Comment" />
		</form>
		<hr />

 	<?php } 
 	}?>