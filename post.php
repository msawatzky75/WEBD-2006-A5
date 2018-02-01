<?php
if(isset($_GET['id'])):
	require('connect.php');
	$query = "SELECT * FROM posts WHERE id = :id";
	$statement = $db->prepare($query); // Returns a PDOStatement object.
	$statement->bindValue("id", $_GET['id']);
	$statement->execute(); // The query is now executed.
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Blog</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<section id="container">
			<?php require 'header.php'; ?>
				<?php if ($statement->rowCount() > 0) : ?>
					<?php while ($row = $statement->fetch()) : ?>
						<section class="post" id='post<?=$statement->rowCount()+1?>'>
							<h3 class='title'><?=$row['title']?></h3>
							<small class='date'><?=$row['postdate']?></small>
							<p><?=$row['post']?></p>
						</section>
					<?php endwhile; ?>
					<?php else : ?>
						<p>That post does not exist!</p>
				<?php endif; ?>
			</section>
		</section>
	</body>
</html>
<?php else : 	header('Location: index.php'); //status 302 ?>
<?php endif; ?>
