<section id="blogs">
	<?php if ($statement->rowCount() > 0) : ?>
		<?php for ($i = 0; $i < 5 && $row = $statement->fetch(); $i++) : ?>
			<section class="post">
				<h3 class='title'><a href="post.php?id=<?=$row['id']?>"><?=$row['title']?></a></h3>
				<a href="edit.php?id=<?=$row['id']?>"><small>edit</small></a>
				<br>
				<small class='date'><?=$row['postdate']?></small>
				<?php if (strlen($row['post']) > 197) : ?>
					<p><?=substr($row['post'], 0, 197)?>... <a href="post.php?id=<?=$row['id']?>">Read more...</a></p>
				<?php else : ?>
					<p><?=$row['post']?> <a href="post.php?id=<?=$row['id']?>">View Post</a></p>
				<?php endif; ?>
				<hr>
			</section>
		<?php endfor; ?>
	<?php else : ?>
		<section class="centerText border">
			<h3>No Posts</h3><br>
			<a href="create.php">Create One</a>
		</section>
	<?php endif; ?>
</section>
