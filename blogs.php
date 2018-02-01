<section id="blogs">
	<?php if ($statement->rowCount() > 0) : ?>
		<?php while ($row = $statement->fetch()) : ?>
			<section class="post" id='post<?=$statement->rowCount()+1?>'>
				<h3 class='title'><?=$row['title']?></h3>
				<small class='date'><?=$row['postdate']?></small>
				<p><?=substr($row['post'], 0, 200)?></p>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
</section>
