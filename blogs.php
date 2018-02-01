<section id="blogs">
	<?php if ($statement->rowCount() > 0) : ?>
		<?php while ($row = $statement->fetch()) : ?>
			<section class="post" id='post<?=$statement->rowCount()+1?>'>
				<h3 class='title'><?=$row['title']?></h3><a href="#">edit</a>
				<small class='date'><?=$row['postdate']?></small>
				<p><?=substr($row['post'], 0, 197)?>... <a href="post.php?id=<?=$row['id']?>">Read more...</a></p>
				<hr>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
</section>
