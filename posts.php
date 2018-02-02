<section id="blogs">
	<?php if ($statement->rowCount() > 0) : ?>
		<?php while ($row = $statement->fetch()) : ?>
			<section class="post" id='post<?=$statement->rowCount()+1?>'>
				<h3 class='title'><?=$row['title']?></h3>
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
		<?php endwhile; ?>
	<?php endif; ?>
</section>
