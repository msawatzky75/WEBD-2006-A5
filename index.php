<?php
	require('connect.php');
	$query = "SELECT * FROM posts";
	$statement = $db->prepare($query); // Returns a PDOStatement object.
	$statement->execute(); // The query is now executed.
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Blog</title>
	</head>
	<body>
		<?php require 'header.php'?>
		<section id="blogs">
			<?php if ($statement->rowCount() > 0) : ?>
				<?php while ($row = $statement->fetch()): ?>
					<section class="post" id='post<?=$statement->rowCount()+1?>'>
						<?php displayPost($row); ?>
					</section>
				<?php endwhile; ?>
			<?php endif; ?>
		</section>
	</body>
</html>
